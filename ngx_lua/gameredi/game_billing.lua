
local args = ngx.req.get_uri_args()
if not args.userid  or args.userid == "" then
    ngx.say('[{"returnCode":"1","ErrorCode":"1011","ReturnMessage":"参数缺失,userid 不能为空"}]')
    return
end

if not args.lobbyid  or args.lobbyid == "" then
    ngx.say('[{"returnCode":"1","ErrorCode":"1011","ReturnMessage":"参数缺失,lobbyid 不能为空"}]')
    return
end

if not args.cpcode  or args.cpcode == "" then
    ngx.say('[{"returnCode":"1","ErrorCode":"1011","ReturnMessage":"参数缺失,cpcode 不能为空"}]')
    return
end

if not args.deductfee  or args.deductfee == "" then
    ngx.say('[{"returnCode":"1","ErrorCode":"1011","ReturnMessage":"参数缺失,deductfee 不能为空"}]')
    return
end

if not args.actionid  or args.actionid == "" then
    ngx.say('[{"returnCode":"1","ErrorCode":"1011","ReturnMessage":"参数缺失,actionid 不能为空"}]')
    return
end

----add redis cache
local function billing(userid,lobbyid,deductfee,cpcode,actionid)
    local gate_list = {}
    gate_list['101'] = {}
    gate_list['101'].ip ="10.48.179.103"
    gate_list['101'].port=7604
    gate_list['104'] = {}
    gate_list['104'].ip ="10.48.179.122"
    gate_list['104'].port=7505
   
    local sock = ngx.socket.tcp()
    sock:settimeout(5000)
    --ngx.say(gate_list[lobbyid].ip," ip ,, ",gate_list[lobbyid].port )
    local ok,err = sock:connect(gate_list[lobbyid].ip,gate_list[lobbyid].port)
    if not ok then
        ngx.say("failed to connect to the uinfo server")
    end

    send_data = "<package>"
        .."<request service=\"CP_DEDUCT_1000\">"
        .."<user userid=\""..userid.."\" deductfee=\""..deductfee.."\" cpcode=\""..cpcode.."\" pwd=\"123456\" action=\""..actionid.."\">"
        .."</user>"
        .."</request>"
        .."</package>\r\n.\r\n"
    
    local bytes,err = sock:send(send_data)
    local reader = sock:receiveuntil("\r\n.\r\n")
    local data,err,partial = reader()
    if not data then 
        local err_msg = "request failed "..err
        ngx.say('[{"returnCode":"1","ErrorCode":"1010","ReturnMessage":'..err_msg..'}]')
        --ngx.say("failed to read the data stream :",err)
       -- result = '-1'
       -- return result
    end

    --ngx.say("success read line : ",data)
    --data format: "<package><response service="CP_DEDUCT_1000" state="-ERR" code="1005" ><user userid="2519273" deductfee="200" cpcode="400"></user></response><package>"
    local tbl_res = {}
    for k,v in string.gmatch(data,"(%w+)=\"([-_%w]+)") do
         tbl_res[k] = v
    end
    
    return tbl_res
end


----- 注册接口   gate_register(args.stbid,args.lobbyid)

local res = billing(args.userid,args.lobbyid,args.deductfee,args.cpcode,args.actionid)
local cjson = require "cjson"
ngx.say(cjson.encode(res))
