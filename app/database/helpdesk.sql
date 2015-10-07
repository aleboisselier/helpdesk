-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 01 Octobre 2015 à 11:01
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `helpdesk`
--
CREATE DATABASE helpdesk;
USE helpdesk;
-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
`id` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `idCategorie` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`, `idCategorie`) VALUES
(1, 'Réseau', NULL),
(2, 'Routage', 1),
(3, 'Serveurs', 1),
(4, 'Poste de travail', NULL),
(8, 'Système', NULL),
(9, 'Logiciels', NULL),
(10, 'Assistance', NULL),
(11, 'Helpdesk', 10),
(12, 'Identité et droits d''accès', 10);

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
`id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `dateCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idCategorie` int(11) DEFAULT NULL,
  `idUser` int(11) NOT NULL,
  `version` varchar(20) NOT NULL DEFAULT '1.0',
  `popularity` int(11) NOT NULL,
  `published` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `faq`
--

INSERT INTO `faq` (`id`, `titre`, `contenu`, `dateCreation`, `idCategorie`, `idUser`, `version`, `popularity`, `published`) VALUES
(2, 'À quoi sert le HelpDesk ?', 'Le HelpDesk correspond au projet 2 « Évolution de l''outil d''assistance » du programme 6 « Accompagner la consolidation et la transformation de la fonction SI au sein de notre établissement ».\r\n\r\nL''un des objectifs stratégiques à l''origine du projet est d''homogénéiser la prestation d''assistance sur tous les sites et pour tous les usagers afin d''offrir un niveau de service équitablement accessible.\r\n\r\nEn termes opérationnels, l''outil développé permet de disposer d’un guichet d’assistance unique, de mettre en œuvre des outils et des procédures communes et d''identifier les problèmes redondants.\r\n\r\nDu point de vue de l''usager, il apporte l''assurance d''un enregistrement formel des demandes et des fonctionnalités d''information et de suivi systématiques.', '2015-09-29 14:04:24', 11, 1, '1.0', 5, 0),
(3, 'Procédure de changement de mot de passe', '<h2>Objet</h2>\r\n\r\nCette procédure a pour but de fournir des conseils et des recommandations pour la création d''un mot de passe fort.\r\n\r\n<h2>Domaine d''application</h2>\r\n\r\nCette procédure s''adresse à tous les utilisateurs disposant d''un compte d''accès au système d''information\r\n\r\n<h2>Descriptif</h2>\r\n\r\n<h3>Pré-requis :</h3>\r\n\r\nUn bon mot de passe est un mot de passe suffisamment long, facile à retenir et très difficile à deviner. Votre mot de passse doit être constitué d''au moins 8 caractères dont une majuscule et un chiffre. Il peut contenir des lettres non accentuées, des chiffres, et certains caractères spéciaux : _ ! @ # $ % - + = < > ( ) { } [ ] | : ; , . ? ~ &\r\n\r\n<h3>Quelques procédés ou comment faire ?</h3>\r\n<ul>\r\n<li>Accoler mots et chiffres : Faire3Pas</li>\r\n<li>Créer un rébus : 71fame3MAIC&O (c''est un fameux 3 mâts Hisse et Ho)</li>\r\n<li>Pensez à une chanson ou un poème et extrayez les premières lettres : ottoc4ocR! (one, two, three, o''clock, four o''clock, rock !)</li>\r\n<li>Choisissez un mot de passe en y insérant des caractères spéciaux g1M2p#DUtI1 (j''ai un mot de passe différent du tien)</li>\r\n<li>Ne pas utiliser de mot de passe ayant un rapport avec soi (noms, dates de naissance,..)</li>\r\n<li>Vous avez tout intérêt à mélanger les possibilités offertes : lettres, chiffres et caractères spéciaux.</li>\r\n</ul>\r\n<h3>Respectez les règles</h3>\r\n\r\nVous êtes responsable de l''usage qui est fait de votre compte d''accès au système d''information. Pour garantir la sécurité de votre mot de passe, nous vous invitons à suivre les conseils ci-dessous:\r\n<ul>\r\n<li>Ne le communiquez à personne (il garantit votre identité et vous identifie personnellement dans notre système d''information</li>\r\n<li>Ne le notez pas sur un post-it</li>\r\n<li>Verrouillez ou fermez systématiquement votre session en quittant votre poste de travail</li>\r\n<li>Changez-le régulièrement</li>\r\n<li>N''utilisez pas le mot de passe de votre compte d''accès au système d''information pour un autre compte</li>\r\n</ul>', '2015-09-29 14:04:27', 12, 1, '1.0', 22, 0),
(4, 'rdgsgs', '', '2015-09-22 12:05:25', 1, 1, '1.0', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
`id` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idUser` int(11) NOT NULL,
  `idTicket` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `contenu`, `date`, `idUser`, `idTicket`) VALUES
(1, '<p>Re&ccedil;u<br />\r\neffseff Pouvez-vous pr&eacute;ciser le message affich&eacute; ?<br />\r\nMerci</p>\r\n', '2015-09-15 11:39:33', 1, 1),
(2, 'Le message est <strong>`vidage de la mémoire physique...`</strong>', '2015-05-10 23:20:30', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `idUser` int(11) NOT NULL,
  `idTicket` int(11) NOT NULL,
  `idMessage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `notification`
--

INSERT INTO `notification` (`idUser`, `idTicket`, `idMessage`) VALUES
(1, 1, 1),
(1, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE IF NOT EXISTS `statut` (
`id` int(11) NOT NULL,
  `libelle` varchar(30) NOT NULL,
  `ordre` int(11) NOT NULL,
  `icon` varchar(20) NOT NULL,
  `statutsSuivant` varchar(50) NOT NULL,
  `action` varchar(255) NOT NULL,
  `cssClass` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `statut`
--

INSERT INTO `statut` (`id`, `libelle`, `ordre`, `icon`, `statutsSuivant`, `action`, `cssClass`) VALUES
(1, 'Nouveau', 0, 'flag', '2', '', ''),
(2, 'Attribué', 1, 'user', '3,4,5', 'S''Attribuer', 'primary'),
(3, 'En attente', 2, 'hourglass', '4,5', 'Mettre en attente', 'warning'),
(4, 'Résolu', 3, 'check', '5', 'Résoudre', 'success'),
(5, 'Clos', 5, 'off', '0', 'Clore', 'danger');

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
`id` int(11) NOT NULL,
  `type` set('demande','incident') NOT NULL DEFAULT 'demande',
  `idCategorie` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `idStatut` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `dateCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idAdmin` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ticket`
--

INSERT INTO `ticket` (`id`, `type`, `idCategorie`, `titre`, `description`, `idStatut`, `idUser`, `dateCreation`, `idAdmin`) VALUES
(1, 'incident', 8, 'Ecran bleu', 'Ecran bleu sur ouverture session windows', 4, 2, '2015-05-10 16:27:29', 1),
(2, 'incident', 12, 'impossible de se connecter', 'Impossible de se connecter à mon compte :\r\nLe message affiché est "Les informations de compte n''ont pas permis votre authentification".\r\n\r\nJe n''ai pas trouvé la procédure de récupération de mot de passe.', 2, 3, '2015-05-14 10:40:40', 1),
(3, 'incident', 3, 'Test de Ticket', 'Ceci est un test de ticket', 1, 2, '2015-09-22 21:31:27', 0),
(4, 'demande', 10, 'Test de Ticket 2', 'Ceci est un test de ticket', 1, 2, '2015-09-22 21:31:27', 0),
(5, 'incident', 4, 'Ticket Test 3', 'Ticket Test 3', 3, 2, '2015-09-26 19:19:34', 1),
(6, 'demande', 10, 'Ticket Test 4', 'Ticket Test 4', 4, 3, '2015-09-26 19:19:34', 1),
(7, 'demande', 4, 'Ticket Test 5', 'Ticket Test 5', 5, 3, '2015-09-26 19:19:54', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `mail`, `admin`) VALUES
(1, 'admin', 'admin', 'admin@local.fr', 1),
(2, 'user', 'user', 'user@local.fr', 0),
(3, 'autreUser', 'autreuser', 'autreuser@local.fr', 0),
(4, 'moi', '123456789', 'moi@local.fr', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
 ADD PRIMARY KEY (`id`), ADD KEY `idCategorie` (`idCategorie`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
 ADD PRIMARY KEY (`id`), ADD KEY `idCategorie` (`idCategorie`,`idUser`), ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`id`), ADD KEY `idUser` (`idUser`), ADD KEY `idTicket` (`idTicket`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
 ADD PRIMARY KEY (`id`), ADD KEY `idCategorie` (`idCategorie`), ADD KEY `idStatut` (`idStatut`,`idUser`), ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `categorie`
--
ALTER TABLE `categorie`
ADD CONSTRAINT `categorie_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `faq`
--
ALTER TABLE `faq`
ADD CONSTRAINT `faq_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
ADD CONSTRAINT `faq_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`idTicket`) REFERENCES `ticket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ticket`
--
ALTER TABLE `ticket`
ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`idStatut`) REFERENCES `statut` (`id`),
ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
