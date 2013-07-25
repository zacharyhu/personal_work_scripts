local args_get = ngx.req.get_uri_args() 
ngx.req.read_body()
local args_post = ngx.req.get_post_args()
local cjson = require 'cjson'

local return_table = {}
return_table.value = "{}"
return_table.status = "false"
return_table.description = "未知错误"

if not args_get.op then
   return_table.status = "false"
   return_table.value = "no op value given"
   return_table.description = "缺少 Op 参数"
   ngx.say(cjson.encode(return_table))
   return
end

local mysql = require 'resty.my'
local db,err = mysql:new()
if not db then
    --ngx.say("failed to instant")
        return_table.status = "false"
        return_table.value = "{}"
        return_table.description = "数据库初始化失败"
        ngx.say(cjson.encode(return_table))
    return 
end
db:set_timeout(1000)
local ok, err, errno, sqlstate = db:connect()
if not ok then
        --ngx.say("failed to connect: ", err, ": ", errno, " ", sqlstate)
    return_table.status = "false"
    return_table.value = "{}"
    return_table.description = "数据库连接失败"
    ngx.say(cjson.encode(return_table))
    return 
end

if args_get.op == "OpenUser" then  --open user operation
    if not args_post.customer_id or not args_post.user_id or not args_post.user_name or not args_post.email or not args_post.device_type or not args_post.equipment_id then
        return_table.status = "false"
        return_table.value = args_post or "{}"
        return_table.description = "Post 参数缺少,请检查customer_id,user_id,user_name,email,device_type,equipment_id 必要参数的值"
        ngx.say(cjson.encode(return_table))
        return
    end
    local address_line = args_post.address_line or " "
    local city = args_post.city or " "
    local state_or_province = args_post.state_or_province or " "
    local country = args_post.country or " "
    local postal_code = args_post.postal_code or " "
    local primary_phone = args_post.primary_phone or " "
    local op_sql = string.format("insert into gp_sd_user_info (customer_id,user_id,user_name,email,device_type,equipment_id,address_line,city,state_or_province,country,postal_code,primary_phone) values(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",ngx.quote_sql_str(args_post.customer_id),ngx.quote_sql_str(args_post.user_id),ngx.quote_sql_str(args_post.user_name),ngx.quote_sql_str(args_post.email),ngx.quote_sql_str(args_post.device_type),ngx.quote_sql_str(args_post.equipment_id),ngx.quote_sql_str(address_line),ngx.quote_sql_str(city),ngx.quote_sql_str(state_or_province),ngx.quote_sql_str(country),ngx.quote_sql_str(postal_code),ngx.quote_sql_str(primary_phone))
    
    --ngx.say(op_sql)
    --ngx.say("do some insert db op")
    local res, err, errno, sqlstate = db:query(op_sql)
    if not res then
        return_table.status = "false"
    	return_table.value = args_post or "{}"
        if errno == 1062 then 
             return_table.description = "用户已经存在"
        else
    	     return_table.description = "插入数据异常"
        end
    	ngx.say(cjson.encode(return_table))
     --   ngx.say(errno," : ",err)
    	return
    end
    return_table.status = "true"
    return_table.value = args_post or "{}"
    return_table.description = "用户数据插入成功"
    ngx.say(cjson.encode(return_table))
    return
elseif args_get.op == "UpdateUser" then  --update 操作
    if not args_post.customer_id or not args_post.user_id then
        return_table.status = "false"
        return_table.value = args_post or "{}"
        return_table.description = "Post 参数缺少,请检查customer_id,user_id 必要参数的值"
        ngx.say(cjson.encode(return_table))
        return
    end
    local select_sql = string.format("select count(*) as row_count from gp_sd_user_info where customer_id=%s and user_id=%s",ngx.quote_sql_str(args_post.customer_id),ngx.quote_sql_str(args_post.user_id))   
    local res, err, errno, sqlstate = db:query(select_sql)
          if not res or res[1].row_count ~= "1" then
              return_table.status = "false"
              return_table.value = args_post or "{}"
              return_table.description = "用户未开通或customer_id,user_id不匹配，查不到相关记录"
              ngx.say(cjson.encode(return_table))
              --ngx.say("no res or res not 1")
               --ngx.say(cjson.encode(res))
               return
          end

    local t_update={}
    if args_post.user_name  then
       table.insert(t_update,"user_name="..ngx.quote_sql_str(args_post.user_name))
    end
    if args_post.email  then
       table.insert(t_update,"user_name="..ngx.quote_sql_str(args_post.email))
    end
    if args_post.device_type  then
       table.insert(t_update,"user_name="..ngx.quote_sql_str(args_post.device_type))
    end
    if args_post.equipment_id  then
       table.insert(t_update,"user_name="..ngx.quote_sql_str(args_post.equipment_id))
    end
    if args_post.address_line  then
       table.insert(t_update,"user_name="..ngx.quote_sql_str(args_post.address_line))
    end
    if args_post.city  then
       table.insert(t_update,"user_name="..ngx.quote_sql_str(args_post.city))
    end
    if args_post.state_or_province  then
       table.insert(t_update,"user_name="..ngx.quote_sql_str(args_post.state_or_province))
    end
    if args_post.country  then
       table.insert(t_update,"user_name="..ngx.quote_sql_str(args_post.country))
    end
    if args_post.postal_code  then
       table.insert(t_update,"user_name="..ngx.quote_sql_str(args_post.postal_code))
    end
    if args_post.primary_phone  then
       table.insert(t_update,"user_name="..ngx.quote_sql_str(args_post.primary_phone))
    end
    local op_sql = string.format("update gp_sd_user_info set %s where customer_id=%s and user_id=%s",table.concat(t_update,","),ngx.quote_sql_str(args_post.customer_id),ngx.quote_sql_str(args_post.user_id))
    
    local res, err, errno, sqlstate = db:query(op_sql)
    if not res then
        return_table.status = "false"
    	return_table.value = args_post or "{}"
    	return_table.description = err
    	ngx.say(cjson.encode(return_table))
    	return
    end
    return_table.status = "true"
    return_table.value = args_post or "{}"
    return_table.description = "用户数据更新成功"
    ngx.say(cjson.encode(return_table))
    return

elseif args_get.op == "CloseUser" then
    if not args_post.user_id then
        return_table.status = "false"
        return_table.value = args_post or "{}"
        return_table.description = "Post 参数缺少,user_id 必要参数的值"
        ngx.say(cjson.encode(return_table))
        return
    end
      
    local op_sql = string.format("delete from gp_sd_user_info where user_id=%s",ngx.quote_sql_str(args_post.user_id))
    local res, err, errno, sqlstate = db:query(op_sql)
    if not res then
        return_table.status = "false"
    	return_table.value = args_post or "{}"
    	return_table.description = err or "db 操作失败"
    	ngx.say(cjson.encode(return_table))
    	return
    end
    return_table.status = "true"
    return_table.value = args_post or {}
    return_table.description = "用户注销成功"
    ngx.say(cjson.encode(return_table))
    return
else
    return_table.status = "false"
    return_table.value = args_post or {}
    return_table.description = "操作未被指定，op: "..args_get.op
    ngx.say(cjson.encode(return_table))
    return
end
local ok, err = db:set_keepalive(0, 200)
    if not ok then
        return_table.status = "false"
        return_table.value = "{}"
        return_table.description = "failed to set keepalive: "..err
        ngx.say(cjson.encode(return_table))
    return 
    end
