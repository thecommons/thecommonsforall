-- MySQL dump 10.13  Distrib 5.1.66, for debian-linux-gnu (x86_64)
--
-- Host: sql.hope.isthewayforward.com    Database: hope_np
-- ------------------------------------------------------
-- Server version	5.1.53-log

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
-- Table structure for table `action`
--

DROP TABLE IF EXISTS `action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action_name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `action`
--

LOCK TABLES `action` WRITE;
/*!40000 ALTER TABLE `action` DISABLE KEYS */;
/*!40000 ALTER TABLE `action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `action_required`
--

DROP TABLE IF EXISTS `action_required`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `action_required` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `action_required`
--

LOCK TABLES `action_required` WRITE;
/*!40000 ALTER TABLE `action_required` DISABLE KEYS */;
/*!40000 ALTER TABLE `action_required` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `person_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6DE30D91217BBB47` (`person_id`),
  KEY `IDX_6DE30D9171F7E88B` (`event_id`),
  CONSTRAINT `FK_6DE30D91217BBB47` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`),
  CONSTRAINT `FK_6DE30D9171F7E88B` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendance`
--

LOCK TABLES `attendance` WRITE;
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (1,'Sunday Gathering'),(2,'Community Group');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `family`
--

DROP TABLE IF EXISTS `family`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `family` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leader_id` int(11) DEFAULT NULL,
  `smallgroup_id` int(11) DEFAULT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` date NOT NULL,
  `phone_cell` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_home` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_first` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_second` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_city` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_state` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_zip` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_country` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_A5E6215B73154ED4` (`leader_id`),
  KEY `IDX_A5E6215BC517E2B6` (`smallgroup_id`),
  CONSTRAINT `FK_A5E6215BC517E2B6` FOREIGN KEY (`smallgroup_id`) REFERENCES `smallgroup` (`id`),
  CONSTRAINT `FK_A5E6215B73154ED4` FOREIGN KEY (`leader_id`) REFERENCES `person` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `family`
--

LOCK TABLES `family` WRITE;
/*!40000 ALTER TABLE `family` DISABLE KEYS */;
/*!40000 ALTER TABLE `family` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leader_id` int(11) DEFAULT NULL,
  `family_id` int(11) DEFAULT NULL,
  `smallgroup_id` int(11) DEFAULT NULL,
  `name_first` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `name_last` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_created` date NOT NULL,
  `phone_cell` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_home` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_first` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_second` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_city` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_state` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_zip` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_country` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` tinyint(1) DEFAULT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `how_heard` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_34DCD17673154ED4` (`leader_id`),
  KEY `IDX_34DCD176C35E566A` (`family_id`),
  KEY `IDX_34DCD176C517E2B6` (`smallgroup_id`),
  CONSTRAINT `FK_34DCD17673154ED4` FOREIGN KEY (`leader_id`) REFERENCES `person` (`id`),
  CONSTRAINT `FK_34DCD176C35E566A` FOREIGN KEY (`family_id`) REFERENCES `family` (`id`),
  CONSTRAINT `FK_34DCD176C517E2B6` FOREIGN KEY (`smallgroup_id`) REFERENCES `smallgroup` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person`
--

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `person_role`
--

DROP TABLE IF EXISTS `person_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person_role` (
  `person_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`person_id`,`role_id`),
  KEY `IDX_DD8F0E41217BBB47` (`person_id`),
  KEY `IDX_DD8F0E41D60322AC` (`role_id`),
  CONSTRAINT `FK_DD8F0E41D60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  CONSTRAINT `FK_DD8F0E41217BBB47` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person_role`
--

LOCK TABLES `person_role` WRITE;
/*!40000 ALTER TABLE `person_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `person_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `referrer`
--

DROP TABLE IF EXISTS `referrer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `referrer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referrer`
--

LOCK TABLES `referrer` WRITE;
/*!40000 ALTER TABLE `referrer` DISABLE KEYS */;
INSERT INTO `referrer` VALUES (1,'Internet - Google'),(2,'Internet - Yelp'),(3,'Internet - Facebook'),(4,'Family'),(5,'Friends');
/*!40000 ALTER TABLE `referrer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Leader'),(2,'Staff'),(3,'Member'),(4,'Adult'),(5,'Child'),(6,'Infant');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `smallgroup`
--

DROP TABLE IF EXISTS `smallgroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `smallgroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leader_id` int(11) DEFAULT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` date NOT NULL,
  `meet_time` datetime DEFAULT NULL,
  `meet_location` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_first` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_second` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_city` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_state` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_zip` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addr_country` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_D75BCA5373154ED4` (`leader_id`),
  CONSTRAINT `FK_D75BCA5373154ED4` FOREIGN KEY (`leader_id`) REFERENCES `person` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `smallgroup`
--

LOCK TABLES `smallgroup` WRITE;
/*!40000 ALTER TABLE `smallgroup` DISABLE KEYS */;
/*!40000 ALTER TABLE `smallgroup` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-11-21 11:23:46
