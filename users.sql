-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Dec 05, 2022 at 01:43 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendanceapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `images` blob DEFAULT NULL,
  `staff_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phonenumber` int(11) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `date_checkIn` varchar(255) DEFAULT NULL,
  `time_checkIn` varchar(255) DEFAULT NULL,
  `location_checkIn` varchar(255) DEFAULT NULL,
  `time_checkOut` varchar(255) DEFAULT NULL,
  `location_checkOut` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `images`, `staff_id`, `name`, `email`, `gender`, `department`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `address`, `phonenumber`, `company_name`, `date_checkIn`, `time_checkIn`, `location_checkIn`, `time_checkOut`, `location_checkOut`, `role`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, NULL, 'test123', 'Jane Doe', 'janedoe@gmail.com', 'female', '3', NULL, '$2y$10$QGXopz8eAweHK/1eFxzmy.4k55l0smSeCySYN09MD16hkwtxxV8li', NULL, NULL, NULL, NULL, 123456789, 'AR', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2022-12-03 06:37:17', '2022-12-03 06:37:17'),
(2, NULL, 'azmin123', 'Azmin Ali', 'azmin@gmail.com', 'Male', '3', NULL, '$2y$10$OnKikOXJ65Vgn1tSMumr5e1Nmw/92hV0BYJjGvEvFPUuveV/5a2di', NULL, NULL, NULL, 'KL', 134566789, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2022-12-03 22:13:38', '2022-12-03 22:13:38'),
(3, NULL, 'done123', 'Done Jones', 'donejones@gmail.com', 'Male', '3', NULL, '$2y$10$kz9a9g6OhJf5juF2ARWC2.mEJGFO5M9dYTbNCIbethXx.cB7KJy66', NULL, NULL, NULL, 'cali', 134413456, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2022-12-05 01:00:16', '2022-12-05 01:00:16'),
(4, NULL, 'test333', 'Jane Doe 3', 'janedoe3@gmail.com', 'female', '3', NULL, '$2y$10$jMF/dlL6zjYJB.EXf82h/eRrwhG59kc5EVE.RtflZKM/gMrAKUTFG', NULL, NULL, NULL, NULL, 134566789, 'AR', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2022-12-05 04:40:39', '2022-12-05 04:40:39'),
(5, NULL, 'test444', 'Jane Doe 4', 'janedoe4@gmail.com', 'female', '3', NULL, '$2y$10$M2fQYpTptEjddwJn9WM52O17D8vVXyInOviBuktrqnzqUFiJkgo2W', NULL, NULL, NULL, NULL, 134566780, 'AR', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '2022-12-05 04:40:57', '2022-12-05 04:40:57');


-- Data
INSERT INTO `users` (`id`, `images`, `staff_id`, `name`, `email`, `genders_id`, `department`, `password`, `address`, `phonenumber`, `company_name`, `created_at`, `updated_at`) VALUES
(1, NULL, 'test123', 'Jane Doe', 'janedoe@gmail.com', 2, '3', '$2y$10$OnKikOXJ65Vgn1tSMumr5e1Nmw/92hV0BYJjGvEvFPUuveV/5a2di', 0123456789, 'AR', '2022-12-03 06:37:17', '2022-12-03 06:37:17'),
(2, NULL, 'azmin123', 'Azmin Ali', 'azmin@gmail.com', 1, '3', NULL, '$2y$10$OnKikOXJ65Vgn1tSMumr5e1Nmw/92hV0BYJjGvEvFPUuveV/5a2di', 'KL', 134566789, 'AR', NULL, NULL, NULL, '2022-12-03 22:13:38', '2022-12-03 22:13:38'),
(3, NULL, 'done123', 'Done Jones', 'donejones@gmail.com', 1, '3', NULL, '$2y$10$kz9a9g6OhJf5juF2ARWC2.mEJGFO5M9dYTbNCIbethXx.cB7KJy66', NULL, NULL, NULL, 'cali', 134413456, 'EZ', NULL, NULL, NULL, '2022-12-05 01:00:16', '2022-12-05 01:00:16'),
(4, NULL, 'test333', 'Jane Doe 3', 'janedoe3@gmail.com', 2, '3', NULL, '$2y$10$jMF/dlL6zjYJB.EXf82h/eRrwhG59kc5EVE.RtflZKM/gMrAKUTFG', NULL, NULL, NULL, NULL, 134566789, 'AR', NULL, NULL, NULL, '2022-12-05 04:40:39', '2022-12-05 04:40:39'),
(5, NULL, 'test444', 'Jane Doe 4', 'janedoe4@gmail.com', 2, '3', NULL, '$2y$10$M2fQYpTptEjddwJn9WM52O17D8vVXyInOviBuktrqnzqUFiJkgo2W', NULL, NULL, NULL, NULL, 134566780, 'AR', NULL, NULL, NULL, '2022-12-05 04:40:57', '2022-12-05 04:40:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_staff_id_unique` (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
