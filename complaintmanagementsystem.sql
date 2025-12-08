-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2025 at 05:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complaintmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `registered` datetime NOT NULL,
  `activation_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`, `registered`, `activation_code`) VALUES
(1, 'test', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 'test@example.com', '2025-01-01 00:00:00', 'activated'),
(11, 'test1', '$2y$10$32jJ0w22WAOTEVEtOJDQ0ud0zo2Rmt.1McwQsrBR0XPfES7pLyLTi', 'test@example.com', '2025-12-04 21:20:50', 'f0f9df00b8f2cbdfd8fc8d7ec24f6dc1664e8c21'),
(12, 'test2', '$2y$10$fIRHvzflqeKEtBCAbCexyuE7YVnfy5wFqfjucD2RQdstulw3pxfr6', 'test2@example.com', '2025-12-05 00:40:34', 'activated'),
(13, 'test3', '$2y$10$VMdZwUlczb16vkoGJwV4nOHy.FNc.cfzFjLXcUJP.cYbAU1phwU6q', 'test3@example.com', '2025-12-05 00:42:24', 'activated'),
(14, 'test4', '$2y$10$SyHszemPC0S7EYhd08X6wuDVwQOgmowchqZZO.ZL7G1GDStISkPri', 'test4@example.com', '2025-12-05 01:03:19', 'activated');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
