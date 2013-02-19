CREATE TABLE IF NOT EXISTS `gp_game_click_recent` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '时间',
  `gate_uri` varchar(30) NOT NULL COMMENT '大厅',
  `gameid` int(10) NOT NULL COMMENT '游戏id',
  KEY `time` (`time`,`gate_uri`,`gameid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='游戏实时点击统计';


CREATE TABLE IF NOT EXISTS `gp_gate_login_recent` (
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '登录时间',
  `gate_uri` varchar(30) NOT NULL COMMENT '访问大厅',
  `stbid` varchar(60) NOT NULL COMMENT '机顶盒号',
  `remote_ip` varchar(30) NOT NULL COMMENT '远程客户端id',
  KEY `login_time` (`login_time`,`gate_uri`,`stbid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户登录记录表--ngx_lua统计';