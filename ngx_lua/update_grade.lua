local sock = ngx.socket.tcp()
local cjson = require "cjson"
sock:settimeout(15000)
-----发送连接并接受welcome包-----------
    t={}
local ok,err = sock:connect("10.48.179.99",9101)
if not ok then
	ngx.say("failed to connect to 9101",err)
	t.con="0"
	return
end
--ngx.say("successfully connected to the game data center..... ")

----更新用户积分-----------------
local args=ngx.req.get_uri_args()
if not args.uid  or not args.gid then
	ngx.say('uid or gameid could not be empty')
	t.arg="0"
	return
end
local uid = args.uid
local gid = args.gid 
local grade = args.grade or '0'
local esc = args.esc or '0'

local soupdatedata =string.format("<request service=\"GPGameData_1001\">"
		.."<user userid=\"%s\" gameid=\"%s\"></user>"
		.."<game coin=\"\" grade=\"%s\" win=\"\" lose=\"\" standoff=\"\" escape=\"%s\" playnum=\"\"></game>"
		.."</request> \r\n.\r\n",uid,gid,grade,esc)

--ngx.say("start send soupdatedata")
local bytes, err = sock:send(soupdatedata)
local reader = sock:receiveuntil("\r\n.\r\n")
local data, err, partial = reader()
    if not data then
        ngx.say("failed to read a line: ", err)
        return
    end
    --ngx.say("The USER "..uid.." in game "..gid.." changes successfully. read a  result line: ", data)
    for k,v in string.gmatch(data,"(%w+)=\"([%w%+]+)\"") do
        t[k]=v
        --ngx.say("key "..k.." :value "..v)
    end
	if t.state ~= "+OK" then
		ngx.say("not change successfully~~")
		t.success="0"
         ngx.say(cjson.encode(t))
		return
	end
	--ngx.say(t["state"])
    
local sodata = "<request service=\"GPGameData_1000\">"
                .."<user userid=\""..args.uid.."\" gameid=\""..args.gid.."\"></user>"
                .."</request>"
                .."\r\n.\r\n"	

local bytes, err = sock:send(sodata)
local reader = sock:receiveuntil("\r\n.\r\n")
local data, err, partial = reader()
    if not data then
        ngx.say("failed to read a line: ", err)
        return
    end
    --ngx.say("successfully read a line: ", data)
	t.success="1"
    for k,v in string.gmatch(data,"(%w+)=\"([%w%-]+)\"") do
	t[k]=v
	--ngx.say("key "..k.." :value "..v)
    end

	local cjson = require "cjson"
         ngx.say(cjson.encode(t))

sock:close()
