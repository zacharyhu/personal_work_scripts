-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost:3306
-- 生成日期: 2013 年 05 月 24 日 12:48
-- 服务器版本: 5.5.27
-- PHP 版本: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `wasu_game_ops`
--

-- --------------------------------------------------------

--
-- 表的结构 `cp_base_info`
--

CREATE TABLE IF NOT EXISTS `cp_base_info` (
  `cp_id` int(15) NOT NULL AUTO_INCREMENT COMMENT 'cp_id',
  `cp_name` varchar(50) NOT NULL COMMENT 'cp名称',
  `cpcode` int(10) NOT NULL COMMENT 'cp分配的cpcode',
  `create_time` date DEFAULT NULL COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '最后更新时间',
  `cp_desc` varchar(200) NOT NULL COMMENT 'CP描述',
  `cp_status` varchar(50) NOT NULL DEFAULT '0' COMMENT '状态，0未接入，1正在接入，2，已上线',
  PRIMARY KEY (`cp_id`),
  KEY `cp_name` (`cp_name`,`cpcode`,`create_time`,`update_time`,`cp_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='CP基础信息表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `cp_base_info`
--

INSERT INTO `cp_base_info` (`cp_id`, `cp_name`, `cpcode`, `create_time`, `update_time`, `cp_desc`, `cp_status`) VALUES
(1, '边锋网络', 501, '2013-05-07', '2013-05-07 06:43:09', '边锋棋牌类', '2'),
(2, '康德', 201, '2013-05-07', '2013-05-07 06:45:03', '妙险岛等休闲类游戏厂商，杭州', '2');

-- --------------------------------------------------------

--
-- 表的结构 `cp_contact_info`
--

CREATE TABLE IF NOT EXISTS `cp_contact_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id索引',
  `cp_id` int(10) NOT NULL COMMENT 'cp编号',
  `contact_name` varchar(20) NOT NULL COMMENT '联系人姓名',
  `contact_phone` varchar(20) NOT NULL COMMENT '联系人电话',
  `contact_email` varchar(50) NOT NULL COMMENT '联系人邮箱',
  `contact_qq` int(20) NOT NULL COMMENT 'QQ',
  `contact_others` varchar(50) NOT NULL COMMENT '其他联系信息',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `contact_type` int(10) NOT NULL COMMENT '联系人类别，1运营，2技术，3商务',
  PRIMARY KEY (`id`),
  KEY `cp_id` (`cp_id`,`update_time`),
  KEY `contact_type` (`contact_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='CP 联系人信息' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `cp_contact_info`
--

INSERT INTO `cp_contact_info` (`id`, `cp_id`, `contact_name`, `contact_phone`, `contact_email`, `contact_qq`, `contact_others`, `update_time`, `contact_type`) VALUES
(1, 1, '马事良', '13838383844', 'mashiliang@bianfeng.com', 11110, 'BP机1133222', '2013-05-07 09:19:21', 1),
(2, 1, '吴家证', '13232222222', 'wujiazheng@bianfeng.com', 0, '', '2013-05-10 01:31:38', 2),
(3, 2, '李斌', '123123123123', 'libin@#@@@3##', 13213213, '131BP机', '2013-05-14 03:21:46', 2);

-- --------------------------------------------------------

--
-- 表的结构 `cp_game_info`
--

CREATE TABLE IF NOT EXISTS `cp_game_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '索引ID',
  `cp_id` int(10) NOT NULL COMMENT 'CPid',
  `game_name` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '游戏名称',
  `game_id` int(10) NOT NULL COMMENT '平台中游戏ID',
  `game_cp_code` int(10) NOT NULL COMMENT '游戏配置的CPCODE',
  `game_action_id` varchar(40) NOT NULL COMMENT '游戏中配置的actionid',
  `game_desc` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT '游戏描述',
  `game_status` int(10) NOT NULL COMMENT '游戏上线状态，0适配中，1扣费测试，2业务测试，3已上线',
  `game_lobby` varchar(200) NOT NULL COMMENT '上线的大厅编号',
  `game_server_ip` varchar(40) NOT NULL COMMENT '服务器地址',
  `game_server_port` varchar(20) NOT NULL COMMENT '端口',
  PRIMARY KEY (`id`),
  KEY `cp_id` (`cp_id`,`game_name`,`game_id`,`game_cp_code`,`game_status`,`game_lobby`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='CP游戏信息表' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `cp_game_info`
--

INSERT INTO `cp_game_info` (`id`, `cp_id`, `game_name`, `game_id`, `game_cp_code`, `game_action_id`, `game_desc`, `game_status`, `game_lobby`, `game_server_ip`, `game_server_port`) VALUES
(1, 1, '双扣', 308, 501, '0', '双扣棋牌', 3, '101,104', '10.48.179.117', '8608'),
(3, 1, '牛牛', 306, 501, '0', '牛牛游戏！！！棋牌类 扣除游戏点的游戏', 3, '101,104,105', '10.48.179.117', '8606'),
(4, 1, '杭州麻将', 305, 501, '0', '杭州麻将，麻将！！', 3, '101,104,105', '10.48.179.117', '8605');

-- --------------------------------------------------------

--
-- 表的结构 `cp_operation_logs`
--

CREATE TABLE IF NOT EXISTS `cp_operation_logs` (
  `arch_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '记录ID',
  `arch_title` varchar(60) CHARACTER SET utf8 NOT NULL COMMENT '记录标题',
  `cp_id` int(60) NOT NULL,
  `arch_content` varchar(2550) CHARACTER SET utf8 NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '作者',
  PRIMARY KEY (`arch_id`),
  KEY `cp_id` (`cp_id`,`update_time`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='cp操作记录表，用于更新信息' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `cp_operation_logs`
--

INSERT INTO `cp_operation_logs` (`arch_id`, `arch_title`, `cp_id`, `arch_content`, `update_time`, `author`) VALUES
(2, '更新三国杀', 1, '更新三国杀。。。。内容。。。', '2013-05-24 02:30:54', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `cp_resource_info`
--

CREATE TABLE IF NOT EXISTS `cp_resource_info` (
  `cp_id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'cpid',
  `ip` varchar(50) NOT NULL COMMENT '应用IP',
  `port` int(10) NOT NULL COMMENT '应用端口',
  `server` varchar(200) NOT NULL COMMENT '占用服务器资源信息',
  `privilege` varchar(200) NOT NULL COMMENT '权限（用户名、密码等）',
  PRIMARY KEY (`cp_id`),
  KEY `cp_id` (`cp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='服务器资源信息' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `cp_tv_box_info`
--

CREATE TABLE IF NOT EXISTS `cp_tv_box_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `code` varchar(30) NOT NULL COMMENT '资产编号',
  `type` varchar(30) NOT NULL COMMENT '机顶盒型号',
  `status` varchar(50) NOT NULL COMMENT '状态',
  `cpid` int(20) NOT NULL COMMENT 'cp编号',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `update_time` (`update_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='机顶盒资产管理' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `gp_game_status_cfg`
--

CREATE TABLE IF NOT EXISTS `gp_game_status_cfg` (
  `ip` int(10) NOT NULL AUTO_INCREMENT,
  `game_status` int(10) NOT NULL COMMENT '状态id',
  `status_name` varchar(30) NOT NULL COMMENT '状态名称',
  PRIMARY KEY (`ip`),
  UNIQUE KEY `game_status` (`game_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `gp_game_status_cfg`
--

INSERT INTO `gp_game_status_cfg` (`ip`, `game_status`, `status_name`) VALUES
(1, 3, '已上线'),
(2, 2, '业务对接'),
(3, 1, '技术对接'),
(4, 0, '适配过程中');

-- --------------------------------------------------------

--
-- 表的结构 `gp_lobby_cfg`
--

CREATE TABLE IF NOT EXISTS `gp_lobby_cfg` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `game_lobby` int(10) NOT NULL COMMENT '大厅编号',
  `lobby_name` varchar(50) NOT NULL COMMENT '大厅名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='游戏大厅配置' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `gp_lobby_cfg`
--

INSERT INTO `gp_lobby_cfg` (`id`, `game_lobby`, `lobby_name`) VALUES
(1, 101, '杭州游戏大厅'),
(2, 104, '拓展游戏大厅'),
(3, 105, '新疆游戏大厅'),
(4, 401, '测试平台'),
(5, 402, '验收平台');

-- --------------------------------------------------------

--
-- 表的结构 `ops_auth_assignment`
--

CREATE TABLE IF NOT EXISTS `ops_auth_assignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ops_auth_assignment`
--

INSERT INTO `ops_auth_assignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Authority', '1', '', 's:0:"";'),
('Authority', '2', '', 's:0:"";'),
('游戏接入', '2', '', 's:0:"";'),
('管理员', '1', '', 's:0:"";'),
('管理员', '2', '', 's:0:"";'),
('访客', '3', '', 's:0:"";');

-- --------------------------------------------------------

--
-- 表的结构 `ops_auth_items`
--

CREATE TABLE IF NOT EXISTS `ops_auth_items` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ops_auth_items`
--

INSERT INTO `ops_auth_items` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Authority', 2, NULL, NULL, NULL),
('CpBaseInfoAdmin', 0, NULL, NULL, 'N;'),
('CpBaseInfoAdministrating', 1, NULL, NULL, 'N;'),
('CpBaseInfoCreate', 0, NULL, NULL, 'N;'),
('CpBaseInfoDelete', 0, NULL, NULL, 'N;'),
('CpBaseInfoIndex', 0, NULL, NULL, 'N;'),
('CpBaseInfoUpdate', 0, NULL, NULL, 'N;'),
('CpBaseInfoView', 0, NULL, NULL, 'N;'),
('CpBaseInfoViewing', 1, NULL, NULL, 'N;'),
('CpContactInfoAdmin', 0, NULL, NULL, 'N;'),
('CpContactInfoAdministrating', 1, NULL, NULL, 'N;'),
('CpContactInfoCreate', 0, NULL, NULL, 'N;'),
('CpContactInfoDelete', 0, NULL, NULL, 'N;'),
('CpContactInfoIndex', 0, NULL, NULL, 'N;'),
('CpContactInfoUpdate', 0, NULL, NULL, 'N;'),
('CpContactInfoView', 0, NULL, NULL, 'N;'),
('CpContactInfoViewing', 1, NULL, NULL, 'N;'),
('CpGameInfoAdmin', 0, NULL, NULL, 'N;'),
('CpGameInfoAdministrating', 1, NULL, NULL, 'N;'),
('CpGameInfoCreate', 0, NULL, NULL, 'N;'),
('CpGameInfoDelete', 0, NULL, NULL, 'N;'),
('CpGameInfoIndex', 0, NULL, NULL, 'N;'),
('CpGameInfoUpdate', 0, NULL, NULL, 'N;'),
('CpGameInfoView', 0, NULL, NULL, 'N;'),
('CpGameInfoViewing', 1, NULL, NULL, 'N;'),
('CpOperationLogsAdmin', 0, NULL, NULL, 'N;'),
('CpOperationLogsAdministrating', 1, NULL, NULL, 'N;'),
('CpOperationLogsCreate', 0, NULL, NULL, 'N;'),
('CpOperationLogsDelete', 0, NULL, NULL, 'N;'),
('CpOperationLogsIndex', 0, NULL, NULL, 'N;'),
('CpOperationLogsUpdate', 0, NULL, NULL, 'N;'),
('CpOperationLogsView', 0, NULL, NULL, 'N;'),
('CpOperationLogsViewing', 1, NULL, NULL, 'N;'),
('CpResourceInfoAdmin', 0, NULL, NULL, 'N;'),
('CpResourceInfoAdministrating', 1, NULL, NULL, 'N;'),
('CpResourceInfoCreate', 0, NULL, NULL, 'N;'),
('CpResourceInfoDelete', 0, NULL, NULL, 'N;'),
('CpResourceInfoIndex', 0, NULL, NULL, 'N;'),
('CpResourceInfoUpdate', 0, NULL, NULL, 'N;'),
('CpResourceInfoView', 0, NULL, NULL, 'N;'),
('CpResourceInfoViewing', 1, NULL, NULL, 'N;'),
('CpTvBoxInfoAdmin', 0, NULL, NULL, 'N;'),
('CpTvBoxInfoAdministrating', 1, NULL, NULL, 'N;'),
('CpTvBoxInfoCreate', 0, NULL, NULL, 'N;'),
('CpTvBoxInfoDelete', 0, NULL, NULL, 'N;'),
('CpTvBoxInfoIndex', 0, NULL, NULL, 'N;'),
('CpTvBoxInfoUpdate', 0, NULL, NULL, 'N;'),
('CpTvBoxInfoView', 0, NULL, NULL, 'N;'),
('CpTvBoxInfoViewing', 1, NULL, NULL, 'N;'),
('GpGameStatusCfgAdmin', 0, NULL, NULL, 'N;'),
('GpGameStatusCfgAdministrating', 1, NULL, NULL, 'N;'),
('GpGameStatusCfgCreate', 0, NULL, NULL, 'N;'),
('GpGameStatusCfgDelete', 0, NULL, NULL, 'N;'),
('GpGameStatusCfgIndex', 0, NULL, NULL, 'N;'),
('GpGameStatusCfgUpdate', 0, NULL, NULL, 'N;'),
('GpGameStatusCfgView', 0, NULL, NULL, 'N;'),
('GpGameStatusCfgViewing', 1, NULL, NULL, 'N;'),
('GpLobbyCfgAdmin', 0, NULL, NULL, 'N;'),
('GpLobbyCfgAdministrating', 1, NULL, NULL, 'N;'),
('GpLobbyCfgCreate', 0, NULL, NULL, 'N;'),
('GpLobbyCfgDelete', 0, NULL, NULL, 'N;'),
('GpLobbyCfgIndex', 0, NULL, NULL, 'N;'),
('GpLobbyCfgUpdate', 0, NULL, NULL, 'N;'),
('GpLobbyCfgView', 0, NULL, NULL, 'N;'),
('GpLobbyCfgViewing', 1, NULL, NULL, 'N;'),
('OpsUserAdmin', 0, NULL, NULL, 'N;'),
('OpsUserAdministrating', 1, NULL, NULL, 'N;'),
('OpsUserCreate', 0, NULL, NULL, 'N;'),
('OpsUserDelete', 0, NULL, NULL, 'N;'),
('OpsUserIndex', 0, NULL, NULL, 'N;'),
('OpsUserUpdate', 0, NULL, NULL, 'N;'),
('OpsUserView', 0, NULL, NULL, 'N;'),
('OpsUserViewing', 1, NULL, NULL, 'N;'),
('srbac@AuthitemAdministrating', 1, NULL, NULL, 'N;'),
('srbac@AuthitemAssign', 0, NULL, NULL, 'N;'),
('srbac@AuthitemAssignments', 0, NULL, NULL, 'N;'),
('srbac@AuthitemAuto', 0, NULL, NULL, 'N;'),
('srbac@AuthitemAutocomplete', 0, NULL, NULL, 'N;'),
('srbac@AuthitemAutoCreateItems', 0, NULL, NULL, 'N;'),
('srbac@AuthitemAutoDeleteItems', 0, NULL, NULL, 'N;'),
('srbac@AuthitemClearObsolete', 0, NULL, NULL, 'N;'),
('srbac@AuthitemConfirm', 0, NULL, NULL, 'N;'),
('srbac@AuthitemCreate', 0, NULL, NULL, 'N;'),
('srbac@AuthitemDelete', 0, NULL, NULL, 'N;'),
('srbac@AuthitemDeleteObsolete', 0, NULL, NULL, 'N;'),
('srbac@AuthitemEditAllowed', 0, NULL, NULL, 'N;'),
('srbac@AuthitemFrontPage', 0, NULL, NULL, 'N;'),
('srbac@AuthitemGetCleverOpers', 0, NULL, NULL, 'N;'),
('srbac@AuthitemGetOpers', 0, NULL, NULL, 'N;'),
('srbac@AuthitemGetRoles', 0, NULL, NULL, 'N;'),
('srbac@AuthitemGetTasks', 0, NULL, NULL, 'N;'),
('srbac@AuthitemInstall', 0, NULL, NULL, 'N;'),
('srbac@AuthitemList', 0, NULL, NULL, 'N;'),
('srbac@AuthitemManage', 0, NULL, NULL, 'N;'),
('srbac@AuthitemSaveAllowed', 0, NULL, NULL, 'N;'),
('srbac@AuthitemScan', 0, NULL, NULL, 'N;'),
('srbac@AuthitemShow', 0, NULL, NULL, 'N;'),
('srbac@AuthitemShowAssignments', 0, NULL, NULL, 'N;'),
('srbac@AuthitemUpdate', 0, NULL, NULL, 'N;'),
('srbac@AuthitemViewing', 1, NULL, NULL, 'N;'),
('厂商', 2, 'CP', '', 's:0:"";'),
('商务运营', 2, '商务运营', '', 's:0:"";'),
('平台开发', 2, '平台开发', '', 's:0:"";'),
('查看', 1, '查看', '', 's:0:"";'),
('查询编辑操作', 1, '查询编辑操作', '', 's:0:"";'),
('游戏接入', 2, '游戏接入组', '', 's:0:"";'),
('管理员', 2, '管理员', '', 's:0:"";'),
('系统管理', 1, '系统管理', '', 's:0:"";'),
('访客', 2, '访客', '', 's:0:"";');

-- --------------------------------------------------------

--
-- 表的结构 `ops_auth_item_child`
--

CREATE TABLE IF NOT EXISTS `ops_auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ops_auth_item_child`
--

INSERT INTO `ops_auth_item_child` (`parent`, `child`) VALUES
('CpBaseInfoAdministrating', 'CpBaseInfoAdmin'),
('查看', 'CpBaseInfoAdmin'),
('查询编辑操作', 'CpBaseInfoAdmin'),
('系统管理', 'CpBaseInfoAdmin'),
('CpBaseInfoAdministrating', 'CpBaseInfoCreate'),
('查询编辑操作', 'CpBaseInfoCreate'),
('系统管理', 'CpBaseInfoCreate'),
('CpBaseInfoAdministrating', 'CpBaseInfoDelete'),
('查询编辑操作', 'CpBaseInfoDelete'),
('系统管理', 'CpBaseInfoDelete'),
('CpBaseInfoAdministrating', 'CpBaseInfoIndex'),
('查看', 'CpBaseInfoIndex'),
('查询编辑操作', 'CpBaseInfoIndex'),
('系统管理', 'CpBaseInfoIndex'),
('CpBaseInfoAdministrating', 'CpBaseInfoUpdate'),
('查询编辑操作', 'CpBaseInfoUpdate'),
('系统管理', 'CpBaseInfoUpdate'),
('CpBaseInfoAdministrating', 'CpBaseInfoView'),
('查看', 'CpBaseInfoView'),
('查询编辑操作', 'CpBaseInfoView'),
('系统管理', 'CpBaseInfoView'),
('CpContactInfoAdministrating', 'CpContactInfoAdmin'),
('查看', 'CpContactInfoAdmin'),
('查询编辑操作', 'CpContactInfoAdmin'),
('系统管理', 'CpContactInfoAdmin'),
('CpContactInfoAdministrating', 'CpContactInfoCreate'),
('查询编辑操作', 'CpContactInfoCreate'),
('系统管理', 'CpContactInfoCreate'),
('CpContactInfoAdministrating', 'CpContactInfoDelete'),
('查询编辑操作', 'CpContactInfoDelete'),
('系统管理', 'CpContactInfoDelete'),
('CpContactInfoAdministrating', 'CpContactInfoIndex'),
('查看', 'CpContactInfoIndex'),
('查询编辑操作', 'CpContactInfoIndex'),
('系统管理', 'CpContactInfoIndex'),
('CpContactInfoAdministrating', 'CpContactInfoUpdate'),
('查询编辑操作', 'CpContactInfoUpdate'),
('系统管理', 'CpContactInfoUpdate'),
('CpContactInfoAdministrating', 'CpContactInfoView'),
('查看', 'CpContactInfoView'),
('查询编辑操作', 'CpContactInfoView'),
('系统管理', 'CpContactInfoView'),
('CpGameInfoAdministrating', 'CpGameInfoAdmin'),
('查看', 'CpGameInfoAdmin'),
('查询编辑操作', 'CpGameInfoAdmin'),
('系统管理', 'CpGameInfoAdmin'),
('CpGameInfoAdministrating', 'CpGameInfoCreate'),
('查询编辑操作', 'CpGameInfoCreate'),
('系统管理', 'CpGameInfoCreate'),
('CpGameInfoAdministrating', 'CpGameInfoDelete'),
('查询编辑操作', 'CpGameInfoDelete'),
('系统管理', 'CpGameInfoDelete'),
('CpGameInfoAdministrating', 'CpGameInfoIndex'),
('查看', 'CpGameInfoIndex'),
('查询编辑操作', 'CpGameInfoIndex'),
('系统管理', 'CpGameInfoIndex'),
('CpGameInfoAdministrating', 'CpGameInfoUpdate'),
('查询编辑操作', 'CpGameInfoUpdate'),
('系统管理', 'CpGameInfoUpdate'),
('CpGameInfoAdministrating', 'CpGameInfoView'),
('查看', 'CpGameInfoView'),
('查询编辑操作', 'CpGameInfoView'),
('系统管理', 'CpGameInfoView'),
('CpOperationLogsAdministrating', 'CpOperationLogsAdmin'),
('查询编辑操作', 'CpOperationLogsAdmin'),
('系统管理', 'CpOperationLogsAdmin'),
('CpOperationLogsAdministrating', 'CpOperationLogsCreate'),
('查询编辑操作', 'CpOperationLogsCreate'),
('系统管理', 'CpOperationLogsCreate'),
('CpOperationLogsAdministrating', 'CpOperationLogsDelete'),
('查询编辑操作', 'CpOperationLogsDelete'),
('系统管理', 'CpOperationLogsDelete'),
('CpOperationLogsAdministrating', 'CpOperationLogsIndex'),
('查询编辑操作', 'CpOperationLogsIndex'),
('系统管理', 'CpOperationLogsIndex'),
('CpOperationLogsAdministrating', 'CpOperationLogsUpdate'),
('查询编辑操作', 'CpOperationLogsUpdate'),
('系统管理', 'CpOperationLogsUpdate'),
('CpOperationLogsAdministrating', 'CpOperationLogsView'),
('查询编辑操作', 'CpOperationLogsView'),
('系统管理', 'CpOperationLogsView'),
('CpResourceInfoAdministrating', 'CpResourceInfoAdmin'),
('查看', 'CpResourceInfoAdmin'),
('查询编辑操作', 'CpResourceInfoAdmin'),
('系统管理', 'CpResourceInfoAdmin'),
('CpResourceInfoAdministrating', 'CpResourceInfoCreate'),
('查询编辑操作', 'CpResourceInfoCreate'),
('系统管理', 'CpResourceInfoCreate'),
('CpResourceInfoAdministrating', 'CpResourceInfoDelete'),
('查询编辑操作', 'CpResourceInfoDelete'),
('系统管理', 'CpResourceInfoDelete'),
('CpResourceInfoAdministrating', 'CpResourceInfoIndex'),
('查看', 'CpResourceInfoIndex'),
('查询编辑操作', 'CpResourceInfoIndex'),
('系统管理', 'CpResourceInfoIndex'),
('CpResourceInfoAdministrating', 'CpResourceInfoUpdate'),
('查询编辑操作', 'CpResourceInfoUpdate'),
('系统管理', 'CpResourceInfoUpdate'),
('CpResourceInfoAdministrating', 'CpResourceInfoView'),
('查看', 'CpResourceInfoView'),
('查询编辑操作', 'CpResourceInfoView'),
('系统管理', 'CpResourceInfoView'),
('CpTvBoxInfoAdministrating', 'CpTvBoxInfoAdmin'),
('查看', 'CpTvBoxInfoAdmin'),
('查询编辑操作', 'CpTvBoxInfoAdmin'),
('系统管理', 'CpTvBoxInfoAdmin'),
('CpTvBoxInfoAdministrating', 'CpTvBoxInfoCreate'),
('查询编辑操作', 'CpTvBoxInfoCreate'),
('系统管理', 'CpTvBoxInfoCreate'),
('CpTvBoxInfoAdministrating', 'CpTvBoxInfoDelete'),
('查询编辑操作', 'CpTvBoxInfoDelete'),
('系统管理', 'CpTvBoxInfoDelete'),
('CpTvBoxInfoAdministrating', 'CpTvBoxInfoIndex'),
('查看', 'CpTvBoxInfoIndex'),
('查询编辑操作', 'CpTvBoxInfoIndex'),
('系统管理', 'CpTvBoxInfoIndex'),
('CpTvBoxInfoAdministrating', 'CpTvBoxInfoUpdate'),
('查询编辑操作', 'CpTvBoxInfoUpdate'),
('系统管理', 'CpTvBoxInfoUpdate'),
('CpTvBoxInfoAdministrating', 'CpTvBoxInfoView'),
('查看', 'CpTvBoxInfoView'),
('查询编辑操作', 'CpTvBoxInfoView'),
('系统管理', 'CpTvBoxInfoView'),
('GpGameStatusCfgAdministrating', 'GpGameStatusCfgAdmin'),
('查看', 'GpGameStatusCfgAdmin'),
('查询编辑操作', 'GpGameStatusCfgAdmin'),
('系统管理', 'GpGameStatusCfgAdmin'),
('GpGameStatusCfgAdministrating', 'GpGameStatusCfgCreate'),
('查询编辑操作', 'GpGameStatusCfgCreate'),
('系统管理', 'GpGameStatusCfgCreate'),
('GpGameStatusCfgAdministrating', 'GpGameStatusCfgDelete'),
('查询编辑操作', 'GpGameStatusCfgDelete'),
('系统管理', 'GpGameStatusCfgDelete'),
('GpGameStatusCfgAdministrating', 'GpGameStatusCfgIndex'),
('查看', 'GpGameStatusCfgIndex'),
('查询编辑操作', 'GpGameStatusCfgIndex'),
('系统管理', 'GpGameStatusCfgIndex'),
('GpGameStatusCfgAdministrating', 'GpGameStatusCfgUpdate'),
('查询编辑操作', 'GpGameStatusCfgUpdate'),
('系统管理', 'GpGameStatusCfgUpdate'),
('GpGameStatusCfgAdministrating', 'GpGameStatusCfgView'),
('查看', 'GpGameStatusCfgView'),
('查询编辑操作', 'GpGameStatusCfgView'),
('系统管理', 'GpGameStatusCfgView'),
('GpLobbyCfgAdministrating', 'GpLobbyCfgAdmin'),
('查看', 'GpLobbyCfgAdmin'),
('查询编辑操作', 'GpLobbyCfgAdmin'),
('系统管理', 'GpLobbyCfgAdmin'),
('GpLobbyCfgAdministrating', 'GpLobbyCfgCreate'),
('查询编辑操作', 'GpLobbyCfgCreate'),
('系统管理', 'GpLobbyCfgCreate'),
('GpLobbyCfgAdministrating', 'GpLobbyCfgDelete'),
('查询编辑操作', 'GpLobbyCfgDelete'),
('系统管理', 'GpLobbyCfgDelete'),
('GpLobbyCfgAdministrating', 'GpLobbyCfgIndex'),
('查看', 'GpLobbyCfgIndex'),
('查询编辑操作', 'GpLobbyCfgIndex'),
('系统管理', 'GpLobbyCfgIndex'),
('GpLobbyCfgAdministrating', 'GpLobbyCfgUpdate'),
('查询编辑操作', 'GpLobbyCfgUpdate'),
('系统管理', 'GpLobbyCfgUpdate'),
('GpLobbyCfgAdministrating', 'GpLobbyCfgView'),
('查看', 'GpLobbyCfgView'),
('查询编辑操作', 'GpLobbyCfgView'),
('系统管理', 'GpLobbyCfgView'),
('OpsUserAdministrating', 'OpsUserAdmin'),
('系统管理', 'OpsUserAdmin'),
('OpsUserAdministrating', 'OpsUserCreate'),
('系统管理', 'OpsUserCreate'),
('OpsUserAdministrating', 'OpsUserDelete'),
('系统管理', 'OpsUserDelete'),
('OpsUserAdministrating', 'OpsUserIndex'),
('系统管理', 'OpsUserIndex'),
('OpsUserAdministrating', 'OpsUserUpdate'),
('系统管理', 'OpsUserUpdate'),
('OpsUserAdministrating', 'OpsUserView'),
('系统管理', 'OpsUserView'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemAssign'),
('系统管理', 'srbac@AuthitemAssign'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemAssignments'),
('系统管理', 'srbac@AuthitemAssignments'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemAuto'),
('系统管理', 'srbac@AuthitemAuto'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemAutocomplete'),
('系统管理', 'srbac@AuthitemAutocomplete'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemAutoCreateItems'),
('系统管理', 'srbac@AuthitemAutoCreateItems'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemAutoDeleteItems'),
('系统管理', 'srbac@AuthitemAutoDeleteItems'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemClearObsolete'),
('系统管理', 'srbac@AuthitemClearObsolete'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemConfirm'),
('系统管理', 'srbac@AuthitemConfirm'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemCreate'),
('系统管理', 'srbac@AuthitemCreate'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemDelete'),
('系统管理', 'srbac@AuthitemDelete'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemDeleteObsolete'),
('系统管理', 'srbac@AuthitemDeleteObsolete'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemEditAllowed'),
('系统管理', 'srbac@AuthitemEditAllowed'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemFrontPage'),
('系统管理', 'srbac@AuthitemFrontPage'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemGetCleverOpers'),
('系统管理', 'srbac@AuthitemGetCleverOpers'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemGetOpers'),
('系统管理', 'srbac@AuthitemGetOpers'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemGetRoles'),
('系统管理', 'srbac@AuthitemGetRoles'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemGetTasks'),
('系统管理', 'srbac@AuthitemGetTasks'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemInstall'),
('系统管理', 'srbac@AuthitemInstall'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemList'),
('系统管理', 'srbac@AuthitemList'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemManage'),
('系统管理', 'srbac@AuthitemManage'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemSaveAllowed'),
('系统管理', 'srbac@AuthitemSaveAllowed'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemScan'),
('系统管理', 'srbac@AuthitemScan'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemShow'),
('系统管理', 'srbac@AuthitemShow'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemShowAssignments'),
('系统管理', 'srbac@AuthitemShowAssignments'),
('srbac@AuthitemAdministrating', 'srbac@AuthitemUpdate'),
('系统管理', 'srbac@AuthitemUpdate'),
('访客', '查看'),
('商务运营', '查询编辑操作'),
('平台开发', '查询编辑操作'),
('游戏接入', '查询编辑操作'),
('管理员', '查询编辑操作'),
('管理员', '系统管理');

-- --------------------------------------------------------

--
-- 表的结构 `ops_user`
--

CREATE TABLE IF NOT EXISTS `ops_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `login_name` varchar(20) NOT NULL COMMENT '登录名',
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `groupid` int(10) NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `phone` int(20) NOT NULL COMMENT '电话',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_name` (`login_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='后台用户表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `ops_user`
--

INSERT INTO `ops_user` (`id`, `login_name`, `username`, `password`, `groupid`, `update_date`, `email`, `phone`) VALUES
(1, 'admin', 'admin', 'e19d5cd5af0378da05f63f891c7467af', 0, '2013-05-16 07:27:06', 'admin@admin', 1999888833),
(2, 'hzw', 'hzw', 'e19d5cd5af0378da05f63f891c7467af', 0, '2013-05-16 07:27:16', 'huzhiw@wasu.com.cn', 111112222),
(3, 'xuxj', 'xuxj', 'e19d5cd5af0378da05f63f891c7467af', 0, '2013-05-16 07:31:20', 'xuxianj@wasu.com.cn', 2147483647);

--
-- 限制导出的表
--

--
-- 限制表 `ops_auth_assignment`
--
ALTER TABLE `ops_auth_assignment`
  ADD CONSTRAINT `ops_auth_assignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `ops_auth_items` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `ops_auth_item_child`
--
ALTER TABLE `ops_auth_item_child`
  ADD CONSTRAINT `ops_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `ops_auth_items` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ops_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `ops_auth_items` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
