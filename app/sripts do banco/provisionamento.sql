-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.21-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para provisionamento
CREATE DATABASE IF NOT EXISTS `provisionamento` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `provisionamento`;


-- Copiando estrutura para tabela provisionamento.tbcidade
CREATE TABLE IF NOT EXISTS `tbcidade` (
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

-- Copiando dados para a tabela provisionamento.tbcidade: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbcidade` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbcidade` ENABLE KEYS */;


-- Copiando estrutura para tabela provisionamento.tbconfig
CREATE TABLE IF NOT EXISTS `tbconfig` (
  `idConfig` int(11) NOT NULL AUTO_INCREMENT,
  `SSID` varchar(100) NOT NULL DEFAULT '0',
  `ProxyServer` varchar(100) NOT NULL,
  `RegistrarServer` varchar(100) NOT NULL,
  `UserAgentPort` varchar(100) NOT NULL,
  `TelnetPassword` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idConfig`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Configurações do Sistema';

-- Copiando dados para a tabela provisionamento.tbconfig: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbconfig` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbconfig` ENABLE KEYS */;


-- Copiando estrutura para tabela provisionamento.tbestado
CREATE TABLE IF NOT EXISTS `tbestado` (
  `idEstado` int(11) NOT NULL AUTO_INCREMENT,
  `nomeEstado` varchar(45) NOT NULL,
  `statusEstado` tinyint(1) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela provisionamento.tbestado: ~27 rows (aproximadamente)
/*!40000 ALTER TABLE `tbestado` DISABLE KEYS */;
INSERT INTO `tbestado` (`idEstado`, `nomeEstado`, `statusEstado`) VALUES
	(1, 'AC', 1),
	(2, 'AL', 1),
	(3, 'AM', 1),
	(4, 'AP', 1),
	(5, 'BA', 1),
	(6, 'CE', 1),
	(7, 'DF', 1),
	(8, 'ES', 1),
	(9, 'GO', 1),
	(10, 'MA', 1),
	(11, 'MG', 1),
	(12, 'MS', 1),
	(13, 'MT', 1),
	(14, 'PA', 1),
	(15, 'PB', 1),
	(16, 'PE', 1),
	(17, 'PI', 1),
	(18, 'PR', 1),
	(19, 'RJ', 1),
	(20, 'RN', 1),
	(21, 'RO', 1),
	(22, 'RR', 1),
	(23, 'RS', 1),
	(24, 'SC', 1),
	(25, 'SE', 1),
	(26, 'SP', 1),
	(27, 'TO', 1);
/*!40000 ALTER TABLE `tbestado` ENABLE KEYS */;


-- Copiando estrutura para tabela provisionamento.tbonu
CREATE TABLE IF NOT EXISTS `tbonu` (
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

-- Copiando dados para a tabela provisionamento.tbonu: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbonu` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbonu` ENABLE KEYS */;


-- Copiando estrutura para tabela provisionamento.tbtecnico
CREATE TABLE IF NOT EXISTS `tbtecnico` (
  `idTecnico` int(11) NOT NULL AUTO_INCREMENT,
  `emailTecnico` varchar(90) NOT NULL,
  `senhaTecnico` varchar(128) NOT NULL,
  `nomeTecnico` varchar(85) NOT NULL,
  `statusTecnico` tinyint(1) NOT NULL,
  `criadoEm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idTecnico`),
  UNIQUE KEY `uf_tecnico_idx` (`idTecnico`,`nomeTecnico`),
  UNIQUE KEY `uf_tecnico2_idx` (`emailTecnico`),
  UNIQUE KEY `uf_tecnico1_idx` (`idTecnico`,`emailTecnico`,`nomeTecnico`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela provisionamento.tbtecnico: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `tbtecnico` DISABLE KEYS */;
INSERT INTO `tbtecnico` (`idTecnico`, `emailTecnico`, `senhaTecnico`, `nomeTecnico`, `statusTecnico`, `criadoEm`) VALUES
	(1, 'admin@admin', '2015overtek', 'Administrador', 1, '2015-04-06 11:16:35');
/*!40000 ALTER TABLE `tbtecnico` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
