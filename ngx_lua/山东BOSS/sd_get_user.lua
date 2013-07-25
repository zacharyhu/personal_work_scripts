local args_get = ngx.req.get_uri_args() 
ngx.req.read_body()
local args_post = ngx.req.get_post_args()
local cjson = require 'cjson'

local return_table = {}
return_table.returnCode = "1"
return_table.returnMessage = "未知错误"

local mysql = require 'resty.my'
local db,err = mysql:new()
if not db then
    --ngx.say("failed to instant")
        return_table.returnCode = "1"
        return_table.returnMessage = "数据库初始化失败"
        ngx.say(cjson.encode(return_table))
    return 
end
db:set_timeout(1000)
local ok, err, errno, sqlstate = db:connect()
if not ok then
        --ngx.say("failed to connect: ", err, ": ", errno, " ", sqlstate)
    return_table.returnCode = "1"
    return_table.returnMessage = "数据库连接失败"
    ngx.say(cjson.encode(return_table))
    return 
end
   
if not args_post.stbId then
    return_table.returnCode = "1"
    --return_table_sel.value = args_post or "{}"
    return_table.returnMessage = "Post 参数缺少stbId, 必要参数的值"
    ngx.say(cjson.encode(return_table))
        return
end
      
local op_sql = string.format("select count(t.equipment_id) as count_no,t.* from gp_sd_user_info t where equipment_id=%s",ngx.quote_sql_str(args_post.stbId))
local res, err, errno, sqlstate = db:query(op_sql)
    if not res or res == "" or type(res) ~= "table" then
        return_table.returnCode = "1"
    	--return_table.value = args_post or "{}"
    	return_table.returnMessage = err or "db 操作失败"
    	ngx.say(cjson.encode(return_table))
    	return
    end
    if res[1].count_no == "0"  then
        return_table.returnCode = "1"
    	--return_table.value = args_post or "{}"
    	return_table.returnMessage =  "无此机顶盒记录"
    	ngx.say(cjson.encode(return_table))
    	return
    end
    return_table.returnCode = "0"
    --return_table_sel.value = args_post or {}
    return_table.returnMessage = "查询成功"
    --local test = return_table+res[1]
    table.foreach(res[1], function(i,v) return_table[i]=v end)
    --table.foreach(res, function(i,v) return_table_sel[i]=v end)
    --ngx.say(cjson.encode(return_table))
 --   ngx.say(cjson.encode(return_table))
local ok, err = db:set_keepalive(0, 200)
    if not ok then
        return_table.returnCode = "0"
        return_table.returnMessage = "failed to set keepalive: "..err
        ngx.say(cjson.encode(return_table))
    return 
    end
ngx.say(cjson.encode(return_table))
