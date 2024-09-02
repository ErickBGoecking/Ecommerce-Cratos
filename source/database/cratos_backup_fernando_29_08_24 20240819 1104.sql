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
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
 (69,1,'Foi alterado o Status ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','lcpye','Computador','2024-04-26 15:24:22'),
 (70,2,'O novo usuario foi adicionado no sistema',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-23 20:07:45'),
 (71,2,'Foi Excluido do sistema Pessoa',3,'pessoa','2024-07-23 20:07:56','127.0.0.1','Nando','Computador','2024-07-23 20:07:56'),
 (72,2,'O novo usuario foi adicionado no sistema',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 15:06:07'),
 (73,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 15:31:35'),
 (74,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 15:31:49'),
 (75,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 15:38:15'),
 (76,2,'Foi Excluido do sistema Pessoa',3,'pessoa','2024-07-24 15:47:15','127.0.0.1','Nando','Computador','2024-07-24 15:47:15'),
 (77,2,'Categoria excluida do sistema',3,'categoria','2024-07-24 15:58:36','127.0.0.1','Nando','Computador','2024-07-24 15:58:36'),
 (78,2,'Categoria excluida do sistema',3,'categoria','2024-07-24 15:58:45','127.0.0.1','Nando','Computador','2024-07-24 15:58:45'),
 (79,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 16:06:29'),
 (80,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 16:15:14'),
 (81,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 16:36:37'),
 (82,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 16:36:47'),
 (83,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 16:44:26'),
 (84,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 16:45:02'),
 (85,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 16:45:20'),
 (86,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 16:54:24'),
 (87,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 17:27:41'),
 (88,2,'Foi alterado no sistema Pessoa ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 17:32:58'),
 (89,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 17:36:37'),
 (90,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 17:36:51'),
 (91,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 17:46:57'),
 (92,2,'Foi alterado no sistema Pessoa ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 17:48:13'),
 (93,2,'Foi alterado no sistema Pessoa ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 17:48:28'),
 (94,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 17:49:05'),
 (95,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 17:49:19'),
 (96,2,'Foi alterado no sistema Pessoa ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 17:56:19'),
 (97,2,'Foi alterado no sistema Pessoa ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 18:06:47'),
 (98,2,'Foi alterado no sistema Pessoa ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 18:09:07'),
 (99,2,'Foi alterado no sistema Banner ',1,'banner','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 18:09:26'),
 (100,2,'Foi Ativado o banner no sistema! Id=3',2,'banner','2024-07-24 18:10:52','127.0.0.1','Nando','Computador','2024-07-24 18:10:52'),
 (101,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 18:25:53'),
 (102,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 18:27:39'),
 (103,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 18:27:54'),
 (104,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 18:28:00'),
 (105,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 20:45:01'),
 (106,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 20:45:12'),
 (107,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 20:45:21'),
 (108,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-24 20:45:29'),
 (109,2,'Foi adicionado no sistema Genero neutro',1,'Genero','2024-07-24 20:45:51','127.0.0.1','Nando','Computador','2024-07-24 20:45:51'),
 (110,2,'Foi Desativado o genero no sistema! Id=1',2,'Genero','2024-07-24 20:45:55','127.0.0.1','Nando','Computador','2024-07-24 20:45:55'),
 (111,2,'Foi Ativado o genero no sistema! Id=1',2,'Genero','2024-07-24 20:45:58','127.0.0.1','Nando','Computador','2024-07-24 20:45:58'),
 (112,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-25 10:00:05'),
 (113,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-25 10:41:58'),
 (114,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-25 10:42:11'),
 (115,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-25 10:42:21'),
 (116,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-25 10:43:07'),
 (117,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-25 10:43:14'),
 (118,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-25 10:43:22'),
 (119,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-25 10:43:28'),
 (120,2,'O novo usuario foi adicionado no sistema',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-25 10:47:39'),
 (121,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-28 14:14:52'),
 (122,2,'O nova categoria foi adicionado no sistema',1,'categoria','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-28 14:15:03'),
 (123,2,'O novo usuario foi adicionado no sistema',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-28 14:34:52'),
 (124,2,'O novo usuario foi adicionado no sistema',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-28 14:35:08'),
 (125,2,'O novo usuario foi adicionado no sistema',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-28 14:35:21'),
 (126,2,'O novo usuario foi adicionado no sistema',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-28 14:35:31'),
 (127,2,'O novo usuario foi adicionado no sistema',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-28 14:35:39'),
 (128,2,'O novo usuario foi adicionado no sistema',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-28 14:35:53'),
 (129,2,'O novo usuario foi adicionado no sistema',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-28 14:36:20'),
 (130,2,'O novo usuario foi adicionado no sistema',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-28 14:36:20'),
 (131,2,'O novo usuario foi adicionado no sistema',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-28 14:36:34'),
 (132,2,'O novo usuario foi adicionado no sistema',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-07-28 15:05:48'),
 (133,2,'Foi Alterado Genero neutros no sistema!',2,'Genero','2024-08-04 05:32:19','127.0.0.1','Nando','Computador','2024-08-04 05:32:19'),
 (134,2,'Foi Excluido do sistema Genero',3,'Genero','2024-08-04 05:32:25','127.0.0.1','Nando','Computador','2024-08-04 05:32:25'),
 (135,2,'Foi adicionado no sistema Genero neutro',1,'Genero','2024-08-04 05:32:33','127.0.0.1','Nando','Computador','2024-08-04 05:32:33'),
 (136,2,'Foi alterado no sistema Pessoa ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-08-08 09:59:56'),
 (137,2,'Foi alterado o Status ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-08-08 10:22:26'),
 (138,2,'Foi alterado o Status ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-08-08 10:22:31'),
 (139,2,'Foi alterado o Status ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-08-08 10:22:38'),
 (140,2,'Foi alterado o Status ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-08-09 22:10:46'),
 (141,2,'Foi alterado o Status ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-08-09 22:10:47'),
 (142,2,'Foi alterado o Status ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-08-09 22:10:49'),
 (143,2,'Foi alterado o Status ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-08-09 22:10:50'),
 (144,2,'Foi alterado o Status ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-08-09 22:10:52'),
 (145,2,'Foi alterado o Status ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-08-09 22:10:53'),
 (146,2,'Foi alterado o Status ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-08-09 22:10:53'),
 (147,2,'Foi alterado o Status ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-08-09 22:10:54'),
 (148,2,'Foi alterado o Status ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-08-09 22:10:58'),
 (149,2,'Foi alterado o Status ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-08-09 22:11:00'),
 (150,2,'Foi alterado no sistema Pessoa ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-08-09 22:11:17'),
 (151,2,'Foi alterado o Status ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-08-13 13:13:18'),
 (152,2,'Foi alterado o Status ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-08-13 13:13:19'),
 (153,2,'Foi alterado o Status ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-08-13 13:13:24'),
 (154,2,'Foi alterado o Status ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-08-13 13:13:24'),
 (155,2,'Foi alterado o Status ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-08-13 13:13:36'),
 (156,2,'Foi alterado no sistema Pessoa ',1,'pessoa','0000-00-00 00:00:00','127.0.0.1','Nando','Computador','2024-08-15 22:27:14');
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `banner`
--

/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
INSERT INTO `banner` (`IdBanner`,`IdAdm`,`Img`,`Titulo`,`DataInicial`,`DataFinal`,`Tipo`,`Cadastro`,`Alteracao`,`Ativo`) VALUES 
 (3,1,'Exclusivy-660c8cc0bee51.jpeg','teste 5','2024-04-02 19:54:42','2024-05-02 19:54:42','Central','2024-04-02 19:54:56','2024-04-02 19:54:56','A'),
 (4,1,'Exclusivy-660db2cd86a6c.jpg','teste atila','2024-04-03 16:48:44','2024-05-03 16:48:44','Rotativo','2024-04-03 16:49:33','2024-04-03 16:49:33','A'),
 (19,1,'Exclusivy-66160b3e35a14.jpg','asfsadfasfsadfas','2024-04-10 00:39:26','2024-05-10 00:39:26','Rotativo','2024-04-10 00:39:57','2024-04-10 00:39:57','A'),
 (22,1,NULL,'banner do lu rodando a piroca','2024-08-13 11:31:46','2024-08-13 11:31:46','rotativo','2024-08-13 11:31:46','2024-08-13 11:31:46','A'),
 (23,1,NULL,'banner do lu rodando a piroca','2024-08-13 11:35:27','2024-08-13 11:35:27','rotativo','2024-08-13 11:35:27','2024-08-13 11:35:27','A');
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
  CONSTRAINT `cargo_ibfk_2` FOREIGN KEY (`IdCargoTipo`) REFERENCES `cargotipo` (`IdCargoTipo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `cargotipo` varchar(60) NOT NULL,
  `Cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `Alteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`IdCargoTipo`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cargotipo`
--

/*!40000 ALTER TABLE `cargotipo` DISABLE KEYS */;
INSERT INTO `cargotipo` (`IdCargoTipo`,`cargotipo`,`Cadastro`,`Alteracao`,`Ativo`) VALUES 
 (4,'Fornecedor','2024-03-28 19:10:11','2024-03-28 19:54:24','D'),
 (6,'Proprietario','2024-03-28 19:53:20','2024-03-28 19:53:34','A'),
 (9,'Luciano','2024-08-12 22:36:26','2024-08-12 22:36:26','A');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carrinho`
--

/*!40000 ALTER TABLE `carrinho` DISABLE KEYS */;
INSERT INTO `carrinho` (`IdCarrinho`,`IdPessoa`,`Cadastro`,`Alteracao`,`Ativo`) VALUES 
 (1,1,'0000-00-00 00:00:00','2024-08-01 00:00:41','A');
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
  `IdPai` int(10) unsigned NOT NULL DEFAULT 0,
  `Categoria` varchar(100) NOT NULL,
  `Cadastro` date NOT NULL DEFAULT current_timestamp(),
  `Alteracao` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`IdCategoria`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoria`
--

/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`IdCategoria`,`IdPai`,`Categoria`,`Cadastro`,`Alteracao`,`Ativo`) VALUES 
 (2,0,'Hiper Calórico','2024-07-23','2024-07-23 19:52:23','A'),
 (5,3,'150g','2024-07-23','2024-07-23 19:52:56','A'),
 (24,3,'330g','2024-07-24','2024-07-24 18:27:39','A'),
 (26,2,'Baulinha','2024-07-24','2024-07-24 18:28:00','A'),
 (28,27,'336g','2024-07-24','2024-07-24 20:45:12','A'),
 (31,2,'15g','2024-07-25','2024-07-25 10:00:05','A'),
 (33,32,'300g','2024-07-25','2024-07-25 10:42:11','A'),
 (36,35,'Gay','2024-07-25','2024-07-25 10:43:14','A'),
 (37,35,'Putinha','2024-07-25','2024-07-25 10:43:21','A'),
 (42,5,'Teste','2024-08-01','2024-08-01 06:43:20','A'),
 (50,49,'55','2024-08-06','2024-08-06 21:53:50','A'),
 (51,0,'Whay Protein','2024-08-06','2024-08-06 21:54:09','A'),
 (52,51,'325g','2024-08-06','2024-08-06 21:54:17','A'),
 (53,3,'novo','2024-08-06','2024-08-06 21:54:44','A'),
 (54,51,'5gramasssss','2024-08-06','2024-08-06 21:56:43','A'),
 (80,79,'Novo','2024-08-07','2024-08-07 02:47:20','A'),
 (89,0,'Creatina','2024-08-07','2024-08-07 03:04:13','A'),
 (90,89,'200ml','2024-08-07','2024-08-07 03:04:21','A'),
 (91,89,'300g','2024-08-07','2024-08-07 03:04:31','A'),
 (121,119,'nova subcategoriaaa','2024-08-09','2024-08-09 01:09:03','A'),
 (122,0,'novo','2024-08-09','2024-08-09 15:52:47','A');
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
  CONSTRAINT `comentarioproduto_ibfk_2` FOREIGN KEY (`idpessoa`, `idgenero`) REFERENCES `pessoa` (`IdPessoa`, `IdGenero`) ON DELETE CASCADE ON UPDATE CASCADE
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departamento`
--

/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` (`IdDepartamento`,`IdPai`,`Departamento`,`Cadastro`,`Alteracao`,`Ativo`) VALUES 
 (1,0,'Creatina','2024-04-29 21:03:37','2024-04-29 21:03:37','A'),
 (2,0,'Hipercaloricos','2024-08-01 17:20:46','2024-08-01 17:20:46','A'),
 (3,0,'Whey','2024-08-01 17:20:46','2024-08-01 17:20:46','A');
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
  CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`idpessoa`, `idgenero`) REFERENCES `pessoa` (`IdPessoa`, `IdGenero`) ON DELETE CASCADE ON UPDATE CASCADE
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
  `idfornecedor` int(10) unsigned NOT NULL,
  `qtdatual` int(10) unsigned NOT NULL,
  `qtdvendido` int(10) unsigned NOT NULL DEFAULT 0,
  `custo` decimal(10,2) NOT NULL,
  `venda` decimal(10,2) NOT NULL,
  `vendapromocional` decimal(10,2) NOT NULL,
  `lote` varchar(100) DEFAULT NULL,
  `vencimento` date NOT NULL,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idestoque`,`idprodutovariacao`,`idfornecedor`) USING BTREE,
  KEY `estoque_FKIndex1` (`idprodutovariacao`) USING BTREE,
  CONSTRAINT `estoque_ibfk_1` FOREIGN KEY (`idprodutovariacao`) REFERENCES `produtovariacao` (`idprodutovariacao`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estoque`
--

/*!40000 ALTER TABLE `estoque` DISABLE KEYS */;
INSERT INTO `estoque` (`idestoque`,`idprodutovariacao`,`idfornecedor`,`qtdatual`,`qtdvendido`,`custo`,`venda`,`vendapromocional`,`lote`,`vencimento`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (163,181,1,44,0,'0.00','0.00','0.00',NULL,'0000-00-00','2024-08-28 21:46:13','2024-08-28 21:46:13','A'),
 (164,182,1,44,0,'0.00','0.00','0.00',NULL,'0000-00-00','2024-08-28 21:46:13','2024-08-28 21:46:13','A'),
 (165,183,1,44,0,'0.00','0.00','0.00',NULL,'0000-00-00','2024-08-28 21:46:13','2024-08-28 21:46:13','A'),
 (166,184,1,44,0,'0.00','0.00','0.00',NULL,'0000-00-00','2024-08-28 21:46:13','2024-08-28 21:46:13','A'),
 (167,185,1,44,0,'0.00','0.00','0.00',NULL,'0000-00-00','2024-08-28 21:46:13','2024-08-28 21:46:13','A'),
 (168,186,1,44,0,'0.00','0.00','0.00',NULL,'0000-00-00','2024-08-28 21:46:13','2024-08-28 21:46:13','A'),
 (169,187,1,25,0,'27.00','44.00','39.90',NULL,'0000-00-00','2024-08-29 05:59:49','2024-08-29 05:59:49','A');
/*!40000 ALTER TABLE `estoque` ENABLE KEYS */;


--
-- Definition of table `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
CREATE TABLE `fornecedor` (
  `idfornecedor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idpessoa` int(10) unsigned NOT NULL,
  `descricao` text NOT NULL,
  `cadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` varchar(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idfornecedor`,`idpessoa`) USING BTREE,
  KEY `FK_fornecedor_1` (`idpessoa`),
  CONSTRAINT `FK_fornecedor_1` FOREIGN KEY (`idpessoa`) REFERENCES `pessoa` (`IdPessoa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fornecedor`
--

/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
INSERT INTO `fornecedor` (`idfornecedor`,`idpessoa`,`descricao`,`cadastro`,`ativo`) VALUES 
 (1,15,'melhor do melhorrr','2024-08-27 17:20:56','A'),
 (6,16,'sdfsadf','2024-08-27 17:20:56','A'),
 (11,24,'as bujigangas mais fofinhass','2024-08-27 17:20:56','A'),
 (42,55,'dssdfsdf','2024-08-28 01:01:34','A'),
 (43,56,'efwefwewef','2024-08-28 07:00:52','A'),
 (44,57,'wrerwerwerwerwe','2024-08-28 09:31:55','A'),
 (45,58,'qweqweqw','2024-08-28 09:40:48','A'),
 (46,59,'erterte','2024-08-28 09:41:15','A'),
 (47,60,'','2024-08-28 10:50:33','A');
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;


--
-- Definition of table `fotoproduto`
--

DROP TABLE IF EXISTS `fotoproduto`;
CREATE TABLE `fotoproduto` (
  `idfotoproduto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idproduto` int(10) unsigned NOT NULL,
  `foto` varchar(100) NOT NULL,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idfotoproduto`,`idproduto`) USING BTREE,
  KEY `FK_fotoproduto_1` (`idproduto`),
  CONSTRAINT `FK_fotoproduto_1` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`idproduto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`idpessoa`, `idgenero`) REFERENCES `pessoa` (`IdPessoa`, `IdGenero`) ON DELETE CASCADE ON UPDATE CASCADE,
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  CONSTRAINT `listaproduto_ibfk_1` FOREIGN KEY (`idpessoa`, `idgenero`) REFERENCES `pessoa` (`IdPessoa`, `IdGenero`) ON DELETE CASCADE ON UPDATE CASCADE
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nivelacesso`
--

/*!40000 ALTER TABLE `nivelacesso` DISABLE KEYS */;
INSERT INTO `nivelacesso` (`idnivelacesso`,`descricao`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,'Admin','2024-08-09 15:57:52','2024-08-09 15:57:52','A'),
 (2,'Cliente','2024-08-09 15:57:52','2024-08-09 15:57:52','A'),
 (3,'Colaborador','2024-08-09 15:57:52','2024-08-09 15:57:52','A');
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
-- Definition of table `notificacao`
--

DROP TABLE IF EXISTS `notificacao`;
CREATE TABLE `notificacao` (
  `idnotificacao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idpessoa` int(10) unsigned NOT NULL DEFAULT 0,
  `notificacao` varchar(45) NOT NULL,
  `link` varchar(45) DEFAULT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idnotificacao`,`idpessoa`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notificacao`
--

/*!40000 ALTER TABLE `notificacao` DISABLE KEYS */;
INSERT INTO `notificacao` (`idnotificacao`,`idpessoa`,`notificacao`,`link`,`data`) VALUES 
 (1,2,'Venda - Whay 4500 PREMIUM','venda/protocolo/11065','2023-12-05 12:14:01'),
 (3,2,'usuario deletado','usdflsjdf','2024-08-18 23:15:34'),
 (7,0,'fsfsdfsd','rr','2024-08-18 23:20:55'),
 (8,0,'dfsfdsf','wrewr','2024-08-18 23:20:55');
/*!40000 ALTER TABLE `notificacao` ENABLE KEYS */;


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
  CONSTRAINT `pagamento_ibfk_1` FOREIGN KEY (`idcarrinho`, `carrinho_idpessoa`) REFERENCES `carrinho` (`IdCarrinho`, `IdPessoa`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pagamento_ibfk_2` FOREIGN KEY (`idpagamentotipo`) REFERENCES `pagamentotipo` (`idpagamentotipo`),
  CONSTRAINT `pagamento_ibfk_3` FOREIGN KEY (`idcupom`) REFERENCES `cupom` (`IdCupom`)
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
  `IdGenero` int(10) unsigned NOT NULL DEFAULT 1,
  `idnivelacesso` int(10) unsigned NOT NULL,
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
  PRIMARY KEY (`IdPessoa`,`IdGenero`,`idnivelacesso`) USING BTREE,
  KEY `pessoa_FKIndex1` (`IdGenero`) USING BTREE,
  CONSTRAINT `pessoa_ibfk_1` FOREIGN KEY (`IdGenero`) REFERENCES `genero` (`IdGenero`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pessoa`
--

/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` (`IdPessoa`,`IdGenero`,`idnivelacesso`,`Foto`,`Nome`,`Sobrenome`,`Nascimento`,`Cpf`,`Cnpj`,`Telefone`,`Email`,`Senha`,`Tentativa`,`Tempo`,`Cadastro`,`Alteracao`,`Ativo`) VALUES 
 (1,1,1,'luciano.png','LUCIANO','PETTERSEN','1980-02-10','040.497.396-58',NULL,'(33)99109-9977','lcpyes@hotmail.com','$2y$10$TEj.kLxyF/iRhH0IHry13u02UQ82MsoATaIkCZQScf9HpwIB3kJEW',0,'2023-12-22 21:13:59','2023-12-05 12:14:01','2024-03-27 23:12:41','A'),
 (2,1,1,'fernando.jpg','Fernando','Salvino','1980-02-10','040.497.396-58',NULL,'(33)99109-9977','fernandodigitalarte@gmail.com','$2y$10$TEj.kLxyF/iRhH0IHry13u02UQ82MsoATaIkCZQScf9HpwIB3kJEW',0,NULL,'2024-03-28 01:27:06','2024-03-28 01:27:11','A'),
 (9,2,3,'','Allana','Macedo','1980-02-10','040.497.396-58',NULL,'(33)99109-9977','alanamacedo@gmail.com','$2y$10$TEj.kLxyF/iRhH0IHry13u02UQ82MsoATaIkCZQScf9HpwIB3kJEW',0,NULL,'2024-08-07 10:51:36','2024-08-07 10:51:36','A'),
 (15,1,2,NULL,'Emporium do Whay','EW LTDA','0000-00-00',NULL,'a4234234234','234234234','emporium@email.com','',0,NULL,'2024-08-08 16:06:52','2024-08-08 16:06:52','A'),
 (16,1,2,NULL,'Casa da Ração','Casa da Ração LTDA','0000-00-00',NULL,'86.565.558/0001-85','33-32765896','casadaracao@email.com','',0,NULL,'2024-08-08 17:37:48','2024-08-08 17:37:48','A'),
 (17,1,2,NULL,'Novo Fornecedor 3','sflajlf','0000-00-00',NULL,'fsjlfsd','fsjlfdj``','fsjlfksj','',0,NULL,'2024-08-08 18:16:27','2024-08-08 18:16:27','A'),
 (18,1,1,NULL,'Casa da Ração S','Casa da Ração LTDA','0000-00-00',NULL,'86.565.558/0001-85','33988522496','casadaracaos@email.com','',0,NULL,'2024-08-08 18:44:32','2024-08-08 18:44:32','A'),
 (22,1,0,NULL,'bitcoin','n','0000-00-00',NULL,'lin','ln','k','',0,NULL,'2024-08-08 20:16:54','2024-08-08 20:16:54','A'),
 (24,1,0,NULL,'Armarinho Real','Real Acabamentos LTDA','0000-00-00',NULL,'315888689/0001-85','33246898468','armarinho@email.com','',0,NULL,'2024-08-09 00:25:29','2024-08-09 00:25:29','A'),
 (25,1,0,NULL,'Ray Volt','RayVolte Suplementos LTDa','0000-00-00',NULL,'2559495555/0001-45','86848234234','email@email.com','',0,NULL,'2024-08-09 00:36:51','2024-08-09 00:36:51','A'),
 (55,1,0,NULL,'Fernando','Lacerda','0000-00-00',NULL,'86.565.558/0001-85','33988522496','fernandosalvinogv@hotmail.com','',0,NULL,'2024-08-28 01:01:34','2024-08-28 01:01:34','A'),
 (56,1,0,NULL,'sdfwe','wefwe','0000-00-00',NULL,'fwefw','wefwf','fwfw','',0,NULL,'2024-08-28 07:00:52','2024-08-28 07:00:52','A'),
 (57,1,0,NULL,'Luciano Avelar','lucianoLTDa','0000-00-00',NULL,'86.565.5werwerwe58','33988522496','fernandosalvinogv@hotmail.com','',0,NULL,'2024-08-28 09:31:55','2024-08-28 09:31:55','A'),
 (58,1,0,NULL,'Fernando','Lacerda','0000-00-00',NULL,'qweqweqew','33988522496','fernandosalvinogv@hotmail.com','',0,NULL,'2024-08-28 09:40:48','2024-08-28 09:40:48','A'),
 (59,1,0,NULL,'Fernando','Lacerda','0000-00-00',NULL,'errerete','33988522496','fernandosalvinogv@hotmail.com','',0,NULL,'2024-08-28 09:41:15','2024-08-28 09:41:15','A'),
 (60,1,0,NULL,'iiiiiiiiiiiiiiiiiii','LACERDA','0000-00-00',NULL,'retret','33988368747','fernandodigitalarte@gmail.com','',0,NULL,'2024-08-28 10:50:33','2024-08-28 10:50:33','A');
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;


--
-- Definition of table `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `idproduto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcategoria` int(10) unsigned NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `video` varchar(45) DEFAULT NULL,
  `produto` varchar(255) NOT NULL,
  `descricao` longtext NOT NULL,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idproduto`,`idcategoria`) USING BTREE,
  KEY `FK_produto_categoria` (`idcategoria`) USING BTREE,
  CONSTRAINT `FK_produto_categoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`IdCategoria`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produto`
--

/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`idproduto`,`idcategoria`,`foto`,`video`,`produto`,`descricao`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (144,51,'D_NQ_NP_810625-MLA52733606403_122022-O.jpg','https://www.youtube.com/watch?v=DSjVJWi67V4','Whay Proteim Mega master blaster','<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Gold Standard 100% Whey é o Whey Protein mais vendido e premiado do mundo, elaborado com o mais alto grau de pureza e padrão de qualidade. Utiliza como fonte primária de proteína a proteína isolada do soro de leite, a forma mais pura de Whey Protein que existe. Além de ser rico em aminoácidos essenciais como o BCAA.</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Marca: Optimum Nutrition</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Glúten: Não Contém</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Lactose: Contém</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Tipo: Proteínas Concentradas e Blends</span>','2024-08-28 21:46:13','2024-08-28 21:46:13','A'),
 (145,2,'product01.jpg','https://www.youtube.com/watch?v=DSjVJWi67V4','Whey MAX','','2024-08-29 05:59:49','2024-08-29 05:59:49','A');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;


--
-- Definition of table `produtovariacao`
--

DROP TABLE IF EXISTS `produtovariacao`;
CREATE TABLE `produtovariacao` (
  `idprodutovariacao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idproduto` int(10) unsigned NOT NULL,
  `idtipovariacao` varchar(8) DEFAULT NULL,
  `detalhe` longtext DEFAULT NULL,
  `altura` decimal(10,2) NOT NULL,
  `largura` decimal(10,2) NOT NULL,
  `comprimento` decimal(10,2) NOT NULL,
  `peso` decimal(10,2) NOT NULL,
  `unidadepeso` varchar(10) NOT NULL,
  `codigosku` varchar(45) DEFAULT NULL,
  `codigobarras` varchar(14) DEFAULT NULL,
  `destaque` char(1) DEFAULT 'N',
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idprodutovariacao`,`idproduto`) USING BTREE,
  KEY `produtovariacao_FKIndex1` (`idproduto`) USING BTREE,
  CONSTRAINT `produtovariacao_ibfk_1` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`idproduto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produtovariacao`
--

/*!40000 ALTER TABLE `produtovariacao` DISABLE KEYS */;
INSERT INTO `produtovariacao` (`idprodutovariacao`,`idproduto`,`idtipovariacao`,`detalhe`,`altura`,`largura`,`comprimento`,`peso`,`unidadepeso`,`codigosku`,`codigobarras`,`destaque`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (181,144,'6,19','<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Marca: Optimum Nutrition</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Glúten: Não Contém</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Lactose: Contém</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Tipo: Proteínas Concentradas e Blends</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">SUGESTÃO DE USO:</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Adicione uma colher medida de Gold Standard 100% Whey a 180 - 200ml de água ou da sua bebida favorita e misture por 30 segundos ou até obter uma consistência homogênea. Para obter resultados, consuma o seu shake de 30 a 60 minutos após o treino ou como um lanche em sua dieta equilibrada e rica em proteínas.</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">O QUE VEM INCLUSO?</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">1 Gold Standard Whey Protein 2,27kg Optimum Nutrition</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Aviso legal</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">• Idade mínima recomendada: 19 anos.</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">• Consumir junto com alimentos para facilitar sua assimilação.</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">• Este produto é um suplemento dietético, não um medicamento. Suplementa dietas insuficientes. Consulte o seu médico e/ou farmacêutico.</span>\r\n                                ','15.00','22.00','33.00','400.00','','CRT-011-05258','856826526-23','N','2024-08-28 21:46:13','2024-08-28 21:46:13','A'),
 (182,144,'6,20','<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Marca: Optimum Nutrition</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Glúten: Não Contém</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Lactose: Contém</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Tipo: Proteínas Concentradas e Blends</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">SUGESTÃO DE USO:</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Adicione uma colher medida de Gold Standard 100% Whey a 180 - 200ml de água ou da sua bebida favorita e misture por 30 segundos ou até obter uma consistência homogênea. Para obter resultados, consuma o seu shake de 30 a 60 minutos após o treino ou como um lanche em sua dieta equilibrada e rica em proteínas.</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">O QUE VEM INCLUSO?</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">1 Gold Standard Whey Protein 2,27kg Optimum Nutrition</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Aviso legal</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">• Idade mínima recomendada: 19 anos.</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">• Consumir junto com alimentos para facilitar sua assimilação.</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">• Este produto é um suplemento dietético, não um medicamento. Suplementa dietas insuficientes. Consulte o seu médico e/ou farmacêutico.</span>\r\n                                ','15.00','22.00','33.00','400.00','','CRT-011-05258','856826526-23','N','2024-08-28 21:46:13','2024-08-28 21:46:13','A'),
 (183,144,'6,21','<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Marca: Optimum Nutrition</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Glúten: Não Contém</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Lactose: Contém</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Tipo: Proteínas Concentradas e Blends</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">SUGESTÃO DE USO:</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Adicione uma colher medida de Gold Standard 100% Whey a 180 - 200ml de água ou da sua bebida favorita e misture por 30 segundos ou até obter uma consistência homogênea. Para obter resultados, consuma o seu shake de 30 a 60 minutos após o treino ou como um lanche em sua dieta equilibrada e rica em proteínas.</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">O QUE VEM INCLUSO?</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">1 Gold Standard Whey Protein 2,27kg Optimum Nutrition</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Aviso legal</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">• Idade mínima recomendada: 19 anos.</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">• Consumir junto com alimentos para facilitar sua assimilação.</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">• Este produto é um suplemento dietético, não um medicamento. Suplementa dietas insuficientes. Consulte o seu médico e/ou farmacêutico.</span>\r\n                                ','15.00','22.00','33.00','400.00','','CRT-011-05258','856826526-23','N','2024-08-28 21:46:13','2024-08-28 21:46:13','A'),
 (184,144,'7,19','<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Marca: Optimum Nutrition</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Glúten: Não Contém</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Lactose: Contém</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Tipo: Proteínas Concentradas e Blends</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">SUGESTÃO DE USO:</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Adicione uma colher medida de Gold Standard 100% Whey a 180 - 200ml de água ou da sua bebida favorita e misture por 30 segundos ou até obter uma consistência homogênea. Para obter resultados, consuma o seu shake de 30 a 60 minutos após o treino ou como um lanche em sua dieta equilibrada e rica em proteínas.</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">O QUE VEM INCLUSO?</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">1 Gold Standard Whey Protein 2,27kg Optimum Nutrition</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Aviso legal</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">• Idade mínima recomendada: 19 anos.</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">• Consumir junto com alimentos para facilitar sua assimilação.</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">• Este produto é um suplemento dietético, não um medicamento. Suplementa dietas insuficientes. Consulte o seu médico e/ou farmacêutico.</span>\r\n                                ','15.00','22.00','33.00','400.00','','CRT-011-05258','856826526-23','N','2024-08-28 21:46:13','2024-08-28 21:46:13','A'),
 (185,144,'7,20','<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Marca: Optimum Nutrition</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Glúten: Não Contém</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Lactose: Contém</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Tipo: Proteínas Concentradas e Blends</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">SUGESTÃO DE USO:</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Adicione uma colher medida de Gold Standard 100% Whey a 180 - 200ml de água ou da sua bebida favorita e misture por 30 segundos ou até obter uma consistência homogênea. Para obter resultados, consuma o seu shake de 30 a 60 minutos após o treino ou como um lanche em sua dieta equilibrada e rica em proteínas.</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">O QUE VEM INCLUSO?</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">1 Gold Standard Whey Protein 2,27kg Optimum Nutrition</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Aviso legal</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">• Idade mínima recomendada: 19 anos.</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">• Consumir junto com alimentos para facilitar sua assimilação.</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">• Este produto é um suplemento dietético, não um medicamento. Suplementa dietas insuficientes. Consulte o seu médico e/ou farmacêutico.</span>\r\n                                ','15.00','22.00','33.00','400.00','','CRT-011-05258','856826526-23','N','2024-08-28 21:46:13','2024-08-28 21:46:13','A'),
 (186,144,'7,21','<span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Marca: Optimum Nutrition</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Glúten: Não Contém</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Lactose: Contém</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Tipo: Proteínas Concentradas e Blends</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">SUGESTÃO DE USO:</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Adicione uma colher medida de Gold Standard 100% Whey a 180 - 200ml de água ou da sua bebida favorita e misture por 30 segundos ou até obter uma consistência homogênea. Para obter resultados, consuma o seu shake de 30 a 60 minutos após o treino ou como um lanche em sua dieta equilibrada e rica em proteínas.</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">O QUE VEM INCLUSO?</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">1 Gold Standard Whey Protein 2,27kg Optimum Nutrition</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">Aviso legal</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">• Idade mínima recomendada: 19 anos.</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">• Consumir junto com alimentos para facilitar sua assimilação.</span><br style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Proxima Nova&quot;, -apple-system, Roboto, Arial, sans-serif; font-size: 20px;\">• Este produto é um suplemento dietético, não um medicamento. Suplementa dietas insuficientes. Consulte o seu médico e/ou farmacêutico.</span>\r\n                                ','15.00','22.00','33.00','400.00','','CRT-011-05258','856826526-23','N','2024-08-28 21:46:13','2024-08-28 21:46:13','A'),
 (187,145,NULL,'','15.00','22.00','33.00','400.00','','','','N','2024-08-29 05:59:49','2024-08-29 05:59:49','A');
/*!40000 ALTER TABLE `produtovariacao` ENABLE KEYS */;


--
-- Definition of table `tipovariacao`
--

DROP TABLE IF EXISTS `tipovariacao`;
CREATE TABLE `tipovariacao` (
  `idtipovariacao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pai` int(10) unsigned NOT NULL DEFAULT 0,
  `variacao` varchar(45) NOT NULL,
  `criacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idtipovariacao`,`pai`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipovariacao`
--

/*!40000 ALTER TABLE `tipovariacao` DISABLE KEYS */;
INSERT INTO `tipovariacao` (`idtipovariacao`,`pai`,`variacao`,`criacao`) VALUES 
 (5,0,'Peso','2024-08-19 18:44:49'),
 (6,5,'2 kg','2024-08-19 18:45:14'),
 (7,5,'4 kg','2024-08-21 17:56:51'),
 (8,5,'6 kg','2024-08-21 17:56:51'),
 (9,0,'Tamanho','2024-08-19 18:45:34'),
 (10,9,'P','2024-08-19 18:47:38'),
 (11,9,'M','2024-08-19 18:47:38'),
 (12,9,'G','2024-08-19 18:47:38'),
 (13,9,'GG','2024-08-19 18:47:38'),
 (14,0,'Cor','2024-08-19 18:47:55'),
 (15,14,'Azul','2024-08-19 18:48:27'),
 (16,14,'Amarelo','2024-08-19 18:48:38'),
 (17,14,'Vermelho','2024-08-19 18:48:38'),
 (18,0,'Sabor','2024-08-22 00:04:33'),
 (19,18,'Morango','2024-08-22 00:05:25'),
 (20,18,'Chocolate','2024-08-22 00:05:25'),
 (21,18,'Baunilha','2024-08-22 00:05:25');
/*!40000 ALTER TABLE `tipovariacao` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
