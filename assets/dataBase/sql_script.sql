SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "-03:00";

--
-- Criação da Base
--

CREATE DATABASE IF NOT EXISTS `newslleter_mindtech_ghac` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `newslleter_mindtech_ghac`;
--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios`(
  `email` varchar(255) NOT NULL PRIMARY KEY,
  `inscrito` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`email`, `inscrito`) VALUES
('gustavo_h.a.c@hotmail.com', 0),
('email@.com', 1);

--
-- Adição separada de índices da tabela `usuarios`
--
-- ALTER TABLE `usuarios`
--   ADD PRIMARY KEY (`email`);