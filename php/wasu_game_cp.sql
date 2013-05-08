-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost:3306
-- 生成日期: 2013 年 05 月 07 日 11:28
-- 服务器版本: 5.5.27
-- PHP 版本: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `wasu_game_cp`
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
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  `contact_type` int(10) NOT NULL COMMENT '联系人类别，1运营，2技术，3商务',
  PRIMARY KEY (`id`),
  KEY `cp_id` (`cp_id`,`update_time`),
  KEY `contact_type` (`contact_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='CP 联系人信息' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `cp_contact_info`
--

INSERT INTO `cp_contact_info` (`id`, `cp_id`, `contact_name`, `contact_phone`, `contact_email`, `update_time`, `contact_type`) VALUES
(1, 1, '运营-马事良', '13838383844', 'mashiliang@bianfeng.com', '2013-05-07 09:19:21', 0);

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
  `game_lobby` int(50) NOT NULL COMMENT '上线的大厅编号',
  `game_server_ip` varchar(40) NOT NULL COMMENT '服务器地址',
  `game_server_port` varchar(20) NOT NULL COMMENT '端口',
  PRIMARY KEY (`id`),
  KEY `cp_id` (`cp_id`,`game_name`,`game_id`,`game_cp_code`,`game_status`,`game_lobby`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='CP游戏信息表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `cp_manage_user`
--

CREATE TABLE IF NOT EXISTS `cp_manage_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `Username` varchar(20) NOT NULL COMMENT '用户名',
  `Password` varchar(60) NOT NULL COMMENT '密码',
  `email` varchar(100) NOT NULL COMMENT '邮箱',
  `groupid` int(10) NOT NULL COMMENT '组id',
  PRIMARY KEY (`id`),
  KEY `Username` (`Username`,`groupid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='平台登录用户表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `cp_manage_user`
--

INSERT INTO `cp_manage_user` (`id`, `Username`, `Password`, `email`, `groupid`) VALUES
(1, 'admin', 'admin', 'admin@wasu.com.cn', 0);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
