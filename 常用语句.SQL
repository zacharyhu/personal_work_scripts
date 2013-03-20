--------------------------------------------------------------------------

游戏平台基础数据
gp_base_info

游戏平台用户数据
gp_user_info
         gp_cfg_org: 地区组织配置
   gp_recharge_info: 充值信息
        gp_stb_info: 机顶盒信息
       gp_user_info: 用户信息
--------------------------------------------------------------------------

-- 导入欢乐谷记录
insert into gp_user_valley_logs(vc_user_id, l_date, l_game_id)
select vc_user_id, l_date, l_gid from TUserLogin
where l_date = 120417
group by vc_user_id, l_date 
order by vc_user_id 

select l_source_id, count(*) from gp_user_active_logs
where l_date =120416
group by l_source_id

-- 欢乐谷[401]
insert into gp_user_active_logs(vc_stb_id, l_create_date, l_date, l_source_id)
select vc_stb_id, l_create_date, l_date, 401 from gp_base_user_info t, gp_user_valley_logs tt
where t.[vc_user_id] = tt.[vc_user_id]   and l_date = 120417
group by l_date, vc_stb_id

-- 领取工资[301]
insert into gp_user_active_logs(vc_stb_id, l_create_date, l_date, l_source_id)
select vc_stb_id, l_create_date, l_date, 301 from gp_base_user_info t, gp_base_wages_info tt
where t.[vc_user_id] = tt.[vc_user_id]  and l_date = 120417
group by l_date, vc_stb_id

-- 游戏点游戏[201]
insert into gp_user_active_logs(vc_stb_id, l_create_date, l_date, l_source_id)
select vc_stb_id, l_create_date, l_date, 201 from gp_base_user_info t, gp_base_game_info tt
where t.[vc_user_id] = tt.[vc_user_id]   and l_date = 120417
group by l_date, vc_stb_id

-- 充值[101]
insert into gp_user_active_logs(vc_stb_id, l_create_date, l_date, l_source_id)
select t.vc_stb_id as vc_stb_id, l_create_date, l_date, 101 from gp_base_user_info t, gp_base_user_billing tt
where t.[vc_user_id] = tt.[vc_user_id]    and l_date = 120417
group by l_date, vc_stb_id

--------------------------------------------------

--当日活跃用户
select l_date, count(vc_stb_id) as active from 
( select vc_stb_id, l_date
    from gp_user_active_logs
    where l_date = 120417
    group by  vc_stb_id );   

--连续两天活跃用户
select count(*) from (
  select vc_stb_id, count(vc_stb_id) as num from (
     select vc_stb_id, l_date from gp_user_active_logs
      where 120415 < l_date and l_date < 120418
      group by vc_stb_id, l_date
  )  
  group by vc_stb_id
)
where num = 2

--连续三天活跃用户
select count(*) from (
  select vc_stb_id, count(vc_stb_id) as num from (
     select vc_stb_id, l_date from gp_user_active_logs
      where 120414 < l_date and l_date < 120418
      group by vc_stb_id, l_date
  )  
  group by vc_stb_id
)
where num = 3

--连续四天活跃用户
select count(*) from (
  select vc_stb_id, count(vc_stb_id) as num from (
     select vc_stb_id, l_date from gp_user_active_logs
      where 120413 < l_date and l_date < 120418
      group by vc_stb_id, l_date
  )  
  group by vc_stb_id
)
where num = 4

--一天留存率
select 
( select count(*) from gp_user_active_logs
   where l_date = 120417 and l_create_date = 120416
) *10000 / (select count(*) from gp_base_user_info 
       where l_create_date = 120416)

--三天留存率
select 
( select count(*) from gp_user_active_logs
   where l_date = 120417 and l_create_date = 120414
) *10000 / (select count(*) from gp_base_user_info 
       where l_create_date = 120414)

--七天留存率
select 
( select count(*) from gp_user_active_logs
   where l_date = 120417 and l_create_date = 120410
) *10000 / (select count(*) from gp_base_user_info 
       where l_create_date = 120410) 

--十五天留存率
select 
( select count(*) from gp_user_active_logs
   where l_date = 120417 and l_create_date = 120402
) *10000 / (select count(*) from gp_base_user_info 
       where l_create_date = 120402)

--三十天留存率
select 
( select count(*) from gp_user_active_logs
   where l_date = 120417 and l_create_date = 120318
) *10000 / (select count(*) from gp_base_user_info 
       where l_create_date = 120318)

--新注册用户人数
select count(*) from (
select vc_stb_id from gp_base_user_info
where l_create_date = 120417
group by vc_stb_id )


--新用户-参与过游戏的人数
select l_date, count(vc_stb_id) as num from (
select vc_stb_id, l_date from gp_user_active_logs
   where l_date = l_create_date and l_create_date = 120417
   group by vc_stb_id ) 
group by l_date

--(按日期)BOSS(101)充值金额(元) / 妙险岛(201)
select sum(l_money)/100, l_date, l_source_id from gp_base_user_billing
where l_date > 120416
group by l_date, l_source_id;

--(按日期)BOSS(101)充值人数 / 妙险岛(201)
select count(num), l_source_id, l_date from (
select count(vc_user_id) as num, l_date, l_source_id from gp_base_user_billing
where l_date > 120416
group by vc_user_id, l_date )
group by l_date, l_source_id

--工资(每月100000)
select sum(l_coin), l_date, l_coin from gp_base_wages_info
where l_date > 120416 and l_coin = 100000
group by l_date

--接金币(每日)
select sum(l_coin), l_date from gp_base_wages_info
where l_date > 120416 and l_coin <> 100000 and l_coin <> 5000
group by l_date

--接金币人数
select L_date, count(vc_user_id) from (
select vc_user_id, l_date, sum(l_coin) as l_coin from gp_base_wages_info
where l_date > 120416 and l_coin <> 100000 and l_coin <> 5000
group by vc_user_id, l_date 
order by l_coin desc
)
group by l_date

--工资-参与过游戏的人数
select count(*) from (
select vc_user_id, count(*) from gp_base_wages_info
where l_date = 120417 and
    vc_user_id in (select vc_user_id from gp_base_game_info
                         where l_date = 120417 and l_game_id <> 158 )                         
group by vc_user_id )


--工资-参与过充值的人数
select count(*) from (
select vc_user_id, count(*) from gp_base_wages_info
where l_date = 120417 and
    vc_user_id in (select vc_user_id from gp_base_user_billing
                         where l_date = 120417 ) 
group by vc_user_id )                           

--工资-充值金额
select sum(l_money) from (
select vc_user_id, sum(l_money)/100 as l_money from gp_base_user_billing
where l_date = 120417 and
    vc_user_id in (select vc_user_id from gp_base_wages_info
                         where l_date = 120417)                         
group by vc_user_id )

--游戏-游戏消耗
select sum(l_coin), l_date from gp_base_game_info
where l_date > 120416 and l_game_id <> 158
group by l_date

--单游戏-游戏消耗
select sum(l_coin) as coin, l_date, l_game_id from gp_base_game_info
where l_date > 120416
group by l_date, l_game_id
order by l_game_id, l_date

--单游戏-游戏人数
select count(vc_user_id) as num, l_date, l_game_id from gp_base_game_info
where l_date > 120416
group by l_date, l_game_id
order by l_game_id, l_date

--单游戏-欢乐谷
select count(vc_stb_id) as num, l_date from gp_user_active_logs
where l_source_id = 401 and l_date = 120417
group by l_date

<<<<　日统计 <<<<<<<<<<<<<<<<<<<


>>>>  月统计　>>>>>>>>>>>>>>>

--单月地区新人分布
select 
 (select vc_org_name from gp_cfg_org where vc_org_id = org_id) as vc_name_org,
 count(*) as num from 
(select t.vc_stb_id, vc_org_id as org_id from gp_stb_info t,  gp_base_user_info tt
where l_create_date > 120229 and l_create_date < 120401 and t.[vc_stb_id] = tt.[vc_stb_id]
group by tt.vc_stb_id )
group by org_id
order by num desc

--单月地区新人留存分布
select 
 (select vc_org_name from gp_cfg_org where vc_org_id = org_id) as vc_name_org,
 count(*) as num from 
(select t.vc_stb_id, vc_org_id as org_id from gp_stb_info t,  gp_user_active_logs tt
where l_create_date > 120229 and l_create_date < 120401 and l_date>120229 and l_date < 120401 and t.[vc_stb_id] = tt.[vc_stb_id]
group by tt.vc_stb_id )
group by org_id
order by num desc

--当月地区人数分布
select 
 (select vc_org_name from gp_cfg_org where vc_org_id = org_id) as vc_name_org,
 count(*) as num from 
(select t.vc_stb_id, vc_org_id as org_id from gp_stb_info t,  gp_user_active_logs tt
where l_date > 120229 and l_date < 120401 and t.[vc_stb_id] = tt.[vc_stb_id]
group by tt.vc_stb_id )
group by org_id
order by num desc

--当月地区充值人数分布
select 
 (select vc_org_name from gp_cfg_org where vc_org_id = org_id) as vc_name_org,
 count(*) as num from 
(select t.vc_stb_id, vc_org_id as org_id from gp_stb_info t,  gp_user_active_logs tt
where l_date > 120229 and l_date < 120401 and t.[vc_stb_id] = tt.[vc_stb_id] and l_source_id = 101
group by tt.vc_stb_id )
group by org_id
order by num desc

--当月地区充值分布
select 
 (select vc_org_name from gp_cfg_org where vc_org_id = org_id) as vc_name_org,
 sum(l_money)/100 as num from 
(select t.vc_stb_id, vc_org_id as org_id, sum(l_money) as l_money from gp_stb_info t,  gp_base_user_billing tt
  where l_date > 120229 and l_date < 120401 and t.[vc_stb_id] = tt.[vc_stb_id] and l_source_id = 101
  group by tt.vc_stb_id )
group by org_id
order by num desc

--当月地区游戏点消耗分布
select 
 (select vc_org_name from gp_cfg_org where vc_org_id = org_id) as vc_name_org,
 -sum(l_coin)/10000 as num from 
(select t.vc_stb_id, vc_org_id as org_id, sum(l_coin) as l_coin from gp_stb_info t,  gp_base_user_info tt, gp_base_game_info ttt
  where ttt.l_date > 120229 and ttt.l_date < 120401 and t.[vc_stb_id] = tt.[vc_stb_id] and tt.vc_user_id = ttt.vc_user_id and l_game_id <> 158
  group by tt.vc_stb_id )
group by org_id
order by num desc

--当月单地区游戏人数分布
select
(select vc_org_name from gp_cfg_org where vc_org_id = org_id) as vc_name_org,
 l_game_id,
 count(*) as num from 
(select t.vc_stb_id, l_game_id, vc_org_id as org_id from gp_stb_info t,  gp_base_user_info tt, gp_base_game_info ttt
  where ttt.l_date > 120229 and ttt.l_date < 120401 and t.[vc_stb_id] = tt.[vc_stb_id] and tt.vc_user_id = ttt.vc_user_id and l_game_id <> 158
  group by tt.vc_stb_id )  
where org_id like 'a4003'
group by l_game_id
order by num desc

--单月地区欢乐谷人数分布
select
(select vc_org_name from gp_cfg_org where vc_org_id = org_id) as vc_name_org,
 count(*) as num from 
(select t.vc_stb_id, vc_org_id as org_id from gp_stb_info t, gp_user_active_logs tt
  where tt.l_date > 120229 and tt.l_date < 120401 and t.[vc_stb_id] = tt.[vc_stb_id] and l_source_id = 201
  group by tt.vc_stb_id )
group by org_id
order by num desc



--------------------------------------

--康德月出账
select vc_org_name, sum(l_money)/100 money from gp_recharge_info t, gp_stb_info tt, gp_cfg_org ttt
where l_date > 120229 and l_date < 120401 and l_source = 201
 and t.[vc_stb_id] = tt.vc_stb_id and tt.vc_org_id = ttt.[vc_org_id]  
group by  vc_org_name
order by money desc

select sum(l_money)/100 money from gp_recharge_info t
where l_date > 120229 and l_date < 120401 and l_source = 201
 and t.[vc_stb_id] not in (select vc_stb_id from gp_stb_info)  
order by money desc

-------------------------------------------------

-----------------------------------------------------------

select 'std: '||vc_stb_id as vc_stb_id from gp_base_user_billing
where vc_stb_id not in (select vc_stb_id from gp_stb_info)
group by vc_stb_id


-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
-----------------------------------------------zachary hu 2012-04-23-------------------------------------------------------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------






mysql

