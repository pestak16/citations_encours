-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 21 mai 2023 à 10:26
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `citations`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteurs`
--

DROP TABLE IF EXISTS `auteurs`;
CREATE TABLE IF NOT EXISTS `auteurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `auteur` varchar(63) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `date_modif` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `auteur` (`auteur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `auteurs`
--

INSERT INTO `auteurs` (`id`, `auteur`, `bio`, `date_modif`) VALUES
(1, 'Sénèque', 'Sénèque (en latin Lucius Annaeus Seneca), né à Cordoue, dans le sud de l\'Espagne, entre l\'an 4 av. J.-C. et l\'an 1 apr. J.-C., mort le 12 avril 65 apr. J.-C., est un philosophe de l\'école stoïcienne, un dramaturge et un homme d\'État romain du Ier siècle. Il est parfois nommé Sénèque le Philosophe, Sénèque le Tragique ou Sénèque le Jeune pour le distinguer de son père, Sénèque l\'Ancien.\r\n\r\nConseiller à la cour impériale sous Caligula, exilé à l\'avènement de Claude puis rappelé comme précepteur de Néron, Sénèque joue un rôle important de conseiller auprès de ce dernier avant d\'être discrédité et acculé au suicide. Ses traités philosophiques comme De la colère, De la vie heureuse ou De la brièveté de la vie, et surtout ses Lettres à Lucilius exposent ses conceptions philosophiques stoïciennes. ', '2023-04-09 10:59:24'),
(2, 'Friedrich Nietzsche', 'Friedricha Wilhelm Nietzsche ([ˈfʁiːdʁɪç ˈvɪlhɛlm ˈniːt͡sʃə]1 Écouter ; souvent francisé en [nit͡ʃ ]), né le 15 octobre 1844 à Röcken en Prusse et mort le 25 août 1900 à Weimar en Saxe-Weimar-Eisenach, est un philosophe, critique culturel, compositeur, poète, écrivain et philologue allemand dont l\'œuvre a exercé une profonde influence sur l\'histoire intellectuelle contemporaine.\r\n\r\nIl commence sa carrière comme philologue classique avant de se tourner vers la philosophie. En 1869, à l\'âge de 24 ans, il devient la plus jeune personnalité à occuper la chaire de philologie classique de l\'université de Bâle. Il démissionne en 1879 en raison de problèmes de santé qui le tourmenteront presque toute sa vie, puis achève la plupart de ses écrits fondamentaux au cours de la décennie suivante. En 1889, à 44 ans, il est victime d\'un effondrement et, par la suite, d\'une perte totale de ses facultés mentales. Il vit ses dernières années sous la garde de sa mère, puis chez sa sœur Elisabeth Förster-Nietzsche. ', '2023-04-09 11:01:01'),
(3, 'Pierre-Emmanuel Barré', 'Pierre-Emmanuel Barré, né en 1984 à Quimperlé, dans le Finistère (France), est un humoriste français, chroniqueur de radio et de télévision.\r\n\r\nAdepte de l\'humour noir, il est présent sur scène avec sa comédie Full Metal Molière (2007) et son seul-en-scène Pierre-Emmanuel Barré est un sale con (2011). Entre 2012 et 2017, il tient une chronique hebdomadaire sur France Inter dans On va tous y passer puis dans La Bande originale. De 2013 à 2015, il participe à La Nouvelle Édition sur Canal+ avant de rejoindre Folie passagère sur France 2. ', '2023-04-09 11:04:07');

-- --------------------------------------------------------

--
-- Structure de la table `citations`
--

DROP TABLE IF EXISTS `citations`;
CREATE TABLE IF NOT EXISTS `citations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `citation` varchar(127) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `explication` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `date_modif` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `auteurs_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `citation` (`citation`),
  KEY `auteurs_id` (`auteurs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `citations`
--

INSERT INTO `citations` (`id`, `citation`, `explication`, `date_modif`, `auteurs_id`) VALUES
(1, 'Pendant que nous sommes parmi les hommes, pratiquons l\'humanité.', NULL, '2023-04-09 11:04:50', 1),
(2, 'Celui qui cherche la sagesse est un sage, celui qui croit l\'avoir trouvée est un fou.', NULL, '2023-04-09 11:06:27', 1),
(3, 'Celui qui sait commander trouve toujours ceux qui doivent obéir.', 'La Volonté de puissance (Der Wille zur Macht. Versuch einer Umwertung aller Werte, La Volonté de puissance. Essai d\'inversion de toutes les valeurs.) est un projet de livre du philosophe allemand Friedrich Nietzsche, projet abandonné à la fin de l\'année 1888. La Volonté de puissance désigne également plusieurs compilations des fragments posthumes de Nietzsche publiées et présentées comme son œuvre principale, et considérées aujourd\'hui comme des falsifications. ', '2023-04-09 11:08:29', 2),
(4, 'L’homme a besoin de ce qu’il y a de pire en lui s’il veut parvenir à ce qu’il a de meilleur.', 'Citation tirée du livre \"Ainsi parlait Zarathoustra\"', '2023-04-09 11:13:55', 2),
(5, 'La route, c’est comme une femme, lorsqu’on est plusieurs usagers, il faut prendre des précautions. ', NULL, '2023-04-09 11:16:16', 3),
(6, 'Je pense qu\'on peut rire de tout avec tout le monde, du moment qu\'on a un 9mm chargé dans la poche', NULL, '2023-04-09 11:17:31', 3),
(8, 'Sourire est la meilleure façon de montrer les dents au destin.', NULL, '2023-04-09 11:23:35', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(63) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nom` varchar(63) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail` varchar(320) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mot_de_passe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_modif` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(127) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `citations`
--
ALTER TABLE `citations`
  ADD CONSTRAINT `citations_ibfk_1` FOREIGN KEY (`auteurs_id`) REFERENCES `auteurs` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
