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
  `IdAuditoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `IdAdm` int(10) unsigned NOT NULL,
  `Acao` longtext NOT NULL,
  `Tipo` int(10) unsigned NOT NULL,
  `Tabela` varchar(245) NOT NULL,
  `DataHora` datetime NOT NULL,
  `Ip` varchar(45) NOT NULL,
  `PcUsuario` varchar(245) DEFAULT NULL,
  `Dispositivo` varchar(45) NOT NULL,
  `Alteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`IdAuditoria`,`IdAdm`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `auditoria`
--

/*!40000 ALTER TABLE `auditoria` DISABLE KEYS */;
INSERT INTO `auditoria` (`IdAuditoria`,`IdAdm`,`Acao`,`Tipo`,`Tabela`,`DataHora`,`Ip`,`PcUsuario`,`Dispositivo`,`Alteracao`) VALUES 
 (1,1,'Foi adicionado no sistema Banner ',1,'banner','2024-04-02 00:42:14','127.0.0.1','lcpye','Computador','2024-04-02 00:42:14'),
 (2,1,'Foi adicionado no sistema Banner ',1,'banner','2024-04-02 19:33:22','127.0.0.1','lcpye','Computador','2024-04-02 19:33:22'),
 (3,1,'Foi Excluido do sistema Banner Os melhores suplementos de alto rendimento',3,'banner','2024-04-02 19:43:52','127.0.0.1','lcpye','Computador','2024-04-02 19:43:52'),
 (4,1,'Foi adicionado no sistema Banner ',1,'banner','2024-04-02 19:44:04','127.0.0.1','lcpye','Computador','2024-04-02 19:44:04'),
 (5,1,'Foi Desativado o banner no sistema! Id=2',2,'banner','2024-04-02 19:44:08','127.0.0.1','lcpye','Computador','2024-04-02 19:44:08'),
 (6,1,'Foi Ativado o banner no sistema! Id=2',2,'banner','2024-04-02 19:44:11','127.0.0.1','lcpye','Computador','2024-04-02 19:44:11'),
 (7,1,'Foi adicionado no sistema Banner ',1,'banner','2024-04-02 19:54:56','127.0.0.1','lcpye','Computador','2024-04-02 19:54:56'),
 (8,1,'Foi Alterado banner Fernando no sistema!',2,'banner','2024-04-02 19:57:45','127.0.0.1','lcpye','Computador','2024-04-02 19:57:45'),
 (9,1,'Foi Alterado banner Fernando no sistema!',2,'banner','2024-04-02 19:57:53','127.0.0.1','lcpye','Computador','2024-04-02 19:57:53'),
 (10,1,'Foi adicionado no sistema Tipo de Cargo Luciano',1,'cargotipo','2024-04-02 20:11:39','127.0.0.1','lcpye','Computador','2024-04-02 20:11:39'),
 (11,1,'Foi Alterado o tipo de cargo Luciano a no sistema!',2,'cargotipo','2024-04-02 20:18:01','127.0.0.1','lcpye','Computador','2024-04-02 20:18:01'),
 (12,1,'Foi Alterado o tipo de cargo Luciano aaaa no sistema!',2,'cargotipo','2024-04-02 20:18:52','127.0.0.1','lcpye','Computador','2024-04-02 20:18:52'),
 (13,1,'Foi Alterado banner teste2 aa no sistema!',2,'banner','2024-04-02 20:30:22','127.0.0.1','lcpye','Computador','2024-04-02 20:30:22'),
 (14,1,'Foi Alterado o tipo de cargo Luciano no sistema!',2,'cargotipo','2024-04-02 20:32:00','127.0.0.1','lcpye','Computador','2024-04-02 20:32:00'),
 (15,1,'Foi adicionado no sistema Tipo de Cargo safdsfasfas',1,'cargotipo','2024-04-02 20:32:10','127.0.0.1','lcpye','Computador','2024-04-02 20:32:10'),
 (16,1,'Foi Excluido do sistema Tipo de cargo',3,'cargotipo','2024-04-02 20:32:15','127.0.0.1','lcpye','Computador','2024-04-02 20:32:15'),
 (17,1,'Foi adicionado no sistema Genero Outros',1,'Genero','2024-04-02 21:13:08','127.0.0.1','lcpye','Computador','2024-04-02 21:13:08'),
 (18,1,'Foi Desativado o genero no sistema! Id=18',2,'Genero','2024-04-02 21:15:16','127.0.0.1','lcpye','Computador','2024-04-02 21:15:16'),
 (19,1,'Foi Ativado o genero no sistema! Id=18',2,'Genero','2024-04-02 21:15:19','127.0.0.1','lcpye','Computador','2024-04-02 21:15:19'),
 (20,1,'Foi Alterado Genero Outros a no sistema!',2,'Genero','2024-04-02 21:15:29','127.0.0.1','lcpye','Computador','2024-04-02 21:15:29'),
 (21,1,'Foi Excluido do sistema Genero',3,'Genero','2024-04-02 21:15:34','127.0.0.1','lcpye','Computador','2024-04-02 21:15:34'),
 (22,1,'Foi Excluido do sistema Genero',3,'Genero','2024-04-02 21:16:26','127.0.0.1','lcpye','Computador','2024-04-02 21:16:26'),
 (23,1,'Foi adicionado no sistema Genero asfdfasf',1,'Genero','2024-04-02 21:16:32','127.0.0.1','lcpye','Computador','2024-04-02 21:16:32'),
 (24,1,'Foi Excluido do sistema Genero',3,'Genero','2024-04-02 21:16:37','127.0.0.1','lcpye','Computador','2024-04-02 21:16:37'),
 (25,1,'Foi adicionado no sistema Banner ',1,'banner','2024-04-03 16:49:33','127.0.0.1','lcpye','Computador','2024-04-03 16:49:33'),
 (26,1,'Foi Excluido do sistema Banner Fernando',3,'banner','2024-04-05 10:18:54','127.0.0.1','lcpye','Computador','2024-04-05 10:18:54'),
 (27,1,'Foi adicionado no sistema Banner ',1,'banner','2024-04-05 11:16:57','127.0.0.1','lcpye','Computador','2024-04-05 11:16:57'),
 (28,1,'Foi Desativado o banner no sistema! Id=5',2,'banner','2024-04-05 11:17:25','127.0.0.1','lcpye','Computador','2024-04-05 11:17:26'),
 (29,1,'Foi Ativado o banner no sistema! Id=5',2,'banner','2024-04-05 11:17:31','127.0.0.1','lcpye','Computador','2024-04-05 11:17:31'),
 (30,1,'Foi Desativado o banner no sistema! Id=5',2,'banner','2024-04-05 11:17:43','127.0.0.1','lcpye','Computador','2024-04-05 11:17:43'),
 (31,1,'Foi Ativado o banner no sistema! Id=5',2,'banner','2024-04-05 11:19:48','127.0.0.1','lcpye','Computador','2024-04-05 11:19:48'),
 (32,1,'Foi Desativado o banner no sistema! Id=5',2,'banner','2024-04-05 11:20:14','127.0.0.1','lcpye','Computador','2024-04-05 11:20:14'),
 (33,1,'Foi Ativado o banner no sistema! Id=5',2,'banner','2024-04-05 11:20:19','127.0.0.1','lcpye','Computador','2024-04-05 11:20:19'),
 (34,1,'Foi Excluido do sistema Banner tttttttttt',3,'banner','2024-04-05 11:29:58','127.0.0.1','lcpye','Computador','2024-04-05 11:29:58'),
 (35,1,'Foi adicionado no sistema Banner ',1,'banner','2024-04-05 14:18:21','127.0.0.1','lcpye','Computador','2024-04-05 14:18:21'),
 (36,1,'Foi adicionado no sistema Pessoa ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','lcpye','Computador','2024-04-05 14:23:58'),
 (37,1,'Foi adicionado no sistema Pessoa ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','lcpye','Computador','2024-04-05 14:25:12'),
 (38,1,'Foi adicionado no sistema Banner ',1,'banner','2024-04-09 23:57:32','127.0.0.1','lcpye','Computador','2024-04-09 23:57:32'),
 (39,1,'Foi Excluido do sistema Banner carro',3,'banner','2024-04-09 23:58:09','127.0.0.1','lcpye','Computador','2024-04-09 23:58:09'),
 (40,1,'Foi alterado no sistema Pessoa ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','lcpye','Computador','2024-04-10 00:01:50'),
 (41,1,'O banner foi adicionado no sistema',1,'banner','0000-00-00 00:00:00','127.0.0.1','lcpye','Computador','2024-04-10 00:11:18'),
 (42,1,'Foi alterado no sistema Banner ',1,'banner','0000-00-00 00:00:00','127.0.0.1','lcpye','Computador','2024-04-10 00:12:32'),
 (43,1,'Foi Excluido do sistema Banner asfasdfasdfasd',3,'banner','2024-04-10 00:27:17','127.0.0.1','lcpye','Computador','2024-04-10 00:27:17'),
 (44,1,'Foi Excluido do sistema Banner asfasdfasdfasd',3,'banner','2024-04-10 00:27:21','127.0.0.1','lcpye','Computador','2024-04-10 00:27:21'),
 (45,1,'Foi Excluido do sistema Banner asfasdfasdfasd',3,'banner','2024-04-10 00:27:25','127.0.0.1','lcpye','Computador','2024-04-10 00:27:25'),
 (46,1,'Foi Excluido do sistema Banner asfasdfasdfasd',3,'banner','2024-04-10 00:27:34','127.0.0.1','lcpye','Computador','2024-04-10 00:27:34'),
 (47,1,'Foi Excluido do sistema Banner asfasdfasdfasd',3,'banner','2024-04-10 00:27:38','127.0.0.1','lcpye','Computador','2024-04-10 00:27:38'),
 (48,1,'Foi Excluido do sistema Banner asfasdfasdfasd',3,'banner','2024-04-10 00:27:51','127.0.0.1','lcpye','Computador','2024-04-10 00:27:51'),
 (49,1,'Foi Excluido do sistema Banner asdfasfasdfasdfasdfas',3,'banner','2024-04-10 00:27:55','127.0.0.1','lcpye','Computador','2024-04-10 00:27:55'),
 (50,1,'Foi Excluido do sistema Banner safasdfasdasd',3,'banner','2024-04-10 00:28:12','127.0.0.1','lcpye','Computador','2024-04-10 00:28:13'),
 (51,1,'Foi Excluido do sistema Banner safasdfasdasd',3,'banner','2024-04-10 00:28:17','127.0.0.1','lcpye','Computador','2024-04-10 00:28:17'),
 (52,1,'O banner foi adicionado no sistema',1,'banner','0000-00-00 00:00:00','127.0.0.1','lcpye','Computador','2024-04-10 00:34:52'),
 (53,1,'Foi alterado no sistema Banner ',1,'banner','0000-00-00 00:00:00','127.0.0.1','lcpye','Computador','2024-04-10 00:35:02'),
 (54,1,'Foi Excluido do sistema Banner sfafasdfa',3,'banner','2024-04-10 00:35:05','127.0.0.1','lcpye','Computador','2024-04-10 00:35:05'),
 (55,1,'O banner foi adicionado no sistema',1,'banner','0000-00-00 00:00:00','127.0.0.1','lcpye','Computador','2024-04-10 00:37:05'),
 (56,1,'Foi Excluido do sistema Banner asfasdfasfasdf',3,'banner','2024-04-10 00:37:28','127.0.0.1','lcpye','Computador','2024-04-10 00:37:28'),
 (57,1,'Foi alterado no sistema Banner ',1,'banner','0000-00-00 00:00:00','127.0.0.1','lcpye','Computador','2024-04-10 00:39:32'),
 (58,1,'Foi Desativado o banner no sistema! Id=6',2,'banner','2024-04-10 00:39:43','127.0.0.1','lcpye','Computador','2024-04-10 00:39:43'),
 (59,1,'Foi Ativado o banner no sistema! Id=6',2,'banner','2024-04-10 00:39:48','127.0.0.1','lcpye','Computador','2024-04-10 00:39:48'),
 (60,1,'O banner foi adicionado no sistema',1,'banner','0000-00-00 00:00:00','127.0.0.1','lcpye','Computador','2024-04-10 00:39:57'),
 (61,1,'O banner foi adicionado no sistema',1,'banner','0000-00-00 00:00:00','127.0.0.1','lcpye','Computador','2024-04-10 00:43:55'),
 (62,1,'Foi alterado no sistema Banner ',1,'banner','0000-00-00 00:00:00','127.0.0.1','lcpye','Computador','2024-04-10 00:45:02'),
 (63,1,'Foi Excluido do sistema Banner aaaaaaa',3,'banner','2024-04-10 00:45:51','127.0.0.1','lcpye','Computador','2024-04-10 00:45:51'),
 (64,1,'Foi Excluido do sistema Banner novo teste',3,'banner','2024-04-10 00:45:56','127.0.0.1','lcpye','Computador','2024-04-10 00:45:57'),
 (65,1,'Foi Desativado o banner no sistema! Id=3',2,'banner','2024-04-10 00:46:13','127.0.0.1','lcpye','Computador','2024-04-10 00:46:13'),
 (66,1,'O banner foi adicionado no sistema',1,'banner','0000-00-00 00:00:00','127.0.0.1','lcpye','Computador','2024-04-10 00:46:55'),
 (67,1,'Foi Excluido do sistema Banner asfasdfasfsad',3,'banner','2024-04-10 00:47:01','127.0.0.1','lcpye','Computador','2024-04-10 00:47:01'),
 (68,1,'Foi alterado o Status ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','lcpye','Computador','2024-04-26 15:24:17'),
 (69,1,'Foi alterado o Status ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','lcpye','Computador','2024-04-26 15:24:22');
