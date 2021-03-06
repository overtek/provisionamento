CREATE DATABASE  IF NOT EXISTS `provisionamento` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `provisionamento`;
-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: provisionamento
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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
-- Table structure for table `tbcidade`
--

DROP TABLE IF EXISTS `tbcidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbcidade` (
  `idCidade` int(11) NOT NULL AUTO_INCREMENT COMMENT '		',
  `idEstado` int(11) NOT NULL,
  `nomeCidade` varchar(90) NOT NULL,
  `statusCidade` tinyint(1) NOT NULL,
  PRIMARY KEY (`idCidade`),
  UNIQUE KEY `unq_tbCidade` (`idCidade`),
  UNIQUE KEY `tbCidade` (`idCidade`),
  UNIQUE KEY `idCidade` (`idCidade`),
  UNIQUE KEY `uf_cidade_idx` (`idEstado`,`nomeCidade`),
  KEY `fk_table1_Estado_idx` (`idEstado`),
  CONSTRAINT `fk_table1_Estado` FOREIGN KEY (`idEstado`) REFERENCES `tbestado` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `tbconfig`
--

DROP TABLE IF EXISTS `tbconfig`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbconfig` (
  `idConfig` int(11) NOT NULL AUTO_INCREMENT,
  `SSID` varchar(100) NOT NULL DEFAULT '0',
  `ProxyServer` varchar(100) NOT NULL,
  `RegistrarServer` varchar(100) NOT NULL,
  `UserAgentPort` varchar(100) NOT NULL,
  `TelnetPassword` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idConfig`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Configurações do Sistema';
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `tbestado`
--

DROP TABLE IF EXISTS `tbestado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbestado` (
  `idEstado` int(11) NOT NULL AUTO_INCREMENT,
  `nomeEstado` varchar(45) NOT NULL,
  `statusEstado` tinyint(1) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbestado`
--

LOCK TABLES `tbestado` WRITE;
/*!40000 ALTER TABLE `tbestado` DISABLE KEYS */;
INSERT INTO `tbestado` VALUES (1,'AC',1),(2,'AL',1),(3,'AM',1),(4,'AP',1),(5,'BA',1),(6,'CE',1),(7,'DF',1),(8,'ES',1),(9,'GO',1),(10,'MA',1),(11,'MG',1),(12,'MS',1),(13,'MT',1),(14,'PA',1),(15,'PB',1),(16,'PE',1),(17,'PI',1),(18,'PR',1),(19,'RJ',1),(20,'RN',1),(21,'RO',1),(22,'RR',1),(23,'RS',1),(24,'SC',1),(25,'SE',1),(26,'SP',1),(27,'TO',1);
/*!40000 ALTER TABLE `tbestado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbonu`
--

DROP TABLE IF EXISTS `tbonu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbonu` (
  `idONU` int(11) NOT NULL AUTO_INCREMENT,
  `idTecnico` int(11) NOT NULL,
  `idCidade` int(11) NOT NULL,
  `macONU` varchar(45) NOT NULL,
  `nomeClienteONU` varchar(120) NOT NULL,
  `observacaoONU` varchar(1024) DEFAULT NULL,
  `versaoConfigONU` int(11) DEFAULT NULL,
  `numero1ONU` varchar(45) DEFAULT NULL,
  `controle1ONU` varchar(45) DEFAULT NULL,
  `numero2ONU` varchar(45) DEFAULT NULL,
  `controle2ONU` varchar(45) DEFAULT NULL,
  `loginPPPoEONU` varchar(45) NOT NULL,
  `senhaPPPoEONU` varchar(45) NOT NULL,
  `statusONU` tinyint(1) NOT NULL DEFAULT '1',
  `criadoEm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idONU`),
  UNIQUE KEY `uf_onu_idx` (`idONU`,`macONU`),
  UNIQUE KEY `uf_onu1_idx` (`macONU`),
  KEY `fk_tbTelefonia_tbTecnico1_idx` (`idTecnico`),
  KEY `fk_tbONU_tbCidade1_idx` (`idCidade`),
  CONSTRAINT `fk_tbONU_tbCidade1` FOREIGN KEY (`idCidade`) REFERENCES `tbcidade` (`idCidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbTelefonia_tbTecnico1` FOREIGN KEY (`idTecnico`) REFERENCES `tbtecnico` (`idTecnico`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;



--
-- Table structure for table `tbtecnico`
--

DROP TABLE IF EXISTS `tbtecnico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbtecnico` (
  `idTecnico` int(11) NOT NULL AUTO_INCREMENT,
  `emailTecnico` varchar(90) NOT NULL,
  `senhaTecnico` varchar(128) NOT NULL,
  `nomeTecnico` varchar(85) NOT NULL,
  `criadoEm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `statusTecnico` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idTecnico`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbtecnico`
--

LOCK TABLES `tbtecnico` WRITE;
/*!40000 ALTER TABLE `tbtecnico` DISABLE KEYS */;
INSERT INTO `tbtecnico` VALUES (1,'admin@admin','2015overtek','Administrador','2015-04-06 18:31:00',1);
/*!40000 ALTER TABLE `tbtecnico` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-07 17:00:32
