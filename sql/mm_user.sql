-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2022 at 08:06 PM
-- Server version: 8.0.26
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kclark`
--

-- --------------------------------------------------------

--
-- Table structure for table `mm_user`
--

CREATE TABLE `mm_user` (
  `id` int NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `birthdate` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(300) NOT NULL,
  `profile_picture` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mm_user`
--

INSERT INTO `mm_user` (`id`, `first_name`, `last_name`, `birthdate`, `username`, `password`, `profile_picture`, `is_admin`) VALUES
(1, 'Kam', 'Clark', '2001-04-29', 'AdminKam', '$2y$10$YHdz69yfbOW8KhuOzPzEGOzyRbzlh8xCnBf1N/dXeG5svl/QJYtHW', 'Shoebill.PNG', 1),
(8, 'Alfredo', 'Linguini', '1990-06-29', 'Gusteau', '$2y$10$p8J/NznQWqHa.8u4c92x8eMr9d44K//k/F7Rv1apQ34TlWmlLlwP6', 'linguini.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mm_user`
--
ALTER TABLE `mm_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mm_user`
--
ALTER TABLE `mm_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
