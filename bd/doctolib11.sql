-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 17 Mars 2020 à 09:04
-- Version du serveur :  5.7.29-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `doctolib`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id_message` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `specialite` varchar(64) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id_message`, `id_patient`, `description`, `specialite`, `date`) VALUES
(1, 2, 'Je suis malade', 'generale', '2020-03-08'),
(2, 2, 'J\'ai mal aux yeux svp aidez moi', 'ophtalmologie', '2020-03-08'),
(3, 2, 'J\'ai mal au nez je crois qu\'on me l\'a cassÃ©', 'orl', '2020-03-08'),
(4, 2, 'Je suis encore malade', 'generale', '2020-03-08'),
(5, 2, 'Mon fils est malade. il a 39Â° de fievre !!!! au secours', 'pediaterie', '2020-03-08'),
(6, 2, 'j\'ai l\'impression que mes yeux brules', 'ophtalmologie', '2020-03-10'),
(7, 2, 'gffghgh', 'generale', '2020-03-10'),
(8, 3, 'Je suis malade', 'generale', '2020-03-16'),
(9, 3, 'J\'ai mal aux yeux svp aidez moi je ne vois rien', 'ophtalmologie', '2020-03-16'),
(10, 3, 'Je suis encore malade', 'generale', '2020-03-16'),
(11, 3, 'J\'ai plus mal', 'generale', '2020-03-17');

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `numss` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `patients`
--

INSERT INTO `patients` (`id`, `numss`, `email`, `password`) VALUES
(1, '1234', 'patient1@gmail.com', 'b39024efbc6de61976f585c8421c6bba'),
(2, '1910899352773', 'darris.bouzidi@gmail.com', '848e45362ae48a50ecc91be658c539ea'),
(3, '1234567', 'tiziri.ouldhadda@gmail.com', '848e45362ae48a50ecc91be658c539ea');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `numss` (`numss`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
