# -*- coding: utf-8 -*-
import socket,ora_user,datetime
bind_port=8001
s=socket.socket( socket.AF_INET, socket.SOCK_STREAM )
s.bind(('0.0.0.0',8001))
s.listen(1024)
print "server port: "+str(bind_port)
while True:
    cs,address = s.accept()
    print 'got connected from',address
    try:
        #cs.send('<connect success!>')
        ra=cs.recv(1024)
        if not ra:
            print "no result give!"
        else:
            print ra
            try:
                dict_ra=eval(ra)
                if dict_ra['stbid'] == None or not dict_ra['stbid']:
                    print "no stbid given "
                    pass
                else:
                    stbid=dict_ra['stbid']
                    local_time=datetime.datetime.today().strftime('%Y-%m-%d %H:%M:%S')
                    print local_time+" the stbid is: "+stbid
                    num = ora_user.get_user_from_ora(stbid)
                    print num
                    #str_send = eval(num)
                    #print str_send
                    cs.send(str(num)+"  \r\n-@@-")
            except Exception,e:
                print e
    except Exception,e:
        print e
    cs.close()
