-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 25, 2023 at 03:47 PM
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
(2, 'pellefigue', 'theo', NULL, '2022-12-22', 181, 90, 'sam', 0, 0, 0, 12),
(3, 'dourre', 'thomas', NULL, '2023-01-10', 181, 180, 'joueur', 0, 0, 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `rencontre`
--

CREATE TABLE `rencontre` (
  `id_rencontre` int(11) NOT NULL,
  `date_heure` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `equipe_adverse` varchar(50) DEFAULT NULL,
  `lieu` varchar(50) DEFAULT NULL,
  `heure_retour` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rencontre`
--

INSERT INTO `rencontre` (`id_rencontre`, `date_heure`, `equipe_adverse`, `lieu`, `heure_retour`) VALUES
(1, '2022-11-17 10:30:00', 'les rouge', 'mon cul', '2022-11-25 10:31:00'),
(2, '2022-12-09 08:45:00', 'les bleu', 'mon cul2', '2022-12-23 08:45:00'),
(3, '2022-12-09 08:45:00', 'les bleu', 'mon cul2', '2022-12-23 08:45:00'),
(4, '2022-12-09 09:07:00', 'les rouge', 'mon cul2', '2022-12-13 09:07:00'),
(5, '2022-12-09 09:08:00', 'les rouge', 'mon cul2', '2022-12-10 09:08:00'),
(6, '2022-12-09 09:10:00', 'les rouge', 'mon cul2', '2022-12-10 09:10:00'),
(7, '2022-12-09 09:12:00', 'les bleu', 'mon cul2', '2022-12-23 09:13:00'),
(8, '2022-12-09 09:12:00', 'les bleu', 'mon cul2', '2022-12-23 09:13:00'),
(9, '2022-12-09 09:12:00', 'les bleu', 'mon cul2', '2022-12-23 09:13:00'),
(10, '2022-12-09 09:12:00', 'les bleu', 'mon cul2', '2022-12-23 09:13:00'),
(11, '2022-12-09 09:12:00', 'les bleu', 'mon cul2', '2022-12-23 09:13:00'),
(12, '2022-12-09 09:12:00', 'les bleu', 'mon cul2', '2022-12-23 09:13:00'),
(13, '2022-12-09 09:12:00', 'les bleu', 'mon cul2', '2022-12-23 09:13:00'),
(14, '2022-12-09 09:12:00', 'les bleu', 'mon cul2', '2022-12-23 09:13:00'),
(15, '2022-12-09 09:12:00', 'les bleu', 'mon cul2', '2022-12-23 09:13:00'),
(16, '2022-12-09 09:12:00', 'les bleu', 'mon cul2', '2022-12-23 09:13:00'),
(17, '2022-12-09 09:12:00', 'les bleu', 'mon cul2', '2022-12-23 09:13:00'),
(18, '2022-12-09 09:12:00', 'les bleu', 'mon cul2', '2022-12-23 09:13:00'),
(19, '2022-12-09 09:12:00', 'les bleu', 'mon cul2', '2022-12-23 09:13:00'),
(20, '2022-12-09 09:12:00', 'les bleu', 'mon cul2', '2022-12-23 09:13:00'),
(21, '2022-12-09 09:12:00', 'les bleu', 'mon cul2', '2022-12-23 09:13:00'),
(22, '2022-12-09 09:12:00', 'les bleu', 'mon cul2', '2022-12-23 09:13:00'),
(23, '2022-12-09 09:12:00', 'les bleu', 'mon cul2', '2022-12-23 09:13:00'),
(24, '2022-12-09 09:12:00', 'les bleu', 'mon cul2', '2022-12-23 09:13:00'),
(25, '2022-12-09 09:12:00', 'les bleu', 'mon cul2', '2022-12-23 09:13:00'),
(26, '2022-12-09 09:12:00', 'les bleu', 'mon cul2', '2022-12-23 09:13:00');

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
  MODIFY `id_jouer_rencontre` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `id_joueur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rencontre`
--
ALTER TABLE `rencontre`
  MODIFY `id_rencontre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