/*!40000 ALTER TABLE `auditoria` ENABLE KEYS */;


--
-- Definition of table `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `IdBanner` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `IdAdm` int(10) unsigned NOT NULL,
  `Img` varchar(145) DEFAULT NULL,
  `Titulo` varchar(145) NOT NULL,
  `DataInicial` datetime NOT NULL DEFAULT current_timestamp(),
  `DataFinal` datetime NOT NULL DEFAULT current_timestamp(),
  `Tipo` varchar(50) NOT NULL DEFAULT 'rotativo',
  `Cadastro` datetime DEFAULT current_timestamp(),
  `Alteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`IdBanner`,`IdAdm`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `banner`
--

/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
INSERT INTO `banner` (`IdBanner`,`IdAdm`,`Img`,`Titulo`,`DataInicial`,`DataFinal`,`Tipo`,`Cadastro`,`Alteracao`,`Ativo`) VALUES 
 (3,1,'Exclusivy-660c8cc0bee51.jpeg','teste2 aa','2024-04-02 19:54:42','2024-05-02 19:54:42','Central','2024-04-02 19:54:56','2024-04-02 19:54:56','D'),
 (4,1,'Exclusivy-660db2cd86a6c.jpg','teste atila','2024-04-03 16:48:44','2024-05-03 16:48:44','Rotativo','2024-04-03 16:49:33','2024-04-03 16:49:33','A'),
 (19,1,'Exclusivy-66160b3e35a14.jpg','asfsadfasfsadfas','2024-04-10 00:39:26','2024-05-10 00:39:26','Rotativo','2024-04-10 00:39:57','2024-04-10 00:39:57','A');
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;


