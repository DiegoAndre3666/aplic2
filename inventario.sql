-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Ago-2019 às 01:46
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dpto`
--

CREATE TABLE `dpto` (
  `id` int(11) NOT NULL,
  `Nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento`
--

CREATE TABLE `equipamento` (
  `id` int(11) NOT NULL,
  `nome_host` varchar(45) DEFAULT NULL,
  `ip` varchar(30) DEFAULT NULL,
  `processador` varchar(50) DEFAULT NULL,
  `memoria` varchar(40) DEFAULT NULL,
  `patrimonial` varchar(11) NOT NULL,
  `dominio` varchar(4) DEFAULT NULL,
  `status` varchar(40) NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `descricao` varchar(100) NOT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `servicetag` varchar(100) DEFAULT NULL,
  `NF` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `equipamento`
--

INSERT INTO `equipamento` (`id`, `nome_host`, `ip`, `processador`, `memoria`, `patrimonial`, `dominio`, `status`, `iduser`, `descricao`, `marca`, `modelo`, `servicetag`, `NF`) VALUES
(1, 'ti08', '192.168.0.154', 'Intel Core I3', '4GB', '0322', 's', 'ativo', NULL, 'Diego', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `software`
--

CREATE TABLE `software` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `chave` varchar(45) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `volume` enum('s','n') NOT NULL,
  `quantidade` int(100) NOT NULL,
  `tiposoftware` int(1) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `software`
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
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `acesso` int(2) DEFAULT NULL,
  `departamento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`, `acesso`, `departamento`) VALUES
(1, 'Diego', '123', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dpto`
--
ALTER TABLE `dpto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipamento`
--
ALTER TABLE `equipamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dpto`
--
ALTER TABLE `dpto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipamento`
--
ALTER TABLE `equipamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
