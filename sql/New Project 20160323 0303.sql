-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.40


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema shuadan
--

CREATE DATABASE IF NOT EXISTS shuadan;
USE shuadan;

--
-- Definition of table `zxjy_aclgroup`
--

DROP TABLE IF EXISTS `zxjy_aclgroup`;
CREATE TABLE `zxjy_aclgroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(100) NOT NULL,
  `acllist` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zxjy_aclgroup`
--

/*!40000 ALTER TABLE `zxjy_aclgroup` DISABLE KEYS */;
INSERT INTO `zxjy_aclgroup` (`id`,`groupname`,`acllist`) VALUES 
 (1,'超级管理员','acl/managerlist,article/articlecatalog,article/articlecatlogadd,article/articlecatlogaddmore,article/articlecatlogaddsontype,article/articleadd,article/articlelist,article/articleedit,article/articledyadd,article/articledyedit,article/articlereserver,article/articlereserverlist,article/articledelback,design/designcatalog,design/designcatlogadd,design/designcatlogaddmore,design/designcatlogchangeinfo,design/designcatlogaddsontype,design/designadd,design/designlist,design/designedit,design/designreserver,design/designreserverlist,design/designdelback,shop/shopcatalog,shop/shopcatlogadd,shop/shopcatlogaddmore,shop/shopcatlogdel,shop/shopcatlogchangeinfo,shop/shopcatlogaddsontype,shop/shopgoodsadd,shop/shopgoodslist,shop/changeonsale,shop/shopgoodsedit,shop/shopgoodsreserver,shop/shopgoodsreserverlist,shop/shopgoodsreserverdel,shop/shopgoodsdelback,shopprice/create,shopprice/index,shopprice/admin,soft/create,soft/index,soft/admin,techer/create,techer/index,techer/admin,webeffects/webeffectscatalog,webeffects/webeffectscatlogadd,webeffects/webeffectscatlogaddmore,webeffects/webeffectscatlogchangeinfo,webeffects/webeffectscatlogaddsontype,webeffects/webeffectsadd,webeffects/webeffectslist,webeffects/webeffectsedit,webeffects/webeffectsreserver,webeffects/webeffectsreserverlist,webeffects/webeffectsdelback,'),
 (2,'文档管理员','article/articlecatalog,article/articleadd,article/articlelist,article/articleedit,article/articledyadd,article/articledyedit,article/articlereserver,article/articlereserverlist,article/articledelback,'),
 (3,'设计路上编辑','design/designcatalog,design/designadd,design/designlist,design/designedit,design/designreserver,design/designreserverlist,design/designdelback,');
/*!40000 ALTER TABLE `zxjy_aclgroup` ENABLE KEYS */;


--
-- Definition of table `zxjy_admin`
--

DROP TABLE IF EXISTS `zxjy_admin`;
CREATE TABLE `zxjy_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `groupid` int(11) NOT NULL,
  `logtime` int(10) NOT NULL,
  `addtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zxjy_admin`
--

/*!40000 ALTER TABLE `zxjy_admin` DISABLE KEYS */;
INSERT INTO `zxjy_admin` (`id`,`username`,`pwd`,`groupid`,`logtime`,`addtime`) VALUES 
 (1,'admin','0192023a7bbd73250516f069df18b500',0,0,0);
/*!40000 ALTER TABLE `zxjy_admin` ENABLE KEYS */;


--
-- Definition of table `zxjy_appraise`
--

DROP TABLE IF EXISTS `zxjy_appraise`;
CREATE TABLE `zxjy_appraise` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `uid` int(11) DEFAULT NULL COMMENT '被评价人id即接手',
  `douid` int(11) DEFAULT NULL COMMENT '评价人id即商家',
  `status` tinyint(1) DEFAULT NULL COMMENT '评价状态：0-差评，1-中评，2-好评',
  `taskid` int(11) DEFAULT NULL COMMENT '相关任务id',
  `time` int(11) DEFAULT NULL COMMENT '评价时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zxjy_appraise`
--

/*!40000 ALTER TABLE `zxjy_appraise` DISABLE KEYS */;
INSERT INTO `zxjy_appraise` (`id`,`uid`,`douid`,`status`,`taskid`,`time`) VALUES 
 (4,303,13,1,312,1455863410),
 (5,303,13,1,310,1455868737),
 (6,303,13,2,309,1455946574),
 (7,307,308,2,317,1458663447),
 (8,307,308,2,318,1458668712),
 (9,307,308,1,319,1458669328);
/*!40000 ALTER TABLE `zxjy_appraise` ENABLE KEYS */;


--
-- Definition of table `zxjy_article`
--

