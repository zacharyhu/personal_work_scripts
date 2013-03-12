# -*- coding: utf-8 -*-
import socket,time
while True:
    s=socket.socket()
    s.connect(('127.0.0.1',7001))   
    data=s.recv(512)
    now = time.strftime("%Y/%m/%d %H:%M:%S")
    data = '{"appname":"castellan_105","error_code":"10001","error_type":"app_error","error_msg":"用户信息查询失败！！！","time":"'+now+'"}'
    s.send(data)
    s.close()
    print 'the data received is',data
    time.sleep(1)
