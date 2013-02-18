		--------建立mysql 连接-------
local cjson = require "cjson"
local mysql = require "resty.my"
local redis = require "resty.redis"
--local red_result={}
local failed_times
local args = ngx.req.get_uri_args()
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
	   
	   if not args.success then
			ngx.say("no success found ")
			return
		end
        --redis 存入数据table
		--red_result.item_name = args.item_id
		--red_result.item_name = args.item_name
		--red_result.time = os.date("%Y/%m/%d %H:%M:%S")
		--red_result.port = args.item_port
		-----如果监控结果为-1 测表示端口打开失败
	   if  args.success == "-1" then			
			--red_result.status = '-1'
			 failed_times="check_status=0,failed_times=failed_times+1"	   
	   else		--端口监控返回success为1，打开成功   
			 failed_times="check_status=1,failed_times=0"



			--被监控端口是游戏端口，则插入游戏监控表
			if  args.item_game_id ~= '0' then 		   		    --[[{"personTime":"12646","max_online":"32","coin":"20000","serverID":"13015","timeout":"5","item_name":"4.3三英战吕布","cur_online":"0","item_host":8615,"item_game_id":315,"online":"0\/32","state":"+OK","item_id":103	5,"gameID":"253","success":"1"}]]
				--for key, val in pairs(args) do
				--   if type(val) == "table" then
				--      ngx.say(key, ": ", table.concat(val, ", "))
				--  else
				--      ngx.say(key, ": ", val)
				--  end
				--end
				
				
				local sql_game = "insert into monitor_check_game_status set item_id=\'"..args.item_id.."\',"
						--.."item_game_id=\'"..args.item_game_id.."\',"
						--.."item_name=\'"..args.item_name.."\',"
						--.."item_host=\'"..args.item_host.."\',"
						--.."item_port=\'"..args.item_port.."\',"
						.."cur_online=\'"..args.cur_online.."\',"
						.."serverID=\'"..args.serverID.."\',"
						.."gameID=\'"..args.gameID.."\',"
						.."personTime=\'"..args.personTime.."\',"
						.."check_time=\'"..args.check_time.."\'"
				   ngx.say("sql_game :: "..sql_game)
				   db:query("SET NAMES utf8")
					res, err, errno, sqlstate =
							db:query(sql_game)
					
					if not res then
						ngx.say("bad result: ", err, ": ", errno, ": ", sqlstate, ".")
						return
					end
					ngx.say("insert game data successfully")
			       --red_result.gameid =args.gameID
				   --red_result.online =args.cur_online
				   --red_result.personTime = args.personTime
			       --ngx.say (red_result ,"  args:",args.cur_online)
		    --red_result.status = '0' 
			end
		end
		
		---插入状态数据
		
		local find_sql = "select count(*) as count from monitor_check_port_status where item_id=\'"..args.item_id.."\'"
		res, err, errno, sqlstate =
               db:query(find_sql)
			--ngx.say("set sql: "..set_sql)
                --db:query_insert(tablename,set_sql)
            if not res then
                ngx.say("bad result: ", err, ": ", errno, ": ", sqlstate, ".")
                return
            end
		--ngx.say("count num is ::  "..cjson.encode(res))
		--ngx.say(type(res))
		--ngx.say(res[1].count)
		
		local sql
		if res[1].count == '0' then  --没有这个item_id就插入
		sql = "insert into monitor_check_port_status set item_id=\'"..args.item_id.."\',"
						.."item_name=\'"..args.item_name.."\',"
						.."item_host=\'"..args.item_host.."\',"
						.."item_port=\'"..args.item_port.."\',"
						..failed_times		
		else
		--有则更新
		sql = "update monitor_check_port_status set "
						.."item_name=\'"..args.item_name.."\',"
						.."item_host=\'"..args.item_host.."\',"
						.."item_port=\'"..args.item_port.."\',"
						.."check_last_time=\'"..os.date("%Y/%m/%d %H:%M:%S").."\',"
						..failed_times
						.." where item_id=\'"..args.item_id.."\'"
		end
			ngx.say(" port status sql :"..sql)
			db:query("SET NAMES utf8")
		    res, err, errno, sqlstate =
               db:query(sql)
			--ngx.say("set sql: "..set_sql)
                --db:query_insert(tablename,set_sql)
            if not res then
                ngx.say("bad result: ", err, ": ", errno, ": ", sqlstate, ".")
                return
            end
			ngx.say("insert port status successfully")
		

	    local ok, err = db:set_keepalive(0, 200)
            if not ok then
                ngx.say("failed to set keepalive: ", err)
                return
            end

            --redis insert 
            local red = redis:new()
            red:set_timeout(1000) -- 1 sec
	    local ok, err = red:connect("127.0.0.1", 6379)
            if not ok then
                ngx.say("failed to connect: ", err)
                return
            end

            ok, err = red:set(args.item_id,cjson.encode(args))
            if not ok then
                ngx.say("failed to set ",args.item_id, err)
                return
            end
