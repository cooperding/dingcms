-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 01 月 11 日 16:40
-- 服务器版本: 5.0.51b-community-nt-log
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 数据库: `dingcms`
--

-- --------------------------------------------------------

--
-- 表的结构 `ding_access`
--

CREATE TABLE IF NOT EXISTS `ding_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) default NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ding_access`
--

INSERT INTO `ding_access` (`role_id`, `node_id`, `level`, `module`) VALUES
(1, 1, 1, NULL),
(1, 10, 2, NULL),
(1, 12, 3, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `ding_addinfo`
--

CREATE TABLE IF NOT EXISTS `ding_addinfo` (
  `id` int(15) NOT NULL default '0',
  `title_id` int(15) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ding_addinfo`
--

INSERT INTO `ding_addinfo` (`id`, `title_id`) VALUES
(0, 13);

-- --------------------------------------------------------

--
-- 表的结构 `ding_content`
--

CREATE TABLE IF NOT EXISTS `ding_content` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `title_id` mediumint(8) unsigned NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `ding_content`
--

INSERT INTO `ding_content` (`id`, `title_id`, `content`) VALUES
(1, 1, '测试文章1'),
(2, 2, '测试文章2'),
(3, 3, '测试文章3'),
(4, 4, '测试文章4'),
(5, 5, '测试文章5'),
(7, 7, '测试文章7'),
(8, 8, '测试文章8'),
(9, 9, '测试文章9'),
(10, 10, '测试文章10'),
(11, 11, '测试文章11'),
(12, 12, '测试文章12'),
(13, 13, '饿到我的我');

-- --------------------------------------------------------

--
-- 表的结构 `ding_linkpage_list`
--

CREATE TABLE IF NOT EXISTS `ding_linkpage_list` (
  `id` mediumint(8) NOT NULL auto_increment,
  `parent_id` mediumint(8) NOT NULL,
  `sort_name` varchar(20) NOT NULL,
  `path` varchar(50) NOT NULL default ',',
  `linkpage_id` smallint(5) NOT NULL,
  `myorder` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `ding_linkpage_list`
--

INSERT INTO `ding_linkpage_list` (`id`, `parent_id`, `sort_name`, `path`, `linkpage_id`, `myorder`) VALUES
(1, 0, '呵呵', ',', 1, 0),
(2, 1, '嘿嘿我', ',1,', 1, 0),
(3, 0, '呵呵', ',', 1, 0),
(4, 0, '嘿嘿', ',', 2, 0),
(5, 3, '的的的的', ',3,', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ding_linkpage_sort`
--

CREATE TABLE IF NOT EXISTS `ding_linkpage_sort` (
  `id` smallint(3) NOT NULL auto_increment,
  `ename` varchar(20) NOT NULL,
  `egroup` varchar(20) NOT NULL,
  `status` enum('true','false') NOT NULL default 'true',
  `myorder` tinyint(3) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `ding_linkpage_sort`
--

INSERT INTO `ding_linkpage_sort` (`id`, `ename`, `egroup`, `status`, `myorder`) VALUES
(1, '地区2211', 'diqu', 'true', 0),
(2, '地区2三十岁2', 'diqu2', 'false', 0),
(3, 'dede', 'dede', 'true', 0),
(4, 'dedede', 'dedede', 'true', 0),
(5, '发发发', 'ggg', 'false', 0);

-- --------------------------------------------------------

--
-- 表的结构 `ding_members`
--

CREATE TABLE IF NOT EXISTS `ding_members` (
  `id` mediumint(5) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `creat_time` int(10) NOT NULL,
  `is_recycle` enum('false','true') default 'false',
  `status` enum('false','true') default 'false',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `ding_members`
--

INSERT INTO `ding_members` (`id`, `username`, `password`, `creat_time`, `is_recycle`, `status`) VALUES
(1, 'test', '', 0, 'false', 'false');

-- --------------------------------------------------------

--
-- 表的结构 `ding_model_field`
--

CREATE TABLE IF NOT EXISTS `ding_model_field` (
  `id` mediumint(8) NOT NULL auto_increment,
  `ename` varchar(20) NOT NULL,
  `sort_id` smallint(3) NOT NULL,
  `emark` varchar(20) NOT NULL,
  `etype` varchar(20) NOT NULL,
  `elink` mediumint(5) NOT NULL,
  `evalue` varchar(255) NOT NULL,
  `maxlength` varchar(10) NOT NULL,
  `myorder` tinyint(3) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `ding_model_field`
--

INSERT INTO `ding_model_field` (`id`, `ename`, `sort_id`, `emark`, `etype`, `elink`, `evalue`, `maxlength`, `myorder`) VALUES
(1, '测试htmltext', 1, 'ceshi', 'htmltext', 0, '得的', '255', 0),
(2, '测试stepselect', 1, 'ceshi2', 'stepselect', 2, '223', '255', 20),
(3, '测试datetime', 1, 'ceshi23', 'datetime', 0, '', '10', 0),
(4, '测试images', 1, 'ceshi224', 'images', 0, '', '255', 0),
(5, '测试5', 2, 'ceshi2', 'text', 0, '', '255', 0),
(6, 'radio', 1, 'radio', 'radio', 0, '1,2,3,4,5,6', '', 0),
(7, 'checkbox', 1, 'checkbox', 'checkbox', 0, '1,2,3,4', '', 0),
(8, 'radio22', 1, 'radio2', 'radio', 0, '1,2,3', '', 0),
(9, 'checkbox2', 1, 'checkbox2', 'checkbox', 0, '1,2,3,4,5,6,7', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `ding_model_sort`
--

CREATE TABLE IF NOT EXISTS `ding_model_sort` (
  `id` smallint(3) NOT NULL auto_increment,
  `ename` varchar(20) NOT NULL,
  `emark` varchar(20) NOT NULL,
  `status` enum('true','false') NOT NULL default 'true',
  `myorder` smallint(3) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `ding_model_sort`
--

INSERT INTO `ding_model_sort` (`id`, `ename`, `emark`, `status`, `myorder`) VALUES
(1, '分类模型', 'info', 'true', 0),
(2, '文章模型', 'article', 'true', 0);

-- --------------------------------------------------------

--
-- 表的结构 `ding_nav_head`
--

CREATE TABLE IF NOT EXISTS `ding_nav_head` (
  `id` mediumint(5) NOT NULL auto_increment,
  `parent_id` mediumint(5) NOT NULL,
  `text` varchar(40) NOT NULL,
  `path` varchar(30) NOT NULL default ',',
  `myorder` tinyint(3) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- 转存表中的数据 `ding_nav_head`
--

INSERT INTO `ding_nav_head` (`id`, `parent_id`, `text`, `path`, `myorder`) VALUES
(1, 0, '新闻8566', ',', 0),
(2, 1, '国内新闻23', ',10,', 0),
(3, 1, '国外新闻', ',10,', 0),
(4, 0, '国内体育', ',', 0),
(5, 2, '国内娱乐5', ',10,2,', 0),
(6, 2, '国内军事', ',10,20,', 0),
(7, 2, '国内互联网', ',10,20,', 0),
(8, 4, '国内体育足球', ',4,', 0),
(9, 4, '国内体育篮球', ',4,', 0),
(10, 4, '国内体育排球', ',4,', 0),
(11, 4, '国内体育乒乓球', ',4,', 0),
(12, 5, '国内娱乐记者44', ',10,2,5,', 0),
(13, 5, '国内娱乐明星3322', ',10,20,50,', 0),
(14, 5, '国内娱乐粉丝2', ',10,20,50,', 0),
(15, 3, '国外体育', ',10,30,', 0),
(16, 0, '国外娱乐', ',', 0),
(17, 16, '国外军事', ',16,', 0),
(18, 16, '国外互联网', ',16,', 0),
(19, 15, '国外体育足球', ',10,30,150,', 0),
(20, 15, '国外体育篮球', ',10,30,150,', 0),
(21, 15, '国外体育排球', ',10,30,150,', 0),
(22, 15, '国外体育乒乓球', ',10,30,150,', 0),
(23, 16, '国外娱乐记者', ',16,', 0),
(24, 16, '国外娱乐明星', ',16,', 0),
(25, 16, '国外娱乐粉丝', ',16,', 0),
(27, 0, '烦人烦人烦', ',', 0),
(28, 27, '测试二级2', ',27,', 0),
(31, 27, 'dedede2', ',27,', 0),
(32, 31, 'dedede', ',27,31,', 0),
(33, 32, '5656', ',27,31,32,', 0),
(34, 0, '5656', '0,', 0),
(35, 34, '5656', '0,34,', 0),
(36, 35, '5656jggggg988888', '0,34,35,', 0),
(41, 36, 'cehsidede22222', '0,34,35,36,', 0),
(40, 1, 'ccdcdcd', '0,10,', 0),
(42, 41, 'gt7758588', '0,34,35,36,41,', 0);

-- --------------------------------------------------------

--
-- 表的结构 `ding_news_sort`
--

CREATE TABLE IF NOT EXISTS `ding_news_sort` (
  `id` mediumint(5) NOT NULL auto_increment,
  `parent_id` mediumint(5) NOT NULL,
  `text` varchar(40) NOT NULL,
  `en_name` varchar(50) NOT NULL,
  `model_id` mediumint(5) unsigned NOT NULL,
  `tpl_index` varchar(40) NOT NULL,
  `tpl_list` varchar(40) NOT NULL,
  `tpl_views` varchar(40) NOT NULL,
  `keywords` varchar(255) default NULL,
  `description` varchar(255) default NULL,
  `path` varchar(30) NOT NULL default ',',
  `myorder` tinyint(3) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `ding_news_sort`
--

INSERT INTO `ding_news_sort` (`id`, `parent_id`, `text`, `en_name`, `model_id`, `tpl_index`, `tpl_list`, `tpl_views`, `keywords`, `description`, `path`, `myorder`) VALUES
(1, 0, '新闻1234', '', 1, '', '', '', NULL, NULL, ',', 0),
(2, 1, '国内新闻', '', 1, '', '', '', NULL, NULL, ',1,', 0),
(3, 1, '国外新闻', '', 1, '', '', '', NULL, NULL, ',1,', 0),
(4, 2, '国内体育', '', 1, '', '', '', NULL, NULL, ',1,2,', 0),
(5, 2, '国内娱乐', '', 1, '', '', '', NULL, NULL, ',1,2,', 0),
(6, 2, '国内军事', '', 1, '', '', '', NULL, NULL, ',1,2,', 0),
(7, 2, '国内互联网', '', 1, '', '', '', NULL, NULL, ',1,2,', 0),
(8, 4, '国内体育足球23', 'guoneitiyuzuqiu23', 2, '111', '1111', '1111', '111', '1111', ',1,2,4,', 0),
(9, 4, '国内体育篮球', '', 1, '', '', '', NULL, NULL, ',1,2,4,', 0),
(10, 4, '国内体育排球', '', 1, '', '', '', NULL, NULL, ',1,2,4,', 0),
(11, 4, '国内体育乒乓球', '', 1, '', '', '', NULL, NULL, ',1,2,4,', 0),
(12, 5, '国内娱乐记者', '', 1, '', '', '', NULL, NULL, ',1,2,5,', 0),
(13, 5, '国内娱乐明星', '', 1, '', '', '', NULL, NULL, ',1,2,5,', 0),
(14, 5, '国内娱乐粉丝', '', 1, '', '', '', NULL, NULL, ',1,2,5,', 0),
(15, 3, '国外体育', 'guowaitiyu', 1, '', '', '', NULL, NULL, ',1,3,', 0),
(16, 3, '国外娱乐', '', 1, '', '', '', NULL, NULL, ',1,3,', 0),
(17, 3, '国外军事', '', 1, '', '', '', NULL, NULL, ',1,3,', 0),
(18, 3, '国外互联网', '', 1, '', '', '', NULL, NULL, ',1,3,', 0),
(19, 15, '国外体育足球', '', 1, '', '', '', NULL, NULL, ',1,3,15,', 0),
(20, 15, '国外体育篮球', '', 1, '', '', '', NULL, NULL, ',1,3,15,', 0),
(21, 15, '国外体育排球', '', 1, '', '', '', NULL, NULL, ',1,3,15,', 0),
(22, 15, '国外体育乒乓球', '', 1, '', '', '', NULL, NULL, ',1,3,15,', 0),
(23, 16, '国外娱乐记者', '', 1, '', '', '', NULL, NULL, ',1,3,16,', 0),
(24, 16, '国外娱乐明星', '', 1, '', '', '', NULL, NULL, ',1,3,16,', 0),
(25, 16, '国外娱乐粉丝', '', 1, '', '', '', NULL, NULL, ',1,3,16,', 0);

-- --------------------------------------------------------

--
-- 表的结构 `ding_node`
--

CREATE TABLE IF NOT EXISTS `ding_node` (
  `id` smallint(6) unsigned NOT NULL auto_increment,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) default NULL,
  `status` tinyint(1) default '0',
  `remark` varchar(255) default NULL,
  `sort` smallint(6) unsigned default NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  `path` varchar(20) default ',',
  PRIMARY KEY  (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `ding_node`
--

INSERT INTO `ding_node` (`id`, `name`, `title`, `status`, `remark`, `sort`, `pid`, `level`, `path`) VALUES
(1, 'Admin', '后台管理', 1, '', 0, 0, 1, ','),
(2, 'ContentModel', '内容模型3', 1, '内容模型', 0, 1, 2, ',1,'),
(3, 'Index', '首页文件3', 1, '首页文件', 0, 1, 2, ',1,'),
(4, 'LinkPage', '联动模型', 1, '联动模型', 1, 1, 2, ',1,'),
(5, 'NavHead', '头部导航', 1, '头部导航', 0, 1, 2, ',1,'),
(6, 'News', '信息内容', 1, '信息内容', 0, 1, 2, ',1,'),
(7, 'NewsSort', '信息分类', 1, '信息分类', 0, 1, 2, ',1,'),
(8, 'Setting', '系统基本参数', 1, '系统基本参数', 0, 1, 2, ',1,'),
(9, 'Upload', '上传文件中心', 1, '上传文件中心', 0, 1, 2, ',1,'),
(10, 'Public', '公共属性', 1, '公共属性', 0, 1, 2, ',1,'),
(11, 'index', '查看列表首页', 1, '查看列表首页', 0, 10, 3, ',1,10,'),
(12, 'add', '添加', 1, '添加', 0, 10, 3, ',1,10,'),
(13, 'edit', '编辑', 1, '编辑', 0, 10, 3, ',1,10,'),
(14, 'insert', '写入数据', 1, '写入数据', 0, 10, 3, ',1,10,'),
(15, 'update', '更新数据', 1, '更新数据', 0, 10, 3, ',1,10,'),
(16, 'delete', '删除', 1, '删除', 0, 10, 3, ',1,10,');

-- --------------------------------------------------------

--
-- 表的结构 `ding_operators`
--

CREATE TABLE IF NOT EXISTS `ding_operators` (
  `id` mediumint(5) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `creat_time` int(10) NOT NULL,
  `is_recycle` enum('false','true') default 'false',
  `status` enum('false','true') default 'false',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ding_operators`
--

INSERT INTO `ding_operators` (`id`, `username`, `password`, `creat_time`, `is_recycle`, `status`) VALUES
(1, 'admin', '0b32435664ddde8a5e3c973953aea16a', 1346390052, 'false', 'false');

-- --------------------------------------------------------

--
-- 表的结构 `ding_role`
--

CREATE TABLE IF NOT EXISTS `ding_role` (
  `id` smallint(6) unsigned NOT NULL auto_increment,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) default NULL,
  `status` tinyint(1) unsigned default NULL,
  `remark` varchar(255) default NULL,
  `path` varchar(20) default ',',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `ding_role`
--

INSERT INTO `ding_role` (`id`, `name`, `pid`, `status`, `remark`, `path`) VALUES
(1, '超级管理员', 0, 1, '超级管理员', ','),
(2, '测试', 0, 1, '测试', ','),
(3, 'Admin', 0, 1, 'dedede', ','),
(4, 'Admin', 0, 1, '得的', ','),
(5, 'sssss', 0, 1, 'sddede', ',');

-- --------------------------------------------------------

--
-- 表的结构 `ding_role_user`
--

CREATE TABLE IF NOT EXISTS `ding_role_user` (
  `role_id` mediumint(9) unsigned default NULL,
  `user_id` char(32) default NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ding_setting`
--

CREATE TABLE IF NOT EXISTS `ding_setting` (
  `id` tinyint(3) NOT NULL auto_increment,
  `sys_name` varchar(20) NOT NULL,
  `sys_value` text,
  `sys_info` varchar(100) default NULL,
  `sys_gid` tinyint(2) NOT NULL,
  `sys_type` varchar(10) NOT NULL,
  `myorder` tinyint(3) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `ding_setting`
--

INSERT INTO `ding_setting` (`id`, `sys_name`, `sys_value`, `sys_info`, `sys_gid`, `sys_type`, `myorder`) VALUES
(1, 'cfg_sitename', '7777777', '网站名称', 1, 'text', 0),
(2, 'cfg_siteurl', '1', '网站地址', 1, 'radio', 0),
(3, 'cfg_keywords', '1', '关键字', 1, 'radio', 0),
(4, 'cfg_description', '58555sssss55555\r\ndededee', '网站描述', 1, 'textarea', 0),
(5, 'cfg_copyright', '55555555666', '版权信息', 2, 'textarea', 0);

-- --------------------------------------------------------

--
-- 表的结构 `ding_title`
--

CREATE TABLE IF NOT EXISTS `ding_title` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `sort_id` mediumint(5) NOT NULL,
  `title` varchar(200) NOT NULL,
  `subtitle` varchar(200) default NULL,
  `titlepic` varchar(200) default NULL,
  `flag` varchar(20) default NULL,
  `editor` varchar(20) default NULL,
  `author` varchar(20) default NULL,
  `source` varchar(155) default NULL,
  `sourceurl` varchar(255) default NULL,
  `keywords` varchar(255) default NULL,
  `description` varchar(255) default NULL,
  `views` mediumint(8) unsigned default NULL,
  `addtime` int(10) unsigned NOT NULL,
  `updatetime` int(10) unsigned NOT NULL,
  `status` enum('true','false') NOT NULL default 'true',
  `is_recycle` enum('true','false') NOT NULL default 'false',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='标题表' AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `ding_title`
--

INSERT INTO `ding_title` (`id`, `sort_id`, `title`, `subtitle`, `titlepic`, `flag`, `editor`, `author`, `source`, `sourceurl`, `keywords`, `description`, `views`, `addtime`, `updatetime`, `status`, `is_recycle`) VALUES
(1, 1, '测试文章', '测试文章', NULL, NULL, '', '', '', '', '', '', 0, 1355799013, 1355799013, 'true', 'false'),
(2, 1, '测试文章2', '测试文章3', NULL, NULL, '', '', '', '', '', '', 0, 1355799013, 1355799013, 'true', 'false'),
(3, 1, '测试文章3', '测试文章3', NULL, NULL, '', '', '', '', '', '', 0, 1355799013, 1355799013, 'true', 'false'),
(4, 1, '测试文章4', '测试文章4', NULL, NULL, '', '', '', '', '', '', 0, 1355799013, 1355799013, 'true', 'false'),
(5, 1, '测试文章5', '测试文章5', NULL, NULL, '', '', '', '', '', '', 0, 1355799013, 1355799013, 'true', 'false'),
(7, 1, '测试文章7', '测试文章7', NULL, NULL, '', '', '', '', '', '', 0, 1355799013, 1355799013, 'true', 'false'),
(8, 1, '测试文章8', '测试文章8', NULL, NULL, '', '', '', '', '', '', 0, 1355799013, 1355799013, 'true', 'false'),
(9, 1, '测试文章9', '测试文章9', NULL, NULL, '', '', '', '', '', '', 0, 1355799013, 1355799013, 'true', 'false'),
(10, 1, '测试文章10', '测试文章10', NULL, NULL, '', '', '', '', '', '', 0, 1355799013, 1355799013, 'true', 'false'),
(11, 2, '测试文章11', '测试文章11', NULL, NULL, '', '', '', '', '', '', 0, 1355799013, 1355799013, 'true', 'true'),
(12, 2, '测试文章12', '测试文章12', NULL, NULL, '', '', '', '', '', '', 0, 1355799013, 1355799013, 'true', 'true'),
(13, 1, '的的的', '', '', NULL, '', '', '', '', '', '', NULL, 0, 0, 'true', 'false');
