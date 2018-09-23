-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:7779
-- Généré le :  mar. 03 avr. 2018 à 18:39
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `jole-sport`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `synopsis` longtext COLLATE utf8_unicode_ci NOT NULL,
  `rules` longtext COLLATE utf8_unicode_ci,
  `release_date` datetime DEFAULT NULL,
  `player_number` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`id`, `name`, `image`, `updated_at`, `synopsis`, `rules`, `release_date`, `player_number`, `slug`) VALUES
(1, 'CS:GO', 'flat,800x800,075,f.jpg', '2018-03-29 11:57:19', 'Synopsis n1', 'Rules n1', '2018-03-27 16:13:00', 5, 'cs-go'),
(2, 'League of legend', 'League_of_Legends_logo.png', '2018-03-30 14:27:50', 'Synopsis n2', 'Rules n2', '2018-03-27 16:13:00', 5, 'league-of-legend'),
(3, 'Rainbow Six Siège', '59bec4742408c_rainbow_six_siege_logo_by_jmk_prime-dbaqfq7.png', '2018-03-30 14:27:50', 'Synopsis n3', 'Rules n3', '2018-03-27 16:13:00', 5, 'rainbow-six-siege'),
(4, 'Overwatch', 'Overwatch_circle_logo.svg.png', '2018-03-31 23:47:18', 'Synopsis n4', 'Rules n4', '2018-03-27 16:13:00', 5, 'overwatch');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `image`, `updated_at`, `body`, `created`, `updated`, `slug`) VALUES
(1, 'Titre n1', NULL, NULL, 'Body n1', '2018-03-27 16:13:31', '2018-03-27 16:13:31', 'article-n1'),
(2, 'Titre n2', NULL, NULL, 'Body n2', '2018-03-27 16:13:31', '2018-03-27 16:13:31', 'article-n2'),
(3, 'Titre n3', NULL, NULL, 'Body n3', '2018-03-27 16:13:31', '2018-03-27 16:13:31', 'article-n3'),
(4, 'Titre n4', NULL, NULL, 'Body n4', '2018-03-27 16:13:31', '2018-03-27 16:13:31', 'article-n4'),
(5, 'Titre n5', NULL, NULL, 'Body n5', '2018-03-27 16:13:31', '2018-03-27 16:13:31', 'article-n5'),
(6, 'Titre n6', NULL, NULL, 'Body n6', '2018-03-27 16:13:31', '2018-03-27 16:13:31', 'article-n6'),
(7, 'Titre n7', NULL, NULL, 'Body n7', '2018-03-27 16:13:31', '2018-03-27 16:13:31', 'article-n7'),
(8, 'Titre n8', NULL, NULL, 'Body n8', '2018-03-27 16:13:31', '2018-03-27 16:13:31', 'article-n8');

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `game` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `division` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `team`
--

INSERT INTO `team` (`id`, `game`, `name`, `image`, `updated_at`, `division`, `country`, `slug`) VALUES
(1, 1, 'Vitality', 'a8866-Team_Vitality_logo.png', '2018-03-30 16:29:47', 'Division n1', 'France', 'team-n1'),
(2, 2, 'SKT T1', 'flat,800x800,075,t.u5.jpg', '2018-03-29 09:53:25', 'Division n2', 'Corée', 'team-n2'),
(3, 3, 'Penta', 'twitch-penta-tv.png', '2018-03-29 09:26:32', 'Division n3', 'Europe', 'team-n3'),
(4, 4, 'Millenium', 'millenium-vertical-light.png', '2018-03-29 09:26:19', 'Division n4', 'France', 'team-n4');

-- --------------------------------------------------------

--
-- Structure de la table `users_games`
--

