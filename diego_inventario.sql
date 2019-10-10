-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Out-2019 às 04:06
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
-- Database: `diego_inventario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `campoform`
--

CREATE TABLE `campoform` (
  `idtipo` int(11) NOT NULL,
  `campo` varchar(30) NOT NULL,
  `nomecampo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `campoform`
--

INSERT INTO `campoform` (`idtipo`, `campo`, `nomecampo`) VALUES
(0, '', ''),
(1, 'descricao', 'Descrição'),
(1, 'dominio', 'Domínio'),
(1, 'ip', 'IP'),
(1, 'marca', 'Marca'),
(1, 'memoria', 'Memória'),
(1, 'modelo', 'Modelo'),
(1, 'nome_host', 'Nome Host'),
(1, 'patrimonial', 'Patrimonial'),
(1, 'processador', 'Processador'),
(1, 'serial', 'Serial'),
(1, 'servicetag', 'Service Tag'),
(1, 'status', 'Status'),
(1, 'tag', 'TAG'),
(1, 'tamanhoarmazenamento', 'Tamanho do Armazenamento'),
(1, 'tipoarmazenamento', 'Tipo de Armazenamento'),
(1, 'Ventrada', 'Voltagem de Entrada'),
(2, 'descricao', 'Descrição'),
(2, 'ip', 'IP'),
(2, 'marca', 'Marca'),
(2, 'modelo', 'Modelo'),
(2, 'proprietario', 'Proprietário'),
(2, 'serial', 'Serial'),
(2, 'status', 'Status'),
(2, 'Ventrada', 'Voltagem de Entrada'),
(3, 'descricao', 'Descrição'),
(3, 'ip', 'IP'),
(3, 'marca', 'Marca'),
(3, 'modelo', 'Modelo'),
(3, 'nome_host', 'Nome Switch'),
(3, 'portas', 'Portas'),
(3, 'servicetag', 'Service Tag'),
(3, 'status', 'Status'),
(3, 'Ventrada', 'Voltagem de Entrada'),
(4, 'descricao', 'Descrição'),
(4, 'DTcompra', 'Data da Compra'),
(4, 'DTinstalacao', 'Data da Instalação'),
(4, 'DTultManut', 'Data da Última Manutenção'),
(4, 'ip', 'IP'),
(4, 'KVA', 'KVA'),
(4, 'marca', 'Marca'),
(4, 'modelo', 'Modelo'),
(4, 'nome_host', 'Nome_Host'),
(4, 'serial', 'Serial'),
(4, 'status', 'Status'),
(4, 'Ventrada', 'Voltagem de Entrada'),
(4, 'Vsaida', 'Voltagem de Saída'),
(6, 'chaveRSA', 'Chave RSA'),
(6, 'ip', 'IP'),
(6, 'marca', 'Marca'),
(6, 'modelo', 'Modelo'),
(6, 'patrimonial', 'Patrimonial'),
(6, 'serial', 'Número de Serie'),
(6, 'status', 'Status');

-- --------------------------------------------------------

--
-- Estrutura da tabela `camposoft`
--

