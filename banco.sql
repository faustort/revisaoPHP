-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Out-2024 às 02:47
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.5

START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `aulaphp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `id_not` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`id_not`, `titulo`, `descricao`, `imagem`) VALUES
(5, 'Noticia Teste', 'Teste de notícia', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `email`, `senha`) VALUES
(1, 'fausto@fausto.com', 'A48F8581BD83B4CC076CBD19A59EEC27'),
(2, 'roberto@roberto.com', '019D35F792A6C5DE15ECA869C3DD7CE4'),
(3, 'juana@juana.com', 'a48f8581bd83b4cc076cbd19a59eec27');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_not`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_not` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
