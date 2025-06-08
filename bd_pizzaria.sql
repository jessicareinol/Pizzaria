-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/06/2025 às 01:31
-- Versão do servidor: 8.0.39
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_pizzaria`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cardapio`
--

CREATE TABLE `cardapio` (
  `id` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text,
  `preco` decimal(10,2) NOT NULL,
  `imagem` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `cardapio`
--

INSERT INTO `cardapio` (`id`, `nome`, `descricao`, `preco`, `imagem`, `created`, `modified`) VALUES
(1, 'Calabresa', 'Mussarela, calabresa, cebola e orégano', 40.00, 'img/calabresa.jpg', '2025-06-01 02:09:25', '2025-06-07 01:08:03'),
(2, 'Portuguesa', 'Mussarela, presunto, ovo, cebola, azeitona e orégano.', 49.99, 'img/portuguesa.jpg', '2025-06-01 02:31:46', '2025-06-05 17:08:30'),
(5, 'Frango com catupiry', 'Mussarela, frango desfiado e catupiry', 45.99, 'img/frangocomcatupiry.jpg', '2025-06-01 07:36:24', '2025-06-05 17:09:40'),
(11, 'Marguerita', 'Molho de tomate, mussarela, manjericão e azeite de oliva', 49.99, 'img/marguerita.jpg', '2025-06-01 09:30:16', '2025-06-05 17:10:10'),
(15, 'Chocolate com Morango', 'Massa de pizza coberta com chocolate e morangos', 50.00, 'img/chocolate.jpg', '2025-06-01 09:52:23', '2025-06-05 17:10:32'),
(16, 'Quatro queijos', 'Mussarela, gorgonzola, provolone e parmesão.', 49.99, 'img/quatroqueijos.jpg', '2025-06-01 09:54:10', '2025-06-05 17:10:54'),
(18, 'Pepperoni', 'Pepperoni, queijo mussarela, molho de tomate e requeijão.	', 54.99, 'img/pepperoni.jpg', '2025-06-05 17:40:21', '2025-06-05 18:15:31');

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

CREATE TABLE `empresa` (
  `idempresa` int NOT NULL,
  `imagem` text,
  `emp_titulo` varchar(220) DEFAULT NULL,
  `emp_texto1` text,
  `emp_texto2` text NOT NULL,
  `emp_texto3` text NOT NULL,
  `emp_site` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `mais_vendidas`
--

CREATE TABLE `mais_vendidas` (
  `id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `mais_vendidas`
--

INSERT INTO `mais_vendidas` (`id`, `nome`, `descricao`, `imagem`) VALUES
(1, 'Pizza Marguerita', 'A tradiciona pizza italiana.', 'img/marguerita.jpg'),
(2, 'Pizza de Calabresaa', 'Com bastante calabresa defumada, cebola e um toque de orégano.', 'img/calabresa.jpg'),
(3, 'Pizza de Chocolate', 'Para quem é fã de chocolate!', 'img/chocolate.jpg'),
(8, 'Frango com Catupiry', 'Para quem é fã de frango com bastante catupiry', 'img/frangocomcatupiry.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sobre`
--

CREATE TABLE `sobre` (
  `idsobre` int NOT NULL,
  `s_titulo` varchar(220) DEFAULT NULL,
  `s_descricao` text,
  `imagem` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nome` varchar(220) DEFAULT NULL,
  `email` varchar(220) DEFAULT NULL,
  `senha` varchar(220) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `tipo_acesso` varchar(50) NOT NULL DEFAULT 'usuario',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `imagem` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `created`, `modified`, `tipo_acesso`, `ativo`, `imagem`) VALUES
(22, 'Jéssica A. Reinol', 'jessicareinol@gmail.com', '$2y$10$GG5bx9gZ8/kGNt.5zBLC0eWvJOYlmzJUBgP7SNBbgnrHYf16vQVlq', '2025-06-05 17:04:24', '2025-06-05 17:04:53', 'usuario', 1, NULL),
(28, 'admin', 'admin@admin.com', '$2y$10$gay3I2EwWhs4uXHTqhSS1uQiPAVJ25X7zU1ju3tRyf/UoLko3JoIG', '2025-06-07 18:50:43', '2025-06-07 18:51:08', 'usuario', 1, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cardapio`
--
ALTER TABLE `cardapio`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idempresa`);

--
-- Índices de tabela `mais_vendidas`
--
ALTER TABLE `mais_vendidas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sobre`
--
ALTER TABLE `sobre`
  ADD PRIMARY KEY (`idsobre`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cardapio`
--
ALTER TABLE `cardapio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idempresa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `mais_vendidas`
--
ALTER TABLE `mais_vendidas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `sobre`
--
ALTER TABLE `sobre`
  MODIFY `idsobre` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
