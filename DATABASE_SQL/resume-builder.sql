-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2025 at 10:02 PM
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
-- Database: `resume-builder`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `resume_id` bigint(20) UNSIGNED NOT NULL,
  `institution` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `field_of_study` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `gpa` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_18_200522_create_resumes_table', 2),
(9, '2025_12_18_200523_create_educations_table', 3),
(10, '2025_12_18_200523_create_work_experiences_table', 3),
(11, '2025_12_18_200524_create_resume_templates_table', 3),
(12, '2025_12_18_200524_create_skills_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE `resumes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `template` varchar(255) NOT NULL DEFAULT 'Modern Blue',
  `title` varchar(255) NOT NULL DEFAULT 'My Resume',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`id`, `user_id`, `full_name`, `email`, `phone`, `location`, `linkedin`, `website`, `summary`, `template`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'Idola Turner', 'ryreruluda@mailinator.com', '+1 (281) 982-7618', 'Dolore autem veritat', 'https://www.roxyta.me', 'https://www.licavi.org.uk', 'Ut deserunt sed numq', 'Elegant Black', 'Eveniet laboris ali', '2025-12-18 15:22:53', '2025-12-18 15:22:53');

-- --------------------------------------------------------

--
-- Table structure for table `resume_templates`
--

CREATE TABLE `resume_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `preview_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resume_templates`
--

INSERT INTO `resume_templates` (`id`, `name`, `preview_image`, `created_at`, `updated_at`) VALUES
(1, 'Modern Blue', NULL, NULL, NULL),
(2, 'Professional Grey', NULL, NULL, NULL),
(3, 'Creative Red', NULL, NULL, NULL),
(4, 'Elegant Black', NULL, NULL, NULL),
(5, 'Minimal White', NULL, NULL, NULL),
(6, 'Colorful Rainbow', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('HGW1EATISaP97CmJLnh63q9dj6wCfA6IUBsBQa9e', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoib1QwSWhPUVc1MGxZQjBsSURjWDZFZTlYSU1KdW4wUmd5NkppV1JVbCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjExOiJyZXN1bWVfZGF0YSI7YTo1OntzOjc6ImNvbnRhY3QiO2E6Njp7czo5OiJmdWxsX25hbWUiO3M6MTI6Ik1hY29uIENhc3RybyI7czo1OiJlbWFpbCI7czoyMjoidG96aXd1akBtYWlsaW5hdG9yLmNvbSI7czo1OiJwaG9uZSI7czoxNzoiKzEgKDczOSkgMjA3LTY3MjkiO3M6ODoibG9jYXRpb24iO3M6MjA6IlN1bnQgYWIgdGVtcG9yaWJ1cyBvIjtzOjg6ImxpbmtlZGluIjtzOjI3OiJodHRwczovL3d3dy5meW51d3VudWhlY2EubWUiO3M6Nzoid2Vic2l0ZSI7czoyODoiaHR0cHM6Ly93d3cuZ3lsb2tlbGVzaXp5Zy5jbSI7fXM6Nzoic3VtbWFyeSI7czoxOToiQWNjdXNhbXVzIHF1YWUgc3VudCI7czoxMToiZXhwZXJpZW5jZXMiO2E6MTp7aTowO2E6Njp7czo3OiJjb21wYW55IjtzOjI1OiJIeWRlIGFuZCBSZXlub2xkcyBUcmFkaW5nIjtzOjg6InBvc2l0aW9uIjtzOjE5OiJFdW0gZWxpdCBsYWJvcmlzIGNvIjtzOjEwOiJzdGFydF9kYXRlIjtzOjc6IjE5NzYtMDkiO3M6ODoiZW5kX2RhdGUiO3M6NzoiMTk3OS0wNCI7czo4OiJsb2NhdGlvbiI7czoxODoiU2l0IHVuZGUgZXQgc2l0IGFsIjtzOjExOiJkZXNjcmlwdGlvbiI7czoyMDoiQXJjaGl0ZWN0byBuaXNpIGluY2kiO319czoxMDoiZWR1Y2F0aW9ucyI7YToxOntpOjA7YTo3OntzOjExOiJpbnN0aXR1dGlvbiI7czoyMDoiTGFib3JlIG9mZmljaWEgcmVwcmUiO3M6NjoiZGVncmVlIjtzOjIwOiJFeHBlZGl0YSBuZXF1ZSBjaWxsdSI7czoxNDoiZmllbGRfb2Zfc3R1ZHkiO3M6MjA6IlF1aXMgdGVtcG9yaWJ1cyBwb3NzIjtzOjEwOiJzdGFydF9kYXRlIjtzOjc6IjE5ODgtMDMiO3M6ODoiZW5kX2RhdGUiO3M6NzoiMTk4Ni0wMiI7czo4OiJsb2NhdGlvbiI7czoyMDoiT2RpbyBjaWxsdW0gcHJvaWRlbnQiO3M6MzoiZ3BhIjtzOjE5OiJFYXJ1bSBleGNlcHRldXIgcXVpIjt9fXM6Njoic2tpbGxzIjthOjE6e2k6MDthOjI6e3M6ODoiY2F0ZWdvcnkiO3M6MjA6Ik1vbGxpdGlhIGhhcnVtIG51bGxhIjtzOjExOiJza2lsbF9pdGVtcyI7czoxOToiRWEgcXVpIGluIGZ1Z2EgSXBzYSI7fX19fQ==', 1766189184);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `resume_id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `skill_items` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Uzair Khan', 'uzairkhanvt@gmail.com', NULL, '$2y$12$9AfpgrD8mfWIsK/vGXNdq.Eai/YFUwXLdo6aiMfTdDX/SCieNwspG', NULL, '2025-12-18 15:17:07', '2025-12-18 15:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `work_experiences`
--

CREATE TABLE `work_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `resume_id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `currently_working` tinyint(1) NOT NULL DEFAULT 0,
  `location` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
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
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `educations_resume_id_foreign` (`resume_id`);

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
-- Indexes for table `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resumes_user_id_foreign` (`user_id`);

--
-- Indexes for table `resume_templates`
--
ALTER TABLE `resume_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skills_resume_id_foreign` (`resume_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `work_experiences`
--
ALTER TABLE `work_experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_experiences_resume_id_foreign` (`resume_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resume_templates`
--
ALTER TABLE `resume_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `work_experiences`
--
ALTER TABLE `work_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `educations`
--
ALTER TABLE `educations`
  ADD CONSTRAINT `educations_resume_id_foreign` FOREIGN KEY (`resume_id`) REFERENCES `resumes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `resumes`
--
ALTER TABLE `resumes`
  ADD CONSTRAINT `resumes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_resume_id_foreign` FOREIGN KEY (`resume_id`) REFERENCES `resumes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `work_experiences`
--
ALTER TABLE `work_experiences`
  ADD CONSTRAINT `work_experiences_resume_id_foreign` FOREIGN KEY (`resume_id`) REFERENCES `resumes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
