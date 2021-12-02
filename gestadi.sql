-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 02 déc. 2021 à 14:57
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
-- Base de données :  `gestadi`
--

-- --------------------------------------------------------

--
-- Structure de la table `form_etu`
--

DROP TABLE IF EXISTS `form_etu`;
CREATE TABLE IF NOT EXISTS `form_etu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `entreprise` varchar(50) NOT NULL,
  `email_entreprise` varchar(50) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_idetudiant` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `form_etu`
--

INSERT INTO `form_etu` (`id`, `type`, `date_debut`, `date_fin`, `entreprise`, `email_entreprise`, `user`) VALUES
(1, 1, '2021-12-10', '2021-12-24', 'SOPRA', 'arbisaidi8@gmail.com', 1),
(6, 1, '2021-12-24', '2022-01-01', 'TEST', 'arbisaidi8@gmail.com', 1),
(9, 2, '2021-12-25', '2021-12-04', 'Mail', 'arbisaidi8@gmail.com', 1),
(10, 2, '2021-12-25', '2021-12-04', 'Mail', 'arbisaidi8@gmail.com', 1),
(11, 2, '2021-12-25', '2021-12-04', 'Mail', 'arbisaidi8@gmail.com', 1),
(12, 2, '2021-12-25', '2021-12-04', 'Mail', 'arbisaidi8@gmail.com', 1),
(13, 1, '2021-12-24', '2022-01-01', 'Mail', 'arbisaidi8@gmail.com', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(512) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `role` varchar(50) NOT NULL,
  `enabled` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `numero`, `nom`, `prenom`, `email`, `password`, `telephone`, `adresse`, `date_naissance`, `role`, `enabled`) VALUES
(1, 'e2105465', 'Saidi', 'Mohamed', 'arbisaidi8@gmail.com', 'b14361404c078ffd549c03db443c3fede2f3e534d73f78f77301ed97d4a436a9fd9db05ee8b325c0ad36438b43fec8510c204fc1c1edb21d0941c00e9e2c1ce2', '0668259886', '16 Boulevard Charles Nicolle', '1998-10-15', 'Etudiant', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `form_etu`
--
ALTER TABLE `form_etu`
  ADD CONSTRAINT `fk_idetudiant` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
