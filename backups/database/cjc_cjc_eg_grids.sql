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
-- Table structure for table `cjc_eg_grids`
--

DROP TABLE IF EXISTS `cjc_eg_grids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cjc_eg_grids` (
  `id` mediumint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `handle` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `postparams` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `params` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `layers` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `settings` text COLLATE utf8mb4_unicode_520_ci,
  `last_modified` datetime DEFAULT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `handle` (`handle`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cjc_eg_grids`
--

LOCK TABLES `cjc_eg_grids` WRITE;
/*!40000 ALTER TABLE `cjc_eg_grids` DISABLE KEYS */;
INSERT INTO `cjc_eg_grids` VALUES (2,'Gallery','gallery','{\"source-type\":\"post\",\"post_types\":\"video,albums\",\"post_category\":\"\",\"category-relation\":\"OR\",\"additional-query\":\"\",\"selected_pages\":\"\",\"max_entries\":\"-1\",\"stream-source-type\":\"instagram\",\"youtube-api\":\"\",\"youtube-channel-id\":\"\",\"youtube-type-source\":\"channel\",\"youtube-playlist\":\"\",\"youtube-playlist-select\":\"\",\"youtube-thumb-size\":\"default\",\"youtube-full-size\":\"default\",\"youtube-count\":\"12\",\"youtube-transient-sec\":\"86400\",\"vimeo-type-source\":\"user\",\"vimeo-username\":\"\",\"vimeo-groupname\":\"\",\"vimeo-albumid\":\"\",\"vimeo-channelname\":\"\",\"vimeo-thumb-size\":\"thumbnail_small\",\"vimeo-count\":\"12\",\"vimeo-transient-sec\":\"86400\",\"instagram-user-id\":\"\",\"instagram-thumb-size\":\"Low Resolution\",\"instagram-full-size\":\"Standard Resolution\",\"instagram-count\":\"12\",\"instagram-transient-sec\":\"86400\",\"flickr-api-key\":\"\",\"flickr-type\":\"publicphotos\",\"flickr-user-url\":\"\",\"flickr-photoset\":\"\",\"flickr-photoset-select\":\"\",\"flickr-gallery-url\":\"\",\"flickr-group-url\":\"\",\"flickr-thumb-size\":\"Small 320\",\"flickr-full-size\":\"Medium 800\",\"flickr-count\":\"12\",\"flickr-transient-sec\":\"86400\",\"facebook-app-id\":\"\",\"facebook-app-secret\":\"\",\"facebook-page-url\":\"\",\"facebook-type-source\":\"timeline\",\"facebook-album\":\"\",\"facebook-album-select\":\"\",\"facebook-count\":\"12\",\"facebook-transient-sec\":\"86400\",\"twitter-consumer-key\":\"\",\"twitter-consumer-secret\":\"\",\"twitter-access-token\":\"\",\"twitter-access-secret\":\"\",\"twitter-user-id\":\"\",\"twitter-image-only\":\"true\",\"twitter-include-retweets\":\"on\",\"twitter-exclude-replies\":\"on\",\"twitter-count\":\"12\",\"twitter-transient-sec\":\"86400\",\"media-source-order\":[\"featured-image\"],\"poster-source-order\":[\"featured-image\",\"youtube-image\",\"vimeo-image\"],\"image-source-type\":\"full\",\"media-filter-type\":\"none\",\"default-image\":\"0\",\"youtube-default-image\":\"0\",\"vimeo-default-image\":\"0\",\"html-default-image\":\"0\"}','{\"layout-sizing\":\"boxed\",\"fullscreen-offset-container\":\".site-content\",\"layout\":\"even\",\"content-push\":\"off\",\"x-ratio\":\"4\",\"y-ratio\":\"3\",\"auto-ratio\":\"true\",\"rtl\":\"off\",\"use-cobbles-pattern\":\"off\",\"columns-advanced\":\"off\",\"columns-height\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"columns-width\":[\"1400\",\"1170\",\"1024\",\"960\",\"778\",\"640\",\"480\"],\"mascontent-height\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"columns\":[\"3\",\"3\",\"3\",\"2\",\"2\",\"2\",\"1\"],\"rows-unlimited\":\"off\",\"rows\":\"3\",\"load-more\":\"none\",\"load-more-hide\":\"off\",\"load-more-text\":\"Load More\",\"load-more-show-number\":\"on\",\"load-more-start\":\"3\",\"load-more-amount\":\"3\",\"lazy-loading\":\"off\",\"lazy-loading-blur\":\"on\",\"lazy-load-color\":\"#FFFFFF\",\"0\":\"\",\"spacings\":\"0\",\"grid-padding\":[\"0\",\"0\",\"0\",\"0\"],\"main-background-color\":\"transparent\",\"navigation-skin\":\"minimal-light\",\"entry-skin\":\"52\",\"grid-animation\":\"fade\",\"grid-animation-speed\":\"1000\",\"grid-animation-delay\":\"1\",\"hover-animation-delay\":\"1\",\"top-1-align\":\"center\",\"top-1-margin-bottom\":\"0\",\"top-2-align\":\"center\",\"top-2-margin-bottom\":\"0\",\"bottom-1-align\":\"center\",\"bottom-1-margin-top\":\"0\",\"bottom-2-align\":\"center\",\"bottom-2-margin-top\":\"0\",\"left-margin-left\":\"0\",\"right-margin-right\":\"0\",\"module-spacings\":\"5\",\"pagination-numbers\":\"smart\",\"pagination-scroll\":\"off\",\"pagination-scroll-offset\":\"0\",\"filter-arrows\":\"single\",\"filter-logic\":\"or\",\"filter-start\":\"\",\"filter-show-on\":\"hover\",\"filter-all-text\":\"Filter - All\",\"filter-listing\":\"list\",\"filter-dropdown-text\":\"Filter Categories\",\"filter-counter\":\"off\",\"sort-by-text\":\"Sort By \",\"sorting-order-by\":\"date\",\"sorting-order-by-start\":\"none\",\"sorting-order-by-start-meta\":\"\",\"sorting-order-type\":\"ASC\",\"search-text\":\"Enter Search terms...\",\"lb-source-order\":[\"youtube\",\"vimeo\",\"featured-image\"],\"lightbox-mode\":\"content-gallery\",\"lightbox-exclude-media\":\"on\",\"lightbox-type\":\"null\",\"lightbox-position\":\"bottom\",\"lightbox-twitter\":\"off\",\"lightbox-facebook\":\"off\",\"lbox-inpadding\":[\"0\",\"0\",\"0\",\"0\"],\"lbox-padding\":[\"0\",\"0\",\"0\",\"0\"],\"lightbox-effect-open-close\":\"fade\",\"lightbox-effect-open-close-speed\":\"normal\",\"lightbox-effect-next-prev\":\"fade\",\"lightbox-effect-next-prev-speed\":\"normal\",\"lbox-width\":\"800\",\"lbox-height\":\"600\",\"lbox-minwidth\":\"100\",\"lbox-minheight\":\"100\",\"lbox-maxwidth\":\"800\",\"lbox-maxheight\":\"600\",\"lightbox-autoplay\":\"off\",\"lbox-playspeed\":\"3000\",\"lbox-preload\":\"3\",\"lightbox-arrows\":\"on\",\"lightbox-thumbs\":\"off\",\"lbox-thumb-w\":\"50\",\"lbox-thumb-h\":\"50\",\"ajax-container-id\":\"ess-grid-ajax-container-\",\"ajax-container-position\":\"top\",\"ajax-scroll-onload\":\"on\",\"ajax-scrollto-offset\":\"0\",\"ajax-close-button\":\"off\",\"ajax-button-text\":\"Close\",\"ajax-nav-button\":\"off\",\"ajax-button-skin\":\"light\",\"ajax-button-type\":\"type1\",\"ajax-button-inner\":\"false\",\"ajax-button-h-pos\":\"r\",\"ajax-button-v-pos\":\"t\",\"ajax-container-pre\":\"<p>&nbsp;<br><\\/p>\",\"ajax-container-post\":\"<p>&nbsp;<br><\\/p>\",\"ajax-container-css\":\"\",\"ajax-callback\":\"\",\"ajax-callback-arg\":\"false\",\"ajax-css-url\":\"\",\"ajax-js-url\":\"\",\"use-spinner\":\"0\",\"spinner-color\":\"#FFFFFF\",\"hide-markup-before-load\":\"off\",\"custom-javascript\":\"\",\"cookie-save-time\":\"30\",\"cookie-save-search\":\"off\",\"cookie-save-filter\":\"off\",\"cookie-save-pagination\":\"off\",\"css-id\":\"1\"}','[]',NULL,'2017-02-03 13:48:51'),(3,'Featured Gallery','featured gallery','{\"source-type\":\"post\",\"post_types\":\"video,albums\",\"post_category\":\"\",\"category-relation\":\"OR\",\"additional-query\":\"meta_key=Featured&meta_value=1\",\"selected_pages\":\"\",\"max_entries\":\"3\",\"stream-source-type\":\"instagram\",\"youtube-api\":\"\",\"youtube-channel-id\":\"\",\"youtube-type-source\":\"channel\",\"youtube-playlist\":\"\",\"youtube-playlist-select\":\"\",\"youtube-thumb-size\":\"default\",\"youtube-full-size\":\"default\",\"youtube-count\":\"12\",\"youtube-transient-sec\":\"86400\",\"vimeo-type-source\":\"user\",\"vimeo-username\":\"\",\"vimeo-groupname\":\"\",\"vimeo-albumid\":\"\",\"vimeo-channelname\":\"\",\"vimeo-thumb-size\":\"thumbnail_small\",\"vimeo-count\":\"12\",\"vimeo-transient-sec\":\"86400\",\"instagram-user-id\":\"\",\"instagram-thumb-size\":\"Low Resolution\",\"instagram-full-size\":\"Standard Resolution\",\"instagram-count\":\"12\",\"instagram-transient-sec\":\"86400\",\"flickr-api-key\":\"\",\"flickr-type\":\"publicphotos\",\"flickr-user-url\":\"\",\"flickr-photoset\":\"\",\"flickr-photoset-select\":\"\",\"flickr-gallery-url\":\"\",\"flickr-group-url\":\"\",\"flickr-thumb-size\":\"Small 320\",\"flickr-full-size\":\"Medium 800\",\"flickr-count\":\"12\",\"flickr-transient-sec\":\"86400\",\"facebook-app-id\":\"\",\"facebook-app-secret\":\"\",\"facebook-page-url\":\"\",\"facebook-type-source\":\"timeline\",\"facebook-album\":\"\",\"facebook-album-select\":\"\",\"facebook-count\":\"12\",\"facebook-transient-sec\":\"86400\",\"twitter-consumer-key\":\"\",\"twitter-consumer-secret\":\"\",\"twitter-access-token\":\"\",\"twitter-access-secret\":\"\",\"twitter-user-id\":\"\",\"twitter-image-only\":\"true\",\"twitter-include-retweets\":\"on\",\"twitter-exclude-replies\":\"on\",\"twitter-count\":\"12\",\"twitter-transient-sec\":\"86400\",\"media-source-order\":[\"featured-image\"],\"poster-source-order\":[\"featured-image\",\"youtube-image\",\"vimeo-image\"],\"image-source-type\":\"full\",\"media-filter-type\":\"none\",\"default-image\":\"0\",\"youtube-default-image\":\"0\",\"vimeo-default-image\":\"0\",\"html-default-image\":\"0\"}','{\"layout-sizing\":\"boxed\",\"fullscreen-offset-container\":\".site-content\",\"layout\":\"even\",\"content-push\":\"off\",\"x-ratio\":\"4\",\"y-ratio\":\"3\",\"auto-ratio\":\"true\",\"rtl\":\"off\",\"use-cobbles-pattern\":\"off\",\"columns-advanced\":\"off\",\"columns-height\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"columns-width\":[\"1400\",\"1170\",\"1024\",\"960\",\"778\",\"640\",\"480\"],\"mascontent-height\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"columns\":[\"3\",\"3\",\"3\",\"2\",\"2\",\"2\",\"1\"],\"rows-unlimited\":\"off\",\"rows\":\"3\",\"load-more\":\"none\",\"load-more-hide\":\"off\",\"load-more-text\":\"Load More\",\"load-more-show-number\":\"on\",\"load-more-start\":\"3\",\"load-more-amount\":\"3\",\"lazy-loading\":\"off\",\"lazy-loading-blur\":\"on\",\"lazy-load-color\":\"#FFFFFF\",\"0\":\"\",\"spacings\":\"0\",\"grid-padding\":[\"0\",\"0\",\"0\",\"0\"],\"main-background-color\":\"transparent\",\"navigation-skin\":\"minimal-light\",\"entry-skin\":\"52\",\"grid-animation\":\"fade\",\"grid-animation-speed\":\"1000\",\"grid-animation-delay\":\"1\",\"hover-animation-delay\":\"1\",\"top-1-align\":\"center\",\"top-1-margin-bottom\":\"0\",\"top-2-align\":\"center\",\"top-2-margin-bottom\":\"0\",\"bottom-1-align\":\"center\",\"bottom-1-margin-top\":\"0\",\"bottom-2-align\":\"center\",\"bottom-2-margin-top\":\"0\",\"left-margin-left\":\"0\",\"right-margin-right\":\"0\",\"module-spacings\":\"5\",\"pagination-numbers\":\"smart\",\"pagination-scroll\":\"off\",\"pagination-scroll-offset\":\"0\",\"filter-arrows\":\"single\",\"filter-logic\":\"or\",\"filter-start\":\"\",\"filter-show-on\":\"hover\",\"filter-all-text\":\"Filter - All\",\"filter-listing\":\"list\",\"filter-dropdown-text\":\"Filter Categories\",\"filter-counter\":\"off\",\"sort-by-text\":\"Sort By \",\"sorting-order-by\":\"date\",\"sorting-order-by-start\":\"none\",\"sorting-order-by-start-meta\":\"\",\"sorting-order-type\":\"ASC\",\"search-text\":\"Enter Search terms...\",\"lb-source-order\":[\"youtube\",\"vimeo\",\"featured-image\"],\"lightbox-mode\":\"content-gallery\",\"lightbox-exclude-media\":\"on\",\"lightbox-type\":\"null\",\"lightbox-position\":\"bottom\",\"lightbox-twitter\":\"off\",\"lightbox-facebook\":\"off\",\"lbox-inpadding\":[\"0\",\"0\",\"0\",\"0\"],\"lbox-padding\":[\"0\",\"0\",\"0\",\"0\"],\"lightbox-effect-open-close\":\"fade\",\"lightbox-effect-open-close-speed\":\"normal\",\"lightbox-effect-next-prev\":\"fade\",\"lightbox-effect-next-prev-speed\":\"normal\",\"lbox-width\":\"800\",\"lbox-height\":\"600\",\"lbox-minwidth\":\"100\",\"lbox-minheight\":\"100\",\"lbox-maxwidth\":\"800\",\"lbox-maxheight\":\"600\",\"lightbox-autoplay\":\"off\",\"lbox-playspeed\":\"3000\",\"lbox-preload\":\"3\",\"lightbox-arrows\":\"on\",\"lightbox-thumbs\":\"off\",\"lbox-thumb-w\":\"50\",\"lbox-thumb-h\":\"50\",\"ajax-container-id\":\"ess-grid-ajax-container-\",\"ajax-container-position\":\"top\",\"ajax-scroll-onload\":\"on\",\"ajax-scrollto-offset\":\"0\",\"ajax-close-button\":\"off\",\"ajax-button-text\":\"Close\",\"ajax-nav-button\":\"off\",\"ajax-button-skin\":\"light\",\"ajax-button-type\":\"type1\",\"ajax-button-inner\":\"false\",\"ajax-button-h-pos\":\"r\",\"ajax-button-v-pos\":\"t\",\"ajax-container-pre\":\"<p>&nbsp;<br><\\/p>\",\"ajax-container-post\":\"<p>&nbsp;<br><\\/p>\",\"ajax-container-css\":\"\",\"ajax-callback\":\"\",\"ajax-callback-arg\":\"false\",\"ajax-css-url\":\"\",\"ajax-js-url\":\"\",\"use-spinner\":\"0\",\"spinner-color\":\"#FFFFFF\",\"hide-markup-before-load\":\"off\",\"custom-javascript\":\"\",\"cookie-save-time\":\"30\",\"cookie-save-search\":\"off\",\"cookie-save-filter\":\"off\",\"cookie-save-pagination\":\"off\",\"css-id\":\"2\"}','[]',NULL,'2017-02-03 13:48:59'),(5,'Featured Artists','featured artists','{\"source-type\":\"post\",\"post_types\":\"artists\",\"post_category\":\"genre_37,night-type_38\",\"category-relation\":\"OR\",\"additional-query\":\"meta_key=Featured&meta_value=1\",\"selected_pages\":\"\",\"max_entries\":\"6\",\"stream-source-type\":\"instagram\",\"youtube-api\":\"\",\"youtube-channel-id\":\"\",\"youtube-type-source\":\"channel\",\"youtube-playlist\":\"\",\"youtube-playlist-select\":\"\",\"youtube-thumb-size\":\"default\",\"youtube-full-size\":\"default\",\"youtube-count\":\"12\",\"youtube-transient-sec\":\"86400\",\"vimeo-type-source\":\"user\",\"vimeo-username\":\"\",\"vimeo-groupname\":\"\",\"vimeo-albumid\":\"\",\"vimeo-channelname\":\"\",\"vimeo-thumb-size\":\"thumbnail_small\",\"vimeo-count\":\"12\",\"vimeo-transient-sec\":\"86400\",\"instagram-user-id\":\"\",\"instagram-thumb-size\":\"Low Resolution\",\"instagram-full-size\":\"Standard Resolution\",\"instagram-count\":\"12\",\"instagram-transient-sec\":\"86400\",\"flickr-api-key\":\"\",\"flickr-type\":\"publicphotos\",\"flickr-user-url\":\"\",\"flickr-photoset\":\"\",\"flickr-photoset-select\":\"\",\"flickr-gallery-url\":\"\",\"flickr-group-url\":\"\",\"flickr-thumb-size\":\"Small 320\",\"flickr-full-size\":\"Medium 800\",\"flickr-count\":\"12\",\"flickr-transient-sec\":\"86400\",\"facebook-app-id\":\"\",\"facebook-app-secret\":\"\",\"facebook-page-url\":\"\",\"facebook-type-source\":\"timeline\",\"facebook-album\":\"\",\"facebook-album-select\":\"\",\"facebook-count\":\"12\",\"facebook-transient-sec\":\"86400\",\"twitter-consumer-key\":\"\",\"twitter-consumer-secret\":\"\",\"twitter-access-token\":\"\",\"twitter-access-secret\":\"\",\"twitter-user-id\":\"\",\"twitter-image-only\":\"true\",\"twitter-include-retweets\":\"on\",\"twitter-exclude-replies\":\"on\",\"twitter-count\":\"12\",\"twitter-transient-sec\":\"86400\",\"poster-source-order\":[\"featured-image\"],\"image-source-type\":\"full\",\"media-filter-type\":\"none\",\"default-image\":\"0\",\"youtube-default-image\":\"0\",\"vimeo-default-image\":\"0\",\"html-default-image\":\"0\"}','{\"layout-sizing\":\"boxed\",\"fullscreen-offset-container\":\"\",\"layout\":\"even\",\"content-push\":\"off\",\"x-ratio\":\"4\",\"y-ratio\":\"2\",\"auto-ratio\":\"true\",\"rtl\":\"off\",\"use-cobbles-pattern\":\"off\",\"columns-advanced\":\"off\",\"columns-height\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"columns-width\":[\"1400\",\"1170\",\"1024\",\"960\",\"778\",\"640\",\"480\"],\"mascontent-height\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"columns\":[\"3\",\"3\",\"3\",\"2\",\"2\",\"2\",\"1\"],\"rows-unlimited\":\"on\",\"rows\":\"10\",\"load-more\":\"none\",\"load-more-hide\":\"off\",\"load-more-text\":\"Load More\",\"load-more-show-number\":\"off\",\"load-more-start\":\"6\",\"load-more-amount\":\"1\",\"lazy-loading\":\"off\",\"lazy-loading-blur\":\"off\",\"lazy-load-color\":\"transparent\",\"0\":\"\",\"spacings\":\"40\",\"grid-padding\":[\"0\",\"10\",\"0\",\"10\"],\"main-background-color\":\"transparent\",\"navigation-skin\":\"minimal-light\",\"entry-skin\":\"51\",\"grid-animation\":\"fade\",\"grid-animation-speed\":\"1000\",\"grid-animation-delay\":\"1\",\"hover-animation-delay\":\"1\",\"top-1-align\":\"center\",\"top-1-margin-bottom\":\"30\",\"top-2-align\":\"center\",\"top-2-margin-bottom\":\"0\",\"bottom-1-align\":\"center\",\"bottom-1-margin-top\":\"0\",\"bottom-2-align\":\"center\",\"bottom-2-margin-top\":\"0\",\"left-margin-left\":\"0\",\"right-margin-right\":\"0\",\"module-spacings\":\"5\",\"pagination-numbers\":\"smart\",\"pagination-scroll\":\"off\",\"pagination-scroll-offset\":\"0\",\"filter-arrows\":\"multi\",\"filter-logic\":\"and\",\"filter-start\":\"\",\"filter-show-on\":\"hover\",\"filter-all-text\":\"All\",\"filter-listing\":\"dropdown\",\"filter-dropdown-text\":\"Genre\",\"filter-counter\":\"off\",\"filter-selected\":[\"genre_34\",\"genre_36\"],\"filter-all-text-2\":\"All\",\"filter-listing-2\":\"dropdown\",\"filter-dropdown-text-2\":\"Night type\",\"filter-counter-2\":\"off\",\"filter-selected-2\":[\"night-type_35\"],\"sort-by-text\":\"Sort By \",\"sorting-order-by\":\"\",\"sorting-order-by-start\":\"date\",\"sorting-order-by-start-meta\":\"\",\"sorting-order-type\":\"ASC\",\"search-text\":\"Enter Search terms...\",\"lightbox-mode\":\"single\",\"lightbox-exclude-media\":\"off\",\"lightbox-type\":\"null\",\"lightbox-position\":\"bottom\",\"lightbox-twitter\":\"off\",\"lightbox-facebook\":\"off\",\"lbox-inpadding\":[\"0\",\"0\",\"0\",\"0\"],\"lbox-padding\":[\"0\",\"0\",\"0\",\"0\"],\"lightbox-effect-open-close\":\"fade\",\"lightbox-effect-open-close-speed\":\"normal\",\"lightbox-effect-next-prev\":\"fade\",\"lightbox-effect-next-prev-speed\":\"normal\",\"lbox-width\":\"800\",\"lbox-height\":\"600\",\"lbox-minwidth\":\"100\",\"lbox-minheight\":\"100\",\"lbox-maxwidth\":\"9999\",\"lbox-maxheight\":\"9999\",\"lightbox-autoplay\":\"off\",\"lbox-playspeed\":\"3000\",\"lbox-preload\":\"3\",\"lightbox-arrows\":\"on\",\"lightbox-thumbs\":\"off\",\"lbox-thumb-w\":\"50\",\"lbox-thumb-h\":\"50\",\"aj-source-order\":[\"post-content\"],\"ajax-container-id\":\"ess-grid-ajax-container-\",\"ajax-container-position\":\"top\",\"ajax-scroll-onload\":\"on\",\"ajax-scrollto-offset\":\"0\",\"ajax-close-button\":\"off\",\"ajax-button-text\":\"Close\",\"ajax-nav-button\":\"off\",\"ajax-button-skin\":\"light\",\"ajax-button-type\":\"type1\",\"ajax-button-inner\":\"false\",\"ajax-button-h-pos\":\"r\",\"ajax-button-v-pos\":\"t\",\"ajax-container-pre\":\"<p>&nbsp;<br><\\/p>\",\"ajax-container-post\":\"<p>&nbsp;<br><\\/p>\",\"ajax-container-css\":\"\",\"ajax-callback\":\"\",\"ajax-callback-arg\":\"false\",\"ajax-css-url\":\"\",\"ajax-js-url\":\"\",\"use-spinner\":\"0\",\"spinner-color\":\"#FFFFFF\",\"hide-markup-before-load\":\"off\",\"custom-javascript\":\"\",\"cookie-save-time\":\"30\",\"cookie-save-search\":\"off\",\"cookie-save-filter\":\"off\",\"cookie-save-pagination\":\"off\",\"css-id\":\"3\",\"custom-filter\":{\"genre_34\":\"Arabic (1 item) [slug: arabic]\",\"genre_36\":\"Jazz (1 item) [slug: jazz]\",\"night-type_35\":\"Friday Night (2 items) [slug: friday-night]\"}}','[]',NULL,'2017-02-03 16:19:38'),(7,'Artists','artists','{\"source-type\":\"post\",\"post_types\":\"artists\",\"post_category\":\"genre_65,genre_62,genre_46,genre_34,genre_45,genre_60,genre_49,genre_40,genre_66,genre_59,genre_43,genre_57,genre_54,genre_37,genre_41,genre_36,genre_61,genre_53,genre_58,genre_52,genre_64,genre_48,genre_63,genre_56,genre_51,night-type_42,night-type_35,night-type_44,night-type_39,night-type_38,night-type_50,night-type_55,night-type_47,artist_status_67\",\"category-relation\":\"OR\",\"additional-query\":\"\",\"selected_pages\":\"\",\"max_entries\":\"-1\",\"stream-source-type\":\"instagram\",\"youtube-api\":\"\",\"youtube-channel-id\":\"\",\"youtube-type-source\":\"channel\",\"youtube-playlist\":\"\",\"youtube-playlist-select\":\"\",\"youtube-thumb-size\":\"default\",\"youtube-full-size\":\"default\",\"youtube-count\":\"12\",\"youtube-transient-sec\":\"86400\",\"vimeo-type-source\":\"user\",\"vimeo-username\":\"\",\"vimeo-groupname\":\"\",\"vimeo-albumid\":\"\",\"vimeo-channelname\":\"\",\"vimeo-thumb-size\":\"thumbnail_small\",\"vimeo-count\":\"12\",\"vimeo-transient-sec\":\"86400\",\"instagram-user-id\":\"\",\"instagram-thumb-size\":\"Low Resolution\",\"instagram-full-size\":\"Standard Resolution\",\"instagram-count\":\"12\",\"instagram-transient-sec\":\"86400\",\"flickr-api-key\":\"\",\"flickr-type\":\"publicphotos\",\"flickr-user-url\":\"\",\"flickr-photoset\":\"\",\"flickr-photoset-select\":\"\",\"flickr-gallery-url\":\"\",\"flickr-group-url\":\"\",\"flickr-thumb-size\":\"Small 320\",\"flickr-full-size\":\"Medium 800\",\"flickr-count\":\"12\",\"flickr-transient-sec\":\"86400\",\"facebook-app-id\":\"\",\"facebook-app-secret\":\"\",\"facebook-page-url\":\"\",\"facebook-type-source\":\"timeline\",\"facebook-album\":\"\",\"facebook-album-select\":\"\",\"facebook-count\":\"12\",\"facebook-transient-sec\":\"86400\",\"twitter-consumer-key\":\"\",\"twitter-consumer-secret\":\"\",\"twitter-access-token\":\"\",\"twitter-access-secret\":\"\",\"twitter-user-id\":\"\",\"twitter-image-only\":\"true\",\"twitter-include-retweets\":\"on\",\"twitter-exclude-replies\":\"on\",\"twitter-count\":\"12\",\"twitter-transient-sec\":\"86400\",\"poster-source-order\":[\"featured-image\"],\"image-source-type\":\"full\",\"media-filter-type\":\"none\",\"default-image\":\"0\",\"youtube-default-image\":\"0\",\"vimeo-default-image\":\"0\",\"html-default-image\":\"0\"}','{\"layout-sizing\":\"boxed\",\"fullscreen-offset-container\":\"\",\"layout\":\"even\",\"content-push\":\"off\",\"x-ratio\":\"4\",\"y-ratio\":\"2\",\"auto-ratio\":\"true\",\"rtl\":\"off\",\"use-cobbles-pattern\":\"off\",\"columns-advanced\":\"off\",\"columns-height\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"columns-width\":[\"1400\",\"1170\",\"1024\",\"960\",\"778\",\"640\",\"480\"],\"mascontent-height\":[\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\"],\"columns\":[\"3\",\"3\",\"3\",\"2\",\"2\",\"2\",\"1\"],\"rows-unlimited\":\"on\",\"rows\":\"10\",\"load-more\":\"scroll\",\"load-more-hide\":\"on\",\"load-more-text\":\"\",\"load-more-show-number\":\"off\",\"load-more-start\":\"9\",\"load-more-amount\":\"9\",\"lazy-loading\":\"on\",\"lazy-loading-blur\":\"off\",\"lazy-load-color\":\"transparent\",\"0\":\"5\",\"spacings\":\"40\",\"grid-padding\":[\"0\",\"10\",\"0\",\"10\"],\"main-background-color\":\"transparent\",\"navigation-skin\":\"minimal-light\",\"entry-skin\":\"51\",\"grid-animation\":\"fade\",\"grid-animation-speed\":\"1000\",\"grid-animation-delay\":\"1\",\"hover-animation-delay\":\"1\",\"top-1-align\":\"center\",\"top-1-margin-bottom\":\"30\",\"top-2-align\":\"center\",\"top-2-margin-bottom\":\"0\",\"bottom-1-align\":\"center\",\"bottom-1-margin-top\":\"0\",\"bottom-2-align\":\"center\",\"bottom-2-margin-top\":\"0\",\"left-margin-left\":\"0\",\"right-margin-right\":\"0\",\"module-spacings\":\"5\",\"pagination-numbers\":\"smart\",\"pagination-scroll\":\"off\",\"pagination-scroll-offset\":\"0\",\"filter-arrows\":\"multi\",\"filter-logic\":\"and\",\"filter-start\":\"\",\"filter-show-on\":\"hover\",\"filter-all-text\":\"All\",\"filter-listing\":\"dropdown\",\"filter-dropdown-text\":\"Genre\",\"filter-counter\":\"off\",\"filter-selected\":[\"genre_65\",\"genre_62\",\"genre_46\",\"genre_34\",\"genre_45\",\"genre_60\",\"genre_49\",\"genre_40\",\"genre_66\",\"genre_59\",\"genre_43\",\"genre_57\",\"genre_54\",\"genre_41\",\"genre_36\",\"genre_61\",\"genre_53\",\"genre_58\",\"genre_52\",\"genre_64\",\"genre_48\",\"genre_63\",\"genre_56\",\"genre_51\"],\"filter-all-text-2\":\"All\",\"filter-listing-2\":\"dropdown\",\"filter-dropdown-text-2\":\"Night type\",\"filter-counter-2\":\"off\",\"filter-selected-2\":[\"night-type_35\",\"night-type_42\",\"night-type_44\",\"night-type_39\",\"night-type_50\",\"night-type_55\",\"night-type_47\"],\"filter-all-text-3\":\"All\",\"filter-listing-3\":\"list\",\"filter-dropdown-text-3\":\"Visiting Artist\",\"filter-counter-3\":\"off\",\"filter-selected-3\":[\"artist_status_67\"],\"sort-by-text\":\"Sort By \",\"sorting-order-by\":\"\",\"sorting-order-by-start\":\"date\",\"sorting-order-by-start-meta\":\"\",\"sorting-order-type\":\"ASC\",\"search-text\":\"Enter Search terms...\",\"lightbox-mode\":\"single\",\"lightbox-exclude-media\":\"off\",\"lightbox-type\":\"null\",\"lightbox-position\":\"bottom\",\"lightbox-twitter\":\"off\",\"lightbox-facebook\":\"off\",\"lbox-inpadding\":[\"0\",\"0\",\"0\",\"0\"],\"lbox-padding\":[\"0\",\"0\",\"0\",\"0\"],\"lightbox-effect-open-close\":\"fade\",\"lightbox-effect-open-close-speed\":\"normal\",\"lightbox-effect-next-prev\":\"fade\",\"lightbox-effect-next-prev-speed\":\"normal\",\"lbox-width\":\"800\",\"lbox-height\":\"600\",\"lbox-minwidth\":\"100\",\"lbox-minheight\":\"100\",\"lbox-maxwidth\":\"9999\",\"lbox-maxheight\":\"9999\",\"lightbox-autoplay\":\"off\",\"lbox-playspeed\":\"3000\",\"lbox-preload\":\"3\",\"lightbox-arrows\":\"on\",\"lightbox-thumbs\":\"off\",\"lbox-thumb-w\":\"50\",\"lbox-thumb-h\":\"50\",\"aj-source-order\":[\"post-content\"],\"ajax-container-id\":\"ess-grid-ajax-container-\",\"ajax-container-position\":\"top\",\"ajax-scroll-onload\":\"on\",\"ajax-scrollto-offset\":\"0\",\"ajax-close-button\":\"off\",\"ajax-button-text\":\"Close\",\"ajax-nav-button\":\"off\",\"ajax-button-skin\":\"light\",\"ajax-button-type\":\"type1\",\"ajax-button-inner\":\"false\",\"ajax-button-h-pos\":\"r\",\"ajax-button-v-pos\":\"t\",\"ajax-container-pre\":\"<p>&nbsp;<br><\\/p>\",\"ajax-container-post\":\"<p>&nbsp;<br><\\/p>\",\"ajax-container-css\":\"\",\"ajax-callback\":\"\",\"ajax-callback-arg\":\"false\",\"ajax-css-url\":\"\",\"ajax-js-url\":\"\",\"use-spinner\":\"2\",\"spinner-color\":\"#FFFFFF\",\"hide-markup-before-load\":\"off\",\"custom-javascript\":\"(function() {\\n \\n \\/\\/ change this to whatever filter you\'d like to have selected by default instead\\n var filterName = \'Title of Your Default Filter\';\\n \\n var grid = jQuery(\'.esg-grid\'),\\n timer = setInterval(function() {\\n \\n if(grid.is(\':visible\')) {\\n \\n clearInterval(timer);\\n \\n \\/\\/ comment out the line below if you\'d like to keep the \\\"Filter All\\\" button for the last filter\\n   jQuery(\'.esg-allfilter\').last().remove();\\n\\n }\\n \\n }, 500);\\n \\n})();\",\"cookie-save-time\":\"30\",\"cookie-save-search\":\"off\",\"cookie-save-filter\":\"off\",\"cookie-save-pagination\":\"off\",\"css-id\":\"4\",\"navigation-layout\":{\"filter\":{\"top-1\":\"0\"},\"search-input\":{\"top-1\":\"3\"},\"filter-2\":{\"top-1\":\"1\"},\"filter-3\":{\"top-1\":\"2\"}}}','[]',NULL,'2017-02-03 16:16:04');
/*!40000 ALTER TABLE `cjc_eg_grids` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-04  2:21:25
