-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Sam 12 Octobre 2019 à 12:28
-- Version du serveur :  10.3.17-MariaDB-0+deb10u1
-- Version de PHP :  7.3.10-1+0~20191008.45+debian9~1.gbp365209

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
  `type_invit` int(10) UNSIGNED NOT NULL,
  `repas_lendemain` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `inscription`
--

INSERT INTO `inscription` (`id`, `login_id`, `nbre_participant`, `vegan`, `nbre_repas_vegan`, `allergie`, `type_logement`, `type_invit`, `repas_lendemain`) VALUES
(36, 2, 19, 1, 5, 'gluten', 1, 1, 0),
(37, 3, 5, 0, 0, '', 1, 3, 1),
(49, 4, 2, 0, 0, '', 1, 3, 0);

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
(id, nom, nombre, vegan, nbre_repas_vegan, allergie, logement, invitation, repas_lendemain)
SELECT inscription.id, invite.nom, NEW.nbre_participant, NEW.vegan, NEW.nbre_repas_vegan, NEW.allergie, logement.nom, invitation.typee, NEW.repas_lendemain
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
SET VM_inscription.nom = invite.nom, VM_inscription.nombre = inscription.nbre_participant, VM_inscription.vegan = inscription.vegan, VM_inscription.nbre_repas_vegan = inscription.nbre_repas_vegan, VM_inscription.allergie = inscription.allergie, VM_inscription.logement = logement.nom, VM_inscription.invitation = invitation.typee, VM_inscription.repas_lendemain = inscription.repas_lendemain
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
  `type_invit` int(10) UNSIGNED NOT NULL,
  `token_val` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `invite`
--

