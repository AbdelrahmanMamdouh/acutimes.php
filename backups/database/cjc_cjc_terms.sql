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
-- Table structure for table `cjc_terms`
--

DROP TABLE IF EXISTS `cjc_terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cjc_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cjc_terms`
--

LOCK TABLES `cjc_terms` WRITE;
/*!40000 ALTER TABLE `cjc_terms` DISABLE KEYS */;
INSERT INTO `cjc_terms` VALUES (1,'Uncategorized','uncategorized',0),(2,'Main','main',0),(3,'Copy Right','copy-right',0),(4,'Company News','company-news',0),(5,'Computers','computers',0),(6,'General News','general-news',0),(7,'Hipster Content','hipster-content',0),(8,'Just Food','just-food',0),(9,'Uncategorized','uncategorized',0),(10,'Video','video',0),(11,'food','food',0),(12,'hipster','hipster',0),(13,'camera','camera',0),(14,'cool','cool',0),(15,'chilled','chilled',0),(16,'coctail','coctail',0),(17,'holidays','holidays',0),(18,'light','light',0),(19,'place','place',0),(20,'video-2','video-2',0),(21,'hardware','hardware',0),(22,'retro','retro',0),(23,'watch','watch',0),(24,'mac','mac',0),(25,'dark','dark',0),(26,'Arabic','arabic',0),(27,'Genres','genres',0),(28,'Staff','staff',0),(29,'Test','test',0),(30,'Wehw','wehw',0),(31,'Events','events',0),(32,'organizer1','organizer1',0),(33,'venues1','venues1',0),(34,'Arabic','arabic',0),(35,'Friday Fever','friday-fever',0),(36,'Jazz','jazz',0),(37,'Genres','genres',0),(38,'Night Types','night-types',0),(39,'Manic Monday','manic-monday',0),(40,'Deep House','deep-house',0),(41,'House','house',0),(42,'Alt Tuesday','alt-tuesday',0),(43,'Electronic/Excperimental','electronicexcperimental',0),(44,'Jazz Sunday','jazz-sunday',0),(45,'Arabic Indie','arabic-indie',0),(46,'Alternative/Indie','alternativeindie',0),(47,'Thursday Night Live','thursday-night-live',0),(48,'Rock','rock',0),(49,'Contemporary Arabic','contemporary-arabic',0),(50,'Saturday L\'Oriental','saturday-loriental',0),(51,'World Music','world-music',0),(52,'Raggae','raggae',0),(53,'pop','pop',0),(54,'Funk/Disco','funkdisco',0),(55,'Spinning Wednesday','spinning-wednesday',0),(56,'Tech House','tech-house',0),(57,'Folk','folk',0),(58,'Progressive House','progressive-house',0),(59,'Electronic','electronic',0),(60,'Blues','blues',0),(61,'Nu Disco','nu-disco',0),(62,'Alternative','alternative',0),(63,'Rock n\' Roll/Rockabilly','rock-n-rollrockabilly',0),(64,'RnB/Hip Hop','rnbhip-hop',0),(65,'African','african',0),(66,'Electro Pop','electro-pop',0),(67,'Visiting Artist','visiting-artist',0),(68,'manic','manic',0),(69,'x','x',0),(70,'1777','1777',0),(71,'1791','1791',0);
/*!40000 ALTER TABLE `cjc_terms` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-07 18:31:23
