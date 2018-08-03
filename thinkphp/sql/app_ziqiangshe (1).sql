-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-07-27 08:14:48
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `app_ziqiangshe`
--

-- --------------------------------------------------------

--
-- 表的结构 `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(80) DEFAULT NULL,
  `anthorid` int(11) DEFAULT NULL,
  `tag` varchar(80) DEFAULT NULL COMMENT '标签',
  `content` text,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pageview` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='博客表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `sign`
--

CREATE TABLE IF NOT EXISTS `sign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `sex` tinyint(1) DEFAULT '0' COMMENT '0-未知1-男2-女',
  `dept1` varchar(30) NOT NULL,
  `dept2` varchar(30) DEFAULT NULL,
  `class` varchar(30) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `qq` int(30) DEFAULT NULL,
  `tel` int(30) DEFAULT NULL,
  `dorm` varchar(30) DEFAULT NULL COMMENT '宿舍',
  `status` tinyint(1) DEFAULT '0' COMMENT '0-待审核1-通过2-忽略',
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `realname` varchar(20) DEFAULT NULL,
  `introduce` varchar(255) DEFAULT NULL,
  `sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-未知1-男2-女',
  `class` varchar(40) DEFAULT NULL,
  `qq` int(20) DEFAULT NULL,
  `tel` int(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL COMMENT '职务',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='社员表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `realname`, `introduce`, `sex`, `class`, `qq`, `tel`, `email`, `position`, `created`, `role`) VALUES
(1, 'xzfff', 'wqZMQtV37/w8I', '谢泽丰', NULL, 0, NULL, NULL, NULL, NULL, NULL, '2017-07-17 17:09:43', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