INSERT INTO `invite` (`id`, `nom`, `loginn`, `mdp`, `type_invit`, `token_val`) VALUES
(1, 'civil', 'civil', '$2y$10$PKeWKSik1X3xo0AzSkI9EuXWMOmiqe6HVIVNsZ27xOkkKrF3v/.Ra', 2, ''),
(2, 'laique', 'laique', '$2y$10$f/TeIVS58M2EBnOQn7sjQ.v7x4Dfqz6sDcCT2KFvsLCHaKd6KbVTi', 1, ''),
(3, 'both', 'both', '$2y$10$jwUFdpZPiYxbBLBoUoxUl.tGeSgiEQLcoY/SYxSAe8IOh6TeLBWb.', 3, ''),
(4, 'jdlr', 'delarosa.jonathan@free.fr', '$2y$10$X7aKI/OdlWfrgNKa4Obsse6MyJZpyJbT9dweV5MoghQbJJ4.28rvm', 3, '3866646212a6647c63f784b1798e5fa9'),
(5, 'dede', 'delphine.lozowski@gmail.com', '$2y$10$ZP1eh6J5bBzzdNkOz.3xOe8kHA095jjXYvFcdFHU/QK5CcxjsOLmu', 3, ''),
(6, 'leo', 'leo-moufassa@hotmail.fr', '$2y$10$jg6g/yHqO6W/qFHltdgZdedQpydqP2sr2yN1OmDve2Qnrqie6tkme', 3, ''),
(7, 'jonana', 'johanna.thiery30@gmail.com', '$2y$10$sIqACV6QwBEhqgC3HlLYbO7EOxylAWaktjJ2KNsy.uS/st7D2DZie', 1, ''),
(8, 'willfired', 'tinywillhavehugeeffect@hotmail.fr', '$2y$10$zopcxDjZjpKKr.31cRvMueK9T8BiN0BnNhNXxFcWGt7mXU0bdrU9S', 1, ''),
(9, 'alys', 'semserna@hotmail.fr', '$2y$10$9Zz7oItXd.z2d3pABtY7T.doB7/bECzI2Bnsxf55Ej2MTQPjZh41G', 1, ''),
(10, 'lilian', 'lilga.81@gmail.com', '$2y$10$WlAlFoKeeX/Drf6maJ7/lOF3rj3Rcd40.AHQsnpKBWW/4poLJPC9q', 1, ''),
(11, 'chantal', 'chantal.dejean@gmail.com', '$2y$10$NmZCP7LK3yedwq31W.W4X.yKTW4BFvy8zSsKcbb4jfW.aY06kah1a', 1, ''),
(12, 'claugauja', 'claudine.gaujarengues@orange.fr', '$2y$10$yKV/1z0my6cWbRYw37XyrOX7FwK5N2NeknBSVeTk0kSMGMWALdxOe', 1, ''),
(13, 'genevieve', 'faure.meyzonnet@wanadoo.fr', '$2y$10$Kg1I8kICQwe4qVv/u5Ncm.xsEZsXmuptoICHLKeSyBRE/0BHhq7a.', 3, ''),
(14, 'gisele', 'gisele.meyzonnet@orange.fr', '$2y$10$iVfCnOnlM24862izhxC/LePAWxKTnV8y3rfr3w1Dc2rHdsHztpDi.', 1, ''),
(15, 'francoise', 'francoise.piagneri@wanadoo.fr', '$2y$10$e8hI4WxiU2pEdrrYBojGwukTK59c0gQ9RVcLJiT7m4HCF99p2Iw3S', 1, ''),
(16, 'flora', 'flora.piagneri@hotmail.fr', '$2y$10$QDtq/D/CgJ/v93wPEslUGul7qZbf01XZXXO8ZAaw8floAF5xxKtza', 1, ''),
(17, 'michel', 'a.meyzonnet@orange.fr', '$2y$10$PmZlBiCjKbZGJHQD6ZDEeusYIHceTgh06zz7KIq0375k1GbeUk0/6', 1, ''),
(18, 'julian', 'julian.piagneri@free.fr', '$2y$10$m76IanSJ1BOyXXEekSMZturAFWffyMeOYMzH1eLJpmbGDrVX4/Ir2', 1, ''),
(19, 'robin', 'rmeyzonnet@yahoo.fr', '$2y$10$w9XRVyWTXFvlMUAhI0eyCeNudbkgsWv3RRyV.Hn99WHMJxakCBCLy', 1, ''),
(20, 'dorian', 'dorian.meyzonnet@wanadoo.fr', '$2y$10$g2qbdQWPB01I5qiGqa0VJ.YwPMqBAx4VyBuHvEc0yAnwijZao4VVu', 1, ''),
(21, 'olivier', 'olivier.faure26@gmail.com', '$2y$10$noErE0YSMOcm0Xgg1dizG.GjFXDZKSUDpltfm3q5KIg6fTS46ODSq', 1, ''),
(22, 'dominique', 'domibiz@outlook.fr', '$2y$10$XR97HbYPGUf7DAtYsy0Ba.pyjKdaw/InJ.Tuz.sOPq6dnLVqcmMlK', 1, ''),
(23, 'perrine', 'perbiz@hotmail.fr', '$2y$10$aiqe6IZamcJVVnQLWgqoo.hklZrGSeGcsSkxMGYUBFtv5yiX.caqq', 1, ''),
(24, 'charline', 'charline.jaubert@yahoo.fr', '$2y$10$zAxkplfxzfDi1XgtPe5ZEuied/KVUPBXHZkw9e7oK1JbfuilhTgAC', 1, ''),
(25, 'melanie', 'sorasama8@gmail.com', '$2y$10$KHEa6RANH8TIik8TinUBaOmpmJkzxANqIPPBXaV3/V8X0UTGDIN/u', 1, ''),
(26, 'emeline', 'emelineh98@hotmail.fr', '$2y$10$tC6FpoXTnRiNkLRQ0w97te1O2umnROP.ysQv3sJM.CbEuwpK6t/4e', 1, ''),
(27, 'elococon', 'elodiegonzalez13@hotmail.fr', '$2y$10$28J7pZpCfThiIe1JVMqqHeE0ra2X/ZC36fAswN1FY/M4CUCKhzI9y', 1, '');

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
  `invitation` varchar(100) NOT NULL,
  `repas_lendemain` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `VM_inscription`
--

INSERT INTO `VM_inscription` (`id`, `nom`, `nombre`, `vegan`, `nbre_repas_vegan`, `allergie`, `logement`, `invitation`, `repas_lendemain`) VALUES
(36, 'laique', 19, 1, 5, 'gluten', 'gite', 'laique', 0),
(37, 'both', 5, 0, 0, '', 'gite', 'both', 1),
(49, 'jdlr', 2, 0, 0, '', 'gite', 'both', 0);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT pour la table `invitation`
--
ALTER TABLE `invitation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `invite`
--
ALTER TABLE `invite`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
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
