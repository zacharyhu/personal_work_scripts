
local cjson = require "cjson"
t={a = { a= "1",b="2"},b= {c="3",d="4"}}

for key,val in pairs(t) do
	if type(val) == "table" then
		--ngx.say(key ,":",table.concat(val," ,"))
		res = ngx.location.capture(
     			   '/test3',
		  {args = val }--,
    		)
		if res.status == 200 then
                    ngx.print(res.body)
                end
	else
		ngx.say(key, " : ",val)
	end
end
