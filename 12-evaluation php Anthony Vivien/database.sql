-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 17 nov. 2021 à 13:44
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wf3_php_intermediaire_anthony`
--

-- --------------------------------------------------------

--
-- Structure de la table `advert`
--

CREATE TABLE `advert` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `postal_code` int(5) UNSIGNED ZEROFILL NOT NULL,
  `city` varchar(50) NOT NULL,
  `type` enum('location','vente') NOT NULL,
  `price` varchar(50) NOT NULL,
  `reservation_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `advert`
--

INSERT INTO `advert` (`id`, `title`, `description`, `postal_code`, `city`, `type`, `price`, `reservation_message`) VALUES
(1, 'LOCATION APPARTEMENT PARIS', 'Lorem ipsum dolor sit amet', 70009, 'Paris', 'location', '10 000€/mois', ''),
(3, 'VENTE MAISON POISSY', 'Lorem ipsum dolor sit amet\r\n', 55555, 'Poissy', 'vente', '200 000€', ''),
(4, 'LOCATION APPART ROUGE AUBERGENVILE', 'Lorem ipsum dolor sit amet\r\n', 45661, 'Aubergenville', 'location', '1000 €/mois', ''),
(5, 'LOCATION MAISON LES MUREAUX', 'Lorem ipsum dolor sit amet\r\n', 78130, 'Les Mureaux', 'location', '6500 €/mois', ''),
(6, 'VENTE APPARTEMENT POISSY', 'Lorem ipsum dolor sit amet', 78300, 'Poissy', 'vente', '450 000€', ''),
(7, 'LOCATION STUDIO PARIS', 'Lorem ipsum dolor sit amet,', 70010, 'Paris', 'location', '15 000€ /mois', 'reservé'),
(8, 'VENTE MAISON ROUEN', 'Lorem ipsum dolor sit amet,', 76000, 'Rouen', 'vente', '150 000€', 'Je réserve'),
(9, 'MAISON AUBERGENVILLE', 'Maison sur aubergenville . ', 78410, 'Aubergenville', 'vente', '500 000€', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `advert`
--
ALTER TABLE `advert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
