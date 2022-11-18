-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 09-Ago-2021 às 15:31
-- Versão do servidor: 8.0.20-0ubuntu0.20.04.1
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `help`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamados`
--

CREATE TABLE `chamados` (
  `idchamado` int NOT NULL,
  `idusuario` int NOT NULL,
  `data` date NOT NULL,
  `setorcall` varchar(25) NOT NULL,
  `solicitacao` varchar(30) NOT NULL,
  `descricao` varchar(800) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `problema` varchar(40) NOT NULL,
  `numaquina` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` varchar(10) NOT NULL,
  `data_resolvido` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `chamados`
--

INSERT INTO `chamados` (`idchamado`, `idusuario`, `data`, `setorcall`, `solicitacao`, `descricao`, `problema`, `numaquina`, `status`, `data_resolvido`) VALUES
(4, 60, '2017-08-11', 'tecnico', 'secinfo', 'o teclado esta faltando algumas peças', 'teclado', 'ECT-SECINFO-01', 'Pendente', '2017-08-11'),
(96, 2, '2021-08-09', 'usuario', 's1', 'internet ruim', 'sem net', 'ECT-S1-01', 'Resolvido', '2021-08-08'),
(98, 1, '2021-08-09', 'administrativo', 'admin', 'O token não está sendo reconhecido', 'Verificar token', ' ECT-COT-04', 'Pendente', '2021-08-08'),
(99, 1, '2021-08-09', 'administrativo', 'admin', 'A impressora não conecta', 'Impressora', ' ECT-GARAG-01', 'Pendente', '2021-08-08'),
(100, 2, '2021-08-09', 'usuario', 's1', 'Meu monitor queimou', 'Monitor', ' ECT-S1-03', 'Pendente', '2021-08-08'),
(101, 76, '2021-08-09', 'usuario', 'ordenanca', 'O chefe não consegue usar o wifi.', ' Internet', ' ECT-CHEFE-01', 'Resolvido', '2021-08-08'),
(102, 76, '2021-08-09', 'usuario', 'ordenanca', 'O Subchefe solicita que atualizem o windows.', ' Atualização', ' ECT-CHEFE-02', 'Pendente', '2021-08-08'),
(103, 76, '2021-08-09', 'usuario', 'ordenanca', 'Não consigo imprimir', 'Impressora', ' ECT-CHEFE-01', 'Pendente', '2021-08-08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `confirma`
--

CREATE TABLE `confirma` (
  `idchamado2` int NOT NULL,
  `idconfirma` int NOT NULL,
  `idusuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `confirma`
--

INSERT INTO `confirma` (`idchamado2`, `idconfirma`, `idusuario`) VALUES
(3, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `setor` varchar(40) NOT NULL,
  `datacadastro` date NOT NULL,
  `dados_status` varchar(10) NOT NULL,
  `data_exclusao` date NOT NULL,
  `primeira_vez` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `email`, `login`, `senha`, `setor`, `datacadastro`, `dados_status`, `data_exclusao`, `primeira_vez`) VALUES
(1, 'admin', 'ramalho.sit@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrativo', '2021-08-08', 'ativo', '2021-03-01', 0),
(2, 's1', 's1@ect.eb.mil.br', 's1', 'b3116a7bcc1c58745d7730dbeabfe653', 'usuario', '2021-08-08', 'ativo', '2021-03-01', 0),
(3, 'secinfo', 'secinfo@ect.eb.mil.br', 'secinfo', '4666e66fe94fa4c02eef0e3849836ed8', 'tecnico', '2021-08-08', 'ativo', '2021-03-01', 0),
(61, 's2', 's2@ect.eb.mil.br', 's2', 'b3116a7bcc1c58745d7730dbeabfe653', 'usuario', '2021-08-08', 'ativo', '2021-03-01', 0),
(62, 's3', 's3@ect.eb.mil.br', 's3', 'b3116a7bcc1c58745d7730dbeabfe653', 'usuario', '2021-08-08', 'ativo', '2021-03-01', 0),
(63, 's4', 's4@ect.eb.mil.br', 's4', 'b3116a7bcc1c58745d7730dbeabfe653', 'usuario', '2021-08-08', 'ativo', '2021-03-01', 0),
(64, 'salc', 'salc@ect.eb.mil.br', 'salc', 'b3116a7bcc1c58745d7730dbeabfe653', 'usuario', '2021-08-08', 'ativo', '2021-03-01', 0),
(65, 'spp', 'spp@ect.eb.mil.br', 'spp', 'b3116a7bcc1c58745d7730dbeabfe653', 'usuario', '2021-08-08', 'ativo', '2021-03-01', 0),
(66, 'setfin', 'setfin@ect.eb.mil.br', 'setfin', 'b3116a7bcc1c58745d7730dbeabfe653', 'usuario', '2021-08-08', 'ativo', '2021-03-01', 0),
(67, 'almox', 'almox@ect.eb.mil.br', 'almox', 'b3116a7bcc1c58745d7730dbeabfe653', 'usuario', '2021-08-08', 'ativo', '2021-03-01', 0),
(68, 'scg', 'scg@ect.eb.mil.br', 'scg', 'b3116a7bcc1c58745d7730dbeabfe653', 'usuario', '2021-08-08', 'ativo', '2021-03-01', 0),
(69, 'saude', 'saude@ect.eb.mil.br', 'saude', 'b3116a7bcc1c58745d7730dbeabfe653', 'usuario', '2021-08-08', 'ativo', '2021-03-01', 0),
(70, 'sect', 'sect@ect.eb.mil.br', 'sect', 'b3116a7bcc1c58745d7730dbeabfe653', 'usuario', '2021-08-08', 'ativo', '2021-03-01', 0),
(72, 'aprov', 'aprov@ect.eb.mil.br', 'aprov', 'b3116a7bcc1c58745d7730dbeabfe653', 'usuario', '2021-08-08', 'ativo', '2021-03-01', 0),
(73, 'ccap', 'ccap@ect.eb.mil.br', 'ccap', 'b3116a7bcc1c58745d7730dbeabfe653', 'usuario', '2021-08-08', 'ativo', '2021-03-01', 0),
(74, 'ctransp', 'ctransp@ect.eb.mil.br', 'ctransp', 'b3116a7bcc1c58745d7730dbeabfe653', 'usuario', '2021-08-08', 'ativo', '2021-03-01', 0),
(75, 'sgci', 'sgci@ect.eb.mil.br', 'sgci', 'b3116a7bcc1c58745d7730dbeabfe653', 'usuario', '2021-08-08', 'ativo', '2021-03-01', 0),
(76, 'ordenanca', 'ordenanca@ect.eb.mil.br', 'ordenanca', 'b3116a7bcc1c58745d7730dbeabfe653', 'usuario', '2021-08-08', 'ativo', '2021-03-01', 0),
(77, 'rp', 'rp@ect.eb.mil.br', 'rp', 'b3116a7bcc1c58745d7730dbeabfe653', 'usuario', '2021-08-08', 'ativo', '2021-03-01', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`idchamado`);

--
-- Índices para tabela `confirma`
--
ALTER TABLE `confirma`
  ADD PRIMARY KEY (`idconfirma`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chamados`
--
ALTER TABLE `chamados`
  MODIFY `idchamado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de tabela `confirma`
--
ALTER TABLE `confirma`
  MODIFY `idconfirma` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
