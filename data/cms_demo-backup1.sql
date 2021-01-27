-- MySQL dump 10.13  Distrib 5.7.26, for Win64 (x86_64)
--
-- Host: localhost    Database: cms_demo
-- ------------------------------------------------------
-- Server version	5.7.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `cms_demo`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `cms_demo` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `cms_demo`;

--
-- Table structure for table `cd_archives`
--

DROP TABLE IF EXISTS `cd_archives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd_archives` (
  `aid` int(10) NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `typeid` int(10) NOT NULL DEFAULT '0' COMMENT '所属栏目id',
  `title` varchar(200) DEFAULT '' COMMENT '标题',
  `description` varchar(200) DEFAULT '' COMMENT '描述',
  `keywords` varchar(200) DEFAULT '' COMMENT '关键字',
  `author` int(10) DEFAULT '0' COMMENT '作者id即uid',
  `litpic` varchar(250) DEFAULT '' COMMENT '缩略图url',
  `is_recom` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否推荐,1是,0否',
  `is_del` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否删除,1是,0否',
  `is_hidden` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否隐藏,1是,0否',
  `sort_order` int(10) DEFAULT '0' COMMENT '文章顺序',
  `add_time` int(10) DEFAULT '0' COMMENT '新增时间',
  `update_time` int(10) DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`aid`),
  KEY `aid` (`typeid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COMMENT='文章主表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cd_archives`
--

LOCK TABLES `cd_archives` WRITE;
/*!40000 ALTER TABLE `cd_archives` DISABLE KEYS */;
INSERT INTO `cd_archives` VALUES (1,1,'小猪短租完成近3亿美元融资 发力安全与智能服务','10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。','关键词,小猪,一网打尽',1,'https://tianwe.net/uploads/allimg/181011/0S9395160-0.png',0,0,0,0,1611692233,1611692233),(2,2,'小猪短租完成近3亿美元融资 发力安全与智能服务','10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。','关键词,小猪,一网打尽',2,'https://tianwe.net/uploads/allimg/181011/0S9395160-0.png',0,0,0,0,1611692133,1611692133),(3,1,'小猪短租完成近3亿美元融资 发力安全与智能服务','10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。','关键词,小猪,一网打尽',1,'https://tianwe.net/uploads/allimg/181011/0S9395160-0.png',0,0,0,0,1611692133,1611692133),(4,1,'小猪短租完成近3亿美元融资 发力安全与智能服务','10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。','关键词,小猪,一网打尽',1,'https://tianwe.net/uploads/allimg/181011/0S9395160-0.png',0,0,0,0,1611692233,1611692233),(5,2,'小猪短租完成近3亿美元融资 发力安全与智能服务','10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。','关键词,小猪,一网打尽',2,'https://tianwe.net/uploads/allimg/181011/0S9395160-0.png',0,0,0,0,1611692133,1611692133),(6,1,'小猪短租完成近3亿美元融资 发力安全与智能服务','10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。','关键词,小猪,一网打尽',1,'https://tianwe.net/uploads/allimg/181011/0S9395160-0.png',0,0,0,0,1611692233,1611692233),(7,2,'小猪短租完成近3亿美元融资 发力安全与智能服务','10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。','关键词,小猪,一网打尽',2,'https://tianwe.net/uploads/allimg/181011/0S9395160-0.png',0,0,0,0,1611692133,1611692133),(8,1,'小猪短租完成近3亿美元融资 发力安全与智能服务','10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。','关键词,小猪,一网打尽',1,'https://tianwe.net/uploads/allimg/181011/0S9395160-0.png',0,0,0,0,1611692133,1611692133),(9,1,'小猪短租完成近3亿美元融资 发力安全与智能服务','10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。','关键词,小猪,一网打尽',1,'https://tianwe.net/uploads/allimg/181011/0S9395160-0.png',0,0,0,0,1611692233,1611692233),(10,2,'小猪短租完成近3亿美元融资 发力安全与智能服务','10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。','关键词,小猪,一网打尽',2,'https://tianwe.net/uploads/allimg/181011/0S9395160-0.png',0,0,0,0,1611692133,1611692133),(11,1,'小猪短租完成近3亿美元融资 发力安全与智能服务','10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。','关键词,小猪,一网打尽',1,'https://tianwe.net/uploads/allimg/181011/0S9395160-0.png',0,0,0,0,1611692233,1611692233),(12,2,'小猪短租完成近3亿美元融资 发力安全与智能服务','10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。','关键词,小猪,一网打尽',2,'https://tianwe.net/uploads/allimg/181011/0S9395160-0.png',0,0,0,0,1611692133,1611692133),(13,1,'小猪短租完成近3亿美元融资 发力安全与智能服务','10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。','关键词,小猪,一网打尽',1,'https://tianwe.net/uploads/allimg/181011/0S9395160-0.png',0,0,0,0,1611692133,1611692133),(14,1,'小猪短租完成近3亿美元融资 发力安全与智能服务','10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。','关键词,小猪,一网打尽',1,'https://tianwe.net/uploads/allimg/181011/0S9395160-0.png',0,0,0,0,1611692233,1611692233),(15,2,'小猪短租完成近3亿美元融资 发力安全与智能服务','10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。','关键词,小猪,一网打尽',2,'https://tianwe.net/uploads/allimg/181011/0S9395160-0.png',0,0,0,0,1611692133,1611692133),(16,1,'小猪短租完成近3亿美元融资 发力安全与智能服务','10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。','关键词,小猪,一网打尽',1,'https://tianwe.net/uploads/allimg/181011/0S9395160-0.png',0,0,0,0,1611692233,1611692233),(17,2,'小猪短租完成近3亿美元融资 发力安全与智能服务','10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。','关键词,小猪,一网打尽',2,'https://tianwe.net/uploads/allimg/181011/0S9395160-0.png',0,0,0,0,1611692133,1611692133),(18,1,'小猪短租完成近3亿美元融资 发力安全与智能服务','10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。','关键词,小猪,一网打尽',1,'https://tianwe.net/uploads/allimg/181011/0S9395160-0.png',0,0,0,0,1611692133,1611692133),(19,1,'小猪短租完成近3亿美元融资 发力安全与智能服务','10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。','关键词,小猪,一网打尽',1,'https://tianwe.net/uploads/allimg/181011/0S9395160-0.png',0,0,0,0,1611692233,1611692233),(20,2,'小猪短租完成近3亿美元融资 发力安全与智能服务','10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。','关键词,小猪,一网打尽',2,'https://tianwe.net/uploads/allimg/181011/0S9395160-0.png',0,0,0,0,1611692133,1611692133);
/*!40000 ALTER TABLE `cd_archives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cd_arctype`
--

DROP TABLE IF EXISTS `cd_arctype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd_arctype` (
  `typeid` int(10) NOT NULL AUTO_INCREMENT COMMENT '栏目id',
  `typename` varchar(50) DEFAULT '' COMMENT '栏目名称',
  `path` varchar(50) DEFAULT '' COMMENT '栏目路径,只可为英文,且保持唯一',
  `title` varchar(200) DEFAULT '' COMMENT '标题',
  `description` varchar(200) DEFAULT '' COMMENT '描述',
  `keywords` varchar(200) DEFAULT '' COMMENT '关键字',
  `litpic` varchar(250) DEFAULT '' COMMENT '缩略图url',
  `sort_order` int(10) DEFAULT '0' COMMENT '栏目顺序',
  `is_del` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否删除,1是,0否',
  `is_hidden` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否隐藏,1是,0否',
  PRIMARY KEY (`typeid`),
  UNIQUE KEY `path` (`path`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COMMENT='栏目表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cd_arctype`
--

LOCK TABLES `cd_arctype` WRITE;
/*!40000 ALTER TABLE `cd_arctype` DISABLE KEYS */;
INSERT INTO `cd_arctype` VALUES (1,'娱乐资讯','yulezixun','娱乐资讯一网打尽','描述娱乐资讯一网打尽娱乐资讯一网打尽','关键词,娱乐资讯,一网打尽','https://img.0736tw.com/uploads/allimg/20210107/1-21010G40G1X6.jpg',0,0,0),(2,'行业新闻','hangyexinwen','关注行业动态,看每日行业新闻','关注行业动态,看每日行业新闻关注行业动态,看每日行业新闻','关键词,行业,动态','https://img.0736tw.com/uploads/allimg/20210107/1-21010G40G1X6.jpg',0,0,0);
/*!40000 ALTER TABLE `cd_arctype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cd_article_content`
--

DROP TABLE IF EXISTS `cd_article_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd_article_content` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '逻辑主键',
  `aid` int(10) NOT NULL DEFAULT '0' COMMENT '文章aid',
  `content` longtext COMMENT '文章内容',
  PRIMARY KEY (`id`),
  KEY `conid` (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COMMENT='文章从表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cd_article_content`
--

LOCK TABLES `cd_article_content` WRITE;
/*!40000 ALTER TABLE `cd_article_content` DISABLE KEYS */;
INSERT INTO `cd_article_content` VALUES (1,1,'<p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";\"=\"\">	10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。泰合资本继续担任公司融资的独家财务顾问。小猪联合创始人兼CEO 陈驰表示，未来将加大安全体系和服务生态的投入。</p><p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";=\"\" text-align:=\"\" center;\"=\"\"><img title=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" alt=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" src=\"/uploads/allimg/181011/0S9395160-0.png\" style=\"max-width:100%!important;height:auto!important;border: none; vertical-align: top; max-width: 100%; margin: 40px 0px; width: 550px; height: 365px;\"></p>'),(2,2,'<p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";\"=\"\">	10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。泰合资本继续担任公司融资的独家财务顾问。小猪联合创始人兼CEO 陈驰表示，未来将加大安全体系和服务生态的投入。</p><p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";=\"\" text-align:=\"\" center;\"=\"\"><img title=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" alt=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" src=\"/uploads/allimg/181011/0S9395160-0.png\" style=\"max-width:100%!important;height:auto!important;border: none; vertical-align: top; max-width: 100%; margin: 40px 0px; width: 550px; height: 365px;\"></p>'),(3,3,'<p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";\"=\"\">	10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。泰合资本继续担任公司融资的独家财务顾问。小猪联合创始人兼CEO 陈驰表示，未来将加大安全体系和服务生态的投入。</p><p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";=\"\" text-align:=\"\" center;\"=\"\"><img title=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" alt=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" src=\"/uploads/allimg/181011/0S9395160-0.png\" style=\"max-width:100%!important;height:auto!important;border: none; vertical-align: top; max-width: 100%; margin: 40px 0px; width: 550px; height: 365px;\"></p>'),(4,4,'<p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";\"=\"\">	10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。泰合资本继续担任公司融资的独家财务顾问。小猪联合创始人兼CEO 陈驰表示，未来将加大安全体系和服务生态的投入。</p><p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";=\"\" text-align:=\"\" center;\"=\"\"><img title=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" alt=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" src=\"/uploads/allimg/181011/0S9395160-0.png\" style=\"max-width:100%!important;height:auto!important;border: none; vertical-align: top; max-width: 100%; margin: 40px 0px; width: 550px; height: 365px;\"></p>'),(5,5,'<p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";\"=\"\">	10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。泰合资本继续担任公司融资的独家财务顾问。小猪联合创始人兼CEO 陈驰表示，未来将加大安全体系和服务生态的投入。</p><p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";=\"\" text-align:=\"\" center;\"=\"\"><img title=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" alt=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" src=\"/uploads/allimg/181011/0S9395160-0.png\" style=\"max-width:100%!important;height:auto!important;border: none; vertical-align: top; max-width: 100%; margin: 40px 0px; width: 550px; height: 365px;\"></p>'),(6,6,'<p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";\"=\"\">	10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。泰合资本继续担任公司融资的独家财务顾问。小猪联合创始人兼CEO 陈驰表示，未来将加大安全体系和服务生态的投入。</p><p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";=\"\" text-align:=\"\" center;\"=\"\"><img title=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" alt=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" src=\"/uploads/allimg/181011/0S9395160-0.png\" style=\"max-width:100%!important;height:auto!important;border: none; vertical-align: top; max-width: 100%; margin: 40px 0px; width: 550px; height: 365px;\"></p>'),(7,7,'<p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";\"=\"\">	10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。泰合资本继续担任公司融资的独家财务顾问。小猪联合创始人兼CEO 陈驰表示，未来将加大安全体系和服务生态的投入。</p><p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";=\"\" text-align:=\"\" center;\"=\"\"><img title=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" alt=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" src=\"/uploads/allimg/181011/0S9395160-0.png\" style=\"max-width:100%!important;height:auto!important;border: none; vertical-align: top; max-width: 100%; margin: 40px 0px; width: 550px; height: 365px;\"></p>'),(8,8,'<p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";\"=\"\">	10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。泰合资本继续担任公司融资的独家财务顾问。小猪联合创始人兼CEO 陈驰表示，未来将加大安全体系和服务生态的投入。</p><p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";=\"\" text-align:=\"\" center;\"=\"\"><img title=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" alt=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" src=\"/uploads/allimg/181011/0S9395160-0.png\" style=\"max-width:100%!important;height:auto!important;border: none; vertical-align: top; max-width: 100%; margin: 40px 0px; width: 550px; height: 365px;\"></p>'),(9,9,'<p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";\"=\"\">	10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。泰合资本继续担任公司融资的独家财务顾问。小猪联合创始人兼CEO 陈驰表示，未来将加大安全体系和服务生态的投入。</p><p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";=\"\" text-align:=\"\" center;\"=\"\"><img title=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" alt=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" src=\"/uploads/allimg/181011/0S9395160-0.png\" style=\"max-width:100%!important;height:auto!important;border: none; vertical-align: top; max-width: 100%; margin: 40px 0px; width: 550px; height: 365px;\"></p>'),(10,10,'<p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";\"=\"\">	10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。泰合资本继续担任公司融资的独家财务顾问。小猪联合创始人兼CEO 陈驰表示，未来将加大安全体系和服务生态的投入。</p><p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";=\"\" text-align:=\"\" center;\"=\"\"><img title=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" alt=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" src=\"/uploads/allimg/181011/0S9395160-0.png\" style=\"max-width:100%!important;height:auto!important;border: none; vertical-align: top; max-width: 100%; margin: 40px 0px; width: 550px; height: 365px;\"></p>'),(11,11,'<p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";\"=\"\">	10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。泰合资本继续担任公司融资的独家财务顾问。小猪联合创始人兼CEO 陈驰表示，未来将加大安全体系和服务生态的投入。</p><p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";=\"\" text-align:=\"\" center;\"=\"\"><img title=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" alt=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" src=\"/uploads/allimg/181011/0S9395160-0.png\" style=\"max-width:100%!important;height:auto!important;border: none; vertical-align: top; max-width: 100%; margin: 40px 0px; width: 550px; height: 365px;\"></p>'),(12,12,'<p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";\"=\"\">	10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。泰合资本继续担任公司融资的独家财务顾问。小猪联合创始人兼CEO 陈驰表示，未来将加大安全体系和服务生态的投入。</p><p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";=\"\" text-align:=\"\" center;\"=\"\"><img title=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" alt=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" src=\"/uploads/allimg/181011/0S9395160-0.png\" style=\"max-width:100%!important;height:auto!important;border: none; vertical-align: top; max-width: 100%; margin: 40px 0px; width: 550px; height: 365px;\"></p>'),(13,13,'<p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";\"=\"\">	10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。泰合资本继续担任公司融资的独家财务顾问。小猪联合创始人兼CEO 陈驰表示，未来将加大安全体系和服务生态的投入。</p><p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";=\"\" text-align:=\"\" center;\"=\"\"><img title=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" alt=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" src=\"/uploads/allimg/181011/0S9395160-0.png\" style=\"max-width:100%!important;height:auto!important;border: none; vertical-align: top; max-width: 100%; margin: 40px 0px; width: 550px; height: 365px;\"></p>'),(14,14,'<p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";\"=\"\">	10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。泰合资本继续担任公司融资的独家财务顾问。小猪联合创始人兼CEO 陈驰表示，未来将加大安全体系和服务生态的投入。</p><p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";=\"\" text-align:=\"\" center;\"=\"\"><img title=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" alt=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" src=\"/uploads/allimg/181011/0S9395160-0.png\" style=\"max-width:100%!important;height:auto!important;border: none; vertical-align: top; max-width: 100%; margin: 40px 0px; width: 550px; height: 365px;\"></p>'),(15,15,'<p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";\"=\"\">	10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。泰合资本继续担任公司融资的独家财务顾问。小猪联合创始人兼CEO 陈驰表示，未来将加大安全体系和服务生态的投入。</p><p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";=\"\" text-align:=\"\" center;\"=\"\"><img title=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" alt=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" src=\"/uploads/allimg/181011/0S9395160-0.png\" style=\"max-width:100%!important;height:auto!important;border: none; vertical-align: top; max-width: 100%; margin: 40px 0px; width: 550px; height: 365px;\"></p>'),(16,16,'<p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";\"=\"\">	10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。泰合资本继续担任公司融资的独家财务顾问。小猪联合创始人兼CEO 陈驰表示，未来将加大安全体系和服务生态的投入。</p><p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";=\"\" text-align:=\"\" center;\"=\"\"><img title=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" alt=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" src=\"/uploads/allimg/181011/0S9395160-0.png\" style=\"max-width:100%!important;height:auto!important;border: none; vertical-align: top; max-width: 100%; margin: 40px 0px; width: 550px; height: 365px;\"></p>'),(17,17,'<p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";\"=\"\">	10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。泰合资本继续担任公司融资的独家财务顾问。小猪联合创始人兼CEO 陈驰表示，未来将加大安全体系和服务生态的投入。</p><p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";=\"\" text-align:=\"\" center;\"=\"\"><img title=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" alt=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" src=\"/uploads/allimg/181011/0S9395160-0.png\" style=\"max-width:100%!important;height:auto!important;border: none; vertical-align: top; max-width: 100%; margin: 40px 0px; width: 550px; height: 365px;\"></p>'),(18,18,'<p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";\"=\"\">	10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。泰合资本继续担任公司融资的独家财务顾问。小猪联合创始人兼CEO 陈驰表示，未来将加大安全体系和服务生态的投入。</p><p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";=\"\" text-align:=\"\" center;\"=\"\"><img title=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" alt=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" src=\"/uploads/allimg/181011/0S9395160-0.png\" style=\"max-width:100%!important;height:auto!important;border: none; vertical-align: top; max-width: 100%; margin: 40px 0px; width: 550px; height: 365px;\"></p>'),(19,19,'<p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";\"=\"\">	10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。泰合资本继续担任公司融资的独家财务顾问。小猪联合创始人兼CEO 陈驰表示，未来将加大安全体系和服务生态的投入。</p><p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";=\"\" text-align:=\"\" center;\"=\"\"><img title=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" alt=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" src=\"/uploads/allimg/181011/0S9395160-0.png\" style=\"max-width:100%!important;height:auto!important;border: none; vertical-align: top; max-width: 100%; margin: 40px 0px; width: 550px; height: 365px;\"></p>'),(20,20,'<p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";\"=\"\">	10月10日早间消息，住宿共享平台小猪短租于今日宣布完成新一轮近3亿美元融资。本轮融资由云锋基金、尚珹资本领投，新加坡政府投资公司(GIC)、愉悦资本、晨兴资本、今日资本跟投。泰合资本继续担任公司融资的独家财务顾问。小猪联合创始人兼CEO 陈驰表示，未来将加大安全体系和服务生态的投入。</p><p style=\"margin: 0px; padding: 0px 0px 15px; list-style: none; line-height: 36px; font-size: 16px; color: rgb(51, 51, 51); font-family: \" microsoft=\"\" yahei\";=\"\" text-align:=\"\" center;\"=\"\"><img title=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" alt=\"小猪短租完成近3亿美元融资 发力安全与智能服务(图1)\" src=\"/uploads/allimg/181011/0S9395160-0.png\" style=\"max-width:100%!important;height:auto!important;border: none; vertical-align: top; max-width: 100%; margin: 40px 0px; width: 550px; height: 365px;\"></p>');
/*!40000 ALTER TABLE `cd_article_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cd_config`
--

DROP TABLE IF EXISTS `cd_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd_config` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '逻辑主键',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '配置名',
  `value` varchar(200) DEFAULT '' COMMENT '配置值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COMMENT='配置表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cd_config`
--

LOCK TABLES `cd_config` WRITE;
/*!40000 ALTER TABLE `cd_config` DISABLE KEYS */;
INSERT INTO `cd_config` VALUES (1,'g_title','cms小demo'),(2,'g_description','我是一个cms小demo'),(3,'g_keywords','cms,php,demo'),(4,'g_logo','https://img.0736tw.com/template/pc/skin/image/logo2.png'),(5,'g_copyright','copyright 2015-2021 某某公司 版权所有'),(6,'g_recordnum','湘ICP备12345678号');
/*!40000 ALTER TABLE `cd_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cd_user`
--

DROP TABLE IF EXISTS `cd_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cd_user` (
  `uid` int(10) NOT NULL AUTO_INCREMENT COMMENT '用户uid',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '用户名,用于登录',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `pen_name` varchar(50) DEFAULT '佚名' COMMENT '笔名,用于显示作者',
  `is_del` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否删除,1是,0否',
  `is_hidden` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否隐藏,1是,0否',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COMMENT='用户表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cd_user`
--

LOCK TABLES `cd_user` WRITE;
/*!40000 ALTER TABLE `cd_user` DISABLE KEYS */;
INSERT INTO `cd_user` VALUES (1,'haha','aaaaaa','小白',0,0),(2,'eee','bbbbb','小红',0,0),(3,'cdfae','cccc','小黑',0,0);
/*!40000 ALTER TABLE `cd_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-27  5:03:11
