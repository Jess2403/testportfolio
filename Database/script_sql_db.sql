-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  mer. 15 juil. 2020 à 13:39
-- Version du serveur :  8.0.18
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `portfolio2020`
--

-- --------------------------------------------------------

--
-- Structure de la table `adminpres`
--

DROP TABLE IF EXISTS `adminpres`;
CREATE TABLE IF NOT EXISTS `adminpres` (
  `idadminpres` tinyint(2) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `pwd` varchar(8) NOT NULL,
  PRIMARY KEY (`idadminpres`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adminpres`
--

INSERT INTO `adminpres` (`idadminpres`, `login`, `pwd`) VALUES
(1, 'Formateur', 'C2FM'),
(2, 'Saphira1207', 'Jess1207');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_image`
--

DROP TABLE IF EXISTS `categorie_image`;
CREATE TABLE IF NOT EXISTS `categorie_image` (
  `idcategorie_image` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cat_img` varchar(50) NOT NULL,
  `adminpres_idadminpres` tinyint(2) NOT NULL,
  PRIMARY KEY (`idcategorie_image`),
  KEY `fk_categorie-image_adminpres1_idx` (`adminpres_idadminpres`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie_image`
--

INSERT INTO `categorie_image` (`idcategorie_image`, `nom_cat_img`, `adminpres_idadminpres`) VALUES
(1, 'emploie', 2),
(2, 'lavie', 2),
(3, 'lacuisine', 2),
(4, 'leplus', 1),
(5, 'espace_formateur', 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie_liens`
--

DROP TABLE IF EXISTS `categorie_liens`;
CREATE TABLE IF NOT EXISTS `categorie_liens` (
  `idcategorie_liens` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cat_liens` varchar(50) DEFAULT NULL,
  `adminpres_idadminpres` tinyint(2) NOT NULL,
  PRIMARY KEY (`idcategorie_liens`),
  KEY `fk_categorie-liens_adminpres1_idx` (`adminpres_idadminpres`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie_liens`
--

INSERT INTO `categorie_liens` (`idcategorie_liens`, `nom_cat_liens`, `adminpres_idadminpres`) VALUES
(1, 'animations', 2),
(2, 'recherches', 2),
(3, 'espace_formateur', 1);

-- --------------------------------------------------------

--
-- Structure de la table `galerie`
--

DROP TABLE IF EXISTS `galerie`;
CREATE TABLE IF NOT EXISTS `galerie` (
  `idgalerie` int(11) NOT NULL AUTO_INCREMENT,
  `nomfichier` varchar(50) NOT NULL,
  `chemin` varchar(250) DEFAULT NULL,
  `adminpres_idadminpres` tinyint(2) NOT NULL,
  `categorie_image_idcategorie_image` int(11) NOT NULL,
  PRIMARY KEY (`idgalerie`),
  KEY `fk_galerie_adminpres_idx` (`adminpres_idadminpres`),
  KEY `fk_galerie_categorie1_idx` (`categorie_image_idcategorie_image`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `liens`
--

DROP TABLE IF EXISTS `liens`;
CREATE TABLE IF NOT EXISTS `liens` (
  `idliens` int(11) NOT NULL AUTO_INCREMENT,
  `nom_site` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `url` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `adminpres_idadminpres` tinyint(2) NOT NULL,
  `categorie_liens_idcategorie_liens` int(11) NOT NULL,
  PRIMARY KEY (`idliens`),
  KEY `fk_liens_categorie-liens1_idx` (`categorie_liens_idcategorie_liens`),
  KEY `fk_liens_adminpres1` (`adminpres_idadminpres`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `liens`
--

INSERT INTO `liens` (`idliens`, `nom_site`, `url`, `description`, `adminpres_idadminpres`, `categorie_liens_idcategorie_liens`) VALUES
(16, 'Bootstrap', 'https://getbootstrap.com/docs/4.5/getting-started/introduction/', 'gyg', 2, 1),
(17, 'cf2m', 'https://www.cf2m.be', 'cf', 2, 2),
(18, 'W3 school', 'https://getbootstrap.com/docs/4.5/getting-started/introduction/', 'hvbliubgl', 2, 1),
(19, 'Bouton néon', 'https://www.youtube.com/watch?v=ex7jGbyFgpA', 'Pour faire mes boutons de navigation dans ma page \"ACCUEIL\".', 2, 1),
(20, 'Sphère animation 3D', 'https://www.youtube.com/watch?v=icgbxlqf9Kc', 'Pour faire ma sphère 3d qui est sur ma page \"ACCUEIL\".', 2, 1),
(21, 'Effet animation texte', 'https://www.youtube.com/watch?v=ajhJnfS_FK4', 'Pour faire mon animation texte dans ma page \"ACCUEIL\".', 2, 1),
(22, 'Swipe 3d responsive', 'https://www.youtube.com/watch?v=kw1wnvWjgCw', 'Pour faire le swipe responsive que vous trouverez dans ma page \"PRESENTATION\".', 2, 1),
(23, 'Linear-gradient', 'https://developer.mozilla.org/fr/docs/Web/CSS/linear-gradient', 'Pour faire mes fonds d\'écran en linear-gradient. ( Mes couleurs de fonds de pages).', 2, 2),
(24, 'Navbar responsive', 'https://www.youtube.com/watch?v=lYw-FE60Dws', 'Pour faire ma barre de navigation responsive sur toutes mes pages sauf \"ACCUEIL\".', 2, 2),
(25, 'Ici pour les font-style(gras, italic,...)', 'https://developer.mozilla.org/fr/docs/Web/CSS/font-style', 'Pour divers soucis en css(design du site).', 2, 2),
(26, 'Pour faire mes listes de liens.', 'https://www.formget.com/css-lists/', 'Pour faire mes listes de liens.', 2, 2),
(28, 'Mise en page', 'https://www.cssdebutant.com/debuter-en-css-integrer-du-css-page-HTML.html', 'Pour m\'aider dans ma mise en page de ma page cv pour l\'intégration d\'un paragraphe dans mon encadré faisant partie de mon titre.', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `liste_contact`
--

DROP TABLE IF EXISTS `liste_contact`;
CREATE TABLE IF NOT EXISTS `liste_contact` (
  `idliste_contact` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `adminpres_idadminpres` tinyint(2) NOT NULL,
  PRIMARY KEY (`idliste_contact`),
  KEY `fk_liste-contact_adminpres1_idx` (`adminpres_idadminpres`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categorie_image`
--
ALTER TABLE `categorie_image`
  ADD CONSTRAINT `fk_categorie-image_adminpres1` FOREIGN KEY (`adminpres_idadminpres`) REFERENCES `adminpres` (`idadminpres`);

--
-- Contraintes pour la table `categorie_liens`
--
ALTER TABLE `categorie_liens`
  ADD CONSTRAINT `fk_categorie-liens_adminpres1` FOREIGN KEY (`adminpres_idadminpres`) REFERENCES `adminpres` (`idadminpres`);

--
-- Contraintes pour la table `galerie`
--
ALTER TABLE `galerie`
  ADD CONSTRAINT `fk_galerie_adminpres` FOREIGN KEY (`adminpres_idadminpres`) REFERENCES `adminpres` (`idadminpres`),
  ADD CONSTRAINT `fk_galerie_categorie1` FOREIGN KEY (`categorie_image_idcategorie_image`) REFERENCES `categorie_image` (`idcategorie_image`);

--
-- Contraintes pour la table `liens`
--
ALTER TABLE `liens`
  ADD CONSTRAINT `fk_liens_adminpres1` FOREIGN KEY (`adminpres_idadminpres`) REFERENCES `adminpres` (`idadminpres`),
  ADD CONSTRAINT `fk_liens_categorie-liens1` FOREIGN KEY (`categorie_liens_idcategorie_liens`) REFERENCES `categorie_liens` (`idcategorie_liens`);

--
-- Contraintes pour la table `liste_contact`
--
ALTER TABLE `liste_contact`
  ADD CONSTRAINT `fk_liste-contact_adminpres1` FOREIGN KEY (`adminpres_idadminpres`) REFERENCES `adminpres` (`idadminpres`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
