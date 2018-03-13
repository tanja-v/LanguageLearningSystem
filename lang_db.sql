-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2018 at 10:46 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lang_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `language_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language_name`, `created_at`, `updated_at`) VALUES
(1, 'French', '2018-03-03 09:10:14', '2018-03-03 09:10:14'),
(4, 'German', '2018-03-03 09:45:47', '2018-03-03 09:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(10) UNSIGNED NOT NULL,
  `lesson_number` int(11) NOT NULL,
  `lesson_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `lesson_number`, `lesson_name`, `language_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hello!', 1, '2018-03-03 18:55:21', '2018-03-03 18:55:21'),
(3, 2, 'Food', 1, '2018-03-13 19:29:44', '2018-03-13 19:29:44'),
(4, 1, 'Basics', 4, '2018-03-13 19:51:42', '2018-03-13 19:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_01_162625_create_languages_table', 2),
(4, '2018_03_01_163054_create_lessons_table', 3),
(5, '2018_03_01_163835_create_words_table', 3),
(6, '2018_03_01_171417_create_target_languages_table', 3),
(7, '2018_03_01_174912_create_words_table', 4),
(8, '2018_03_01_175351_create_user_points_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `target_languages`
--

CREATE TABLE `target_languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `target_languages`
--

INSERT INTO `target_languages` (`id`, `language_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2018-03-10 15:57:24', '2018-03-10 15:57:24'),
(4, 4, 2, '2018-03-10 16:47:29', '2018-03-10 16:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('admin','registered') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'registered',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@email.com', '$2y$10$0SX1qyD4Nsji.Fxx.EAHG.ORDDGWMvACkQhpDYLYBE7DNH5NV0SJC', 'admin', 'Zg6qpQWmDHLJpINUNzYMQKt7Daz4QRnUFtx38vPZ7JjwdKJ7gtDBsbX8JyDz', '2018-02-24 12:15:33', '2018-02-24 12:15:33'),
(2, 'Tanja', 'tanja@email.com', '$2y$10$EdQ9iVRnmxacaPhvOuIwo.5v0tmYhv3nBaxpfuf/GYpOc/iTPpnsa', 'registered', 'YmRaR1WFTS5IeqsIU4z7A7tjI2bzunNx6gktjTeNGiAeEUNpepunfBJH2bhG', '2018-02-24 17:43:08', '2018-02-24 17:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_points`
--

CREATE TABLE `user_points` (
  `id` int(10) UNSIGNED NOT NULL,
  `word_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `points` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_points`
--

INSERT INTO `user_points` (`id`, `word_id`, `user_id`, `points`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 9, '2018-03-11 10:41:30', '2018-03-13 18:40:33'),
(3, 3, 2, 0, '2018-03-11 18:25:32', '2018-03-13 18:40:55'),
(4, 4, 2, 0, '2018-03-13 18:23:48', '2018-03-13 18:48:49'),
(5, 6, 2, 0, '2018-03-13 18:27:52', '2018-03-13 18:27:52'),
(6, 7, 2, 0, '2018-03-13 18:32:08', '2018-03-13 18:32:08'),
(7, 8, 2, 0, '2018-03-13 18:33:29', '2018-03-13 18:33:29'),
(8, 11, 2, 0, '2018-03-13 18:36:37', '2018-03-13 18:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `id` int(10) UNSIGNED NOT NULL,
  `word` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eng_translation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `lesson_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`id`, `word`, `eng_translation`, `language_id`, `lesson_id`, `created_at`, `updated_at`) VALUES
(2, 'Salut', 'Hello', 1, 1, '2018-03-04 10:56:52', '2018-03-04 10:56:52'),
(3, 'Bonjour', 'Good morning', 1, 1, '2018-03-04 10:57:43', '2018-03-04 10:57:43'),
(4, 'Bonsoir', 'Good evening', 1, 1, '2018-03-12 21:03:59', '2018-03-12 21:03:59'),
(6, 'Pardon', 'Excuse me', 1, 1, '2018-03-12 21:05:04', '2018-03-12 21:05:04'),
(7, 'à plus tard', 'See you later', 1, 1, '2018-03-12 21:05:38', '2018-03-12 21:05:38'),
(8, 'à tout à l\'heure', 'See you soon', 1, 1, '2018-03-12 21:06:11', '2018-03-12 21:06:11'),
(9, 'à bientôt', 'See you soon', 1, 1, '2018-03-12 21:06:30', '2018-03-12 21:06:30'),
(11, 'à demain', 'See you tomorrow', 1, 1, '2018-03-12 21:06:59', '2018-03-12 21:06:59'),
(14, 'la nourriture', 'food', 1, 3, '2018-03-13 19:30:02', '2018-03-13 19:30:02'),
(15, 'manger', 'to eat', 1, 3, '2018-03-13 19:30:16', '2018-03-13 19:30:16'),
(16, 'le repas', 'meal', 1, 3, '2018-03-13 19:30:45', '2018-03-13 19:30:45'),
(17, 'la soupe', 'soup', 1, 3, '2018-03-13 19:31:03', '2018-03-13 19:31:03'),
(18, 'le plat principal', 'main course', 1, 3, '2018-03-13 19:31:20', '2018-03-13 19:31:20'),
(20, 'le pain', 'bread', 1, 3, '2018-03-13 19:32:03', '2018-03-13 19:32:03'),
(21, 'le riz', 'rice', 1, 3, '2018-03-13 19:32:16', '2018-03-13 19:32:16'),
(22, 'Guten Morgen', 'Good morning', 4, 4, '2018-03-13 19:55:10', '2018-03-13 19:55:10'),
(23, 'Guten Tag', 'Good day', 4, 4, '2018-03-13 19:55:31', '2018-03-13 19:55:31'),
(24, 'Guten Abend', 'Good evening', 4, 4, '2018-03-13 19:55:44', '2018-03-13 19:55:44'),
(25, 'Gute Nacht', 'Good night', 4, 4, '2018-03-13 19:56:00', '2018-03-13 19:56:00'),
(26, 'Auf Wiedersehen', 'Goodbye', 4, 4, '2018-03-13 19:56:13', '2018-03-13 19:56:13'),
(27, 'Tschüs', 'Bye', 4, 4, '2018-03-13 19:56:30', '2018-03-13 19:56:30'),
(28, 'Gehen wir', 'Let\'s go', 4, 4, '2018-03-13 19:56:42', '2018-03-13 19:56:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_language_id_foreign` (`language_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `target_languages`
--
ALTER TABLE `target_languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `target_languages_language_id_foreign` (`language_id`),
  ADD KEY `target_languages_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_points`
--
ALTER TABLE `user_points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_points_user_id_foreign` (`user_id`),
  ADD KEY `user_points_word_id_foreign` (`word_id`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id`),
  ADD KEY `words_language_id_foreign` (`language_id`),
  ADD KEY `words_lesson_id_foreign` (`lesson_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `target_languages`
--
ALTER TABLE `target_languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_points`
--
ALTER TABLE `user_points`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `target_languages`
--
ALTER TABLE `target_languages`
  ADD CONSTRAINT `target_languages_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `target_languages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_points`
--
ALTER TABLE `user_points`
  ADD CONSTRAINT `user_points_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_points_word_id_foreign` FOREIGN KEY (`word_id`) REFERENCES `words` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `words`
--
ALTER TABLE `words`
  ADD CONSTRAINT `words_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `words_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
