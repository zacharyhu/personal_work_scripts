import cx_Oracle
def get_user_from_ora(stbid):
    try:
        new_conn = cx_Oracle.connect("zzdepart","zz#wasu","REPORTDB")
    except Exception,e:
        print e
    sql = ('select * from rep.subscriberview t where t.resource_no = \'%s\'' % stbid)
    #print sql
    cur = new_conn.cursor()
    try:
        cur.execute(sql)
        result = cur.fetchone()
        count = cur.rowcount
        re_data = '{"count":"'+str(count)+'","result":"'+str(result)+'"}'
        return re_data
    finally:
        cur.close()
        new_conn.close()

