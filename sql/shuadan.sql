/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : shuadan

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-03-17 23:05:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `zxjy_aclgroup`
-- ----------------------------
DROP TABLE IF EXISTS `zxjy_aclgroup`;
CREATE TABLE `zxjy_aclgroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(100) NOT NULL,
  `acllist` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zxjy_aclgroup
-- ----------------------------
INSERT INTO `zxjy_aclgroup` VALUES ('1', '超级管理员', 'acl/managerlist,article/articlecatalog,article/articlecatlogadd,article/articlecatlogaddmore,article/articlecatlogaddsontype,article/articleadd,article/articlelist,article/articleedit,article/articledyadd,article/articledyedit,article/articlereserver,article/articlereserverlist,article/articledelback,design/designcatalog,design/designcatlogadd,design/designcatlogaddmore,design/designcatlogchangeinfo,design/designcatlogaddsontype,design/designadd,design/designlist,design/designedit,design/designreserver,design/designreserverlist,design/designdelback,shop/shopcatalog,shop/shopcatlogadd,shop/shopcatlogaddmore,shop/shopcatlogdel,shop/shopcatlogchangeinfo,shop/shopcatlogaddsontype,shop/shopgoodsadd,shop/shopgoodslist,shop/changeonsale,shop/shopgoodsedit,shop/shopgoodsreserver,shop/shopgoodsreserverlist,shop/shopgoodsreserverdel,shop/shopgoodsdelback,shopprice/create,shopprice/index,shopprice/admin,soft/create,soft/index,soft/admin,techer/create,techer/index,techer/admin,webeffects/webeffectscatalog,webeffects/webeffectscatlogadd,webeffects/webeffectscatlogaddmore,webeffects/webeffectscatlogchangeinfo,webeffects/webeffectscatlogaddsontype,webeffects/webeffectsadd,webeffects/webeffectslist,webeffects/webeffectsedit,webeffects/webeffectsreserver,webeffects/webeffectsreserverlist,webeffects/webeffectsdelback,');
INSERT INTO `zxjy_aclgroup` VALUES ('2', '文档管理员', 'article/articlecatalog,article/articleadd,article/articlelist,article/articleedit,article/articledyadd,article/articledyedit,article/articlereserver,article/articlereserverlist,article/articledelback,');
INSERT INTO `zxjy_aclgroup` VALUES ('3', '设计路上编辑', 'design/designcatalog,design/designadd,design/designlist,design/designedit,design/designreserver,design/designreserverlist,design/designdelback,');

-- ----------------------------
-- Table structure for `zxjy_admin`
-- ----------------------------
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

-- ----------------------------
-- Records of zxjy_admin
-- ----------------------------
INSERT INTO `zxjy_admin` VALUES ('1', 'admin', '0192023a7bbd73250516f069df18b500', '0', '0', '0');

-- ----------------------------
-- Table structure for `zxjy_appraise`
-- ----------------------------
DROP TABLE IF EXISTS `zxjy_appraise`;
CREATE TABLE `zxjy_appraise` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `uid` int(11) DEFAULT NULL COMMENT '被评价人id即接手',
  `douid` int(11) DEFAULT NULL COMMENT '评价人id即商家',
  `status` tinyint(1) DEFAULT NULL COMMENT '评价状态：0-差评，1-中评，2-好评',
  `taskid` int(11) DEFAULT NULL COMMENT '相关任务id',
  `time` int(11) DEFAULT NULL COMMENT '评价时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zxjy_appraise
-- ----------------------------
INSERT INTO `zxjy_appraise` VALUES ('4', '303', '13', '1', '312', '1455863410');
INSERT INTO `zxjy_appraise` VALUES ('5', '303', '13', '1', '310', '1455868737');
INSERT INTO `zxjy_appraise` VALUES ('6', '303', '13', '2', '309', '1455946574');

-- ----------------------------
-- Table structure for `zxjy_article`
-- ----------------------------
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

-- ----------------------------
-- Records of zxjy_article
-- ----------------------------
INSERT INTO `zxjy_article` VALUES ('129', '33', '0', '接手任务必知：物流未到请勿签收！', '+', '0', '0', null, '0', '0', '0', '0', '0', '0', '0', '1', '', null, '接手任务必知：物流未到请勿签收！', '', '', null, '1', null, '1', '1', '0', '1455659814', null, '0', '0', '0', '0', '0', '0', '0', '0', null, '0');
INSERT INTO `zxjy_article` VALUES ('130', '33', '0', '最新公告2', '+', '0', '0', null, '0', '0', '0', '0', '0', '0', '0', '1', '', null, '公告2内容', '', '', null, '1', null, '1', '1', '0', '1432490887', null, '1', '0', '0', '0', '0', '0', '0', '0', null, '0');
INSERT INTO `zxjy_article` VALUES ('131', '38', '0', '关于收货时间到后物流未签收的新规', '+', '0', '0', null, '0', '0', '0', '0', '0', '0', '0', '1', '', null, '关于收货时间到后物流未签收的新规', '', '', null, '1', null, '1', '1', '0', '1455659980', null, '0', '0', '0', '0', '0', '0', '0', '0', null, '0');
INSERT INTO `zxjy_article` VALUES ('132', '38', '0', '商家发布任务如何解决快递单号', '+', '0', '0', null, '0', '0', '0', '0', '0', '0', '0', '1', '', null, '商家发布任务如何解决快递单号', '', '', null, '1', null, '1', '1', '0', '1455660019', null, '0', '0', '0', '0', '0', '0', '0', '0', null, '0');
INSERT INTO `zxjy_article` VALUES ('133', '38', '0', '聚宝盆新手常见问题答疑', '+', '0', '0', null, '0', '0', '0', '0', '0', '0', '0', '1', '', null, '聚宝盆新手常见问题答疑', '', '', null, '1', null, '1', '1', '0', '1455660319', null, '0', '0', '0', '0', '0', '0', '0', '0', null, '0');
INSERT INTO `zxjy_article` VALUES ('134', '38', '0', '发布任务流程', '+', '0', '0', null, '0', '0', '0', '0', '0', '0', '0', '1', '', null, '发布任务流程', '', '', null, '1', null, '1', '1', '0', '1455660064', null, '0', '0', '0', '0', '0', '0', '0', '0', null, '0');
INSERT INTO `zxjy_article` VALUES ('135', '38', '0', '【支付宝充值】查看支付宝交易号', '+', '0', '0', null, '0', '0', '0', '0', '0', '0', '0', '1', '', null, '【支付宝充值】查看支付宝交易号', '', '', null, '1', null, '1', '1', '0', '1455660084', null, '0', '0', '0', '0', '0', '0', '0', '0', null, '0');
INSERT INTO `zxjy_article` VALUES ('136', '39', '0', '关于收货时间到后物流未签收的新规', '+', '0', '0', null, '0', '0', '0', '0', '0', '0', '0', '1', '', null, '关于收货时间到后物流未签收的新规', '', '', null, '1', null, '1', '1', '0', '1455660125', null, '1', '0', '0', '0', '0', '0', '0', '0', null, '0');
INSERT INTO `zxjy_article` VALUES ('137', '39', '0', '商家发布任务如何解决快递单号', '+', '0', '0', null, '0', '0', '0', '0', '0', '0', '0', '1', '', null, '商家发布任务如何解决快递单号', '', '', null, '1', null, '1', '1', '0', '1455660139', null, '1', '0', '0', '0', '0', '0', '0', '0', null, '0');
INSERT INTO `zxjy_article` VALUES ('138', '39', '0', '米粒网新手常见问题答疑', '+', '0', '0', null, '0', '0', '0', '0', '0', '0', '0', '1', '', null, '米粒网新手常见问题答疑', '', '', null, '1', null, '1', '1', '0', '1455660150', null, '0', '0', '0', '0', '0', '0', '0', '0', null, '0');
INSERT INTO `zxjy_article` VALUES ('139', '40', '0', '聚宝盆2.0版本正式上线运营', '+', '0', '0', null, '0', '0', '0', '0', '0', '0', '0', '1', '', null, '聚宝盆2.0版本正式上线运营', '', '', null, '1', null, '1', '1', '0', '1455660232', null, '0', '0', '0', '0', '0', '0', '0', '0', null, '0');
INSERT INTO `zxjy_article` VALUES ('140', '41', '0', '刷单时代的来临！', '+', '0', '0', null, '0', '0', '0', '0', '0', '0', '0', '1', '', null, '刷单时代的来临！', '', '', null, '1', null, '1', '1', '0', '1455660261', null, '0', '0', '0', '0', '0', '0', '0', '0', null, '0');
INSERT INTO `zxjy_article` VALUES ('141', '38', '0', '新手刷单常见问题答疑', '+', '0', '0', null, '0', '0', '0', '0', '0', '0', '0', '1', '', null, '新手刷单常见问题答疑', '', '', null, '1', null, '1', '1', '0', '1455769121', null, '0', '0', '0', '0', '0', '0', '0', '0', null, '0');
INSERT INTO `zxjy_article` VALUES ('142', '39', '0', '接手任务的准备工作？', '+', '0', '0', null, '0', '0', '0', '0', '0', '0', '0', '1', '', null, '接手任务的准备工作？', '', '', null, '1', null, '1', '1', '0', '1455769156', null, '0', '0', '0', '0', '0', '0', '0', '0', null, '0');
INSERT INTO `zxjy_article` VALUES ('143', '39', '0', '接手任务流程', '+', '0', '0', null, '0', '0', '0', '0', '0', '0', '0', '1', '', null, '接手任务流程', '', '', null, '1', null, '1', '1', '0', '1455769165', null, '0', '0', '0', '0', '0', '0', '0', '0', null, '0');
INSERT INTO `zxjy_article` VALUES ('144', '39', '0', '淘宝刷单注意事项', '+', '0', '0', null, '0', '0', '0', '0', '0', '0', '0', '1', '', null, '淘宝刷单注意事项', '', '', null, '1', null, '1', '1', '0', '1455769184', null, '0', '0', '0', '0', '0', '0', '0', '0', null, '0');
INSERT INTO `zxjy_article` VALUES ('145', '39', '0', '任务图标解释', '+', '0', '0', null, '0', '0', '0', '0', '0', '0', '0', '1', '', null, '任务图标解释', '', '', null, '1', null, '1', '1', '0', '1455769198', null, '0', '0', '0', '0', '0', '0', '0', '0', null, '0');
INSERT INTO `zxjy_article` VALUES ('146', '39', '0', '接手方容易造成损失的几大误区', '+', '0', '0', null, '0', '0', '0', '0', '0', '0', '0', '1', '', null, '接手方容易造成损失的几大误区', '', '', null, '1', null, '1', '1', '0', '1455769216', null, '0', '0', '0', '0', '0', '0', '0', '0', null, '0');
INSERT INTO `zxjy_article` VALUES ('147', '41', '0', '淘宝刷单接手任务三大需知和六大注意事项', '+', '0', '0', null, '0', '0', '0', '0', '0', '0', '0', '1', '', null, '<div>\r\n	<h2>\r\n		淘宝刷单接手任务三大需知和六大注意事项\r\n	</h2>\r\n</div>\r\n<h2 style=\"font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<span style=\"font-weight:inherit;font-style:inherit;font-size:24px;font-family:inherit;vertical-align:baseline;color:#FF0000;\"><strong>接手任务三大需知：</strong></span> \r\n</h2>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	&nbsp;\r\n</p>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<strong>一、</strong>接手任务后，在<span style=\"font-style:inherit;font-family:inherit;vertical-align:baseline;color:#FF0000;\"><strong>30</strong><strong>分钟内</strong></span>需要在平台完成支付流程，否则任务会自动退出。\r\n</p>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<strong>&nbsp;</strong> \r\n</p>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<strong>二、</strong>聚宝盆上的任务都是垫付任务，商家已经充值资金到平台，平台已扣押了卖家任务商品款+佣金，所以可放心去淘宝拍下任务商品，完成任务后接手将获得任务的存款+佣金。\r\n</p>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	&nbsp;\r\n</p>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<strong>三、</strong>拍单时一定要<span style=\"font-style:inherit;font-family:inherit;vertical-align:baseline;color:#FF0000;\"><strong>核对商品价格，付款价格与平台任务价格必须一致</strong></span>，如不一致，请<span style=\"font-style:inherit;font-family:inherit;vertical-align:baseline;color:#FF0000;\"><strong>QQ联系卖家</strong></span>修改。\r\n</p>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	&nbsp;\r\n</p>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	------------------------------------------------------------------------------------------------------------\r\n</p>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	&nbsp;\r\n</p>\r\n<h2 style=\"font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<span style=\"font-weight:inherit;font-style:inherit;font-size:24px;font-family:inherit;vertical-align:baseline;color:#FF0000;\">接手任务六大注意事项：（情节严重者直接封号！）</span> \r\n</h2>\r\n<h3 style=\"font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<span style=\"font-weight:inherit;font-style:inherit;font-size:18.719999313354492px;font-family:inherit;vertical-align:baseline;color:#FFFFFF;background-color:#000000;\"><strong>【注：违反以下任意一条，根据情节处罚2-8个麦粒补偿给对方并警告，再犯者扣罚双倍，累计三次将封号处理！】</strong></span> \r\n</h3>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	&nbsp;\r\n</p>\r\n<h3 style=\"font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<span style=\"font-weight:inherit;font-style:inherit;font-size:18.719999313354492px;font-family:inherit;vertical-align:baseline;color:#FF0000;\">一、严禁通过旺旺联系对方并带有平台、米粒网、刷钻、刷单等忌讳字眼&nbsp;(请使用QQ联系对方)；</span> \r\n</h3>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	&nbsp;\r\n</p>\r\n<h3 style=\"font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<span style=\"font-weight:inherit;font-style:inherit;font-size:18.719999313354492px;font-family:inherit;vertical-align:baseline;color:#FF0000;\">二：禁止在任务过程中，辱骂任务一方，出言不逊；</span> \r\n</h3>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	&nbsp;\r\n</p>\r\n<h3 style=\"font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<span style=\"font-weight:inherit;font-style:inherit;font-size:18.719999313354492px;font-family:inherit;vertical-align:baseline;color:#FF0000;\">三、</span><span style=\"color:#FF0000;font-family:inherit;font-size:18.719999313354492px;font-style:inherit;font-weight:inherit;\">禁止使用花呗、淘金币、天猫积分、返利网、淘宝客、信用卡支付；</span> \r\n</h3>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	&nbsp;\r\n</p>\r\n<h3 style=\"font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<span style=\"font-weight:inherit;font-style:inherit;font-size:18.719999313354492px;font-family:inherit;vertical-align:baseline;color:#FF0000;\">四、</span><span style=\"font-family:inherit;font-weight:inherit;font-style:inherit;font-size:18.719999313354492px;vertical-align:baseline;color:#FF0000;\">必须物流信息签收后才能在淘宝确认收货！（无法获取物流信息的除外）【</span><a href=\"http://www.milioo.com/article/sell/122Q2015.html\" target=\"_blank\">物流超时补偿方案</a><span style=\"font-family:inherit;font-weight:inherit;font-style:inherit;font-size:18.719999313354492px;vertical-align:baseline;color:#FF0000;\">】；</span> \r\n</h3>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	&nbsp;\r\n</p>\r\n<h3 style=\"font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<span style=\"font-weight:inherit;font-style:inherit;font-size:18.719999313354492px;font-family:inherit;vertical-align:baseline;color:#FF0000;\">五、</span><span style=\"color:#FF0000;font-family:inherit;font-size:18.719999313354492px;font-style:inherit;font-weight:inherit;\">禁止以任何理由给对方差评及非五星好评等行为；</span> \r\n</h3>\r\n<p style=\"font-size:16px;font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	&nbsp;\r\n</p>\r\n<h3 style=\"font-family:微软雅黑;vertical-align:baseline;color:#444444;\">\r\n	<span style=\"font-weight:inherit;font-style:inherit;font-size:18.719999313354492px;font-family:inherit;vertical-align:baseline;color:#FF0000;\">六、</span><span style=\"color:#FF0000;font-family:inherit;font-size:18.719999313354492px;font-style:inherit;font-weight:inherit;\">严禁好评乱写评语，广告评语或恶意乱写评语。</span> \r\n</h3>', '', '', null, '1', null, '1', '1', '0', '1456714162', null, '0', '0', '0', '0', '0', '0', '0', '0', null, '0');

-- ----------------------------
-- Table structure for `zxjy_articlecatlog`
-- ----------------------------
DROP TABLE IF EXISTS `zxjy_articlecatlog`;
CREATE TABLE `zxjy_articlecatlog` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `classid` int(10) DEFAULT NULL,
  `sort` int(10) DEFAULT '10',
  `type` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zxjy_articlecatlog
-- ----------------------------
INSERT INTO `zxjy_articlecatlog` VALUES ('33', '重要通知', '0', '10', '1');
INSERT INTO `zxjy_articlecatlog` VALUES ('38', '商家帮助区', '0', '10', '1');
INSERT INTO `zxjy_articlecatlog` VALUES ('39', '威客帮助区', '0', '10', '1');
INSERT INTO `zxjy_articlecatlog` VALUES ('40', '最新资讯', '0', '10', '1');
INSERT INTO `zxjy_articlecatlog` VALUES ('41', '官方公告', '0', '10', '1');

-- ----------------------------
-- Table structure for `zxjy_banklist`
-- ----------------------------
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

-- ----------------------------
-- Records of zxjy_banklist
-- ----------------------------
INSERT INTO `zxjy_banklist` VALUES ('7', '13', '张玉贡', '18221791657', '4', '6227001218950279315', '0', '1454483424');
INSERT INTO `zxjy_banklist` VALUES ('8', '13', '张玉贡', '18221791657', '2', '8567001228950279430', '0', '1454484576');
INSERT INTO `zxjy_banklist` VALUES ('9', '13', '张玉贡', '18221791657', '7', '3407001218950279189', '0', '1454484640');

-- ----------------------------
-- Table structure for `zxjy_blackaccount`
-- ----------------------------
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

-- ----------------------------
-- Records of zxjy_blackaccount
-- ----------------------------
INSERT INTO `zxjy_blackaccount` VALUES ('1', '753104948', '1', '1452585125', '1', 'admin');
INSERT INTO `zxjy_blackaccount` VALUES ('2', '7946699463', '1', '1452585165', '1', 'admin');
INSERT INTO `zxjy_blackaccount` VALUES ('3', '1312521221', '1', '1452585209', '1', 'admin');
INSERT INTO `zxjy_blackaccount` VALUES ('7', '12341255', '0', '1452593809', '1', 'admin');
INSERT INTO `zxjy_blackaccount` VALUES ('8', '12342515562', '1', '1452593820', '1', 'admin');
INSERT INTO `zxjy_blackaccount` VALUES ('9', 'qwetqwetwqytqe', '0', '1452593823', '1', 'admin');
INSERT INTO `zxjy_blackaccount` VALUES ('10', '231612365123512', '1', '1452593826', '1', 'admin');
INSERT INTO `zxjy_blackaccount` VALUES ('11', '1341253153', '1', '1452593828', '1', 'admin');
INSERT INTO `zxjy_blackaccount` VALUES ('12', '1234121532', '1', '1452593830', '1', 'admin');
INSERT INTO `zxjy_blackaccount` VALUES ('13', '231234aasdg', '1', '1452593834', '1', 'admin');
INSERT INTO `zxjy_blackaccount` VALUES ('14', '1234123', '0', '1452593836', '1', 'admin');
INSERT INTO `zxjy_blackaccount` VALUES ('15', '15102119862', '0', '1452653259', '1', 'admin');

-- ----------------------------
-- Table structure for `zxjy_blindwangwang`
-- ----------------------------
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
) ENGINE=MyISAM AUTO_INCREMENT=172 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zxjy_blindwangwang
-- ----------------------------
INSERT INTO `zxjy_blindwangwang` VALUES ('149', '11', '我叫张东哲', '10', '1', '1', '1', '127.0.0.1', '1453185697', null);
INSERT INTO `zxjy_blindwangwang` VALUES ('152', '11', '东哲', null, '1', '1', '2', '127.0.0.1', '1453187939', null);
INSERT INTO `zxjy_blindwangwang` VALUES ('153', '11', '小明', '4', '1', '1', '1', '127.0.0.1', '1453188529', null);
INSERT INTO `zxjy_blindwangwang` VALUES ('154', '11', '天赐', null, '1', '1', '2', '127.0.0.1', '1453259757', null);
INSERT INTO `zxjy_blindwangwang` VALUES ('162', '13', 'zyg1988', null, '1', '1', '2', '127.0.0.1', '1453480067', null);
INSERT INTO `zxjy_blindwangwang` VALUES ('164', '13', '我是小白', '5', '1', '1', '1', '127.0.0.1', '1453554482', null);
INSERT INTO `zxjy_blindwangwang` VALUES ('163', '13', '张东哲1988', null, '1', '1', '2', '127.0.0.1', '1453517473', null);
INSERT INTO `zxjy_blindwangwang` VALUES ('165', '13', '黎明之战', '1', '1', '1', '1', '127.0.0.1', '1453554879', null);
INSERT INTO `zxjy_blindwangwang` VALUES ('166', '303', 'zsb淘宝大市场', '9', '1', '1', '1', '127.0.0.1', '1453574362', null);
INSERT INTO `zxjy_blindwangwang` VALUES ('167', '303', '伟大的工程', null, '1', '1', '2', '127.0.0.1', '1453611374', null);
INSERT INTO `zxjy_blindwangwang` VALUES ('168', '303', '高超', '10', '1', '1', '1', '127.0.0.1', '1453969692', null);
INSERT INTO `zxjy_blindwangwang` VALUES ('170', '303', '测试号', '10', '1', '1', '1', '127.0.0.1', '1455607005', null);
INSERT INTO `zxjy_blindwangwang` VALUES ('171', '303', '小花', '2', '1', '1', '1', '127.0.0.1', '1456734612', null);

-- ----------------------------
-- Table structure for `zxjy_companytasklist`
-- ----------------------------
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
) ENGINE=MyISAM AUTO_INCREMENT=317 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zxjy_companytasklist
-- ----------------------------
INSERT INTO `zxjy_companytasklist` VALUES ('274', '13', '303', 'zsb淘宝大市场', '1453885171', '1453885183', '1453886201', '1453886604', '1453886647', '1453886682', '5', '0', '', '', null, '1453517571', '0', '张东哲1988', '0', 'http://www.baidu.com', '100', '23.5', '1', '1', '1', '1', '1', '1', '1', '3', '1', '鞋子挺好的，穿起来很舒服...', null, '请接手认真完成任务，否则会被投诉举报', '1', '1', '1', null, '2', '1', '河南省', '1', '9', '1', '95', '10', '3', '1', '1', '张明|18221791657|20000|上海市世纪大道', '1', '鞋子20元', '0', '1', null, null, null, '/images/image/20160127/20160127091450_97846.jpg', '/images/image/20160127/20160127091502_39360.png', '/images/image/20160127/20160127091555_36743.jpg', '/images/image/20160127/20160127091543_23938.jpg', '/images/image/20160127/20160127091549_85278.jpg', '/images/image/20160127/20160127091555_36743.jpg', '/images/image/20160127/20160127091640_11694.jpg', '/images/image/20160127/20160127092406_43414.png', '1', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('275', '13', '303', 'zsb淘宝大市场', '1453623818', '1453623852', '1453628933', '1453631779', '1453635437', '1453638523', '5', '0', '', '', null, '1453517810', '1', 'zyg1988', '0', 'https://detail.tmall.com/item.htm?id=521056812533&ali_refid=a3_430583_1006:1103938627:N:%E6%8A%A5%E5%96%9C%E9%B8%9F:97873d4c05c4f811e25c7c0b8385a534&ali_trackid=1_97873d4c05c4f811e25c7c0b8385a534&spm=a230r.1.14.1.ExIDN7', '1780', '22.5', '1', '1', '1', null, '1', null, null, '2', null, '衣服穿着真舒服', null, '手机单请接手认真完成任务', '1', '1', '1', '1', '1', '1', '河南省', '1', '4', '1', '90', '15', '3', '1', null, '小明|18221791657|20000|广东省大汉路', '1', '报喜鸟衣服', '1', '1', '报喜鸟', '第一页第五排左右', '/images/image/20160123/20160123105423_69897.png', '/images/image/20160124/20160124174348_16860.png', '/images/image/20160124/20160124174427_55900.png', '/images/image/20160127/20160127091555_36743.jpg', '/images/image/20160124/20160124174632_16649.png', '/images/image/20160124/20160124174729_82518.png', '/images/image/20160124/20160124174806_80414.png', '/images/image/20160124/20160124174850_55639.png', '/images/image/20160124/20160124193625_34667.png', '1', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('276', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1453888172', '1', '张东哲1988', '4', 'http://www.baidu.com', '100', '24.8', '1', '1', '1', '1', '1', '1', '1', '1', '1', '很好的产品，很喜欢', '1', '请认真做任务，谢谢', '1', '1', '1', '1', '2', '1', '福建省', '1', '4', '1', '95', '10', '3', '1', '1', '张东哲|18221791657|2223300|上海市闸北区', '1', '报嘻鸟', '1', '1', '报嘻鸟', '第一行第一个', '/images/image/20160127/20160127094805_33455.jpg', null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('277', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1453888172', '1', '张东哲1988', '3', 'http://www.baidu.com', '100', '24.8', '1', '1', '1', '1', '1', '1', '1', '1', '1', '很好的产品，很喜欢', '1', '请认真做任务，谢谢', '1', '1', '1', '1', '2', '1', '福建省', '1', '4', '1', '95', '10', '3', '1', '1', '张玉贡|18221791657|2223300|上海市闸北区', '1', '报嘻鸟', '1', '1', '报嘻鸟', '第一行第一个', '/images/image/20160127/20160127094805_33455.jpg', null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('278', '13', '303', '测试号', '1455607025', '1455607107', '1455607495', '1455607555', '1455873581', '1456730155', '5', '2', '迟迟不确认', '', null, '1453891066', '0', '张东哲1988', '0', 'http://www.baidu.com', '100', '16.3', '1', '1', '1', '1', '1', '1', '1', '2', '1', '很好的产品，很喜欢', '1', '请认真做任务，谢谢', '1', '1', '1', '1', '1', '1', '北京市', '1', '1', '1', '98', '5', '2', '1', '1', '罗旭东|15102119862|2223300|上海市卢湾区', null, '0*#', '1', '2', '报嘻鸟', '第一行第一个', '/images/image/20160127/20160127103647_73072.jpg', '/images/image/20160216/20160216082213_16056.jpeg', '/images/image/20160216/20160216082222_44502.png', '/images/image/20160216/20160216082225_21873.png', '/images/image/20160216/20160216082439_17646.jpeg', '/images/image/20160216/20160216082442_22373.jpg', '/images/image/20160216/20160216082448_63695.jpg', '/images/image/20160216/20160216082453_72048.png', '/images/image/20160219/20160219101940_66074.png', '1', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('279', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1453908566', '1', 'zyg1988', '3', 'http://www.baidu.com', '100', '9.5', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '1', '2', '报嘻鸟', '第一行第一个', '/images/image/20160127/20160127152911_55112.jpg', null, null, null, null, null, null, null, null, '0', '2', '2');
INSERT INTO `zxjy_companytasklist` VALUES ('280', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1453911140', '1', '张东哲1988', '0', 'http://www.baidu.com', '1002', '9', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '1', '4', '报嘻鸟', '第一行第一个', '/images/image/20160127/20160127161206_28822.png', null, null, null, null, null, null, null, null, '0', '3', '2');
INSERT INTO `zxjy_companytasklist` VALUES ('281', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1453911140', '1', '张东哲1988', '0', 'http://www.baidu.com', '1002', '9', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '1', '4', '报嘻鸟', '第一行第一个', '/images/image/20160127/20160127161206_28822.png', null, null, null, null, null, null, null, null, '0', '3', '2');
INSERT INTO `zxjy_companytasklist` VALUES ('282', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1453911140', '1', '张东哲1988', '0', 'http://www.baidu.com', '1002', '9', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '1', '4', '报嘻鸟', '第一行第一个', '/images/image/20160127/20160127161206_28822.png', null, null, null, null, null, null, null, null, '0', '3', '2');
INSERT INTO `zxjy_companytasklist` VALUES ('283', '13', '303', '高超', '1453969699', '1453969729', '1453970016', '1453970057', '1453970121', '1453970195', '5', '0', '', '', null, '1453949214', '0', '张东哲1988', '0', 'http://www.baidu.com', '100', '23.5', '1', '1', '1', '1', '1', '1', '1', '3', '1', '很好的产品，很喜欢', null, '请认真做任务，谢谢', '1', '1', '1', '1', '1', '1', '北京市', '1', '9', '1', '95', '10', '4', '1', null, '张玉贡|18221791657|20000|上海市虹口区', '1', '报嘻鸟', '1', '2', '报嘻鸟', '第一行第一个', '/images/image/20160128/20160128024559_38841.jpg', '/images/image/20160128/20160128092948_92153.png', '/images/image/20160128/20160128092953_89991.png', '/images/image/20160128/20160128092957_72350.png', '/images/image/20160128/20160128093235_38042.jpg', '/images/image/20160128/20160128093242_15237.jpg', '/images/image/20160128/20160128093245_81850.png', '/images/image/20160128/20160128093251_68120.png', '/images/image/20160128/20160128093520_36902.png', '1', '2', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('284', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1453949214', '0', '张东哲1988', '0', 'http://www.baidu.com', '801', '23.5', '1', '1', '1', '1', '1', '1', '1', '3', '1', '很好的产品，很喜欢', null, '请认真做任务，谢谢', '1', '1', '1', '1', '1', '1', '北京市', '1', '9', '1', '95', '10', '4', '1', null, '张玉贡|18221791657|20000|上海市虹口区', '1', '报嘻鸟', '1', '2', '报嘻鸟', '第一行第一个', '/images/image/20160128/20160128024559_38841.jpg', null, null, null, null, null, null, null, null, '0', '2', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('285', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1453969596', '0', '张东哲1988', '0', 'http://www.baidu.com', '100', '6.1', '1', '1', '0', '1', null, '1', '1', '1', '1', '很好的产品，很喜欢', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '1', '1', '报嘻鸟', '第一行第一个', '', null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('286', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1454207531', '1', '张东哲1988', '0', 'http://www.baidu.com', '1000', '8', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '1', '1', '报喜鸟', '第一排第一个', '', null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('287', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1454207571', '0', '张东哲1988', '0', 'http://www.baidu.com', '1000', '8', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '1', '2', '报喜鸟', '第一排第一个', '', null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('288', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1454207752', '0', '张东哲1988', '0', 'http://www.baidu.com', '1000', '8', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '1', '1', '报喜鸟', '第一排第一个', '', null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('289', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1454207955', '0', '张东哲1988', '0', 'http://www.baidu.com', '1000', '8', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('290', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1454208340', '0', '张东哲1988', '0', 'http://www.baidu.com', '1000', '8', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('291', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1454211128', '0', '张东哲1988', '0', 'http://www.baidu.com', '1000', '8', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('292', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1454211356', '0', '张东哲1988', '0', 'http://www.baidu.com', '1000', '8', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('293', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1454211639', '0', '张东哲1988', '0', 'http://www.baidu.com', '1000', '8', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('294', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1454211639', '0', '张东哲1988', '0', 'http://www.baidu.com', '1000', '8', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('295', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1454211986', '0', '张东哲1988', '0', 'http://www.baidu.com', '20000', '9', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('296', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1454212118', '0', '张东哲1988', '0', 'http://www.baidu.com', '20000', '9', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('297', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1454212187', '0', '张东哲1988', '0', 'http://www.baidu.com', '100', '3', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('298', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1454212403', '0', '张东哲1988', '0', 'http://www.baidu.com', '1000', '8', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('299', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1454212501', '0', '张东哲1988', '0', 'http://www.baidu.com', '1000', '8', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('300', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1454213810', '0', '张东哲1988', '0', 'http://www.baidu.com', '10', '2', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('301', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1454213852', '0', '张东哲1988', '0', 'http://www.baidu.com', '20', '2', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('302', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1454214030', '0', '张东哲1988', '0', 'http://www.baidu.com', '30', '2', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('303', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1454214158', '0', '张东哲1988', '0', 'http://www.baidu.com', '10', '2', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('304', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1454214233', '0', '张东哲1988', '0', 'http://www.baidu.com', '100', '3', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('305', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1454214319', '0', '张东哲1988', '0', 'http://www.baidu.com', '100', '3', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('306', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1454215629', '0', '张东哲1988', '0', 'http://www.baidu.com', '10', '2', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('307', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1454215801', '0', '张东哲1988', '0', 'http://www.baidu.com', '13', '2', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('308', '13', null, null, null, null, null, null, null, null, '0', '0', '', '', null, '1454216592', '0', '张东哲1988', '0', 'http://www.baidu.com', '20', '2', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', '1', '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, null, null, null, null, null, null, null, null, '0', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('309', '13', '303', 'zsb淘宝大市场', '1455946253', '1455946296', '1455946419', '1455946439', '1455946463', '1455946574', '5', '0', '', '', null, '1454216803', '0', '张东哲1988', '0', 'http://www.baidu.com', '900', '8', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, '/images/image/20160220/20160220063207_63607.jpg', '/images/image/20160220/20160220063213_17467.jpg', '/images/image/20160220/20160220063219_38070.png', '/images/image/20160220/20160220063309_26669.jpg', '/images/image/20160220/20160220063317_87546.jpg', '/images/image/20160220/20160220063326_44966.jpg', '/images/image/20160220/20160220063336_71062.jpg', '/images/image/20160220/20160220063422_90408.jpg', '1', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('310', '13', '303', 'zsb淘宝大市场', '1455860423', '1455860447', '1455860525', '1455860536', '1455868682', '1455868737', '5', '0', '', '', null, '1454217033', '0', '张东哲1988', '0', 'http://www.baidu.com', '10', '2', null, null, '0', null, null, null, null, '1', null, '很好的产品', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, '/images/image/20160219/20160219064128_46837.png', '/images/image/20160219/20160219064135_93531.png', '/images/image/20160219/20160219064139_51841.png', '/images/image/20160219/20160219064152_34309.png', '/images/image/20160219/20160219064157_45727.png', '/images/image/20160219/20160219064201_45708.png', '/images/image/20160219/20160219064205_19706.png', '/images/image/20160219/20160219085801_13749.png', '1', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('311', '13', '303', 'zsb淘宝大市场', '1454224890', '1454224898', '1454224944', '1454224951', '1454224963', '1454225359', '5', '0', '', '', null, '1454223378', '0', '张东哲1988', '0', 'http://www.baidu.com', '10', '2', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, '/images/image/20160131/20160131082148_94045.png', '/images/image/20160131/20160131082153_13606.png', '/images/image/20160131/20160131082158_86832.png', '/images/image/20160131/20160131082207_17753.png', '/images/image/20160131/20160131082215_12955.png', '/images/image/20160131/20160131082219_67911.png', '/images/image/20160131/20160131082223_26748.jpg', '/images/image/20160131/20160131082241_42192.png', '1', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('312', '13', '303', '高超', '1455605019', '1455605736', '1455607304', '1455607688', '1455860554', '1455863410', '5', '0', '', '', null, '1454223378', '0', '张东哲1988', '0', 'https://shop34243820.taobao.com/?spm=a217m.7275797.1998711996.1.Io0fE8', '10', '4.3', null, null, '0', null, null, null, null, '1', null, '很喜欢这款鞋子', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '张东哲|15102119862|20000|上海市陆家嘴', null, '0*#', '0', '1', null, null, null, '/images/image/20160216/20160216082053_16954.jpg', '/images/image/20160216/20160216082058_76305.jpeg', '/images/image/20160216/20160216082103_64146.jpg', '/images/image/20160216/20160216082131_25520.png', '/images/image/20160216/20160216082137_22856.jpeg', '/images/image/20160216/20160216082134_77719.png', '/images/image/20160216/20160216082143_48886.jpg', '/images/image/20160219/20160219064233_44200.png', '1', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('313', '13', '303', 'zsb淘宝大市场', '1454223818', '1454223830', '1454223885', '1454223898', '1454223920', '1454224688', '5', '0', '', '', null, '1454223739', '0', '张东哲1988', '0', 'http://www.baidu.com', '35', '2', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, '/images/image/20160131/20160131080408_54566.jpg', '/images/image/20160131/20160131080412_16292.png', '/images/image/20160131/20160131080416_16811.jpg', '/images/image/20160131/20160131080430_88862.jpg', '/images/image/20160131/20160131080435_88524.png', '/images/image/20160131/20160131080440_55920.png', '/images/image/20160131/20160131080444_21854.png', '/images/image/20160131/20160131080519_87865.jpg', '1', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('314', '13', '303', '高超', '1454225493', '1454225504', '1454225545', '1454225551', '1454225574', '1454225588', '5', '0', '', '', null, '1454225467', '0', '张东哲1988', '0', 'http://www.baidu.com', '45', '2', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, '/images/image/20160131/20160131083153_70562.jpg', '/images/image/20160131/20160131083157_49866.png', '/images/image/20160131/20160131083203_76401.png', '/images/image/20160131/20160131083212_14155.png', '/images/image/20160131/20160131083216_45458.jpeg', '/images/image/20160131/20160131083221_41681.png', '/images/image/20160131/20160131083225_89881.jpg', '/images/image/20160131/20160131083253_96879.jpg', '1', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('315', '13', '303', 'zsb淘宝大市场', '1454225795', '1454225808', '1454225853', '1454225868', '1454225879', '1454225897', '5', '0', '', '', null, '1454225766', '0', '张东哲1988', '3', 'http://www.baidu.com', '100', '21.7', '1', '1', '1', '1', '1', '1', '1', '3', '1', '产品不错，服务也好', '1', '认真做任务，否则会被举报', '1', '1', '1', '1', '2', '1', '山东省', null, '1', null, '95', '10', '3', '1', '1', '张东哲|15102119862|20000|上海市陆家嘴', '1', 'ffff', '0', '1', null, null, null, '/images/image/20160131/20160131083700_58422.png', '/images/image/20160131/20160131083704_37243.png', '/images/image/20160131/20160131083709_78587.png', '/images/image/20160131/20160131083717_78085.jpg', '/images/image/20160131/20160131083721_66892.jpg', '/images/image/20160131/20160131083727_88648.png', '/images/image/20160131/20160131083732_17360.gif', '/images/image/20160131/20160131083758_26625.png', '1', '1', '1');
INSERT INTO `zxjy_companytasklist` VALUES ('316', '13', '303', '测试号', '1456731181', '1456731191', '1456731251', '1456731262', '1456731275', '1456731406', '5', '2', '货比的截图不正确', '', null, '1456395368', '0', '张东哲1988', '0', 'http://www.baidu.com', '100', '3', null, null, '0', null, null, null, null, '1', null, '', null, '', null, null, null, null, '1', null, '北京市', null, '1', null, '98', '5', '2', null, null, '|||', null, '0*#', '0', '1', null, null, null, '/images/image/20160229/20160229083335_75360.jpg', '/images/image/20160229/20160229083340_84910.jpg', '/images/image/20160229/20160229083344_27564.jpeg', '/images/image/20160229/20160229083357_64206.png', '/images/image/20160229/20160229083401_68669.jpg', '/images/image/20160229/20160229083405_36251.png', '/images/image/20160229/20160229083410_61918.jpg', '/images/image/20160229/20160229083434_48973.jpeg', '1', '1', '1');

-- ----------------------------
-- Table structure for `zxjy_complianlist`
-- ----------------------------
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

-- ----------------------------
-- Records of zxjy_complianlist
-- ----------------------------
INSERT INTO `zxjy_complianlist` VALUES ('4', '13', '303', '278', '2', '迟迟不确认', '/images/image/20160229/20160229081440_63901.png@', '1456730086', '303', '1456730109', '1456730155', null);
INSERT INTO `zxjy_complianlist` VALUES ('5', '303', '13', '316', '2', '货比的截图不正确', '/images/image/20160229/20160229083525_30467.jpg@', '1456731344', '303', '1456731379', '1456731406', null);

-- ----------------------------
-- Table structure for `zxjy_exam`
-- ----------------------------
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

-- ----------------------------
-- Records of zxjy_exam
-- ----------------------------
INSERT INTO `zxjy_exam` VALUES ('12', '1', '0', null, '淘宝的网址是什么？', '1454143870', '1');
INSERT INTO `zxjy_exam` VALUES ('13', '0', '0', '12', 'http://www.baidu.com', '1454143870', '1');
INSERT INTO `zxjy_exam` VALUES ('14', '0', '1', '12', 'http://www.taobao.com', '1454143870', '1');
INSERT INTO `zxjy_exam` VALUES ('15', '0', '0', '12', 'http://www.sina.com', '1454143870', '1');
INSERT INTO `zxjy_exam` VALUES ('16', '0', '0', '12', '没有正确答案', '1454143870', '1');
INSERT INTO `zxjy_exam` VALUES ('17', '1', '0', null, '违反“天猫商城描述不符的认定和处罚的规则与实施细则”扣分多少', '1454144727', '1');
INSERT INTO `zxjy_exam` VALUES ('18', '0', '0', '17', '一 天', '1454144727', '1');
INSERT INTO `zxjy_exam` VALUES ('19', '0', '0', '17', '三 天', '1454144727', '1');
INSERT INTO `zxjy_exam` VALUES ('20', '0', '0', '17', '七 天', '1454144727', '1');
INSERT INTO `zxjy_exam` VALUES ('21', '0', '1', '17', '一 月', '1454144727', '1');
INSERT INTO `zxjy_exam` VALUES ('22', '1', '0', null, '天猫规则考试题目：天猫商家给天猫开消费积分发票的周期是？', '1454144926', '1');
INSERT INTO `zxjy_exam` VALUES ('23', '0', '0', '22', '一 天', '1454144926', '1');
INSERT INTO `zxjy_exam` VALUES ('24', '0', '0', '22', '三 天', '1454144926', '1');
INSERT INTO `zxjy_exam` VALUES ('25', '0', '0', '22', '七 天', '1454144926', '1');
INSERT INTO `zxjy_exam` VALUES ('26', '0', '1', '22', '一 月', '1454144926', '1');
INSERT INTO `zxjy_exam` VALUES ('27', '1', '0', null, '天猫规则考试题目：天猫商城积分发票的要求是什么类型的 ？', '1454145017', '1');
INSERT INTO `zxjy_exam` VALUES ('28', '0', '1', '27', '销售发票（普通发票或增值税发票均可）', '1454145017', '1');
INSERT INTO `zxjy_exam` VALUES ('29', '0', '0', '27', '必须是增值税发票 ', '1454145017', '1');
INSERT INTO `zxjy_exam` VALUES ('30', '0', '0', '27', '餐饮发票', '1454145017', '1');
INSERT INTO `zxjy_exam` VALUES ('31', '0', '0', '27', '服务类发票 ', '1454145017', '1');
INSERT INTO `zxjy_exam` VALUES ('32', '1', '0', null, '下列哪些经营行为会被淘宝视为严重违规？', '1454145139', '1');
INSERT INTO `zxjy_exam` VALUES ('33', '0', '0', '32', '出售假冒商品', '1454145139', '1');
INSERT INTO `zxjy_exam` VALUES ('34', '0', '0', '32', '通过不正当手段谋取利益 ', '1454145139', '1');
INSERT INTO `zxjy_exam` VALUES ('35', '0', '0', '32', '出、售、枪、支弹、药', '1454145139', '1');
INSERT INTO `zxjy_exam` VALUES ('36', '0', '1', '32', '以上都是', '1454145139', '1');
INSERT INTO `zxjy_exam` VALUES ('38', '0', '1', '37', '吃饭', '1454150485', '1');
INSERT INTO `zxjy_exam` VALUES ('39', '0', '0', '37', '拉屎', '1454150485', '1');
INSERT INTO `zxjy_exam` VALUES ('40', '0', '0', '37', '放屁', '1454150485', '1');
INSERT INTO `zxjy_exam` VALUES ('41', '0', '0', '37', '睡觉', '1454150485', '1');

-- ----------------------------
-- Table structure for `zxjy_exitprotectplanrecord`
-- ----------------------------
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zxjy_exitprotectplanrecord
-- ----------------------------

-- ----------------------------
-- Table structure for `zxjy_kcborder`
-- ----------------------------
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

-- ----------------------------
-- Records of zxjy_kcborder
-- ----------------------------
INSERT INTO `zxjy_kcborder` VALUES ('10', '13', '20160219200040011100670018578133', '张明', '20', '0', '1454762157', '1454989826');

-- ----------------------------
-- Table structure for `zxjy_loginlog`
-- ----------------------------
DROP TABLE IF EXISTS `zxjy_loginlog`;
CREATE TABLE `zxjy_loginlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id自增',
  `userid` int(11) DEFAULT NULL COMMENT '用户id',
  `username` varchar(255) DEFAULT NULL COMMENT '帐户名',
  `loginplace` varchar(255) DEFAULT NULL COMMENT '登录地址',
  `loginip` varchar(255) DEFAULT NULL COMMENT '登录ip',
  `time` int(11) DEFAULT NULL COMMENT '登录时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zxjy_loginlog
