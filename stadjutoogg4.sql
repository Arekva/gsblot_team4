-- MySQL dump 10.13  Distrib 8.0.21, for Linux (x86_64)
--
-- Host: localhost    Database: stadjutoogg4
-- ------------------------------------------------------
-- Server version	8.0.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `gsb_echantillon`
--

DROP TABLE IF EXISTS `gsb_echantillon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gsb_echantillon` (
  `gsb_numero` int NOT NULL AUTO_INCREMENT,
  `gsb_numeroLot` int NOT NULL,
  `dateSortie` datetime DEFAULT NULL,
  `dateDon` datetime DEFAULT NULL,
  `gsb_idVisitualisateur` varchar(50) DEFAULT NULL,
  `gsb_matriculeMedecins` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`gsb_numero`,`gsb_numeroLot`),
  KEY `gsb_idVisitualisateur` (`gsb_idVisitualisateur`),
  KEY `gsb_matriculeMedecins` (`gsb_matriculeMedecins`),
  KEY `gsb_numeroLot` (`gsb_numeroLot`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gsb_echantillon`
--

LOCK TABLES `gsb_echantillon` WRITE;
/*!40000 ALTER TABLE `gsb_echantillon` DISABLE KEYS */;
INSERT INTO `gsb_echantillon` VALUES (1,1,'2020-09-07 00:00:00','2020-09-08 00:00:00','3','T2eW0R1D');
/*!40000 ALTER TABLE `gsb_echantillon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gsb_lot`
--

DROP TABLE IF EXISTS `gsb_lot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gsb_lot` (
  `gsb_numero` int NOT NULL,
  `gsb_dateFabricaion` datetime DEFAULT NULL,
  `gsb_idMedicament` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`gsb_numero`),
  KEY `gsb_idMedicament` (`gsb_idMedicament`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gsb_lot`
--

LOCK TABLES `gsb_lot` WRITE;
/*!40000 ALTER TABLE `gsb_lot` DISABLE KEYS */;
INSERT INTO `gsb_lot` VALUES (1,'2019-12-10 00:00:00','3');
/*!40000 ALTER TABLE `gsb_lot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gsb_medecins`
--

DROP TABLE IF EXISTS `gsb_medecins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gsb_medecins` (
  `gsb_matricule` varchar(50) NOT NULL,
  `gsb_nom` varchar(50) DEFAULT NULL,
  `gsb_prenom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`gsb_matricule`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gsb_medecins`
--

LOCK TABLES `gsb_medecins` WRITE;
/*!40000 ALTER TABLE `gsb_medecins` DISABLE KEYS */;
INSERT INTO `gsb_medecins` VALUES ('T2eW0R1D','Brando','DIO'),('AATTORNEY','Wright','Pheonix'),('MATH2M2G1C1AN','Roui','Lucian'),('TOFU','Fujiwara','Takumi');
/*!40000 ALTER TABLE `gsb_medecins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gsb_medicament`
--

DROP TABLE IF EXISTS `gsb_medicament`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gsb_medicament` (
  `id` int NOT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gsb_medicament`
--

LOCK TABLES `gsb_medicament` WRITE;
/*!40000 ALTER TABLE `gsb_medicament` DISABLE KEYS */;
INSERT INTO `gsb_medicament` VALUES (1,'Homophobiol'),(2,'Fepalcon500'),(3,'UltraXanax42000'),(4,'Benefix'),(5,'ArgonFasil');
/*!40000 ALTER TABLE `gsb_medicament` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gsb_visitualisateur`
--

DROP TABLE IF EXISTS `gsb_visitualisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gsb_visitualisateur` (
  `gsb_id` varchar(50) NOT NULL,
  `gsb_login` varchar(50) DEFAULT NULL,
  `gsb_mdp` varchar(50) DEFAULT NULL,
  `gsb_autorisation` varchar(50) DEFAULT NULL,
  `gsb_nom` varchar(50) DEFAULT NULL,
  `gsb_prenom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`gsb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gsb_visitualisateur`
--

LOCK TABLES `gsb_visitualisateur` WRITE;
/*!40000 ALTER TABLE `gsb_visitualisateur` DISABLE KEYS */;
INSERT INTO `gsb_visitualisateur` VALUES ('1','aaa','mdp','1','ProdUilla',UillaProd'),('2','bbb','mdp','2','jeanMagasine','magosinJean'),('3','ccc','mdp','3','SteveVisiteur','VisiteurSteve'),('4','ddd','mdp','3','Visiteur2','VistorTwo'),('5','eee','mdp','3','Visiteur3','VistorThree');
/*!40000 ALTER TABLE `gsb_visitualisateur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-11 14:05:29
