# Author : Satish Palaniappan
__author__ = "Satish Palaniappan"

import pickle
import sys
from scoreScaler import scorer
from SocialFilter.Twokenize.twokenize import *
### Insert Current Path
import os, sys, inspect
cmd_folder = os.path.realpath(os.path.abspath(os.path.split(inspect.getfile(inspect.currentframe()))[0]))
if cmd_folder not in sys.path:
	sys.path.insert(0, cmd_folder)
import re

class extractor(object):

	def __init__(self):
		self.SentiModel = self.load_obj("_model")
		self.ch2 = self.load_obj("_feature_selector")
		self.vectorizer = self.load_obj("_vectorizer")
		self.Scorer = scorer(1.0)

	def load_obj(self,name):
	    with open(cmd_folder + "/food/"+ name + '.pkl', 'rb') as f:
	        return pickle.load(f)

	def simpleProcess(self,text):
		text = text.lower().strip()
		line = re.sub(Url_RE,"",text)
		line = re.sub(r"[@#]","",line)
		line =u" ".join(tokenize(line))
		return line

	def getSentimentScore(self,review_text):

		# Calculating the sentiments
		vec = self.vectorizer.transform([self.simpleProcess(review_text)])
		Tvec = self.ch2.transform(vec)
		predScore = self.SentiModel.predict(Tvec)

		scaledScore = self.Scorer.scaleScore(predScore)

		return scaledScore

# #### TEST
# S = extractor()
# message = "The juice was not cold"
# print(S.getSentimentScore(message))
