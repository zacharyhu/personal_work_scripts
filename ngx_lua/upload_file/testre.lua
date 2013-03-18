
contentstr = '"form-data; name=\"upload1\"; filename=\"D:\\亿家游程序\\svn_program\\20121210新疆XX大战僵尸\\151.txt\""'

full_filename = ngx.re.match(contentstr,'(.+)filename="(.+)"(.*)')
filename = ngx.re.match(full_filename[2],[[\w+\.\w+"$]],'isjo')[0]
filename = ngx.re.match(filename,[[\w+\.\w+]],'isjo')[0]
