-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 24 sep. 2020 à 12:47
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(5, 18, NULL, NULL, NULL, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `gsb_lot`
--

INSERT INTO `gsb_lot` (`gsb_numero`, `gsb_dateFabrication`, `gsb_idMedicament`) VALUES
(1, '2019-12-10', '3'),
(16, '2020-09-16', '1'),
(15, '2020-01-01', '1'),
(17, '2020-01-01', '3'),
(18, '2020-01-09', '4');

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
('1', 'aaa', 'mdp', '1', 'ProdUilla', 'UillaProd'),
('2', 'bbb', 'mdp', '2', 'jeanMagasine', 'magosinJean'),
('3', 'ccc', 'mdp', '3', 'SteveVisiteur', 'VisiteurSteve'),
('4', 'ddd', 'mdp', '3', 'Visiteur2', 'VistorTwo'),
('5', 'eee', 'mdp', '3', 'Visiteur3', 'VistorThree');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
