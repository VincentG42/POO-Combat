-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2024 at 03:27 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poo-combat`
--

-- --------------------------------------------------------

--
-- Table structure for table `heroes`
--

CREATE TABLE `heroes` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `health_point` int NOT NULL,
  `class` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `heroes`
--

INSERT INTO `heroes` (`id`, `name`, `health_point`, `class`) VALUES
(1, 'test', -10, 0),
(2, 'test', -11, 0),
(3, 'test2', -15, 0),
(4, 'test', -6, 0),
(5, 'test', -8, 0),
(6, 'test', -63, 0),
(7, 'test', -597, 0),
(8, 'Sylvanas', -48, 0),
(9, 'kamel le goat', -23, 0),
(10, 'Yanis', -51, 0),
(11, 'Vincent', -67, 0),
(12, 'Turan', -11, 0),
(13, 'Chafi', -22, 0),
(14, 'Negar', -3, 0),
(15, 'Vincent', -14, 0),
(16, 'Anthony', -20, 0),
(17, 'Sarah', -2, 0),
(18, 'Brieuc', -35, 0),
(19, 'Vincent', -12, 0),
(20, 'TestWar', -67, 1),
(21, 'TestArcher', -53, 2),
(22, 'TestMage', 0, 3),
(23, 'TestWar', -40, 1),
(24, 'Kamel', -15, 1),
(25, 'Kamel', -10, 1),
(26, 'Vincent', -18, 2),
(27, 'test', -14, 1),
(28, 'test', -4, 3),
(29, 'test', -11, 1),
(30, 'test', -1, 3),
(31, 'test', -3, 2),
(32, 'KAmel', -9, 3),
(33, 'test', -13, 1),
(34, 'test', 100, 2),
(35, 'test', -6, 3),
(36, 'Vincent', 100, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `heroes`
--
ALTER TABLE `heroes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `heroes`
--
ALTER TABLE `heroes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
