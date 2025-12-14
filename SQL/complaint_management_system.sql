-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2025 at 02:50 AM
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
-- Database: `complaint_management_system`
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
  `activation_code` varchar(255) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`, `registered`, `activation_code`, `department_id`, `is_available`) VALUES
(1, 'test', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 'test@example.com', '2025-01-01 00:00:00', 'activated', NULL, 1),
(11, 'test1', '$2y$10$32jJ0w22WAOTEVEtOJDQ0ud0zo2Rmt.1McwQsrBR0XPfES7pLyLTi', 'test@example.com', '2025-12-04 21:20:50', 'f0f9df00b8f2cbdfd8fc8d7ec24f6dc1664e8c21', NULL, 1),
(12, 'test2', '$2y$10$fIRHvzflqeKEtBCAbCexyuE7YVnfy5wFqfjucD2RQdstulw3pxfr6', 'test2@example.com', '2025-12-05 00:40:34', 'activated', NULL, 1),
(13, 'test3', '$2y$10$VMdZwUlczb16vkoGJwV4nOHy.FNc.cfzFjLXcUJP.cYbAU1phwU6q', 'test3@example.com', '2025-12-05 00:42:24', 'activated', NULL, 1),
(14, 'test4', '$2y$10$SyHszemPC0S7EYhd08X6wuDVwQOgmowchqZZO.ZL7G1GDStISkPri', 'test4@example.com', '2025-12-05 01:03:19', 'activated', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `complaint_type_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT 1,
  `is_solved` int(11) NOT NULL,
  `update_time` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaint_type`
--

CREATE TABLE `complaint_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL,
  `estimated_resolution_times` varchar(100) DEFAULT NULL,
  `priority` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaint_type`
--

INSERT INTO `complaint_type` (`id`, `name`, `department_id`, `estimated_resolution_times`, `priority`) VALUES
(1, 'Unauthorized transaction', 1, '3-5', 'High'),
(2, 'Suspicious account activity', 1, '2-4', 'High'),
(3, 'Failed online payment', 2, '1-2', 'Medium'),
(4, 'Bank transfer not completed', 2, '2-3', 'Medium'),
(5, 'Request new debit card', 3, '5-7', 'Low'),
(6, 'Activate new credit card', 3, '1-2', 'Low'),
(7, 'Incorrect billing', 4, '3-5', 'Medium'),
(8, 'Refund not received', 4, '2-4', 'High'),
(9, 'Cannot log in to online banking', 5, '1-2', 'High'),
(10, 'Password reset request', 5, '1-2', 'Medium'),
(11, 'Report lost debit card', 6, '1-2', 'High'),
(12, 'Report stolen credit card', 6, '1-2', 'Extreme'),
(13, 'Enable two-factor authentication', 7, '1', 'Medium'),
(14, 'Block suspicious login attempts', 7, '1-2', 'High'),
(15, 'Overcharged on bill', 8, '2-3', 'Medium'),
(16, 'Payment not reflected', 8, '1-2', 'High'),
(17, 'Internet downtime', 9, '1-3', 'High'),
(18, 'Slow internet speed', 9, '2-5', 'Medium'),
(19, 'Cannot make calls', 10, '1-2', 'High'),
(20, 'Mobile data not working', 10, '1-3', 'Medium'),
(21, 'General inquiry', 11, '1', 'Low'),
(22, 'Complaint about staff behavior', 11, '2-3', 'Medium'),
(23, 'Software bug on app', 12, '2-5', 'Medium'),
(24, 'System error while logging in', 12, '1-3', 'High'),
(25, 'Loan application delay', 13, '3-7', 'High'),
(26, 'Loan rejection query', 13, '2-4', 'Medium'),
(27, 'New account creation', 14, '1-3', 'Low'),
(28, 'Account details update', 14, '1-2', 'Medium'),
(29, 'Mortgage application delay', 15, '5-10', 'High'),
(30, 'Mortgage interest dispute', 15, '3-7', 'High'),
(31, 'Claim rejection query', 16, '3-7', 'High'),
(32, 'Policy coverage question', 16, '1-3', 'Medium'),
(33, 'Credit card limit increase request', 17, '1-3', 'Medium'),
(34, 'Unrecognized credit card transaction', 17, '2-4', 'High'),
(35, 'Request personal data deletion', 18, '2-5', 'Medium'),
(36, 'Report data breach', 18, '1-2', 'Extreme'),
(37, 'Scheduled maintenance notification', 19, '1', 'Low'),
(38, 'Unexpected network outage', 19, '1-3', 'High');

-- --------------------------------------------------------

--
-- Table structure for table `customer_accounts`
--

CREATE TABLE `customer_accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `registered` datetime NOT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `tenant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_accounts`
--

