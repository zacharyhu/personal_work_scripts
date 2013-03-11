import sys ,mydb
from redis import Redis 
redis = Redis(host='192.168.111.10', port=6379) 
while True: 
    res = redis.rpop('game101') 
    if res == None: 
        pass 
    else: 
        print str(res)
        res_dic = eval(res)
        mydb.insert_into_error(res_dic)
