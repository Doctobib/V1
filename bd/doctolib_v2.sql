-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 12 avr. 2020 à 19:29
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Structure de la table `formulaire`
--

CREATE TABLE `formulaire` (
  `id_question` int(255) NOT NULL,
  `id_patient` int(255) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `questions` varchar(255) NOT NULL,
  `reponses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formulaire`
--

INSERT INTO `formulaire` (`id_question`, `id_patient`, `categories`, `questions`, `reponses`) VALUES
(1, 0, 'jeunesse', 'Etiez-vous accoucher en césarienne ?', ''),
(2, 0, 'jeunesse', 'Aviez-vous une maladie pendant votre naissance ? si oui laquelle ?', ''),
(3, 0, 'jeunesse', 'Veuillez entrer votre poids et taille :', ''),
(4, 0, 'jeunesse', 'Veuillez entrer votre périmètre cranier :', ''),
(5, 0, 'jeunesse', 'Aviez-vous des troubles de langage écrit ou orale ?', ''),
(6, 0, 'jeunesse', 'Aviez-vous des probléme de dyspraxie ?', ''),
(7, 0, 'jeunesse', 'Aviez-vous des troubles de la vue (strabisme, vue de loin difficile…) ?', ''),
(8, 0, 'jeunesse', 'Aviez-vous des troubles du sommeil ?', ''),
(9, 0, 'adulte', 'Aviez-vous un manque de sommeil ou insomnies avec somnolence diurne ?', ''),
(10, 0, 'adulte', 'Aviez-vous des troubles dépressifs ?', ''),
(11, 0, 'adulte', 'Si vous êtes une fille aviez-vous règles douloureuses, pouvant traduire une endométriose débutante ?', ''),
(12, 0, 'adulte', 'Aviez-vous une transpiration excessive?', ''),
(13, 0, 'adulte', 'Quel est le taux de cholestérol et la glycémie dans votre corps ?', ''),
(14, 0, 'adulte', 'Quel est le taux de votre hypertension ?', ''),
(15, 0, 'adulte', 'Aviez-vous fait un déspitage de glaucome ? si oui, c\'était quoi le résultat?', ''),
(16, 0, 'adulte', 'Aviez-vous fait un déspitage des hépatites B, C et du V.I.H ? si oui, c\'était quoi le résultat?', '');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id_message` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `specialite` varchar(64) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `reponse` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `numss` varchar(256) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `prenom` varchar(64) NOT NULL,
  `date_de_naissance` varchar(16) NOT NULL,
  `address` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `patients`
--

INSERT INTO `patients` (`id`, `sexe`, `numss`, `nom`, `prenom`, `date_de_naissance`, `address`, `email`, `password`) VALUES
(17, 'F', '2985223552', 'REGRAGUI', 'Yousra', '1998-02-24', '15 rue genin', 'youssireg123@gmail.com', '9283a1b18768c24eb04680792921594e');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `formulaire`
--
ALTER TABLE `formulaire`
  ADD PRIMARY KEY (`id_question`);

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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `formulaire`
--
ALTER TABLE `formulaire`
  MODIFY `id_question` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
