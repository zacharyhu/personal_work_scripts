


local args = ngx.req.get_uri_args()
if not args.stbid  or args.stbid == "" then
    ngx.say('[{"returnCode":"1","ErrorCode":"1011","ReturnMessage":"参数缺失,stbid 不能为空"}]')
    return
end

if not args.lobbyid  or args.lobbyid == "" then
    ngx.say('[{"returnCode":"1","ErrorCode":"1011","ReturnMessage":"参数缺失,lobbyid 不能为空"}]')
    return
end

local function gate_register(stbid,lobbyid)
    local gate_list = {}
    gate_list['101']='http://10.48.179.101:8080/gate_hz/apply'
    gate_list['104']='http://10.48.179.101:8080/gate_hz/apply'
    --ngx.say(" tz gate addr : ",gate_list[lobbyid]," stbid:  ",stbid)
    local http = require "resty.http"
    local hc  = http.new()
    
    local url_req = gate_list[lobbyid].."?stbId="..args.stbid

    --ngx.say(url_req)
    local ok,code,headers,status,body = hc:request {
          url = url_req, -- lobby url
          method = "GET",
          timeout = 8000,
    }  
   
    --ngx.say(ok)
    --ngx.say(code)
    if code == 200 then
        res_string=body
        local cjson = require "cjson"
        t_res=cjson.decode(res_string)
        t_res["lobbyid"] = lobbyid
        return cjson.encode(t_res)
    end
    local t_res = {}
    t_res = '{"returnCode":"1","ErrorCode":"1010","ReturnMessage":"注册请求失败"}'
    return t_res

--    return result
end


local res = gate_register(args.stbid,args.lobbyid)
--local cjson = require "cjson"
--ngx.say(cjson.encode(res))
ngx.say(res)

