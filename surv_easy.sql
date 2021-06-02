-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 02 juin 2021 à 21:35
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `surv'easy`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `ID_Client` int(100) NOT NULL AUTO_INCREMENT,
  `ID_Personne` int(100) DEFAULT NULL,
  `login` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(2000) COLLATE utf8_bin NOT NULL,
  `MDP` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID_Client`),
  KEY `fk_Client_Personne` (`ID_Personne`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`ID_Client`, `ID_Personne`, `login`, `email`, `MDP`) VALUES
(1, 1, 'jm', '', '12'),
(2, 2, 'coucou', '', '1234'),
(3, NULL, 'skeleton-joke', 'johan.maurice@hotmail.fr', '1234'),
(4, NULL, 'test1', 'johan.maurice@hotmail.fr', '1');

-- --------------------------------------------------------

--
-- Structure de la table `correspondance`
--

DROP TABLE IF EXISTS `correspondance`;
CREATE TABLE IF NOT EXISTS `correspondance` (
  `numero_sondage` int(100) NOT NULL,
  `ID_Question` int(100) NOT NULL,
  PRIMARY KEY (`numero_sondage`,`ID_Question`),
  KEY `fk_correspondance_question` (`ID_Question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `creation`
--

DROP TABLE IF EXISTS `creation`;
CREATE TABLE IF NOT EXISTS `creation` (
  `ID_Question` int(100) NOT NULL,
  `ID_Client` int(100) NOT NULL,
  PRIMARY KEY (`ID_Question`,`ID_Client`),
  KEY `fk_creation_client` (`ID_Client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `ID_personne` int(100) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `Prenom` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `mail` varchar(200) COLLATE utf8_bin NOT NULL,
  `Role` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `Age` int(4) DEFAULT NULL,
  `Nationalite` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `Statut_marital` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `Profession` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `revenu` double(15,5) DEFAULT NULL,
  `ville` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`ID_personne`, `Nom`, `Prenom`, `mail`, `Role`, `Age`, `Nationalite`, `Statut_marital`, `Profession`, `revenu`, `ville`) VALUES
(1, 'Johan', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Maurice', 'Johan', 'j.m@coucou.fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `ID_Question` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Sondage` int(11) NOT NULL,
  `nomQuestion` varchar(100) COLLATE utf8_bin NOT NULL,
  `Sous_categorie` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `nb_champs` int(10) DEFAULT NULL,
  `champ1` text COLLATE utf8_bin NOT NULL,
  `champ2` text COLLATE utf8_bin,
  `champ3` text COLLATE utf8_bin,
  `champ4` text COLLATE utf8_bin,
  `champ5` text COLLATE utf8_bin,
  `champ6` text COLLATE utf8_bin,
  `commentaire` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID_Question`),
  KEY `fk_idSondage` (`ID_Sondage`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`ID_Question`, `ID_Sondage`, `nomQuestion`, `Sous_categorie`, `nb_champs`, `champ1`, `champ2`, `champ3`, `champ4`, `champ5`, `champ6`, `commentaire`) VALUES
(22, 17, 'Comment allez-vous ? ', 'qcu', 3, 'Bien', 'Moyen', 'Pas bien', NULL, NULL, NULL, 'non'),
(24, 17, 'Expliquez votre ressentit ? ', 'commentaire', 1, '', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 17, 'Sur 10 etait-ce beaux ou non ? 10 étant beaux', 'echelle', 3, '1', '10', '1', NULL, NULL, NULL, 'oui');

--
-- Déclencheurs `question`
--
DROP TRIGGER IF EXISTS `ajoutQuestion`;
DELIMITER $$
CREATE TRIGGER `ajoutQuestion` AFTER INSERT ON `question` FOR EACH ROW BEGIN

UPDATE sondage 
SET sondage.nombre_question = nombre_question+1
WHERE sondage.numero_sondage = NEW.ID_Sondage;

END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `supprQuestion`;
DELIMITER $$
CREATE TRIGGER `supprQuestion` AFTER DELETE ON `question` FOR EACH ROW BEGIN

UPDATE sondage 
SET nombre_question=nombre_question-1
WHERE `numero_sondage` = OLD.ID_Sondage;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `ID_reponse` int(255) NOT NULL AUTO_INCREMENT,
  `ID_Question` int(100) NOT NULL,
  `Reponse` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`ID_reponse`),
  KEY `ID_Question` (`ID_Question`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`ID_reponse`, `ID_Question`, `Reponse`) VALUES
(1, 22, 'Bien'),
(2, 22, 'Moyen'),
(3, 24, 'C\'était bien mais pas top'),
(4, 24, 'j\'ai déteste la visite de la cathédrale, très ennuyant'),
(5, 25, '1'),
(6, 25, '9');

-- --------------------------------------------------------

--
-- Structure de la table `sondage`
--

DROP TABLE IF EXISTS `sondage`;
CREATE TABLE IF NOT EXISTS `sondage` (
  `numero_sondage` int(100) NOT NULL AUTO_INCREMENT,
  `ID_client` int(100) DEFAULT NULL,
  `nomSondage` varchar(200) COLLATE utf8_bin NOT NULL,
  `nombre_question` int(100) DEFAULT '0',
  `Date_creation` date DEFAULT NULL,
  `Date_fin` date DEFAULT NULL,
  PRIMARY KEY (`numero_sondage`) USING BTREE,
  KEY `fk_sondage_client` (`ID_client`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `sondage`
--

INSERT INTO `sondage` (`numero_sondage`, `ID_client`, `nomSondage`, `nombre_question`, `Date_creation`, `Date_fin`) VALUES
(17, 3, 'TEST', 3, '2021-06-02', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_Client_Personne` FOREIGN KEY (`ID_Personne`) REFERENCES `personne` (`ID_personne`);

--
-- Contraintes pour la table `correspondance`
--
ALTER TABLE `correspondance`
  ADD CONSTRAINT `fk_correspondance_question` FOREIGN KEY (`ID_Question`) REFERENCES `question` (`ID_Question`),
  ADD CONSTRAINT `fk_correspondance_sondage` FOREIGN KEY (`numero_sondage`) REFERENCES `sondage` (`numero_sondage`);

--
-- Contraintes pour la table `creation`
--
ALTER TABLE `creation`
  ADD CONSTRAINT `fk_creation_client` FOREIGN KEY (`ID_Client`) REFERENCES `client` (`ID_Client`),
  ADD CONSTRAINT `fk_creation_question` FOREIGN KEY (`ID_Question`) REFERENCES `question` (`ID_Question`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_idSondage` FOREIGN KEY (`ID_Sondage`) REFERENCES `sondage` (`numero_sondage`);

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (`ID_Question`) REFERENCES `question` (`ID_Question`);

--
-- Contraintes pour la table `sondage`
--
ALTER TABLE `sondage`
  ADD CONSTRAINT `fk_sondage_client` FOREIGN KEY (`ID_client`) REFERENCES `client` (`ID_Client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
