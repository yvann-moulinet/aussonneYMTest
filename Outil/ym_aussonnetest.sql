-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 01 déc. 2023 à 16:29
-- Version du serveur : 8.0.33
-- Version de PHP : 8.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ym_aussonnetest`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE IF NOT EXISTS `adherent` (
  `idAdherent` int NOT NULL AUTO_INCREMENT,
  `nomAdherent` char(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `prenomAdherent` char(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ageAdherent` int NOT NULL,
  `sexeAdherent` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `loginAdherent` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pwdAdherent` char(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`idAdherent`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`idAdherent`, `nomAdherent`, `prenomAdherent`, `ageAdherent`, `sexeAdherent`, `loginAdherent`, `pwdAdherent`) VALUES
(1, 'Dupont', 'Pierre', 8, 'F', 'pDupont', '26d3649a8402892cbd78263f576cda23'),
(2, 'Dubois', 'Vincent', 10, 'M', 'vDubois', 'b6c7790658f2cabc77cfb445f3530cf4'),
(3, 'Durant', 'Jacques', 6, 'M', 'jDurant', '01e8e31b6f11b0872c662c306b3e87c9'),
(4, 'Fleur', 'Sophie', 7, 'F', 'sFleur', '520a72f041586acdeb770d35388ce6c4');

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `idAdmin` int NOT NULL AUTO_INCREMENT,
  `nomAdmin` char(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `prenomAdmin` char(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `loginAdmin` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pwdAdmin` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`idAdmin`, `nomAdmin`, `prenomAdmin`, `loginAdmin`, `pwdAdmin`) VALUES
(1, 'LeFirst', 'Vincent', 'admin', 'admin'),
(2, 'LeSecond', 'Pierre', 'admin2', 'admin2');

-- --------------------------------------------------------

--
-- Structure de la table `competent`
--

