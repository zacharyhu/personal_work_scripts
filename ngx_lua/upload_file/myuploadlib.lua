module("resty.myuploadlib", package.seeall)

function my_get_filename(res)
    local full_filename = ngx.re.match(contentstr,'(.+)filename="(.+)"(.*)')
    local filename = ngx.re.match(full_filename[2],[[\w+\.\w+"$]],'isjo')[0]
    local filename = ngx.re.match(filename,[[\w+\.\w+]],'isjo')[0]
    if filename then 
        return filename
    end
end
function my_remove_file(filename)
    return os.remove(filename)
end

function table_merge(table1, table2)
        for i,v in ipairs(table2) do
                table.insert(table1, v)
        end
    return table1
end



function my_save_uploadfile_todb(filename,filehash,filelen,contenthash,osfilepath,rollback_filename,rollback_filehash)
    local mysql = require "resty.mysql"
    local db = mysql:new()
    db:set_timeout(30000) -- 1 sec
    local result
    local ok, err, errno, sqlstate = db:connect({
            host = "127.0.0.1",
            port = "3306",
            database = "ngx_test",
            user = "ngx_test",
            password = "ngx_test",
            max_packet_size=10485760})

    if not ok then
        ngx.say("failed to connect: " , err , ": " , errno, " " , sqlstate)
        return 
    end

    filename = ndk.set_var.set_quote_sql_str(filename)
    local filehashquote = ndk.set_var.set_quote_sql_str(filehash)
    local contenthashquote =  ndk.set_var.set_quote_sql_str(contenthash)
    local rollback_filename_quote = ndk.set_var.set_quote_sql_str(rollback_filename)
    local rollback_filehash_quote = ndk.set_var.set_quote_sql_str(rollback_filehash)

    local query = "insert into upload_file_list (filename,filehash,filelen,contenthash,file_upload_time,rollback_filename,rollback_filehash) values (" 
                  .. filename .. "," .. filehashquote .. "," .. filelen .. "," .. contenthashquote 
                  .. ngx.localtime().."," ..rollback_filename_quote.."," ..rollback_filehash_quote..")"
    local res, err, errno, sqlstate = db:query(query)
    if not res then
        ngx.say("failed to connect: " , err , ": " , errno, " " , sqlstate)
        local filepath = "/usr/local/openresty/nginx/html/uploadfile/"
        my_remove_file(osfilepath .. filehash)
        return
    end
        os.rename(osfilepath..filehash,osfilepath..contenthash)    

    query = "SELECT LAST_INSERT_ID() as lastid"

    local res1, err, errno, sqlstate = db:query(query)

        if not res1 then
        ngx.say("failed to connect: " , err , ": " , errno, " " , sqlstate)
        return
        end
    ngx.say("db save done!",  " <a href='/deleteuploadfile?id=" , res1[1].lastid ,  "&filehash=" , contenthash , "'>delete</a><br>")
        ngx.say(filename," uploaded done!<br>")
     
    local ok, err = db:set_keepalive()
            if not ok then
                   ngx.say("failed to set keepalive: " ,err)
        return
            end
end

-- to prevent use of casual module global variables
getmetatable(resty.mylib).__newindex = function (table, key, val)    
    error('attempt to write to undeclared variable "' .. key .. '": '  
          .. debug.traceback())
end