-- ----------------------------
INSERT INTO `zxjy_loginlog` VALUES ('1', '13', 'zyg1988', '江苏省', '127.0.0.1', '1454551821');
INSERT INTO `zxjy_loginlog` VALUES ('5', '13', 'zyg1988', '本地', '127.0.0.1', '1454984037');
INSERT INTO `zxjy_loginlog` VALUES ('6', '13', 'zyg1988', '本地', '127.0.0.1', '1454985466');
INSERT INTO `zxjy_loginlog` VALUES ('7', '13', 'zyg1988', '本地', '127.0.0.1', '1454986685');
INSERT INTO `zxjy_loginlog` VALUES ('8', '13', 'zyg1988', '本地', '127.0.0.1', '1455590214');
INSERT INTO `zxjy_loginlog` VALUES ('9', '303', 'zsb1990', '本地', '127.0.0.1', '1455590320');
INSERT INTO `zxjy_loginlog` VALUES ('10', '13', 'zyg1988', '本地', '127.0.0.1', '1455615285');
INSERT INTO `zxjy_loginlog` VALUES ('11', '13', 'zyg1988', '本地', '127.0.0.1', '1455615666');
INSERT INTO `zxjy_loginlog` VALUES ('12', '13', 'zyg1988', '本地', '127.0.0.1', '1455675912');
INSERT INTO `zxjy_loginlog` VALUES ('13', '13', 'zyg1988', '本地', '127.0.0.1', '1455676135');
INSERT INTO `zxjy_loginlog` VALUES ('14', '13', 'zyg1988', '本地', '127.0.0.1', '1455690312');
INSERT INTO `zxjy_loginlog` VALUES ('15', '13', 'zyg1988', '本地', '127.0.0.1', '1455692719');
INSERT INTO `zxjy_loginlog` VALUES ('16', '13', 'zyg1988', '本地', '127.0.0.1', '1455701511');
INSERT INTO `zxjy_loginlog` VALUES ('17', '303', 'zsb1990', '本地', '127.0.0.1', '1455721901');
INSERT INTO `zxjy_loginlog` VALUES ('18', '13', 'zyg1988', '本地', '127.0.0.1', '1455721931');
INSERT INTO `zxjy_loginlog` VALUES ('19', '13', 'zyg1988', '本地', '127.0.0.1', '1455722477');
INSERT INTO `zxjy_loginlog` VALUES ('20', '303', 'zsb1990', '本地', '127.0.0.1', '1455723493');
INSERT INTO `zxjy_loginlog` VALUES ('21', '13', 'zyg1988', '本地', '127.0.0.1', '1455762740');
INSERT INTO `zxjy_loginlog` VALUES ('22', '13', 'zyg1988', '本地', '180.166.175.202', '1455774843');
INSERT INTO `zxjy_loginlog` VALUES ('23', '13', 'zyg1988', '本地', '127.0.0.1', '1455777623');
INSERT INTO `zxjy_loginlog` VALUES ('24', '13', 'zyg1988', '本地', '127.0.0.1', '1455777654');
INSERT INTO `zxjy_loginlog` VALUES ('25', '13', 'zyg1988', '本地', '127.0.0.1', '1455777710');
INSERT INTO `zxjy_loginlog` VALUES ('26', '13', 'zyg1988', '本地', '127.0.0.1', '1455777776');
INSERT INTO `zxjy_loginlog` VALUES ('27', '13', 'zyg1988', '本地', '127.0.0.2', '1455777831');
INSERT INTO `zxjy_loginlog` VALUES ('28', '13', 'zyg1988', '本地', '127.0.0.1', '1455777991');
INSERT INTO `zxjy_loginlog` VALUES ('29', '13', 'zyg1988', '本地', '127.0.0.1', '1455778036');
INSERT INTO `zxjy_loginlog` VALUES ('30', '13', 'zyg1988', '本地', '127.0.0.1', '1455778116');
INSERT INTO `zxjy_loginlog` VALUES ('31', '13', 'zyg1988', '本地', '127.0.0.2', '1455778253');
INSERT INTO `zxjy_loginlog` VALUES ('32', '13', 'zyg1988', '本地', '127.0.0.2', '1455778289');
INSERT INTO `zxjy_loginlog` VALUES ('33', '13', 'zyg1988', '本地', '127.0.0.3', '1455778316');
INSERT INTO `zxjy_loginlog` VALUES ('34', '13', 'zyg1988', '本地', '127.0.0.2', '1455778437');
INSERT INTO `zxjy_loginlog` VALUES ('35', '13', 'zyg1988', '本地', '127.0.0.2', '1455779145');
INSERT INTO `zxjy_loginlog` VALUES ('36', '13', 'zyg1988', '本地', '127.0.0.1', '1455779309');
INSERT INTO `zxjy_loginlog` VALUES ('37', '13', 'zyg1988', '本地', '127.0.0.2', '1455780234');
INSERT INTO `zxjy_loginlog` VALUES ('38', '13', 'zyg1988', '本地', '127.0.0.2', '1455781481');
INSERT INTO `zxjy_loginlog` VALUES ('39', '13', 'zyg1988', '本地', '127.0.0.1', '1455781799');
INSERT INTO `zxjy_loginlog` VALUES ('40', '13', 'zyg1988', '本地', '127.0.0.2', '1455781915');
INSERT INTO `zxjy_loginlog` VALUES ('41', '13', 'zyg1988', '本地', '127.0.0.1', '1455782132');
INSERT INTO `zxjy_loginlog` VALUES ('42', '13', 'zyg1988', '本地', '127.0.0.2', '1455782297');
INSERT INTO `zxjy_loginlog` VALUES ('43', '13', 'zyg1988', '本地', '127.0.0.1', '1455782328');
INSERT INTO `zxjy_loginlog` VALUES ('44', '13', 'zyg1988', '本地', '127.0.0.2', '1455782640');
INSERT INTO `zxjy_loginlog` VALUES ('45', '13', 'zyg1988', '本地', '127.0.0.1', '1455784903');
INSERT INTO `zxjy_loginlog` VALUES ('46', '13', 'zyg1988', '本地', '127.0.0.1', '1455785108');
INSERT INTO `zxjy_loginlog` VALUES ('47', '13', 'zyg1988', '本地', '127.0.0.2', '1455785122');
INSERT INTO `zxjy_loginlog` VALUES ('48', '13', 'zyg1988', '本地', '127.0.0.2', '1455785179');
INSERT INTO `zxjy_loginlog` VALUES ('49', '13', 'zyg1988', '本地', '127.0.0.2', '1455785426');
INSERT INTO `zxjy_loginlog` VALUES ('50', '13', 'zyg1988', '本地', '127.0.0.2', '1455785483');
INSERT INTO `zxjy_loginlog` VALUES ('51', '13', 'zyg1988', '本地', '127.0.0.1', '1455785682');
INSERT INTO `zxjy_loginlog` VALUES ('52', '13', 'zyg1988', '本地', '127.0.0.1', '1455785699');
INSERT INTO `zxjy_loginlog` VALUES ('53', '13', 'zyg1988', '本地', '127.0.0.2', '1455785717');
INSERT INTO `zxjy_loginlog` VALUES ('54', '13', 'zyg1988', '本地', '127.0.0.2', '1455785762');
INSERT INTO `zxjy_loginlog` VALUES ('55', '13', 'zyg1988', '本地', '127.0.0.1', '1455786007');
INSERT INTO `zxjy_loginlog` VALUES ('56', '13', 'zyg1988', '本地', '127.0.0.2', '1455786343');
INSERT INTO `zxjy_loginlog` VALUES ('57', '13', 'zyg1988', '本地', '127.0.0.2', '1455786377');
INSERT INTO `zxjy_loginlog` VALUES ('58', '13', 'zyg1988', '本地', '127.0.0.1', '1455786463');
INSERT INTO `zxjy_loginlog` VALUES ('59', '13', 'zyg1988', '本地', '127.0.0.1', '1455786852');
INSERT INTO `zxjy_loginlog` VALUES ('60', '303', 'zsb1990', '本地', '127.0.0.2', '1455786896');
INSERT INTO `zxjy_loginlog` VALUES ('61', '303', 'zsb1990', '本地', '127.0.0.1', '1455786994');
INSERT INTO `zxjy_loginlog` VALUES ('62', '303', 'zsb1990', '本地', '127.0.0.1', '1455787808');
INSERT INTO `zxjy_loginlog` VALUES ('63', '13', 'zyg1988', '本地', '127.0.0.1', '1455801298');
INSERT INTO `zxjy_loginlog` VALUES ('64', '303', 'zsb1990', '本地', '127.0.0.1', '1455801522');
INSERT INTO `zxjy_loginlog` VALUES ('65', '303', 'zsb1990', '本地', '127.0.0.1', '1455803810');
INSERT INTO `zxjy_loginlog` VALUES ('66', '303', 'zsb1990', '本地', '127.0.0.1', '1455805806');
INSERT INTO `zxjy_loginlog` VALUES ('67', '303', 'zsb1990', '本地', '127.0.0.1', '1455806470');
INSERT INTO `zxjy_loginlog` VALUES ('68', '303', 'zsb1990', '本地', '127.0.0.1', '1455806502');
INSERT INTO `zxjy_loginlog` VALUES ('69', '303', 'zsb1990', '本地', '127.0.0.1', '1455806885');
INSERT INTO `zxjy_loginlog` VALUES ('70', '303', 'zsb1990', '本地', '127.0.0.1', '1455806994');
INSERT INTO `zxjy_loginlog` VALUES ('71', '13', 'zyg1988', '本地', '127.0.0.1', '1455850920');
INSERT INTO `zxjy_loginlog` VALUES ('72', '13', 'zyg1988', '本地', '127.0.0.1', '1455851267');
INSERT INTO `zxjy_loginlog` VALUES ('73', '13', 'zyg1988', '本地', '127.0.0.1', '1455859419');
INSERT INTO `zxjy_loginlog` VALUES ('74', '303', 'zsb1990', '本地', '127.0.0.1', '1455860376');
INSERT INTO `zxjy_loginlog` VALUES ('75', '303', 'zsb1990', '本地', '127.0.0.1', '1455860403');
INSERT INTO `zxjy_loginlog` VALUES ('76', '13', 'zyg1988', '本地', '127.0.0.1', '1455860437');
INSERT INTO `zxjy_loginlog` VALUES ('77', '13', 'zyg1988', '本地', '127.0.0.1', '1455868718');
INSERT INTO `zxjy_loginlog` VALUES ('78', '303', 'zsb1990', '本地', '127.0.0.1', '1455868762');
INSERT INTO `zxjy_loginlog` VALUES ('79', '13', 'zyg1988', '本地', '127.0.0.1', '1455869496');
INSERT INTO `zxjy_loginlog` VALUES ('80', '13', 'zyg1988', '本地', '127.0.0.1', '1455873516');
INSERT INTO `zxjy_loginlog` VALUES ('81', '303', 'zsb1990', '本地', '127.0.0.1', '1455873543');
INSERT INTO `zxjy_loginlog` VALUES ('82', '303', 'zsb1990', '本地', '127.0.0.1', '1455946199');
INSERT INTO `zxjy_loginlog` VALUES ('83', '13', 'zyg1988', '本地', '127.0.0.1', '1455946280');
INSERT INTO `zxjy_loginlog` VALUES ('84', '13', 'zyg1988', '本地', '127.0.0.1', '1456031664');
INSERT INTO `zxjy_loginlog` VALUES ('85', '303', 'zsb1990', '本地', '127.0.0.1', '1456034039');
INSERT INTO `zxjy_loginlog` VALUES ('86', '13', 'zyg1988', '本地', '127.0.0.1', '1456132341');
INSERT INTO `zxjy_loginlog` VALUES ('87', '13', 'zyg1988', '本地', '127.0.0.1', '1456132380');
INSERT INTO `zxjy_loginlog` VALUES ('88', '13', 'zyg1988', '本地', '127.0.0.1', '1456132429');
INSERT INTO `zxjy_loginlog` VALUES ('89', '13', 'zyg1988', '本地', '127.0.0.1', '1456153902');
INSERT INTO `zxjy_loginlog` VALUES ('90', '13', 'zyg1988', '本地', '127.0.0.1', '1456207127');
INSERT INTO `zxjy_loginlog` VALUES ('91', '13', 'zyg1988', '本地', '127.0.0.1', '1456222266');
INSERT INTO `zxjy_loginlog` VALUES ('92', '303', 'zsb1990', '本地', '127.0.0.1', '1456222296');
INSERT INTO `zxjy_loginlog` VALUES ('93', '13', 'zyg1988', '本地', '127.0.0.2', '1456291883');
INSERT INTO `zxjy_loginlog` VALUES ('94', '13', 'zyg1988', '本地', '127.0.0.2', '1456294354');
INSERT INTO `zxjy_loginlog` VALUES ('95', '13', 'zyg1988', '本地', '127.0.0.2', '1456294411');
INSERT INTO `zxjy_loginlog` VALUES ('96', '13', 'zyg1988', '本地', '127.0.0.1', '1456295699');
INSERT INTO `zxjy_loginlog` VALUES ('97', '13', 'zyg1988', '本地', '127.0.0.1', '1456395240');
INSERT INTO `zxjy_loginlog` VALUES ('98', '303', 'zsb1990', '本地', '127.0.0.1', '1456395438');
INSERT INTO `zxjy_loginlog` VALUES ('99', '13', 'zyg1988', '本地', '127.0.0.1', '1456638233');
INSERT INTO `zxjy_loginlog` VALUES ('100', '303', 'zsb1990', '本地', '127.0.0.1', '1456718628');
INSERT INTO `zxjy_loginlog` VALUES ('101', '13', 'zyg1988', '本地', '127.0.0.1', '1456718904');
INSERT INTO `zxjy_loginlog` VALUES ('102', '13', 'zyg1988', '本地', '127.0.0.1', '1456725487');
INSERT INTO `zxjy_loginlog` VALUES ('103', '13', 'zyg1988', '本地', '127.0.0.1', '1456725587');
INSERT INTO `zxjy_loginlog` VALUES ('104', '13', 'zyg1988', '本地', '127.0.0.1', '1456725890');
INSERT INTO `zxjy_loginlog` VALUES ('105', '303', 'zsb1990', '本地', '127.0.0.1', '1456726001');
INSERT INTO `zxjy_loginlog` VALUES ('106', '13', 'zyg1988', '本地', '127.0.0.1', '1456729854');
INSERT INTO `zxjy_loginlog` VALUES ('107', '13', 'zyg1988', '本地', '127.0.0.1', '1456731120');
INSERT INTO `zxjy_loginlog` VALUES ('108', '303', 'zsb1990', '本地', '127.0.0.1', '1456731162');
INSERT INTO `zxjy_loginlog` VALUES ('109', '303', 'zsb1990', '本地', '127.0.0.1', '1456732549');
INSERT INTO `zxjy_loginlog` VALUES ('110', '13', 'zyg1988', '本地', '127.0.0.1', '1456733822');
INSERT INTO `zxjy_loginlog` VALUES ('111', '303', 'zsb1990', '本地', '127.0.0.1', '1456736454');
INSERT INTO `zxjy_loginlog` VALUES ('112', '303', 'zsb1990', '本地', '127.0.0.1', '1456740736');
INSERT INTO `zxjy_loginlog` VALUES ('113', '13', 'zyg1988', '本地', '127.0.0.1', '1456740776');
INSERT INTO `zxjy_loginlog` VALUES ('114', '13', 'zyg1988', '本地', '127.0.0.1', '1456756887');
INSERT INTO `zxjy_loginlog` VALUES ('115', '13', 'zyg1988', '本地', '127.0.0.1', '1456756957');
INSERT INTO `zxjy_loginlog` VALUES ('116', '13', 'zyg1988', '本地', '127.0.0.1', '1456804305');
INSERT INTO `zxjy_loginlog` VALUES ('117', '13', 'zyg1988', '本地', '127.0.0.1', '1456814616');
INSERT INTO `zxjy_loginlog` VALUES ('118', '13', 'zyg1988', '本地', '127.0.0.2', '1456829551');
INSERT INTO `zxjy_loginlog` VALUES ('119', '13', 'zyg1988', '本地', '127.0.0.1', '1457321584');

