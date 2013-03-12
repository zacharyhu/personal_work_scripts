# -*- coding: utf-8 -*-
import sys ,mydb,time
from redis import Redis 
redis = Redis(host='10.48.179.115', port=6379) 
while True:
    list_app=mydb.get_appname_list()
    for r in list_app:
        res = redis.rpop(r) 
        if res == None: 
            pass 
        else: 
            print str(res)
            res_dic = eval(res)
            mydb.insert_into_error(res_dic)
    
