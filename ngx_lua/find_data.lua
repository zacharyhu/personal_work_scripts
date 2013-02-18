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
            ----status 查询                -- where item_id=1028 order by  check_time desc limit 30"
	    --local sql_items="select distinct item_id,item_name from monitor_check_game_status" 
	    local sql_items="select distinct t1.item_id as item_id,t2.item_name as item_name from monitor_check_game_status t1,monitor_moniter_port_list t2 where t1.item_id=t2.item_id)" 
	    res_items, err, errno, sqlstate =
                db:query(sql_items)
            if not res_items then
                ngx.say("bad result: ", err, ": ", errno, ": ", sqlstate, ".")
                return
            end
			
			--ngx.say(type(cjson.encode(res_items)))
			--ngx.say(type(res_items))
         --ngx.say(cjson.encode(res_items))
            --格式[{"item_id":1021},{"item_id":1022},{"item_id":1023},{"item_id":1024}]
			--转格式成["item_id":{1021,1022,1023,1024}]
			local t_itemid={}
			local final_data={}
			for k,v in pairs(res_items) do				
				--res_items[k].item_id --根据item id 获取数据
				local this_item_id=res_items[k].item_name
				--ngx.say(this_item_id)
				local sql_findall ="select cur_online,personTime,check_time from monitor_check_game_status where item_id="..res_items[k].item_id.." and check_time>DATE_ADD(now(),INTERVAL -2 hour) order by check_time "
				--ngx.say(sql_findall)
				res_all, err, errno, sqlstate =
                db:query(sql_findall)
				if not res_all then
					ngx.say("bad result: ", err, ": ", errno, ": ", sqlstate, ".")
					return
				end
				local t_online,t_check_time,t_personTime={},{},{}
				for key,val in pairs(res_all) do
					t_online[key]=res_all[key].cur_online
					t_check_time[key]=res_all[key].check_time
					t_personTime[key]=res_all[key].personTime
				end
				final_data[k]={item_id=this_item_id,cur_online=t_online,check_time=t_check_time,personTime=t_personTime}
			end
			
			--t_itemid={item_id=t_itemid}
			
			ngx.say(cjson.encode(final_data))
			
			
