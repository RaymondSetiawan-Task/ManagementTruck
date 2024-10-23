-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 23, 2024 at 03:33 PM
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
-- Database: `dbtruck`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driver_id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp_sim` date NOT NULL,
  `experience_years` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`driver_id`, `name`, `license_number`, `exp_sim`, `experience_years`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'B1234XYZ', '2024-12-25', 5, '2024-10-23 15:32:12', NULL),
(2, 'Thomas', 'K6789ABC', '2025-01-14', 3, '2024-10-23 15:32:12', NULL),
(3, 'Alpha', 'K6789BDS', '2024-10-31', 4, '2024-10-23 15:32:12', NULL),
(4, 'Jane Smith', 'L1234XYZ', '2024-11-20', 6, '2024-10-23 15:32:12', NULL),
(5, 'Bob Brown', 'M5678ABC', '2024-10-15', 2, '2024-10-23 15:32:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_22_030958_trucks', 1),
(5, '2024_10_22_031027_drivers', 1),
(6, '2024_10_22_031036_trips', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('oW8Hx1NGHuepZndN5eB0neDPewM4mK6Yb4P57eyZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWGpodThoZ0JoalBvTE5uYnZDVmFqdWQ4WXJlOW1ab0tya1BvaG11ciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90cmlwcz9wYWdlPTMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1729697546);

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `trip_id` int UNSIGNED NOT NULL,
  `truck_id` int UNSIGNED NOT NULL,
  `driver_id` int UNSIGNED NOT NULL,
  `start_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distance` decimal(7,2) NOT NULL,
  `trip_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`trip_id`, `truck_id`, `driver_id`, `start_location`, `end_location`, `distance`, `trip_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Location A', 'Location B', '120.00', '2024-01-01', '2024-10-23 15:32:12', NULL),
(2, 3, 3, 'Location C', 'Location D', '100.00', '2024-10-27', '2024-10-23 15:32:12', NULL),
(3, 2, 2, 'Location E', 'Location F', '200.00', '2024-10-23', '2024-10-23 15:32:12', NULL),
(4, 3, 1, 'Location M', 'Location N', '210.00', '2024-05-15', '2024-10-23 15:32:12', NULL),
(5, 4, 3, 'Location EE', 'Location FF', '140.00', '2024-10-20', '2024-10-23 15:32:12', NULL),
(6, 2, 3, 'Location GG', 'Location HH', '130.00', '2024-10-22', '2024-10-23 15:32:12', NULL),
(7, 3, 3, 'Location II', 'Location JJ', '150.00', '2024-10-23', '2024-10-23 15:32:12', NULL),
(8, 5, 2, 'Location O', 'Location P', '220.00', '2024-10-30', '2024-10-23 15:32:12', NULL),
(9, 3, 2, 'Location Q', 'Location R', '160.00', '2024-10-15', '2024-10-23 15:32:12', NULL),
(10, 1, 2, 'Location S', 'Location T', '130.00', '2024-10-20', '2024-10-23 15:32:12', NULL),
(11, 1, 3, 'Location 1', 'Location 2', '110.00', '2024-10-05', '2024-10-23 15:32:12', NULL),
(12, 2, 3, 'Location 3', 'Location 4', '125.00', '2024-10-10', '2024-10-23 15:32:12', NULL),
(13, 4, 1, 'Location G', 'Location H', '150.00', '2024-10-25', '2024-10-23 15:32:12', NULL),
(14, 5, 1, 'Location I', 'Location J', '180.00', '2024-10-26', '2024-10-23 15:32:12', NULL),
(15, 2, 1, 'Location K', 'Location L', '90.00', '2024-04-22', '2024-10-23 15:32:12', NULL),
(16, 4, 5, 'Location KK', 'Location LL', '160.00', '2024-10-24', '2024-10-23 15:32:12', NULL),
(17, 3, 3, 'Location 5', 'Location 6', '140.00', '2024-10-12', '2024-10-23 15:32:12', NULL),
(18, 4, 3, 'Location 7', 'Location 8', '155.00', '2024-10-18', '2024-10-23 15:32:12', NULL),
(19, 3, 4, 'Location Y', 'Location Z', '250.00', '2024-09-20', '2024-10-23 15:32:12', NULL),
(20, 2, 4, 'Location AA', 'Location BB', '140.00', '2024-10-01', '2024-10-23 15:32:12', NULL),
(21, 5, 4, 'Location CC', 'Location DD', '90.00', '2024-10-15', '2024-10-23 15:32:12', NULL),
(22, 1, 2, 'Location U', 'Location V', '170.00', '2024-09-05', '2024-10-23 15:32:12', NULL),
(23, 5, 2, 'Location W', 'Location X', '180.00', '2024-10-28', '2024-10-23 15:32:12', NULL),
(24, 5, 3, 'Location 9', 'Location 10', '160.00', '2024-10-21', '2024-10-23 15:32:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trucks`
--

