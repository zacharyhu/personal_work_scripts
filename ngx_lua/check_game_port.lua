local cjson = require "cjson"
local args = ngx.req.get_uri_args()
--socket开启
local sock = ngx.socket.tcp()
sock:settimeout(15000)
-----发送连接并接受welcome包-----------
    t={}
local ok,err = sock:connect(args.item_host,args.item_port)
if not ok then
	ngx.say("failed to connect to "..args.port,err)
	t.success="0"
	return
end

--ngx.say("successfully connected to the game data center..... ")

--ngx.say("start send soupdatedata")
--如果是游戏服务器则收welcome包，否则直接组装成功
if args.item_game_id ~= "0" then
local reader = sock:receiveuntil("\r\n.\r\n")
local data, err, partial = reader()
    if not data then
        ngx.say("failed to read a line: ", err)
        return
    end
     ---ngx.say(data)
    for k,v in string.gmatch(data,"(%w+)=\"([%w%+/]+)\"") do
        t[k]=v
        --ngx.say("key "..k.." :value "..v)
    end
	if t.state ~= "+OK" then
		ngx.say("not change successfully~~")
		t.success="0"
		--return
	else 
		t.success="1"
	end
else
     t.success="1"
end

	--ngx.say(t["state"])

	--t.success="1"
--ngx.print(args.item_host.."     host...aaaa..."..args.item_port)

ngx.say(cjson.encode(t))
sock:close()
