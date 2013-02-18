import urllib, urllib2,time,os
filename = '/usr/local/nginx/logs/gate_access.log'
file = open(filename,'r')

st_size = os.stat(filename)[6]  
print st_size
print os.stat(filename)
file.seek(st_size)
  
while 1:  
    where = file.tell()  
    line = file.readline()  
    if not line:  
        time.sleep(1)  
        file.seek(where)  
    else:  
        if '/gate_xj/login' in line:  
            print line

