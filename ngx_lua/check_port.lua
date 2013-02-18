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

            --ngx.say("connected to mysql.")
            ----执行游戏服务端ip port端口查询                
	    local sql_items="select item_id,item_name,item_host,item_port,item_game_id from monitor_moniter_port_list where item_on_check=1"
	    res_items, err, errno, sqlstate =
                db:query(sql_items)
            if not res_items then
                ngx.say("bad result: ", err, ": ", errno, ": ", sqlstate, ".")
                return
            end
            
            
            --ngx.say("result: ", cjson.encode(res_items))
            t_times={}
            t_times=cjson.encode(res_items)
	    for key, val in pairs(res_items) do
            	    if type(val) == "table" then
			--判断是否游戏服务端
			--if val.item_game_id ~= '0' then
                    		res = ngx.location.capture(
     			   		'/game_port_check',
		  			{args = val }--,
    				)
				local check_time= os.date("%Y/%m/%d %H:%M")
				if res.status == 200 then
                    			--ngx.print(res.body)
					t1={}
					t1=cjson.decode(res.body)
					--ngx.say(type(t1))
					--把res.body返回的table与传参合并
					t1.item_id=val.item_id
					t1.item_name=val.item_name
					t1.item_host=val.item_host
					t1.item_port=val.item_port
					t1.item_game_id=val.item_game_id
					t1.check_time=check_time
					if t1.online then
						t_online={}
						for  w in string.gmatch(t1.online,"%w+") do
						       table.insert(t_online,w)
						end
						t1.cur_online=t_online[1]
						t1.max_online=t_online[2]
					end
					ngx.say(cjson.encode(t1))
				------对返回值 t1 进行插入数据库和redis操作
				--
                    			res2 = ngx.location.capture(
     			   			'/insert_port_status',
		  				{args = t1 }--,
    					)
					if res2.status == 200 then
						ngx.say(res2.body)
					else
						ngx.say(res2.status)
					end
				        		
				else 
					ngx.say(res.status)
                		end
			--else
                        --        ngx.say("other port class")
			--end
			--for k, v in pairs(val) do
                    	--	if type(v) == "table" then
                        --	ngx.say(k, " --table : ", table.concat(v, ", "))
                    	--	else
                        --	ngx.say(k, ": ", v)
                    	--	end
            		--end
            	    else
               		ngx.say(key, ": ", val)
            	    end
            end
	    
