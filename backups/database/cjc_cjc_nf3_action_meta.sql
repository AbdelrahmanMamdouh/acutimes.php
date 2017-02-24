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
-- Table structure for table `cjc_nf3_action_meta`
--

DROP TABLE IF EXISTS `cjc_nf3_action_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cjc_nf3_action_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `key` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_520_ci,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cjc_nf3_action_meta`
--

LOCK TABLES `cjc_nf3_action_meta` WRITE;
/*!40000 ALTER TABLE `cjc_nf3_action_meta` DISABLE KEYS */;
INSERT INTO `cjc_nf3_action_meta` VALUES (1,1,'label','Save to Database'),(2,1,'objectType','Action'),(3,1,'objectDomain','actions'),(4,1,'editActive',''),(5,1,'conditions','a:6:{s:9:\"collapsed\";s:0:\"\";s:7:\"process\";s:1:\"1\";s:9:\"connector\";s:3:\"all\";s:4:\"when\";a:1:{i:0;a:6:{s:9:\"connector\";s:3:\"AND\";s:3:\"key\";s:0:\"\";s:10:\"comparator\";s:0:\"\";s:5:\"value\";s:0:\"\";s:4:\"type\";s:5:\"field\";s:9:\"modelType\";s:4:\"when\";}}s:4:\"then\";a:1:{i:0;a:5:{s:3:\"key\";s:0:\"\";s:7:\"trigger\";s:0:\"\";s:5:\"value\";s:0:\"\";s:4:\"type\";s:5:\"field\";s:9:\"modelType\";s:4:\"then\";}}s:4:\"else\";a:0:{}}'),(6,1,'payment_gateways',''),(7,1,'payment_total',''),(8,1,'tag',''),(9,1,'to',''),(10,1,'email_subject',''),(11,1,'email_message',''),(12,1,'from_name',''),(13,1,'from_address',''),(14,1,'reply_to',''),(15,1,'email_format','html'),(16,1,'cc',''),(17,1,'bcc',''),(18,1,'attach_csv',''),(19,1,'redirect_url',''),(20,1,'email_message_plain',''),(21,2,'label','Email Confirmation'),(22,2,'to','{field:email}'),(23,2,'subject','This is an email action.'),(24,2,'message','Hello, Ninja Forms!'),(25,2,'objectType','Action'),(26,2,'objectDomain','actions'),(27,2,'editActive',''),(28,2,'conditions','a:6:{s:9:\"collapsed\";s:0:\"\";s:7:\"process\";s:1:\"1\";s:9:\"connector\";s:3:\"all\";s:4:\"when\";a:0:{}s:4:\"then\";a:1:{i:0;a:5:{s:3:\"key\";s:0:\"\";s:7:\"trigger\";s:0:\"\";s:5:\"value\";s:0:\"\";s:4:\"type\";s:5:\"field\";s:9:\"modelType\";s:4:\"then\";}}s:4:\"else\";a:0:{}}'),(29,2,'payment_gateways',''),(30,2,'payment_total',''),(31,2,'tag',''),(32,2,'email_subject','Submission Confirmation '),(33,2,'email_message','<p>{field:all_fields}<br></p>'),(34,2,'from_name',''),(35,2,'from_address',''),(36,2,'reply_to',''),(37,2,'email_format','html'),(38,2,'cc',''),(39,2,'bcc',''),(40,2,'attach_csv',''),(41,2,'email_message_plain',''),(42,3,'objectType','Action'),(43,3,'objectDomain','actions'),(44,3,'editActive',''),(45,3,'label','Email Notification'),(46,3,'conditions','a:6:{s:9:\"collapsed\";s:0:\"\";s:7:\"process\";s:1:\"1\";s:9:\"connector\";s:3:\"all\";s:4:\"when\";a:1:{i:0;a:6:{s:9:\"connector\";s:3:\"AND\";s:3:\"key\";s:0:\"\";s:10:\"comparator\";s:0:\"\";s:5:\"value\";s:0:\"\";s:4:\"type\";s:5:\"field\";s:9:\"modelType\";s:4:\"when\";}}s:4:\"then\";a:1:{i:0;a:5:{s:3:\"key\";s:0:\"\";s:7:\"trigger\";s:0:\"\";s:5:\"value\";s:0:\"\";s:4:\"type\";s:5:\"field\";s:9:\"modelType\";s:4:\"then\";}}s:4:\"else\";a:0:{}}'),(47,3,'payment_gateways',''),(48,3,'payment_total',''),(49,3,'tag',''),(50,3,'to','{system:admin_email}'),(51,3,'email_subject','New message from {field:name}'),(52,3,'email_message','<p>{field:message}</p><p>- {field:name} ( {field:email} )</p>'),(53,3,'from_name',''),(54,3,'from_address',''),(55,3,'reply_to','{field:email}'),(56,3,'email_format','html'),(57,3,'cc',''),(58,3,'bcc',''),(59,3,'attach_csv','0'),(60,3,'email_message_plain',''),(61,4,'label','Success Message'),(62,4,'message','Thank you {field:name} for filling out my form!'),(63,4,'objectType','Action'),(64,4,'objectDomain','actions'),(65,4,'editActive',''),(66,4,'conditions','a:6:{s:9:\"collapsed\";s:0:\"\";s:7:\"process\";s:1:\"1\";s:9:\"connector\";s:3:\"all\";s:4:\"when\";a:1:{i:0;a:6:{s:9:\"connector\";s:3:\"AND\";s:3:\"key\";s:0:\"\";s:10:\"comparator\";s:0:\"\";s:5:\"value\";s:0:\"\";s:4:\"type\";s:5:\"field\";s:9:\"modelType\";s:4:\"when\";}}s:4:\"then\";a:1:{i:0;a:5:{s:3:\"key\";s:0:\"\";s:7:\"trigger\";s:0:\"\";s:5:\"value\";s:0:\"\";s:4:\"type\";s:5:\"field\";s:9:\"modelType\";s:4:\"then\";}}s:4:\"else\";a:0:{}}'),(67,4,'payment_gateways',''),(68,4,'payment_total',''),(69,4,'tag',''),(70,4,'to',''),(71,4,'email_subject',''),(72,4,'email_message',''),(73,4,'from_name',''),(74,4,'from_address',''),(75,4,'reply_to',''),(76,4,'email_format','html'),(77,4,'cc',''),(78,4,'bcc',''),(79,4,'attach_csv',''),(80,4,'redirect_url',''),(81,4,'success_msg','<p>Form submitted successfully.</p><p>A confirmation email was sent to{field:email}.</p>'),(82,4,'email_message_plain','');
/*!40000 ALTER TABLE `cjc_nf3_action_meta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-24 11:39:47