/*录入数据 用户行为*/
insert into dailyreport_user_activity(`date`,`active`,`active2`,`active3`,`active4`,`stay`,`stay3`,`stay7`,`stay15`,`stay30`,`newnum`,`newnum_play`)  
select 
DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') as date,
(SELECT count(DISTINCT vc_stb_id ) 
FROM z_user_active
WHERE left(l_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'))  as active,
(select count(*) as active2 from (
  select vc_stb_id, count(vc_stb_id) as num from (
     select vc_stb_id, l_date from z_user_active
      where left( l_date, 6) between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 2 DAY),'%y%m%d') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')
      group by vc_stb_id,left(l_date,6)
  ) as t1
  group by vc_stb_id 
) as t2
where num = 2)  as active2,
(select count(*) from (
  select vc_stb_id, count(vc_stb_id) as num from (
     select vc_stb_id, l_date from z_user_active
      where left( l_date, 6)  between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 3 DAY),'%y%m%d') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')
      group by vc_stb_id,left(l_date,6)
  ) as t1
  group by vc_stb_id 
) as t2
where num = 2) as active3,
(select count(*)  from (
  select vc_stb_id, count(vc_stb_id) as num from (
     select vc_stb_id, l_date from z_user_active
      where left( l_date, 6)  between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 4 DAY),'%y%m%d') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')
      group by vc_stb_id,left(l_date,6)
  ) as t1
  group by vc_stb_id 
) as t2
where num = 2) as active4,
(select
(select count(distinct vc_stb_id) 
from z_user_active  
where left(l_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 2 DAY),'%y%m%d') and left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'))
/
(select count(distinct vc_stb_id) 
from z_user_active 
where left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 2 DAY),'%y%m%d'))) as stay,
(select
(select count(distinct vc_stb_id) 
from z_user_active  
where left(l_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 4 DAY),'%y%m%d') and left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'))
/
(select count(distinct vc_stb_id) 
from z_user_active 
where left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'))) as stay3,
(select
(select count(distinct vc_stb_id) 
from z_user_active  
where left(l_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 8 DAY),'%y%m%d') and left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'))
/
(select count(distinct vc_stb_id) 
from z_user_active 
where left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'))) as stay7,
(select
(select count(distinct vc_stb_id) 
from z_user_active  
where left(l_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 16 DAY),'%y%m%d') and left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'))
/
(select count(distinct vc_stb_id) 
from z_user_active 
where left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'))) as stay15,
(select
(select count(distinct vc_stb_id) 
from z_user_active  
where left(l_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 31 DAY),'%y%m%d') and left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'))
/
(select count(distinct vc_stb_id) 
from z_user_active 
where left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'))) as stay30,
(SELECT count(DISTINCT vc_stb_id ) FROM `action` WHERE left(vc_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')) as new_num,
(SELECT count(DISTINCT vc_stb_id ) 
FROM z_user_active
WHERE left( l_create_date, 6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')
AND left( l_date, 6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')) as new_active;

========================================================================||||活跃用户|||=============================

/*当日活跃用户数：*/
SELECT count(DISTINCT vc_stb_id ) 
FROM z_user_active
WHERE left(l_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d');
/*连续两天活跃用户数:*/
select count(*) from (
  select vc_stb_id, count(vc_stb_id) as num from (
     select vc_stb_id, l_date from z_user_active
      where left( l_date, 6) between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 2 DAY),'%y%m%d') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')
      group by vc_stb_id,left(l_date,6)
  ) as t1
  group by vc_stb_id 
) as t2
where num = 2;

/*连续三天活跃用户数*/
select count(*) from (
  select vc_stb_id, count(vc_stb_id) as num from (
     select vc_stb_id, l_date from z_user_active
      where left( l_date, 6)  between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 3 DAY),'%y%m%d') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')
      group by vc_stb_id,left(l_date,6)
  ) as t1
  group by vc_stb_id 
) as t2
where num = 2;

/*连续4天活跃用户数*/
select count(*) from (
  select vc_stb_id, count(vc_stb_id) as num from (
     select vc_stb_id, l_date from z_user_active
      where left( l_date, 6)  between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 4 DAY),'%y%m%d') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')
      group by vc_stb_id,left(l_date,6)
  ) as t1
  group by vc_stb_id 
) as t2
where num = 2;



=================================================================||||留存率：|||===============================================================
/*一天：*/
select
(select count(distinct vc_stb_id) 
from z_user_active  
where left(l_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 2 DAY),'%y%m%d'))
/
(select count(distinct vc_stb_id) 
from z_user_active 
where left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 2 DAY),'%y%m%d'));

/*三天：*/
select
(select count(distinct vc_stb_id) 
from z_user_active  
where left(l_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 4 DAY),'%y%m%d'))
/
(select count(distinct vc_stb_id) 
from z_user_active 
where left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'));
/*七天：*/
select
(select count(distinct vc_stb_id) 
from z_user_active  
where left(l_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 8 DAY),'%y%m%d'))
/
(select count(distinct vc_stb_id) 
from z_user_active 
where left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'))
/*十五天：*/
select
(select count(distinct vc_stb_id) 
from z_user_active  
where left(l_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 16 DAY),'%y%m%d'))
/
(select count(distinct vc_stb_id) 
from z_user_active 
where left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'));
/*三十天：*/
select
(select count(distinct vc_stb_id) 
from z_user_active  
where left(l_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 31 DAY),'%y%m%d'))
/
(select count(distinct vc_stb_id) 
from z_user_active 
where left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'));

======================================================================|||新增用户数据|||==============================================================
/*新增用户数*/
SELECT count(DISTINCT vc_stb_id ) FROM `action` WHERE left(vc_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')
/*新注册并且玩过游戏的用户数：*/
SELECT count(DISTINCT vc_stb_id ) 
FROM z_user_active
WHERE left( l_create_date, 6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')
AND left( l_date, 6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d');


============================================================================|||游戏数据|||=====================================================================================================================
/*VIP*/
/*包月领工资人数及总金额:*/
insert into dailyreport_vip_data(date,mon_points,mon_num,coin_points,coin_num,ingame_num,incash_num,cash)

SELECT sum( chg_game_points ) as total_points,count(*) as num
FROM`point` 
WHERE chg_game_points =100000
AND notes ="gameId:158"
AND done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59');

/*接金币人数及总金额：*/
SELECT count(DISTINCT member_id )AS num, sum( chg_game_points )AS total_points
FROM`point` 
WHERE chg_game_points !=100000
AND done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59')
AND notes ="gameId:158";

/*会员参与游戏人数：*/
select count(distinct t1.member_id) 
from 
(select distinct member_id from point where done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59') and notes='gameId:158') 
as t1,point t2 
where t2.done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59') 
and t2.notes!='gameId:158' 
and t2.busi_id=202
and t1.member_id=t2.member_id;

/*会员参与充值人数：*/
select count(distinct t1.member_id) 
from 
(select distinct member_id from point where done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59') and notes='gameId:158') 
as t1,point t2 
where t2.done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59')
and t2.notes!='gameId:158' 
and t2.busi_id=101
and t1.member_id=t2.member_id;

/*会员领工资充值金额：*/
select DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'),(
(SELECT  sum(t2.chg_game_points )/7500 AS total_cash2
FROM 
(select distinct member_id from point where done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59') and notes='gameId:158') 
as t1,point t2
WHERE t2.busi_id ='101'
AND t2.done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59')
AND t2.chg_game_points ='15000'
AND t1.member_id=t2.member_id)
+
(SELECT sum(t2.chg_game_points )/10000 AS total_cash5
FROM 
(select distinct member_id from point where done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59') and notes='gameId:158') 
as t1,point t2
WHERE t2.busi_id ='101'
AND t2.done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59')
AND t2.chg_game_points ='50000'
AND t1.member_id=t2.member_id)
+
(SELECT sum(t2.chg_game_points )/12000 AS total_cash10 
FROM 
(select distinct member_id from point where done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59') and notes='gameId:158') 
as t1,point t2
WHERE t2.busi_id ='101'
AND t2.done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59')
AND t2.chg_game_points ='120000'
AND t1.member_id=t2.member_id)
) as total_cash
FROM point
WHERE busi_id ='101'
AND done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59') limit 1;


select 120415,( (SELECT  sum(t2.chg_game_points )/7500 AS total_cash2 FROM  (select distinct member_id from point where between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59') and notes='gameId:158')  as t1,point t2 WHERE t2.busi_id ='101' AND t2.done_date LIKE '2012/04/15%' AND t2.chg_game_points ='15000' AND t1.member_id=t2.member_id) + (SELECT sum(t2.chg_game_points )/10000 AS total_cash5 FROM  (select distinct member_id from point where done_date like "2012/04/15%" and notes='gameId:158')  as t1,point t2 WHERE t2.busi_id ='101' AND t2.done_date LIKE '2012/04/15%' AND t2.chg_game_points ='50000' AND t1.member_id=t2.member_id) + (SELECT sum(t2.chg_game_points )/12000 AS total_cash10  FROM  (select distinct member_id from point where done_date like "2012/04/15%" and notes='gameId:158')  as t1,point t2 WHERE t2.busi_id ='101' AND t2.done_date LIKE '2012/04/15%' AND t2.chg_game_points ='120000' AND t1.member_id=t2.member_id) ) as total_cash FROM point WHERE busi_id ='101' AND done_date LIKE '2012/04/15%' limit 1;

/*游戏消耗游戏点变化数值*/
select DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') as date,substring(notes,8,10) as game_id,sum(chg_game_points) as chg_points 
from
point 
where 
done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59') 
group by notes;


/*妙险岛游戏充值金额和人数*/
SELECT sum(l_coin)/100 as mxd_cash, count(distinct vc_userid) as mxd_num FROM `TCoinLog` where l_date=120415;




=====================================================================||||用户行为数据采集--原始数据整理--z_user_active|||=====================================================================================================================================
/*导入欢乐谷[401]*/
insert into z_user_active(vc_stb_id,l_create_date,l_date,l_source_id) 
select t1.vc_stb_id,t1.vc_create_date,concat( t2.l_date, t2.l_time ),401 
from 
action t1,hlg_login t2 
where t1.vc_user_id=t2.vc_user_id 
and l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')
group by l_date,vc_stb_id;

/*导入领工资[301]*/
insert into z_user_active(vc_stb_id,l_create_date,l_date,l_source_id) 
select t1.vc_stb_id,t1.vc_create_date,DATE_FORMAT(t2.done_date,'%y%m%d%H%i%S') as l_date,301 
from 
action t1,point t2 
where 
t1.vc_user_id=t2.member_id 
and t2.notes='gameId:158'
AND t2.done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59') 
group by l_date,vc_stb_id;


/*导入游戏点[201]*/
insert into z_user_active(vc_stb_id,l_create_date,l_date,l_source_id)
SELECT t2.vc_stb_id, t2.vc_create_date, DATE_FORMAT( t1.done_date,'%y%m%d%H%i%S')AS l_date, 201
FROM 
point t1, action t2
WHERE t1.busi_id =202
AND t1.notes !='gameId:158'
AND t2.vc_user_id = t1.member_id
AND t1.done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59');

/*导入充值[101]*/
insert into z_user_active(vc_stb_id,l_create_date,l_date,l_source_id)
SELECT t2.vc_stb_id, t2.vc_create_date, DATE_FORMAT( t1.done_date,'%y%m%d%H%i%S')AS l_date, 101
FROM 
point t1, action t2
WHERE t1.busi_id =101
AND t2.vc_user_id = t1.member_id
AND t1.done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59');

各项值条目数
SELECT l_source_id,count(*)
FROM`z_user_active` 
GROUP BY l_source_id
=====================================================================||||用户行为数据采集|||原始数据整理--z_user_active=====================================================================================================================================
=======================================================||||游戏点变化及人数数据录入|||=======================================================================================
/*将各游戏gameid date 游戏点变化 游戏人数插入表gp_chg_daily*/
insert into gp_chg_daily(date,game_id,chg_points,user_num) 
select DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') as date,
substring(notes,8,10) as game_id,sum(chg_game_points) as chg_points,
count(distinct member_id) as num 
from 
point  
where  
done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59') 
and notes!='gameId:0' and notes!='' and notes!='gameId:158'
group by notes;
=======================================================||||游戏点变化及人数数据录入|||========================================================================================
=====================================================================||||boss充值数据录入|||dailyreport_boss_cash|||======================================================================================================================================
/*BOSS充值[]*/
insert into dailyreport_boss_cash(l_date,cash_sum,total_num,avg)
select DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'),(
(SELECT  sum( chg_game_points )/7500 AS total_cash2
FROM point
WHERE busi_id ='101'
AND done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59')
AND chg_game_points ='15000')+
(SELECT sum( chg_game_points )/10000 AS total_cash5
FROM point
WHERE busi_id ='101'
AND done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59')
AND chg_game_points ='50000')+
(SELECT sum( chg_game_points )/12000 AS total_cash10 
FROM point
WHERE busi_id ='101'
AND done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59')
AND chg_game_points ='120000')
) as total_cash, count(DISTINCT member_id )AS total_num,(
(SELECT  sum( chg_game_points )/7500 AS total_cash2
FROM point
WHERE busi_id ='101'
AND done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59')
AND chg_game_points ='15000')+
(SELECT sum( chg_game_points )/10000 AS total_cash5
FROM point
WHERE busi_id ='101'
AND done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59')
AND chg_game_points ='50000')+
(SELECT sum( chg_game_points )/12000 AS total_cash10
FROM point
WHERE busi_id ='101'
AND done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59')
AND chg_game_points ='120000')
)/count(DISTINCT member_id ) as avg
FROM point
WHERE busi_id ='101'
AND done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59');
=====================================================================||||boss充值数据录入|||======================================================================================================================================
=======================================================||||游戏点变化及人数数据录入|||=======================================================================================
/*将各游戏gameid date 游戏点变化 游戏人数插入表gp_chg_daily*/
insert into gp_chg_daily(date,game_id,chg_points,user_num) 
select DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') as date,
substring(notes,8,10) as game_id,sum(chg_game_points) as chg_points,
count(distinct member_id) as num 
from 
point  
where  
done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59') 
and notes!='gameId:0' and notes!='' and notes!='gameId:158'
group by notes;
=======================================================||||游戏点变化及人数数据录入|||========================================================================================



=====================================================================|||用户行为分析数据录入|||dailyreport_user_activity|||==============================================================================
/*import the selected user info*/

insert into dailyreport_user_activity(`date`,`active`,`active2`,`active3`,`active4`,`stay`,`stay3`,`stay7`,`stay15`,`stay30`,`newnum`,`newnum_play`)  
select 
DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') as date,
(SELECT count(DISTINCT vc_stb_id ) 
FROM z_user_active
WHERE left(l_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'))  as active,
(select count(*) as active2 from (
  select vc_stb_id, count(vc_stb_id) as num from (
     select vc_stb_id, l_date from z_user_active
      where left( l_date, 6) between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 2 DAY),'%y%m%d') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')
      group by vc_stb_id,left(l_date,6)
  ) as t1
  group by vc_stb_id 
) as t2
where num = 2)  as active2,
(select count(*) from (
  select vc_stb_id, count(vc_stb_id) as num from (
     select vc_stb_id, l_date from z_user_active
      where left( l_date, 6)  between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 3 DAY),'%y%m%d') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')
      group by vc_stb_id,left(l_date,6)
  ) as t1
  group by vc_stb_id 
) as t2
where num = 2) as active3,
(select count(*)  from (
  select vc_stb_id, count(vc_stb_id) as num from (
     select vc_stb_id, l_date from z_user_active
      where left( l_date, 6)  between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 4 DAY),'%y%m%d') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')
      group by vc_stb_id,left(l_date,6)
  ) as t1
  group by vc_stb_id 
) as t2
where num = 2) as active4,
(select
(select count(distinct vc_stb_id) 
from z_user_active  
where left(l_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 2 DAY),'%y%m%d'))
/
(select count(distinct vc_stb_id) 
from z_user_active 
where left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 2 DAY),'%y%m%d'))) as stay,
(select
(select count(distinct vc_stb_id) 
from z_user_active  
where left(l_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 4 DAY),'%y%m%d'))
/
(select count(distinct vc_stb_id) 
from z_user_active 
where left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'))) as stay3,
(select
(select count(distinct vc_stb_id) 
from z_user_active  
where left(l_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 8 DAY),'%y%m%d'))
/
(select count(distinct vc_stb_id) 
from z_user_active 
where left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'))) as stay7,
(select
(select count(distinct vc_stb_id) 
from z_user_active  
where left(l_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 16 DAY),'%y%m%d'))
/
(select count(distinct vc_stb_id) 
from z_user_active 
where left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'))) as stay15,
(select
(select count(distinct vc_stb_id) 
from z_user_active  
where left(l_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 31 DAY),'%y%m%d'))
/
(select count(distinct vc_stb_id) 
from z_user_active 
where left(l_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'))) as stay30,
(SELECT count(DISTINCT vc_stb_id ) FROM `action` WHERE left(vc_create_date,6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')) as new_num,
(SELECT count(DISTINCT vc_stb_id ) 
FROM z_user_active
WHERE left( l_create_date, 6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')
AND left( l_date, 6)=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')) as new_active;
=================================================================================||BOSS数据录入dailyreport_user_activity||===============================================================================
==================================================================================|||VIP会员数据采集dailyreport_vip_data|||========================================================================
insert into dailyreport_vip_data(date,mon_points,mon_num,coin_points,coin_num,ingame_num,incash_num,cash)
select DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') as date,
(SELECT sum( chg_game_points ) as total_points
FROM `point` 
WHERE chg_game_points =100000
AND notes ="gameId:158"
AND done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59')) as mon_points,
(SELECT count(*) as num
FROM `point` 
WHERE chg_game_points =100000
AND notes ="gameId:158"
AND done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59')) as mon_num,
(SELECT sum( chg_game_points )AS total_points
FROM `point` 
WHERE chg_game_points !=100000
AND done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59')
AND notes ="gameId:158") as coin_points,
(SELECT count(DISTINCT member_id )AS num
FROM `point` 
WHERE chg_game_points !=100000
AND done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59')
AND notes ="gameId:158") as coin_num,
(select count(distinct t1.member_id) 
from 
(select distinct member_id from point where done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59') and notes='gameId:158') 
as t1,point t2 
where t2.done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59') 
and t2.notes!='gameId:158' 
and t2.busi_id=202
and t1.member_id=t2.member_id) as ingame_num,
(select (select count(distinct t1.member_id) 
from 
(select distinct member_id from point where done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59') and notes='gameId:158') 
as t1,point t2 
where t2.done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59')
and t2.notes!='gameId:158' 
and t2.busi_id=101
and t1.member_id=t2.member_id)
+
(select count(t3.stbid) as num
from
(select distinct(t1.member_id) as memid,t2.vc_stb_id as stbid 
from point t1,action t2  
where  t1.done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59')  
and t1.notes='gameId:158'  
and t1.member_id=t2.vc_user_id)as t3,gp_new_recharge t4
where t3.stbid=t4.vc_stb_id
and t4.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')))
 as incash_num,
(select 
(SELECT  sum(t2.chg_game_points )/7500 AS total_cash2
FROM 
(select distinct member_id from point where done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59') and notes='gameId:158') 
as t1,point t2
WHERE t2.busi_id ='101'
AND t2.done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59')
AND t2.chg_game_points ='15000'
AND t1.member_id=t2.member_id)
+
(SELECT sum(t2.chg_game_points )/10000 AS total_cash5
FROM 
(select distinct member_id from point where done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59') and notes='gameId:158') 
as t1,point t2
WHERE t2.busi_id ='101'
AND t2.done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59')
AND t2.chg_game_points ='50000'
AND t1.member_id=t2.member_id)
+
(SELECT sum(t2.chg_game_points )/12000 AS total_cash10 
FROM 
(select distinct member_id from point where done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59') and notes='gameId:158') 
as t1,point t2
WHERE t2.busi_id ='101'
AND t2.done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59')
AND t2.chg_game_points ='120000'
AND t1.member_id=t2.member_id) 
+
(select sum(t4.l_money)/100 as cash from
(select distinct(t5.member_id) as memid,t6.vc_stb_id as stbid 
from point t5,action t6  
where  t5.done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59')  
and t5.notes='gameId:158'  
and t5.member_id=t6.vc_user_id)as t3,gp_new_recharge t4
where t3.stbid=t4.vc_stb_id
and t4.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')))
as cash;



新版充值stbid：
(select count(t3.stbid) as num,sum(t4.l_money)/100 as cash from
(select distinct(t1.member_id) as memid,t2.vc_stb_id as stbid 
from point t1,action t2  
where  t1.done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59')  
and t1.notes='gameId:158'  
and t1.member_id=t2.vc_user_id)as t3,gp_new_recharge t4
where t3.stbid=t4.vc_stb_id
and t4.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')) as t5,
;

==================================================================================|||VIP会员数据采集录入dailyreport_vip_data|||========================================================================


======================================================================|||游戏具体数据录入|||dailyreport_game_info=======================================================



insert into dailyreport_game_info(date,total_p,niu_p,niu_n,marj_p,marj_n,bbsk_p,bbsk_n,sk_p,sk_n,sk1_p,sk1_n,hlg_p,hlg_n,mxd_cash,mxd_n)
select DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') as date,
(SELECT sum(chg_points) FROM gp_chg_daily WHERE date = DATE_FORMAT(DATE_SUB(CURDATE(),INTERVAL 1 DAY),'%y%m%d') AND game_id NOT LIKE '40%') as total_p,
(SELECT chg_points  FROM `gp_chg_daily` WHERE date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and `game_id`='257') as niu_p,
(SELECT user_num FROM `gp_chg_daily` WHERE date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and `game_id`='257') as niu_n,
(SELECT chg_points FROM `gp_chg_daily` WHERE date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and `game_id`='226') as marj_p,
(SELECT user_num FROM `gp_chg_daily` WHERE date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and `game_id`='226') as marj_n,
(SELECT chg_points FROM `gp_chg_daily` WHERE date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and `game_id`='230') as bbsk_p,
(SELECT user_num FROM `gp_chg_daily` WHERE date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and `game_id`='230') as bbsk_n,
(SELECT chg_points FROM `gp_chg_daily` WHERE date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and `game_id`='232') as sk_p,
(SELECT user_num FROM `gp_chg_daily` WHERE date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and `game_id`='232') as sk_n,
(SELECT chg_points FROM `gp_chg_daily` WHERE date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and `game_id`='240') as sk1_p,
(SELECT user_num FROM `gp_chg_daily` WHERE date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and `game_id`='240') as sk1_n,
(SELECT chg_points FROM `gp_chg_daily` WHERE date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and `game_id`='250') as hlg_p,
(SELECT count(DISTINCT vc_user_id ) FROM  hlg_login WHERE l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')) as hlg_n,
(SELECT sum(l_coin)/100 as mxd_cash FROM `TCoinLog` where l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')) as mxd_cash,
(SELECT count(distinct vc_userid) as mxd_num FROM `TCoinLog` where l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')) as mxd_n;
======================================================================|||游戏具体数据录入|||dailyreport_game_info=======================================================







用户行为分析表：dailyreport_user_activity
select * from dailyreport_user_activity;
select 
active as 当日活跃用户,active2 as 连续两天活跃用户,active3 as 连续三天活跃用户,active4 as 连续四天活跃用户,stay as 一天留存率, stay3 as 三天留存率,stay7 as 七天留存率,stay15 as 十五天留存率,stay30 as 三十天留存率,newnum as 新注册用户数,newnum_play as 新注册玩家数
from dailyreport_user_activity 
where date='120424';
BOSS充值表：dailyreport_boss_cash
select l_date,cash_sum,total_num,avg from dailyreport_boss_cash;
VIP 会员表：dailyreport_vip_data
SELECT * FROM `dailyreport_vip_data`
游戏数据表 dailyreport_game_info
select * from dailyreport_game_info;
========================================================邮件发送报表==================================
select count(*) from z_visit_log where v_time between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(CURDATE(), '%Y/%m/%d 00:00:00');


http://218.108.243.13:8080/portal/selfservice/intefaceSubpInfo.jsp?SPCode=huayixiongdi&SPSign=&UserID=21500804278W6A024073&ProductCode=3175046443&SPUser=&InureMode=0 




tips：
当前：
date_format(NOW(),'%y%m%d')
7天前：
date_format(DATE_SUB(CURDATE(), INTERVAL 7 DAY),'%y%m%d')




create controlfile reuse database 'game' noresetlogs noarchivelog
maxlogfiles 16 
maxlogmembers 3
maxdatafiles 100
maxinstances 8
maxloghistory 292
logfile 
group 1 '/app/oracle/database/log/game/redo01.log' size 50M,
group 2 '/app/oracle/database/log/game/redo02.log' size 50M,
group 3 '/app/oracle/database/log/game/redo03.log' size 50M
datafile
'/app/oracle/database/log/game/system01.dbf',
'/app/oracle/database/log/game/undotbs01.dbf',  
'/app/oracle/database/log/game/sysaux01.dbf', 
'/app/oracle/database/log/game/users01.dbf',
'/app/oracle/database/log/game/example01.dbf'
character set we8iso8859p1;


解析接口取用户联系方式:
for i in `cat user_new_need.txt` ; do curl http://125.210.207.86:8080/boss-self/newself/hzselfservice/CustomerInfo.jsp?stbid=$i |grep '</td>'|grep -v ":" |sed -e 's/<[^<]*>//g'|sed -e 's/\s//g'|sed -e 's/&nbsp;//g'|sed -e 's/$/,/g' |xargs echo |awk -F, '{print "\""$5"\",\""$6"\",\""$7"\",\""$8"\""}' >>user_content.csv;done

for i in `cat user_new_need.txt` ; do 
res=`mysql -pswhs2012 datacenter -e"select vc_create_date from action where vc_stb_id=\"$i\""`
rel=`curl http://125.210.207.86:8080/boss-self/newself/hzselfservice/CustomerInfo.jsp?stbid=$i |grep '</td>'|grep -v ":" |sed -e 's/<[^<]*>//g'|sed -e 's/\s//g'|sed -e 's/&nbsp;//g'|sed -e 's/$/,/g' |xargs echo |awk -F, '{print "\""$5"\",\""$6"\",\""$7"\",\""$8"\""}'` 
echo $res","$rel; 
#>>user_content.csv;
done

========================================================【取机顶盒用户信息】====================================
==========================字段机顶盒号、充值金额、创建时间、姓名、住址、电话、手机号============================
#!/bin/bash


echo "stbid,cash,create_date,name,addr,tel,cell" >>user_content.csv;
for i in `cat user_new_need.txt` ; do 
busi=`mysql -pswhs2012 datacenter -N -e"select sum(t1.chg_game_points) from point t1,action t2
where
t1.member_id=t2.vc_user_id
and t2.vc_stb_id=\"$i\"
and t1.busi_id='101'
and done_date between DATE_FORMAT('2012/04/01','%Y/%m/%d 00:00:00') and DATE_FORMAT('2012/05/01','%Y/%m/%d 23:59:59');"`
res=`mysql -pswhs2012 datacenter -N -e"select vc_create_date from action where vc_stb_id=\"$i\""`
rel=`curl http://125.210.207.86:8080/boss-self/newself/hzselfservice/CustomerInfo.jsp?stbid=$i |grep '</td>'|grep -v ":" |sed -e 's/<[^<]*>//g'|sed -e 's/\s//g'|sed -e 's/&nbsp;//g'|sed -e 's/$/,/g' |xargs echo |awk -F, '{print "\""$5"\",\""$6"\",\""$7"\",\""$8"\""}'` 
echo "\""$i",\""$busi",\""$res"\","$rel >>user_content.csv;
done
===================================================================================================================
1104035011600024C1169971

查用户游戏点变化记录:
2012/02/06之后：
select t1.* 
from gp_user_points_busi t1, gp_user_info t2 
where t1.member_id=t2.member_id 
and t2.out_id='111800305030F0C24C30A6C4'
and t1.done_date>=to_date('2012/01/01','yyyy-mm-dd')
;
http://125.210.207.86:8080/boss-self/newself/hzselfservice/CustomerInfo.jsp?stbid=1104002021000024C11707C9


http://boss-self.wasu.cn/boss/jsp/customerInfo.jsp?stbid=0111020130138000606E7BCFBE
调用stbid文件取用户接口信息
for i in `cat user_stb_id.txt` ; do curl http://125.210.207.86:8080/boss-self/newself/hzselfservice/CustomerInfo.jsp?stbid=$i |grep '</td>'|grep -v ":" |sed -e 's/<[^<]*>//g'|sed -e 's/\s//g'|sed -e 's/&nbsp;//g'|sed -e 's/$/,/g' |xargs echo |awk -F, '{print "\""$5"\",\""$6"\",\""$7"\",\""$8"\""}' |xargs echo $i, >>user_content;done
生成插入数据库语句
sed -e 's/(/</g' act_user_con.txt |sed -e 's/)/>/g'|awk -F, '{print "insert into z_user_info VALUE (\""$1"\",\""$2"\",\""$3"\",\""$4"\",\""$5"\",\"571\");"}' >user_info3.sql
mysql -pswhs2012 datacenter <user_info3.sql --default-character-set=gbk


拓展城市可以用下面察看用户资料：
http://boss-self.wasu.cn/boss/jsp/customerInfo.jsp?stbid=0111020130138000606E7BCFBE
 014204001011600024C1206236

CREATE TABLESPACE DATA_GAME  LOGGING  DATAFILE '/opt/oracle9i/oradata/data_game.DBF' SIZE 20480M   autoextend on next 20M   maxsize unlimited;
create user "gp" profile "DEFAULT"
identified by "gp" default tablespace "DATA_GAME" account unlock;
GRANT "CONNECT" to "gp";
grant "DBA" to "gp";


CREATE TABLESPACE SM  LOGGING  DATAFILE '/opt/oracle9i/oradata/sm.DBF' SIZE 4048M   autoextend on next 20M   maxsize unlimited;
create user "sm" profile "DEFAULT"
identified by "sm" default tablespace "SM" account unlock;
GRANT "CONNECT" to "sm";
grant "DBA" to "sm";

CREATE TABLESPACE SP  LOGGING  DATAFILE '/opt/oracle9i/oradata/sp.DBF' SIZE 4048M   autoextend on next 20M   maxsize unlimited;
create user "sp" profile "DEFAULT"
identified by "sp" default tablespace "SP" account unlock;
GRANT "CONNECT" to "sp";
grant "DBA" to "sp";




===============================================================月报表=================
上一个月注册人数
SELECT count(*) FROM `action` where left(vc_create_date,4)=date_format(DATE_SUB(CURDATE(), INTERVAL 1 MONTH),'%y%m');
上一个月活跃人数
select count(distinct vc_stb_id) from z_user_active where left(l_date,4)=date_format(DATE_SUB(CURDATE(), INTERVAL 1 MONTH),'%y%m');


上个月新注册用户数
select count(distinct member_id) from gp_user_info t where t.create_date  between to_date('2012/04/01','yyyy-mm-dd') and to_date('2012/05/01','yyyy-mm-dd')
活跃用户数
select count(distinct member_id)  from gp_user_points_busi where done_date between to_date('2012/04/01','yyyy-mm-dd') and to_date('2012/05/01','yyyy-mm-dd')
月度地区注册人数
select t2.region_name,t2.region_code,count(t1.region_code)
from gp_user_info t1,gp_sys_region t2 
where t1.region_code=t2.region_code and t1.create_date between to_date('2012/04/01','yyyy-mm-dd') and to_date('2012/05/01','yyyy-mm-dd') 
group by t2.region_code,t2.region_name
order by count(t1.region_code) desc

月度活跃用户地区分布
select t2.region_name,t2.region_code,count(t1.region_code)
from gp_user_info t1,gp_sys_region t2,(select distinct member_id  from gp_user_points_busi where done_date between to_date('2012/04/01','yyyy-mm-dd') and to_date('2012/05/01','yyyy-mm-dd')) t3
where t1.region_code=t2.region_code 
and t1.member_id = t3.member_id
group by t2.region_code,t2.region_name
order by count(t1.region_code) desc

地区月度充值数额分布
select t2.region_name,t2.region_code,sum(t3.sum2)
from gp_user_info t1,gp_sys_region t2,
(select t.member_id,sum(t.sum1) as sum2
from 
(select member_id,sum(chg_game_points/12000) as sum1
from gp_user_points_busi 
where done_date between to_date('2012/04/01','yyyy-mm-dd') and to_date('2012/05/01','yyyy-mm-dd') 
and busi_id='101'
and chg_game_points='120000'
group by member_id union 
select member_id,sum(chg_game_points/5000) as sum1  
from gp_user_points_busi 
where done_date between to_date('2012/04/01','yyyy-mm-dd') and to_date('2012/05/01','yyyy-mm-dd') 
and busi_id='101'
and chg_game_points='50000'
group by member_id union 
select member_id,sum(chg_game_points/6000) as sum1 
from gp_user_points_busi 
where done_date between to_date('2012/04/01','yyyy-mm-dd') and to_date('2012/05/01','yyyy-mm-dd') 
and busi_id='101'
and chg_game_points='12000'
group by member_id ) t
group by t.member_id) t3
where t1.region_code=t2.region_code 
and t1.member_id = t3.member_id
group by t2.region_code,t2.region_name
order by sum(t3.sum2) desc

妙险岛充值总额
select sum(l_coin/100) from TCoinLog where l_date between '120401' and  '120501';

月度游戏点消耗总额
select sum(chg_game_points)  from gp_user_points_busi where 
done_date between to_date('2012/04/01','yyyy-mm-dd') and to_date('2012/05/01','yyyy-mm-dd')
and busi_id='202' 
and notes!='gameId:158'

月度充值收入
select sum(t.sum1) 
from 
(select member_id,sum(chg_game_points/12000) as sum1
from gp_user_points_busi 
where done_date between to_date('2012/04/01','yyyy-mm-dd') and to_date('2012/05/01','yyyy-mm-dd') 
and busi_id='101'
and chg_game_points='120000'
group by member_id union 
select member_id,sum(chg_game_points/5000) as sum1  
from gp_user_points_busi 
where done_date between to_date('2012/04/01','yyyy-mm-dd') and to_date('2012/05/01','yyyy-mm-dd') 
and busi_id='101'
and chg_game_points='50000'
group by member_id union 
select member_id,sum(chg_game_points/6000) as sum1 
from gp_user_points_busi 
where done_date between to_date('2012/04/01','yyyy-mm-dd') and to_date('2012/05/01','yyyy-mm-dd') 
and busi_id='101'
and chg_game_points='12000'
group by member_id ) t

(select distinct vc_userid as stbid from TCoinLog where l_date like '1205%') as t1,
select distinct t2.vc_stb_id from action t2,point t3 where t1.vc_user_id=t2.member_id and t2.done_date between DATE_FORMAT('2012/05/01','%Y/%m%d') and DATE_FORMAT('2012/06/01','%Y/%m%d') 
insert into temp_cash(stbid)
SELECT distinct action.vc_stb_id FROM action,point WHERE action.vc_user_id=point.member_id and point.busi_id='101' and point.done_date between DATE_FORMAT('2012/05/01','%Y/%m/%d') and DATE_FORMAT('2012/06/01','%Y/%m/%d')


---------------宝箱活动充值触发器------
DROP TRIGGER  IF EXISTS t_after_insert_on_recharge;

delimiter //

CREATE TRIGGER t_after_insert_on_recharge
AFTER INSERT ON tv_gp_ext_recharge_wasu
FOR EACH ROW
BEGIN  
     IF NEW.l_sp_code='501' THEN
        IF NEW.l_money='500' THEN
          insert into tv_gp_bx_key_info set l_silver_num=1,vc_account_no=NEW.vc_account_no,vc_stb_id = NEW.vc_stb_id ON DUPLICATE KEY UPDATE l_silver_num=l_silver_num+1;
        ELSEIF  NEW.l_money='1000' THEN
          insert into tv_gp_bx_key_info set l_silver_num=3,vc_account_no=NEW.vc_account_no,vc_stb_id = NEW.vc_stb_id ON DUPLICATE KEY UPDATE l_silver_num=l_silver_num+3;
        ELSEIF  NEW.l_money='3000' THEN
          insert into tv_gp_bx_key_info set l_silver_num=10,vc_account_no=NEW.vc_account_no,vc_stb_id = NEW.vc_stb_id ON DUPLICATE KEY UPDATE l_silver_num=l_silver_num+10;
        ELSEIF  NEW.l_money='5000' THEN
          insert into tv_gp_bx_key_info set l_silver_num=20,vc_account_no=NEW.vc_account_no,vc_stb_id = NEW.vc_stb_id ON DUPLICATE KEY UPDATE l_silver_num=l_silver_num+20;
        END IF;
	 END IF;
END;//



insert into tv_gp_ext_recharge_wasu set vc_stb_id='test500',vc_account_no='888889',l_sp_code='501',l_money='500'




======================新充值数据接口================================
//余额超过限制 充值过50的人数
select count(distinct t2.vc_account_no) from tv_gp_ext_recharge_wasu t1,tv_gp_ext_money_wasu t2 where t1.vc_account_no=t2.vc_account_no and t2.l_money<0 and t1.l_money=5000 and t1.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and t2.l_money<t2.l_overdraft ;
//余额负值 充值过50的人数
select count(distinct t2.vc_account_no) from tv_gp_ext_recharge_wasu t1,tv_gp_ext_money_wasu t2 where t1.vc_account_no=t2.vc_account_no and t2.l_money<0 and t1.l_money=5000 and t1.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') ;
//充值过50 总人数
select count(distinct t2.vc_account_no) from tv_gp_ext_recharge_wasu t1,tv_gp_ext_money_wasu t2 where t1.vc_account_no=t2.vc_account_no and t1.l_money=5000 and t1.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') ;
//欠费超过300并且参与过充值的人数及充值金额
select count(distinct t2.vc_account_no),sum(t1.l_money)/100 from tv_gp_ext_recharge_wasu t1,tv_gp_ext_money_wasu t2 where t1.vc_account_no=t2.vc_account_no and t2.l_money<'-300' and t1.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') ;



//余额超过限制 充值过30的人数
select count(distinct t2.vc_account_no) from tv_gp_ext_recharge_wasu t1,tv_gp_ext_money_wasu t2 where t1.vc_account_no=t2.vc_account_no and t2.l_money<0 and t1.l_money=3000 and t1.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and t2.l_money<t2.l_overdraft ;
//余额负值 充值过30的人数
select count(distinct t2.vc_account_no) from tv_gp_ext_recharge_wasu t1,tv_gp_ext_money_wasu t2 where t1.vc_account_no=t2.vc_account_no and t2.l_money<0 and t1.l_money=3000 and t1.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') ;
//充值过30 总人数
select count(distinct t2.vc_account_no) from tv_gp_ext_recharge_wasu t1,tv_gp_ext_money_wasu t2 where t1.vc_account_no=t2.vc_account_no and t1.l_money=3000 and t1.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') ;

//余额超过限制 充值过10的人数
select count(distinct t2.vc_account_no) from tv_gp_ext_recharge_wasu t1,tv_gp_ext_money_wasu t2 where t1.vc_account_no=t2.vc_account_no and t2.l_money<0 and t1.l_money=1000 and t1.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and t2.l_money<t2.l_overdraft ;
//余额负值 充值过10的人数
select count(distinct t2.vc_account_no) from tv_gp_ext_recharge_wasu t1,tv_gp_ext_money_wasu t2 where t1.vc_account_no=t2.vc_account_no and t2.l_money<0 and t1.l_money=1000 and t1.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') ;
//充值过10 总人数
select count(distinct t2.vc_account_no) from tv_gp_ext_recharge_wasu t1,tv_gp_ext_money_wasu t2 where t1.vc_account_no=t2.vc_account_no and t1.l_money=1000 and t1.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') ;


//余额超过限制 充值过5的人数
select count(distinct t2.vc_account_no) from tv_gp_ext_recharge_wasu t1,tv_gp_ext_money_wasu t2 where t1.vc_account_no=t2.vc_account_no and t2.l_money<0 and t1.l_money=500 and t1.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and t2.l_money<t2.l_overdraft ;
//余额负值 充值过5的人数
select count(distinct t2.vc_account_no) from tv_gp_ext_recharge_wasu t1,tv_gp_ext_money_wasu t2 where t1.vc_account_no=t2.vc_account_no and t2.l_money<0 and t1.l_money=500 and t1.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') ;
//充值过5 总人数
select count(distinct t2.vc_account_no) from tv_gp_ext_recharge_wasu t1,tv_gp_ext_money_wasu t2 where t1.vc_account_no=t2.vc_account_no and t1.l_money=500 and t1.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') ;

//余额超过限制 充值过2的人数
select count(distinct t2.vc_account_no) from tv_gp_ext_recharge_wasu t1,tv_gp_ext_money_wasu t2 where t1.vc_account_no=t2.vc_account_no and t2.l_money<0 and t1.l_money=200 and t1.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and t2.l_money<t2.l_overdraft ;
//余额负值 充值过2的人数
select count(distinct t2.vc_account_no) from tv_gp_ext_recharge_wasu t1,tv_gp_ext_money_wasu t2 where t1.vc_account_no=t2.vc_account_no and t2.l_money<0 and t1.l_money=200 and t1.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') ;
//充值过2总人数
select count(distinct t2.vc_account_no) from tv_gp_ext_recharge_wasu t1,tv_gp_ext_money_wasu t2 where t1.vc_account_no=t2.vc_account_no and t1.l_money=200 and t1.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') ;


select sum(t1.l_money) from tv_gp_ext_recharge_wasu t1,tv_gp_ext_money_wasu t2 where t1.vc_account_no=t2.vc_account_no and t2.l_money>0 and t1.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and t1.l_money=5000;
distinct(t2.vc_account_no),t2.l_money,t2.l_overdraft,t2.l_date
select distinct(t2.vc_account_no),t2.l_money,t2.l_overdraft,t2.l_date from tv_gp_ext_recharge_wasu t1,tv_gp_ext_money_wasu t2 where t1.vc_account_no=t2.vc_account_no and t2.l_money>0  and t1.l_money=5000 and t1.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') ;
select distinct(t2.vc_account_no),t2.l_money,t2.l_overdraft,t2.l_date from tv_gp_ext_recharge_wasu t1,tv_gp_ext_money_wasu t2 where t1.vc_account_no=t2.vc_account_no and t2.l_money<0 and t1.l_money=5000 and t1.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') ;


==============================sp信息============================================
select c.cust_Name,b.*
from Sp_Cs_Subscriber b,Sp_Cs_Customer c,Sp_Cs_Connect_Info a 
where b.cust_Id=c.cust_Id 
and b.subscriber_Id = a.subscriber_Id 
and a.connect_No='120317001051000019F04DD55C' 
and a.connect_Type=1001 
and a.status=1000
and b.user_Status=1 
and c.CUST_STATUS=1
120317001051000019F04DD55C
http://125.210.228.103/ncountry/login?stbid=120317001051000019F04DD55C&code=874

=====================
SELECT * FROM `point` WHERE member_id in ('246940','366771','260268','386183') and notes='gameId:501' and done_date between date_format('2012/06/13','%Y/%m/%d') and date_format('2012/06/15','%Y/%m/%d')

//修改表字段字符集
ALTER TABLE `tv_gp_cfg_base_value`  CHANGE `vc_name``vc_name` VARCHAR( 128)CHARACTERSET gbk COLLATE gbk_chinese_ci NOTNULLCOMMENT'名称'


===========================开宝箱======================
加箱子
insert into tv_gp_bx_box_info set vc_stb_id='11040050111052544C25C105',l_type='201',l_num='1',l_time='1341799899'
insert into tv_gp_bx_box_info set vc_stb_id='12040020112052544C2FA188',l_type='201',l_num='1',l_time='1341799899' 
加钥匙
insert into tv_gp_bx_key_info set vc_stb_id='11040050111052544C25C105',l_silver_num='100',l_golden_num='100'
update tv_gp_bx_key_info set l_silver_num='25',l_golden_num='25' where  vc_stb_id='12040020112052544C2FA188'
update tv_gp_bx_key_info set l_silver_num='25',l_golden_num='25' where  vc_stb_id='11040050111052544C25C105'




=============================当天扩展充值用户排行=================
SELECT t1.member_id as 用户id,sum(t1.chg_game_points) as 充值游戏点总数,t2.vc_stb_id FROM `point` t1,action t2 WHERE t1.member_id=t2.vc_user_id
and t1.done_date between DATE_FORMAT('2012/07/09','%Y/%m/%d 00:00:00') and DATE_FORMAT('2012/07/09','%Y/%m/%d 23:59:59')
and t1.busi_id='101'
group by t1.member_id 
order by sum(t1.chg_game_points) desc;

=================================开宝箱送出礼品========================
SELECT t1.vc_stb_id AS 机顶盒号, t1.l_date AS 中奖日期, t1.l_time AS 中奖时间, t1.l_prize_id AS 奖品编号, t1.l_box_id AS 箱子类型, t1.l_user_id AS 用户ID, t2.vc_prize_name AS 奖品名
FROM tv_gp_bx_lottery_info t1, tv_gp_bx_prize_info t2
WHERE t1.l_prize_id = t2.l_prize_id
AND t1.l_date =DATE_FORMAT(CURDATE(), '%y%m%d')
order by  t1.l_box_id desc,t1.l_prize_id desc

=============钥匙剩余数==========
SELECT sum( l_silver_num ) , sum( l_golden_num ) 
FROM`tv_gp_bx_key_info` 
=============宝箱剩余数==========
SELECT l_type,sum(l_num) FROM `tv_gp_bx_box_info` where l_num=1 group by l_type




=============================月度总充值游戏点汇总(oracle)======================================================
------杭州地区充值---------
select sum(t.chg_game_points) 
from gp_user_points_busi t 
where 
done_date between to_date('2012-06-01 00:00:00','yyyy-mm-dd hh24:mi:ss') and  to_date('2012-07-01 00:00:00','yyyy-mm-dd hh24:mi:ss')
and t.busi_id='202' and notes='gameId:999';
------拓展地区-------------
select sum(t.chg_game_points) from gp_user_points_busi t where done_date between to_date('2012-06-01 00:00:00','yyyy-mm-dd hh24:mi:ss') and  to_date('2012-07-01 00:00:00','yyyy-mm-dd hh24:mi:ss')
and t.busi_id='101' ;
------净增长---------------
select sum(t.chg_game_points) from gp_user_points_busi t where done_date between to_date('2012-06-01 00:00:00','yyyy-mm-dd hh24:mi:ss') and  to_date('2012-07-01 00:00:00','yyyy-mm-dd hh24:mi:ss')；
-------包月、接金币送出----


=====================================当天充值============================
SELECT * FROM `tv_gp_ext_recharge_wasu` WHERE l_sp_code='501' and l_date=DATE_FORMAT(CURDATE(), '%y%m%d')

===================================外星人=============================
SELECT sum( l_money )/100 AS 金额, count(DISTINCT vc_stb_id )AS 人数
FROM`tv_gp_ext_recharge_wasu` 
WHERE l_sp_code ='502'
AND l_date=






11040040111052544C2538A7

11040330101052544C223DD8
1	1235626	1235626	12356267826195	123456	1	0	5	1	10140	1	1369886	2	11040040111052544C2538A7	1	2	1		0	2010/11/1 13:22:40	2099/2/1	999920120625193100567	2012/6/25 19:31:01	0	1235626	7826195	2001					571	1435	AAAC3RAAKAAPWXZAAC
2	1453806	1453806	14538067292501	123456	1	0	1	1	0	1	100000	2	11040040111052544C2538A7	1	1	0		0	2012/6/26 11:52:08	2099/2/1	100119790101000001001	2012/6/26 11:52:09	0	1453806	7292501	2001					571	1435	AAAC3RAArAAJbW3AAI


=======================iptables NAT 端口映射=========================
7501测试端口：
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 7501 -j DNAT --to-destination 10.48.179.103
iptables -t nat -A POSTROUTING -d 10.48.179.103 -p tcp --dport 7501 -j SNAT --to 10.48.179.107
iptables -A FORWARD -o eth1 -d 10.48.179.103 -p tcp --dport 7501 -j ACCEPT
iptables -A FORWARD -i eth1 -s 10.48.179.103 -p tcp --sport 7501  -j ACCEPT
 
 


mv cclients/ clients_c
mv hdtvclient/ clients_h
mv nclients/ clients_n
mv ncastellan1/ gate_n
mv nnongwang/ gate_nong
mv nhdtv1/ gate_h
mv ncountry gate_c
mv ncountry2 gate_c2
mv ncountryX/ gate_cX
grep -R ncastellan1 ./* |awk -F: '{print $1}' |uniq|xargs sed -i -e 's/ncastellan1/gate_n/g'
grep -R ncountry ./* |awk -F: '{print $1}' |uniq|xargs sed -i -e 's/ncountry/gate_c/g'
grep -R ncountry2 ./* |awk -F: '{print $1}' |uniq|xargs sed -i -e 's/ncountry2/gate_c2/g'
grep -R ncountryX ./* |awk -F: '{print $1}' |uniq|xargs sed -i -e 's/ncountryX/gate_cX/g'
grep -R nhdtv1 ./* |awk -F: '{print $1}' |uniq|xargs sed -i -e 's/nhdtv1/gate_h/g'
grep -R nnongwang ./* |awk -F: '{print $1}' |uniq|xargs sed -i -e 's/nnongwang/gate_nong/g'
grep -R cclients ./* |awk -F: '{print $1}'|uniq |xargs sed -i -e 's/cclients/clients_c/g'
grep -R hdtvclient ./* |awk -F: '{print $1}'|uniq |xargs sed -i -e 's/hdtvclient/clients_h/g'
grep -R nclients ./* |awk -F: '{print $1}'|uniq |xargs sed -i -e 's/nclients/clients_n/g'


*/
===转盘日数据=====
echo "select * from T_DaySum where ITIME=$DATE_SEL;" |sqlite3 Ttable.db |awk -F\| '{print "insert into event_lucky_daysum VALUES (\""$1"\",\""$2"\",\""$3"\",\""$4"\",\""$5"\");"}' >>$sql_lucky
echo "select * from T_Goods where ITIME=$DATE_SEL;" |sqlite3 Ttable.db |awk -F\| '{print "insert into event_lucky_Goods VALUES (\""$1"\",\""$2"\",\""$3"\",\""$4"\",\""$5"\",\""$6"\");"}' >>$sql_lucky
echo "select * from T_lucky where ITIME =$DATE_SEL;" |sqlite3 Ttable.db |awk -F\| '{print "insert into event_lucky_lucky VALUES (\""$1"\",\""$2"\",\""$3"\",\""$4"\",\""$5"\",\""$6"\");"}' >>$sql_lucky

=======提升充值扣费上限==========
机顶盒：1104035011600024C1169971  100202006                    1104034011600024C112E8A1 3070412
UPDATE`billing_recharge`.`tv_gp_ext_money_wasu`SET`l_overdraft`='-500' WHERE CONVERT(`tv_gp_ext_money_wasu`.`vc_account_no`USING utf8 )='100202006' 
机顶盒：1104002091800024C126B94A 100191375  1104002091800024C126B94A
UPDATE`billing_recharge`.`tv_gp_ext_money_wasu`SET`l_overdraft`='-700' WHERE CONVERT(`tv_gp_ext_money_wasu`.`vc_account_no`USING utf8 )='100191375'
机顶盒：

select l_date,l_sp_code,sum(l_money) from tv_gp_ext_recharge_wasu where l_time>180000 group by l_date,l_sp_code
SELECT l_date, l_sp_code, sum( l_money )/100
FROM tv_gp_ext_recharge_wasu
WHERE l_time >'180000'
GROUP BY l_date, l_sp_code


===================mysql库中查询游戏记录================
SELECT* 
FROM`point` 
WHERE done_date
BETWEEN DATE_FORMAT('2012/05/01','%Y/%m/%d 00:00:00') 
AND DATE_FORMAT('2012/06/01','%Y/%m/%d 00:00:00') 
AND member_id ='360947'



SELECT t1 .* , t2.`vc_prize_name`,t4.*,t3.l_money,t3.l_overdraft
FROM`tv_gp_bx_lottery_info` t1,`tv_gp_bx_prize_info` t2,`tv_gp_ext_money_wasu` t3,`tv_gp_ext_user_wasu` t4
WHERE t1.l_prize_id
IN (
 '6','7','8','19','17','18'
)
AND t1.l_prize_id = t2.l_prize_id
and t1.vc_stb_id=t4.vc_stb_id
and t3.vc_account_no=t4.vc_account_no

select * from 
(SELECT  t2.vc_stb_id as 机顶盒号,t1.member_id as 用户ID,t1.before_points_busi as 变更前游戏点,t1.chg_game_points as 变更游戏点,t1.game_points as 变更后游戏点,t1.done_date as 变更时间,t3.l_game_name as 游戏名称 
FROM `point_history` t1,`gp_user_info` t2, `gp_game_info` t3
WHERE t1.member_id=t2.member_id 
and substr(t1.notes,8,3)=t3.l_game_id
and t1.done_date between date_format('2011/05/01','%Y/%m/%d 00:00:00') and date_format('2012/09/01','%Y/%m/%d 00:00:00')
and t2.vc_stb_id='0111020541441100000030F154'
UNION
SELECT  t2.vc_stb_id as 机顶盒号,t1.member_id as 用户ID,t1.before_points_busi as 变更前游戏点,t1.chg_game_points as 变更游戏点,t1.game_points as 变更后游戏点,t1.done_date as 变更时间,t3.l_game_name as 游戏名称 
FROM `point` t1,`gp_user_info` t2 , `gp_game_info` t3
WHERE t1.member_id=t2.member_id 
and substr(t1.notes,8,3)=t3.l_game_id
and t1.done_date between date_format('2012/01/01','%Y/%m/%d 00:00:00') and date_format('2012/12/01','%Y/%m/%d 00:00:00')
and t2.vc_stb_id='0111020541441100000030F154')as g
order by 变更时间 desc;


Database Control URL ? https://localhost:1158/em

???????????????, ??????? Enterprise Manager ????????????????? /opt/oracle/product/11.2.0/dbhome_1/localhost_gamedb/sysman/config/emkey.ora ??????????, ?????????, ??????????


SELECT t1.name,t2.vc_stb_id,t3.name,t3.addr,t3.tel,t3.cell,t1.PID,t1.POINT FROM `event_lucky_Goods` t1,action t2,z_user_info t3 WHERE  t1.name=t2.vc_user_id  and t2.vc_stb_id=t3.stbid
order by t2.vc_stb_id

select t2.vc_account_no,t1.l_money,t1.l_overdraft,t2.vc_customer_name,t2.vc_org_name,t2.vc_telphone,t2.vc_mobile,t2.vc_address,t2.vc_stb_type
FROM `tv_gp_ext_money_wasu` t1,
tv_gp_ext_user_wasu t2
where
t1.vc_account_no=t2.vc_account_no
and t1.vc_stb_id=''


按二区五县来获取当月充值排名
SELECT t1.l_sp_code,t3.vc_cp_name,t2.vc_org_id as 地区编号,t4.vc_org_name as 地区名称,sum(t1.l_money)/100 as 金额 
FROM tv_gp_ext_recharge_wasu t1, tv_gp_ext_user_wasu t2,tv_gp_ext_cp_info t3,tv_gp_ext_org_info t4
WHERE 
t1.vc_stb_id=t2.vc_stb_id
and t2.vc_org_id=t4.vc_org_id
and t1.l_sp_code=t3.l_cp_code
and left(t1.l_date,4)='1211'
group by t3.vc_cp_name,t2.vc_org_id


SELECT DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') as date,t1.game_id,t2.game_name,t1.total_num,t1.user_num,t1.total_num/t1.user_num,t1.chg_points,'0' FROM gp_chg_daily t1, gp_gameid_cfg t2
where t1.date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')
and t1.game_id=t2.game_id


插入游戏登录及消耗游戏点信息
insert into dailyreport_game_play(l_date,l_gid,l_game_name,total_num,user_num,avg_num,game_points,cash_sum)
SELECT DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') as date,t1.game_id,t2.game_name,t1.total_num,t1.user_num,t1.total_num/t1.user_num,t1.chg_points,'0' FROM gp_chg_daily t1, gp_gameid_cfg t2
where t1.date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')
and t1.game_id=t2.game_id





SELECT DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') as date,t1.l_gid,t2.game_name,count(t1.vc_user_id),count(distinct t1.vc_user_id),count(t1.vc_user_id)/count(distinct t1.vc_user_id),
FROM hlg_login t1, gp_gameid_cfg t2 
where t1.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') 
and t1.l_gid=t2.game_id
group by t1.l_gid
SELECT t1.l_gid,sum(t1.l_coin) 
FROM hlg_coin t1
where t1.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') 
group by t1.l_gid



SELECT  sum(t2.chg_game_points )/7500 AS total_cash2 
FROM  
(select distinct member_id 
from point 
where done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') 
and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59') and notes='gameId:158')  as t1,point t2 
WHERE t2.busi_id ='101' 
AND t2.done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') 
and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59') 
AND t2.chg_game_points ='15000' AND t1.member_id=t2.member_id


SELECT sum(t2.chg_game_points )/10000 AS total_cash5 
FROM  
(select distinct member_id from point 
where done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') 
and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59') and notes='gameId:158')  as t1,point t2 
WHERE t2.busi_id ='101' AND t2.done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') 
and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59') AND t2.chg_game_points ='50000' AND t1.member_id=t2.member_id

SELECT sum(t2.chg_game_points )/12000 AS total_cash10  
FROM  (select distinct member_id from point 
where done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') 
and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59') and notes='gameId:158')  as t1,point t2 
WHERE t2.busi_id ='101' AND t2.done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') 
and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59') AND t2.chg_game_points ='120000' AND t1.member_id=t2.member_id
	

select sum(t4.l_money)/100 as cash 
from (select distinct(t5.member_id) as memid,t6.vc_stb_id as stbid  from point t5,action t6   
where  t5.done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59')   
and t5.notes='gameId:158'   
and t5.member_id=t6.vc_user_id)as t3,gp_new_recharge t4
 where t3.stbid=t4.vc_stb_id and t4.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')




                access_by_lua '
                    if ngx.var.pd ~= "" then
                         local res = ngx.location.capture("/getauth")
                         echo ngx.re
                    ---     if ngx.re.match(res.body."1") then
                    ---            return
                    ---     else
                    ---            ngx.header["WWW-Authenticate"] = "Basic"
                    ---            --ngx.header["realm"] = "private"
                    ---           ngx.exit(ngx.HTTP_UNAUTHORIZED)
                         end
                     else
                         ngx.header["WWW-Authenticate"] = "Basic"
                         --ngx.header["realm"] = "private"
                         ngx.exit(ngx.HTTP_UNAUTHORIZED)
                     end
                    -- 用户和密码正确 access 则通过，并转向 proxy 部分。
                    --if ngx.var.remote_user == "swhs" and ngx.var.remote_passwd == "2012" then
                    --       return
                    --end
                    -- 返回 HTTP 401 认证输入框
                    --ngx.header.www_authenticate = [[Basic realm="Restricted"]]
                    --ngx.exit(401)
                ';

select t3.vc_stb_id,t1.member_id,(t1.sump+t2.sump)/10000 from (SELECT member_id,sum(chg_game_points) as sump 
FROM `point_history` 
where busi_id=101 
and done_date > date_format('2012/01/01','%Y/%m/%d')
 group by member_id order by sum(chg_game_points) desc limit 10) as t1,
(SELECT member_id,sum(chg_game_points) as sump
FROM `point` 
where busi_id=101 
and done_date > date_format('2012/01/01','%Y/%m/%d')
 group by member_id order by sum(chg_game_points) desc limit 150) as t2,
action t3
where t1.member_id=t2.member_id and t1.member_id=t3.vc_user_id;


select t1.vc_userid,t2.member_id,t1.l_coin/100,t1.l_date,t1.l_time,'201' 
from TCoinLog t1,gp_user_info t2
where t1.vc_userid=t2.vc_stb_id



======新充值========
insert into gp_recharge_his(vc_stb_id,member_id,l_money,l_date,l_time,l_type)
select t1.vc_stb_id,t2.member_id,t1.l_money/100,t1.l_date,t1.l_time,t1.l_sp_code 
from gp_new_recharge t1,gp_user_info t2
where t1.vc_stb_id=t2.vc_stb_id;
 
insert into gp_recharge_his(vc_stb_id,member_id,l_money,l_date,l_time,l_type)
select t1.vc_userid,t2.member_id,t1.l_coin/100,t1.l_date,t1.l_time,'201' 
from TCoinLog t1,gp_user_info t2
where t1.vc_userid=t2.vc_stb_id;

insert into gp_recharge_his(vc_stb_id,member_id,l_money,l_date,l_time,l_type)
SELECT t2.vc_stb_id, t1.member_id, t1.`chg_game_points`/12000, date_format( t1.done_date,'%y%m%d') , date_format( t1.done_date,'%H%i%S'),'501'
FROM point_history t1, gp_user_info t2
WHERE t1.member_id = t2.member_id
AND t1.busi_id ='101'
AND t1.chg_game_points ='120000';

insert into gp_recharge_his(vc_stb_id,member_id,l_money,l_date,l_time,l_type)
SELECT t2.vc_stb_id, t1.member_id, t1.`chg_game_points`/10000, date_format( t1.done_date,'%y%m%d') , date_format( t1.done_date,'%H%i%S'),'501'
FROM  point_history  t1, gp_user_info t2
WHERE t1.member_id = t2.member_id
AND t1.busi_id ='101'
AND t1.chg_game_points ='50000';


insert into gp_recharge_his(vc_stb_id,member_id,l_money,l_date,l_time,l_type)
SELECT t2.vc_stb_id, t1.member_id, t1.`chg_game_points`/7500, date_format( t1.done_date,'%y%m%d') , date_format( t1.done_date,'%H%i%S'),'501'
FROM  point_history t1, gp_user_info t2
WHERE t1.member_id = t2.member_id
AND t1.busi_id ='101'
AND t1.chg_game_points ='15000';


insert into gp_recharge_his(vc_stb_id,member_id,l_money,l_date,l_time,l_type)
SELECT t2.vc_stb_id, t1.member_id, t1.`chg_game_points`/12000, date_format( t1.done_date,'%y%m%d') , date_format( t1.done_date,'%H%i%S'),'501'
FROM point t1, gp_user_info t2
WHERE t1.member_id = t2.member_id
AND t1.busi_id ='101'
AND t1.chg_game_points ='120000';

insert into gp_recharge_his(vc_stb_id,member_id,l_money,l_date,l_time,l_type)
SELECT t2.vc_stb_id, t1.member_id, t1.`chg_game_points`/10000, date_format( t1.done_date,'%y%m%d') , date_format( t1.done_date,'%H%i%S'),'501'
FROM  point  t1, gp_user_info t2
WHERE t1.member_id = t2.member_id
AND t1.busi_id ='101'
AND t1.chg_game_points ='50000';


insert into gp_recharge_his(vc_stb_id,member_id,l_money,l_date,l_time,l_type)
SELECT t2.vc_stb_id, t1.member_id, t1.`chg_game_points`/7500, date_format( t1.done_date,'%y%m%d') , date_format( t1.done_date,'%H%i%S'),'501'
FROM  point t1, gp_user_info t2
WHERE t1.member_id = t2.member_id
AND t1.busi_id ='101'
AND t1.chg_game_points ='15000';







insert into gp_recharge_his(vc_stb_id,member_id,l_money,l_date,l_time,l_type)
select t1.vc_stb_id,t2.member_id,t1.l_money/100,t1.l_date,t1.l_time,t1.l_sp_code 
from gp_new_recharge t1,gp_user_info t2
where t1.vc_stb_id=t2.vc_stb_id
and t1.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d');

insert into gp_recharge_his(vc_stb_id,member_id,l_money,l_date,l_time,l_type)
SELECT t2.vc_stb_id, t1.member_id, t1.`chg_game_points`/12000, date_format( t1.done_date,'%y%m%d') , date_format( t1.done_date,'%H%i%S'),'501'
FROM point t1, gp_user_info t2
WHERE t1.member_id = t2.member_id
AND t1.busi_id ='101'
AND t1.chg_game_points ='120000'
AND t1.done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') 
and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59'); 

insert into gp_recharge_his(vc_stb_id,member_id,l_money,l_date,l_time,l_type)
SELECT t2.vc_stb_id, t1.member_id, t1.`chg_game_points`/10000, date_format( t1.done_date,'%y%m%d') , date_format( t1.done_date,'%H%i%S'),'501'
FROM  point  t1, gp_user_info t2
WHERE t1.member_id = t2.member_id
AND t1.busi_id ='101'
AND t1.chg_game_points ='50000'
AND t1.done_date  between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') 
and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59');

insert into gp_recharge_his(vc_stb_id,member_id,l_money,l_date,l_time,l_type)
SELECT t2.vc_stb_id, t1.member_id, t1.`chg_game_points`/7500, date_format( t1.done_date,'%y%m%d') , date_format( t1.done_date,'%H%i%S'),'501'
FROM  point t1, gp_user_info t2
WHERE t1.member_id = t2.member_id
AND t1.busi_id ='101'
AND t1.chg_game_points ='15000'
AND t1.done_date between DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 00:00:00') 
and DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%Y/%m/%d 23:59:59'); 



=====查询充值记录=====
SELECT t1.vc_stb_id AS 机顶盒号, t1.member_id AS 用户id, t1.l_money AS 消费金额, t1.l_date AS 日期, t1.l_time AS 时间, t2.l_name AS 消费类别
FROM gp_recharge_his t1, gp_recharge_cp t2
WHERE 
t1.l_type = t2.l_type
AND t1.vc_stb_id ='111800505030F0C24C312737'
AND t1.l_date  BETWEEN  '121205'  AND'121215'
order by t2.l_name


SELECT t1.vc_stb_id AS 机顶盒号, t1.member_id AS 用户id, t1.l_money AS 消费金额, t1.l_date AS 日期, t1.l_time AS 时间, t2.l_name AS 消费类别
FROM gp_recharge_his t1, gp_recharge_cp t2
WHERE 
t1.l_type = t2.l_type
AND t1.vc_stb_id ='11040150112052544C2BAA20'
AND t1.l_date  BETWEEN  '121001'  AND'123031'
order by t2.l_name
SELECT t1.vc_stb_id as 机顶盒,t1.member_id as 亿家游号,t1.l_money as 金额,t1.l_date as 日期,t1.l_time as 时间,t2.l_name as 消费类别 
FROM `gp_recharge_his` t1,gp_recharge_cp t2 
WHERE `vc_stb_id`='11040150112052544C2BAA20' 
and t1.l_type=t2.l_type 
and t1.l_date between 120101 and 120331
 
 
SELECT * FROM `point_history` WHERE `member_id`='464542' and done_date between date_format('2012-01-01','%Y/%m/%d 00:00:00') and date_format('2012-03-31','%Y/%m/%d 00:00:00') 
 
 
 
 
 
select *   from gp_recharge_his  group by `vc_stb_id`,`l_money`,`l_date`,`l_time` having count(*)>1  order by vc_stb_id,l_date,l_time;
12,676,721 总计
13,296,179 总计
15,517 总计
13361239


update dailyreport_game_play set total_num=(SELECT count(vc_user_id ) FROM  hlg_login WHERE l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')),user_num=(SELECT count(DISTINCT vc_user_id ) FROM  hlg_login WHERE l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')),avg_num=(SELECT count(vc_user_id ) FROM  hlg_login WHERE l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'))/(SELECT count(DISTINCT vc_user_id ) FROM  hlg_login WHERE l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'))   where l_date=121025 and l_gid=250

iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8601 -j DNAT --to-destination 10.48.179.106:8601
iptables -t nat -A POSTROUTING -d 10.48.179.106 -p tcp --dport 8601 -j SNAT --to 10.48.179.107:8601
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8602 -j DNAT --to-destination 10.48.179.106:8602
iptables -t nat -A POSTROUTING -d 10.48.179.106 -p tcp --dport 8602 -j SNAT --to 10.48.179.107:8602
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8603 -j DNAT --to-destination 10.48.179.106:8603
iptables -t nat -A POSTROUTING -d 10.48.179.106 -p tcp --dport 8603 -j SNAT --to 10.48.179.107:8603
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8604 -j DNAT --to-destination 10.48.179.106:8604
iptables -t nat -A POSTROUTING -d 10.48.179.106 -p tcp --dport 8604 -j SNAT --to 10.48.179.107:8604
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8605 -j DNAT --to-destination 10.48.179.106:8605
iptables -t nat -A POSTROUTING -d 10.48.179.106 -p tcp --dport 8605 -j SNAT --to 10.48.179.107:8605
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8606 -j DNAT --to-destination 10.48.179.106:8606
iptables -t nat -A POSTROUTING -d 10.48.179.106 -p tcp --dport 8606 -j SNAT --to 10.48.179.107:8606
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8607 -j DNAT --to-destination 10.48.179.106:8607
iptables -t nat -A POSTROUTING -d 10.48.179.106 -p tcp --dport 8607 -j SNAT --to 10.48.179.107:8607
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8608 -j DNAT --to-destination 10.48.179.106:8608
iptables -t nat -A POSTROUTING -d 10.48.179.106 -p tcp --dport 8608 -j SNAT --to 10.48.179.107:8608
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8609 -j DNAT --to-destination 10.48.179.106:8609
iptables -t nat -A POSTROUTING -d 10.48.179.106 -p tcp --dport 8609 -j SNAT --to 10.48.179.107:8609
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8610 -j DNAT --to-destination 10.48.179.106:8610
iptables -t nat -A POSTROUTING -d 10.48.179.106 -p tcp --dport 8610 -j SNAT --to 10.48.179.107:8610
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8611 -j DNAT --to-destination 10.48.179.106:8611
iptables -t nat -A POSTROUTING -d 10.48.179.106 -p tcp --dport 8611 -j SNAT --to 10.48.179.107:8611
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8612 -j DNAT --to-destination 10.48.179.106:8612
iptables -t nat -A POSTROUTING -d 10.48.179.106 -p tcp --dport 8612 -j SNAT --to 10.48.179.107:8612
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8613 -j DNAT --to-destination 10.48.179.106:8613
iptables -t nat -A POSTROUTING -d 10.48.179.106 -p tcp --dport 8613 -j SNAT --to 10.48.179.107:8613
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8614 -j DNAT --to-destination 10.48.179.106:8614
iptables -t nat -A POSTROUTING -d 10.48.179.106 -p tcp --dport 8614 -j SNAT --to 10.48.179.107:8614

iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8501 -j DNAT --to-destination 10.48.179.109:8501
iptables -t nat -A POSTROUTING -d 10.48.179.109 -p tcp --dport 8501 -j SNAT --to 10.48.179.107:8501
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8502 -j DNAT --to-destination 10.48.179.109:8502
iptables -t nat -A POSTROUTING -d 10.48.179.109 -p tcp --dport 8502 -j SNAT --to 10.48.179.107:8502
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8503 -j DNAT --to-destination 10.48.179.109:8503
iptables -t nat -A POSTROUTING -d 10.48.179.109 -p tcp --dport 8503 -j SNAT --to 10.48.179.107:8503
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8504 -j DNAT --to-destination 10.48.179.109:8504
iptables -t nat -A POSTROUTING -d 10.48.179.109 -p tcp --dport 8504 -j SNAT --to 10.48.179.107:8504
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8505 -j DNAT --to-destination 10.48.179.109:8505
iptables -t nat -A POSTROUTING -d 10.48.179.109 -p tcp --dport 8505 -j SNAT --to 10.48.179.107:8505
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8506 -j DNAT --to-destination 10.48.179.109:8506
iptables -t nat -A POSTROUTING -d 10.48.179.109 -p tcp --dport 8506 -j SNAT --to 10.48.179.107:8506
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8507 -j DNAT --to-destination 10.48.179.109:8507
iptables -t nat -A POSTROUTING -d 10.48.179.109 -p tcp --dport 8507 -j SNAT --to 10.48.179.107:8507
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8508 -j DNAT --to-destination 10.48.179.109:8508
iptables -t nat -A POSTROUTING -d 10.48.179.109 -p tcp --dport 8508 -j SNAT --to 10.48.179.107:8508
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8509 -j DNAT --to-destination 10.48.179.109:8509
iptables -t nat -A POSTROUTING -d 10.48.179.109 -p tcp --dport 8509 -j SNAT --to 10.48.179.107:8509
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8510 -j DNAT --to-destination 10.48.179.109:8510
iptables -t nat -A POSTROUTING -d 10.48.179.109 -p tcp --dport 8510 -j SNAT --to 10.48.179.107:8510
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8511 -j DNAT --to-destination 10.48.179.109:8511
iptables -t nat -A POSTROUTING -d 10.48.179.109 -p tcp --dport 8511 -j SNAT --to 10.48.179.107:8511
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8512 -j DNAT --to-destination 10.48.179.109:8512
iptables -t nat -A POSTROUTING -d 10.48.179.109 -p tcp --dport 8512 -j SNAT --to 10.48.179.107:8512
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8513 -j DNAT --to-destination 10.48.179.109:8513
iptables -t nat -A POSTROUTING -d 10.48.179.109 -p tcp --dport 8513 -j SNAT --to 10.48.179.107:8513
iptables -t nat -A PREROUTING -d 218.108.132.10 -p tcp --dport 8514 -j DNAT --to-destination 10.48.179.109:8514
iptables -t nat -A POSTROUTING -d 10.48.179.109 -p tcp --dport 8514 -j SNAT --to 10.48.179.107:8514

-A POSTROUTING -d 10.48.179.106 -p tcp -m tcp --dport 8601 -j SNAT --to-source 10.48.179.107:8601
-A POSTROUTING -d 10.48.179.106 -p tcp -m tcp --dport 8602 -j SNAT --to-source 10.48.179.107:8602
-A POSTROUTING -d 10.48.179.106 -p tcp -m tcp --dport 8603 -j SNAT --to-source 10.48.179.107:8603
-A POSTROUTING -d 10.48.179.106 -p tcp -m tcp --dport 8604 -j SNAT --to-source 10.48.179.107:8604
-A POSTROUTING -d 10.48.179.106 -p tcp -m tcp --dport 8605 -j SNAT --to-source 10.48.179.107:8605
-A POSTROUTING -d 10.48.179.106 -p tcp -m tcp --dport 8606 -j SNAT --to-source 10.48.179.107:8606
-A POSTROUTING -d 10.48.179.106 -p tcp -m tcp --dport 8607 -j SNAT --to-source 10.48.179.107:8607
-A POSTROUTING -d 10.48.179.106 -p tcp -m tcp --dport 8608 -j SNAT --to-source 10.48.179.107:8608
-A POSTROUTING -d 10.48.179.106 -p tcp -m tcp --dport 8609 -j SNAT --to-source 10.48.179.107:8609
-A POSTROUTING -d 10.48.179.106 -p tcp -m tcp --dport 8610 -j SNAT --to-source 10.48.179.107:8610
-A POSTROUTING -d 10.48.179.106 -p tcp -m tcp --dport 8611 -j SNAT --to-source 10.48.179.107:8611
-A POSTROUTING -d 10.48.179.106 -p tcp -m tcp --dport 8612 -j SNAT --to-source 10.48.179.107:8612
-A POSTROUTING -d 10.48.179.106 -p tcp -m tcp --dport 8613 -j SNAT --to-source 10.48.179.107:8613
-A POSTROUTING -d 10.48.179.106 -p tcp -m tcp --dport 8614 -j SNAT --to-source 10.48.179.107:8614
-A POSTROUTING -d 10.48.179.109 -p tcp -m tcp --dport 8501 -j SNAT --to-source 10.48.179.107:8501
-A POSTROUTING -d 10.48.179.109 -p tcp -m tcp --dport 8502 -j SNAT --to-source 10.48.179.107:8502
-A POSTROUTING -d 10.48.179.109 -p tcp -m tcp --dport 8503 -j SNAT --to-source 10.48.179.107:8503
-A POSTROUTING -d 10.48.179.109 -p tcp -m tcp --dport 8504 -j SNAT --to-source 10.48.179.107:8504
-A POSTROUTING -d 10.48.179.109 -p tcp -m tcp --dport 8505 -j SNAT --to-source 10.48.179.107:8505
-A POSTROUTING -d 10.48.179.109 -p tcp -m tcp --dport 8506 -j SNAT --to-source 10.48.179.107:8506
-A POSTROUTING -d 10.48.179.109 -p tcp -m tcp --dport 8507 -j SNAT --to-source 10.48.179.107:8507
-A POSTROUTING -d 10.48.179.109 -p tcp -m tcp --dport 8508 -j SNAT --to-source 10.48.179.107:8508
-A POSTROUTING -d 10.48.179.109 -p tcp -m tcp --dport 8509 -j SNAT --to-source 10.48.179.107:8509
-A POSTROUTING -d 10.48.179.109 -p tcp -m tcp --dport 8510 -j SNAT --to-source 10.48.179.107:8510
-A POSTROUTING -d 10.48.179.109 -p tcp -m tcp --dport 8511 -j SNAT --to-source 10.48.179.107:8511
-A POSTROUTING -d 10.48.179.109 -p tcp -m tcp --dport 8512 -j SNAT --to-source 10.48.179.107:8512
-A POSTROUTING -d 10.48.179.109 -p tcp -m tcp --dport 8513 -j SNAT --to-source 10.48.179.107:8513
-A POSTROUTING -d 10.48.179.109 -p tcp -m tcp --dport 8514 -j SNAT --to-source 10.48.179.107:8514

iptables -t nat -D PREROUTING -d 125.210.211.215 -p tcp --dport 8605 -j DNAT --to-destination 10.48.179.106:8605
iptables -t nat -D POSTROUTING -d 10.48.179.106 -p tcp --dport 8605 -j SNAT --to 125.210.211.215:8605
iptables -t nat -D PREROUTING -d 125.210.211.215 -p tcp --dport 8607 -j DNAT --to-destination 10.48.179.106:8607
iptables -t nat -D POSTROUTING -d 10.48.179.106 -p tcp --dport 8607 -j SNAT --to 125.210.211.215:8607
iptables -t nat -D PREROUTING -d 125.210.211.215 -p tcp --dport 8608 -j DNAT --to-destination 10.48.179.106:8608
iptables -t nat -D POSTROUTING -d 10.48.179.106 -p tcp --dport 8608 -j SNAT --to 125.210.211.215:8608
iptables -t nat -D PREROUTING -d 125.210.211.215 -p tcp --dport 8610 -j DNAT --to-destination 10.48.179.106:8610
iptables -t nat -D POSTROUTING -d 10.48.179.106 -p tcp --dport 8610 -j SNAT --to 125.210.211.215:8610

iptables -t nat -A PREROUTING -d 125.210.211.215 -p tcp --dport 8605 -j DNAT --to-destination 10.48.179.117:8605
iptables -t nat -A POSTROUTING -d 10.48.179.117 -p tcp --dport 8605 -j SNAT --to 125.210.211.215 
iptables -t nat -A PREROUTING -d 125.210.211.215 -p tcp --dport 8607 -j DNAT --to-destination 10.48.179.117:8607
iptables -t nat -A POSTROUTING -d 10.48.179.117 -p tcp --dport 8607 -j SNAT --to 125.210.211.215:8607
iptables -t nat -A PREROUTING -d 125.210.211.215 -p tcp --dport 8608 -j DNAT --to-destination 10.48.179.117:8608
iptables -t nat -A POSTROUTING -d 10.48.179.117 -p tcp --dport 8608 -j SNAT --to 125.210.211.215:8608
iptables -t nat -A PREROUTING -d 125.210.211.215 -p tcp --dport 8610 -j DNAT --to-destination 10.48.179.117:8610
iptables -t nat -A POSTROUTING -d 10.48.179.117 -p tcp --dport 8610 -j SNAT --to 125.210.211.215:8610


==================poke.txt=================
gameId=103&gameServIp=218.108.132.10&gameServPort=8504&jadName=hlg103.jad&jarName=hlg103.jar&gameServId=hlg103|


==================chess.txt===================
310|234|311|312|228|253|303
gameId=310&gameServIp=218.108.132.10&gameServPort=8610&jadName=13010.jad&jarName=13010.jar&gameServId=13010|
gameId=234&gameServIp=218.108.132.10&gameServPort=8502&jadName=12187.jad&jarName=12187.jar&gameServId=12187|
gameId=311&gameServIp=218.108.132.10&gameServPort=8611&jadName=13011.jad&jarName=13011.jar&gameServId=13011|
gameId=312&gameServIp=218.108.132.10&gameServPort=8612&jadName=13012.jad&jarName=13012.jar&gameServId=13012|
gameId=228&gameServIp=218.108.132.10&gameServPort=8508&jadName=12184.jad&jarName=12184.jar&gameServId=12184|
gameId=253&gameServIp=218.108.132.10&gameServPort=8507&jadName=12183.jad&jarName=12183.jar&gameServId=12183|
gameId=303&gameServIp=218.108.132.10&gameServPort=8603&jadName=13003.jad&jarName=13003.jar&gameServId=13003


=======mahjong=============================
305|301
gameId=305&gameServIp=218.108.132.10&gameServPort=8605&jadName=13005.jad&jarName=13005.jar&gameServId=13005|
gameId=301&gameServIp=218.108.132.10&gameServPort=8601&jadName=13001.jad&jarName=13001.jar&gameServId=13001


gameId=313&gameServIp=218.108.132.10&gameServPort=8613&jadName=13013.jad&jarName=13013.jar&gameServId=13013|



select count(distinct t2.member_id) 
from
(SELECT *
FROM  point t1,gp_recharge_his t2
WHERE t1.member_id=t2.member_id
and   t1.notes='gameId:158'
AND t1.done_date BETWEEN DATE_FORMAT( DATE_SUB( CURDATE() ,INTERVAL 1  DAY) ,'%Y/%m/%d 00:00:00')  AND DATE_FORMAT( DATE_SUB( CURDATE() ,INTERVAL 1  DAY) ,'%Y/%m/%d 23:59:59')
and t2.l_date=date_format(DATE_SUB( CURDATE() ,INTERVAL 1  DAY) ,'%y%m%d')) as incash_num,
select sum(t2.l_money) 
from
(SELECT *
FROM  point t1,gp_recharge_his t2
WHERE t1.member_id=t2.member_id
and   t1.notes='gameId:158'
AND t1.done_date BETWEEN DATE_FORMAT( DATE_SUB( CURDATE() ,INTERVAL 1  DAY) ,'%Y/%m/%d 00:00:00')  AND DATE_FORMAT( DATE_SUB( CURDATE() ,INTERVAL 1  DAY) ,'%Y/%m/%d 23:59:59')
and t2.l_date=date_format(DATE_SUB( CURDATE() ,INTERVAL 1  DAY) ,'%y%m%d')) as cash_sum

============================================第三季度活跃人数===========================
SELECT count(DISTINCT t.member_id ) 
FROM (
SELECTDISTINCT`vc_user_id`AS member_id
FROM`hlg_login` 
WHERE`l_date` 
BETWEEN 120701 
AND 120930 
UNION
SELECT `member_id`AS member_id
FROM`gp_recharge_his`
WHERE`l_date` 
BETWEEN 120701 
AND 120930 
UNION
SELECT
DISTINCT`member_id`AS member_id
FROM`point` 
WHERE done_date
BETWEEN date_format('2012/07/01','%Y/%m/%d') 
AND date_format('2012/09/30','%Y/%m/%d') 
) AS t

SELECT count(DISTINCT t.member_id ) 
FROM (
SELECTDISTINCT`vc_user_id`AS member_id
FROM`hlg_login` 
WHERE`l_date` 
BETWEEN 121001 
AND 121231 
UNION
SELECT `member_id`AS member_id
FROM`gp_recharge_his`
WHERE`l_date` 
BETWEEN 121001 
AND 121231 
UNION
SELECT
DISTINCT`member_id`AS member_id
FROM`point` 
WHERE done_date
BETWEEN date_format('2012/10/01','%Y/%m/%d') 
AND date_format('2012/12/31','%Y/%m/%d') 
) AS t

CREATE TABLE `host_monit` (
 `host` VARCHAR( 30) NOT NULL ,
 `item` VARCHAR( 30) NOT NULL ,
 `value` VARCHAR( 30) NOT NULL ,
 `time` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP 
) ENGINE= innodb COMMENT='监控数据';

1383599_10 2592000
SELECT* 
FROM`tv_gp_user_order` 
WHERE l_user_id
IN (

SELECT`l_user_id` 
FROM`tv_gp_user_order` 
WHERE`l_order_id`=100
)


=====================xj new recharge===============
SELECT l_date as 日期,count(distinct l_user_id) as 充值人数,count(l_user_id) as 充值人次,sum(`l_money`)/100  as 充值总金额,sum(`l_money`)/100/count(distinct l_user_id) as 人均
FROM`tv_gp_logs_recharge` 
GROUP BY l_date

SELECT t1.l_date as 日期,t2.vc_cp_name as cp名,count(distinct t1.l_user_id) as 充值人数,count(t1.l_user_id) as 充值人次,sum(t1.l_money)/100  as 充值总金额,sum(t1.l_money)/100/count(distinct t1.l_user_id) as 人均
FROM tv_gp_logs_recharge t1,tv_gp_cfg_cp_info t2
where t1.l_cp_code=t2.l_cp_code
GROUP BY t1.l_date,t1.l_cp_code



==================xj game add===============
SELECT t1.l_date, t1.l_game_id, sum( t1.l_num ) , t2.vc_game_name, t3.vc_business_name
FROM`xj_game_login` t1, xj_gp_cfg_game_info t2, xj_gp_cfg_busi_type t3
WHERE t1.l_game_id = t2.l_game_id
AND t2.l_game_type = t3.l_business_id
GROUP BY t1.l_date, t1.l_game_id
order by  t1.l_date,t3.vc_business_name,t2.vc_game_name

=================xj recharge


========================user active============================
insert into xj_data_user(l_date,l_new_user,l_login_user,l_recharge_user,l_stay_1,l_stay_3,l_stay_7,l_stay_15,l_stay_30)
select DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') as date,
(SELECT count(distinct l_user_id) FROM `tv_gp_user_info` WHERE l_create_date=121105) as new_num,
(SELECT count(distinct vc_stb_id) FROM xj_gate_login WHERE  l_date=121105) as login_num,
(SELECT count(distinct l_user_id)  FROM  tv_gp_logs_recharge where l_date=121105) as recharge_num,
(select (SELECT count(distinct t3.vc_stb_id)
FROM 
tv_gp_ext_xinjiang t1, tv_gp_user_info t2, xj_gate_login t3
where
t1.vc_user_no=t2.vc_user_no
and t1.vc_stb_id=t3.vc_stb_id
and t2.l_create_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 2 DAY),'%y%m%d')
and t3.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'))
/
(SELECT count(distinct t2.l_user_id)
FROM 
tv_gp_ext_xinjiang t1, tv_gp_user_info t2
where
t1.vc_user_no=t2.vc_user_no
and t2.l_create_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 2 DAY),'%y%m%d'))) as stay1,
(select (SELECT count(distinct t3.vc_stb_id)
FROM 
tv_gp_ext_xinjiang t1, tv_gp_user_info t2, xj_gate_login t3
where
t1.vc_user_no=t2.vc_user_no
and t1.vc_stb_id=t3.vc_stb_id
and t2.l_create_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 4 DAY),'%y%m%d')
and t3.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'))
/
(SELECT count(distinct t2.l_user_id)
FROM 
tv_gp_ext_xinjiang t1, tv_gp_user_info t2
where
t1.vc_user_no=t2.vc_user_no
and t2.l_create_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 4 DAY),'%y%m%d'))) as stay3,
(select (SELECT count(distinct t3.vc_stb_id)
FROM 
tv_gp_ext_xinjiang t1, tv_gp_user_info t2, xj_gate_login t3
where
t1.vc_user_no=t2.vc_user_no
and t1.vc_stb_id=t3.vc_stb_id
and t2.l_create_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 8 DAY),'%y%m%d')
and t3.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'))
/
(SELECT count(distinct t2.l_user_id)
FROM 
tv_gp_ext_xinjiang t1, tv_gp_user_info t2
where
t1.vc_user_no=t2.vc_user_no
and t2.l_create_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 8 DAY),'%y%m%d'))) as stay7,
(select (SELECT count(distinct t3.vc_stb_id)
FROM 
tv_gp_ext_xinjiang t1, tv_gp_user_info t2, xj_gate_login t3
where
t1.vc_user_no=t2.vc_user_no
and t1.vc_stb_id=t3.vc_stb_id
and t2.l_create_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 16 DAY),'%y%m%d')
and t3.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'))
/
(SELECT count(distinct t2.l_user_id)
FROM 
tv_gp_ext_xinjiang t1, tv_gp_user_info t2
where
t1.vc_user_no=t2.vc_user_no
and t2.l_create_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 16 DAY),'%y%m%d'))) as stay15,
(select (SELECT count(distinct t3.vc_stb_id)
FROM 
tv_gp_ext_xinjiang t1, tv_gp_user_info t2, xj_gate_login t3
where
t1.vc_user_no=t2.vc_user_no
and t1.vc_stb_id=t3.vc_stb_id
and t2.l_create_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 31 DAY),'%y%m%d')
and t3.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d'))
/
(SELECT count(distinct t2.l_user_id)
FROM 
tv_gp_ext_xinjiang t1, tv_gp_user_info t2
where
t1.vc_user_no=t2.vc_user_no
and t2.l_create_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 31 DAY),'%y%m%d'))) as stay30


http://ningbo.wasu.cn/tvportal_beilun/index_beilun.jsp?stbid=

l_cp_code CP编号

 vc_cp_name 名称
 
 
 
 
 select g.mon, count(distinct g.member_id) from 
 (SELECT left(t1.l_date,4) as mon,distinct t1.vc_user_id as member_id FROM hlg_login t1 group by left(t1.l_date,4) 
 UNION 
 SELECT date_format(t2.done_date,'%Y%m') as mon,distinct t2.member_id  FROM point t2  group by date_format(t2.done_date,'%Y%m')) as g group by g.mon;
 insert into gp_point_mon
 (SELECT left(t1.l_date,4) as mon,t1.vc_user_id as member_id FROM hlg_login t1  
 UNION 
 SELECT date_format(t2.done_date,'%Y%m') as mon,t2.member_id  FROM point t2 ) as g

 select g.mon,count(g.member_id) from(SELECT left( l_date, 4) as mon, member_id, sum( l_money )  as cash
FROM  `gp_recharge_his` 
GROUP BY mon, member_id
HAVING cash<11
) as g
group by g.mon

SELECT g.mon, count( g.member_id ) 
FROM (
SELECT left( l_date, 4)AS mon, member_id, sum( l_money )AS cash
FROM`gp_recharge_his` 
GROUPBY mon, member_id
HAVING cash <31
) AS g
GROUPBY g.mon


SELECT g.mon, count( g.member_id ) 
FROM (
SELECT left( t1.l_date, 4)AS mon,t2.vc_org_id as area,t1.vc_account_no as account, sum( t1.l_money )/100 AS cash FROM  gp_new_recharge t1,tv_gp_ext_user_wasu t2 where t1.vc_account_no=t2.vc_account_no GROUP BY mon,area,account   
) AS g
GROUP BY g.mon

select  mon,area, count(account)
from area_recharge
where cash < '11'
group by mon,area
SELECT mon, area, count( account ) 
FROM area_recharge
WHERE cash between 11 and 20
GROUP BY mon, area

SELECT mon, area, count( account ) ,sum(cash)
FROM area_recharge
WHERE cash between  1 and 10
GROUP BY mon, area




SELECT v_city, count(*) 
FROM`z_visit_log` 
GROUP BY v_city
order by  count(*) desc 


泉州0223370010501054CDA7130488


insert into gp_gameid_cfg('l_game_id','l_game_name','l_game_desc','l_game_spcode')
SELECT * FROM `datacenter.gp_gameid_cfg`

CREATE TABLE `gp_gameid_cfg` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `l_game_id` int(5) NOT NULL,
  `l_game_name` varchar(20) CHARACTER SET gbk NOT NULL,
  `l_game_desc` varchar(50) CHARACTER SET gbk NOT NULL,
  `l_game_spcode` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `game_id` (`l_game_id`),
  KEY `l_game_spcode` (`l_game_spcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='游戏id配置表' ;
CREATE TABLE `gp_data_daily_game` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `l_date` varchar(10) NOT NULL COMMENT '日期',
  `l_game_id` int(10) NOT NULL COMMENT 'gameid',
  `l_game_name` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '游戏名',
  `l_total_num` varchar(10) NOT NULL COMMENT '总次数',
  `l_user_num` int(10) NOT NULL COMMENT '人数',
  `l_avg_num` decimal(10,0) NOT NULL COMMENT '人均次数',
  `l_game_points` int(20) NOT NULL COMMENT '消耗游戏点数',
  `l_cash_sum` int(10) NOT NULL COMMENT '消费金额',
  PRIMARY KEY (`id`),
  KEY `l_date` (`l_date`,`l_game_id`)
) ENGINE=InnoDB;



insert into gp_platform.gp_data_daily_cash(l_date,l_cash_sum,l_total_num,l_avg,l_type)
select * from datacenter.dailyreport_boss_cash where l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d');
//游戏点数
insert into gp_platform.gp_data_daily_game(l_date,l_game_id,l_game_name,l_total_num,l_user_num,l_avg_num,l_game_points,l_cash_sum,l_source)
select * from datacenter.dailyreport_game_play where  l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d');


insert into gp_platform.gp_data_daily_cash(l_date,l_cash_sum,l_total_num,l_avg,l_type)
select l_date,sum(cash_sum),'0','0','999' from datacenter.dailyreport_boss_cash where l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d');
insert into gp_platform.gp_data_daily_game(l_date,l_game_id,l_game_name,l_total_num,l_user_num,l_avg_num,l_game_points,l_cash_sum,l_source)
select l_date,'999','总计','0','0','0',sum(game_points),'0','999' from datacenter.dailyreport_game_play where   l_gid not like '4%' and l_gid !='999' and l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d');


//新疆互通游戏点插入
insert into datacenter.dailyreport_game_play(l_date,l_gid,l_game_name,total_num,user_num,avg_num,game_points,l_source)
SELECT t1.l_date,t1.l_game_id,t2.game_name,t1.l_sum,t1.l_num,t1.l_sum/t1.l_num,l_gp_change,'105'
FROM tvgame.xj_data_game_point t1,datacenter.gp_gameid_cfg t2
WHERE 
t1.l_game_id=t2.game_id
and t1.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d');



//今年新用户数
SELECT count(distinct member_id) FROM `gp_user_info` WHERE create_date>date_format('2011/12/31','%Y/%m/%d')


//全年活跃人数
select count(distinct member_id) from
(SELECT distinct member_id FROM `gp_recharge_his` WHERE l_date>111231
union 
select distinct member_id from point where done_date>date_format('2011/12/31','%Y/%m/%d')
union 
select distinct member_id from point_history where done_date>date_format('2011/12/31','%Y/%m/%d')
union
select distinct vc_user_id as member_id from hlg_login where l_date>111231) as g



///
select mon,count(distinct member_id) from
(SELECT left(l_date,4) as mon,member_id FROM `gp_recharge_his` 
union 
select date_format(done_date,'%y%m') as mon,member_id from point 
union 
select date_format(done_date,'%y%m') as mon,member_id from point_history 
union
select left(l_date,4) as mon , vc_user_id as member_id from hlg_login ) as g

//第一季度活跃



select count(distinct member_id) from
(SELECT distinct member_id FROM `gp_recharge_his` WHERE l_date between 111231 and 120331
union 
select distinct member_id from point where done_date between date_format('2011/12/31','%Y/%m/%d') and date_format('2012/03/31','%Y/%m/%d')
union 
select distinct member_id from point_history where done_date between date_format('2011/12/31','%Y/%m/%d') and date_format('2012/03/31','%Y/%m/%d')
union
select distinct vc_user_id as member_id from hlg_login where l_date between 111231 and 120331) as g
//第二季度活跃
select t2.city_id,count(distinct g.member_id) as total from
(SELECT distinct member_id FROM `gp_recharge_his` WHERE l_date between 121101 and 121130
union 
select distinct member_id from point where done_date between date_format('2012/11/01','%Y/%m/%d') and date_format('2012/11/30','%Y/%m/%d')
union 
select distinct vc_user_id as member_id from hlg_login where l_date between 121101 and 121130) as g,gp_user_info t2
where g.member_id=t2.member_id group by t2.city_id order by total desc limit 10
//第三季度活跃
select count(distinct member_id) from
(SELECT distinct member_id FROM `gp_recharge_his` WHERE l_date between 120630 and 120930
union 
select distinct member_id from point where done_date between date_format('2012/06/30','%Y/%m/%d') and date_format('2012/09/30','%Y/%m/%d')
union 
select distinct member_id from point_history where done_date between date_format('2012/06/30','%Y/%m/%d') and date_format('2012/09/30','%Y/%m/%d')
union
select distinct vc_user_id as member_id from hlg_login where l_date between 120630 and 120930) as g
//第四季度活跃
select count(distinct member_id) from
(SELECT distinct member_id FROM `gp_recharge_his` WHERE l_date between 120101 and 121231
union 
select distinct member_id from point where done_date between date_format('2012/01/01','%Y/%m/%d') and date_format('2012/12/31','%Y/%m/%d')
union 
select distinct member_id from point_history where done_date between date_format('2012/01/01','%Y/%m/%d') and date_format('2012/12/31','%Y/%m/%d') 
union
select distinct vc_user_id as member_id from hlg_login where l_date between 120101 and 121231) as g
//新疆
select count(distinct l_user_id) from
(SELECT distinct `l_user_id` FROM `tv_gp_logs_points`
union 
select distinct l_user_id from tv_gp_logs_recharge 
union
select distinct l_user_id from tv_gp_user_game_login) as g

//地区活跃
SELECT t2.region_code, count( t1.member_id )AS total
FROM`dec_active` t1, gp_user_info_ora t2
WHERE t1.member_id = t2.member_id
GROUP BY t2.region_code
ORDER BY total DESC 
//新用户区域



SELECT date_format('create_date','%Y/%m'),count(DISTINCT vc_stb_id ) 
FROM`gp_user_info` 
GROUP BY date_format('create_date','%Y/%m') 


// 游戏点
SELECT date_format(`done_date` ,'%Y%m%d')AS date, count(*) 
FROM`point` 
WHERE`done_date` 
BETWEEN date_format('2012/11/01','%Y/%m/%d') 
AND date_format('2012/12/01','%Y/%m/%d') 
GROUP BY date




//邮件运营数据


//










===============监控进程列表================
INSERT INTO`gp_platform`.`monitor_moniter_process_list` (
 `process_cfg_id` ,
 `process_cfg_name` ,
 `process_cfg_desc` ,
 `process_cfg_type` 
)
VALUES 
('2002','vps18旧平台kernel','java,quartz','java'),
('2003','vps19旧平台gateway','java,kado','java'),
( '2004','vps19旧平台kernel','java,quartz','java'),
('2005','vps20旧平台gateway','java,kado','java'),
( '2006','vps20旧平台kernel','java,quartz','java')



==========按每天action充值综合====
insert into `xj_data_daily_action_recharge`(`l_date`,`l_lobby_id`,`l_action_id`,`l_money`,`l_num`)
select t1.l_date,t2.l_lobby_id,t1.l_action_id,sum(t1.l_money)/100,count(distinct t1.l_user_id) from 
tv_gp_logs_recharge t1,tv_gp_user_info t2 where t1.l_user_id=t2.l_user_id 
and t1.l_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d')
group by t1.l_date,t2.l_lobby_id,t1.l_action_id



echo "insert into gp_data_center.gp_recharge_his(vc_stb_id,member_id,l_money,l_date,l_time,l_type)
 select vc_stb_id,member_id,l_money,l_date,l_time,l_type 
from datacenter.gp_recharge_his where l_date=130105" |mysql -h10.48.179.112 -udc -pdc

====地区活跃
SELECT t2.region_code,t2.city_id,count(distinct t1.member_id) 
FROM `gp_points_logs` t1,gp_user_info t2 
WHERE t1.l_date between '120101' and '121130'  
and t1.member_id=t2.member_id 
group by t2.region_code,t2.city_id;




========留存率 新=============
select (SELECT count(distinct member_id) FROM `gp_user_info` WHERE done_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY),'%y%m%d') and create_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 2 DAY),'%y%m%d'))
/
(SELECT count(distinct member_id) FROM `gp_user_info` WHERE create_date=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 2 DAY),'%y%m%d')) as stay1



===========云游戏STBid==========
11040020100052544C1A1386

jatmokuoddnkixbc
74.125.224.97 www.google.com
74.125.224.96 accounts.youtube.com
207.97.227.239 github.com


=======================zabbix
#    @zacharyhu 
#   2013.01.22


import socket,sys,re


HOST = sys.argv[1]
PORT = sys.argv[2]
s = None
#print HOST + ' -- PORT :' + PORT
for res in socket.getaddrinfo(HOST, PORT, socket.AF_UNSPEC, socket.SOCK_STREAM):
    af, socktype, proto, canonname, sa = res
    try:
        s = socket.socket(af, socktype, proto)
    except socket.error as msg:
        s = None
        continue
    try:
        s.connect(sa)
    except socket.error as msg:
        s.close()
        s = None
        continue
    break
if s is None:
    #print 'could not open socket'
    #sys.exit(1)
    online = '-1'
#s.sendall('Hello, world')
else:
    data = s.recv(1024)
    s.close()
    #get online data such as online="119/216"
    p = re.compile('online=\"[0-9]{1,3}/[0-9]{1,3}\"')
    p_num = re.compile('[0-9]{1,3}')
    online = p_num.findall(p.findall(data)[0])[0]

#print 'Received', repr(data)
print online



------------------------------------------------------------
UserParameter = online_num_[*],python /usr/local/sbin/testgameport.py $1 $2
------------------------------------------------------------
/usr/local/zabbix/sbin/zabbix_agentd -t online_num_[10.48.179.117,8608]
online_num_[10.48.179.117,8608]               [t|253]