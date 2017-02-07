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
-- Table structure for table `cjc_revslider_slides`
--

DROP TABLE IF EXISTS `cjc_revslider_slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cjc_revslider_slides` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `slider_id` int(9) NOT NULL,
  `slide_order` int(11) NOT NULL,
  `params` longtext COLLATE utf8_unicode_ci NOT NULL,
  `layers` longtext COLLATE utf8_unicode_ci NOT NULL,
  `settings` text COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cjc_revslider_slides`
--

LOCK TABLES `cjc_revslider_slides` WRITE;
/*!40000 ALTER TABLE `cjc_revslider_slides` DISABLE KEYS */;
INSERT INTO `cjc_revslider_slides` VALUES (1,1,1,'{\"background_type\":\"image\",\"rs-gallery-type\":\"gallery\",\"bg_external\":\"\",\"bg_color\":\"#E7E7E7\",\"0\":\"Clear\",\"slide_bg_youtube\":\"\",\"slide_bg_vimeo\":\"\",\"slide_bg_html_mpeg\":\"\",\"slide_bg_html_webm\":\"\",\"slide_bg_html_ogv\":\"\",\"image_source_type\":\"full\",\"alt_option\":\"media_library\",\"alt_attr\":\"\",\"ext_width\":\"1920\",\"ext_height\":\"1080\",\"title_option\":\"media_library\",\"title_attr\":\"\",\"video_force_cover\":\"on\",\"video_dotted_overlay\":\"none\",\"video_ratio\":\"16:9\",\"video_start_at\":\"\",\"video_end_at\":\"\",\"video_loop\":\"none\",\"video_nextslide\":\"off\",\"video_force_rewind\":\"on\",\"video_mute\":\"on\",\"video_volume\":\"\",\"video_speed\":\"1\",\"video_arguments\":\"hd=1&wmode=opaque&showinfo=0&rel=0;\",\"video_arguments_vim\":\"title=0&byline=0&portrait=0&api=1\",\"bg_fit\":\"cover\",\"bg_fit_x\":\"100\",\"bg_fit_y\":\"100\",\"bg_position\":\"center center\",\"bg_position_x\":\"0\",\"bg_position_y\":\"0\",\"bg_repeat\":\"no-repeat\",\"slide_parallax_level\":\"-\",\"media-filter-type\":\"none\",\"kenburn_effect\":\"off\",\"kb_start_fit\":\"100\",\"kb_end_fit\":\"100\",\"kb_start_offset_x\":\"0\",\"kb_end_offset_x\":\"0\",\"kb_start_offset_y\":\"0\",\"kb_end_offset_y\":\"0\",\"kb_start_rotate\":\"0\",\"kb_end_rotate\":\"0\",\"kb_easing\":\"Linear.easeNone\",\"kb_duration\":\"10000\",\"image_id\":\"285\",\"title\":\"Slide\",\"delay\":\"\",\"stoponpurpose\":\"false\",\"invisibleslide\":\"false\",\"state\":\"published\",\"hideslideafter\":\"0\",\"hideslideonmobile\":\"off\",\"date_from\":\"\",\"date_to\":\"\",\"save_performance\":\"off\",\"slide_thumb\":\"\",\"thumb_dimension\":\"slider\",\"thumb_for_admin\":\"off\",\"slide_transition\":[\"fade\"],\"slot_amount\":[\"default\"],\"transition_rotation\":[\"0\"],\"transition_duration\":[\"300\"],\"transition_ease_in\":[\"default\"],\"transition_ease_out\":[\"default\"],\"ph-round-arrows-bg-color-custom-slide\":\"off\",\"ph-round-arrows-bg-color-custom\":\"0,0,0,0.5\",\"ph-round-arrows-bg-size-custom-slide\":\"off\",\"ph-round-arrows-bg-size-custom\":\"40\",\"ph-round-arrows-arrow-color-color-slide\":\"off\",\"ph-round-arrows-arrow-color-color\":\"#ffffff\",\"ph-round-arrows-arrow-size-custom-slide\":\"off\",\"ph-round-arrows-arrow-size-custom\":\"20\",\"ph-round-arrows-hover-bg-color-color-rgba-slide\":\"off\",\"ph-round-arrows-hover-bg-color-color-rgba\":\"#000000\",\"ph-round-old-bullets-bullet-size-custom-slide\":\"off\",\"ph-round-old-bullets-bullet-size-custom\":\"12\",\"ph-round-old-bullets-back-color-color-rgba-slide\":\"off\",\"ph-round-old-bullets-back-color-color-rgba\":\"#999999\",\"ph-round-old-bullets-border-color-color-rgba-slide\":\"off\",\"ph-round-old-bullets-border-color-color-rgba\":\"rgba(255,255,255,0.9)\",\"ph-round-old-bullets-border-size-custom-slide\":\"off\",\"ph-round-old-bullets-border-size-custom\":\"3\",\"ph-round-old-bullets-back-hover-color-color-rgba-slide\":\"off\",\"ph-round-old-bullets-back-hover-color-color-rgba\":\"#ffffff\",\"ph-round-old-bullets-border-hover-color-color-rgba-slide\":\"off\",\"ph-round-old-bullets-border-hover-color-color-rgba\":\"#000000\",\"ph-round-thumbs-title-bg-color-rgba-slide\":\"off\",\"ph-round-thumbs-title-bg-color-rgba\":\"rgba(0,0,0,0.85)\",\"ph-round-thumbs-title-color-color-rgba-slide\":\"off\",\"ph-round-thumbs-title-color-color-rgba\":\"#ffffff\",\"ph-round-thumbs-title-font-size-custom-slide\":\"off\",\"ph-round-thumbs-title-font-size-custom\":\"12\",\"params_1\":\"\",\"params_1_chars\":\"10\",\"params_2\":\"\",\"params_2_chars\":\"10\",\"params_3\":\"\",\"params_3_chars\":\"10\",\"params_4\":\"\",\"params_4_chars\":\"10\",\"params_5\":\"\",\"params_5_chars\":\"10\",\"params_6\":\"\",\"params_6_chars\":\"10\",\"params_7\":\"\",\"params_7_chars\":\"10\",\"params_8\":\"\",\"params_8_chars\":\"10\",\"params_9\":\"\",\"params_9_chars\":\"10\",\"params_10\":\"\",\"params_10_chars\":\"10\",\"slide_description\":\"\",\"class_attr\":\"\",\"id_attr\":\"\",\"data_attr\":\"\",\"enable_link\":\"false\",\"link_type\":\"regular\",\"link\":\"\",\"link_open_in\":\"same\",\"slide_link\":\"nothing\",\"link_pos\":\"front\",\"slide_bg_color\":\"#E7E7E7\",\"slide_bg_external\":\"\",\"image\":\"http:\\/\\/104.40.211.237\\/Cairo-Jazz-Club.wp\\/website\\/wp-content\\/uploads\\/2017\\/01\\/hero-1.jpg\",\"0\":\"Clear\"}','[]','\"\"'),(4,1,2,'{\"background_type\":\"image\",\"title\":\"Slide\",\"rs-gallery-type\":\"gallery\",\"bg_external\":\"\",\"bg_color\":\"#E7E7E7\",\"0\":\"Clear\",\"slide_bg_youtube\":\"\",\"slide_bg_vimeo\":\"\",\"slide_bg_html_mpeg\":\"\",\"slide_bg_html_webm\":\"\",\"slide_bg_html_ogv\":\"\",\"image_source_type\":\"full\",\"alt_option\":\"media_library\",\"alt_attr\":\"\",\"ext_width\":\"1920\",\"ext_height\":\"1080\",\"title_option\":\"media_library\",\"title_attr\":\"\",\"video_force_cover\":\"on\",\"video_dotted_overlay\":\"none\",\"video_ratio\":\"16:9\",\"video_start_at\":\"\",\"video_end_at\":\"\",\"video_loop\":\"none\",\"video_nextslide\":\"off\",\"video_force_rewind\":\"on\",\"video_mute\":\"on\",\"video_volume\":\"\",\"video_speed\":\"1\",\"video_arguments\":\"hd=1&wmode=opaque&showinfo=0&rel=0;\",\"video_arguments_vim\":\"title=0&byline=0&portrait=0&api=1\",\"bg_fit\":\"cover\",\"bg_fit_x\":\"100\",\"bg_fit_y\":\"100\",\"bg_position\":\"center center\",\"bg_position_x\":\"0\",\"bg_position_y\":\"0\",\"bg_repeat\":\"no-repeat\",\"slide_parallax_level\":\"-\",\"media-filter-type\":\"none\",\"kenburn_effect\":\"off\",\"kb_start_fit\":\"100\",\"kb_end_fit\":\"100\",\"kb_start_offset_x\":\"0\",\"kb_end_offset_x\":\"0\",\"kb_start_offset_y\":\"0\",\"kb_end_offset_y\":\"0\",\"kb_start_rotate\":\"0\",\"kb_end_rotate\":\"0\",\"kb_easing\":\"Linear.easeNone\",\"kb_duration\":\"10000\",\"image_id\":\"1706\",\"delay\":\"\",\"stoponpurpose\":\"false\",\"invisibleslide\":\"false\",\"state\":\"published\",\"hideslideafter\":\"0\",\"hideslideonmobile\":\"off\",\"date_from\":\"\",\"date_to\":\"\",\"save_performance\":\"off\",\"slide_thumb\":\"\",\"thumb_dimension\":\"slider\",\"thumb_for_admin\":\"off\",\"slide_transition\":[\"fade\"],\"slot_amount\":[\"default\"],\"transition_rotation\":[\"0\"],\"transition_duration\":[\"300\"],\"transition_ease_in\":[\"default\"],\"transition_ease_out\":[\"default\"],\"ph-round-arrows-bg-color-custom-slide\":\"off\",\"ph-round-arrows-bg-color-custom\":\"0,0,0,0.5\",\"ph-round-arrows-bg-size-custom-slide\":\"off\",\"ph-round-arrows-bg-size-custom\":\"40\",\"ph-round-arrows-arrow-color-color-slide\":\"off\",\"ph-round-arrows-arrow-color-color\":\"#ffffff\",\"ph-round-arrows-arrow-size-custom-slide\":\"off\",\"ph-round-arrows-arrow-size-custom\":\"20\",\"ph-round-arrows-hover-bg-color-color-rgba-slide\":\"off\",\"ph-round-arrows-hover-bg-color-color-rgba\":\"#000000\",\"ph-round-old-bullets-bullet-size-custom-slide\":\"off\",\"ph-round-old-bullets-bullet-size-custom\":\"12\",\"ph-round-old-bullets-back-color-color-rgba-slide\":\"off\",\"ph-round-old-bullets-back-color-color-rgba\":\"#999999\",\"ph-round-old-bullets-border-color-color-rgba-slide\":\"off\",\"ph-round-old-bullets-border-color-color-rgba\":\"rgba(255,255,255,0.9)\",\"ph-round-old-bullets-border-size-custom-slide\":\"off\",\"ph-round-old-bullets-border-size-custom\":\"3\",\"ph-round-old-bullets-back-hover-color-color-rgba-slide\":\"off\",\"ph-round-old-bullets-back-hover-color-color-rgba\":\"#ffffff\",\"ph-round-old-bullets-border-hover-color-color-rgba-slide\":\"off\",\"ph-round-old-bullets-border-hover-color-color-rgba\":\"#000000\",\"ph-round-thumbs-title-bg-color-rgba-slide\":\"off\",\"ph-round-thumbs-title-bg-color-rgba\":\"rgba(0,0,0,0.85)\",\"ph-round-thumbs-title-color-color-rgba-slide\":\"off\",\"ph-round-thumbs-title-color-color-rgba\":\"#ffffff\",\"ph-round-thumbs-title-font-size-custom-slide\":\"off\",\"ph-round-thumbs-title-font-size-custom\":\"12\",\"params_1\":\"\",\"params_1_chars\":\"10\",\"params_2\":\"\",\"params_2_chars\":\"10\",\"params_3\":\"\",\"params_3_chars\":\"10\",\"params_4\":\"\",\"params_4_chars\":\"10\",\"params_5\":\"\",\"params_5_chars\":\"10\",\"params_6\":\"\",\"params_6_chars\":\"10\",\"params_7\":\"\",\"params_7_chars\":\"10\",\"params_8\":\"\",\"params_8_chars\":\"10\",\"params_9\":\"\",\"params_9_chars\":\"10\",\"params_10\":\"\",\"params_10_chars\":\"10\",\"slide_description\":\"\",\"class_attr\":\"\",\"id_attr\":\"\",\"data_attr\":\"\",\"enable_link\":\"false\",\"link_type\":\"regular\",\"link\":\"\",\"link_open_in\":\"same\",\"slide_link\":\"nothing\",\"link_pos\":\"front\",\"slide_bg_color\":\"#E7E7E7\",\"slide_bg_external\":\"\",\"image\":\"http:\\/\\/104.40.211.237\\/Cairo-Jazz-Club.wp\\/website\\/wp-content\\/uploads\\/2017\\/02\\/Feb-09-FB.jpg\"}','[]','\"\"');
/*!40000 ALTER TABLE `cjc_revslider_slides` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-07 18:30:34
