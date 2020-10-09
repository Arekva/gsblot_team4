-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 09 oct. 2020 à 12:18
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `stadjutoogg4`
--

-- --------------------------------------------------------

--
-- Structure de la table `gsb_echantillon`
--

DROP TABLE IF EXISTS `gsb_echantillon`;
CREATE TABLE IF NOT EXISTS `gsb_echantillon` (
  `gsb_numero` int(11) NOT NULL AUTO_INCREMENT,
  `gsb_numeroLot` int(11) NOT NULL,
  `dateSortie` datetime DEFAULT NULL,
  `dateDon` datetime DEFAULT NULL,
  `gsb_idVisitualisateur` varchar(50) DEFAULT NULL,
  `gsb_matriculeMedecins` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`gsb_numero`,`gsb_numeroLot`),
  KEY `gsb_idVisitualisateur` (`gsb_idVisitualisateur`),
  KEY `gsb_matriculeMedecins` (`gsb_matriculeMedecins`),
  KEY `gsb_numeroLot` (`gsb_numeroLot`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `gsb_echantillon`
--

INSERT INTO `gsb_echantillon` (`gsb_numero`, `gsb_numeroLot`, `dateSortie`, `dateDon`, `gsb_idVisitualisateur`, `gsb_matriculeMedecins`) VALUES
(1, 1, '2020-09-07 00:00:00', '2020-09-08 00:00:00', '3', 'T2eW0R1D'),
(1, 15, NULL, NULL, NULL, NULL),
(2, 15, NULL, NULL, NULL, NULL),
(3, 15, NULL, NULL, NULL, NULL),
(4, 15, NULL, NULL, NULL, NULL),
(5, 15, NULL, NULL, NULL, NULL),
(6, 15, NULL, NULL, NULL, NULL),
(7, 15, NULL, NULL, NULL, NULL),
(8, 15, NULL, NULL, NULL, NULL),
(9, 15, NULL, NULL, NULL, NULL),
(10, 15, NULL, NULL, NULL, NULL),
(1, 16, NULL, NULL, NULL, NULL),
(2, 16, NULL, NULL, NULL, NULL),
(1, 17, NULL, NULL, NULL, NULL),
(2, 17, NULL, NULL, NULL, NULL),
(3, 17, NULL, NULL, NULL, NULL),
(4, 17, NULL, NULL, NULL, NULL),
(5, 17, NULL, NULL, NULL, NULL),
(1, 18, NULL, NULL, NULL, NULL),
(2, 18, NULL, NULL, NULL, NULL),
(3, 18, NULL, NULL, NULL, NULL),
(4, 18, NULL, NULL, NULL, NULL),
(5, 18, NULL, NULL, NULL, NULL),
(1, 19, NULL, NULL, NULL, NULL),
(2, 19, NULL, NULL, NULL, NULL),
(3, 19, NULL, NULL, NULL, NULL),
(4, 19, NULL, NULL, NULL, NULL),
(5, 19, NULL, NULL, NULL, NULL),
(6, 19, NULL, NULL, NULL, NULL),
(7, 19, NULL, NULL, NULL, NULL),
(8, 19, NULL, NULL, NULL, NULL),
(9, 19, NULL, NULL, NULL, NULL),
(10, 19, NULL, NULL, NULL, NULL),
(11, 19, NULL, NULL, NULL, NULL),
(1, 20, NULL, NULL, NULL, NULL),
(2, 20, NULL, NULL, NULL, NULL),
(3, 20, NULL, NULL, NULL, NULL),
(4, 20, NULL, NULL, NULL, NULL),
(5, 20, NULL, NULL, NULL, NULL),
(6, 20, NULL, NULL, NULL, NULL),
(7, 20, NULL, NULL, NULL, NULL),
(8, 20, NULL, NULL, NULL, NULL),
(9, 20, NULL, NULL, NULL, NULL),
(10, 20, NULL, NULL, NULL, NULL),
(11, 20, NULL, NULL, NULL, NULL),
(12, 20, NULL, NULL, NULL, NULL),
(13, 20, NULL, NULL, NULL, NULL),
(14, 20, NULL, NULL, NULL, NULL),
(1, 21, NULL, NULL, NULL, NULL),
(2, 21, NULL, NULL, NULL, NULL),
(3, 21, NULL, NULL, NULL, NULL),
(4, 21, NULL, NULL, NULL, NULL),
(5, 21, NULL, NULL, NULL, NULL),
(6, 21, NULL, NULL, NULL, NULL),
(7, 21, NULL, NULL, NULL, NULL),
(8, 21, NULL, NULL, NULL, NULL),
(9, 21, NULL, NULL, NULL, NULL),
(10, 21, NULL, NULL, NULL, NULL),
(11, 21, NULL, NULL, NULL, NULL),
(12, 21, NULL, NULL, NULL, NULL),
(13, 21, NULL, NULL, NULL, NULL),
(14, 21, NULL, NULL, NULL, NULL),
(15, 21, NULL, NULL, NULL, NULL),
(16, 21, NULL, NULL, NULL, NULL),
(17, 21, NULL, NULL, NULL, NULL),
(18, 21, NULL, NULL, NULL, NULL),
(19, 21, NULL, NULL, NULL, NULL),
(20, 21, NULL, NULL, NULL, NULL),
(1, 22, NULL, NULL, NULL, NULL),
(2, 22, NULL, NULL, NULL, NULL),
(3, 22, NULL, NULL, NULL, NULL),
(4, 22, NULL, NULL, NULL, NULL),
(5, 22, NULL, NULL, NULL, NULL),
(6, 22, NULL, NULL, NULL, NULL),
(7, 22, NULL, NULL, NULL, NULL),
(8, 22, NULL, NULL, NULL, NULL),
(9, 22, NULL, NULL, NULL, NULL),
(10, 22, NULL, NULL, NULL, NULL),
(1, 23, NULL, NULL, NULL, NULL),
(2, 23, NULL, NULL, NULL, NULL),
(3, 23, NULL, NULL, NULL, NULL),
(4, 23, NULL, NULL, NULL, NULL),
(5, 23, NULL, NULL, NULL, NULL),
(6, 23, NULL, NULL, NULL, NULL),
(7, 23, NULL, NULL, NULL, NULL),
(8, 23, NULL, NULL, NULL, NULL),
(9, 23, NULL, NULL, NULL, NULL),
(10, 23, NULL, NULL, NULL, NULL),
(11, 23, NULL, NULL, NULL, NULL),
(12, 23, NULL, NULL, NULL, NULL),
(13, 23, NULL, NULL, NULL, NULL),
(14, 23, NULL, NULL, NULL, NULL),
(15, 23, NULL, NULL, NULL, NULL),
(1, 24, NULL, NULL, NULL, NULL),
(2, 24, NULL, NULL, NULL, NULL),
(3, 24, NULL, NULL, NULL, NULL),
(4, 24, NULL, NULL, NULL, NULL),
(5, 24, NULL, NULL, NULL, NULL),
(6, 24, NULL, NULL, NULL, NULL),
(7, 24, NULL, NULL, NULL, NULL),
(8, 24, NULL, NULL, NULL, NULL),
(9, 24, NULL, NULL, NULL, NULL),
(10, 24, NULL, NULL, NULL, NULL),
(11, 24, NULL, NULL, NULL, NULL),
(12, 24, NULL, NULL, NULL, NULL),
(13, 24, NULL, NULL, NULL, NULL),
(14, 24, NULL, NULL, NULL, NULL),
(15, 24, NULL, NULL, NULL, NULL),
(1, 25, NULL, NULL, NULL, NULL),
(2, 25, NULL, NULL, NULL, NULL),
(3, 25, NULL, NULL, NULL, NULL),
(4, 25, NULL, NULL, NULL, NULL),
(5, 25, NULL, NULL, NULL, NULL),
(6, 25, NULL, NULL, NULL, NULL),
(7, 25, NULL, NULL, NULL, NULL),
(8, 25, NULL, NULL, NULL, NULL),
(9, 25, NULL, NULL, NULL, NULL),
(10, 25, NULL, NULL, NULL, NULL),
(11, 25, NULL, NULL, NULL, NULL),
(12, 25, NULL, NULL, NULL, NULL),
(13, 25, NULL, NULL, NULL, NULL),
(14, 25, NULL, NULL, NULL, NULL),
(15, 25, NULL, NULL, NULL, NULL),
(16, 25, NULL, NULL, NULL, NULL),
(17, 25, NULL, NULL, NULL, NULL),
(1, 26, NULL, NULL, NULL, NULL),
(2, 26, NULL, NULL, NULL, NULL),
(3, 26, NULL, NULL, NULL, NULL),
(4, 26, NULL, NULL, NULL, NULL),
(5, 26, NULL, NULL, NULL, NULL),
(6, 26, NULL, NULL, NULL, NULL),
(7, 26, NULL, NULL, NULL, NULL),
(8, 26, NULL, NULL, NULL, NULL),
(9, 26, NULL, NULL, NULL, NULL),
(10, 26, NULL, NULL, NULL, NULL),
(11, 26, NULL, NULL, NULL, NULL),
(12, 26, NULL, NULL, NULL, NULL),
(13, 26, NULL, NULL, NULL, NULL),
(14, 26, NULL, NULL, NULL, NULL),
(15, 26, NULL, NULL, NULL, NULL),
(16, 26, NULL, NULL, NULL, NULL),
(17, 26, NULL, NULL, NULL, NULL),
(18, 26, NULL, NULL, NULL, NULL),
(19, 26, NULL, NULL, NULL, NULL),
(20, 26, NULL, NULL, NULL, NULL),
(1, 27, NULL, NULL, NULL, NULL),
(2, 27, NULL, NULL, NULL, NULL),
(3, 27, NULL, NULL, NULL, NULL),
(4, 27, NULL, NULL, NULL, NULL),
(5, 27, NULL, NULL, NULL, NULL),
(6, 27, NULL, NULL, NULL, NULL),
(7, 27, NULL, NULL, NULL, NULL),
(8, 27, NULL, NULL, NULL, NULL),
(9, 27, NULL, NULL, NULL, NULL),
(10, 27, NULL, NULL, NULL, NULL),
(11, 27, NULL, NULL, NULL, NULL),
(12, 27, NULL, NULL, NULL, NULL),
(13, 27, NULL, NULL, NULL, NULL),
(1, 28, NULL, NULL, NULL, NULL),
(2, 28, NULL, NULL, NULL, NULL),
(3, 28, NULL, NULL, NULL, NULL),
(4, 28, NULL, NULL, NULL, NULL),
(5, 28, NULL, NULL, NULL, NULL),
(6, 28, NULL, NULL, NULL, NULL),
(7, 28, NULL, NULL, NULL, NULL),
(8, 28, NULL, NULL, NULL, NULL),
(9, 28, NULL, NULL, NULL, NULL),
(10, 28, NULL, NULL, NULL, NULL),
(11, 28, NULL, NULL, NULL, NULL),
(12, 28, NULL, NULL, NULL, NULL),
(13, 28, NULL, NULL, NULL, NULL),
(14, 28, NULL, NULL, NULL, NULL),
(15, 28, NULL, NULL, NULL, NULL),
(16, 28, NULL, NULL, NULL, NULL),
(17, 28, NULL, NULL, NULL, NULL),
(18, 28, NULL, NULL, NULL, NULL),
(19, 28, NULL, NULL, NULL, NULL),
(20, 28, NULL, NULL, NULL, NULL),
(1, 29, NULL, NULL, NULL, NULL),
(2, 29, NULL, NULL, NULL, NULL),
(3, 29, NULL, NULL, NULL, NULL),
(4, 29, NULL, NULL, NULL, NULL),
(5, 29, NULL, NULL, NULL, NULL),
(6, 29, NULL, NULL, NULL, NULL),
(7, 29, NULL, NULL, NULL, NULL),
(8, 29, NULL, NULL, NULL, NULL),
(9, 29, NULL, NULL, NULL, NULL),
(10, 29, NULL, NULL, NULL, NULL),
(11, 29, NULL, NULL, NULL, NULL),
(12, 29, NULL, NULL, NULL, NULL),
(13, 29, NULL, NULL, NULL, NULL),
(14, 29, NULL, NULL, NULL, NULL),
(15, 29, NULL, NULL, NULL, NULL),
(16, 29, NULL, NULL, NULL, NULL),
(17, 29, NULL, NULL, NULL, NULL),
(18, 29, NULL, NULL, NULL, NULL),
(19, 29, NULL, NULL, NULL, NULL),
(1, 30, NULL, NULL, NULL, NULL),
(2, 30, NULL, NULL, NULL, NULL),
(3, 30, NULL, NULL, NULL, NULL),
(4, 30, NULL, NULL, NULL, NULL),
(5, 30, NULL, NULL, NULL, NULL),
(6, 30, NULL, NULL, NULL, NULL),
(7, 30, NULL, NULL, NULL, NULL),
(8, 30, NULL, NULL, NULL, NULL),
(9, 30, NULL, NULL, NULL, NULL),
(10, 30, NULL, NULL, NULL, NULL),
(11, 30, NULL, NULL, NULL, NULL),
(12, 30, NULL, NULL, NULL, NULL),
(13, 30, NULL, NULL, NULL, NULL),
(14, 30, NULL, NULL, NULL, NULL),
(15, 30, NULL, NULL, NULL, NULL),
(16, 30, NULL, NULL, NULL, NULL),
(17, 30, NULL, NULL, NULL, NULL),
(18, 30, NULL, NULL, NULL, NULL),
(19, 30, NULL, NULL, NULL, NULL),
(1, 31, NULL, NULL, NULL, NULL),
(2, 31, NULL, NULL, NULL, NULL),
(3, 31, NULL, NULL, NULL, NULL),
(4, 31, NULL, NULL, NULL, NULL),
(5, 31, NULL, NULL, NULL, NULL),
(6, 31, NULL, NULL, NULL, NULL),
(7, 31, NULL, NULL, NULL, NULL),
(8, 31, NULL, NULL, NULL, NULL),
(9, 31, NULL, NULL, NULL, NULL),
(10, 31, NULL, NULL, NULL, NULL),
(11, 31, NULL, NULL, NULL, NULL),
(12, 31, NULL, NULL, NULL, NULL),
(13, 31, NULL, NULL, NULL, NULL),
(14, 31, NULL, NULL, NULL, NULL),
(15, 31, NULL, NULL, NULL, NULL),
(16, 31, NULL, NULL, NULL, NULL),
(17, 31, NULL, NULL, NULL, NULL),
(18, 31, NULL, NULL, NULL, NULL),
(1, 32, NULL, NULL, NULL, NULL),
(2, 32, NULL, NULL, NULL, NULL),
(3, 32, NULL, NULL, NULL, NULL),
(4, 32, NULL, NULL, NULL, NULL),
(5, 32, NULL, NULL, NULL, NULL),
(6, 32, NULL, NULL, NULL, NULL),
(7, 32, NULL, NULL, NULL, NULL),
(8, 32, NULL, NULL, NULL, NULL),
(9, 32, NULL, NULL, NULL, NULL),
(10, 32, NULL, NULL, NULL, NULL),
(11, 32, NULL, NULL, NULL, NULL),
(12, 32, NULL, NULL, NULL, NULL),
(13, 32, NULL, NULL, NULL, NULL),
(14, 32, NULL, NULL, NULL, NULL),
(15, 32, NULL, NULL, NULL, NULL),
(1, 33, NULL, NULL, NULL, NULL),
(2, 33, NULL, NULL, NULL, NULL),
(3, 33, NULL, NULL, NULL, NULL),
(4, 33, NULL, NULL, NULL, NULL),
(5, 33, NULL, NULL, NULL, NULL),
(6, 33, NULL, NULL, NULL, NULL),
(7, 33, NULL, NULL, NULL, NULL),
(8, 33, NULL, NULL, NULL, NULL),
(9, 33, NULL, NULL, NULL, NULL),
(10, 33, NULL, NULL, NULL, NULL),
(1, 34, NULL, NULL, NULL, NULL),
(2, 34, NULL, NULL, NULL, NULL),
(3, 34, NULL, NULL, NULL, NULL),
(4, 34, NULL, NULL, NULL, NULL),
(5, 34, NULL, NULL, NULL, NULL),
(6, 34, NULL, NULL, NULL, NULL),
(7, 34, NULL, NULL, NULL, NULL),
(8, 34, NULL, NULL, NULL, NULL),
(9, 34, NULL, NULL, NULL, NULL),
(10, 34, NULL, NULL, NULL, NULL),
(11, 34, NULL, NULL, NULL, NULL),
(12, 34, NULL, NULL, NULL, NULL),
(13, 34, NULL, NULL, NULL, NULL),
(14, 34, NULL, NULL, NULL, NULL),
(15, 34, NULL, NULL, NULL, NULL),
(16, 34, NULL, NULL, NULL, NULL),
(17, 34, NULL, NULL, NULL, NULL),
(18, 34, NULL, NULL, NULL, NULL),
(19, 34, NULL, NULL, NULL, NULL),
(20, 34, NULL, NULL, NULL, NULL),
(1, 35, NULL, NULL, NULL, NULL),
(2, 35, NULL, NULL, NULL, NULL),
(3, 35, NULL, NULL, NULL, NULL),
(4, 35, NULL, NULL, NULL, NULL),
(5, 35, NULL, NULL, NULL, NULL),
(6, 35, NULL, NULL, NULL, NULL),
(7, 35, NULL, NULL, NULL, NULL),
(8, 35, NULL, NULL, NULL, NULL),
(9, 35, NULL, NULL, NULL, NULL),
(10, 35, NULL, NULL, NULL, NULL),
(11, 35, NULL, NULL, NULL, NULL),
(12, 35, NULL, NULL, NULL, NULL),
(13, 35, NULL, NULL, NULL, NULL),
(14, 35, NULL, NULL, NULL, NULL),
(15, 35, NULL, NULL, NULL, NULL),
(16, 35, NULL, NULL, NULL, NULL),
(17, 35, NULL, NULL, NULL, NULL),
(18, 35, NULL, NULL, NULL, NULL),
(1, 36, NULL, NULL, NULL, NULL),
(2, 36, NULL, NULL, NULL, NULL),
(3, 36, NULL, NULL, NULL, NULL),
(4, 36, NULL, NULL, NULL, NULL),
(5, 36, NULL, NULL, NULL, NULL),
(6, 36, NULL, NULL, NULL, NULL),
(7, 36, NULL, NULL, NULL, NULL),
(8, 36, NULL, NULL, NULL, NULL),
(9, 36, NULL, NULL, NULL, NULL),
(10, 36, NULL, NULL, NULL, NULL),
(11, 36, NULL, NULL, NULL, NULL),
(12, 36, NULL, NULL, NULL, NULL),
(13, 36, NULL, NULL, NULL, NULL),
(14, 36, NULL, NULL, NULL, NULL),
(15, 36, NULL, NULL, NULL, NULL),
(16, 36, NULL, NULL, NULL, NULL),
(1, 37, NULL, NULL, NULL, NULL),
(2, 37, NULL, NULL, NULL, NULL),
(3, 37, NULL, NULL, NULL, NULL),
(4, 37, NULL, NULL, NULL, NULL),
(5, 37, NULL, NULL, NULL, NULL),
(6, 37, NULL, NULL, NULL, NULL),
(7, 37, NULL, NULL, NULL, NULL),
(8, 37, NULL, NULL, NULL, NULL),
(9, 37, NULL, NULL, NULL, NULL),
(10, 37, NULL, NULL, NULL, NULL),
(11, 37, NULL, NULL, NULL, NULL),
(12, 37, NULL, NULL, NULL, NULL),
(13, 37, NULL, NULL, NULL, NULL),
(14, 37, NULL, NULL, NULL, NULL),
(1, 38, NULL, NULL, NULL, NULL),
(2, 38, NULL, NULL, NULL, NULL),
(3, 38, NULL, NULL, NULL, NULL),
(4, 38, NULL, NULL, NULL, NULL),
(5, 38, NULL, NULL, NULL, NULL),
(6, 38, NULL, NULL, NULL, NULL),
(7, 38, NULL, NULL, NULL, NULL),
(8, 38, NULL, NULL, NULL, NULL),
(9, 38, NULL, NULL, NULL, NULL),
(10, 38, NULL, NULL, NULL, NULL),
(11, 38, NULL, NULL, NULL, NULL),
(12, 38, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `gsb_lot`
--

DROP TABLE IF EXISTS `gsb_lot`;
CREATE TABLE IF NOT EXISTS `gsb_lot` (
  `gsb_numero` int(11) NOT NULL AUTO_INCREMENT,
  `gsb_dateFabrication` date DEFAULT NULL,
  `gsb_idMedicament` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`gsb_numero`),
  KEY `gsb_idMedicament` (`gsb_idMedicament`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `gsb_lot`
--

INSERT INTO `gsb_lot` (`gsb_numero`, `gsb_dateFabrication`, `gsb_idMedicament`) VALUES
(1, '2019-12-10', '3'),
(16, '2020-09-16', '1'),
(15, '2020-01-01', '1'),
(17, '2020-01-01', '3'),
(18, '2020-01-09', '4'),
(19, '2020-10-14', '1'),
(20, '2020-10-18', '1'),
(21, '2020-09-16', '1'),
(22, '2020-10-04', '2'),
(23, '2020-09-17', '2'),
(24, '2020-09-26', '2'),
(25, '2020-09-15', '2'),
(26, '2020-07-15', '2'),
(27, '2020-08-06', '3'),
(28, '2020-07-10', '3'),
(29, '2020-09-10', '3'),
(30, '2020-10-06', '4'),
(31, '2020-10-22', '4'),
(32, '2020-10-12', '4'),
(33, '2020-11-04', '4'),
(34, '2020-10-12', '5'),
(35, '2020-10-13', '5'),
(36, '2020-10-15', '5'),
(37, '2020-10-21', '5'),
(38, '2020-10-24', '5');

-- --------------------------------------------------------

--
-- Structure de la table `gsb_medecins`
--

DROP TABLE IF EXISTS `gsb_medecins`;
CREATE TABLE IF NOT EXISTS `gsb_medecins` (
  `gsb_matricule` varchar(50) NOT NULL,
  `gsb_nom` varchar(50) DEFAULT NULL,
  `gsb_prenom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`gsb_matricule`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `gsb_medecins`
--

INSERT INTO `gsb_medecins` (`gsb_matricule`, `gsb_nom`, `gsb_prenom`) VALUES
('T2eW0R1D', 'Brando', 'DIO'),
('AATTORNEY', 'Wright', 'Pheonix'),
('MATH2M2G1C1AN', 'Roui', 'Lucian'),
('TOFU', 'Fujiwara', 'Takumi');

-- --------------------------------------------------------

--
-- Structure de la table `gsb_medicament`
--

DROP TABLE IF EXISTS `gsb_medicament`;
CREATE TABLE IF NOT EXISTS `gsb_medicament` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `gsb_medicament`
--

INSERT INTO `gsb_medicament` (`id`, `libelle`) VALUES
(1, 'Homophobiol'),
(2, 'Fepalcon500'),
(3, 'UltraXanax42000'),
(4, 'Benefix'),
(5, 'ArgonFasil');

-- --------------------------------------------------------

--
-- Structure de la table `gsb_visitualisateur`
--

DROP TABLE IF EXISTS `gsb_visitualisateur`;
CREATE TABLE IF NOT EXISTS `gsb_visitualisateur` (
  `gsb_id` varchar(50) NOT NULL,
  `gsb_login` varchar(50) DEFAULT NULL,
  `gsb_mdp` varchar(50) DEFAULT NULL,
  `gsb_autorisation` varchar(50) DEFAULT NULL,
  `gsb_nom` varchar(50) DEFAULT NULL,
  `gsb_prenom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`gsb_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `gsb_visitualisateur`
--

INSERT INTO `gsb_visitualisateur` (`gsb_id`, `gsb_login`, `gsb_mdp`, `gsb_autorisation`, `gsb_nom`, `gsb_prenom`) VALUES
('1', 'aaa', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0', '1', 'Produilla', 'Laura'),
('2', 'bbb', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0', '2', 'Jeanmagasine', 'Détruc'),
('3', 'ccc', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0', '3', 'Jeanvévoir', 'medocin'),
('4', 'ddd', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0', '3', 'Visiteur2', 'VistorTwo'),
('5', 'eee', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0', '3', 'Visiteur3', 'VistorThree');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
