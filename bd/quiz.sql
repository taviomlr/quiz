-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.22-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para quiz
CREATE DATABASE IF NOT EXISTS `quiz` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `quiz`;

-- Copiando estrutura para tabela quiz.cad_aluno
CREATE TABLE IF NOT EXISTS `cad_aluno` (
  `id_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `aluno` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  `classe` int(11) NOT NULL,
  `turno` int(11) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `data_hora` datetime DEFAULT NULL,
  PRIMARY KEY (`id_aluno`),
  UNIQUE KEY `matricula` (`matricula`),
  KEY `FK_cad_aluno_cad_classe` (`classe`),
  KEY `FK_cad_aluno_cad_turno` (`turno`),
  CONSTRAINT `FK_cad_aluno_cad_classe` FOREIGN KEY (`classe`) REFERENCES `cad_classe` (`id_classe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_cad_aluno_cad_turno` FOREIGN KEY (`turno`) REFERENCES `cad_turno` (`id_turno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela quiz.cad_aluno: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cad_aluno` DISABLE KEYS */;
/*!40000 ALTER TABLE `cad_aluno` ENABLE KEYS */;

-- Copiando estrutura para tabela quiz.cad_classe
CREATE TABLE IF NOT EXISTS `cad_classe` (
  `id_classe` int(11) NOT NULL AUTO_INCREMENT,
  `nome_classe` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` int(11) DEFAULT NULL,
  `data_hora` datetime DEFAULT NULL,
  PRIMARY KEY (`id_classe`),
  UNIQUE KEY `nome_classe` (`nome_classe`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela quiz.cad_classe: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `cad_classe` DISABLE KEYS */;
INSERT INTO `cad_classe` (`id_classe`, `nome_classe`, `usuario`, `data_hora`) VALUES
	(1, 'Primeiro Ano Médio', NULL, NULL),
	(2, 'Segundo Ano Médio', NULL, NULL);
/*!40000 ALTER TABLE `cad_classe` ENABLE KEYS */;

-- Copiando estrutura para tabela quiz.cad_disciplina
CREATE TABLE IF NOT EXISTS `cad_disciplina` (
  `id_disciplina` int(11) NOT NULL AUTO_INCREMENT,
  `nome_disciplina` char(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `usuario` int(11) DEFAULT NULL,
  `data_hora` datetime DEFAULT NULL,
  PRIMARY KEY (`id_disciplina`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela quiz.cad_disciplina: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `cad_disciplina` DISABLE KEYS */;
INSERT INTO `cad_disciplina` (`id_disciplina`, `nome_disciplina`, `usuario`, `data_hora`) VALUES
	(2, 'Português', NULL, NULL),
	(3, 'Matemática', NULL, NULL),
	(4, 'Biologia', NULL, NULL);
/*!40000 ALTER TABLE `cad_disciplina` ENABLE KEYS */;

-- Copiando estrutura para tabela quiz.cad_questoes
CREATE TABLE IF NOT EXISTS `cad_questoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternativa1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternativa2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternativa3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternativa4` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternativa5` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resposta` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pontuacao` double DEFAULT NULL,
  `classe` int(11) DEFAULT NULL,
  `disciplina` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_cad_questoes_cad_classe` (`classe`),
  KEY `FK_cad_questoes_cad_disciplina` (`disciplina`),
  CONSTRAINT `FK_cad_questoes_cad_classe` FOREIGN KEY (`classe`) REFERENCES `cad_classe` (`id_classe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_cad_questoes_cad_disciplina` FOREIGN KEY (`disciplina`) REFERENCES `cad_disciplina` (`id_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela quiz.cad_questoes: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `cad_questoes` DISABLE KEYS */;
INSERT INTO `cad_questoes` (`id`, `pergunta`, `alternativa1`, `alternativa2`, `alternativa3`, `alternativa4`, `alternativa5`, `resposta`, `pontuacao`, `classe`, `disciplina`) VALUES
	(1, 'PERGUNTA 1', 'safasf', 'aggdfjhg', 'çjçhkhl', 'bnmvfhjd', 'erye5wy', 'çjçhkhl', 1, 2, 2),
	(2, 'Quanto é 1 + 1?', 'safasf', 'aggdfjhg', 'çjçhkhl', 'bnmvfhjd', 'erye5wy', 'çjçhkhl', 10, 2, 4);
/*!40000 ALTER TABLE `cad_questoes` ENABLE KEYS */;

-- Copiando estrutura para tabela quiz.cad_tipo_usuario
CREATE TABLE IF NOT EXISTS `cad_tipo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `data_hora` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela quiz.cad_tipo_usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cad_tipo_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `cad_tipo_usuario` ENABLE KEYS */;

-- Copiando estrutura para tabela quiz.cad_turma
CREATE TABLE IF NOT EXISTS `cad_turma` (
  `id_turma` int(11) NOT NULL AUTO_INCREMENT,
  `turma` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_turma`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela quiz.cad_turma: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `cad_turma` DISABLE KEYS */;
INSERT INTO `cad_turma` (`id_turma`, `turma`) VALUES
	(1, 'A'),
	(2, 'B'),
	(3, 'C');
/*!40000 ALTER TABLE `cad_turma` ENABLE KEYS */;

-- Copiando estrutura para tabela quiz.cad_turno
CREATE TABLE IF NOT EXISTS `cad_turno` (
  `id_turno` int(11) NOT NULL AUTO_INCREMENT,
  `nome_turno` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` int(11) DEFAULT NULL,
  `data_hora` datetime DEFAULT NULL,
  PRIMARY KEY (`id_turno`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela quiz.cad_turno: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `cad_turno` DISABLE KEYS */;
INSERT INTO `cad_turno` (`id_turno`, `nome_turno`, `usuario`, `data_hora`) VALUES
	(2, 'm', NULL, NULL),
	(3, 'T', NULL, NULL),
	(15, 'N', NULL, NULL);
/*!40000 ALTER TABLE `cad_turno` ENABLE KEYS */;

-- Copiando estrutura para tabela quiz.cad_usuario
CREATE TABLE IF NOT EXISTS `cad_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `data_hora` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_usuario_tipo_usuario` (`tipo`),
  CONSTRAINT `FK_usuario_tipo_usuario` FOREIGN KEY (`tipo`) REFERENCES `cad_tipo_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela quiz.cad_usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cad_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `cad_usuario` ENABLE KEYS */;

-- Copiando estrutura para tabela quiz._cad_alternativas
CREATE TABLE IF NOT EXISTS `_cad_alternativas` (
  `id_alternativa` int(11) NOT NULL AUTO_INCREMENT,
  `alternativa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `letra` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pergunta` int(11) NOT NULL,
  PRIMARY KEY (`id_alternativa`) USING BTREE,
  KEY `FK_alternativas_perguntas` (`pergunta`),
  CONSTRAINT `FK_alternativas_perguntas` FOREIGN KEY (`pergunta`) REFERENCES `_cad_perguntas` (`id_pergunta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela quiz._cad_alternativas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `_cad_alternativas` DISABLE KEYS */;
/*!40000 ALTER TABLE `_cad_alternativas` ENABLE KEYS */;

-- Copiando estrutura para tabela quiz._cad_perguntas
CREATE TABLE IF NOT EXISTS `_cad_perguntas` (
  `id_pergunta` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classe` int(11) DEFAULT NULL,
  `disciplina` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pergunta`) USING BTREE,
  KEY `FK_cad_perguntas_cad_classe` (`classe`),
  KEY `FK_cad_perguntas_cad_disciplina` (`disciplina`),
  CONSTRAINT `FK_cad_perguntas_cad_classe` FOREIGN KEY (`classe`) REFERENCES `cad_classe` (`id_classe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_cad_perguntas_cad_disciplina` FOREIGN KEY (`disciplina`) REFERENCES `cad_disciplina` (`id_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela quiz._cad_perguntas: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `_cad_perguntas` DISABLE KEYS */;
INSERT INTO `_cad_perguntas` (`id_pergunta`, `pergunta`, `classe`, `disciplina`) VALUES
	(3, 'PERGUNTA 1', 1, 3),
	(4, 'PERGUNTA 2', 2, 3),
	(5, 'Quem descobrio o Brasil?', 1, 2),
	(6, 'Quanto é 1 + 1?', 1, 3),
	(7, 'PERGUNTA 3', 1, 2);
/*!40000 ALTER TABLE `_cad_perguntas` ENABLE KEYS */;

-- Copiando estrutura para tabela quiz._cad_resposta
CREATE TABLE IF NOT EXISTS `_cad_resposta` (
  `id_resposta` int(11) NOT NULL AUTO_INCREMENT,
  `resposta` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pergunta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_resposta`),
  KEY `FK__cad_perguntas` (`pergunta`),
  CONSTRAINT `FK__cad_perguntas` FOREIGN KEY (`pergunta`) REFERENCES `_cad_perguntas` (`id_pergunta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela quiz._cad_resposta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `_cad_resposta` DISABLE KEYS */;
/*!40000 ALTER TABLE `_cad_resposta` ENABLE KEYS */;

-- Copiando estrutura para tabela quiz._cad_resposta_correta
CREATE TABLE IF NOT EXISTS `_cad_resposta_correta` (
  `id_resposta_correta` int(11) NOT NULL AUTO_INCREMENT,
  `resposta_correta` int(11) DEFAULT NULL,
  `Coluna 3` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_resposta_correta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela quiz._cad_resposta_correta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `_cad_resposta_correta` DISABLE KEYS */;
/*!40000 ALTER TABLE `_cad_resposta_correta` ENABLE KEYS */;

-- Copiando estrutura para tabela quiz._serie
CREATE TABLE IF NOT EXISTS `_serie` (
  `id_serie` int(11) NOT NULL AUTO_INCREMENT,
  `serie` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_serie`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela quiz._serie: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `_serie` DISABLE KEYS */;
INSERT INTO `_serie` (`id_serie`, `serie`) VALUES
	(1, 'PRIMEIRO ANO FUNDAMENTAL'),
	(2, 'SEGUNDO ANO FUNDAMENTAL');
/*!40000 ALTER TABLE `_serie` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
