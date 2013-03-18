
local upload = require "resty.upload"
local cjson = require "cjson"
local mylib = require "resty.mylib"
local resty_sha1 = require "resty.sha1"
local sha1 = resty_sha1:new()
local str = require "resty.string"


local chunk_size = 4096 -- should be set to 4096 or 8192
     -- for real-world settings
local form = upload:new(chunk_size)
local file
local filelen=0
--local my_get_filename,my_save_uploadfile_todb
form:set_timeout(0) -- 1 sec
local filename,filenamesha1,contentsha1
local osfilepath = "/usr/local/nginx/html/uploadfile/"
local i=0
while true do
    local typ, res, err = form:read()
    if not typ then
        ngx.say("failed to read: ", err)
        return
    end
    if typ == "header" then
        if res[1] ~= "Content-Type" then
                           filename = mylib.my_get_filename(res[2])
            if filename then
                i=i+1
                filenamesha1=sha1:update(filename)
                filenamesha1 = str.to_hex(sha1:final())
                sha1:reset()
                filepath = osfilepath  .. filename 
                file = io.open(filepath,"w+")
                if not file then
                    ngx.say("failed to open file ")
                    return
                end
            else
            end
        end
    elseif typ == "body" then
        if file then
            filelen= filelen + tonumber(string.len(res))    
            file:write(res)
            contentsha1 = sha1:update(res)
        else
        end
    elseif typ == "part_end" then
        if file then
            file:close()
            file = nil
            contentsha1 = str.to_hex(sha1:final())
            sha1:reset()
            ngx.say("file content sha1hash is "..contentsha1)
            ngx.say(mylib.my_save_uploadfile_todb(filename,filenamesha1,filelen,contentsha1,osfilepath))

        end
    elseif typ == "eof" then
        break
    else
    end
end
if i==0 then
    ngx.say("please upload at least one file!")
    return
end
