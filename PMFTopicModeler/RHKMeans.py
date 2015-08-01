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



import numpy as np
from sklearn import cluster, datasets, preprocessing
import pickle
import gensim
from collections import defaultdict
import time
import sys
import pyprind
import logging
import operator
logging.basicConfig(level=logging.INFO)
import Kmeans_l1
# ## Monkey Patch#(ensure cosine dist function is used)
from sklearn.metrics.pairwise import cosine_similarity
# def new_euclidean_distances(X, Y=None, Y_norm_squared=None, squared=False):
#     return cosine_similarity(X,Y)

# from sklearn.cluster.k_means_ import euclidean_distances
# euclidean_distances = new_euclidean_distances

'''
Do the above as W2V works on Cosine Distances
'''


def save_obj(obj, name ):
    with open( name + '.pkl', 'wb') as f:
        pickle.dump(obj, f,  protocol=2)

def load_obj(name ):
    with open( name + '.pkl', 'rb') as f:
        return pickle.load(f)
# path = "./PhraseKMeans/"
# path = "./KMeans/"
# Changed the Cluster Seeds (removed science and added medicine and space)
# path = "./20newsGrpF/"
path = "./PMFTopicCluster/"
# # The RHK-Means Tree object
# class TreeNode(object):
#     def __init__(self,dat):
#         self.branches = None
#         self.data = dat

# Pretrained W2V vectors
# model = gensim.models.Word2Vec.load_word2vec_format('vectorPhrase.bin', binary=True)
model = gensim.models.Word2Vec.load_word2vec_format('vectors.bin', binary=True,norm_only = True)

# print(len(np.mean(model[["office","products"]],axis=0)))
# print(model["water"])
allseeds = []
words = []
for word in model.vocab:
    allseeds.append(tuple(model[word]))
    words.append(word)
# allseeds = np.array(allseeds)
print("Vectors Loaded.")

# cat = ["camera_photo","cell_phones","computer_videogames","electronics_technology","software","dvd","movie","video","apparel","automotive","baby","beauty","food","grocery","jewelry_watches","kitchen_housewares","magazines","musical_instruments","office_products","outdoor_living","sports_outdoors","tools_hardware","toys_games","health_care","services","books","hotels_bars","music_albums","places","restaurants","travel_tour"]
# cat = ['computer','vehicles','sports','electronics','science','religion','politics']
# cat = ['computer','vehicles','sports','electronics','medicine','space','religion','politics']
# cat = sorted(['atheism','graphics','os','computer','sale','autos','motorcycles','baseball','hockey','crypt','electronics','medicine','politics','religion','space','mideast','guns'])
cat = sorted(['vegetarian' , 'meat food', 'italian food','chinese cuisine','spanish cuisine','beverages','indian cuisine'])
print(str(len(cat)) + " Loaded Categories.")
save_obj(cat,path+"Domains")

# # Initalize the Tree
# root = TreeNode("Topic Model Root")
# root.branches = []
# for c in cat:
#     root.branches.append(TreeNode(c))


#Exmaple
#print(model.most_similarP("happy birthday".split(),topn = 40))

init_seeds = []
for c in cat:
    try:
        init_seeds.append(tuple(model[c]))
    except:
        init_seeds.append(tuple(model[c.replace("_"," ")]))
    # add phrases to all seeds
    if c not in words:
        words.append(c)
        try:
            allseeds.append(tuple(model[c]))

        except:
            allseeds.append(tuple(model[c.replace("_"," ")]))

print("InitSeeds Loaded.")

# init curVecs
curVecs = allseeds

'''
Degree Analyzer (Chooses best granularity)
'''
closer = dict()
numSeeds = ""
for d in range(5,11): # 5 to 10 seeds per cluster
    t = len(init_seeds)
    mv = len(model.vocab)
    numInter = 0
    while t < len(model.vocab):
        numSeeds = t
        numInter += 1
        #print(t)
        mv -= t
        t = t*d
    closer[d] = abs((mv/numSeeds) - d)
    #print(str(degree) + "  " + str(numInter))

#Propose algo above#
degree = sorted(closer.items() , key = operator.itemgetter(1))[0][0]
print(str(degree) + " closest points per cluster")
# print(degree)
catSeeds = dict()
for i in range(0,len(cat)):
    catSeeds[cat[i]] = i

Rseeds = init_seeds

t = len(Rseeds)
mv = len(model.vocab)
numInter = 0
while t < mv:
    numInter += 1
    mv -= t
    t = t*degree

