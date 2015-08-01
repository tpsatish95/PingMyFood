# -*- coding: utf-8 -*-
# Author : Satish Palaniappan
__author__ = "Satish Palaniappan"

'''
Copyright 2015 Satish Palaniappan

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

   http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
'''

### Insert Current Path
import os, sys, inspect
cmd_folder = os.path.realpath(os.path.abspath(os.path.split(inspect.getfile(inspect.currentframe()))[0]))
if cmd_folder not in sys.path:
	sys.path.insert(0, cmd_folder)

import pickle
import gensim
from scipy import spatial
import operator
import numpy as np
from twokenize import *
from nltk.corpus import stopwords
import re
import os
import Kmeans_l1
import csv
from collections import defaultdict
from collections import OrderedDict

# path = "./20newsGrp/"
# path = "./DomainPredictor/20newsGrpt/"
# vecsPath = "./DomainPredictor/"
vecsPath = cmd_folder + "/"
path = cmd_folder +"/PMFTopicCluster/"

def save_obj(obj, name ):
    with open( path + name + '.pkl', 'wb') as f:
        pickle.dump(obj, f,  protocol=2)

def load_obj(name ):
    with open( path + name + '.pkl', 'rb') as f:
        return pickle.load(f)

class Modeler(object):

	def __init__(self):

		## Load Pickle
		# self.finestCluster = load_obj("Levelf")
		self.granularClusters = []
		self.c2wMaps = []
		self.modelNames = []
		for i in sorted([f for f in os.listdir(path) if "Level" in f]):
			i = i.replace(".pkl","")
			if "c2w" in i:
				self.c2wMaps.append((load_obj(i)))
			else:
				self.granularClusters.append(load_obj(i))
				self.modelNames.append(i.replace("Level",""))


		self.Domains = load_obj("Domains")
		self.seed2Domain = load_obj("seed2Domain")
		# self.vec2_word_Index = load_obj("vec2_word_Index")
		# self.index2vec = load_obj("index2vec")
		# self.index2word = load_obj("index2word")
		# self.seeds = [k for k in self.seed2Domain.keys()]

		self.model = gensim.models.Word2Vec.load_word2vec_format(vecsPath+'vectors.bin', binary=True)
		self.model.init_sims(replace=True)
		print("Vecs Loaded")

		# self.stoplistw = stopwords.words('english')
		self.stoplistw = load_obj("aggresiveStopWords")
		self.stoplist = [")","(",".","'",",",";",":","?","/","!","@","$","*","+","-","_","=","&","%","`","~","\"","{","}"]

		self.writer = csv.writer(open("TopicsAnalysisNewScoreAlgo.csv","w"))

		self.sentenceFineTopics = dict()

	def KMeansPredict(self,details,vec):
		# Details: centers , xtoc , distances
		return  Kmeans_l1.nearestcentres(X = [vec], centres = details[0], metric="cosine")

	def predictCluster(self,text,fineMinScore):
		vec = self.model[text]

		#FORMAT word, domainIndex, score
		GranularityMatrix = []
		for cluster,c2w,name in zip(self.granularClusters,self.c2wMaps,self.modelNames):
			i = self.KMeansPredict(cluster,tuple(vec))[0]
			v2wi = [c2w[i],self.seed2Domain[c2w[i]]]
			try:
				cosSimScore = self.model.similarity(v2wi[0],text.replace("_"," "))
			except:
				cosSimScore = self.model.similarity(v2wi[0].replace("_"," "),text.replace("_"," "))
			GranularityMatrix.append([v2wi[0],v2wi[1],cosSimScore,name])

		###
		## taking fineMinScore as lower bound, then we just sort using the cluster number,
		# assuming higher level clusters are more precise in predicting.
		# The below method improved accuracy by 3+%
		temp = []
		for i in GranularityMatrix:
			if i[2] >= fineMinScore:
				temp.append(i)
		if temp == []:
			return []
		else:
			top = sorted(temp, key = operator.itemgetter(3))
		####

		fineTopics = dict()

		# top = sorted(GranularityMatrix, key = operator.itemgetter(2),reverse = True)
		gen = []
		for t in top:
			gen.append(t[3] + " LCluster|" + t[0] +"|" + str(t[2]) + " Top " +str(self.Domains[self.seed2Domain[t[0]]]))
			#fineTopics[t[0]] = t[2]
		self.writer.writerow([text]+gen)
		# print(text + str(sorted(GranularityMatrix, key = operator.itemgetter(2),reverse = True)))
		# return Top Domain, Index Score and fine topics
		top = top[0]
		fineTopics[top[0]] = top[2]
		return [self.Domains[top[1]],top[1],top[2],fineTopics]


	def prepare (self,text):
		line = text
		for r in ["@","#"]:
			line = line.lower().replace(r," ")
		for w in self.stoplistw:
			line = line.replace(" "+ w +" "," ")
		for w in self.stoplist:
			line = line.replace(w," ")
		line = re.sub(Url_RE," ", str(line.strip()))
		return line

	def find_ngrams(self,listI,n):
		grams = []
		for i in zip(*[listI[j:] for j in range(n)]):
			grams.append(" ".join(i))
		return grams

	def prep(self,text):
		text = self.prepare(" ".join(tokenize(text)))
		text = str(text.strip()).encode("utf-8")
		self.writer.writerow([text])
		textL1 = tokenize(text)
		#Eliminating words with less than 3 char
		textL1 = [t for t in textL1 if len(t) > 1 ]
		textL2 = self.find_ngrams(textL1,2)
		return textL1 + textL2

	def getCategory(self,text):
		# Min Score for each fine model word
		fineMinScore =  0.35

		# sentScore = []

		scores = dict()
		for i in range(0,len(self.Domains)):
			scores[i] = 0.0

		textL = self.prep(text)

		for phrase in textL:
			phrase = phrase.strip()
			try:
				tempDomScore = self.predictCluster(phrase,fineMinScore)
				if tempDomScore == []:
					continue
				#print(tempDomScore[0])
				if tempDomScore[2] > fineMinScore:
					scores[tempDomScore[1]] += tempDomScore[2]
			except:
				continue
		scoreSort  = sorted(scores.items(), key = operator.itemgetter(1), reverse=True)
		self.writer.writerow([(self.Domains[s[0]],s[1]) for s in scoreSort if s[1] > 0.0])

		thresholdP = 0.40  # This value is in percent
		maxS = max(scores.items(), key = operator.itemgetter(1))[1]
		threshold = maxS * thresholdP

		#Min Score
		minScore = 0.40
		flag = 0
		if maxS < minScore:
			flag = 1
		# set max number of cats assignable to any text
		catLimit = 4  # change to 3 or less more aggresive model
		# more less the value more aggresive the model

		scoreSort  = sorted(scores.items(), key = operator.itemgetter(1), reverse=True)
		#print(scoreSort)
		cats = []
		f=0
		for s in scoreSort:
			if s[1] != 0.0 and s[1] > threshold:
				f=1
				cats.extend([self.Domains[s[0]]])
			else:
				continue
		if f == 0 or flag == 1: #No Category assigned!
			return ("general")
		else:
			if len(cats) == 1:
				ret = str(cats[0])
			elif len(cats) <= catLimit:
				ret = "|".join(cats)
			else:
				# ret = "general" or return top most topic
				ret = cats[0] +"|"+"general"
			self.writer.writerow([ret])
			self.writer.writerow([" "," "])
			self.writer.writerow([" "," "])
			return ret

	def getTopicComp(self,text):
		# Min Score for each fine model word
		fineMinScore = 0.35

		# sentScore = []

		scores = dict()
		for i in range(0,len(self.Domains)):
			scores[i] = 0.0

		textL = self.prep(text)

		for phrase in textL:
			phrase = phrase.strip()
			try:
				tempDomScore = self.predictCluster(phrase,fineMinScore)
				if tempDomScore == []:
					continue
				#print(tempDomScore[0])
				if tempDomScore[2] > fineMinScore:
					scores[tempDomScore[1]] += tempDomScore[2]
			except:
				continue
		scoreSort  = sorted(scores.items(), key = operator.itemgetter(1), reverse=True)
		self.writer.writerow([(self.Domains[s[0]],s[1]) for s in scoreSort if s[1] > 0.0])

		thresholdP = 0.40  # This value is in percent
		maxS = max(scores.items(), key = operator.itemgetter(1))[1]
		threshold = maxS * thresholdP

		#Min Score
		minScore = 0.40
		flag = 0
		if maxS < minScore:
			flag = 1
		# set max number of cats assignable to any text
		catLimit = 4  # change to 3 or less more aggresive model
		# more less the value more aggresive the model

		scoreSort  = sorted(scores.items(), key = operator.itemgetter(1), reverse=True)
		#print(scoreSort)
		cats = []
		f=0

		# to compute topic composition
		totalScore = 0.0
		for s in scoreSort:
			if s[1] != 0.0 and s[1] > threshold:
				totalScore+=s[1]
			else:
				continue

		for s in scoreSort:
			if s[1] != 0.0 and s[1] > threshold:
				f=1
				cats.append([self.Domains[s[0]],(s[1]/totalScore)*100.0])
			else:
				continue

		ret = ""
		if f == 0 or flag == 1: #No Category assigned!
			return ("general")
		else:
			if len(cats) == 1:
				ret = str(cats[0][0])
			elif len(cats) <= catLimit:
				for tempcat  in cats:
					ret += str(tempcat[0]) + "|"
			else:
				# ret = "general" or return top most topic
				ret +=  str(cats[0][0]) + "|" +"general"
			return ret

	def getTopicComposition(self,text):
		# Min Score for each fine model word
		fineMinScore = 0.35

		# sentScore = []

		scores = dict()
		for i in range(0,len(self.Domains)):
			scores[i] = 0.0

		textL = self.prep(text)

		for phrase in textL:
			phrase = phrase.strip()
			try:
				tempDomScore = self.predictCluster(phrase,fineMinScore)
				if tempDomScore == []:
					continue
				#print(tempDomScore[0])
				if tempDomScore[2] > fineMinScore:
					scores[tempDomScore[1]] += tempDomScore[2]
			except:
				continue
		scoreSort  = sorted(scores.items(), key = operator.itemgetter(1), reverse=True)
		self.writer.writerow([(self.Domains[s[0]],s[1]) for s in scoreSort if s[1] > 0.0])

		thresholdP = 0.40  # This value is in percent
		maxS = max(scores.items(), key = operator.itemgetter(1))[1]
		threshold = maxS * thresholdP

		#Min Score
		minScore = 0.40
		flag = 0
		if maxS < minScore:
			flag = 1
		# set max number of cats assignable to any text
		catLimit = 4  # change to 3 or less more aggresive model
		# more less the value more aggresive the model

		scoreSort  = sorted(scores.items(), key = operator.itemgetter(1), reverse=True)
		#print(scoreSort)
		cats = []
		f=0

		# to compute topic composition
		totalScore = 0.0
		for s in scoreSort:
			if s[1] != 0.0 and s[1] > threshold:
				totalScore+=s[1]
			else:
				continue

		for s in scoreSort:
			if s[1] != 0.0 and s[1] > threshold:
				f=1
				cats.append([self.Domains[s[0]],(s[1]/totalScore)*100.0])
			else:
				continue

		ret = ""
		if f == 0 or flag == 1: #No Category assigned!
			return ("general")
		else:
			if len(cats) == 1:
				ret = "Category: " + str(cats[0][0]) + "| Composition: " + str(cats[0][1])
			elif len(cats) <= catLimit:
				for tempcat  in cats:
					ret += "Category: " + str(tempcat[0]) + "| Composition: " + str(tempcat[1]) + "\n"
			else:
				# ret = "general" or return top most topic
				ret += "Category: " + str(cats[0][0]) + "| Composition: " + str(cats[0][1]) + "\n"
				remSum = 0.0
				for s in scoreSort[1:]:
					remSum+=s[1]
				ret += "Category: General | Composition: " + str((remSum/totalScore)*100) + "\n"
			self.writer.writerow([ret])
			self.writer.writerow([" "," "])
			self.writer.writerow([" "," "])
			return ret


	def getFineTopicComposition(self,text):

		self.sentenceFineTopics = dict()

		# Min Score for each fine model word
		fineMinScore = 0.35

		# sentScore = []

		scores = dict()
		for i in range(0,len(self.Domains)):
			scores[i] = 0.0
			self.sentenceFineTopics[self.Domains[i]] = defaultdict(float)

		textL = self.prep(text)

		for phrase in textL:
			phrase = phrase.strip()
			try:
				tempDomScore = self.predictCluster(phrase,fineMinScore)
				if tempDomScore == []:
					continue
				#print(tempDomScore[0])
				for iTemp in tempDomScore[3].keys():
					self.sentenceFineTopics[tempDomScore[0]][iTemp] += tempDomScore[3][iTemp]
				if tempDomScore[2] > fineMinScore:
					scores[tempDomScore[1]] += tempDomScore[2]
			except:
				continue
		scoreSort  = sorted(scores.items(), key = operator.itemgetter(1), reverse=True)
		self.writer.writerow([(self.Domains[s[0]],s[1]) for s in scoreSort if s[1] > 0.0])

		thresholdP = 0.40  # This value is in percent
		maxS = max(scores.items(), key = operator.itemgetter(1))[1]
		threshold = maxS * thresholdP

		#Min Score
		minScore = 0.40
		flag = 0
		if maxS < minScore:
			flag = 1
		# set max number of cats assignable to any text
		catLimit = 4  # change to 3 or less more aggresive model
		# more less the value more aggresive the model

		scoreSort  = sorted(scores.items(), key = operator.itemgetter(1), reverse=True)
		#print(scoreSort)
		cats = []
		f=0

		# to compute topic composition
		totalScore = 0.0
		for s in scoreSort:
			if s[1] != 0.0 and s[1] > threshold:
				totalScore+=s[1]
			else:
				continue

		for s in scoreSort:
			if s[1] != 0.0 and s[1] > threshold:
				f=1
				cats.append([self.Domains[s[0]],(s[1]/totalScore)*100.0])
			else:
				continue

		# Filter fine topics
		sentenceFineTopicsCopy = dict()

		for k in self.sentenceFineTopics.keys():
			if self.sentenceFineTopics[k].items():
				#localMAX = max([self.sentenceFineTopics[k][k1] for k1 in self.sentenceFineTopics[k].keys()])
				localMEAN = np.mean([self.sentenceFineTopics[k][k1] for k1 in self.sentenceFineTopics[k].keys()])
				sentenceFineTopicsCopy[k] = defaultdict(float)
				for v in self.sentenceFineTopics[k].keys():
					if self.sentenceFineTopics[k][v] >= localMEAN*0.80:
						sentenceFineTopicsCopy[k][v] = self.sentenceFineTopics[k][v]
		self.sentenceFineTopics = sentenceFineTopicsCopy
		for k in self.sentenceFineTopics.keys():
			self.sentenceFineTopics[k] = OrderedDict(sorted(self.sentenceFineTopics[k].items(), key=lambda x: x[1],reverse = True))
		####

		ret = ""
		if f == 0 or flag == 1: #No Category assigned!
			return ("general")
		else:
			if len(cats) == 1:
				ret = "Category: " + str(cats[0][0]) + " | Composition: " + str(cats[0][1]) + "\n"
				localSUM = sum([self.sentenceFineTopics[cats[0][0]][k] for k in self.sentenceFineTopics[cats[0][0]].keys()])
				ret += "Finer Category Compositions:\n"
				for fineT in self.sentenceFineTopics[cats[0][0]].keys():
					ret += fineT + " -> " + str((self.sentenceFineTopics[cats[0][0]][fineT]/localSUM)*100) +";\n"
			elif len(cats) <= catLimit:
				for tempcat  in cats:
					ret += "Category: " + str(tempcat[0]) + " | Composition: " + str(tempcat[1]) + "\n"
					localSUM = sum([self.sentenceFineTopics[tempcat[0]][k] for k in self.sentenceFineTopics[tempcat[0]].keys()])
					ret += "Finer Category Compositions:\n"
					for fineT in self.sentenceFineTopics[tempcat[0]].keys():
						ret += fineT + " -> " + str((self.sentenceFineTopics[tempcat[0]][fineT]/localSUM)*100) +";\n"
			else:
				# ret = "general" or return top most topic
				ret += "Category: " + str(cats[0][0]) + " | Composition: " + str(cats[0][1]) + "\n"
				localSUM = sum([self.sentenceFineTopics[cats[0][0]][k] for k in self.sentenceFineTopics[cats[0][0]].keys()])
				ret += "Finer Category Compositions:\n"
				for fineT in self.sentenceFineTopics[cats[0][0]].keys():
					ret += fineT + " -> " + str((self.sentenceFineTopics[cats[0][0]][fineT]/localSUM)*100) +";\n"
				remSum = 0.0
				for s in scoreSort[1:]:
					remSum+=s[1]
				ret += "Category: General | Composition: " + str((remSum/totalScore)*100) + "\n"
			self.writer.writerow([ret])
			self.writer.writerow([" "," "])
			self.writer.writerow([" "," "])
			return ret

