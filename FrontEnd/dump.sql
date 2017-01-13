-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: wt
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `feedback` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES ('\n		Testni feedback...\n	'),('Neki novi feedback...'),('A ima i Meho nesta i da skazuje'),('Edin ima i neki feedback za ostaviti'),('Edin ima i neki feedback za ostaviti');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ocjene`
--

DROP TABLE IF EXISTS `ocjene`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ocjene` (
  `trener` varchar(30) NOT NULL,
  `ocjena` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ocjene`
--

LOCK TABLES `ocjene` WRITE;
/*!40000 ALTER TABLE `ocjene` DISABLE KEYS */;
INSERT INTO `ocjene` VALUES ('Trener 2',8),('Trener 1',4),('Trener 1',4),('Trener 1',4),('Trener 1',4),('Trener 1',4),('Trener 1',4),('Trener 2',2),('Trener 2',2),('Trener 2',2),('Trener 2',2),('Trener 2',6),('Trener 2',6),('Trener 2',6),('Trener 2',6),('Trener 3',6),('Trener 3',6),('Trener 3',6),('Trener 3',6),('Trener 3',6),('Trener 3',1),('Trener 3',1),('Trener 3',1),('Trener 3',1),('Trener 3',1),('Trener 3',10),('Trener 3',10),('Trener 3',10),('Trener 3',10),('Trener 4',10),('Trener 4',10),('Trener 4',10),('Trener 4',3),('Trener 4',3),('Trener 4',3),('Trener 4',3),('Trener 4',3),('Trener 4',5),('Trener 4',5),('Trener 4',5),('Trener 4',5),('Trener 4',5),('Trener 4',5),('Trener 4',7);
/*!40000 ALTER TABLE `ocjene` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pitanje`
--

DROP TABLE IF EXISTS `pitanje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pitanje` (
  `ime` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pitanje` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pitanje`
--

LOCK TABLES `pitanje` WRITE;
/*!40000 ALTER TABLE `pitanje` DISABLE KEYS */;
INSERT INTO `pitanje` VALUES ('Testno Ime','test@test.com','Test?'),('Edin','mail@mail.com','Moje neko pitanje?'),('Edin','mail@mail.com','Moje neko pitanje?'),('Meho Kuduzovic','mehin@mail.com','Ima i Meho nesta da pita?'),('','',''),('','',''),('Edin','mail@mail.com','Edinovo pitanje?'),('Edin','mail@mail.com','Edinovo novo pitanje?');
/*!40000 ALTER TABLE `pitanje` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-13 17:05:11
