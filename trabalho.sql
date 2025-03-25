-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 08-Dez-2023 às 18:51
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `trabalho`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_pedido`
--

DROP TABLE IF EXISTS `item_pedido`;
CREATE TABLE IF NOT EXISTS `item_pedido` (
  `cod_item` int NOT NULL AUTO_INCREMENT,
  `recipiente` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `qtd` int NOT NULL,
  `preco` double NOT NULL,
  `cod_pedido` int NOT NULL,
  `cod_produto` int NOT NULL,
  PRIMARY KEY (`cod_item`),
  KEY `fk_item_produto` (`cod_produto`),
  KEY `fk_item_pedido` (`cod_pedido`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `item_pedido`
--

INSERT INTO `item_pedido` (`cod_item`, `recipiente`, `qtd`, `preco`, `cod_pedido`, `cod_produto`) VALUES
(37, 'Casquinha', 2, 50, 19, 1),
(36, 'Casquinha', 2, 50, 19, 22),
(35, 'Copo', 1, 20, 18, 22),
(34, 'Copo', 1, 20, 18, 21),
(33, 'Copo', 1, 22, 18, 23),
(32, 'Copo', 1, 20, 18, 9),
(31, 'Casquinha', 4, 100, 17, 3),
(30, 'Copo', 3, 45, 16, 10),
(29, 'Casquinha', 1, 20, 16, 2),
(28, 'Copo', 1, 20, 15, 9),
(27, 'Copo', 1, 15, 15, 2),
(26, 'Casquinha', 1, 0, 14, 22),
(25, 'Casquinha', 2, 0, 14, 21),
(24, 'Casquinha', 3, 0, 14, 9),
(38, 'Casquinha', 3, 75, 20, 21),
(39, 'Copo', 1, 20, 20, 21),
(40, 'Copo', 5, 75, 21, 4),
(41, 'Casquinha', 99, 2475, 22, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `cod_pedido` int NOT NULL AUTO_INCREMENT,
  `qtd_total` int NOT NULL,
  `preco_total` float NOT NULL,
  `status` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Pendente',
  PRIMARY KEY (`cod_pedido`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`cod_pedido`, `qtd_total`, `preco_total`, `status`) VALUES
(22, 99, 2475, 'Reprovado'),
(21, 5, 75, 'Pendente'),
(20, 4, 95, 'Aprovado'),
(19, 4, 100, 'Pendente'),
(18, 4, 82, 'Pendente'),
(17, 4, 100, 'Aprovado'),
(15, 2, 35, 'Finalizado'),
(16, 4, 65, 'Finalizado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `cod_produto` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `sabor` varchar(100) NOT NULL,
  `preco` float NOT NULL,
  `descricao` text NOT NULL,
  `url_img` varchar(100) NOT NULL,
  PRIMARY KEY (`cod_produto`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`cod_produto`, `nome`, `sabor`, `preco`, `descricao`, `url_img`) VALUES
(1, 'Super Chocolatasso', 'Chocolate', 20, 'Um super e delicioso sorvete de chocolate da linha Super Sorvetasso que com certeza vai te conquistar.', '982ea7d7bb3f3285babfb25174ce44fb.tmp'),
(2, 'Morangasso', 'Morango', 15, 'Um delicioso sorvete de morango da linha Sorvetasso que com certeza vai te conquistar.', 'f957bee19113b569851f1198ba6b90b3.tmp'),
(3, 'Super Bananasso', 'Napolitano', 20, 'Um super e delicioso sorvete de banana da linha Super Sorvetasso que com certeza vai te conquistar.', 'a637793aeb14acac59bf87f62b0afc1b.tmp'),
(4, 'Chocolatasso', 'chocolate', 15, 'Um delicioso sorvete de chocolate da linha Sorvetasso que com certeza vai te conquistar.', '054410bca4b83ff3c716acb8ba64321f.tmp'),
(10, 'Cremeasso', 'Creme', 15, 'Um delicioso sorvete de creme da linha  Sorvetasso que com certeza vai te conquistar.', '76968d9ade8adebb27f6e56259fc22d3.tmp'),
(9, 'Super Napolitanasso', 'Napolitano', 20, 'Um super e delicioso sorvete napolitano da linha Super Sorvetasso que com certeza vai te conquistar.', 'ae16beb66faa8efa8b6e8a7ff90e3344.tmp'),
(21, 'Super Morangasso', 'Morango', 20, 'Um super e delicioso sorvete de morango da linha Super Sorvetasso que com certeza vai te conquistar.', 'aafbb8aa3215a7878d74f4b3ad9ef4c5.tmp'),
(22, 'Super Flocasso', 'Flocos', 20, 'Um super e delicioso sorvete de flocos da linha Super Sorvetasso que com certeza vai te conquistar.', '9f73e59cd7a5216544c11189f9eaf4d2.tmp'),
(23, 'Super Morangasso Trufado', 'Morango', 22, 'Um super e delicioso sorvete de morango da linha Super Sorvetasso que com certeza vai te conquistar.', '5c0de733c57275f90d9df3f9928aa3f8.tmp');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
