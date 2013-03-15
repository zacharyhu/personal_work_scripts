local args = ngx.req.get_uri_args()
so_data="{\"appname\":\""..args.appname.."\",\"error_code\":\"1111\","
         .."\"error_type\":\"user_error\",\"error_msg\":\"error message\","
         .."\"time\":\""..ngx.localtime().."\"}"
local function send_sock()
    local sock = ngx.socket.tcp()
    sock:settimeout(15000)
    local ok,err = sock:connect("127.0.0.1",7001)
    if not ok then
        ngx.say("failed to connect to 7001",err)
        return
    end

  local bytes, err = sock:send(so_data)
   local ok, err = sock:setkeepalive(0,100)
      if not ok then
          ngx.say("failed to keepalive ",err)
      end
   --sock:close()
end


for i =1,20 do
    ngx.thread.spawn(send_sock)
end 
