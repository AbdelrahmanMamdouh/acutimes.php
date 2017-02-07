-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: cjc
-- ------------------------------------------------------
-- Server version	5.7.16-log

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
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cjc_nf_objectmeta`
--

LOCK TABLES `cjc_nf_objectmeta` WRITE;
/*!40000 ALTER TABLE `cjc_nf_objectmeta` DISABLE KEYS */;
INSERT INTO `cjc_nf_objectmeta` VALUES (7,3,'date_updated','2017-02-03 16:35:32'),(8,3,'clear_complete','1'),(9,3,'hide_complete','1'),(10,3,'show_title','0'),(11,3,'status',''),(12,3,'form_title','Contact Us'),(13,3,'append_page',''),(14,3,'ajax','1'),(15,3,'logged_in','0'),(16,3,'not_logged_in_msg',''),(17,3,'sub_limit_number','3'),(18,3,'sub_limit_msg','You can only submit 3 times at a time'),(19,4,'date_updated','2017-02-03 16:40:43'),(20,4,'clear_complete','1'),(21,4,'hide_complete','1'),(22,4,'show_title','1'),(23,4,'status',''),(24,4,'form_title','Stay in touch'),(25,4,'append_page',''),(26,4,'ajax','1'),(27,4,'logged_in','0'),(28,4,'not_logged_in_msg',''),(29,4,'sub_limit_number',''),(30,4,'sub_limit_msg',''),(31,4,'bti_layout_master','a:2:{s:4:\"cols\";s:1:\"1\";s:9:\"rendering\";s:0:\"\";}'),(32,4,'last_sub','5'),(55,9,'date_updated','2017-02-03'),(56,9,'active','1'),(57,9,'name','Success Message'),(58,9,'type','success_message'),(59,9,'from_name',''),(60,9,'from_address',''),(61,9,'to',''),(62,9,'email_subject',''),(63,9,'email_message',''),(64,9,'attach_csv','0'),(65,9,'email_format','html'),(66,9,'reply_to',''),(67,9,'cc',''),(68,9,'bcc',''),(69,9,'redirect_url',''),(70,9,'success_msg','<h2>thank you for registration</h2>');
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

-- Dump completed on 2017-02-07 18:26:57
