-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/05/2024 às 09:50
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `test`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro-chapas`
--

CREATE TABLE `cadastro-chapas` (
  `nome_chapa` varchar(100) NOT NULL,
  `codigo_chapa` int(3) NOT NULL,
  `matricula_lider` int(10) NOT NULL,
  `nome_lider` varchar(100) NOT NULL,
  `matricula_vice` int(10) NOT NULL,
  `nome_vice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `cadastro-chapas`
--

INSERT INTO `cadastro-chapas` (`nome_chapa`, `codigo_chapa`, `matricula_lider`, `nome_lider`, `matricula_vice`, `nome_vice`) VALUES
('Juventude com Visão', 1, 487, 'Ana', 98, 'Alberto'),
('Inspiração Estudantil', 2, 232, 'Tenório', 235, 'Kauã'),
('Determinação Estudantil', 3, 841, 'Carla', 678, 'Leandro'),
('Chapa da Alegria', 4, 245, 'George', 966, 'Heitor'),
('Chapa invencível', 5, 458, 'Antonia', 753, 'Lais');

-- --------------------------------------------------------

--
-- Estrutura para tabela `votos`
--

CREATE TABLE `votos` (
  `matricula_aluno` int(10) NOT NULL,
  `voto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `votos`
--

INSERT INTO `votos` (`matricula_aluno`, `voto`) VALUES
(143, 'Juventude com Visão'),
(237, 'Juventude com Visão'),
(271, 'Chapa invencível'),
(456, 'Inspiração Estudantil'),
(478, 'Determinação Estudantil'),
(543, 'Determinação Estudantil'),
(555, 'Determinação Estudantil'),
(666, 'Inspiração Estudantil'),
(798, 'Chapa da Alegria'),
(809, 'Determinação Estudantil'),
(986, 'Juventude com Visão');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cadastro-chapas`
--
ALTER TABLE `cadastro-chapas`
  ADD PRIMARY KEY (`codigo_chapa`),
  ADD UNIQUE KEY `matricula_lider` (`matricula_lider`),
  ADD UNIQUE KEY `matricula_vice` (`matricula_vice`);

--
-- Índices de tabela `votos`
--
ALTER TABLE `votos`
  ADD PRIMARY KEY (`matricula_aluno`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro-chapas`
--
ALTER TABLE `cadastro-chapas`
  MODIFY `codigo_chapa` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