if __name__ == "__main__":
	# #Check
	m = Modeler()
	print(m.getTopicComp("the noodles was spicy "))
	print(m.getFineTopicComposition("the vodka was awesome"))
	# print(m.getFineTopicComposition("hi   trying set conner 3184 quantum 80at drive   have\nthe conner set master  quantum set slave  doesn t work\nthe around    able access drives boot \nfloppy  drives boot themselves   running msdos 6  and\nhave conner partitioned primary dos  formatted system\nfiles   tried types setups  changed ide\ncontroller cards   boot floppy   except\nthe booting       system doesn t report error message anything \njust hangs there   suggestions  else\nrun similar problem   thinking update bios\non drives  is possible     suggestions answers be\ngreatly appreciated   please reply to"))
	print(m.getTopicComp("the fish tastes better"))
#TODO
# -Scores check from models
# -reconstruct models with fine clsuter
# use phrases.bin
# -stopwords check (reduce list)
# -do a analysis of results
# -define a different scoring mechansim
# -build all vecs cluster (with all seeds, and last level seeds)
# -build topics composition(%)
# way to return fine topics (ask for granuarity level)
# -Repeated seeds

# Sentiment
# - improve the clustering mechanism
# Genarate topic wise senti composition
# with fine/coarse topics and their senti scores

'''
OLD Code
vec = self.model[phrase]
fineD = self.index2word[self.finestCluster.predict(np.array(vec))[0]]
print(fineD)
domain = self.seed2Domain[fineD.replace(" ","_")]
cosSim = self.model.similarity(fineD,phrase)
print(self.Domains[domain])
if cosSim > fineMinScore:
	scores[domain] += cosSim
'''
