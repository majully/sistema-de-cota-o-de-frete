-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Tempo de geração: 27-Jun-2022 às 04:04
-- Versão do servidor: 5.7.35
-- versão do PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cotacaodb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cotacao_frete`
--

CREATE TABLE `cotacao_frete` (
  `id` int(10) UNSIGNED NOT NULL,
  `uf` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentual_cotacao` decimal(10,2) NOT NULL,
  `valor_extra` decimal(10,2) NOT NULL,
  `transportadora_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cotacao_frete`
--

INSERT INTO `cotacao_frete` (`id`, `uf`, `percentual_cotacao`, `valor_extra`, `transportadora_id`) VALUES
(1, 'PR', '2.95', '14.35', 2),
(2, 'PR', '3.10', '15.50', 1),
(3, 'PR', '3.65', '12.33', 3),
(4, 'PR', '3.22', '15.40', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `transportadora`
--

CREATE TABLE `transportadora` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `transportadora`
--

INSERT INTO `transportadora` (`id`, `nome`) VALUES
(1, 'TransFrete Transportadora'),
(2, 'Express Transportadora'),
(3, 'Flash Entregas'),
(4, 'Machado Transportadora');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cotacao_frete`
--
ALTER TABLE `cotacao_frete`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cotacao_frete_transportadora_id_foreign` (`transportadora_id`);

--
-- Índices para tabela `transportadora`
--
ALTER TABLE `transportadora`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cotacao_frete`
--
ALTER TABLE `cotacao_frete`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `transportadora`
--
ALTER TABLE `transportadora`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cotacao_frete`
--
ALTER TABLE `cotacao_frete`
  ADD CONSTRAINT `cotacao_frete_transportadora_id_foreign` FOREIGN KEY (`transportadora_id`) REFERENCES `transportadora` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
