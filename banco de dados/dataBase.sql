-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/06/2023 às 17:21
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `database`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `evento`
--

CREATE TABLE `evento` (
  `id` int(11) NOT NULL,
  `data_registro` date DEFAULT NULL,
  `data_lembrete` date DEFAULT NULL,
  `nome` varchar(30) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `mensagem` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `evento`
--

INSERT INTO `evento` (`id`, `data_registro`, `data_lembrete`, `nome`, `id_usuario`, `mensagem`) VALUES
(1, '2023-06-05', '2023-06-10', 'namoro', 2, NULL),
(15, '0000-00-00', '2023-06-30', '', 2, 'A medida do amor é amar sem medida.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `nome_companheiro` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `endereco` text DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `foto_do_usuario` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `nome_companheiro`, `login`, `senha`, `email`, `data_nascimento`, `endereco`, `telefone`, `sexo`, `foto_do_usuario`) VALUES
(1, 'marcos', 'walter white', 'marcos', '12345', 'teste@gmail.com', '0000-00-00', 'Rua adelina monteira', '40028922', '1', NULL),
(2, 'willian', 'inês', 'kennedy', '01234', 'exemplo@gmail.com', '2003-10-02', 'xx xxxxxxxxxxxxxxxx', '0000000000000000000', 'M', 0x89504e470d0a1a0a0000000d494844520000007f0000007f0803000000f163ed2100000072504c5445ffffff000000fcfcfcf9f9f9f6f6f6f2f2f2d6d6d6e9e9e9ededede4e4e4dbdbdb5e5e5ecececeb3b3b3acacac878787949494c8c8c8bcbcbcc2c2c27a7a7a575757636363a1a1a15050504141419a9a9a6969698080806e6e6e3c3c3c8d8d8d2a2a2a33333348484810101021212118181823f58e8d00000768494441546881ed5be776abbc12c52a8004886e7a8df3feaf782902e4c4a61c64b2ee5adffc884b305b1acdec29128af29f4810e8587f8aef946d0aff0edefca27a9bff193c345245c145fe571a704b5d211819d51fe1174e67804881ddeb5f08fe5615d2afbe16fa7f81efc548f1a2fe1d09e91fe0e79dda2b7378eb17d7c3ebaddb9900193fd8e6e5f8668d145270dfd3737435be73efc630938fa35e8ddf788ac2d2e9138d2e86574b4d51d239fca0abe340d5ab3e5fccceba7601f4a68306d9e2f7f4da486c95dd1f186af317280517c28398f598a159cd7e97e20bf1cd920cf8c6cd9dbe6257727036843c70bfa773ecf3bdebe0d5c7c8bb5453cb88afc0850c409305cbca0b755879bdbac80031ab9fa0a2c2e8b501ed6b0c508d4bf7c7576eef0c8a7d850192e2c1de30adf373581f10af0edeced2fab801e2a259c9f4b4fb870dd08ca774e7a580fca30600a2ef74fd0adf1e5f75e9b9108058bd275b1116843d056216c9c387d46769951746720bb4cdabfba048b24a46260235eab23cf9aee37b9157a9e5eb6f2f4533efc02c329bd36100e82a0b8ca46eda80991a86eb560d581cdbd3e0e8233949027e1036b7daa89849f6a991dd3a89f9dac0243e07efd639f3a97e6005931eff36466160a9f9b95a34bd1ffc011ae06fcdf081a85d5ed87989e6a5d5bf15447e8bb1eaba2ad1777219788c03185caeff0dcbfc2c0e18fd371fd46b9f3a7911374956796b64374b20e0f7c26e99bfeda96f251d3509343f2a92d2d9d622ad0703e49f4cc7cb4f8521ad61d35ba09b7952f85b0bd13bc0f71896a069e2b3b5b8ff25ce195961bca5033f08f8250355d0932e689722d5b9f7ef599fd8f55f9a047852d1597c941982ed0a093e6d6fb7c77695651ae7f015d4060bff6063b2071cf686f6b519e3997d12bf3369a1a367155cbbeae868730ea0b9af5d3c602fbf3e3480c7c2a26ac895e18ef89c20a17dbbbd344c24a317662e03d05a3e4d3e7f635407ca1bfba5679a7719e1dffd9aca69c07878c763a499bdfb0d2f541b49da4ea175f133e37006fc8df4424f76b1f68e0118b5f53c456474f05b451e0be4c07762c54daa8a360ecdcd260f8925e6e0d8321e716e1d692c54927723901bd9c9fece122ddfa7a9ff2c69a4a07d3e85ee1fe881e8411879fbb219477a1b5c63f730eee2d1aef9bbe189c4e795d0bc369866b6c4db6382b494dc848f42d64f88de7615b63494bdf864605ed5b8ed710033f9cc3698ff70bd78b3b3041ddb3c1f77b988f994d9aa5d55b599d2420234398107587651d813e7c121fb74bf7634d7f5d7f1f8a06859e053eaa6d96873643469566fa6e10acc65f4ff0a4ee090c5a2d5b147e1918d21d81222af1fce4c873331d6ea69d834edbdc8edf4dd5ac8e8ffd98211a1e2c9a210313d56d44c7dc785ecfc0e0830c439a0df8c12ada417eee9c45b01cf018cfe2474705f9923c9ce3b40f47c8fea473783242b4c8c8cf30e80c35c1c00499e17db6f57a60802095b70a4158f5380e2d9a6abd5ec3295c1c0301431ac279b028f551773a5e4be24116c908ab5f070e06345b4bb941d10b35950602b20a27043c1869c3dd8500877ad40aa56fd360dc4c37f6c3921d80b97f7f1322554bebf3d1de2947fb47bf85a7401345c72ba347c9f05e3a15cd512399df76299e882af3fd64ed90c2d6850c8398863650bfeac8a6ab5afc306cff40a295b40b499f5382f8556aece8d0ed9274ea45400b899697eae67d370756aeeb82f6748c9c1853038f91f2ad7ef1c9683d34a2affab39979f14ea35ebdc168ddd6ab595720cc59a0a49c8f1a1b191829b6364407228d09c5c1d2523ff9af5866151eeb2b9140ad4a665d739ff675b7d0dcc71e518006c39ede0115fdb2c40223e403596428186f584ef6ca576783a09846b29fd37bb12f1f55f270e7e8a35e5a56073bb6097589c6cd160fffe63e372dd9eb52ea1fdacf4ed4faef021e12db6327bbc2cfa5a85b05ff4922f631fff6073a0b2f2ce6e3f8c1270bee92b00f3485451b79b157bc4e36d7437ee8de100a96a723ab0a8193d1e751597736449612ce7188ccd0985269e7da8b3b456221e1052723daaededd09e7620e9180e0bb921a1e2904b39e7cbf0414036ddc85a497c7f4b24ab098cb260c4a5cd114eb7e414014adff9ce0627006ba79e7ee3cb21a0f15eb16d76be1f1cd9d59089af202bc8f228a80ffc8449d3ff28c474adef039c1665dbd71c95ad272cc4ecc4f9c003315eb21a54b0581b1c63cb7d02d6b73d8938e5e213c710abf0d7576421252a12a4f18983e064a200308762b6245aa6800fa46fc30c92f26d78346f0afb8b4ac4c6176e3ff22808aef974e72623594a3d4fc0d7dbcf9cc2f41f23f09c5feae11c15c42ea12aa705f05b827105e863aac8975293092ee7cb29807e0b32ee432d94f3c9c2fbbcd091404ff2f76027c1e19091109e198af88bcbc303bbe54745cf8623b09c0b6036e3db0b66547ef0143ab0eb5457f0b83305667c285842fdd907b1fc2689b0d90c261e4c598936cfd9dab5557b6e0459137ff5050998d23318f07d2a527c5ff01010e8128230207a951946a46aba9a352ed134d5cb9be2aa475070de341502ae1d2649cbfae3c265135ff90c1ed0c7be10c243e90df8eb7ff27f22ff03ed595b4f5b170ecc0000000049454e44ae426082);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
