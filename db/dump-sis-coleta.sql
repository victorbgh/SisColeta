-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Jul-2020 às 01:20
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sis-coleta`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `lugares_coleta`
--

CREATE TABLE `lugares_coleta` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `endereco` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `cep` text NOT NULL,
  `telefone` varchar(60) NOT NULL,
  `cidade` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `lugares_coleta`
--

INSERT INTO `lugares_coleta` (`id`, `nome`, `endereco`, `lat`, `lng`, `tipo`, `cep`, `telefone`, `cidade`) VALUES
(23, 'Carrefour Bairro', 'EQS 402/403 Área Especial S/N , 180 - Asa Sul', -15.809748, -47.884514, 'PEV', '70236400', '(61) 3321-7726', 'Brasília'),
(24, 'Supermercado Pão de Açúcar 406 sul', 'EQS 406/407, 0 - Asa Sul', -15.819914, -47.894588, 'PEV', '70255400', '(61) 3244-8556', 'Brasília'),
(25, 'Supermercado Pão de Açúcar 309 sul', 'SHCS EQS 308/309, 0 - Asa Sul', -15.814491, -47.907459, 'PEV', '70355400', '(61) 32449-915', 'Brasília '),
(26, 'RENOV', 'Avenida das Nações, 0 - Lago Sul', -15.839411, -47.906651, 'Cooperativas', '70200004', '(61) 99238-4128', 'Brasília '),
(27, 'Reciclagem Rio Campos Ltda.', 'QI 6 lote 36/38, 0 - Taguatingua', -15.809574, -48.071148, 'Comércios', '72135060', '(61) 35413-1212', 'Brasília '),
(28, 'Administração Regional de Ceilândia', 'QNM 13, 0 - Ceilândia', -15.811192, -48.091560, 'PEV', '72720640', '(61) 3471-9833', 'Brasília'),
(29, 'Val Reciclagem', 'Rua Minas Gerais Qd 06 Lot 07 , 0 - Residêncial Santana', -16.064671, -48.010990, 'lixo hospitalar', '72870211', '(61) 99185-3531', 'Valparaíso de Goiás - GO'),
(30, 'Planalto Ambiental', 'Area Especial 1, 2 e 3 Setor de Expansão Econômica (Area da SLU)', -15.657325, -47.783798, 'lixo hospitalar', '73025040', '(61) 3462-1026', 'Brasília'),
(31, 'Supermercado Pão de Açúcar Sudoeste', 'CCSW 6, 4 - Sudoeste', -15.796130, -47.930183, 'PEV', '71505000', '(61) 33412-900', 'Brasília '),
(32, 'Carrefur Bairro - 311 Sul', 'SHC/SUL 310/311, Bloco A, 0 - Asa Sul', -15.818495, -47.912857, 'PEV', '70364000', '(08) 00724-2822', 'Brasília '),
(33, 'Campus Universitário de Brasília- UniCEUB', 'SEPN 707/907, 0 - ASA NORTE', -15.766331, -47.894604, 'PEV', '70790075', '(61) 39661-200', 'Brasília'),
(35, 'Estação de Metarreciclagem', ' Quadra 34 - Área Especial 2 - Etapa B, Valparaíso de Goiás - GO', -16.071371, -47.973026, 'Lixo eletrônico', '72445060', '(61) 3559-1111', 'Valparaíso de Goiás - GO'),
(38, 'Acapas', 'Sgan, 23 - Asa Norte', -15.772127, -47.912430, 'Cooperativas', '70297400', '(61) 99955-9567', 'Brasília ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `email` text NOT NULL,
  `senha` text NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `admin`) VALUES
(16, 'valdemar', 'valdemar@hotmail.com', 'MTIz', 0),
(17, 'admin', 'admin', 'MTIz', 1),
(18, 'usuario comum', 'usucomum@hotmail.com', 'MTIz', 0),
(19, 'victor', 'victor', 'MTIz', 0),
(31, 'drake', 'drake', 'ZHJha2U=', 0),
(32, 'tumdum', 'tumdum', 'dHVtZHVt', 1),
(33, 'testetop', 'testetop', 'dGVzdGV0b3A=', 0),
(34, 'fefe', 'effefe', 'MTIz', 0),
(35, 'uhuhuh', 'uhuhuh', 'dWh1aHVo', 0),
(36, 'marilia', 'marilia', 'bWFyaWxpYQ==', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `lugares_coleta`
--
ALTER TABLE `lugares_coleta`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `lugares_coleta`
--
ALTER TABLE `lugares_coleta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
