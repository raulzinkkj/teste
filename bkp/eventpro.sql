-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/07/2026 às 03:47
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
-- Banco de dados: `eventpro`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `titulo_evento` varchar(100) DEFAULT NULL,
  `descricao_evento` varchar(100) DEFAULT NULL,
  `categoria_evento` varchar(100) DEFAULT NULL,
  `palestrante_evento` varchar(100) DEFAULT NULL,
  `local_evento` varchar(100) DEFAULT NULL,
  `data_evento` date DEFAULT NULL,
  `horario_evento` varchar(6) DEFAULT NULL,
  `vagas_evento` varchar(100) DEFAULT NULL,
  `imagem_evento` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `eventos`
--

INSERT INTO `eventos` (`id_evento`, `titulo_evento`, `descricao_evento`, `categoria_evento`, `palestrante_evento`, `local_evento`, `data_evento`, `horario_evento`, `vagas_evento`, `imagem_evento`) VALUES
(3, 'ata', 'sim', 'dada', 'ata', 'sim', '2026-07-10', '21:49', '15', '1783644386_OIP.webp'),
(4, 'dada', 'dada', 'dadawda', 'dadawda', 'dadada', '2026-07-02', '21:53', 'dadad', '1783644838_Captura de tela 2026-07-09 215326.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `participantes`
--

CREATE TABLE `participantes` (
  `id_participante` int(11) NOT NULL,
  `nome_participante` varchar(100) DEFAULT NULL,
  `cpf_participante` varchar(11) DEFAULT NULL,
  `email_participante` varchar(100) DEFAULT NULL,
  `telefone_participante` varchar(15) DEFAULT NULL,
  `senha_participante` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `participantes`
--

INSERT INTO `participantes` (`id_participante`, `nome_participante`, `cpf_participante`, `email_participante`, `telefone_participante`, `senha_participante`) VALUES
(1, 'raul', '111111', 'raul@gmail.com', '11111111', '$2y$10$fjY0byXEgwePtK6liQ/l3.WBYvQi9oEo3eONvkQS0V6uFSO1vSLqG');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`);

--
-- Índices de tabela `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`id_participante`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `participantes`
--
ALTER TABLE `participantes`
  MODIFY `id_participante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
