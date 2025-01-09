-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2025 at 09:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `advisor_id` int(11) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `service` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `notified_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `advisor_id`, `phone_number`, `appointment_date`, `appointment_time`, `service`, `details`, `created_at`, `notified_admin`) VALUES
(3, 3, 2, '01235555555', '2025-01-07', '10:47:00', 'Pest Control', 'aea', '2025-01-06 04:45:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `confirmed_appointments`
--

CREATE TABLE `confirmed_appointments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `advisor_id` int(11) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` time DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `notified` tinyint(1) DEFAULT 0,
  `notified_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `confirmed_appointments`
--

INSERT INTO `confirmed_appointments` (`id`, `user_id`, `advisor_id`, `phone_number`, `appointment_date`, `appointment_time`, `service`, `details`, `notified`, `notified_admin`) VALUES
(1, 3, 2, '01233654', '2025-01-07', '01:12:00', 'Soil Management', 'ghgf', 1, 1),
(4, 8, 9, '01236545879', '2025-01-22', '13:05:00', 'Pest Control', 'hello', 1, 1),
(5, 8, 9, '01236545879', '2025-01-13', '17:59:00', 'Irrigation Planning', 'flight', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `user_type`) VALUES
(1, 'samiul', 'samiul@gmail.com', 'samiul', 'admin'),
(2, 'islam', 'isam@gmail.com', 'islam', 'advisor'),
(3, 'saif', 'saif@gmail.com', 'saif', 'farmer'),
(8, 'tanzib1', 'tanzib@gmail.com', 'tanzib1', 'farmer'),
(9, 'ahamad1', 'ahamad@gmail.com', 'ahamad1', 'advisor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `advisor_id` (`advisor_id`);

--
-- Indexes for table `confirmed_appointments`
--
ALTER TABLE `confirmed_appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `advisor_id` (`advisor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`advisor_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `confirmed_appointments`
--
ALTER TABLE `confirmed_appointments`
  ADD CONSTRAINT `confirmed_appointments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `confirmed_appointments_ibfk_2` FOREIGN KEY (`advisor_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
