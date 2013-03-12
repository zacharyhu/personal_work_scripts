local args = ngx.req.get_uri_args()

so_data="{\"appname\":\""..args.appname.."\",\"error_code\":\"1111\","
         .."\"error_type\":\"user_error\",\"error_msg\":\"error message\","
         .."\"time\":\""..ngx.localtime().."\"}"
ngx.say(so_data)

local sock = ngx.socket.tcp()
sock:settimeout(15000)
-----发送连接并接受welcome包-----------
--    t={}
local i=0
while i<100 do
    local ok,err = sock:connect("192.168.111.11",7001)
    if not ok then
        ngx.say("failed to connect to 7001",err)
--              t.con="0"
        return
    end

  local bytes, err = sock:send(so_data)
--local reader = sock:receive()
--local data, err, partial = reader()
--    if not data then
--        ngx.say("failed to read a line: ", err)
--        return
--    end
--    ngx.say("successfully read a line: ", data)
  -- ngx.say("send over")

   sock:close()
   i = i+1
end
