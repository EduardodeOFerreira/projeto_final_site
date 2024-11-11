-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/10/2024 às 12:06
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_tiodupetservice`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamento`
--

CREATE TABLE `agendamento` (
  `id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `foto_pet` varchar(255) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `servico_id` int(11) DEFAULT NULL,
  `veterinario_id` int(11) DEFAULT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fim` time NOT NULL,
  `data` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Agendado',
  `observacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agendamento`
--

INSERT INTO `agendamento` (`id`, `pet_id`, `foto_pet`, `cliente_id`, `servico_id`, `veterinario_id`, `hora_inicio`, `hora_fim`, `data`, `status`, `observacoes`) VALUES
(12, 2, 'uploads/pipo.png', 5, 1, 2, '19:44:00', '21:44:00', '2024-10-24', 'Agendado', NULL),
(13, 6, 'uploads/pet1.png', 2, 3, 1, '20:47:00', '23:47:00', '2024-10-26', 'Agendado', NULL),
(14, 10, 'uploads/dog_center2.jfif', 1, 1, 3, '21:49:00', '23:49:00', '2024-10-30', 'Agendado', NULL),
(15, 5, 'uploads/mimi.png', 3, 2, 2, '19:51:00', '23:51:00', '2024-10-31', 'Agendado', NULL),
(20, 1, 'uploads/Mel.jpg', 6, 2, NULL, '12:34:00', '13:34:00', '2024-10-22', 'Agendado', NULL),
(22, 5, '', 3, 1, 1, '21:44:00', '00:45:00', '2024-10-31', 'Agendado', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao_aprovadas`
--

CREATE TABLE `avaliacao_aprovadas` (
  `id` int(11) NOT NULL,
  `nome_avaliador` varchar(255) NOT NULL,
  `estrelas` int(11) DEFAULT NULL CHECK (`estrelas` between 1 and 5),
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `avaliacao_aprovadas`
--

INSERT INTO `avaliacao_aprovadas` (`id`, `nome_avaliador`, `estrelas`, `descricao`) VALUES
(1, 'Avaliador', 5, 'Ficou TOP!!!');

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao_recusadas`
--

CREATE TABLE `avaliacao_recusadas` (
  `id` int(11) NOT NULL,
  `nome_avaliador` varchar(255) NOT NULL,
  `estrelas` int(11) DEFAULT NULL CHECK (`estrelas` between 1 and 5),
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `avaliacao_recusadas`
--

INSERT INTO `avaliacao_recusadas` (`id`, `nome_avaliador`, `estrelas`, `descricao`) VALUES
(3, 'Avaliador3', 3, 'Precisa melhorar ');

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao_solicitadas`
--

CREATE TABLE `avaliacao_solicitadas` (
  `id` int(11) NOT NULL,
  `nome_avaliador` varchar(255) NOT NULL,
  `estrelas` int(11) DEFAULT NULL CHECK (`estrelas` between 1 and 5),
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `avaliacao_solicitadas`
--

INSERT INTO `avaliacao_solicitadas` (`id`, `nome_avaliador`, `estrelas`, `descricao`) VALUES
(2, 'Avaliador2', 5, 'Muito bom'),
(3, 'Teste', 5, 'ok');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(50) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `cpf`, `telefone`, `email`, `endereco`, `numero`, `complemento`, `bairro`, `cep`, `cidade`, `estado`) VALUES
(1, 'Saulo Costa Silva', '2468626778', '19991721651', 'saulo.c@gmail.com', 'rua 4', '76', 'apartamento 9', 'Guanabara', '13100000', 'Campinas', 'SP'),
(2, 'Pedro Henrique Ferreira', '2354567891', '19991721443', 'phf@gmail.com', 'rua Francisco Pompeo de Camargo', '543', '96B', 'Guanabara', '131000000', 'Campinas', 'Sã'),
(3, 'Eduardo de Oliveira Ferreira', '25797178893', '19991739581', 'eduardo.24121973@gmail.com', 'Padre Francisco de Abreu Sampaio', '269', '', 'Parque da Figueira', '13036-140', 'Campinas', 'Sã'),
(4, 'Jardel Foresto', '24686267784', '19991723651', 'jardel.f@gmail.com', 'rua 9', '635', NULL, 'Vila São Jorge', '13100000', 'Campinas', 'SP'),
(5, 'Camila Castillo', '23686267784', '19991781651', 'camila.c@gmail.com', 'rua 8', '937', 'apartamento 66', 'Von Zuben', '13100000', 'Campinas', 'SP'),
(6, 'Katia Vicario', '24686267982', '19991721659', 'katia.v@gmail.com', 'rua 1', '853', 'apartamento 66', 'Centro', '13100000', 'Campinas', 'SP');

-- --------------------------------------------------------

--
-- Estrutura para tabela `lead`
--

CREATE TABLE `lead` (
  `id` int(11) NOT NULL,
  `servico` varchar(255) NOT NULL,
  `data_lead` datetime DEFAULT current_timestamp(),
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contato_prefere` enum('email','telefone','whatsapp') NOT NULL,
  `horario_prefere` enum('manha','tarde') NOT NULL,
  `receber_novidades` tinyint(1) DEFAULT 0,
  `consentimento_dados` tinyint(1) DEFAULT 0,
  `data_consentimento` datetime NOT NULL,
  `politica_privacidade` varchar(255) NOT NULL,
  `lead_contatado` enum('Sim','Não') DEFAULT 'Não'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `lead`
--

INSERT INTO `lead` (`id`, `servico`, `data_lead`, `nome`, `telefone`, `email`, `contato_prefere`, `horario_prefere`, `receber_novidades`, `consentimento_dados`, `data_consentimento`, `politica_privacidade`, `lead_contatado`) VALUES
(1, 'Hospedagem', '2024-10-16 01:42:05', 'LeatTeste', '19912345678', 'lead@email.com', 'whatsapp', 'manha', 1, 1, '2024-10-16 01:42:05', 'https://link-da-politica-de-privacidade.com', 'Não');

-- --------------------------------------------------------

--
-- Estrutura para tabela `matricula_creche`
--

CREATE TABLE `matricula_creche` (
  `id` int(11) NOT NULL,
  `id_servico` int(11) DEFAULT NULL,
  `id_pet` int(11) DEFAULT NULL,
  `id_veterinario` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `data_matricula` date DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT NULL,
  `horario_entrada` time DEFAULT NULL,
  `horario_saida` time DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `observacao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pet`
--

CREATE TABLE `pet` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `veterinario_id` int(11) NOT NULL,
  `foto_pet` varchar(255) DEFAULT NULL,
  `nome` varchar(50) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `especie` varchar(30) NOT NULL,
  `raca` varchar(50) DEFAULT NULL,
  `cor` varchar(50) DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  `porte` varchar(20) DEFAULT NULL,
  `rga` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pet`
--

INSERT INTO `pet` (`id`, `cliente_id`, `veterinario_id`, `foto_pet`, `nome`, `sexo`, `especie`, `raca`, `cor`, `idade`, `porte`, `rga`) VALUES
(1, 2, 2, 'pet_1.jpg', 'Mel', 'Fêmea', 'cachorro', 'schnauzer', 'Marrom', 1, 'pequeno', '87654321'),
(2, 5, 2, 'pet_2.png', 'Pipo', 'macho', 'cachorro', 'vira lata', 'preto', 3, 'médio', '12345678'),
(4, 4, 3, NULL, 'Caramelo', 'macho', 'cachorro', 'cocker spaniel', 'bege', 4, 'pequeno', '1836785474'),
(5, 3, 1, 'pet_5.png', 'Mimi', 'Fêmea', 'cachorro', 'shitzu', 'branca', 5, 'pequeno', '1836785474'),
(6, 2, 2, NULL, 'Thor', 'Macho', 'cachorro', 'pitbul', 'branca', 5, 'médio', '22345678'),
(10, 1, 3, NULL, 'Pingo', 'Macho', 'cachorro', 'chou-chou', 'marrom', 3, 'pequeno', '12349678'),
(12, 6, 3, 'pet_12.jpg', 'Malhado', 'Macho', 'Canina', 'angora', 'Bege', 3, 'pequeno', '876123645'),
(31, 1, 1, 'pet_31.jpg', 'Teste', 'Macho', 'TESTE', 'TESTE', 'TESTE', 5, 'Pequeno', '123456');

-- --------------------------------------------------------

--
-- Estrutura para tabela `servico`
--

CREATE TABLE `servico` (
  `id` int(10) NOT NULL,
  `servico` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `servico`
--

INSERT INTO `servico` (`id`, `servico`, `tipo`, `preco`) VALUES
(2, 'Diária', 'Hospedagem', 100.00),
(3, 'Passeio Plus', 'Pet Sitter', 30.00),
(4, 'Creche-Mensal', 'Creche', 600.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `funcao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `funcao`) VALUES
(1, 'Teste Usuário', 'master', '$2y$10$Cem/2C3LYH5wVcEsJ5aUmuH.HmZMyg/J/ehIVv5hPAEZIl7grIkhG', 'admin');

-- --------------------------------------------------------

--
-- Estrutura para tabela `veterinario`
--

CREATE TABLE `veterinario` (
  `id` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(50) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `veterinario`
--

INSERT INTO `veterinario` (`id`, `nome`, `telefone`, `email`, `endereco`, `numero`, `complemento`, `bairro`, `cep`, `cidade`, `estado`) VALUES
(1, 'Dr Heitor Millo', '19991721657', 'heitor.m@gmail.com', 'rua 7', '863', 'apartamento 2', 'Parque Itália', '13036140', 'Campinas', 'SP'),
(2, 'Dr Paulo Coelho', '19996544321', 'pc@gmail.com', 'rua Papa Paulo VI', '569', '96B', 'Vila Itatiaia', '131000000', 'Campinas', 'Sã'),
(3, 'Dr José Carlos', '19991721777', 'jc@gmail.com', 'rua Pedro Domingues Vita', '269', '96B', 'Parque Itália', '13036-140', 'Campinas', 'SP');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_veterinario_id` (`veterinario_id`),
  ADD KEY `fk_pet_id` (`pet_id`),
  ADD KEY `fk_servico_id` (`servico_id`),
  ADD KEY `fk_cliente_id` (`cliente_id`);

--
-- Índices de tabela `avaliacao_aprovadas`
--
ALTER TABLE `avaliacao_aprovadas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `avaliacao_recusadas`
--
ALTER TABLE `avaliacao_recusadas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `avaliacao_solicitadas`
--
ALTER TABLE `avaliacao_solicitadas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices de tabela `lead`
--
ALTER TABLE `lead`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `matricula_creche`
--
ALTER TABLE `matricula_creche`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cliente_id_pet` (`cliente_id`),
  ADD KEY `fk_veterinario_id_pet` (`veterinario_id`);

--
-- Índices de tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Índices de tabela `veterinario`
--
ALTER TABLE `veterinario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `avaliacao_aprovadas`
--
ALTER TABLE `avaliacao_aprovadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `avaliacao_recusadas`
--
ALTER TABLE `avaliacao_recusadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `avaliacao_solicitadas`
--
ALTER TABLE `avaliacao_solicitadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `lead`
--
ALTER TABLE `lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `matricula_creche`
--
ALTER TABLE `matricula_creche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `veterinario`
--
ALTER TABLE `veterinario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
