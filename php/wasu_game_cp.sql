-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost:3306
-- 生成日期: 2013 年 05 月 03 日 11:37
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
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '最后更新时间',
  `cp_desc` varchar(200) NOT NULL COMMENT 'CP描述',
  `cp_status` int(6) NOT NULL DEFAULT '0' COMMENT '状态，0未接入，1正在接入，2，已上线',
  PRIMARY KEY (`cp_id`),
  KEY `cp_name` (`cp_name`,`cpcode`,`create_time`,`update_time`,`cp_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='CP基础信息表' AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id`),
  KEY `cp_id` (`cp_id`,`update_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='CP 联系人信息' AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id`),
  KEY `cp_id` (`cp_id`,`game_name`,`game_id`,`game_cp_code`,`game_status`,`game_lobby`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='CP游戏信息表' AUTO_INCREMENT=1 ;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