DROP TABLE IF EXISTS `competent`;
CREATE TABLE IF NOT EXISTS `competent` (
  `idSpecialite` int NOT NULL,
  `idEntraineur` int NOT NULL,
  PRIMARY KEY (`idSpecialite`,`idEntraineur`),
  KEY `fk_competent_entraineur` (`idEntraineur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `competent`
--

INSERT INTO `competent` (`idSpecialite`, `idEntraineur`) VALUES
(1, 1),
(1, 2),
(2, 5),
(1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `entraineur`
--

DROP TABLE IF EXISTS `entraineur`;
CREATE TABLE IF NOT EXISTS `entraineur` (
  `idEntraineur` int NOT NULL AUTO_INCREMENT,
  `nomEntraineur` char(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `loginEntraineur` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pwdEntraineur` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`idEntraineur`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `entraineur`
--

INSERT INTO `entraineur` (`idEntraineur`, `nomEntraineur`, `loginEntraineur`, `pwdEntraineur`) VALUES
(1, 'Delbert', 'Delbert', 'Delbert'),
(2, 'Dubois', 'Dubois', 'Dubois'),
(3, 'Bousquet', 'Bousquet', 'Bousquet'),
(4, 'merlin', 'merlin', 'merlin'),
(5, 'merlin', 'merlin', 'merlin'),
(6, 'yoyo', 'yoyo', 'yoyo'),
(7, 'tutu', 'tutu', 'tutu');

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE IF NOT EXISTS `equipe` (
  `idEquipe` int NOT NULL,
  `nomEquipe` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nbrPlaceEquipe` int NOT NULL,
  `ageMinEquipe` int NOT NULL,
  `ageMaxEquipe` int NOT NULL,
  `sexeEquipe` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `idSpecialite` int NOT NULL,
  `idEntraineur` int NOT NULL,
  PRIMARY KEY (`idEquipe`),
  KEY `fk_equipe_specialite` (`idSpecialite`),
  KEY `fk_equipe_entraineur` (`idEntraineur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`idEquipe`, `nomEquipe`, `nbrPlaceEquipe`, `ageMinEquipe`, `ageMaxEquipe`, `sexeEquipe`, `idSpecialite`, `idEntraineur`) VALUES
(1, 'lutin', 10, 5, 10, 'F', 1, 1),
(2, 'spartiate', 10, 15, 20, 'M', 2, 2),
(3, 'koko', 14, 10, 15, 'F', 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `logactionutilisateur`
--

DROP TABLE IF EXISTS `logactionutilisateur`;
CREATE TABLE IF NOT EXISTS `logactionutilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `action` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `temps` date NOT NULL,
  `idUtilisateur` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_logActionutilisateur` (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `logactionutilisateur`
--

INSERT INTO `logactionutilisateur` (`id`, `action`, `temps`, `idUtilisateur`) VALUES
(1, 'connexion', '2028-09-23', 'pDupont'),
(2, 'connexion', '2028-09-23', 'pDupont'),
(3, 'connexion', '2028-09-23', 'pDupont'),
(4, 'connexion', '2028-09-23', 'pDupont'),
(5, 'connexion', '2028-09-23', 'pDupont'),
(6, 'connexion', '2028-09-23', 'pDupont'),
(7, 'connexion', '2001-11-23', 'pDupont'),
(8, 'connexion', '2001-11-23', 'pDupont'),
(9, 'connexion', '2001-11-23', 'pDupont'),
(10, 'connexion', '2001-11-23', 'pDupont'),
(11, 'connexion', '2001-11-23', 'pDupont'),
(12, 'connexion', '2001-11-23', 'pDupont'),
(13, 'connexion', '2003-11-23', 'pDupont'),
(14, 'connexion', '2001-12-23', 'admin'),
(15, 'connexion', '2001-12-23', 'admin'),
(16, 'connexion', '2001-12-23', 'admin'),
(17, 'connexion', '2001-12-23', 'admin'),
(18, 'connexion', '2001-12-23', 'pDupont'),
(19, 'connexion', '2001-12-23', 'admin'),
(20, 'connexion', '2001-12-23', 'admin'),
(21, 'connexion', '2001-12-23', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `code` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `codeEnseignement` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `nouvelle`
--

DROP TABLE IF EXISTS `nouvelle`;
CREATE TABLE IF NOT EXISTS `nouvelle` (
  `code` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codeTheme` int NOT NULL,
  PRIMARY KEY (`code`),
  KEY `fk_nouvelle_theme` (`codeTheme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `nouvelle`
--

INSERT INTO `nouvelle` (`code`, `date`, `description`, `codeTheme`) VALUES
('1', '01/12/2023', 'pas de pipo', 2),
('2', '01/09/2023', 'pas de lulu', 2),
('3', '01/08/2023', 'pas de jojo', 2),
('4', '01/07/2023', 'pas de gogo', 2),
('5', '01/06/2023', 'pas de fufu', 2),
('6', '01/02/2023', 'pas de lili', 1),
('7', '01/01/2023', 'pas de roro', 1),
('8', '01/03/2023', 'pas de nono', 1),
('9', '01/06/2023', 'pas de coco', 1);

-- --------------------------------------------------------

--
-- Structure de la table `pouvoir`
--

DROP TABLE IF EXISTS `pouvoir`;
CREATE TABLE IF NOT EXISTS `pouvoir` (
  `idAhderent` int NOT NULL,
  `idEquipe` int NOT NULL,
  PRIMARY KEY (`idAhderent`,`idEquipe`),
  KEY `fk_pouvoir_equipe` (`idEquipe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pouvoir`
--

INSERT INTO `pouvoir` (`idAhderent`, `idEquipe`) VALUES
(1, 1),
(2, 1),
(1, 2),
(3, 2),
(2, 3);

--
-- Déclencheurs `pouvoir`
--
DROP TRIGGER IF EXISTS `maxEquipe`;
DELIMITER $$
CREATE TRIGGER `maxEquipe` BEFORE INSERT ON `pouvoir` FOR EACH ROW BEGIN
    declare nbInscrit int default 0;
    declare maxi int default 0;
    DECLARE nbInscriptions int default 0;
    declare ageAdherent int default 0;
    declare ageMax int default 0;
    declare ageMin int default 0;
    set ageMin = (select sum(equipe.ageMinEquipe) from equipe where equipe.idEquipe = new.idEquipe);
    set ageMax = (select sum(equipe.ageMaxEquipe) from equipe where equipe.idEquipe = new.idEquipe);
    set ageAdherent = (select sum(adherent.ageAdherent) from adherent where adherent.idAdherent = new.idAhderent);
    set nbInscriptions = (select count(pouvoir.idEquipe) from pouvoir where pouvoir.idAhderent = new.idAhderent);
    set nbInscrit = (select count(pouvoir.idAhderent) from pouvoir where idEquipe = new.idEquipe);
    set maxi = (select sum(equipe.nbrPlaceEquipe) from equipe where equipe.idEquipe = new.idEquipe);
    if (nbInscrit >= maxi) THEN
        signal SQLSTATE '10008' set MESSAGE_TEXT = 'Nombre d'adherent max déjà atteint';  
    end IF;
    if (nbInscriptions > 2) THEN
    	signal SQLSTATE '10009' set MESSAGE_TEXT = 'Nombre d'inscriptions max atteint';
    end if;
    if (ageAdherent > ageMax or ageAdherent < ageMin) THEN
    	signal SQLSTATE '10010' set MESSAGE_TEXT = 'L'âge ne correspond pas a l'equipe';
    end if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

DROP TABLE IF EXISTS `specialite`;
CREATE TABLE IF NOT EXISTS `specialite` (
  `idSpecialite` int NOT NULL AUTO_INCREMENT,
  `nomSpecialite` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idSpecialite`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`idSpecialite`, `nomSpecialite`) VALUES
(1, 'natation'),
(2, 'foot'),
(3, 'judo'),
(4, 'equitation'),
(5, 'volley'),
(6, 'athletisme'),
(7, 'moto cross');

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `code` int NOT NULL,
  `libelle` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`code`, `libelle`) VALUES
(1, 'Culture'),
(2, 'Sport');

-- --------------------------------------------------------

--
-- Structure de la table `titulaire`
--

DROP TABLE IF EXISTS `titulaire`;
CREATE TABLE IF NOT EXISTS `titulaire` (
  `idEntraineur` int NOT NULL,
  `dateEmbauche` date NOT NULL,
  PRIMARY KEY (`idEntraineur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `titulaire`
--

INSERT INTO `titulaire` (`idEntraineur`, `dateEmbauche`) VALUES
(1, '2022-10-10'),
(3, '2020-10-12'),
(6, '2023-12-15');

-- --------------------------------------------------------

--
-- Structure de la table `vacataire`
--

DROP TABLE IF EXISTS `vacataire`;
CREATE TABLE IF NOT EXISTS `vacataire` (
  `idEntraineur` int NOT NULL,
  `telephoneVacataire` char(14) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`idEntraineur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vacataire`
--

INSERT INTO `vacataire` (`idEntraineur`, `telephoneVacataire`) VALUES
(2, '06.25.45.12.15'),
(4, '06851548'),
(5, '06851548'),
(7, '06851548');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `competent`
--
ALTER TABLE `competent`
  ADD CONSTRAINT `fk_competent_entraineur` FOREIGN KEY (`idEntraineur`) REFERENCES `entraineur` (`idEntraineur`),
  ADD CONSTRAINT `fk_competent_specialite` FOREIGN KEY (`idSpecialite`) REFERENCES `specialite` (`idSpecialite`);

--
-- Contraintes pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `fk_equipe_entraineur` FOREIGN KEY (`idEntraineur`) REFERENCES `entraineur` (`idEntraineur`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_equipe_specialite` FOREIGN KEY (`idSpecialite`) REFERENCES `specialite` (`idSpecialite`);

--
-- Contraintes pour la table `nouvelle`
--
ALTER TABLE `nouvelle`
  ADD CONSTRAINT `nouvelle_ibfk_1` FOREIGN KEY (`codeTheme`) REFERENCES `theme` (`code`);

--
-- Contraintes pour la table `pouvoir`
--
ALTER TABLE `pouvoir`
  ADD CONSTRAINT `fk_pouvoir_adherent` FOREIGN KEY (`idAhderent`) REFERENCES `adherent` (`idAdherent`),
  ADD CONSTRAINT `fk_pouvoir_equipe` FOREIGN KEY (`idEquipe`) REFERENCES `equipe` (`idEquipe`);

--
-- Contraintes pour la table `titulaire`
--
ALTER TABLE `titulaire`
  ADD CONSTRAINT `fk_titulaire_entraineur` FOREIGN KEY (`idEntraineur`) REFERENCES `entraineur` (`idEntraineur`);

--
-- Contraintes pour la table `vacataire`
--
ALTER TABLE `vacataire`
  ADD CONSTRAINT `fk_vacataire_entraineur` FOREIGN KEY (`idEntraineur`) REFERENCES `entraineur` (`idEntraineur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
