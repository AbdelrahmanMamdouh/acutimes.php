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
-- Table structure for table `cjc_term_taxonomy`
--

DROP TABLE IF EXISTS `cjc_term_taxonomy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cjc_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cjc_term_taxonomy`
--

LOCK TABLES `cjc_term_taxonomy` WRITE;
/*!40000 ALTER TABLE `cjc_term_taxonomy` DISABLE KEYS */;
INSERT INTO `cjc_term_taxonomy` VALUES (1,1,'category','',0,4),(2,2,'nav_menu','',0,8),(3,3,'nav_menu','',0,2),(4,4,'essential_grid_category','',0,7),(5,5,'essential_grid_category','',0,4),(6,6,'essential_grid_category','',0,8),(7,7,'essential_grid_category','',0,12),(8,8,'essential_grid_category','',0,4),(9,9,'essential_grid_category','',0,0),(10,10,'essential_grid_category','',0,0),(11,11,'post_tag','',0,4),(12,12,'post_tag','',0,12),(13,13,'post_tag','',0,1),(14,14,'post_tag','',0,1),(15,15,'post_tag','',0,1),(16,16,'post_tag','',0,1),(17,17,'post_tag','',0,5),(18,18,'post_tag','',0,7),(19,19,'post_tag','',0,3),(20,20,'post_tag','',0,6),(21,21,'post_tag','',0,5),(22,22,'post_tag','',0,2),(23,23,'post_tag','',0,1),(24,24,'post_tag','',0,3),(25,25,'post_tag','',0,2),(26,26,'category','',0,0),(27,27,'category','',0,0),(28,28,'category','',0,0),(29,29,'category','',0,0),(30,30,'category','',0,0),(31,31,'calendar','',0,0),(32,32,'organizer','',0,0),(33,33,'venue','',0,0),(34,34,'genre','',37,9),(35,35,'night-type','',38,22),(36,36,'genre','',37,13),(37,37,'genre','Genres parent container',0,0),(38,38,'night-type','Night Types parent container',0,0),(39,39,'night-type','',38,28),(40,40,'genre','',37,12),(41,41,'genre','',37,6),(42,42,'night-type','',38,28),(43,43,'genre','',37,2),(44,44,'night-type','',38,21),(45,45,'genre','',37,7),(46,46,'genre','',37,1),(47,47,'night-type','',38,24),(48,48,'genre','',37,13),(49,49,'genre','',37,12),(50,50,'night-type','',38,33),(51,51,'genre','',37,5),(52,52,'genre','',37,2),(53,53,'genre','',37,11),(54,54,'genre','',37,7),(55,55,'night-type','',38,17),(56,56,'genre','',37,12),(57,57,'genre','',37,7),(58,58,'genre','',37,3),(59,59,'genre','',37,10),(60,60,'genre','',37,5),(61,61,'genre','',37,4),(62,62,'genre','',37,5),(63,63,'genre','',37,1),(64,64,'genre','',37,3),(65,65,'genre','',37,1),(66,66,'genre','',37,1),(67,67,'artist_status','',0,1),(68,68,'night-type','',0,1),(69,69,'slideshow','',0,0),(70,70,'ml-slider','',0,0),(71,71,'ml-slider','',0,0);
/*!40000 ALTER TABLE `cjc_term_taxonomy` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-09  2:10:07
