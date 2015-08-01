port = 9091

### Insert Current Path
import os, sys, inspect
cmd_folder = os.path.realpath(os.path.abspath(os.path.split(inspect.getfile(inspect.currentframe()))[0]))
if cmd_folder not in sys.path:
	sys.path.insert(0, cmd_folder)

import sys
# your gen-py dir
sys.path.append(cmd_folder +'/gen-py')
sys.path.append("../")
import time

# Example files
from Senti import *
from ttypes import *

# Thrift files
from thrift.transport import TSocket
from thrift.transport import TTransport
from thrift.protocol import TBinaryProtocol
from thrift.server import TServer
from review import extractor
from collections import defaultdict
import operator
import numpy

# Server implementation
class SentiHandler:
	def __init__(self):
		self.e = extractor()

	def getSentiment(self,inp):
		senti = []
		for i in inp.split("|"):
			senti.append(self.e.getSentimentScore(i))
		return str(numpy.mean(senti))


handler = SentiHandler()
processor = Senti.Processor(handler)
transport = TSocket.TServerSocket(port = port)
tfactory = TTransport.TBufferedTransportFactory()
pfactory = TBinaryProtocol.TBinaryProtocolFactory()

# set server
server = TServer.TThreadedServer(processor, transport, tfactory, pfactory)

print ('Senti Serever Running!')
server.serve()
