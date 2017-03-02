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
-- Table structure for table `cjc_users`
--

DROP TABLE IF EXISTS `cjc_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cjc_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`),
  KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cjc_users`
--

LOCK TABLES `cjc_users` WRITE;
/*!40000 ALTER TABLE `cjc_users` DISABLE KEYS */;
INSERT INTO `cjc_users` VALUES (1,'Dev','$P$BwUUyCLw6bzuqDilq7XX48PTt0Rzd/.','dev','exception.ss.team@gmail.com','','2017-01-25 14:28:46','',0,'Dev'),(2,'ramy','$P$By8vRKelSs/tEJZv/1arJgkjplj.xQ1','ramy','ramy@bni.agency','','2017-02-02 12:56:03','1486040163:$P$Bm3Y2ECihbTH2DORBj6MwAvTXNFlB71',0,'ramy'),(3,'Facebook - naderelewa','$P$BQQKkqJICEbveiyLLWomo9dpvzc8XU0','facebook-naderelewa','nader.elewa@gmail.com','','2017-02-05 13:47:31','1486302451:$P$BkEvfj2y6ONBiudeaW0Wox8c05tNGO0',0,'Nader Elewa'),(4,'sara','$P$BWOVgZNrw7h3ulLeTYSJtX5eYGjBjM.','sara','sara@cairojazzclub.com','','2017-02-05 14:11:26','',0,'sara'),(5,'Mohammed Magdy','$P$BIpY/IAJOpEnGFvEC/Ah9qZDFR6Bx40','mohammed-magdy','mohammed_magdy_ali@yahoo.com','','2017-02-05 23:40:47','',0,'Mohammed Magdy'),(6,'Abdo Mamdouh Ali','$P$BVzFtyisH1OOch5kqCl/BnIU6ISAJ6.','abdo-mamdouh-ali','poparab_2012@yahoo.com','','2017-02-06 00:01:37','',0,'Abdo Ali'),(7,'edit','$P$BPQYRWk2Jp0kvhX1DYUwcz/.aTvWaj.','edit','edit@edit.com','','2017-02-06 12:56:02','',0,'edit edit'),(8,'Facebook - abdelrahmanabdelhamed','$P$Bq.xfjwSvauq75wlR9kq7zGAGoU0hF0','facebook-abdelrahmanabdelhamed','abdelrhmanabdelhamed@gmail.com','','2017-02-08 12:24:17','1486556657:$P$Bu8pC5mSRrD4Je1iROwRp9zI6Cx0NE.',0,'Abdelrahman Abdelhamed'),(9,'test','$P$BhEs5L173ECxrdzWuQz3dPMqtzNzRM.','test','test@test.com','','2017-02-16 09:49:53','',0,'test'),(10,'testt','$P$BG9FXz.K4j3Q.teh6hv/bKVp6jeyVt.','testt','testt@test.com','','2017-02-16 09:52:42','',0,'testt');
/*!40000 ALTER TABLE `cjc_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-02 16:56:33
