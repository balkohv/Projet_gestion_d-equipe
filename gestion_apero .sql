-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 26, 2023 at 10:18 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_apero`
--

-- --------------------------------------------------------

--
-- Table structure for table `jouer_rencontre`
--

CREATE TABLE `jouer_rencontre` (
  `id_jouer_rencontre` int(11) NOT NULL,
  `id_joueur` int(11) NOT NULL,
  `id_match` int(11) NOT NULL,
  `litres_ingerer` float NOT NULL DEFAULT '0',
  `note` int(11) NOT NULL DEFAULT '0',
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jouer_rencontre`
--

INSERT INTO `jouer_rencontre` (`id_jouer_rencontre`, `id_joueur`, `id_match`, `litres_ingerer`, `note`, `status`) VALUES
(2, 2, 1, 12, 12, ''),
(3, 2, 1, 12, 12, 'sam'),
(4, 2, 1, 12, 12, 'sam'),
(5, 2, 1, 12, 12, 'sam'),
(6, 2, 1, 12, 12, 'sam'),
(7, 2, 1, 12, 12, 'sam'),
(8, 2, 1, 12, 12, 'sam'),
(9, 2, 1, 12, 12, 'sam'),
(10, 2, 1, 12, 12, 'sam'),
(11, 2, 1, 12, 12, 'sam'),
(12, 2, 1, 12, 12, 'sam'),
(13, 2, 1, 12, 12, 'sam'),
(14, 2, 1, 12, 12, 'sam'),
(15, 2, 1, 12, 12, 'sam'),
(16, 2, 1, 12, 12, 'sam'),
(17, 2, 1, 12, 12, 'sam'),
(18, 2, 1, 12, 12, 'sam'),
(19, 2, 1, 12, 12, 'sam'),
(20, 2, 1, 12, 12, 'sam'),
(21, 2, 1, 12, 12, 'sam'),
(22, 2, 1, 12, 12, 'sam'),
(23, 2, 1, 13, 13, 'sam'),
(24, 2, 1, 13, 13, 'sam'),
(25, 2, 1, 13, 13, 'sam'),
(26, 2, 1, 13, 13, 'sam'),
(27, 2, 1, 13, 13, 'sam'),
(28, 2, 1, 13, 13, 'sam'),
(29, 2, 1, 13, 13, 'sam'),
(30, 2, 1, 13, 13, 'sam'),
(31, 2, 1, 13, 13, 'sam'),
(32, 2, 1, 13, 13, 'sam'),
(33, 2, 1, 13, 13, 'sam'),
(34, 2, 1, 13, 13, 'sam'),
(35, 2, 1, 13, 13, 'sam'),
(36, 2, 1, 13, 13, 'sam'),
(37, 2, 1, 13, 13, 'sam'),
(38, 2, 1, 13, 13, 'sam'),
(39, 2, 1, 13, 13, 'sam'),
(40, 2, 1, 13, 13, 'sam'),
(41, 2, 1, 13, 13, 'sam'),
(42, 2, 1, 13, 13, 'sam'),
(43, 2, 1, 13, 13, 'sam'),
(44, 2, 1, 13, 13, 'sam'),
(45, 2, 1, 13, 13, 'sam'),
(46, 2, 1, 13, 13, 'sam'),
(47, 2, 1, 13, 13, 'sam'),
(48, 2, 1, 13, 13, 'sam'),
(49, 2, 1, 13, 13, 'sam'),
(50, 2, 35, 13, 13, 'sam'),
(51, 2, 36, 15, 17, 'sam'),
(52, 2, 37, 51, 19, 'sam'),
(53, 2, 38, 17, 19, 'sam'),
(54, 2, 39, 17, 19, 'sam'),
(55, 2, 40, 17, 19, 'sam'),
(56, 2, 41, 17, 19, 'sam'),
(57, 2, 42, 17, 19, 'sam');

-- --------------------------------------------------------

--
-- Table structure for table `joueur`
--

