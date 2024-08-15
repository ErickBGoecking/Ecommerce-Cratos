-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema cratosbd
--

CREATE DATABASE IF NOT EXISTS cratosbd;
USE cratosbd;

--
-- Definition of table `auditoria`
--

DROP TABLE IF EXISTS `auditoria`;
CREATE TABLE `auditoria` (
  `idauditoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idadm` int(10) unsigned NOT NULL,
  `acao` longtext NOT NULL,
  `tipo` int(10) unsigned NOT NULL,
  `tabela` varchar(245) NOT NULL,
  `datahora` datetime NOT NULL,
  `ip` varchar(45) NOT NULL,
  `pcusuario` varchar(245) DEFAULT NULL,
  `dispositivo` varchar(45) NOT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idauditoria`,`idadm`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `auditoria`
--

/*!40000 ALTER TABLE `auditoria` DISABLE KEYS */;
INSERT INTO `auditoria` (`idauditoria`,`idadm`,`acao`,`tipo`,`tabela`,`datahora`,`ip`,`pcusuario`,`dispositivo`,`alteracao`) VALUES 
 (1,1,'Foi adicionado no sistema Banner teste',1,'banner','2024-03-26 19:04:12','127.0.0.1','lcpye','Computador','2024-03-26 19:04:12'),
 (2,1,'Foi Excluido do sistema Banner teste',3,'banner','2024-03-26 20:11:30','127.0.0.1','lcpye','Computador','2024-03-26 20:11:30'),
 (3,1,'Foi adicionado no sistema Banner teste',1,'banner','2024-03-26 20:19:13','127.0.0.1','lcpye','Computador','2024-03-26 20:19:13'),
 (4,1,'Foi adicionado no sistema Banner teste 2',1,'banner','2024-03-26 20:19:24','127.0.0.1','lcpye','Computador','2024-03-26 20:19:24'),
 (5,1,'Foi Excluido do sistema Banner teste 2',3,'banner','2024-03-26 20:19:29','127.0.0.1','lcpye','Computador','2024-03-26 20:19:29'),
 (6,1,'Foi Excluido do sistema Banner teste',3,'banner','2024-03-26 20:19:33','127.0.0.1','lcpye','Computador','2024-03-26 20:19:33'),
 (7,1,'Foi Excluido do sistema Banner Os melhores suplementos de alto rendimento',3,'banner','2024-03-26 20:19:37','127.0.0.1','lcpye','Computador','2024-03-26 20:19:37'),
 (8,1,'Foi adicionado no sistema Banner teste',1,'banner','2024-03-26 20:20:03','127.0.0.1','lcpye','Computador','2024-03-26 20:20:03'),
 (9,1,'Foi Excluido do sistema Banner teste',3,'banner','2024-03-26 20:20:10','127.0.0.1','lcpye','Computador','2024-03-26 20:20:10'),
 (10,1,'Foi adicionado no sistema Banner Os melhores suplementos de alto rendimento',1,'banner','2024-03-26 20:20:24','127.0.0.1','lcpye','Computador','2024-03-26 20:20:24'),
 (11,1,'Foi adicionado no sistema Banner teste',1,'banner','2024-03-26 21:20:23','127.0.0.1','lcpye','Computador','2024-03-26 21:20:23'),
 (12,1,'Foi Desativado o banner no sistema! Id=7',2,'banner','2024-03-26 21:54:29','127.0.0.1','lcpye','Computador','2024-03-26 21:54:29'),
 (13,1,'Foi Desativado o banner no sistema! Id=7',2,'banner','2024-03-26 21:55:18','127.0.0.1','lcpye','Computador','2024-03-26 21:55:18'),
 (14,1,'Foi Ativado o banner no sistema! Id=7',2,'banner','2024-03-26 21:55:25','127.0.0.1','lcpye','Computador','2024-03-26 21:55:25'),
 (15,1,'Foi adicionado no sistema Banner teste 2',1,'banner','2024-03-26 23:08:45','127.0.0.1','lcpye','Computador','2024-03-26 23:08:45'),
 (16,1,'Foi Alterado teste 22a no sistema!',2,'banner','2024-03-27 00:06:50','127.0.0.1','lcpye','Computador','2024-03-27 00:06:50'),
 (17,1,'Foi Alterado teste 22a no sistema!',2,'banner','2024-03-27 00:16:19','127.0.0.1','lcpye','Computador','2024-03-27 00:16:19'),
 (18,1,'Foi Alterado teste no sistema!',2,'banner','2024-03-27 00:16:32','127.0.0.1','lcpye','Computador','2024-03-27 00:16:32'),
 (19,1,'Foi adicionado no sistema Banner novo',1,'banner','2024-03-27 00:16:45','127.0.0.1','lcpye','Computador','2024-03-27 00:16:45'),
 (20,1,'Foi Excluido do sistema Banner novo',3,'banner','2024-03-27 00:16:57','127.0.0.1','lcpye','Computador','2024-03-27 00:16:57'),
 (21,1,'Foi adicionado no sistema Banner ovo de pascoa',1,'banner','2024-03-27 19:55:11','127.0.0.1','lcpye','Computador','2024-03-27 19:55:11'),
 (22,1,'Foi Alterado ovo de pascoa 2 no sistema!',2,'banner','2024-03-27 19:56:32','127.0.0.1','lcpye','Computador','2024-03-27 19:56:32'),
 (23,1,'Foi Excluido do sistema Banner ovo de pascoa 2',3,'banner','2024-03-27 19:57:02','127.0.0.1','lcpye','Computador','2024-03-27 19:57:02'),
 (24,1,'Foi adicionado no sistema Banner novo teste',1,'banner','2024-03-27 19:57:37','127.0.0.1','lcpye','Computador','2024-03-27 19:57:37'),
 (25,1,'Foi Excluido do sistema Banner novo teste',3,'banner','2024-03-27 20:00:16','127.0.0.1','lcpye','Computador','2024-03-27 20:00:16'),
 (26,1,'Foi Excluido do sistema Banner teste',3,'banner','2024-03-27 20:00:29','127.0.0.1','lcpye','Computador','2024-03-27 20:00:29'),
 (27,1,'Foi Excluido do sistema Banner testea',3,'banner','2024-03-27 20:00:59','127.0.0.1','lcpye','Computador','2024-03-27 20:00:59'),
 (28,1,'Foi Excluido do sistema Banner Os melhores suplementos de alto rendimento',3,'banner','2024-03-27 20:01:03','127.0.0.1','lcpye','Computador','2024-03-27 20:01:03'),
 (29,1,'Foi adicionado no sistema Banner teste',1,'banner','2024-03-27 20:01:13','127.0.0.1','lcpye','Computador','2024-03-27 20:01:13'),
 (30,1,'Foi Excluido do sistema Banner teste',3,'banner','2024-03-27 20:01:18','127.0.0.1','lcpye','Computador','2024-03-27 20:01:18'),
 (31,1,'Foi adicionado no sistema Banner t',1,'banner','2024-03-27 20:03:08','127.0.0.1','lcpye','Computador','2024-03-27 20:03:08'),
 (32,1,'Foi Excluido do sistema Banner t',3,'banner','2024-03-27 20:52:13','127.0.0.1','lcpye','Computador','2024-03-27 20:52:13'),
 (33,1,'Foi adicionado no sistema Banner teste',1,'banner','2024-03-27 20:52:32','127.0.0.1','lcpye','Computador','2024-03-27 20:52:32'),
 (34,1,'Foi Desativado o banner no sistema! Id=14',2,'banner','2024-03-27 20:54:42','127.0.0.1','lcpye','Computador','2024-03-27 20:54:42'),
 (35,1,'Foi Ativado o banner no sistema! Id=14',2,'banner','2024-03-27 20:54:46','127.0.0.1','lcpye','Computador','2024-03-27 20:54:46'),
 (36,1,'Foi adicionado no sistema Banner Pedro',1,'banner','2024-03-27 21:42:40','127.0.0.1','lcpye','Computador','2024-03-27 21:42:40'),
 (37,1,'Foi Desativado o banner no sistema! Id=15',2,'banner','2024-03-27 21:42:51','127.0.0.1','lcpye','Computador','2024-03-27 21:42:51'),
 (38,1,'Foi Ativado o banner no sistema! Id=15',2,'banner','2024-03-27 21:42:55','127.0.0.1','lcpye','Computador','2024-03-27 21:42:55'),
 (39,1,'Foi Alterado Pedro no sistema!',2,'banner','2024-03-27 21:43:04','127.0.0.1','lcpye','Computador','2024-03-27 21:43:04'),
 (40,1,'Foi Excluido do sistema Banner Pedro',3,'banner','2024-03-27 21:43:11','127.0.0.1','lcpye','Computador','2024-03-27 21:43:11'),
 (41,1,'Foi adicionado no sistema Genero Feminino',1,'genero','2024-03-28 00:32:45','127.0.0.1','lcpye','Computador','2024-03-28 00:32:45'),
 (42,1,'Foi Desativado o genero no sistema! Id=2',2,'genero','2024-03-28 00:35:39','127.0.0.1','lcpye','Computador','2024-03-28 00:35:39'),
 (43,1,'Foi Ativado o genero no sistema! Id=2',2,'genero','2024-03-28 00:35:44','127.0.0.1','lcpye','Computador','2024-03-28 00:35:44'),
 (44,1,'Foi adicionado no sistema Genero neutro',1,'genero','2024-03-28 00:36:37','127.0.0.1','lcpye','Computador','2024-03-28 00:36:37'),
 (45,1,'Foi adicionado no sistema Genero neutro',1,'genero','2024-03-28 00:39:40','127.0.0.1','lcpye','Computador','2024-03-28 00:39:40'),
 (46,1,'Foi adicionado no sistema Genero teste',1,'genero','2024-03-28 00:40:29','127.0.0.1','lcpye','Computador','2024-03-28 00:40:29'),
 (47,1,'Foi adicionado no sistema Genero safdfafasd',1,'genero','2024-03-28 00:41:28','127.0.0.1','lcpye','Computador','2024-03-28 00:41:28'),
 (48,1,'Foi adicionado no sistema Genero asfsdasfdas',1,'genero','2024-03-28 00:42:21','127.0.0.1','lcpye','Computador','2024-03-28 00:42:22'),
 (49,1,'Foi adicionado no sistema Genero safsdfasdf',1,'genero','2024-03-28 00:43:34','127.0.0.1','lcpye','Computador','2024-03-28 00:43:34'),
 (50,1,'Foi adicionado no sistema Genero asfdfsfsd',1,'genero','2024-03-28 00:46:36','127.0.0.1','lcpye','Computador','2024-03-28 00:46:36'),
 (51,1,'Foi Excluido do sistema Genero ',3,'genero','2024-03-28 00:46:42','127.0.0.1','lcpye','Computador','2024-03-28 00:46:42'),
 (52,1,'Foi adicionado no sistema Banner teste',1,'banner','2024-03-28 00:46:58','127.0.0.1','lcpye','Computador','2024-03-28 00:46:58'),
 (53,1,'Foi Alterado teste no sistema!',2,'banner','2024-03-28 00:47:08','127.0.0.1','lcpye','Computador','2024-03-28 00:47:08'),
 (54,1,'Foi Excluido do sistema Banner ',3,'banner','2024-03-28 00:47:25','127.0.0.1','lcpye','Computador','2024-03-28 00:47:25'),
 (55,1,'Foi adicionado no sistema Genero teste',1,'genero','2024-03-28 00:49:57','127.0.0.1','lcpye','Computador','2024-03-28 00:49:57'),
 (56,1,'Foi Excluido do sistema Genero ',3,'genero','2024-03-28 00:50:04','127.0.0.1','lcpye','Computador','2024-03-28 00:50:04'),
 (57,1,'Foi adicionado no sistema Genero asfsdafdasfasd',1,'genero','2024-03-28 00:50:28','127.0.0.1','lcpye','Computador','2024-03-28 00:50:28'),
 (58,1,'Foi adicionado no sistema Genero asfasdfsdfasd',1,'genero','2024-03-28 00:50:55','127.0.0.1','lcpye','Computador','2024-03-28 00:50:55'),
 (59,1,'Foi adicionado no sistema Genero asfdsafasfsd',1,'genero','2024-03-28 00:51:43','127.0.0.1','lcpye','Computador','2024-03-28 00:51:43'),
 (60,1,'Foi adicionado no sistema Genero tesadfafasdfas',1,'genero','2024-03-28 00:52:17','127.0.0.1','lcpye','Computador','2024-03-28 00:52:17'),
 (61,1,'Foi adicionado no sistema Genero asfdsfsafasdas',1,'genero','2024-03-28 00:52:50','127.0.0.1','lcpye','Computador','2024-03-28 00:52:50'),
 (62,1,'Foi Excluido do sistema Genero',3,'genero','2024-03-28 00:54:10','127.0.0.1','lcpye','Computador','2024-03-28 00:54:10'),
 (63,1,'Foi adicionado no sistema Genero sfsdafsfdasf',1,'genero','2024-03-28 00:55:34','127.0.0.1','lcpye','Computador','2024-03-28 00:55:34'),
 (64,1,'Foi Excluido do sistema Genero',3,'genero','2024-03-28 00:55:41','127.0.0.1','lcpye','Computador','2024-03-28 00:55:41'),
 (65,1,'Foi adicionado no sistema Genero asfdafsf',1,'genero','2024-03-28 00:55:47','127.0.0.1','lcpye','Computador','2024-03-28 00:55:47'),
 (66,1,'Foi Excluido do sistema Genero',3,'genero','2024-03-28 00:55:51','127.0.0.1','lcpye','Computador','2024-03-28 00:55:51'),
 (67,1,'Foi adicionado no sistema Banner teste',1,'banner','2024-03-28 00:57:00','127.0.0.1','lcpye','Computador','2024-03-28 00:57:00'),
 (68,1,'Foi Excluido do sistema Banner ',3,'banner','2024-03-28 00:57:06','127.0.0.1','lcpye','Computador','2024-03-28 00:57:06'),
 (69,1,'Foi adicionado no sistema Banner teste',1,'banner','2024-03-28 00:58:26','127.0.0.1','lcpye','Computador','2024-03-28 00:58:26'),
 (70,1,'Foi Excluido do sistema Banner teste',3,'banner','2024-03-28 00:58:32','127.0.0.1','lcpye','Computador','2024-03-28 00:58:32'),
 (71,1,'Foi Alterado MASCULINOaaa no sistema!',2,'genero','2024-03-28 01:20:09','127.0.0.1','lcpye','Computador','2024-03-28 01:20:09'),
 (72,1,'Foi Alterado Masculino no sistema!',2,'genero','2024-03-28 01:20:19','127.0.0.1','lcpye','Computador','2024-03-28 01:20:19'),
 (73,1,'Foi Alterado Femininoaaaa no sistema!',2,'genero','2024-03-28 01:20:39','127.0.0.1','lcpye','Computador','2024-03-28 01:20:39'),
 (74,1,'Foi Alterado Feminino no sistema!',2,'genero','2024-03-28 01:20:48','127.0.0.1','lcpye','Computador','2024-03-28 01:20:48');
/*!40000 ALTER TABLE `auditoria` ENABLE KEYS */;


--
-- Definition of table `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `idbanner` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idadm` int(10) unsigned NOT NULL,
  `img` varchar(145) DEFAULT NULL,
  `titulo` varchar(145) NOT NULL,
  `datai` datetime NOT NULL DEFAULT current_timestamp(),
  `dataf` datetime NOT NULL DEFAULT current_timestamp(),
  `tipo` varchar(50) NOT NULL DEFAULT 'rotativo',
  `cadastro` datetime DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idbanner`,`idadm`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `banner`
--

/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
INSERT INTO `banner` (`idbanner`,`idadm`,`img`,`titulo`,`datai`,`dataf`,`tipo`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (14,1,'Exclusivy-6604b14098aef.jpg','teste','2024-03-27 20:52:15','2024-04-27 20:52:15','Rotativo','2024-03-27 20:52:32','2024-03-27 20:54:46','A');
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;


--
-- Definition of table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE `cargo` (
  `idcargo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idfuncionario` int(10) unsigned NOT NULL,
  `idcargotipo` int(10) unsigned NOT NULL,
  `funcionario_idnivelacesso` int(10) unsigned NOT NULL,
  `idpessoa` int(10) unsigned NOT NULL,
  `idgenero` int(10) unsigned NOT NULL,
  `cargo` varchar(60) NOT NULL,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idcargo`,`idfuncionario`,`idcargotipo`),
  KEY `cargo_FKIndex1` (`idfuncionario`,`idcargo`,`idgenero`,`idpessoa`,`funcionario_idnivelacesso`),
  KEY `cargo_FKIndex2` (`idcargotipo`),
  CONSTRAINT `cargo_ibfk_1` FOREIGN KEY (`idfuncionario`, `idcargo`, `idgenero`, `idpessoa`, `funcionario_idnivelacesso`) REFERENCES `funcionario` (`idfuncionario`, `idcargo`, `idgenero`, `idpessoa`, `idnivelacesso`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cargo_ibfk_2` FOREIGN KEY (`idcargotipo`) REFERENCES `cargotipo` (`idcargotipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cargo`
--

/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;


--
-- Definition of table `cargotipo`
--

DROP TABLE IF EXISTS `cargotipo`;
CREATE TABLE `cargotipo` (
  `idcargotipo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipocargo` varchar(60) NOT NULL,
  `cadastro` datetime NOT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idcargotipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cargotipo`
--

/*!40000 ALTER TABLE `cargotipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargotipo` ENABLE KEYS */;


--
-- Definition of table `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE `carrinho` (
  `idcarrinho` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idpessoa` int(10) unsigned NOT NULL,
  `idgenero` int(10) unsigned NOT NULL,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idcarrinho`,`idpessoa`),
  KEY `carrinho_FKIndex1` (`idpessoa`,`idgenero`),
  CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`idpessoa`, `idgenero`) REFERENCES `pessoa` (`idpessoa`, `idgenero`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carrinho`
--

/*!40000 ALTER TABLE `carrinho` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrinho` ENABLE KEYS */;


--
-- Definition of table `carrinhoproduto`
--

DROP TABLE IF EXISTS `carrinhoproduto`;
CREATE TABLE `carrinhoproduto` (
  `idcarrinhoproduto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcarrinho` int(10) unsigned NOT NULL,
  `idestoque` int(10) unsigned NOT NULL,
  `carrinho_idpessoa` int(10) unsigned NOT NULL,
  `idprodutovariacao` int(10) unsigned NOT NULL,
  `qtd` int(10) unsigned NOT NULL,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idcarrinhoproduto`,`idcarrinho`,`idestoque`),
  KEY `carrinhoproduto_FKIndex1` (`idcarrinho`,`carrinho_idpessoa`),
  KEY `carrinhoproduto_FKIndex2` (`idestoque`,`idprodutovariacao`),
  CONSTRAINT `carrinhoproduto_ibfk_1` FOREIGN KEY (`idcarrinho`, `carrinho_idpessoa`) REFERENCES `carrinho` (`idcarrinho`, `idpessoa`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `carrinhoproduto_ibfk_2` FOREIGN KEY (`idestoque`, `idprodutovariacao`) REFERENCES `estoque` (`idestoque`, `idprodutovariacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carrinhoproduto`
--

/*!40000 ALTER TABLE `carrinhoproduto` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrinhoproduto` ENABLE KEYS */;


--
-- Definition of table `cartao`
--

DROP TABLE IF EXISTS `cartao`;
CREATE TABLE `cartao` (
  `idcartao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idpessoa` int(10) unsigned NOT NULL,
  `idgenero` int(10) unsigned NOT NULL,
  `numero` varchar(16) NOT NULL,
  `validade` varchar(5) NOT NULL,
  `cvv` int(10) unsigned NOT NULL,
  `bandeira` varchar(30) NOT NULL DEFAULT 'Não Informado',
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idcartao`,`idpessoa`),
  KEY `cartao_FKIndex1` (`idpessoa`,`idgenero`),
  CONSTRAINT `cartao_ibfk_1` FOREIGN KEY (`idpessoa`, `idgenero`) REFERENCES `pessoa` (`idpessoa`, `idgenero`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cartao`
--

/*!40000 ALTER TABLE `cartao` DISABLE KEYS */;
/*!40000 ALTER TABLE `cartao` ENABLE KEYS */;


--
-- Definition of table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `idcategoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL,
  `cadastro` date NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoria`
--

/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;


--
-- Definition of table `categoriafornecedor`
--

DROP TABLE IF EXISTS `categoriafornecedor`;
CREATE TABLE `categoriafornecedor` (
  `idcategoriafornecedor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idpessoa` int(10) unsigned NOT NULL,
  `idcategoria` int(10) unsigned NOT NULL,
  `idgenero` int(10) unsigned NOT NULL,
  `cadastro` date NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idcategoriafornecedor`,`idpessoa`,`idcategoria`),
  KEY `categoriafornecedor_FKIndex1` (`idpessoa`,`idgenero`),
  KEY `categoriafornecedor_FKIndex2` (`idcategoria`),
  CONSTRAINT `categoriafornecedor_ibfk_1` FOREIGN KEY (`idpessoa`, `idgenero`) REFERENCES `pessoa` (`idpessoa`, `idgenero`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `categoriafornecedor_ibfk_2` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoriafornecedor`
--

/*!40000 ALTER TABLE `categoriafornecedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoriafornecedor` ENABLE KEYS */;


--
-- Definition of table `comentarioproduto`
--

DROP TABLE IF EXISTS `comentarioproduto`;
CREATE TABLE `comentarioproduto` (
  `idcomentarioproduto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idprodutovariacao` int(10) unsigned NOT NULL,
  `idpessoa` int(10) unsigned NOT NULL,
  `idgenero` int(10) unsigned NOT NULL,
  `idproduto` int(10) unsigned NOT NULL,
  `comentario` longtext NOT NULL,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idcomentarioproduto`,`idprodutovariacao`,`idpessoa`),
  KEY `comentarioproduto_FKIndex1` (`idprodutovariacao`,`idproduto`),
  KEY `comentarioproduto_FKIndex2` (`idpessoa`,`idgenero`),
  CONSTRAINT `comentarioproduto_ibfk_1` FOREIGN KEY (`idprodutovariacao`, `idproduto`) REFERENCES `produtovariacao` (`idprodutovariacao`, `idproduto`),
  CONSTRAINT `comentarioproduto_ibfk_2` FOREIGN KEY (`idpessoa`, `idgenero`) REFERENCES `pessoa` (`idpessoa`, `idgenero`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comentarioproduto`
--

/*!40000 ALTER TABLE `comentarioproduto` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentarioproduto` ENABLE KEYS */;


--
-- Definition of table `cupom`
--

DROP TABLE IF EXISTS `cupom`;
CREATE TABLE `cupom` (
  `idcupom` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(100) NOT NULL,
  `percentual` decimal(5,2) NOT NULL,
  `qtd` int(10) unsigned NOT NULL,
  `qtdusado` int(10) unsigned NOT NULL DEFAULT 0,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idcupom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cupom`
--

/*!40000 ALTER TABLE `cupom` DISABLE KEYS */;
/*!40000 ALTER TABLE `cupom` ENABLE KEYS */;


--
-- Definition of table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
CREATE TABLE `departamento` (
  `iddepartamento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `departamento` varchar(50) NOT NULL,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`iddepartamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departamento`
--

/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;


--
-- Definition of table `departamentosub`
--

DROP TABLE IF EXISTS `departamentosub`;
CREATE TABLE `departamentosub` (
  `iddepartamentosub` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idpai` int(10) unsigned NOT NULL,
  `departamentosub` varchar(100) DEFAULT NULL,
  `cadastro` datetime DEFAULT current_timestamp(),
  `alteracao` timestamp NULL DEFAULT NULL,
  `ativo` char(1) DEFAULT 'A',
  PRIMARY KEY (`iddepartamentosub`,`idpai`) USING BTREE,
  KEY `departamentosub_FKIndex1` (`idpai`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departamentosub`
--

/*!40000 ALTER TABLE `departamentosub` DISABLE KEYS */;
/*!40000 ALTER TABLE `departamentosub` ENABLE KEYS */;


--
-- Definition of table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE `endereco` (
  `idendereco` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idpessoa` int(10) unsigned NOT NULL,
  `idgenero` int(10) unsigned NOT NULL,
  `cep` varchar(9) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` int(10) unsigned NOT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(40) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` char(2) NOT NULL,
  `enderecoprincipal` char(1) NOT NULL DEFAULT 'N',
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idendereco`,`idpessoa`,`idgenero`),
  KEY `endereco_FKIndex1` (`idpessoa`,`idgenero`),
  CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`idpessoa`, `idgenero`) REFERENCES `pessoa` (`idpessoa`, `idgenero`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `endereco`
--

/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;


--
-- Definition of table `estoque`
--

DROP TABLE IF EXISTS `estoque`;
CREATE TABLE `estoque` (
  `idestoque` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idprodutovariacao` int(10) unsigned NOT NULL,
  `idproduto` int(10) unsigned NOT NULL,
  `qtdatual` int(10) unsigned NOT NULL,
  `qtdvendido` int(10) unsigned NOT NULL DEFAULT 0,
  `custo` decimal(10,2) NOT NULL,
  `venda` decimal(10,2) NOT NULL,
  `lote` varchar(100) DEFAULT NULL,
  `vencimento` date NOT NULL,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idestoque`,`idprodutovariacao`),
  KEY `estoque_FKIndex1` (`idprodutovariacao`,`idproduto`),
  CONSTRAINT `estoque_ibfk_1` FOREIGN KEY (`idprodutovariacao`, `idproduto`) REFERENCES `produtovariacao` (`idprodutovariacao`, `idproduto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estoque`
--

/*!40000 ALTER TABLE `estoque` DISABLE KEYS */;
/*!40000 ALTER TABLE `estoque` ENABLE KEYS */;


--
-- Definition of table `fotoproduto`
--

DROP TABLE IF EXISTS `fotoproduto`;
CREATE TABLE `fotoproduto` (
  `idfotoproduto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idprodutovariacao` int(10) unsigned NOT NULL,
  `idproduto` int(10) unsigned NOT NULL,
  `foto` varchar(100) NOT NULL,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idfotoproduto`,`idprodutovariacao`),
  KEY `fotoproduto_FKIndex1` (`idprodutovariacao`,`idproduto`),
  CONSTRAINT `fotoproduto_ibfk_1` FOREIGN KEY (`idprodutovariacao`, `idproduto`) REFERENCES `produtovariacao` (`idprodutovariacao`, `idproduto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fotoproduto`
--

/*!40000 ALTER TABLE `fotoproduto` DISABLE KEYS */;
/*!40000 ALTER TABLE `fotoproduto` ENABLE KEYS */;


--
-- Definition of table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE `funcionario` (
  `idfuncionario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcargo` int(10) unsigned NOT NULL,
  `idgenero` int(10) unsigned NOT NULL,
  `idpessoa` int(10) unsigned NOT NULL,
  `idnivelacesso` int(10) unsigned NOT NULL DEFAULT 0,
  `salario` decimal(10,2) DEFAULT NULL,
  `jornada` int(10) unsigned DEFAULT NULL,
  `carteiratrabalho` varchar(60) DEFAULT NULL,
  `admissao` date NOT NULL,
  `demissao` date DEFAULT NULL,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idfuncionario`,`idcargo`,`idgenero`,`idpessoa`,`idnivelacesso`),
  KEY `funcionario_FKIndex1` (`idpessoa`,`idgenero`),
  KEY `funcionario_FKIndex2` (`idnivelacesso`),
  CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`idpessoa`, `idgenero`) REFERENCES `pessoa` (`idpessoa`, `idgenero`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `funcionario_ibfk_2` FOREIGN KEY (`idnivelacesso`) REFERENCES `nivelacesso` (`idnivelacesso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `funcionario`
--

/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;


--
-- Definition of table `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE `genero` (
  `idgenero` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `genero` varchar(30) DEFAULT NULL,
  `cadastro` datetime DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ativo` char(1) DEFAULT 'A',
  PRIMARY KEY (`idgenero`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genero`
--

/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` (`idgenero`,`genero`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,'Masculino','2023-12-05 12:13:00','2024-03-27 23:57:46','A'),
 (2,'Feminino','2024-03-28 00:32:45','2024-03-28 00:32:45','A');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;


--
-- Definition of table `lembretesenha`
--

DROP TABLE IF EXISTS `lembretesenha`;
CREATE TABLE `lembretesenha` (
  `idlembretesenha` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idpessoa` int(10) unsigned NOT NULL,
  `token` varchar(100) NOT NULL,
  `expirado` datetime NOT NULL,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) DEFAULT 'A',
  PRIMARY KEY (`idlembretesenha`,`idpessoa`),
  KEY `lembretesenha_FKIndex1` (`idpessoa`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lembretesenha`
--

/*!40000 ALTER TABLE `lembretesenha` DISABLE KEYS */;
INSERT INTO `lembretesenha` (`idlembretesenha`,`idpessoa`,`token`,`expirado`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (26,1,'6571f09b687e2','2023-12-07 17:29:26','2023-12-07 13:19:39','2023-12-07 18:42:12','D'),
 (27,1,'6571f2de873a4','2023-12-07 17:29:26','2023-12-07 13:29:18','2023-12-07 18:42:12','D'),
 (28,1,'6571fae88ffb1','2023-12-07 17:29:26','2023-12-07 14:03:36','2023-12-07 18:42:12','D'),
 (29,1,'6571fb4e6796c','2023-12-07 17:29:26','2023-12-07 14:05:18','2023-12-07 18:42:12','D'),
 (30,1,'6571fd72aa01d','2023-12-07 17:29:26','2023-12-07 14:14:26','2023-12-07 18:42:12','D'),
 (31,1,'657220d2f0f0a','2023-12-07 17:00:22','2023-12-07 16:45:22','2023-12-07 18:42:12','D'),
 (32,1,'657222f410bcb','2023-12-07 21:50:28','2023-12-07 18:54:28','2023-12-07 20:51:31','A'),
 (33,1,'657224aa30d19','2023-12-07 17:16:46','2023-12-07 17:01:46','2023-12-07 18:51:30','A'),
 (34,1,'657253b8278ba','2023-12-07 21:37:32','2023-12-07 20:22:32','2023-12-07 20:51:15','A'),
 (35,1,'657261da4e75f','2023-12-07 21:37:50','2023-12-07 21:22:50','2023-12-07 21:22:50','A'),
 (36,1,'657261dc34259','2023-12-07 22:37:52','2023-12-07 21:22:52','2023-12-07 21:38:11','A'),
 (37,1,'6572725f13d82','2023-12-07 22:48:19','2023-12-07 22:33:19','2023-12-07 22:33:19','A'),
 (38,1,'657350fbb24b9','2023-12-08 14:38:07','2023-12-08 14:23:07','2023-12-08 14:23:07','A'),
 (39,1,'657350ff4a1ad','2023-12-08 14:38:11','2023-12-08 14:23:11','2023-12-08 14:23:11','A'),
 (40,1,'657368d73d1bc','2023-12-08 16:19:55','2023-12-08 16:04:55','2023-12-08 16:04:55','A'),
 (41,1,'657369823326a','2023-12-08 16:22:46','2023-12-08 16:07:46','2023-12-08 16:07:46','A'),
 (42,1,'6573699590e66','2023-12-08 16:23:05','2023-12-08 16:08:05','2023-12-08 16:08:05','A'),
 (43,1,'65736e06eec1c','2023-12-08 16:42:02','2023-12-08 16:27:02','2023-12-08 16:27:02','A'),
 (44,1,'65736e35d53e3','2023-12-08 16:42:49','2023-12-08 16:27:49','2023-12-08 16:27:49','A'),
 (45,1,'65736e7622a2a','2023-12-08 16:43:54','2023-12-08 16:28:54','2023-12-08 16:28:54','A'),
 (46,1,'657370e346c7d','2023-12-08 16:54:15','2023-12-08 16:39:15','2023-12-08 16:39:15','A'),
 (47,1,'6573737e1ca85','2023-12-08 17:05:22','2023-12-08 16:50:22','2023-12-08 16:50:22','A'),
 (48,1,'657373ffcba78','2023-12-08 17:07:31','2023-12-08 16:52:31','2023-12-08 16:52:31','A'),
 (49,1,'65737436acaf3','2023-12-08 18:08:26','2023-12-08 16:53:26','2023-12-08 17:12:00','A'),
 (50,1,'6573789f9e012','2023-12-08 17:27:15','2023-12-08 17:12:15','2023-12-08 17:12:15','A'),
 (51,1,'657378b7710e1','2023-12-08 17:07:39','2023-12-08 17:12:39','2023-12-08 17:15:41','A'),
 (52,1,'6573940ba7d76','2023-12-08 19:14:15','2023-12-08 19:09:15','2023-12-08 19:11:36','D');
/*!40000 ALTER TABLE `lembretesenha` ENABLE KEYS */;


--
-- Definition of table `listaproduto`
--

DROP TABLE IF EXISTS `listaproduto`;
CREATE TABLE `listaproduto` (
  `idlistaproduto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idpessoa` int(10) unsigned NOT NULL,
  `idestoque` int(10) unsigned NOT NULL,
  `idgenero` int(10) unsigned NOT NULL,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idlistaproduto`,`idpessoa`,`idestoque`),
  KEY `listaproduto_FKIndex1` (`idpessoa`,`idgenero`),
  CONSTRAINT `listaproduto_ibfk_1` FOREIGN KEY (`idpessoa`, `idgenero`) REFERENCES `pessoa` (`idpessoa`, `idgenero`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `listaproduto`
--

/*!40000 ALTER TABLE `listaproduto` DISABLE KEYS */;
/*!40000 ALTER TABLE `listaproduto` ENABLE KEYS */;


--
-- Definition of table `nivelacesso`
--

DROP TABLE IF EXISTS `nivelacesso`;
CREATE TABLE `nivelacesso` (
  `idnivelacesso` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(60) NOT NULL,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idnivelacesso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nivelacesso`
--

/*!40000 ALTER TABLE `nivelacesso` DISABLE KEYS */;
/*!40000 ALTER TABLE `nivelacesso` ENABLE KEYS */;


--
-- Definition of table `nivelpermissao`
--

DROP TABLE IF EXISTS `nivelpermissao`;
CREATE TABLE `nivelpermissao` (
  `idnivelpermissao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idnivelacesso` int(10) unsigned NOT NULL,
  `idpermissao` int(10) unsigned NOT NULL,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idnivelpermissao`,`idnivelacesso`,`idpermissao`),
  KEY `nivelpermissao_FKIndex1` (`idnivelacesso`),
  KEY `nivelpermissao_FKIndex2` (`idpermissao`),
  CONSTRAINT `nivelpermissao_ibfk_1` FOREIGN KEY (`idnivelacesso`) REFERENCES `nivelacesso` (`idnivelacesso`),
  CONSTRAINT `nivelpermissao_ibfk_2` FOREIGN KEY (`idpermissao`) REFERENCES `permissao` (`idpermissao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nivelpermissao`
--

/*!40000 ALTER TABLE `nivelpermissao` DISABLE KEYS */;
/*!40000 ALTER TABLE `nivelpermissao` ENABLE KEYS */;


--
-- Definition of table `pagamento`
--

DROP TABLE IF EXISTS `pagamento`;
CREATE TABLE `pagamento` (
  `idpagamento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcarrinho` int(10) unsigned NOT NULL,
  `idpagamentotipo` int(10) unsigned NOT NULL,
  `carrinho_idpessoa` int(10) unsigned NOT NULL,
  `idcupom` int(10) unsigned DEFAULT NULL,
  `cartao` varchar(16) DEFAULT NULL,
  `vencimento` varchar(5) DEFAULT NULL,
  `cvv` int(10) unsigned DEFAULT NULL,
  `linkboleto` varchar(255) DEFAULT NULL,
  `barraboleto` varchar(255) DEFAULT NULL,
  `chavepix` varchar(255) DEFAULT NULL,
  `valortotaloriginal` decimal(10,2) NOT NULL,
  `valordesconto` decimal(10,2) DEFAULT NULL,
  `valortotaldesconto` decimal(10,2) DEFAULT NULL,
  `frete` decimal(10,2) DEFAULT NULL,
  `datapagamento` datetime NOT NULL,
  `aprovado` char(1) NOT NULL DEFAULT 'N',
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idpagamento`,`idcarrinho`,`idpagamentotipo`),
  KEY `pagamento_FKIndex1` (`idcarrinho`,`carrinho_idpessoa`),
  KEY `pagamento_FKIndex2` (`idpagamentotipo`),
  KEY `pagamento_FKIndex3` (`idcupom`),
  CONSTRAINT `pagamento_ibfk_1` FOREIGN KEY (`idcarrinho`, `carrinho_idpessoa`) REFERENCES `carrinho` (`idcarrinho`, `idpessoa`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pagamento_ibfk_2` FOREIGN KEY (`idpagamentotipo`) REFERENCES `pagamentotipo` (`idpagamentotipo`),
  CONSTRAINT `pagamento_ibfk_3` FOREIGN KEY (`idcupom`) REFERENCES `cupom` (`idcupom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pagamento`
--

/*!40000 ALTER TABLE `pagamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagamento` ENABLE KEYS */;


--
-- Definition of table `pagamentotipo`
--

DROP TABLE IF EXISTS `pagamentotipo`;
CREATE TABLE `pagamentotipo` (
  `idpagamentotipo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipopagamento` varchar(100) NOT NULL,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idpagamentotipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pagamentotipo`
--

/*!40000 ALTER TABLE `pagamentotipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagamentotipo` ENABLE KEYS */;


--
-- Definition of table `perguntaprodvariacao`
--

DROP TABLE IF EXISTS `perguntaprodvariacao`;
CREATE TABLE `perguntaprodvariacao` (
  `idperguntaprodvariacao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idprodutovariacao` int(10) unsigned NOT NULL,
  `idproduto` int(10) unsigned NOT NULL,
  `pergunta` longtext NOT NULL,
  `resposta` longtext DEFAULT NULL,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idperguntaprodvariacao`,`idprodutovariacao`),
  KEY `perguntaprodvariacao_FKIndex1` (`idprodutovariacao`,`idproduto`),
  CONSTRAINT `perguntaprodvariacao_ibfk_1` FOREIGN KEY (`idprodutovariacao`, `idproduto`) REFERENCES `produtovariacao` (`idprodutovariacao`, `idproduto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perguntaprodvariacao`
--

/*!40000 ALTER TABLE `perguntaprodvariacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `perguntaprodvariacao` ENABLE KEYS */;


--
-- Definition of table `permissao`
--

DROP TABLE IF EXISTS `permissao`;
CREATE TABLE `permissao` (
  `idpermissao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(60) NOT NULL,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idpermissao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissao`
--

/*!40000 ALTER TABLE `permissao` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissao` ENABLE KEYS */;


--
-- Definition of table `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE `pessoa` (
  `idpessoa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idgenero` int(10) unsigned NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nome` varchar(20) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `nascimento` date NOT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `cnpj` varchar(18) DEFAULT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(70) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tentativa` int(10) unsigned NOT NULL DEFAULT 0,
  `tempo` datetime DEFAULT NULL,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idpessoa`,`idgenero`),
  KEY `pessoa_FKIndex1` (`idgenero`),
  CONSTRAINT `pessoa_ibfk_1` FOREIGN KEY (`idgenero`) REFERENCES `genero` (`idgenero`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pessoa`
--

/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` (`idpessoa`,`idgenero`,`foto`,`nome`,`sobrenome`,`nascimento`,`cpf`,`cnpj`,`telefone`,`email`,`senha`,`tentativa`,`tempo`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,1,'luciano.png','LUCIANO','PETTERSEN','1980-02-10','040.497.396-58',NULL,'(33)99109-9977','lcpyes@hotmail.com','$2y$10$TEj.kLxyF/iRhH0IHry13u02UQ82MsoATaIkCZQScf9HpwIB3kJEW',0,'2023-12-22 21:13:59','2023-12-05 12:14:01','2024-03-27 23:12:41','A'),
 (2,1,'fernando.jpg','Fernando','Salvino','1980-02-10','040.497.396-58',NULL,'(33)99109-9977','fernandodigitalarte@gmail.com','$2y$10$TEj.kLxyF/iRhH0IHry13u02UQ82MsoATaIkCZQScf9HpwIB3kJEW',0,NULL,'2024-03-28 01:27:06','2024-03-28 01:27:11','A');
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;


--
-- Definition of table `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `idproduto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iddepartamento` int(10) unsigned NOT NULL,
  `idpai` int(10) unsigned NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `produto` varchar(255) NOT NULL,
  `descricao` longtext NOT NULL,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idproduto`,`iddepartamento`,`idpai`) USING BTREE,
  KEY `produto_FKIndex1` (`idpai`) USING BTREE,
  KEY `FK_produto_departamento` (`iddepartamento`),
  CONSTRAINT `FK_produto_departamento` FOREIGN KEY (`iddepartamento`) REFERENCES `departamento` (`iddepartamento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produto`
--

/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;


--
-- Definition of table `produtovariacao`
--

DROP TABLE IF EXISTS `produtovariacao`;
CREATE TABLE `produtovariacao` (
  `idprodutovariacao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idproduto` int(10) unsigned NOT NULL,
  `produto_iddpartamentosub` int(10) unsigned NOT NULL,
  `altura` decimal(10,2) NOT NULL,
  `largura` decimal(10,2) NOT NULL,
  `peso` decimal(10,2) NOT NULL,
  `unidadepeso` varchar(10) NOT NULL,
  `destaque` char(1) DEFAULT 'N',
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idprodutovariacao`,`idproduto`),
  KEY `produtovariacao_FKIndex1` (`idproduto`,`produto_iddpartamentosub`),
  CONSTRAINT `produtovariacao_ibfk_1` FOREIGN KEY (`idproduto`, `produto_iddpartamentosub`) REFERENCES `produto` (`idproduto`, `iddepartamento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produtovariacao`
--

/*!40000 ALTER TABLE `produtovariacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `produtovariacao` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
