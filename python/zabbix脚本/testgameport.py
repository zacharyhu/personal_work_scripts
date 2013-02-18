#    @zacharyhu 
#   2013.01.22


import socket,sys,re


HOST = sys.argv[1]
PORT = sys.argv[2]
s = None
timeout = 8
socket.setdefaulttimeout(timeout)
#--non blocking
#s.setblocking(0)
#print HOST + ' -- PORT :' + PORT
for res in socket.getaddrinfo(HOST, PORT, socket.AF_UNSPEC, socket.SOCK_STREAM):
    af, socktype, proto, canonname, sa = res
    try:
        s = socket.socket(af, socktype, proto)
    except socket.error as msg:
        s = None
        continue
    try:
        s.connect(sa)
    except socket.error as msg:
        #print "error here connect"
	#print msg
        s.close()
        s = None
        continue
    break
if s is None:
    #print 'could not open socket'
    #sys.exit(1)
    online = '-1'
#s.sendall('Hello, world')
else:
    try:
#--non blocking
        #s.setblocking(0)
        #s.sendall('Hello, world')
        data = s.recv(1025)
        if not data:
            print "no data"
            online = '-1'
        else:
            #get online data such as online="119/216"
            p = re.compile('online=\"[0-9]{1,3}/?[0-9]{0,3}\"')
            p_num = re.compile('[0-9]{1,3}')
            #print p.findall(data)
            online = p_num.findall(p.findall(data)[0])[0]
        s.close()
    except socket.error as msg:
        #print "error here time out"
        #print msg
        online = '-1'        
    

#print 'Received', repr(data)
print online