CREATE TABLE `joueur` (
  `id_joueur` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `photo_permis` blob,
  `date_naissance` date NOT NULL,
  `taille` float NOT NULL,
  `poids` float NOT NULL,
  `poste_preferer` varchar(50) DEFAULT NULL,
  `match_jouer` int(11) NOT NULL DEFAULT '0',
  `victoire` int(11) NOT NULL DEFAULT '0',
  `vomis` int(11) NOT NULL DEFAULT '0',
  `points_permis` int(11) NOT NULL DEFAULT '12'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `joueur`
--

INSERT INTO `joueur` (`id_joueur`, `nom`, `prenom`, `photo_permis`, `date_naissance`, `taille`, `poids`, `poste_preferer`, `match_jouer`, `victoire`, `vomis`, `points_permis`) VALUES
(1, 'a', 'a', NULL, '2022-11-09', 180, 180, 'evier', 0, 0, 0, 10),
(2, 'pellefigue', 'theo', NULL, '2022-12-22', 181, 90, 'sam', 31, 1, 31, 12),
(3, 'dourre', 'thomas', NULL, '2023-01-10', 181, 180, 'joueur', 0, 0, 0, 12),
(4, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(5, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(6, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(7, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(8, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(9, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(10, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(11, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(12, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(13, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(14, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(15, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(16, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(17, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(18, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(19, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(20, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(21, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(22, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(23, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(24, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(25, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(26, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(27, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(28, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(29, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(30, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(31, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(32, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(33, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(34, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(35, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(36, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(37, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(38, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(39, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(40, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(41, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(42, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(43, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(44, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(45, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(46, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(47, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(48, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(49, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(50, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(51, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(52, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(53, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(54, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(55, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(56, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(57, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(58, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(59, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(60, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(61, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(62, 'test', 'photo', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 12),
(63, 'bite', ' couille', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 18),
(64, 'bite', ' couille', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 18),
(65, 'bite', ' couille', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 18),
(66, 'bite', ' couille', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 18),
(67, 'bite', ' couille', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 18),
(68, 'bite', ' couille', NULL, '2023-01-26', 181, 94, 'joueur', 0, 0, 0, 18);

-- --------------------------------------------------------

--
-- Table structure for table `rencontre`
--

CREATE TABLE `rencontre` (
  `id_rencontre` int(11) NOT NULL,
  `date_heure` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `equipe_adverse` varchar(50) DEFAULT NULL,
  `lieu` varchar(50) DEFAULT NULL,
  `heure_retour` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `victoire` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rencontre`
--

INSERT INTO `rencontre` (`id_rencontre`, `date_heure`, `equipe_adverse`, `lieu`, `heure_retour`, `victoire`) VALUES
(34, '2023-01-26 18:33:00', 'rouge', 'figeac', '2023-01-26 22:34:00', 0),
(35, '2023-01-26 20:24:00', 'rouge', 'figeac', '2023-01-26 21:24:00', 0),
(36, '2023-01-26 19:42:00', 'rouge', 'figeac', '2023-01-26 21:41:00', 0),
(37, '2023-01-26 19:47:00', 'rouge', 'figeac', '2023-01-26 21:46:00', 0),
(38, '2023-01-26 19:47:00', 'rouge', 'figeac', '2023-01-26 21:46:00', 0),
(39, '2023-01-26 19:47:00', 'rouge', 'figeac', '2023-01-26 21:46:00', 0),
(40, '2023-01-26 19:47:00', 'rouge', 'figeac', '2023-01-26 21:46:00', 0),
(41, '2023-01-26 19:47:00', 'rouge', 'figeac', '2023-01-26 21:46:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom_utilisateur` varchar(40) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `prenom` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nom_utilisateur`, `mdp`, `prenom`) VALUES
(1, 'theo', '$2y$10$AaUScF.R9RsFZ50ON73VMu.5rU1IGxPL45PJG4E77QVlHKzPdAG2C', 'theo'),
(2, 'theo', '4813494d137e1631bba301d5acab6e7bb7aa74ce1185d456565ef51d737677b2', 'theo1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jouer_rencontre`
--
ALTER TABLE `jouer_rencontre`
  ADD PRIMARY KEY (`id_jouer_rencontre`);

--
-- Indexes for table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`id_joueur`);

--
-- Indexes for table `rencontre`
--
ALTER TABLE `rencontre`
  ADD PRIMARY KEY (`id_rencontre`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jouer_rencontre`
--
ALTER TABLE `jouer_rencontre`
  MODIFY `id_jouer_rencontre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `id_joueur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `rencontre`
--
ALTER TABLE `rencontre`
  MODIFY `id_rencontre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
