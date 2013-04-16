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
    ngx.say("sucess checked user info : ",table_data.result)
    sock:close()
    result = '1'
    return result
end

local function check_tz_user_info(stbid)
    local http = require "resty.http"
    local hc = http.new()
    local soap_data="<?xml version=\"1.0\" encoding=\"UTF-8\"?><soapenv:Envelope xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\"><soapenv:Body><ns3:ossRequest xmlns:ns3=\"http://webservice.ei.web.boss.huashu.com\"><requestParam xmlns=\"\"><encryptInfo xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:nil=\"1\"></encryptInfo><extendInfo xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:nil=\"1\"></extendInfo><requestContent>&lt;SpRequestDTO SpCode=\"huashusp\" UserId=\""..stbid.."\"/&gt;</requestContent><requestNo>7003</requestNo><requestSystemNo>7</requestSystemNo><versionNo>0</versionNo></requestParam></ns3:ossRequest></soapenv:Body></soapenv:Envelope>"
    local ok,code,headers,status,body = hc:request {
        url = "http://125.210.225.165/boss/services/External2Oss", --webservice addr
        method = "POST", --post data
        headers =  { ["Content-Type"] = "text/xml;charset=utf-8",["SOAPAction"]= "http://ws.external.boss.huashu.com/External2Oss/ossRequestRequest",["User-Agent"] = "Axis2" },
        body = soap_data
    }
    if ok == 1  and code == 200 then
        ngx.say("request sucess")
        ngx.say(body)
        local table_result = {}
        for k,v in string.gmatch(body,"(%w+)=&quot;(%w+)") do
            table_result[k] = v
            --ngx.say("k :",k," v:",v)
        end
        if table_result.ReturnCode == "0" then
            result = '1'
            ngx.say(" check user in tz webservice success ")
            return result
        end
        local result = '-1' --user not exsit or webservice return not match
        return result
    end

    local result = '-2'  --request no success
    return result

end

local count = check_hz_user_info(args.stbid)
if count == '1' then
    ngx.say( "HZ user check suc!")
    return count
end
local check_tz = check_tz_user_info(args.stbid)
if check_tz == '1' then     --check tz first
    ngx.say( " tz user check success ")
    local count = '2'
    return count  --if user exist then return ,no need to check hz boss
end
--if tz boss check faild then check hz boss
ngx.say("USER check failed:",count)
local count = '-1'
return count
