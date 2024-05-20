-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 17 mai 2024 à 10:50
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mvcCrosl`
--

-- --------------------------------------------------------

--
-- Structure de la table `association`
--

CREATE TABLE `association` (
  `numAssociation` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `nomInterlocuteur` varchar(50) DEFAULT NULL,
  `prenomInterlocuteur` varchar(50) DEFAULT NULL,
  `telephone` char(10) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `icom` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `association`
--

INSERT INTO `association` (`numAssociation`, `nom`, `nomInterlocuteur`, `prenomInterlocuteur`, `telephone`, `fax`, `icom`) VALUES
(1, 'solidaritesansfrontieres', 'martin', 'jean', '0123456789', '0123456789', 'ssf123'),
(2, 'environnementplus', 'dupont', 'sophie', '0234567890', '0234567890', 'ep456'),
(3, 'educationinclusiva', 'gagnon', 'luc', '0345678901', '0345678901', 'ei789'),
(4, 'sportaction', 'lavoie', 'isabelle', '0456789012', '0456789012', 'sa012'),
(5, 'chanceegale', 'leclerc', 'pierre', '0567890123', '0567890123', 'ce345'),
(6, 'culturevive', 'roy', 'marie', '0678901234', '0678901234', 'cv678'),
(7, 'santeequilibree', 'tremblay', 'francois', '0789012345', '0789012345', 'se901'),
(8, 'luttecontrefaim', 'levesque', 'catherine', '0890123456', '0890123456', 'lcf234');

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `idDemande` int(11) NOT NULL,
  `idSession` int(11) NOT NULL,
  `idUser` int(10) NOT NULL,
  `accorde` varchar(50) DEFAULT NULL,
  `dateDemande` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`idDemande`, `idSession`, `idUser`, `accorde`, `dateDemande`) VALUES
(29, 22, 7, 'en attente', '2024-05-17'),
(30, 19, 7, 'en attente', '2024-05-17'),
(31, 20, 7, 'en attente', '2024-05-17'),
(32, 22, 8, 'en attente', '2024-05-17'),
(33, 19, 8, 'en attente', '2024-05-17'),
(34, 20, 8, 'en attente', '2024-05-17'),
(35, 21, 9, 'en attente', '2024-05-17'),
(36, 20, 9, 'en attente', '2024-05-17');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `idFormation` int(11) NOT NULL,
  `idTheme` int(11) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  `salle` varchar(50) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `Objectifs` varchar(255) DEFAULT NULL,
  `prix` decimal(15,2) DEFAULT NULL,
  `public` varchar(255) DEFAULT NULL,
  `niveau` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`idFormation`, `idTheme`, `libelle`, `salle`, `adresse`, `cp`, `ville`, `Objectifs`, `prix`, `public`, `niveau`) VALUES
(10, 1, 'Theme gestion 1', '1', 'hgui', '56789', 'kjbjk', 'hjbhjb', '67.00', 'bkjbk', 8),
(11, 1, 'Theme gestion 2 ', 'jbi', 'jbujb', '8798', 'njibik', 'ghvhug', '45.00', 'n hjb', 8),
(24, 2, 'PHP', 'Salle B2 5', 'MERLY 6', '31400', 'Toulouse', 'Apprendre PHP', '1000.00', 'Lycéen', 3),
(25, 5, 'Anglais', '45', '5 rue de la fontaine', '34000', 'Montpellier', 'Apprendre l\'anglais ', '458.00', 'BTS', 2),
(26, 26, 'Apprendre le référencement ', '200', 'rue du seo', '34000', 'Montpellier', 'Apprendre le seo', '10000.00', 'dev Web', 6);

-- --------------------------------------------------------

--
-- Structure de la table `intervenant`
--

CREATE TABLE `intervenant` (
  `idIntervenant` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `intervenant`
--

INSERT INTO `intervenant` (`idIntervenant`, `nom`, `prenom`, `email`, `telephone`) VALUES
(1, 'Doe', 'John', 'john.doe@example.com', '654435'),
(6, 'test', 's', 'jndl@za.d', '8778687'),
(20, 'Trari ', 'Nassim', 'nassim-trari@hotmail.com', '0665159534'),
(21, 'Dupont', 'Albert', 'Albert@gmail.com', '0917654567');

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `idSession` int(11) NOT NULL,
  `idFormation` int(11) NOT NULL,
  `dateSession` date DEFAULT NULL,
  `dateLimite` date DEFAULT NULL,
  `idIntervenant` int(11) DEFAULT NULL,
  `nbPlace` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`idSession`, `idFormation`, `dateSession`, `dateLimite`, `idIntervenant`, `nbPlace`) VALUES
(11, 11, '2024-05-25', '2024-05-16', 1, 99),
(19, 24, '2024-06-30', '2024-06-20', 1, 97),
(20, 25, '2024-05-30', '2024-06-20', 21, 96),
(21, 26, '2024-06-25', '2024-06-20', 6, 1),
(22, 10, '2024-06-25', '2024-06-20', 20, 0);

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `numStatut` int(11) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`numStatut`, `libelle`) VALUES
(0, 'administrateur'),
(1, 'salarié'),
(2, 'bénévole'),
(3, 'président');

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`id`, `libelle`) VALUES
(1, 'gestions'),
(2, 'informatique'),
(5, 'communication'),
(26, 'SEO');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUser` int(10) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `fonction` varchar(50) DEFAULT NULL,
  `numAssociation` int(11) NOT NULL,
  `numStatut` int(11) NOT NULL,
  `motDePasse` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `nom`, `prenom`, `adresse`, `cp`, `ville`, `email`, `fonction`, `numAssociation`, `numStatut`, `motDePasse`) VALUES
