-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql103.byetcluster.com
-- Tempo de geração: 29-Abr-2025 às 06:07
-- Versão do servidor: 10.6.19-MariaDB
-- versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ljmn_38652497_inventario_produtos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

CREATE TABLE `contas` (
  `id` int(11) NOT NULL,
  `utilizador` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `palavra_passe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `contas`
--

INSERT INTO `contas` (`id`, `utilizador`, `email`, `palavra_passe`) VALUES
(1, 'teste', 'a14481@gmail.com', 'a1234'),
(2, 'qw', 'retre7886@gmail.com', '$2y$10$acuYtiFthlWVxAob4j.1t.y6ALSwCs3OPYqNDHPxVjV.NP55AnhxS'),
(3, 'q', 're@gmail.com', '$2y$10$LbkqozjskprWe9Jo/Qb7AOEQJk7q5xubspysglbagn6bgZprcl.sK'),
(4, 'r', 'a14@gmail.com', '$2y$10$28QgA.roC2.kmVUwYls66eKnJBiWPNZ/mF3ww21BhxvWR22BAoXfq'),
(5, '14481', 'a14481@oficina.pt', '$2y$10$KRsIZbRhh/HKXoJKdkpIieeM3XV2TfYA1M7hGnmyoYDdoQJWqOuP6'),
(6, 'francisco', 'a14568@oficina.pt', '$2y$10$77.9U7zVoSz7Vyzt6oWzUePwD/rfw7dFLv8kuuJ0Mk6pUIzFjC5UK'),
(7, '14483', 'mario@gmail.com', '$2y$10$x3CqK6ifrvYGb53404om9.fux4z4Gq78X2Qya1TvL5Rz1kP8BMhJ6');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `imagem` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `preco` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `desconto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `categoria` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `imagem`, `nome`, `descricao`, `preco`, `desconto`, `categoria`) VALUES
(9, 'produto_680151c41f87c6.26787842.jpeg', 'teste2', 'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '23', '0', 'R');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contas`
--
ALTER TABLE `contas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contas`
--
ALTER TABLE `contas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
