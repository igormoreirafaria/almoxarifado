-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 02, 2019 at 03:56 PM
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
  `cpf` varchar(256) NOT NULL,
  `nome` varchar(256) NOT NULL,
  `login` varchar(256) NOT NULL,
  `senha` varchar(256) NOT NULL,
  `setor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `FUNCIONARIOS`
--

INSERT INTO `FUNCIONARIOS` (`cpf`, `nome`, `login`, `senha`, `setor`) VALUES
('08900785648', 'Igor Moreira', 'igor', 'senhapadrao', 1),
('12345678998', 'Matheus Reis', 'matheus', 'senhapadrao', 2),
('32165498778', 'Luiz Felipe Fonseca', 'luzim', 'senhapadrao', 1),
('45612378978', 'Antônio Alves', 'tonim', 'senhapadrao', 3),
('75915324621', 'Valney Faria', 'valney', 'senhapadrao', 1);

-- --------------------------------------------------------

--
-- Table structure for table `PECAS`
--

CREATE TABLE `PECAS` (
  `id` int(11) NOT NULL,
  `upc` varchar(256) NOT NULL,
  `descricao` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `nome` varchar(256) NOT NULL,
  `gerente` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SETOR`
--

INSERT INTO `SETOR` (`id`, `nome`, `gerente`) VALUES
(1, 'Recepção', '08900785648'),
(2, 'Compras', '12345678998'),
(3, 'Saída', '45612378978');

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
  ADD PRIMARY KEY (`cpf`);

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CORREDOR`
--
ALTER TABLE `CORREDOR`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `RECEPTACULO`
--
ALTER TABLE `RECEPTACULO`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `SETOR`
--
ALTER TABLE `SETOR`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;