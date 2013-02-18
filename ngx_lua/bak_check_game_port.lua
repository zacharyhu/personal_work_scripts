local cjson = require "cjson"
local mysql = require "resty.my"
            local db, err = mysql:new()
            if not db then
                ngx.say("failed to instantiate mysql: ", err)
                return
            end

            db:set_timeout(1000) -- 1 sec
            local ok, err, errno, sqlstate = db:connect()
            if not ok then
                ngx.say("failed to connect: ", err, ": ", errno, " ", sqlstate)
                return
            end

            ngx.say("connected to mysql.")
            ----执行游戏服务端ip port端口查询                
	    local sql_items="select item_id,item_name,item_host,item_port from monitor_moniter_port_list where item_on_check=1 and item_game_id!=0"
	    res_items, err, errno, sqlstate =
                db:query(sql_items)
            if not res_items then
                ngx.say("bad result: ", err, ": ", errno, ": ", sqlstate, ".")
                return
            end
            
            
            ngx.say("result: ", cjson.encode(res_items))
            t_times={}
            t_times=cjson.encode(res_items)
	    for key, val in pairs(res_items) do
            	    if type(val) == "table" then
                    	ngx.say(key, " --table : ", table.concat(val, ", "))
			for k, v in pairs(val) do
                    		if type(v) == "table" then
                        	ngx.say(k, " --table : ", table.concat(v, ", "))
                    		else
                        	ngx.say(k, " --no tables : ", v)
                    		end
            		end
            	    else
               		ngx.say(key, ": ", val)
            	    end
            end
	    

--socket开启
local sock = ngx.socket.tcp()
sock:settimeout(15000)
-----发送连接并接受welcome包-----------
    t={}
local ok,err = sock:connect("10.48.179.117",8605)
if not ok then
	ngx.say("failed to connect to 8605",err)
	t.con="0"
	return
end
--ngx.say("successfully connected to the game data center..... ")

local args=ngx.req.get_uri_args()
--ngx.say("start send soupdatedata")
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
	--if t.state ~= "+OK" then
	--	ngx.say("not change successfully~~")
	--	t.success="0"
         ngx.say(cjson.encode(t))
	--	return
	--end
	--ngx.say(t["state"])

	--t.success="1"


sock:close()
