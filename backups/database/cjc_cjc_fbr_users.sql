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
-- Table structure for table `cjc_fbr_users`
--

DROP TABLE IF EXISTS `cjc_fbr_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cjc_fbr_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(12) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `user_name` varchar(512) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `user_picture` varchar(2048) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `user_profile` varchar(1024) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `user_email` varchar(45) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `user_id` varchar(512) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `user_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cjc_fbr_users`
--

LOCK TABLES `cjc_fbr_users` WRITE;
/*!40000 ALTER TABLE `cjc_fbr_users` DISABLE KEYS */;
INSERT INTO `cjc_fbr_users` VALUES (9,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL),(10,'224274','8 haridy st',22,NULL,NULL,NULL,'poparab11@gmail.com',NULL,NULL),(11,NULL,NULL,0,'Nader Elewa','https://scontent.xx.fbcdn.net/v/t1.0-1/c0.9.50.50/p50x50/13061971_10154772221653154_8488119638168953176_n.jpg?oh=ce56d88dc5db036f553c80a16fb6c9fe&oe=592FEAE5','https://www.facebook.com/app_scoped_user_id/10155773700048154/','nader.elewa@gmail.com','10155773700048154',NULL),(12,NULL,NULL,0,'Abdo Mamdouh Ali','https://graph.facebook.com/1410221429028652/picture?type=large','https://www.facebook.com/app_scoped_user_id/1410221429028652/','poparab_2012@yahoo.com','1410221429028652',NULL);
/*!40000 ALTER TABLE `cjc_fbr_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-02 16:54:59
