import time, os  
  
filename = 'access_20090602.log'  
file = open(filename,'r')  
  
st_size = os.stat(filename)[6]  
file.seek(st_size)  
  
while 1:  
    where = file.tell()  
    line = file.readline()  
    if not line:  
        time.sleep(1)  
        file.seek(where)  
    else:  
        if 'article' in line:  
            print line