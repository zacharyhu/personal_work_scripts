# -*- coding: utf-8 -*-
import sys ,mydb,time
from redis import Redis 
redis = Redis(host='10.224.33.247', port=6379) 
while True:
    list_app=mydb.get_appname_list()
    #if type(list_app) <> 'list':
    #    print "list app not  a list"
    #    #list_app=eval(list_app)
    #    print type(list_app)
    #else:
    for r in list_app:
        print r
        res = redis.rpop(r) 
        if res == None: 
            pass 
        else: 
            print str(res)
            res_dic = eval(res)
            mydb.insert_into_error(res_dic)
    time.sleep(1)
