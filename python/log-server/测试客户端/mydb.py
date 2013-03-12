# -*- coding: utf-8 -*-
import MySQLdb,sys


def insert_into_error(dict_data):
    try:
        conn=MySQLdb.connect(host="127.0.0.1",user="ngx_test",passwd="ngx_test",db="ngx_test",charset="utf8")  
    except Exception,e:
        print e
        #sys.exit()
    cursor = conn.cursor()    
    #print type(dict_data)
    if not  dict_data["appname"]:
        print "no appname exit"
        return
        #sys.exit()
    else:
        appname=dict_data["appname"]

        
    if not dict_data["time"]:
        log_time="1970/01/01 00:00:00"
    else:
        log_time=dict_data["time"]
    
    if not dict_data["error_code"]:
        error_code="000000"
    else:
        error_code=dict_data["error_code"]

    if not dict_data["error_type"]:
        error_type="no type"
    else:
        error_type=dict_data["error_type"]

    if not dict_data["error_msg"]:
        error_msg="no msg"
    else:
        error_msg=dict_data["error_msg"]

        
    #print appname+log_time+error_code+error_type+error_msg
    sql_create = '''CREATE TABLE IF NOT EXISTS gs_log_err_%s (
      `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id 唯一编号',
      `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '记录时间',
      `error_code` int(10) NOT NULL COMMENT '错误代码',
      `error_type` varchar(20) NOT NULL COMMENT '错误类型',
      `error_msg` varchar(250) NOT NULL COMMENT '错误信息',
      PRIMARY KEY (`id`),
      KEY `log_time` (`log_time`,`error_code`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='错误日志记录表%s' AUTO_INCREMENT=1 ;'''
    #print (sql_create % ('game101','game101'))

    #查询    
    try:
        n = cursor.execute("select count(*) from gs_log_err_%s" % appname)
        for row in cursor.fetchall():    
            for r in row:    
                print r
        #print "secc"
    except Exception,e:
        print e
        if e[0]==1146:
            print "table not exist,now create.."
            n = cursor.execute(sql_create,(appname,appname))    
            print n
        #else:
            #sys.exit()
       
    #写入    
    sql = "insert into gs_log_err_"+appname+"(log_time,error_code,error_type,error_msg) values(%s,%s,%s,%s);"   
    param = (log_time,error_code,error_type,error_msg)
    print (sql % param)
    n = cursor.execute(sql,param)
    #print n
    if n == 1:
        n_commit=cursor.execute("commit;")
        #print n_commit

 

    #关闭    
    conn.close() 

def get_appname_list():
    try:
        conn=MySQLdb.connect(host="127.0.0.1",user="ngx_test",passwd="ngx_test",db="ngx_test",charset="utf8")  
    except Exception,e:
        print e
        #sys.exit()
    cursor = conn.cursor()
    try:
        n = cursor.execute("select distinct appname from gs_log_err_appname_cfg" )
        for row in cursor.fetchall():
            return row
            #for r in row:    
                #print r
        #print "secc"
    except Exception,e:
        print e