CREATE TABLE `camposoft` (
  `idtiposoftware` int(11) NOT NULL,
  `camposoft` varchar(45) NOT NULL,
  `campoformsoft` varchar(45) DEFAULT NULL,
  `idorder` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `camposoft`
--

INSERT INTO `camposoft` (`idtiposoftware`, `camposoft`, `campoformsoft`, `idorder`) VALUES
(1, 'chave', 'Chave', 3),
(1, 'descricao', 'Descrição', 2),
(1, 'nome', 'Nome', 1),
(1, 'nome_host', 'Nome Host', 5),
(1, 'qtd', 'Quantidade', 7),
(1, 'status', 'Status', 4),
(1, 'volume', 'Volume', 6),
(2, 'chave', 'Chave', 3),
(2, 'descricao', 'Descrição', 2),
(2, 'nome', 'Nome', 1),
(2, 'nome_host', 'Nome Host', 5),
(2, 'qtd', 'Quantidade', 7),
(2, 'status', 'Status', 4),
(2, 'volume', 'Volume', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dpto`
--

CREATE TABLE `dpto` (
  `id` int(11) NOT NULL,
  `Nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dpto`
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
-- Estrutura da tabela `equipamento`
--

CREATE TABLE `equipamento` (
  `id` int(11) NOT NULL,
  `nome_host` varchar(45) DEFAULT NULL,
  `ip` varchar(30) DEFAULT NULL,
  `processador` varchar(50) DEFAULT NULL,
  `memoria` varchar(40) DEFAULT NULL,
  `patrimonial` varchar(11) DEFAULT NULL,
  `dominio` varchar(4) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `servicetag` varchar(100) DEFAULT NULL,
  `NF` int(100) DEFAULT NULL,
  `serial` int(100) DEFAULT NULL,
  `idtipo` int(11) DEFAULT NULL,
  `portas` int(20) DEFAULT NULL,
  `iddpto` int(11) DEFAULT NULL,
  `tipoarmazenamento` varchar(30) DEFAULT NULL,
  `tamanhoarmazenamento` varchar(30) DEFAULT NULL,
  `KVA` int(11) DEFAULT NULL,
  `Ventrada` varchar(25) DEFAULT NULL,
  `Vsaida` varchar(25) DEFAULT NULL,
  `DTcompra` date DEFAULT NULL,
  `DTinstalacao` date DEFAULT NULL,
  `DTultManut` date DEFAULT NULL,
  `chaveRSA` int(11) DEFAULT NULL,
  `tag` int(7) DEFAULT NULL,
  `proprietario` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `equipamento`
--

INSERT INTO `equipamento` (`id`, `nome_host`, `ip`, `processador`, `memoria`, `patrimonial`, `dominio`, `status`, `iduser`, `descricao`, `marca`, `modelo`, `servicetag`, `NF`, `serial`, `idtipo`, `portas`, `iddpto`, `tipoarmazenamento`, `tamanhoarmazenamento`, `KVA`, `Ventrada`, `Vsaida`, `DTcompra`, `DTinstalacao`, `DTultManut`, `chaveRSA`, `tag`, `proprietario`) VALUES
(1, 'TI03', '192.168.0.154', 'Intel Core I5', '8 GB', '0', 'Sim', 'Ativo', 1, 'Diego', 'Máquina Montada', 'SYMA', '0', NULL, 0, 1, NULL, 1, 'SSD', '240', 0, 'Bivolt', NULL, '0000-00-00', '0000-00-00', '0000-00-00', 0, NULL, NULL),
(3, 'TI02', '192.168.0.157', 'Intel Core I5', '8 GB', '0', 'Sim', 'Ativo', NULL, 'Máquina do Danillo', 'Maquina Montada', 'SYMA', '0', 0, 0, 1, 0, 1, 'SSD', '240', NULL, 'Bivolt', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'TI04', '192.168.0.152', 'Intel Core I5', '8 GB', '0', 'Sim', 'Ativo', NULL, 'Máquina do Thiago', 'Maquina Montada', 'SYMA', '0', 0, 0, 1, 0, 1, 'SSD', '240', NULL, 'Bivolt', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '', 'Local', '', '', '', '', 'Ativo', NULL, 'Balança', 'Samsung', 'M4020', '', 0, 0, 2, 0, 2, '', '', 0, '110', '', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 'Top Toner');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamentosoftware`
--

CREATE TABLE `equipamentosoftware` (
  `id` int(11) NOT NULL,
  `idequipamento` int(11) NOT NULL,
  `idsoftware` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `equipamentosoftware`
--

INSERT INTO `equipamentosoftware` (`id`, `idequipamento`, `idsoftware`) VALUES
(1, 1, 3),
(2, 1, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `software`
--

CREATE TABLE `software` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `chave` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `qtd` int(11) DEFAULT NULL,
  `volume` varchar(45) DEFAULT NULL,
  `idtiposoftware` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `nome_host` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`id`, `nome`) VALUES
(1, 'Computador'),
(2, 'Impressora'),
(3, 'Swhitch'),
(4, 'NoBreack'),
(5, 'DVR'),
(6, 'Relógio Ponto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tiposoftware`
--

CREATE TABLE `tiposoftware` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tiposoftware`
--

INSERT INTO `tiposoftware` (`id`, `nome`, `descricao`) VALUES
(1, 'Windowns', NULL),
(2, 'Office', NULL),
(3, 'Linux', NULL),
(4, 'Server', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `ramal` int(5) NOT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `acesso` int(2) DEFAULT NULL,
  `iddpto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `ramal`, `senha`, `acesso`, `iddpto`) VALUES
(1, 'Diego Andre', 'diego.possidonio@frangogranjeiro.com.br', 288, '0', 1, 1),
(2, 'Danillo', 'danillo.sales@frangogranjeiro.com.br', 288, '0', 1, 1),
(4, 'Pagani', 'thiago.pagani@frangogranjeiro.com.br', 287, '0', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campoform`
--
ALTER TABLE `campoform`
  ADD PRIMARY KEY (`idtipo`,`campo`);

--
-- Indexes for table `camposoft`
--
ALTER TABLE `camposoft`
  ADD PRIMARY KEY (`idtiposoftware`,`camposoft`);

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
-- Indexes for table `equipamentosoftware`
--
ALTER TABLE `equipamentosoftware`
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
-- Indexes for table `tiposoftware`
--
ALTER TABLE `tiposoftware`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `equipamento`
--
ALTER TABLE `equipamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `equipamentosoftware`
--
ALTER TABLE `equipamentosoftware`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tiposoftware`
--
ALTER TABLE `tiposoftware`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
