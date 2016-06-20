-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 06 月 20 日 11:41
-- 服务器版本: 5.5.47
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `huachuang`
--

-- --------------------------------------------------------

--
-- 表的结构 `hc_admin`
--

CREATE TABLE IF NOT EXISTS `hc_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `pwd` char(44) CHARACTER SET utf8 NOT NULL,
  `salt` char(44) CHARACTER SET utf8 NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `hc_admin`
--

INSERT INTO `hc_admin` (`id`, `username`, `pwd`, `salt`, `time`) VALUES
(17, 'admin', '5cdb03efa1c3aad4703381c935e7c74650b4ffb8', 'E4+cLgSnqH7KWPrm0cC5UqodQwVmEBnYxC37Ic4tAKc=', '2016-06-02 01:58:31');

-- --------------------------------------------------------

--
-- 表的结构 `hc_goods`
--

CREATE TABLE IF NOT EXISTS `hc_goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `href` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '图片',
  `content` text CHARACTER SET utf8 NOT NULL COMMENT '内容',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `hc_goods`
--

INSERT INTO `hc_goods` (`id`, `href`, `content`, `time`) VALUES
(1, '', '<p>321312</p>', '2016-06-03 08:22:57'),
(2, '', '<p>312</p>', '2016-06-03 08:24:05'),
(3, '20160603/57514adfe238f.jpg', '<p><span style="text-decoration: underline;">332112</span><br/></p><p>											</p>', '2016-06-03 09:16:15');

-- --------------------------------------------------------

--
-- 表的结构 `hc_log`
--

CREATE TABLE IF NOT EXISTS `hc_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` int(11) NOT NULL,
  `ip` varchar(15) CHARACTER SET utf8 NOT NULL,
  `log` varchar(50) CHARACTER SET utf8 NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=32 ;

--
-- 转存表中的数据 `hc_log`
--

INSERT INTO `hc_log` (`id`, `username`, `ip`, `log`, `time`) VALUES
(1, 0, '::1', '登录成功', '2016-06-02 02:12:42'),
(2, 0, '::1', '登录成功', '2016-06-02 02:12:48'),
(3, 0, '::1', '登录成功', '2016-06-02 02:14:25'),
(4, 0, '::1', '登录成功', '2016-06-02 02:15:23'),
(5, 0, '::1', '登录成功', '2016-06-02 02:15:25'),
(6, 0, '::1', '登录成功', '2016-06-02 02:15:29'),
(7, 0, '::1', '登录成功', '2016-06-02 02:15:58'),
(8, 0, '::1', '登录成功', '2016-06-02 02:16:00'),
(9, 0, '::1', '登录成功', '2016-06-02 02:16:26'),
(10, 0, '::1', '登录成功', '2016-06-02 02:16:49'),
(11, 0, '::1', '登录成功', '2016-06-02 02:17:12'),
(12, 0, '::1', '登录成功', '2016-06-02 02:18:16'),
(13, 0, '::1', '登录成功', '2016-06-02 02:19:46'),
(14, 0, '::1', '登录成功', '2016-06-02 02:20:09'),
(15, 0, '::1', '登录成功', '2016-06-02 07:53:41'),
(16, 0, '::1', '登录成功', '2016-06-02 07:55:25'),
(17, 0, '::1', '登录成功', '2016-06-02 07:56:21'),
(18, 0, '::1', '登录成功', '2016-06-02 07:56:38'),
(19, 0, '::1', '登录成功', '2016-06-02 07:56:46'),
(20, 0, '::1', '登录成功', '2016-06-02 08:29:16'),
(21, 0, '::1', '登录成功', '2016-06-03 01:09:00'),
(22, 0, '::1', '登录成功', '2016-06-03 03:18:09'),
(23, 0, '::1', '增加产品', '2016-06-03 08:22:57'),
(24, 0, '::1', '增加产品', '2016-06-03 08:24:05'),
(25, 0, '::1', '登录成功', '2016-06-03 08:29:00'),
(26, 0, '::1', '增加产品', '2016-06-03 08:29:14'),
(27, 0, '::1', '修改产品', '2016-06-03 09:16:15'),
(28, 0, '::1', '登录成功', '2016-06-06 01:03:02'),
(29, 0, '::1', '登录成功', '2016-06-12 06:28:26'),
(30, 0, '::1', '登录成功', '2016-06-17 07:12:34'),
(31, 0, '::1', '登录成功', '2016-06-20 03:39:55');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
