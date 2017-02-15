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
-- Table structure for table `cjc_events_users`
--

DROP TABLE IF EXISTS `cjc_events_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cjc_events_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(512) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `user_picture` varchar(2048) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `user_profile` varchar(1024) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `user_email` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `user_id` varchar(512) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `user_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cjc_events_users`
--

LOCK TABLES `cjc_events_users` WRITE;
/*!40000 ALTER TABLE `cjc_events_users` DISABLE KEYS */;
INSERT INTO `cjc_events_users` VALUES (1,'Marc Wafik William','https://scontent.xx.fbcdn.net/v/t1.0-1/c56.56.700.700/s50x50/178994_4152687979200_1558462458_n.jpg?oh=2c2f9d03bd9dc0e504f132d867e874f0&oe=5906AD74','https://www.facebook.com/app_scoped_user_id/10212284048400056/','marc.wafik@hotmail.com','10212284048400056',''),(2,'Mohammed Magdy','https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/12644895_832294850229899_7976505532329613399_n.jpg?oh=bf25ae86fb310255ef248a217d0c9169&oe=59448B11','https://www.facebook.com/app_scoped_user_id/1114074718718576/','mohammed_magdy_ali@yahoo.com','1114074718718576',''),(3,'Abdo Mamdouh Ali','https://scontent.xx.fbcdn.net/v/t1.0-1/c0.10.50.50/p50x50/15622597_1363438320373630_8769020919059326707_n.jpg?oh=11cd8b476439f2e4f63bf04cabb016c7&oe=594C310B','https://www.facebook.com/app_scoped_user_id/1410221429028652/','poparab_2012@yahoo.com','1410221429028652',''),(4,'Abdelrahman Abdelhamed','https://scontent.xx.fbcdn.net/v/t1.0-1/c25.0.50.50/p50x50/14581291_1253778928018433_7986701362174703076_n.jpg?oh=fa570b933cd1bcacb957f39cd18fb796&oe=59023DEF','https://www.facebook.com/app_scoped_user_id/1367415113321480/','abdelrhmanabdelhamed@gmail.com','1367415113321480',''),(5,'Nader Elewa','https://scontent.xx.fbcdn.net/v/t1.0-1/c0.9.50.50/p50x50/13061971_10154772221653154_8488119638168953176_n.jpg?oh=aed130a9ce3a3424f428291846d31d6b&oe=59085DE5','https://www.facebook.com/app_scoped_user_id/10155773700048154/','nader.elewa@gmail.com','10155773700048154',''),(6,'Beco G.','https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/16299192_10155008816429464_2492475485669606360_n.jpg?oh=6a5fbb77b7a43b8f5a7ba740bc35522c&oe=59054722','https://www.facebook.com/app_scoped_user_id/10155025429059464/','itsbeco@gmail.com','10155025429059464','');
/*!40000 ALTER TABLE `cjc_events_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-15  1:56:35
