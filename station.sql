-- MySQL dump 10.13  Distrib 5.7.9, for Win32 (AMD64)
--
-- Host: localhost    Database: station
-- ------------------------------------------------------
-- Server version	5.7.9-log

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
-- Table structure for table `fs_admin`
--

DROP TABLE IF EXISTS `fs_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fs_admin` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `username` char(40) NOT NULL,
  `password` char(40) NOT NULL,
  `nickname` char(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fs_admin`
--

LOCK TABLES `fs_admin` WRITE;
/*!40000 ALTER TABLE `fs_admin` DISABLE KEYS */;
INSERT INTO `fs_admin` VALUES (1,'653bc87ec4fdcd6e29942d0206ceb9f0','9c011d21e607e6991c87210a830c0edf','jeffery@linsanity.cc');
/*!40000 ALTER TABLE `fs_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fs_music`
--

DROP TABLE IF EXISTS `fs_music`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fs_music` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `musicname` char(100) DEFAULT NULL,
  `musicsavename` char(50) DEFAULT NULL,
  `size` char(20) DEFAULT NULL,
  `href` char(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fs_music`
--

LOCK TABLES `fs_music` WRITE;
/*!40000 ALTER TABLE `fs_music` DISABLE KEYS */;
/*!40000 ALTER TABLE `fs_music` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fs_picture`
--

DROP TABLE IF EXISTS `fs_picture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fs_picture` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `picname` char(50) DEFAULT NULL,
  `picsavename` char(50) DEFAULT NULL,
  `wid_hei` char(12) DEFAULT NULL,
  `size` char(20) DEFAULT NULL,
  `href` char(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fs_picture`
--

LOCK TABLES `fs_picture` WRITE;
/*!40000 ALTER TABLE `fs_picture` DISABLE KEYS */;
/*!40000 ALTER TABLE `fs_picture` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-13 10:43:15
