CREATE TABLE IF NOT EXISTS `gp_game_click_recent` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'ʱ��',
  `gate_uri` varchar(30) NOT NULL COMMENT '����',
  `gameid` int(10) NOT NULL COMMENT '��Ϸid',
  KEY `time` (`time`,`gate_uri`,`gameid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='��Ϸʵʱ���ͳ��';


CREATE TABLE IF NOT EXISTS `gp_gate_login_recent` (
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '��¼ʱ��',
  `gate_uri` varchar(30) NOT NULL COMMENT '���ʴ���',
  `stbid` varchar(60) NOT NULL COMMENT '�����к�',
  `remote_ip` varchar(30) NOT NULL COMMENT 'Զ�̿ͻ���id',
  KEY `login_time` (`login_time`,`gate_uri`,`stbid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='�û���¼��¼��--ngx_luaͳ��';