-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Nov-2022 às 22:05
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `restaurante`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `hast` varchar(100) NOT NULL,
  `novidades2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `telefone`, `hast`, `novidades2`) VALUES
(15, 'Wener Santos', 'wsfonseca3@gmail.com', '44984562393', '$2y$10$5P91XkbBsRRXi5VM1cV97uUpmwLP.EX6gTNYseVlJxdQRIc6ZgNFW', 'SIM'),
(16, 'ADMIN', 'admin@gmail.com', '123', '$2y$10$l1f4Ymox3XypnnSPZK8KqOAX8VmFBVcikJFk9Urg4AbRWkxRE97x2', 'NAO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pratos`
--

CREATE TABLE `pratos` (
  `id` int(11) NOT NULL,
  `nome` varchar(11) NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pratos`
--

INSERT INTO `pratos` (`id`, `nome`, `foto`) VALUES
(24, 'JAPONESES', 'https://www.elevenrio.com.br/storage/2020/01/assorted-japanesse-food-2323398.jpg'),
(25, 'TRADICIONAi', 'https://foodandroad.com/wp-content/uploads/2021/04/virado-paulista-brasil-1-1024x683.jpg'),
(26, 'AMERICANOS', 'https://inglestreinando.com/wp-content/uploads/2017/09/Pratos-dos-Estados-Unidos-panqueca-731x411.jpg'),
(27, 'BRASILEIRIN', 'https://imagens.usp.br/wp-content/uploads/pratodecomidafotomarcossantos003.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pratos`
--
ALTER TABLE `pratos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `pratos`
--
ALTER TABLE `pratos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
