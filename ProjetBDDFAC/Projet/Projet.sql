-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 17, 2016 at 10:31 PM
-- Server version: 5.6.28-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Projet`
--

-- --------------------------------------------------------

--
-- Table structure for table `Candidate`
--

CREATE TABLE IF NOT EXISTS `Candidate` (
  `idCandidate` int(11) NOT NULL,
  `idGuide` int(11) NOT NULL,
  `idOffre` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Candidate`
--

INSERT INTO `Candidate` (`idCandidate`, `idGuide`, `idOffre`) VALUES
(13, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Connait`
--

CREATE TABLE IF NOT EXISTS `Connait` (
  `idConnait` int(11) NOT NULL,
  `idGuide` int(11) NOT NULL,
  `idDomaine` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Connait`
--

INSERT INTO `Connait` (`idConnait`, `idGuide`, `idDomaine`) VALUES
(5, 10, 5),
(6, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Destination`
--

CREATE TABLE IF NOT EXISTS `Destination` (
  `idDestination` int(11) NOT NULL,
  `nomDestination` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=339 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Destination`
--

INSERT INTO `Destination` (`idDestination`, `nomDestination`) VALUES
(1, 'Afghanistan'),
(2, 'Afrique du Sud'),
(3, 'Albanie'),
(4, 'Algérie'),
(5, 'Allemagne'),
(6, 'Andorre'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctique'),
(10, 'Antigua-et-Barbuda'),
(11, 'Antilles néerlandaises'),
(12, 'Arabie saoudite'),
(13, 'Argentine'),
(14, 'Arménie'),
(15, 'Aruba'),
(16, 'Australie'),
(17, 'Autriche'),
(18, 'Azerbaïdjan'),
(19, 'Bénin'),
(20, 'Bahamas'),
(21, 'Bahreïn'),
(22, 'Bangladesh'),
(23, 'Barbade'),
(24, 'Belau'),
(25, 'Belgique'),
(26, 'Belize'),
(27, 'Bermudes'),
(28, 'Bhoutan'),
(29, 'Biélorussie'),
(30, 'Birmanie'),
(31, 'Bolivie'),
(32, 'Bosnie-Herzégovine'),
(33, 'Botswana'),
(34, 'Brésil'),
(35, 'Brunei'),
(36, 'Bulgarie'),
(37, 'Burkina Faso'),
(38, 'Burundi'),
(39, 'Côte d''Ivoire'),
(40, 'Cambodge'),
(41, 'Cameroun'),
(42, 'Canada'),
(43, 'Cap-Vert'),
(44, 'Chili'),
(45, 'Chine'),
(46, 'Chypre'),
(47, 'Colombie'),
(48, 'Comores'),
(49, 'Congo'),
(50, 'Corée du Nord'),
(51, 'Corée du Sud'),
(52, 'Costa Rica'),
(53, 'Croatie'),
(54, 'Cuba'),
(55, 'Danemark'),
(56, 'Djibouti'),
(57, 'Dominique'),
(58, 'Égypte'),
(59, 'Émirats arabes unis'),
(60, 'Équateur'),
(61, 'Érythrée'),
(62, 'Espagne'),
(63, 'Estonie'),
(64, 'États-Unis'),
(65, 'Éthiopie'),
(66, 'Finlande'),
(67, 'France'),
(68, 'Géorgie'),
(69, 'Gabon'),
(70, 'Gambie'),
(71, 'Ghana'),
(72, 'Gibraltar'),
(73, 'Grèce'),
(74, 'Grenade'),
(75, 'Groenland'),
(76, 'Guadeloupe'),
(77, 'Guam'),
(78, 'Guatemala'),
(79, 'Guinée'),
(80, 'Guinée équatoriale'),
(81, 'Guinée-Bissao'),
(82, 'Guyana'),
(83, 'Guyane française'),
(84, 'Haïti'),
(85, 'Honduras'),
(86, 'Hong Kong'),
(87, 'Hongrie'),
(88, 'Ile Bouvet'),
(89, 'Ile Christmas'),
(90, 'Ile Norfolk'),
(91, 'Iles Cayman'),
(92, 'Iles Cook'),
(93, 'Iles Féroé'),
(94, 'Iles Falkland'),
(95, 'Iles Fidji'),
(96, 'Iles Géorgie du Sud et Sandwich du Sud'),
(97, 'Iles Heard et McDonald'),
(98, 'Iles Marshall'),
(99, 'Iles Pitcairn'),
(100, 'Iles Salomon'),
(101, 'Iles Svalbard et Jan Mayen'),
(102, 'Iles Turks-et-Caicos'),
(103, 'Iles Vierges américaines'),
(104, 'Iles Vierges britanniques'),
(105, 'Iles des Cocos (Keeling)'),
(106, 'Iles mineures éloignées des États-Unis'),
(107, 'Inde'),
(108, 'Indonésie'),
(109, 'Iran'),
(110, 'Iraq'),
(111, 'Irlande'),
(112, 'Islande'),
(113, 'Israël'),
(114, 'Italie'),
(115, 'Jamaïque'),
(116, 'Japon'),
(117, 'Jordanie'),
(118, 'Kazakhstan'),
(119, 'Kenya'),
(120, 'Kirghizistan'),
(121, 'Kiribati'),
(122, 'Koweït'),
(123, 'Laos'),
(124, 'Lesotho'),
(125, 'Lettonie'),
(126, 'Liban'),
(127, 'Liberia'),
(128, 'Libye'),
(129, 'Liechtenstein'),
(130, 'Lituanie'),
(131, 'Luxembourg'),
(132, 'Macao'),
(133, 'Madagascar'),
(134, 'Malaisie'),
(135, 'Malawi'),
(136, 'Maldives'),
(137, 'Mali'),
(138, 'Malte'),
(139, 'Mariannes du Nord'),
(140, 'Maroc'),
(141, 'Martinique'),
(142, 'Maurice'),
(143, 'Mauritanie'),
(144, 'Mayotte'),
(145, 'Mexique'),
(146, 'Micronésie'),
(147, 'Moldavie'),
(148, 'Monaco'),
(149, 'Mongolie'),
(150, 'Montserrat'),
(151, 'Mozambique'),
(152, 'Népal'),
(153, 'Namibie'),
(154, 'Nauru'),
(155, 'Nicaragua'),
(156, 'Niger'),
(157, 'Nigeria'),
(158, 'Nioué'),
(159, 'Norvège'),
(160, 'Nouvelle-Calédonie'),
(161, 'Nouvelle-Zélande'),
(162, 'Oman'),
(163, 'Ouganda'),
(164, 'Ouzbékistan'),
(165, 'Pérou'),
(166, 'Pakistan'),
(167, 'Panama'),
(168, 'Papouasie-Nouvelle-Guinée'),
(169, 'Paraguay'),
(170, 'Pays-Bas'),
(171, 'Philippines'),
(172, 'Pologne'),
(173, 'Polynésie française'),
(174, 'Porto Rico'),
(175, 'Portugal'),
(176, 'Qatar'),
(177, 'République centrafricaine'),
(178, 'République démocratique du Congo'),
(179, 'République dominicaine'),
(180, 'République tchèque'),
(181, 'Réunion'),
(182, 'Roumanie'),
(183, 'Royaume-Uni'),
(184, 'Russie'),
(185, 'Rwanda'),
(186, 'Sénégal'),
(187, 'Sahara occidental'),
(188, 'Saint-Christophe-et-Niévès'),
(189, 'Saint-Marin'),
(190, 'Saint-Pierre-et-Miquelon'),
(191, 'Saint-Siège'),
(192, 'Saint-Vincent-et-les-Grenadines'),
(193, 'Sainte-Hélène'),
(194, 'Sainte-Lucie'),
(195, 'Salvador'),
(196, 'Samoa'),
(197, 'Samoa américaines'),
(198, 'Sao Tomé-et-Principe'),
(199, 'Seychelles'),
(200, 'Sierra Leone'),
(201, 'Singapour'),
(202, 'Slovénie'),
(203, 'Slovaquie'),
(204, 'Somalie'),
(205, 'Soudan'),
(206, 'Sri Lanka'),
(207, 'Suède'),
(208, 'Suisse'),
(209, 'Suriname'),
(210, 'Swaziland'),
(211, 'Syrie'),
(212, 'Taïwan'),
(213, 'Tadjikistan'),
(214, 'Tanzanie'),
(215, 'Tchad'),
(216, 'Terres australes françaises'),
(217, 'Territoire britannique de l''Océan Indien'),
(218, 'Thaïlande'),
(219, 'Timor Oriental'),
(220, 'Togo'),
(221, 'Tokélaou'),
(222, 'Tonga'),
(223, 'Trinité-et-Tobago'),
(224, 'Tunisie'),
(225, 'Turkménistan'),
(226, 'Turquie'),
(227, 'Tuvalu'),
(228, 'Ukraine'),
(229, 'Uruguay'),
(230, 'Vanuatu'),
(231, 'Venezuela'),
(232, 'Viet Nam'),
(233, 'Wallis-et-Futuna'),
(234, 'Yémen'),
(235, 'Yougoslavie'),
(236, 'Zambie'),
(237, 'Zimbabwe'),
(238, 'ex-République yougoslave de Macédoine'),
(239, 'Bas-Rhin'),
(240, 'Haut-Rhin'),
(241, 'Dordogne'),
(242, 'Gironde'),
(243, 'Landes'),
(244, 'Lot-et-Garonne'),
(245, 'Pyrénées-Atlantiques'),
(246, 'Allier'),
(247, 'Cantal'),
(248, 'Haute-Loire'),
(249, 'Puy-de-Dôme'),
(250, 'Côte-d''Or'),
(251, 'Nièvre'),
(252, 'Saône-et-Loire'),
(253, 'Yonne'),
(254, 'Côtes-d''Armor'),
(255, 'Finistère'),
(256, 'Ille-et-Vilaine'),
(257, 'Morbihan'),
(258, 'Cher'),
(259, 'Eure-et-Loir'),
(260, 'Indre'),
(261, 'Indre-et-Loire'),
(262, 'Loir-et-Cher'),
(263, 'Loiret'),
(264, 'Ardennes'),
(265, 'Aube'),
(266, 'Marne'),
(267, 'Haute-Marne'),
(268, 'Corse-du-Sud'),
(269, 'Haute-Corse'),
(270, 'Doubs'),
(271, 'Jura'),
(272, 'Haute-Saône'),
(273, 'Territoire de Belfort'),
(274, 'Paris'),
(275, 'Essonne'),
(276, 'Hauts-de-Seine'),
(277, 'Seine-Saint-Denis'),
(278, 'Seine-et-Marne'),
(279, 'Val-de-Marne'),
(280, 'Val-d''Oise'),
(281, 'Yvelines'),
(282, 'Aude'),
(283, 'Gard'),
(284, 'Hérault'),
(285, 'Lozère'),
(286, 'Pyrénées-Orientales'),
(287, 'Corrèze'),
(288, 'Creuse'),
(289, 'Haute-Vienne'),
(290, 'Meurthe-et-Moselle'),
(291, 'Meuse'),
(292, 'Moselle'),
(293, 'Vosges'),
(294, 'Ariège'),
(295, 'Aveyron'),
(296, 'Haute-Garonne'),
(297, 'Gers'),
(298, 'Lot'),
(299, 'Hautes-Pyrénées'),
(300, 'Tarn'),
(301, 'Tarn-et-Garonne'),
(302, 'Nord'),
(303, 'Pas-de-Calais'),
(304, 'Calvados'),
(305, 'Manche'),
(306, 'Orne'),
(307, 'Eure'),
(308, 'Seine-Maritime'),
(309, 'Loire-Atlantique'),
(310, 'Maine-et-Loire'),
(311, 'Mayenne'),
(312, 'Sarthe'),
(313, 'Vendée'),
(314, 'Aisne'),
(315, 'Oise'),
(316, 'Somme'),
(317, 'Charente'),
(318, 'Charente-Maritime'),
(319, 'Deux-Sèvres'),
(320, 'Vienne'),
(321, 'Alpes-de-Haute-Provence'),
(322, 'Hautes-Alpes'),
(323, 'Alpes-Maritimes'),
(324, 'Bouches-du-Rhône'),
(325, 'Var'),
(326, 'Vaucluse'),
(327, 'Ain'),
(328, 'Ardèche'),
(329, 'Drôme'),
(330, 'Isère'),
(331, 'Loire'),
(332, 'Rhône'),
(333, 'Savoie'),
(334, 'Haute-Savoie'),
(335, 'Guyane'),
(336, 'Guadeloupe'),
(337, 'Martinique'),
(338, 'Réunion');

-- --------------------------------------------------------

--
-- Table structure for table `Domaine`
--

CREATE TABLE IF NOT EXISTS `Domaine` (
  `idDomaine` int(11) NOT NULL,
  `nomDomaine` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Domaine`
--

INSERT INTO `Domaine` (`idDomaine`, `nomDomaine`) VALUES
(1, 'Moyen-âge'),
(2, 'Antiquité'),
(3, 'Sport'),
(4, 'Mythologie'),
(5, 'Montagne');

-- --------------------------------------------------------

--
-- Table structure for table `Guide`
--

CREATE TABLE IF NOT EXISTS `Guide` (
  `idGuide` int(11) NOT NULL,
  `nomGuide` varchar(45) NOT NULL,
  `prenomGuide` varchar(45) NOT NULL,
  `mailGuide` varchar(45) NOT NULL,
  `pseudoGuide` varchar(20) NOT NULL,
  `mdpGuide` varchar(20) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Guide`
--

INSERT INTO `Guide` (`idGuide`, `nomGuide`, `prenomGuide`, `mailGuide`, `pseudoGuide`, `mdpGuide`, `admin`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'admin', 'admin', 1),
(10, 'Pierre', 'Jean', 'Jean.Pierre@gmail.com', 'JeanPierre', 'JeanPierre', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Langue`
--

CREATE TABLE IF NOT EXISTS `Langue` (
  `idLangue` int(11) NOT NULL,
  `nomLangue` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Langue`
--

INSERT INTO `Langue` (`idLangue`, `nomLangue`) VALUES
(1, 'Afrikaans'),
(2, 'Albanais'),
(3, 'Allemand'),
(4, 'Anglais'),
(5, 'Arabe'),
(6, 'Araona'),
(7, 'Arménien'),
(8, 'Bengali'),
(9, 'Bésiro'),
(10, 'Biélorusse'),
(11, 'Birman'),
(12, 'Bulgare'),
(13, 'Catalan'),
(14, 'Chinois'),
(15, 'Coréen'),
(16, 'Créole'),
(17, 'Croate'),
(18, 'Danois'),
(19, 'Espagnol'),
(20, 'Espéranto'),
(21, 'Estonien'),
(22, 'Fidjien'),
(23, 'Filipino'),
(24, 'Finnois'),
(25, 'Français'),
(26, 'Géorgien'),
(27, 'Gilbertin'),
(28, 'Grec'),
(29, 'Hébreu'),
(30, 'Hindoustani'),
(31, 'Hindi'),
(32, 'Hongrois'),
(33, 'Indonésien'),
(34, 'Irlandais'),
(35, 'Islandais'),
(36, 'Italien'),
(37, 'Japonais'),
(38, 'Kazakh'),
(39, 'Khmer'),
(40, 'Lao'),
(41, 'Langue des signes'),
(42, 'Latin'),
(43, 'Letton'),
(44, 'Lituanien'),
(45, 'Luxembourgeois'),
(46, 'Macédonien'),
(47, 'Malais'),
(48, 'Malgache'),
(49, 'Maltais'),
(50, 'Maori'),
(51, 'Mongol'),
(52, 'Néerlandais'),
(53, 'Népalais'),
(54, 'Norvégien'),
(55, 'Occitan'),
(56, 'Ourdou'),
(57, 'Ouzbek'),
(58, 'Persan'),
(59, 'Polonais'),
(60, 'Portugais'),
(61, 'Quechua'),
(62, 'Roumain'),
(63, 'Russe'),
(64, 'Samoan'),
(65, 'Serbe'),
(66, 'Sesotho'),
(67, 'Slovaque'),
(68, 'Slovène'),
(69, 'Somali'),
(70, 'Suédois'),
(71, 'Tamoul'),
(72, 'Tchèque'),
(73, 'Thaï'),
(74, 'Turc'),
(75, 'Turkmène'),
(76, 'Ukrainien'),
(77, 'Vietnamien');

-- --------------------------------------------------------

--
-- Table structure for table `Necessite`
--

CREATE TABLE IF NOT EXISTS `Necessite` (
  `idNecessite` int(11) NOT NULL,
  `idOffre` int(11) NOT NULL,
  `idDomaine` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Necessite`
--

INSERT INTO `Necessite` (`idNecessite`, `idOffre`, `idDomaine`) VALUES
(1, 1, 3),
(2, 2, 1),
(5, 12, 3),
(6, 12, 4),
(7, 12, 2),
(8, 13, 5),
(9, 13, 3),
(10, 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Offre`
--

CREATE TABLE IF NOT EXISTS `Offre` (
  `idOffre` int(11) NOT NULL,
  `titreOffre` varchar(45) NOT NULL,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  `descriptionOffre` longtext NOT NULL,
  `idDestination` int(11) NOT NULL,
  `idVoyagiste` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Offre`
--

INSERT INTO `Offre` (`idOffre`, `titreOffre`, `dateDebut`, `dateFin`, `descriptionOffre`, `idDestination`, `idVoyagiste`) VALUES
(1, 'Randonnée ', '2016-06-06', '2016-06-10', 'Bonjour, je souhaite recruter un guide qui s''y connait en randonnée, un guide assez sportif.', 3, 1),
(2, 'Musée du Louvre', '2016-08-12', '2016-09-12', 'Cherche guide cultivé et connaissant Paris...', 67, 1),
(3, 'Voyage au Japon', '2012-05-12', '2013-06-06', 'Besoin d''un guide motivé et bilignue en Japonais pour faire la visite du Mont Fuji...', 116, 1),
(12, 'Sous le soleil en Martinique', '2016-11-11', '2016-12-11', 'Recherche un guide sportif...', 141, 4),
(13, 'Perpignan et ses alentours', '2016-08-08', '2016-08-25', 'Recherche un guide...', 286, 5);

-- --------------------------------------------------------

--
-- Table structure for table `Parle`
--

CREATE TABLE IF NOT EXISTS `Parle` (
  `idParle` int(11) NOT NULL,
  `idGuide` int(11) NOT NULL,
  `idLangue` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Parle`
--

INSERT INTO `Parle` (`idParle`, `idGuide`, `idLangue`) VALUES
(6, 10, 37),
(7, 10, 3),
(8, 10, 2),
(9, 10, 25);

-- --------------------------------------------------------

--
-- Table structure for table `Requiert`
--

CREATE TABLE IF NOT EXISTS `Requiert` (
  `idRequiert` int(11) NOT NULL,
  `idOffre` int(11) NOT NULL,
  `idLangue` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Requiert`
--

INSERT INTO `Requiert` (`idRequiert`, `idOffre`, `idLangue`) VALUES
(1, 1, 2),
(3, 2, 25),
(4, 3, 37),
(13, 12, 25),
(15, 12, 7),
(25, 1, 3),
(26, 1, 4),
(27, 12, 4),
(28, 13, 25),
(29, 13, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Voyagiste`
--

CREATE TABLE IF NOT EXISTS `Voyagiste` (
  `idVoyagiste` int(11) NOT NULL,
  `nomAgence` varchar(45) DEFAULT NULL,
  `telVoyagiste` varchar(45) DEFAULT NULL,
  `mailVoyagiste` varchar(45) NOT NULL,
  `pseudoVoyagiste` varchar(20) NOT NULL,
  `mdpVoyagiste` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Voyagiste`
--

INSERT INTO `Voyagiste` (`idVoyagiste`, `nomAgence`, `telVoyagiste`, `mailVoyagiste`, `pseudoVoyagiste`, `mdpVoyagiste`) VALUES
(1, 'voyagepromo', '04.05.05.05.05', 'voyagepromo@gmail.com', 'voyagepromo', 'voyagepromo'),
(4, 'EasyVoyage', '09.09.09.09.09', 'easyvoyage@gmail.com', 'easyvoyage', 'easyvoyage'),
(5, 'supervoyage', '06.06.06.06.06', 'supervoyage@gmail.com', 'supervoyage', 'supervoyage');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Candidate`
--
ALTER TABLE `Candidate`
  ADD PRIMARY KEY (`idCandidate`),
  ADD KEY `idGuide` (`idGuide`),
  ADD KEY `idOffre` (`idOffre`);

--
-- Indexes for table `Connait`
--
ALTER TABLE `Connait`
  ADD PRIMARY KEY (`idConnait`),
  ADD KEY `idGuide` (`idGuide`),
  ADD KEY `idDomaine` (`idDomaine`);

--
-- Indexes for table `Destination`
--
ALTER TABLE `Destination`
  ADD PRIMARY KEY (`idDestination`);

--
-- Indexes for table `Domaine`
--
ALTER TABLE `Domaine`
  ADD PRIMARY KEY (`idDomaine`);

--
-- Indexes for table `Guide`
--
ALTER TABLE `Guide`
  ADD PRIMARY KEY (`idGuide`);

--
-- Indexes for table `Langue`
--
ALTER TABLE `Langue`
  ADD PRIMARY KEY (`idLangue`);

--
-- Indexes for table `Necessite`
--
ALTER TABLE `Necessite`
  ADD PRIMARY KEY (`idNecessite`),
  ADD KEY `idOffre` (`idOffre`),
  ADD KEY `idDomaine` (`idDomaine`);

--
-- Indexes for table `Offre`
--
ALTER TABLE `Offre`
  ADD PRIMARY KEY (`idOffre`),
  ADD KEY `idDestination` (`idDestination`),
  ADD KEY `idVoyagiste` (`idVoyagiste`);

--
-- Indexes for table `Parle`
--
ALTER TABLE `Parle`
  ADD PRIMARY KEY (`idParle`),
  ADD KEY `idGuide` (`idGuide`),
  ADD KEY `idLangue` (`idLangue`);

--
-- Indexes for table `Requiert`
--
ALTER TABLE `Requiert`
  ADD PRIMARY KEY (`idRequiert`),
  ADD KEY `idOffre` (`idOffre`),
  ADD KEY `idLangue` (`idLangue`);

--
-- Indexes for table `Voyagiste`
--
ALTER TABLE `Voyagiste`
  ADD PRIMARY KEY (`idVoyagiste`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Candidate`
--
ALTER TABLE `Candidate`
  MODIFY `idCandidate` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `Connait`
--
ALTER TABLE `Connait`
  MODIFY `idConnait` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Destination`
--
ALTER TABLE `Destination`
  MODIFY `idDestination` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=339;
--
-- AUTO_INCREMENT for table `Domaine`
--
ALTER TABLE `Domaine`
  MODIFY `idDomaine` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Guide`
--
ALTER TABLE `Guide`
  MODIFY `idGuide` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `Langue`
--
ALTER TABLE `Langue`
  MODIFY `idLangue` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `Necessite`
--
ALTER TABLE `Necessite`
  MODIFY `idNecessite` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `Offre`
--
ALTER TABLE `Offre`
  MODIFY `idOffre` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `Parle`
--
ALTER TABLE `Parle`
  MODIFY `idParle` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `Requiert`
--
ALTER TABLE `Requiert`
  MODIFY `idRequiert` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `Voyagiste`
--
ALTER TABLE `Voyagiste`
  MODIFY `idVoyagiste` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Candidate`
--
ALTER TABLE `Candidate`
  ADD CONSTRAINT `Candidate_ibfk_1` FOREIGN KEY (`idGuide`) REFERENCES `Guide` (`idGuide`),
  ADD CONSTRAINT `Candidate_ibfk_2` FOREIGN KEY (`idOffre`) REFERENCES `Offre` (`idOffre`);

--
-- Constraints for table `Connait`
--
ALTER TABLE `Connait`
  ADD CONSTRAINT `Connait_ibfk_1` FOREIGN KEY (`idGuide`) REFERENCES `Guide` (`idGuide`),
  ADD CONSTRAINT `Connait_ibfk_2` FOREIGN KEY (`idDomaine`) REFERENCES `Domaine` (`idDomaine`);

--
-- Constraints for table `Necessite`
--
ALTER TABLE `Necessite`
  ADD CONSTRAINT `Necessite_ibfk_1` FOREIGN KEY (`idOffre`) REFERENCES `Offre` (`idOffre`),
  ADD CONSTRAINT `Necessite_ibfk_2` FOREIGN KEY (`idDomaine`) REFERENCES `Domaine` (`idDomaine`);

--
-- Constraints for table `Offre`
--
ALTER TABLE `Offre`
  ADD CONSTRAINT `Offre_ibfk_1` FOREIGN KEY (`idDestination`) REFERENCES `Destination` (`idDestination`),
  ADD CONSTRAINT `Offre_ibfk_2` FOREIGN KEY (`idVoyagiste`) REFERENCES `Voyagiste` (`idVoyagiste`);

--
-- Constraints for table `Parle`
--
ALTER TABLE `Parle`
  ADD CONSTRAINT `Parle_ibfk_1` FOREIGN KEY (`idGuide`) REFERENCES `Guide` (`idGuide`),
  ADD CONSTRAINT `Parle_ibfk_2` FOREIGN KEY (`idLangue`) REFERENCES `Langue` (`idLangue`);

--
-- Constraints for table `Requiert`
--
ALTER TABLE `Requiert`
  ADD CONSTRAINT `Requiert_ibfk_1` FOREIGN KEY (`idOffre`) REFERENCES `Offre` (`idOffre`),
  ADD CONSTRAINT `Requiert_ibfk_2` FOREIGN KEY (`idLangue`) REFERENCES `Langue` (`idLangue`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
