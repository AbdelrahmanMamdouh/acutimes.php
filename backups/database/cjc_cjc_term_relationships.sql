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
-- Table structure for table `cjc_term_relationships`
--

DROP TABLE IF EXISTS `cjc_term_relationships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cjc_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cjc_term_relationships`
--

LOCK TABLES `cjc_term_relationships` WRITE;
/*!40000 ALTER TABLE `cjc_term_relationships` DISABLE KEYS */;
INSERT INTO `cjc_term_relationships` VALUES (1,1,0),(75,3,0),(76,3,0),(77,2,0),(78,2,0),(79,2,0),(80,2,0),(81,2,0),(82,2,0),(83,2,0),(86,1,0),(93,1,0),(98,1,0),(106,31,0),(106,32,0),(106,33,0),(109,7,0),(109,11,0),(109,12,0),(113,5,0),(117,5,0),(117,7,0),(121,4,0),(125,4,0),(125,6,0),(129,8,0),(133,5,0),(137,6,0),(141,7,0),(141,12,0),(141,13,0),(141,14,0),(145,8,0),(145,11,0),(145,15,0),(145,16,0),(149,6,0),(149,7,0),(149,12,0),(149,17,0),(149,18,0),(149,19,0),(149,20,0),(153,4,0),(153,7,0),(153,12,0),(153,17,0),(153,18,0),(153,21,0),(153,22,0),(157,4,0),(157,6,0),(157,11,0),(157,12,0),(157,20,0),(157,21,0),(161,4,0),(161,7,0),(161,12,0),(161,20,0),(161,23,0),(165,6,0),(165,8,0),(165,11,0),(165,12,0),(165,18,0),(169,5,0),(169,7,0),(169,12,0),(169,21,0),(169,24,0),(173,7,0),(173,8,0),(173,12,0),(173,17,0),(173,19,0),(173,20,0),(177,6,0),(177,7,0),(177,12,0),(177,17,0),(177,18,0),(177,25,0),(181,6,0),(181,7,0),(181,12,0),(181,18,0),(181,20,0),(181,21,0),(181,24,0),(185,4,0),(185,7,0),(185,12,0),(185,17,0),(185,18,0),(185,22,0),(189,7,0),(189,18,0),(189,19,0),(189,20,0),(193,4,0),(193,6,0),(193,21,0),(193,24,0),(193,25,0),(343,2,0),(374,1,0),(399,35,0),(399,39,0),(399,40,0),(399,41,0),(401,42,0),(401,43,0),(404,42,0),(404,43,0),(404,45,0),(406,46,0),(406,47,0),(408,47,0),(408,48,0),(410,42,0),(410,49,0),(683,34,0),(683,45,0),(683,50,0),(690,47,0),(690,49,0),(690,51,0),(695,34,0),(695,47,0),(695,48,0),(695,52,0),(698,45,0),(698,47,0),(698,48,0),(698,49,0),(700,34,0),(700,53,0),(700,54,0),(700,55,0),(702,53,0),(702,54,0),(702,55,0),(704,36,0),(704,44,0),(704,47,0),(706,35,0),(706,39,0),(706,40,0),(706,56,0),(708,35,0),(708,39,0),(709,49,0),(709,50,0),(709,57,0),(712,49,0),(712,50,0),(712,53,0),(714,34,0),(714,45,0),(714,48,0),(714,50,0),(716,36,0),(716,44,0),(721,39,0),(721,56,0),(721,58,0),(723,35,0),(723,39,0),(723,56,0),(723,59,0),(726,47,0),(726,48,0),(726,53,0),(726,54,0),(727,34,0),(727,50,0),(727,57,0),(728,48,0),(728,50,0),(728,57,0),(729,42,0),(729,59,0),(736,42,0),(736,48,0),(736,59,0),(737,39,0),(737,41,0),(738,44,0),(738,45,0),(738,50,0),(738,60,0),(739,47,0),(739,48,0),(746,42,0),(746,49,0),(746,50,0),(747,36,0),(747,42,0),(747,45,0),(747,50,0),(750,35,0),(750,40,0),(751,35,0),(751,40,0),(751,56,0),(764,39,0),(764,40,0),(764,56,0),(770,39,0),(770,40,0),(770,56,0),(770,58,0),(770,61,0),(772,35,0),(772,39,0),(772,40,0),(772,56,0),(772,59,0),(776,42,0),(776,47,0),(776,59,0),(778,35,0),(778,39,0),(778,40,0),(778,61,0),(781,35,0),(781,39,0),(781,40,0),(781,56,0),(781,61,0),(783,41,0),(783,55,0),(785,55,0),(786,41,0),(786,54,0),(786,55,0),(788,42,0),(788,59,0),(789,42,0),(789,48,0),(789,59,0),(789,62,0),(792,35,0),(792,39,0),(792,58,0),(793,35,0),(793,39,0),(793,40,0),(793,56,0),(793,61,0),(796,47,0),(796,53,0),(796,54,0),(796,60,0),(798,50,0),(799,36,0),(799,44,0),(799,53,0),(803,47,0),(803,60,0),(803,63,0),(804,47,0),(804,48,0),(804,54,0),(804,60,0),(809,55,0),(809,64,0),(814,35,0),(814,39,0),(814,40,0),(814,56,0),(815,36,0),(815,44,0),(830,36,0),(830,44,0),(831,42,0),(831,57,0),(833,49,0),(833,50,0),(833,65,0),(834,36,0),(834,44,0),(835,35,0),(835,39,0),(835,56,0),(836,62,0),(837,36,0),(837,44,0),(837,51,0),(841,42,0),(841,49,0),(841,50,0),(841,51,0),(843,36,0),(843,44,0),(844,55,0),(844,64,0),(846,44,0),(846,47,0),(846,53,0),(848,45,0),(848,50,0),(850,35,0),(850,39,0),(850,59,0),(853,47,0),(853,48,0),(853,62,0),(858,34,0),(858,42,0),(858,50,0),(858,57,0),(858,59,0),(860,47,0),(860,48,0),(860,53,0),(860,60,0),(861,49,0),(861,50,0),(865,34,0),(865,49,0),(865,50,0),(874,42,0),(874,59,0),(876,39,0),(876,41,0),(876,56,0),(878,36,0),(878,44,0),(880,42,0),(880,51,0),(880,52,0),(881,34,0),(881,50,0),(881,53,0),(886,42,0),(886,62,0),(887,36,0),(887,44,0),(889,48,0),(889,50,0),(889,53,0),(890,36,0),(890,44,0),(890,50,0),(890,51,0),(892,49,0),(892,50,0),(892,57,0),(893,47,0),(893,53,0),(893,54,0),(893,64,0),(894,50,0),(894,62,0),(895,35,0),(895,39,0),(895,40,0),(895,41,0),(896,34,0),(896,42,0),(896,57,0),(896,67,0),(897,36,0),(897,49,0),(897,50,0),(899,42,0),(899,66,0);
/*!40000 ALTER TABLE `cjc_term_relationships` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-04  2:21:51
