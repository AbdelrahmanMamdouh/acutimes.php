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
-- Table structure for table `cjc_rhc_events`
--

DROP TABLE IF EXISTS `cjc_rhc_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cjc_rhc_events` (
  `event_start` datetime NOT NULL,
  `event_end` datetime NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `allday` tinyint(4) NOT NULL DEFAULT '0',
  `number` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`event_start`,`post_id`),
  KEY `event_end` (`event_end`,`post_id`),
  KEY `event_start` (`event_start`,`event_end`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cjc_rhc_events`
--

LOCK TABLES `cjc_rhc_events` WRITE;
/*!40000 ALTER TABLE `cjc_rhc_events` DISABLE KEYS */;
INSERT INTO `cjc_rhc_events` VALUES ('2016-06-02 00:00:00','2016-06-02 00:00:00',988,0,0),('2016-06-28 00:00:00','2016-06-28 00:00:00',980,0,0),('2016-06-29 00:00:00','2016-06-29 00:00:00',1000,0,0),('2016-11-04 00:00:00','2016-11-04 00:00:00',998,0,0),('2016-11-10 00:00:00','2016-11-10 00:00:00',996,0,0),('2016-11-15 00:00:00','2016-11-15 00:00:00',1005,0,0),('2016-12-07 00:00:00','2016-12-07 00:00:00',1006,0,0),('2017-01-01 00:00:00','2017-01-01 00:00:00',1109,0,0),('2017-01-02 00:00:00','2017-01-02 00:00:00',1013,0,0),('2017-01-03 00:00:00','2017-01-03 00:00:00',1053,0,0),('2017-01-04 00:00:00','2017-01-04 00:00:00',1059,0,0),('2017-01-05 00:00:00','2017-01-05 00:00:00',1060,0,0),('2017-01-06 00:00:00','2017-01-06 00:00:00',1074,0,0),('2017-01-07 00:00:00','2017-01-07 00:00:00',1035,0,0),('2017-01-08 00:00:00','2017-01-08 00:00:00',1075,0,0),('2017-01-09 00:00:00','2017-01-09 00:00:00',1115,0,0),('2017-01-10 00:00:00','2017-01-10 00:00:00',1080,0,0),('2017-01-11 00:00:00','2017-01-11 00:00:00',1084,0,0),('2017-01-12 00:00:00','2017-01-12 00:00:00',1100,0,0),('2017-01-12 00:00:00','2017-01-12 00:00:00',1124,0,0),('2017-01-13 00:00:00','2017-01-13 00:00:00',1121,0,0),('2017-01-14 00:00:00','2017-01-14 00:00:00',1118,0,0),('2017-01-15 00:00:00','2017-01-15 00:00:00',1112,0,0),('2017-01-16 00:00:00','2017-01-16 00:00:00',1097,0,0),('2017-01-17 00:00:00','2017-01-17 00:00:00',1094,0,0),('2017-01-18 00:00:00','2017-01-18 00:00:00',1019,0,0),('2017-01-19 00:00:00','2017-01-19 00:00:00',1037,0,0),('2017-01-20 00:00:00','2017-01-20 00:00:00',1106,0,0),('2017-01-21 00:00:00','2017-01-21 00:00:00',1091,0,0),('2017-01-22 00:00:00','2017-01-22 00:00:00',1103,0,0),('2017-01-23 00:00:00','2017-01-23 00:00:00',1032,0,0),('2017-01-24 00:00:00','2017-01-24 00:00:00',1088,0,0),('2017-01-25 00:00:00','2017-01-25 00:00:00',1054,0,0),('2017-01-26 00:00:00','2017-01-26 00:00:00',1027,0,0),('2017-01-27 00:00:00','2017-01-27 00:00:00',278,1,0),('2017-01-27 00:00:00','2017-01-27 00:00:00',1050,0,0),('2017-01-29 00:00:00','2017-01-29 00:00:00',1022,0,0),('2017-01-31 00:00:00','2017-01-31 00:00:00',106,1,0),('2017-02-02 00:00:00','2017-02-02 00:00:00',967,1,0),('2017-02-03 00:00:00','2017-02-03 00:00:00',964,1,0),('2017-02-04 00:00:00','2017-02-04 00:00:00',961,1,0),('2017-02-05 00:00:00','2017-02-05 00:00:00',956,1,0),('2017-02-06 00:00:00','2017-02-06 00:00:00',953,1,0),('2017-02-08 00:00:00','2017-02-08 00:00:00',949,1,0);
/*!40000 ALTER TABLE `cjc_rhc_events` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-09  2:11:19
