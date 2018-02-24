-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  sam. 24 fév. 2018 à 15:42
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `muzicon`
--

-- --------------------------------------------------------

--
-- Structure de la table `muzicon_messages`
--

CREATE TABLE `muzicon_messages` (
  `id_message` int(11) NOT NULL,
  `nom_message` varchar(50) NOT NULL,
  `email_message` varchar(50) NOT NULL,
  `contenu_message` text NOT NULL,
  `date_message` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `muzicon_messages`
--

INSERT INTO `muzicon_messages` (`id_message`, `nom_message`, `email_message`, `contenu_message`, `date_message`) VALUES
(1, 'Test', 'Test@email.com', 'Message de test', '2017-12-03 00:00:00'),
(2, 'Jacques', 'jacques.hovine@eemi.com', 'Test message 1', '2018-02-24 16:19:30'),
(3, 'Jacques', 'jacques.hovine@eemi.com', 'Test message 2', '2018-02-24 16:28:45');

-- --------------------------------------------------------

--
-- Structure de la table `m_admin_user`
--

CREATE TABLE `m_admin_user` (
  `id_user` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `m_admin_user`
--

INSERT INTO `m_admin_user` (`id_user`, `login`, `password`) VALUES
(1, 'Jacques', 'adminJ'),
(2, 'Pauline', 'adminP'),
(3, 'Alexandre', 'adminA'),
(4, 'Bastien', 'adminB'),
(5, 'Charles', 'adminC');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `muzicon_messages`
--
ALTER TABLE `muzicon_messages`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `m_admin_user`
--
ALTER TABLE `m_admin_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `muzicon_messages`
--
ALTER TABLE `muzicon_messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `m_admin_user`
--
ALTER TABLE `m_admin_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
