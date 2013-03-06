/*
Navicat MySQL Data Transfer

Source Server         : 192.168.1.107
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : dingcms

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2013-03-06 12:41:56
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
  `dwend1` varchar(30) default NULL,
  `dwend2` varchar(20) default NULL,
  PRIMARY KEY  (`did`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_addarticle
-- ----------------------------
INSERT INTO `ding_addarticle` VALUES ('1', '14', 'M2M简介1', 'M2M简介2');
INSERT INTO `ding_addarticle` VALUES ('2', '15', '实时数据库和关系数据库的设计特点1', '实时数据库和关系数据库的设计特点2');
INSERT INTO `ding_addarticle` VALUES ('3', '16', '朱志祥讲物联网（一）1', '朱志祥讲物联网（一）2');
INSERT INTO `ding_addarticle` VALUES ('4', '17', '解析M2M：物联网的四大支撑技术之一1', '解析M2M：物联网的四大支撑技术之一2');
INSERT INTO `ding_addarticle` VALUES ('5', '18', '全网通址 物联网时代手机是什么1', '全网通址 物联网时代手机是什么2');
INSERT INTO `ding_addarticle` VALUES ('6', '19', '红外线感应器1', '红外线感应器2');
INSERT INTO `ding_addarticle` VALUES ('7', '20', 'ZigBee技术在物联网系统中的应用研究1', 'ZigBee技术在物联网系统中的应用研究');
INSERT INTO `ding_addarticle` VALUES ('8', '21', '浅析公共安全监测物联网技术1', '浅析公共安全监测物联网技术2');
INSERT INTO `ding_addarticle` VALUES ('9', '22', '物联网冰箱1', '物联网冰箱2');

-- ----------------------------
-- Table structure for `ding_addvideo`
-- ----------------------------
DROP TABLE IF EXISTS `ding_addvideo`;
CREATE TABLE `ding_addvideo` (
  `did` int(20) NOT NULL auto_increment,
  `title_id` int(20) unsigned NOT NULL,
  PRIMARY KEY  (`did`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_addvideo
-- ----------------------------

-- ----------------------------
-- Table structure for `ding_ads`
-- ----------------------------
DROP TABLE IF EXISTS `ding_ads`;
CREATE TABLE `ding_ads` (
  `id` mediumint(8) NOT NULL auto_increment,
  `sort_id` smallint(3) NOT NULL,
  `webname` varchar(20) NOT NULL,
  `weburl` varchar(200) NOT NULL,
  `webpic` varchar(255) NOT NULL,
  `myorder` smallint(3) NOT NULL,
  `status` enum('true','false') NOT NULL default 'true',
  `emark` varchar(255) NOT NULL,
  `addtime` int(10) NOT NULL,
  `updatetime` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_ads
-- ----------------------------
INSERT INTO `ding_ads` VALUES ('2', '1', '站长先生', 'http://www.adminsir.net', '/Public/Uploads/Images/20130128/1359340690.jpg', '0', 'true', '的', '1359340987', '1359340987');
INSERT INTO `ding_ads` VALUES ('3', '1', '齐鲁企业', 'http://www.qiluqiye.com', '/Public/Uploads/Images/20130128/1359340690.jpg', '0', 'false', 'de得的', '1359344022', '1359344022');

-- ----------------------------
-- Table structure for `ding_ads_sort`
-- ----------------------------
DROP TABLE IF EXISTS `ding_ads_sort`;
CREATE TABLE `ding_ads_sort` (
  `id` smallint(3) NOT NULL auto_increment,
  `ename` varchar(20) NOT NULL,
  `status` enum('true','false') NOT NULL default 'true',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_ads_sort
-- ----------------------------
INSERT INTO `ding_ads_sort` VALUES ('1', '首页2', 'true');

-- ----------------------------
-- Table structure for `ding_block_sort`
-- ----------------------------
DROP TABLE IF EXISTS `ding_block_sort`;
CREATE TABLE `ding_block_sort` (
  `id` smallint(3) NOT NULL auto_increment,
  `ename` varchar(20) NOT NULL,
  `status` enum('true','false') NOT NULL default 'true',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_block_sort
-- ----------------------------

-- ----------------------------
-- Table structure for `ding_comment`
-- ----------------------------
DROP TABLE IF EXISTS `ding_comment`;
CREATE TABLE `ding_comment` (
  `id` mediumint(8) NOT NULL auto_increment,
  `title_id` mediumint(8) NOT NULL,
  `post_id` mediumint(5) NOT NULL,
  `post_name` varchar(20) NOT NULL,
  `addtime` int(10) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `replytime` int(10) NOT NULL,
  `reply_id` mediumint(5) NOT NULL,
  `msgcontent` text NOT NULL,
  `replycontent` text NOT NULL,
  `status` enum('false','true') NOT NULL default 'false',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_comment
-- ----------------------------
INSERT INTO `ding_comment` VALUES ('1', '15', '1', 'name', '1359434592', '', '1359434592', '2', 'dedede', 'dededede44444444444444444', 'true');

-- ----------------------------
-- Table structure for `ding_content`
-- ----------------------------
DROP TABLE IF EXISTS `ding_content`;
CREATE TABLE `ding_content` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `title_id` mediumint(8) unsigned NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

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
INSERT INTO `ding_content` VALUES ('14', '14', '<p>\r\n	<span style=\\\"font-family:arial, 宋体, sans-serif;font-size:14px;line-height:24px;background-color:#FFFFFF;\\\">简\r\n单的说，M2M是将数据从一台终端传送到另一台终端，也就是就是机器与机器（Machine to \r\nMachine）的对话。但从广义上M2M可代表机器对机器（Machine to Machine）人对机器（Man to \r\nMachine）、机器对人（Machine to Man）、移动网络对机器（Mobile to \r\nMachine）之间的连接与通信，它涵盖了所有实现在人、机器、系统之间建立通信连接的技术和手段。</span> \r\n</p>\r\n<p>\r\n	<span style=\\\"font-family:arial, 宋体, sans-serif;font-size:14px;line-height:24px;background-color:#FFFFFF;\\\"><br />\r\n</span> \r\n</p>\r\n<p>\r\n	<span style=\\\"font-family:arial, 宋体, sans-serif;font-size:14px;line-height:24px;background-color:#FFFFFF;\\\">2．M2M的发展情况 </span> \r\n</p>\r\n<div class=\\\"spctrl\\\" style=\\\"font-family:arial, 宋体, sans-serif;background-color:#FFFFFF;\\\">\r\n</div>\r\n<span style=\\\"font-family:arial, 宋体, sans-serif;font-size:14px;line-height:24px;background-color:#FFFFFF;\\\"> M2M应用市场正在全球范围快速增长，随着包括通信设备、管理软件等相关技术的深化，M2M产品成本的下降，M2M业务将逐渐走向成熟。目前，在美国和加\r\n拿大等国已经实现安全监测、机械服务、维修业务、自动售货机、公共交通系统、车队管理、工业流程自动化、电动机械、城市信息化等领域的应用。</span>');
INSERT INTO `ding_content` VALUES ('15', '15', '<div class=\\\"content\\\">\r\n	<strong>1、数据的组织方式</strong><br />\r\n<span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\"> 实时数据库可以简单地理解为它是这样的数据库：由测点信息库、实时数据库、历史数据库三个数据库组成。</span><br />\r\n<span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\"> 测点信息库含有一个测点基本信息字段的一张表，这个表以测点标签作为关键字，对应一条测点基本信息的记录包含一条测点的基本配置信息，如压缩偏差，例外偏\r\n差，测点描述等。用户可从此数据库中查询测点的基本信息。实时数据库是内存快照数据库，反映了生产实时数据的时间戳、数值、质量等秒级变化。用户可从此数\r\n据库中查询生产实时数据的实时数据值（值，时间戳，质量）。</span><br />\r\n<span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\"> 历史数据库是含有一个以测点名称字段和时间字段为关键字的一张表，这张表的另外的一个重要的字段就是数值字段，用来存储测点的采集值，除了这些字段，还可\r\n以包含数据的状态，数据质量字段等。随着时间的变化，不断地将实时数据库中的实时数据进行压缩过滤，并更新磁盘历史数据文件中的表里的数据。用户可从此数\r\n据库中查询生产实时数据的历史样本值或历史插值数据。而对于关系数据库则是根据各个实体之间的关系来设计数据表的。</span><br />\r\n<span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\"> </span><strong>2、系统高可靠设计</strong><br />\r\n<span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\"> 由于实时数据库记录的是和生产相关的数据，并且和时间相关，所以要求其必须能够长时间稳定运行，否则就会导致数据的丢失。目前一些实时数据库已经具有缓存数据的功能，当</span><u>数据采集</u><span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\">机器和实时数据库服务器之间通信出现故障时，可以把采集到的数据缓存到本地，当通信恢复正常后，把缓存的数据写入到实时数据库服务器中，另外两台实时数据库可以设置为冗余来提高可靠性。</span><br />\r\n<span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\"> 而对于关系数据库来说，如果在关键业务，比如电信金融等，多数采用计算机集群形式来提高可靠性的设计。</span><br />\r\n<span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\"> </span><strong>3、数据来源</strong><br />\r\n<span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\"> 针对不同的类型的企业，实时数据库的数据的来源也不尽相同。主要来源有DCS控制系统，数据采集系统（</span><u>SCADA</u><span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\">）,手工录入，关系数据库等。这些数据的主要特点就是都和生产直接相关，并且大多数的数据都是数值型数据，比如设备或介质的压力、温度、流量、位置、电压、电流、功率等。</span><br />\r\n<span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\"> 关系数据库的来源更加多样。除了记录数值数据外，也记录描述性的数据，如姓名家庭住址等信息。</span><br />\r\n<span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\"> 一般来说，实时数据库的数据来源一般是设备。而关系数据库的数据来源一般是来自于人的录入。</span><br />\r\n<span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\"> </span><strong>4、数据压缩</strong><br />\r\n<span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\"> 实时数据库因为存储的数据量非常大，比如要采集10000点的数据，每5秒采集一个数据，假设采集的都是32位浮点数，那么一天的数据量（仅数值属性不含\r\n时间属性）就是10000*（60/5）*60*24*4/1024=675000K，大约675M的数据。由此可见数据量的庞大，而且占用磁盘的空间\r\n大，对数据的访问速度也会降低。因此各个数据库厂家大都开发出自己的数据压缩算法，对数据进行压缩。常用的压缩算法可以分为三类：无损压缩，有损压缩，二\r\n级压缩。其中，无损压缩一般以通用压缩理论为基础，采取huffman等经典的压缩算法；而有损压缩则更多地考虑了工业实时数据的特征，而采取的一些特殊\r\n舍点算法；二级压缩技术，则是同时利用了这两种数据压缩技术。实时数据库的无损压缩以通用压缩理论为基础。目前比较著名的有损压缩算法,有常用的旋转门压\r\n缩算法，以及一些变通压缩算法（如在旋转门算法基础上改用二次均方差作为偏差比较，以提高数据还原精度），这些算法原理都比较简单。</span><br />\r\n<span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\"> 关系型数据库则不会对数据进行压缩,只会对库体进行常规文件压缩。</span><br />\r\n<span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\"> </span><strong>5、数据的访问方式</strong><br />\r\n<span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\"> 实时数据库一般有以下3种方式访问数据</span><br />\r\n<span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\"> 1)     使用自己的API,这种方式效率最高也最简单。</span><br />\r\n<span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\"> 2)     使用ODBC或者OLEDB,这种方式不大常用，主要是给那些刚刚接触实时数据库或者以前对关系型数据库了解的用户使用的。</span><br />\r\n<span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\"> 3)     使用Opc方式访问数据。Opc是一种广泛使用的工业标准，虽然效率不高，但是目前很多的厂家都支持。</span><br />\r\n<span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\"> 关系数据库访问数据的方式是通过结构化查询语言（SQL）来访问的。</span><br />\r\n<span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\"> </span><strong>6、应用领域</strong><br />\r\n<span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\"> 过程控制系统是实时数据库系统最重要的应用领域之一.在生产装置运行过程中，实时数据库实时记录采集装置的运行数据，随时掌握装置的运行状况，并通过对生\r\n产过程的关键数据的监控和分析，对出现的问题及时处理，使生产的运行状态保持安全平稳,当生产状况发生变化时可以及时作出反映；通过对影响原材料用量的过\r\n程监视以及对水电汽的用量的监测分析，可以及时发现问题，特别对生产调度人员来说，可以及时地平衡物料供应，减少单耗，提高经济效益。</span><br />\r\n<span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\"> 而关系数据库的应用则广泛的多，在各行各业基本都可以见到。大多数应用在管理方面，比如管理信息系统（MIS），客户关系管理（CRM）等。</span><br />\r\n<span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\"> </span><strong>7、两种数据库之间的集成趋势</strong><br />\r\n<span style=\\\"font-family:Arial, Helvetica, sans-serif, ����;font-size:14px;line-height:28px;background-color:#FFFFFF;\\\"> 虽然实时数据库和关系数据库有着很多的不同，但是目前实时数据库和关系数据库集成的趋势越来越明显。将生产管理信息系统中使用的关系数据库和实时数据库集\r\n成到一起，可以同时满足控制和管理的要求，真正成为管理控制一体化的平台。例如，目前大多行业均利用实时数据库与关系数据库作为基础数据库软件构建监控中\r\n心及数据中心的基础数据库。其中实时数据库处理并存储生产实时数据，关系数据库处理并存储业务关系数据。 (责任编辑：zxh007)</span>\r\n</div>');
INSERT INTO `ding_content` VALUES ('16', '16', '<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n	<span style=\\\"color:#3366FF;\\\">物联网基本概念</span> \r\n</p>\r\n<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n	      物联网(Internet of \r\nThings，IOT)就是物与物相连的互联网。这有两层意思：第一，物联网的核心和基础仍然是互联网，是在互联网基础上延伸和扩展的网络；第二，用户端\r\n可延伸和扩展到任何物体与物体之间，并可进行信息交换和通信。因此，物联网的定义是：通过射频识别（RFID）、红外感应器、全球定位系统、激光扫描器、\r\n气体感应器等信息传感设备，按约定的协议，将物体与互联网连接起来，以进行信息交换和通信，从而实现对物体的智能化识别、定位、跟踪、监控和管理的一种网\r\n络。\r\n</p>\r\n<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n	      \r\n物联网是现代信息技术发展到一定阶段后出现的一种聚合性应用与技术提升，将各种感知技术、现代网络技术和人工智能与自动化技术进行聚合与集成应用，使人与\r\n物智慧对话，创造一个智慧的世界。物联网的本质概括起来主要体现在三个方面：一是互联网特征，即对需要联网的物一定要能够在互联网上实现互联互通；二是识\r\n别与通信特征，即纳入物联网的“物”一定要具备自动识别与物与物通信（M2M）的功能；三是智能化特征，即网络系统应具有自动化、自我反馈与智能控制的特\r\n点。\r\n</p>\r\n<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n	<span style=\\\"color:#3366FF;\\\">物联网技术架构</span> \r\n</p>\r\n<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n	      从技术架构上来看，物联网可分为三层：感知层、网络层和应用层。\r\n</p>\r\n<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n	      感知层由传感器以及传感器网关构成，包括各种传感器、二维码标签、RFID 标签和读写器、摄像头、GPS等感知终端。感知层的作用相当于人的眼耳鼻喉和皮肤等神经末梢，它是物联网获得识别物体，采集信息的来源，其主要功能是识别物体，采集信息。\r\n</p>\r\n<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n	      网络层由各种私有网络、互联网、有线和无线通信网、网络管理系统和云计算平台等组成，相当于人的神经中枢和大脑，负责传递和处理感知层获取的信息。\r\n</p>\r\n<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n	<br />\r\n</p>\r\n<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n	应用层是物联网和用户（包括人、组织和其他系统）的接口，它与行业需求结合，实现物联网的智能应用。\r\n</p>\r\n<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n	      物联网的行业特性主要体现在应用领域，目前绿色农业、工业监控、公共安全、城市管理、远程医疗、智能家居、智能交通和环境监测等各个行业均有物联网应用的尝试。\r\n</p>\r\n<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n	<span style=\\\"color:#3366FF;\\\">物联网的基本应用模式</span> \r\n</p>\r\n<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n	      物联网用途广泛，遍及智能交通、环境保护、政府工作、公共安全、平安家居、智能消防、工业监测、环境监测、老人护理、个人健康、花卉栽培、水系监测、食品溯源、敌情侦查和情报搜集等各个领域。 根据其实质用途，物联网可以归结为三种基本应用模式：\r\n</p>\r\n<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n	      \r\n一是对象的智能标签。通过二维码，RFID等技术标识特定的对象，用于区分对象个体，例如在生活中我们使用的各种智能卡和条码标签，其基本用途就是用来获\r\n得对象的识别信息；此外，通过智能标签还可以用于获得对象物品所包含的扩展信息，如智能卡上的金额余额，二维码中所包含的网址和名称等。\r\n</p>\r\n<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n	      \r\n二是环境监控和对象跟踪。利用多种类型的传感器和分布广泛的传感器网络，实现对某个对象的实时状态的获取和特定对象行为的监控。如使用分布在市区的各个噪\r\n音探头监测噪声污染；通过二氧化碳传感器监控大气中二氧化碳的浓度；通过GPS标签跟踪车辆位置，通过交通路口的摄像头捕捉实时交通流量等。\r\n</p>\r\n<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n	      三是对象的智能控制。物联网基于云计算平台和智能网络，可以依据传感器网络用获取的数据进行决策，改变对象的行为，或进行控制和反馈。例如根据光线的强弱调整路灯的亮度，根据车辆的流量自动调整红绿灯的时间间隔等。 \r\n</p>');
INSERT INTO `ding_content` VALUES ('17', '17', '<p>\r\n	<img src=\\\"/Public/Uploads/Images/20130125/1359089161.jpg\\\" alt=\\\"\\\" />\r\n</p>\r\n<p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		<strong>M2M的基本概念</strong> \r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		首先，M2M有以下三个基本特征：1数据和节点（DEP）2通信网络 3数据融合点（DIP）。\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		DEP和DIP可以用于任何子系统集成。例如，一个完整的过程（X）到一个IT应用（Y）。图1显示了三要素之间的相互关系。这个解决方案也被称为“端对端的M2M”。（X）和应用（Y）构成了事实上的功能端点。\r\n	</p>\r\n	<div style=\\\"font-size:14px;font-family:tahoma, 宋体;color:#333333;background-color:#FFFFFF;\\\">\r\n		图1 M2M的基本概念\r\n	</div>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		一般而言，一个数据端点（DEP）指的是一个微型计算机系统，一个连接到程序或者是更高层次子系统的端点。另一个端点连接到通信网络。在大多数的MSM\r\n应用中，都有几个DEP。另一方面，一个典型的M2M应用只有一个数据结合点。虽说是这样，但是可以设想M2M应用有多个DIP。对于DIP没有硬性的规\r\n 定。例如可以形成一个互联网服务器或特殊的软件应用在交通控制主机。\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		M2M应用的信息流也未必是面向服务器的。相反，DIP和DIP之间的直接通信路线是被支持的，还有单个DEP之间直接和间接的联系，就像我们所熟知的P2P（Peer-to-Peer）联系一样。\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		如上所述，M2M应用的通信网络是DEP（数据终点）和DIP（数据集成电）之间的中央连接部分。就物理部分来说，这种网络的建立可以使用局域网、无线网络、电话网络/ISDN，或者是类似的。\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		<strong>基于M2M的监控基础架构</strong> \r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		如今，无数的应用程序使用复杂的网络设备，其中大多数系统履行每天24小时、每周7天、没有任何人监督的服务。个别子系统故障，整个应用程序至少是一部分将受到损害。然而，尽快检测出具体的故障仍是一个问题。 \r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		<img src=\\\"/Public/Uploads/Images/20130125/1359089192.jpg\\\" alt=\\\"\\\" />\r\n	</p>\r\n	<p>\r\n		<div style=\\\"font-size:14px;font-family:tahoma, 宋体;color:#333333;background-color:#FFFFFF;\\\">\r\n			<div>\r\n				<span style=\\\"font-size:12px;\\\">图2 基于M2M的监控基础架构</span> \r\n			</div>\r\n		</div>\r\n		<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n			图2显示了一个基于M2M的基础设施监测的解决方案。该数据终点（DEP）在每一种情况下都通过特殊的监测传感器检查基础设施组成部分的可用性。任何潜 \r\n在的故障都能通过DEP被迅速监测。单独的DEP通过通信网络和监控应用软件相连接。这个应用软件用于数据集成点（DIP）。它从单独的监控基础设施的 \r\nDEP接收失败、错误和故障信息（图的X、Y和Z）。\r\n		</p>\r\n		<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n			除了与DEP连接之外，DIP监控软件还有另外两个接口：配置接口和通知接口。配 \r\n置接口是决定谁、什么时候对系统负责。这通常使得可能设想不同的通知方案。该接口对监控行为进行明确界定。通知接口发送各种消息（SMS、电子邮件、自动\r\n 发送传真，或者拨打某个电话号码和播放音频文件）。\r\n		</p>\r\n		<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n			<strong>总结和展望</strong> \r\n		</p>\r\n		<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n			基于GSM、GPRS、EDGE和UMTS的M2M概念在进一步发展和节省开销方面都潜力巨大。但是目前大多数对象还不能彼此沟通。缺乏标准化的接口和数据端点与数据结合点间的数据格式仍然是一个问题。  \r\n		</p>\r\n	</p>\r\n</p>');
INSERT INTO `ding_content` VALUES ('18', '18', '<div class=\\\"content\\\">\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;text-indent:2em;\\\">\r\n		  离开互联网的生活不可想象，可你听说过“物联网”吗？这个出现在总理政府工作报告中的新名词到底是什么何方神圣？物联网时代，手机是什么？\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;text-indent:2em;\\\">\r\n		物联网的英文名称叫“The Internet of \r\nthings”。顾名思义，物联网就是“物物相连的互联网”。这有两层意思：第一，物联网的核心和基础仍然是互联网，是在互联网基础上的延伸和扩展的网\r\n络；第二，其用户端延伸和扩展到了任何物体与物体之间，进行信息交换和通信。因此，物联网的定义是：通过信息传感设备，按照约定的协议，把任何物品与互联\r\n网连接起来，进行信息交换和通讯，以实现智能化识别、定位、跟踪、监控和管理的一种网络。它是在互联网基础上延伸和拓展的网络。\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;text-indent:2em;\\\">\r\n		过去，手机的作用还仅仅停留在沟通交流的功能上，而现在，手机的功能越来越多，它不仅可以用来通信，还可以用来娱乐、上网、学习、营销、办公、监控等。手\r\n机已经成为智能终端。那么确切一些说，在物联网时代，手机是什么呢？它是上网工具、音乐播放器、照相机、电视机、钱包... \r\n...它是三网融合的一个集成体，物联网真正地将手机变成了一个遥控器、监控器、感应器、信息接收器、搜索器、经济交易器、移动营销器... \r\n...刹那间，手机变得强大起来。\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;text-indent:2em;\\\">\r\n		专家预计，今年中国物联网产业规模将达2000亿，蕴含无限商机，而物联网手机不失为物联网应用的最佳尝试。物联网手机将会凭着其“聪明”进入人们的生活\r\n是毫无疑问的。随着物联网手机的推广和普及，物联网这座最大的金矿将会爆发。据统计，目前中国已经有8.3亿手机用户。当这么多手机用户都是物联网的用户\r\n时，那将是怎样一种景观！\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;text-indent:2em;\\\">\r\n		手趣全网通址以其前瞻性的眼光看好物联网的发展，它为企业提供融合互联网、移动互联网与物联网的平台建设、无线推广、精准营销等服务，帮助企业实现“全程\r\n电子商务”。李嘉诚曾提出20/80的概念，他说，当只有20%的人知道的时候，去做，就更容易把握住先机或者商机；当有了80%的人知道的时候，再做，\r\n基本上你只能是个使用者或者是个消费者。在物联网时代，手机究竟是什么呢？如果我们是那提前知道并利用物联网商机的20%，那么手机就是印钞机。如果我们\r\n是那后来知晓并利用物联网商机的80%，那么手机就仅仅是一个智能终端。 \r\n	</p>\r\n</div>');
INSERT INTO `ding_content` VALUES ('19', '19', '<div class=\\\"content\\\">\r\n	<span style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;line-height:22px;background-color:#FFFFFF;\\\">红外智能节电开关是基于红外线技术的自动控制产品，当有人进入感应范围时，专用传感器探测到人体红外光谱的变化，自动接通负载，人不离开感应范围，将持续接通；人离开后，延时自动关闭负载。人到灯亮，人离灯熄，亲切方便，安全节能，更显示出人性化关怀。</span> \r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		<strong>简介</strong> \r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		红外线感应器是根据红外线反射的原理研制的，属于一种智能节水、节能设备。包括感应水龙头、自动干手器、医用洗手器、 自动给皂器、感应小便斗冲水器、感应便器。\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		这是标准的称呼，也有称为热红外人体感应器。\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		<strong>原理</strong> \r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		这种是通过红外线反射原理，当人体的手或身体的某一部分在红外线区域内，红外线发射管发出的红外线由于人体手或身体摭挡反射到红外线接收管，通过集成线路\r\n内的微电脑处理后的信号发送给脉冲电磁阀，电磁阀接受信号后按指定的指令打开阀芯来控制头出水；当人体的手或身体离开红外线感应范围，电磁阀没有接受信\r\n号，电磁阀阀芯则通过内部的弹簧进行复位来控制的关水。\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		<strong>红外智能开关简介</strong> \r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		<strong>应用</strong> \r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		红外智能节电开关是一种高科技产品，它的性能稳定，真正做到了既节能又环保，可以说是声光控产品的完美替代产品。它是通过人体辐射、能自动快速开启各种灯\r\n具、防盗报警器、自动门等各种电器设备。特别适用于中、高级宾馆、公寓、企事业单位、商场、过道、走廊等。方式为一次触发及连续触发。\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		测到人体红外光谱的变化，自动接通负载，人不离开感应范围，将持续接通；人离开后，延时自动关 \r\n闭负载。人到灯亮，人离灯熄，亲切方便，安全节能，更显示出人性化关怀。红外智能节电开关由于触发的时候不需要人发出任何声音，而是人走过时身体向外界散\r\n发红外热量最终控制灯具的开启，当人离开后，经过一定时间的延时，自动熄灭。因为不同于声光控灯，不需要声音和开关控制，从而避免了声控噪音的侵扰，同时\r\n 因为它是感应人体热量控制开关，所以避免了无效电能的损耗，达到节能效果。\r\n	</p>\r\n<span style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;line-height:22px;background-color:#FFFFFF;\\\">现\r\n在的公共场所照明（比如公共走廊及楼梯间） \r\n应用最多的还是几年前出现的声光控延时灯具和开关。这种灯具和开关的出现，实现了人来灯亮，人走灯灭，目前已成为公共场所照明开关的主流产品。当然，这种\r\n产品在某种程度上说确实实现了节能的目的，但同时也给人们的生存环境造成了一定的破坏。由于产品本身性能的限制，这种声光控灯具和开关自动控制的实现需要\r\n （超过60分贝）声音的配合，这就给大众需要的安静环境造成一定的噪声污染。 \r\n随着社会的发展和人们对生态环境的重视，这种声光控灯具和开关已慢慢不能满足人们的需要，这就要求更加节能和环保的自动照明控制产品的出现，以满足人们对\r\n 高质量生活的需求。 \r\n红外智能节电开关是以成熟的红外感应技术为平台，加入更多的高新技术元素而形成的一种具有广阔市场前景的高科技产品，它的出现弥补了声光控技术的缺陷，它\r\n 的自动控制的实现不需要声音和其他会给环境造成影响的条件的配合，而是人走过时身体向外界散发红外热量最终实现它的自动控制功能。 \r\n同时，由于它融入了更多更先进的高科技元素，更节能，更环保。</span> \r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		<strong>主要技术指标</strong> \r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		1、适用电压：AC180V-250V(50/60Hz)\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		2、负载特性：全兼容 负载功率：25W-200W\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		3、感应范围：120&ordm;圆锥角 5－6m以内\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		4、照明控制：＞250LUX自动熄灭 ＜120LUX自动开启（室内有人）\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		5、关闭延时：9 min+30s\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		6、接法：三线串接型\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		7、自身功耗:小于10MW 8、工作温度：-20℃－+50℃ 红外智能节电开关利用人体红外线感应原理，采用先进的集成电路和精密电子元件多重组合。\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		<strong>显著特点</strong> \r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		1、采用先进成熟的集成电路高倍节能，年耗电仅2～3度．\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		2、利用人体红外线感应原理，辅之高精密传感器，无需声音和开关控制，人来灯亮，人走灯灭，白天不亮，晚上亮（由于白天光线强，感应器自动关闭），从而有力保证了楼宇内生活空间的安静．\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		3、精密的电子元件多重组合，避免了灯具在触发的瞬间产生的强电流（声光控灯会在触发的瞬间产生强电流），这大大延长了普通灯泡的使用寿命（5倍以上），产品寿命可达8年以上，避免了长期更换灯泡之苦，同时也实现了节能的目的。\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		<strong>安装方式</strong> \r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		红外智能节电开关根据各种安装环境的需要，设计了两种能满足多种环境条件的安装方式：\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		1、墙壁嵌入式 红外智能感应灯的感应角度可达120度，克服了楼道的死角问题，即使走在楼道拐角处，感应灯也能正常工作。\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		2、吸顶式 红外智能感应灯以其高灵敏度、广角度等特点，被广泛的应用于楼道、走廊、卫生间、阳台等处，其外观精美，可与多款豪华灯具配套使用，既解决了声控灯及手动开关灯的噪音影响和不便，又能取得极好的装饰效果。\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		<strong>焦电型红外线探头</strong> \r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		<strong>特点</strong> \r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		焦电型红外线探头的优点是本身不发任何类型的辐射，器件功耗很小，隐蔽性好。价格低廉。缺点是：\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		◆容易受各种热源、光源干扰\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		◆被动红外穿透力差，人体的红外辐射容易被遮挡，不易被探头接收。\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		◆易受射频辐射的干扰。\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		◆环境温度和人体温度接近时，探测和灵敏度明显下降，有时造成短时失灵。\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		<strong>安装要求</strong> \r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		红外线热释电人体传感器只能安装在室内，其误报率与安装的位置和方式有极大的关系.。正确的安装应满足下列条件：\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		1、红外线热释电传感器应离地面2～2.2米。\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		2、红外线热释电传感器远离空调，冰箱，火炉等空气温度变化敏感的地方。\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		3、红外线热释电传感器和被探测的人体之间不得间隔家具、大型盆景、玻璃、窗帘等其他物体。\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		4、红外线热释电传感器不能直对窗口，否则窗外的热气流扰动和人员走动会引起误报，有条件的最好把窗帘拉上。红外线热释电传感器也不要安装在有强气流活动的地方。 \r\n	</p>\r\n</div>');
INSERT INTO `ding_content` VALUES ('20', '20', '<div class=\\\"content\\\">\r\n	<strong>引言 <br />\r\n</strong><br />\r\n<span style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;line-height:22px;background-color:#FFFFFF;\\\"> 随着互联网技术、无线传感技术、信息处理技术的快速发展，物联网技术得到越来越多的重视。 \r\n2003年，美国《技术评论》提出物联网将是未来改变人们生活的十大技术之首，物联网是在计算机互联网的基础上，利用电子商品代码EPC、RFID、无线\r\n数据通信等技术，构造的一个覆盖世界上万事万物的信息网络，是独立于EPC系统和互联网技术整合的产物。物联网一方面可以提高经济效益，大大节约成本，另\r\n 一方面可以为全球经济的复苏提供技术动力。 </span><br />\r\n<br />\r\n<span style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;line-height:22px;background-color:#FFFFFF;\\\"> ZigBee技术是一组基于IEEE 802．15．4无线标准研制开发的有关组网、安 \r\n全和应用软件方面的通信技术，它是一种短距离、低复杂度、低功耗、低数据速率、低成本的双向无线网络技术。它使用频段是全球通用的2．4GHz，该标准定\r\n义了在IEEE 802．15．4物理层(PHY)和标准媒体访问控制层(MAC)上的网络层及支持的应用服务，ZigBee联盟联盟的长期目标是能够建\r\n立基于互操作平台和配置文件的可伸缩、低成本嵌入式基础架构。物联网开发平台的搭建，对促进研究成果的转化和产学研对接也具有十分重要的意义，为最终实现\r\n “物联网”提供了一条简单、可行的途径。 </span><br />\r\n<br />\r\n<strong> 1 物联网开发平台硬件设计 <br />\r\n<br />\r\n</strong><span style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;line-height:22px;background-color:#FFFFFF;\\\"> 物 \r\n联网技术核心关键就是射频识别技术(RFID)，基本的RFID系统至少包含阅读器(Reader)和RFID标签(Tag)，它具有读取速度快、存储空\r\n间大、工作距离远、穿透性强、工作环境适应强、可重复使用等多种优势。RFID标签由芯片与天线组成，每个标签具有唯一的电子编码，标签附着在物体上以表\r\n 示目标对象。</span><br />\r\n<br />\r\n<span style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;line-height:22px;background-color:#FFFFFF;\\\"> 物联网另一个重要技术是无线传感网络技术，ZigBee技术是一种短距离、低复杂度、低功耗、低数据速率、低成本的双向无线网络，Zi-gBee技术以其经济、可靠、高效等优点在物联网技术中有着良好的应用前景。 </span><br />\r\n<br />\r\n<span style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;line-height:22px;background-color:#FFFFFF;\\\"> ZigBee网络存在3种逻辑设备类型：协调器、路由器和终端设备。ZigBee网络由一个协调器以及多个路由器和多个终端设备组成。ZigBee网络\r\n 的拓扑结构主要有3种：星型、树状和网状网络结构。ZigBee协议规范使用了IEEE802．15．4定义的物理层(PHY)和媒体介质访问控制层 \r\n(MAC)，并在此基础上定义了网络层(NWK)和应用层(APL)架构。</span><br />\r\n<br />\r\n<span style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;line-height:22px;background-color:#FFFFFF;\\\"> ZigBee硬件电路上采用TI/Chipcon公司开发 \r\n的2．4GHz IEEE 802．15．4/ZigBee片上系统解决方案CC2430/CC2431无线单片机。它免费提供ZigBee联盟认证的全\r\n面兼容的IEEE．80215．4—2003协议规范和ZigBee 2006协议规范的协议栈源代码和开发文档，集单片机仿真器、编程器、ZigBee\r\n 协议分析仪、图片点阵LCD显示屏、高性能语音电路、Joystick及几种典型模拟组件为一体的开发母版，实现TI/Chipeon公司提供的 \r\nZigBee开发软件的完全无缝连接。CC2430整合了2．4GHz IEEE 802．15．4/ZigBee RF收发机CC2420以及工业标准\r\n 的增强型8051MCU的卓越性能，还包括了8KB的SRAM、大容量闪存以及许多其他强大特性。CC2430在接收机传输模式下的电流损耗为 \r\n25 mA，使得RFID成为针对超长电池使用寿命应用的理想解决方案。ZigBee嵌入RFID射频识别系统的电路图如图所示。  </span><br />\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		<img src=\\\"http://www.iotmag.com/upload/2011-05/110518111846932.jpg\\\" alt=\\\"\\\" border=\\\"0\\\" /><br />\r\n<em>ZigBee嵌入RFID射频识别系统的电路图</em> \r\n	</p>\r\n<span style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;line-height:22px;background-color:#FFFFFF;\\\">在\r\n物联网开发平台系统中还有GPS和GPRS模块，全球定位系统(Global Positioning System，GPS)是一种以空中卫星为基 \r\n础的高精度无线电导航的全球定位系统，在全球任何地方以及近地空间能够提供准确的地理位置、车行速度及精确的时间信息。GPS系统由3大部分组成：空间部\r\n分、地面控制部分、用户设备部分。GPRS是通用分组无线业务(General Packet Radio Service)的简称，位于第二代(2G)\r\n和第三代(3G)移动通信技术之间。它通过利用GSM网络中未使用的TDMA信道，提供中速的数据传递。GPRS突破了GSM网只能提供电路交换的思维方\r\n 式，它只通过增加相应的功能实体和对现有的基站系统进行部分改造来实现分组交换，得到的用户数据速率却比GSM网络快得多。GPRS模块利用手机模块和\r\n SIM卡，把GPS定位到的数据进行短消息发送，告知对方物品所在的位置。  </span><br />\r\n<br />\r\n<span style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;line-height:22px;background-color:#FFFFFF;\\\"> </span><strong> 2 物联网开发平台软件设计 <br />\r\n</strong><br />\r\n<span style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;line-height:22px;background-color:#FFFFFF;\\\"> 在软件设计中使用IAR Embedded Workbench开发环境，它是一套高精密且使用方便的嵌入式应用编程开发工具，具有高度优化的 \r\nC/C++编译器、高性能的C-SPY调试器和硬件调试工具，支持RTOS内核识别调试，提供现成的代码流程，使二次开发更加简便快捷。另 \r\n外，ZigBee协议分析仪软件Packet Sniffer可以对空气中的无线信号进行监听、过滤和数据解码，并将按照一定的数据包格式显示在GUI界\r\n 面中，也可以将这些数据以二进制文件格式存储。Z-Location Engine是专为CC2430无线定位系统设计的系统图形监视软件，可以实现 \r\nZigBee无线网络定位系统的上位机实时定位监控，对系统各个节点进行参数修改和配置，以及定位电子地图显示和更新功能。 </span><br />\r\n<br />\r\n<strong> 3 物联网开发平台系统设计</strong><span style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;line-height:22px;background-color:#FFFFFF;\\\"> </span><br />\r\n<br />\r\n<span style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;line-height:22px;background-color:#FFFFFF;\\\"> 电子标签EPC(也称应答器)为防止不必要的损耗，应答器平时处于低功耗睡眠模式。阅读器在读取电子标签数据是通过天线发送一定频率的射频信号，当 \r\nEPC电子标签进入阅读器读取范围时，电子标签从阅读器发出的射频能量中提取工作所需的电能后被激活，进人工作状态，向阅读器发送自身的编码等EPC信 \r\n息，阅读器在接收到来自电子标签的载波信息后，并对接收信号进行解调和解码后，将其信息送至数据交换和管理系统进行处理，RFID数据交换和系统管理软件\r\n主要包括介于阅读器和工厂计算机应用系统之间的中间件Savant系统。另外读卡器在读取数据时容易发生“冲突”，就是同时有两个或多个标签进入读卡器读\r\n取范围，都向读卡器发送数据，从而使读卡器在读取数据时发生冲突。目前，有数据检验和防碰撞算法(ALOHA)两种方法解决这个问题，其中ALOHA是一\r\n 种时分多址存取方式， </span><br />\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		<br />\r\n<img src=\\\"http://www.iotmag.com/upload/2011-05/110518111846931.jpg\\\" alt=\\\"\\\" border=\\\"0\\\" /><br />\r\n<em>防冲突算法流程</em> \r\n	</p>\r\n<strong> 4 系统测试</strong><span style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;line-height:22px;background-color:#FFFFFF;\\\"> </span><br />\r\n<br />\r\n<span style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;line-height:22px;background-color:#FFFFFF;\\\"> 设计由参考节点、移动节点和网关节点组成的定位系统，将参考节点布置在一定的区域。本次选择两组，一组10个节点，其中2个测试用，另一组20个节点，\r\n其中4个测试用。网关节点把定位信息通过上位机显示出来。通过多次改变移动节点的位置来测量移动节点的位置，然后与实际位置进行比较，检测节点位置在区域\r\n中心，定位相对准确，边缘位置定位误差相对大些。经过试验，定位精度还与所在的环境有关，在空旷平缓的地方精度高些，在崎岖有障碍物的地方定位精度相对较\r\n 低。 </span><br />\r\n<br />\r\n<strong> 结语 <br />\r\n</strong><br />\r\n<span style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;line-height:22px;background-color:#FFFFFF;\\\"> 本文在充分考虑物联网系统的现有状况和深入分析技术难题的前提 \r\n下，把RFID、ZigBee、GPS、GPRS等技术融合在物联网开发平台中，构建一套基于ZigBee技术无线射频识别的物联网开发平台系统，提高了\r\n阅读器的读取能力、防冲突能力和组网能力，但是在物联网的实际应用中还有许多问题(如RFID的ISO/IEC标准，RFID系统数据传输的安全性和远距\r\n离识别、抗干扰能力等)亟待解决。随着RFID、ZigBee、GPS等技术不断的发展，不断的更新，它们在物联网中的优势将更为突出，将更好地改善人们\r\n 的生活。</span>\r\n</div>');
INSERT INTO `ding_content` VALUES ('21', '21', '引言\r\n<p>\r\n	随着对物联网的概念、内涵、技术、应用研究的不断深入，在环境、电力、物流、公共安全等领域和行业都涌现出众多物联网应用的典型案例。其中，公 \r\n共安全领域作为物联网应用的重点领域，具有与其它物联网应用不同的特点和特殊的地位，有必要将公共安全领域的物联网应用（以下简称安全物联网）作为一个独\r\n立的概念进行深入研究。\r\n</p>\r\n<p>\r\n	1 安全物联网的背景及其内涵\r\n</p>\r\n<p>\r\n	当前，中国正处于工业化、城镇化快速发展时期，各种传统的和非传统的、自然的和社会的风险及矛盾交织并存，公共安全和应急管理工作面临的形势更 \r\n加严峻。主要有以下三个方面的问题：1）自然灾害处于多发频发期，近年来，极端气候事件频发，中强地震呈活跃态势，自然灾害及其衍生、次生灾害的突发性和\r\n危害性进一步加重加大；2）安全生产形势严峻，我国安全生产基础薄弱，一些地方和企业责任不落实、监管不到位，生产安全事故总量居高不下，重特大事故时有\r\n发生，预防事故发生和实施有效救援的任务繁重而艰巨；3）社会安全面临新的挑战，我国改革发展进入关键阶段，各种利益关系错综复杂，维护社会稳定的任务艰\r\n 巨。\r\n</p>\r\n<p>\r\n	面对频发的造成大量人员伤亡和财产损失的公共安全事故，亟需构建公共<a href=\\\"http://www.eeworld.com.cn/afdz/search.php?keywords=%E5%AE%89%E5%85%A8%E7%9B%91%E6%B5%8B&search=1\\\" target=\\\"_blank\\\">安全监测</a>物联网来感知公共安全隐患，以及解决突发事件发生后各部门之间如何互联互通等问题。\r\n</p>\r\n<p>\r\n	公共安全监测物联网是针对公共安全监测领域覆盖范围广、监测指标多、连续性要求高、所处环境不适合人工监测、感知的信息内容与人民群众的生活密切相关等特点，应用物联网技术尤其是传感器网络技术，构建的一个由感知层、<a href=\\\"http://www.eeworld.com.cn/afdz/search.php?keywords=%E7%BD%91%E7%BB%9C%E5%B1%82&search=1\\\" target=\\\"_blank\\\">网络层</a>、应用层共同构成的信息系统工程。对公共安全的监测主要包含保障各类生产场景安全的监测、对生产者安全的监测、对特定物品安全的监测、对人员密集场所监控、对重要设备设施监控以及事故应急处理时对场景、人员、物品的信息搜集等。\r\n</p>\r\n<p>\r\n	2 安全物联网在物联网发展中的地位\r\n</p>\r\n<p>\r\n	公共安全是国家安全和社会稳定的基石。为有效抵御各类人为或自然灾害的威胁，中国将加强公共安全保障措施作为政府工作的重点。公共安全监测物联网为解决我国面临的公共安全问题提供了一种新的思路，符合我国促进科技创新、走创新型国家发展道路的战略要求。\r\n</p>\r\n<p>\r\n	建立完善的公共安全监测物联网将为我国现在面临的桥梁隧道坍塌、危险物泄漏等安全问题提供切实有效的预防机制，全国范围内的公共安全监测物联网的互联更使得重大<a href=\\\"http://www.eeworld.com.cn/afdz/search.php?keywords=%E5%AE%89%E5%85%A8%E4%BA%8B%E4%BB%B6&search=1\\\" target=\\\"_blank\\\">安全事件</a>得\r\n以及时、有力、透明的解决。因此公共安全监测物联网作为与日常生活联系最密切、国家和人民最关注的公共安全领域的物联网应用，应该得到整个社会的重视和优\r\n先发展，坚持“政府主导、企业参与、社会支持、群众受益”的方针，通过公共安全监测物联网的发展来带动物联网在技术、应用、产业、标准方面的进步，使整个\r\n 社会切身感受到公共安全监测物联网带来的公共安全隐患可靠预防和突发事件应急处理的优势，加强人们对物联网价值的认知程度。\r\n</p>\r\n<p>\r\n	3 安全物联网的体系结构及关键技术\r\n</p>\r\n<p>\r\n	图1描述了公共安全监测物联网的网络架构，它的整体架构与物联网的整体架构相似，由感知层、网络层、应用层三部分组成。但由于公共安全监测物联网应用场景的特殊性，它具有一些其它物联网应用不具备的技术特点，总结如下：\r\n</p>\r\n<p>\r\n	1） \r\n在感知层，被感知信息的类型多样，实时性要求高，大多数信息的感知（如桥梁建筑物的安全状况，危险物品的监测等）要求精度高且很难通过人工手段检测。由于\r\n安全隐患的信息类型不确定性很高，在人员密集场所或高危生产场所应长时间部署大量不同类型的传感器，对感知层的组网策略、能源管理、传输效率、QoS、传\r\n 感器的编码、地址、频率与电磁干扰等问题提出了更高的要求，这些问题也是公共安全监测物联网能否成熟应用的关键。\r\n</p>\r\n<p>\r\n	2） \r\n在网络层，由于公共安全监测物联网感知到的信息的涉及国家重点行业以及群众的日常生活，这些信息一旦泄漏或不正当使用都有可能危及国家安全、社会稳定以及\r\n人民群众的隐私；因此，公共安全监测物联网的信息内容有必要通过专用网络或者对3G移动网络采取安全防范措施后进行传输，保证信息的安全性、真实性和完整\r\n 性。\r\n</p>\r\n<p>\r\n	3） \r\n在应用层，针对海量的数据信息和安全隐患可能带来的严重危害，需要建立专有的不同级别的公共安全物联网服务平台。服务平台不仅应具有强大的信息处理及融合\r\n能力，还须具有安全隐患的识别以及预警能力，同时当突发公共安全事故时，及时联动相关的职能部门进行应急处理，争取将损失和影响减到最小。另外，将不同级\r\n 别的公共安全物联网平台互联有利于根据安全事故的危害程度最大限度的调配资源，便于公共安全事件的及时、有效、透明解决。\r\n</p>\r\n<p>\r\n	<a href=\\\"http://www.iotmag.com/upload/2011-05/110527090785031.jpg\\\" target=\\\"_blank\\\"><img src=\\\"http://www.iotmag.com/upload/2011-05/110527090785031.jpg\\\" alt=\\\"\\\" style=\\\"width:492px;height:365px;\\\" height=\\\"377\\\" width=\\\"492\\\" /></a> \r\n</p>\r\n<p>\r\n	图1 公共安全监测物联网架构\r\n</p>\r\n<p>\r\n	针对公共安全监测物联网体系结构的特点，其涉及到的关键技术主要有：\r\n</p>\r\n<p>\r\n	a 针对公共安全监测领域的专用传感器的研发，包括增加传感器的监测信息类型、提高监测精度、减小体积、抗破坏、增强感知信息的抗干扰能力和保密能力等。\r\n</p>\r\n<p>\r\n	b 大规模传感器节点的自组织网络、协作感知技术、安全接入技术等感知层网络技术。\r\n</p>\r\n<p>\r\n	c 大规模传感器节点的编码、地址、频率分配与电磁干扰等问题。\r\n</p>\r\n<p>\r\n	d 网络层公共安全监测专用网络的结构、通信协议、异构的网络接入技术及网络安全技术等。\r\n</p>\r\n<p>\r\n	e 应用层主要涉及海量信息的智能处理、分析、综合技术以及统一的公共安全监测物联网服务平台的架构等技术。\r\n</p>\r\n<p>\r\n	图2描述了公共安全监测物联网服务平台的总体结构，系统平台将接收到的海量信息处理分析后由相应的服务模块进行处理，服务平台可以根据不同的公 \r\n共安全监测应用添加不同的服务模块。公共安全事件应急处理部门联动系统负责当突发安全事件发生时及时调动资源进行应急管理，以减少损失和影响。\r\n</p>\r\n<p>\r\n	<a href=\\\"http://www.iotmag.com/upload/2011-05/110527090785032.jpg\\\" target=\\\"_blank\\\"><img src=\\\"http://www.iotmag.com/upload/2011-05/110527090785032.jpg\\\" alt=\\\"\\\" style=\\\"width:474px;height:364px;\\\" height=\\\"371\\\" width=\\\"500\\\" /></a> \r\n</p>\r\n<p>\r\n	图2 公共安全监测物联网服务平台的总体结构\r\n</p>\r\n<p>\r\n	4 安全物联网的应用现状\r\n</p>\r\n<p>\r\n	在国内外，公共安全监测物联网已经存在众多应用案例，在公共安全领域发挥了明显的作用，例如：\r\n</p>\r\n<p>\r\n	美国Material \r\nTechnologies公司开发了一套裂缝诊断传感器系统，已经在宾夕法尼亚州检查了三座桥梁以及马萨诸塞州一座桥梁的裂缝，其传感器能够检测以每分钟\r\n几个分子的速度扩大的裂缝，从而提前几年发现可能对安全构成危害的裂缝。此外，早期诊断意味着道路修补人员执行的修补更为经济，因为当裂缝还小的时候，修\r\n 补起来更加容易。\r\n</p>\r\n<p>\r\n	在韩国，为了保护市民的生命和财产，遏制犯罪、恐怖袭击、火灾，开始在城市内安全隐患区域安装感应系统，为保障市民安全，建立安全的城市做出很多尝试，如图3所示。\r\n</p>\r\n<p>\r\n	<a href=\\\"http://www.iotmag.com/upload/2011-05/110527090785033.jpg\\\" target=\\\"_blank\\\"><img src=\\\"http://www.iotmag.com/upload/2011-05/110527090785033.jpg\\\" alt=\\\"\\\" style=\\\"width:449px;height:247px;\\\" height=\\\"284\\\" width=\\\"517\\\" /></a> \r\n</p>\r\n<p>\r\n	图3 公共安全物联网在城市安全方面的应用\r\n</p>\r\n<p>\r\n	目前国内全长约2.66公里的玄武湖隧道是我国最大的城市浅埋明挖湖底隧道，其中湖底段长约1.66公里。由于地质条件、应力条件、环境影响复杂，隧道很可能受温度、荷载、地下水等因素影响，产生不均匀的沉降、横向开裂、渗水等问题。\r\n</p>\r\n<p>\r\n	南京大学光电传感工程监测中心将特殊的连续分布式光纤“植入”混凝土层中。从施工开始，直至通车运行至今，这些光纤一直对隧道“健康”进行着实时监测。 \r\n</p>');
INSERT INTO `ding_content` VALUES ('22', '22', '<div class=\\\"content\\\">\r\n	<h3 class=\\\"headline\\\" style=\\\"color:#333333;font-family:tahoma, 宋体;background-color:#FFFFFF;\\\">\r\n		<span class=\\\"headline\\\">世界首台物联网冰箱</span> \r\n	</h3>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		所谓的物联网冰箱，就是用射频自动识别技术，使得冰箱和物体之间能够识别的冰箱。从使用上看，物联网冰箱与冰箱里的食品实现了自由对话，提高了人类对食品\r\n的管理与应用。从技术上看，它是各类传感器和现有的“互联网”相互衔接的一种新技术，是对“互联网”技术的延伸。现在，物联网已开始不断地改变着我们的生\r\n活方式和消费习惯。 \r\n　　世界上第一台物联网冰箱由海尔集团制造。“物联网冰箱”是世界冰箱史上一款里程碑式的革命性产品。其不仅可以储存食物，而且可以通过与网络连接，实现\r\n了冰箱与冰箱里的食品、与超市的食品、与人类之间自由沟通。同时，它还带有网络可视电话功能、浏览资讯、播放视频等多项生活与娱乐功能，让原本属于生活电\r\n器的冰箱成为一个娱乐中心。\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		<strong>世界首台物联网冰箱诞生的过程</strong> \r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		      \r\n物联网被视为比互联网大30倍的产业。市场上有一个规律，每15年就会有新的技术驱动时代的变革，从计算机诞生到家用计算机、互联网分别走过了15年，物\r\n联网时代已经悄然而至，这是发达国家的一个重要表象。 \r\n　　通过物联网，所有的产品都将成为一个信息员，接收信息、发送信息，冰箱与食品对话，传送到超市，延伸到食物链，可以享受到食品的各种服务。洗衣机和衣\r\n服对话，智能识别衣服的质地和洁净度，自动洗净衣服。要做到与家电的对话，就需要有统一的接口，可以做到真正的互联互通，可以做到人与家电，家电与环境之\r\n间的交互。 \r\n　　在家里作为唯一24小时不停电的家电，冰箱无疑是最合适应用物联网技术的平台，用户的需求可以细分为三类：基本需求、衍生需求和差异化需求。具体到冰\r\n箱上来说，需求是冷冻、冷藏等基本需求，衍生需求是和人们健康、饮食相关的需求，差异化需求就是满足用户个性化的定制。 \r\n　　冰箱与食品连起来以后，通过各种网络，用户在办公室、在路上就可以提前了解冰箱里有什么食品。在家里，冰箱会自动提醒你，哪些东西该购买了，哪些东西\r\n保质期快到了，冰箱会自动提示大家来购买，只要你按一下手指，商家会自动为你送货上门。另一方面，专业人员也会通过物联网冰箱，统计用户的健康、饮食习\r\n惯，整合配套的服务。 \r\n　　物联网冰箱只是一个开端，未来会出现一系列的物联网家电，建立一个物联网家庭。如果用一句话概括未来的物联网生活，那就是“身在外，家就在身边；回到\r\n家，世界就在眼前”。\r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		<strong>物联网冰箱的功能</strong> \r\n	</p>\r\n	<p style=\\\"color:#333333;font-family:tahoma, 宋体;font-size:14px;background-color:#FFFFFF;\\\">\r\n		      \r\n物联网冰箱的食品智能管理和预定功能。当我们把食品买回家，放到冰箱里，冰箱就会自动显示冰箱里储存了什么样的食品，你可以很详细的看到保质期、数量等各\r\n种信息，同样你可以了解到更详细的信息。包括食品的产地、营养成分等，这样我们就可以吃到安全、放心的食品。当我们冰箱里的食品吃完了的时候，冰箱就会自\r\n动提示我们进行购买，比如我们冰箱里的蛋糕吃完了，冰箱就会自动地提示我们进行购买，然后你就可以进入购买界面，在这里就可以选择对你来说最方便的超市进\r\n行采购，这里面会有推荐的信息，你可以选择你最喜欢的食物进行下单。这样订单完成后，你足不出户，就可以享受到商家自动为你配送到家的服务。 \r\n　　当然，物联网冰箱还有很多超值的功能。例如，当我们在外地旅游的时候，想第一时间和家人分享快乐，那么我们就可以通过手机给家里的冰箱发一张照片，冰\r\n箱就能接受图片并显示出来。 \r\n　　当然物联网冰箱很多除了这些功能以外的娱乐功能。比如做饭的时候，会感觉到非常枯燥和乏味，这个时候你可以通过物联网冰箱，在做饭的同时听听音乐，看\r\n一下天天美食，学怎么做一手好菜，可以为家人准备丰盛的晚餐。类似这样的功能还有很多。 \r\n	</p>\r\n</div>');

-- ----------------------------
-- Table structure for `ding_flash`
-- ----------------------------
DROP TABLE IF EXISTS `ding_flash`;
CREATE TABLE `ding_flash` (
  `id` mediumint(8) NOT NULL auto_increment,
  `sort_id` smallint(3) NOT NULL,
  `ename` varchar(20) NOT NULL,
  `eurl` varchar(200) NOT NULL,
  `epic` varchar(255) NOT NULL,
  `myorder` smallint(3) NOT NULL,
  `status` enum('true','false') NOT NULL default 'true',
  `emark` varchar(255) NOT NULL,
  `addtime` int(10) NOT NULL,
  `updatetime` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_flash
-- ----------------------------
INSERT INTO `ding_flash` VALUES ('2', '2', '测试5222', 'http://www.adminsir.net', '/Public/Uploads/Images/20130128/1359340690.jpg', '0', 'true', '的', '1359340987', '1359358355');
INSERT INTO `ding_flash` VALUES ('3', '1', '齐鲁企业', 'http://www.qiluqiye.com', '/Public/Uploads/Images/20130128/1359340690.jpg', '0', 'false', 'de得的', '1359344022', '1359344022');
INSERT INTO `ding_flash` VALUES ('4', '1', 'ceshi信息', 'dededede', 'dedede', '0', 'false', 'de得的', '1359348562', '1359348739');
INSERT INTO `ding_flash` VALUES ('5', '1', '测试5', 'dededede', 'dedede', '0', 'true', 'dedeceshi2', '1359348640', '1359348640');

-- ----------------------------
-- Table structure for `ding_flash_sort`
-- ----------------------------
DROP TABLE IF EXISTS `ding_flash_sort`;
CREATE TABLE `ding_flash_sort` (
  `id` smallint(3) NOT NULL auto_increment,
  `ename` varchar(20) NOT NULL,
  `status` enum('true','false') NOT NULL default 'true',
  `width` varchar(12) default NULL,
  `height` varchar(12) default NULL,
  `emark` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_flash_sort
-- ----------------------------
INSERT INTO `ding_flash_sort` VALUES ('1', '首页3', 'true', '111', '222', '333');

-- ----------------------------
-- Table structure for `ding_goods_sort`
-- ----------------------------
DROP TABLE IF EXISTS `ding_goods_sort`;
CREATE TABLE `ding_goods_sort` (
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
  `status` enum('false','true') default 'true',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_goods_sort
-- ----------------------------
INSERT INTO `ding_goods_sort` VALUES ('1', '0', '网络1', 'wangluo', '1', '', '', '', '', '', ',', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('2', '1', '互联网', 'hulianwang', '1', '', '', '', '', '', ',1,', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('3', '1', '通信', 'tongxin', '1', '', '', '', '', '', ',1,', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('4', '1', 'IT业界', 'ITyejie', '1', '', '', '', '', '', ',1,', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('5', '0', '视频教程', 'shipinjiaocheng', '2', '', '', '', '', '', ',', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('6', '5', 'PHP视频', 'PHPshipin', '2', '', '', '', '', '', ',5,', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('7', '5', 'jQuery/AJAX视频', 'jQuery/AJAXshipin', '2', '', '', '', '', '', ',5,', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('8', '5', '办公软件教程', 'bangongruanjianjiaocheng', '2', '', '', '', '', '', ',5,', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('9', '5', '平面设计', 'pingmiansheji', '2', '', '', '', '', '', ',5,', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('10', '5', '网站制作', 'wangzhanzhizuo', '2', '', '', '', '', '', ',5,', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('11', '5', 'Python视频教程', 'Pythonshipinjiaocheng', '2', '', '', '', '', '', ',5,', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('12', '0', '图形图像', 'tuxingtuxiang', '1', '', '', '', '', '', ',', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('13', '12', 'Photoshop', 'Photoshop', '1', '', '', '', '', '', ',12,', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('14', '0', 'web | 编程开发', 'web | bianchengkaifa', '1', '', '', '', '', '', ',', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('15', '14', 'php教程', 'phpjiaocheng', '1', '', '', '', '', '', ',14,', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('16', '14', 'MySQL', 'MySQL', '1', '', '', '', '', '', ',14,', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('17', '14', 'HTML/CSS', 'HTML/CSS', '1', '', '', '', '', '', ',14,', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('18', '14', 'JQuery教程', 'JQueryjiaocheng', '1', '', '', '', '', '', ',14,', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('19', '14', 'Ruby | Rails', 'Ruby | Rails', '1', '', '', '', '', '', ',14,', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('20', '14', 'Java | Jsp', 'Java | Jsp', '1', '', '', '', '', '', ',14,', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('21', '14', 'Python', 'Python', '1', '', '', '', '', '', ',14,', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('22', '14', '其它', 'qita', '1', '', '', '', '', '', ',14,', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('23', '0', '网站建设', 'wangzhanjianshe', '1', '', '', '', '', '', ',', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('24', '0', '推荐书籍', 'tuijianshuji', '1', '', '', '', '', '', ',', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('25', '0', '物联网', 'wulianwang', '1', '', '', '', '', '', ',', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('26', '25', '物联网资讯', 'wulianwangzixun', '1', '', '', '', '', '', ',25,', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('27', '25', '物联网技术', 'wulianwangjishu', '1', '', '', '', '物联网技术', '物联网技术', ',25,', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('28', '0', '开源项目', 'kaiyuanxiangmu', '1', '', '', '', '', '', ',', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('29', '0', '励志一生', 'lizhiyisheng', '1', '', '', '', '', '', ',', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('30', '23', '域名主机', 'yumingzhuji', '1', '', '', '', '', '', ',23,', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('31', '0', '休闲一刻', 'xiuxianyike', '1', '', '', '', '', '', ',', '0', 'true');
INSERT INTO `ding_goods_sort` VALUES ('32', '0', '电商学院', 'dianshangxueyuan', '1', '', '', '', '', '', ',', '0', 'true');

-- ----------------------------
-- Table structure for `ding_goods_type`
-- ----------------------------
DROP TABLE IF EXISTS `ding_goods_type`;
CREATE TABLE `ding_goods_type` (
  `cat_id` smallint(5) unsigned NOT NULL auto_increment,
  `cat_name` varchar(60) NOT NULL default '',
  `enabled` tinyint(1) unsigned NOT NULL default '1',
  `attr_group` varchar(255) NOT NULL,
  PRIMARY KEY  (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_goods_type
-- ----------------------------
INSERT INTO `ding_goods_type` VALUES ('1', '书', '1', '');
INSERT INTO `ding_goods_type` VALUES ('2', '音乐', '1', '');
INSERT INTO `ding_goods_type` VALUES ('3', '电影', '1', '');
INSERT INTO `ding_goods_type` VALUES ('4', '手机', '1', '');
INSERT INTO `ding_goods_type` VALUES ('5', '笔记本电脑', '1', '');
INSERT INTO `ding_goods_type` VALUES ('6', '数码相机', '1', '');
INSERT INTO `ding_goods_type` VALUES ('7', '数码摄像机', '1', '');
INSERT INTO `ding_goods_type` VALUES ('8', '化妆品', '1', '');
INSERT INTO `ding_goods_type` VALUES ('9', '精品手机', '1', '');

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
-- Table structure for `ding_links`
-- ----------------------------
DROP TABLE IF EXISTS `ding_links`;
CREATE TABLE `ding_links` (
  `id` mediumint(8) NOT NULL auto_increment,
  `sort_id` smallint(3) NOT NULL,
  `webname` varchar(20) NOT NULL,
  `weburl` varchar(200) NOT NULL,
  `webpic` varchar(255) NOT NULL,
  `myorder` smallint(3) NOT NULL,
  `status` enum('true','false') NOT NULL default 'true',
  `emark` varchar(255) NOT NULL,
  `addtime` int(10) NOT NULL,
  `updatetime` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_links
-- ----------------------------
INSERT INTO `ding_links` VALUES ('2', '1', '站长先生', 'http://www.adminsir.net', '/Public/Uploads/Images/20130128/1359340690.jpg', '0', 'true', '的', '1359340987', '1359340987');
INSERT INTO `ding_links` VALUES ('3', '1', '齐鲁企业2', 'http://www.qiluqiye.com', '/Public/Uploads/Images/20130128/1359340690.jpg', '0', 'true', 'de得的', '1359344022', '1359516964');

-- ----------------------------
-- Table structure for `ding_links_sort`
-- ----------------------------
DROP TABLE IF EXISTS `ding_links_sort`;
CREATE TABLE `ding_links_sort` (
  `id` smallint(3) NOT NULL auto_increment,
  `ename` varchar(20) NOT NULL,
  `status` enum('true','false') NOT NULL default 'true',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_links_sort
-- ----------------------------
INSERT INTO `ding_links_sort` VALUES ('1', '首页', 'true');

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
  `status` enum('false','true') default 'true',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_members
-- ----------------------------
INSERT INTO `ding_members` VALUES ('1', 'admin', '0b32435664ddde8a5e3c973953aea16a', '1346390052', 'false', 'true');

-- ----------------------------
-- Table structure for `ding_message`
-- ----------------------------
DROP TABLE IF EXISTS `ding_message`;
CREATE TABLE `ding_message` (
  `id` int(10) NOT NULL auto_increment,
  `sort_id` mediumint(5) default NULL,
  `post_id` smallint(5) NOT NULL,
  `reply_id` int(5) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `addtime` int(10) NOT NULL,
  `replytime` int(10) NOT NULL,
  `msgcontent` text NOT NULL,
  `replycontent` text NOT NULL,
  `post_name` varchar(20) NOT NULL,
  `status` enum('false','true') default 'false',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_message
-- ----------------------------
INSERT INTO `ding_message` VALUES ('1', '1', '1', '1', '979569409', '1359434592', '1359436961', 'ddedede5656565', 'dedededeg459444444444444444444456546456459+678964964', '我的留言', 'false');

-- ----------------------------
-- Table structure for `ding_message_sort`
-- ----------------------------
DROP TABLE IF EXISTS `ding_message_sort`;
CREATE TABLE `ding_message_sort` (
  `id` smallint(3) NOT NULL auto_increment,
  `ename` varchar(20) NOT NULL,
  `status` enum('true','false') NOT NULL default 'true',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_message_sort
-- ----------------------------
INSERT INTO `ding_message_sort` VALUES ('1', '网站建议', 'true');
INSERT INTO `ding_message_sort` VALUES ('2', '产品服务', 'true');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_model_field
-- ----------------------------
INSERT INTO `ding_model_field` VALUES ('1', '文档1', '1', 'dwend1', 'varchar', '0', '', '30', '0');
INSERT INTO `ding_model_field` VALUES ('2', '文档2', '1', 'dwend2', 'varchar', '0', '', '20', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_model_sort
-- ----------------------------
INSERT INTO `ding_model_sort` VALUES ('1', '文档内容模型', 'article', 'true', '0');
INSERT INTO `ding_model_sort` VALUES ('2', '视频模型', 'video', 'true', '0');
INSERT INTO `ding_model_sort` VALUES ('3', '首页', 'ceshi', 'true', '0');

-- ----------------------------
-- Table structure for `ding_nav_foot`
-- ----------------------------
DROP TABLE IF EXISTS `ding_nav_foot`;
CREATE TABLE `ding_nav_foot` (
  `id` mediumint(5) NOT NULL auto_increment,
  `parent_id` mediumint(5) NOT NULL,
  `text` varchar(40) NOT NULL,
  `path` varchar(30) NOT NULL default ',',
  `myorder` tinyint(3) NOT NULL,
  `url` varchar(50) default NULL,
  `status` enum('false','true') default 'true' COMMENT '是否显示',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_nav_foot
-- ----------------------------
INSERT INTO `ding_nav_foot` VALUES ('1', '0', '首页', ',', '0', null, 'true');
INSERT INTO `ding_nav_foot` VALUES ('2', '0', '视频教程', ',', '0', 'List/?id=5', 'true');
INSERT INTO `ding_nav_foot` VALUES ('3', '0', '开源项目', ',', '0', 'List/?id=28', 'true');
INSERT INTO `ding_nav_foot` VALUES ('4', '0', '物联网', ',', '0', 'List/?id=25', 'true');
INSERT INTO `ding_nav_foot` VALUES ('5', '0', '推荐书籍', ',', '0', 'List/?id=24', 'true');
INSERT INTO `ding_nav_foot` VALUES ('6', '0', '网站建设', ',', '0', 'List/?id=23', 'true');
INSERT INTO `ding_nav_foot` VALUES ('7', '0', 'web开发', ',', '0', 'List/?id=14', 'true');
INSERT INTO `ding_nav_foot` VALUES ('8', '0', '图形图像', ',', '0', 'List/?id=12', 'true');
INSERT INTO `ding_nav_foot` VALUES ('9', '0', '网络资讯', ',', '0', 'List/?id=1', 'true');
INSERT INTO `ding_nav_foot` VALUES ('10', '0', '休闲一刻', ',', '0', 'List/?id=31', 'true');
INSERT INTO `ding_nav_foot` VALUES ('11', '0', '电商学院', ',', '0', 'List/?id=32', 'true');
INSERT INTO `ding_nav_foot` VALUES ('12', '0', '励志一生', ',', '0', 'List/?id=29', 'true');

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
  `url` varchar(50) default NULL,
  `status` enum('false','true') default 'true' COMMENT '是否显示',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_nav_head
-- ----------------------------
INSERT INTO `ding_nav_head` VALUES ('1', '0', '首页', ',', '0', null, 'true');
INSERT INTO `ding_nav_head` VALUES ('2', '0', '视频教程', ',', '0', 'List/?id=5', 'true');
INSERT INTO `ding_nav_head` VALUES ('3', '0', '开源项目', ',', '0', 'List/?id=28', 'true');
INSERT INTO `ding_nav_head` VALUES ('4', '0', '物联网', ',', '0', 'List/?id=25', 'true');
INSERT INTO `ding_nav_head` VALUES ('5', '0', '推荐书籍', ',', '0', 'List/?id=24', 'true');
INSERT INTO `ding_nav_head` VALUES ('6', '0', '网站建设', ',', '0', 'List/?id=23', 'true');
INSERT INTO `ding_nav_head` VALUES ('7', '0', 'web开发', ',', '0', 'List/?id=14', 'true');
INSERT INTO `ding_nav_head` VALUES ('8', '0', '图形图像', ',', '0', 'List/?id=12', 'true');
INSERT INTO `ding_nav_head` VALUES ('9', '0', '网络资讯', ',', '0', 'List/?id=1', 'true');
INSERT INTO `ding_nav_head` VALUES ('10', '0', '休闲一刻', ',', '0', 'List/?id=31', 'true');
INSERT INTO `ding_nav_head` VALUES ('11', '0', '电商学院', ',', '0', 'List/?id=32', 'true');
INSERT INTO `ding_nav_head` VALUES ('12', '0', '励志一生', ',', '0', 'List/?id=29', 'true');

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
  `status` enum('false','true') default 'true',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_news_sort
-- ----------------------------
INSERT INTO `ding_news_sort` VALUES ('1', '0', '网络', 'wangluo', '1', '', '', '', '', '', ',', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('2', '1', '互联网', 'hulianwang', '1', '', '', '', '', '', ',1,', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('3', '1', '通信', 'tongxin', '1', '', '', '', '', '', ',1,', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('4', '1', 'IT业界', 'ITyejie', '1', '', '', '', '', '', ',1,', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('5', '0', '视频教程', 'shipinjiaocheng', '2', '', '', '', '', '', ',', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('6', '5', 'PHP视频', 'PHPshipin', '2', '', '', '', '', '', ',5,', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('7', '5', 'jQuery/AJAX视频', 'jQuery/AJAXshipin', '2', '', '', '', '', '', ',5,', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('8', '5', '办公软件教程', 'bangongruanjianjiaocheng', '2', '', '', '', '', '', ',5,', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('9', '5', '平面设计', 'pingmiansheji', '2', '', '', '', '', '', ',5,', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('10', '5', '网站制作', 'wangzhanzhizuo', '2', '', '', '', '', '', ',5,', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('11', '5', 'Python视频教程', 'Pythonshipinjiaocheng', '2', '', '', '', '', '', ',5,', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('12', '0', '图形图像', 'tuxingtuxiang', '1', '', '', '', '', '', ',', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('13', '12', 'Photoshop', 'Photoshop', '1', '', '', '', '', '', ',12,', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('14', '0', 'web | 编程开发', 'web | bianchengkaifa', '1', '', '', '', '', '', ',', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('15', '14', 'php教程', 'phpjiaocheng', '1', '', '', '', '', '', ',14,', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('16', '14', 'MySQL', 'MySQL', '1', '', '', '', '', '', ',14,', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('17', '14', 'HTML/CSS', 'HTML/CSS', '1', '', '', '', '', '', ',14,', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('18', '14', 'JQuery教程', 'JQueryjiaocheng', '1', '', '', '', '', '', ',14,', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('19', '14', 'Ruby | Rails', 'Ruby | Rails', '1', '', '', '', '', '', ',14,', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('20', '14', 'Java | Jsp', 'Java | Jsp', '1', '', '', '', '', '', ',14,', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('21', '14', 'Python', 'Python', '1', '', '', '', '', '', ',14,', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('22', '14', '其它', 'qita', '1', '', '', '', '', '', ',14,', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('23', '0', '网站建设', 'wangzhanjianshe', '1', '', '', '', '', '', ',', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('24', '0', '推荐书籍', 'tuijianshuji', '1', '', '', '', '', '', ',', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('25', '0', '物联网', 'wulianwang', '1', '', '', '', '', '', ',', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('26', '25', '物联网资讯', 'wulianwangzixun', '1', '', '', '', '', '', ',25,', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('27', '25', '物联网技术', 'wulianwangjishu', '1', '', '', '', '物联网技术', '物联网技术', ',25,', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('28', '0', '开源项目', 'kaiyuanxiangmu', '1', '', '', '', '', '', ',', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('29', '0', '励志一生', 'lizhiyisheng', '1', '', '', '', '', '', ',', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('30', '23', '域名主机', 'yumingzhuji', '1', '', '', '', '', '', ',23,', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('31', '0', '休闲一刻', 'xiuxianyike', '1', '', '', '', '', '', ',', '0', 'true');
INSERT INTO `ding_news_sort` VALUES ('32', '0', '电商学院', 'dianshangxueyuan', '1', '', '', '', '', '', ',', '0', 'true');

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
-- Table structure for `ding_pages`
-- ----------------------------
DROP TABLE IF EXISTS `ding_pages`;
CREATE TABLE `ding_pages` (
  `id` mediumint(5) NOT NULL auto_increment,
  `sort_id` smallint(3) default NULL,
  `ename` varchar(200) default NULL,
  `keywords` varchar(255) default NULL,
  `description` varchar(255) default NULL,
  `content` text,
  `addtime` int(10) default NULL,
  `updatetime` int(10) default NULL,
  `status` enum('false','true') default 'true',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_pages
-- ----------------------------
INSERT INTO `ding_pages` VALUES ('1', '1', '首页', '得的', '的的王菲范围', '的网裘德道', '1359356066', '1359356066', 'true');
INSERT INTO `ding_pages` VALUES ('2', '2', '测试5得的', '得的22222222222', '得瑟vsefe22222222', '夫人富国天回家就斤斤计较斤斤计较1111111111111111111111111', '1359356290', '1359358457', 'true');

-- ----------------------------
-- Table structure for `ding_pages_sort`
-- ----------------------------
DROP TABLE IF EXISTS `ding_pages_sort`;
CREATE TABLE `ding_pages_sort` (
  `id` smallint(5) NOT NULL auto_increment,
  `parent_id` smallint(5) default NULL,
  `ename` varchar(20) NOT NULL,
  `en_name` varchar(35) default NULL,
  `path` varchar(20) default ',',
  `status` enum('true','false') NOT NULL default 'true',
  `keywords` varchar(255) default NULL,
  `description` varchar(255) default NULL,
  `sortcontent` text,
  `myorder` smallint(3) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_pages_sort
-- ----------------------------
INSERT INTO `ding_pages_sort` VALUES ('1', '0', '得的', 'dede', ',', 'true', null, null, null, null);
INSERT INTO `ding_pages_sort` VALUES ('2', '1', '首页', 'shouye', ',1,', 'true', '得的', '得的2', null, '0');
INSERT INTO `ding_pages_sort` VALUES ('3', '1', 'shi信息', 'shixinxi', ',1,', 'true', '得的223', '232323', null, '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ding_setting
-- ----------------------------
INSERT INTO `ding_setting` VALUES ('1', 'cfg_sitename', '站长管理', '网站名称', '1', 'text', '0');
INSERT INTO `ding_setting` VALUES ('2', 'cfg_siteurl', '', '网站地址', '1', 'text', '0');
INSERT INTO `ding_setting` VALUES ('3', 'cfg_keywords', '站长先生,站长教程,网站教程,管理先生', '关键字', '1', 'text', '0');
INSERT INTO `ding_setting` VALUES ('4', 'cfg_description', '记录成长的点点滴滴，只因喜欢！Hello world！我的电脑我管理，我的web我做主！', '网站描述', '1', 'text', '0');
INSERT INTO `ding_setting` VALUES ('5', 'cfg_defaultpic', 'defaultpic.gif', '默认图片', '1', 'text', '0');
INSERT INTO `ding_setting` VALUES ('6', 'cfg_copyright', '© （<a href=\\\"http://www.adminsir.net\\\">www.adminsir.net</a>）站长先生网--版权所有，并保留所有权利。<br />\r\nPowered by <a href=\\\"http://www.dingcms.com\\\" target=\\\"_blank\\\">www.dingcms.com</a><a href=\\\"http://webscan.360.cn/index/checkwebsite/url/www.adminsir.net\\\"></a>', '版权信息', '1', 'textarea', '0');
INSERT INTO `ding_setting` VALUES ('7', 'cfg_tongji', '<script src=\\\"http://s84.cnzz.com/stat.php?id=3490277&web_id=3490277&show=pic\\\" language=\\\"JavaScript\\\"></script>', '统计信息', '1', 'text', '0');
INSERT INTO `ding_setting` VALUES ('8', 'cfg_title', 'Hello world！记录成长的点点滴滴，只因喜欢！', '首页标题', '1', 'text', '0');
INSERT INTO `ding_setting` VALUES ('9', 'cfg_website_open', '2', '站点是否关闭', '1', 'radio', '0');

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
  `views` mediumint(8) unsigned default '0',
  `addtime` int(10) unsigned NOT NULL,
  `updatetime` int(10) unsigned NOT NULL,
  `status` enum('true','false') NOT NULL default 'true',
  `is_recycle` enum('true','false') NOT NULL default 'false',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='标题表';

-- ----------------------------
-- Records of ding_title
-- ----------------------------
INSERT INTO `ding_title` VALUES ('1', '1', '测试文章', '测试文章', '', null, '', '', '', '', '测试文章', '测试文章', '0', '1355799013', '1355799013', 'true', 'false');
INSERT INTO `ding_title` VALUES ('2', '1', '测试文章2', '测试文章3', '', null, '', '', '', '', '测试文章', '测试文章', '0', '1355799013', '1355799013', 'true', 'false');
INSERT INTO `ding_title` VALUES ('3', '1', '测试文章3', '测试文章3', '', null, '', '', '', '', '测试文章', '测试文章', '0', '1355799013', '1355799013', 'true', 'false');
INSERT INTO `ding_title` VALUES ('4', '1', '测试文章4', '测试文章4', null, null, '', '', '', '', '', '', '0', '1355799013', '1355799013', 'true', 'false');
INSERT INTO `ding_title` VALUES ('5', '1', '测试文章5', '测试文章5', null, null, '', '', '', '', '', '', '0', '1355799013', '1355799013', 'true', 'false');
INSERT INTO `ding_title` VALUES ('7', '1', '测试文章7', '测试文章7', null, null, '', '', '', '', '', '', '0', '1355799013', '1355799013', 'true', 'false');
INSERT INTO `ding_title` VALUES ('8', '1', '测试文章8', '测试文章8', null, null, '', '', '', '', '', '', '0', '1355799013', '1355799013', 'true', 'false');
INSERT INTO `ding_title` VALUES ('9', '1', '测试文章9', '测试文章9', null, null, '', '', '', '', '', '', '1', '1355799013', '1355799013', 'true', 'false');
INSERT INTO `ding_title` VALUES ('10', '1', '测试文章10222', '测试文章10', '', null, '', '', '', '', '', '测试文章10222', '0', '1355799013', '1355799013', 'true', 'false');
INSERT INTO `ding_title` VALUES ('11', '2', '测试文章11', '测试文章11', null, null, '', '', '', '', '', '', '0', '1355799013', '1355799013', 'true', 'true');
INSERT INTO `ding_title` VALUES ('12', '2', '测试文章12', '测试文章12', null, null, '', '', '', '', '', '', '0', '1355799013', '1355799013', 'true', 'true');
INSERT INTO `ding_title` VALUES ('13', '1', '的的的2', '', '', null, '', '', '', '', '', '', '6', '0', '0', 'true', 'false');
INSERT INTO `ding_title` VALUES ('14', '27', 'M2M简介', 'M2M简介', '', null, '', '', '', '', '', '', '0', '0', '0', 'true', 'false');
INSERT INTO `ding_title` VALUES ('15', '27', '实时数据库和关系数据库的设计特点', '', '', null, '', '', '', '', '', '', '2', '0', '0', 'true', 'false');
INSERT INTO `ding_title` VALUES ('16', '27', '朱志祥讲物联网（一）', '', '', null, '', '', '', '', '', '', '2', '0', '0', 'true', 'false');
INSERT INTO `ding_title` VALUES ('17', '27', '解析M2M：物联网的四大支撑技术之一', '', '', null, '', '', '', '', '', '', '2', '0', '0', 'true', 'false');
INSERT INTO `ding_title` VALUES ('18', '27', '全网通址 物联网时代手机是什么', '', '', null, '', '', '', '', '', '', '2', '0', '0', 'true', 'false');
INSERT INTO `ding_title` VALUES ('19', '27', '红外线感应器', '', '', null, '', '', '', '', '', '', '1', '0', '0', 'true', 'false');
INSERT INTO `ding_title` VALUES ('20', '27', 'ZigBee技术在物联网系统中的应用研究', '', '', null, '', '', '', '', '', '', '28', '0', '0', 'true', 'false');
INSERT INTO `ding_title` VALUES ('21', '27', '浅析公共安全监测物联网技术', '', '', null, '', '', '', '', '浅析公共安全监测物联网技术', '浅析公共安全监测物联网技术', '27', '0', '0', 'true', 'false');
INSERT INTO `ding_title` VALUES ('22', '27', '物联网冰箱', '', '/Public/Uploads/Images/20130131/1359606096.jpg', null, '', '', '', '', '', '', '11', '0', '0', 'true', 'false');