CREATE TABLE `users_games` (
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users_games`
--

INSERT INTO `users_games` (`user_id`, `game_id`) VALUES
(1, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `users_teams`
--

CREATE TABLE `users_teams` (
  `user_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users_teams`
--

INSERT INTO `users_teams` (`user_id`, `team_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `_match`
--

CREATE TABLE `_match` (
  `id` int(11) NOT NULL,
  `team_a_id` int(11) DEFAULT NULL,
  `team_b_id` int(11) DEFAULT NULL,
  `game` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `score` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `_match`
--

INSERT INTO `_match` (`id`, `team_a_id`, `team_b_id`, `game`, `date`, `score`, `created`, `updated`) VALUES
(1, 1, 2, 1, '2018-03-27 16:13:31', '1 - 1', '2018-03-27 16:13:31', '2018-03-27 16:13:31'),
(2, 2, 3, 2, '2018-03-27 16:13:31', '2 - 2', '2018-03-27 16:13:31', '2018-03-27 16:13:31'),
(3, 3, 4, 3, '2018-03-27 16:13:31', '3 - 3', '2018-03-27 16:13:31', '2018-03-27 16:13:31'),
(4, 4, 1, 4, '2018-03-27 16:13:31', '4 - 4', '2018-03-27 16:13:31', '2018-03-27 16:13:31');

-- --------------------------------------------------------

--
-- Structure de la table `_user`
--

CREATE TABLE `_user` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `reset_password_token` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `_user`
--

INSERT INTO `_user` (`id`, `image`, `updated_at`, `username`, `email`, `password`, `is_admin`, `is_active`, `reset_password_token`) VALUES
(1, NULL, NULL, 'Dino', 'dino@gmail.com', '$2y$13$mLWnlCb6Sy7dNvhQNhlYWu9p8Q0RDDg7iJ7V6nfYxaDaSPCuekGzS', 0, NULL, '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C4E0A61F232B318C` (`game`);

--
-- Index pour la table `users_games`
--
ALTER TABLE `users_games`
  ADD PRIMARY KEY (`user_id`,`game_id`),
  ADD KEY `IDX_18548F78A76ED395` (`user_id`),
  ADD KEY `IDX_18548F78E48FD905` (`game_id`);

--
-- Index pour la table `users_teams`
--
ALTER TABLE `users_teams`
  ADD PRIMARY KEY (`user_id`,`team_id`),
  ADD KEY `IDX_71B58611A76ED395` (`user_id`),
  ADD KEY `IDX_71B58611296CD8AE` (`team_id`);

--
-- Index pour la table `_match`
--
ALTER TABLE `_match`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F0632999232B318C` (`game`),
  ADD KEY `IDX_F0632999EA3FA723` (`team_a_id`),
  ADD KEY `IDX_F0632999F88A08CD` (`team_b_id`);

--
-- Index pour la table `_user`
--
ALTER TABLE `_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_D0B6A652F85E0677` (`username`),
  ADD UNIQUE KEY `UNIQ_D0B6A652E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_D0B6A65235C246D5` (`password`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `_match`
--
ALTER TABLE `_match`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `_user`
--
ALTER TABLE `_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `FK_C4E0A61F232B318C` FOREIGN KEY (`game`) REFERENCES `game` (`id`);

--
-- Contraintes pour la table `users_games`
--
ALTER TABLE `users_games`
  ADD CONSTRAINT `FK_18548F78A76ED395` FOREIGN KEY (`user_id`) REFERENCES `_user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_18548F78E48FD905` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users_teams`
--
ALTER TABLE `users_teams`
  ADD CONSTRAINT `FK_71B58611296CD8AE` FOREIGN KEY (`team_id`) REFERENCES `team` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_71B58611A76ED395` FOREIGN KEY (`user_id`) REFERENCES `_user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `_match`
--
ALTER TABLE `_match`
  ADD CONSTRAINT `FK_F0632999232B318C` FOREIGN KEY (`game`) REFERENCES `game` (`id`),
  ADD CONSTRAINT `FK_F0632999EA3FA723` FOREIGN KEY (`team_a_id`) REFERENCES `team` (`id`),
  ADD CONSTRAINT `FK_F0632999F88A08CD` FOREIGN KEY (`team_b_id`) REFERENCES `team` (`id`);