--
-- Definition of table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE `cargo` (
  `IdCargo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `IdFuncionario` int(10) unsigned NOT NULL,
  `IdCargoTipo` int(10) unsigned NOT NULL,
  `Cargo` varchar(60) NOT NULL,
  `Cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `Alteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`IdCargo`,`IdFuncionario`,`IdCargoTipo`) USING BTREE,
  KEY `cargo_FKIndex2` (`IdCargoTipo`) USING BTREE,
  KEY `cargo_FKIndex1` (`IdFuncionario`,`IdCargo`) USING BTREE,
  CONSTRAINT `cargo_ibfk_1` FOREIGN KEY (`IdFuncionario`, `IdCargo`) REFERENCES `funcionario` (`idfuncionario`, `idcargo`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  `IdCargoTipo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TipoCargo` varchar(60) NOT NULL,
  `Cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `Alteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`IdCargoTipo`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cargotipo`
--

/*!40000 ALTER TABLE `cargotipo` DISABLE KEYS */;
INSERT INTO `cargotipo` (`IdCargoTipo`,`TipoCargo`,`Cadastro`,`Alteracao`,`Ativo`) VALUES 
 (4,'Fornecedor','2024-03-28 19:10:11','2024-03-28 19:54:24','D'),
 (6,'Proprietário','2024-03-28 19:53:20','2024-03-28 19:53:34','A'),
 (7,'Luciano','2024-04-02 20:11:39','2024-04-02 20:11:39','A');
/*!40000 ALTER TABLE `cargotipo` ENABLE KEYS */;


--
-- Definition of table `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE `carrinho` (
  `IdCarrinho` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `IdPessoa` int(10) unsigned NOT NULL,
  `Cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `Alteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`IdCarrinho`,`IdPessoa`) USING BTREE,
  KEY `carrinho_FKIndex1` (`IdPessoa`) USING BTREE,
  CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`IdPessoa`) REFERENCES `pessoa` (`IdPessoa`) ON DELETE CASCADE ON UPDATE CASCADE
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
  `IdCarrinhoProduto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `IdCarrinho` int(10) unsigned NOT NULL,
  `IdEstoque` int(10) unsigned NOT NULL,
  `Qtd` int(10) unsigned NOT NULL,
  `Cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `Alteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`IdCarrinhoProduto`,`IdCarrinho`,`IdEstoque`) USING BTREE,
  KEY `carrinhoproduto_FKIndex1` (`IdCarrinho`) USING BTREE,
  KEY `carrinhoproduto_FKIndex2` (`IdEstoque`) USING BTREE,
  CONSTRAINT `carrinhoproduto_ibfk` FOREIGN KEY (`IdCarrinho`) REFERENCES `carrinho` (`IdCarrinho`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `carrinhoproduto_ibfk_2` FOREIGN KEY (`IdEstoque`) REFERENCES `estoque` (`idestoque`)
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
  `IdCartao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `IdPessoa` int(10) unsigned NOT NULL,
  `Numero` varchar(16) NOT NULL,
  `Validade` varchar(5) NOT NULL,
  `Cvv` int(10) unsigned NOT NULL,
  `Bandeira` varchar(30) NOT NULL DEFAULT 'Não Informado',
  `Cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `Alteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`IdCartao`,`IdPessoa`) USING BTREE,
  KEY `cartao_FKIndex1` (`IdPessoa`) USING BTREE,
  CONSTRAINT `cartao_ibfk_1` FOREIGN KEY (`IdPessoa`) REFERENCES `pessoa` (`IdPessoa`) ON DELETE CASCADE ON UPDATE CASCADE
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
  `IdCategoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Categoria` varchar(100) NOT NULL,
  `Cadastro` date NOT NULL DEFAULT current_timestamp(),
  `Alteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`IdCategoria`) USING BTREE
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
  `IdCategoriaFornecedor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Idpessoa` int(10) unsigned NOT NULL,
  `Idcategoria` int(10) unsigned NOT NULL,
  `Cadastro` date NOT NULL DEFAULT current_timestamp(),
  `Alteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`IdCategoriaFornecedor`,`Idpessoa`,`Idcategoria`) USING BTREE,
  KEY `categoriafornecedor_FKIndex1` (`Idpessoa`) USING BTREE,
  KEY `categoriafornecedor_FKIndex2` (`Idcategoria`) USING BTREE,
  CONSTRAINT `categoriafornecedor_ibfk_1` FOREIGN KEY (`Idpessoa`) REFERENCES `pessoa` (`IdPessoa`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `categoriafornecedor_ibfk_2` FOREIGN KEY (`Idcategoria`) REFERENCES `categoria` (`IdCategoria`)
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
  `IdCupom` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(100) NOT NULL,
  `Percentual` decimal(5,2) NOT NULL,
  `Qtd` int(10) unsigned NOT NULL,
  `QtdUsado` int(10) unsigned NOT NULL DEFAULT 0,
  `Cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `Alteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`IdCupom`) USING BTREE
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
  `IdDepartamento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `IdPai` int(10) unsigned NOT NULL,
  `Departamento` varchar(50) NOT NULL,
  `Cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `Alteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`IdDepartamento`,`IdPai`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departamento`
--

/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` (`IdDepartamento`,`IdPai`,`Departamento`,`Cadastro`,`Alteracao`,`Ativo`) VALUES 
 (1,0,'Creatina','2024-04-29 21:03:37','2024-04-29 21:03:37','A');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;


