--
-- Database: `dbevolucaofuncional`
--
-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

DROP TABLE IF EXISTS `tbusuario`;
CREATE TABLE IF NOT EXISTS `tbusuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(100) NOT NULL,
  `sobrenome_usuario` varchar(200) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `login_usuario` varchar(20) NOT NULL,
  `senha_usuario` varchar(100) NOT NULL,
  `registro_usuario` varchar(100) NOT NULL,
  `status_exclusao` tinyint (1) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=innodb DEFAULT CHARSET=latin1;
COMMIT;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbsolicitacao`
--

DROP TABLE IF EXISTS `tbsolicitacao`;
CREATE TABLE IF NOT EXISTS `tbsolicitacao` (
  `id_solicitacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario_solicitacao` int(11) NOT NULL,
  `data_solicitacao` date NOT NULL,
  `pontuacao_total_solicitacao` int(11) NOT NULL,
  `status_exclusao` tinyint (1) NOT NULL,
  `status_solicitacao` varchar(50) NOT NULL DEFAULT 'ANALISE',
  `pontuacao_final_solicitacao` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_solicitacao`)  
) ENGINE=innodb DEFAULT CHARSET=latin1;

ALTER TABLE `tbsolicitacao`
ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario_solicitacao`) REFERENCES `tbusuario` (`id_usuario`);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbarquivo`
--

DROP TABLE IF EXISTS `tbarquivo`;
CREATE TABLE IF NOT EXISTS `tbarquivo` (
  `id_arquivo` int(11) NOT NULL AUTO_INCREMENT,
  `id_solicitacao_arquivo` int(11) NOT NULL,
  `pontuacao_arquivo` int(11) NOT NULL,
  `pontuacao_final_arquivo` int (11) NOT NULL,
  `tipo_arquivo` varchar(80) NOT NULL,
  `titulo_arquivo` varchar(100) NOT NULL,
  `nome_arquivo` varchar(100) NOT NULL,
  `descricao_arquivo` varchar(300) NOT NULL,
  `status_exclusao` tinyint (1) NOT NULL,
  `comentario_arquivo` varchar (200) NOT NULL,
  `status_arquivo` varchar (50) NOT NULL DEFAULT 'ANALISE',
  PRIMARY KEY (`id_arquivo`)
) ENGINE=innodb DEFAULT CHARSET=latin1;

ALTER TABLE `tbarquivo`
ADD CONSTRAINT `fk_solicitacao` FOREIGN KEY (`id_solicitacao_arquivo`) REFERENCES `tbsolicitacao` (`id_solicitacao`);