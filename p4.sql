-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06-Maio-2019 às 00:05
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p4`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `concelho`
--

CREATE TABLE `concelho` (
  `idconcelho` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `distrito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `concelho`
--

INSERT INTO `concelho` (`idconcelho`, `nome`, `distrito`) VALUES
(1, 'Ponte de Lima', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contabilista`
--

CREATE TABLE `contabilista` (
  `idcontabilista` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `contacto` varchar(9) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contabilista`
--

INSERT INTO `contabilista` (`idcontabilista`, `nome`, `contacto`, `email`) VALUES
(1, 'Joaquim', '23123123', 'rafael@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `distrito`
--

CREATE TABLE `distrito` (
  `iddistrito` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `distrito`
--

INSERT INTO `distrito` (`iddistrito`, `nome`) VALUES
(1, 'Viana do Castelo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entidade`
--

CREATE TABLE `entidade` (
  `idEntidade` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `contacto` varchar(9) NOT NULL,
  `email` varchar(45) NOT NULL,
  `validade_contrato` date NOT NULL,
  `contacto_contabilista` varchar(9) NOT NULL,
  `observacoes` varchar(150) NOT NULL,
  `concelho` int(11) NOT NULL,
  `distrito` int(11) NOT NULL,
  `contabilista` int(11) NOT NULL,
  `programa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `entidade`
--

INSERT INTO `entidade` (`idEntidade`, `nome`, `contacto`, `email`, `validade_contrato`, `contacto_contabilista`, `observacoes`, `concelho`, `distrito`, `contabilista`, `programa`) VALUES
(1, 'Entidade1', '121212', 'rafael@miguel.com', '2019-05-22', '213123123', 'observacao1', 1, 1, 1, 1),
(2, 'Entidade2', '102012', 'rafael@miguel.com', '2019-05-16', '213213', 'asdasd', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs`
--

CREATE TABLE `logs` (
  `idlogs` int(11) NOT NULL,
  `datahora` datetime NOT NULL,
  `ip` varchar(45) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `programa`
--

CREATE TABLE `programa` (
  `idprograma` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `data_validade` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `programa`
--

INSERT INTO `programa` (`idprograma`, `nome`, `data_validade`) VALUES
(1, 'programa1', '2019-05-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `idtarefas` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `data_inicio` datetime NOT NULL,
  `data_fim` datetime NOT NULL,
  `observacao` varchar(150) NOT NULL,
  `entidade` int(11) NOT NULL,
  `tipo_tarefa_idtipo_tarefa` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tarefas`
--

INSERT INTO `tarefas` (`idtarefas`, `id_utilizador`, `data_inicio`, `data_fim`, `observacao`, `entidade`, `tipo_tarefa_idtipo_tarefa`, `updated_at`, `created_at`) VALUES
(1, 1, '2019-05-10 00:00:00', '2019-05-11 00:00:00', '21123213', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 4, '2019-05-04 17:17:16', '2019-05-04 17:17:16', '121212', 1, 1, '2019-05-04 17:17:16', '2019-05-04 17:17:16'),
(8, 4, '2019-05-04 17:24:34', '2019-05-04 17:24:34', 'asdasdd', 1, 1, '2019-05-04 17:24:34', '2019-05-04 17:24:34'),
(9, 4, '2019-05-04 17:25:03', '2019-05-04 17:25:03', 'sadasd', 1, 1, '2019-05-04 17:25:03', '2019-05-04 17:25:03'),
(10, 4, '2019-05-04 17:26:10', '2019-05-04 17:26:10', 'saasd', 1, 1, '2019-05-04 17:26:10', '2019-05-04 17:26:10'),
(11, 4, '2019-05-04 17:37:41', '2019-05-04 17:37:41', 'ewwerewqr', 1, 1, '2019-05-04 17:37:41', '2019-05-04 17:37:41'),
(12, 4, '2019-05-04 18:39:26', '2019-05-04 18:39:26', 'sadasd', 1, 1, '2019-05-04 18:39:26', '2019-05-04 18:39:26'),
(13, 5, '2019-05-04 19:35:38', '2019-05-04 19:35:38', '11121', 1, 1, '2019-05-04 19:35:38', '2019-05-04 19:35:38'),
(14, 5, '1970-01-01 00:00:00', '1970-01-01 00:00:00', 'bbb', 1, 1, '2019-05-04 19:41:22', '2019-05-04 19:41:22'),
(15, 5, '1970-01-01 00:00:00', '1970-01-01 00:00:00', 'bbb2', 1, 1, '2019-05-04 19:47:52', '2019-05-04 19:47:52'),
(16, 5, '1970-01-01 00:00:00', '1970-01-01 00:00:00', 'bbb3', 1, 1, '2019-05-04 19:51:00', '2019-05-04 19:51:00'),
(17, 5, '1970-01-01 00:00:00', '1970-01-01 00:00:00', 'bbb3', 1, 1, '2019-05-04 19:51:11', '2019-05-04 19:51:11'),
(18, 5, '1970-01-01 00:00:00', '1970-01-01 00:00:00', 'bbb3', 1, 1, '2019-05-04 19:51:14', '2019-05-04 19:51:14'),
(19, 5, '2019-05-04 19:51:52', '2019-05-04 19:51:52', 'bbb4', 1, 1, '2019-05-04 19:51:52', '2019-05-04 19:51:52'),
(20, 5, '2019-05-04 19:54:53', '2019-05-04 19:54:53', 'bbb5', 1, 1, '2019-05-04 19:54:53', '2019-05-04 19:54:53'),
(21, 5, '2019-05-04 19:55:59', '2019-05-04 19:55:59', 'bbb6', 1, 1, '2019-05-04 19:55:59', '2019-05-04 19:55:59'),
(22, 5, '2019-05-04 20:01:54', '2019-05-04 20:01:54', 'bbb8', 1, 1, '2019-05-04 20:01:54', '2019-05-04 20:01:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoutilizador`
--

CREATE TABLE `tipoutilizador` (
  `idTIPOUTILIZADOR` int(11) NOT NULL,
  `permissao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_tarefa`
--

CREATE TABLE `tipo_tarefa` (
  `idtipo_tarefa` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_tarefa`
--

INSERT INTO `tipo_tarefa` (`idtipo_tarefa`, `nome`) VALUES
(1, 'Demonstração'),
(2, 'Alerta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `ativo` binary(1) DEFAULT NULL,
  `remember_token` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) NOT NULL,
  `created_at` varchar(45) NOT NULL,
  `tipoutilizador_idTIPOUTILIZADOR` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `ativo`, `remember_token`, `updated_at`, `created_at`, `tipoutilizador_idTIPOUTILIZADOR`) VALUES
(4, 'rafael', '$2y$10$KC8sd7K0JqDalR0xhLgT/u8T86H1ANjZM9KKtqL3Ge41IHtoVa4ki', 'rafael.s@sapo.pt', NULL, NULL, '2019-05-04 14:41:54', '2019-05-04 14:41:54', 1),
(5, 'miguel', '$2y$10$rth7McJalDgRNZOQshX60eAqXNQLVimSy03Wo6uqBypsCHrM726sa', 'miguelpassos@ipvc.pt', NULL, NULL, '2019-05-04 19:35:01', '2019-05-04 19:35:01', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `concelho`
--
ALTER TABLE `concelho`
  ADD PRIMARY KEY (`idconcelho`,`distrito`),
  ADD KEY `fk_concelho_distrito1_idx` (`distrito`);

--
-- Indexes for table `contabilista`
--
ALTER TABLE `contabilista`
  ADD PRIMARY KEY (`idcontabilista`);

--
-- Indexes for table `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`iddistrito`);

--
-- Indexes for table `entidade`
--
ALTER TABLE `entidade`
  ADD PRIMARY KEY (`idEntidade`,`concelho`,`distrito`,`contabilista`,`programa`),
  ADD KEY `fk_entidade_concelho_idx` (`concelho`),
  ADD KEY `fk_entidade_distrito1_idx` (`distrito`),
  ADD KEY `fk_entidade_contabilista1_idx` (`contabilista`),
  ADD KEY `fk_entidade_programa1_idx` (`programa`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`idlogs`,`users_id`),
  ADD KEY `fk_logs_users1_idx` (`users_id`);

--
-- Indexes for table `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`idprograma`);

--
-- Indexes for table `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`idtarefas`,`entidade`,`tipo_tarefa_idtipo_tarefa`),
  ADD KEY `fk_tarefas_entidade1_idx` (`entidade`),
  ADD KEY `fk_tarefas_tipo_tarefa1_idx` (`tipo_tarefa_idtipo_tarefa`);

--
-- Indexes for table `tipoutilizador`
--
ALTER TABLE `tipoutilizador`
  ADD PRIMARY KEY (`idTIPOUTILIZADOR`);

--
-- Indexes for table `tipo_tarefa`
--
ALTER TABLE `tipo_tarefa`
  ADD PRIMARY KEY (`idtipo_tarefa`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTIPOUTILIZADOR`(`tipoutilizador_idTIPOUTILIZADOR`);
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `concelho`
--
ALTER TABLE `concelho`
  MODIFY `idconcelho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contabilista`
--
ALTER TABLE `contabilista`
  MODIFY `idcontabilista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `distrito`
--
ALTER TABLE `distrito`
  MODIFY `iddistrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `entidade`
--
ALTER TABLE `entidade`
  MODIFY `idEntidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `idlogs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programa`
--
ALTER TABLE `programa`
  MODIFY `idprograma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `idtarefas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tipoutilizador`
--
ALTER TABLE `tipoutilizador`
  MODIFY `idTIPOUTILIZADOR` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipo_tarefa`
--
ALTER TABLE `tipo_tarefa`
  MODIFY `idtipo_tarefa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `concelho`
--
ALTER TABLE `concelho`
  ADD CONSTRAINT `fk_concelho_distrito1` FOREIGN KEY (`distrito`) REFERENCES `distrito` (`iddistrito`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `entidade`
--
ALTER TABLE `entidade`
  ADD CONSTRAINT `fk_entidade_concelho` FOREIGN KEY (`concelho`) REFERENCES `concelho` (`idconcelho`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_entidade_contabilista1` FOREIGN KEY (`contabilista`) REFERENCES `contabilista` (`idcontabilista`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_entidade_distrito1` FOREIGN KEY (`distrito`) REFERENCES `distrito` (`iddistrito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_entidade_programa1` FOREIGN KEY (`programa`) REFERENCES `programa` (`idprograma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `fk_logs_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD CONSTRAINT `fk_tarefas_entidade1` FOREIGN KEY (`entidade`) REFERENCES `entidade` (`idEntidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tarefas_tipo_tarefa1` FOREIGN KEY (`tipo_tarefa_idtipo_tarefa`) REFERENCES `tipo_tarefa` (`idtipo_tarefa`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
