-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 30/08/2019 às 13:26
-- Versão do servidor: 5.5.62-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `diego_inventario`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `dpto`
--

CREATE TABLE IF NOT EXISTS `dpto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Fazendo dump de dados para tabela `dpto`
--

INSERT INTO `dpto` (`id`, `Nome`) VALUES
(1, 'TI - ADM'),
(2, 'Financeiro'),
(3, 'compras'),
(4, 'RH'),
(5, 'Logistica'),
(6, 'Comercial'),
(7, 'Controladoria'),
(8, 'Seguraça do trabalho'),
(9, 'Enfermaria'),
(10, 'Industria'),
(11, 'Almoxarifado'),
(12, 'Recepção'),
(13, 'Balança'),
(14, 'Portaria'),
(15, 'Cerealista-EXT'),
(16, 'Cerealista-ADM'),
(17, 'Manutenção'),
(18, 'TI-Ind'),
(19, 'TI - Almox');

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipamento`
--

CREATE TABLE IF NOT EXISTS `equipamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_host` varchar(45) DEFAULT NULL,
  `ip` varchar(30) DEFAULT NULL,
  `processador` varchar(50) DEFAULT NULL,
  `memoria` varchar(40) DEFAULT NULL,
  `patrimonial` varchar(11) DEFAULT NULL,
  `dominio` varchar(4) DEFAULT NULL,
  `status` varchar(40) NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `marca` varchar(45) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `servicetag` varchar(100) DEFAULT NULL,
  `NF` int(100) DEFAULT NULL,
  `serial` int(100) NOT NULL,
  `idtipo` int(11) NOT NULL,
  `Portas` int(20) DEFAULT NULL,
  `iddpto` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idtipo` (`idtipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `equipamento`
--

INSERT INTO `equipamento` (`id`, `nome_host`, `ip`, `processador`, `memoria`, `patrimonial`, `dominio`, `status`, `iduser`, `descricao`, `marca`, `modelo`, `servicetag`, `NF`, `serial`, `idtipo`, `Portas`, `iddpto`) VALUES
(1, 'ti08', '192.168.0.154', 'Intel Core I3', '4GB', '0322', 's', 'ativo', 1, 'Diego', 'Dell', 'Optiplex 3010', NULL, NULL, 0, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipamentosoftware`
--

CREATE TABLE IF NOT EXISTS `equipamentosoftware` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idequipamento` int(11) NOT NULL,
  `idsoftware` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `equipamentosoftware`
--

INSERT INTO `equipamentosoftware` (`id`, `idequipamento`, `idsoftware`) VALUES
(1, 1, 3),
(2, 1, 11);

-- --------------------------------------------------------

--
-- Estrutura para tabela `software`
--

CREATE TABLE IF NOT EXISTS `software` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `chave` varchar(45) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `volume` enum('s','n') NOT NULL,
  `quantidade` int(100) NOT NULL,
  `tiposoftware` int(1) NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Fazendo dump de dados para tabela `software`
--

INSERT INTO `software` (`id`, `nome`, `chave`, `status`, `volume`, `quantidade`, `tiposoftware`, `descricao`) VALUES
(1, NULL, NULL, '', '', 0, 1, 'Windows 7 pro x64'),
(2, NULL, NULL, '', '', 0, 1, 'Windows 7 pro x86'),
(3, NULL, NULL, '', '', 0, 1, 'Windows 8.0 pro x64'),
(4, NULL, NULL, '', '', 0, 1, 'Windows 8.1 pro x64'),
(5, NULL, NULL, '', '', 0, 1, 'Windows 10 pro x64'),
(6, NULL, NULL, '', '', 0, 1, 'Windows 10 pro x86'),
(7, NULL, NULL, '', '', 0, 1, 'Windows 8.0 pro x86'),
(8, NULL, NULL, '', '', 0, 1, 'Windows 8.1 pro x86'),
(9, NULL, NULL, '', '', 0, 2, 'Home and Businness 2013'),
(10, NULL, NULL, '', '', 0, 2, 'Home and Businness 2010'),
(11, NULL, NULL, '', '', 0, 2, 'Standard 2013'),
(12, NULL, NULL, '', '', 0, 2, 'Office 365 Pro Plus');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Fazendo dump de dados para tabela `tipo`
--

INSERT INTO `tipo` (`id`, `nome`) VALUES
(1, 'Computador'),
(2, 'impressora'),
(3, 'Swhitch'),
(4, 'NoBrack'),
(5, 'DVR');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `acesso` int(2) DEFAULT NULL,
  `iddpto` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`, `acesso`, `iddpto`) VALUES
(1, 'Diego', '123', 1, 1);

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `equipamento`
--
ALTER TABLE `equipamento`
  ADD CONSTRAINT `equipamento_ibfk_1` FOREIGN KEY (`idtipo`) REFERENCES `equipamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
