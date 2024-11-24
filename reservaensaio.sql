-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/11/2024 às 10:42
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `reservaensaio`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `fotografo`
--

CREATE TABLE `fotografo` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pacote_ensaio`
--

CREATE TABLE `pacote_ensaio` (
  `id` int(11) NOT NULL,
  `valor` double NOT NULL,
  `quantidade_fotos` int(11) NOT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pacote_ensaio`
--

INSERT INTO `pacote_ensaio` (`id`, `valor`, `quantidade_fotos`, `descricao`) VALUES
(1, 15000, 18, 'Pacote: 18 Fotos'),
(2, 20000, 25, 'Pacote: 25 Fotos'),
(3, 20000, 0, 'Pacote: Festas, todas as fotos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `local` varchar(255) NOT NULL,
  `quantidade_pessoas` int(11) NOT NULL,
  `detalhes` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pendente',
  `usuario_id` int(11) DEFAULT NULL,
  `pacote_ensaio_id` int(11) DEFAULT NULL,
  `termo_contrato_id` int(11) DEFAULT NULL,
  `horario` time DEFAULT NULL,
  `data_reserva` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `reserva`
--

INSERT INTO `reserva` (`id`, `data`, `local`, `quantidade_pessoas`, `detalhes`, `status`, `usuario_id`, `pacote_ensaio_id`, `termo_contrato_id`, `horario`, `data_reserva`) VALUES
(2, '2024-12-05', 'isezaki', 3, 'hjcfhjcghj', 'Confirmada', 2, 2, 2, '15:11:00', '2024-11-17 11:11:17');

-- --------------------------------------------------------

--
-- Estrutura para tabela `termo_contrato`
--

CREATE TABLE `termo_contrato` (
  `id` int(11) NOT NULL,
  `texto` text NOT NULL,
  `data_criacao` datetime DEFAULT current_timestamp(),
  `concordaTermos` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `termo_contrato`
--

INSERT INTO `termo_contrato` (`id`, `texto`, `data_criacao`, `concordaTermos`) VALUES
(2, '', '2024-11-17 11:11:17', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `reserva_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `celular`, `senha`, `reserva_id`) VALUES
(2, 'Jenni', 'jennimakita@gmail.com', '07035496423', '', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `fotografo`
--
ALTER TABLE `fotografo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `pacote_ensaio`
--
ALTER TABLE `pacote_ensaio`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data` (`data`,`usuario_id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `pacote_ensaio_id` (`pacote_ensaio_id`),
  ADD KEY `termo_contrato_id` (`termo_contrato_id`);

--
-- Índices de tabela `termo_contrato`
--
ALTER TABLE `termo_contrato`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `celular` (`celular`),
  ADD KEY `fk_reserva` (`reserva_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `fotografo`
--
ALTER TABLE `fotografo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pacote_ensaio`
--
ALTER TABLE `pacote_ensaio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `termo_contrato`
--
ALTER TABLE `termo_contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`pacote_ensaio_id`) REFERENCES `pacote_ensaio` (`id`),
  ADD CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`termo_contrato_id`) REFERENCES `termo_contrato` (`id`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_reserva` FOREIGN KEY (`reserva_id`) REFERENCES `reserva` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
