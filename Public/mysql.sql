/*
Navicat MySQL Data Transfer

Source Server         : 192.168.1.107
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : dingcms

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2013-01-22 13:15:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ding_access`
-- ----------------------------
DROP TABLE IF EXISTS `ding_access`;
CREATE TABLE `ding_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) default NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_access
-- ----------------------------
INSERT INTO `ding_access` VALUES ('1', '3', '2', null);
INSERT INTO `ding_access` VALUES ('1', '2', '2', null);
INSERT INTO `ding_access` VALUES ('1', '1', '1', null);
INSERT INTO `ding_access` VALUES ('1', '5', '2', null);
INSERT INTO `ding_access` VALUES ('1', '4', '2', null);
INSERT INTO `ding_access` VALUES ('1', '6', '2', null);
INSERT INTO `ding_access` VALUES ('1', '7', '2', null);
INSERT INTO `ding_access` VALUES ('1', '8', '2', null);
INSERT INTO `ding_access` VALUES ('1', '9', '2', null);
INSERT INTO `ding_access` VALUES ('1', '10', '2', null);
INSERT INTO `ding_access` VALUES ('1', '11', '3', null);
INSERT INTO `ding_access` VALUES ('1', '12', '3', null);
INSERT INTO `ding_access` VALUES ('1', '13', '3', null);
INSERT INTO `ding_access` VALUES ('1', '14', '3', null);
INSERT INTO `ding_access` VALUES ('1', '15', '3', null);
INSERT INTO `ding_access` VALUES ('1', '16', '3', null);

-- ----------------------------
-- Table structure for `ding_addarticle`
-- ----------------------------
DROP TABLE IF EXISTS `ding_addarticle`;
CREATE TABLE `ding_addarticle` (
  `did` int(20) NOT NULL auto_increment,
  `title_id` int(20) unsigned NOT NULL,
  `dnewtitle` varchar(200) default NULL,
  PRIMARY KEY  (`did`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_addarticle
-- ----------------------------
INSERT INTO `ding_addarticle` VALUES ('1', '1', '1');
INSERT INTO `ding_addarticle` VALUES ('2', '2', '2');
INSERT INTO `ding_addarticle` VALUES ('3', '3', '34');
INSERT INTO `ding_addarticle` VALUES ('4', '4', '4');
INSERT INTO `ding_addarticle` VALUES ('5', '5', '5');
INSERT INTO `ding_addarticle` VALUES ('6', '6', '6');
INSERT INTO `ding_addarticle` VALUES ('7', '7', '7');
INSERT INTO `ding_addarticle` VALUES ('8', '8', '8');

-- ----------------------------
-- Table structure for `ding_addinfo`
-- ----------------------------
DROP TABLE IF EXISTS `ding_addinfo`;
CREATE TABLE `ding_addinfo` (
  `id` int(20) NOT NULL auto_increment,
  `title_id` int(20) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_addinfo
-- ----------------------------

-- ----------------------------
-- Table structure for `ding_content`
-- ----------------------------
DROP TABLE IF EXISTS `ding_content`;
CREATE TABLE `ding_content` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `title_id` mediumint(8) unsigned NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_content
-- ----------------------------
INSERT INTO `ding_content` VALUES ('1', '1', '测试文章1');
INSERT INTO `ding_content` VALUES ('2', '2', '测试文章2');
INSERT INTO `ding_content` VALUES ('3', '3', '测试文章3');
INSERT INTO `ding_content` VALUES ('4', '4', '测试文章4');
INSERT INTO `ding_content` VALUES ('5', '5', '测试文章5');
INSERT INTO `ding_content` VALUES ('7', '7', '测试文章7');
INSERT INTO `ding_content` VALUES ('8', '8', '测试文章8');
INSERT INTO `ding_content` VALUES ('9', '9', '测试文章9');
INSERT INTO `ding_content` VALUES ('10', '10', '测试文章10');
INSERT INTO `ding_content` VALUES ('11', '11', '测试文章11');
INSERT INTO `ding_content` VALUES ('12', '12', '测试文章12');
INSERT INTO `ding_content` VALUES ('13', '13', '饿到我的我');

-- ----------------------------
-- Table structure for `ding_linkpage_list`
-- ----------------------------
DROP TABLE IF EXISTS `ding_linkpage_list`;
CREATE TABLE `ding_linkpage_list` (
  `id` mediumint(8) NOT NULL auto_increment,
  `parent_id` mediumint(8) NOT NULL,
  `sort_name` varchar(20) NOT NULL,
  `path` varchar(50) NOT NULL default ',',
  `linkpage_id` smallint(5) NOT NULL,
  `myorder` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_linkpage_list
-- ----------------------------
INSERT INTO `ding_linkpage_list` VALUES ('1', '0', '呵呵', ',', '1', '0');
INSERT INTO `ding_linkpage_list` VALUES ('2', '1', '嘿嘿我', ',1,', '1', '0');
INSERT INTO `ding_linkpage_list` VALUES ('3', '0', '呵呵', ',', '1', '0');
INSERT INTO `ding_linkpage_list` VALUES ('4', '0', '嘿嘿', ',', '2', '0');
INSERT INTO `ding_linkpage_list` VALUES ('5', '3', '的的的的', ',3,', '1', '0');

-- ----------------------------
-- Table structure for `ding_linkpage_sort`
-- ----------------------------
DROP TABLE IF EXISTS `ding_linkpage_sort`;
CREATE TABLE `ding_linkpage_sort` (
  `id` smallint(3) NOT NULL auto_increment,
  `ename` varchar(20) NOT NULL,
  `egroup` varchar(20) NOT NULL,
  `status` enum('true','false') NOT NULL default 'true',
  `myorder` tinyint(3) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_linkpage_sort
-- ----------------------------
INSERT INTO `ding_linkpage_sort` VALUES ('1', '地区2211', 'diqu', 'true', '0');
INSERT INTO `ding_linkpage_sort` VALUES ('2', '地区2三十岁2', 'diqu2', 'false', '0');
INSERT INTO `ding_linkpage_sort` VALUES ('3', 'dede', 'dede', 'true', '0');
INSERT INTO `ding_linkpage_sort` VALUES ('4', 'dedede', 'dedede', 'true', '0');
INSERT INTO `ding_linkpage_sort` VALUES ('5', '发发发', 'ggg', 'false', '0');

-- ----------------------------
-- Table structure for `ding_members`
-- ----------------------------
DROP TABLE IF EXISTS `ding_members`;
CREATE TABLE `ding_members` (
  `id` mediumint(5) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `creat_time` int(10) NOT NULL,
  `is_recycle` enum('false','true') default 'false',
  `status` enum('false','true') default 'false',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_members
-- ----------------------------
INSERT INTO `ding_members` VALUES ('1', 'test', '', '0', 'false', 'false');

-- ----------------------------
-- Table structure for `ding_model_field`
-- ----------------------------
DROP TABLE IF EXISTS `ding_model_field`;
CREATE TABLE `ding_model_field` (
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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_model_field
-- ----------------------------
INSERT INTO `ding_model_field` VALUES ('1', '测试htmltext', '1', 'ceshi', 'htmltext', '0', '得的', '255', '0');
INSERT INTO `ding_model_field` VALUES ('2', '测试stepselect', '1', 'ceshi2', 'stepselect', '2', '223', '255', '20');
INSERT INTO `ding_model_field` VALUES ('3', '测试datetime', '1', 'ceshi23', 'datetime', '0', '', '10', '0');
INSERT INTO `ding_model_field` VALUES ('4', '测试images', '1', 'ceshi224', 'images', '0', '', '255', '0');
INSERT INTO `ding_model_field` VALUES ('5', '测试5', '2', 'dddedeceshi2', 'textarea', '0', '', '255', '0');
INSERT INTO `ding_model_field` VALUES ('6', 'radio', '1', 'radio', 'radio', '0', '1,2,3,4,5,6', '', '0');
INSERT INTO `ding_model_field` VALUES ('7', 'checkbox', '1', 'checkbox', 'checkbox', '0', '1,2,3,4', '', '0');
INSERT INTO `ding_model_field` VALUES ('8', 'radio22', '1', 'radio2', 'radio', '0', '1,2,3', '', '0');
INSERT INTO `ding_model_field` VALUES ('9', 'checkbox2', '1', 'checkbox2', 'checkbox', '0', '1,2,3,4,5,6,7', '', '0');
INSERT INTO `ding_model_field` VALUES ('10', 'ceshishishish', '2', 'd测试', 'varchar', '0', '', '20', '0');
INSERT INTO `ding_model_field` VALUES ('11', '的的提升', '2', 'ddmaokkkk', 'varchar', '0', '', '20', '0');
INSERT INTO `ding_model_field` VALUES ('12', '恶毒的的', '1', 'dceshidedede', 'varchar', '0', '', '20', '0');
INSERT INTO `ding_model_field` VALUES ('13', '新标题', '2', 'dnewtitle', 'varchar', '0', '', '200', '0');

-- ----------------------------
-- Table structure for `ding_model_sort`
-- ----------------------------
DROP TABLE IF EXISTS `ding_model_sort`;
CREATE TABLE `ding_model_sort` (
  `id` smallint(3) NOT NULL auto_increment,
  `ename` varchar(20) NOT NULL,
  `emark` varchar(20) NOT NULL,
  `status` enum('true','false') NOT NULL default 'true',
  `myorder` smallint(3) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_model_sort
-- ----------------------------
INSERT INTO `ding_model_sort` VALUES ('1', '分类模型', 'info', 'true', '0');
INSERT INTO `ding_model_sort` VALUES ('2', '文章模型', 'article', 'true', '0');

-- ----------------------------
-- Table structure for `ding_nav_head`
-- ----------------------------
DROP TABLE IF EXISTS `ding_nav_head`;
CREATE TABLE `ding_nav_head` (
  `id` mediumint(5) NOT NULL auto_increment,
  `parent_id` mediumint(5) NOT NULL,
  `text` varchar(40) NOT NULL,
  `path` varchar(30) NOT NULL default ',',
  `myorder` tinyint(3) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_nav_head
-- ----------------------------
INSERT INTO `ding_nav_head` VALUES ('1', '0', '新闻8566', ',', '0');
INSERT INTO `ding_nav_head` VALUES ('2', '1', '国内新闻23', ',10,', '0');
INSERT INTO `ding_nav_head` VALUES ('3', '1', '国外新闻', ',10,', '0');
INSERT INTO `ding_nav_head` VALUES ('4', '0', '国内体育', ',', '0');
INSERT INTO `ding_nav_head` VALUES ('5', '2', '国内娱乐5', ',10,2,', '0');
INSERT INTO `ding_nav_head` VALUES ('6', '2', '国内军事', ',10,20,', '0');
INSERT INTO `ding_nav_head` VALUES ('7', '2', '国内互联网', ',10,20,', '0');
INSERT INTO `ding_nav_head` VALUES ('8', '4', '国内体育足球', ',4,', '0');
INSERT INTO `ding_nav_head` VALUES ('9', '4', '国内体育篮球', ',4,', '0');
INSERT INTO `ding_nav_head` VALUES ('10', '4', '国内体育排球', ',4,', '0');
INSERT INTO `ding_nav_head` VALUES ('11', '4', '国内体育乒乓球', ',4,', '0');
INSERT INTO `ding_nav_head` VALUES ('12', '5', '国内娱乐记者44', ',10,2,5,', '0');
INSERT INTO `ding_nav_head` VALUES ('13', '5', '国内娱乐明星3322', ',10,20,50,', '0');
INSERT INTO `ding_nav_head` VALUES ('14', '5', '国内娱乐粉丝2', ',10,20,50,', '0');
INSERT INTO `ding_nav_head` VALUES ('15', '3', '国外体育', ',10,30,', '0');
INSERT INTO `ding_nav_head` VALUES ('16', '0', '国外娱乐', ',', '0');
INSERT INTO `ding_nav_head` VALUES ('17', '16', '国外军事', ',16,', '0');
INSERT INTO `ding_nav_head` VALUES ('18', '16', '国外互联网', ',16,', '0');
INSERT INTO `ding_nav_head` VALUES ('19', '15', '国外体育足球', ',10,30,150,', '0');
INSERT INTO `ding_nav_head` VALUES ('20', '15', '国外体育篮球', ',10,30,150,', '0');
INSERT INTO `ding_nav_head` VALUES ('21', '15', '国外体育排球', ',10,30,150,', '0');
INSERT INTO `ding_nav_head` VALUES ('22', '15', '国外体育乒乓球', ',10,30,150,', '0');
INSERT INTO `ding_nav_head` VALUES ('23', '16', '国外娱乐记者', ',16,', '0');
INSERT INTO `ding_nav_head` VALUES ('24', '16', '国外娱乐明星', ',16,', '0');
INSERT INTO `ding_nav_head` VALUES ('25', '16', '国外娱乐粉丝', ',16,', '0');
INSERT INTO `ding_nav_head` VALUES ('27', '0', '烦人烦人烦', ',', '0');
INSERT INTO `ding_nav_head` VALUES ('28', '27', '测试二级2', ',27,', '0');
INSERT INTO `ding_nav_head` VALUES ('31', '27', 'dedede2', ',27,', '0');
INSERT INTO `ding_nav_head` VALUES ('32', '31', 'dedede', ',27,31,', '0');
INSERT INTO `ding_nav_head` VALUES ('33', '32', '5656', ',27,31,32,', '0');
INSERT INTO `ding_nav_head` VALUES ('34', '0', '5656', '0,', '0');
INSERT INTO `ding_nav_head` VALUES ('35', '34', '5656', '0,34,', '0');
INSERT INTO `ding_nav_head` VALUES ('36', '35', '5656jggggg988888', '0,34,35,', '0');
INSERT INTO `ding_nav_head` VALUES ('41', '36', 'cehsidede22222', '0,34,35,36,', '0');
INSERT INTO `ding_nav_head` VALUES ('40', '1', 'ccdcdcd', '0,10,', '0');
INSERT INTO `ding_nav_head` VALUES ('42', '41', 'gt7758588', '0,34,35,36,41,', '0');

-- ----------------------------
-- Table structure for `ding_news_sort`
-- ----------------------------
DROP TABLE IF EXISTS `ding_news_sort`;
CREATE TABLE `ding_news_sort` (
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
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_news_sort
-- ----------------------------
INSERT INTO `ding_news_sort` VALUES ('1', '0', '新闻1234', '', '1', '', '', '', null, null, ',', '0');
INSERT INTO `ding_news_sort` VALUES ('2', '1', '国内新闻', '', '1', '', '', '', null, null, ',1,', '0');
INSERT INTO `ding_news_sort` VALUES ('3', '1', '国外新闻', '', '1', '', '', '', null, null, ',1,', '0');
INSERT INTO `ding_news_sort` VALUES ('4', '2', '国内体育', '', '1', '', '', '', null, null, ',1,2,', '0');
INSERT INTO `ding_news_sort` VALUES ('5', '2', '国内娱乐', '', '1', '', '', '', null, null, ',1,2,', '0');
INSERT INTO `ding_news_sort` VALUES ('6', '2', '国内军事', '', '1', '', '', '', null, null, ',1,2,', '0');
INSERT INTO `ding_news_sort` VALUES ('7', '2', '国内互联网', '', '1', '', '', '', null, null, ',1,2,', '0');
INSERT INTO `ding_news_sort` VALUES ('8', '4', '国内体育足球23', 'guoneitiyuzuqiu23', '2', '111', '1111', '1111', '111', '1111', ',1,2,4,', '0');
INSERT INTO `ding_news_sort` VALUES ('9', '4', '国内体育篮球', '', '1', '', '', '', null, null, ',1,2,4,', '0');
INSERT INTO `ding_news_sort` VALUES ('10', '4', '国内体育排球', '', '1', '', '', '', null, null, ',1,2,4,', '0');
INSERT INTO `ding_news_sort` VALUES ('11', '4', '国内体育乒乓球', '', '1', '', '', '', null, null, ',1,2,4,', '0');
INSERT INTO `ding_news_sort` VALUES ('12', '5', '国内娱乐记者', '', '1', '', '', '', null, null, ',1,2,5,', '0');
INSERT INTO `ding_news_sort` VALUES ('13', '5', '国内娱乐明星', '', '1', '', '', '', null, null, ',1,2,5,', '0');
INSERT INTO `ding_news_sort` VALUES ('14', '5', '国内娱乐粉丝', '', '1', '', '', '', null, null, ',1,2,5,', '0');
INSERT INTO `ding_news_sort` VALUES ('15', '3', '国外体育', 'guowaitiyu', '1', '', '', '', null, null, ',1,3,', '0');
INSERT INTO `ding_news_sort` VALUES ('16', '3', '国外娱乐', '', '1', '', '', '', null, null, ',1,3,', '0');
INSERT INTO `ding_news_sort` VALUES ('17', '3', '国外军事', '', '1', '', '', '', null, null, ',1,3,', '0');
INSERT INTO `ding_news_sort` VALUES ('18', '3', '国外互联网', '', '1', '', '', '', null, null, ',1,3,', '0');
INSERT INTO `ding_news_sort` VALUES ('19', '15', '国外体育足球', '', '1', '', '', '', null, null, ',1,3,15,', '0');
INSERT INTO `ding_news_sort` VALUES ('20', '15', '国外体育篮球', '', '1', '', '', '', null, null, ',1,3,15,', '0');
INSERT INTO `ding_news_sort` VALUES ('21', '15', '国外体育排球', '', '1', '', '', '', null, null, ',1,3,15,', '0');
INSERT INTO `ding_news_sort` VALUES ('22', '15', '国外体育乒乓球', '', '1', '', '', '', null, null, ',1,3,15,', '0');
INSERT INTO `ding_news_sort` VALUES ('23', '16', '国外娱乐记者', '', '1', '', '', '', null, null, ',1,3,16,', '0');
INSERT INTO `ding_news_sort` VALUES ('24', '16', '国外娱乐明星', '', '1', '', '', '', null, null, ',1,3,16,', '0');
INSERT INTO `ding_news_sort` VALUES ('25', '16', '国外娱乐粉丝', '', '1', '', '', '', null, null, ',1,3,16,', '0');

-- ----------------------------
-- Table structure for `ding_node`
-- ----------------------------
DROP TABLE IF EXISTS `ding_node`;
CREATE TABLE `ding_node` (
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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_node
-- ----------------------------
INSERT INTO `ding_node` VALUES ('1', 'Admin', '后台管理', '1', '', '0', '0', '1', ',');
INSERT INTO `ding_node` VALUES ('2', 'ContentModel', '内容模型3', '1', '内容模型', '0', '1', '2', ',1,');
INSERT INTO `ding_node` VALUES ('3', 'Index', '首页文件3', '1', '首页文件', '0', '1', '2', ',1,');
INSERT INTO `ding_node` VALUES ('4', 'LinkPage', '联动模型', '1', '联动模型', '1', '1', '2', ',1,');
INSERT INTO `ding_node` VALUES ('5', 'NavHead', '头部导航', '1', '头部导航', '0', '1', '2', ',1,');
INSERT INTO `ding_node` VALUES ('6', 'News', '信息内容', '1', '信息内容', '0', '1', '2', ',1,');
INSERT INTO `ding_node` VALUES ('7', 'NewsSort', '信息分类', '1', '信息分类', '0', '1', '2', ',1,');
INSERT INTO `ding_node` VALUES ('8', 'Setting', '系统基本参数', '1', '系统基本参数', '0', '1', '2', ',1,');
INSERT INTO `ding_node` VALUES ('9', 'Upload', '上传文件中心', '1', '上传文件中心', '0', '1', '2', ',1,');
INSERT INTO `ding_node` VALUES ('10', 'Public', '公共属性', '1', '公共属性', '0', '1', '2', ',1,');
INSERT INTO `ding_node` VALUES ('11', 'index', '查看列表首页', '1', '查看列表首页', '0', '10', '3', ',1,10,');
INSERT INTO `ding_node` VALUES ('12', 'add', '添加', '1', '添加', '0', '10', '3', ',1,10,');
INSERT INTO `ding_node` VALUES ('13', 'edit', '编辑', '1', '编辑', '0', '10', '3', ',1,10,');
INSERT INTO `ding_node` VALUES ('14', 'insert', '写入数据', '1', '写入数据', '0', '10', '3', ',1,10,');
INSERT INTO `ding_node` VALUES ('15', 'update', '更新数据', '1', '更新数据', '0', '10', '3', ',1,10,');
INSERT INTO `ding_node` VALUES ('16', 'delete', '删除', '1', '删除', '0', '10', '3', ',1,10,');

-- ----------------------------
-- Table structure for `ding_operators`
-- ----------------------------
DROP TABLE IF EXISTS `ding_operators`;
CREATE TABLE `ding_operators` (
  `id` mediumint(5) NOT NULL auto_increment,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `creat_time` int(10) NOT NULL,
  `is_recycle` enum('false','true') default 'false',
  `status` enum('false','true') default 'false',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_operators
-- ----------------------------
INSERT INTO `ding_operators` VALUES ('1', 'admin', '0b32435664ddde8a5e3c973953aea16a', '1346390052', 'false', 'false');

-- ----------------------------
-- Table structure for `ding_role`
-- ----------------------------
DROP TABLE IF EXISTS `ding_role`;
CREATE TABLE `ding_role` (
  `id` smallint(6) unsigned NOT NULL auto_increment,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) default NULL,
  `status` tinyint(1) unsigned default NULL,
  `remark` varchar(255) default NULL,
  `path` varchar(20) default ',',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_role
-- ----------------------------
INSERT INTO `ding_role` VALUES ('1', '超级管理员', '0', '1', '超级管理员', ',');
INSERT INTO `ding_role` VALUES ('2', '测试', '0', '1', '测试', ',');
INSERT INTO `ding_role` VALUES ('3', 'Admin', '0', '1', 'dedede', ',');
INSERT INTO `ding_role` VALUES ('4', 'Admin', '0', '1', '得的', ',');
INSERT INTO `ding_role` VALUES ('5', 'sssss', '0', '1', 'sddede', ',');

-- ----------------------------
-- Table structure for `ding_role_user`
-- ----------------------------
DROP TABLE IF EXISTS `ding_role_user`;
CREATE TABLE `ding_role_user` (
  `role_id` mediumint(9) unsigned default NULL,
  `user_id` char(32) default NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_role_user
-- ----------------------------

-- ----------------------------
-- Table structure for `ding_setting`
-- ----------------------------
DROP TABLE IF EXISTS `ding_setting`;
CREATE TABLE `ding_setting` (
  `id` tinyint(3) NOT NULL auto_increment,
  `sys_name` varchar(20) NOT NULL,
  `sys_value` text,
  `sys_info` varchar(100) default NULL,
  `sys_gid` tinyint(2) NOT NULL,
  `sys_type` varchar(10) NOT NULL,
  `myorder` tinyint(3) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_setting
-- ----------------------------
INSERT INTO `ding_setting` VALUES ('1', 'cfg_sitename', '7777777', '网站名称', '1', 'text', '0');
INSERT INTO `ding_setting` VALUES ('2', 'cfg_siteurl', '1', '网站地址', '1', 'radio', '0');
INSERT INTO `ding_setting` VALUES ('3', 'cfg_keywords', '1', '关键字', '1', 'radio', '0');
INSERT INTO `ding_setting` VALUES ('4', 'cfg_description', '58555sssss55555\r\ndededee', '网站描述', '1', 'textarea', '0');
INSERT INTO `ding_setting` VALUES ('5', 'cfg_copyright', '55555555666', '版权信息', '2', 'textarea', '0');

-- ----------------------------
-- Table structure for `ding_title`
-- ----------------------------
DROP TABLE IF EXISTS `ding_title`;
CREATE TABLE `ding_title` (
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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='标题表';

-- ----------------------------
-- Records of ding_title
-- ----------------------------
INSERT INTO `ding_title` VALUES ('1', '1', '测试文章', '测试文章', null, null, '', '', '', '', '', '', '0', '1355799013', '1355799013', 'true', 'false');
INSERT INTO `ding_title` VALUES ('2', '1', '测试文章2', '测试文章3', null, null, '', '', '', '', '', '', '0', '1355799013', '1355799013', 'true', 'false');
INSERT INTO `ding_title` VALUES ('3', '1', '测试文章3', '测试文章3', null, null, '', '', '', '', '', '', '0', '1355799013', '1355799013', 'true', 'false');
INSERT INTO `ding_title` VALUES ('4', '1', '测试文章4', '测试文章4', null, null, '', '', '', '', '', '', '0', '1355799013', '1355799013', 'true', 'false');
INSERT INTO `ding_title` VALUES ('5', '1', '测试文章5', '测试文章5', null, null, '', '', '', '', '', '', '0', '1355799013', '1355799013', 'true', 'false');
INSERT INTO `ding_title` VALUES ('7', '1', '测试文章7', '测试文章7', null, null, '', '', '', '', '', '', '0', '1355799013', '1355799013', 'true', 'false');
INSERT INTO `ding_title` VALUES ('8', '1', '测试文章8', '测试文章8', null, null, '', '', '', '', '', '', '0', '1355799013', '1355799013', 'true', 'false');
INSERT INTO `ding_title` VALUES ('9', '1', '测试文章9', '测试文章9', null, null, '', '', '', '', '', '', '0', '1355799013', '1355799013', 'true', 'false');
INSERT INTO `ding_title` VALUES ('10', '1', '测试文章10', '测试文章10', null, null, '', '', '', '', '', '', '0', '1355799013', '1355799013', 'true', 'false');
INSERT INTO `ding_title` VALUES ('11', '2', '测试文章11', '测试文章11', null, null, '', '', '', '', '', '', '0', '1355799013', '1355799013', 'true', 'true');
INSERT INTO `ding_title` VALUES ('12', '2', '测试文章12', '测试文章12', null, null, '', '', '', '', '', '', '0', '1355799013', '1355799013', 'true', 'true');
INSERT INTO `ding_title` VALUES ('13', '1', '的的的', '', '', null, '', '', '', '', '', '', null, '0', '0', 'true', 'false');
