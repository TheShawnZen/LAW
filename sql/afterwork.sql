-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 25 Mai 2020 à 01:47
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

DROP TABLE IF EXISTS adminLAW;
DROP TABLE IF EXISTS equipe;
DROP TABLE IF EXISTS fichejoueur;
DROP TABLE IF EXISTS joueur;
DROP TABLE IF EXISTS matchs;
DROP TABLE IF EXISTS saison;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `afterwork`
--

-- --------------------------------------------------------

--
-- Structure de la table `adminlaw`
--

CREATE TABLE `adminlaw` (
  `NOMUTILISATEUR` varchar(25) NOT NULL,
  `MOTDEPASSE` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `adminlaw`
--

INSERT INTO `adminlaw` (`NOMUTILISATEUR`, `MOTDEPASSE`) VALUES
('pedro', 'root');

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `IDEQUIPE` int(4) NOT NULL,
  `NOM` varchar(25) NOT NULL,
  `VICTOIRE` int(3) NOT NULL,
  `DEFAITE` int(3) NOT NULL,
  `NUL` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `equipe`
--

INSERT INTO `equipe` (`IDEQUIPE`, `NOM`, `VICTOIRE`, `DEFAITE`, `NUL`) VALUES
(1, 'Nid de poule', 2, 1, 1),
(2, 'Canette', 4, 0, 0),
(3, 'Ballerz', 1, 1, 2),
(4, 'Tornados', 3, 1, 0),
(5, 'Sosa', 0, 3, 1),
(6, 'Gucci', 0, 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `fichejoueur`
--

CREATE TABLE `fichejoueur` (
  `IDJOUEUR` int(4) NOT NULL,
  `NOMBREMATCH` int(4) NOT NULL,
  `POINTS` int(6) NOT NULL,
  `LANCERENTRE` int(4) NOT NULL,
  `TROISPOINTS` int(4) NOT NULL,
  `LANCERFRANCENTRE` int(4) NOT NULL,
  `LANCERFRANCLANCE` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fichejoueur`
--

INSERT INTO `fichejoueur` (`IDJOUEUR`, `NOMBREMATCH`, `POINTS`, `LANCERENTRE`, `TROISPOINTS`, `LANCERFRANCENTRE`, `LANCERFRANCLANCE`) VALUES
(1, 4, 50, 18, 10, 6, 8),
(2, 4, 38, 16, 4, 4, 4),
(3, 4, 34, 20, 7, 5, 6),
(4, 4, 19, 4, 2, 2, 2),
(5, 4, 61, 25, 8, 8, 8),
(6, 4, 50, 18, 10, 6, 8),
(7, 4, 70, 35, 15, 10, 12),
(8, 4, 90, 38, 12, 4, 4),
(9, 4, 69, 20, 6, 3, 5),
(10, 4, 78, 28, 7, 3, 4),
(11, 4, 45, 20, 3, 1, 4),
(12, 4, 101, 42, 12, 6, 6),
(13, 4, 67, 23, 7, 2, 2),
(14, 4, 59, 20, 5, 5, 6),
(15, 4, 41, 18, 3, 6, 8),
(16, 4, 56, 27, 0, 2, 2),
(17, 4, 89, 37, 12, 6, 6),
(18, 4, 79, 33, 5, 3, 3),
(19, 4, 86, 39, 3, 2, 8),
(20, 4, 65, 24, 7, 3, 6),
(21, 4, 125, 50, 19, 10, 10),
(22, 4, 68, 23, 4, 8, 10),
(23, 4, 93, 41, 11, 6, 8),
(24, 4, 30, 15, 0, 0, 0),
(25, 4, 59, 20, 8, 2, 2),
(26, 4, 78, 33, 5, 4, 4),
(27, 4, 88, 35, 9, 2, 4),
(28, 4, 96, 39, 14, 6, 6),
(29, 4, 65, 24, 6, 5, 8),
(30, 4, 45, 20, 3, 2, 2),
(31, 4, 85, 35, 7, 4, 4),
(32, 4, 60, 27, 4, 1, 2),
(33, 4, 78, 35, 9, 5, 6),
(34, 4, 52, 17, 6, 4, 6),
(35, 4, 72, 30, 9, 8, 8),
(36, 4, 56, 22, 5, 3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
  `IDJOUEUR` int(4) NOT NULL,
  `NOM` varchar(50) NOT NULL,
  `NUMERO` int(2) NOT NULL,
  `IDEQUIPE` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `joueur`
--

INSERT INTO `joueur` (`IDJOUEUR`, `NOM`, `NUMERO`, `IDEQUIPE`) VALUES
(1, 'Kenny', 1, 1),
(2, 'Yan', 6, 1),
(3, 'Phil', 5, 1),
(4, 'Shawn', 69, 1),
(5, 'Martin', 22, 1),
(6, 'Lakeisha', 23, 1),
(7, 'Momo', 1, 2),
(8, 'Francesca', 6, 2),
(9, 'Félix', 5, 2),
(10, 'Chris', 9, 2),
(11, 'Radu', 69, 2),
(12, 'Molly', 8, 2),
(13, 'Théo', 23, 3),
(14, 'Billie', 3, 3),
(15, 'Angelina', 6, 3),
(16, 'Jennifer', 8, 3),
(17, 'Chief Keef', 20, 3),
(18, 'Pop Smoke', 19, 3),
(19, 'Franck', 69, 4),
(20, 'Gabriel', 20, 4),
(21, 'Cristian', 17, 4),
(22, 'Samuel', 7, 4),
(23, 'Laurent', 21, 4),
(24, 'Charles', 25, 4),
(25, 'Simon', 69, 5),
(26, 'Maxime', 10, 5),
(27, 'Stéphane', 17, 5),
(28, 'Larry', 7, 5),
(29, 'Kevin', 21, 5),
(30, 'Nicolas', 25, 5),
(31, 'Alex', 77, 6),
(32, 'Dany', 55, 6),
(33, 'Vincent', 24, 6),
(34, 'Teodoro', 8, 6),
(35, 'Michel', 9, 6),
(36, 'Maryse', 3, 6);

-- --------------------------------------------------------

--
-- Structure de la table `matchs`
--

CREATE TABLE `matchs` (
  `IDMATCH` int(4) NOT NULL,
  `SESSIONLAW` varchar(25) NOT NULL,
  `IDDOMICILE` int(4) NOT NULL,
  `IDVISITEUR` int(4) NOT NULL,
  `SCOREDOMICILE` int(3) NOT NULL,
  `SCOREVISITEUR` int(3) NOT NULL,
  `DATEMATCH` datetime NOT NULL,
  `RESULTATFINAL` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `matchs`
--

INSERT INTO `matchs` (`IDMATCH`, `SESSIONLAW`, `IDDOMICILE`, `IDVISITEUR`, `SCOREDOMICILE`, `SCOREVISITEUR`, `DATEMATCH`, `RESULTATFINAL`) VALUES
(1, 'Automne 2019', 1, 6, 69, 90, '2019-10-09 19:00:00', 1),
(2, 'Automne 2019', 2, 5, 100, 101, '2019-10-16 19:00:00', 1),
(3, 'Automne 2019', 3, 4, 88, 94, '2019-10-21 16:00:00', 1),
(4, 'Automne 2019', 1, 2, 103, 99, '2019-10-22 17:00:00', 1),
(5, 'Automne 2019', 5, 6, 88, 98, '2019-10-26 18:00:00', 1),
(6, 'Automne 2019', 4, 2, 96, 95, '2019-11-05 18:00:00', 1),
(7, 'Automne 2019', 3, 1, 79, 80, '2019-11-08 19:00:00', 1),
(8, 'Automne 2019', 6, 2, 75, 74, '2019-11-11 18:00:00', 1),
(9, 'Automne 2019', 1, 5, 69, 65, '2019-11-15 19:00:00', 1),
(10, 'Automne 2019', 6, 3, 102, 97, '2019-11-17 17:00:00', 1),
(11, 'Automne 2019', 2, 4, 89, 90, '2019-11-26 18:00:00', 1),
(12, 'Automne 2019', 5, 4, 110, 100, '2019-11-27 17:00:00', 1),
(23, 'Hiver 2020', 1, 2, 88, 94, '2020-01-13 19:00:00', 1),
(24, 'Hiver 2020', 3, 4, 96, 100, '2020-01-16 19:00:00', 1),
(25, 'Hiver 2020', 5, 1, 79, 102, '2020-01-18 19:00:00', 1),
(26, 'Hiver 2020', 6, 2, 77, 91, '2020-01-20 20:00:00', 1),
(27, 'Hiver 2020', 2, 5, 95, 80, '2020-01-24 19:00:00', 1),
(28, 'Hiver 2020', 4, 6, 99, 70, '2020-01-27 19:00:00', 1),
(29, 'Hiver 2020', 3, 5, 95, 95, '2020-02-01 18:00:00', 1),
(30, 'Hiver 2020', 1, 3, 90, 90, '2020-02-04 19:00:00', 1),
(31, 'Hiver 2020', 2, 4, 99, 98, '2020-02-07 18:00:00', 1),
(32, 'Hiver 2020', 5, 1, 79, 87, '2020-02-09 19:00:00', 1),
(33, 'Hiver 2020', 4, 6, 102, 80, '2020-02-14 20:00:00', 1),
(34, 'Hiver 2020', 6, 3, 89, 91, '2020-02-16 19:30:00', 1),
(35, 'Automne 2020', 2, 1, 0, 0, '2020-09-14 21:40:00', 0),
(36, 'Automne 2020', 3, 4, 0, 0, '2020-09-16 19:00:00', 0),
(37, 'Automne 2020', 5, 6, 0, 0, '2020-09-20 21:00:00', 0),
(38, 'Automne 2020', 5, 1, 0, 0, '2020-09-22 21:00:00', 0),
(39, 'Automne 2020', 2, 6, 0, 0, '2020-09-24 21:00:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `saison`
--

CREATE TABLE `saison` (
  `SESSIONLAW` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `saison`
--

INSERT INTO `saison` (`SESSIONLAW`) VALUES
('Automne 2019'),
('Automne 2020'),
('Hiver 2020');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adminlaw`
--
ALTER TABLE `adminlaw`
  ADD PRIMARY KEY (`NOMUTILISATEUR`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`IDEQUIPE`);

--
-- Index pour la table `fichejoueur`
--
ALTER TABLE `fichejoueur`
  ADD PRIMARY KEY (`IDJOUEUR`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`IDJOUEUR`),
  ADD KEY `fk_idequipe` (`IDEQUIPE`);

--
-- Index pour la table `matchs`
--
ALTER TABLE `matchs`
  ADD PRIMARY KEY (`IDMATCH`),
  ADD KEY `FK_MATCH` (`SESSIONLAW`,`IDVISITEUR`,`IDDOMICILE`);

--
-- Index pour la table `saison`
--
ALTER TABLE `saison`
  ADD PRIMARY KEY (`SESSIONLAW`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
