-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost:3306
-- 生成日期: 2013 年 08 月 09 日 16:11
-- 服务器版本: 5.5.27-log
-- PHP 版本: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `wasu_game_data_center`
--

-- --------------------------------------------------------

--
-- 表的结构 `gp_pay_currency_info`
--

CREATE TABLE IF NOT EXISTS `gp_pay_currency_info` (
  `user_id` int(10) NOT NULL COMMENT '用户id',
  `lobby_id` int(5) NOT NULL COMMENT '大厅编号',
  `currency` int(20) NOT NULL COMMENT '云币数量',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '最后更新时间',
  `last_ser_no` varchar(80) NOT NULL COMMENT '最后流水号',
  PRIMARY KEY (`user_id`),
  KEY `lobby_id` (`lobby_id`,`currency`,`update_time`,`last_ser_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='云币基本信息表';

-- --------------------------------------------------------

--
-- 表的结构 `gp_pay_currency_logs`
--

CREATE TABLE IF NOT EXISTS `gp_pay_currency_logs` (
  `id` int(12) NOT NULL AUTO_INCREMENT COMMENT 'id,唯一编号',
  `user_id` int(12) NOT NULL COMMENT '用户编号',
  `lobby_id` int(10) NOT NULL COMMENT '大厅编号',
  `before_chg` varchar(40) NOT NULL COMMENT '变更前云币数',
  `chg_currency` varchar(40) NOT NULL COMMENT '变更云币数',
  `current_currency` varchar(40) NOT NULL COMMENT '变更后云币数',
  `type` int(10) NOT NULL COMMENT '类型（1充值，2消耗）',
  `source` int(10) NOT NULL COMMENT '来源（BOSS、cp、第三方）',
  `action_type` int(10) NOT NULL COMMENT '来源行为(lobby、actionid、第三方类型)',
  `chg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '变更时间',
  `ser_no` varchar(100) NOT NULL COMMENT '流水号',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`lobby_id`,`type`,`source`,`action_type`,`chg_time`,`ser_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='云币变更日志表' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
