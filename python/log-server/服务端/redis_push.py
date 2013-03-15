import time 
from redis import Redis 
redis = Redis(host='127.0.0.1', port=6379)


def push_data(appname,queue_data):
    if redis.lpush(appname,queue_data):
        pass
    else :
        print "lpush queue data error "+appname


#while True: 
#    now = time.strftime("%Y/%m/%d %H:%M:%S") 
#    push_data('test_queue', now) 
#    time.sleep(1)  
