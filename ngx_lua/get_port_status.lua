local redis = require "resty.redis"
local red = redis.new()
args = ngx.req.get_uri_args()
red:set_timeout(1000)
local ok, err = red:connect("127.0.0.1", 6379)
            if not ok then
                ngx.say("failed to connect: ", err)
                return
            end
if not args.itid then
    ngx.say("pls give the itid")
    return
end
local res, err = red:get(args.itid)
            if not res then
                ngx.say("failed to get ",itid, err)
                return
            end

            if res == ngx.null then
                ngx.say(args.itid," is nil")
                return
            end

            ngx.say(res)
