-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Nov-2020 às 10:12
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
-- Estrutura da tabela `tab_usuarios`
--

CREATE TABLE `tab_usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `primeiro_nome_usuario` varchar(50) NOT NULL,
  `nome_completo_usuario` varchar(255) NOT NULL,
  `foto_usuario_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_usuarios`
--

INSERT INTO `tab_usuarios` (`id`, `usuario`, `senha`, `primeiro_nome_usuario`, `nome_completo_usuario`, `foto_usuario_link`) VALUES
(1, 'master', '$2y$10$1HqKnUbCfOfpnkg9Ovi17.DHlyZTleVnbIetA0xVUEAljAKpJMemK', '', '', ''),
(2, 'admin', '$2y$10$1HqKnUbCfOfpnkg9Ovi17.DHlyZTleVnbIetA0xVUEAljAKpJMemK', 'Thauan', 'Thauan Silveira', 'usuarios/foto/thauan_silveira.jpg'),
(3, 'usuario', '$2y$10$Qj15gH9IbjWJg7wr3cnGeuHIMOAj/tINNxNpVvr9ZVjrkGQQv3r4e', '', '', ''),
(4, 'novousuario', '$2y$10$eiVEkRWdae7ycBWrOmA.aekuXHhkFmywqrOUZF2Bv4cRg95ubBIjm', '', '', ''),
(5, 'marceloneri', '$2y$10$hMr.L80j3oaCaMRDE4bRM.Oc9BGYsg5Dx1V0q7MBG7NBHJSlvrpKi', 'Marcelo', 'Marcelo Neri da Silva', 'usuarios/foto/marcelo_neri_da_silva.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tab_usuarios`
--
ALTER TABLE `tab_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tab_usuarios`
--
ALTER TABLE `tab_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
