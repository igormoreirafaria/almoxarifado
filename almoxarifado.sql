-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/07/2019 às 23:15
-- Versão do servidor: 10.1.38-MariaDB-0+deb9u1
-- Versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `almoxarifado`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `CONTEM`
--

CREATE TABLE `CONTEM` (
  `receptaculo` int(11) NOT NULL,
  `corredor` int(11) NOT NULL,
  `pecas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `CORREDOR`
--

CREATE TABLE `CORREDOR` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `CORREDOR`
--

INSERT INTO `CORREDOR` (`id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `FUNCIONARIOS`
--

CREATE TABLE `FUNCIONARIOS` (
  `cpf` varchar(256) NOT NULL,
  `nome` varchar(256) NOT NULL,
  `login` varchar(256) NOT NULL,
  `senha` varchar(256) NOT NULL,
  `setor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `FUNCIONARIOS`
--

INSERT INTO `FUNCIONARIOS` (`cpf`, `nome`, `login`, `senha`, `setor`) VALUES
('08900785648', 'Igor Moreira', 'igor', 'senhapadrao', 1),
('12345678998', 'Matheus Reis', 'matheus', 'senhapadrao', 2),
('32165498778', 'Luiz Felipe Fonseca', 'luzim', 'senhapadrao', 1),
('45612378978', 'Antônio Alves', 'tonim', 'senhapadrao', 3),
('75915324621', 'Valney Faria', 'valney', 'senhapadrao', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `PECAS`
--

CREATE TABLE `PECAS` (
  `id` int(11) NOT NULL,
  `upc` varchar(256) NOT NULL,
  `descricao` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `PECAS`
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
-- Estrutura para tabela `RECEPTACULO`
--

CREATE TABLE `RECEPTACULO` (
  `id` int(11) NOT NULL,
  `codigo` varchar(256) NOT NULL,
  `corredor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `SETOR`
--

CREATE TABLE `SETOR` (
  `id` int(11) NOT NULL,
  `nome` varchar(256) NOT NULL,
  `gerente` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `SETOR`
--

INSERT INTO `SETOR` (`id`, `nome`, `gerente`) VALUES
(1, 'Recepção', '08900785648'),
(2, 'Compras', '12345678998'),
(3, 'Saída', '45612378978');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `CONTEM`
--
ALTER TABLE `CONTEM`
  ADD KEY `receptaculo` (`receptaculo`),
  ADD KEY `corredor` (`corredor`),
  ADD KEY `pecas` (`pecas`);

--
-- Índices de tabela `CORREDOR`
--
ALTER TABLE `CORREDOR`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Índices de tabela `FUNCIONARIOS`
--
ALTER TABLE `FUNCIONARIOS`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices de tabela `PECAS`
--
ALTER TABLE `PECAS`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `RECEPTACULO`
--
ALTER TABLE `RECEPTACULO`
  ADD PRIMARY KEY (`id`),
  ADD KEY `corredor` (`corredor`);

--
-- Índices de tabela `SETOR`
--
ALTER TABLE `SETOR`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `CORREDOR`
--
ALTER TABLE `CORREDOR`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `PECAS`
--
ALTER TABLE `PECAS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `RECEPTACULO`
--
ALTER TABLE `RECEPTACULO`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `SETOR`
--
ALTER TABLE `SETOR`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
