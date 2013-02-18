
local mysql = require "resty.mysql"
            local db, err = mysql:new()
	    --local id = ngx.var.arg_id
	    --local pid = ngx.var.arg_pid
	    --local pcpu = ngx.var.arg_pcpu	    
	    --local pmem = ngx.var.arg_pmem
	    --local pnum = ngx.var.arg_pnum
	    --local pconum = ngx.var.arg_pconum 
	    local id = "0"
	    local pid = "0"
	    local pcpu = "0"
	    local pmem = "0"
	    local pnum = "0"
	    local pconum = "0"
            
            local args = ngx.req.get_uri_args()
	    local id = args.id
            local pid = args.pid
            local pcpu = args.pcpu
            local pmem = args.pmem
            local pnum = args.pnum
            local pconum = args.pconum
	    --for key,val in pairs(args) do
	    --if type(val) == "table" then
	    --		ngx.say(key, " : ",table.concat(val, ", "))
	    --	else
	    -- 	   ngx.say(key,": ",val)
	    --	   local key = val
	    --	end
	    --end
		

            if not db then
                ngx.say("failed to instantiate mysql: ", err)
                return
            end

            db:set_timeout(1000) -- 1 sec

            local ok, err, errno, sqlstate = db:connect{
                host = "10.48.179.112",
                port = 3306,
                database = "gp_platform",
                user = "dc",
                password = "dc",
                max_packet_size = 1024 * 1024 }

            if not ok then
                ngx.say("failed to connect: ", err, ": ", errno, " ", sqlstate)
                return
            end

            ngx.say("connected to mysql.")
            local sql = ("insert into monitor_check_process_status(process_id,local_process_id,process_cpu,process_mem,process_threads_num,process_conn_num)  "
		.. "values (\'" .. id ..
                                        "\',\'".. pid ..
                                        "\',\'".. pcpu..
                                        "\',\'".. pmem..
                                        "\',\'".. pnum..
                                        "\',\'".. pconum..
                                        "\')"
		.. "on duplicate key update local_process_id=\'".. pid ..
					"\',process_cpu=\'".. pcpu..
					"\',process_mem=\'".. pmem..
					"\',process_threads_num=\'"..pnum..
					"\',process_conn_num=\'".. pconum..
					"\'")
	    --local sql = ("insert into monitor_check_process_status(process_id,local_process_id,process_cpu,process_mem,process_threads_num,process_conn_num) "
            --             .. "values (\'" .. id ..
            --                            "\',\'".. pid ..
            --                            "\',\'".. pcpu..
            --                            "\',\'".. pmem..
            --                            "\',\'".. pnum..
            --                            "\',\'".. pconum..
            --                            "\')"
            --            )

            res, err, errno, sqlstate =
                db:query(sql)
            if not res then
                ngx.say("bad result: ", err, ": ", errno, ": ", sqlstate, ".")
                return
            end

            --ngx.say(res.affected_rows, " rows inserted into table process ",
              --      "(last insert id: ", res.insert_id, ")")

           -- res, err, errno, sqlstate =
           --     db:query("select * from monitor_check_process_status  order by id asc")
           -- if not res then
           --     ngx.say("bad result: ", err, ": ", errno, ": ", sqlstate, ".")
           --     return
           -- end

            --local cjson = require "cjson"
            --ngx.say("result: ", cjson.encode(res))

	    local ok, err = db:set_keepalive(0, 100)
            if not ok then
                ngx.say("failed to set keepalive: ", err)
                return
            end
