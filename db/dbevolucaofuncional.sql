-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 12-Nov-2018 às 03:23
-- Versão do servidor: 5.7.23
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbevolucaofuncional`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbarquivo`
--

DROP TABLE IF EXISTS `tbarquivo`;
CREATE TABLE IF NOT EXISTS `tbarquivo` (
  `id_arquivo` int(11) NOT NULL,
  `id_solicitacao_arquivo` int(11) NOT NULL,
  `pontuacao_arquivo` int(11) NOT NULL,
  `pontuacao_final_arquivo` int (11) NOT NULL,
  `tipo_arquivo` varchar(80) NOT NULL,
  `nome_arquivo` varchar(100) NOT NULL,
  `descricao_arquivo` varchar(300) NOT NULL,
  `status_exclusao` tinyint (1) NOT NULL,
  `comentario_arquivo` varchar (200) NOT NULL,
  PRIMARY KEY (`id_arquivo`),
  CONSTRAINT `fk_solicitacao` FOREIGN KEY (`id_solicitacao_arquivo`) REFERENCES `tbsolicitacao` (`id_solicitacao`)
) ENGINE=innodb DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbsolicitacao`
--

DROP TABLE IF EXISTS `tbsolicitacao`;
CREATE TABLE IF NOT EXISTS `tbsolicitacao` (
  `id_solicitacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario_solicitacao` int(11) NOT NULL,
  `data_solicitacao` date NOT NULL,
  `pontuacao_total_solicitacao` int(11) NOT NULL,
  `status_exclusao` tinyint (1) NOT NULL,
  `status_solicitacao` varchar(50) NOT NULL,
  `pontuacao_final_solicitacao` int(11) NOT NULL,
  PRIMARY KEY (`id_solicitacao`),
  CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario_solicitacao`) REFERENCES `tbusuario` (`id_usuario`)
) ENGINE=innodb DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

DROP TABLE IF EXISTS `tbusuario`;
CREATE TABLE IF NOT EXISTS `tbusuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(100) NOT NULL,
  `sobrenome_usuario` varchar(200) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `login_usuario` varchar(20) NOT NULL,
  `senha_usuario` varchar(100) NOT NULL,
  `registro_usuario` varchar(100) NOT NULL,
  `status_exclusao` tinyint (1) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=innodb DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