(1, 'Admin', 'Sys', '123 Admin St', '75001', 'Paris', 'admin@gmail.com', 'System Administrator', 3, 0, '$2y$10$g/ntSN5amEqwrh1WmReUYOi.7EG.8ikeYO9So8VdC9sqZfBjUL5HW'),
(6, 'Trari ', 'Nassim ', 'jhbjkhbkj', '87689', 'hjvjhg', 'nassim-trari@hotmail.com', 'uoihz', 1, 0, '$2y$10$3IJmmj8JBLp/wmP7FGfHVeQmecpAo9KCdKYciyBMLdubjULKGtIia'),
(7, 'user1', 'user1', '35 rue hebert', '34000', 'Montpellier', 'user1@gmail.com', 'Employé ', 1, 1, '$2y$10$3djryf.VXv9PXVOQlGvVM.Gc7lzMOagPeSkfbZQCLJpGfFYmPPJQe'),
(8, 'user2', 'user2', 'adresse de user2', '87689', 'Toulouse', 'user2@gmail.com', 'Employé ', 1, 1, '$2y$10$QbuMebAN0QuufuzT0aHb8uSqasoURhDaRHCO.YZNhQePdhUOIWY.S'),
(9, 'user3', 'user3', 'Avenue de la seranne', '34000', 'Montpellier', 'user3@gmail.com', 'Employé ', 2, 1, '$2y$10$/slidSJ74mrd0H5uuNfbnuG.VSmnpRyQNrqWM0Daym2neMd0gjJsW');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `association`
--
ALTER TABLE `association`
  ADD PRIMARY KEY (`numAssociation`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`idDemande`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `demande_ibfk_1` (`idSession`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`idFormation`),
  ADD KEY `idTheme` (`idTheme`);

--
-- Index pour la table `intervenant`
--
ALTER TABLE `intervenant`
  ADD PRIMARY KEY (`idIntervenant`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`idSession`),
  ADD KEY `idFormation` (`idFormation`),
  ADD KEY `session_ibfk_2` (`idIntervenant`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`numStatut`);

--
-- Index pour la table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `numAssociation` (`numAssociation`),
  ADD KEY `numStatut` (`numStatut`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `idDemande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `idFormation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `intervenant`
--
ALTER TABLE `intervenant`
  MODIFY `idIntervenant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
  MODIFY `idSession` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `demande_ibfk_1` FOREIGN KEY (`idSession`) REFERENCES `session` (`idSession`) ON DELETE CASCADE,
  ADD CONSTRAINT `demande_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `utilisateur` (`idUser`) ON DELETE CASCADE;

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `formation_ibfk_1` FOREIGN KEY (`idTheme`) REFERENCES `theme` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`idFormation`) REFERENCES `formation` (`idFormation`) ON DELETE CASCADE,
  ADD CONSTRAINT `session_ibfk_2` FOREIGN KEY (`idIntervenant`) REFERENCES `intervenant` (`idIntervenant`) ON DELETE CASCADE;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`numAssociation`) REFERENCES `association` (`numAssociation`),
  ADD CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`numStatut`) REFERENCES `statut` (`numStatut`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
