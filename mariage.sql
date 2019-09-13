-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 13 Septembre 2019 à 11:41
-- Version du serveur :  10.3.17-MariaDB-0+deb10u1
-- Version de PHP :  7.3.9-1+0~20190902.44+debian9~1.gbpf8534c

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mariage`
--

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id` int(10) UNSIGNED NOT NULL,
  `login_id` int(10) UNSIGNED NOT NULL,
  `nbre_participant` tinyint(3) UNSIGNED NOT NULL,
  `vegan` tinyint(10) DEFAULT NULL,
  `nbre_repas_vegan` tinyint(3) UNSIGNED DEFAULT NULL,
  `allergie` varchar(100) DEFAULT NULL,
  `type_logement` int(10) UNSIGNED DEFAULT NULL,
  `type_invit` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `inscription`
--

INSERT INTO `inscription` (`id`, `login_id`, `nbre_participant`, `vegan`, `nbre_repas_vegan`, `allergie`, `type_logement`, `type_invit`) VALUES
(36, 2, 19, 1, 5, 'gluten', 1, 1),
(37, 3, 5, 0, NULL, '', 1, 1);

--
-- Déclencheurs `inscription`
--
DELIMITER $$
CREATE TRIGGER `del_inscription` AFTER DELETE ON `inscription` FOR EACH ROW BEGIN
DELETE FROM VM_inscription
    WHERE VM_inscription.id = old.id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `new_inscription` AFTER INSERT ON `inscription` FOR EACH ROW BEGIN
INSERT INTO VM_inscription
(id, nom, nombre, vegan, nbre_repas_vegas, allergie, logement, invitation)
SELECT inscription.id, invite.nom, NEW.nbre_participant, NEW.vegan, NEW.nbre_repas_vegan, NEW.allergie, logement.nom, invitation.typee
FROM inscription
JOIN invite ON invite.id = new.login_id
LEFT JOIN logement ON logement.id = new.type_logement
JOIN invitation ON invite.type_invit = invitation.id
WHERE inscription.id = NEW.id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `upd_inscription` AFTER UPDATE ON `inscription` FOR EACH ROW BEGIN
UPDATE VM_inscription 
JOIN inscription ON VM_inscription.id = inscription.id
JOIN invite ON invite.id = inscription.login_id
LEFT JOIN logement ON logement.id = inscription.type_logement
JOIN invitation ON invite.type_invit = invitation.id
SET VM_inscription.nom = invite.nom, VM_inscription.nombre = inscription.nbre_participant, VM_inscription.vegan = inscription.vegan, VM_inscription.nbre_repas_vegan = inscription.nbre_repas_vegan, VM_inscription.allergie = inscription.allergie, VM_inscription.logement = logement.nom, VM_inscription.invitation = invitation.typee
WHERE VM_inscription.id = new.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `invitation`
--

CREATE TABLE `invitation` (
  `id` int(10) UNSIGNED NOT NULL,
  `typee` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `invitation`
--

INSERT INTO `invitation` (`id`, `typee`) VALUES
(1, 'laique'),
(2, 'civil'),
(3, 'both');

-- --------------------------------------------------------

--
-- Structure de la table `invite`
--

CREATE TABLE `invite` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(50) NOT NULL,
  `loginn` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `type_invit` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `invite`
--

INSERT INTO `invite` (`id`, `nom`, `loginn`, `mdp`, `type_invit`) VALUES
(1, 'civil', 'civil', '$2y$10$PKeWKSik1X3xo0AzSkI9EuXWMOmiqe6HVIVNsZ27xOkkKrF3v/.Ra', 2),
(2, 'laique', 'laique', '$2y$10$f/TeIVS58M2EBnOQn7sjQ.v7x4Dfqz6sDcCT2KFvsLCHaKd6KbVTi', 1),
(3, 'both', 'both', '$2y$10$jwUFdpZPiYxbBLBoUoxUl.tGeSgiEQLcoY/SYxSAe8IOh6TeLBWb.', 3);

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `logement`
--

INSERT INTO `logement` (`id`, `nom`) VALUES
(1, 'gite'),
(2, 'hotel');

-- --------------------------------------------------------

--
-- Structure de la table `VM_inscription`
--

CREATE TABLE `VM_inscription` (
  `id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `nom` varchar(50) NOT NULL,
  `nombre` tinyint(3) UNSIGNED NOT NULL,
  `vegan` tinyint(10) DEFAULT NULL,
  `nbre_repas_vegan` tinyint(3) UNSIGNED DEFAULT NULL,
  `allergie` varchar(100) DEFAULT NULL,
  `logement` varchar(100),
  `invitation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `VM_inscription`
--

-- INSERT INTO `VM_inscription` (`id`, `nom`, `nombre`, `vegan`, `nbre_repas_vegan`, `allergie`, `logement`, `invitation`) VALUES
-- (36, 'laique', 19, 1, 5, 'gluten', 'gite', 'laique'),
-- (37, 'both', 5, 0, NULL, '', 'gite', 'both');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_id` (`login_id`),
  ADD KEY `fk_ins_logement` (`type_logement`),
  ADD KEY `fk_ins_inv` (`type_invit`);

--
-- Index pour la table `invitation`
--
ALTER TABLE `invitation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `invite`
--
ALTER TABLE `invite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_invit_type` (`type_invit`);

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT pour la table `invitation`
--
ALTER TABLE `invitation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `invite`
--
ALTER TABLE `invite`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `fk_ins_inv` FOREIGN KEY (`type_invit`) REFERENCES `invite` (`type_invit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ins_invite` FOREIGN KEY (`login_id`) REFERENCES `invite` (`id`),
  ADD CONSTRAINT `fk_ins_logement` FOREIGN KEY (`type_logement`) REFERENCES `logement` (`id`);

--
-- Contraintes pour la table `invite`
--
ALTER TABLE `invite`
  ADD CONSTRAINT `fk_invit_type` FOREIGN KEY (`type_invit`) REFERENCES `invitation` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