--
-- Definition of table `departamentosub`
--

DROP TABLE IF EXISTS `departamentosub`;
CREATE TABLE `departamentosub` (
  `IdDepartamentoSub` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `IdPai` int(10) unsigned NOT NULL,
  `DepartamentoSub` varchar(100) DEFAULT NULL,
  `Cadastro` datetime DEFAULT current_timestamp(),
  `Alteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ativo` char(1) DEFAULT 'A',
  PRIMARY KEY (`IdDepartamentoSub`,`IdPai`) USING BTREE,
  KEY `departamentosub_FKIndex1` (`IdPai`) USING BTREE
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
  `qtdatual` int(10) unsigned NOT NULL,
  `qtdvendido` int(10) unsigned NOT NULL DEFAULT 0,
  `vendaPrevia` varchar(45) NOT NULL,
  `custo` decimal(10,2) NOT NULL,
  `venda` decimal(10,2) NOT NULL,
  `lote` varchar(100) DEFAULT NULL,
  `vencimento` date NOT NULL,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idestoque`,`idprodutovariacao`),
  KEY `estoque_FKIndex1` (`idprodutovariacao`) USING BTREE,
  CONSTRAINT `estoque_ibfk_1` FOREIGN KEY (`idprodutovariacao`) REFERENCES `produtovariacao` (`idprodutovariacao`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estoque`
--

/*!40000 ALTER TABLE `estoque` DISABLE KEYS */;
INSERT INTO `estoque` (`idestoque`,`idprodutovariacao`,`qtdatual`,`qtdvendido`,`vendaPrevia`,`custo`,`venda`,`lote`,`vencimento`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,1,100,0,'50','25.00','60.00','5555','2024-04-29','2024-04-29 21:08:39','2024-04-29 21:08:39','A'),
 (2,2,90,0,'35','15.00','46.00','66666','2024-04-29','2024-04-29 21:09:54','2024-04-29 21:09:54','A');
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
  `IdGenero` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Genero` varchar(30) DEFAULT NULL,
  `Cadastro` datetime DEFAULT current_timestamp(),
  `Alteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ativo` char(1) DEFAULT 'A',
  PRIMARY KEY (`IdGenero`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genero`
--

/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` (`IdGenero`,`Genero`,`Cadastro`,`Alteracao`,`Ativo`) VALUES 
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
  `IdPessoa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `IdGenero` int(10) unsigned NOT NULL,
  `Foto` varchar(255) DEFAULT NULL,
  `Nome` varchar(20) NOT NULL,
  `Sobrenome` varchar(50) NOT NULL,
  `Nascimento` date NOT NULL,
  `Cpf` varchar(14) DEFAULT NULL,
  `Cnpj` varchar(18) DEFAULT NULL,
  `Telefone` varchar(15) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `Senha` varchar(255) NOT NULL,
  `Tentativa` int(10) unsigned NOT NULL DEFAULT 0,
  `Tempo` datetime DEFAULT NULL,
  `Cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `Alteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`IdPessoa`,`IdGenero`) USING BTREE,
  KEY `pessoa_FKIndex1` (`IdGenero`) USING BTREE,
  CONSTRAINT `pessoa_ibfk_1` FOREIGN KEY (`IdGenero`) REFERENCES `genero` (`IdGenero`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pessoa`
--

/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` (`IdPessoa`,`IdGenero`,`Foto`,`Nome`,`Sobrenome`,`Nascimento`,`Cpf`,`Cnpj`,`Telefone`,`Email`,`Senha`,`Tentativa`,`Tempo`,`Cadastro`,`Alteracao`,`Ativo`) VALUES 
 (1,1,'luciano.png','LUCIANO','PETTERSEN','1980-02-10','040.497.396-58',NULL,'(33)99109-9977','lcpyes@hotmail.com','$2y$10$TEj.kLxyF/iRhH0IHry13u02UQ82MsoATaIkCZQScf9HpwIB3kJEW',0,'2023-12-22 21:13:59','2023-12-05 12:14:01','2024-03-27 23:12:41','A'),
 (2,1,'fernando.jpg','Fernando','Salvino','1980-02-10','040.497.396-58',NULL,'(33)99109-9977','fernandodigitalarte@gmail.com','$2y$10$TEj.kLxyF/iRhH0IHry13u02UQ82MsoATaIkCZQScf9HpwIB3kJEW',0,NULL,'2024-03-28 01:27:06','2024-03-28 01:27:11','A'),
 (4,2,'Exclusivy-6616011e4879c.jpg','vanessa','Pettersen','2024-04-05','647.874.000-53',NULL,'(65)87449-8888','nessa@hotmail.com','985478547854782',0,NULL,'2024-04-05 14:23:58','2024-04-05 14:23:58','A'),
 (5,2,'Exclusivy-661033f86f99d.jpg','asfsdfas','asdfadsfasd','2024-04-01','093.915.440-45',NULL,'(45)53464-5634','asfasdf@sdfas.com','sdafasdfasfafasdfasdfasd',0,NULL,'2024-04-05 14:25:12','2024-04-05 14:25:12','A');
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;


--
-- Definition of table `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `idproduto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iddepartamento` int(10) unsigned NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `produto` varchar(255) NOT NULL,
  `descricao` longtext NOT NULL,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idproduto`,`iddepartamento`) USING BTREE,
  KEY `FK_produto_departamento` (`iddepartamento`),
  CONSTRAINT `FK_produto_departamento` FOREIGN KEY (`iddepartamento`) REFERENCES `departamento` (`iddepartamento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produto`
--

/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`idproduto`,`iddepartamento`,`foto`,`produto`,`descricao`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,1,'product01.jpg','Creatina de chocolate','tudo a ver com chocolate','2024-04-29 21:04:29','2024-04-29 21:04:29','A'),
 (2,1,'product01.jpg','Creatina de Morango','tudo a ver com chocolate','2024-04-29 21:04:58','2024-04-29 21:10:15','A'),
 (3,1,'product01.jpg','Creatina de chocolate 3','tudo a ver com chocolate','2024-04-29 21:04:58','2024-04-29 21:04:58','A');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;