-- ----------------------------
-- Table structure for `zxjy_myblackerlist`
-- ----------------------------
DROP TABLE IF EXISTS `zxjy_myblackerlist`;
CREATE TABLE `zxjy_myblackerlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `userid` int(11) DEFAULT NULL COMMENT '我的id',
  `blackerusername` varchar(255) DEFAULT NULL COMMENT '被拉黑者用户名',
  `reason` varchar(1000) DEFAULT NULL COMMENT '拉黑原因',
  `time` int(11) DEFAULT NULL COMMENT '添加黑名单时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zxjy_myblackerlist
-- ----------------------------
INSERT INTO `zxjy_myblackerlist` VALUES ('3', '303', 'zyg1988', '不喜欢', '1455865684');
INSERT INTO `zxjy_myblackerlist` VALUES ('4', '13', 'zsb1990', '接任务不认真', '1456743305');

-- ----------------------------
-- Table structure for `zxjy_recordlist`
-- ----------------------------
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
) ENGINE=MyISAM AUTO_INCREMENT=416 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zxjy_recordlist
-- ----------------------------
INSERT INTO `zxjy_recordlist` VALUES ('360', '13', '1', '10', '1454225359', '0', null, null, null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('361', '303', '6', '2', '1454225359', '0', '311', null, null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('362', '13', '3', '45', '1454225467', '1', null, null, null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('363', '13', '4', '2', '1454225467', '1', null, null, null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('364', '303', '5', '45', '1454225588', '0', '314', null, null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('365', '303', '6', '2', '1454225588', '0', '314', null, null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('366', '13', '3', '100', '1454225766', '1', null, null, null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('367', '13', '4', '21.7', '1454225766', '1', null, null, null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('368', '303', '5', '100', '1454225897', '0', '315', null, null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('369', '303', '6', '21.7', '1454225897', '0', '315', null, null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('370', '13', '7', '4.3', '1454248551', '0', null, '10', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('371', '13', '7', '8.6', '1454249328', '0', null, '20', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('372', '13', '7', '4.3', '1454340443', '0', null, '10', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('373', '13', '7', '4.3', '1454340774', '0', null, '10', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('374', '13', '7', '4.3', '1454466828', '0', null, '10', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('375', '13', '8', '10', '1454497373', '0', null, '0', '9', '2');
INSERT INTO `zxjy_recordlist` VALUES ('376', '13', '8', '5.8', '1454497626', '0', null, '0', '9', '2');
INSERT INTO `zxjy_recordlist` VALUES ('377', '13', '8', '10', '1454504266', '0', null, '0', '7', '2');
INSERT INTO `zxjy_recordlist` VALUES ('378', '13', '8', '15', '1454506809', '0', null, '0', '9', '2');
INSERT INTO `zxjy_recordlist` VALUES ('379', '13', '8', '10', '1454507052', '0', null, '0', '8', '2');
INSERT INTO `zxjy_recordlist` VALUES ('380', '13', '1', '20', '1454763288', '0', null, '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('381', '13', '8', '100', '1454984532', '0', null, '0', '9', '2');
INSERT INTO `zxjy_recordlist` VALUES ('382', '13', '8', '5', '1454985057', '0', null, '0', '9', '2');
INSERT INTO `zxjy_recordlist` VALUES ('383', '13', '2', '100', '1454988795', '0', null, '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('384', '13', '2', '100', '1454988920', '0', null, '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('385', '13', '1', '20', '1454989826', '0', null, '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('386', '13', '8', '10', '1454990362', '0', null, '0', '9', '2');
INSERT INTO `zxjy_recordlist` VALUES ('387', '13', '8', '17', '1455163437', '0', null, '0', '9', '2');
INSERT INTO `zxjy_recordlist` VALUES ('388', '13', '8', '20', '1455163457', '0', null, '0', '9', '2');
INSERT INTO `zxjy_recordlist` VALUES ('389', '13', '2', '10', '1455164130', '0', null, '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('390', '13', '9', '0.3', '1455595988', '0', '312', '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('391', '13', '9', '1', '1455596117', '0', '312', '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('392', '13', '9', '1', '1455596178', '0', '312', '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('393', '13', '3', '28', '1455686573', '0', null, '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('394', '13', '3', '28', '1455686608', '0', null, '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('395', '13', '3', '28', '1455686613', '0', null, '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('396', '13', '3', '28', '1455686619', '0', null, '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('397', '13', '3', '368', '1455687482', '0', null, '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('398', '13', '11', '300', '1455765420', '0', null, '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('399', '303', '5', '10', '1455863410', '0', '312', '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('400', '303', '6', '4.3', '1455863410', '0', '312', '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('401', '303', '5', '10', '1455868737', '0', '310', '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('402', '303', '6', '2', '1455868737', '0', '310', '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('403', '303', '5', '900', '1455946574', '0', '309', '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('404', '303', '6', '8', '1455946574', '0', '309', '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('405', '13', '8', '1', '1456136649', '0', null, '0', '9', '2');
INSERT INTO `zxjy_recordlist` VALUES ('406', '13', '8', '2', '1456136655', '0', null, '0', '9', '2');
INSERT INTO `zxjy_recordlist` VALUES ('407', '13', '3', '100', '1456395368', '1', null, '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('408', '13', '4', '3', '1456395368', '1', null, '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('409', '303', '5', '100', '1456728889', '0', '278', '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('410', '303', '6', '16.3', '1456728889', '0', '278', '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('413', '303', '5', '100', '1456731406', '0', '316', '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('414', '303', '6', '3', '1456731406', '0', '316', '0', null, '1');
INSERT INTO `zxjy_recordlist` VALUES ('415', '303', '11', '300', '1456734637', '0', null, '0', null, '1');

-- ----------------------------
-- Table structure for `zxjy_translateactionid`
-- ----------------------------
DROP TABLE IF EXISTS `zxjy_translateactionid`;
CREATE TABLE `zxjy_translateactionid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `actionid` varchar(100) NOT NULL,
  `actionidChinaese` varchar(100) NOT NULL,
  `controllerid` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zxjy_translateactionid
