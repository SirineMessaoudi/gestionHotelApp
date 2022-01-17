-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 03 jan. 2021 à 15:33
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
-- Base de données : `hotel`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fonction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `service` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

DROP TABLE IF EXISTS `chambre`;
CREATE TABLE IF NOT EXISTS `chambre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) DEFAULT NULL,
  `code_reservation_id` int(11) DEFAULT NULL,
  `prix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `disponibilite` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_chambre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_de_lit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `num_chambre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C509E4FFF30B501D` (`code_reservation_id`),
  KEY `IDX_C509E4FF3243BB18` (`hotel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_reservation_id` int(11) DEFAULT NULL,
  `card_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_postal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C7440455F30B501D` (`code_reservation_id`),
  UNIQUE KEY `UNIQ_C74404554ACC9A20` (`card_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) DEFAULT NULL,
  `texte` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_67F068BC3243BB18` (`hotel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `confirmations`
--

DROP TABLE IF EXISTS `confirmations`;
CREATE TABLE IF NOT EXISTS `confirmations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clients_id` int(11) DEFAULT NULL,
  `reservations_id` int(11) DEFAULT NULL,
  `confirmation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Cient_Reservation_unique` (`id`),
  KEY `IDX_34298E9EAB014612` (`clients_id`),
  KEY `IDX_34298E9ED9A7F869` (`reservations_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `credit_card`
--

DROP TABLE IF EXISTS `credit_card`;
CREATE TABLE IF NOT EXISTS `credit_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_person_id` int(11) DEFAULT NULL,
  `code_cvc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_person` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_card` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_expiration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_11D627EE55735813` (`card_person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_postal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commentaires` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nbre_etoiles` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hoteliers` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `hotelier`
--

DROP TABLE IF EXISTS `hotelier`;
CREATE TABLE IF NOT EXISTS `hotelier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4AC4D8673243BB18` (`hotel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `chambre_id` int(11) DEFAULT NULL,
  `date_reservation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_arrive` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_depart` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C454C68219EB6921` (`client_id`),
  UNIQUE KEY `UNIQ_C454C6829B177F54` (`chambre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `symfony_user`
--

DROP TABLE IF EXISTS `symfony_user`;
CREATE TABLE IF NOT EXISTS `symfony_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD CONSTRAINT `FK_C509E4FF3243BB18` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`),
  ADD CONSTRAINT `FK_C509E4FFF30B501D` FOREIGN KEY (`code_reservation_id`) REFERENCES `reservation` (`id`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_C74404554ACC9A20` FOREIGN KEY (`card_id`) REFERENCES `credit_card` (`id`),
  ADD CONSTRAINT `FK_C7440455F30B501D` FOREIGN KEY (`code_reservation_id`) REFERENCES `reservation` (`id`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `FK_67F068BC3243BB18` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`);

--
-- Contraintes pour la table `confirmations`
--
ALTER TABLE `confirmations`
  ADD CONSTRAINT `FK_34298E9EAB014612` FOREIGN KEY (`clients_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_34298E9ED9A7F869` FOREIGN KEY (`reservations_id`) REFERENCES `reservation` (`id`);

--
-- Contraintes pour la table `credit_card`
--
ALTER TABLE `credit_card`
  ADD CONSTRAINT `FK_11D627EE55735813` FOREIGN KEY (`card_person_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `hotelier`
--
ALTER TABLE `hotelier`
  ADD CONSTRAINT `FK_4AC4D8673243BB18` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_C454C68219EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_C454C6829B177F54` FOREIGN KEY (`chambre_id`) REFERENCES `chambre` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
