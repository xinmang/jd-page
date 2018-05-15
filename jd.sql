-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 �?05 �?15 �?23:19
-- 服务器版本: 5.5.47
-- PHP 版本: 5.6.16

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `jd`
--

-- --------------------------------------------------------

--
-- 表的结构 `jd_order`
--

CREATE TABLE IF NOT EXISTS `jd_order` (
  `oid` int(10) NOT NULL AUTO_INCREMENT,
  `opid` varchar(30) NOT NULL,
  `onum` int(10) NOT NULL,
  `addtime` int(20) NOT NULL,
  `ouid` int(11) NOT NULL,
  PRIMARY KEY (`oid`),
  KEY `oid` (`oid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `jd_order`
--

INSERT INTO `jd_order` (`oid`, `opid`, `onum`, `addtime`, `ouid`) VALUES
(1, '1', 1, 0, 1),
(20, '2', 1, 0, 2),
(14, '1', 1, 0, 1),
(23, '2', 1, 0, 1),
(22, '4', 1, 0, 1),
(21, '4', 1, 0, 1),
(10, '1', 1, 0, 1),
(11, '1', 1, 0, 1),
(19, '1', 1, 0, 1),
(24, '2', 1, 1512282780, 1),
(25, '9', 1, 1512286898, 1);

-- --------------------------------------------------------

--
-- 表的结构 `jd_product`
--

CREATE TABLE IF NOT EXISTS `jd_product` (
  `pid` int(5) NOT NULL AUTO_INCREMENT,
  `pname` varchar(50) NOT NULL,
  `pimg` varchar(1000) NOT NULL,
  `pdetail` varchar(50) NOT NULL,
  `pnum` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `jd_product`
--

INSERT INTO `jd_product` (`pid`, `pname`, `pimg`, `pdetail`, `pnum`, `price`) VALUES
(1, '笔记本电脑拯救者', 'upload/1.jpg', '系列 拯救者 型号 拯救者R720 颜色 黑色', 10, 6399),
(2, '联想(Lenovo)拯救者R720 15.6英寸游戏笔记本电脑(i5-7300HQ 8G 1T+12', '', '操作系统 操作系统 Win 10 家庭中文版', 999, 6999),
(3, '联想(Lenovo)拯救者R720 15.6英寸游戏笔记本电脑(i5-7300HQ 8G 1T+12', '', '操作系统 操作系统 Win 10 家庭中文版', 999, 6999),
(4, '联想(Lenovo)拯救者R720 15.6英寸游戏笔记本电脑', '', '操作系统 操作系统 Win 10 家庭中文版', 999, 6999),
(9, 'test', '', 'test', 12, 1234);

-- --------------------------------------------------------

--
-- 表的结构 `jd_shopcar`
--

CREATE TABLE IF NOT EXISTS `jd_shopcar` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `spid` varchar(50) NOT NULL,
  `snum` int(10) NOT NULL,
  `suid` int(10) NOT NULL,
  PRIMARY KEY (`sid`),
  KEY `sid` (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- 转存表中的数据 `jd_shopcar`
--

INSERT INTO `jd_shopcar` (`sid`, `spid`, `snum`, `suid`) VALUES
(69, '1', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `jd_user`
--

CREATE TABLE IF NOT EXISTS `jd_user` (
  `uname` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `tel` int(11) NOT NULL,
  `uid` int(20) NOT NULL AUTO_INCREMENT,
  KEY `uid` (`uid`),
  KEY `uid_2` (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `jd_user`
--

INSERT INTO `jd_user` (`uname`, `pwd`, `tel`, `uid`) VALUES
('admin', '88888888', 123, 1),
('test', '123', 123, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
