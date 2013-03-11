import socket,redis_push
s=socket.socket( socket.AF_INET, socket.SOCK_STREAM )
s.bind(('0.0.0.0',7001))
s.listen(5)
while True:
    cs,address = s.accept()
    print 'got connected from',address
    cs.send('<connect success!>')
    ra=cs.recv(1024)
    print ra
    real_dic=eval(ra)
    if real_dic['appname'] == None or not real_dic['appname']:
        print "no appname give"
        pass
    else:
        queue_name = real_dic['appname']
        
    redis_push.push_data(queue_name,real_dic)
    cs.close()
