

module("resty.db_query", package.seeall)
local mysql = require "resty.my"
local cjson = require "cjson"

function query_data(qtype,sql)
    local db,err =mysql:new()
    t={}
    if not db then
         ngx.say("failed to instant")
         t.errcode = "-1"
         t.msg = "db instant err"
         return t
    end
    db:set_timeout(1000)
    local ok, err, errno, sqlstate = db:connect()
    if not ok then
        ngx.say("failed to connect: ", err, ": ", errno, " ", sqlstate)
        t.errcode = "-2"
        t.msg = "db connect err"
        return t
    end

    local res, err, errno, sqlstate = db:query(sql)					
    if not res then
        --ngx.say("bad result: ", err, ": ", errno, ": ", sqlstate, ".")
        t.errcode = "-4"
        t.msg = errno.." "..err
        --.."db query err sql: "..sql.." qtype: "..qtype
        return t
    end
    if qtype == "insert" or qtype == "delete" then
        t.errcode = "0"
        t.msg = "insert game data successfully"
    elseif qtype == "select" then
        t.errcode = "0"
        t.msg = cjson.encode(res)
    elseif  qtype == "update" then
        t.errcode = "0"
        t.msg = "update game data successfully"
    else 
        t.errocode = "-5"
        t.msg = "get wrong query type"
    end

    local ok, err = db:set_keepalive(0, 200)
        if not ok then
            ngx.say("failed to set keepalive: ", err)
            t.errcode = "-6"
            t.msg = "db set keepalive err"
            return t
        end 
    return t
end
