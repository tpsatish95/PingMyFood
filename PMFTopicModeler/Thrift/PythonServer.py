port = 9092

### Insert Current Path
import os, sys, inspect
cmd_folder = os.path.realpath(os.path.abspath(os.path.split(inspect.getfile(inspect.currentframe()))[0]))
if cmd_folder not in sys.path:
	sys.path.insert(0, cmd_folder)

import sys
# your gen-py dir
sys.path.append(cmd_folder +'/gen-py')
import time

# Example files
from Topics import *
from ttypes import *

# Thrift files
from thrift.transport import TSocket
from thrift.transport import TTransport
from thrift.protocol import TBinaryProtocol
from thrift.server import TServer
sys.path.append("../")
import Predict_RHKDomain
from collections import defaultdict
import operator

# Server implementation
class TopicsHandler:
	def __init__(self):
		self.m = Predict_RHKDomain.Modeler()

	def getTrending(self,inp):
		Trend = defaultdict(int)
		for i in inp.split("|"):
			print(i)
			print(self.m.getTopicComp(i))
			for j in self.m.getTopicComp(i).split("|"):
				Trend[j] += 1
		out = ""
		sorted_Trend = sorted(Trend.items(), key=operator.itemgetter(1), reverse = True)

		for k in sorted_Trend:
			out =  "||".join([out,str(k[0]) + "|" + str(k[1])])

		return out


handler = TopicsHandler()
processor = Topics.Processor(handler)
transport = TSocket.TServerSocket(port = port)
tfactory = TTransport.TBufferedTransportFactory()
pfactory = TBinaryProtocol.TBinaryProtocolFactory()

# set server
server = TServer.TThreadedServer(processor, transport, tfactory, pfactory)

print ('Setting up server')
server.serve()
