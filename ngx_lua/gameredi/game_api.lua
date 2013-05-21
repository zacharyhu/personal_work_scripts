
local args = ngx.req.get_uri_args()
if not args.stbid  or args.stbid == "" then
   ngx.say("no stbid given")
   return
end

local function check_hz_user_info(stbid)
    local sock = ngx.socket.tcp()
    sock:settimeout(5000) --5seconds timeout
    local ok,err = sock:connect("10.48.179.99",8001)
    if not ok then
        ngx.say("failed to connect to the uinfo server")
    end
    send_data = "{\"stbid\":\""..stbid.."\"}"
    local bytes,err = sock:send(send_data)
    local reader = sock:receiveuntil("-@@-") --end mark
    local data,err,partial = reader()
    if not data then 
        ngx.say("failed to read the data stream :",err)
        result = '-1'
        return result
    end
--ngx.say("success read line : ",data)
--ngx.say(type(data))
    local cjson = require "cjson"
--ngx.say(type(cjson.encode(data)))
    table_data = cjson.decode(data)
--ngx.say(" type ",type(table_data))
    if table_data.count == "0" then
        result = '-1'
        return result
    end
    --ngx.say("sucess checked user info : ",table_data.result)
    sock:close()
    result = '1'
    return result
end

----add redis cache
local function redis_do_result(stbid,action)
    local redis = require "resty.redis"
    local red = redis.new()

    red:set_timeout(1000)

    local ok,err = red:connect("127.0.0.1",6379)
    if not ok then
        ngx.say("failed to connect...",err)
        result = '-1'
        return result 
    end
    
    if action == 0 then --1.get the stbid key's value
       local res,err = red:get(stbid)
       if not res or res == ngx.null then
           red_result = '-1'  --no result
           return red_result
       end
       --ngx.say("k: ",stbid," v :",res)  --user check mark
       return res
    end
    if action == 1 then --set stbid key's value
       ok, err = red:set(stbid,"1")
            if not ok then
                ngx.say("failed to set action 1",stbid , err)
                return
            end
    end
    if action == 2 then --set stbid key's value
       ok, err = red:set(stbid,"2")
            if not ok then
                ngx.say("failed to set action 2 ",stbid , err)
                return
            end
    end
    local ok, err = red:set_keepalive(0, 100)
            if not ok then
                ngx.say("failed to set keepalive: ", err)
                return
            end

 
end

local check_red = redis_do_result(args.stbid,0)
local count --mark user 
if not check_red or check_red == "-1" then  --get result from redis failed or key not exsit
    local check_hz = check_hz_user_info(args.stbid)  --doing stb check in api
    if check_hz == '1' then  --hz check suc!
        redis_do_result(args.stbid,1)  --set redis key
    else
        redis_do_result(args.stbid,2)
    end
    count = check_hz
else
    count = check_red    --check user from redis
end

args.count = count
if count == '1' then
    args.lobbyid = 101
    --for k,v in pairs(args) do
    --    ngx.say("k : ",k," v: ",v)
    --end 
    ngx.req.set_uri_args(args)
    --ngx.req.set_uri("/gate_hdtv/login",true)
    ngx.req.set_uri("/hz_gate",true)
    --ngx.say( "HZ user check suc!")
end
args.stbId = args.stbid
ngx.req.set_uri_args(args)
--ngx.req.set_uri("/gate_yun/login",true)
ngx.req.set_uri("/tz_gate",true)
--ngx.say( "TZ jump to TZgate!")



    --for k,v in pairs(args) do
    --    ngx.say("k : ",k," v: ",v)
    --end 
