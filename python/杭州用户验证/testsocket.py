import socket

s=socket.socket()
#s.connect(('10.48.179.103',7601))
s.connect(('10.48.179.99',8001))
#data='<package><request service="CP_DEDUCT_1000"><user stbid="11040050111052544C25C105" userid="265478" deductfee="1000" cpcode="502" pwd=""></user></request></package>\r\n.\r\n'
data='{"stbid":"11040050111052544C25C105"}'
s.send(data)
data_recv=s.recv(512)
s.close()
print data_recv
print "socket end "
