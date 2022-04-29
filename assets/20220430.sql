-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: ci3-blog
-- ------------------------------------------------------
-- Server version	5.7.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blogs` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_title` varchar(128) DEFAULT NULL,
  `blog_desc` text,
  `blog_url` varchar(256) DEFAULT NULL,
  `blog_text` text,
  `blog_created_at` datetime DEFAULT NULL,
  `blog_updated_at` datetime DEFAULT NULL,
  `blog_created_by` varchar(45) DEFAULT NULL,
  `blog_publish` enum('Y','N') DEFAULT 'N',
  `blog_image` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (3,'kamu jahat banget si cuekin aku ya gimana lagi','aku coba persiapkan apa aja yang akan jadi kebutuhan kita malah kamu abaikan','kamu-jahat-banget-si-cuekin-aku-ya-gimana-lagi','<p>aku coba persiapkan apa aja yang akan jadi kebutuhan kita malah kamu abaikan, apa kamu tidak mengerti bagaimana capeknya aku</p><p style=\"text-align: center; \"> <img style=\"width: 25%;\" src=\"{base_url}assets/upload/file/2022/04/09/Screenshot_2022-01-10-09-37-24-17.jpg\"></p><p style=\"text-align: left;\">Iya udah lah aku pasrah sama tuhan, biar ku jalani hidup ini sejalannya saja</p>','2022-04-09 20:07:51','2022-04-24 19:40:44','admin','Y','{base_url}assets/upload/file/2022/04/09/Screenshot_from_2022-03-05_14-32-55.png'),(4,'coba cari yang lain','ternyata tidak bisa','coba-cari-yang-lain','<p>ahhh sudahlahhhhh</p>','2022-04-09 20:17:21','2022-04-24 13:37:33','admin','Y','{base_url}assets/upload/file/2022/04/09/Screenshot_from_2022-03-05_14-32-55.png'),(6,'coba post','coba post aja','coba-post','<p>coba post aja atuh ahhh</p>','2022-04-23 22:32:01','2022-04-23 22:36:03','admin','Y','{base_url}assets/upload/file/2022/04/09/Screenshot_from_2022-03-05_14-32-55.png');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_desc` varchar(128) DEFAULT NULL,
  `file_path` varchar(256) DEFAULT NULL,
  `file_created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (1,'Gambar Contoh','assets/upload/file/2022/04/09/Screenshot_2022-01-10-09-37-24-17.jpg','2022-04-09 10:03:00'),(2,'File Script','assets/upload/file/2022/04/09/Screenshot_from_2022-03-05_14-32-55.png','2022-04-09 11:40:59');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profils`
--

DROP TABLE IF EXISTS `profils`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profils` (
  `profil_user_id` int(11) NOT NULL,
  `profil_name` varchar(64) DEFAULT NULL,
  `profil_email` varchar(32) DEFAULT NULL,
  `profil_education` varchar(128) DEFAULT NULL,
  `profil_location` varchar(45) DEFAULT NULL,
  `profil_skill` varchar(128) DEFAULT NULL,
  `profil_experience` text,
  `profil_image` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`profil_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profils`
--

LOCK TABLES `profils` WRITE;
/*!40000 ALTER TABLE `profils` DISABLE KEYS */;
INSERT INTO `profils` VALUES (1,'Pindipin','nurkhafindi@gmail.com','Universitas Islam Nahdlatul Ulama Jepara','Margoyoso RT 01 RW 03 Kalinyamatan Jepara','PHP, MySQL, Python, Javascript','Membuat Aplikasi Pemetaan Rumah Tidak Layak Huni','assets/upload/profil/271262612_451503273358959_1287850720519054893_n.jpg');
/*!40000 ALTER TABLE `profils` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(45) DEFAULT NULL,
  `user_password` text,
  `user_active` enum('active','nonactive') DEFAULT NULL,
  `user_created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_updated_at` datetime DEFAULT NULL,
  `user_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_username_UNIQUE` (`user_username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','$2y$10$Ka3bEtq.SMB8WxSpIN0rUOXiBgyCWW98Hhp3/UyrF3GqojdSgzk3q','active','2022-04-24 12:30:03',NULL,NULL),(2,'pindipin','$2y$10$gFl5UP03ROnpVJ18ZQUulucFXfS8nyYTyYOwTtVjU5tzr16C.l8OW','active','2022-04-24 13:23:47',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-30  3:53:49