#save_obj(init_seeds,path + "init_seeds")
#save_obj(allseeds,path + "allseeds")


threshold = len(Rseeds)
mv = len(model.vocab)
level = 1
while threshold < mv:
    # KMeans
    print()
    print()
    print(str(numInter) + " more iterations left ...")
    print()
    t0 = time.time()

    curVecs = list(set(curVecs) - set(Rseeds))

    #L2# kmeans = cluster.KMeans(n_clusters=len(Rseeds), init=np.array(Rseeds), max_iter = 1)
    #kmeans.fit(np.array(curVecs))
    centers , xtoc , distances = Kmeans_l1.kmeans(np.array(curVecs), np.array(Rseeds), maxiter=1, metric='cosine')
    #print(kmeans)
    print(str(time.time()-t0))
    #print("Level "+ str(level) + "\nIntertia  = " + str(kmeans.inertia_))
    print("Level "+ str(level) + " Done.")
    kmeans = [centers,xtoc]
    save_obj(kmeans,path+"Level"+str(level))

    print("Mapping Centroids to Labels")
    centroid2Word = dict()
    for c in Rseeds:
        w = words[allseeds.index(tuple(c))]
        centroid2Word[Rseeds.index(c)] = w
    save_obj(centroid2Word,path+"Level"+str(level)+"c2w")

    print()

    print("Computing the next level of seeds")
    temp = []
    #transform = kmeans.transform(np.array(curVecs))
    transform = distances
    # Vec to closest center mapping from transform
    distPart = sorted(zip(range(0,transform.shape[0]),np.argmax(transform, axis = 1),np.amax(transform,axis = 1)), key = operator.itemgetter(1,2), reverse = True)
    distPartDict = defaultdict(list)
    for i in distPart:
        distPartDict[i[1]].append(i[0])

    transform = [] # Memory
    distances = [] # Memory

    #print(xtoc)
    # ProgressBar setup
    my_prbar = pyprind.ProgBar(len(Rseeds))
    for index,cent in enumerate(Rseeds):
        # d = transform[:, index]
        # ind = np.argsort(d)[::-1][:degree]
        ind = distPartDict[index][:degree]
        #print(ind)
        #print(d[ind])
        newSeeds = np.array(curVecs)[ind]

        temp.extend((tuple(n) for n in newSeeds))
        #print([words[allseeds.index(tuple(n))] for n in newSeeds])

        curSeed = catSeeds[words[allseeds.index(tuple(cent))]]
        #print(curSeed)
        for new in newSeeds:
            catSeeds[words[allseeds.index(tuple(new))]] = curSeed

        # update Progressbar
        my_prbar.update()

    save_obj(catSeeds,path+"seed2Domain")

    # Rseeds.extend(temp)
    # Next Level of seeds (ONLY)
    Rseeds = temp
    # print(len(temp))

    # Increasing the Threshold
    mv -= threshold
    threshold = threshold*degree
    level += 1
    numInter -= 1

# All seeds generated

# # build seed to domain map
# seed2Domain = dict()
# for Is in init_seeds:
#     temp = catSeeds[Is]
#     for t in temp:
#         seed2Domain[t] = Is


# catSeeds = load_obj(path+"seed2Domain")
# fine seeds
# index2word = dict()
# fineSeeds = []
# for i,j in zip(catSeeds.keys(),range(0,len(catSeeds.keys()))):
#     try:
#         fineSeeds.append(model[i])
#         index2word[j] = i
#     except:
#         fineSeeds.append(model[i.replace("_"," ")])
#         index2word[j] = i.replace("_"," ")

# save_obj(fineSeeds,path+"index2vec")
# save_obj(index2word,path+"index2word")

# l1 = load_obj(path + "Level1")[0]
# l2 = load_obj(path + "Level2")[0]
# l3 = load_obj(path + "Level3")[0]
# l4 = load_obj(path + "Level4")[0]
# catSeeds = load_obj(path + "seed2Domain")

# Sseeds = list(l1)+list(l2)+list(l3)+list(l4)
# Sseeds = [tuple(t) for t in Sseeds]

# Rseeds = []
# for k in catSeeds.keys():
#     try:
#         Rseeds.append(tuple(model[k]))
#     except:
#         Rseeds.append(tuple(model[k.replace("_"," ")]))
# Rseeds = list(set(Rseeds) - set(Sseeds))


