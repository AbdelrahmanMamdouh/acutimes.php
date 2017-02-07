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
-- Table structure for table `cjc_nf3_form_meta`
--

DROP TABLE IF EXISTS `cjc_nf3_form_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cjc_nf3_form_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `key` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_520_ci,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cjc_nf3_form_meta`
--

LOCK TABLES `cjc_nf3_form_meta` WRITE;
/*!40000 ALTER TABLE `cjc_nf3_form_meta` DISABLE KEYS */;
INSERT INTO `cjc_nf3_form_meta` VALUES (1,1,'default_label_pos','above'),(2,1,'_seq_num','3'),(3,1,'conditions','a:0:{}'),(4,1,'objectType','Form Setting'),(5,1,'editActive','1'),(6,1,'show_title','1'),(7,1,'clear_complete','1'),(8,1,'hide_complete','1'),(9,1,'wrapper_class','contact-form  right-line'),(10,1,'element_class',''),(11,1,'add_submit','1'),(12,1,'logged_in',''),(13,1,'not_logged_in_msg',''),(14,1,'sub_limit_number',''),(15,1,'sub_limit_msg',''),(16,1,'calculations','a:0:{}'),(17,1,'formContentData','a:4:{i:0;s:4:\"name\";i:1;s:5:\"email\";i:2;s:7:\"message\";i:3;s:6:\"submit\";}'),(18,1,'container_styles_background-color',''),(19,1,'container_styles_border',''),(20,1,'container_styles_border-style',''),(21,1,'container_styles_border-color',''),(22,1,'container_styles_color',''),(23,1,'container_styles_height',''),(24,1,'container_styles_width',''),(25,1,'container_styles_font-size',''),(26,1,'container_styles_margin',''),(27,1,'container_styles_padding',''),(28,1,'container_styles_display',''),(29,1,'container_styles_float',''),(30,1,'container_styles_show_advanced_css','0'),(31,1,'container_styles_advanced',''),(32,1,'title_styles_background-color',''),(33,1,'title_styles_border',''),(34,1,'title_styles_border-style',''),(35,1,'title_styles_border-color',''),(36,1,'title_styles_color',''),(37,1,'title_styles_height',''),(38,1,'title_styles_width',''),(39,1,'title_styles_font-size',''),(40,1,'title_styles_margin',''),(41,1,'title_styles_padding',''),(42,1,'title_styles_display',''),(43,1,'title_styles_float',''),(44,1,'title_styles_show_advanced_css','0'),(45,1,'title_styles_advanced',''),(46,1,'row_styles_background-color',''),(47,1,'row_styles_border',''),(48,1,'row_styles_border-style',''),(49,1,'row_styles_border-color',''),(50,1,'row_styles_color',''),(51,1,'row_styles_height',''),(52,1,'row_styles_width',''),(53,1,'row_styles_font-size',''),(54,1,'row_styles_margin',''),(55,1,'row_styles_padding',''),(56,1,'row_styles_display',''),(57,1,'row_styles_show_advanced_css','0'),(58,1,'row_styles_advanced',''),(59,1,'row-odd_styles_background-color',''),(60,1,'row-odd_styles_border',''),(61,1,'row-odd_styles_border-style',''),(62,1,'row-odd_styles_border-color',''),(63,1,'row-odd_styles_color',''),(64,1,'row-odd_styles_height',''),(65,1,'row-odd_styles_width',''),(66,1,'row-odd_styles_font-size',''),(67,1,'row-odd_styles_margin',''),(68,1,'row-odd_styles_padding',''),(69,1,'row-odd_styles_display',''),(70,1,'row-odd_styles_show_advanced_css','0'),(71,1,'row-odd_styles_advanced',''),(72,1,'success-msg_styles_background-color',''),(73,1,'success-msg_styles_border',''),(74,1,'success-msg_styles_border-style',''),(75,1,'success-msg_styles_border-color',''),(76,1,'success-msg_styles_color',''),(77,1,'success-msg_styles_height',''),(78,1,'success-msg_styles_width',''),(79,1,'success-msg_styles_font-size',''),(80,1,'success-msg_styles_margin',''),(81,1,'success-msg_styles_padding',''),(82,1,'success-msg_styles_display',''),(83,1,'success-msg_styles_show_advanced_css','0'),(84,1,'success-msg_styles_advanced',''),(85,1,'error_msg_styles_background-color',''),(86,1,'error_msg_styles_border',''),(87,1,'error_msg_styles_border-style',''),(88,1,'error_msg_styles_border-color',''),(89,1,'error_msg_styles_color',''),(90,1,'error_msg_styles_height',''),(91,1,'error_msg_styles_width',''),(92,1,'error_msg_styles_font-size',''),(93,1,'error_msg_styles_margin',''),(94,1,'error_msg_styles_padding',''),(95,1,'error_msg_styles_display',''),(96,1,'error_msg_styles_show_advanced_css','0'),(97,1,'error_msg_styles_advanced',''),(98,1,'changeEmailErrorMsg',''),(99,1,'confirmFieldErrorMsg',''),(100,1,'fieldNumberNumMinError',''),(101,1,'fieldNumberNumMaxError',''),(102,1,'fieldNumberIncrementBy',''),(103,1,'formErrorsCorrectErrors',' '),(104,1,'validateRequiredField',''),(105,1,'honeypotHoneypotError',''),(106,1,'fieldsMarkedRequired',' '),(107,1,'currency','');
/*!40000 ALTER TABLE `cjc_nf3_form_meta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-07 18:32:12
