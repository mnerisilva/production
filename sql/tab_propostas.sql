-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Out-2020 às 05:28
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consignado_anasc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_propostas`
--

CREATE TABLE `tab_propostas` (
  `id_contrato` int(11) NOT NULL,
  `id_cli` int(11) NOT NULL,
  `ade_contrato` varchar(30) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `id_orgao` int(11) NOT NULL,
  `bn_contrato` int(11) NOT NULL,
  `parce_contrato` double NOT NULL,
  `opera_contrato` int(11) NOT NULL,
  `promo_contrato` int(11) NOT NULL,
  `vend_contrato` int(11) NOT NULL,
  `situa_contrato` int(11) NOT NULL,
  `id_bccompra_contrato` int(11) NOT NULL,
  `parceini_contrato` double NOT NULL,
  `parcefinal_contrato` double NOT NULL,
  `ml_contrato` double NOT NULL,
  `data_cadastro_contrato` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_anexo` int(11) NOT NULL,
  `observa_tab_contrato` longtext CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `data_modificacao_contrato` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_propostas`
--

INSERT INTO `tab_propostas` (`id_contrato`, `id_cli`, `ade_contrato`, `id_orgao`, `bn_contrato`, `parce_contrato`, `opera_contrato`, `promo_contrato`, `vend_contrato`, `situa_contrato`, `id_bccompra_contrato`, `parceini_contrato`, `parcefinal_contrato`, `ml_contrato`, `data_cadastro_contrato`, `id_anexo`, `observa_tab_contrato`, `data_modificacao_contrato`) VALUES
(1, 1, '865988', 1, 1, 22156.1, 0, 1, 1, 1, 1, 156, 187, 41, '2020-09-21 20:58:43', 0, '', '0000-00-00 00:00:00'),
(2, 2, '987888', 1, 3, 126, 0, 2, 0, 8, 1, 126, 157, 0, '2020-09-16 22:31:53', 0, '', '0000-00-00 00:00:00'),
(20, 3, '895578', 3, 7, 178, 0, 3, 0, 11, 1, 178, 198, 0, '2020-09-16 23:59:10', 0, '', '0000-00-00 00:00:00'),
(21, 4, '998989', 2, 5, 158, 0, 2, 0, 3, 2, 158, 169, 0, '2020-09-26 23:26:39', 0, '', '0000-00-00 00:00:00'),
(22, 5, '864755', 1, 2, 193, 0, 3, 0, 3, 1, 193, 203, 0, '2020-09-17 00:04:17', 0, '', '0000-00-00 00:00:00'),
(23, 10, '', 1, 2, 156, 0, 1, 0, 3, 1, 156, 178, 0, '2020-09-24 19:42:21', 0, '', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tab_propostas`
--
ALTER TABLE `tab_propostas`
  ADD PRIMARY KEY (`id_contrato`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tab_propostas`
--
ALTER TABLE `tab_propostas`
  MODIFY `id_contrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
