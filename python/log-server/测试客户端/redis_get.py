import sys 
from redis import Redis 
redis = Redis(host='10.48.179.115', port=6379) 
while True: 
    res = redis.rpop('game101') 
    if res == None: 
        pass 
    else: 
        print str(res)
        res_dic = eval(res)
