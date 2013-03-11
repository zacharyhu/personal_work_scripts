日志采集服务端设计

一、主体设计思路：
 
主要采用redis队列的方式，将各应用传递的data同过l_push() 推送进redis队列，后端使用python脚本进行redis队列数据的pop采集和mysql-insert操作


二、参数设计
Socket 发送方式data格式为：
{'appname’:'game101', 'err_code': '10001','error_type': 'app_error', 'error_msg': ' some error message here','time':'2013/03/11 16:58:43'}

各参数说明：
appname 区别应用名称如(game101等)
error_code  错误代码（应用中区别的）
error_type 错误类型 （由应用自行设定）
error_msg 错误信息（详细信息）
time 时间
对应的appname、error_code、error_type 等会在数据采集的后台数据库设计中进行配置设计，如gs_error_log_type_game
gs_error_log_type_gplatform等




