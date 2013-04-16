
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

local count = check_hz_user_info(args.stbid)
if count == '1' then
    args.code = 571
    args.city = 1436
    --for k,v in pairs(args) do
    --    ngx.say("k : ",k," v: ",v)
    --end 
    ngx.req.set_uri_args(args)
    ngx.req.set_uri("/gate_hdtv/login",true)
    --ngx.say( "HZ user check suc!")
    --return count
end

args.stbId = args.stbid
ngx.req.set_uri_args(args)
ngx.req.set_uri("/gate_yun/login",true)
--ngx.say( "TZ jump to TZgate!")