INSERT INTO `customer_accounts` (`id`, `username`, `password`, `email`, `registered`, `activation_code`, `tenant_id`) VALUES
(1, 'Ctest', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 'test@example.com', '2025-01-01 00:00:00', 'activated', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'Fraud'),
(2, 'Transaction Failure'),
(3, 'Card Management'),
(4, 'Payment Disputes'),
(5, 'Internet Banking'),
(6, 'Lost or Stolen Cards'),
(7, 'Prevent Fraud'),
(8, 'Billing and Payment Support'),
(9, 'Internet Connection'),
(10, 'Mobile Connection Issues'),
(11, 'Customer Support'),
(12, 'Technical Support'),
(13, 'Loan Applications'),
(14, 'Account Opening'),
(15, 'Mortgage Services'),
(16, 'Insurance Queries'),
(17, 'Credit Card Services'),
(18, 'Data Protection'),
(19, 'Network Maintenance');

-- --------------------------------------------------------

--
-- Table structure for table `solved_status`
--

CREATE TABLE `solved_status` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `solved_status`
--

INSERT INTO `solved_status` (`id`, `type`) VALUES
(1, 'No'),
(2, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'Opened'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `type`) VALUES
(1, 'Opened'),
(2, 'Active'),
(3, 'In progress'),
(4, 'On hold'),
(5, 'Delayed'),
(6, 'Resolved'),
(7, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `tenant_id` int(11) NOT NULL,
  `tenant_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`tenant_id`, `tenant_name`) VALUES
(1, 'Halifax'),
(2, 'HSBC'),
(3, 'Virgin Media Mobile'),
(4, 'Tesco Mobile'),
(5, 'Barclays'),
(6, 'NatWest'),
(7, 'Lloyds Bank'),
(8, 'Three UK'),
(9, 'O2'),
(10, 'Vodafone');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_accounts_department` (`department_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_complaint_type` (`complaint_type_id`),
  ADD KEY `idx_complaint_customer` (`customer_id`),
  ADD KEY `idx_complaint_staff` (`staff_id`),
  ADD KEY `idx_complaint_status` (`status_id`),
  ADD KEY `idx_complaint_solved` (`is_solved`);

--
-- Indexes for table `complaint_type`
--
ALTER TABLE `complaint_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_complaint_type_department` (`department_id`);

--
-- Indexes for table `customer_accounts`
--
ALTER TABLE `customer_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer_tenant` (`tenant_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solved_status`
--
ALTER TABLE `solved_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`tenant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaint_type`
--
ALTER TABLE `complaint_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `customer_accounts`
--
ALTER TABLE `customer_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `solved_status`
--
ALTER TABLE `solved_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `tenant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `fk_accounts_department` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `fk_complaint_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer_accounts` (`id`),
  ADD CONSTRAINT `fk_complaint_solved` FOREIGN KEY (`is_solved`) REFERENCES `solved_status` (`id`),
  ADD CONSTRAINT `fk_complaint_staff` FOREIGN KEY (`staff_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `fk_complaint_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `fk_complaint_type` FOREIGN KEY (`complaint_type_id`) REFERENCES `complaint_type` (`id`);

--
-- Constraints for table `complaint_type`
--
ALTER TABLE `complaint_type`
  ADD CONSTRAINT `fk_complaint_type_department` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_accounts`
--
ALTER TABLE `customer_accounts`
  ADD CONSTRAINT `fk_customer_tenant` FOREIGN KEY (`tenant_id`) REFERENCES `tenant` (`tenant_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
