-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: 192.168.26.10:3306
-- 生成日期: 2013 年 08 月 01 日 09:44
-- 服务器版本: 5.5.28-log
-- PHP 版本: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `tvgame`
--

-- --------------------------------------------------------

--
-- 表的结构 `gp_sd_user_info`
--

CREATE TABLE IF NOT EXISTS `gp_sd_user_info` (
  `customer_id` varchar(50) DEFAULT NULL COMMENT '客户ID',
  `user_id` varchar(50) NOT NULL DEFAULT '' COMMENT '用户ID',
  `user_name` varchar(50) DEFAULT NULL COMMENT '用户名',
  `address_line` varchar(200) NOT NULL COMMENT '安装地址',
  `city` varchar(50) NOT NULL COMMENT '运营商',
  `state_or_province` varchar(50) NOT NULL COMMENT '省份',
  `country` varchar(50) NOT NULL COMMENT '国家',
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `postal_code` varchar(50) NOT NULL COMMENT '邮编',
  `primary_phone` varchar(50) NOT NULL COMMENT '电话',
  `device_type` varchar(50) DEFAULT NULL COMMENT '物理资源类型（智能卡：1）',
  `equipment_id` varchar(50) DEFAULT NULL COMMENT '物理资源ID（智能卡号）',
  PRIMARY KEY (`user_id`),
  KEY `customer_id` (`customer_id`),
  KEY `user_name` (`user_name`),
  KEY `device_type` (`device_type`),
  KEY `equipment_id` (`equipment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='山东用户信息表ES接口使用';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
