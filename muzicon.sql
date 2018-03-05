-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  lun. 05 mars 2018 à 17:14
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.7

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
(3, 'Jacques', 'jacques.hovine@eemi.com', 'Test message 2', '2018-02-24 16:28:45'),
(4, 'Alexandre louf', 'alexandre.louf@eemi.com', 'Bonjour la mifa', '2018-02-24 16:47:09');

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

-- --------------------------------------------------------

--
-- Structure de la table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `artiste1` int(11) NOT NULL,
  `artiste2` int(11) DEFAULT NULL,
  `artiste3` int(11) DEFAULT NULL,
  `artiste4` int(11) DEFAULT NULL,
  `lien` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `songs`
--

INSERT INTO `songs` (`id`, `titre`, `artiste1`, `artiste2`, `artiste3`, `artiste4`, `lien`, `date`) VALUES
(1, 'pesky plomber', 1, NULL, NULL, NULL, 'song/song1.mp3', '2018-03-05 17:14:26');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `artiste` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `pseudo`, `mdp`, `artiste`) VALUES
(1, 'hotel', 'mario', 'mariohotel@nintendo.com', 'MarioHotel', 'marioleplombierdu53', 0);

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
-- Index pour la table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `muzicon_messages`
--
ALTER TABLE `muzicon_messages`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `m_admin_user`
--
ALTER TABLE `m_admin_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
