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
-- Table structure for table `cjc_nf_objectmeta`
--

DROP TABLE IF EXISTS `cjc_nf_objectmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cjc_nf_objectmeta` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `object_id` bigint(20) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `meta_value` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cjc_nf_objectmeta`
--

LOCK TABLES `cjc_nf_objectmeta` WRITE;
/*!40000 ALTER TABLE `cjc_nf_objectmeta` DISABLE KEYS */;
INSERT INTO `cjc_nf_objectmeta` VALUES (7,3,'date_updated','2017-02-14 16:02:11'),(8,3,'clear_complete','1'),(9,3,'hide_complete','1'),(10,3,'show_title','0'),(11,3,'status',''),(12,3,'form_title','Contact Us'),(13,3,'append_page',''),(14,3,'ajax','1'),(15,3,'logged_in','0'),(16,3,'not_logged_in_msg',''),(17,3,'sub_limit_number','3'),(18,3,'sub_limit_msg','You can only submit 3 times at a time'),(55,9,'date_updated','2017-02-03'),(56,9,'active','1'),(57,9,'name','Success Message'),(58,9,'type','success_message'),(59,9,'from_name',''),(60,9,'from_address',''),(61,9,'to',''),(62,9,'email_subject',''),(63,9,'email_message',''),(64,9,'attach_csv','0'),(65,9,'email_format','html'),(66,9,'reply_to',''),(67,9,'cc',''),(68,9,'bcc',''),(69,9,'redirect_url',''),(70,9,'success_msg','<h2>thank you for registration</h2>'),(76,11,'date_updated','2017-02-14'),(77,11,'active','1'),(78,11,'name','mail'),(79,11,'type','email'),(80,11,'from_name','mohammed'),(81,11,'from_address','mohammed.magdy.ali.96@gmail.com'),(82,11,'to','mohammed.magdy.ali.96@gmail.com'),(83,11,'email_subject','field_2'),(84,11,'email_message','this is a test massage'),(85,11,'attach_csv','0'),(86,11,'email_format','html'),(87,11,'reply_to',''),(88,11,'cc',''),(89,11,'bcc',''),(90,11,'redirect_url',''),(91,11,'success_msg',''),(97,3,'last_sub','1'),(98,13,'date_updated','2017-02-20'),(99,13,'active','1'),(100,13,'name','thanks'),(101,13,'type','success_message'),(102,13,'from_name',''),(103,13,'from_address',''),(104,13,'to',''),(105,13,'email_subject',''),(106,13,'email_message',''),(107,13,'attach_csv','0'),(108,13,'email_format','html'),(109,13,'reply_to',''),(110,13,'cc',''),(111,13,'bcc',''),(112,13,'redirect_url',''),(113,13,'success_msg','<h2>thanks for getting in touch we will get back to you</h2>');
/*!40000 ALTER TABLE `cjc_nf_objectmeta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-24 11:40:03
