-- MariaDB dump 10.19  Distrib 10.10.3-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: job_orbitz
-- ------------------------------------------------------
-- Server version	10.10.3-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins_login`
--

DROP TABLE IF EXISTS `admins_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins_login` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins_login`
--

LOCK TABLES `admins_login` WRITE;
/*!40000 ALTER TABLE `admins_login` DISABLE KEYS */;
INSERT INTO `admins_login` VALUES
(1,'mishaqrajpoot0009@gmail.com','$2y$10$QOlOtVMRt2CEocmpU62WOePkNEMJhhskyQ.btLEKUcwOvTZ/wtdva');
/*!40000 ALTER TABLE `admins_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `organization` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `description` varchar(500) NOT NULL,
  `posted_date` date NOT NULL,
  `last_date` date NOT NULL,
  `province` varchar(128) NOT NULL,
  `requirements` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `FULLTEXT` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES
(27,'Software Developer','Islamia College','images1676450927.jpg','adsasdsadadsadasdasrtgretretreet','2023-02-15','2023-02-28','Sindh','Intermediate'),
(28,'Backend Developer','GMC Girls College','images1676450999.jpg','Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum sed voluptatem perferendis cupiditate odio assumenda et saepe. Enim, quibusdam sequi?','2023-02-15','2023-02-28','Punjab','Bachelor'),
(29,'Butler','Mishaq ka ghar','images1676451179.jpg','Very nais job just apply everyone','2023-02-15','2023-02-28','Sindh','Matric or less'),
(30,'peon','Islamia College','images1676452150.jpg','Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam nisi, commodi sapiente repellendus ab ducimus quod provident incidunt eius. Doloremque.','2023-02-15','2023-02-18','Khyber PakhtunKhwa','Not Required'),
(31,'Plumber','Texas Plumbing Solutions','images1676452210.jpg','Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam nisi, commodi sapiente repellendus ab ducimus quod provident incidunt eius. Doloremque.','2023-02-15','2023-02-28','Punjab','Diploma in Engineering'),
(32,'HR Manager','IBA Sukkur','images1676452292.jpg','Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam nisi, commodi sapiente repellendus ab ducimus quod provident incidunt eius. Doloremque.','2023-02-15','2023-03-11','Sindh','M.Phill in HRM'),
(33,'Computer Lecturer ','Islamia College','images1676452331.jpg','Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam nisi, commodi sapiente repellendus ab ducimus quod provident incidunt eius. Doloremque.','2023-02-15','2023-02-28','Balochistan','Masters in CS'),
(34,'Web Developer','Swift Softwares','images1676452393.jpg','Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam nisi, commodi sapiente repellendus ab ducimus quod provident incidunt eius. Doloremque.','2023-02-15','2023-02-28','Sindh','Fresh Intern'),
(35,'Computer Operator','Y2K School','images1676452450.jpg','Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam nisi, commodi sapiente repellendus ab ducimus quod provident incidunt eius. Doloremque.','2023-02-15','2023-02-28','Balochistan','Intermediate'),
(36,'Freelance Teacher','PIMSD','images1676452502.jpg','Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam nisi, commodi sapiente repellendus ab ducimus quod provident incidunt eius. Doloremque.','2023-02-15','2023-04-30','Balochistan','Bachelor');
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_register`
--

DROP TABLE IF EXISTS `student_register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_register` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `activation_link` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_register`
--

LOCK TABLES `student_register` WRITE;
/*!40000 ALTER TABLE `student_register` DISABLE KEYS */;
INSERT INTO `student_register` VALUES
(1,'Ishaq','mishaqrajpoot0009@gmail.com','$2y$10$YayeutEHpi2.q4dd9Tw80OJq6uFqPxgQw8EaXtAQ.wobSq00MiiqC','',0),
(2,'Muhammad Ishaq Rajpoot','mishaqrajpoot24@gmail.com','$2y$10$I7.F3zS/aVMy.0jSPZfwKOQ.KIngATh7P4XJ1S2JruV2AcljXWdqC','',0),
(3,'Abdul Ghani','abc@gmail.com','$2y$10$uxtdIrZA5WZ/rlKucOfJme7LUkUsfK7hJEsItGrKDDr2kK4tYSDA6','',0),
(6,'Imti','Imti@gmail.com','$2y$10$AjO6dc9Ru.MncE4g9ZepJuYnNxTmvJbRp2bjaRaZYp7WYbowcLS62','',0),
(7,'','','$2y$10$bzRN6ldjYSpbDATWsYAvoOllXisgOk4lGqTxDAhbBMHmTVrBGFgAu','',0),
(8,'Muhammad Ishaq Rajpoot','rjee5755@gmail.com','$2y$10$xhG1mX0FhkMxZXom7zEwU.vrT91BdBLYdURSikaCL66RfRO.l5f7y','',0),
(9,'Faheem','Faheem@gmail.com','$2y$10$U9yXi3LJvcueB19h2vJxcuyqM9.3PrCqw5cNFPA1MT4KcfmLgZSnG','',0),
(10,'Imti','Imti69@gmail.com','$2y$10$Cvsb/OYXrWs2YwPPiUuS8uNL9y/SMLDqo8JHRHM7gUIuizvncmneu','21dd3a2641991409fe2736c01e1906c4',0),
(11,'Muhammad Ishaq Rajpoot','irl@gmail.com','$2y$10$LI0XHxifJ41vOUmoidMvle571CSrRyQhZD10QKnxSNyU9DBH3natK','47e6ef3d8301524071a72ddcf368286a',0),
(12,'Muhammad Ishaq Rajpoot','ishaqr871@gmail.com','$2y$10$qwnf1YL0OqCOOIrgyV0/jepx74WENj9uxA8G3XT6HELkMTpGPEGqS','d81302225708b93dbb98dafa845f2634',0);
/*!40000 ALTER TABLE `student_register` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-21  3:00:03
