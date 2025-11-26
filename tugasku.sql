-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 26, 2025 at 07:44 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasku`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_09_28_141231_create_users_table', 1),
(2, '2025_09_28_142008_create_tugas_kuliah_table', 2),
(3, '2025_09_28_150711_create_sessions_table', 3),
(4, '2025_09_28_150908_create_sessions_table', 4),
(5, '2025_09_30_124834_create_pengumuman_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(10) NOT NULL,
  `used_by` bigint UNSIGNED DEFAULT NULL,
  `status` enum('unused','used') DEFAULT 'unused',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`id`, `code`, `used_by`, `status`, `created_at`, `updated_at`) VALUES
(1, '4111DD', NULL, 'unused', '2025-11-25 23:09:04', '2025-11-25 23:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul`, `konten`, `created_at`) VALUES
(1, 'Update App', 'Penyesuaian UI/UX', '2025-10-01 09:23:37'),
(2, 'Apalah', 'Hidup Jokowi!', '2025-10-01 21:04:37'),
(3, 'Makan Siang', 'MBG bersama erpan1140', '2025-10-02 09:49:11'),
(4, 'News Penting', 'Dimas Kata Yayan Maling Ayam Tetangga', '2025-11-25 23:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` longtext NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('kXfri2e9Kl65DN4Qbb7FAnIheoj5IpqeMA6TtLzk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibTNDRDBwaWFjNEpWQXFnQ012bUpLSkRnZmxHbEo0VFM2WHdoUnNNUSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1764142433);

-- --------------------------------------------------------

--
-- Table structure for table `tugas_kuliah`
--

CREATE TABLE `tugas_kuliah` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text,
  `deadline` datetime DEFAULT NULL,
  `status` enum('pending','selesai') NOT NULL DEFAULT 'pending',
  `prioritas` varchar(255) DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tugas_kuliah`
--

INSERT INTO `tugas_kuliah` (`id`, `judul`, `deskripsi`, `deadline`, `status`, `prioritas`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Ceramah Gus Dims', 'Ceramah', '2000-11-12 00:00:00', 'pending', 'sedang', 3, '2025-11-25 21:11:06', '2025-11-25 21:11:06'),
(2, 'Yayan', 'p', '2020-10-10 00:00:00', 'pending', 'tinggi', 3, '2025-11-25 21:12:48', '2025-11-25 21:12:48'),
(3, 'Update App', 'app tugasku', '2012-11-12 00:00:00', 'pending', 'sedang', 3, '2025-11-25 21:22:31', '2025-11-25 21:22:31'),
(4, 'Uus Maverick', 'kelas mole', '2025-02-12 00:00:00', 'pending', 'rendah', 3, '2025-11-25 21:32:54', '2025-11-25 21:32:54'),
(5, 'asdas', 'asdasd', '2222-11-12 00:00:00', 'pending', 'tinggi', 3, '2025-11-25 21:40:00', '2025-11-25 21:40:00'),
(6, 'sadasd', 'asdasd', '1111-11-11 00:00:00', 'pending', 'sedang', 3, '2025-11-25 21:44:25', '2025-11-25 21:44:25'),
(7, 'asdasd', 'asdasdasd', '2222-02-22 00:00:00', 'pending', 'tinggi', 3, '2025-11-25 21:45:19', '2025-11-25 21:45:19'),
(8, 'asdasd', 'asdasd', '3333-03-31 00:00:00', 'pending', 'rendah', 3, '2025-11-25 22:16:10', '2025-11-25 22:16:10'),
(9, 'asdas', 'asdasdasdhgashgfgajfgjhagsdhjabsjc basncbjhasbcjhabschjabsc\r\nashdkjahsdkj\r\nasdkjnaskjdnasjdn', '2020-11-10 00:00:00', 'pending', 'tinggi', 3, '2025-11-25 22:37:27', '2025-11-25 22:37:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `twitter_id` varchar(255) DEFAULT NULL,
  `role` enum('user','admin','superadmin') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `google_id`, `twitter_id`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Firdaus', 'uus@example.com', '$2y$12$34BkkdfNvWKv5btCPu2LNOGrIETDUdkNsM7Nni2tPVAoNOXewELWm', NULL, NULL, 'superadmin', NULL, '2025-10-01 05:30:42', '2025-10-01 05:30:42'),
(3, 'Zame Kura', 'kurazame8@gmail.com', '$2y$12$6gQxxvLaxXiFNNZmfWZoyeNidAqgTpt1VTM3TJF/MyqZdLvuTCOaS', '100139091264384386599', NULL, 'user', NULL, '2025-11-25 21:10:11', '2025-11-25 21:10:11'),
(4, 'admin', 'admin@example.com', '$2y$12$FXyWDKoGhkNmBBXlK9QsPO33EqlDMUg0eyL6ObI4CccZh6BRwPEWq', NULL, NULL, 'superadmin', NULL, '2025-11-25 23:06:04', '2025-11-25 23:06:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_unique` (`code`),
  ADD KEY `used_by` (`used_by`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tugas_kuliah`
--
ALTER TABLE `tugas_kuliah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tugas_kuliah_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tugas_kuliah`
--
ALTER TABLE `tugas_kuliah`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `otps`
--
ALTER TABLE `otps`
  ADD CONSTRAINT `otps_used_by_foreign` FOREIGN KEY (`used_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tugas_kuliah`
--
ALTER TABLE `tugas_kuliah`
  ADD CONSTRAINT `tugas_kuliah_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
