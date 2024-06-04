-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 16 Mai 2024 à 16:27
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `pouna_wf`
--

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE IF NOT EXISTS `personne` (
  `id` int(10) unsigned NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `adresse` varchar(40) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `statut` int(10) unsigned NOT NULL,
  `specialite_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `specialite_id` (`specialite_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`id`, `nom`, `prenom`, `adresse`, `login`, `password`, `statut`, `specialite_id`) VALUES
(0, '?', '?', '?', '?', '?', 2, 0),
(10, 'GAILLARD', 'Paul', 'Troyes', 'boss1', 'secret', 0, 1),
(20, 'LERMINIAUX', 'Christian', 'Troyes', 'boss2', 'secret', 0, 1),
(30, 'KOCH', 'Pierre', 'Troyes', 'boss3', 'secret', 0, 1),
(40, 'COLLET', 'Christophe', 'Troyes', 'boss4', 'secret', 0, 1),
(50, 'PASTEUR', 'Louis', 'Paris', 'pasteur', 'secret', 1, 1),
(60, 'PARE', 'Ambroise', 'Rennes', 'pare', 'secret', 1, 1),
(70, 'LAENNEC', 'René', 'Nantes', 'laennec', 'secret', 1, 1),
(80, 'CALMETTE', 'Albert', 'Lille', 'calmette', 'secret', 1, 1),
(90, 'ROUX', 'Emile', 'Paris', 'roux', 'secret', 1, 1),
(100, 'PRIOR', 'Beatrice', 'Troyes', 'prior', 'secret', 1, 2),
(110, 'EATON', 'Tobias', 'Reims', 'tobias', 'secret', 1, 5),
(120, 'MATTHEWS', 'Jeanine', 'Dijon', 'matthews', 'secret', 1, 3),
(201, 'VENTURA', 'Lino', 'Paris', 'ventura', 'secret', 2, 0),
(202, 'DELON', 'Alain', 'Paris', 'delon', 'secret', 2, 0),
(203, 'GABIN', 'Jean', 'Paris', 'gabin', 'secret', 2, 0),
(204, 'HUPPERT', 'Isabelle', 'Troyes', 'huppert', 'secret', 2, 0),
(205, 'COTILLARD', 'Marion', 'Troyes', 'cotillard', 'secret', 2, 0),
(206, 'DEPP', 'Lily Rose', 'Troyes', 'depp', 'secret', 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `rendezvous`
--

CREATE TABLE IF NOT EXISTS `rendezvous` (
  `id` int(10) unsigned NOT NULL,
  `patient_id` int(10) unsigned NOT NULL,
  `praticien_id` int(10) unsigned NOT NULL,
  `rdv_date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `patient_id` (`patient_id`),
  KEY `praticien_id` (`praticien_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `rendezvous`
--

INSERT INTO `rendezvous` (`id`, `patient_id`, `praticien_id`, `rdv_date`) VALUES
(1, 201, 50, '2023-05-22 à 10h00'),
(2, 202, 50, '2023-05-22 à 11h00'),
(3, 203, 50, '2023-05-22 à 12h00'),
(4, 0, 50, '2023-05-22 à 13h00'),
(5, 0, 50, '2023-05-22 à 14h00'),
(6, 0, 50, '2023-05-22 à 15h00'),
(7, 0, 50, '2023-05-22 à 16h00'),
(8, 0, 50, '2023-05-22 à 17h00'),
(9, 0, 50, '2023-05-22 à 18h00'),
(10, 0, 50, '2023-05-22 à 19h00'),
(11, 201, 60, '2023-05-25 à 10h00'),
(12, 0, 60, '2023-05-25 à 11h00'),
(13, 0, 60, '2023-05-25 à 12h00'),
(14, 0, 60, '2023-05-25 à 13h00'),
(15, 0, 60, '2023-05-25 à 14h00'),
(16, 0, 60, '2023-05-25 à 15h00'),
(17, 0, 60, '2023-05-25 à 16h00'),
(18, 205, 60, '2023-05-25 à 17h00'),
(19, 0, 70, '2023-05-30 à 10h00'),
(20, 0, 70, '2023-05-30 à 11h00'),
(21, 0, 70, '2023-05-30 à 12h00'),
(22, 0, 70, '2023-05-30 à 13h00'),
(23, 0, 70, '2023-05-30 à 14h00'),
(24, 201, 70, '2023-05-30 à 15h00'),
(25, 0, 70, '2023-05-30 à 16h00'),
(26, 0, 70, '2023-05-30 à 17h00'),
(27, 0, 70, '2023-05-30 à 18h00'),
(28, 0, 70, '2023-05-30 à 19h00'),
(29, 0, 70, '2023-05-30 à 20h00'),
(30, 0, 70, '2023-05-30 à 21h00'),
(31, 0, 80, '2023-05-20 à 10h00'),
(32, 0, 80, '2023-05-20 à 11h00'),
(33, 206, 80, '2023-05-20 à 12h00'),
(34, 202, 80, '2023-05-20 à 13h00'),
(35, 203, 80, '2023-05-20 à 14h00'),
(36, 0, 90, '2023-06-01 à 10h00'),
(37, 0, 90, '2023-06-01 à 11h00'),
(38, 0, 90, '2023-06-01 à 12h00'),
(39, 0, 90, '2023-06-01 à 13h00'),
(40, 0, 90, '2023-06-01 à 14h00'),
(41, 204, 90, '2023-06-01 à 15h00'),
(42, 0, 90, '2023-06-01 à 16h00'),
(43, 0, 90, '2023-06-01 à 17h00');

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE IF NOT EXISTS `specialite` (
  `id` int(10) unsigned NOT NULL,
  `label` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `specialite`
--

INSERT INTO `specialite` (`id`, `label`) VALUES
(0, 'je ne suis pas un praticien'),
(1, 'médecin généraliste'),
(2, 'infirmier'),
(3, 'dentiste'),
(4, 'sage-femme'),
(5, 'ostéopathe'),
(6, 'kinésithérapeute');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `personne_ibfk_1` FOREIGN KEY (`specialite_id`) REFERENCES `specialite` (`id`);

--
-- Contraintes pour la table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD CONSTRAINT `rendezvous_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `personne` (`id`),
  ADD CONSTRAINT `rendezvous_ibfk_2` FOREIGN KEY (`praticien_id`) REFERENCES `personne` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