-- ----------------------------
INSERT INTO `zxjy_translateactionid` VALUES ('1', 'Aclmanager', '用户组管理中心', 'Acl');
INSERT INTO `zxjy_translateactionid` VALUES ('2', 'Acltranslate', '用户权限翻译管理', 'Acl');
INSERT INTO `zxjy_translateactionid` VALUES ('3', 'Passfail', '权限不足提示信息', 'Acl');
INSERT INTO `zxjy_translateactionid` VALUES ('4', 'Translatecontroller', '控制器翻译管理', 'Acl');
INSERT INTO `zxjy_translateactionid` VALUES ('5', 'Translateaction', '控制器方法翻译管理', 'Acl');
INSERT INTO `zxjy_translateactionid` VALUES ('6', 'Create', '添加新的讲师', 'Techer');
INSERT INTO `zxjy_translateactionid` VALUES ('7', 'Create', '添加新的软件', 'Soft');
INSERT INTO `zxjy_translateactionid` VALUES ('8', 'Create', '添加新的课程价格', 'Shopprice');
INSERT INTO `zxjy_translateactionid` VALUES ('9', 'Index', '课程价格列表查看', 'Shopprice');
INSERT INTO `zxjy_translateactionid` VALUES ('10', 'Admin', '课程价格列表查看', 'Shopprice');
INSERT INTO `zxjy_translateactionid` VALUES ('11', 'Index', '软件列表查看', 'Soft');
INSERT INTO `zxjy_translateactionid` VALUES ('12', 'Admin', '软件列表查看', 'Soft');
INSERT INTO `zxjy_translateactionid` VALUES ('13', 'Index', '讲师列表查看', 'Techer');
INSERT INTO `zxjy_translateactionid` VALUES ('14', 'Admin', '讲师列表查看', 'Techer');
INSERT INTO `zxjy_translateactionid` VALUES ('15', 'Articlecatalog', '文档分类列表查看', 'Article');
INSERT INTO `zxjy_translateactionid` VALUES ('16', 'ArticleCatlogAdd', '添加文档分类', 'Article');
INSERT INTO `zxjy_translateactionid` VALUES ('17', 'ArticleCatlogAddMore', '批量添加文档分类', 'Article');
INSERT INTO `zxjy_translateactionid` VALUES ('18', 'ArticleCatlogDel', '删除文档分类', 'Article');
INSERT INTO `zxjy_translateactionid` VALUES ('19', 'ArticleCatlogChangeInfo', '修改文档分类名称', 'Article');
INSERT INTO `zxjy_translateactionid` VALUES ('20', 'ArticleCatlogAddSonType', '添加文档子分类', 'Article');
INSERT INTO `zxjy_translateactionid` VALUES ('21', 'ArticleAdd', '添加文档', 'Article');
INSERT INTO `zxjy_translateactionid` VALUES ('22', 'ArticleList', '文档列表查看', 'Article');
INSERT INTO `zxjy_translateactionid` VALUES ('23', 'ArticleEdit', '修改文档', 'Article');
INSERT INTO `zxjy_translateactionid` VALUES ('24', 'ArticleDyAdd', '添加单页文档', 'Article');
INSERT INTO `zxjy_translateactionid` VALUES ('25', 'ArticleDyEdit', '修改单面文档', 'Article');
INSERT INTO `zxjy_translateactionid` VALUES ('26', 'ArticleReserver', '删除文档放入回收站', 'Article');
INSERT INTO `zxjy_translateactionid` VALUES ('27', 'ArticleReserverList', '回收站文档列表', 'Article');
INSERT INTO `zxjy_translateactionid` VALUES ('28', 'ArticleReserverDel', '在回收站中删除文档', 'Article');
INSERT INTO `zxjy_translateactionid` VALUES ('29', 'ArticleDelBack', '在回收站中还原文档', 'Article');
INSERT INTO `zxjy_translateactionid` VALUES ('30', 'Index', '后台首页欢迎界面', 'Default');
INSERT INTO `zxjy_translateactionid` VALUES ('31', 'Error', '页面不存在提示信息', 'Default');
INSERT INTO `zxjy_translateactionid` VALUES ('32', 'Loginout', '注销系统', 'Default');
INSERT INTO `zxjy_translateactionid` VALUES ('33', 'Menu', '左侧工具栏显示', 'Leftmenu');
INSERT INTO `zxjy_translateactionid` VALUES ('34', 'Shopcatalog', '课程分类', 'Shop');
INSERT INTO `zxjy_translateactionid` VALUES ('35', 'ShopCatlogAdd', '添加课程分类', 'Shop');
INSERT INTO `zxjy_translateactionid` VALUES ('36', 'ShopCatlogAddMore', '批量添加课程分类', 'Shop');
INSERT INTO `zxjy_translateactionid` VALUES ('37', 'ShopCatlogDel', '删除课程分类', 'Shop');
INSERT INTO `zxjy_translateactionid` VALUES ('38', 'ShopCatlogChangeInfo', '修改课程分类名称', 'Shop');
INSERT INTO `zxjy_translateactionid` VALUES ('39', 'ShopCatlogAddSonType', '添加课程子分类', 'Shop');
INSERT INTO `zxjy_translateactionid` VALUES ('40', 'ShopGoodsAdd', '添加课程', 'Shop');
INSERT INTO `zxjy_translateactionid` VALUES ('41', 'ShopGoodsList', '课程列表查看', 'Shop');
INSERT INTO `zxjy_translateactionid` VALUES ('42', 'ChangeOnSale', '修改上回状态', 'Shop');
INSERT INTO `zxjy_translateactionid` VALUES ('43', 'ShopGoodsEdit', '修改课程', 'Shop');
INSERT INTO `zxjy_translateactionid` VALUES ('44', 'ShopGoodsReserver', '删除课程放入回收站', 'Shop');
INSERT INTO `zxjy_translateactionid` VALUES ('45', 'ShopGoodsReserverList', '课程回收站列表', 'Shop');
INSERT INTO `zxjy_translateactionid` VALUES ('46', 'ShopGoodsReserverDel', '在回收站中删除课程', 'Shop');
INSERT INTO `zxjy_translateactionid` VALUES ('47', 'ShopGoodsDelBack', '在回收站中还原课程', 'Shop');
INSERT INTO `zxjy_translateactionid` VALUES ('56', 'Managerinfochange', '管理员信息修改', 'Acl');
INSERT INTO `zxjy_translateactionid` VALUES ('50', 'Addaclgroup', '添加用户组', 'Acl');
INSERT INTO `zxjy_translateactionid` VALUES ('51', 'Aclgrouplist', '用户组列表查看', 'Acl');
INSERT INTO `zxjy_translateactionid` VALUES ('52', 'Aclgroupeditpower', '修改用户组权限', 'Acl');
INSERT INTO `zxjy_translateactionid` VALUES ('55', 'Managerlist', '管理员列表', 'Acl');
INSERT INTO `zxjy_translateactionid` VALUES ('57', 'Managerdelete', '删除管理员', 'Acl');
INSERT INTO `zxjy_translateactionid` VALUES ('58', 'Manageradd', '添加管理员', 'Acl');
INSERT INTO `zxjy_translateactionid` VALUES ('59', 'Designcatalog', '设计作品分类列表', 'Design');
INSERT INTO `zxjy_translateactionid` VALUES ('60', 'DesignCatlogAdd', '添加设计分类', 'Design');
INSERT INTO `zxjy_translateactionid` VALUES ('61', 'DesignCatlogAddMore', '批量添加设计分类', 'Design');
INSERT INTO `zxjy_translateactionid` VALUES ('62', 'DesignCatlogDel', '删除设计分类', 'Design');
INSERT INTO `zxjy_translateactionid` VALUES ('63', 'DesignCatlogChangeInfo', '修改设计分类名称', 'Design');
INSERT INTO `zxjy_translateactionid` VALUES ('64', 'DesignCatlogAddSonType', '添加设计子分类', 'Design');
INSERT INTO `zxjy_translateactionid` VALUES ('65', 'DesignList', '作品列表', 'Design');
INSERT INTO `zxjy_translateactionid` VALUES ('66', 'DesignAdd', '添加作品', 'Design');
INSERT INTO `zxjy_translateactionid` VALUES ('67', 'DesignEdit', '作品信息修改', 'Design');
INSERT INTO `zxjy_translateactionid` VALUES ('68', 'DesignReserver', '删除作品到回收站', 'Design');
INSERT INTO `zxjy_translateactionid` VALUES ('69', 'DesignReserverList', '作品回收站列表', 'Design');
INSERT INTO `zxjy_translateactionid` VALUES ('70', 'DesignReserverDel', '作品在回收站中删除', 'Design');
INSERT INTO `zxjy_translateactionid` VALUES ('71', 'DesignDelBack', '还原作品', 'Design');
INSERT INTO `zxjy_translateactionid` VALUES ('72', 'Webeffectscatalog', '网页特效分类', 'Webeffects');
INSERT INTO `zxjy_translateactionid` VALUES ('73', 'WebeffectsCatlogAdd', '添加特效分类', 'Webeffects');
INSERT INTO `zxjy_translateactionid` VALUES ('74', 'WebeffectsCatlogAddMore', '批量添加特效分类', 'Webeffects');
INSERT INTO `zxjy_translateactionid` VALUES ('75', 'WebeffectsCatlogDel', '删除特效分类', 'Webeffects');
INSERT INTO `zxjy_translateactionid` VALUES ('76', 'WebeffectsCatlogChangeInfo', '修改特效分类名称', 'Webeffects');
INSERT INTO `zxjy_translateactionid` VALUES ('77', 'WebeffectsCatlogAddSonType', '添加特效子分类', 'Webeffects');
INSERT INTO `zxjy_translateactionid` VALUES ('78', 'webeffectsAdd', '添加特效', 'Webeffects');
INSERT INTO `zxjy_translateactionid` VALUES ('79', 'webeffectsList', '特效列表', 'Webeffects');
INSERT INTO `zxjy_translateactionid` VALUES ('80', 'webeffectsEdit', '修改特效信息', 'Webeffects');
INSERT INTO `zxjy_translateactionid` VALUES ('81', 'webeffectsReserver', '删除特效到回收站', 'Webeffects');
INSERT INTO `zxjy_translateactionid` VALUES ('82', 'webeffectsReserverList', '回收站特效列表', 'Webeffects');
INSERT INTO `zxjy_translateactionid` VALUES ('83', 'webeffectsReserverDel', '回收站中删除特效', 'Webeffects');
INSERT INTO `zxjy_translateactionid` VALUES ('84', 'webeffectsDelBack', '还原特效', 'Webeffects');
INSERT INTO `zxjy_translateactionid` VALUES ('85', 'Moneylist', '充值列表', 'Moneyman');
INSERT INTO `zxjy_translateactionid` VALUES ('86', 'MoneyStatue', '审核', 'Moneyman');
INSERT INTO `zxjy_translateactionid` VALUES ('87', 'Txlist', '提现列表', 'Moneyman');
INSERT INTO `zxjy_translateactionid` VALUES ('88', 'BankDo', '确认打款', 'Moneyman');
INSERT INTO `zxjy_translateactionid` VALUES ('89', 'PersonRealName', '个人审核', 'Realname');
INSERT INTO `zxjy_translateactionid` VALUES ('90', 'CompanyRealName', '公司审核', 'Realname');
INSERT INTO `zxjy_translateactionid` VALUES ('91', 'Memberlist', '会员列表查看', 'Membercenter');
INSERT INTO `zxjy_translateactionid` VALUES ('92', 'Stopaccount', '冻结帐号', 'Membercenter');
INSERT INTO `zxjy_translateactionid` VALUES ('93', 'Startaccount', '解冻帐号', 'Membercenter');
INSERT INTO `zxjy_translateactionid` VALUES ('94', 'MembeDetailInfos', '会员个人信息查看', 'Membercenter');
INSERT INTO `zxjy_translateactionid` VALUES ('95', 'ChangPassword', '修改会员密码', 'Membercenter');
INSERT INTO `zxjy_translateactionid` VALUES ('96', 'GivePay', '手动充值', 'Membercenter');
INSERT INTO `zxjy_translateactionid` VALUES ('97', 'PersonRealName', '', 'Membercenter');
INSERT INTO `zxjy_translateactionid` VALUES ('98', 'Exam', '考试系统管理', 'System');
INSERT INTO `zxjy_translateactionid` VALUES ('99', 'Blackaccount', '黑名单管理', 'System');
INSERT INTO `zxjy_translateactionid` VALUES ('100', 'Tasklist', '任务列表', 'Taskcenter');
INSERT INTO `zxjy_translateactionid` VALUES ('101', 'ExamDel', '删除考题', 'System');

