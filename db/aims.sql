-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2024 at 10:47 PM
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
-- Database: `aims`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parameter_ph_air`
--

CREATE TABLE `parameter_ph_air` (
  `id_paramater_ph_air` int(11) NOT NULL,
  `max_ph_air` double NOT NULL,
  `min_ph_air` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parameter_ppm_air`
--

CREATE TABLE `parameter_ppm_air` (
  `id_paramater_ppm_air` int(11) NOT NULL,
  `max_ppm_air` double NOT NULL,
  `min_ppm_air` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parameter_suhu`
--

CREATE TABLE `parameter_suhu` (
  `id_paramater_suhu` int(11) NOT NULL,
  `max_suhu` double NOT NULL,
  `min_suhu` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parameter_suhu`
--

INSERT INTO `parameter_suhu` (`id_paramater_suhu`, `max_suhu`, `min_suhu`) VALUES
(1, 25, 9);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ph_air`
--

CREATE TABLE `ph_air` (
  `id_ph` int(11) NOT NULL,
  `ph_air` double NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ph_air`
--

INSERT INTO `ph_air` (`id_ph`, `ph_air`, `tanggal`, `waktu`) VALUES
(1, 7, '2024-04-11', '21:03:30'),
(2, 7, '2024-04-11', '21:03:30'),
(3, 7.1, '2024-04-11', '21:04:30'),
(4, 7.2, '2024-04-11', '21:05:30'),
(5, 7.3, '2024-04-11', '21:06:30'),
(6, 7.4, '2024-04-11', '21:07:30'),
(7, 7.5, '2024-04-11', '21:08:30'),
(8, 7.6, '2024-04-11', '21:09:30'),
(9, 7.7, '2024-04-11', '21:10:30'),
(10, 7.8, '2024-04-11', '21:11:30'),
(11, 7.9, '2024-04-11', '21:12:30'),
(12, 8, '2024-04-11', '21:13:30'),
(13, 8.1, '2024-04-11', '21:14:30'),
(14, 8.2, '2024-04-11', '21:15:30'),
(15, 8.3, '2024-04-11', '21:16:30'),
(16, 8.4, '2024-04-11', '21:17:30'),
(17, 8.5, '2024-04-11', '21:18:30'),
(18, 8.6, '2024-04-11', '21:19:30'),
(19, 8.7, '2024-04-11', '21:20:30'),
(20, 8.8, '2024-04-11', '21:21:30'),
(21, 8.9, '2024-04-11', '21:22:30');

-- --------------------------------------------------------

--
-- Table structure for table `ppm_air`
--

CREATE TABLE `ppm_air` (
  `id_ppm` int(11) NOT NULL,
  `ppm_air` double NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ppm_air`
--

INSERT INTO `ppm_air` (`id_ppm`, `ppm_air`, `tanggal`, `waktu`) VALUES
(1, 10.5, '2024-04-11', '08:00:00'),
(2, 11, '2024-04-11', '08:05:00'),
(3, 11.5, '2024-04-11', '08:10:00'),
(4, 12, '2024-04-11', '08:15:00'),
(5, 12.5, '2024-04-11', '08:20:00'),
(6, 13, '2024-04-11', '08:25:00'),
(7, 13.5, '2024-04-11', '08:30:00'),
(8, 14, '2024-04-11', '08:35:00'),
(9, 14.5, '2024-04-11', '08:40:00'),
(10, 15, '2024-04-11', '08:45:00'),
(11, 15.5, '2024-04-11', '08:50:00'),
(12, 16, '2024-04-11', '08:55:00'),
(13, 16.5, '2024-04-11', '09:00:00'),
(14, 17, '2024-04-11', '09:05:00'),
(15, 17.5, '2024-04-11', '09:10:00'),
(16, 18, '2024-04-11', '09:15:00'),
(17, 18.5, '2024-04-11', '09:20:00'),
(18, 19, '2024-04-11', '09:25:00'),
(19, 19.5, '2024-04-11', '09:30:00'),
(20, 20, '2024-04-11', '09:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `suhu`
--

CREATE TABLE `suhu` (
  `id_suhu` int(11) NOT NULL,
  `suhu` double NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suhu`
--

INSERT INTO `suhu` (`id_suhu`, `suhu`, `tanggal`, `waktu`) VALUES
(1, 50, '2024-10-04', '02:07:00'),
(2, 24, '2024-04-12', '14:07:00'),
(3, 23, '2024-04-13', '14:09:19'),
(4, 23, '2024-04-13', '14:09:19'),
(5, 24, '2024-04-13', '14:10:19'),
(6, 22, '2024-04-13', '14:11:19'),
(7, 25, '2024-04-13', '14:12:19'),
(8, 21, '2024-04-13', '14:13:19'),
(9, 26, '2024-04-13', '14:14:19'),
(10, 20, '2024-04-13', '14:15:19'),
(11, 27, '2024-04-13', '14:16:19'),
(12, 19, '2024-04-13', '14:17:19'),
(13, 28, '2024-04-13', '14:18:19'),
(14, 18, '2024-04-13', '14:19:19'),
(15, 29, '2024-04-13', '14:20:19'),
(16, 17, '2024-04-13', '14:21:19'),
(17, 30, '2024-04-13', '14:22:19'),
(18, 16, '2024-04-13', '14:23:19'),
(19, 31, '2024-04-13', '14:24:19'),
(20, 15, '2024-04-13', '14:25:19'),
(21, 32, '2024-04-13', '14:26:19'),
(22, 14, '2024-04-13', '14:27:19'),
(23, 46, '2024-04-13', '14:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parameter_ph_air`
--
ALTER TABLE `parameter_ph_air`
  ADD PRIMARY KEY (`id_paramater_ph_air`);

--
-- Indexes for table `parameter_ppm_air`
--
ALTER TABLE `parameter_ppm_air`
  ADD PRIMARY KEY (`id_paramater_ppm_air`);

--
-- Indexes for table `parameter_suhu`
--
ALTER TABLE `parameter_suhu`
  ADD PRIMARY KEY (`id_paramater_suhu`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ph_air`
--
ALTER TABLE `ph_air`
  ADD PRIMARY KEY (`id_ph`);

--
-- Indexes for table `ppm_air`
--
ALTER TABLE `ppm_air`
  ADD PRIMARY KEY (`id_ppm`);

--
-- Indexes for table `suhu`
--
ALTER TABLE `suhu`
  ADD PRIMARY KEY (`id_suhu`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parameter_ph_air`
--
ALTER TABLE `parameter_ph_air`
  MODIFY `id_paramater_ph_air` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parameter_suhu`
--
ALTER TABLE `parameter_suhu`
  MODIFY `id_paramater_suhu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ph_air`
--
ALTER TABLE `ph_air`
  MODIFY `id_ph` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `suhu`
--
ALTER TABLE `suhu`
  MODIFY `id_suhu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
