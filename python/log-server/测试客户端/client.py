import socket,time
while True:
    s=socket.socket()
    s.connect(('127.0.0.1',7001))   
    data=s.recv(512)
    now = time.strftime("%Y/%m/%d %H:%M:%S")
    data = '{"appname":"game101","error_code":"10001","error_type":"app_error","error_msg":" some error message here","time":"'+now+'"}'
    s.send(data)
    s.close()
    print 'the data received is',data
    time.sleep(1)