# Perform final finest level K-Means
print("Building Finest Cluster")
t0 = time.time()
# kmeans = cluster.KMeans(n_clusters=len(Rseeds), init=np.array(Rseeds), max_iter = 1)
# curVecs and Rseeds intialized
curVecs = list(set(curVecs) - set(Rseeds))
centers , xtoc , distances = Kmeans_l1.kmeans(np.array(curVecs), np.array(Rseeds), maxiter=1, metric='cosine')
distances = [] # save memory
#print(kmeans)
# kmeans.fit(np.array(curVecs))
print(str(time.time()-t0))

#print("Finest Level Intertia  = " + str(kmeans.inertia_))
print("Finest Level Intertia Done.")
kmeans = [centers,xtoc]
save_obj(kmeans,path + "Levelf")
print("\n")

print("Mapping Centroids to Labels")
centroid2Word = dict()
for c in Rseeds:
    w = words[allseeds.index(tuple(c))]
    centroid2Word[Rseeds.index(c)] = w
save_obj(centroid2Word,path+"Levelfc2w")
print()


# # Perform K-Means clustering with allseeds & allvecs
print("Building allseeds and allvecs Cluster")

print("Getting all seeds")
Rseeds = []
for k in catSeeds.keys():
    try:
        Rseeds.append(model[k])
    except:
        Rseeds.append(model[k.replace("_"," ")])
t0 = time.time()
# kmeans = cluster.KMeans(n_clusters=len(Rseeds), init=np.array(Rseeds), max_iter = 1)
centers , xtoc , distances = Kmeans_l1.kmeans(np.array(allseeds), np.array(Rseeds), maxiter=1, metric='cosine')
distances = [] # Memory
#print(kmeans)
# kmeans.fit(np.array(curVecs))
print(str(time.time()-t0))

#print("Finest Level Intertia  = " + str(kmeans.inertia_))
print("Allseeds and allvecs Cluster Done.")
kmeans = [centers,xtoc]
save_obj(kmeans,path + "LevelAll")
print("\n")

print("Mapping Centroids to Labels")
centroid2Word = dict()
for c in Rseeds:
    w = words[allseeds.index(tuple(c))]
    centroid2Word[Rseeds.index(c)] = w
save_obj(centroid2Word,path+"LevelALLc2w")
print()



print("Vecs to Word Map building")
vec2word = dict()
for k in catSeeds.keys():
    try:
        vec2word[tuple(model[k])] = (k , catSeeds[k])
    except:
        vec2word[tuple(model[k.replace("_"," ")])] = (k ,catSeeds[k])

save_obj(vec2word,path + "vec2_word_Index")

'''
### Computing next level of seeds
for Is in init_seeds:
    tempSeeds = set()
    for seedT in catSeeds[Is]:
        temp = model.most_similarP(seedT.split(),topn = degree)
        for t in temp:
            tempSeeds.add(t[0])
    catSeeds[Is] = catSeeds[Is].union(tempSeeds)
    Rseeds = Rseeds.union(tempSeeds)


############ Modified __getitem__
def __getitem__(self, word):
        """
        Return a word's representations in vector space, as a 1D numpy array.

        Example::

          >>> trained_model['woman']
          array([ -1.40128313e-02, ...]

        """
        if len(word.split()) > 1:
            mean = []
            for w in word.split():
                if w in self.vocab:
                    mean.append(self.syn0norm[self.vocab[w].index])
                else:
                    raise KeyError("word '%s' not in vocabulary" % w)
            mean = matutils.unitvec(array(mean).mean(axis=0)).astype(REAL)
            return mean
        else:
            return self.syn0[self.vocab[word].index]

####ADDED IN Word2Vec of Gensim
def most_similarP(self, wordsL, topn=10):
    """
    Find the top-N most similar words/phrases

    """
    self.init_sims()

    # compute the weighted average of all words
    all_words, mean = set(), []
    for word in wordsL:
        if word in self.vocab:
            mean.append(self.syn0norm[self.vocab[word].index])
            all_words.add(self.vocab[word].index)
        else:
            raise KeyError("word '%s' not in vocabulary" % word)
    if not mean:
        raise ValueError("cannot compute similarity with no input")
    mean = matutils.unitvec(array(mean).mean(axis=0)).astype(REAL)

    dists = dot(self.syn0norm, mean)
    best = argsort(dists)[::-1][:topn + len(all_words)]
    # ignore (don't return) words from the input
    result = [(self.index2word[sim], float(dists[sim])) for sim in best if sim not in all_words]
    return result[:topn]
'''
