-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 21 jan. 2024 à 22:07
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ym_aussonne`
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
  `sexeAdherent` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `loginAdherent` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pwdAdherent` char(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`idAdherent`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`idAdherent`, `nomAdherent`, `prenomAdherent`, `ageAdherent`, `sexeAdherent`, `loginAdherent`, `pwdAdherent`) VALUES
(1, 'Dupont', 'Pierre', 8, 'Féminin', 'pDupont', '26d3649a8402892cbd78263f576cda23'),
(2, 'Dubois', 'Vincent', 10, 'Masculin', 'vDubois', 'b6c7790658f2cabc77cfb445f3530cf4'),
(3, 'Durant', 'Jacques', 6, 'Masculin', 'jDurant', '01e8e31b6f11b0872c662c306b3e87c9'),
(4, 'Fleur', 'Sophie', 7, 'Féminin', 'sFleur', '520a72f041586acdeb770d35388ce6c4'),
(5, 'Lopez', 'Gérard', 8, 'Masculin', 'gLopez', '7327ad631d4bc778a432148ae078863a');

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
(2, 1),
(3, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 3),
(5, 3),
(1, 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `entraineur`
--

INSERT INTO `entraineur` (`idEntraineur`, `nomEntraineur`, `loginEntraineur`, `pwdEntraineur`) VALUES
(1, 'Delbert', 'Delbert', 'Delbert'),
(2, 'Dubois', 'Dubois', 'Dubois'),
(3, 'Bousquet', 'Bousquet', 'Bousquet'),
(4, 'test', 'test', 'test');

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
  `sexeEquipe` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
(1, 'lutin', 10, 5, 10, 'Féminin', 6, 1),
(2, 'spartiate', 10, 5, 9, 'Masculin', 2, 2),
(3, 'koko', 14, 10, 15, 'Féminin', 4, 3),
(4, 'Los nignos', 10, 5, 10, 'Masculin', 5, 3);

--
-- Déclencheurs `equipe`
--
DROP TRIGGER IF EXISTS `insert equipe`;
DELIMITER $$
CREATE TRIGGER `insert equipe` BEFORE INSERT ON `equipe` FOR EACH ROW BEGIN
	DECLARE nbEquipesEntraineur int;
    SET nbEquipesEntraineur = (
        select count(equipe.idEquipe) 
        from equipe 
        WHERE equipe.idEntraineur = new.idEntraineur);
    if (nbEquipesEntraineur >= 3) THEN
    	signal SQLSTATE '10012' set message_text = 					'L etraineur s occupe deja de 3 equipes';
   end if;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `insert equipe competances entraineur`;
DELIMITER $$
CREATE TRIGGER `insert equipe competances entraineur` BEFORE INSERT ON `equipe` FOR EACH ROW BEGIN
    DECLARE competenceEntraineur int;
    SET competenceEntraineur = (
        SELECT COUNT(*)
        FROM competent
        WHERE competent.idEntraineur = NEW.idEntraineur
          AND competent.idSpecialite = NEW.idSpecialite);

    IF (competenceEntraineur = 0) THEN
        SIGNAL SQLSTATE '10016' SET MESSAGE_TEXT = 'L entraineur n est pas compétent dans cette spécialité';
    END IF;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `update equipe`;
DELIMITER $$
CREATE TRIGGER `update equipe` BEFORE UPDATE ON `equipe` FOR EACH ROW BEGIN
	DECLARE nbEquipesEntraineur int;
    SET nbEquipesEntraineur = (
        select count(equipe.idEquipe) 
        from equipe 
        WHERE equipe.idEntraineur = new.idEntraineur);
    if (nbEquipesEntraineur >= 3) THEN
    	signal SQLSTATE '10012' set message_text = 'L etraineur s occupe deja de 3 equipes';
   end if;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `update equipe competances entraineur`;
DELIMITER $$
CREATE TRIGGER `update equipe competances entraineur` BEFORE UPDATE ON `equipe` FOR EACH ROW BEGIN
    DECLARE competenceEntraineur int;
    SET competenceEntraineur = (
        SELECT COUNT(*)
        FROM competent
        WHERE competent.idEntraineur = NEW.idEntraineur
          AND competent.idSpecialite = NEW.idSpecialite);

    IF (competenceEntraineur = 0) THEN
        SIGNAL SQLSTATE '10016' SET MESSAGE_TEXT = 'L entraineur n est pas compétent dans cette spécialité';
    END IF;
END
$$
DELIMITER ;

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
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `logactionutilisateur`
--

INSERT INTO `logactionutilisateur` (`id`, `action`, `temps`, `idUtilisateur`) VALUES
(27, 'insert entraineur8 : spécialité1', '2024-01-13', 'admin'),
(28, 'update entraineur 3', '2024-01-13', 'admin'),
(29, 'connexion', '2014-01-24', 'admin'),
(30, 'insert equipe 6', '2024-01-14', 'admin'),
(31, 'update entraineur 3', '2024-01-14', 'admin'),
(32, 'update entraineur 3', '2024-01-14', 'admin'),
(33, 'update entraineur 3', '2024-01-14', 'admin'),
(34, 'insert entraineur 9 : spécialité', '2024-01-14', 'admin'),
(35, 'insert equipe 5', '2024-01-14', 'admin'),
(36, 'insert equipe 6', '2024-01-14', 'admin'),
(37, 'connexion', '2014-01-24', 'admin'),
(38, 'connexion', '2014-01-24', 'admin'),
(39, 'update spécialité', '2024-01-14', 'admin'),
(40, 'update spécialité 7', '2024-01-14', 'admin'),
(41, 'update spécialité 7', '2024-01-14', 'admin'),
(42, 'update entraineur 1', '2024-01-14', 'admin'),
(43, 'connexion', '2014-01-24', 'admin'),
(44, 'insert equipe 7', '2024-01-14', 'admin'),
(45, 'insert equipe 7', '2024-01-14', 'admin'),
(46, 'insert equipe 7', '2024-01-14', 'admin'),
(47, 'insert equipe 7', '2024-01-14', 'admin'),
(48, 'insert equipe 7', '2024-01-14', 'admin'),
(49, 'insert equipe 7', '2024-01-14', 'admin'),
(50, 'insert equipe 7', '2024-01-14', 'admin'),
(51, 'insert equipe 7', '2024-01-14', 'admin'),
(52, 'insert equipe 7', '2024-01-14', 'admin'),
(53, 'insert equipe 5', '2024-01-14', 'admin'),
(54, 'insert equipe 6', '2024-01-14', 'admin'),
(55, 'insert equipe 7', '2024-01-14', 'admin'),
(56, 'insert equipe 8', '2024-01-14', 'admin'),
(57, 'insert equipe 8', '2024-01-14', 'admin'),
(58, 'connexion', '2014-01-24', 'admin'),
(59, 'connexion', '2018-01-24', 'admin'),
(60, 'connexion', '2018-01-24', 'admin'),
(61, 'connexion', '2018-01-24', 'admin'),
(62, 'connexion', '2018-01-24', 'admin'),
(63, 'connexion', '2018-01-24', 'admin'),
(64, 'connexion', '2018-01-24', 'admin'),
(65, 'insert equipe 5', '2024-01-18', 'admin'),
(66, 'update entraineur 1', '2024-01-18', 'admin'),
(67, 'update entraineur 1', '2024-01-18', 'admin'),
(68, 'update entraineur 3', '2024-01-18', 'admin'),
(69, 'update entraineur 1', '2024-01-18', 'admin'),
(70, 'update entraineur 1', '2024-01-18', 'admin'),
(71, 'update entraineur 1', '2024-01-18', 'admin'),
(72, 'insert equipe 5', '2024-01-18', 'admin'),
(73, 'insert equipe 6', '2024-01-18', 'admin'),
(74, 'insert equipe 7', '2024-01-18', 'admin'),
(75, 'insert equipe 7', '2024-01-18', 'admin'),
(76, 'insert equipe 7', '2024-01-18', 'admin'),
(77, 'insert equipe 7', '2024-01-18', 'admin'),
(78, 'connexion', '2019-01-24', 'admin'),
(79, 'insert equipe 7', '2024-01-19', 'admin'),
(80, 'insert equipe 7', '2024-01-19', 'admin'),
(81, 'insert equipe 7', '2024-01-19', 'admin'),
(82, 'insert equipe 7', '2024-01-19', 'admin'),
(83, 'insert equipe 7', '2024-01-19', 'admin'),
(84, 'insert equipe 7', '2024-01-19', 'admin'),
(85, 'insert equipe 7', '2024-01-19', 'admin'),
(86, 'insert equipe 7', '2024-01-19', 'admin'),
(87, 'insert equipe 7', '2024-01-19', 'admin'),
(88, 'insert equipe 7', '2024-01-19', 'admin'),
(89, 'insert equipe 7', '2024-01-19', 'admin'),
(90, 'insert equipe 7', '2024-01-19', 'admin'),
(91, 'insert equipe 7', '2024-01-19', 'admin'),
(92, 'insert equipe 7', '2024-01-19', 'admin'),
(93, 'insert equipe 7', '2024-01-19', 'admin'),
(94, 'insert equipe 7', '2024-01-19', 'admin'),
(95, 'insert equipe 7', '2024-01-19', 'admin'),
(96, 'insert equipe 7', '2024-01-19', 'admin'),
(97, 'insert equipe 7', '2024-01-19', 'admin'),
(98, 'insert equipe 7', '2024-01-19', 'admin'),
(99, 'insert equipe 7', '2024-01-19', 'admin'),
(100, 'insert equipe 7', '2024-01-19', 'admin'),
(101, 'insert equipe 7', '2024-01-19', 'admin'),
(102, 'insert equipe 7', '2024-01-19', 'admin'),
(103, 'insert equipe 7', '2024-01-19', 'admin'),
(104, 'insert equipe 7', '2024-01-19', 'admin'),
(105, 'insert equipe 7', '2024-01-19', 'admin'),
(106, 'insert equipe 7', '2024-01-19', 'admin'),
(107, 'insert equipe 7', '2024-01-19', 'admin'),
(108, 'insert entraineur 4 : spécialité', '2024-01-19', 'admin'),
(109, 'insert equipe 7', '2024-01-19', 'admin'),
(110, 'insert equipe 8', '2024-01-19', 'admin'),
(111, 'insert equipe 9', '2024-01-19', 'admin'),
(112, 'connexion', '2020-01-24', 'admin'),
(113, 'connexion', '2020-01-24', 'admin'),
(114, 'connexion', '2020-01-24', ''),
(115, 'connexion', '2020-01-24', ''),
(116, 'connexion', '2020-01-24', 'pDupont'),
(117, 'connexion', '2020-01-24', 'admin'),
(118, 'connexion', '2020-01-24', ''),
(119, 'connexion', '2020-01-24', ''),
(120, 'connexion', '2020-01-24', 'dsf'),
(121, 'connexion', '2020-01-24', ''),
(122, 'connexion', '2020-01-24', 'admin'),
(123, 'insert equipe 7', '2024-01-20', 'admin'),
(124, 'insert equipe 8 : equipe', '2024-01-20', 'admin'),
(125, 'insert equipe 9', '2024-01-20', 'admin'),
(126, 'insert equipe 10 : equipe', '2024-01-20', 'admin'),
(127, 'insert equipe 7', '2024-01-20', 'admin'),
(128, 'insert equipe 8 : equipe', '2024-01-20', 'admin'),
(129, 'insert equipe 9', '2024-01-20', 'admin'),
(130, 'insert equipe 6', '2024-01-20', 'admin'),
(131, 'insert equipe 6', '2024-01-20', 'admin'),
(132, 'insert equipe 6', '2024-01-20', 'admin'),
(133, 'insert equipe 7', '2024-01-20', 'admin'),
(134, 'insert equipe 8', '2024-01-20', 'admin'),
(135, 'insert equipe 8 : equipe 1,', '2024-01-20', 'admin'),
(136, 'insert equipe 6', '2024-01-20', 'admin'),
(137, 'insert equipe 6 : equipe 1,', '2024-01-20', 'admin'),
(138, 'insert equipe 7', '2024-01-20', 'admin'),
(139, 'insert equipe 8', '2024-01-20', 'admin'),
(140, 'insert equipe 8 : equipe 1, 2,', '2024-01-20', 'admin'),
(141, 'insert equipe 9', '2024-01-20', 'admin'),
(142, 'insert equipe 10', '2024-01-20', 'admin'),
(143, 'insert equipe 10 : equipe', '2024-01-20', 'admin'),
(144, 'insert equipe 11', '2024-01-20', 'admin'),
(145, 'insert equipe 11 : equipe 1,', '2024-01-20', 'admin'),
(146, 'connexion', '2021-01-24', 'admin'),
(147, 'update entraineur 1', '2024-01-21', 'admin'),
(148, 'connexion', '2021-01-24', 'admin'),
(149, 'connexion', '2021-01-24', 'pDupont'),
(150, 'connexion', '2021-01-24', 'pDupont'),
(151, 'connexion', '2021-01-24', ''),
(152, 'connexion', '2021-01-24', ''),
(153, 'connexion', '2021-01-24', 'refref'),
(154, 'connexion', '2021-01-24', '');

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
('1', '01/12/2023', 'Mini-Marathons pour Enfants', 2),
('2', '01/09/2023', 'Festivals de Sports pour Enfants', 2),
('3', '01/08/2023', 'Camps Sportifs pour Enfants ', 2),
('4', '01/07/2023', 'Initiations aux Sports', 2),
('5', '01/06/2023', 'Jeux Olympiques de la Jeunesse', 2),
('6', '01/02/2023', 'Festivals Culturels et Cinéma Autour des Jeux Olympiques ', 1),
('7', '01/01/2023', 'Tour de France et Culture Régionale', 1),
('8', '01/03/2023', 'Événements sportifs et Culture Geek', 1),
('9', '01/06/2023', 'Rencontres Sportives en Musique', 1);

-- --------------------------------------------------------

--
-- Structure de la table `pouvoir`
--

DROP TABLE IF EXISTS `pouvoir`;
CREATE TABLE IF NOT EXISTS `pouvoir` (
  `idAdherent` int NOT NULL,
  `idEquipe` int NOT NULL,
  PRIMARY KEY (`idAdherent`,`idEquipe`),
  KEY `fk_pouvoir_equipe` (`idEquipe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pouvoir`
--

INSERT INTO `pouvoir` (`idAdherent`, `idEquipe`) VALUES
(1, 1),
(2, 1),
(5, 1),
(1, 2),
(3, 2),
(4, 2),
(2, 3);

--
-- Déclencheurs `pouvoir`
--
DROP TRIGGER IF EXISTS `insert pouvoir`;
DELIMITER $$
CREATE TRIGGER `insert pouvoir` BEFORE INSERT ON `pouvoir` FOR EACH ROW BEGIN
    declare nbInscrit int default 0;
    declare maxi int default 0;
    DECLARE nbInscriptions int default 0;
    declare ageAdherent int default 0;
    declare ageMax int default 0;
    declare ageMin int default 0;
    set ageMin = (
        select sum(equipe.ageMinEquipe) 
        from equipe 
        where equipe.idEquipe = new.idEquipe);
    set ageMax = (
        select sum(equipe.ageMaxEquipe) 
        from equipe 
        where equipe.idEquipe = new.idEquipe);
    set ageAdherent = (
        select sum(adherent.ageAdherent) 
        from adherent 
        where adherent.idAdherent = new.idAdherent);
    set nbInscriptions = (
        select count(pouvoir.idEquipe) 
        from pouvoir 
        where pouvoir.idAdherent = new.idAdherent);
    set nbInscrit = (
        select count(pouvoir.idAdherent) 
        from pouvoir 
        where idEquipe = new.idEquipe);
    set maxi = (
        select sum(equipe.nbrPlaceEquipe) 
        from equipe 
        where equipe.idEquipe = new.idEquipe);
    if (nbInscrit >= maxi) THEN
        signal SQLSTATE '10008' set MESSAGE_TEXT = 'Nombre d adherent max déjà atteint';
    end IF;
    if (nbInscriptions > 2) THEN
    	signal SQLSTATE '10009' set MESSAGE_TEXT = 'Nombre d inscriptions max atteint';
    end if;
    if (ageAdherent > ageMax or ageAdherent < ageMin) THEN
    	signal SQLSTATE '10010' set MESSAGE_TEXT = 'L âge ne correspond pas a l equipe';
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(7, 'moto bike');

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
(1, '2022-10-12'),
(3, '2020-10-12');

--
-- Déclencheurs `titulaire`
--
DROP TRIGGER IF EXISTS `insert titulaire`;
DELIMITER $$
CREATE TRIGGER `insert titulaire` BEFORE INSERT ON `titulaire` FOR EACH ROW BEGIN
	if ((SELECT count(*) from vacataire where vacataire.idEntraineur = new.idEntraineur) > 0) THEN
    	signal SQLSTATE '10006' set MESSAGE_TEXT = 'Objet déjà présent dans une autre table, table vacataire';
    end IF;
    if ((SELECT count(*) from entraineur where entraineur.idEntraineur = new.idEntraineur) < 1) THEN
    	signal SQLSTATE '10007' set MESSAGE_TEXT = 'Objet innnexistant dans la table parent, table entraineur';
    end IF;
END
$$
DELIMITER ;

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
(2, '0625451215'),
(4, '0685447740');

--
-- Déclencheurs `vacataire`
--
DROP TRIGGER IF EXISTS `insert vacataire`;
DELIMITER $$
CREATE TRIGGER `insert vacataire` BEFORE INSERT ON `vacataire` FOR EACH ROW BEGIN
	if ((SELECT count(*) from titulaire where titulaire.idEntraineur = new.idEntraineur) > 0) THEN
    	signal SQLSTATE '10006' set MESSAGE_TEXT = 'Objet déjà présent dans une autre table, table titulaire';
    end IF;
    if ((SELECT count(*) from entraineur where entraineur.idEntraineur = new.idEntraineur) < 1) THEN
    	signal SQLSTATE '10007' set MESSAGE_TEXT = 'Objet innnexistant dans la table parent, table entraineur';
    end IF;
END
$$
DELIMITER ;

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
  ADD CONSTRAINT `fk_pouvoir_adherent` FOREIGN KEY (`idAdherent`) REFERENCES `adherent` (`idAdherent`),
  ADD CONSTRAINT `fk_pouvoir_equipe` FOREIGN KEY (`idEquipe`) REFERENCES `equipe` (`idEquipe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
