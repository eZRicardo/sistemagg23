-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 06/02/2019 às 03:43
-- Versão do servidor: 10.2.18-MariaDB
-- Versão do PHP: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u959253842_erp`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `associado`
--

CREATE TABLE `associado` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `data_associacao` date DEFAULT current_timestamp(),
  `id_setor` int(11) NOT NULL,
  `id_engenharia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `associado`
--

INSERT INTO `associado` (`id`, `nome`, `data_associacao`, `id_setor`, `id_engenharia`) VALUES
(13, 'teste', '2019-02-05', 4, 4),
(17, 'teste', '2019-02-05', 1, 1),
(18, 'Renan Albuquerque', '2019-02-05', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `dados_associado`
--

CREATE TABLE `dados_associado` (
  `id` int(11) NOT NULL,
  `endereco` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rg` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uf` enum('AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO') COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `turno` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `periodo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep` char(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_associado` int(11) NOT NULL,
  `data_nascimento` date DEFAULT curdate(),
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `dados_associado`
--

INSERT INTO `dados_associado` (`id`, `endereco`, `rg`, `cpf`, `bairro`, `cidade`, `uf`, `email`, `turno`, `periodo`, `cep`, `celular`, `telefone`, `id_associado`, `data_nascimento`, `id_curso`) VALUES
(10, 'Rua Ourém', '', '', 'San Martin', 'Recife', 'PE', '', '', '', '50761340', '', '', 13, '2019-02-05', 4),
(14, 'Rua Ourém', '9531249', '70305023454', 'SAN MARTIN', 'Recife', 'PE', 'renanalbuquerque@polijunioreng', 'Manhã', '2019.2', '50761340', '979041128', '32283181', 17, '2019-02-05', 1),
(15, 'Rua Ourém', '9531249', '70305023454', 'San Martin', 'Recife', 'PE', 'renanavs09@gmail.com', 'Manhã', '2019.2', '50761340', '979041128', '32283181', 18, '2019-02-05', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `engenharia`
--

CREATE TABLE `engenharia` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `engenharia`
--

INSERT INTO `engenharia` (`id`, `nome`) VALUES
(1, 'Computação'),
(4, 'Civil'),
(9, 'Eletrotécnica'),
(13, 'Automação'),
(14, 'Mecânica'),
(15, 'Eletrônica'),
(16, 'Telecomunicações');

-- --------------------------------------------------------

--
-- Estrutura para tabela `falta`
--

CREATE TABLE `falta` (
  `id` int(11) NOT NULL,
  `data` date DEFAULT curdate(),
  `id_motivofalta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `grupousuario`
--

CREATE TABLE `grupousuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `historicoassociado`
--

CREATE TABLE `historicoassociado` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `datadesassociacao` date DEFAULT curdate(),
  `id_setor` int(11) NOT NULL,
  `id_engenharia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `motivofalta`
--

CREATE TABLE `motivofalta` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `id_tipofalta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `permissao`
--

CREATE TABLE `permissao` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `nome` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `permissao_grupousuario`
--

CREATE TABLE `permissao_grupousuario` (
  `id_permissao` int(11) NOT NULL,
  `id_grupousuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `setor`
--

CREATE TABLE `setor` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `setor`
--

INSERT INTO `setor` (`id`, `nome`) VALUES
(1, 'NEGOCIOS'),
(2, 'GENTE E GESTAO'),
(3, 'VENDAS'),
(4, 'MARKETING');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipofalta`
--

CREATE TABLE `tipofalta` (
  `id` int(11) NOT NULL,
  `peso` float NOT NULL,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `login`, `senha`) VALUES
(0, 'admin', 'admin', 'polijunior');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `associado`
--
ALTER TABLE `associado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_setor` (`id_setor`),
  ADD KEY `id_engenharia` (`id_engenharia`);

--
-- Índices de tabela `dados_associado`
--
ALTER TABLE `dados_associado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_associado` (`id_associado`),
  ADD KEY `dados_associado_ibfk_2` (`id_curso`);

--
-- Índices de tabela `engenharia`
--
ALTER TABLE `engenharia`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `falta`
--
ALTER TABLE `falta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_motivofalta` (`id_motivofalta`);

--
-- Índices de tabela `grupousuario`
--
ALTER TABLE `grupousuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `historicoassociado`
--
ALTER TABLE `historicoassociado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_setor` (`id_setor`),
  ADD KEY `id_engenharia` (`id_engenharia`);

--
-- Índices de tabela `motivofalta`
--
ALTER TABLE `motivofalta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipofalta` (`id_tipofalta`);

--
-- Índices de tabela `permissao`
--
ALTER TABLE `permissao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `permissao_grupousuario`
--
ALTER TABLE `permissao_grupousuario`
  ADD KEY `id_permissao` (`id_permissao`),
  ADD KEY `id_grupousuario` (`id_grupousuario`);

--
-- Índices de tabela `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tipofalta`
--
ALTER TABLE `tipofalta`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `associado`
--
ALTER TABLE `associado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `dados_associado`
--
ALTER TABLE `dados_associado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `engenharia`
--
ALTER TABLE `engenharia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `falta`
--
ALTER TABLE `falta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `grupousuario`
--
ALTER TABLE `grupousuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `historicoassociado`
--
ALTER TABLE `historicoassociado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `motivofalta`
--
ALTER TABLE `motivofalta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `permissao`
--
ALTER TABLE `permissao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tipofalta`
--
ALTER TABLE `tipofalta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `associado`
--
ALTER TABLE `associado`
  ADD CONSTRAINT `associado_ibfk_1` FOREIGN KEY (`id_setor`) REFERENCES `setor` (`id`),
  ADD CONSTRAINT `associado_ibfk_2` FOREIGN KEY (`id_engenharia`) REFERENCES `engenharia` (`id`);

--
-- Restrições para tabelas `dados_associado`
--
ALTER TABLE `dados_associado`
  ADD CONSTRAINT `dados_associado_ibfk_1` FOREIGN KEY (`id_associado`) REFERENCES `associado` (`id`),
  ADD CONSTRAINT `dados_associado_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `engenharia` (`id`);

--
-- Restrições para tabelas `falta`
--
ALTER TABLE `falta`
  ADD CONSTRAINT `falta_ibfk_1` FOREIGN KEY (`id_motivofalta`) REFERENCES `motivofalta` (`id`);

--
-- Restrições para tabelas `historicoassociado`
--
ALTER TABLE `historicoassociado`
  ADD CONSTRAINT `historicoassociado_ibfk_1` FOREIGN KEY (`id_setor`) REFERENCES `setor` (`id`),
  ADD CONSTRAINT `historicoassociado_ibfk_2` FOREIGN KEY (`id_engenharia`) REFERENCES `engenharia` (`id`);

--
-- Restrições para tabelas `motivofalta`
--
ALTER TABLE `motivofalta`
  ADD CONSTRAINT `motivofalta_ibfk_1` FOREIGN KEY (`id_tipofalta`) REFERENCES `tipofalta` (`id`);

--
-- Restrições para tabelas `permissao_grupousuario`
--
ALTER TABLE `permissao_grupousuario`
  ADD CONSTRAINT `permissao_grupousuario_ibfk_1` FOREIGN KEY (`id_permissao`) REFERENCES `permissao` (`id`),
  ADD CONSTRAINT `permissao_grupousuario_ibfk_2` FOREIGN KEY (`id_grupousuario`) REFERENCES `grupousuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
