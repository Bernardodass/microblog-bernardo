-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/06/2024 às 22:26
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `microblog_bernardo`
--
CREATE DATABASE IF NOT EXISTS `microblog_bernardo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `microblog_bernardo`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp(),
  `titulo` varchar(150) NOT NULL,
  `texto` tinytext NOT NULL,
  `resumo` tinytext NOT NULL,
  `imagem` varchar(45) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `noticias`
--

INSERT INTO `noticias` (`id`, `data`, `titulo`, `texto`, `resumo`, `imagem`, `usuario_id`) VALUES
(5, '2024-06-06 15:57:14', 'Udacity lança curso de deep learning em português', 'Deep learning é o tema do momento dentre as empresas do Vale do Silício: o reconhecimento facial do Facebook, a assistente virtual Siri, o carro autônomo do Google e o diagnóstico de um tipo raro de câncer pelo IBM Watson são apenas algumas possíve', 'A Udacity lançou em português o programa Nanodegree Fundamentos de Deep Learning, que abordará temas como tipos e arquiteturas de redes neurais, reconhecimento de objetos, bots inteligentes, drone image tracking, entre outros.', 'felicidade.jpg', 6),
(6, '2024-06-06 15:58:05', 'Chrome vai marcar sites HTTP no modo de navegação anônima como não seguros', 'O Google anunciou ontem o segundo passo no seu plano de marcar todos os sites HTTP como não seguros no Chrome. A partir de outubro de 2017, o Chrome marcará sites HTTP com dados inseridos e sites HTTP no modo de navegação anônima como não seguros.\r\n', 'A partir de outubro de 2017, o Chrome marcará sites HTTP com dados inseridos e sites HTTP no modo de navegação anônima como não seguros.', 'sanduiche.jpg', 6),
(7, '2024-06-06 15:59:04', 'Estudo aponta que profissionais de TI certificados têm desempenho melhor', 'A tecnologia da informação é uma área vital para a maioria das empresas atualmente e uma das que mais crescem em oportunidades de trabalho. \r\n\r\nTer as habilidades certas dá aos profissionais da TI a confiança necessária para atender às demandas do', 'Estudo comparando duas equipes, com e sem certificações, mostrou que os funcionários certificados realizaram tarefas de forma mais confiável e consistente.', 'mais.jpg', 11),
(8, '2019-05-10 19:49:58', 'Visual Studio Code 1.12 está disponível para download', 'O Visual Studio Code 1.12 já pode ser baixado. Nessa versão, a equipe de desenvolvimento mudou o foco habitual em novos recursos para melhorar os processos e a base de código. Todas as issues em aberto foram revisadas, bugs foram corrigidos e a dívida', 'Nessa versão, a equipe corrigiu 2.199 bugs em todos os repositórios VS Code. Todas as issues em aberto foram revisadas, bugs foram corrigidos e a dívida de engenharia foi reduzida.', 'dog.jpg', 11),
(9, '2019-05-10 19:53:31', 'Uso do Android cresce no Brasil', 'O Android é o sistema operacional mais popular do mundo. E isso também é realidade no Brasil. De acordo com a empresa de análise de dados Kantar, o sistema do Google já domina 93,2% do mercado nacional de dispositivos móveis. &#13;&#10;&#13;&#10;O n', 'O Android é o sistema operacional mais popular do mundo. E isso também é realidade no Brasil. De acordo com a empresa de análise de dados Kantar, o sistema do Google já domina 93,2% do mercado nacional de dispositivos móveis. ', 'abstrato.jpg', 11),
(10, '2017-11-30 22:28:57', 'Escola de Governança da Internet no Brasil abre inscrições para Curso Intensivo', 'Serão 50 horas dedicadas ao debate de assuntos que demandam atenção da sociedade brasileira e mundial, como proteção de dados pessoais, algoritmos, blockchain, criptografia e Internet das Coisas. Os interessados em aprofundar o conhecimento sobre ess', 'Primeira a debater temas cruciais para o desenvolvimento da Internet no país, a EGI (Escola de Governança da Internet), iniciativa do Comitê Gestor da Internet no Brasil (CGI.br), recebe inscrições para a 4ª turma do Curso Intensivo.', 'cores.jpg', 11),
(11, '2017-11-30 22:30:33', 'Unity anuncia integração com Google Tango', 'O motor Unity ganhou integração com o Google Tango. Essa foi a grande novidade do keynote Vision Summit. O Unity já suporta aplicativos para outros headsets de realidade virtual (RV) do Google, Cardboard e Daydream, mas o gerente de produtos do Google,', 'Essa foi a grande novidade do keynote Vision Summit, considerando que o Unity já suportava aplicativos para outros headsets de realidade virtual (RV) do Google, Cardboard e Daydream', 'purple.jpg', 6),
(12, '2017-05-01 13:27:35', 'Quase 2 milhões de dispositivos Android podem ser infectados com malware FalseGuide', 'Embora tenha havido algum esforço dos fabricantes de smartphones Android para entregar atualizações de segurança mensais do Google para pelo menos alguns dos seus dispositivos, a situação está longe de ser completamente ideal. &#13;&#10;&#13;&#10;A', 'Aplicativos disponíveis na loja oficial de aplicativos do Google têm uma nova variante de malware, chamado de FalseGuide. ', 'luminarias.jpg', 11),
(13, '2017-05-02 09:29:46', 'Angular 4.1.0 está disponível para download', 'A versão 4.1.0 do Angular já pode ser baixada – o anúncio foi feito pelo blog da empresa. Na prática, a nova versão é uma simples substituta para a 4.x.x anterior. Ela adiciona suporte completo para TypeScript 2.2 e 2.3. Os desenvolvedores relatar', 'Na prática, a nova versão é uma simples substituta para a 4.x.x anterior. ', 'felicidade.jpg', 6),
(14, '2017-11-05 12:18:53', 'Versão 5.6 do Unity já pode ser baixada', 'O Unity 5.6 chega dois anos após o lançamento do Unity 5, e contém vários aprimoramentos e novos recursos que podem fornecer a melhor experiência para os desenvolvedores e, através deles, para jogadores e usuários finais.\r\n\r\nA nova versão do Unity', 'A plataforma de desenvolvimento de jogos 3D Unity foi atualizada para a versão 5.6 que, segundo a empresa, é a última do ciclo Unity 5.', 'luminarias.jpg', 11),
(15, '2017-11-05 12:45:56', 'IoT vai impactar a economia mundial em US$ 11 trilhões até 2025', 'A Internet das Coisas (IoT) vem sendo encarada com otimismo por setores da indústria, podendo se tornar um importante elemento econômico nas próximas décadas. &#13;&#10;&#13;&#10;Estima-se que o impacto econômico global vinculado ao cenário de IoT c', 'Essa previsão em relação ao mercado de IoT foi feita por um professor da FGV.', 'mais.jpg', 11);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` enum('admin','editor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `tipo`) VALUES
(6, 'Dom Pedro Primeiro', 'dompedroprimeiro@gmail.com', '$2y$10$c/IwxYKK0ox88hDdGh1LiOVKN5v34dn1DY4dggk2tf3F3vI5a9t3a', 'editor'),
(7, 'Dom Pedro Segundo', 'dompedrosegundo@gmail.com', '$2y$10$ky9Ld4emefrCJUxH8d9uXu4Mnb0yP74/mxebCooYT/PvueylPvevW', 'editor'),
(8, 'Dom Pedro Terceiro', 'dompedroterceiro@gmail.com', '$2y$10$JFO.dKdkjPvdBf5Qi51mW.9AnbZL8sSEMoIOlW3ndX9MGWHL2PZ0u', 'editor'),
(11, 'Dom Bernardo', 'dombernardo@gmail.com', '$2y$10$b.3sezOUwBwLyExTjUIC2.lFIVq0WpjJVzbCPcRzPwIYXySDTrqFi', 'admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_noticias_usuarios` (`usuario_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `fk_noticias_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