-- ----------------------------
-- Table structure for `zxjy_translatecontrollerid`
-- ----------------------------
DROP TABLE IF EXISTS `zxjy_translatecontrollerid`;
CREATE TABLE `zxjy_translatecontrollerid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controllerid` varchar(100) NOT NULL,
  `controlleridChinaese` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zxjy_translatecontrollerid
-- ----------------------------
INSERT INTO `zxjy_translatecontrollerid` VALUES ('1', 'Acl', '用户权限控制中心');
INSERT INTO `zxjy_translatecontrollerid` VALUES ('2', 'Article', '文档管理管中');
INSERT INTO `zxjy_translatecontrollerid` VALUES ('3', 'Ask', '问答管理系统');
INSERT INTO `zxjy_translatecontrollerid` VALUES ('4', 'Default', '后台首页系统');
INSERT INTO `zxjy_translatecontrollerid` VALUES ('5', 'Leftmenu', '左侧工具栏');
INSERT INTO `zxjy_translatecontrollerid` VALUES ('6', 'Shop', '课程管理系统');
INSERT INTO `zxjy_translatecontrollerid` VALUES ('7', 'Shopprice', '课程价格管理系统');
INSERT INTO `zxjy_translatecontrollerid` VALUES ('8', 'Soft', '常用软件管理系统');
INSERT INTO `zxjy_translatecontrollerid` VALUES ('9', 'Techer', '讲师团队管理系统');
INSERT INTO `zxjy_translatecontrollerid` VALUES ('10', 'Design', '设计路上管理中心');
INSERT INTO `zxjy_translatecontrollerid` VALUES ('11', 'Webeffects', '网页特效管理中心');
INSERT INTO `zxjy_translatecontrollerid` VALUES ('12', 'Realname', '真实性审核');
INSERT INTO `zxjy_translatecontrollerid` VALUES ('13', 'Moneyman', '会员充值、提现');
INSERT INTO `zxjy_translatecontrollerid` VALUES ('14', 'Membercenter', '会员管理中心');
INSERT INTO `zxjy_translatecontrollerid` VALUES ('15', 'System', '平台配置');
INSERT INTO `zxjy_translatecontrollerid` VALUES ('16', 'Taskcenter', '任务中心');

