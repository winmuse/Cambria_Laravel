/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 10.4.11-MariaDB : Database - chat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`chat` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `chat`;

/*Table structure for table `archived_users` */

DROP TABLE IF EXISTS `archived_users`;

CREATE TABLE `archived_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `owner_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archived_by` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `archived_users_archived_by_foreign` (`archived_by`),
  CONSTRAINT `archived_users_archived_by_foreign` FOREIGN KEY (`archived_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `archived_users` */

/*Table structure for table `blocked_users` */

DROP TABLE IF EXISTS `blocked_users`;

CREATE TABLE `blocked_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `blocked_by` int(10) unsigned NOT NULL,
  `blocked_to` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blocked_users_blocked_by_foreign` (`blocked_by`),
  KEY `blocked_users_blocked_to_foreign` (`blocked_to`),
  CONSTRAINT `blocked_users_blocked_by_foreign` FOREIGN KEY (`blocked_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `blocked_users_blocked_to_foreign` FOREIGN KEY (`blocked_to`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `blocked_users` */

/*Table structure for table `card_info` */

DROP TABLE IF EXISTS `card_info`;

CREATE TABLE `card_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `card_number` varchar(100) DEFAULT NULL,
  `cvc_number` varchar(50) DEFAULT NULL,
  `expiration_month` varchar(30) DEFAULT NULL,
  `expiration_year` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `card_info` */

insert  into `card_info`(`id`,`user_id`,`card_number`,`cvc_number`,`expiration_month`,`expiration_year`,`created_at`,`updated_at`,`token`) values 
(1,4,'4012888888881881','yuri','12','2020','2020-10-27 07:36:54','2020-10-27 07:36:54','tok_2671f092140729bc9697d65635e9');

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hotspring_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `delidate` date DEFAULT NULL,
  `delitime` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kind` int(11) DEFAULT NULL,
  `paykind` int(11) DEFAULT NULL,
  `notice` text COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

/*Data for the table `cart` */

insert  into `cart`(`id`,`user_id`,`hotspring_id`,`item_id`,`item_name`,`item_price`,`quantity`,`delidate`,`delitime`,`kind`,`paykind`,`notice`) values 
(36,1,2000,26,'New dish',10,1,NULL,NULL,NULL,NULL,NULL),
(37,21,2000,24,'天然温泉',10,1,NULL,NULL,NULL,NULL,NULL),
(38,21,2000,24,'天然温泉',10,1,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hotspring_id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `menu_image` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

/*Data for the table `categories` */

insert  into `categories`(`id`,`hotspring_id`,`category_name`,`status`,`menu_image`) values 
(3,2000,'Menu Cat',1,NULL),
(4,2000,'hotspring1',1,NULL),
(5,2000,'apple',1,NULL),
(6,2000,'Colombiana',1,NULL),
(7,2000,'Desayunos',1,NULL),
(11,2000,'Bebidas ',1,NULL),
(13,2000,'Almuerzo ',1,NULL),
(14,2000,'Adicionales',1,NULL),
(15,2000,'Cerveza',1,NULL),
(16,2000,'Whisky',1,NULL),
(17,2000,'Vinos',1,NULL),
(18,2000,'Concentrado ',1,NULL),
(19,2000,'Concentrado ',1,NULL),
(20,2000,'Concentrado',1,NULL),
(22,2000,'Concentrado ',1,NULL),
(23,2000,'hotspring2',1,NULL),
(24,2000,'hotspring3',1,NULL),
(26,2000,'hotspring4',1,NULL),
(27,2000,'hotspring5',1,NULL),
(28,2000,'hotspring6',1,NULL),
(29,2000,'hotspring7',1,NULL),
(30,2000,'hotspring8',1,NULL);

/*Table structure for table `chat` */

DROP TABLE IF EXISTS `chat`;

CREATE TABLE `chat` (
  `message_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `to_user_id` int(255) NOT NULL,
  `message_time` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `message` longtext NOT NULL,
  PRIMARY KEY (`message_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

/*Data for the table `chat` */

/*Table structure for table `chat_request` */

DROP TABLE IF EXISTS `chat_request`;

CREATE TABLE `chat_request` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `from_id` int(10) unsigned DEFAULT NULL,
  `owner_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chat_request_from_id_foreign` (`from_id`),
  CONSTRAINT `chat_request_from_id_foreign` FOREIGN KEY (`from_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `chat_request` */

/*Table structure for table `conversations` */

DROP TABLE IF EXISTS `conversations`;

CREATE TABLE `conversations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from_id` int(10) unsigned DEFAULT NULL,
  `to_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'App\\Models\\Conversation' COMMENT '1 => Message, 2 => Group Message',
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 for unread,1 for seen',
  `message_type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0- text message, 1- image, 2- pdf, 3- doc, 4- voice',
  `file_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reply_to` int(10) unsigned DEFAULT NULL,
  `url_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `conversations_from_id_foreign` (`from_id`),
  KEY `conversations_reply_to_foreign` (`reply_to`),
  KEY `conversations_created_at_index` (`created_at`),
  CONSTRAINT `conversations_from_id_foreign` FOREIGN KEY (`from_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `conversations_reply_to_foreign` FOREIGN KEY (`reply_to`) REFERENCES `conversations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `conversations` */

insert  into `conversations`(`id`,`from_id`,`to_id`,`to_type`,`message`,`status`,`message_type`,`file_name`,`created_at`,`updated_at`,`reply_to`,`url_details`) values 
(1,2,'4','App\\Models\\Conversation','hi',1,0,NULL,'2020-09-29 16:31:10','2020-10-07 04:20:45',NULL,NULL),
(2,2,'4','App\\Models\\Conversation','2020-09-29_5f7361be90492_881ca6c43fc82a1d681c25e83e1955fc20ba1273.mp4',1,5,'2020-09-16_23-57-57.mp4','2020-09-29 16:33:03','2020-10-07 04:20:45',NULL,NULL),
(3,2,'4','App\\Models\\Conversation','2020-09-29_5f73772e6a430_745d31de9d3827266a54ccec38efb6d507320ac4.mp4',1,5,'01_Trim.mp4','2020-09-29 18:04:31','2020-10-07 04:20:45',NULL,NULL),
(4,1,'2','App\\Models\\Conversation','sss',1,0,NULL,'2020-10-07 04:19:51','2020-10-26 08:09:25',NULL,NULL),
(5,4,'1','App\\Models\\Conversation','hello',1,0,NULL,'2020-10-07 04:21:11','2020-10-14 01:32:58',NULL,NULL),
(6,1,'11','App\\Models\\Conversation','hello',0,0,NULL,'2020-10-09 00:01:32','2020-10-09 00:01:32',NULL,NULL),
(7,1,'2','App\\Models\\Conversation','hello',1,0,NULL,'2020-10-14 00:03:31','2020-10-26 08:09:25',NULL,NULL),
(8,4,'1','App\\Models\\Conversation','fffff',1,0,NULL,'2020-10-14 00:34:22','2020-10-14 01:32:58',NULL,NULL),
(9,4,'1','App\\Models\\Conversation','ffffff',1,0,NULL,'2020-10-14 00:39:09','2020-10-14 01:32:58',NULL,NULL),
(10,4,'1','App\\Models\\Conversation','hhhh',1,0,NULL,'2020-10-14 00:41:14','2020-10-14 01:32:58',NULL,NULL),
(11,4,'1','App\\Models\\Conversation','llll',1,0,NULL,'2020-10-14 01:01:28','2020-10-14 01:32:58',NULL,NULL),
(12,4,'1','App\\Models\\Conversation','adfafasdfa',1,0,NULL,'2020-10-14 01:35:55','2020-10-18 08:33:09',NULL,NULL),
(13,4,'1','App\\Models\\Conversation',',.,.,.,',1,0,NULL,'2020-10-18 08:32:11','2020-10-18 08:33:09',NULL,NULL),
(14,1,'4','App\\Models\\Conversation','kjljkljljlj',1,0,NULL,'2020-10-18 08:33:28','2020-10-18 08:36:24',NULL,NULL);

/*Table structure for table `delihours` */

DROP TABLE IF EXISTS `delihours`;

CREATE TABLE `delihours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dayindex` int(11) DEFAULT NULL,
  `fromtime` time DEFAULT NULL,
  `endtime` time DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `delihours` */

insert  into `delihours`(`id`,`dayindex`,`fromtime`,`endtime`) values 
(1,2,'09:00:00','22:00:00');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `group_message_recipients` */

DROP TABLE IF EXISTS `group_message_recipients`;

CREATE TABLE `group_message_recipients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `conversation_id` int(10) unsigned NOT NULL,
  `group_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_message_recipients_user_id_foreign` (`user_id`),
  KEY `group_message_recipients_conversation_id_foreign` (`conversation_id`),
  CONSTRAINT `group_message_recipients_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `conversations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `group_message_recipients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `group_message_recipients` */

/*Table structure for table `group_users` */

DROP TABLE IF EXISTS `group_users`;

CREATE TABLE `group_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `added_by` int(10) unsigned NOT NULL,
  `removed_by` int(10) unsigned DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_users_group_id_foreign` (`group_id`),
  KEY `group_users_user_id_foreign` (`user_id`),
  KEY `group_users_removed_by_foreign` (`removed_by`),
  KEY `group_users_added_by_foreign` (`added_by`),
  KEY `group_users_role_index` (`role`),
  CONSTRAINT `group_users_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `group_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `group_users_removed_by_foreign` FOREIGN KEY (`removed_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `group_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `group_users` */

insert  into `group_users`(`id`,`group_id`,`user_id`,`role`,`added_by`,`removed_by`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'85bbb88b-6c7a-4591-916a-d74fc8995760',2,1,1,NULL,NULL,'2020-09-25 01:15:53','2020-09-25 01:15:53'),
(2,'85bbb88b-6c7a-4591-916a-d74fc8995760',1,2,1,NULL,NULL,'2020-09-25 01:15:53','2020-09-25 01:15:53'),
(3,'c3d2c407-16e8-44b7-89e2-668a323ca3fe',2,1,1,NULL,NULL,'2020-09-25 04:47:21','2020-09-25 04:47:21'),
(4,'c3d2c407-16e8-44b7-89e2-668a323ca3fe',1,2,1,NULL,NULL,'2020-09-25 04:47:21','2020-09-25 04:47:21');

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy` int(11) NOT NULL,
  `group_type` int(11) NOT NULL COMMENT '1 => Open (Anyone can send message), 2 => Close (Only Admin can send message) ',
  `created_by` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `groups_created_by_foreign` (`created_by`),
  KEY `groups_name_index` (`name`),
  CONSTRAINT `groups_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `groups` */

insert  into `groups`(`id`,`name`,`description`,`photo_url`,`privacy`,`group_type`,`created_by`,`created_at`,`updated_at`) values 
('85bbb88b-6c7a-4591-916a-d74fc8995760','Ayane','aaa','2020-09-25_5f6d44c9931eb_a00be6043e63d325c7ffd197656ece109c8745e2.jpg',1,1,1,'2020-09-25 01:15:53','2020-09-25 01:15:53'),
('c3d2c407-16e8-44b7-89e2-668a323ca3fe','aabb','','2020-09-25_5f6d7658c8ae6_35e048372b7a2cba2782aaff64114ba7fe4415db.jpg',1,1,1,'2020-09-25 04:47:21','2020-09-25 04:47:21');

/*Table structure for table `last_conversations` */

DROP TABLE IF EXISTS `last_conversations`;

CREATE TABLE `last_conversations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversation_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `group_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `last_conversations_group_id_index` (`group_id`),
  KEY `last_conversations_user_id_foreign` (`user_id`),
  KEY `last_conversations_conversation_id_foreign` (`conversation_id`),
  CONSTRAINT `last_conversations_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `conversations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `last_conversations_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `last_conversations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `last_conversations` */

/*Table structure for table `media_upload` */

DROP TABLE IF EXISTS `media_upload`;

CREATE TABLE `media_upload` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `photo_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` int(10) DEFAULT 1,
  `privacy` int(11) NOT NULL DEFAULT 1 COMMENT 'free:1,follow:2,subscrib:3',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `thumb_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `media_upload` */

insert  into `media_upload`(`id`,`photo_url`,`user_id`,`comment`,`created_at`,`updated_at`,`type`,`privacy`,`deleted_at`,`thumb_url`) values 
(1,'2020-10-16_5f894d503fe79_feff233796ae549b16610738e806a29121fcb982.jpg',1,NULL,'2020-10-16 07:35:44','2020-10-16 07:35:44',1,2,NULL,NULL),
(2,'2020-10-16_5f894d74b82d1_0d8b805fa92a07a19586303d3622bc56d053f739.jpeg',1,NULL,'2020-10-16 07:36:20','2020-10-16 07:36:20',1,2,NULL,NULL),
(3,'2020-10-16_5f894d9d9c391_7a73c557a3f82d1612877896ecc45b91d7c433da.jpg',2,NULL,'2020-10-16 07:37:01','2020-10-16 07:37:01',1,3,NULL,NULL),
(4,'2020-10-16_5f894dacb656b_17d9aad17bf23a12964bd2b25456fd5241efed53.mp4',2,NULL,'2020-10-16 07:37:16','2020-10-16 07:37:16',2,2,NULL,NULL),
(5,'2020-10-16_5f894de0f1f0c_8a87cfc2bacbca10dff8804c21403bf8ae216915.jpg',3,NULL,'2020-10-16 07:38:08','2020-10-16 07:38:08',1,2,NULL,NULL),
(6,'2020-10-16_5f894def3212a_0828a3d15666e1018c9eb77c1566c439fdadc73b.jpg',3,NULL,'2020-10-16 07:38:23','2020-10-16 07:38:23',1,2,NULL,NULL),
(7,'2020-10-16_5f894e1081e84_437af81df30f20e1620948dfb0e1b07245707374.jpg',5,NULL,'2020-10-16 07:38:56','2020-10-16 07:38:56',1,1,NULL,NULL),
(8,'2020-10-17_5f8b5d2728acb_85cc226b33c140607fbae6ac2e53f226a80312f7.jpg',5,NULL,'2020-10-17 21:07:51','2020-10-17 21:07:51',1,2,NULL,NULL),
(11,'2020-10-27_5f986726025f1_8a2d38039610bb707d8c328fc3d3ac2eb6ab750c.jpg',2,NULL,'2020-10-27 18:29:58','2020-10-27 18:29:58',1,1,NULL,NULL),
(13,'2020-10-27_5f9867acabedc_672460ad2e22b6e415338a6fe76c528ddfcbfed8.jpeg',2,NULL,'2020-10-27 18:32:12','2020-10-27 18:32:12',1,1,NULL,NULL),
(15,'2020-10-27_5f9867e3b81df_475f8e10cb550205c14789b3171aadae9cdf6ce7.jpg',2,NULL,'2020-10-27 18:33:07','2020-10-27 18:33:07',1,1,NULL,NULL);

/*Table structure for table `message_action` */

DROP TABLE IF EXISTS `message_action`;

CREATE TABLE `message_action` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `conversation_id` int(11) NOT NULL,
  `deleted_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_hard_delete` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `message_action` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2016_06_01_000001_create_oauth_auth_codes_table',1),
(4,'2016_06_01_000002_create_oauth_access_tokens_table',1),
(5,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),
(6,'2016_06_01_000004_create_oauth_clients_table',1),
(7,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),
(8,'2018_08_08_100000_create_telescope_entries_table',1),
(9,'2019_08_19_000000_create_failed_jobs_table',1),
(10,'2019_09_16_051035_create_conversations_table',1),
(11,'2019_11_12_104216_create_permission_tables',1),
(12,'2019_11_14_083512_add_is_default_in_roles_table',1),
(13,'2019_11_19_054306_create_message_action_table',1),
(14,'2019_12_03_095046_add_notifications_related_fields_to_users_table',1),
(15,'2019_12_07_103316_create_social_accounts_table',1),
(16,'2019_12_13_035642_create_blocked_users_table',1),
(17,'2019_12_19_052201_add_hard_delete_field_into_message_action_table',1),
(18,'2019_12_23_062919_create_groups_table',1),
(19,'2019_12_23_063618_create_group_users_table',1),
(20,'2019_12_23_063933_refactor_conversations_table_fields',1),
(21,'2019_12_24_090549_create_group_message_recipients',1),
(22,'2019_12_28_091028_create_last_conversations_table',1),
(23,'2020_02_21_121653_add_reply_id_into_conversations_table',1),
(24,'2020_03_25_113611_create_notifications_table',1),
(25,'2020_04_01_102138_add_new_field_in_conversations_table',1),
(26,'2020_04_02_075922_create_archived_users_table',1),
(27,'2020_04_14_054618_add_privacy_in_users_table',1),
(28,'2020_04_17_084626_add_gender_in_users_table',1),
(29,'2020_04_21_080910_make_url_details_field_nullable_in_conversations_table',1),
(30,'2020_04_24_054555_create_chat_request_table',1),
(31,'2020_04_24_091607_create_user_status_table',1),
(32,'2020_06_03_065505_create_reported_users_table',1),
(33,'2020_06_04_103406_create_settings_table',1),
(34,'2020_06_22_060630_add_deleted_at_in_users_table',1),
(35,'2020_06_24_040459_delete_conversation_of_deleted_users',1),
(36,'2020_06_25_091239_add_index_on_order_by_columns_in_users_table',1),
(37,'2020_06_25_094224_add_index_on_order_by_columns_in_reported_users_table',1),
(38,'2020_06_25_095142_add_index_on_order_by_columns_in_roles_table',1),
(39,'2020_06_25_100538_add_index_on_order_by_columns_in_conversations_table',1),
(40,'2020_06_25_101143_add_index_on_order_by_columns_in_notifications_table',1),
(41,'2020_06_25_101342_add_index_on_order_by_columns_in_groups_table',1),
(42,'2020_06_25_101618_add_index_on_order_by_columns_in_group_users_table',1);

/*Table structure for table `model_has_permissions` */

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_permissions` */

/*Table structure for table `model_has_roles` */

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_roles` */

insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values 
(2,'App\\Models\\User',1),
(2,'App\\Models\\User',2),
(2,'App\\Models\\User',3),
(2,'App\\Models\\User',4),
(2,'App\\Models\\User',5),
(2,'App\\Models\\User',6),
(2,'App\\Models\\User',7),
(2,'App\\Models\\User',8),
(2,'App\\Models\\User',9),
(2,'App\\Models\\User',10),
(2,'App\\Models\\User',11),
(2,'App\\Models\\User',12),
(2,'App\\Models\\User',13),
(2,'App\\Models\\User',14),
(2,'App\\Models\\User',16),
(2,'App\\Models\\User',17),
(2,'App\\Models\\User',18),
(2,'App\\Models\\User',19),
(2,'App\\Models\\User',20),
(2,'App\\Models\\User',21),
(2,'App\\Models\\User',22),
(2,'App\\Models\\User',24),
(2,'App\\Models\\User',25),
(2,'App\\Models\\User',26),
(2,'App\\Models\\User',27),
(2,'App\\Models\\User',28),
(2,'App\\Models\\User',29),
(2,'App\\Models\\User',30),
(2,'App\\Models\\User',31),
(2,'App\\Models\\User',32);

/*Table structure for table `notifications` */

DROP TABLE IF EXISTS `notifications`;

CREATE TABLE `notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `owner_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_id` bigint(20) unsigned NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `read_at` datetime DEFAULT NULL,
  `message_type` tinyint(4) NOT NULL DEFAULT 0,
  `file_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_created_at_index` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `notifications` */

/*Table structure for table `oauth_access_tokens` */

DROP TABLE IF EXISTS `oauth_access_tokens`;

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_access_tokens` */

/*Table structure for table `oauth_auth_codes` */

DROP TABLE IF EXISTS `oauth_auth_codes`;

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_auth_codes` */

/*Table structure for table `oauth_clients` */

DROP TABLE IF EXISTS `oauth_clients`;

CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_clients` */

/*Table structure for table `oauth_personal_access_clients` */

DROP TABLE IF EXISTS `oauth_personal_access_clients`;

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_personal_access_clients` */

/*Table structure for table `oauth_refresh_tokens` */

DROP TABLE IF EXISTS `oauth_refresh_tokens`;

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_refresh_tokens` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

/*Table structure for table `reported_users` */

DROP TABLE IF EXISTS `reported_users`;

CREATE TABLE `reported_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `reported_by` int(10) unsigned NOT NULL,
  `reported_to` int(10) unsigned NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reported_users_reported_by_foreign` (`reported_by`),
  KEY `reported_users_reported_to_foreign` (`reported_to`),
  KEY `reported_users_created_at_index` (`created_at`),
  CONSTRAINT `reported_users_reported_by_foreign` FOREIGN KEY (`reported_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reported_users_reported_to_foreign` FOREIGN KEY (`reported_to`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `reported_users` */

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_has_permissions` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `roles_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`guard_name`,`is_default`,`created_at`,`updated_at`) values 
(1,'Admin','',1,'2020-06-26 00:40:30','2020-06-26 00:40:30'),
(2,'Creater','',1,'2020-06-26 00:40:30','2020-06-26 00:40:30'),
(3,'User','',1,NULL,NULL);

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `settings` */

/*Table structure for table `social_accounts` */

DROP TABLE IF EXISTS `social_accounts`;

CREATE TABLE `social_accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `social_accounts_user_id_provider_provider_id_unique` (`user_id`,`provider`,`provider_id`),
  CONSTRAINT `social_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `social_accounts` */

/*Table structure for table `telescope_entries` */

DROP TABLE IF EXISTS `telescope_entries`;

CREATE TABLE `telescope_entries` (
  `sequence` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_hash` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `should_display_on_index` tinyint(1) NOT NULL DEFAULT 1,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`sequence`),
  UNIQUE KEY `telescope_entries_uuid_unique` (`uuid`),
  KEY `telescope_entries_batch_id_index` (`batch_id`),
  KEY `telescope_entries_type_should_display_on_index_index` (`type`,`should_display_on_index`),
  KEY `telescope_entries_family_hash_index` (`family_hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `telescope_entries` */

/*Table structure for table `telescope_entries_tags` */

DROP TABLE IF EXISTS `telescope_entries_tags`;

CREATE TABLE `telescope_entries_tags` (
  `entry_uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `telescope_entries_tags_entry_uuid_tag_index` (`entry_uuid`,`tag`),
  KEY `telescope_entries_tags_tag_index` (`tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `telescope_entries_tags` */

/*Table structure for table `telescope_monitoring` */

DROP TABLE IF EXISTS `telescope_monitoring`;

CREATE TABLE `telescope_monitoring` (
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `telescope_monitoring` */

/*Table structure for table `user_paid` */

DROP TABLE IF EXISTS `user_paid`;

CREATE TABLE `user_paid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `paid` float DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `finished_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_paid` */

insert  into `user_paid`(`id`,`user_id`,`creator_id`,`paid`,`created_at`,`finished_at`,`updated_at`) values 
(1,4,2,1000,'2020-10-27',NULL,'2020-10-27');

/*Table structure for table `user_relation` */

DROP TABLE IF EXISTS `user_relation`;

CREATE TABLE `user_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `relation` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_relation` */

insert  into `user_relation`(`id`,`user_id`,`creator_id`,`relation`,`created_at`,`updated_at`) values 
(1,4,2,3,'2020-10-27 17:54:13','2020-10-27 17:54:13');

/*Table structure for table `user_status` */

DROP TABLE IF EXISTS `user_status`;

CREATE TABLE `user_status` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `emoji` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emoji_short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_status` */

insert  into `user_status`(`id`,`user_id`,`emoji`,`emoji_short_name`,`status`,`created_at`,`updated_at`) values 
(1,4,'<img class=\"emojione\" alt=\"?\" title=\"\" src=\"https://cdn.jsdelivr.net/emojione/assets/3.1/png/32/1f431.png\"/>',':cat:','mmm','2020-10-18 08:37:00','2020-10-18 08:37:00');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL,
  `is_online` tinyint(4) DEFAULT 0,
  `is_active` tinyint(4) DEFAULT 0,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_system` tinyint(4) DEFAULT 0,
  `player_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'One signal user id',
  `is_subscribed` tinyint(1) DEFAULT NULL,
  `privacy` int(11) NOT NULL DEFAULT 1,
  `gender` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user` int(11) DEFAULT 1,
  `twitter_link` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_price` double DEFAULT NULL,
  `contractamount` double DEFAULT NULL,
  `fee` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_player_id_unique` (`player_id`),
  KEY `users_name_index` (`name`),
  KEY `users_email_index` (`email`),
  KEY `users_phone_index` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`phone`,`last_seen`,`is_online`,`is_active`,`about`,`photo_url`,`activation_code`,`remember_token`,`created_at`,`updated_at`,`is_system`,`player_id`,`is_subscribed`,`privacy`,`gender`,`deleted_at`,`user`,`twitter_link`,`instagram_link`,`youtube_link`,`monthly_price`,`contractamount`,`fee`) values 
(1,'Ayane','Ayane@gmail.com',NULL,'$2y$10$tsM0lMGySIYfTe9rwZFSS.KHOvQ8RbB9FCT7jKu2yU6XS4A7aMMHK',NULL,'2020-10-22 08:37:58',0,1,'i\'m pretty girl.i\'m pretty girl.i\'m pretty girl.i\'m pretty girl.','2020-10-16_5f894b763d180_427f40ff8509624ef03ff7853a3c22e38576c609.jpg','5f80fb4ab760c','IKp4LddWLiARDJ8tQKrs7aqw70lADI97UceKlVaLKXeEaB0ipqEFDeo9okrg','2020-10-10 00:07:38','2020-10-22 08:37:58',0,NULL,0,1,NULL,NULL,2,'http://facebook',NULL,NULL,NULL,NULL,NULL),
(2,'saki','saki@gmail.com',NULL,'$2y$10$m3f3cIup8F1Tqa3PmOYXGeiE0Nnnz/DQojJCQUunWP6ocdzhtt4au',NULL,'2020-10-27 18:37:27',0,1,NULL,'2020-10-16_5f894bd415198_ed5a3401f0e70f904c9d50c3c38ce7b29bee5d2e.png','5f80fba77cba9',NULL,'2020-10-10 00:09:11','2020-10-27 18:37:27',0,NULL,NULL,1,NULL,NULL,2,NULL,NULL,'http://youtube',1000,800,200),
(3,'fujioka','fujioka@gmail.com',NULL,'$2y$10$ystICqB6hG8WwMtDyXA06eLM0TIqwa7uPc3rPSDES1aonLu/.GyS2',NULL,'2020-10-16 07:31:12',0,1,NULL,'2020-10-16_5f894c1a49cef_3a8dc4c2d56a88ee3279ef9eaeb9c7ee035c3ad3.jpg','5f80fbd587298','lSR8ACMJvdAGOo1H4dUxi8UUF49On51NFvXOvtZBgKZkQH8BoUUi84xe1lSR','2020-10-10 00:09:57','2020-10-16 07:31:12',0,NULL,NULL,1,NULL,NULL,2,NULL,NULL,'http://youtube',NULL,NULL,NULL),
(4,'yuri','yuri@gmail.com',NULL,'$2y$10$bmKdrWuOk5eKD1Tw31rG1uy1A4kpjLD0amvyPDO5T8hWMUzRIS2Zu',NULL,'2020-10-27 18:23:20',0,1,NULL,'2020-10-13_5f8635ef8cdd0_568b2cf49d03f30814d2aa6a82a3b7f718f32f01.jpg','5f80fc1b2a1f0','9fbnxywTWTk0b2xYhXaFBqysbmpSZRgg1vbWuAHemub44MUrOO3RObRBD0Tf','2020-10-10 00:11:07','2020-10-27 18:23:20',0,NULL,NULL,1,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL),
(6,'Akiko','akiko@gmail.com',NULL,'$2y$10$BrqWd8tPjWllIvtnweZp3uktnK0H/cGuGA44M1qHbhANVZXbyBPui',NULL,'2020-10-26 22:07:44',0,1,NULL,'2020-10-16_5f894ba364e26_bc91b6d78c6029b951071d5e5126dbf70ec8ca0e.jpg','5f863409f39b9',NULL,'2020-10-13 23:11:05','2020-10-26 22:07:44',0,NULL,NULL,1,NULL,NULL,2,NULL,NULL,NULL,1500,1200,300),
(7,'mimi','mimi@gmail.com',NULL,'$2y$10$/3wGEdwlNKFviPp/YhmkK.vxmwpiKqmbSlpVTrYrr39wXKbSdVbdS',NULL,'2020-10-26 20:31:35',0,1,NULL,'2020-10-16_5f894ca03f288_e9df70091db7270919ad191bed2e276dbb5198b9.png','5f863450a320c',NULL,'2020-10-13 23:12:16','2020-10-26 20:31:35',0,NULL,NULL,1,NULL,NULL,2,NULL,NULL,NULL,1000,800,200),
(8,'Super Admin','admin@gmail.com',NULL,'$2y$10$/3wGEdwlNKFviPp/YhmkK.vxmwpiKqmbSlpVTrYrr39wXKbSdVbdS',NULL,'2020-10-23 04:53:27',0,1,NULL,NULL,NULL,NULL,'2020-06-26 07:40:30','2020-10-23 04:53:27',1,NULL,NULL,1,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL),
(9,'momo','momo@gmail.com',NULL,'$2y$10$5GSbohjTO7WFNDMmJTNXYO.8AB0vLUdIzDfDfR3ZYQ8WhLylkTnWC',NULL,'2020-10-27 18:54:44',0,1,NULL,NULL,'5f9868ffedf73',NULL,'2020-10-27 18:37:51','2020-10-27 18:54:44',0,NULL,NULL,1,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
