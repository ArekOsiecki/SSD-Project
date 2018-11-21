-- MySQL dump 10.16  Distrib 10.1.32-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: RestaurantSYS
-- ------------------------------------------------------
-- Server version	10.1.32-MariaDB

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
-- Table structure for table `guests`
--

DROP TABLE IF EXISTS `guests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guests` (
  `Guest_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Guest_Phone` int(15) NOT NULL,
  `Guest_Email` varchar(40) NOT NULL,
  `Guest_Name` varchar(40) NOT NULL,
  PRIMARY KEY (`Guest_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guests`
--

LOCK TABLES `guests` WRITE;
/*!40000 ALTER TABLE `guests` DISABLE KEYS */;
INSERT INTO `guests` VALUES (1,879876543,'john.wick@gmail.com','John Wick'),(3,879876543,'john.wick@gmail.com','John Wick'),(4,879876543,'john.wick@gmail.com','John Wick'),(5,578676,'blaha@gmail.com','blaha'),(6,879876543,'john.wick@gmail.com','John Wick'),(7,879876543,'john.wick@gmail.com','John Wick'),(8,851234567,'JBloggs@gmail.com','Joe Bloggs');
/*!40000 ALTER TABLE `guests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservations` (
  `Reservation_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Reservation_Checkin` varchar(1) NOT NULL,
  `Reservation_Slot` varchar(1) NOT NULL,
  `Reservation_Date` date NOT NULL,
  `Reservation_Details` varchar(60) DEFAULT NULL,
  `Guest_id` int(11) NOT NULL,
  `Table_id` int(1) NOT NULL,
  PRIMARY KEY (`Reservation_Id`),
  KEY `Guest_id` (`Guest_id`),
  KEY `Table_id` (`Table_id`),
  CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`Guest_id`) REFERENCES `guests` (`Guest_Id`),
  CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`Table_id`) REFERENCES `tables` (`Table_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tables`
--

DROP TABLE IF EXISTS `tables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tables` (
  `Table_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Table_Seats` int(1) NOT NULL,
  `Table_Status` varchar(1) NOT NULL,
  `Table_Description` varchar(20) NOT NULL,
  PRIMARY KEY (`Table_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tables`
--

LOCK TABLES `tables` WRITE;
/*!40000 ALTER TABLE `tables` DISABLE KEYS */;
INSERT INTO `tables` VALUES (1,4,'o','Table by the window'),(3,4,'o','Table by the window');
/*!40000 ALTER TABLE `tables` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-21 16:41:35
