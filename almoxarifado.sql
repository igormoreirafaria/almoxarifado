-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 04, 2019 at 12:04 AM
-- Server version: 5.7.26-0ubuntu0.19.04.1
-- PHP Version: 7.2.19-0ubuntu0.19.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `almoxarifado`
--

-- --------------------------------------------------------

--
-- Table structure for table `CONTEM`
--

CREATE TABLE `CONTEM` (
  `receptaculo` int(11) NOT NULL,
  `corredor` int(11) NOT NULL,
  `pecas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `CORREDOR`
--

CREATE TABLE `CORREDOR` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CORREDOR`
--

INSERT INTO `CORREDOR` (`id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `FUNCIONARIOS`
--

CREATE TABLE `FUNCIONARIOS` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `login` varchar(32) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `setor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `FUNCIONARIOS`
--

INSERT INTO `FUNCIONARIOS` (`cpf`, `nome`, `login`, `senha`, `setor`) VALUES
('05279894605', 'Lucas Marchisotti', 'lmarchisotti', 'senhapadrao', 3),
('08900785648', 'Igor Moreira Faria', 'igor', 'senhapadrao', 1),
('32321212312', 'Antonio', 'tonim', 'senhapadrao', 2);

-- --------------------------------------------------------

--
-- Table structure for table `PECAS`
--

CREATE TABLE `PECAS` (
  `id` int(11) NOT NULL,
  `upc` varchar(32) NOT NULL,
  `descricao` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PECAS`
--

INSERT INTO `PECAS` (`id`, `upc`, `descricao`) VALUES
(1, 'BRC001', 'Broca de videa n5'),
(2, 'PAR001', 'Parafuso com bucha 8'),
(3, 'ROS001', 'Rosca sextavada 12'),
(4, 'PAR002', 'Parafuso para madeira 25mm'),
(5, 'PAR003', 'Parabolt de aço 10cm'),
(6, 'QUI001', 'Desmoldante para formas'),
(7, 'QUI002', 'Aguarraz 1L'),
(8, 'QUI003', 'Tinner 1L'),
(9, 'QUI004', 'Aditivo retardador de pega para concreto'),
(10, 'PIN001', 'Tinta fosca branco gelo 18L'),
(11, 'LIM001', 'Vassoura Piassava');

-- --------------------------------------------------------

--
-- Table structure for table `RECEPTACULO`
--

CREATE TABLE `RECEPTACULO` (
  `id` int(11) NOT NULL,
  `codigo` varchar(256) NOT NULL,
  `corredor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `SETOR`
--

CREATE TABLE `SETOR` (
  `id` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `gerente` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SETOR`
--

INSERT INTO `SETOR` (`id`, `nome`, `gerente`) VALUES
(1, 'Recepção', '08900785648'),
(2, 'Compras', '32321212312'),
(3, 'Saída', '05279894605');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CONTEM`
--
ALTER TABLE `CONTEM`
  ADD KEY `receptaculo` (`receptaculo`),
  ADD KEY `corredor` (`corredor`),
  ADD KEY `pecas` (`pecas`);

--
-- Indexes for table `CORREDOR`
--
ALTER TABLE `CORREDOR`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `FUNCIONARIOS`
--
ALTER TABLE `FUNCIONARIOS`
  ADD PRIMARY KEY (`cpf`),
  ADD KEY `setor` (`setor`);

--
-- Indexes for table `PECAS`
--
ALTER TABLE `PECAS`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `RECEPTACULO`
--
ALTER TABLE `RECEPTACULO`
  ADD PRIMARY KEY (`id`),
  ADD KEY `corredor` (`corredor`);

--
-- Indexes for table `SETOR`
--
ALTER TABLE `SETOR`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gerente` (`gerente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CORREDOR`
--
ALTER TABLE `CORREDOR`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `PECAS`
--
ALTER TABLE `PECAS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `RECEPTACULO`
--
ALTER TABLE `RECEPTACULO`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `SETOR`
--
ALTER TABLE `SETOR`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `FUNCIONARIOS`
--
ALTER TABLE `FUNCIONARIOS`
  ADD CONSTRAINT `FUNCIONARIOS_ibfk_1` FOREIGN KEY (`setor`) REFERENCES `SETOR` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `SETOR`
--
ALTER TABLE `SETOR`
  ADD CONSTRAINT `SETOR_ibfk_1` FOREIGN KEY (`gerente`) REFERENCES `FUNCIONARIOS` (`cpf`) ON DELETE SET NULL ON UPDATE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;