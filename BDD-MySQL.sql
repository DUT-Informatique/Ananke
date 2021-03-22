-- MySQL dump 10.18  Distrib 10.3.27-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ananke
-- ------------------------------------------------------
-- Server version	10.3.27-MariaDB-0+deb10u1

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
-- Table structure for table `Adresses`
--

DROP TABLE IF EXISTS `Adresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Adresses` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Utilisateur` varchar(50) NOT NULL COMMENT 'Adresse mail du client',
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `Adresse` text NOT NULL,
  `ComplementAdresse` text DEFAULT NULL,
  `CodePostal` varchar(5) NOT NULL,
  `Ville` varchar(50) NOT NULL,
  `Facturation` tinyint(1) NOT NULL,
  `Livraison` tinyint(1) NOT NULL,
  `Telephone` char(10) DEFAULT NULL,
  `TelephonePortable` char(10) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Articles`
--

DROP TABLE IF EXISTS `Articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Articles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TITRE` varchar(50) NOT NULL,
  `MARQUE` varchar(50) NOT NULL,
  `MODELE` varchar(50) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `TYPE` varchar(50) NOT NULL,
  `SOUSTYPE` varchar(50) NOT NULL,
  `PRIX` decimal(10,0) NOT NULL,
  `CIBLE` varchar(50) NOT NULL COMMENT 'Catégorie',
  `SOLDES` int(11) NOT NULL DEFAULT 0,
  `DATEAJOUT` datetime NOT NULL DEFAULT current_timestamp(),
  `NBNOTES1` int(11) NOT NULL DEFAULT 0,
  `NBNOTES2` int(11) NOT NULL DEFAULT 0,
  `NBNOTES3` int(11) NOT NULL DEFAULT 0,
  `NBNOTES4` int(11) NOT NULL DEFAULT 0,
  `NBNOTES5` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ArticlesImages`
--

DROP TABLE IF EXISTS `ArticlesImages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ArticlesImages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Articles` int(11) NOT NULL,
  `Principale` tinyint(1) NOT NULL,
  `Couleurs` varchar(20) NOT NULL,
  `Image` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ArticlesParametres`
--

DROP TABLE IF EXISTS `ArticlesParametres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ArticlesParametres` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Articles` int(11) NOT NULL,
  `Taille` varchar(5) NOT NULL,
  `Couleurs` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ArticlesUsager`
--

DROP TABLE IF EXISTS `ArticlesUsager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ArticlesUsager` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Usager` varchar(50) NOT NULL,
  `ID_Article` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `CommentaireArticles`
--

DROP TABLE IF EXISTS `CommentaireArticles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CommentaireArticles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IdentifiantArticle` int(11) NOT NULL,
  `Notes` int(1) NOT NULL,
  `Texte` text NOT NULL,
  `DatePublication` datetime NOT NULL DEFAULT current_timestamp(),
  `IdentifiantClient` text NOT NULL,
  `Auteur` varchar(60) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Messagerie`
--

DROP TABLE IF EXISTS `Messagerie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Messagerie` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Grade` tinyint(1) NOT NULL,
  `Auteur` varchar(60) NOT NULL,
  `Message` text NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `Localisation` varchar(60) NOT NULL,
  `CodeTemp` text NOT NULL,
  `Alerte` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=205 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `QuestionArticle`
--

DROP TABLE IF EXISTS `QuestionArticle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `QuestionArticle` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IdentifiantArticle` int(11) NOT NULL,
  `Texte` text NOT NULL,
  `DatePublication` datetime NOT NULL DEFAULT current_timestamp(),
  `IdentifiantClient` text NOT NULL,
  `Auteur` varchar(60) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ReponseArticle`
--

DROP TABLE IF EXISTS `ReponseArticle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ReponseArticle` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IdentifiantArticle` int(11) NOT NULL,
  `IdentifiantQuestion` int(11) NOT NULL,
  `Texte` text NOT NULL,
  `DatePublication` datetime NOT NULL DEFAULT current_timestamp(),
  `IdentifiantClient` text NOT NULL,
  `Auteur` varchar(60) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `TypeArticle`
--

DROP TABLE IF EXISTS `TypeArticle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TypeArticle` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMTYPE` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TypeArticle`
--

LOCK TABLES `TypeArticle` WRITE;
/*!40000 ALTER TABLE `TypeArticle` DISABLE KEYS */;
INSERT INTO `TypeArticle` VALUES (1,'Pantalon');
INSERT INTO `TypeArticle` VALUES (2,'Chaussures');
INSERT INTO `TypeArticle` VALUES (3,'SweatShirt');
INSERT INTO `TypeArticle` VALUES (4,'SweatShirt');
INSERT INTO `TypeArticle` VALUES (5,'Pull');
INSERT INTO `TypeArticle` VALUES (6,'Veste');
INSERT INTO `TypeArticle` VALUES (7,'TeeShirt');
INSERT INTO `TypeArticle` VALUES (8,'Survetementdesport');
INSERT INTO `TypeArticle` VALUES (9,'shorts');
INSERT INTO `TypeArticle` VALUES (10,'sousvetements');
INSERT INTO `TypeArticle` VALUES (11,'chemise');
/*!40000 ALTER TABLE `TypeArticle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usager`
--

DROP TABLE IF EXISTS `Usager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usager` (
  `Identifiant` varchar(50) NOT NULL COMMENT 'Adresse mail pour usager et code pour employé',
  `Nom` varchar(30) NOT NULL,
  `Prenom` varchar(30) NOT NULL,
  `MotDePasse` text NOT NULL,
  `Verification` char(1) NOT NULL,
  `Grade` char(1) NOT NULL,
  `cle` text DEFAULT NULL,
  `clemdp` text DEFAULT NULL,
  `clemail` text DEFAULT NULL,
  `Image` text DEFAULT '../../../images/avatar.png',
  PRIMARY KEY (`Identifiant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `villes_france_free`
--

DROP TABLE IF EXISTS `villes_france_free`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `villes_france_free` (
  `ville_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ville_nom` varchar(45) DEFAULT NULL,
  `ville_nom_simple` varchar(45) DEFAULT NULL,
  `ville_nom_reel` varchar(45) DEFAULT NULL,
  `ville_code_postal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ville_id`),
  KEY `ville_nom` (`ville_nom`),
  KEY `ville_nom_reel` (`ville_nom_reel`),
  KEY `ville_code_postal` (`ville_code_postal`),
  KEY `ville_nom_simple` (`ville_nom_simple`)
) ENGINE=MyISAM AUTO_INCREMENT=36831 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-01  0:00:01
