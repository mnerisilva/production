-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Set-2020 às 18:57
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estrutura da tabela `tab_anexos`
--

CREATE TABLE `tab_anexos` (
  `id_anexo` int(11) NOT NULL,
  `id_contrato` int(11) NOT NULL,
  `id_tipo_arquivo` int(11) NOT NULL,
  `file_name_anexo` varchar(255) NOT NULL,
  `path_anexo` varchar(255) NOT NULL,
  `dateupload_anexo` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_anexos`
--

INSERT INTO `tab_anexos` (`id_anexo`, `id_contrato`, `id_tipo_arquivo`, `file_name_anexo`, `path_anexo`, `dateupload_anexo`) VALUES
(116, 2, 6, 'folha_mes_outubro_2019.pdf', 'uploads/2/', '2020-01-01 00:00:00'),
(117, 2, 4, 'moedas.jpg', 'uploads/2/', '2020-01-01 00:00:00'),
(118, 2, 2, 'Solidificação de gelo básico.docx', 'uploads/2/', '2020-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_bccompra`
--

CREATE TABLE `tab_bccompra` (
  `id_bccompra_contrato` int(11) NOT NULL,
  `nome_bccompra` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_bccompra`
--

INSERT INTO `tab_bccompra` (`id_bccompra_contrato`, `nome_bccompra`) VALUES
(1, 'BANRISUL'),
(2, 'BRADESCO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_bn`
--

CREATE TABLE `tab_bn` (
  `id_bn` int(11) NOT NULL,
  `cod_bn` int(11) NOT NULL,
  `nome_bn` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_bn`
--

INSERT INTO `tab_bn` (`id_bn`, `cod_bn`, `nome_bn`) VALUES
(1, 21, ''),
(2, 32, ''),
(3, 41, ''),
(4, 42, ''),
(5, 46, ''),
(6, 92, ''),
(7, 93, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_clientes`
--

CREATE TABLE `tab_clientes` (
  `id_cli` int(11) NOT NULL,
  `nome_cli` varchar(255) NOT NULL,
  `cpf_cli` varchar(14) NOT NULL,
  `identidade_cli` varchar(40) NOT NULL,
  `cep_cli` varchar(8) NOT NULL,
  `endereco_cli` varchar(255) NOT NULL,
  `numero_cli` varchar(50) NOT NULL,
  `comple_cli` varchar(50) NOT NULL,
  `bairro_cli` varchar(50) NOT NULL,
  `cidade_cli` varchar(50) NOT NULL,
  `uf_cli` varchar(2) NOT NULL,
  `datanasc_cli` varchar(200) NOT NULL,
  `datacad_cli` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_clientes`
--

INSERT INTO `tab_clientes` (`id_cli`, `nome_cli`, `cpf_cli`, `identidade_cli`, `cep_cli`, `endereco_cli`, `numero_cli`, `comple_cli`, `bairro_cli`, `cidade_cli`, `uf_cli`, `datanasc_cli`, `datacad_cli`) VALUES
(1, 'Carlos da Silva Junior', '125.445.887-54', '455885', '89012100', 'sdfdsf', '12', '', '', 'Joaçaba', 'SC', '12/05/1946', '14/09/2020'),
(2, 'Luiz Carlos da Silva Costa', '457.887.842-11', '200545458', '88035120', 'Rua das Casas', '154', '', '', 'São José', 'SC', '12/05/1946', '14/09/2020'),
(3, 'Marcelo Neri da Silva', '558.536.769-20', '1463090', '88085260', 'Rua Fernando Ferreira de Mello', '234', '', '', '', 'SC', '12/05/1946', '14/09/2020'),
(4, 'Roberto Pereira Costa', '548.636.769-21', '4565445', '78055888', 'Rua das Casas', '20', '', '', 'Brusque', 'SC', '12/05/1946', '14/09/2020'),
(5, 'Elias Cardoso Pereira', '155.454.555-55', '455454', '18020-45', 'Rua Ferreira Lima', '22', '', '', 'Santo Agostinho', 'MG', '12/05/1946', '14/09/2020'),
(6, 'Armando Pereira Costa', '145.548.788-87', '54887', '45030-22', 'Rua Antonio Veras', '151', '', '', 'Curitiba', 'PR', '12/05/1946', '14/09/2020'),
(7, 'Maria Aparecida Veloso', '488.788.878-78', '145558', '12802-22', 'Rua Santiago Silva', '125', '', '', 'Londrina', 'PR', '12/05/1946', '14/09/2020'),
(8, 'Ronaldo Fenomeno Brasil', '454.545.455-54', '87887878', '55045-45', 'Rua das Orquídias', '135', '', '', 'Londrina', 'SC', '12/05/1946', '14/09/2020'),
(9, 'Heliane da Silva', '454.545.454-54', '887878', '54545-44', 'dffsdf', 'asdfda', '', '', 'asdfsdf', 'as', '12/05/1946', '14/09/2020'),
(10, 'João Carlos Barbosa', '544.545.555-54', '45454545', '88085-26', 'rua das casas', '125', '', '', 'São josé', 'SC', '12/05/1946', '14/09/2020');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_operacao`
--

CREATE TABLE `tab_operacao` (
  `id_operacao` int(11) NOT NULL,
  `nome_operacao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_operacao`
--

INSERT INTO `tab_operacao` (`id_operacao`, `nome_operacao`) VALUES
(1, 'Portabilidade'),
(2, 'Porta + Refi'),
(3, 'Contrato novo'),
(4, 'Refinanciamento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_orgao`
--

CREATE TABLE `tab_orgao` (
  `id_orgao` int(11) NOT NULL,
  `nome_orgao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_orgao`
--

INSERT INTO `tab_orgao` (`id_orgao`, `nome_orgao`) VALUES
(1, 'INSS'),
(2, 'SIAPE'),
(3, 'GOV SC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_promotora`
--

CREATE TABLE `tab_promotora` (
  `id_promotora` int(11) NOT NULL,
  `nome_promotora` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_promotora`
--

INSERT INTO `tab_promotora` (`id_promotora`, `nome_promotora`) VALUES
(1, 'LEWE'),
(2, 'FONTES'),
(3, 'GFT');

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_situacao`
--

CREATE TABLE `tab_situacao` (
  `id_situacao` int(11) NOT NULL,
  `descricao_situacao` varchar(255) NOT NULL,
  `motivo_descricao_situacao` varchar(255) NOT NULL,
  `ativada_situacao` tinyint(1) NOT NULL DEFAULT '1',
  `cor_situacao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_situacao`
--

INSERT INTO `tab_situacao` (`id_situacao`, `descricao_situacao`, `motivo_descricao_situacao`, `ativada_situacao`, `cor_situacao`) VALUES
(1, 'AGUARDANDO', 'digitação', 1, ''),
(2, 'AGUARDANDO', 'saldo devedor', 1, ''),
(3, 'AGUARDANDO', 'averbação', 1, ''),
(4, 'AVERBADO', '', 1, ''),
(5, 'AGUARDANDO', 'refinanciamento da portabilidade', 1, ''),
(6, 'PAGO', '', 1, ''),
(7, 'PENDENTE', 'anexar contrato', 1, ''),
(8, 'PENDENTE', 'documento pendente', 1, ''),
(9, 'CANCELADO', 'cliente retido', 1, ''),
(10, 'CANCELADO', 'no. de contrato não encontrado', 1, ''),
(11, 'CANCELADO', 'contrato com portabilidade em andamento', 1, ''),
(12, 'CANCELADO', 'cliente solicitou o cancelamento', 1, ''),
(13, 'CANCELADO', 'margem consignada excedida', 1, ''),
(14, 'CANCELADO', 'cliente com restrição interna', 1, ''),
(15, 'CANCELADO', 'cliente com margem negativa', 1, ''),
(16, 'CANCELADO', 'CPF irregular na Receita Federal', 1, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_tipo_arquivo_anexo`
--

CREATE TABLE `tab_tipo_arquivo_anexo` (
  `id_tipo_arquivo` int(11) NOT NULL,
  `extensao_tipo_arquivo` varchar(20) NOT NULL,
  `icone_anexo` varchar(255) NOT NULL,
  `icone_color` varchar(50) NOT NULL,
  `autorizado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_tipo_arquivo_anexo`
--

INSERT INTO `tab_tipo_arquivo_anexo` (`id_tipo_arquivo`, `extensao_tipo_arquivo`, `icone_anexo`, `icone_color`, `autorizado`) VALUES
(1, 'doc', '<i class="fa fa-file-word-o"></i>', '#337ab7', 1),
(2, 'docx', '<i class="fa fa-file-word-o"></i>', '#337ab7', 1),
(3, 'gif', '<i class="fa fa-file-image-o"></i>', '', 1),
(4, 'jpg', '<i class="fa fa-photo"></i>', '#337ab7', 1),
(5, 'jpeg', '<i class="fa fa-photo"></i>', '#337ab7', 1),
(6, 'pdf', '<i class="fa fa-file-pdf-o"></i>', 'indianred', 1),
(7, 'png', '<i class="fa fa-file-image-o"></i>', '#337ab7', 1),
(8, 'txt', '<i class="fa fa-file-text-o"></i>', '#676767', 1);

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_vendedor`
--

CREATE TABLE `tab_vendedor` (
  `id_vendedor` int(11) NOT NULL,
  `nome_vendedor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_vendedor`
--

INSERT INTO `tab_vendedor` (`id_vendedor`, `nome_vendedor`) VALUES
(1, 'Manoel'),
(2, 'Thauan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tab_anexos`
--
ALTER TABLE `tab_anexos`
  ADD PRIMARY KEY (`id_anexo`);

--
-- Indexes for table `tab_bccompra`
--
ALTER TABLE `tab_bccompra`
  ADD PRIMARY KEY (`id_bccompra_contrato`);

--
-- Indexes for table `tab_bn`
--
ALTER TABLE `tab_bn`
  ADD PRIMARY KEY (`id_bn`);

--
-- Indexes for table `tab_clientes`
--
ALTER TABLE `tab_clientes`
  ADD PRIMARY KEY (`id_cli`);

--
-- Indexes for table `tab_operacao`
--
ALTER TABLE `tab_operacao`
  ADD PRIMARY KEY (`id_operacao`);

--
-- Indexes for table `tab_orgao`
--
ALTER TABLE `tab_orgao`
  ADD PRIMARY KEY (`id_orgao`);

--
-- Indexes for table `tab_promotora`
--
ALTER TABLE `tab_promotora`
  ADD PRIMARY KEY (`id_promotora`);

--
-- Indexes for table `tab_propostas`
--
ALTER TABLE `tab_propostas`
  ADD PRIMARY KEY (`id_contrato`);

--
-- Indexes for table `tab_situacao`
--
ALTER TABLE `tab_situacao`
  ADD PRIMARY KEY (`id_situacao`);

--
-- Indexes for table `tab_tipo_arquivo_anexo`
--
ALTER TABLE `tab_tipo_arquivo_anexo`
  ADD PRIMARY KEY (`id_tipo_arquivo`);

--
-- Indexes for table `tab_usuarios`
--
ALTER TABLE `tab_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_vendedor`
--
ALTER TABLE `tab_vendedor`
  ADD PRIMARY KEY (`id_vendedor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tab_anexos`
--
ALTER TABLE `tab_anexos`
  MODIFY `id_anexo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `tab_bccompra`
--
ALTER TABLE `tab_bccompra`
  MODIFY `id_bccompra_contrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tab_bn`
--
ALTER TABLE `tab_bn`
  MODIFY `id_bn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tab_clientes`
--
ALTER TABLE `tab_clientes`
  MODIFY `id_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tab_operacao`
--
ALTER TABLE `tab_operacao`
  MODIFY `id_operacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tab_orgao`
--
ALTER TABLE `tab_orgao`
  MODIFY `id_orgao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tab_promotora`
--
ALTER TABLE `tab_promotora`
  MODIFY `id_promotora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tab_propostas`
--
ALTER TABLE `tab_propostas`
  MODIFY `id_contrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tab_situacao`
--
ALTER TABLE `tab_situacao`
  MODIFY `id_situacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tab_tipo_arquivo_anexo`
--
ALTER TABLE `tab_tipo_arquivo_anexo`
  MODIFY `id_tipo_arquivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tab_usuarios`
--
ALTER TABLE `tab_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tab_vendedor`
--
ALTER TABLE `tab_vendedor`
  MODIFY `id_vendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
