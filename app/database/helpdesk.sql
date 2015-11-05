-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 05 Novembre 2015 à 09:10
-- Version du serveur :  5.6.26
-- Version de PHP :  5.6.12


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `helpdesk`
--

DROP DATABASE IF EXISTS helpdesk;
CREATE DATABASE helpdesk;
USE helpdesk;
-- --------------------------------------------------------

--
-- Structure de la table `authprovider`
--

CREATE TABLE IF NOT EXISTS `authprovider` (
`id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `icon` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `authprovider`
--

INSERT INTO `authprovider` (`id`, `name`, `icon`) VALUES
(1, 'GitHub', 'pe-so-github');

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
-- Structure de la table `customfield`
--

CREATE TABLE IF NOT EXISTS `customfield` (
  `idCustomField` int(3) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `propriete` varchar(256) DEFAULT NULL,
  `idGenericField` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(2, 'À quoi sert le HelpDesk ?', '<p>Le HelpDesk correspond au projet 2 <em><strong>&laquo; &Eacute;volution de l&#39;outil d&#39;assistance &raquo;</strong></em> du programme 6 <em><strong>&laquo; Accompagner la consolidation et la transformation de la fonction SI au sein de notre &eacute;tablissement &raquo;</strong></em>.</p>\r\n\r\n<p>L&#39;un des objectifs strat&eacute;giques &agrave; l&#39;origine du projet est d&#39;homog&eacute;n&eacute;iser la prestation d&#39;assistance sur tous les sites et pour tous les usagers afin d&#39;offrir un niveau de service &eacute;quitablement accessible. En termes op&eacute;rationnels, l&#39;outil d&eacute;velopp&eacute; permet de disposer d&rsquo;un guichet d&rsquo;assistance unique, de mettre en &oelig;uvre des outils et des proc&eacute;dures communes et d&#39;identifier les probl&egrave;mes redondants.</p>\r\n\r\n<p>Du point de vue de l&#39;usager, il apporte l&#39;assurance d&#39;un enregistrement formel des demandes et des fonctionnalit&eacute;s d&#39;information et de suivi syst&eacute;matiques.</p>\r\n', '2015-10-19 09:56:39', 11, 1, '1.0', 5, 0),
(3, 'Procédure de changement de mot de passe', '<h2>Objet</h2>\r\n\r\nCette procédure a pour but de fournir des conseils et des recommandations pour la création d''un mot de passe fort.\r\n\r\n<h2>Domaine d''application</h2>\r\n\r\nCette procédure s''adresse à tous les utilisateurs disposant d''un compte d''accès au système d''information\r\n\r\n<h2>Descriptif</h2>\r\n\r\n<h3>Pré-requis :</h3>\r\n\r\nUn bon mot de passe est un mot de passe suffisamment long, facile à retenir et très difficile à deviner. Votre mot de passse doit être constitué d''au moins 8 caractères dont une majuscule et un chiffre. Il peut contenir des lettres non accentuées, des chiffres, et certains caractères spéciaux : _ ! @ # $ % - + = < > ( ) { } [ ] | : ; , . ? ~ &\r\n\r\n<h3>Quelques procédés ou comment faire ?</h3>\r\n<ul>\r\n<li>Accoler mots et chiffres : Faire3Pas</li>\r\n<li>Créer un rébus : 71fame3MAIC&O (c''est un fameux 3 mâts Hisse et Ho)</li>\r\n<li>Pensez à une chanson ou un poème et extrayez les premières lettres : ottoc4ocR! (one, two, three, o''clock, four o''clock, rock !)</li>\r\n<li>Choisissez un mot de passe en y insérant des caractères spéciaux g1M2p#DUtI1 (j''ai un mot de passe différent du tien)</li>\r\n<li>Ne pas utiliser de mot de passe ayant un rapport avec soi (noms, dates de naissance,..)</li>\r\n<li>Vous avez tout intérêt à mélanger les possibilités offertes : lettres, chiffres et caractères spéciaux.</li>\r\n</ul>\r\n<h3>Respectez les règles</h3>\r\n\r\nVous êtes responsable de l''usage qui est fait de votre compte d''accès au système d''information. Pour garantir la sécurité de votre mot de passe, nous vous invitons à suivre les conseils ci-dessous:\r\n<ul>\r\n<li>Ne le communiquez à personne (il garantit votre identité et vous identifie personnellement dans notre système d''information</li>\r\n<li>Ne le notez pas sur un post-it</li>\r\n<li>Verrouillez ou fermez systématiquement votre session en quittant votre poste de travail</li>\r\n<li>Changez-le régulièrement</li>\r\n<li>N''utilisez pas le mot de passe de votre compte d''accès au système d''information pour un autre compte</li>\r\n</ul>', '2015-09-29 14:04:27', 12, 1, '1.0', 22, 0),
(4, 'rdgsgs', '', '2015-09-22 12:05:25', 1, 1, '1.0', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `fieldvalue`
--

CREATE TABLE IF NOT EXISTS `fieldvalue` (
  `idFieldValue` int(3) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `idField` int(3) NOT NULL,
  `value` varchar(50) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `genericfield`
--

CREATE TABLE IF NOT EXISTS `genericfield` (
  `idGenericField` int(3) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `propriete` varchar(256) DEFAULT NULL,
  `baseHtml` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `genericfield`
--

INSERT INTO `genericfield` (`idGenericField`, `libelle`, `propriete`, `baseHtml`) VALUES
(1, 'email', 'type="email"', 'input'),
(2, 'texte', 'type="text"', 'input'),
(3, 'datetime', 'type="datetime"', 'input'),
(4, 'checkbox', 'type="checkbox"', 'input'),
(5, 'radioButton', 'type="radio"', 'input'),
(6, 'select', '', 'select');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`id`, `libelle`) VALUES
(1, 'Administrateur'),
(2, 'Utilisateur'),
(3, 'Technicien');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `contenu`, `date`, `idUser`, `idTicket`) VALUES
(1, '<p>Re&ccedil;u<br />\r\neffseff Pouvez-vous pr&eacute;ciser le message affich&eacute; ?<br />\r\nMerci</p>\r\n', '2015-09-15 11:39:33', 1, 1),
(2, 'Le message est <strong>`vidage de la mémoire physique...`</strong>', '2015-05-10 23:20:30', 2, 1),
(3, '<p>Tr&egrave;s bien</p>\r\n', '2015-10-01 10:01:51', 1, 1),
(4, '<p>Test</p>\r\n', '2015-10-05 07:54:27', 2, 1),
(8, '<p>test</p>\r\n', '2015-10-05 08:23:32', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `idUser` int(11) NOT NULL,
  `idTicket` int(11) NOT NULL,
  `idMessage` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(2, 'Attribué', 1, 'user', '3,4,5', 'Attribuer', 'primary'),
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ticket`
--

INSERT INTO `ticket` (`id`, `type`, `idCategorie`, `titre`, `description`, `idStatut`, `idUser`, `dateCreation`, `idAdmin`) VALUES
(1, 'incident', 8, 'Ecran bleu', 'Ecran bleu sur ouverture session windows', 4, 2, '2015-05-10 16:27:29', 1),
(2, 'incident', 12, 'impossible de se connecter', 'Impossible de se connecter à mon compte :\r\nLe message affiché est "Les informations de compte n''ont pas permis votre authentification".\r\n\r\nJe n''ai pas trouvé la procédure de récupération de mot de passe.', 2, 3, '2015-05-14 10:40:40', 1),
(3, 'incident', 3, 'Test de Ticket', 'Ceci est un test de ticket', 1, 2, '2015-09-22 21:31:27', 0),
(4, 'demande', 10, 'Test de Ticket 2', 'Ceci est un test de ticket', 2, 2, '2015-09-22 21:31:27', 3),
(5, 'incident', 4, 'Ticket Test 3', 'Ticket Test 3', 3, 2, '2015-09-26 19:19:34', 1),
(6, 'demande', 10, 'Ticket Test 4', 'Ticket Test 4', 4, 3, '2015-09-26 19:19:34', 1),
(7, 'demande', 4, 'Ticket Test 5', 'Ticket Test 5', 5, 3, '2015-09-26 19:19:54', 1),
(8, 'incident', 3, 'TESTSTSETES', '', 1, 1, '2015-10-12 07:04:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `ticketvalue`
--

CREATE TABLE IF NOT EXISTS `ticketvalue` (
  `idCustomField` int(3) NOT NULL,
  `idTicket` int(3) NOT NULL,
  `value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `token`
--

CREATE TABLE IF NOT EXISTS `token` (
  `token` varchar(32) COLLATE utf8_bin NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `idGroupe` int(11) NOT NULL,
  `idAuthProvider` int(11) DEFAULT NULL,
  `key` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `mail`, `admin`, `idGroupe`, `idAuthProvider`, `key`) VALUES
(1, 'admin', '$2y$10$0QTBrMN.NI6/h0Y0h2/pO.BPzG.MraWt9Wy7Hck3eqxh8jdZe2SSm', 'admin@local.fr', 1, 1, NULL, ''),
(2, 'user', '$2y$10$wSSIwuac4n6ZI68jj1QkCeILm.K4gU/hJgQQG55KUzBzQPpMfQVtq', 'user@local.fr', 0, 2, NULL, ''),
(3, 'autreUser', '$2y$10$rWyNDY9Hs6f043OGsKgz8.AsgGvit8Idin8xDOXR0h0sAPRV8yrc6', 'autreuser@local.fr', 0, 3, NULL, ''),
(4, 'moi', '$2y$10$0dYwBluYRBocAcR0ody5f.XVYOXrWEHQhLQp6sUy0jEewh8UglHRe', 'contact@aleboisselier.fr', 0, 3, NULL, ''),
(6, 'Antoine LEBOISSELIER', '', '', 0, 2, 1, '14269716');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `authprovider`
--
ALTER TABLE `authprovider`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategorie` (`idCategorie`);

--
-- Index pour la table `customfield`
--
ALTER TABLE `customfield`
  ADD PRIMARY KEY (`idCustomField`),
  ADD KEY `idGenericField` (`idGenericField`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategorie` (`idCategorie`,`idUser`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `fieldvalue`
--
ALTER TABLE `fieldvalue`
  ADD PRIMARY KEY (`idFieldValue`),
  ADD KEY `value` (`value`),
  ADD KEY `idField` (`idField`);

--
-- Index pour la table `genericfield`
--
ALTER TABLE `genericfield`
  ADD PRIMARY KEY (`idGenericField`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idTicket` (`idTicket`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`idUser`,`idTicket`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategorie` (`idCategorie`),
  ADD KEY `idStatut` (`idStatut`,`idUser`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `ticketvalue`
--
ALTER TABLE `ticketvalue`
  ADD KEY `idCustomField` (`idCustomField`),
  ADD KEY `idTicketValue` (`idTicket`),
  ADD KEY `value` (`value`);

--
-- Index pour la table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`token`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `groupe` (`idGroupe`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `authprovider`
--
ALTER TABLE `authprovider`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `customfield`
--
ALTER TABLE `customfield`
  MODIFY `idCustomField` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `fieldvalue`
--
ALTER TABLE `fieldvalue`
  MODIFY `idFieldValue` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `genericfield`
--
ALTER TABLE `genericfield`
  MODIFY `idGenericField` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
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
-- Contraintes pour la table `customfield`
--
ALTER TABLE `customfield`
  ADD CONSTRAINT `customfield_ibfk_1` FOREIGN KEY (`idGenericField`) REFERENCES `genericfield` (`idGenericField`);

--
-- Contraintes pour la table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `faq_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `faq_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `fieldvalue`
--
ALTER TABLE `fieldvalue`
  ADD CONSTRAINT `fieldvalue_ibfk_1` FOREIGN KEY (`idField`) REFERENCES `customfield` (`idCustomField`);

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

--
-- Contraintes pour la table `ticketvalue`
--
ALTER TABLE `ticketvalue`
  ADD CONSTRAINT `ticketvalue_ibfk_1` FOREIGN KEY (`idTicket`) REFERENCES `ticket` (`id`),
  ADD CONSTRAINT `ticketvalue_ibfk_2` FOREIGN KEY (`idCustomField`) REFERENCES `customfield` (`idCustomField`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
