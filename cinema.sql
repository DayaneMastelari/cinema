-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16-Abr-2019 às 22:23
-- Versão do servidor: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cinema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ators`
--

CREATE TABLE IF NOT EXISTS `ators` (
`id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `nascimento` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `ators`
--

INSERT INTO `ators` (`id`, `nome`, `nascimento`) VALUES
(4, 'Robert Downey Jr', '1965-04-04 00:00:00'),
(5, 'Benedict Cumberbatch', '1976-07-14 00:00:00'),
(7, 'Tom Hanks', '1956-07-09 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ators_filmes`
--

CREATE TABLE IF NOT EXISTS `ators_filmes` (
`id` int(11) NOT NULL,
  `filme_id` int(11) DEFAULT NULL,
  `ator_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `ators_filmes`
--

INSERT INTO `ators_filmes` (`id`, `filme_id`, `ator_id`) VALUES
(10, 1, 4),
(11, 4, 4),
(12, 5, 4),
(15, 1, 5),
(16, 6, 5),
(17, 3, 5),
(18, 2, 7),
(19, 7, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `criticas`
--

CREATE TABLE IF NOT EXISTS `criticas` (
`id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `avaliacao` int(11) DEFAULT NULL,
  `data_avaliacao` datetime DEFAULT NULL,
  `filme_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `criticas`
--

INSERT INTO `criticas` (`id`, `nome`, `avaliacao`, `data_avaliacao`, `filme_id`) VALUES
(1, 'Dayane', 3, '2001-08-14 00:00:00', 1),
(2, 'Miguel', 5, '1999-12-12 22:47:00', 1),
(3, 'Larissa', 1, '2017-04-10 13:21:00', 3),
(4, 'Ligia', 5, '2013-04-10 13:37:00', 3),
(5, 'Dayane', 5, '2019-04-10 20:42:00', 1),
(6, 'Miguel', 4, '2019-04-15 20:41:00', 2),
(7, 'Lissandra', 5, '1929-12-08 00:00:00', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `filmes`
--

CREATE TABLE IF NOT EXISTS `filmes` (
`id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `ano` int(11) DEFAULT NULL,
  `duracao` varchar(5) DEFAULT NULL,
  `idioma` varchar(50) DEFAULT NULL,
  `genero_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `filmes`
--

INSERT INTO `filmes` (`id`, `nome`, `ano`, `duracao`, `idioma`, `genero_id`) VALUES
(1, 'Avengers: Endgame', 2019, '3:00', 'Inglês', 1),
(2, 'Forrest Gump', 1994, '2:22', 'Inglês', 8),
(3, 'The Imitation Game', 2014, '1:54', 'Inglês', 9),
(4, 'Iron Man', 2008, '2:06', 'Inglês', 1),
(5, 'Sherlock Holmes', 2009, '2:09', 'Inglês', 1),
(6, 'Doctor Strange', 2016, '1:55', 'Inglês', 1),
(7, 'Saving Private Ryan', 1998, '2:49', 'Inglês', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `generos`
--

CREATE TABLE IF NOT EXISTS `generos` (
`id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `generos`
--

INSERT INTO `generos` (`id`, `nome`) VALUES
(1, 'Ação'),
(2, 'Terror'),
(3, 'Comédia'),
(5, 'Ficção cientifica'),
(6, 'Suspense'),
(8, 'Drama'),
(9, 'Biografia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ators`
--
ALTER TABLE `ators`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ators_filmes`
--
ALTER TABLE `ators_filmes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criticas`
--
ALTER TABLE `criticas`
 ADD PRIMARY KEY (`id`), ADD KEY `critica_filme_fk` (`filme_id`);

--
-- Indexes for table `filmes`
--
ALTER TABLE `filmes`
 ADD PRIMARY KEY (`id`), ADD KEY `filme_genero_fk` (`genero_id`);

--
-- Indexes for table `generos`
--
ALTER TABLE `generos`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ators`
--
ALTER TABLE `ators`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ators_filmes`
--
ALTER TABLE `ators_filmes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `criticas`
--
ALTER TABLE `criticas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `filmes`
--
ALTER TABLE `filmes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `generos`
--
ALTER TABLE `generos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `criticas`
--
ALTER TABLE `criticas`
ADD CONSTRAINT `critica_filme_fk` FOREIGN KEY (`filme_id`) REFERENCES `filmes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `filmes`
--
ALTER TABLE `filmes`
ADD CONSTRAINT `filme_genero_fk` FOREIGN KEY (`genero_id`) REFERENCES `generos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
