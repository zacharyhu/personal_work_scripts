import socket,redis_push
s=socket.socket( socket.AF_INET, socket.SOCK_STREAM )
s.bind(('0.0.0.0',7001))
s.listen(5)
while True:
    cs,address = s.accept()
    print 'got connected from',address
    try:
        cs.send('<connect success!>')
        ra=cs.recv(1024)
        if not ra:
            print "no result give!"
        else:
            print ra
            try:
                real_dic=eval(ra)
                if real_dic['appname'] == None or not real_dic['appname']:
                    print "no appname give"
                    pass
                else:
                    queue_name = real_dic['appname']
                    redis_push.push_data(queue_name,real_dic)
            except Exception,e:
                print e
    except Exception,e:
        print e
    cs.close()
