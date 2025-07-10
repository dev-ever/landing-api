/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.10-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u725112231_jwf
-- ------------------------------------------------------
-- Server version	10.11.10-MariaDB-log

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
-- Table structure for table `tb_backup`
--

DROP TABLE IF EXISTS `tb_backup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_backup` (
  `idback` int(11) NOT NULL AUTO_INCREMENT,
  `backup` varchar(255) NOT NULL,
  `observations` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `link` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`idback`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_backup`
--

LOCK TABLES `tb_backup` WRITE;
/*!40000 ALTER TABLE `tb_backup` DISABLE KEYS */;
INSERT INTO `tb_backup` VALUES
(1,'u725112231_jwf_20250702183457.sql','Respaldo: Wednesday, July 2, 2025','2025-07-02 18:34:57','backups/u725112231_jwf_20250702183457.sql',1),
(2,'u725112231_jwf_20250702184737.sql','Backup: Wednesday, July 2, 2025','2025-07-02 18:47:37','backups/u725112231_jwf_20250702184737.sql',1),
(3,'u725112231_jwf_20250703025553.sql','Backup: Thursday, July 3, 2025','2025-07-03 02:55:53','backups/u725112231_jwf_20250703025553.sql',1),
(4,'u725112231_jwf_20250703025701.sql','Backup: Thursday, July 3, 2025','2025-07-03 02:57:01','backups/u725112231_jwf_20250703025701.sql',1),
(5,'u725112231_jwf_20250703025710.sql','Backup: Thursday, July 3, 2025','2025-07-03 02:57:10','backups/u725112231_jwf_20250703025710.sql',1),
(6,'u725112231_jwf_20250703025721.sql','Backup: Thursday, July 3, 2025','2025-07-03 02:57:21','backups/u725112231_jwf_20250703025721.sql',1),
(7,'u725112231_jwf_20250703055842.sql','Backup: Thursday, July 3, 2025','2025-07-03 05:58:42','backups/u725112231_jwf_20250703055842.sql',1);
/*!40000 ALTER TABLE `tb_backup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_logs`
--

DROP TABLE IF EXISTS `tb_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_logs` (
  `idLog` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(255) NOT NULL,
  `type` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL,
  `private_id` varchar(50) NOT NULL,
  `public_id` varchar(50) NOT NULL,
  `eject` datetime NOT NULL,
  PRIMARY KEY (`idLog`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_logs`
--

LOCK TABLES `tb_logs` WRITE;
/*!40000 ALTER TABLE `tb_logs` DISABLE KEYS */;
INSERT INTO `tb_logs` VALUES
(1,'Ingreso al sistema, user: ','Enter Session',1,'dsl-201-145-140-137-dyn.prod-infinitum.com.mx','201.145.140.137','2025-07-01 12:44:04'),
(2,'Ingreso al sistema, user: ','Enter Session',1,'dsl-201-145-140-137-dyn.prod-infinitum.com.mx','201.145.140.137','2025-07-01 12:44:56'),
(3,'Ingreso al sistema, user: admin','Enter Session',1,'dsl-201-145-140-137-dyn.prod-infinitum.com.mx','201.145.140.137','2025-07-01 12:45:55'),
(4,'Ingreso al sistema, user: admin','Enter Session',1,'dsl-201-145-140-137-dyn.prod-infinitum.com.mx','201.145.140.137','2025-07-01 15:20:06'),
(5,'Ingreso al sistema, user: Juty Akita','Enter Session',1,'dsl-201-145-140-137-dyn.prod-infinitum.com.mx','201.145.140.137','2025-07-01 15:49:13'),
(6,'Ingreso al sistema, user: Juty Akita','Enter Session',1,'dsl-201-145-140-137-dyn.prod-infinitum.com.mx','201.145.140.137','2025-07-01 15:49:33'),
(7,'Ingreso al sistema, user: Juty Akita','Enter Session',1,'2806:2a0:210:8a39:f4f4:93a1:3ce3:5ebc','2806:2a0:210:8a39:f4f4:93a1:3ce3:5ebc','2025-07-01 18:57:37'),
(8,'Ingreso al sistema, user: Juty Akita','Enter Session',1,'dsl-201-145-140-137-dyn.prod-infinitum.com.mx','201.145.140.137','2025-07-02 08:54:37'),
(9,'Update Company ','Update',1,'dsl-201-145-140-137-dyn.prod-infinitum.com.mx','201.145.140.137','2025-07-02 17:24:00'),
(10,'Update Company ','Update',1,'dsl-201-145-140-137-dyn.prod-infinitum.com.mx','201.145.140.137','2025-07-02 17:26:24'),
(11,'Update Company ','Update',1,'dsl-201-145-140-137-dyn.prod-infinitum.com.mx','201.145.140.137','2025-07-02 17:29:10'),
(12,'Update Company ','Update',1,'dsl-201-145-140-137-dyn.prod-infinitum.com.mx','201.145.140.137','2025-07-02 17:31:50'),
(13,'Ingreso al sistema, user: Juty Akita','Enter Session',1,'2806:2a0:210:8a39:c463:b85e:19fb:9a4c','2806:2a0:210:8a39:c463:b85e:19fb:9a4c','2025-07-02 19:31:56'),
(14,'Ingreso al sistema, user: Juty Akita','Enter Session',1,'2806:2a0:210:8a39:73ba:fbfd:ced0:e518','2806:2a0:210:8a39:73ba:fbfd:ced0:e518','2025-07-03 00:00:14'),
(15,'Ingreso al sistema, user: Juty Akita','Enter Session',1,'2806:2a0:210:8a39:df94:30b8:cdbc:7f3c','2806:2a0:210:8a39:df94:30b8:cdbc:7f3c','2025-07-03 01:23:03'),
(16,'Ingreso al sistema, user: Juty Akita','Enter Session',1,'2806:2a0:210:8a39:bcf3:9609:26f1:4e5e','2806:2a0:210:8a39:bcf3:9609:26f1:4e5e','2025-07-07 23:36:01');
/*!40000 ALTER TABLE `tb_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_template`
--

DROP TABLE IF EXISTS `tb_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_template` (
  `idTemplate` int(11) NOT NULL AUTO_INCREMENT,
  `folio` varchar(50) NOT NULL,
  `company` varchar(255) NOT NULL,
  `commCompany` varchar(255) NOT NULL,
  `companyIde` varchar(50) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `favicon` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`idTemplate`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_template`
--

LOCK TABLES `tb_template` WRITE;
/*!40000 ALTER TABLE `tb_template` DISABLE KEYS */;
INSERT INTO `tb_template` VALUES
(1,'F-0001','Asus Company SA','Asus Mexico City','ASUS8765423HG','view/img/template/ASUS8765423HG/695.png','view/img/template/ASUS8765423HG/973.png','Mexico, Mex',1,'2025-07-02 17:31:50');
/*!40000 ALTER TABLE `tb_template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user` varchar(150) NOT NULL,
  `email` varchar(250) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `password` varchar(350) NOT NULL,
  `profile` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `lastLogin` datetime NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_users`
--

LOCK TABLES `tb_users` WRITE;
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` VALUES
(1,'Juty Akita','admin','root@emauro.com.mx','view/img/users/admin/670.jpg','$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG',1,'2025-06-30 23:35:19',1,1,'2025-07-07 23:36:01');
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-07-09 19:57:41
