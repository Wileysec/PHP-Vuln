/*
 Navicat Premium Data Transfer

 Source Server         : win7
 Source Server Type    : MySQL
 Source Server Version : 50562
 Source Host           : 10.211.55.7:3306
 Source Schema         : bachang

 Target Server Type    : MySQL
 Target Server Version : 50562
 File Encoding         : 65001

 Date: 29/11/2021 19:19:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bank
-- ----------------------------
DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCard` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `money` float DEFAULT NULL,
  `comment` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of bank
-- ----------------------------
BEGIN;
INSERT INTO `bank` VALUES (1, '1001', 'xiaoming', '123123', 2175, NULL);
INSERT INTO `bank` VALUES (2, '1002', 'xiaohong', '123456', 186236, NULL);
INSERT INTO `bank` VALUES (5, '1003', 'hacker', '123456', 100, NULL);
COMMIT;

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_agent` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_user` varchar(20) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `contents` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of news
-- ----------------------------
BEGIN;
INSERT INTO `news` VALUES (1, 'admin', '央视财经', '冷冷冷！这些地方，暖气提前安排上了！有你家吗？', '（央视财经《第一时间》）近期，我国东北和西北多地气温骤降，各地供暖保障工作陆续开始，许多地区都比往年提前开始供暖。随着气温下降，目前，黑龙江全省已全部开栓供热。16日起，哈尔滨市各供热企业开栓供热，比正常供热时间提前4天。此前，哈尔滨已启动供热系统热态调试运行。受近日冷空气影响，陕西北部气温大幅下降。为保障居民温暖过冬，陕西榆林也较往年提前10天供暖。');
INSERT INTO `news` VALUES (2, 'admin', '央视网', '新闻观察：中国航天开启强国建设新征程', '央视网消息：从2003年10月15日“神五”搭载航天员杨利伟升空到如今“神十三”升空，从一人一天到三人半年，从舱内实验到太空行走，从短期停留到长期驻留，中国空间技术实现具有里程碑意义的重大跨越，开启了中国航天强国建设的新征程。中国空间站阶段第2次载人飞行任务\\n\\n据介绍，这是中国载人航天工程立项实施以来的第21次飞行任务，也是空间站阶段的第2次载人飞行任务。\\n\\n将开展出舱、实验、遥操作交会对接等工作。天和核心舱舱门开启后，中国太空漫步第一人翟志刚、中国首位“太空教师”王亚平、第一次出征太空的航天员叶光富先后顺利入驻天和，开启为期6个月的太空生活。这期间，将开展出舱、实验、遥操作交会对接等工作。');
INSERT INTO `news` VALUES (3, 'admin', '新华社', '（新华时评）从出口增速超预期，看成功控制疫情红利', '新华社北京10月16日电题：从出口增速超预期，看成功控制疫情红利\\n新华社记者于佳欣、王亚宏\\n日前出炉的三季度中国外贸“成绩单”受到国内外关注。特别是9月当月出口增速达28.1%，连续两月超出市场预期。这份引发外媒热议的“成绩单”展现出中国成功控制疫情背景下外贸的韧性与潜力。\\n海关总署发布的数据显示，中国前三季度进出口总值同比增长22.7%。自去年4月转正以来，中国出口增速今年内连续保持两位数高增长，考虑到去年下半年的高基数效应，这样的表现殊为难得。中国外贸的亮眼表现频频得到外媒和国际机构点赞。近期，美联社、法新社、路透社、《华尔街日报》等外媒就纷纷点评，巴克莱银行分析师认为，贸易数据反映了“全球对中国商品的持续需求”。有分析说，中国外贸“高光时刻”的持续时间大大超出市场预期，凸显了中国正在享受控制住疫情的红利。\\n不可否认，出口增长超预期，与全球经济复苏和国际需求回暖有关。9月当月，中国对美国、欧盟、东盟出口都大幅上涨，其中对美国出口增速尤为明显。但更要看到这一切首先得益于中国成功控制住疫情，有效统筹了疫情防控和经济发展。\\n成功控制住疫情，是有序复工复产的前提。正是由于率先控制住疫情、灵活应对、精准施策，中国出口才能得以持续增长甚至超出预期。相比之下，一些国家受疫情反复影响，人民生命安全无法得到保障，供给持续受到抑制，海外订单不断流失。疫情防控不当，反过来进一步拖累经济增长。\\n成功控制住疫情，才能更好发挥中国制造优势。正在举行的第130届广交会是疫情发生后首次恢复线下办展，近8000家企业线下参展，参展商与采购商云集，进一步凸显了疫情下世界对“中国制造”的需求与渴望。中国出口产品的竞争力也不断提升，高新技术产品和机电产品出口增长明显。《华尔街日报》评论称，在全球疫情持续蔓延下，中国“世界工厂”的地位进一步凸显。路透社援引分析人士观点，为中国突出的制造业优势和不断提升的竞争力点赞。\\n成功控制住疫情，才能更好推进一系列稳外贸政策落地。努力解决国际物流不畅、物流成本偏高问题；出台专项支持政策为市场主体和实体经济纾困解难；新认定一批外贸转型升级基地，积极培育跨境电商等外贸新业态新模式；企业努力加强创新、拓展更多贸易伙伴……一系列稳外贸政策效果持续显现，政企携手发力，为外贸持续表现强劲保驾护航。\\n新出炉外贸数据背后有喜也有忧。尽管出口增速明显，但进口增速低于预期；不少企业虽然订单暴涨，但大宗商品价格上涨对利润侵蚀不小；全球疫情依然起伏不定，疫情逐渐好转可能让“订单转移”等一次性因素慢慢消退……外贸形势依然面临严峻挑战，风险和隐忧不容忽视。\\n但经济发展要看“形”更要看“势”。中国经济有着长期向好的基本面，外贸有着巨大的韧性和潜力，扩大开放、拓展经贸“朋友圈”正迈出更大步伐……我们有理由相信，中国成功控制疫情的红利将进一步释放，外贸总体向好趋势不会改变，中国将继续为全球经济和贸易复苏作出独有贡献。');
COMMIT;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES (1, 'admin', 'hello123', '18966547859', '544544@qq.com', 'Administrator');
INSERT INTO `user` VALUES (2, 'alice', '123123', '15536984563', 'daw456@qq.com', 'Alice');
INSERT INTO `user` VALUES (3, 'xiaoming', '123123', '19956413687', '788971@qq.com', 'XiaoMing');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
