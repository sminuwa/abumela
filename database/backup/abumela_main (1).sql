-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 10, 2019 at 12:44 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abumela_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `json_logs`
--

CREATE TABLE `json_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'delete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`id`, `title`, `reference`, `status`, `date`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'ASDFAS', 'ASDF', 'out', '2019-22-10 00:00:00', 1, '2019-10-09 08:29:52', '2019-10-09 20:30:29');

-- --------------------------------------------------------

--
-- Table structure for table `mails_details`
--

CREATE TABLE `mails_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `mail_id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `received_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forwarded_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mails_details`
--

INSERT INTO `mails_details` (`id`, `mail_id`, `comment`, `received_from`, `forwarded_to`, `sender_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'asdfa', 'asdf', 'asdf', 1, '2019-10-09 20:35:48', '2019-10-09 20:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `mails_documents`
--

CREATE TABLE `mails_documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mails_documents`
--

INSERT INTO `mails_documents` (`id`, `name`, `mail_id`, `created_at`, `updated_at`) VALUES
(1, '1570656627_Design 2-100.jpg', 1, '2019-10-09 20:30:29', '2019-10-09 20:30:29');

-- --------------------------------------------------------

--
-- Table structure for table `mails_documents_temp`
--

CREATE TABLE `mails_documents_temp` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mails_documents_temp`
--

INSERT INTO `mails_documents_temp` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1570656627_Design 2-100.jpg', 1, '2019-10-09 20:30:27', '2019-10-09 20:30:27');

-- --------------------------------------------------------

--
-- Table structure for table `mails_to_print`
--

CREATE TABLE `mails_to_print` (
  `id` int(10) UNSIGNED NOT NULL,
  `mail_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2019_06_26_185855_create_users', 1),
(2, '2019_06_27_064840_create_users_roles', 1),
(3, '2019_06_27_090838_create_mails', 1),
(4, '2019_06_29_110835_create_mails_documents', 1),
(5, '2019_06_29_111618_create_mails_details', 1),
(6, '2019_06_29_114508_create_json_logs', 1),
(7, '2019_06_29_114808_create_senders', 1),
(8, '2019_07_06_162548_create_mails_documents_temp', 1),
(9, '2019_07_24_185723_create_logs_table', 1),
(10, '2019_09_22_201520_create_mails_to_print_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `senders`
--

CREATE TABLE `senders` (
  `id` int(10) UNSIGNED NOT NULL,
  `mail_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `senders`
--

INSERT INTO `senders` (`id`, `mail_id`, `name`, `department`, `created_at`, `updated_at`) VALUES
(1, 1, 'adfad', 'adfa', '2019-10-09 20:30:29', '2019-10-09 20:30:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `created_by` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `phone`, `email`, `username`, `password`, `type`, `created_by`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Yahaya Mohammad', '1234567890', 'bursar@abu.edu.ng', 'Bursary', '$2y$10$L17zPpvl5zUYyti/NFPYTuqN7uhE3jphf2j4h.DW58S3tCDE7jume', 'admin', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `json_logs`
--
ALTER TABLE `json_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mails_created_by_foreign` (`created_by`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `mails_details`
--
ALTER TABLE `mails_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mails_details_mail_id_foreign` (`mail_id`);

--
-- Indexes for table `mails_documents`
--
ALTER TABLE `mails_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mails_documents_mail_id_foreign` (`mail_id`);

--
-- Indexes for table `mails_documents_temp`
--
ALTER TABLE `mails_documents_temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mails_documents_temp_user_id_foreign` (`user_id`);

--
-- Indexes for table `mails_to_print`
--
ALTER TABLE `mails_to_print`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mails_to_print_mail_id_foreign` (`mail_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `senders`
--
ALTER TABLE `senders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `senders_mail_id_foreign` (`mail_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_roles_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `json_logs`
--
ALTER TABLE `json_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mails_details`
--
ALTER TABLE `mails_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mails_documents`
--
ALTER TABLE `mails_documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mails_documents_temp`
--
ALTER TABLE `mails_documents_temp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mails_to_print`
--
ALTER TABLE `mails_to_print`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `senders`
--
ALTER TABLE `senders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `mails`
--
ALTER TABLE `mails`
  ADD CONSTRAINT `mails_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `mails_details`
--
ALTER TABLE `mails_details`
  ADD CONSTRAINT `mails_details_mail_id_foreign` FOREIGN KEY (`mail_id`) REFERENCES `mails` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mails_documents`
--
ALTER TABLE `mails_documents`
  ADD CONSTRAINT `mails_documents_mail_id_foreign` FOREIGN KEY (`mail_id`) REFERENCES `mails` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mails_documents_temp`
--
ALTER TABLE `mails_documents_temp`
  ADD CONSTRAINT `mails_documents_temp_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `mails_to_print`
--
ALTER TABLE `mails_to_print`
  ADD CONSTRAINT `mails_to_print_mail_id_foreign` FOREIGN KEY (`mail_id`) REFERENCES `mails` (`id`);

--
-- Constraints for table `senders`
--
ALTER TABLE `senders`
  ADD CONSTRAINT `senders_mail_id_foreign` FOREIGN KEY (`mail_id`) REFERENCES `mails` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
