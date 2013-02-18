#!/bin/bash
# insert into gp_platform data




##########当天各平台及CP游戏充值消耗##########
echo "insert into gp_platform.gp_data_daily_cash(l_date,l_cash_sum,l_total_num,l_avg,l_type)
select * from datacenter.dailyreport_boss_cash where l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')" |mysql -h10.48.179.112 -udc -pdc

##########当天各游戏游戏点消耗（按平台来）
echo "insert into gp_platform.gp_data_daily_game(l_date,l_game_id,l_game_name,l_total_num,l_user_num,l_avg_num,l_game_points,l_cash_sum,l_source)
select * from datacenter.dailyreport_game_play where  l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')"|mysql -h10.48.179.112 -udc -pdc


###########当天所有平台充值总计
echo "insert into gp_platform.gp_data_daily_cash(l_date,l_cash_sum,l_total_num,l_avg,l_type)
select l_date,sum(cash_sum),'0','0','999' from datacenter.dailyreport_boss_cash where l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')"|mysql -h10.48.179.112 -udc -pdc

#########老平台游戏点消耗总计
echo "insert into gp_platform.gp_data_daily_game(l_date,l_game_id,l_game_name,l_total_num,l_user_num,l_avg_num,l_game_points,l_cash_sum,l_source)
select l_date,'1000','老平台总计','0','0','0',sum(chg_points),'0','201' from datacenter.gp_chg_daily where game_id not like '4%' and game_id !='999' and l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')"|mysql -h10.48.179.112 -udc -pdc  --default-character-set=utf8
##########新平台新疆地区游戏点消耗总计
echo "insert into gp_platform.gp_data_daily_game(l_date,l_game_id,l_game_name,l_total_num,l_user_num,l_avg_num,l_game_points,l_cash_sum,l_source)
select l_date,'1005','新疆总计','0','0','0',sum(game_points),'0','105' from datacenter.dailyreport_game_play where l_gid not like '4%' and l_gid !='999' and l_source=105 and l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')"|mysql -h10.48.179.112 -udc -pdc  --default-character-set=utf8

#########新平台中拓展地区游戏点消耗总计
echo "insert into gp_platform.gp_data_daily_game(l_date,l_game_id,l_game_name,l_total_num,l_user_num,l_avg_num,l_game_points,l_cash_sum,l_source)
select l_date,'1004','新拓展总计','0','0','0',sum(game_points),'0','104' from datacenter.dailyreport_game_play where l_gid not like '4%' and l_gid !='999' and l_source=104 and l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')"|mysql -h10.48.179.112 -udc -pdc  --default-character-set=utf8

###########所有平台游戏点消耗总和（除充值后）#########
echo "insert into gp_platform.gp_data_daily_game(l_date,l_game_id,l_game_name,l_total_num,l_user_num,l_avg_num,l_game_points,l_cash_sum,l_source)
select l_date,'9999','所有平台总计','0','0','0',sum(game_points),'0','0' from datacenter.dailyreport_game_play where l_gid not like '4%' and l_gid !='999' and l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')"|mysql -h10.48.179.112 -udc -pdc  --default-character-set=utf8
###############老平台的用户活跃数据
echo "insert into gp_platform.gp_data_daily_user(l_date,l_active,l_new_num,l_new_gamer,l_source)
select l_date,active,newnum,newnum_play,'201' from
datacenter.dailyreport_user_activity where l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')" |mysql -h10.48.179.112 -udc -pdc

##############新平台中按大厅编号录入活跃数据
echo "insert into gp_platform.gp_data_daily_user(l_date,l_active,l_new_num,l_new_gamer,l_source)
select l_date,l_login_user,l_new_user,l_new_gamer,l_lobby_id from
tvgame.xj_data_user where l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') group by l_lobby_id" |mysql -h10.48.179.112 -udc -pdc
#######综合所有平台用户活跃度############
echo "insert into gp_platform.gp_data_daily_user(l_date,l_active,l_new_num,l_new_gamer,l_source)
select l_date,sum(l_active),sum(l_new_num),sum(l_new_gamer),'0' from
gp_platform.gp_data_daily_user where l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')" |mysql -h10.48.179.112 -udc -pdc


###############老平台历史充值记录####################

echo "insert into gp_platform.gp_recharge_his(vc_stb_id,member_id,l_money,l_date,l_time,l_type)
 select vc_stb_id,member_id,l_money,l_date,l_time,l_type 
from datacenter.gp_recharge_his where l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')" |mysql -h10.48.179.112 -udc -pdc

###############老平台会员数据 
echo "insert into  gp_platform.gp_data_daily_vip(l_date,l_mon_points,l_mon_num,l_coin_points,l_coin_num,l_ingame_num,l_incash_num,l_cash_sum)
select * from datacenter.dailyreport_vip_data where l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')" |mysql -h10.48.179.112 -udc -pdc