--
-- Definition of table `produtovariacao`
--

DROP TABLE IF EXISTS `produtovariacao`;
CREATE TABLE `produtovariacao` (
  `idprodutovariacao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idproduto` int(10) unsigned NOT NULL,
  `altura` decimal(10,2) NOT NULL,
  `largura` decimal(10,2) NOT NULL,
  `peso` decimal(10,2) NOT NULL,
  `unidadepeso` varchar(10) NOT NULL,
  `destaque` char(1) DEFAULT 'N',
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idprodutovariacao`,`idproduto`),
  KEY `produtovariacao_FKIndex1` (`idproduto`) USING BTREE,
  CONSTRAINT `produtovariacao_ibfk_1` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`idproduto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produtovariacao`
--

/*!40000 ALTER TABLE `produtovariacao` DISABLE KEYS */;
INSERT INTO `produtovariacao` (`idprodutovariacao`,`idproduto`,`altura`,`largura`,`peso`,`unidadepeso`,`destaque`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,1,'25.00','30.00','100.00','kg','0','2024-04-29 21:07:58','2024-04-29 21:07:58','A'),
 (2,2,'25.00','30.00','100.00','kg','0','2024-04-29 21:09:24','2024-04-29 21:09:24','A');
/*!40000 ALTER TABLE `produtovariacao` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