CREATE TABLE `trucks` (
  `truck_id` int UNSIGNED NOT NULL,
  `license_plate` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` decimal(7,2) NOT NULL,
  `exp_kir` date NOT NULL,
  `status` enum('Available','On Trip') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trucks`
--

INSERT INTO `trucks` (`truck_id`, `license_plate`, `model`, `capacity`, `exp_kir`, `status`, `created_at`, `updated_at`) VALUES
(1, 'B 6670 CD', 'Isuzu', '60.00', '2024-11-24', 'Available', '2024-10-23 15:32:12', NULL),
(2, 'B 6870 AD', 'Honda', '60.00', '2024-10-27', 'Available', '2024-10-23 15:32:12', NULL),
(3, 'B 6980 BD', 'Suzuki', '60.00', '2025-01-29', 'On Trip', '2024-10-23 15:32:12', NULL),
(4, 'B 7070 ED', 'Mitsubishi', '75.00', '2024-10-27', 'Available', '2024-10-23 15:32:12', NULL),
(5, 'B 7170 FD', 'Toyota', '80.00', '2024-10-10', 'On Trip', '2024-10-23 15:32:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driver_id`),
  ADD KEY `drivers_driver_id_index` (`driver_id`),
  ADD KEY `drivers_name_index` (`name`),
  ADD KEY `drivers_license_number_index` (`license_number`),
  ADD KEY `drivers_exp_sim_index` (`exp_sim`),
  ADD KEY `drivers_experience_years_index` (`experience_years`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`trip_id`),
  ADD KEY `trip_truck_id_foreign` (`truck_id`),
  ADD KEY `trip_driver_id_foreign` (`driver_id`),
  ADD KEY `trip_trip_id_index` (`trip_id`),
  ADD KEY `trip_start_location_index` (`start_location`),
  ADD KEY `trip_end_location_index` (`end_location`),
  ADD KEY `trip_distance_index` (`distance`),
  ADD KEY `trip_trip_date_index` (`trip_date`);

--
-- Indexes for table `trucks`
--
ALTER TABLE `trucks`
  ADD PRIMARY KEY (`truck_id`),
  ADD KEY `trucks_truck_id_index` (`truck_id`),
  ADD KEY `trucks_license_plate_index` (`license_plate`),
  ADD KEY `trucks_model_index` (`model`),
  ADD KEY `trucks_capacity_index` (`capacity`),
  ADD KEY `trucks_exp_kir_index` (`exp_kir`),
  ADD KEY `trucks_status_index` (`status`);

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
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driver_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `trip_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `trucks`
--
ALTER TABLE `trucks`
  MODIFY `truck_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trip`
--
ALTER TABLE `trip`
  ADD CONSTRAINT `trip_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`driver_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `trip_truck_id_foreign` FOREIGN KEY (`truck_id`) REFERENCES `trucks` (`truck_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
