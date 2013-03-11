import socket,time
s=socket.socket()
s.connect(('127.0.0.1',7001))   
data=s.recv(512)
now = time.strftime("%Y/%m/%d %H:%M:%S")
data = '{"appname":"game101","err_code":"10001","error_name":"app_error","error_msg":" some error message here","time":"'+now+'"}'
s.send(data)
s.close()
print 'the data received is',data
