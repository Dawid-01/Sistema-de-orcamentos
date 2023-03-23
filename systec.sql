-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Ago-2019 às 02:26
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `systec`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `cargo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`id`, `cargo`) VALUES
(1, 'FuncionÃ¡rio'),
(2, 'Administrador'),
(3, 'Gerente'),
(4, 'Tesoureiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `endereco` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `telefone`, `endereco`, `email`, `cpf`, `data`) VALUES
(3, 'Hugo Vasconcelos', '31975275084', 'Rua 8', 'hugovasconcelosf@hotmail.com', '555', '2019-08-13'),
(4, 'Marcos Pedro', '3197555555', 'Rua 9', 'marcos@hotmail.com', '555.555.555-55', '2019-08-13'),
(9, 'Mauricio', '(22) 22222-2222', 'Rua 5', 'mauricio@hotmail.com', '122.222.222-22', '2019-08-14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `cpf` varchar(18) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `endereco` varchar(35) NOT NULL,
  `cargo` varchar(20) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `cpf`, `telefone`, `endereco`, `cargo`, `data`) VALUES
(4, 'Hugo Vasconcelos', '555.555.555-55', '(55) 55555-5555', 'Rua 7', 'Administrador', '2019-08-14'),
(5, 'Paloma', '444.444.444-45', '(55) 55555-5555', 'Rua C', 'Tesoureiro', '2019-08-14'),
(7, 'Marcela', '000.000.000-00', '(11) 11111-1111', 'Rua C', 'FuncionÃ¡rio', '2019-08-14'),
(8, 'Marcos Pedro', '888.888.888-88', '(88) 88888-8888', 'Rua A', 'FuncionÃ¡rio', '2019-08-19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamentos`
--

CREATE TABLE `orcamentos` (
  `id` int(11) NOT NULL,
  `cliente` varchar(25) NOT NULL,
  `tecnico` varchar(25) NOT NULL,
  `produto` varchar(25) NOT NULL,
  `serie` varchar(30) DEFAULT NULL,
  `problema` varchar(255) NOT NULL,
  `laudo` varchar(255) DEFAULT NULL,
  `obs` varchar(255) DEFAULT NULL,
  `valor_servico` decimal(10,2) DEFAULT NULL,
  `pecas` varchar(255) DEFAULT NULL,
  `valor_pecas` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `desconto` decimal(10,2) DEFAULT NULL,
  `valor_total` decimal(10,2) DEFAULT NULL,
  `pgto` varchar(20) DEFAULT NULL,
  `data_abertura` date NOT NULL,
  `data_geracao` date DEFAULT NULL,
  `data_aprovacao` date DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `orcamentos`
--

INSERT INTO `orcamentos` (`id`, `cliente`, `tecnico`, `produto`, `serie`, `problema`, `laudo`, `obs`, `valor_servico`, `pecas`, `valor_pecas`, `total`, `desconto`, `valor_total`, `pgto`, `data_abertura`, `data_geracao`, `data_aprovacao`, `status`) VALUES
(4, '555', '7', 'Celular J3 Preto', '12345', 'NÃ£o Liga', 'Processador Queimado', 'Tela Arranhada', '150.00', 'Processador', '260.00', '410.00', '0.00', '410.00', NULL, '2019-08-19', '2019-08-20', NULL, 'Aguardando'),
(5, '555.555.555-55', '7', 'Celular Galaxy S3', '2265656', 'Sem Som', NULL, 'Tricado na Tela', NULL, NULL, NULL, NULL, NULL, '0.00', NULL, '2019-08-19', NULL, NULL, 'Aberto'),
(6, '122.222.222-22', '8', 'Iphone', '02545', 'Sem Aumento Brilho', 'Tela com defeito, precisa de troca', 'Nenhuma', '150.00', 'Tela original para Samsung', '300.00', NULL, '0.00', '450.00', NULL, '2019-08-19', '2019-08-19', NULL, 'Aguardando'),
(7, '555', '8', 'Celular XXXX', '1215155', 'Tela Quebrada', NULL, 'Nenhuma', NULL, NULL, NULL, NULL, NULL, '0.00', NULL, '2019-08-19', NULL, NULL, 'Aberto'),
(9, '122.222.222-22', '7', 'Celular Galaxy S3', '265220', 'Tela Rachada', ' Foi preciso colocar uma tela original', 'Botao afundado', '100.00', 'Tela original', '260.00', '360.00', '0.00', '360.00', NULL, '2019-08-20', '2019-08-20', NULL, 'Aguardando');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `cargo` varchar(25) NOT NULL,
  `id_funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `cargo`, `id_funcionario`) VALUES
(1, 'Administrador', 'admin', '123', 'Administrador', 0),
(8, 'Hugo Vasconcelos', 'hugo', '123', 'Administrador', 4),
(9, 'Paloma', 'paloma', '123', 'Tesoureiro', 5),
(11, 'Marcela', 'marcela', '123', 'FuncionÃ¡rio', 7),
(12, 'Marcos Pedro', 'marcos', '123', 'FuncionÃ¡rio', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orcamentos`
--
ALTER TABLE `orcamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orcamentos`
--
ALTER TABLE `orcamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