-- ----------------------------
-- Table structure for `zxjy_user`
-- ----------------------------
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=307 DEFAULT CHARSET=utf8 COMMENT='用户总表';

-- ----------------------------
-- Records of zxjy_user
-- ----------------------------
INSERT INTO `zxjy_user` VALUES ('13', 'zyg1988', '21232f297a57a5a743894a0e4a801fc3', null, '/images/image/20160201/20160201092115_72385.jpg', '753104948@qq.com', '0', '753104948', '8710.7', '215', '3', '1455687482', '1486791482', '1', '1455765420', '300', '0', '104', '18221791657', '1', null, null, '张玉贡', '1', null, '139.227.230.157', '1417679499', null, null, '0', '0', '0192023a7bbd73250516f069df18b500', '1', '1');
INSERT INTO `zxjy_user` VALUES ('303', 'zsb1990', 'e10adc3949ba59abbe56e057f20f883e', null, '', '16123983466@qq.com', '0', '591276051', '975', '59.3', '0', null, null, '1', '1456734637', '300', '0', '4', '13162731331', '1', null, null, '张绍波', '1', null, '127.0.0.1', '1453574146', null, null, '1', '0', '0192023a7bbd73250516f069df18b500', '1', '1');
INSERT INTO `zxjy_user` VALUES ('305', 'zxm1980', '0192023a7bbd73250516f069df18b500', null, '', '753104980@qq.com', '0', '753104980', '0', '0', '0', null, null, '0', null, '0', '0', '0', '13153789829', '0', null, null, null, '1', null, '127.0.0.1', '1455699716', null, null, '0', '0', '', '0', '0');
INSERT INTO `zxjy_user` VALUES ('306', 'zyg1990', '0192023a7bbd73250516f069df18b500', null, '', '15102119878@qq.com', '0', '15102119878', '20', '0', '0', null, null, '0', null, '0', '0', '0', '15102119878', '0', null, null, null, '1', null, '127.0.0.1', '1455699994', null, null, '1', '0', '', '0', '0');

-- ----------------------------
-- Table structure for `zxjy_user_lv`
-- ----------------------------
DROP TABLE IF EXISTS `zxjy_user_lv`;
CREATE TABLE `zxjy_user_lv` (
  `UserId` int(10) DEFAULT NULL COMMENT '关联UserID',
  `UserLv` int(10) NOT NULL DEFAULT '0' COMMENT '用户等级',
  `UserExp` int(13) NOT NULL DEFAULT '0' COMMENT '用户经验',
  `SignInTime` int(13) DEFAULT '0' COMMENT '上次签到时间',
  `SignInNum` int(4) NOT NULL DEFAULT '0' COMMENT '签到次数'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户等级经验表';

-- ----------------------------
-- Records of zxjy_user_lv
-- ----------------------------
