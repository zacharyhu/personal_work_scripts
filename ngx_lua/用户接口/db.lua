
local db_query = require "resty.db_query"

--local res = db_query.query_data("insert","insert into sgs_user set id='123456',grade='0',create_time='2013-03-05 16:49:08',order_time='1362473348',order_second='1296000'")
ngx.req.read_body()
             local args = ngx.req.get_post_args()
             if not args.uid then
                 ngx.say("there is no uid")
                 return
             end
             local uid = args.uid
             local grade = args.grade or "0"
             local order_second = args.sec or "1296000"
             local sql = string.format("insert into sgs_user set id=%s,grade=%s,create_time=%s,order_time=%s,order_second=%s",ngx.quote_sql_str(uid),ngx.quote_sql_str(grade),ngx.quote_sql_str(ngx.localtime()),ngx.quote_sql_str(ngx.time()),ngx.quote_sql_str(order_second))
             ngx.say(sql)
--local res = db_query.query_data("select","select id,create_time,order_time from  sgs_user where 1 order by order_time")
local res = db_query.query_data("insert",sql)

if not res then
   ngx.say("not res")
   return
end
ngx.say(type(res))
for k,v in pairs(res) do
    ngx.say("k: ",k," v:",v)
end
