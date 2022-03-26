-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 26 mars 2022 à 20:11
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet4a`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `Identifiant_admin` int(6) NOT NULL AUTO_INCREMENT,
  `Nom_admin` varchar(100) NOT NULL,
  `Email_admin` varchar(150) NOT NULL,
  `Mdp_admin` varchar(150) NOT NULL,
  `Prénom_admin` varchar(100) NOT NULL,
  PRIMARY KEY (`Identifiant_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `convention`
--

DROP TABLE IF EXISTS `convention`;
CREATE TABLE IF NOT EXISTS `convention` (
  `Identifiant_conv` int(6) NOT NULL AUTO_INCREMENT,
  `Nom_entreprise_signataire_conv` varchar(155) NOT NULL,
  `Prénom_entreprise_signataire_conv` varchar(50) DEFAULT NULL,
  `Adresse_envoi_conv` varchar(255) DEFAULT NULL,
  `Identifiant_entreprise` int(6) NOT NULL,
  `Identifiant_stage` int(6) NOT NULL,
  PRIMARY KEY (`Identifiant_conv`),
  KEY `fk_id_entreprise_conv` (`Identifiant_entreprise`),
  KEY `fk_id_stage_conv` (`Identifiant_stage`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `convention`
--

INSERT INTO `convention` (`Identifiant_conv`, `Nom_entreprise_signataire_conv`, `Prénom_entreprise_signataire_conv`, `Adresse_envoi_conv`, `Identifiant_entreprise`, `Identifiant_stage`) VALUES
(3, 'Signataire', 'Signataire', 'adresse statique', 24, 8),
(4, 'ENT', 'ENT', 'adresse statique', 25, 8),
(5, 'ENT', 'ENT', 'adresse statique', 26, 8),
(6, 'ENT', 'ENT', 'adresse statique', 27, 9);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `Identifiant_entreprise` int(6) NOT NULL AUTO_INCREMENT,
  `Nom_entreprise` varchar(150) NOT NULL,
  `SIRET_entreprise` varchar(150) NOT NULL,
  `NAF_APE_entreprise` varchar(150) DEFAULT NULL,
  `Nom_dirigeant_entreprise` varchar(100) NOT NULL,
  `Prenom_dirigeant_entreprise` varchar(150) NOT NULL,
  `Email_entreprise` varchar(150) NOT NULL,
  `rue` varchar(30) NOT NULL,
  `cp` varchar(30) NOT NULL,
  `ville` varchar(30) NOT NULL,
  PRIMARY KEY (`Identifiant_entreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`Identifiant_entreprise`, `Nom_entreprise`, `SIRET_entreprise`, `NAF_APE_entreprise`, `Nom_dirigeant_entreprise`, `Prenom_dirigeant_entreprise`, `Email_entreprise`, `rue`, `cp`, `ville`) VALUES
(24, 'Sopra', '1234', '5678', 'Mohamed', 'Saidi', 'arbisaidi8@gmail.com', '16 boulevard Charles Nicolle', '72000', 'Le Mans'),
(25, 'ENT', 'ENT', 'ENT', 'ENT', 'ENT', 'ENT', 'ENT', 'ENT', 'ENT'),
(26, 'ENT', 'ENT', 'ENT', 'ENT', 'ENT', 'ENT', 'ENT', 'ENT', 'ENT'),
(27, 'ENT', 'ENT', 'ENT', 'ENT', 'ENT', 'ENT', 'ENT', 'ENT', 'ENT');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `Num_etudiant` varchar(100) NOT NULL,
  `Nom_etudiant` varchar(100) NOT NULL,
  `Prenom_etudiant` varchar(100) NOT NULL,
  `Date_naissance_etudiant` date DEFAULT NULL,
  `Adresse_etudiant` varchar(500) DEFAULT NULL,
  `Tel_etudiant` varchar(20) DEFAULT NULL,
  `Email_etudiant` varchar(150) DEFAULT NULL,
  `Attestation_url` varchar(500) DEFAULT NULL,
  `nom_entreprise` varchar(30) DEFAULT NULL,
  `email_entreprise` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `Num_etudiant`, `Nom_etudiant`, `Prenom_etudiant`, `Date_naissance_etudiant`, `Adresse_etudiant`, `Tel_etudiant`, `Email_etudiant`, `Attestation_url`, `nom_entreprise`, `email_entreprise`) VALUES
(1, 'e2105465', 'Saidi', 'Mohamed', '1998-10-15', '16 boulevard Charles Nicolle', '0668259886', 'arbisaidi8@gmail.com', NULL, 'Test', 'Test@gmail.com'),
(2, '1234', 'Saidi', 'Arbi', '2022-03-09', '16 boulevard Charles Nicolle', '0668259886', 'arbisaidi8@gmail.com', NULL, 'Arbi Saidi', 'arbisaidi8@gmail.com'),
(3, 'e2105465', 'Doe', 'John', NULL, NULL, NULL, NULL, NULL, 'Test', 'Test@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `maitre_de_stage`
--

DROP TABLE IF EXISTS `maitre_de_stage`;
CREATE TABLE IF NOT EXISTS `maitre_de_stage` (
  `Identifiant_super` int(6) NOT NULL AUTO_INCREMENT,
  `Nom_super` varchar(100) NOT NULL,
  `Prenom_super` varchar(100) NOT NULL,
  `Statut_super` varchar(100) NOT NULL,
  `Poste_occupe` varchar(100) NOT NULL,
  `Tel_super` varchar(20) NOT NULL,
  `Email_super` varchar(150) NOT NULL,
  `Identifiant_entreprise` int(6) NOT NULL,
  PRIMARY KEY (`Identifiant_super`),
  KEY `fk_id_entreprise_maitre` (`Identifiant_entreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `maitre_de_stage`
--

INSERT INTO `maitre_de_stage` (`Identifiant_super`, `Nom_super`, `Prenom_super`, `Statut_super`, `Poste_occupe`, `Tel_super`, `Email_super`, `Identifiant_entreprise`) VALUES
(30, 'Maitre1', 'Maitre1', 'Maitre1', 'Maitre1', 'Maitre1', 'Maitre1', 24),
(31, 'Maitre2', 'Maitre2', 'Maitre2', 'Maitre2', 'Maitre2', 'Maitre2', 24),
(32, 'ENT', 'ENT', 'ENT', 'ENT', 'ENT', 'ENT', 25),
(33, 'ENT', 'ENT', 'ENT', 'ENT', 'ENT', 'ENT', 25),
(34, 'ENT', 'ENT', 'ENT', 'ENT', 'ENT', 'ENT', 26),
(35, 'ENT', 'ENT', 'ENT', 'ENT', 'ENT', 'ENT', 26),
(36, 'ENT', 'ENT', 'ENT', 'ENT', 'ENT', 'ENT', 27),
(37, 'ENT', 'ENT', 'ENT', 'ENT', 'ENT', 'ENT', 27);

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

DROP TABLE IF EXISTS `stage`;
CREATE TABLE IF NOT EXISTS `stage` (
  `Identifiant_stage` int(6) NOT NULL AUTO_INCREMENT,
  `Titre_stage` varchar(255) NOT NULL,
  `Description_stage` varchar(1000) NOT NULL,
  `Date_debut_stage` date NOT NULL,
  `Date_fin_stage` date NOT NULL,
  `Nb_heures_semaine_stage` varchar(11) NOT NULL,
  `Covid_19_engagement_stage` int(11) NOT NULL,
  `Adresse_stage` varchar(500) NOT NULL,
  `IDE_stage` varchar(255) NOT NULL,
  `Gratification_stage` varchar(6) NOT NULL,
  `Avantage_stage` varchar(100) DEFAULT NULL,
  `id_etudiant` int(6) NOT NULL,
  `Identifiant_entreprise` int(6) NOT NULL,
  `Identifiant_tuteur` int(6) DEFAULT NULL,
  PRIMARY KEY (`Identifiant_stage`),
  KEY `fk_id_etudiant` (`id_etudiant`),
  KEY `fk_id_entreprise` (`Identifiant_entreprise`),
  KEY `fk_id_tuteur` (`Identifiant_tuteur`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stage`
--

INSERT INTO `stage` (`Identifiant_stage`, `Titre_stage`, `Description_stage`, `Date_debut_stage`, `Date_fin_stage`, `Nb_heures_semaine_stage`, `Covid_19_engagement_stage`, `Adresse_stage`, `IDE_stage`, `Gratification_stage`, `Avantage_stage`, `id_etudiant`, `Identifiant_entreprise`, `Identifiant_tuteur`) VALUES
(8, 'Stage dev', 'DevOps', '2022-02-25', '2022-03-12', '35', 1, '2 Impass Canal, rue MB, Bardo', 'IDE2', '1000', 'Transport', 1, 24, 1),
(9, 'Stage Reseaux', 'ENT', '2022-03-08', '2022-03-25', '22', 1, 'ENT', 'ENT', '3', 'ENT', 2, 27, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `token`
--

DROP TABLE IF EXISTS `token`;
CREATE TABLE IF NOT EXISTS `token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(50) NOT NULL,
  `validerEtudiant` int(11) NOT NULL,
  `validerEntreprise` int(11) NOT NULL,
  `id_etudiant` int(11) DEFAULT NULL,
  `id_entreprise` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_etudiant_token` (`id_etudiant`),
  KEY `fk_id_entreprise_token` (`id_entreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `token`
--

INSERT INTO `token` (`id`, `token`, `validerEtudiant`, `validerEntreprise`, `id_etudiant`, `id_entreprise`) VALUES
(18, 'TcQ1aI8mXo', 1, 0, 1, NULL),
(19, 'wdbtEsuPxr', 0, 1, 2, 27),
(20, 'CbMyglXa8z', 0, 0, 1, NULL),
(21, 'ySrhQucJP0', 0, 0, 1, NULL),
(22, 'Q4RjAxiDst', 0, 0, 3, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tuteur`
--

DROP TABLE IF EXISTS `tuteur`;
CREATE TABLE IF NOT EXISTS `tuteur` (
  `Identifiant_tuteur` int(6) NOT NULL AUTO_INCREMENT,
  `Nom_tuteur` varchar(100) NOT NULL,
  `Prenom_tuteur` varchar(100) NOT NULL,
  `Email_tuteur` varchar(100) NOT NULL,
  PRIMARY KEY (`Identifiant_tuteur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tuteur`
--

INSERT INTO `tuteur` (`Identifiant_tuteur`, `Nom_tuteur`, `Prenom_tuteur`, `Email_tuteur`) VALUES
(1, 'Hamon', 'Ludovic', 'EMAIL');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `convention`
--
ALTER TABLE `convention`
  ADD CONSTRAINT `fk_id_entreprise_conv` FOREIGN KEY (`Identifiant_entreprise`) REFERENCES `entreprise` (`Identifiant_entreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_stage_conv` FOREIGN KEY (`Identifiant_stage`) REFERENCES `stage` (`Identifiant_stage`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `maitre_de_stage`
--
ALTER TABLE `maitre_de_stage`
  ADD CONSTRAINT `fk_id_entreprise_maitre` FOREIGN KEY (`Identifiant_entreprise`) REFERENCES `entreprise` (`Identifiant_entreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `stage`
--
ALTER TABLE `stage`
  ADD CONSTRAINT `fk_id_entreprise` FOREIGN KEY (`Identifiant_entreprise`) REFERENCES `entreprise` (`Identifiant_entreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_etudiant` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_tuteur` FOREIGN KEY (`Identifiant_tuteur`) REFERENCES `tuteur` (`Identifiant_tuteur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_id_entreprise_token` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`Identifiant_entreprise`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_etudiant_token` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
