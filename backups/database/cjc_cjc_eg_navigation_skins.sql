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
-- Table structure for table `cjc_eg_navigation_skins`
--

DROP TABLE IF EXISTS `cjc_eg_navigation_skins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cjc_eg_navigation_skins` (
  `id` mediumint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `handle` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `css` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `handle` (`handle`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cjc_eg_navigation_skins`
--

LOCK TABLES `cjc_eg_navigation_skins` WRITE;
/*!40000 ALTER TABLE `cjc_eg_navigation_skins` DISABLE KEYS */;
INSERT INTO `cjc_eg_navigation_skins` VALUES (1,'Flat Light','flat-light','/********************************\r\n	-	FLAT LIGHT BUTTONS -\r\n*********************************/\r\n.flat-light .navigationbuttons,\r\n.flat-light .esg-pagination,\r\n.flat-light .esg-filters{	text-transform:uppercase;\r\n							text-align: center;\r\n						}\r\n\r\n.flat-light .esg-filterbutton,\r\n.flat-light .esg-navigationbutton,\r\n.flat-light .esg-sortbutton,\r\n.flat-light .esg-cartbutton {	color:#000;\r\n								margin-right:5px;\r\n								cursor:pointer;\r\n								position: relative;\r\n								z-index:2;\r\n								padding:1px 30px;\r\n								border:none;\r\n								line-height:38px;\r\n								border-radius:5px;\r\n								-moz-border-radius:5px;\r\n								-webkit-border-radius:5px;\r\n								font-size:12px;\r\n								font-weight:700;\r\n								font-family:\"Open Sans\",sans-serif;\r\n								display: inline-block;\r\n								background: #fff;\r\n								margin-bottom:5px;\r\n							}\r\n\r\n.flat-light .esg-navigationbutton	{ padding:2px 12px; }\r\n.flat-light .esg-navigationbutton *	{ color:#000; }\r\n.flat-light .esg-pagination-button:last-child { margin-right: 0; }\r\n\r\n.flat-light  .esg-sortbutton-wrapper,\r\n.flat-light  .esg-cartbutton-wrapper { display:inline-block; }\r\n.flat-light  .esg-sortbutton-order,\r\n.flat-light  .esg-cartbutton-order {	display:inline-block;\r\n										vertical-align:top;\r\n										border:none;\r\n										width:40px;\r\n										line-height:40px;\r\n										border-radius:5px;\r\n										-moz-border-radius:5px;\r\n										-webkit-border-radius:5px;\r\n										font-size:12px;\r\n										font-weight:700;\r\n										color:#999;\r\n										cursor: pointer;\r\n										background:#eee;\r\n										background: #fff;\r\n										margin-left:5px;\r\n									}\r\n\r\n.flat-light .esg-cartbutton {	color:#fff;\r\n								cursor: default !important;\r\n							}\r\n.flat-light .esg-cartbutton .esgicon-basket	{\r\n												color:#fff;\r\n												font-size:15px;\r\n												line-height:15px;\r\n												margin-right:10px;\r\n											}\r\n.flat-light .esg-cartbutton-wrapper { cursor: default !important; }\r\n\r\n.flat-light .esg-sortbutton,\r\n.flat-light .esg-cartbutton {	display:inline-block;\r\n								position:relative;\r\n								cursor: pointer;\r\n								margin-right:0px;\r\n								border-radius:5px;\r\n								-moz-border-radius:5px;\r\n								-webkit-border-radius:5px;\r\n							}\r\n\r\n.flat-light .esg-navigationbutton:hover,\r\n.flat-light .esg-filterbutton:hover,\r\n.flat-light .esg-sortbutton:hover,\r\n.flat-light .esg-sortbutton-order:hover,\r\n.flat-light .esg-cartbutton-order:hover,\r\n.flat-light .esg-filterbutton.selected {\r\n										border-color:none;color:#000;\r\n										background:#fff;\r\n									   }\r\n\r\n.flat-light .esg-navigationbutton:hover * { color:#333; }\r\n\r\n.flat-light .esg-sortbutton-order.tp-desc:hover	{ color:#333; }\r\n\r\n.flat-light .esg-filter-checked	{	padding:1px 3px;\r\n									color:#cbcbcb;\r\n									background:#cbcbcb;\r\n									margin-left:7px;\r\n									font-size:9px;\r\n									font-weight:300;\r\n									line-height:9px;\r\n									vertical-align: middle;\r\n								}\r\n.flat-light .esg-filterbutton.selected .esg-filter-checked,\r\n.flat-light .esg-filterbutton:hover .esg-filter-checked	{\r\n															padding:1px 3px 1px 3px;\r\n															color:#fff;\r\n															background:#000;\r\n															margin-left:7px;\r\n															font-size:9px;\r\n															font-weight:300;\r\n															line-height:9px;\r\n															vertical-align: middle;\r\n														}'),(2,'Flat Dark','flat-dark','/********************************\r\n	-	FLAT DARK BUTTONS -\r\n*********************************/\r\n.flat-dark .navigationbuttons,\r\n.flat-dark .esg-pagination,\r\n.flat-dark .esg-filters {\r\n							text-transform:uppercase;\r\n							text-align: center;\r\n						}\r\n\r\n.flat-dark .esg-filterbutton,\r\n.flat-dark .esg-navigationbutton,\r\n.flat-dark .esg-sortbutton,\r\n.flat-dark .esg-cartbutton {color:#fff;\r\n							margin-right:5px;\r\n							cursor:pointer;\r\n							padding:1px 30px;\r\n							border:none;\r\n							line-height:38px;\r\n							border-radius:5px;\r\n							-moz-border-radius:5px;\r\n							-webkit-border-radius:5px;\r\n							font-size:12px;\r\n							font-weight:600;\r\n							font-family:\"Open Sans\",sans-serif;\r\n							display: inline-block;\r\n							background:#3a3a3a;\r\n							background: rgba(0,0,0,0.2);\r\n							margin-bottom:5px;\r\n							}\r\n\r\n.flat-dark .esg-navigationbutton { padding:1px 18px; }\r\n.flat-dark .esg-navigationbutton * { color:#fff; }\r\n.flat-dark .esg-pagination-button:last-child,\r\n.flat-dark .esg-filterbutton:last-child{ margin-right: 0; }\r\n.flat-dark .esg-left, .flat-dark .esg-right { padding:1px 12px; }\r\n\r\n.flat-dark  .esg-sortbutton-wrapper,\r\n.flat-dark  .esg-cartbutton-wrapper	{ display:inline-block; }\r\n.flat-dark  .esg-sortbutton-order,\r\n.flat-dark  .esg-cartbutton-order { display:inline-block;\r\n									vertical-align:top;\r\n									border:none;\r\n									width:40px;\r\n									line-height:40px;\r\n									border-radius:5px;\r\n									-moz-border-radius:5px;\r\n									-webkit-border-radius:5px;\r\n									font-size:12px;\r\n									font-weight:700;\r\n									color:#999;\r\n									cursor: pointer;\r\n									background:#eee;\r\n									background: rgba(0,0,0,0.2);\r\n									margin-left:5px;\r\n								}\r\n\r\n.flat-dark .esg-cartbutton {color:#fff;\r\n							cursor: default !important;\r\n							}\r\n.flat-dark .esg-cartbutton .esgicon-basket {color:#fff;\r\n											font-size:15px;\r\n											line-height:15px;\r\n											margin-right:10px;\r\n											}\r\n.flat-dark  .esg-cartbutton-wrapper	{ cursor: default !important; }\r\n\r\n.flat-dark .esg-sortbutton,\r\n.flat-dark .esg-cartbutton { display:inline-block;\r\n							position:relative;\r\n							cursor: pointer;\r\n							margin-right:0px;\r\n							border-radius:5px;\r\n							-moz-border-radius:5px;\r\n							-webkit-border-radius:5px;\r\n							}\r\n\r\n.flat-dark .esg-navigationbutton:hover,\r\n.flat-dark .esg-filterbutton:hover,\r\n.flat-dark .esg-sortbutton:hover,\r\n.flat-dark .esg-sortbutton-order:hover,\r\n.flat-dark .esg-cartbutton-order:hover,\r\n.flat-dark .esg-filterbutton.selected { color:#fff;\r\n										border-color:none;\r\n										background:#4a4a4a;\r\n										background: rgba(0,0,0,0.5);\r\n									 }\r\n\r\n.flat-dark .esg-navigationbutton:hover * { color:#fff; }\r\n.flat-dark .esg-sortbutton-order.tp-desc:hover	{ color:#fff; }\r\n.flat-dark .esg-filter-checked {padding:1px 3px;\r\n								color:transparent;\r\n								background:#000;\r\n								background: rgba(0,0,0,0.2);\r\n								margin-left:7px;\r\n								font-size:9px;\r\n								font-weight:300;\r\n								line-height:9px;\r\n								vertical-align: middle:\r\n								}\r\n								\r\n.flat-dark .esg-filterbutton.selected .esg-filter-checked,\r\n.flat-dark .esg-filterbutton:hover .esg-filter-checked {padding:1px 3px 1px 3px;\r\n														color:#fff;\r\n														background:#000;\r\n														background: rgba(0,0,0,0.2);\r\n														margin-left:7px;\r\n														font-size:9px;\r\n														font-weight:300;\r\n														line-height:9px;\r\n														vertical-align: middle\r\n														}'),(3,'Minimal Dark','minimal-dark','/********************************\r\n	-	MINIMAL DARK BUTTONS -\r\n*********************************/\r\n\r\n.minimal-dark .navigationbuttons,\r\n.minimal-dark .esg-pagination,\r\n.minimal-dark .esg-filters { text-align: center; }\r\n\r\n.minimal-dark .esg-filterbutton,\r\n.minimal-dark .esg-navigationbutton,\r\n.minimal-dark .esg-sortbutton,\r\n.minimal-dark .esg-cartbutton { color:#fff;\r\n								color:rgba(255,255,255,1);\r\n								margin-right:5px;\r\n								cursor:pointer;\r\n								padding:0px 17px;\r\n								border:1px solid rgb(255,255,255);\r\n								border:1px solid rgba(255,255,255,0.1);\r\n								line-height:38px;\r\n								border-radius:5px;\r\n								-moz-border-radius:5px;\r\n								-webkit-border-radius:5px;\r\n								font-size:12px;\r\n								font-weight:600;\r\n								font-family:\"Open Sans\",sans-serif;\r\n								display: inline-block;\r\n								background:transparent;\r\n								margin-bottom:5px;\r\n								}\r\n\r\n\r\n.minimal-dark .esg-navigationbutton * {\r\n										color:#fff;\r\n										color:rgba(255,255,255,1);\r\n									}\r\n.minimal-dark .esg-navigationbutton	{ padding:0px 11px; }\r\n.minimal-dark .esg-pagination-button { padding:0px 16px; }\r\n.minimal-dark .esg-pagination-button:last-child { margin-right: 0; }\r\n\r\n.minimal-dark  .esg-sortbutton-wrapper,\r\n.minimal-dark  .esg-cartbutton-wrapper { display:inline-block; }\r\n.minimal-dark  .esg-sortbutton-order,\r\n.minimal-dark  .esg-cartbutton-order {  display:inline-block;\r\n										vertical-align:top;\r\n										border:1px solid rgb(255,255,255);\r\n										border:1px solid rgba(255,255,255,0.1);\r\n										width:40px;\r\n										line-height:38px;\r\n										border-radius: 0px 5px 5px 0px;\r\n										-moz-border-radius: 0px 5px 5px 0px;\r\n										-webkit-border-radius: 0px 5px 5px 0px;\r\n										font-size:12px;\r\n										font-weight:600;\r\n										color:#fff;\r\n										cursor: pointer;\r\n										background:transparent;\r\n									}\r\n\r\n.minimal-dark .esg-cartbutton {\r\n								color:#fff;\r\n								cursor: default !important;\r\n							  }\r\n.minimal-dark .esg-cartbutton .esgicon-basket {\r\n												color:#fff;\r\n												font-size:15px;\r\n												line-height:15px;\r\n												margin-right:10px;\r\n											  }\r\n.minimal-dark  .esg-cartbutton-wrapper { cursor: default !important; }\r\n\r\n.minimal-dark .esg-sortbutton,\r\n.minimal-dark .esg-cartbutton {\r\n								display:inline-block;\r\n								position:relative;\r\n								cursor: pointer;\r\n								margin-right:0px;\r\n								border-right:none;\r\n								border-radius:5px 0px 0px 5px;\r\n								-moz-border-radius:5px 0px 0px 5px;\r\n								-webkit-border-radius:5px 0px 0px 5px;\r\n							   }\r\n\r\n.minimal-dark .esg-navigationbutton:hover,\r\n.minimal-dark .esg-filterbutton:hover,\r\n.minimal-dark .esg-sortbutton:hover,\r\n.minimal-dark .esg-sortbutton-order:hover,\r\n.minimal-dark .esg-cartbutton-order:hover,\r\n.minimal-dark .esg-filterbutton.selected {\r\n											border-color:#fff;\r\n											border-color:rgba(255,255,255,0.2);\r\n											color:#fff;\r\n											box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.13);\r\n											background:#333;\r\n											background: rgba(255,255,255,0.1);\r\n										  }\r\n\r\n.minimal-dark .esg-navigationbutton:hover * { color:#fff; }\r\n\r\n.minimal-dark .esg-sortbutton-order.tp-desc:hover {	border-color:#fff;\r\n													border-color:rgba(255,255,255,0.2);\r\n													color:#fff;\r\n													box-shadow: 0px -3px 5px 0px rgba(0,0,0,0.13) !important;\r\n												  }\r\n\r\n.minimal-dark .esg-filter-checked {\r\n									padding:1px 3px;\r\n									color:transparent;\r\n									background:#000;\r\n									background: rgba(0,0,0,0.10);\r\n									margin-left:7px;\r\n									font-size:9px;\r\n									font-weight:300;\r\n									line-height:9px;\r\n									vertical-align: middle;\r\n								  }\r\n.minimal-dark .esg-filterbutton.selected .esg-filter-checked,\r\n.minimal-dark .esg-filterbutton:hover .esg-filter-checked {\r\n															padding:1px 3px 1px 3px;\r\n															color:#fff;\r\n															background:#000;\r\n															background: rgba(0,0,0,0.10);\r\n															margin-left:7px;\r\n															font-size:9px;\r\n															font-weight:300;\r\n															line-height:9px;\r\n															vertical-align: middle;\r\n														  }'),(4,'Minimal Light','minimal-light','/******************************\r\n	-	MINIMAL LIGHT SKIN	-\r\n********************************/\r\n\r\n.minimal-light .navigationbuttons,\r\n.minimal-light .esg-pagination,\r\n.minimal-light .esg-filters { text-align: center; }\r\n\r\n.minimal-light .esg-filterbutton,\r\n.minimal-light .esg-navigationbutton,\r\n.minimal-light .esg-sortbutton,\r\n.minimal-light .esg-cartbutton a{ \r\n								color:#999;\r\n								margin-right:5px;\r\n								cursor:pointer;\r\n								padding:0px 16px;\r\n								border:1px solid #e5e5e5;\r\n								line-height:38px;\r\n								border-radius:5px;\r\n								-moz-border-radius:5px;\r\n								-webkit-border-radius:5px;\r\n								font-size:12px;\r\n								font-weight:700;\r\n								font-family:\"Open Sans\",sans-serif;\r\n								display: inline-block;\r\n								background:#fff;\r\n								margin-bottom:5px;\r\n							  }\r\n\r\n/*.minimal-light .esg-cartbutton a { color: #999; }*/\r\n\r\n.minimal-light .esg-navigationbutton * { color:#999; }\r\n.minimal-light .esg-navigationbutton	{ padding:0px 16px; }\r\n.minimal-light .esg-pagination-button:last-child { margin-right: 0; }\r\n.minimal-light .esg-left, .minimal-light .esg-right	{ padding:0px 11px; }\r\n\r\n.minimal-light  .esg-sortbutton-wrapper,\r\n.minimal-light  .esg-cartbutton-wrapper { display:inline-block; }\r\n.minimal-light  .esg-sortbutton-order,\r\n.minimal-light  .esg-cartbutton-order {	display:inline-block;\r\n										vertical-align:top;\r\n										border:1px solid #e5e5e5;\r\n										width:40px;\r\n										line-height:38px;\r\n										border-radius: 0px 5px 5px 0px;\r\n										-moz-border-radius: 0px 5px 5px 0px;\r\n										-webkit-border-radius: 0px 5px 5px 0px;\r\n										font-size:12px;\r\n										font-weight:700;\r\n										color:#999;\r\n										cursor: pointer;\r\n										background:#fff;\r\n									   }\r\n\r\n.minimal-light .esg-cartbutton {\r\n								color:#333;\r\n								cursor: default !important;\r\n								}\r\n.minimal-light .esg-cartbutton .esgicon-basket {color:#333;\r\n												font-size:15px;\r\n												line-height:15px;\r\n												margin-right:10px;\r\n												}\r\n.minimal-light  .esg-cartbutton-wrapper { cursor: default !important; }\r\n\r\n.minimal-light .esg-sortbutton,\r\n.minimal-light .esg-cartbutton { display:inline-block;\r\n								position:relative;\r\n								cursor: pointer;\r\n								margin-right:0px;\r\n								border-right:none;\r\n								border-radius:5px 0px 0px 5px;\r\n								-moz-border-radius:5px 0px 0px 5px;\r\n								-webkit-border-radius:5px 0px 0px 5px;\r\n								}\r\n\r\n.minimal-light .esg-navigationbutton:hover,\r\n.minimal-light .esg-filterbutton:hover,\r\n.minimal-light .esg-sortbutton:hover,\r\n.minimal-light .esg-sortbutton-order:hover,\r\n.minimal-light .esg-cartbutton a:hover,\r\n.minimal-light .esg-filterbutton.selected {\r\n											background-color:#fff;\r\n											border-color:#bbb;\r\n											color:#333;\r\n											box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.13);\r\n										  }\r\n\r\n.minimal-light .esg-navigationbutton:hover * { color:#333; }\r\n\r\n.minimal-light .esg-sortbutton-order.tp-desc:hover {\r\n													border-color:#bbb;\r\n													color:#333;\r\n													box-shadow: 0px -3px 5px 0px rgba(0,0,0,0.13) !important;\r\n												   }\r\n\r\n.minimal-light .esg-filter-checked { \r\n									padding:1px 3px;\r\n									color:#cbcbcb;\r\n									background:#cbcbcb;\r\n									margin-left:7px;\r\n									font-size:9px;\r\n									font-weight:300;\r\n									line-height:9px;\r\n									vertical-align: middle;\r\n									}\r\n.minimal-light .esg-filterbutton.selected .esg-filter-checked,\r\n.minimal-light .esg-filterbutton:hover .esg-filter-checked {\r\n															padding:1px 3px 1px 3px;\r\n															color:#fff;\r\n															background:#000;\r\n															margin-left:7px;\r\n															font-size:9px;\r\n															font-weight:300;\r\n															line-height:9px;\r\n															vertical-align: middle;\r\n														   }'),(5,'Simple Light','simple-light','/******************************\r\n	-	SIMPLE LIGHT SKIN	-\r\n********************************/\r\n\r\n.simple-light .navigationbuttons,\r\n.simple-light .esg-pagination,\r\n.simple-light .esg-filters { text-align: center; }\r\n\r\n.simple-light .esg-filterbutton,\r\n.simple-light .esg-navigationbutton,\r\n.simple-light .esg-sortbutton,\r\n.simple-light .esg-cartbutton a {\r\n								color:#000;\r\n								margin-right:5px;\r\n								cursor:pointer;\r\n								padding:0px 11px;\r\n								border:1px solid #e5e5e5;\r\n								line-height:30px;\r\n								font-size:12px;\r\n								font-weight:400;\r\n								font-family:\\\\\\\"Open Sans\\\\\\\",sans-serif;\r\n								display: inline-block;\r\n								background:#eee;\r\n								margin-bottom:5px;\r\n							  }\r\n\r\n.simple-light .esg-navigationbutton * {	color:#000; }\r\n.simple-light .esg-left,\r\n.simple-light .esg-right { color:#000; padding:0px 7px;}\r\n.simple-light .esg-pagination-button:last-child { margin-right: 0; }\r\n\r\n.simple-light .esg-sortbutton-wrapper,\r\n.simple-light .esg-cartbutton-wrapper {	display:inline-block; }\r\n.simple-light .esg-sortbutton-order,\r\n.simple-light .esg-cartbutton-order {\r\n									display: inline-block;\r\n									vertical-align: top;\r\n									border: 1px solid #e5e5e5;\r\n									width: 29px;\r\n									line-height: 30px;\r\n									font-size: 9px;\r\n									font-weight: 400;\r\n									color: #000;\r\n									cursor: pointer;\r\n									background: #eee;\r\n									}\r\n\r\n.simple-light .esg-cartbutton {\r\n								color:#333;\r\n								cursor: default !important;\r\n							  }\r\n.simple-light .esg-cartbutton .esgicon-basket {\r\n												color:#333;\r\n												font-size:15px;\r\n												line-height:15px;\r\n												margin-right:10px;\r\n											  }\r\n.simple-light  .esg-cartbutton-wrapper { cursor: default !important; }\r\n\r\n.simple-light .esg-sortbutton,\r\n.simple-light .esg-cartbutton {\r\n								display:inline-block;\r\n								position:relative;\r\n								cursor: pointer;\r\n								margin-right:5px;\r\n							  }\r\n\r\n\r\n.simple-light .esg-navigationbutton:hover,\r\n.simple-light .esg-filterbutton:hover,\r\n.simple-light .esg-sortbutton:hover,\r\n.simple-light .esg-sortbutton-order:hover,\r\n.simple-light .esg-cartbutton a:hover,\r\n.simple-light .esg-filterbutton.selected {\r\n											background-color:#fff;\r\n											border-color:#bbb;\r\n											color:#333;\r\n											box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.13);\r\n										 }\r\n\r\n.simple-light .esg-navigationbutton:hover * { color:#333; }\r\n\r\n.simple-light .esg-sortbutton-order.tp-desc:hover {\r\n													border-color:#bbb;\r\n													color:#333;\r\n													box-shadow: 0px -3px 5px 0px rgba(0,0,0,0.13) !important;\r\n												  }\r\n\r\n.simple-light .esg-filter-checked {\r\n									padding:3px;\r\n									color:#c5c5c5;\r\n									background:#ddd;\r\n									margin-left:7px;\r\n									font-size:9px;\r\n									font-weight:400;\r\n									line-height:20px;\r\n									vertical-align: middle;\r\n								  }\r\n.simple-light .esg-filterbutton.selected .esg-filter-checked,\r\n.simple-light .esg-filterbutton:hover .esg-filter-checked {\r\n															padding: 3px;\r\n															color:#fff;\r\n															background:#000;\r\n															margin-left:7px;\r\n															font-size:9px;\r\n															font-weight:400;\r\n															line-height:20px;\r\n															vertical-align: middle\r\n														}'),(6,'Simple Dark','simple-dark','/********************************\r\n-	SIMPLE DARK BUTTONS -\r\n*********************************/\r\n\r\n.simple-dark .navigationbuttons,\r\n.simple-dark .esg-pagination,\r\n.simple-dark .esg-filters {	text-align: center; }\r\n\r\n.simple-dark .esg-filterbutton,\r\n.simple-dark .esg-navigationbutton,\r\n.simple-dark .esg-sortbutton,\r\n.simple-dark .esg-cartbutton {\r\n								color:#fff;\r\n								margin-right:5px;\r\n								cursor:pointer;\r\n								padding:0px 10px;\r\n								border:1px solid rgb(255,255,255);\r\n								border:1px solid rgba(255,255,255,0.15);\r\n								line-height:29px;\r\n								font-size:12px;\r\n								font-weight:600;\r\n								font-family:\"Open Sans\",sans-serif;\r\n								display: inline-block;\r\n								background: rgba(255,255,255,0.08 );\r\n								margin-bottom:5px;\r\n							  }\r\n\r\n.simple-dark .esg-navigationbutton * {\r\n										color:#fff;\r\n									 }\r\n.simple-dark .esg-left, .simple-dark .esg-right { padding:0px 5px !important; }\r\n\r\n.simple-dark  .esg-sortbutton-wrapper,\r\n.simple-dark  .esg-cartbutton-wrapper {	display:inline-block; }\r\n.simple-dark  .esg-sortbutton-order,\r\n.simple-dark  .esg-cartbutton-order {\r\n									display: inline-block;\r\n									vertical-align: top;\r\n									border:1px solid rgb(255,255,255);\r\n									border:1px solid rgba(255,255,255,0.15);\r\n									width: 29px;\r\n									line-height: 29px;\r\n									font-size: 9px;\r\n									font-weight: 600;\r\n									color: #fff;\r\n									cursor: pointer;\r\n									background: rgba(255,255,255,0.08 );\r\n									}\r\n\r\n.simple-dark .esg-cartbutton {\r\n							color:#fff;\r\n							cursor: default !important;\r\n							}\r\n							\r\n.simple-dark .esg-cartbutton .esgicon-basket {\r\n												color:#fff;\r\n												font-size:15px;\r\n												line-height:15px;\r\n												margin-right:10px;\r\n											  }\r\n.simple-dark  .esg-cartbutton-wrapper {	cursor: default !important; }\r\n\r\n.simple-dark .esg-sortbutton,\r\n.simple-dark .esg-cartbutton {\r\n								display:inline-block;\r\n								position:relative;\r\n								cursor: pointer;\r\n								margin-right:5px;\r\n							  }\r\n\r\n\r\n.simple-dark .esg-navigationbutton:hover,\r\n.simple-dark .esg-filterbutton:hover,\r\n.simple-dark .esg-sortbutton:hover,\r\n.simple-dark .esg-sortbutton-order:hover,\r\n.simple-dark .esg-cartbutton-order:hover,\r\n.simple-dark .esg-filterbutton.selected {\r\n										border-color:#fff;\r\n										color:#000;\r\n										box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.13);\r\n										background:#fff;\r\n										}\r\n\r\n.simple-dark .esg-navigationbutton:hover * { color:#000; }\r\n.simple-dark .esg-pagination-button:last-child { margin-right: 0; }\r\n\r\n.simple-dark .esg-sortbutton-order.tp-desc:hover {\r\n													border-color:#fff;\r\n													border-color:rgba(255,255,255,0.2);\r\n													color:#000;\r\n													box-shadow: 0px -3px 5px 0px rgba(0,0,0,0.13) !important;\r\n												 }\r\n\r\n.simple-dark .esg-filter-checked {\r\n									padding:1px;\r\n									color:transparent;\r\n									background:#000;\r\n									background: rgba(255,255,255,0.15);\r\n									margin-left:7px;\r\n									font-size:9px;\r\n									font-weight:300;\r\n									line-height:9px;\r\n									vertical-align: middle;\r\n								  }\r\n\r\n.simple-dark .esg-filterbutton.selected .esg-filter-checked,\r\n.simple-dark .esg-filterbutton:hover .esg-filter-checked {\r\n															padding:1px;\r\n															color:#000;\r\n															background:#fff;\r\n															margin-left:7px;\r\n															font-size:9px;\r\n															font-weight:300;\r\n															line-height:9px;\r\n															vertical-align: middle;\r\n														  }'),(7,'Text Dark','text-dark','/********************************\r\n-	TEXT DARK BUTTONS -\r\n*********************************/\r\n\r\n.text-dark .navigationbuttons,\r\n.text-dark .esg-pagination,\r\n.text-dark .esg-filters { text-align: center; }\r\n\r\n.text-dark .esg-filterbutton,\r\n.text-dark .esg-navigationbutton,\r\n.text-dark .esg-sortbutton,\r\n.text-dark .esg-cartbutton {\r\n							color:#fff;\r\n							color:rgba(255,255,255,0.4);\r\n							margin-right:5px;\r\n							cursor:pointer;\r\n							padding:0px 15px 0px 10px;\r\n							line-height:20px;\r\n							font-size:12px;\r\n							font-weight:600;\r\n							font-family:\"Open Sans\",sans-serif;\r\n							display: inline-block;\r\n							background:transparent;\r\n							margin-bottom:5px;\r\n						  }\r\n\r\n.text-dark .esg-navigationbutton * {\r\n									color:#fff;\r\n									color:rgba(255,255,255,0.4);\r\n								   }\r\n\r\n.text-dark  .esg-sortbutton-wrapper,\r\n.text-dark  .esg-cartbutton-wrapper { display:inline-block; }\r\n.text-dark  .esg-sortbutton-order,\r\n.text-dark  .esg-cartbutton-order {\r\n									display: inline-block;\r\n									vertical-align: middle;\r\n									width: 29px;\r\n									line-height: 20px;\r\n									font-size: 9px;\r\n									font-weight: 700;\r\n									color:#fff;\r\n									color:rgba(255,255,255,0.4);\r\n									cursor: pointer;\r\n									background: transparent;\r\n								  }\r\n\r\n.text-dark .esg-cartbutton {\r\n							color:#fff;\r\n							color:rgba(255,255,255,0.4);\r\n							cursor: default !important;\r\n							}\r\n.text-dark .esg-cartbutton .esgicon-basket {\r\n											color:#fff;\r\n											color:rgba(255,255,255,0.4);\r\n											font-size:15px;\r\n											line-height:15px;\r\n											margin-right:10px;\r\n											}\r\n.text-dark  .esg-cartbutton-wrapper { cursor: default !important; }\r\n\r\n.text-dark .esg-sortbutton,\r\n.text-dark .esg-cartbutton {\r\n							display:inline-block;\r\n							position:relative;\r\n							cursor: pointer;\r\n							margin-right:0px;\r\n							}\r\n\r\n.text-dark .esg-navigationbutton:hover,\r\n.text-dark .esg-filterbutton:hover,\r\n.text-dark .esg-sortbutton:hover,\r\n.text-dark .esg-filterbutton.selected,\r\n.text-dark .esg-sortbutton-order:hover,\r\n.text-dark .esg-cartbutton-order:hover { color:#fff; }\r\n\r\n.text-dark .esg-navigationbutton:hover,\r\n.text-dark .esg-filterbutton:hover span:first-child,\r\n.text-dark .esg-filterbutton.selected span:first-child { text-decoration: none; }\r\n\r\n.text-dark .esg-filterbutton {\r\n								border-right:1px solid #fff;\r\n								border-right:1px solid rgba(255,255,255,0.15);\r\n							  }\r\n.text-dark .esg-filterbutton:last-child	{ border-right:none; }\r\n\r\n.text-dark .esg-sortbutton-order {\r\n									padding-left:10px;\r\n									border-left:1px solid #fff;\r\n									border-left:1px solid rgba(255,255,255,0.15);\r\n								 }\r\n\r\n.text-dark .esg-navigationbutton:hover * { color:#fff; }\r\n\r\n.text-dark .esg-sortbutton-order.tp-desc:hover {\r\n												border-color:#fff;\r\n												border-color:rgba(255,255,255,0.15);\r\n												color:#fff;\r\n												}\r\n\r\n.text-dark .esg-filter-checked {\r\n								padding:1px 3px;\r\n								color:transparent;\r\n								background:#000;\r\n								background: rgba(0,0,0,0.10);\r\n								margin-left:7px;\r\n								font-size:9px;\r\n								font-weight:300;\r\n								line-height:9px;\r\n								vertical-align: middle;\r\n								}\r\n\r\n.text-dark .esg-filter-checked * { }\r\n.text-dark .esg-filterbutton.selected .esg-filter-checked,\r\n.text-dark .esg-filterbutton:hover .esg-filter-checked {\r\n														padding:1px 3px 1px 3px;\r\n														color:#fff;\r\n														background:#000;\r\n														background: rgba(0,0,0,0.10);\r\n														margin-left:7px;\r\n														font-size:9px;\r\n														font-weight:300;\r\n														line-height:9px;\r\n														vertical-align: middle\r\n														}'),(8,'Text Light','text-light','/********************************\r\n-	TEXT LIGHT BUTTONS -\r\n*********************************/\r\n\r\n.text-light .navigationbuttons,\r\n.text-light .esg-pagination,\r\n.text-light .esg-filters {\r\n						text-align: center;\r\n						position: relative;\r\n						z-index:2;\r\n						}\r\n\r\n.text-light .esg-filterbutton,\r\n.text-light .esg-navigationbutton,\r\n.text-light .esg-sortbutton,\r\n.text-light .esg-cartbutton {\r\n							color:#999;\r\n							margin-right:5px;\r\n							cursor:pointer;\r\n							padding:0px 15px 0px 10px;\r\n							line-height:20px;\r\n							font-size:12px;\r\n							font-weight:600;\r\n							font-family:\"Open Sans\",sans-serif;\r\n							display: inline-block;\r\n							background:transparent;\r\n							margin-bottom:5px;\r\n							}\r\n\r\n.text-light .esg-navigationbutton * { color:#999; }\r\n\r\n.text-light  .esg-sortbutton-wrapper,\r\n.text-light  .esg-cartbutton-wrapper { display:inline-block; }\r\n.text-light  .esg-sortbutton-order,\r\n.text-light  .esg-cartbutton-order {\r\n									display: inline-block;\r\n									vertical-align: middle;\r\n									width: 29px;\r\n									line-height: 20px;\r\n									font-size: 9px;\r\n									font-weight: 700;\r\n									color:#999;\r\n									cursor: pointer;\r\n									background: transparent;\r\n									}\r\n\r\n.text-light .esg-cartbutton {\r\n							color:#999;\r\n							cursor: default !important;\r\n							}\r\n.text-light .esg-cartbutton .esgicon-basket {\r\n											color:#999;\r\n											font-size:15px;\r\n											line-height:15px;\r\n											margin-right:10px;\r\n											}\r\n.text-light .esg-cartbutton-wrapper { cursor: default !important; }\r\n\r\n.text-light .esg-sortbutton,\r\n.text-light .esg-cartbutton {\r\n							display:inline-block;\r\n							position:relative;\r\n							cursor: pointer;\r\n							margin-right:0px;\r\n							}\r\n\r\n.text-light .esg-navigationbutton:hover,\r\n.text-light .esg-filterbutton:hover,\r\n.text-light .esg-sortbutton:hover,\r\n.text-light .esg-filterbutton.selected,\r\n.text-light .esg-sortbutton-order:hover,\r\n.text-light .esg-cartbutton-order:hover { color:#444; }\r\n\r\n.text-light .esg-navigationbutton:hover,\r\n.text-light .esg-filterbutton:hover span:first-child,\r\n.text-light .esg-filterbutton.selected span:first-child { text-decoration: underline; }\r\n\r\n.text-light .esg-filterbutton {	border-right:1px solid #e5e5e5; }\r\n.text-light .esg-filterbutton:last-child { border-right:none; }\r\n\r\n.text-light .esg-sortbutton-order {\r\n									padding-left:10px;\r\n									border-left:1px solid #e5e5e5;\r\n								  }\r\n\r\n.text-light .esg-navigationbutton:hover * {	color:#444; }\r\n\r\n.text-light .esg-sortbutton-order.tp-desc:hover {\r\n												border-color:#e5e5e5;\r\n												color:#444;\r\n												}\r\n\r\n.text-light .esg-filter-checked {\r\n								padding:1px 3px;\r\n								color:transparent;\r\n								background:#eee;\r\n								background: rgba(0,0,0,0.05);\r\n								margin-left:7px;\r\n								font-size:9px;\r\n								font-weight:300;\r\n								line-height:9px;\r\n								vertical-align: middle;\r\n								}\r\n.text-light .esg-filter-checked * { }\r\n.text-light .esg-filterbutton.selected .esg-filter-checked,\r\n.text-light .esg-filterbutton:hover .esg-filter-checked {\r\n														padding:1px 3px 1px 3px;\r\n														color:#333;\r\n														background:#eee;\r\n														background: rgba(0,0,0,0.05);\r\n														margin-left:7px;\r\n														font-size:9px;\r\n														font-weight:300;\r\n														line-height:9px;\r\n														vertical-align: middle;\r\n														}\r\n');
/*!40000 ALTER TABLE `cjc_eg_navigation_skins` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-09  2:10:15
