-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: cjc
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
-- Table structure for table `cjc_mtrlwid_online`
--

DROP TABLE IF EXISTS `cjc_mtrlwid_online`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cjc_mtrlwid_online` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `knp_time` datetime NOT NULL,
  `knp_ts` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `userid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_term` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `region` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `countryName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `browser` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `platform` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `referer_doamin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `referer_url` text COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1283 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cjc_mtrlwid_online`
--

LOCK TABLES `cjc_mtrlwid_online` WRITE;
/*!40000 ALTER TABLE `cjc_mtrlwid_online` DISABLE KEYS */;
INSERT INTO `cjc_mtrlwid_online` VALUES (1278,'aav72f8sdk8qe5of0coklf6t67','2017-02-07 19:28:55','1486495735','guest','1750','avent','','','','Chrome','Windows','direct','none'),(1282,'pej7p2f6ioonrt2j9nht2gort5','2017-02-07 19:29:55','1486495795','5','321','page','','','','Firefox','Windows','none','http://104.40.211.237/Cairo-Jazz-Club.wp/website/profile/');
/*!40000 ALTER TABLE `cjc_mtrlwid_online` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-24 11:37:25
