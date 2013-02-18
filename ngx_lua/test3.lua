            ngx.req.read_body()
            local args = ngx.req.get_uri_args()
            for key, val in pairs(args) do
                if type(val) == "table" then
                    ngx.say(val, " ----table ---: ", table.concat(key, ", "))
                else
                    ngx.say(key, " -- : -- ", val)
                end
            end
