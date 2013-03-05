
local db_query = require "resty.db_query"
local cjson = require "cjson"

--local res = db_query.query_data("insert","insert into sgs_user set id='123456',grade='0',create_time='2013-03-05 16:49:08',order_time='1362473348',order_second='1296000'")
ngx.req.read_body()
             local args = ngx.req.get_post_args()
             if not args.uid then
                 local res = {errcode="-7",msg="there is no uid"}
                 ngx.say(cjson.encode(res))
                 return
             end
             if not args.qtype then
                 local res = {errcode="-8",msg="there is no qtype"}
                 ngx.say(cjson.encode(res))
                 return
             end 
             --for k,v in pairs(args) do
             --    ngx.say("k: ",k," v: ",v)
             --end 
             local uid = args.uid
             local qtype = args.qtype
             local grade = args.grade or "0"
             local order_second = args.sec or "1296000"
             
             local query_type,sql
               
             if qtype == "insert" then
                  query_type = qtype
                  sql =  string.format("insert into sgs_user set id=%s,grade=%s,create_time=%s,order_time=%s,order_second=%s",ngx.quote_sql_str(uid),ngx.quote_sql_str(grade),ngx.quote_sql_str(ngx.localtime()),ngx.quote_sql_str(ngx.time()),ngx.quote_sql_str(order_second))
             elseif qtype == "select_single" then
                  query_type = "select"
                  sql =  string.format("select t1.grade,(select count(*)+1  from sgs_user where grade>t1.grade) as rank,t1.order_time,t1.order_second,(t1.order_time+t1.order_second-%d) as order_last from sgs_user t1 where id=%s",ngx.time(),ngx.quote_sql_str(uid))
             elseif qtype == "select_top" then
                  query_type = "select"
                  if not args.topnum then
                      topnum = 10
                  else
                      topnum = args.topnum
                  end
                  sql =  string.format("select id,grade from sgs_user order by grade desc limit %d",topnum)
                  
             elseif qtype == "update_grade" then
                   query_type = "update"
                   if not args.grade then
                       ngx.say("there is miss grade")
                       return
                   end 
                   sql = string.format("update sgs_user set grade =grade+%d,update_time =%s  where id=%s",args.grade,ngx.quote_sql_str(ngx.localtime()),ngx.quote_sql_str(uid))
             elseif qtype == "update_order" then
                  query_type = "update"
                  sql =  string.format("update sgs_user set order_time=%d,order_second=order_time+order_second-%d+%d where id=%s",ngx.time(),ngx.time(),order_second,ngx.quote_sql_str(uid))
             else 
                 local res = {errcode="-11",msg="qtype not pemisson!"}
                 ngx.say(cjson.encode(res))
                 return
             end     
             --ngx.say(sql)
--local res = db_query.query_data("select","select id,create_time,order_time from  sgs_user where 1 order by order_time")
local res = db_query.query_data(query_type,sql)

if not res or res.msg ==nil or res.msg =="{}" then
   res = {errcode="-10",msg=" no res"}
   ngx.say(cjson.encode(res))
   return 
end
ngx.say(cjson.encode(res))  
--ngx.say(type(res))
--for k,v in pairs(res) do
--    ngx.say("k: ",k," v:",v)
--end