DROP TABLE IF EXISTS `zxjy_article`;
CREATE TABLE `zxjy_article` (
  `goods_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品的自增id',
  `cat_id` smallint(5) unsigned DEFAULT '0' COMMENT '商品所属商品分类id，取值ecs_category的cat_id',
  `goods_sn` varchar(60) DEFAULT '0' COMMENT '商品的唯一货号',
  `goods_name` varchar(120) DEFAULT NULL COMMENT '商品的名称',
  `goods_name_style` varchar(60) DEFAULT '+' COMMENT '商品名称显示的样式；包括颜色和字体样式；格式如#ff00ff+strong',
  `click_count` int(10) unsigned DEFAULT '0' COMMENT '商品点击数',
  `brand_id` smallint(5) unsigned DEFAULT '0' COMMENT '品牌id，取值于ecs_brand 的brand_id',
  `provider_name` varchar(100) DEFAULT NULL COMMENT '供货人的名称，程序还没实现该功能',
  `goods_number` smallint(5) unsigned DEFAULT '0' COMMENT '商品库存数量',
  `goods_weight` decimal(10,0) unsigned DEFAULT '0' COMMENT '商品的重量，以千克为单位',
  `market_price` decimal(10,0) unsigned DEFAULT '0' COMMENT '市场售价',
  `shop_price` decimal(10,0) unsigned DEFAULT '0' COMMENT '本店售价',
  `promote_price` decimal(10,0) unsigned DEFAULT '0' COMMENT '促销价格',
  `promote_start_date` int(11) unsigned DEFAULT '0' COMMENT '促销价格开始日期',
  `promote_end_date` int(11) unsigned DEFAULT '0' COMMENT '促销价结束日期',
  `warn_number` tinyint(3) unsigned DEFAULT '1' COMMENT '商品报警数量',
  `keywords` varchar(255) DEFAULT NULL COMMENT '商品关键字，放在商品页的关键字中，为搜索引擎收录用',
  `goods_brief` varchar(255) DEFAULT NULL COMMENT '商品的简短描述',
  `goods_desc` longtext COMMENT '商品的详细描述',
  `goods_thumb` varchar(1000) DEFAULT NULL COMMENT '商品在前台显示的微缩图片，如在分类筛选时显示的小图片',
  `goods_img` varchar(255) DEFAULT NULL COMMENT '商品的实际大小图片，如进入该商品页时介绍商品属性所显示的大图片',
  `original_img` varchar(255) DEFAULT NULL COMMENT '应该是上传的商品的原始图片',
  `is_real` tinyint(3) unsigned DEFAULT '1' COMMENT '是否是实物，1，是；0，否；比如虚拟卡就为0，不是实物',
  `extension_code` varchar(30) DEFAULT NULL COMMENT '商品的扩展属性，比如像虚拟卡',
  `is_on_sale` tinyint(1) unsigned DEFAULT '1' COMMENT '该商品是否开放销售，1，是；0，否',
  `is_alone_sale` tinyint(1) unsigned DEFAULT '1' COMMENT '是否能单独销售，1，是；0，否；如果不能单独销售，则只能作为某商品的配件或者赠品销售',
  `integral` int(10) unsigned DEFAULT '0' COMMENT '购买该商品可以使用的积分数量，估计应该是用积分代替金额消费；但程序好像还没有实现该功能',
  `add_time` int(10) unsigned DEFAULT '0' COMMENT '商品的添加时间',
  `sort_order` smallint(4) unsigned DEFAULT '0' COMMENT '应该是商品的显示顺序，不过该版程序中没实现该功能',
  `is_delete` tinyint(1) unsigned DEFAULT '0' COMMENT '商品是否已经删除，0，否；1，已删除',
  `is_best` tinyint(1) unsigned DEFAULT '0' COMMENT '是否是精品；0，否；1，是',
  `is_new` tinyint(1) unsigned DEFAULT '0' COMMENT '是否是新品；0，否；1，是',
  `is_hot` tinyint(1) unsigned DEFAULT '0' COMMENT '是否热销，0，否；1，是',
  `is_promote` tinyint(1) unsigned DEFAULT '0' COMMENT '是否特价促销；0，否；1，是',
  `bonus_type_id` tinyint(3) unsigned DEFAULT '0' COMMENT '购买该商品所能领到的红包类型',
  `last_update` int(10) unsigned DEFAULT '0' COMMENT '最近一次更新商品配置的时间',
  `goods_type` smallint(5) unsigned DEFAULT '0' COMMENT '商品所属类型id，取值表goods_type的cat_id',
  `seller_note` varchar(255) DEFAULT NULL COMMENT '商品的商家备注，仅商家可见',
  `give_integral` int(11) DEFAULT '0' COMMENT '购买该商品时每笔成功交易赠送的积分数量。',
  PRIMARY KEY (`goods_id`),
  KEY `goods_sn` (`goods_sn`),
  KEY `cat_id` (`cat_id`),
  KEY `last_update` (`last_update`),
  KEY `brand_id` (`brand_id`),
  KEY `goods_weight` (`goods_weight`),
  KEY `promote_end_date` (`promote_end_date`),
  KEY `promote_start_date` (`promote_start_date`),
  KEY `goods_number` (`goods_number`)
) ENGINE=MyISAM AUTO_INCREMENT=148 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='商品表';

--
-- Dumping data for table `zxjy_article`
--

/*!40000 ALTER TABLE `zxjy_article` DISABLE KEYS */;
INSERT INTO `zxjy_article` (`goods_id`,`cat_id`,`goods_sn`,`goods_name`,`goods_name_style`,`click_count`,`brand_id`,`provider_name`,`goods_number`,`goods_weight`,`market_price`,`shop_price`,`promote_price`,`promote_start_date`,`promote_end_date`,`warn_number`,`keywords`,`goods_brief`,`goods_desc`,`goods_thumb`,`goods_img`,`original_img`,`is_real`,`extension_code`,`is_on_sale`,`is_alone_sale`,`integral`,`add_time`,`sort_order`,`is_delete`,`is_best`,`is_new`,`is_hot`,`is_promote`,`bonus_type_id`,`last_update`,`goods_type`,`seller_note`,`give_integral`) VALUES 
 (129,33,'0','接手任务必知：物流未到请勿签收！','+',0,0,NULL,0,'0','0','0','0',0,0,1,'',NULL,'接手任务必知：物流未到请勿签收！','','',NULL,1,NULL,1,1,0,1455659814,NULL,0,0,0,0,0,0,0,0,NULL,0),
 (130,33,'0','最新公告2','+',0,0,NULL,0,'0','0','0','0',0,0,1,'',NULL,'公告2内容','','',NULL,1,NULL,1,1,0,1432490887,NULL,1,0,0,0,0,0,0,0,NULL,0),
 (131,38,'0','关于收货时间到后物流未签收的新规','+',0,0,NULL,0,'0','0','0','0',0,0,1,'',NULL,'关于收货时间到后物流未签收的新规','','',NULL,1,NULL,1,1,0,1455659980,NULL,0,0,0,0,0,0,0,0,NULL,0),
 (132,38,'0','商家发布任务如何解决快递单号','+',0,0,NULL,0,'0','0','0','0',0,0,1,'',NULL,'商家发布任务如何解决快递单号','','',NULL,1,NULL,1,1,0,1455660019,NULL,0,0,0,0,0,0,0,0,NULL,0),
 (133,38,'0','聚宝盆新手常见问题答疑','+',0,0,NULL,0,'0','0','0','0',0,0,1,'',NULL,'聚宝盆新手常见问题答疑','','',NULL,1,NULL,1,1,0,1455660319,NULL,0,0,0,0,0,0,0,0,NULL,0),
 (134,38,'0','发布任务流程','+',0,0,NULL,0,'0','0','0','0',0,0,1,'',NULL,'发布任务流程','','',NULL,1,NULL,1,1,0,1455660064,NULL,0,0,0,0,0,0,0,0,NULL,0),
 (135,38,'0','【支付宝充值】查看支付宝交易号','+',0,0,NULL,0,'0','0','0','0',0,0,1,'',NULL,'【支付宝充值】查看支付宝交易号','','',NULL,1,NULL,1,1,0,1455660084,NULL,0,0,0,0,0,0,0,0,NULL,0),
 (136,39,'0','关于收货时间到后物流未签收的新规','+',0,0,NULL,0,'0','0','0','0',0,0,1,'',NULL,'关于收货时间到后物流未签收的新规','','',NULL,1,NULL,1,1,0,1455660125,NULL,1,0,0,0,0,0,0,0,NULL,0),
 (137,39,'0','商家发布任务如何解决快递单号','+',0,0,NULL,0,'0','0','0','0',0,0,1,'',NULL,'商家发布任务如何解决快递单号','','',NULL,1,NULL,1,1,0,1455660139,NULL,1,0,0,0,0,0,0,0,NULL,0),
 (138,39,'0','米粒网新手常见问题答疑','+',0,0,NULL,0,'0','0','0','0',0,0,1,'',NULL,'米粒网新手常见问题答疑','','',NULL,1,NULL,1,1,0,1455660150,NULL,0,0,0,0,0,0,0,0,NULL,0),
 (139,40,'0','聚宝盆2.0版本正式上线运营','+',0,0,NULL,0,'0','0','0','0',0,0,1,'',NULL,'聚宝盆2.0版本正式上线运营','','',NULL,1,NULL,1,1,0,1455660232,NULL,0,0,0,0,0,0,0,0,NULL,0),
 (140,41,'0','刷单时代的来临！','+',0,0,NULL,0,'0','0','0','0',0,0,1,'',NULL,'刷单时代的来临！','','',NULL,1,NULL,1,1,0,1455660261,NULL,0,0,0,0,0,0,0,0,NULL,0),
 (141,38,'0','新手刷单常见问题答疑','+',0,0,NULL,0,'0','0','0','0',0,0,1,'',NULL,'新手刷单常见问题答疑','','',NULL,1,NULL,1,1,0,1455769121,NULL,0,0,0,0,0,0,0,0,NULL,0),
 (142,39,'0','接手任务的准备工作？','+',0,0,NULL,0,'0','0','0','0',0,0,1,'',NULL,'接手任务的准备工作？','','',NULL,1,NULL,1,1,0,1455769156,NULL,0,0,0,0,0,0,0,0,NULL,0),
 (143,39,'0','接手任务流程','+',0,0,NULL,0,'0','0','0','0',0,0,1,'',NULL,'接手任务流程','','',NULL,1,NULL,1,1,0,1455769165,NULL,0,0,0,0,0,0,0,0,NULL,0),
 (144,39,'0','淘宝刷单注意事项','+',0,0,NULL,0,'0','0','0','0',0,0,1,'',NULL,'淘宝刷单注意事项','','',NULL,1,NULL,1,1,0,1455769184,NULL,0,0,0,0,0,0,0,0,NULL,0),
 (145,39,'0','任务图标解释','+',0,0,NULL,0,'0','0','0','0',0,0,1,'',NULL,'任务图标解释','','',NULL,1,NULL,1,1,0,1455769198,NULL,0,0,0,0,0,0,0,0,NULL,0),
 (146,39,'0','接手方容易造成损失的几大误区','+',0,0,NULL,0,'0','0','0','0',0,0,1,'',NULL,'接手方容易造成损失的几大误区','','',NULL,1,NULL,1,1,0,1455769216,NULL,0,0,0,0,0,0,0,0,NULL,0),
 (147,41,'0','淘宝刷单接手任务三大需知和六大注意事项','+',0,0,NULL,0,'0','0','0','0',0,0,1,'',NULL,'<div>\r\n	<h2>\r\n		淘宝刷单接手任务三大需知和六大注意事项\r\n	</h2>\r\n</div>\r\n<h2 style=\"font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<span style=\"font-weight:inherit;font-style:inherit;font-size:24px;font-family:inherit;vertical-align:baseline;color:#FF0000;\"><strong>接手任务三大需知：</strong></span> \r\n</h2>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	&nbsp;\r\n</p>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<strong>一、</strong>接手任务后，在<span style=\"font-style:inherit;font-family:inherit;vertical-align:baseline;color:#FF0000;\"><strong>30</strong><strong>分钟内</strong></span>需要在平台完成支付流程，否则任务会自动退出。\r\n</p>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<strong>&nbsp;</strong> \r\n</p>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<strong>二、</strong>聚宝盆上的任务都是垫付任务，商家已经充值资金到平台，平台已扣押了卖家任务商品款+佣金，所以可放心去淘宝拍下任务商品，完成任务后接手将获得任务的存款+佣金。\r\n</p>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	&nbsp;\r\n</p>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<strong>三、</strong>拍单时一定要<span style=\"font-style:inherit;font-family:inherit;vertical-align:baseline;color:#FF0000;\"><strong>核对商品价格，付款价格与平台任务价格必须一致</strong></span>，如不一致，请<span style=\"font-style:inherit;font-family:inherit;vertical-align:baseline;color:#FF0000;\"><strong>QQ联系卖家</strong></span>修改。\r\n</p>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	&nbsp;\r\n</p>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	------------------------------------------------------------------------------------------------------------\r\n</p>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	&nbsp;\r\n</p>\r\n<h2 style=\"font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<span style=\"font-weight:inherit;font-style:inherit;font-size:24px;font-family:inherit;vertical-align:baseline;color:#FF0000;\">接手任务六大注意事项：（情节严重者直接封号！）</span> \r\n</h2>\r\n<h3 style=\"font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<span style=\"font-weight:inherit;font-style:inherit;font-size:18.719999313354492px;font-family:inherit;vertical-align:baseline;color:#FFFFFF;background-color:#000000;\"><strong>【注：违反以下任意一条，根据情节处罚2-8个麦粒补偿给对方并警告，再犯者扣罚双倍，累计三次将封号处理！】</strong></span> \r\n</h3>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	&nbsp;\r\n</p>\r\n<h3 style=\"font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<span style=\"font-weight:inherit;font-style:inherit;font-size:18.719999313354492px;font-family:inherit;vertical-align:baseline;color:#FF0000;\">一、严禁通过旺旺联系对方并带有平台、米粒网、刷钻、刷单等忌讳字眼&nbsp;(请使用QQ联系对方)；</span> \r\n</h3>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	&nbsp;\r\n</p>\r\n<h3 style=\"font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<span style=\"font-weight:inherit;font-style:inherit;font-size:18.719999313354492px;font-family:inherit;vertical-align:baseline;color:#FF0000;\">二：禁止在任务过程中，辱骂任务一方，出言不逊；</span> \r\n</h3>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	&nbsp;\r\n</p>\r\n<h3 style=\"font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<span style=\"font-weight:inherit;font-style:inherit;font-size:18.719999313354492px;font-family:inherit;vertical-align:baseline;color:#FF0000;\">三、</span><span style=\"color:#FF0000;font-family:inherit;font-size:18.719999313354492px;font-style:inherit;font-weight:inherit;\">禁止使用花呗、淘金币、天猫积分、返利网、淘宝客、信用卡支付；</span> \r\n</h3>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	&nbsp;\r\n</p>\r\n<h3 style=\"font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<span style=\"font-weight:inherit;font-style:inherit;font-size:18.719999313354492px;font-family:inherit;vertical-align:baseline;color:#FF0000;\">四、</span><span style=\"font-family:inherit;font-weight:inherit;font-style:inherit;font-size:18.719999313354492px;vertical-align:baseline;color:#FF0000;\">必须物流信息签收后才能在淘宝确认收货！（无法获取物流信息的除外）【</span><a href=\"http://www.milioo.com/article/sell/122Q2015.html\" target=\"_blank\">物流超时补偿方案</a><span style=\"font-family:inherit;font-weight:inherit;font-style:inherit;font-size:18.719999313354492px;vertical-align:baseline;color:#FF0000;\">】；</span> \r\n</h3>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	&nbsp;\r\n</p>\r\n<h3 style=\"font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<span style=\"font-weight:inherit;font-style:inherit;font-size:18.719999313354492px;font-family:inherit;vertical-align:baseline;color:#FF0000;\">五、</span><span style=\"color:#FF0000;font-family:inherit;font-size:18.719999313354492px;font-style:inherit;font-weight:inherit;\">禁止以任何理由给对方差评及非五星好评等行为；</span> \r\n</h3>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	&nbsp;\r\n</p>\r\n<h3 style=\"font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<span style=\"font-weight:inherit;font-style:inherit;font-size:18.719999313354492px;font-family:inherit;vertical-align:baseline;color:#FF0000;\">六、</span><span style=\"color:#FF0000;font-family:inherit;font-size:18.719999313354492px;font-style:inherit;font-weight:inherit;\">严禁好评乱写评语，广告评语或恶意乱写评语。</span> \r\n</h3>','','',NULL,1,NULL,1,1,0,1456714162,NULL,0,0,0,0,0,0,0,0,NULL,0);
/*!40000 ALTER TABLE `zxjy_article` ENABLE KEYS */;


--
-- Definition of table `zxjy_articlecatlog`
--

DROP TABLE IF EXISTS `zxjy_articlecatlog`;
CREATE TABLE `zxjy_articlecatlog` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `classid` int(10) DEFAULT NULL,
  `sort` int(10) DEFAULT '10',
  `type` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zxjy_articlecatlog`
--

/*!40000 ALTER TABLE `zxjy_articlecatlog` DISABLE KEYS */;
INSERT INTO `zxjy_articlecatlog` (`id`,`name`,`classid`,`sort`,`type`) VALUES 
 (33,'重要通知',0,10,1),
 (38,'商家帮助区',0,10,1),
 (39,'威客帮助区',0,10,1),
 (40,'最新资讯',0,10,1),
 (41,'官方公告',0,10,1);
/*!40000 ALTER TABLE `zxjy_articlecatlog` ENABLE KEYS */;


--
-- Definition of table `zxjy_banklist`
--

DROP TABLE IF EXISTS `zxjy_banklist`;
CREATE TABLE `zxjy_banklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `userid` int(11) DEFAULT NULL COMMENT '用户id',
  `truename` varchar(255) DEFAULT NULL COMMENT '真实姓名',
  `phone` varchar(255) DEFAULT NULL COMMENT '添加时候绑定的手机号',
  `bankCatalog` int(11) DEFAULT NULL COMMENT '2-中国工商银行，3-中国银行，4-中国建设银行，5-中国招商银行，6-中国交通银行，7-中国农业银行，8-中国邮政银行，9-浦东银行，10-广发银行，11-兴业银行，12-华夏银行，13-光大银行，14-民生银行',
  `bankAccount` varchar(255) DEFAULT NULL COMMENT '银行卡号',
  `status` tinyint(1) DEFAULT '0' COMMENT '0-正常，1-默认',
  `time` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zxjy_banklist`
--

/*!40000 ALTER TABLE `zxjy_banklist` DISABLE KEYS */;
INSERT INTO `zxjy_banklist` (`id`,`userid`,`truename`,`phone`,`bankCatalog`,`bankAccount`,`status`,`time`) VALUES 
 (7,13,'张玉贡','18221791657',4,'6227001218950279315',0,1454483424),
 (8,13,'张玉贡','18221791657',2,'8567001228950279430',0,1454484576),
 (9,13,'张玉贡','18221791657',7,'3407001218950279189',0,1454484640);
/*!40000 ALTER TABLE `zxjy_banklist` ENABLE KEYS */;


--
-- Definition of table `zxjy_blackaccount`
--

DROP TABLE IF EXISTS `zxjy_blackaccount`;
CREATE TABLE `zxjy_blackaccount` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `blackaccountinfo` varchar(100) DEFAULT '' COMMENT '黑名单信息',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态：0解封，1封杀中',
  `time` int(11) DEFAULT NULL,
  `adderid` int(11) DEFAULT NULL COMMENT '添加者id',
  `adder` varchar(100) DEFAULT '' COMMENT '添加帐号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zxjy_blackaccount`
--

/*!40000 ALTER TABLE `zxjy_blackaccount` DISABLE KEYS */;
INSERT INTO `zxjy_blackaccount` (`id`,`blackaccountinfo`,`status`,`time`,`adderid`,`adder`) VALUES 
 (1,'753104948',1,1452585125,1,'admin'),
 (2,'7946699463',1,1452585165,1,'admin'),
 (3,'1312521221',1,1452585209,1,'admin'),
 (7,'12341255',0,1452593809,1,'admin'),
 (8,'12342515562',1,1452593820,1,'admin'),
 (9,'qwetqwetwqytqe',0,1452593823,1,'admin'),
 (10,'231612365123512',1,1452593826,1,'admin'),
 (11,'1341253153',1,1452593828,1,'admin'),
 (12,'1234121532',1,1452593830,1,'admin'),
 (13,'231234aasdg',1,1452593834,1,'admin'),
 (14,'1234123',0,1452593836,1,'admin'),
 (15,'15102119862',0,1452653259,1,'admin');
/*!40000 ALTER TABLE `zxjy_blackaccount` ENABLE KEYS */;


--
-- Definition of table `zxjy_blindwangwang`
--

DROP TABLE IF EXISTS `zxjy_blindwangwang`;
CREATE TABLE `zxjy_blindwangwang` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id自增',
  `userid` int(11) NOT NULL COMMENT '用户id',
  `wangwang` varchar(100) NOT NULL COMMENT '任务编号',
  `wangwanginfo` text COMMENT '买家信誉',
  `taotaorz` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否通过淘宝实名认证：1通过,0未通过',
  `statue` int(1) NOT NULL DEFAULT '1' COMMENT '1-启用，2-停用,3-系统取消',
  `catalog` tinyint(1) DEFAULT '1' COMMENT '1买号,2淘宝掌柜号',
  `ip` varchar(100) NOT NULL COMMENT 'IP地址',
  `blindtime` int(11) NOT NULL COMMENT '绑定时间',
  `updatetime` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=174 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zxjy_blindwangwang`
--

/*!40000 ALTER TABLE `zxjy_blindwangwang` DISABLE KEYS */;
INSERT INTO `zxjy_blindwangwang` (`id`,`userid`,`wangwang`,`wangwanginfo`,`taotaorz`,`statue`,`catalog`,`ip`,`blindtime`,`updatetime`) VALUES 
 (149,11,'我叫张东哲','10',1,1,1,'127.0.0.1',1453185697,NULL),
 (152,11,'东哲',NULL,1,1,2,'127.0.0.1',1453187939,NULL),
 (153,11,'小明','4',1,1,1,'127.0.0.1',1453188529,NULL),
 (154,11,'天赐',NULL,1,1,2,'127.0.0.1',1453259757,NULL),
 (162,13,'zyg1988',NULL,1,1,2,'127.0.0.1',1453480067,NULL),
 (164,13,'我是小白','5',1,1,1,'127.0.0.1',1453554482,NULL),
 (163,13,'张东哲1988',NULL,1,1,2,'127.0.0.1',1453517473,NULL),
 (165,13,'黎明之战','1',1,1,1,'127.0.0.1',1453554879,NULL),
 (166,303,'zsb淘宝大市场','9',1,1,1,'127.0.0.1',1453574362,NULL),
 (167,303,'伟大的工程',NULL,1,1,2,'127.0.0.1',1453611374,NULL),
 (168,303,'高超','10',1,1,1,'127.0.0.1',1453969692,NULL),
 (170,303,'测试号','10',1,1,1,'127.0.0.1',1455607005,NULL),
 (171,303,'小花','2',1,1,1,'127.0.0.1',1456734612,NULL),
 (172,307,'zhang_hong_kun','4',1,1,1,'127.0.0.1',1458662629,NULL),
 (173,308,'zhang_hong_kun_2',NULL,1,1,2,'127.0.0.1',1458662907,NULL);
/*!40000 ALTER TABLE `zxjy_blindwangwang` ENABLE KEYS */;


--
-- Definition of table `zxjy_companytasklist`
--

DROP TABLE IF EXISTS `zxjy_companytasklist`;
CREATE TABLE `zxjy_companytasklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '任务id自增',
  `publishid` int(11) NOT NULL COMMENT '发布人id',
  `taskerid` int(11) DEFAULT NULL COMMENT '接手id',
  `taskerWangwang` varchar(255) DEFAULT NULL COMMENT '接手旺旺号',
  `taskfristTime` int(11) DEFAULT NULL COMMENT '接手接任务时间',
  `tasksecondTime` int(11) DEFAULT NULL COMMENT '商家审核通过，任务开始时间',
  `taskthirdTime` int(11) DEFAULT NULL COMMENT '接手付款成功时间',
  `taskforthTime` int(11) DEFAULT NULL COMMENT '确认发货时间（可能是自动完成，可能是商家确认点击）',
  `taskfifthTime` int(11) DEFAULT NULL COMMENT '接手确认收货好评时间',
  `taskcompleteTime` int(11) DEFAULT NULL COMMENT '商家审核即任务完成时间',
  `status` tinyint(2) DEFAULT '0' COMMENT '任务状态（0-未接手，1-待付款，2-等待发货，3-待收货与好评，4-待放款审核，5-已完成）',
  `complian_status` tinyint(2) DEFAULT '0' COMMENT '投诉状态0未投诉，1待处理，2处理中，3处理完成',
  `complian_introduce` varchar(1000) DEFAULT '' COMMENT '投诉说明（由投诉人填写）',
  `complian_res_info` varchar(1000) DEFAULT '' COMMENT '处理结果说明(由工作人员填写)',
  `tasktime` int(11) DEFAULT NULL COMMENT '接手任务时间',
  `time` int(11) DEFAULT NULL COMMENT '发布任务时间',
  `task_type` tinyint(2) DEFAULT '0' COMMENT '商品类型:1实物，0虚拟物品',
  `ddlZGAccount` varchar(255) DEFAULT NULL COMMENT '淘宝掌柜名',
  `ddlOKDay` tinyint(2) DEFAULT NULL COMMENT '要求确认时间',
  `txtGoodsUrl` varchar(1000) DEFAULT NULL COMMENT '商品链接地址',
  `txtPrice` float DEFAULT NULL COMMENT '商品价格：(包含邮费)',
  `MinLi` float DEFAULT NULL COMMENT '消耗总米粒',
  `cbxIsWW` tinyint(2) DEFAULT '0' COMMENT '是否要求旺旺聊天（0-否，1是）',
  `shopcoller` tinyint(2) DEFAULT '0' COMMENT '是否要求购物收藏（0-否，1是）',
  `isMobile` tinyint(2) DEFAULT '2' COMMENT '是否要求手机接单（1手机单，2电脑单）',
  `cbxIsLHS` tinyint(2) DEFAULT '0' COMMENT '是否要求旺旺收货（0-否，1是）',
  `isViewEnd` tinyint(2) DEFAULT '0' COMMENT '是否要求浏览到底（0-否，1是）',
  `pinimage` tinyint(2) DEFAULT '0' COMMENT '是否要求好评截图（0-否，1是）',
  `stopDsTime` tinyint(2) DEFAULT '0' COMMENT '是否停要求留时间（0-否，1是）',
  `stopTime` tinyint(2) DEFAULT '0' COMMENT '停留时间（1-1分钟，2-2分钟，3分钟）',
  `cbxIsMsg` tinyint(2) DEFAULT '0' COMMENT '是否要求好评内容（0-否，1是）',
  `txtMessage` varchar(1000) DEFAULT '' COMMENT '好评内容',
  `cbxIsTip` tinyint(2) DEFAULT '0' COMMENT '是否要求留言提醒（0-否，1是）',
  `txtRemind` varchar(1000) DEFAULT '' COMMENT '留言提醒内容',
  `cbxIsAudit` tinyint(2) DEFAULT '0' COMMENT '是否要求审核接手（0-否，1是）',
  `isReal` tinyint(2) DEFAULT '0' COMMENT '是否要求接手经过实名认证（0-否，1是）',
  `cbxIsSB` tinyint(2) DEFAULT '0' COMMENT '是否要求接手已经加入商（0-否，1是）',
  `cbxIsFMaxMCount` tinyint(2) DEFAULT '0' COMMENT '是否限制接手（0-否，1是）',
  `fmaxmc` tinyint(2) DEFAULT '0' COMMENT '限制接手具体要求（1-1天接1个，2-1天接两个，3-1周接一个）',
  `isLimitCity` tinyint(2) DEFAULT '0' COMMENT '是否限制区域（0-否，1是）',
  `Province` varchar(100) DEFAULT '' COMMENT '限制接手所属区域',
  `isBuyerFen` tinyint(2) DEFAULT '0' COMMENT '是否限制接手等级（0-否，1是）',
  `BuyerJifen` tinyint(2) DEFAULT '0' COMMENT '限制接手等级具体要求',
  `filtertasker` tinyint(2) DEFAULT '0' COMMENT '是否过滤接手（0-否，1是）',
  `fmaxabc` int(11) DEFAULT '0' COMMENT '好评率不低于限制（0-不限制，否则为要求）',
  `fmaxbbc` int(11) DEFAULT '0' COMMENT '拉黑次数不大于限制（0-不限制，否则为要求）',
  `fmaxbtsc` int(11) DEFAULT '0' COMMENT '有效投诉次数不大于限制（0-不限制，否则为要求）',
  `isSign` tinyint(2) DEFAULT '0' COMMENT '是否选择真实签收（0-否，1是）',
  `cbxIsAddress` tinyint(2) DEFAULT '0' COMMENT '是否选择收货地址（0-否，1是）',
  `cbxIsAddressContent` varchar(1000) DEFAULT '' COMMENT '具体收货地址（使用|分开，如：姓名|手机|邮编|地址）',
  `isTpl` tinyint(2) DEFAULT '0' COMMENT '是否选择保存模板（0-否，1是）',
  `tplTo` varchar(1000) DEFAULT '' COMMENT '模板名称(0*#表示不是模板，其它则为对应的模板名称)',
  `taskCatalog` tinyint(2) DEFAULT '0' COMMENT '任务类别（0-普通任务，1来搜索任务）',
  `visitWay` tinyint(2) DEFAULT '1' COMMENT '搜索方式(1-搜商品,2-搜店铺,3- 直通车,4信用评价)',
  `divKey` varchar(255) DEFAULT NULL COMMENT '搜商品关键字',
  `txtSearchDes` varchar(255) DEFAULT NULL COMMENT '商品搜索提示',
  `goodsImgPosition` varchar(1000) DEFAULT NULL COMMENT '商品位置截图',
  `taskerHBoneImg` varchar(1000) DEFAULT NULL COMMENT '货比2家1截图',
  `taskerHBsecondImg` varchar(1000) DEFAULT NULL COMMENT '货比2家1截图',
  `taskerHBthirdImg` varchar(1000) DEFAULT NULL COMMENT '货比2家3截图',
  `taskerBottomImg` varchar(1000) DEFAULT NULL COMMENT '浏览至底部截图',
  `taskerSCImg` varchar(1000) DEFAULT NULL COMMENT '收藏截图',
  `taskerOtheroneImg` varchar(1000) DEFAULT NULL COMMENT '店内其他商品1截图',
  `taskerOthersecondImg` varchar(1000) DEFAULT NULL COMMENT '店内其他商品2截图',
  `taskerHPingImg` varchar(1000) DEFAULT NULL COMMENT '收货好评截图',
  `taskCompleteStatus` tinyint(1) DEFAULT '0' COMMENT '任务是否完成(0-否,1是)',
  `platform` tinyint(1) DEFAULT '1' COMMENT '属于平台（1-淘宝任务，2-京东任务，3-阿里巴巴任务）',
  `payWay` tinyint(1) DEFAULT '1' COMMENT '支付方式(1-刷手垫付，2-平台代付)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=321 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zxjy_companytasklist`
--

/*!40000 ALTER TABLE `zxjy_companytasklist` DISABLE KEYS */;
INSERT INTO `zxjy_companytasklist` (`id`,`publishid`,`taskerid`,`taskerWangwang`,`taskfristTime`,`tasksecondTime`,`taskthirdTime`,`taskforthTime`,`taskfifthTime`,`taskcompleteTime`,`status`,`complian_status`,`complian_introduce`,`complian_res_info`,`tasktime`,`time`,`task_type`,`ddlZGAccount`,`ddlOKDay`,`txtGoodsUrl`,`txtPrice`,`MinLi`,`cbxIsWW`,`shopcoller`,`isMobile`,`cbxIsLHS`,`isViewEnd`,`pinimage`,`stopDsTime`,`stopTime`,`cbxIsMsg`,`txtMessage`,`cbxIsTip`,`txtRemind`,`cbxIsAudit`,`isReal`,`cbxIsSB`,`cbxIsFMaxMCount`,`fmaxmc`,`isLimitCity`,`Province`,`isBuyerFen`,`BuyerJifen`,`filtertasker`,`fmaxabc`,`fmaxbbc`,`fmaxbtsc`,`isSign`,`cbxIsAddress`,`cbxIsAddressContent`,`isTpl`,`tplTo`,`taskCatalog`,`visitWay`,`divKey`,`txtSearchDes`,`goodsImgPosition`,`taskerHBoneImg`,`taskerHBsecondImg`,`taskerHBthirdImg`,`taskerBottomImg`,`taskerSCImg`,`taskerOtheroneImg`,`taskerOthersecondImg`,`taskerHPingImg`,`taskCompleteStatus`,`platform`,`payWay`) VALUES 
 (274,13,303,'zsb淘宝大市场',1453885171,1453885183,1453886201,1453886604,1453886647,1453886682,5,0,'','',NULL,1453517571,0,'张东哲1988',0,'http://www.baidu.com',100,23.5,1,1,1,1,1,1,1,3,1,'鞋子挺好的，穿起来很舒服...',NULL,'请接手认真完成任务，否则会被投诉举报',1,1,1,NULL,2,1,'河南省',1,9,1,95,10,3,1,1,'张明|18221791657|20000|上海市世纪大道',1,'鞋子20元',0,1,NULL,NULL,NULL,'/images/image/20160127/20160127091450_97846.jpg','/images/image/20160127/20160127091502_39360.png','/images/image/20160127/20160127091555_36743.jpg','/images/image/20160127/20160127091543_23938.jpg','/images/image/20160127/20160127091549_85278.jpg','/images/image/20160127/20160127091555_36743.jpg','/images/image/20160127/20160127091640_11694.jpg','/images/image/20160127/20160127092406_43414.png',1,1,1),
 (275,13,303,'zsb淘宝大市场',1453623818,1453623852,1453628933,1453631779,1453635437,1453638523,5,0,'','',NULL,1453517810,1,'zyg1988',0,'https://detail.tmall.com/item.htm?id=521056812533&ali_refid=a3_430583_1006:1103938627:N:%E6%8A%A5%E5%96%9C%E9%B8%9F:97873d4c05c4f811e25c7c0b8385a534&ali_trackid=1_97873d4c05c4f811e25c7c0b8385a534&spm=a230r.1.14.1.ExIDN7',1780,22.5,1,1,1,NULL,1,NULL,NULL,2,NULL,'衣服穿着真舒服',NULL,'手机单请接手认真完成任务',1,1,1,1,1,1,'河南省',1,4,1,90,15,3,1,NULL,'小明|18221791657|20000|广东省大汉路',1,'报喜鸟衣服',1,1,'报喜鸟','第一页第五排左右','/images/image/20160123/20160123105423_69897.png','/images/image/20160124/20160124174348_16860.png','/images/image/20160124/20160124174427_55900.png','/images/image/20160127/20160127091555_36743.jpg','/images/image/20160124/20160124174632_16649.png','/images/image/20160124/20160124174729_82518.png','/images/image/20160124/20160124174806_80414.png','/images/image/20160124/20160124174850_55639.png','/images/image/20160124/20160124193625_34667.png',1,1,1),
 (276,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1453888172,1,'张东哲1988',4,'http://www.baidu.com',100,24.8,1,1,1,1,1,1,1,1,1,'很好的产品，很喜欢',1,'请认真做任务，谢谢',1,1,1,1,2,1,'福建省',1,4,1,95,10,3,1,1,'张东哲|18221791657|2223300|上海市闸北区',1,'报嘻鸟',1,1,'报嘻鸟','第一行第一个','/images/image/20160127/20160127094805_33455.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (277,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1453888172,1,'张东哲1988',3,'http://www.baidu.com',100,24.8,1,1,1,1,1,1,1,1,1,'很好的产品，很喜欢',1,'请认真做任务，谢谢',1,1,1,1,2,1,'福建省',1,4,1,95,10,3,1,1,'张玉贡|18221791657|2223300|上海市闸北区',1,'报嘻鸟',1,1,'报嘻鸟','第一行第一个','/images/image/20160127/20160127094805_33455.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (278,13,303,'测试号',1455607025,1455607107,1455607495,1455607555,1455873581,1456730155,5,2,'迟迟不确认','',NULL,1453891066,0,'张东哲1988',0,'http://www.baidu.com',100,16.3,1,1,1,1,1,1,1,2,1,'很好的产品，很喜欢',1,'请认真做任务，谢谢',1,1,1,1,1,1,'北京市',1,1,1,98,5,2,1,1,'罗旭东|15102119862|2223300|上海市卢湾区',NULL,'0*#',1,2,'报嘻鸟','第一行第一个','/images/image/20160127/20160127103647_73072.jpg','/images/image/20160216/20160216082213_16056.jpeg','/images/image/20160216/20160216082222_44502.png','/images/image/20160216/20160216082225_21873.png','/images/image/20160216/20160216082439_17646.jpeg','/images/image/20160216/20160216082442_22373.jpg','/images/image/20160216/20160216082448_63695.jpg','/images/image/20160216/20160216082453_72048.png','/images/image/20160219/20160219101940_66074.png',1,1,1),
 (279,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1453908566,1,'zyg1988',3,'http://www.baidu.com',100,9.5,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',1,2,'报嘻鸟','第一行第一个','/images/image/20160127/20160127152911_55112.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,2,2),
 (280,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1453911140,1,'张东哲1988',0,'http://www.baidu.com',1002,9,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',1,4,'报嘻鸟','第一行第一个','/images/image/20160127/20160127161206_28822.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,3,2),
 (281,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1453911140,1,'张东哲1988',0,'http://www.baidu.com',1002,9,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',1,4,'报嘻鸟','第一行第一个','/images/image/20160127/20160127161206_28822.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,3,2),
 (282,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1453911140,1,'张东哲1988',0,'http://www.baidu.com',1002,9,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',1,4,'报嘻鸟','第一行第一个','/images/image/20160127/20160127161206_28822.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,3,2),
 (283,13,303,'高超',1453969699,1453969729,1453970016,1453970057,1453970121,1453970195,5,0,'','',NULL,1453949214,0,'张东哲1988',0,'http://www.baidu.com',100,23.5,1,1,1,1,1,1,1,3,1,'很好的产品，很喜欢',NULL,'请认真做任务，谢谢',1,1,1,1,1,1,'北京市',1,9,1,95,10,4,1,NULL,'张玉贡|18221791657|20000|上海市虹口区',1,'报嘻鸟',1,2,'报嘻鸟','第一行第一个','/images/image/20160128/20160128024559_38841.jpg','/images/image/20160128/20160128092948_92153.png','/images/image/20160128/20160128092953_89991.png','/images/image/20160128/20160128092957_72350.png','/images/image/20160128/20160128093235_38042.jpg','/images/image/20160128/20160128093242_15237.jpg','/images/image/20160128/20160128093245_81850.png','/images/image/20160128/20160128093251_68120.png','/images/image/20160128/20160128093520_36902.png',1,2,1),
 (284,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1453949214,0,'张东哲1988',0,'http://www.baidu.com',801,23.5,1,1,1,1,1,1,1,3,1,'很好的产品，很喜欢',NULL,'请认真做任务，谢谢',1,1,1,1,1,1,'北京市',1,9,1,95,10,4,1,NULL,'张玉贡|18221791657|20000|上海市虹口区',1,'报嘻鸟',1,2,'报嘻鸟','第一行第一个','/images/image/20160128/20160128024559_38841.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,2,1),
 (285,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1453969596,0,'张东哲1988',0,'http://www.baidu.com',100,6.1,1,1,0,1,NULL,1,1,1,1,'很好的产品，很喜欢',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',1,1,'报嘻鸟','第一行第一个','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (286,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1454207531,1,'张东哲1988',0,'http://www.baidu.com',1000,8,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',1,1,'报喜鸟','第一排第一个','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (287,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1454207571,0,'张东哲1988',0,'http://www.baidu.com',1000,8,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',1,2,'报喜鸟','第一排第一个','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (288,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1454207752,0,'张东哲1988',0,'http://www.baidu.com',1000,8,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',1,1,'报喜鸟','第一排第一个','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (289,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1454207955,0,'张东哲1988',0,'http://www.baidu.com',1000,8,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (290,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1454208340,0,'张东哲1988',0,'http://www.baidu.com',1000,8,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (291,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1454211128,0,'张东哲1988',0,'http://www.baidu.com',1000,8,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (292,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1454211356,0,'张东哲1988',0,'http://www.baidu.com',1000,8,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (293,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1454211639,0,'张东哲1988',0,'http://www.baidu.com',1000,8,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (294,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1454211639,0,'张东哲1988',0,'http://www.baidu.com',1000,8,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (295,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1454211986,0,'张东哲1988',0,'http://www.baidu.com',20000,9,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (296,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1454212118,0,'张东哲1988',0,'http://www.baidu.com',20000,9,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (297,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1454212187,0,'张东哲1988',0,'http://www.baidu.com',100,3,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (298,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1454212403,0,'张东哲1988',0,'http://www.baidu.com',1000,8,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (299,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1454212501,0,'张东哲1988',0,'http://www.baidu.com',1000,8,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (300,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1454213810,0,'张东哲1988',0,'http://www.baidu.com',10,2,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (301,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1454213852,0,'张东哲1988',0,'http://www.baidu.com',20,2,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (302,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1454214030,0,'张东哲1988',0,'http://www.baidu.com',30,2,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (303,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1454214158,0,'张东哲1988',0,'http://www.baidu.com',10,2,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (304,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1454214233,0,'张东哲1988',0,'http://www.baidu.com',100,3,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (305,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1454214319,0,'张东哲1988',0,'http://www.baidu.com',100,3,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (306,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1454215629,0,'张东哲1988',0,'http://www.baidu.com',10,2,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (307,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1454215801,0,'张东哲1988',0,'http://www.baidu.com',2000,2,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (308,13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1454216592,0,'张东哲1988',0,'http://www.baidu.com',20,2,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,1,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1),
 (309,13,303,'zsb淘宝大市场',1455946253,1455946296,1455946419,1455946439,1455946463,1455946574,5,0,'','',NULL,1454216803,0,'张东哲1988',0,'http://www.baidu.com',900,8,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,'/images/image/20160220/20160220063207_63607.jpg','/images/image/20160220/20160220063213_17467.jpg','/images/image/20160220/20160220063219_38070.png','/images/image/20160220/20160220063309_26669.jpg','/images/image/20160220/20160220063317_87546.jpg','/images/image/20160220/20160220063326_44966.jpg','/images/image/20160220/20160220063336_71062.jpg','/images/image/20160220/20160220063422_90408.jpg',1,1,1),
 (310,13,303,'zsb淘宝大市场',1455860423,1455860447,1455860525,1455860536,1455868682,1455868737,5,0,'','',NULL,1454217033,0,'张东哲1988',0,'http://www.baidu.com',10,2,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'很好的产品',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,'/images/image/20160219/20160219064128_46837.png','/images/image/20160219/20160219064135_93531.png','/images/image/20160219/20160219064139_51841.png','/images/image/20160219/20160219064152_34309.png','/images/image/20160219/20160219064157_45727.png','/images/image/20160219/20160219064201_45708.png','/images/image/20160219/20160219064205_19706.png','/images/image/20160219/20160219085801_13749.png',1,1,1),
 (311,13,303,'zsb淘宝大市场',1454224890,1454224898,1454224944,1454224951,1454224963,1454225359,5,0,'','',NULL,1454223378,0,'张东哲1988',0,'http://www.baidu.com',10,2,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,'/images/image/20160131/20160131082148_94045.png','/images/image/20160131/20160131082153_13606.png','/images/image/20160131/20160131082158_86832.png','/images/image/20160131/20160131082207_17753.png','/images/image/20160131/20160131082215_12955.png','/images/image/20160131/20160131082219_67911.png','/images/image/20160131/20160131082223_26748.jpg','/images/image/20160131/20160131082241_42192.png',1,1,1),
 (312,13,303,'高超',1455605019,1455605736,1455607304,1455607688,1455860554,1455863410,5,0,'','',NULL,1454223378,0,'张东哲1988',0,'https://shop34243820.taobao.com/?spm=a217m.7275797.1998711996.1.Io0fE8',10,4.3,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'很喜欢这款鞋子',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'张东哲|15102119862|20000|上海市陆家嘴',NULL,'0*#',0,1,NULL,NULL,NULL,'/images/image/20160216/20160216082053_16954.jpg','/images/image/20160216/20160216082058_76305.jpeg','/images/image/20160216/20160216082103_64146.jpg','/images/image/20160216/20160216082131_25520.png','/images/image/20160216/20160216082137_22856.jpeg','/images/image/20160216/20160216082134_77719.png','/images/image/20160216/20160216082143_48886.jpg','/images/image/20160219/20160219064233_44200.png',1,1,1),
 (313,13,303,'zsb淘宝大市场',1454223818,1454223830,1454223885,1454223898,1454223920,1454224688,5,0,'','',NULL,1454223739,0,'张东哲1988',0,'http://www.baidu.com',35,2,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,'/images/image/20160131/20160131080408_54566.jpg','/images/image/20160131/20160131080412_16292.png','/images/image/20160131/20160131080416_16811.jpg','/images/image/20160131/20160131080430_88862.jpg','/images/image/20160131/20160131080435_88524.png','/images/image/20160131/20160131080440_55920.png','/images/image/20160131/20160131080444_21854.png','/images/image/20160131/20160131080519_87865.jpg',1,1,1),
 (314,13,303,'高超',1454225493,1454225504,1454225545,1454225551,1454225574,1454225588,5,0,'','',NULL,1454225467,0,'张东哲1988',0,'http://www.baidu.com',45,2,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,'/images/image/20160131/20160131083153_70562.jpg','/images/image/20160131/20160131083157_49866.png','/images/image/20160131/20160131083203_76401.png','/images/image/20160131/20160131083212_14155.png','/images/image/20160131/20160131083216_45458.jpeg','/images/image/20160131/20160131083221_41681.png','/images/image/20160131/20160131083225_89881.jpg','/images/image/20160131/20160131083253_96879.jpg',1,1,1),
 (315,13,303,'zsb淘宝大市场',1454225795,1454225808,1454225853,1454225868,1454225879,1454225897,5,0,'','',NULL,1454225766,0,'张东哲1988',3,'http://www.baidu.com',100,21.7,1,1,1,1,1,1,1,3,1,'产品不错，服务也好',1,'认真做任务，否则会被举报',1,1,1,1,2,1,'山东省',NULL,1,NULL,95,10,3,1,1,'张东哲|15102119862|20000|上海市陆家嘴',1,'ffff',0,1,NULL,NULL,NULL,'/images/image/20160131/20160131083700_58422.png','/images/image/20160131/20160131083704_37243.png','/images/image/20160131/20160131083709_78587.png','/images/image/20160131/20160131083717_78085.jpg','/images/image/20160131/20160131083721_66892.jpg','/images/image/20160131/20160131083727_88648.png','/images/image/20160131/20160131083732_17360.gif','/images/image/20160131/20160131083758_26625.png',1,1,1),
 (316,13,303,'测试号',1456731181,1456731191,1456731251,1456731262,1456731275,1456731406,5,2,'货比的截图不正确','',NULL,1456395368,0,'张东哲1988',0,'http://www.baidu.com',100,3,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,NULL,NULL,NULL,'/images/image/20160229/20160229083335_75360.jpg','/images/image/20160229/20160229083340_84910.jpg','/images/image/20160229/20160229083344_27564.jpeg','/images/image/20160229/20160229083357_64206.png','/images/image/20160229/20160229083401_68669.jpg','/images/image/20160229/20160229083405_36251.png','/images/image/20160229/20160229083410_61918.jpg','/images/image/20160229/20160229083434_48973.jpeg',1,1,1),
 (318,308,307,'zhang_hong_kun',1458668322,1458668377,1458668437,1458668451,1458668467,1458668712,5,0,'','',NULL,1458667811,1,'zhang_hong_kun_2',0,'https://detail.tmall.com/item.htm?spm=a230r.1.14.3.NB5NU7&id=41610798823&cm_id=140105335569ed55e27b&abbucket=8&sku_properties=5919063:6536025;10004:653780895',500,0,1,1,1,1,1,1,1,1,1,'好评',1,'亲请留言',1,1,1,1,1,1,'北京市',1,1,1,98,5,2,1,NULL,'|||',NULL,'0*#',0,1,'IPhone6','第一页第3个','','/images/image/20160323/20160323013953_47218.jpg','/images/image/20160323/20160323013957_18426.jpg','/images/image/20160323/20160323014000_23021.jpg','/images/image/20160323/20160323014024_44524.jpg','/images/image/20160323/20160323014028_13018.jpg','/images/image/20160323/20160323014031_76203.jpg','/images/image/20160323/20160323014036_93850.jpg','/images/image/20160323/20160323014107_23697.jpg',1,1,1),
 (317,308,307,'zhang_hong_kun',1458663273,1458663299,1458663382,1458663399,1458663426,1458663447,5,0,'','',NULL,1458663244,0,'zhang_hong_kun_2',0,'https://detail.tmall.com/item.htm?spm=a230r.1.14.3.NB5NU7&id=41610798823&cm_id=140105335569ed55e27b&abbucket=8&sku_properties=5919063:6536025;10004:653780895',500,6,NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,'',NULL,'',NULL,NULL,NULL,NULL,1,NULL,'北京市',NULL,1,NULL,98,5,2,NULL,NULL,'|||',NULL,'0*#',0,1,'IPhone6','第一页第3个','','/images/image/20160323/20160323001532_42220.jpg','/images/image/20160323/20160323001537_97934.jpg','/images/image/20160323/20160323001540_66274.jpg','/images/image/20160323/20160323001604_11444.jpg','/images/image/20160323/20160323001613_69191.jpg','/images/image/20160323/20160323001617_73446.jpg','/images/image/20160323/20160323001620_80150.jpg','/images/image/20160323/20160323001705_82971.jpg',1,1,1),
 (319,308,307,'zhang_hong_kun',1458669195,1458669207,1458669298,1458669310,1458669319,1458669328,5,0,'','',NULL,1458669153,1,'zhang_hong_kun_2',0,'https://detail.tmall.com/item.htm?spm=a230r.1.14.3.NB5NU7&id=41610798823&cm_id=140105335569ed55e27b&abbucket=8&sku_properties=5919063:6536025;10004:653780895',500,0,1,1,1,1,1,1,1,1,1,'好评',1,'亲请留言',1,1,1,1,1,1,'重庆市',1,1,1,98,5,2,1,NULL,'|||',NULL,'0*#',1,2,'IPhone6','第一页第3个','','/images/image/20160323/20160323015335_62187.jpg','/images/image/20160323/20160323015339_38471.jpg','/images/image/20160323/20160323015359_67565.jpg','/images/image/20160323/20160323015445_60869.jpg','/images/image/20160323/20160323015449_29769.jpg','/images/image/20160323/20160323015453_64137.jpg','/images/image/20160323/20160323015458_40091.jpg','/images/image/20160323/20160323015518_92683.jpg',1,1,1),
 (320,308,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,'','',NULL,1458672428,1,'zhang_hong_kun_2',0,'https://detail.tmall.com/item.htm?spm=a230r.1.14.3.NB5NU7&id=41610798823&cm_id=140105335569ed55e27b&abbucket=8&sku_properties=5919063:6536025;10004:653780895',500,0,1,1,1,1,1,1,1,1,1,'好评',1,'亲请留言',1,1,1,1,1,1,'北京市',1,1,1,98,5,2,1,NULL,'|||',NULL,'0*#',0,1,'IPhone6','第一页第3个','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1);
/*!40000 ALTER TABLE `zxjy_companytasklist` ENABLE KEYS */;


--
-- Definition of table `zxjy_complianlist`
--

DROP TABLE IF EXISTS `zxjy_complianlist`;
CREATE TABLE `zxjy_complianlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id自增',
  `uid` int(11) DEFAULT NULL COMMENT '被投诉人id',
  `douid` int(11) DEFAULT NULL COMMENT '发起投诉人的id',
  `taskid` int(11) DEFAULT NULL COMMENT '此次投诉针对的任务id',
  `status` tinyint(1) DEFAULT '0' COMMENT '投诉状态：0等待处理，1处理中，2处理完成',
  `reason` varchar(1000) DEFAULT NULL COMMENT '投诉原因说明',
  `reasonImg` varchar(1000) DEFAULT NULL COMMENT '图片证据',
  `time` int(11) DEFAULT NULL COMMENT '投诉时间',
  `winid` varchar(100) DEFAULT NULL COMMENT '胜诉方id，0则为无胜负',
  `handleBeginTime` int(11) DEFAULT NULL COMMENT '开始处理时间即状态变为1的时间',
  `handleCompleteTime` int(11) DEFAULT NULL COMMENT '处理完成时间',
  `handleResultIntroduce` varchar(1000) DEFAULT NULL COMMENT '处理结果说明',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zxjy_complianlist`
--

/*!40000 ALTER TABLE `zxjy_complianlist` DISABLE KEYS */;
INSERT INTO `zxjy_complianlist` (`id`,`uid`,`douid`,`taskid`,`status`,`reason`,`reasonImg`,`time`,`winid`,`handleBeginTime`,`handleCompleteTime`,`handleResultIntroduce`) VALUES 
 (4,13,303,278,2,'迟迟不确认','/images/image/20160229/20160229081440_63901.png@',1456730086,'303',1456730109,1456730155,NULL),
 (5,303,13,316,2,'货比的截图不正确','/images/image/20160229/20160229083525_30467.jpg@',1456731344,'303',1456731379,1456731406,NULL);
/*!40000 ALTER TABLE `zxjy_complianlist` ENABLE KEYS */;


--
-- Definition of table `zxjy_exam`
--

DROP TABLE IF EXISTS `zxjy_exam`;
CREATE TABLE `zxjy_exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id自增',
  `is_question` tinyint(1) DEFAULT '0' COMMENT '是否为标题:0-答案,1-题目',
  `answer` tinyint(1) DEFAULT '0' COMMENT '是否为正确答案：0-不是，1是正确答案',
  `q_id` int(11) DEFAULT NULL COMMENT '所属问题id',
  `text` varchar(1000) DEFAULT '' COMMENT '问题或者答案的文字内容',
  `time` int(11) DEFAULT NULL COMMENT '添加时间',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态：0-关闭，1-正常',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zxjy_exam`
--

/*!40000 ALTER TABLE `zxjy_exam` DISABLE KEYS */;
INSERT INTO `zxjy_exam` (`id`,`is_question`,`answer`,`q_id`,`text`,`time`,`status`) VALUES 
 (12,1,0,NULL,'淘宝的网址是什么？',1454143870,1),
 (13,0,0,12,'http://www.baidu.com',1454143870,1),
 (14,0,1,12,'http://www.taobao.com',1454143870,1),
 (15,0,0,12,'http://www.sina.com',1454143870,1),
 (16,0,0,12,'没有正确答案',1454143870,1),
 (17,1,0,NULL,'违反“天猫商城描述不符的认定和处罚的规则与实施细则”扣分多少',1454144727,1),
 (18,0,0,17,'一 天',1454144727,1),
 (19,0,0,17,'三 天',1454144727,1),
 (20,0,0,17,'七 天',1454144727,1),
 (21,0,1,17,'一 月',1454144727,1),
 (22,1,0,NULL,'天猫规则考试题目：天猫商家给天猫开消费积分发票的周期是？',1454144926,1),
 (23,0,0,22,'一 天',1454144926,1),
 (24,0,0,22,'三 天',1454144926,1),
 (25,0,0,22,'七 天',1454144926,1),
 (26,0,1,22,'一 月',1454144926,1),
 (27,1,0,NULL,'天猫规则考试题目：天猫商城积分发票的要求是什么类型的 ？',1454145017,1),
 (28,0,1,27,'销售发票（普通发票或增值税发票均可）',1454145017,1),
 (29,0,0,27,'必须是增值税发票 ',1454145017,1),
 (30,0,0,27,'餐饮发票',1454145017,1),
 (31,0,0,27,'服务类发票 ',1454145017,1),
 (32,1,0,NULL,'下列哪些经营行为会被淘宝视为严重违规？',1454145139,1),
 (33,0,0,32,'出售假冒商品',1454145139,1),
 (34,0,0,32,'通过不正当手段谋取利益 ',1454145139,1),
 (35,0,0,32,'出、售、枪、支弹、药',1454145139,1),
 (36,0,1,32,'以上都是',1454145139,1),
 (38,0,1,37,'吃饭',1454150485,1),
 (39,0,0,37,'拉屎',1454150485,1),
 (40,0,0,37,'放屁',1454150485,1),
 (41,0,0,37,'睡觉',1454150485,1);
/*!40000 ALTER TABLE `zxjy_exam` ENABLE KEYS */;


--
-- Definition of table `zxjy_exitprotectplanrecord`
--

DROP TABLE IF EXISTS `zxjy_exitprotectplanrecord`;
CREATE TABLE `zxjy_exitprotectplanrecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id自增',
  `uid` int(11) DEFAULT NULL COMMENT '用户id',
  `status` tinyint(1) DEFAULT '0' COMMENT '申请状态，默认为0即申请中，1成功退出，2-申请失败',
  `message` varchar(1000) DEFAULT NULL COMMENT '原因说明',
  `time` int(11) DEFAULT NULL COMMENT '申请时间',
  `lastOptionTime` int(11) DEFAULT NULL COMMENT '最近操作时间',
  `exitTime` int(11) DEFAULT NULL COMMENT '成功退保时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zxjy_exitprotectplanrecord`
--

/*!40000 ALTER TABLE `zxjy_exitprotectplanrecord` DISABLE KEYS */;
/*!40000 ALTER TABLE `zxjy_exitprotectplanrecord` ENABLE KEYS */;


--
-- Definition of table `zxjy_kcborder`
--

DROP TABLE IF EXISTS `zxjy_kcborder`;
CREATE TABLE `zxjy_kcborder` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `uid` int(11) DEFAULT '0' COMMENT '用户Id,即谁完成了充值',
  `tno` varchar(255) DEFAULT NULL COMMENT '支付宝订单号',
  `payno` varchar(255) DEFAULT NULL COMMENT '//编号备注 一般是用户名',
  `money` varchar(255) DEFAULT NULL COMMENT '金额',
  `status` tinyint(1) DEFAULT '0' COMMENT '是否完成支付:0-未完成，1-已完成充值',
  `addtime` int(11) DEFAULT NULL COMMENT '交易号加入时间',
  `completetime` int(11) DEFAULT NULL COMMENT '完成支付时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zxjy_kcborder`
--

/*!40000 ALTER TABLE `zxjy_kcborder` DISABLE KEYS */;
INSERT INTO `zxjy_kcborder` (`id`,`uid`,`tno`,`payno`,`money`,`status`,`addtime`,`completetime`) VALUES 
 (10,13,'20160219200040011100670018578133','张明','20',0,1454762157,1454989826);
/*!40000 ALTER TABLE `zxjy_kcborder` ENABLE KEYS */;


--
-- Definition of table `zxjy_loginlog`
--

DROP TABLE IF EXISTS `zxjy_loginlog`;
CREATE TABLE `zxjy_loginlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id自增',
  `userid` int(11) DEFAULT NULL COMMENT '用户id',
  `username` varchar(255) DEFAULT NULL COMMENT '帐户名',
  `loginplace` varchar(255) DEFAULT NULL COMMENT '登录地址',
  `loginip` varchar(255) DEFAULT NULL COMMENT '登录ip',
  `time` int(11) DEFAULT NULL COMMENT '登录时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zxjy_loginlog`
--

/*!40000 ALTER TABLE `zxjy_loginlog` DISABLE KEYS */;
INSERT INTO `zxjy_loginlog` (`id`,`userid`,`username`,`loginplace`,`loginip`,`time`) VALUES 
 (1,13,'zyg1988','江苏省','127.0.0.1',1454551821),
 (5,13,'zyg1988','本地','127.0.0.1',1454984037),
 (6,13,'zyg1988','本地','127.0.0.1',1454985466),
 (7,13,'zyg1988','本地','127.0.0.1',1454986685),
 (8,13,'zyg1988','本地','127.0.0.1',1455590214),
 (9,303,'zsb1990','本地','127.0.0.1',1455590320),
 (10,13,'zyg1988','本地','127.0.0.1',1455615285),
 (11,13,'zyg1988','本地','127.0.0.1',1455615666),
 (12,13,'zyg1988','本地','127.0.0.1',1455675912),
 (13,13,'zyg1988','本地','127.0.0.1',1455676135),
 (14,13,'zyg1988','本地','127.0.0.1',1455690312),
 (15,13,'zyg1988','本地','127.0.0.1',1455692719),
 (16,13,'zyg1988','本地','127.0.0.1',1455701511),
 (17,303,'zsb1990','本地','127.0.0.1',1455721901),
 (18,13,'zyg1988','本地','127.0.0.1',1455721931),
 (19,13,'zyg1988','本地','127.0.0.1',1455722477),
 (20,303,'zsb1990','本地','127.0.0.1',1455723493),
 (21,13,'zyg1988','本地','127.0.0.1',1455762740),
 (22,13,'zyg1988','本地','180.166.175.202',1455774843),
 (23,13,'zyg1988','本地','127.0.0.1',1455777623),
 (24,13,'zyg1988','本地','127.0.0.1',1455777654),
 (25,13,'zyg1988','本地','127.0.0.1',1455777710),
 (26,13,'zyg1988','本地','127.0.0.1',1455777776),
 (27,13,'zyg1988','本地','127.0.0.2',1455777831),
 (28,13,'zyg1988','本地','127.0.0.1',1455777991),
 (29,13,'zyg1988','本地','127.0.0.1',1455778036),
 (30,13,'zyg1988','本地','127.0.0.1',1455778116),
 (31,13,'zyg1988','本地','127.0.0.2',1455778253),
 (32,13,'zyg1988','本地','127.0.0.2',1455778289),
 (33,13,'zyg1988','本地','127.0.0.3',1455778316),
 (34,13,'zyg1988','本地','127.0.0.2',1455778437),
 (35,13,'zyg1988','本地','127.0.0.2',1455779145),
 (36,13,'zyg1988','本地','127.0.0.1',1455779309),
 (37,13,'zyg1988','本地','127.0.0.2',1455780234),
 (38,13,'zyg1988','本地','127.0.0.2',1455781481),
 (39,13,'zyg1988','本地','127.0.0.1',1455781799),
 (40,13,'zyg1988','本地','127.0.0.2',1455781915),
 (41,13,'zyg1988','本地','127.0.0.1',1455782132),
 (42,13,'zyg1988','本地','127.0.0.2',1455782297),
 (43,13,'zyg1988','本地','127.0.0.1',1455782328),
 (44,13,'zyg1988','本地','127.0.0.2',1455782640),
 (45,13,'zyg1988','本地','127.0.0.1',1455784903),
 (46,13,'zyg1988','本地','127.0.0.1',1455785108),
 (47,13,'zyg1988','本地','127.0.0.2',1455785122),
 (48,13,'zyg1988','本地','127.0.0.2',1455785179),
 (49,13,'zyg1988','本地','127.0.0.2',1455785426),
 (50,13,'zyg1988','本地','127.0.0.2',1455785483),
 (51,13,'zyg1988','本地','127.0.0.1',1455785682),
 (52,13,'zyg1988','本地','127.0.0.1',1455785699),
 (53,13,'zyg1988','本地','127.0.0.2',1455785717),
 (54,13,'zyg1988','本地','127.0.0.2',1455785762),
 (55,13,'zyg1988','本地','127.0.0.1',1455786007),
 (56,13,'zyg1988','本地','127.0.0.2',1455786343),
 (57,13,'zyg1988','本地','127.0.0.2',1455786377),
 (58,13,'zyg1988','本地','127.0.0.1',1455786463),
 (59,13,'zyg1988','本地','127.0.0.1',1455786852),
 (60,303,'zsb1990','本地','127.0.0.2',1455786896),
 (61,303,'zsb1990','本地','127.0.0.1',1455786994),
 (62,303,'zsb1990','本地','127.0.0.1',1455787808),
 (63,13,'zyg1988','本地','127.0.0.1',1455801298),
 (64,303,'zsb1990','本地','127.0.0.1',1455801522),
 (65,303,'zsb1990','本地','127.0.0.1',1455803810),
 (66,303,'zsb1990','本地','127.0.0.1',1455805806),
 (67,303,'zsb1990','本地','127.0.0.1',1455806470),
 (68,303,'zsb1990','本地','127.0.0.1',1455806502),
 (69,303,'zsb1990','本地','127.0.0.1',1455806885),
 (70,303,'zsb1990','本地','127.0.0.1',1455806994),
 (71,13,'zyg1988','本地','127.0.0.1',1455850920),
 (72,13,'zyg1988','本地','127.0.0.1',1455851267),
 (73,13,'zyg1988','本地','127.0.0.1',1455859419),
 (74,303,'zsb1990','本地','127.0.0.1',1455860376),
 (75,303,'zsb1990','本地','127.0.0.1',1455860403),
 (76,13,'zyg1988','本地','127.0.0.1',1455860437),
 (77,13,'zyg1988','本地','127.0.0.1',1455868718),
 (78,303,'zsb1990','本地','127.0.0.1',1455868762),
 (79,13,'zyg1988','本地','127.0.0.1',1455869496),
 (80,13,'zyg1988','本地','127.0.0.1',1455873516),
 (81,303,'zsb1990','本地','127.0.0.1',1455873543),
 (82,303,'zsb1990','本地','127.0.0.1',1455946199),
 (83,13,'zyg1988','本地','127.0.0.1',1455946280),
 (84,13,'zyg1988','本地','127.0.0.1',1456031664),
 (85,303,'zsb1990','本地','127.0.0.1',1456034039),
 (86,13,'zyg1988','本地','127.0.0.1',1456132341),
 (87,13,'zyg1988','本地','127.0.0.1',1456132380),
 (88,13,'zyg1988','本地','127.0.0.1',1456132429),
 (89,13,'zyg1988','本地','127.0.0.1',1456153902),
 (90,13,'zyg1988','本地','127.0.0.1',1456207127),
 (91,13,'zyg1988','本地','127.0.0.1',1456222266),
 (92,303,'zsb1990','本地','127.0.0.1',1456222296),
 (93,13,'zyg1988','本地','127.0.0.2',1456291883),
 (94,13,'zyg1988','本地','127.0.0.2',1456294354),
 (95,13,'zyg1988','本地','127.0.0.2',1456294411),
 (96,13,'zyg1988','本地','127.0.0.1',1456295699),
 (97,13,'zyg1988','本地','127.0.0.1',1456395240),
 (98,303,'zsb1990','本地','127.0.0.1',1456395438),
 (99,13,'zyg1988','本地','127.0.0.1',1456638233),
 (100,303,'zsb1990','本地','127.0.0.1',1456718628),
 (101,13,'zyg1988','本地','127.0.0.1',1456718904),
 (102,13,'zyg1988','本地','127.0.0.1',1456725487),
 (103,13,'zyg1988','本地','127.0.0.1',1456725587),
 (104,13,'zyg1988','本地','127.0.0.1',1456725890),
 (105,303,'zsb1990','本地','127.0.0.1',1456726001),
 (106,13,'zyg1988','本地','127.0.0.1',1456729854),
 (107,13,'zyg1988','本地','127.0.0.1',1456731120),
 (108,303,'zsb1990','本地','127.0.0.1',1456731162),
 (109,303,'zsb1990','本地','127.0.0.1',1456732549),
 (110,13,'zyg1988','本地','127.0.0.1',1456733822),
 (111,303,'zsb1990','本地','127.0.0.1',1456736454),
 (112,303,'zsb1990','本地','127.0.0.1',1456740736),
 (113,13,'zyg1988','本地','127.0.0.1',1456740776),
 (114,13,'zyg1988','本地','127.0.0.1',1456756887),
 (115,13,'zyg1988','本地','127.0.0.1',1456756957),
 (116,13,'zyg1988','本地','127.0.0.1',1456804305),
 (117,13,'zyg1988','本地','127.0.0.1',1456814616),
 (118,13,'zyg1988','本地','127.0.0.2',1456829551),
 (119,13,'zyg1988','本地','127.0.0.1',1457321584),
 (120,307,'zhangkun','本地','127.0.0.1',1458659072),
 (121,308,'zhangkun2','本地','127.0.0.1',1458662880),
 (122,308,'zhangkun2','本地','127.0.0.1',1458666491);
/*!40000 ALTER TABLE `zxjy_loginlog` ENABLE KEYS */;


--
-- Definition of table `zxjy_myblackerlist`
--

DROP TABLE IF EXISTS `zxjy_myblackerlist`;
CREATE TABLE `zxjy_myblackerlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `userid` int(11) DEFAULT NULL COMMENT '我的id',
  `blackerusername` varchar(255) DEFAULT NULL COMMENT '被拉黑者用户名',
  `reason` varchar(1000) DEFAULT NULL COMMENT '拉黑原因',
  `time` int(11) DEFAULT NULL COMMENT '添加黑名单时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zxjy_myblackerlist`
--

/*!40000 ALTER TABLE `zxjy_myblackerlist` DISABLE KEYS */;
INSERT INTO `zxjy_myblackerlist` (`id`,`userid`,`blackerusername`,`reason`,`time`) VALUES 
 (3,303,'zyg1988','不喜欢',1455865684),
 (4,13,'zsb1990','接任务不认真',1456743305);
/*!40000 ALTER TABLE `zxjy_myblackerlist` ENABLE KEYS */;


--
-- Definition of table `zxjy_recordlist`
--

DROP TABLE IF EXISTS `zxjy_recordlist`;
CREATE TABLE `zxjy_recordlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id自增',
  `userid` int(11) DEFAULT NULL COMMENT '用户id',
  `catalog` tinyint(1) DEFAULT NULL COMMENT '记录类型：1-充值，2-购买发布点，3-发布任务使用金额，4-发布任务使用米粒，5-接任务获得的金额，6-接任务获得的米粒，7-米粒回收,8-余额提现，9-任务追加米粒，10-购买vip等级',
  `number` varchar(1000) DEFAULT '0' COMMENT '本次行为数量记录',
  `time` int(11) DEFAULT NULL COMMENT '操作时间',
  `tasknum` int(11) DEFAULT '0' COMMENT '此次流水共发布任务数量，仅供任务类型使用',
  `taskid` int(11) DEFAULT NULL COMMENT '任务id，只对记录类型为5和6时候使用',
  `MinLi` varchar(199) DEFAULT '0' COMMENT '米粒回收数量,只对记录类型为7使用',
  `bankid` int(11) DEFAULT NULL COMMENT '银行卡id，只对记录类型为8使用',
  `txStatus` tinyint(1) DEFAULT '1' COMMENT '提现状态1-提现申请中，2-提现成功，3-提现异常',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=426 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zxjy_recordlist`
--

/*!40000 ALTER TABLE `zxjy_recordlist` DISABLE KEYS */;
INSERT INTO `zxjy_recordlist` (`id`,`userid`,`catalog`,`number`,`time`,`tasknum`,`taskid`,`MinLi`,`bankid`,`txStatus`) VALUES 
 (360,13,1,'10',1454225359,0,NULL,NULL,NULL,1),
 (361,303,6,'2',1454225359,0,311,NULL,NULL,1),
 (362,13,3,'45',1454225467,1,NULL,NULL,NULL,1),
 (363,13,4,'2',1454225467,1,NULL,NULL,NULL,1),
 (364,303,5,'45',1454225588,0,314,NULL,NULL,1),
 (365,303,6,'2',1454225588,0,314,NULL,NULL,1),
 (366,13,3,'100',1454225766,1,NULL,NULL,NULL,1),
 (367,13,4,'21.7',1454225766,1,NULL,NULL,NULL,1),
 (368,303,5,'100',1454225897,0,315,NULL,NULL,1),
 (369,303,6,'21.7',1454225897,0,315,NULL,NULL,1),
 (370,13,7,'4.3',1454248551,0,NULL,'10',NULL,1),
 (371,13,7,'8.6',1454249328,0,NULL,'20',NULL,1),
 (372,13,7,'4.3',1454340443,0,NULL,'10',NULL,1),
 (373,13,7,'4.3',1454340774,0,NULL,'10',NULL,1),
 (374,13,7,'4.3',1454466828,0,NULL,'10',NULL,1),
 (375,13,8,'10',1454497373,0,NULL,'0',9,2),
 (376,13,8,'5.8',1454497626,0,NULL,'0',9,2),
 (377,13,8,'10',1454504266,0,NULL,'0',7,2),
 (378,13,8,'15',1454506809,0,NULL,'0',9,2),
 (379,13,8,'10',1454507052,0,NULL,'0',8,2),
 (380,13,1,'20',1454763288,0,NULL,'0',NULL,1),
 (381,13,8,'100',1454984532,0,NULL,'0',9,2),
 (382,13,8,'5',1454985057,0,NULL,'0',9,2),
 (383,13,2,'100',1454988795,0,NULL,'0',NULL,1),
 (384,13,2,'100',1454988920,0,NULL,'0',NULL,1),
 (385,13,1,'20',1454989826,0,NULL,'0',NULL,1),
 (386,13,8,'10',1454990362,0,NULL,'0',9,2),
 (387,13,8,'17',1455163437,0,NULL,'0',9,2),
 (388,13,8,'20',1455163457,0,NULL,'0',9,2),
 (389,13,2,'10',1455164130,0,NULL,'0',NULL,1),
 (390,13,9,'0.3',1455595988,0,312,'0',NULL,1),
 (391,13,9,'1',1455596117,0,312,'0',NULL,1),
 (392,13,9,'1',1455596178,0,312,'0',NULL,1),
 (393,13,3,'28',1455686573,0,NULL,'0',NULL,1),
 (394,13,3,'28',1455686608,0,NULL,'0',NULL,1),
 (395,13,3,'28',1455686613,0,NULL,'0',NULL,1),
 (396,13,3,'28',1455686619,0,NULL,'0',NULL,1),
 (397,13,3,'368',1455687482,0,NULL,'0',NULL,1),
 (398,13,11,'300',1455765420,0,NULL,'0',NULL,1),
 (399,303,5,'10',1455863410,0,312,'0',NULL,1),
 (400,303,6,'4.3',1455863410,0,312,'0',NULL,1),
 (401,303,5,'10',1455868737,0,310,'0',NULL,1),
 (402,303,6,'2',1455868737,0,310,'0',NULL,1),
 (403,303,5,'900',1455946574,0,309,'0',NULL,1),
 (404,303,6,'8',1455946574,0,309,'0',NULL,1),
 (405,13,8,'1',1456136649,0,NULL,'0',9,2),
 (406,13,8,'2',1456136655,0,NULL,'0',9,2),
 (407,13,3,'100',1456395368,1,NULL,'0',NULL,1),
 (408,13,4,'3',1456395368,1,NULL,'0',NULL,1),
 (409,303,5,'100',1456728889,0,278,'0',NULL,1),
 (410,303,6,'16.3',1456728889,0,278,'0',NULL,1),
 (413,303,5,'100',1456731406,0,316,'0',NULL,1),
 (414,303,6,'3',1456731406,0,316,'0',NULL,1),
 (415,303,11,'300',1456734637,0,NULL,'0',NULL,1),
 (416,308,3,'500',1458663244,1,NULL,'0',NULL,1),
 (417,308,4,'6',1458663245,1,NULL,'0',NULL,1),
 (418,307,5,'500',1458663447,0,317,'0',NULL,1),
 (419,307,6,'6',1458663447,0,317,'0',NULL,1),
 (420,307,11,'50',1458664063,0,NULL,'0',NULL,1),
 (421,308,11,'50',1458664363,0,NULL,'0',NULL,1),
 (422,307,11,'50',1458665313,0,NULL,'0',NULL,1),
 (423,308,3,'1',1458667811,1,NULL,'0',NULL,1),
 (424,308,3,'1',1458669153,1,NULL,'0',NULL,1),
 (425,308,3,'1',1458672428,1,NULL,'0',NULL,1);
/*!40000 ALTER TABLE `zxjy_recordlist` ENABLE KEYS */;


--
-- Definition of table `zxjy_translateactionid`
--

DROP TABLE IF EXISTS `zxjy_translateactionid`;
CREATE TABLE `zxjy_translateactionid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `actionid` varchar(100) NOT NULL,
  `actionidChinaese` varchar(100) NOT NULL,
  `controllerid` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zxjy_translateactionid`
--

/*!40000 ALTER TABLE `zxjy_translateactionid` DISABLE KEYS */;
INSERT INTO `zxjy_translateactionid` (`id`,`actionid`,`actionidChinaese`,`controllerid`) VALUES 
 (1,'Aclmanager','用户组管理中心','Acl'),
 (2,'Acltranslate','用户权限翻译管理','Acl'),
 (3,'Passfail','权限不足提示信息','Acl'),
 (4,'Translatecontroller','控制器翻译管理','Acl'),
 (5,'Translateaction','控制器方法翻译管理','Acl'),
 (6,'Create','添加新的讲师','Techer'),
 (7,'Create','添加新的软件','Soft'),
 (8,'Create','添加新的课程价格','Shopprice'),
 (9,'Index','课程价格列表查看','Shopprice'),
 (10,'Admin','课程价格列表查看','Shopprice'),
 (11,'Index','软件列表查看','Soft'),
 (12,'Admin','软件列表查看','Soft'),
 (13,'Index','讲师列表查看','Techer'),
 (14,'Admin','讲师列表查看','Techer'),
 (15,'Articlecatalog','文档分类列表查看','Article'),
 (16,'ArticleCatlogAdd','添加文档分类','Article'),
 (17,'ArticleCatlogAddMore','批量添加文档分类','Article'),
 (18,'ArticleCatlogDel','删除文档分类','Article'),
 (19,'ArticleCatlogChangeInfo','修改文档分类名称','Article'),
 (20,'ArticleCatlogAddSonType','添加文档子分类','Article'),
 (21,'ArticleAdd','添加文档','Article'),
 (22,'ArticleList','文档列表查看','Article'),
 (23,'ArticleEdit','修改文档','Article'),
 (24,'ArticleDyAdd','添加单页文档','Article'),
 (25,'ArticleDyEdit','修改单面文档','Article'),
 (26,'ArticleReserver','删除文档放入回收站','Article'),
 (27,'ArticleReserverList','回收站文档列表','Article'),
 (28,'ArticleReserverDel','在回收站中删除文档','Article'),
 (29,'ArticleDelBack','在回收站中还原文档','Article'),
 (30,'Index','后台首页欢迎界面','Default'),
 (31,'Error','页面不存在提示信息','Default'),
 (32,'Loginout','注销系统','Default'),
 (33,'Menu','左侧工具栏显示','Leftmenu'),
 (34,'Shopcatalog','课程分类','Shop'),
 (35,'ShopCatlogAdd','添加课程分类','Shop'),
 (36,'ShopCatlogAddMore','批量添加课程分类','Shop'),
 (37,'ShopCatlogDel','删除课程分类','Shop'),
 (38,'ShopCatlogChangeInfo','修改课程分类名称','Shop'),
 (39,'ShopCatlogAddSonType','添加课程子分类','Shop'),
 (40,'ShopGoodsAdd','添加课程','Shop'),
 (41,'ShopGoodsList','课程列表查看','Shop'),
 (42,'ChangeOnSale','修改上回状态','Shop'),
 (43,'ShopGoodsEdit','修改课程','Shop'),
 (44,'ShopGoodsReserver','删除课程放入回收站','Shop'),
 (45,'ShopGoodsReserverList','课程回收站列表','Shop'),
 (46,'ShopGoodsReserverDel','在回收站中删除课程','Shop'),
 (47,'ShopGoodsDelBack','在回收站中还原课程','Shop'),
 (56,'Managerinfochange','管理员信息修改','Acl'),
 (50,'Addaclgroup','添加用户组','Acl'),
 (51,'Aclgrouplist','用户组列表查看','Acl'),
 (52,'Aclgroupeditpower','修改用户组权限','Acl'),
 (55,'Managerlist','管理员列表','Acl'),
 (57,'Managerdelete','删除管理员','Acl'),
 (58,'Manageradd','添加管理员','Acl'),
 (59,'Designcatalog','设计作品分类列表','Design'),
 (60,'DesignCatlogAdd','添加设计分类','Design'),
 (61,'DesignCatlogAddMore','批量添加设计分类','Design'),
 (62,'DesignCatlogDel','删除设计分类','Design'),
 (63,'DesignCatlogChangeInfo','修改设计分类名称','Design'),
 (64,'DesignCatlogAddSonType','添加设计子分类','Design'),
 (65,'DesignList','作品列表','Design'),
 (66,'DesignAdd','添加作品','Design'),
 (67,'DesignEdit','作品信息修改','Design'),
 (68,'DesignReserver','删除作品到回收站','Design'),
 (69,'DesignReserverList','作品回收站列表','Design'),
 (70,'DesignReserverDel','作品在回收站中删除','Design'),
 (71,'DesignDelBack','还原作品','Design'),
 (72,'Webeffectscatalog','网页特效分类','Webeffects'),
 (73,'WebeffectsCatlogAdd','添加特效分类','Webeffects'),
 (74,'WebeffectsCatlogAddMore','批量添加特效分类','Webeffects'),
 (75,'WebeffectsCatlogDel','删除特效分类','Webeffects'),
 (76,'WebeffectsCatlogChangeInfo','修改特效分类名称','Webeffects'),
 (77,'WebeffectsCatlogAddSonType','添加特效子分类','Webeffects'),
 (78,'webeffectsAdd','添加特效','Webeffects'),
 (79,'webeffectsList','特效列表','Webeffects'),
 (80,'webeffectsEdit','修改特效信息','Webeffects'),
 (81,'webeffectsReserver','删除特效到回收站','Webeffects'),
 (82,'webeffectsReserverList','回收站特效列表','Webeffects'),
 (83,'webeffectsReserverDel','回收站中删除特效','Webeffects'),
 (84,'webeffectsDelBack','还原特效','Webeffects'),
 (85,'Moneylist','充值列表','Moneyman'),
 (86,'MoneyStatue','审核','Moneyman'),
 (87,'Txlist','提现列表','Moneyman'),
 (88,'BankDo','确认打款','Moneyman'),
 (89,'PersonRealName','个人审核','Realname'),
 (90,'CompanyRealName','公司审核','Realname'),
 (91,'Memberlist','会员列表查看','Membercenter'),
 (92,'Stopaccount','冻结帐号','Membercenter'),
 (93,'Startaccount','解冻帐号','Membercenter'),
 (94,'MembeDetailInfos','会员个人信息查看','Membercenter'),
 (95,'ChangPassword','修改会员密码','Membercenter'),
 (96,'GivePay','手动充值','Membercenter'),
 (97,'PersonRealName','','Membercenter'),
 (98,'Exam','考试系统管理','System'),
 (99,'Blackaccount','黑名单管理','System'),
 (100,'Tasklist','任务列表','Taskcenter'),
 (101,'ExamDel','删除考题','System');
/*!40000 ALTER TABLE `zxjy_translateactionid` ENABLE KEYS */;


--
-- Definition of table `zxjy_translatecontrollerid`
--

DROP TABLE IF EXISTS `zxjy_translatecontrollerid`;
CREATE TABLE `zxjy_translatecontrollerid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controllerid` varchar(100) NOT NULL,
  `controlleridChinaese` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zxjy_translatecontrollerid`
--

/*!40000 ALTER TABLE `zxjy_translatecontrollerid` DISABLE KEYS */;
INSERT INTO `zxjy_translatecontrollerid` (`id`,`controllerid`,`controlleridChinaese`) VALUES 
 (1,'Acl','用户权限控制中心'),
 (2,'Article','文档管理管中'),
 (3,'Ask','问答管理系统'),
 (4,'Default','后台首页系统'),
 (5,'Leftmenu','左侧工具栏'),
 (6,'Shop','课程管理系统'),
 (7,'Shopprice','课程价格管理系统'),
 (8,'Soft','常用软件管理系统'),
 (9,'Techer','讲师团队管理系统'),
 (10,'Design','设计路上管理中心'),
 (11,'Webeffects','网页特效管理中心'),
 (12,'Realname','真实性审核'),
 (13,'Moneyman','会员充值、提现'),
 (14,'Membercenter','会员管理中心'),
 (15,'System','平台配置'),
 (16,'Taskcenter','任务中心');
/*!40000 ALTER TABLE `zxjy_translatecontrollerid` ENABLE KEYS */;


--
-- Definition of table `zxjy_user`
--

DROP TABLE IF EXISTS `zxjy_user`;
CREATE TABLE `zxjy_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `Username` varchar(100) DEFAULT NULL COMMENT '用户名',
  `PassWord` varchar(50) DEFAULT NULL COMMENT '密码',
  `NickName` varchar(100) DEFAULT NULL COMMENT '昵称',
  `MyPhoto` varchar(1000) DEFAULT '' COMMENT '头像',
  `Email` varchar(100) DEFAULT NULL COMMENT 'Email',
  `emailActive` int(2) DEFAULT '0' COMMENT '0表示邮箱没有激活，1表示激活',
  `QQToken` varchar(100) DEFAULT NULL COMMENT 'QQ登录标识',
  `Money` varchar(100) DEFAULT '0' COMMENT '帐户存款',
  `MinLi` varchar(100) DEFAULT '0' COMMENT '米粒',
  `VipLv` int(5) DEFAULT '0' COMMENT '会员VIP等级(0-新手会员，1-1级VIP，2-2级vip，3-3级vip）',
  `VipBuyTime` int(11) DEFAULT NULL COMMENT 'vip购买时间',
  `VipStopTime` int(11) DEFAULT NULL COMMENT 'VIP到期时间，到期即VIP停止',
  `JoinProtectPlan` tinyint(1) DEFAULT '0' COMMENT '是否加入商保：0未加入，1加入',
  `JoinProtectPlanTime` int(11) DEFAULT NULL COMMENT '加入商保时间',
  `JoinProtectPlanMoney` varchar(100) DEFAULT '0' COMMENT '商保金额，0未缴纳',
  `Score` int(10) DEFAULT '0' COMMENT '积分',
  `Experience` int(11) DEFAULT '0' COMMENT '经验值，默认为0',
  `Phon` varchar(100) DEFAULT NULL COMMENT '手机号',
  `PhonActive` int(11) DEFAULT '0' COMMENT '0未激活，1激活',
  `Question` varchar(100) DEFAULT NULL COMMENT '验证问题',
  `Answer` varchar(100) DEFAULT NULL COMMENT '验证答案',
  `TrueName` varchar(18) DEFAULT NULL COMMENT '真实姓名',
  `Sex` tinyint(1) DEFAULT '1' COMMENT '性别：0-女性，1-男姓',
  `IdNumber` int(11) DEFAULT NULL COMMENT '介绍人ID',
  `RegIp` varchar(20) DEFAULT NULL COMMENT '注册IP',
  `RegTime` int(30) DEFAULT NULL COMMENT '注册时间',
  `LoginIp` varchar(20) DEFAULT NULL COMMENT '登录IP',
  `LoginTime` int(30) DEFAULT NULL COMMENT '登录时间',
  `Status` int(1) DEFAULT '0' COMMENT '0正常,1为冻结',
  `Opend` int(1) DEFAULT '0' COMMENT '0为刷手，1为商家',
  `SafePwd` varchar(100) DEFAULT '' COMMENT '安全操作码',
  `ExamPass` tinyint(1) DEFAULT '0' COMMENT '考试是否通过0-未通过，1通过',
  `PlaceOtherLogin` tinyint(1) DEFAULT '0' COMMENT '是否开启异地登录验证;0未开启，1开启',
  `id_card` varchar(18) DEFAULT NULL COMMENT '身份证号码',
  `id_photo_front` varchar(128) DEFAULT NULL COMMENT '身份证照前面',
  `id_photo_rear` varchar(128) DEFAULT NULL COMMENT '身份证照背面',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=309 DEFAULT CHARSET=utf8 COMMENT='用户总表';

--
-- Dumping data for table `zxjy_user`
--

/*!40000 ALTER TABLE `zxjy_user` DISABLE KEYS */;
INSERT INTO `zxjy_user` (`id`,`Username`,`PassWord`,`NickName`,`MyPhoto`,`Email`,`emailActive`,`QQToken`,`Money`,`MinLi`,`VipLv`,`VipBuyTime`,`VipStopTime`,`JoinProtectPlan`,`JoinProtectPlanTime`,`JoinProtectPlanMoney`,`Score`,`Experience`,`Phon`,`PhonActive`,`Question`,`Answer`,`TrueName`,`Sex`,`IdNumber`,`RegIp`,`RegTime`,`LoginIp`,`LoginTime`,`Status`,`Opend`,`SafePwd`,`ExamPass`,`PlaceOtherLogin`,`id_card`,`id_photo_front`,`id_photo_rear`) VALUES 
 (13,'zyg1988','21232f297a57a5a743894a0e4a801fc3',NULL,'/images/image/20160201/20160201092115_72385.jpg','753104948@qq.com',0,'753104948','8710.7','215',3,1455687482,1486791482,1,1455765420,'300',0,104,'18221791657',1,NULL,NULL,'张玉贡',1,NULL,'139.227.230.157',1417679499,NULL,NULL,0,0,'0192023a7bbd73250516f069df18b500',1,1,NULL,NULL,NULL),
 (303,'zsb1990','e10adc3949ba59abbe56e057f20f883e',NULL,'','16123983466@qq.com',0,'591276051','975','59.3',0,NULL,NULL,1,1456734637,'300',0,4,'13162731331',1,NULL,NULL,'张绍波',1,NULL,'127.0.0.1',1453574146,NULL,NULL,1,0,'0192023a7bbd73250516f069df18b500',1,1,NULL,NULL,NULL),
 (305,'zxm1980','0192023a7bbd73250516f069df18b500',NULL,'','753104980@qq.com',0,'753104980','0','0',0,NULL,NULL,0,NULL,'0',0,0,'13153789829',0,NULL,NULL,NULL,1,NULL,'127.0.0.1',1455699716,NULL,NULL,0,0,'',0,0,NULL,NULL,NULL),
 (306,'zyg1990','0192023a7bbd73250516f069df18b500',NULL,'','15102119878@qq.com',0,'15102119878','20','0',0,NULL,NULL,0,NULL,'0',0,0,'15102119878',0,NULL,NULL,NULL,1,NULL,'127.0.0.1',1455699994,NULL,NULL,1,0,'',0,0,NULL,NULL,NULL),
 (307,'zhangkun','e10adc3949ba59abbe56e057f20f883e',NULL,'','657302578@qq.com',1,'657302578','1000','6',0,NULL,NULL,1,1458665313,'50',0,3,'15652189151',1,NULL,NULL,'张坤',1,NULL,'127.0.0.1',1458659060,NULL,NULL,0,0,'d0e15b262ca8ac256399cfe0f12e8c88',0,0,'412726199005016310','/images/image/20160323/20160323000231_79557.jpg','/images/image/20160323/20160323000235_13609.jpg'),
 (308,'zhangkun2','e10adc3949ba59abbe56e057f20f883e',NULL,'','625746228@qq.com',0,'625746228','99447','99994',0,NULL,NULL,1,1458664363,'50',0,3,'15652189152',0,NULL,NULL,'张坤2',1,NULL,'127.0.0.1',1458662870,NULL,NULL,0,0,'d0e15b262ca8ac256399cfe0f12e8c88',0,0,'412726198905016310','/images/image/20160323/20160323001259_87206.jpg','/images/image/20160323/20160323001304_71086.jpg');
/*!40000 ALTER TABLE `zxjy_user` ENABLE KEYS */;


--
-- Definition of table `zxjy_user_lv`
--

DROP TABLE IF EXISTS `zxjy_user_lv`;
CREATE TABLE `zxjy_user_lv` (
  `UserId` int(10) DEFAULT NULL COMMENT '关联UserID',
  `UserLv` int(10) NOT NULL DEFAULT '0' COMMENT '用户等级',
  `UserExp` int(13) NOT NULL DEFAULT '0' COMMENT '用户经验',
  `SignInTime` int(13) DEFAULT '0' COMMENT '上次签到时间',
  `SignInNum` int(4) NOT NULL DEFAULT '0' COMMENT '签到次数'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户等级经验表';

--
-- Dumping data for table `zxjy_user_lv`
--

/*!40000 ALTER TABLE `zxjy_user_lv` DISABLE KEYS */;
/*!40000 ALTER TABLE `zxjy_user_lv` ENABLE KEYS */;


--
-- Definition of table `zxjy_usertasklist`
--

DROP TABLE IF EXISTS `zxjy_usertasklist`;
CREATE TABLE `zxjy_usertasklist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL COMMENT '用户ID',
  `task_id` int(10) unsigned NOT NULL COMMENT '任务ID',
  `user_wangwang` varchar(32) DEFAULT NULL COMMENT '用户旺旺',
  `accept_time` datetime DEFAULT NULL COMMENT '接受时间',
  `state` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0未审核1审核通过2审核未通过',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='用户申请的任务列表';

--
-- Dumping data for table `zxjy_usertasklist`
--

/*!40000 ALTER TABLE `zxjy_usertasklist` DISABLE KEYS */;
INSERT INTO `zxjy_usertasklist` (`id`,`uid`,`task_id`,`user_wangwang`,`accept_time`,`state`) VALUES 
 (2,307,320,'zhang_hong_kun','2016-03-23 02:48:16',0);
/*!40000 ALTER TABLE `zxjy_usertasklist` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
