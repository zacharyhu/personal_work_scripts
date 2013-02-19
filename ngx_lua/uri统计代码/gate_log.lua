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
            
            local args = ngx.req.get_uri_args()
            local uri = ngx.var.uri
            local match_login = ngx.re.match(uri,"/gate_[0-9a-zA-Z]{1,10}/login")
            local match_gamestart1 =  ngx.re.match(uri,"/gate_[0-9a-zA-Z]{1,10}/gameAdd")
            local match_gamestart2 =  ngx.re.match(uri,"/gate_[0-9a-zA-Z]{1,10}/[a-zA-Z]{1,5}ameWarrant.action")


            if  match_login then    --login logs.
                local stbid 
                for k,v in pairs(args) do
                       index = string.lower(k)
                       if index == "stbid" then
                          stbid = v
                       end
                end 
                if not stbid then   --if no stbid found return
                     return
                end
                remote_ip = ngx.var.remote_addr    
                tablename = "gp_gate_login_recent"
                local match_uri = ngx.re.match(uri,"gate_[0-9a-zA-Z]{1,10}")
                if match_uri then --ifno match gate return
            --     ngx.say("no match")
            --      ngx.say("match ",type(match_uri))
            ---      for i,u in pairs(match_uri) do
            --         ngx.say("i: ",i," u: ",u)
            --      end
                   uri = match_uri[0]
                   values = " set gate_uri=\""..uri.."\",stbid=\""..stbid.."\",remote_ip=\""..remote_ip.."\""
                else
                    return
                end   
            elseif match_gamestart1   then    --new game platform uri
                 tablename = "gp_game_click_recent"
                 local gameid = args.game
                 if not gameid then
                     return
                 end 
                 local match_uri = ngx.re.match(uri,"gate_[0-9a-zA-Z]{1,10}")
                 if match_uri then
                     uri = match_uri[0]
                   values = " set gate_uri=\""..uri.."\",gameid=\""..gameid.."\""
                else
                    return
                end
            elseif match_gamestart2   then   --old game platform uri
                 tablename = "gp_game_click_recent"
                 local gameid = args.gameId
                 if not gameid then
                     return
                 end
                 local match_uri = ngx.re.match(uri,"gate_[0-9a-zA-Z]{1,10}")
                 if match_uri then
                     uri = match_uri[0]
                   values = " set gate_uri=\""..uri.."\",gameid=\""..gameid.."\""
                else
                    return
                end
            else
                return
            end


           insert_sql = "insert into "..tablename..values
--           ngx.say("uri is :",uri)
--           ngx.say("table name : ",tablename)
--           ngx.say("values : ",values)
--           ngx.say("sql :" ,insert_sql)
           local res, err, errno, sqlstate =
               db:query(insert_sql)
               --db:query_insert(tablename,set_sql)
            if not res then
                ngx.say("bad result: ", err, ": ", errno, ": ", sqlstate, ".")
                return
            end

--            ngx.say(res.affected_rows, " rows inserted into table process ",
--                   "(last insert id: ", res.insert_id, ")")

            local ok, err = db:set_keepalive(0, 200)
            if not ok then
                ngx.say("failed to set keepalive: ", err)
                return
            end



return
