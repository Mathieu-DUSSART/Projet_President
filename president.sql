-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 08 Février 2017 à 15:07
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `president`
--

-- --------------------------------------------------------

--
-- Structure de la table `carte`
--

CREATE TABLE `carte` (
  `carte_id` varchar(25) NOT NULL,
  `carte_valeur` int(11) NOT NULL,
  `carte_img` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `carte`
--

INSERT INTO `carte` (`carte_id`, `carte_valeur`, `carte_img`) VALUES
('10_Carreau', 10, '/Projet_President/image/cartes/carreau_10.GIF'),
('10_Coeur', 10, '/Projet_President/image/cartes/coeur_10.GIF'),
('10_Pique', 10, '/Projet_President/image/cartes/pique_10.GIF'),
('10_Trefle', 10, '/Projet_President/image/cartes/treffle_10.GIF'),
('2_Carreau', 15, '/Projet_President/image/cartes/carreau_02.GIF'),
('2_Coeur', 15, '/Projet_President/image/cartes/coeur_02.GIF'),
('2_Pique', 15, '/Projet_President/image/cartes/pique_02.GIF'),
('2_Trefle', 15, '/Projet_President/image/cartes/treffle_02.GIF'),
('3_Carreau', 3, '/Projet_President/image/cartes/carreau_03.GIF'),
('3_Coeur', 3, '/Projet_President/image/cartes/coeur_03.GIF'),
('3_Pique', 3, '/Projet_President/image/cartes/pique_03.GIF'),
('3_Trefle', 3, '/Projet_President/image/cartes/treffle_03.GIF'),
('4_Carreau', 4, '/Projet_President/image/cartes/carreau_04.GIF'),
('4_Coeur', 4, '/Projet_President/image/cartes/coeur_04.GIF'),
('4_Pique', 4, '/Projet_President/image/cartes/pique_04.GIF'),
('4_Trefle', 4, '/Projet_President/image/cartes/treffle_04.GIF'),
('5_Carreau', 5, '/Projet_President/image/cartes/carreau_05.GIF'),
('5_Coeur', 5, '/Projet_President/image/cartes/coeur_05.GIF'),
('5_Pique', 5, '/Projet_President/image/cartes/pique_05.GIF'),
('5_Trefle', 5, '/Projet_President/image/cartes/treffle_05.GIF'),
('6_Carreau', 6, '/Projet_President/image/cartes/carreau_06.GIF'),
('6_Coeur', 6, '/Projet_President/image/cartes/coeur_06.GIF'),
('6_Pique', 6, '/Projet_President/image/cartes/pique_06.GIF'),
('6_Trefle', 6, '/Projet_President/image/cartes/treffle_06.GIF'),
('7_Carreau', 7, '/Projet_President/image/cartes/carreau_07.GIF'),
('7_Coeur', 7, '/Projet_President/image/cartes/coeur_07.GIF'),
('7_Pique', 7, '/Projet_President/image/cartes/pique_07.GIF'),
('7_Trefle', 7, '/Projet_President/image/cartes/treffle_07.GIF'),
('8_Carreau', 8, '/Projet_President/image/cartes/carreau_08.GIF'),
('8_Coeur', 8, '/Projet_President/image/cartes/coeur_08.GIF'),
('8_Pique', 8, '/Projet_President/image/cartes/pique_08.GIF'),
('8_Trefle', 8, '/Projet_President/image/cartes/treffle_08.GIF'),
('9_Carreau', 9, '/Projet_President/image/cartes/carreau_09.GIF'),
('9_Coeur', 9, '/Projet_President/image/cartes/coeur_09.GIF'),
('9_Pique', 9, '/Projet_President/image/cartes/pique_09.GIF'),
('9_Trefle', 9, '/Projet_President/image/cartes/treffle_09.GIF'),
('as_Carreau', 14, '/Projet_President/image/cartes/carreau_01.GIF'),
('as_Coeur', 14, '/Projet_President/image/cartes/coeur_01.GIF'),
('as_Pique', 14, '/Projet_President/image/cartes/pique_01.GIF'),
('as_Trefle', 14, '/Projet_President/image/cartes/treffle_01.GIF'),
('dame_Carreau', 12, '/Projet_President/image/cartes/carreau_12.GIF'),
('dame_Coeur', 12, '/Projet_President/image/cartes/coeur_12.GIF'),
('dame_Pique', 12, '/Projet_President/image/cartes/pique_12.GIF'),
('dame_Trefle', 12, '/Projet_President/image/cartes/treffle_12.GIF'),
('roi_Carreau', 13, '/Projet_President/image/cartes/carreau_13.GIF'),
('roi_Coeur', 13, '/Projet_President/image/cartes/coeur_13.GIF'),
('roi_Pique', 13, '/Projet_President/image/cartes/pique_13.GIF'),
('roi_Trefle', 13, '/Projet_President/image/cartes/treffle_13.GIF'),
('valet_Carreau', 11, '/Projet_President/image/cartes/carreau_11.GIF'),
('valet_Coeur', 11, '/Projet_President/image/cartes/coeur_11.GIF'),
('valet_Pique', 11, '/Projet_President/image/cartes/pique_11.GIF'),
('valet_Trefle', 11, '/Projet_President/image/cartes/treffle_11.GIF');

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
  `joueur_id` int(11) NOT NULL,
  `joueur_pseudo` varchar(50) NOT NULL,
  `joueur_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `joueurpartie`
--

CREATE TABLE `joueurpartie` (
  `joueur_id` int(11) NOT NULL,
  `partie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `main`
--

CREATE TABLE `main` (
  `carte_id` varchar(50) NOT NULL,
  `joueur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

CREATE TABLE `partie` (
  `partie_id` int(11) NOT NULL,
  `partie_nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `carte`
--
ALTER TABLE `carte`
  ADD PRIMARY KEY (`carte_id`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`joueur_id`);

--
-- Index pour la table `joueurpartie`
--
ALTER TABLE `joueurpartie`
  ADD PRIMARY KEY (`joueur_id`),
  ADD KEY `joueur_id` (`joueur_id`),
  ADD KEY `partie_id` (`partie_id`);

--
-- Index pour la table `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`carte_id`),
  ADD KEY `carte_id` (`carte_id`),
  ADD KEY `joueur_id` (`joueur_id`);

--
-- Index pour la table `partie`
--
ALTER TABLE `partie`
  ADD PRIMARY KEY (`partie_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `joueur_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `partie`
--
ALTER TABLE `partie`
  MODIFY `partie_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `joueurpartie`
--
ALTER TABLE `joueurpartie`
  ADD CONSTRAINT `joueurpartie_fk1` FOREIGN KEY (`joueur_id`) REFERENCES `joueur` (`joueur_id`),
  ADD CONSTRAINT `joueurpartie_fk2` FOREIGN KEY (`partie_id`) REFERENCES `partie` (`partie_id`);

--
-- Contraintes pour la table `main`
--
ALTER TABLE `main`
  ADD CONSTRAINT `main_fk1` FOREIGN KEY (`carte_id`) REFERENCES `carte` (`carte_id`),
  ADD CONSTRAINT `main_fk2` FOREIGN KEY (`joueur_id`) REFERENCES `joueur` (`joueur_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
