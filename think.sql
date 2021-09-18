-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2021 at 02:25 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `think`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `m_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_t1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_t2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_t1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_des1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_des2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_img1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `au_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `au_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `au_sig` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cl_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_tit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ab_t1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ab_t2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ab_des1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ab_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `m_img`, `m_t1`, `m_t2`, `a_t1`, `a_des1`, `a_des2`, `a_img1`, `au_name`, `au_img`, `au_sig`, `c_img`, `t_img`, `cl_img`, `g_img`, `v_img`, `v_tit`, `v_link`, `ab_t1`, `ab_t2`, `ab_des1`, `ab_img`, `author`, `created_at`, `updated_at`) VALUES
(1, 'web/OjFe7EU7TJ4hh989NG0F3TdAEdV7RfCV8W5wAOPs.jpg', 'We are Sri Lanka’s first fully-fledged', 'Digital learning experience powered by Sadhana', 'WELCOME TO THINK BRIGHTER', '<p>Sadhana Higher Education Institution has earned the trust of thousands of local students and parents through discipline and results for over two decades.&nbsp;</p><p>Orbit Learner is Sri Lanka\'s state-of-the-art online education system which presents proudly and achieves quality educational outcomes for the future success of education in the country.&nbsp;</p>', '<p>Orbit Learner covers all requirements from elementary education to secondary education, including courses, exams through attractive educational methodologies.</p><p>Our Sadhana Institution with Orbit Learner will make your educational dream come true sooner than you think.</p>', 'web/3bt3MeFBjPhmVnBqCSo31HxMcAyEnioP4AP36OAJ.jpg', 'Amitha Paranagama', 'web/DJuJ3hUBHgN9kw4uRAfz34FtotDQ58xppyWS8ecj.jpg', 'web/2SBIA62OiLtK6sZ3zJzn4sTGIf5AjHBCnJRagBm4.png', 'web/XlLufO4UG38Bf7LdiOmAje2MsmJGd4tglkABjyNe.jpg', 'web/2SaMBiBV9uzL3b0p55zmrs0FPkgkpO5U2dqsdf5f.jpg', 'web/khm26KYNrTuvxnDsxl7z2XKaWlGqFfPpUUamZwHS.jpg', 'web/gR7cH1CrvVXJfg6zxlEXesTdx6B8URBqcDueO1gl.jpg', 'web/MjqFSfgkh3GtV53muSuNYXNJQDuVN0G3qG4KfHJs.jpg', 'Think Brighter System Introduction', 'https://www.youtube.com/watch?v=u4SNqup7WAw', 'What Makes Us Different?', NULL, '<p class=\"MsoNormal\">Orbit learner provides students a learning platform where\r\nthey can learn, engage and be excited about charting their own path to discover\r\nthe world with personalised learning experiences. we leverage technology to\r\nmerge best practices like use of videos, engaging content and quizzes with the\r\nbest teachers so that every child across the globe has access to the best\r\nlearning experiences.<o:p></o:p></p>', 'web/OqN5mk6ytO6AXbBDM33plR5Q7CoixGjlmfma8P28.jpg', 'Mr. Udara Kumarasiri', NULL, '2021-07-13 04:46:52');

-- --------------------------------------------------------

--
-- Table structure for table `b_i_accounts`
--

CREATE TABLE `b_i_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `g_batch_id` bigint(20) UNSIGNED NOT NULL,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in` int(11) DEFAULT NULL,
  `out` int(11) DEFAULT NULL,
  `bal` int(11) DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `b_i_accounts`
--

INSERT INTO `b_i_accounts` (`id`, `g_batch_id`, `des`, `in`, `out`, `bal`, `author`, `created_at`, `updated_at`) VALUES
(3, 143, 'Test02 Not Sadana', 225, 0, 225, 'Mr.Accountant Sample', '2021-08-30 18:44:36', '2021-08-30 18:44:36'),
(4, 44, 'Test02 Not Sadana', 300, 0, 300, 'Mr.Accountant Sample', '2021-08-30 18:44:36', '2021-08-30 18:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `b_i_a_entries`
--

CREATE TABLE `b_i_a_entries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `b_i_account_id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `b_i_a_entries`
--

INSERT INTO `b_i_a_entries` (`id`, `b_i_account_id`, `type`, `des`, `amount`, `author`, `created_at`, `updated_at`) VALUES
(4, 3, 0, 'Test02 Not Sadana', 225, 'Mr.Accountant Sample', '2021-08-30 18:44:36', '2021-08-30 18:44:36'),
(5, 4, 0, 'Test02 Not Sadana', 300, 'Mr.Accountant Sample', '2021-08-30 18:44:36', '2021-08-30 18:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `b_mcqs`
--

CREATE TABLE `b_mcqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `g_batch_id` bigint(20) UNSIGNED NOT NULL,
  `g_mcq_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `b_mcqs`
--

INSERT INTO `b_mcqs` (`id`, `group_id`, `g_batch_id`, `g_mcq_id`, `is_active`, `author`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 2, 1, 'Mr. Harsha De Pinto', '2021-07-05 12:11:41', '2021-07-05 12:11:41'),
(4, 114, 143, 5, 1, 'Mr. Harsha De Pinto', '2021-08-28 20:41:19', '2021-08-28 20:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `b_payments`
--

CREATE TABLE `b_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `b_student_id` bigint(20) UNSIGNED NOT NULL,
  `g_batch_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `method` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `b_payments`
--

INSERT INTO `b_payments` (`id`, `user_id`, `b_student_id`, `g_batch_id`, `code`, `year`, `month`, `author`, `amount`, `status`, `method`, `created_at`, `updated_at`) VALUES
(1, 10, 2, 1, '2021June', '2021', 'June', 'AC1012', 1500, 1, 2, '2021-06-29 03:44:38', '2021-07-07 18:15:11'),
(2, 10, 3, 2, '2021June', '2021', 'June', 'AC1012', 1500, 1, 2, '2021-06-29 23:27:28', '2021-07-31 21:01:33'),
(3, 10, 2, 1, '2021July', '2021', 'July', 'AC1012', 1500, 1, 2, '2021-07-01 07:47:31', '2021-07-07 18:19:03'),
(4, 10, 3, 2, '2021July', '2021', 'July', 'AC1012', 1500, 1, 2, '2021-07-01 07:48:11', '2021-07-31 21:01:33'),
(5, 14, 4, 1, '2021July', '2021', 'July', 'AC1012', 1500, 1, 2, '2021-07-08 16:13:03', '2021-07-08 16:26:49'),
(6, 14, 5, 2, '2021July', '2021', 'July', 'Online', 1500, 1, 1, '2021-07-08 16:15:48', '2021-07-08 16:22:25'),
(7, 24, 6, 13, '2021July', '2021', 'July', 'Mr. Amitha Paranagama', 1300, 0, 0, '2021-07-29 02:39:51', '2021-07-29 02:39:51'),
(8, 45, 7, 14, '2021August', '2021', 'August', 'Miss. NIMMI MUNASINGHE', 1300, 0, 0, '2021-08-09 23:09:35', '2021-08-09 23:09:35'),
(9, 45, 8, 129, '2021August', '2021', 'August', 'Miss. NIMMI MUNASINGHE', 1500, 0, 0, '2021-08-09 23:10:01', '2021-08-09 23:10:01'),
(10, 10, 9, 13, '2021August', '2021', 'August', 'Mr. Kemindu Induvara', 1300, 0, 0, '2021-08-23 21:41:08', '2021-08-23 21:41:08'),
(11, 10, 2, 1, '2021August', '2021', 'August', 'Student', 200, 0, 0, '2021-08-23 21:47:47', '2021-08-23 21:47:47'),
(27, 47, 17, 143, '2021August', '2021', 'August', 'AC1012', 750, 1, 2, '2021-08-30 18:29:38', '2021-08-30 18:44:36'),
(28, 47, 18, 44, '2021August', '2021', 'August', 'AC1012', 1000, 1, 2, '2021-08-30 18:43:29', '2021-08-30 18:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `b_students`
--

CREATE TABLE `b_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `g_batch_id` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `type` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `b_students`
--

INSERT INTO `b_students` (`id`, `user_id`, `g_batch_id`, `author`, `status`, `type`, `created_at`, `updated_at`) VALUES
(2, 10, 1, 'Mr. Kemindu Induvara', 0, 0, '2021-06-29 03:44:38', '2021-06-29 03:44:38'),
(3, 10, 2, 'Mr. Kemindu Induvara', 0, 0, '2021-06-29 23:27:28', '2021-06-29 23:27:28'),
(4, 14, 1, 'Ms. Chanuthi Paranagama', 0, 0, '2021-07-08 16:13:03', '2021-07-08 16:13:03'),
(5, 14, 2, 'Ms. Chanuthi Paranagama', 0, 0, '2021-07-08 16:15:48', '2021-07-08 16:15:48'),
(6, 24, 13, 'Mr. Amitha Paranagama', 0, 0, '2021-07-29 02:39:51', '2021-07-29 02:39:51'),
(7, 45, 14, 'Miss. NIMMI MUNASINGHE', 0, 0, '2021-08-09 23:09:35', '2021-08-09 23:09:35'),
(8, 45, 129, 'Miss. NIMMI MUNASINGHE', 0, 0, '2021-08-09 23:10:01', '2021-08-09 23:10:01'),
(9, 10, 13, 'Mr. Kemindu Induvara', 0, 0, '2021-08-23 21:41:08', '2021-08-23 21:41:08'),
(17, 47, 143, 'Mr. Accountant Sample', 0, 1, '2021-08-30 18:29:00', '2021-08-30 18:29:28'),
(18, 47, 44, 'Mr. Test02 Not Sadana', 0, 0, '2021-08-30 18:43:29', '2021-08-30 18:43:29');

-- --------------------------------------------------------

--
-- Table structure for table `b_s_accounts`
--

CREATE TABLE `b_s_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `b_student_id` bigint(20) UNSIGNED NOT NULL,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in` int(11) DEFAULT NULL,
  `out` int(11) DEFAULT NULL,
  `bal` int(11) DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `b_s_accounts`
--

INSERT INTO `b_s_accounts` (`id`, `b_student_id`, `des`, `in`, `out`, `bal`, `author`, `created_at`, `updated_at`) VALUES
(7, 17, '2021August Class Fee Paid ', 2250, 2250, 0, 'Mr. Test02 Not Sadana', '2021-08-30 18:29:00', '2021-08-30 18:44:36'),
(8, 18, '2021August Class Fee Paid ', 1000, 1000, 0, 'Mr. Test02 Not Sadana', '2021-08-30 18:43:29', '2021-08-30 18:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `b_s_a_entries`
--

CREATE TABLE `b_s_a_entries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `b_s_account_id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `b_s_a_entries`
--

INSERT INTO `b_s_a_entries` (`id`, `b_s_account_id`, `type`, `des`, `amount`, `author`, `created_at`, `updated_at`) VALUES
(24, 7, 1, '2021August Fees', 1500, 'Mr. Test02 Not Sadana', '2021-08-30 18:29:00', '2021-08-30 18:29:00'),
(25, 7, 0, '2021August Deleted By Mr.Accountant', 1500, 'Mr.Accountant', '2021-08-30 18:29:17', '2021-08-30 18:29:17'),
(26, 7, 1, '2021August Class Fee ', 750, 'Student', '2021-08-30 18:29:38', '2021-08-30 18:29:38'),
(27, 8, 1, '2021August Fees', 1000, 'Mr. Test02 Not Sadana', '2021-08-30 18:43:29', '2021-08-30 18:43:29'),
(28, 7, 0, '2021August Class Fee Paid ', 750, 'Mr.Accountant Sample', '2021-08-30 18:44:36', '2021-08-30 18:44:36'),
(29, 8, 0, '2021August Class Fee Paid ', 1000, 'Mr.Accountant Sample', '2021-08-30 18:44:36', '2021-08-30 18:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `b_tutorials`
--

CREATE TABLE `b_tutorials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `g_batch_id` bigint(20) UNSIGNED NOT NULL,
  `g_tutorial_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `b_tutorials`
--

INSERT INTO `b_tutorials` (`id`, `group_id`, `g_batch_id`, `g_tutorial_id`, `is_active`, `author`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 3, 1, 'Mr. Amitha Paranagama', '2021-07-07 13:40:52', '2021-07-07 13:40:52');

-- --------------------------------------------------------

--
-- Table structure for table `b_t_accounts`
--

CREATE TABLE `b_t_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `g_batch_id` bigint(20) UNSIGNED NOT NULL,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in` int(11) DEFAULT NULL,
  `out` int(11) DEFAULT NULL,
  `bal` int(11) DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `b_t_accounts`
--

INSERT INTO `b_t_accounts` (`id`, `user_id`, `g_batch_id`, `des`, `in`, `out`, `bal`, `author`, `created_at`, `updated_at`) VALUES
(3, 48, 143, 'Test02 Not Sadana', 525, 0, 525, 'Mr.Accountant Sample', '2021-08-30 18:44:36', '2021-08-30 18:44:36'),
(4, 19, 44, 'Test02 Not Sadana', 700, 0, 700, 'Mr.Accountant Sample', '2021-08-30 18:44:36', '2021-08-30 18:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `b_t_a_entries`
--

CREATE TABLE `b_t_a_entries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `b_t_account_id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `b_t_a_entries`
--

INSERT INTO `b_t_a_entries` (`id`, `b_t_account_id`, `type`, `des`, `amount`, `author`, `created_at`, `updated_at`) VALUES
(4, 3, 0, 'Test02 Not Sadana', 525, 'Mr.Accountant Sample', '2021-08-30 18:44:36', '2021-08-30 18:44:36'),
(5, 4, 0, 'Test02 Not Sadana', 700, 'Mr.Accountant Sample', '2021-08-30 18:44:36', '2021-08-30 18:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `b_videos`
--

CREATE TABLE `b_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `g_batch_id` bigint(20) UNSIGNED NOT NULL,
  `g_video_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `b_videos`
--

INSERT INTO `b_videos` (`id`, `group_id`, `g_batch_id`, `g_video_id`, `is_active`, `author`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 3, 1, 'Mr. Amitha Paranagama', '2021-07-07 13:45:49', '2021-07-07 13:45:49'),
(4, 114, 143, 4, 1, 'Mr. Harsha De Pinto', '2021-08-28 20:41:14', '2021-08-28 20:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `d_logs`
--

CREATE TABLE `d_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `d_logs`
--

INSERT INTO `d_logs` (`id`, `user_id`, `des`, `created_at`, `updated_at`) VALUES
(1, 1, 'Advanced Level', '2021-06-28 02:58:24', '2021-06-28 02:58:24'),
(2, 1, 'Ordinary Level Deleted', '2021-06-28 02:59:35', '2021-06-28 02:59:35'),
(3, 1, 'Subject Sinhala Deleted', '2021-06-28 03:28:55', '2021-06-28 03:28:55'),
(4, 1, 'Teacher Mr. Pissu Kanna Deleted ', '2021-07-03 12:13:34', '2021-07-03 12:13:34'),
(5, 1, 'Student Mr. Gihan De Pinto Deleted ', '2021-07-03 13:52:21', '2021-07-03 13:52:21'),
(6, 1, 'Course English Grade 06 English Deleted ', '2021-07-04 04:06:58', '2021-07-04 04:06:58'),
(7, 1, 'Course Mr.Dhanushka Grade 06 English Course Deleted ', '2021-07-04 04:09:37', '2021-07-04 04:09:37'),
(8, 1, 'Class Mr.Amitha Grade 06 Grade 25 Deleted ', '2021-07-04 04:53:07', '2021-07-04 04:53:07'),
(9, 1, 'Tutorial Mathematics 02 Removed from Mathematics | Sinhala Medium', '2021-07-04 07:15:50', '2021-07-04 07:15:50'),
(10, 1, 'Tutorial Mathematics Removed from Mathematics | Sinhala Medium | Group 01', '2021-07-04 07:44:44', '2021-07-04 07:44:44'),
(11, 1, 'Video Mathematics Removed from Mathematics | Sinhala Medium', '2021-07-05 05:54:03', '2021-07-05 05:54:03'),
(12, 1, 'video Mathematics Removed from Mathematics | Sinhala Medium | Group 01', '2021-07-05 10:07:02', '2021-07-05 10:07:02'),
(13, 1, 'MCQ Mathematics 02 Removed from Mathematics | Sinhala Medium', '2021-07-05 10:57:06', '2021-07-05 10:57:06'),
(14, 1, 'Question 1 Removed from paper Mathematics | Mathematics | Sinhala Medium', '2021-07-05 11:04:24', '2021-07-05 11:04:24'),
(15, 1, 'MCQ Paper Mathematics Removed from Mathematics | Sinhala Medium | Group 01', '2021-07-05 12:11:24', '2021-07-05 12:11:24'),
(16, 1, 'Question 1 Removed from paper Lesson 01 | Mathematics | Sinhala Medium', '2021-07-06 12:54:59', '2021-07-06 12:54:59'),
(17, 1, 'Question 2 Removed from paper Lesson 01 | Mathematics | Sinhala Medium', '2021-07-06 12:55:30', '2021-07-06 12:55:30'),
(18, 1, 'MCQ Lesson 01 Removed from Mathematics | Sinhala Medium', '2021-07-06 12:55:33', '2021-07-06 12:55:33'),
(19, 4, 'Tutorial Mathematics Removed from Mathematics | Sinhala Medium', '2021-07-07 12:34:28', '2021-07-07 12:34:28'),
(20, 4, 'Video Mathematics Removed from Mathematics | Sinhala Medium', '2021-07-07 12:47:59', '2021-07-07 12:47:59'),
(21, 4, 'MCQ Lesson 01 Removed from Mathematics | Sinhala Medium', '2021-07-07 13:00:48', '2021-07-07 13:00:48'),
(22, 4, 'Tutorial Lesson 01 Removed from Mathematics | Sinhala Medium | Group 01', '2021-07-07 13:41:02', '2021-07-07 13:41:02'),
(23, 15, 'Course Mr.Dhanushka Grade 09 English Deleted ', '2021-07-12 21:28:26', '2021-07-12 21:28:26'),
(24, 15, 'Class Ms.Upuli Grade 07 Group Deleted ', '2021-07-12 22:21:14', '2021-07-12 22:21:14'),
(25, 15, 'Class Ms.Upuli Grade 08 Group 01 Deleted ', '2021-07-12 22:24:08', '2021-07-12 22:24:08'),
(26, 15, 'Teacher Mr. Chamila Priyankara Deleted ', '2021-07-13 00:02:41', '2021-07-13 00:02:41'),
(27, 15, 'Teacher Mr. Chamila Priyankara Deleted ', '2021-07-14 15:23:20', '2021-07-14 15:23:20'),
(28, 15, 'Teacher Mr. Aruna Weragala Deleted ', '2021-07-14 15:23:31', '2021-07-14 15:23:31'),
(29, 15, 'Subject Art Deleted', '2021-07-18 21:13:28', '2021-07-18 21:13:28'),
(30, 15, 'Subject Drama Deleted', '2021-07-18 21:13:35', '2021-07-18 21:13:35'),
(31, 15, 'Subject Sinhala Literature Deleted', '2021-07-18 21:13:44', '2021-07-18 21:13:44'),
(32, 15, 'Subject Commerce Deleted', '2021-07-18 21:13:51', '2021-07-18 21:13:51'),
(33, 15, 'Subject Tamil Deleted', '2021-07-18 21:14:00', '2021-07-18 21:14:00'),
(34, 15, 'Subject ICT Deleted', '2021-07-18 21:14:07', '2021-07-18 21:14:07'),
(35, 15, 'Subject History Deleted', '2021-07-18 21:14:15', '2021-07-18 21:14:15'),
(36, 15, 'Subject Sinhala Deleted', '2021-07-18 21:14:23', '2021-07-18 21:14:23'),
(37, 15, 'Class Mr.Dhanushka Grade 10 Group Deleted ', '2021-07-18 21:16:04', '2021-07-18 21:16:04'),
(38, 15, 'Class Mr.Dhanushka Grade 11 Group Deleted ', '2021-07-18 21:16:17', '2021-07-18 21:16:17'),
(39, 15, 'Course Mr.Dhanushka Grade 10 English Literature Deleted ', '2021-07-18 21:16:27', '2021-07-18 21:16:27'),
(40, 15, 'Course Mr.Dhanushka Grade 11 English Literature Deleted ', '2021-07-18 21:16:36', '2021-07-18 21:16:36'),
(41, 15, 'Subject English Literature Deleted', '2021-07-18 21:16:58', '2021-07-18 21:16:58'),
(42, 15, 'Class Mr.Sameera Grade 06 Group Deleted ', '2021-07-31 00:02:03', '2021-07-31 00:02:03'),
(43, 15, 'Class Mr.Mohan Grade 09 Mass Deleted ', '2021-07-31 16:22:01', '2021-07-31 16:22:01'),
(44, 15, 'Course Ms.Sudarshi Grade 11 History | Sinhala Medium Deleted ', '2021-07-31 16:34:09', '2021-07-31 16:34:09'),
(45, 15, 'Course Ms.Nilukshi Grade 11 ICT Deleted ', '2021-07-31 18:16:22', '2021-07-31 18:16:22'),
(46, 15, 'Course Ms.Nilukshi Grade 11 ICT Deleted ', '2021-07-31 18:19:29', '2021-07-31 18:19:29'),
(47, 15, 'Course Mrs.Kristina Grade 11 Tamil Deleted ', '2021-07-31 19:55:33', '2021-07-31 19:55:33'),
(48, 1, 'Tutorial Test 01 Removed from Test Course', '2021-08-30 22:25:36', '2021-08-30 22:25:36'),
(49, 1, 'Zoom AccountTest 01 Deleted', '2021-08-30 22:44:13', '2021-08-30 22:44:13');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `title`, `author`, `created_at`, `updated_at`) VALUES
(1, 'Grade 06', 'Mr. Harsha De Pinto', '2021-06-16 15:24:15', '2021-06-28 02:50:31'),
(2, 'Grade 07', 'Mr. Harsha De Pinto', '2021-06-16 15:27:54', '2021-06-28 03:06:45'),
(3, 'Grade 08', 'Mr. Harsha De Pinto', '2021-06-16 15:28:31', '2021-06-28 03:06:24'),
(4, 'Grade 09', 'Mr. Harsha De Pinto', '2021-06-16 15:28:49', '2021-06-28 03:06:39'),
(7, 'Grade 10', 'Mrs. Gimara Dhanushi', '2021-07-12 20:00:06', '2021-07-12 20:00:06'),
(8, 'Grade 11', 'Mrs. Gimara Dhanushi', '2021-07-12 20:00:51', '2021-07-12 20:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `is_active`, `user_id`, `grade_id`, `subject_id`, `title`, `img1`, `img2`, `des1`, `des2`, `author`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, 1, 'Mathematics | Sinhala Medium', 'web/ibn6eRpcDXoqWufaF3eA25oQi58xDBSYxHEjhfA2.jpg', 'web/tooT6xkq3iWhDYSNHwXtD6ELRL5EqW4OL3Qrr41r.jpg', '<p>හය ශ්‍රේණිය පොඩ්ඩන්ට ගණිතය ඉගෙනගන්න හොදම පන්තිය&nbsp;<br></p>', '<p>Vestibulum eu turpis risus. Nullam fringilla diam tellus, eu volutpat massa ullamcorper non. Nullam lorem felis, sollicitudin vitae semper sit amet, facilisis sit amet lacus. Suspendisse ut ligula varius, dignissim velit sit amet, maximus est. Etiam nec mauris augue. Ut viverra tortor orci, ac ultricies&nbsp;&nbsp;<br></p>', 'Mr. Harsha De Pinto', '2021-06-17 18:31:03', '2021-07-26 20:50:51'),
(2, 1, 5, 2, 3, 'Science | Sinhala Medium', 'web/Ib3LTALV882gVKvdJKQXOP8YbML4i9YuJ6JeYFtR.jpg', 'web/dBndXhicL0pnMYBumtxgVwhslTXlS1STTtAX4ClK.jpg', '<p>Best Science class for grade seven kids register today and feel the deference</p>', '<p>Vestibulum eu turpis risus. Nullam fringilla diam tellus, eu volutpat massa ullamcorper non. Nullam lorem felis, sollicitudin vitae semper sit amet, facilisis sit amet lacus. Suspendisse ut ligula varius, dignissim velit sit amet, maximus est. Etiam nec mauris augue. Ut viverra tortor orci, ac ultricies magna molestie ut<br></p>', 'Mr. Harsha De Pinto', '2021-06-17 19:30:26', '2021-07-26 20:13:04'),
(3, 1, 6, 3, 3, 'Science | Sinhala Medium', 'web/zUuHKMAGDt2kJhhYM7l8pyxgWy5ifpkPmbTtFRzo.jpg', 'web/y6kNkLJRUtoca2EYYCiwiBggZ6oMNnHTes6C5HEL.jpg', '<p>අට ශ්‍රේණිය පොඩ්ඩන්ට විද්‍යාව&nbsp; ඉගෙනගන්න හොදම පන්තිය&nbsp;<br></p>', '<p><br></p>', 'Mr. Harsha De Pinto', '2021-06-17 19:34:32', '2021-07-26 20:04:36'),
(6, 1, 4, 2, 1, 'Mathematics | Sinhala Medium', 'web/uTKbKSKLEDCt3hCXXpbIdgRq5KPfSv3RCkXGLQ44.jpg', 'web/hJuydYimmQpDmidArPu3InXKOa3Fvwe54ZKIH7MS.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-12 20:56:23', '2021-07-26 20:51:17'),
(7, 1, 4, 3, 1, 'Mathematics | Sinhala Medium', 'web/4pNRpSMceIj20GQ1y2xo9VeX036JnYXxQr1nYdDc.jpg', 'web/YYME5kWiPT1iVIXqWPpoYYuirlePPHYAZgVPBcNQ.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-12 20:57:35', '2021-07-26 20:51:40'),
(8, 1, 4, 4, 1, 'Mathematics | Sinhala Medium', 'web/fmUD29nnaKvEruoL0XbB6eFl4mo3zAjtQ1AFh5t3.jpg', 'web/WaPvHdicSH1s1K4JYws8yixSmtJeCqfjv6KwWaMs.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-12 20:58:14', '2021-07-26 20:52:03'),
(9, 1, 4, 7, 1, 'Mathematics | Sinhala Medium', 'web/7GGdCcky8EuPAKru3SrZPNNKEhcZrOhnHRWo28g2.jpg', 'web/tswVrhKtrCX23YrmnsWinniL3HzcUQ9bzBNHdcQq.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-12 20:58:45', '2021-07-26 20:52:26'),
(10, 1, 4, 8, 1, 'Mathematics | Sinhala Medium', 'web/J9mWW0cEJspaaAntnbOm0SB282zeQW1jtVvhxja6.jpg', 'web/Sq79qCvNo69u5zQIsbC3H4sKLoYqXML2l9NXNZ9x.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-12 20:59:25', '2021-07-26 20:52:44'),
(14, 1, 8, 8, 4, 'English', 'web/OEB29ZYJvI7mEEYVugumbbkjKPvSyFETnQS6AJkp.jpg', 'web/yVGdBdFoxyAL1Ilk3sNSESoMqpYRwWSHTYXJxYPX.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-12 21:29:54', '2021-07-26 20:23:27'),
(15, 1, 8, 7, 4, 'English', 'web/d7mrgXfeIPXerMsK87LL1Fruk4QyOkM91gvgx7tj.jpg', 'web/Zr3oDxByhlH5LeX1WpQ1iX8aKLkX89ITkdFWmFt5.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-12 21:30:25', '2021-07-26 20:23:05'),
(16, 1, 8, 4, 4, 'English', 'web/ingGJcTDZl0eByKdvRZUxE48iGVOpAoaDRcygXa5.jpg', 'web/m3GoqHOTmURXjtQmEzKkqbIRLBboJwhIrspUGGzb.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-12 21:31:03', '2021-07-26 20:22:43'),
(17, 1, 5, 3, 3, 'Science | Sinhala Medium', 'web/XDJPR7TbfMU0mYmUnIERdz6fy0jPWrAraBBwKrSG.jpg', 'web/AHPlamTV8DYboOZjuyl4NZwUDbeq19lP0jnv1g4P.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-12 21:56:40', '2021-07-26 20:13:38'),
(18, 1, 5, 1, 3, 'Science | Sinhala Medium', 'web/sGcLjs5kCiFWZIoR1bHx9um35dK2Z3lqGCaFkDLP.jpg', 'web/blvVtr7HGYc40TbRyXiW1k5PrJabieYZi3BIodRa.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-12 21:58:19', '2021-07-26 20:12:37'),
(19, 1, 6, 4, 3, 'Science | Sinhala Medium', 'web/eH9O1iiyV7FdLLMp8W5plR0MICajrCit3Jthpkph.jpg', 'web/STQJ4IiKSpwHOnKr34o61ptOiFw0JHieTxaA13OP.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-12 23:08:01', '2021-07-26 20:05:02'),
(20, 1, 6, 2, 3, 'Science | Sinhala Medium', 'web/A80jFwhh5K1qqnRZeZC86FrHLsKaFoJSZfQf3sj3.jpg', 'web/mRULEw2zQfXia7JmLg5nGfhZXlTP92a5loajHVuw.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-12 23:09:20', '2021-07-26 20:04:04'),
(21, 1, 6, 1, 3, 'Science | Sinhala Medium', 'web/qVA4s1CC3FmHo70zXwMa0549IahsOThG73b11aC7.jpg', 'web/yfWYwsRedGI8yBza2BIH8rkHnsJBGjVknBQkcgCS.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-12 23:09:47', '2021-07-26 20:03:38'),
(22, 1, 7, 8, 4, 'English Language', 'web/IiVicoQlVxtRNE3Bqy4b3CcBjCsXtKXQdTDD3IJs.jpg', 'web/E2XS3TXedVR3P8K3XKXMjq1DwIImLb7up0wQPWOP.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-14 18:04:23', '2021-07-26 20:38:32'),
(23, 1, 7, 7, 4, 'English Language', 'web/MSyojByc6OxZM14Z5cEZBItsaJftcRmSz0heRo5o.jpg', 'web/GEy0v1IT3B4KEthB4y9nnqmU4obLdR7JlqSP8EkR.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-14 18:04:57', '2021-07-26 20:38:11'),
(24, 1, 7, 4, 4, 'English Language', 'web/ptYyoPnsoibOhTHvbfY57aBZJ423RLFLhT3ycvXH.jpg', 'web/sTGuLPRtsoE5JqoO5NTf65YfkujfAE3TgglfOaAo.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-14 18:05:58', '2021-07-26 20:37:54'),
(25, 1, 7, 3, 4, 'English Language', 'web/jIAl2uGyH3uEUT8MDdz2Sq0O8rBBWNm8EtjYE092.jpg', 'web/1ieddQq3mwc4HRkmpK2UoB3tknUTGcnXsTrVve3H.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-14 18:07:47', '2021-07-26 20:37:38'),
(26, 1, 7, 2, 4, 'English Language', 'web/sbCJBdpcTGCv71mEPGpw2ddNTHF9sFYRKlMuh0QN.jpg', 'web/gi44C3F9Jjk3LHscgNqCsynfCw62LZyXNPXH0Gak.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-14 18:09:09', '2021-07-26 20:37:22'),
(27, 1, 7, 1, 4, 'English Language', 'web/8kUTtVIrAUCbDhfVy2DsadC4ZUupxEchdbPQhhye.jpg', 'web/cJafa0sgE7Q363MYnsIjdhFJfnHKj06LeSZT0YT1.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-14 18:10:13', '2021-07-26 20:36:59'),
(28, 1, 20, 8, 3, 'Science | Sinhala Medium', 'web/S5FEaV2NHXqLfHemtVwFaCnBlsLmhBRUjdVEg9Lf.jpg', 'web/Yo8Hf2sar5Y5zatfYQ8C1LG47kCDdWD9fN4VuRsr.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-16 20:58:11', '2021-07-26 19:53:28'),
(29, 1, 20, 7, 3, 'Science | Sinhala Medium', 'web/zSQUjWEE1btbbmFJpLXwGcnmYupQXouVm6Op3H1o.jpg', 'web/hWKbctCwHH2vTP2zajpJp8uTFal1isT1MUti1ovM.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-16 21:04:33', '2021-07-26 19:53:03'),
(30, 1, 19, 8, 3, 'Science | Sinhala Medium', 'web/zSytr7wUP6gE426z768Xavien5PjpHotkkOUZ17U.jpg', 'web/r4ePGaAW0Ctv2yYdRknUw6Zv213sp17qjpWRVJ3A.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-16 21:06:30', '2021-07-26 19:46:34'),
(31, 1, 19, 7, 3, 'Science | Sinhala Medium', 'web/ftmHDSuiLH50VVV1gzBe14EEIM7aR7dwaZBobNVY.jpg', 'web/Xe0Ro3pcjTmQRPUzhymVmgbY8OaRQipwl5w3hlwL.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-16 21:08:29', '2021-07-26 19:46:12'),
(32, 1, 19, 4, 3, 'Science | Sinhala Medium', 'web/X5S1TH9JKelzDHdNLOyS5VYTkXErp75UALqk2uSN.jpg', 'web/MWaJfZ4ggVhpiTy9zC9kEGF5JypYMNoOGv5oykIC.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-16 21:10:09', '2021-07-26 19:45:50'),
(33, 1, 21, 8, 3, 'Science | Sinhala Medium', 'web/fkVGRU2wLl6Xk7c3QszfePJpt41SFgBy5Pmjsbqk.jpg', 'web/thHCQZo3i8RELRl6th2eIuYA1iTQkeLYiUp28AEC.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-16 21:11:56', '2021-07-24 07:37:01'),
(34, 1, 21, 7, 3, 'Science | Sinhala Medium', 'web/bOeO3nZpvoQ81DElKIIviNCYIuSDUcWltOe0Ipng.jpg', 'web/sPVoUmEs9rmUZmh6IKctfkDykQaAwb2VY3wugBZW.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-16 21:16:34', '2021-07-24 07:35:54'),
(35, 1, 21, 4, 3, 'Science | Sinhala Medium', 'web/XdhgscXcYRAaOC3lUTTWUpzz6xswatbXnNokytIj.jpg', 'web/2kpKVhickEIAYUFbEUTxRmr4rhW0YrwAySi6F7su.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-16 21:19:13', '2021-07-24 07:36:32'),
(36, 1, 22, 8, 4, 'English Language', 'web/fkjBtjXJFLJYCbRdZKTGjH5WXV0kJUNnqNDz50wB.jpg', 'web/FzKxtl8Wid7O1q90RvTsCCSezYdbNPdQySyj4fcg.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-16 21:21:19', '2021-07-24 07:24:40'),
(37, 1, 22, 7, 4, 'English Language', 'web/1CJAq6U5qGuLx25vXev9B4H1RydVoFsCDh4XYIHD.jpg', 'web/nn463DJHc0K3pHLPXXmfvCxbHr6LnPaSx3h5JTsr.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-16 21:22:48', '2021-07-24 07:24:18'),
(38, 1, 22, 4, 4, 'English Language', 'web/GEM8AvYMBBqXhXLdfKQV99CNnRXjGTqoFMu6El6G.jpg', 'web/uYPggNeeK1mlcyeTNYPY8f6uS7vir1K3r4tAuQ2A.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-16 21:24:03', '2021-07-24 07:23:56'),
(39, 1, 22, 3, 4, 'English Language', 'web/VGF3WB7McP5Fvxdp2j4gY1rgRhiOSJwBDLEmCRWm.jpg', 'web/0qTEeYN5jdHGoyTk2KWc3ihTzkXv1C5seyRByQON.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-16 21:25:17', '2021-07-24 07:23:25'),
(40, 1, 22, 2, 4, 'English Language', 'web/JDx4UmdDVwNCzy0va91HQPfXmCbHfFsjt9b8f0XI.jpg', 'web/y0UIxmccTBPdIxJGSmRrZ6SlwT4PbRTmwGlkK7IX.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-16 21:26:32', '2021-07-24 07:23:01'),
(41, 1, 22, 1, 4, 'English Language', 'web/O5kdVGjHjEas0VMlWY5I7EvvISftwaNE7EG0GbnG.jpg', 'web/Gk7cz7raJ9kCrJxgQ2w3ZkfPg36iLvCa5X3kWsmS.jpg', NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-16 21:27:44', '2021-07-24 07:12:43'),
(42, 1, 25, 3, 14, 'Sinhala Language', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-30 19:17:35', '2021-07-30 19:50:07'),
(43, 1, 25, 2, 14, 'Sinhala Language', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-30 19:19:28', '2021-07-30 19:50:25'),
(44, 1, 25, 1, 14, 'Sinhala Language', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-30 19:20:20', '2021-07-30 19:50:46'),
(45, 1, 26, 4, 14, 'Sinhala Language', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-30 19:48:57', '2021-07-30 19:51:14'),
(46, 1, 26, 3, 14, 'Sinhala Language', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-30 19:51:34', '2021-07-30 19:51:48'),
(47, 1, 26, 2, 14, 'Sinhala Language', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-30 19:52:19', '2021-07-30 19:52:24'),
(48, 1, 26, 1, 14, 'Sinhala Language', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-30 20:15:52', '2021-07-30 20:15:56'),
(49, 1, 27, 3, 14, 'Sinhala Language', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-30 21:07:46', '2021-07-30 21:08:03'),
(50, 1, 27, 2, 14, 'Sinhala Language', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-30 21:08:25', '2021-07-30 21:08:36'),
(51, 1, 27, 1, 14, 'Sinhala Language', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-30 21:08:56', '2021-07-30 21:09:03'),
(52, 1, 28, 4, 14, 'Sinhala Language', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-30 21:18:40', '2021-07-30 21:18:46'),
(53, 1, 28, 3, 14, 'Sinhala Language', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-30 21:19:01', '2021-07-30 21:19:04'),
(54, 1, 28, 2, 14, 'Sinhala Language', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-30 21:19:23', '2021-07-30 21:19:26'),
(55, 1, 28, 1, 14, 'Sinhala Language', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-30 21:19:40', '2021-07-30 21:19:49'),
(56, 1, 29, 8, 14, 'Sinhala Language', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 00:07:30', '2021-07-31 00:07:34'),
(57, 1, 29, 7, 14, 'Sinhala Language', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 00:07:51', '2021-07-31 00:07:54'),
(58, 1, 29, 4, 14, 'Sinhala Language', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 00:08:17', '2021-07-31 00:08:20'),
(59, 1, 30, 8, 14, 'Sinhala Language', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 00:15:09', '2021-07-31 00:15:18'),
(60, 1, 30, 7, 14, 'Sinhala Language', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 00:15:36', '2021-07-31 00:15:40'),
(61, 1, 31, 8, 14, 'Sinhala Language', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 14:59:46', '2021-07-31 14:59:52'),
(62, 1, 31, 7, 14, 'Sinhala Language', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 15:00:08', '2021-07-31 15:00:11'),
(63, 1, 32, 8, 15, 'History | Sinhala Medium', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 16:12:16', '2021-07-31 16:12:55'),
(64, 1, 32, 7, 15, 'History | Sinhala Medium', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 16:13:10', '2021-07-31 16:13:14'),
(65, 1, 32, 4, 15, 'History | Sinhala Medium', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 16:13:33', '2021-07-31 16:13:38'),
(66, 1, 32, 3, 15, 'History | Sinhala Medium', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 16:14:04', '2021-07-31 16:14:08'),
(67, 1, 32, 2, 15, 'History | Sinhala Medium', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 16:14:26', '2021-07-31 16:14:29'),
(68, 1, 32, 1, 15, 'History | Sinhala Medium', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 16:15:13', '2021-07-31 16:15:16'),
(70, 1, 33, 4, 15, 'History | Sinhala Medium', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 16:34:26', '2021-07-31 16:34:30'),
(71, 1, 33, 2, 15, 'History | Sinhala Medium', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 16:34:46', '2021-07-31 16:34:50'),
(72, 1, 34, 8, 15, 'History | Sinhala Medium', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 17:07:36', '2021-07-31 17:07:41'),
(73, 1, 34, 7, 15, 'History | Sinhala Medium', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 17:08:57', '2021-07-31 17:09:01'),
(74, 1, 35, 8, 15, 'History | Sinhala Medium', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 17:30:18', '2021-07-31 17:30:28'),
(75, 1, 35, 7, 15, 'History | Sinhala Medium', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 17:30:43', '2021-07-31 17:30:48'),
(76, 1, 36, 8, 16, 'ICT', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 17:54:29', '2021-07-31 17:54:46'),
(77, 1, 36, 7, 16, 'ICT', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 17:55:02', '2021-07-31 17:55:37'),
(78, 1, 36, 4, 16, 'ICT', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 17:55:55', '2021-07-31 17:55:58'),
(79, 1, 36, 3, 16, 'ICT', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 17:56:46', '2021-07-31 17:56:51'),
(80, 1, 36, 2, 16, 'ICT', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 17:57:10', '2021-07-31 17:57:14'),
(81, 1, 36, 1, 16, 'ICT', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 17:57:34', '2021-07-31 17:58:06'),
(82, 1, 37, 8, 16, 'ICT', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 18:14:37', '2021-07-31 18:14:42'),
(84, 1, 37, 4, 16, 'ICT', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 18:16:36', '2021-07-31 18:16:38'),
(85, 1, 37, 3, 16, 'ICT', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 18:17:54', '2021-07-31 18:17:57'),
(87, 1, 37, 2, 16, 'ICT', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 18:19:39', '2021-07-31 18:19:42'),
(88, 1, 37, 1, 16, 'ICT', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 18:21:23', '2021-07-31 18:21:53'),
(89, 1, 38, 8, 16, 'ICT', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 19:00:41', '2021-07-31 19:01:19'),
(90, 1, 38, 7, 16, 'ICT', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 19:05:04', '2021-07-31 19:05:08'),
(92, 1, 40, 4, 17, 'Tamil', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 19:55:58', '2021-07-31 19:56:01'),
(93, 1, 40, 3, 17, 'Tamil', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 19:57:21', '2021-07-31 19:57:25'),
(94, 1, 40, 2, 17, 'Tamil', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 19:58:42', '2021-07-31 19:58:50'),
(95, 1, 40, 1, 17, 'Tamil', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 20:01:26', '2021-07-31 20:01:31'),
(96, 1, 39, 4, 17, 'Tamil', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 20:03:37', '2021-07-31 20:03:42'),
(97, 1, 39, 3, 17, 'Tamil', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 20:05:19', '2021-07-31 20:05:23'),
(98, 1, 39, 2, 17, 'Tamil', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 20:06:47', '2021-07-31 20:06:50'),
(99, 1, 39, 1, 17, 'Tamil', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 20:08:33', '2021-07-31 20:08:37'),
(100, 1, 8, 8, 18, 'English Literature', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 20:13:40', '2021-07-31 20:13:44'),
(101, 1, 8, 7, 18, 'English Literature', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 20:15:42', '2021-07-31 20:15:45'),
(102, 1, 31, 8, 19, 'Sinhala Literature', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 20:17:51', '2021-07-31 20:17:54'),
(103, 1, 31, 7, 19, 'Sinhala Literature', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 20:19:13', '2021-07-31 20:19:17'),
(104, 1, 41, 8, 20, 'Commerce | Sinhala Medium', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 20:29:32', '2021-07-31 20:29:36'),
(105, 1, 41, 7, 20, 'Commerce | Sinhala Medium', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 20:34:09', '2021-07-31 20:34:13'),
(106, 1, 42, 8, 21, 'Art | Sinhala Medium', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 22:28:54', '2021-07-31 22:29:17'),
(107, 1, 42, 7, 21, 'Art | Sinhala Medium', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 22:30:33', '2021-07-31 22:30:36'),
(108, 1, 42, 4, 21, 'Art | Sinhala Medium', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 22:31:28', '2021-07-31 22:31:31'),
(109, 1, 42, 3, 21, 'Art | Sinhala Medium', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 22:32:53', '2021-07-31 22:32:56'),
(110, 1, 42, 2, 21, 'Art | Sinhala Medium', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 22:34:59', '2021-07-31 22:35:06'),
(111, 1, 42, 1, 21, 'Art | Sinhala Medium', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 22:35:58', '2021-07-31 22:36:38'),
(112, 1, 43, 8, 22, 'Drama & Theatre | Sinhala Medium', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 22:52:37', '2021-07-31 22:52:41'),
(113, 1, 43, 7, 22, 'Drama & Theatre | Sinhala Medium', NULL, NULL, NULL, NULL, 'Mrs. Gimara Dhanushi', '2021-07-31 22:54:10', '2021-07-31 22:54:13'),
(114, 1, 48, 8, 1, 'Test Course', 'web/C4Of9aTzHWfGdEQN9Xwzngcmb5CySzFOayF0yVXj.jpg', 'web/L6zkSgsiXJLCETeo73MnlSE5ylvslM76kVTX2yrz.jpg', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vitae efficitur elit. Aliquam pulvinar sapien massa, aliquam hendrerit nibh sollicitudin vel. Duis ac egestas urna, ac egestas massa. Morbi et mollis risus. Maecenas ultrices vitae lectus eu aliquet. Maecenas varius nibh vel arcu cursus varius. Sed pulvinar turpis eget nisi viverra efficitur. Fusce non nibh id dolor iaculis tempor. Sed odio est, euismod sit amet convallis ac, condimentum a diam.&nbsp;</span><br></p>', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Proin ligula mi, efficitur sed egestas et, efficitur eu sapien. Cras urna ex, lobortis ac venenatis tristique, maximus vel nisi. Vivamus blandit dictum dolor a auctor. Nam congue ullamcorper rhoncus. Sed ultricies dolor leo, sit amet posuere diam eleifend a. Aliquam rhoncus felis aliquet, posuere eros id, volutpat eros. Cras at congue leo. Phasellus pulvinar leo dolor, vitae lacinia risus luctus dapibus. Morbi feugiat tincidunt risus, in pulvinar nibh venenatis id. Pellentesque tellus tortor, ornare congue maximus non, aliquet quis urna. Etiam nulla arcu, elementum et ante quis, pulvinar mollis nunc. Aliquam et turpis ultricies, viverra leo in, dapibus diam. Donec efficitur pellentesque rhoncus. Pellentesque id auctor odio, vitae pellentesque ante.</span><br></p>', 'Mr. Harsha De Pinto', '2021-08-28 18:33:58', '2021-08-28 18:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `g_batches`
--

CREATE TABLE `g_batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `type` int(11) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` time DEFAULT NULL,
  `end` time DEFAULT NULL,
  `fees` int(11) DEFAULT NULL,
  `teacher_commission` int(11) NOT NULL DEFAULT 70,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `g_batches`
--

INSERT INTO `g_batches` (`id`, `is_active`, `type`, `user_id`, `grade_id`, `subject_id`, `group_id`, `title`, `year`, `day`, `cat`, `start`, `end`, `fees`, `teacher_commission`, `author`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, 1, 1, 1, 'Mass', '2021', 'Sunday', 'Theory', '14:00:00', '16:00:00', 200, 70, 'Mr. Amitha Paranagama', '2021-06-18 13:27:24', '2021-08-23 21:47:31'),
(2, 1, 1, 5, 2, 3, 2, 'Group', '2021', 'Sunday', 'Theory', '13:30:00', '15:15:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-06-29 02:22:45', '2021-07-12 22:22:07'),
(4, 1, 1, 4, 1, 1, 1, 'Group', '2021', 'Wednesday', 'Theory', '18:15:00', '20:15:00', 1300, 70, 'Mrs. Gimara Dhanushi', '2021-07-12 21:03:24', '2021-07-29 15:03:40'),
(5, 1, 1, 4, 2, 1, 6, 'Mass', '2021', 'Saturday', 'Theory', '08:00:00', '10:00:00', 1300, 70, 'Mrs. Gimara Dhanushi', '2021-07-12 21:05:46', '2021-07-29 15:03:17'),
(6, 1, 1, 4, 3, 1, 7, 'Group', '2021', 'Wednesday', 'Theory', '15:00:00', '17:00:00', 1300, 70, 'Mrs. Gimara Dhanushi', '2021-07-12 21:08:30', '2021-07-29 15:02:20'),
(7, 1, 1, 4, 2, 1, 6, 'Group', '2021', 'Friday', 'Theory', '19:00:00', '21:00:00', 1300, 70, 'Mrs. Gimara Dhanushi', '2021-07-12 21:09:54', '2021-07-29 15:02:58'),
(8, 1, 1, 4, 3, 1, 7, 'Mass', '2021', 'Saturday', 'Theory', '10:30:00', '12:30:00', 1300, 70, 'Mrs. Gimara Dhanushi', '2021-07-12 21:12:07', '2021-07-29 15:02:37'),
(9, 1, 1, 4, 4, 1, 8, 'Mass', '2021', 'Friday', 'Theory', '15:00:00', '17:00:00', 1300, 70, 'Mrs. Gimara Dhanushi', '2021-07-12 21:15:38', '2021-07-29 15:01:51'),
(10, 1, 1, 4, 4, 1, 8, 'Group', '2021', 'Sunday', 'Theory', '17:30:00', '19:30:00', 1300, 70, 'Mrs. Gimara Dhanushi', '2021-07-12 21:16:50', '2021-07-29 15:01:30'),
(11, 1, 1, 4, 7, 1, 9, 'Mass', '2021', 'Monday', 'Theory', '15:00:00', '17:00:00', 1300, 70, 'Mrs. Gimara Dhanushi', '2021-07-12 21:18:40', '2021-07-29 15:01:08'),
(12, 1, 1, 4, 7, 1, 9, 'Group', '2021', 'Saturday', 'Theory', '17:00:00', '19:30:00', 1300, 70, 'Mrs. Gimara Dhanushi', '2021-07-12 21:22:37', '2021-07-29 15:00:52'),
(13, 1, 1, 4, 8, 1, 10, 'Mass', '2021', 'Tuesday', 'Theory', '15:00:00', '17:00:00', 1300, 70, 'Mr. Amitha Paranagama', '2021-07-12 21:24:44', '2021-08-23 21:47:02'),
(14, 1, 1, 4, 8, 1, 10, 'Group', '2021', 'Monday', 'Theory', '17:30:00', '20:00:00', 1300, 70, 'Mrs. Gimara Dhanushi', '2021-07-12 21:25:55', '2021-07-29 14:59:56'),
(17, 1, 1, 8, 8, 4, 14, 'Group 01', '2021', 'Friday', 'Theory', '15:00:00', '17:00:00', 900, 70, 'Mrs. Gimara Dhanushi', '2021-07-12 21:43:05', '2021-07-12 21:43:09'),
(18, 1, 1, 8, 8, 4, 14, 'Group 02', '2021', 'Wednesday', 'Theory', '19:00:00', '21:00:00', 1500, 70, 'Mrs. Gimara Dhanushi', '2021-07-12 21:43:55', '2021-07-12 21:44:06'),
(19, 1, 1, 8, 7, 4, 15, 'Group 02', '2021', 'Sunday', 'Theory', '18:00:00', '20:00:00', 1500, 70, 'Mrs. Gimara Dhanushi', '2021-07-12 21:44:54', '2021-07-12 21:44:58'),
(20, 1, 1, 8, 7, 4, 15, 'Group 01', '2021', 'Friday', 'Theory', '17:30:00', '19:30:00', 900, 70, 'Mrs. Gimara Dhanushi', '2021-07-12 21:45:53', '2021-07-12 21:46:15'),
(21, 1, 1, 8, 4, 4, 16, 'Group 02', '2021', 'Friday', 'Theory', '19:00:00', '21:00:00', 1500, 70, 'Mrs. Gimara Dhanushi', '2021-07-12 21:46:58', '2021-07-12 21:47:02'),
(22, 1, 1, 8, 4, 4, 16, 'Group 01', '2021', 'Tuesday', 'Theory', '15:00:00', '17:00:00', 900, 70, 'Mrs. Gimara Dhanushi', '2021-07-12 21:47:48', '2021-07-12 21:47:53'),
(25, 1, 1, 5, 3, 3, 17, 'Group', '2021', 'Sunday', 'Theory', '15:30:00', '17:15:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-12 22:23:16', '2021-07-12 22:23:20'),
(26, 1, 1, 5, 1, 3, 18, 'Group', '2021', 'Tuesday', 'Theory', '17:00:00', '19:00:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-12 22:24:49', '2021-07-12 22:24:52'),
(27, 1, 1, 6, 1, 3, 21, 'Group', '2021', 'Wednesday', 'Theory', '16:00:00', '18:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-14 17:48:36', '2021-07-14 17:48:51'),
(28, 1, 1, 6, 2, 3, 20, 'Group', '2021', 'Saturday', 'Theory', '16:15:00', '18:15:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-14 17:49:42', '2021-07-14 17:49:46'),
(29, 1, 1, 6, 3, 3, 3, 'Group', '2021', 'Wednesday', 'Theory', '18:15:00', '20:15:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-14 17:50:48', '2021-07-14 17:50:56'),
(30, 1, 1, 6, 4, 3, 19, 'Group 02', '2021', 'Sunday', 'Theory', '15:00:00', '17:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-14 17:51:53', '2021-07-14 17:51:57'),
(31, 1, 1, 6, 4, 3, 19, 'Group 01', '2021', 'Saturday', 'Theory', '14:00:00', '16:00:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-14 17:52:38', '2021-07-14 17:52:41'),
(32, 1, 1, 7, 8, 4, 22, 'Group', '2021', 'Tuesday', 'Theory', '19:00:00', '21:00:00', 900, 70, 'Mrs. Gimara Dhanushi', '2021-07-14 18:12:34', '2021-07-14 18:12:38'),
(33, 1, 1, 7, 7, 4, 23, 'Group', '2021', 'Tuesday', 'Theory', '17:00:00', '19:00:00', 900, 70, 'Mrs. Gimara Dhanushi', '2021-07-14 18:13:31', '2021-07-14 18:13:38'),
(34, 1, 1, 7, 4, 4, 24, 'Group 02', '2021', 'Friday', 'Theory', '19:00:00', '21:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-14 18:15:10', '2021-07-14 18:15:13'),
(35, 1, 1, 7, 4, 4, 24, 'Group 01', '2021', 'Thursday', 'Theory', '15:00:00', '17:00:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-14 18:16:09', '2021-07-14 18:16:13'),
(36, 1, 1, 7, 3, 4, 25, 'Group 02', '2021', 'Tuesday', 'Theory', '15:00:00', '17:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-14 18:17:34', '2021-07-14 18:17:46'),
(37, 1, 1, 7, 3, 4, 25, 'Group 01', '2021', 'Saturday', 'Theory', '08:00:00', '10:00:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-14 18:18:26', '2021-07-14 18:18:29'),
(38, 1, 1, 7, 2, 4, 26, 'Group 02', '2021', 'Friday', 'Theory', '17:00:00', '19:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-14 18:19:47', '2021-07-14 18:19:50'),
(39, 1, 1, 7, 2, 4, 26, 'Group 01', '2021', 'Saturday', 'Theory', '10:30:00', '12:30:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-14 18:20:33', '2021-07-14 18:20:37'),
(40, 1, 1, 7, 1, 4, 27, 'Group 02', '2021', 'Thursday', 'Theory', '17:00:00', '19:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-14 18:21:29', '2021-07-14 18:21:33'),
(41, 1, 1, 7, 1, 4, 27, 'Group 01', '2021', 'Friday', 'Theory', '15:00:00', '17:00:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-14 18:22:22', '2021-07-14 18:22:27'),
(42, 1, 1, 20, 8, 3, 28, 'Group', '2021', 'Saturday', 'Theory', '16:30:00', '18:30:00', 900, 70, 'Mrs. Gimara Dhanushi', '2021-07-16 21:04:00', '2021-07-16 21:04:06'),
(43, 1, 1, 20, 7, 3, 29, 'Group', '2021', 'Saturday', 'Theory', '14:30:00', '16:30:00', 900, 70, 'Mrs. Gimara Dhanushi', '2021-07-16 21:05:25', '2021-07-16 21:05:44'),
(44, 1, 1, 19, 8, 3, 30, 'Group', '2021', 'Saturday', 'Theory', '16:45:00', '19:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-16 21:08:01', '2021-07-16 21:08:05'),
(45, 1, 1, 19, 7, 3, 31, 'Group', '2021', 'Saturday', 'Theory', '14:30:00', '16:30:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-16 21:09:07', '2021-07-16 21:09:11'),
(46, 1, 1, 19, 4, 3, 32, 'Group', '2021', 'Saturday', 'Theory', '13:00:00', '14:30:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-16 21:10:55', '2021-07-16 21:11:03'),
(47, 1, 1, 21, 8, 3, 33, 'Group 02', '2021', 'Sunday', 'Theory', '17:00:00', '19:00:00', 1500, 70, 'Mrs. Gimara Dhanushi', '2021-07-16 21:14:09', '2021-07-16 21:14:13'),
(48, 1, 1, 21, 8, 3, 33, 'Group 01', '2021', 'Wednesday', 'Theory', '18:30:00', '21:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-16 21:15:03', '2021-07-16 21:15:20'),
(49, 1, 1, 21, 7, 3, 34, 'Group 02', '2021', 'Friday', 'Theory', '19:30:00', '21:30:00', 1500, 70, 'Mrs. Gimara Dhanushi', '2021-07-16 21:17:17', '2021-07-16 21:17:20'),
(50, 1, 1, 21, 7, 3, 34, 'Group 01', '2021', 'Wednesday', 'Theory', '15:30:00', '18:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-16 21:17:58', '2021-07-16 21:18:24'),
(51, 1, 1, 21, 4, 3, 35, 'Group', '2021', 'Monday', 'Theory', '15:00:00', '17:00:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-16 21:19:49', '2021-07-16 21:20:31'),
(52, 1, 1, 22, 8, 4, 36, 'Group', '2021', 'Thursday', 'Theory', '15:00:00', '17:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-16 21:22:02', '2021-07-16 21:22:19'),
(53, 1, 1, 22, 7, 4, 37, 'Group', '2021', 'Saturday', 'Theory', '14:30:00', '16:30:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-16 21:23:29', '2021-07-16 21:23:42'),
(54, 1, 1, 22, 4, 4, 38, 'Group', '2021', 'Saturday', 'Theory', '18:30:00', '20:30:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-16 21:24:48', '2021-07-16 21:24:57'),
(55, 1, 1, 22, 3, 4, 39, 'Group', '2021', 'Saturday', 'Theory', '08:00:00', '10:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-16 21:26:01', '2021-07-16 21:26:11'),
(56, 1, 1, 22, 2, 4, 40, 'Group', '2021', 'Saturday', 'Theory', '10:30:00', '12:30:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-16 21:27:15', '2021-07-16 21:27:19'),
(57, 1, 1, 22, 1, 4, 41, 'Group 02', '2021', 'Saturday', 'Theory', '16:30:00', '18:30:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-16 21:28:26', '2021-07-16 21:28:30'),
(58, 1, 1, 22, 1, 4, 41, 'Group 01', '2021', 'Thursday', 'Theory', '17:00:00', '19:00:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-16 21:29:08', '2021-07-16 21:29:12'),
(59, 1, 1, 25, 3, 14, 42, 'Mass', '2021', 'Sunday', 'Theory', '13:00:00', '15:00:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-30 19:22:00', '2021-07-30 19:33:27'),
(60, 1, 1, 25, 2, 14, 43, 'Mass', '2021', 'Sunday', 'Theory', '15:30:00', '17:30:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-30 19:23:13', '2021-07-30 19:32:55'),
(61, 1, 1, 25, 1, 14, 44, 'Mass', '2021', 'Sunday', 'Theory', '17:30:00', '19:15:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-30 19:31:22', '2021-07-30 19:31:26'),
(62, 1, 1, 26, 4, 14, 45, 'Group', '2021', 'Monday', 'Theory', '17:00:00', '19:00:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-30 20:16:54', '2021-07-30 20:16:57'),
(63, 1, 1, 26, 3, 14, 46, 'Group', '2021', 'Tuesday', 'Theory', '17:00:00', '18:45:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-30 20:17:58', '2021-07-30 20:18:02'),
(64, 1, 1, 26, 2, 14, 47, 'Group', '2021', 'Tuesday', 'Theory', '15:00:00', '16:45:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-30 20:19:03', '2021-07-30 20:19:12'),
(65, 1, 1, 26, 1, 14, 48, 'Group', '2021', 'Monday', 'Theory', '15:00:00', '17:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-30 20:20:06', '2021-07-30 20:20:11'),
(66, 1, 1, 27, 3, 14, 49, 'Group', '2021', 'Sunday', 'Theory', '13:30:00', '15:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-30 21:11:52', '2021-07-30 21:12:01'),
(67, 1, 1, 27, 2, 14, 50, 'Group', '2021', 'Sunday', 'Theory', '15:30:00', '17:15:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-30 21:13:13', '2021-07-30 21:13:21'),
(68, 1, 1, 27, 1, 14, 51, 'Group', '2021', 'Sunday', 'Theory', '17:30:00', '19:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-30 21:14:06', '2021-07-30 21:14:14'),
(69, 1, 1, 28, 4, 14, 52, 'Group', '2021', 'Saturday', 'Theory', '16:15:00', '18:15:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-30 22:16:53', '2021-07-30 22:16:58'),
(70, 1, 1, 28, 3, 14, 53, 'Group', '2021', 'Thursday', 'Theory', '15:00:00', '17:00:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-30 22:18:03', '2021-07-30 22:18:07'),
(71, 1, 1, 28, 2, 14, 54, 'Group', '2021', 'Thursday', 'Theory', '17:00:00', '19:00:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-30 22:19:08', '2021-07-30 22:19:13'),
(72, 1, 1, 28, 1, 14, 55, 'Group', '2021', 'Monday', 'Theory', '15:00:00', '17:00:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-30 22:20:16', '2021-07-30 22:20:20'),
(74, 1, 1, 29, 8, 14, 56, 'Group', '2021', 'Sunday', 'Theory', '14:00:00', '16:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 00:09:08', '2021-07-31 00:09:23'),
(75, 1, 1, 29, 7, 14, 57, 'Group', '2021', 'Sunday', 'Theory', '16:00:00', '18:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 00:10:10', '2021-07-31 00:10:14'),
(76, 1, 1, 29, 4, 14, 58, 'Group', '2021', 'Thursday', 'Theory', '17:00:00', '19:00:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 00:11:17', '2021-07-31 00:11:26'),
(77, 1, 1, 30, 8, 14, 59, 'Mass', '2021', 'Sunday', 'Theory', '14:00:00', '16:00:00', 900, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 00:16:42', '2021-07-31 00:16:50'),
(78, 1, 1, 30, 8, 14, 59, 'Group', '2021', 'Friday', 'Theory', '19:30:00', '21:30:00', 1200, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 00:17:27', '2021-07-31 00:17:35'),
(79, 1, 1, 30, 7, 14, 60, 'Group', '2021', 'Thursday', 'Theory', '19:30:00', '21:30:00', 1200, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 00:18:22', '2021-07-31 00:18:25'),
(80, 1, 1, 30, 7, 14, 60, 'Mass', '2021', 'Sunday', 'Theory', '16:00:00', '18:00:00', 900, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 00:19:12', '2021-07-31 00:19:15'),
(81, 1, 1, 31, 8, 14, 61, 'Group 02', '2021', 'Saturday', 'Theory', '10:00:00', '12:00:00', 1500, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 15:01:18', '2021-07-31 15:01:28'),
(82, 1, 1, 31, 8, 14, 61, 'Group 01', '2021', 'Monday', 'Theory', '15:00:00', '17:00:00', 1500, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 15:02:12', '2021-07-31 15:02:16'),
(83, 1, 1, 31, 7, 14, 62, 'Group 02', '2021', 'Saturday', 'Theory', '08:00:00', '10:00:00', 1500, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 15:04:09', '2021-07-31 15:04:13'),
(84, 1, 1, 31, 7, 14, 62, 'Group 01', '2021', 'Monday', 'Theory', '17:30:00', '19:30:00', 1500, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 15:04:56', '2021-07-31 15:05:00'),
(85, 1, 1, 32, 8, 15, 63, 'Mass', '2021', 'Friday', 'Theory', '17:00:00', '19:00:00', 900, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 16:16:27', '2021-07-31 16:16:43'),
(86, 1, 1, 32, 8, 15, 63, 'Group', '2021', 'Tuesday', 'Theory', '19:00:00', '21:00:00', 1500, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 16:17:27', '2021-07-31 16:17:33'),
(87, 1, 1, 32, 7, 15, 64, 'Group', '2021', 'Saturday', 'Theory', '20:00:00', '22:00:00', 1500, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 16:19:09', '2021-07-31 16:19:13'),
(88, 1, 1, 32, 7, 15, 64, 'Mass', '2021', 'Friday', 'Theory', '15:00:00', '17:00:00', 900, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 16:20:06', '2021-07-31 16:20:24'),
(90, 1, 1, 32, 4, 15, 65, 'Mass', '2021', 'Tuesday', 'Theory', '17:00:00', '19:00:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 16:21:32', '2021-07-31 16:21:43'),
(91, 1, 1, 32, 3, 15, 66, 'Group', '2021', 'Saturday', 'Theory', '16:30:00', '18:30:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 16:23:28', '2021-07-31 16:23:32'),
(92, 1, 1, 32, 2, 15, 67, 'Mass', '2021', 'Saturday', 'Theory', '18:30:00', '20:00:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 16:24:36', '2021-07-31 16:24:44'),
(93, 1, 1, 32, 1, 15, 68, 'Mass', '2021', 'Saturday', 'Theory', '15:00:00', '16:30:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 16:25:58', '2021-07-31 16:26:03'),
(94, 1, 1, 33, 4, 15, 70, 'Group', '2021', 'Thursday', 'Theory', '17:00:00', '19:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 16:36:16', '2021-07-31 16:36:20'),
(95, 1, 1, 33, 2, 15, 71, 'Group', '2021', 'Monday', 'Theory', '17:00:00', '19:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 16:37:08', '2021-07-31 17:02:56'),
(96, 1, 1, 34, 8, 15, 72, 'Group', '2021', 'Saturday', 'Theory', '08:00:00', '10:00:00', 1500, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 17:15:41', '2021-07-31 17:16:10'),
(97, 1, 1, 34, 8, 15, 72, 'Mass', '2021', 'Wednesday', 'Theory', '15:30:00', '17:30:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 17:17:06', '2021-07-31 17:17:15'),
(98, 1, 1, 34, 7, 15, 73, 'Group', '2021', 'Saturday', 'Theory', '10:00:00', '12:00:00', 1500, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 17:19:30', '2021-07-31 17:19:53'),
(99, 1, 1, 34, 7, 15, 73, 'Mass', '2021', 'Wednesday', 'Theory', '18:00:00', '20:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 17:20:38', '2021-07-31 17:20:49'),
(100, 1, 1, 35, 8, 15, 74, 'Group', '2021', 'Friday', 'Theory', '17:00:00', '19:00:00', 1500, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 17:31:32', '2021-07-31 17:31:37'),
(101, 1, 1, 35, 7, 15, 75, 'Group', '2021', 'Friday', 'Theory', '15:00:00', '17:00:00', 1500, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 17:32:28', '2021-07-31 17:32:32'),
(102, 1, 1, 36, 1, 16, 81, 'Group', '2021', 'Saturday', 'Theory', '14:30:00', '16:00:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 18:00:42', '2021-07-31 18:01:25'),
(103, 1, 1, 36, 2, 16, 80, 'Group', '2021', 'Friday', 'Theory', '15:00:00', '17:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 18:02:11', '2021-07-31 18:02:25'),
(104, 1, 1, 36, 3, 16, 79, 'Group', '2021', 'Friday', 'Theory', '17:00:00', '19:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 18:03:03', '2021-07-31 18:03:07'),
(105, 1, 1, 36, 4, 16, 78, 'Group', '2021', 'Saturday', 'Theory', '08:30:00', '10:30:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 18:04:08', '2021-07-31 18:04:19'),
(106, 1, 1, 36, 7, 16, 77, 'Group', '2021', 'Saturday', 'Theory', '12:30:00', '14:30:00', 1200, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 18:05:23', '2021-07-31 18:05:27'),
(107, 1, 1, 36, 8, 16, 76, 'Group', '2021', 'Saturday', 'Theory', '10:30:00', '12:30:00', 1200, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 18:07:04', '2021-07-31 18:07:08'),
(108, 1, 1, 37, 8, 16, 82, 'Group', '2021', 'Sunday', 'Theory', '14:00:00', '16:00:00', 1200, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 18:15:44', '2021-07-31 18:15:47'),
(109, 1, 1, 37, 4, 16, 84, 'Group', '2021', 'Saturday', 'Theory', '16:00:00', '18:00:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 18:17:30', '2021-07-31 18:17:35'),
(110, 1, 1, 37, 3, 16, 85, 'Group', '2021', 'Saturday', 'Theory', '08:00:00', '10:00:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 18:18:54', '2021-07-31 18:19:00'),
(111, 1, 1, 37, 2, 16, 87, 'Group', '2021', 'Saturday', 'Theory', '10:30:00', '12:30:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 18:20:40', '2021-07-31 18:20:44'),
(112, 1, 1, 37, 1, 16, 88, 'Group', '2021', 'Saturday', 'Theory', '13:00:00', '15:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 18:22:24', '2021-07-31 18:22:44'),
(113, 1, 1, 38, 8, 16, 89, 'Group', '2021', 'Tuesday', 'Theory', '19:00:00', '21:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 19:03:04', '2021-07-31 19:03:28'),
(114, 1, 1, 38, 8, 16, 89, 'Mass', '2021', 'Saturday', 'Theory', '10:30:00', '12:30:00', 900, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 19:04:29', '2021-07-31 19:04:35'),
(115, 1, 1, 38, 7, 16, 90, 'Group', '2021', 'Tuesday', 'Theory', '17:00:00', '19:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 19:05:49', '2021-07-31 19:05:52'),
(116, 1, 1, 38, 7, 16, 90, 'Mass', '2021', 'Sunday', 'Theory', '18:00:00', '20:00:00', 900, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 19:06:55', '2021-07-31 19:07:09'),
(117, 1, 1, 40, 4, 17, 92, 'Group', '2021', 'Tuesday', 'Theory', '20:15:00', '21:45:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 19:56:43', '2021-07-31 19:56:48'),
(118, 1, 1, 40, 3, 17, 93, 'Group', '2021', 'Tuesday', 'Theory', '18:45:00', '20:15:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 19:57:55', '2021-07-31 19:58:10'),
(119, 1, 1, 40, 2, 17, 94, 'Group', '2021', 'Tuesday', 'Theory', '17:00:00', '18:30:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 20:00:19', '2021-07-31 20:00:24'),
(120, 1, 1, 40, 1, 17, 95, 'Group', '2021', 'Tuesday', 'Theory', '15:15:00', '16:45:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 20:02:04', '2021-07-31 20:02:17'),
(121, 1, 1, 39, 4, 17, 96, 'Group', '2021', 'Monday', 'Theory', '19:00:00', '20:30:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 20:04:29', '2021-07-31 20:04:33'),
(122, 1, 1, 39, 3, 17, 97, 'Group', '2021', 'Friday', 'Theory', '17:00:00', '19:00:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 20:06:10', '2021-07-31 20:06:16'),
(123, 1, 1, 39, 2, 17, 98, 'Group', '2021', 'Monday', 'Theory', '15:00:00', '16:45:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 20:08:05', '2021-07-31 20:08:09'),
(124, 1, 1, 39, 1, 17, 99, 'Group', '2021', 'Monday', 'Theory', '17:15:00', '19:00:00', 800, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 20:09:30', '2021-07-31 20:09:46'),
(125, 1, 1, 8, 8, 18, 100, 'Group', '2021', 'Saturday', 'Theory', '08:00:00', '10:00:00', 1500, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 20:14:36', '2021-07-31 20:14:40'),
(126, 1, 1, 8, 7, 18, 101, 'Group', '2021', 'Saturday', 'Theory', '10:00:00', '12:00:00', 1500, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 20:16:21', '2021-07-31 20:16:24'),
(127, 1, 1, 31, 8, 19, 102, 'Group', '2021', 'Saturday', 'Theory', '12:00:00', '14:00:00', 1200, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 20:18:45', '2021-07-31 20:18:49'),
(128, 1, 1, 31, 7, 19, 103, 'Group', '2021', 'Sunday', 'Theory', '18:00:00', '20:00:00', 1200, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 20:19:50', '2021-07-31 20:19:53'),
(129, 1, 1, 41, 8, 20, 104, 'Sp. Group', '2021', 'Friday', 'Theory', '19:30:00', '21:30:00', 1500, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 20:31:41', '2021-07-31 20:31:50'),
(130, 1, 1, 41, 8, 20, 104, 'Group', '2021', 'Thursday', 'Theory', '15:00:00', '17:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 20:32:35', '2021-07-31 20:32:38'),
(131, 1, 1, 41, 8, 20, 104, 'Mass', '2021', 'Sunday', 'Theory', '16:00:00', '18:00:00', 900, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 20:33:25', '2021-07-31 20:33:29'),
(132, 1, 1, 41, 7, 20, 105, 'Sp. Group', '2021', 'Sunday', 'Theory', '20:00:00', '22:00:00', 1500, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 20:35:13', '2021-07-31 20:35:19'),
(133, 1, 1, 41, 7, 20, 105, 'Group', '2021', 'Thursday', 'Theory', '18:00:00', '20:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 20:36:22', '2021-07-31 20:36:25'),
(134, 1, 1, 41, 7, 20, 105, 'Mass', '2021', 'Sunday', 'Theory', '14:00:00', '16:00:00', 900, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 20:37:12', '2021-07-31 20:37:30'),
(135, 1, 1, 42, 8, 21, 106, 'Group', '2021', 'Saturday', 'Theory', '06:00:00', '08:00:00', 1500, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 22:30:07', '2021-07-31 22:30:11'),
(136, 1, 1, 42, 7, 21, 107, 'Group', '2021', 'Saturday', 'Theory', '06:00:00', '08:00:00', 1500, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 22:31:06', '2021-07-31 22:31:09'),
(137, 1, 1, 42, 4, 21, 108, 'Group', '2021', 'Saturday', 'Theory', '06:00:00', '08:00:00', 1500, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 22:32:10', '2021-07-31 22:32:33'),
(138, 1, 1, 42, 3, 21, 109, 'Group', '2021', 'Friday', 'Theory', '15:00:00', '17:00:00', 1200, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 22:33:40', '2021-07-31 22:33:44'),
(139, 1, 1, 42, 2, 21, 110, 'Group', '2021', 'Friday', 'Theory', '15:00:00', '17:00:00', 1200, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 22:35:36', '2021-07-31 22:35:41'),
(140, 1, 1, 42, 1, 21, 111, 'Group', '2021', 'Friday', 'Theory', '15:00:00', '17:00:00', 1200, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 22:37:03', '2021-07-31 22:37:07'),
(141, 1, 1, 43, 8, 22, 112, 'Group', '2021', 'Saturday', 'Theory', '08:00:00', '10:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 22:53:28', '2021-07-31 22:53:33'),
(142, 1, 1, 43, 7, 22, 113, 'Group', '2021', 'Saturday', 'Theory', '10:00:00', '12:00:00', 1000, 70, 'Mrs. Gimara Dhanushi', '2021-07-31 22:55:26', '2021-07-31 22:55:31'),
(143, 1, 1, 48, 8, 1, 114, 'Test Batch Title 01', '2021', 'Sunday', 'Theory', '16:00:00', '18:00:00', 1500, 70, 'Mr. Harsha De Pinto', '2021-08-28 20:33:09', '2021-08-28 20:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `g_mcqs`
--

CREATE TABLE `g_mcqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `type` int(11) NOT NULL DEFAULT 0,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `g_mcqs`
--

INSERT INTO `g_mcqs` (`id`, `is_active`, `type`, `group_id`, `title`, `number`, `time`, `author`, `created_at`, `updated_at`) VALUES
(2, 1, 0, 1, 'Mathematics', 1, 5, 'Mr. Harsha De Pinto', '2021-07-05 10:57:24', '2021-07-05 10:59:38'),
(5, 1, 0, 114, 'Test 01', 1, 5, 'Mr. Harsha De Pinto', '2021-08-28 20:36:30', '2021-08-28 20:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `g_tutorials`
--

CREATE TABLE `g_tutorials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `g_tutorials`
--

INSERT INTO `g_tutorials` (`id`, `is_active`, `group_id`, `title`, `doc`, `author`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 'Mathematics', 'web/z47nU5MHzImxQvMxvkI9r532dnDoEUdMq4Ulxo9a.pdf', 'Mr. Amitha Paranagama', '2021-07-07 12:36:34', '2021-07-07 12:36:34'),
(4, 1, 1, 'Lesson 01', 'web/z3u3oO0Z1owrXldBeYSLdZLJfk7HC2SH9vs9FDcQ.pdf', 'Mr. Amitha Paranagama', '2021-07-07 12:37:18', '2021-07-07 12:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `g_videos`
--

CREATE TABLE `g_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `g_videos`
--

INSERT INTO `g_videos` (`id`, `is_active`, `group_id`, `title`, `vid`, `author`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 'Mathematics', 'https://www.youtube.com/embed/u4SNqup7WAw', 'Mr. Amitha Paranagama', '2021-07-07 12:48:05', '2021-07-07 12:48:05'),
(4, 1, 114, 'Test 01', 'https://www.youtube.com/embed/u4SNqup7WAw', 'Mr. Harsha De Pinto', '2021-08-28 20:35:00', '2021-08-28 20:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `method` int(11) NOT NULL DEFAULT 0,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_holder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_expiry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `md5sig` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `user_id`, `author`, `status`, `method`, `currency`, `card_holder_name`, `card_no`, `card_expiry`, `payment_status`, `payment_id`, `md5sig`, `payment_method`, `created_at`, `updated_at`) VALUES
(4, 10, 'LKR', 2, 2, 'AC1012', 'Manual', 'Manual', 'Manual', 2, 'Manual', 'Manual', 'Manual', '2021-06-30 00:41:52', '2021-07-07 18:15:11'),
(5, 10, 'AC1012', 2, 2, 'LKR', 'Manual', 'Manual', 'Manual', 2, 'Manual', 'Manual', 'Manual', '2021-07-07 18:15:27', '2021-07-07 18:19:03'),
(6, 10, 'AC1012', 2, 2, 'LKR', 'Manual', 'Manual', 'Manual', 2, 'Manual', 'Manual', 'Manual', '2021-07-07 18:20:40', '2021-07-31 21:01:33'),
(7, 14, NULL, 2, 1, 'LKR', 'Harsha', '************1292', '0524', 2, '320025143092', 'F7EBF090D9C9558F12EF2BFCFBDB83B4', 'TEST', '2021-07-08 16:15:20', '2021-07-08 16:22:25'),
(8, 14, 'AC1012', 2, 2, 'LKR', 'Manual', 'Manual', 'Manual', 2, 'Manual', 'Manual', 'Manual', '2021-07-08 16:26:02', '2021-07-08 16:26:49'),
(9, 24, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-29 02:41:28', '2021-07-29 02:41:28'),
(10, 10, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-31 21:04:12', '2021-07-31 21:04:12'),
(11, 45, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-09 23:10:58', '2021-08-09 23:10:58'),
(13, 47, 'AC1012', 2, 2, 'LKR', 'Manual', 'Manual', 'Manual', 2, 'Manual', 'Manual', 'Manual', '2021-08-28 22:42:58', '2021-08-30 18:44:36'),
(19, 47, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-08-30 18:44:41', '2021-08-30 18:44:41');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `b_payment_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `invoice_id`, `b_payment_id`, `title`, `author`, `amount`, `created_at`, `updated_at`) VALUES
(2, 4, 1, '2021June', 'Mr. Kemindu Induvara', 1500, '2021-06-30 01:32:11', '2021-06-30 01:32:11'),
(5, 5, 3, '2021July', 'Mr. Accountant Sample', 1500, '2021-07-07 18:18:57', '2021-07-07 18:18:57'),
(7, 7, 6, '2021July', 'Ms. Chanuthi Paranagama', 1500, '2021-07-08 16:20:04', '2021-07-08 16:20:04'),
(8, 8, 5, '2021July', 'Mr. Accountant Sample', 1500, '2021-07-08 16:26:39', '2021-07-08 16:26:39'),
(10, 9, 7, '2021July', 'Mr. Amitha Paranagama', 1300, '2021-07-29 02:41:42', '2021-07-29 02:41:42'),
(12, 6, 2, '2021June', 'Mr. Accountant Sample', 1500, '2021-07-31 21:01:24', '2021-07-31 21:01:24'),
(13, 6, 4, '2021July', 'Mr. Accountant Sample', 1500, '2021-07-31 21:01:27', '2021-07-31 21:01:27'),
(14, 11, 8, '2021August', 'Miss. NIMMI MUNASINGHE', 1300, '2021-08-09 23:11:09', '2021-08-09 23:11:09'),
(18, 10, 11, '2021August', 'Mr. Kemindu Induvara', 200, '2021-08-23 21:48:02', '2021-08-23 21:48:02'),
(32, 13, 28, '2021August', 'Mr.Accountant Sample', 1000, '2021-08-30 18:44:05', '2021-08-30 18:44:05'),
(33, 13, 27, '2021August', 'Mr.Accountant Sample', 750, '2021-08-30 18:44:12', '2021-08-30 18:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `i_accounts`
--

CREATE TABLE `i_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in` int(11) DEFAULT NULL,
  `out` int(11) DEFAULT NULL,
  `bal` int(11) DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `i_a_entries`
--

CREATE TABLE `i_a_entries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `i_account_id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_15_000855_create_roles_table', 1),
(5, '2021_06_15_221849_create_abouts_table', 2),
(6, '2021_06_16_191610_create_grades_table', 3),
(7, '2021_06_16_210153_create_subjects_table', 4),
(8, '2021_06_16_234635_create_s_teachers_table', 5),
(9, '2021_06_17_224933_create_groups_table', 6),
(10, '2021_06_18_171108_create_g_batches_table', 7),
(12, '2021_06_27_225221_create_msgs_table', 8),
(13, '2021_06_28_072820_create_d_logs_table', 9),
(14, '2021_06_29_075856_create_b_students_table', 10),
(15, '2021_06_29_081757_create_b_payments_table', 10),
(16, '2021_06_30_051534_create_invoices_table', 11),
(18, '2021_06_30_051557_create_items_table', 12),
(19, '2021_07_03_105743_create_onlines_table', 13),
(20, '2021_07_04_115520_create_g_tutorials_table', 14),
(21, '2021_07_04_115908_create_b_tutorials_table', 14),
(22, '2021_07_04_132539_create_g_videos_table', 15),
(23, '2021_07_04_132552_create_b_videos_table', 15),
(24, '2021_07_05_154014_create_g_mcqs_table', 16),
(25, '2021_07_05_154553_create_m_questions_table', 16),
(26, '2021_07_05_165006_create_b_mcqs_table', 17),
(27, '2021_07_06_175022_create_m_marks_table', 18),
(28, '2021_07_06_175051_create_m_results_table', 18),
(29, '2021_08_29_024014_create_u_accounts_table', 19),
(30, '2021_08_29_024735_create_u_a_entries_table', 20),
(31, '2021_08_29_025444_create_i_accounts_table', 21),
(32, '2021_08_29_025640_create_i_a_entries_table', 21),
(33, '2021_08_29_025934_create_b_s_accounts_table', 22),
(34, '2021_08_29_030428_create_b_s_a_entries_table', 22),
(35, '2021_08_29_030900_create_b_t_accounts_table', 23),
(36, '2021_08_29_030915_create_b_t_a_entries_table', 23),
(37, '2021_08_29_031741_create_b_i_accounts_table', 24),
(38, '2021_08_29_031752_create_b_i_a_entries_table', 24),
(39, '2021_08_31_032541_create_z_accounts_table', 25);

-- --------------------------------------------------------

--
-- Table structure for table `msgs`
--

CREATE TABLE `msgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `send_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` int(11) NOT NULL,
  `msg` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `msgs`
--

INSERT INTO `msgs` (`id`, `user_id`, `send_by`, `mobile`, `msg`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'Mr. Harsha De Pinto', 774395726, 'Hi, Test Msg 2', NULL, '2021-06-27 17:40:57', '2021-06-27 17:40:57'),
(2, 4, 'Mr. Harsha De Pinto', 774395726, 'Sent', NULL, '2021-06-27 18:47:00', '2021-06-27 18:47:00'),
(3, 4, 'Mr. Harsha De Pinto', 774395726, 'Test message 6', 'success', '2021-06-27 18:50:14', '2021-06-27 18:50:14'),
(4, 4, 'Mr. Harsha De Pinto', 773536762, 'This is a test SMS from Orbit Learning. Please Ignore and do not Reply. Thanks!', 'success', '2021-06-28 00:57:47', '2021-06-28 00:57:47'),
(5, 5, 'Mr. Harsha De Pinto', 716213840, 'This is a test SMS from Orbit Learning. Please Ignore and do not Reply. Thanks!', 'success', '2021-06-28 00:57:47', '2021-06-28 00:57:47'),
(6, 6, 'Mr. Harsha De Pinto', 767711519, 'This is a test SMS from Orbit Learning. Please Ignore and do not Reply. Thanks!', 'success', '2021-06-28 00:57:47', '2021-06-28 00:57:47'),
(7, 7, 'Mr. Harsha De Pinto', 712691726, 'This is a test SMS from Orbit Learning. Please Ignore and do not Reply. Thanks!', 'success', '2021-06-28 00:57:47', '2021-06-28 00:57:47'),
(8, 8, 'Mr. Harsha De Pinto', 774395726, 'This is a test SMS from Orbit Learning. Please Ignore and do not Reply. Thanks!', 'success', '2021-06-28 00:57:47', '2021-06-28 00:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `m_marks`
--

CREATE TABLE `m_marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `b_student_id` bigint(20) UNSIGNED NOT NULL,
  `b_mcq_id` bigint(20) UNSIGNED NOT NULL,
  `paper_mark` int(11) DEFAULT NULL,
  `student_mark` int(11) DEFAULT NULL,
  `average` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_marks`
--

INSERT INTO `m_marks` (`id`, `b_student_id`, `b_mcq_id`, `paper_mark`, `student_mark`, `average`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 9, 6, 67, '2021-07-06 12:46:24', '2021-07-06 12:46:24');

-- --------------------------------------------------------

--
-- Table structure for table `m_questions`
--

CREATE TABLE `m_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `g_mcq_id` bigint(20) UNSIGNED NOT NULL,
  `number` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `ans` int(11) DEFAULT NULL,
  `q_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_audio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_vid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_questions`
--

INSERT INTO `m_questions` (`id`, `g_mcq_id`, `number`, `marks`, `ans`, `q_img`, `s_img`, `s_audio`, `s_vid`, `s_des`, `author`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 3, 1, 'web/sclrLP4O1dr0JavLV6S4HbL1efo7qbneHB8hM5v9.png', 'web/4pWfRCSTn6TyYLWOeleFJ7P5mgHsx69exqpMsH54.png', NULL, NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-05 11:06:43', '2021-07-05 11:06:43'),
(3, 2, 2, 3, 2, 'web/DxpVa6QSfcAeEAf6XIAq2Gmjr0oaG0mftfJH28Ds.png', 'web/lzz5LBTESia8bg2RfAnud2zjVKekAFMOq44gXmNf.png', NULL, NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-05 11:07:08', '2021-07-05 11:07:08'),
(4, 2, 3, 3, 3, 'web/d284mQFCQkcRf5Uv2ukYzNFYgHfrcK4Zn5UgSGCQ.png', 'web/IZvLmf6lufAlspyEPsH1muqDtCkGZw684wpkoKza.png', NULL, NULL, NULL, 'Mr. Harsha De Pinto', '2021-07-05 11:07:30', '2021-07-05 11:07:30'),
(7, 5, 1, 4, 2, 'web/YBWNHYUhORPfoKzKxslEJ2epicVED41wpZTWpYQK.png', 'web/uPQgzjbl7BKRX900Yu5y0b0ixrwSfiiDivNP4IBf.png', NULL, NULL, NULL, 'Mr. Harsha De Pinto', '2021-08-28 20:38:04', '2021-08-28 20:38:04'),
(8, 5, 2, 5, 2, 'web/3NI4q0TqqmNzYzdqJ6Gj7DmCF3dRtLR8rB0hy0jl.png', 'web/olXpYnlBGZmRGMF3fpgDHQ6DKDbm79C64x4CtTG6.png', NULL, NULL, NULL, 'Mr. Harsha De Pinto', '2021-08-28 20:39:04', '2021-08-28 20:39:04');

-- --------------------------------------------------------

--
-- Table structure for table `m_results`
--

CREATE TABLE `m_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `b_student_id` bigint(20) UNSIGNED NOT NULL,
  `b_mcq_id` bigint(20) UNSIGNED NOT NULL,
  `m_mark_id` bigint(20) UNSIGNED NOT NULL,
  `m_question_id` bigint(20) UNSIGNED NOT NULL,
  `q_number` int(11) DEFAULT NULL,
  `q_answer` int(11) DEFAULT NULL,
  `s_answer` int(11) DEFAULT NULL,
  `result` int(11) DEFAULT NULL,
  `q_mark` int(11) DEFAULT NULL,
  `s_mark` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_results`
--

INSERT INTO `m_results` (`id`, `b_student_id`, `b_mcq_id`, `m_mark_id`, `m_question_id`, `q_number`, `q_answer`, `s_answer`, `result`, `q_mark`, `s_mark`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 1, 2, 1, 1, 1, 1, 3, 3, '2021-07-06 12:46:24', '2021-07-06 12:46:24'),
(2, 2, 2, 1, 3, 2, 2, 2, 1, 3, 3, '2021-07-06 12:46:24', '2021-07-06 12:46:24'),
(3, 2, 2, 1, 4, 3, 3, 1, 0, 3, 0, '2021-07-06 12:46:24', '2021-07-06 12:46:24');

-- --------------------------------------------------------

--
-- Table structure for table `onlines`
--

CREATE TABLE `onlines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `g_batch_id` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agenda` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meeting_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meeting_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meeting_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assistant_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `host_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_url` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `onlines`
--

INSERT INTO `onlines` (`id`, `g_batch_id`, `author`, `status`, `topic`, `agenda`, `meeting_type`, `meeting_id`, `meeting_password`, `assistant_id`, `host_id`, `join_url`, `start_time`, `start_url`, `created_at`, `updated_at`) VALUES
(2, 1, 'Mr. Harsha De Pinto', 0, 'Test Meeting By Harsha | Do not delete', 'Test', '2', '87841058113', '569684', 'NA', 'B81Ps7XRSSC-v7VVnSnGRw', 'https://us02web.zoom.us/j/87841058113?pwd=VTg1NWR5akVKak5WZVV0c2hocEZxZz09', '2021-07-04T16:30:00Z', 'https://us02web.zoom.us/s/87841058113?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IkI4MVBzN1hSU1NDLXY3VlZuU25HUnciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEwMCwid2NkIjoidXMwMiIsImNsdCI6MCwic3RrIjoiU20yOGhuVGZvTlFWNTU3SG1GMzh6WFdnYmdjS1d4eF81OTk3d2preXZhOC5CZ1lzV1UxUWRWWlZZbVIyWmpsMFpHeG1lazluYlM4d2NUSlRSM1pSUjJGUFpscFZTSFowVW1kcVprZzFiejFBTm1Sa05tWXlabUkwTkRRM05UTXhNakkyTkRRd1lUVXhPR0ZoTlRFNE5qSTNaakprWkRNMFpUbGtZek00T1dRNFl6YzRNell3TkdJelpEQmxOVE5rTVFBTU0wTkNRWFZ2YVZsVE0zTTlBQVIxY3pBeUFBQUJlbkFBQ3ZzQUVuVUFBQUEiLCJleHAiOjE2MjUzODM4ODgsImlhdCI6MTYyNTM3NjY4OCwiYWlkIjoidTlLbTcxT1BSbktTaS0wZFgxYlNfZyIsImNpZCI6IiJ9.eFQx3kxQ9Qf2myJpSvZN-OX0EYhhzw8isvOc_p6yrUk', '2021-07-04 05:31:28', '2021-07-04 05:31:28'),
(3, 1, 'Mr. Amitha Paranagama', 0, 'Test Meeting', 'Test', '2', '88908029047', '596034', 'NA', 'B81Ps7XRSSC-v7VVnSnGRw', 'https://us02web.zoom.us/j/88908029047?pwd=M1RkVmI3VE9vQWF1YjYvbmNFandxZz09', '2021-07-08T04:33:00Z', 'https://us02web.zoom.us/s/88908029047?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IkI4MVBzN1hSU1NDLXY3VlZuU25HUnciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEwMCwid2NkIjoidXMwMiIsImNsdCI6MCwic3RrIjoiZ3J0Q3ZQNHZqZVM2UkhwejRFUnZiY2dZampzcE5HN1kwNEhmSDlDYW1EOC5CZ1lzV1UxUWRWWlZZbVIyWmpsMFpHeG1lazluYlM4d2NUSlRSM1pSUjJGUFpscFZTSFowVW1kcVprZzFiejFBTm1Sa05tWXlabUkwTkRRM05UTXhNakkyTkRRd1lUVXhPR0ZoTlRFNE5qSTNaakprWkRNMFpUbGtZek00T1dRNFl6YzRNell3TkdJelpEQmxOVE5rTVFBTU0wTkNRWFZ2YVZsVE0zTTlBQVIxY3pBeUFBQUJlb1JsSkgwQUVuVUFBQUEiLCJleHAiOjE2MjU3MjYwNTgsImlhdCI6MTYyNTcxODg1OCwiYWlkIjoidTlLbTcxT1BSbktTaS0wZFgxYlNfZyIsImNpZCI6IiJ9.SSa4p6uqaDAOSEhi5GVPs7NvV5PfoMYLpQpqczrVjlk', '2021-07-08 16:04:18', '2021-07-08 16:04:18'),
(4, 143, 'Mr. Harsha De Pinto', 0, 'Test By Harsha', 'Test', '2', '85370607741', '221267', 'NA', 'B81Ps7XRSSC-v7VVnSnGRw', 'https://us02web.zoom.us/j/85370607741?pwd=endYaFJtWjFmOUFQMk13V1VQRThZdz09', '2021-08-30T23:00:00Z', 'https://us02web.zoom.us/s/85370607741?zak=eyJ0eXAiOiJKV1QiLCJzdiI6IjAwMDAwMSIsInptX3NrbSI6InptX28ybSIsImFsZyI6IkhTMjU2In0.eyJhdWQiOiJjbGllbnRzbSIsInVpZCI6IkI4MVBzN1hSU1NDLXY3VlZuU25HUnciLCJpc3MiOiJ3ZWIiLCJzdHkiOjEwMCwid2NkIjoidXMwMiIsImNsdCI6MCwic3RrIjoicW1BTy1MNTBLMnpuQk1BNVVEcGJXWUM1cncxU1c0VVdtbjhXVkNrM0pLay5CZ1lzV1UxUWRWWlZZbVIyWmpsMFpHeG1lazluYlM4d2NUSlRSM1pSUjJGUFpscFZTSFowVW1kcVprZzFiejFBTm1Sa05tWXlabUkwTkRRM05UTXhNakkyTkRRd1lUVXhPR0ZoTlRFNE5qSTNaakprWkRNMFpUbGtZek00T1dRNFl6YzRNell3TkdJelpEQmxOVE5rTVFBTU0wTkNRWFZ2YVZsVE0zTTlBQVIxY3pBeUFBQUJlNWxJSV9FQUVuVUFBQUEiLCJleHAiOjE2MzAzNzE0NDcsImlhdCI6MTYzMDM2NDI0NywiYWlkIjoidTlLbTcxT1BSbktTaS0wZFgxYlNfZyIsImNpZCI6IiJ9.TNSiJegwC2ypga1vg_og30YiGz-Vri5JrZvuRmo1oM0', '2021-08-30 22:57:27', '2021-08-30 22:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Teacher', NULL, NULL),
(3, 'Manager', NULL, NULL),
(4, 'Student', NULL, NULL),
(5, 'Finance ', NULL, NULL),
(6, 'Graphic', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `title`, `author`, `created_at`, `updated_at`) VALUES
(1, 'Mathematics', 'Mr. Harsha De Pinto', '2021-06-16 15:42:24', '2021-06-28 03:26:29'),
(3, 'Science', NULL, '2021-06-16 15:44:46', '2021-06-16 15:44:46'),
(4, 'English', NULL, '2021-06-16 18:49:06', '2021-06-16 18:49:06'),
(14, 'Sinhala', 'Mrs. Gimara Dhanushi', '2021-07-30 19:17:07', '2021-07-30 19:17:07'),
(15, 'History', 'Mrs. Gimara Dhanushi', '2021-07-31 16:11:30', '2021-07-31 16:11:30'),
(16, 'ICT', 'Mrs. Gimara Dhanushi', '2021-07-31 17:50:51', '2021-07-31 17:50:51'),
(17, 'Tamil Language', 'Mrs. Gimara Dhanushi', '2021-07-31 19:55:01', '2021-07-31 19:55:01'),
(18, 'English Literature', 'Mrs. Gimara Dhanushi', '2021-07-31 20:12:24', '2021-07-31 20:12:24'),
(19, 'Sinhala Literature', 'Mrs. Gimara Dhanushi', '2021-07-31 20:12:48', '2021-07-31 20:12:48'),
(20, 'Commerce', 'Mrs. Gimara Dhanushi', '2021-07-31 20:24:07', '2021-07-31 20:24:07'),
(21, 'Art', 'Mrs. Gimara Dhanushi', '2021-07-31 22:28:03', '2021-07-31 22:28:03'),
(22, 'Drama & Theatre', 'Mrs. Gimara Dhanushi', '2021-07-31 22:52:13', '2021-07-31 22:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `s_teachers`
--

CREATE TABLE `s_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `s_teachers`
--

INSERT INTO `s_teachers` (`id`, `user_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(2, 4, 1, '2021-06-16 18:48:43', '2021-06-16 18:48:43'),
(3, 5, 3, '2021-06-16 18:49:17', '2021-06-16 18:49:17'),
(4, 6, 3, '2021-06-16 18:49:26', '2021-06-16 18:49:26'),
(5, 7, 4, '2021-06-16 18:49:34', '2021-06-16 18:49:34'),
(6, 8, 4, '2021-06-16 18:49:46', '2021-06-16 18:49:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `gender` int(11) NOT NULL,
  `mobile` int(11) NOT NULL,
  `opt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_sadhana` int(11) NOT NULL DEFAULT 0,
  `sadhana_reg_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parents_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_advanced` int(11) NOT NULL DEFAULT 0,
  `welfare_teachers` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `is_active`, `gender`, `mobile`, `opt`, `user_name`, `author`, `image`, `f_name`, `l_name`, `title`, `b_day`, `school`, `address`, `contact`, `des`, `des2`, `email`, `email_verified_at`, `password`, `is_sadhana`, `sadhana_reg_number`, `barcode`, `parents_name`, `max_advanced`, `welfare_teachers`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 774395726, '54156', 'TH1001', 'Online', 'users/u6uRzlCBDNWIs4cXyq74m3jdzAm3CnLnFoEwpJKe.jpg', 'Harsha', 'De Pinto', 'Mr.', '09-May-1988', 'Z Tech Digital', NULL, '<p>0112802203</p>', NULL, NULL, 'designerdepinto@gmail.com', NULL, '$2y$10$88U9GJBgCfCNViwqfPfZbutyn2cndQGHKSdSuvJgraAfs1cqPPgKu', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-06-14 19:25:25', '2021-07-08 15:15:56'),
(4, 2, 1, 1, 773536762, NULL, 'TE1004', 'Mr. Harsha De Pinto', 'users/qao9QNZbUU9hqoMW8NDoZPBiok61uZ0z7fc73QLX.jpg', 'Amitha', 'Paranagama', 'Mr.', NULL, 'Sadhana', 'truyttr', NULL, '<span style=\"color: rgb(33, 37, 41);\">Mathematics Teacher</span>', '<p>Vestibulum eu turpis risus. Nullam fringilla diam tellus, eu volutpat massa ullamcorper non. Nullam lorem felis, sollicitudin vitae semper sit amet, facilisis sit amet lacus. Suspendisse ut ligula varius, dignissim velit sit amet, maximus est. Etiam nec mauris augue. Ut viverra tortor orci, ac ultricies magna molestie ut</p><p>Vestibulum eu turpis risus. Nullam fringilla diam tellus, eu volutpat massa ullamcorper non. Nullam lorem felis, sollicitudin vitae semper sit amet, facilisis sit amet lacus. Suspendisse ut ligula varius, dignissim velit sit amet, maximus est. Etiam nec mauris augue. Ut viverra tortor orci, ac ultricies magna molestie ut<br></p>', 'aparanagama73@gmail.com', NULL, '$2y$10$6Z3M6WNXvcCT0cLAhN5pEupB4afg1XaLho0WnLmF5RibwXIGQ7Cw2', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-06-16 16:16:35', '2021-06-28 00:44:02'),
(5, 2, 1, 2, 716213840, NULL, 'TE1005', 'Mr. Harsha De Pinto', 'users/EdvLXDC4NxLVxwWOkMgN53ct4qzatKLg7SRpqQ3W.jpg', 'Upuli', 'Jayamaha', 'Ms.', NULL, 'Sadhana', NULL, NULL, '<span style=\"color: rgb(33, 37, 41);\">Science Teacher</span>', NULL, 'upuli.jayamaha@gmail.com', NULL, '$2y$10$wLFEZ2PFozYlaoAPVLnw1OcNT2FTAPBjAUDruUJmGtIyFkvebz3OO', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-06-16 16:46:55', '2021-06-27 17:06:02'),
(6, 2, 1, 1, 767711519, NULL, 'TE1006', 'Admin', 'users/TNDTqNWX1fT3rCxBFiRy0bSvAQQjJaD1YWc9xKk2.jpg', 'Prabath', 'Chathuranga', 'Mr.', NULL, 'Sadhana', NULL, NULL, '<p>Science Teacher</p>', NULL, 'prabathchathuranga102@gmail.com', NULL, '$2y$10$aByaYJ8DUaQq/4CsegMoLe9qCUTsYNBoNFxWlITxeOl925NsX6U3m', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-06-16 16:51:27', '2021-06-16 17:16:40'),
(7, 2, 1, 1, 712691726, NULL, 'TE1007', 'Mr. Harsha De Pinto', 'users/SpZIHEXJ87eTUt28vAETC0XQQpgQDTabS4LWx3Fq.jpg', 'Kamal', 'Vithana', 'Mr.', NULL, 'Sadhana', NULL, NULL, '<p>English Teacher</p>', NULL, 'kamalvithana@yahoo.com', NULL, '$2y$10$Pw5HG6n52kxHOoapfZ74TuQBDxAz7BYItwCoLeYPOYOjna2Tklfn2', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-06-16 16:53:16', '2021-06-28 00:43:25'),
(8, 2, 1, 1, 774157722, NULL, 'TE1008', 'Mrs. Gimara Dhanushi', 'users/IVxHXAXxLgtre5YxiFDhGIvJFWhm4Wdf4oI3etUw.jpg', 'Dhanushka', 'S Kulathilaka', 'Mr.', NULL, 'Sadhana', '<p><span style=\"color: rgb(80, 80, 80); font-family: \"Roboto Condensed\", sans-serif; font-size: 16px;\">There are many variations of passages of Lorem Ipsum available, but the majority� </span><br></p>', NULL, '<p>English Teacher</p>', NULL, 'dhanushka2500@yahoo.com', NULL, '$2y$10$gKKp5G1eDjP9J25AyH6X1.zh5qVZJKZVbVWHxzdozpWtp6sGRTjje', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-06-16 16:55:12', '2021-07-12 20:39:53'),
(9, 1, 1, 1, 773536762, NULL, 'TE1009', 'Admin', 'users/hFRKdFOZx2FvpqMlmuWdw9hMsPZqo8GUNLyY1aC2.jpg', 'Amitha', 'Paranagama', 'Mr.', NULL, 'Sadhana', NULL, NULL, NULL, NULL, 'amitha@admin.com', NULL, '$2y$10$Q0FKFYZgxL1euAUydRI5lusv2LNWog7md04u7BsuRU7qlmVSUSuEC', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-06-18 07:48:23', '2021-06-18 07:48:23'),
(10, 4, 1, 1, 774395726, '20394', 'ST1010', 'Online', NULL, 'Kemindu', 'Induvara', 'Mr.', '09-May-1988', 'St. Thomas College', NULL, NULL, NULL, NULL, 'kemindu@pinto.com', NULL, '$2y$10$TYNA4VTJxHxzAeC6FXwl0uchWvR5/MFA4vMacwcbVfR4E6yrscN0y', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-06-28 06:16:41', '2021-07-03 13:49:47'),
(12, 5, 1, 1, 774395726, NULL, 'AC1012', 'Mr. Harsha De Pinto', 'users/3eBIj74rW279P8BDiNIUEHzmXrtqoJl3nOXYd1yL.png', 'Accountant', 'Sample', 'Mr.', NULL, 'Sadhana Educational', 'eftgyg', NULL, 'rwetrgtrg', NULL, 'accountant@orbit.com', NULL, '$2y$10$mKQLJycVr2WnHCssdWtoy.PDb2Djj.y6oqoFs0f3k6082FP3g1rC6', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-07 14:29:56', '2021-07-07 19:17:47'),
(13, 6, 1, 1, 771129161, NULL, 'DE1013', 'Mr. Harsha De Pinto', 'users/ve2qsLNYwT1AkgziFHqkPTquGbhOkopjgOVMklZR.jpg', 'Udara', 'Kumarasiri', 'Mr.', NULL, 'Rocket Science Studio', '<b style=\"color: rgb(68, 68, 68); font-family: Calibri, sans-serif; font-size: 14.6667px;\"><span style=\"font-size: 16pt; font-family: Arial, Helvetica, sans-serif; color: rgb(222, 106, 25); border: 1pt none windowtext; padding: 0cm;\">Rocket&nbsp;Science</span></b>', NULL, '<b style=\"color: rgb(68, 68, 68); font-family: Calibri, sans-serif; font-size: 14.6667px;\"><span style=\"font-size: 16pt; font-family: Arial, Helvetica, sans-serif; color: rgb(222, 106, 25); border: 1pt none windowtext; padding: 0cm;\">Rocket Science</span></b>', NULL, 'udarak@live.com', NULL, '$2y$10$kSSG8fLZUKlxA/1qrMM.P.lO9.7mUEfWgSIk7kPHvyw31MMMCVgF2', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-07 19:09:54', '2021-07-07 19:27:58'),
(14, 4, 1, 2, 773536762, '51309', 'ST1014', 'Online', NULL, 'Chanuthi', 'Paranagama', 'Ms.', NULL, 'anula vidiyalay', NULL, NULL, NULL, NULL, 'chanu@gmail.com', NULL, '$2y$10$SIPd4.r7VwbKZMaiWzecR.BJdn7Jkmh9W4mpaCL1kDAe0FM1.ix5W', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-08 16:11:10', '2021-07-08 16:11:58'),
(15, 1, 1, 2, 702187326, NULL, 'TE1015', 'Mr. Harsha De Pinto', 'users/gDTTFDxtejt0888iAwUoGmwyD45dbskkRG7Zv9Dd.jpg', 'Gimara', 'Dhanushi', 'Mrs.', NULL, 'Sadhana', NULL, NULL, NULL, NULL, 'gimaradhanushi@gmail.com', NULL, '$2y$10$YMCal.Mzx8E.yrcYN9PMgOWuHcqgDnT97NVlf830Moj3a/yn9yVoq', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-12 18:07:39', '2021-07-12 18:27:33'),
(19, 2, 1, 1, 777464087, NULL, 'TE1019', 'Mrs. Gimara Dhanushi', 'users/1aYGNoDtS2IpaqgxyRtkimABZTrqThKVCqExHo7z.jpg', 'Chamila', 'Priyankara', 'Mr.', NULL, 'Sadhana', NULL, NULL, '<p>Science Teacher</p>', NULL, 'chamilapriyankara@gmail.com', NULL, '$2y$10$EsPsBdZlaQVpSTh6P8FdwOBaLePVIo.nXOSzCp50zng1LDM6sGSmm', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-16 19:45:14', '2021-07-16 19:57:38'),
(20, 2, 1, 1, 714977887, NULL, 'TE1020', 'Mrs. Gimara Dhanushi', 'users/8LvBqjpuv595CXT1D1wS569vpBraWtTZ3BOkfixl.jpg', 'Sudath', 'Diyaguarachchi', 'Mr.', NULL, 'Sadhana', NULL, NULL, '<p>Science Teacher</p>', NULL, 'sudathdiyagu@gmail.com', NULL, '$2y$10$VKrnsFDVa.GDLx6BRo1VJe88hLzK5KaEYkZRGx/2eeYmr5Cdqy986', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-16 19:53:58', '2021-07-31 20:48:58'),
(21, 2, 1, 1, 711281397, NULL, 'TE1021', 'Mrs. Gimara Dhanushi', 'users/3Z6fwvFdQWPd305iuWq9O8u98Qv5aaotPgy65Ekr.jpg', 'Chamupathi', 'Rajarathne', 'Mr.', NULL, 'Sadhana', NULL, NULL, 'Science Teacher', NULL, 'chamupathirajarathne@gmail.com', NULL, '$2y$10$sHPhFJ2S1e4tyi2.0eAUDu6MwSIcmsfJ1QJYSPIcaJydglWmq7Q5u', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-16 20:03:05', '2021-07-16 20:03:05'),
(22, 2, 1, 1, 724478287, NULL, 'TE1022', 'Mrs. Gimara Dhanushi', 'users/4LM39aykcOjakRqXKPbr5FWeuO2brnr11A4djzjm.jpg', 'Samanthika', 'Bandara', 'Mr.', NULL, 'Sadhana', NULL, NULL, 'English Teacher', NULL, 'samanthikabandara@gmail.com', NULL, '$2y$10$h6WEn8h5w5GH6n9yVfN2auUNwb//WcKPaB8XJqav31nzB2vTPylNG', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-16 20:08:16', '2021-07-16 20:11:44'),
(23, 2, 1, 2, 773206990, NULL, 'TE1023', 'Mrs. Gimara Dhanushi', 'users/xlS2BK4hrKoRA1tWRQB84bxPbJLPr79AxAAdYTvv.jpg', 'Charitha', 'Ginige', 'Mrs.', NULL, 'Sadhana', NULL, NULL, 'English Teacher', NULL, 'charithaginige@gmail.com', NULL, '$2y$10$amYGW18OPwudYmkcYiNqPugP/gh2BQoQaR4F9DSqxUayxPC4EVg/e', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-16 20:16:21', '2021-07-16 20:16:43'),
(24, 4, 1, 1, 773536762, '53115', 'ST1024', 'Online', NULL, 'Amitha', 'Paranagama', 'Mr.', NULL, 'Dvp', NULL, NULL, NULL, NULL, 'nimmimunasinghe@gmail.com', NULL, '$2y$10$9tnJwooL3JsYetO0CVJL4OiWc653QlPyeHRSagTelS9MWj9LUH9z2', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-29 02:33:48', '2021-07-29 02:38:12'),
(25, 2, 1, 1, 713025177, NULL, 'TE1025', 'Mrs. Gimara Dhanushi', 'users/y2wF1aaEJi3yMW0xZ4CcLoKztwoglkZ8TObiZig8.jpg', 'Priyantha', 'Jayasinghe', 'Mr.', NULL, 'Sadhana', NULL, NULL, 'Sinhala Teacher', NULL, 'priyanthajayasinghe@gmail.com', NULL, '$2y$10$6ZgRrDia1Gvc.5c9C1ORvee1zht6dU8Zn/JiVikk9914Cyyw2DOFi', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-30 19:14:50', '2021-07-30 19:14:50'),
(26, 2, 1, 1, 718108255, NULL, 'TE1026', 'Mrs. Gimara Dhanushi', 'users/J0hwQvHfxmy5QUKpAjqND12BbWQK4NEHISShPaou.jpg', 'Sisira', 'Muthumala', 'Mr.', NULL, 'Sadhana', NULL, NULL, 'Sinhala Teacher', NULL, 'sisiramuthumala@gmail.com', NULL, '$2y$10$q3ZhmkzXwNhe59H/9HoqpudvSjn8SQqx4dtd7P0Dg20gvBvUVcbzG', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-30 19:44:58', '2021-07-30 19:44:58'),
(27, 2, 1, 1, 713044290, NULL, 'TE1027', 'Mrs. Gimara Dhanushi', 'users/GqvXqHMATZ5lQLGDeEYnFAJzOI6vzxhecOcbkQd7.jpg', 'Gamini', 'Weliwita', 'Mr.', NULL, 'Sadhana', NULL, NULL, '<p>Sinhala Teacher</p>', NULL, 'gaminiweliwita@gmail.com', NULL, '$2y$10$1d05BynIrmCGxrNgQvBk4eEt/P3iJBYRn.LlKpYgUSik6Ohh9Fsiq', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-30 20:28:11', '2021-07-30 20:28:37'),
(28, 2, 1, 1, 771111111, NULL, 'TE1028', 'Mrs. Gimara Dhanushi', 'users/rpris3DfgQ49eoSHm7TNOsZ0gJMnUQneMWvVGYeu.jpg', 'Sameera', 'kumarathunga', 'Mr.', NULL, 'Sadhana', NULL, NULL, '<p>Sinhala Teacher</p>', NULL, 'sameerakumarathunga@gmail.com', NULL, '$2y$10$mMa3RSt785GGtrEWE8DXZ.ReMlKZRltd844KMzSdddZiyVMAlnUR.', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-30 21:17:49', '2021-07-30 21:17:49'),
(29, 2, 1, 1, 779738718, NULL, 'TE1029', 'Mrs. Gimara Dhanushi', 'users/2IIGZoCytXUGXLojB3lhvd8U7md4xzu52v9o5bap.jpg', 'Krishantha', 'Weliwita', 'Mr.', NULL, 'Sadhana', NULL, NULL, 'Sinhala Teacher', NULL, 'krishanthaweliwita@gmail.com', NULL, '$2y$10$PnEahdmzJomCXTsKF2XXAOzV.BRnzQ2zxSK4KIVtM4QmhOyQkX2SO', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-31 00:06:11', '2021-07-31 00:06:11'),
(30, 2, 1, 1, 774274244, NULL, 'TE1030', 'Mrs. Gimara Dhanushi', 'users/wtOpBVJYPsue9rqPKVBw1fKDL14xow9QBeIUAhbo.jpg', 'Dayantha', 'K Hewage', 'Mr.', NULL, 'Sadhana', NULL, NULL, 'Sinhala Teacher', NULL, 'dayanthakhewage69@gmail.com', NULL, '$2y$10$PWrtloCjCV3CjzdUxEdLOOiiQx6I77M5yL6cfrGVutqL9/yLEfZCa', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-31 00:14:30', '2021-07-31 00:14:30'),
(31, 2, 1, 1, 717320743, NULL, 'TE1031', 'Mrs. Gimara Dhanushi', 'users/Hl6tWA0Hs2mvlVkLx2ILsoQfbaPC9i4KG90ayJdn.jpg', 'Aruna', 'Weragala', 'Mr.', NULL, 'Sadhana', NULL, NULL, 'Sinhala Teacher', NULL, 'arunaweragala11@gmail.com', NULL, '$2y$10$jbhDL3CLDVK3xdqjneNDNOuOfq0.5HKQa55.wYefCfiFHjPQeudOK', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-31 14:57:11', '2021-07-31 14:57:11'),
(32, 2, 1, 1, 773847520, NULL, 'TE1032', 'Mrs. Gimara Dhanushi', 'users/ZA5frtrJqmjuggOehX9gkZ7CFPcUBphKwyr6ct7w.jpg', 'Mohan', 'Pathmakumara', 'Mr.', NULL, 'Sadhana', NULL, NULL, 'History Teacher', NULL, 'mohanpathmakumara@gmail.com', NULL, '$2y$10$7j0zPKDZGk1FO4LOupGW8eOfQfuRmWaIkbYSDMKDDuS7DVINxapj.', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-31 16:09:22', '2021-07-31 16:09:22'),
(33, 2, 1, 1, 717627358, NULL, 'TE1033', 'Mrs. Gimara Dhanushi', 'users/jazUvfEQQB2gabru3Vj0s87wz3Zf1s2IbXXv2Pdd.jpg', 'Sudarshi', 'Serasinghe', 'Ms.', NULL, 'Sadhana', NULL, NULL, 'History Teacher', NULL, 'sudarshiserasinghe@gmail.com', NULL, '$2y$10$0NspoPFydlkF3Ez7YGWE1..SN8.IKt9jQAzAwAt7ZUMy697ofSG5y', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-31 16:32:55', '2021-07-31 16:32:55'),
(34, 2, 1, 1, 714007101, NULL, 'TE1034', 'Mrs. Gimara Dhanushi', 'users/lNcOI6eyeTpyTMP9t9V1UmbOdRle6mDnLjPl7FZm.jpg', 'Kamal', 'Priyankara', 'Mr.', NULL, 'Sadhana', NULL, NULL, 'History Teacher', NULL, 'kamalpriyankara@gmail.com', NULL, '$2y$10$06DEvgVbbtQ35bKXvcopcuiSBZKsqtsEEfp5AsCqOe9w/31xFumh6', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-31 17:06:32', '2021-07-31 17:06:32'),
(35, 2, 1, 1, 714842186, NULL, 'TE1035', 'Mrs. Gimara Dhanushi', 'users/PbNXk1mZU5xTJDGq2Y9kaYmAuFroeAQ0AwEyKBFF.jpg', 'Malika', 'Suraweera Arachchi', 'Mr.', NULL, 'Sadhana', NULL, NULL, 'History Teacher', NULL, 'malikasuraweerarachchi@gmail.com', NULL, '$2y$10$qbRb8QgWET6e2smfJqRhYOKOW16qW69.ncD.cvvAbxUk3yoyPPfDy', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-31 17:29:29', '2021-07-31 17:29:29'),
(36, 2, 1, 2, 716774202, NULL, 'TE1036', 'Mrs. Gimara Dhanushi', 'users/82ikJIK0z0iwnWflPj9ankwnFNGsG9dDRZpEXfqN.jpg', 'Hashini', 'Danansooriya', 'Ms.', NULL, 'Sadhana', NULL, NULL, 'ICT Teacher', NULL, 'hashini1993ds@gmail.com', NULL, '$2y$10$2ebbWCDcu2y7faqthqpvOesAxiNhEINCQDJrv8U6LUL9wrzpo0b4a', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-31 17:53:40', '2021-07-31 17:53:40'),
(37, 2, 1, 1, 769392834, NULL, 'TE1037', 'Mrs. Gimara Dhanushi', 'users/BVVTHamT1jBAxLTLhiC8XjJ713c2Xh3aJr19QR5u.jpg', 'Nilukshi', 'Karunarathne', 'Ms.', NULL, 'Sadhana', NULL, NULL, 'ICT Teacher', NULL, 'nilukshikarunarathne@gmail.com', NULL, '$2y$10$5PxZxwR6y/3YMHaWl3y6KOeNUUYJTO/lqkyvbAAxnLcDTghcmHYCa', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-31 18:09:50', '2021-07-31 18:09:50'),
(38, 2, 1, 1, 777208864, NULL, 'TE1038', 'Mrs. Gimara Dhanushi', 'users/BxiLRXfgVD3VPW0PwOraDre6zGMe4LVojhzav7Xi.jpg', 'Jeevantha', 'Hewa Pathirana', 'Mr.', NULL, 'Sadhana', NULL, NULL, 'ICT Teacher', NULL, 'jeevanthahewapathirana@gmail.com', NULL, '$2y$10$YZi.m.iYFMk9Jhfk4aW2xOzXd1EK5p4inQ1Be/d.GG1bsyvbsyvIS', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-31 18:58:43', '2021-07-31 18:58:43'),
(39, 2, 1, 1, 714821186, NULL, 'TE1039', 'Mrs. Gimara Dhanushi', 'users/KKSF8EEpqcAy5xYW1Aw6yhSJxZv1ysJ5NbnRZloU.jpg', 'A J J', 'Jawan', 'Mr.', NULL, 'Sadhana', NULL, NULL, 'Tamil Teacher', NULL, 'jawan@gmail.com', NULL, '$2y$10$QKQuOIz4KQ2a6/GBCHmPkur9O3weG8YqgG.AmKxQtcUTGZEu4GIai', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-31 19:24:43', '2021-07-31 20:44:36'),
(40, 2, 1, 1, 756027937, NULL, 'TE1040', 'Mrs. Gimara Dhanushi', 'users/nM6TCVzpJuwp7b0jyXxPvwcDCnhNjBDSBUoprGUx.jpg', 'Kristina', 'Jeyarani', 'Mrs.', NULL, 'Sadhana', NULL, NULL, 'Tamil Teacher', NULL, 'kristinajeyarani@gmail.com', NULL, '$2y$10$iJE3u7diM2elQ6yhT1zUfOjrYiwedKfiIK9MdwlFBS..2DU5fXYAK', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-31 19:27:55', '2021-07-31 20:43:26'),
(41, 2, 1, 1, 772973026, NULL, 'TE1041', 'Mrs. Gimara Dhanushi', 'users/2kL0RBExajyQoaV9NJ4VvZBdQkYWEkL7g7efaOGh.jpg', 'Chathuranga', 'Amarasooroya', 'Mr.', NULL, 'Sadhana', NULL, NULL, 'Commerce Teacher', NULL, 'commercesirsrilanka@gmail.com', NULL, '$2y$10$l9F8kiqITRNbto5.HvShJemQa0ceuZ/3Pg3WNHHyd34x6aUN7OjLa', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-31 20:29:02', '2021-08-01 16:53:56'),
(42, 2, 1, 2, 727887800, NULL, 'TE1042', 'Mrs. Gimara Dhanushi', 'users/WJlO8POo6Uu8rIwOdJX5LNb5iwz3uAWpXw8i3qFH.jpg', 'Ishani', 'Hemathilaka', 'Mrs.', NULL, 'Sadhana', NULL, NULL, 'Art Teacher', NULL, 'ishani@gmail.com', NULL, '$2y$10$6eYuymTtfkkMT2kQhWa3.eAqjvGLZxjmm89om.tqxGfbSSpva5Udy', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-31 22:22:51', '2021-07-31 22:27:33'),
(43, 2, 1, 2, 715347559, NULL, 'TE1043', 'Mrs. Gimara Dhanushi', 'users/BZ3xizbDUqvTMw2JsKw17R2AAd2MiOXTjzRbAEBn.jpg', 'Apeksha', 'Samaraweera', 'Mrs.', NULL, 'Sadhana', NULL, NULL, 'Drama &amp; Theatre', NULL, 'apeksha@gmail.com', NULL, '$2y$10$Vp5If1NxSAY9g6rgzC5xce2Ei6mWFecHMcS3GpNY9Oj1n3dcxjEfm', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-07-31 22:49:10', '2021-07-31 22:49:10'),
(44, 2, 1, 2, 714443395, NULL, 'TE1044', 'Mrs. Gimara Dhanushi', 'users/Qjj0SdMSbb34jSayuSEXXZy28SvvwLLVmQdcML9o.jpg', 'Duleeka', 'Gamage', 'Mrs.', NULL, 'Sadhana', NULL, NULL, 'English Medium Science Teacher', NULL, 'dsgamage78@gmail.com', NULL, '$2y$10$iKJ9101fRgIjWnlXlXmuZOQGfDktaP5pJWpsXA/RrdpChlfdzt7mG', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-08-01 16:27:35', '2021-08-01 16:31:30'),
(45, 4, 1, 2, 773536831, '12408', 'ST1045', 'Online', NULL, 'NIMMI', 'MUNASINGHE', 'Miss.', NULL, 'SADHANA', NULL, NULL, NULL, NULL, 'nimmimunasinghe@yahoo.com', NULL, '$2y$10$VosK/6K0.pGlNapO.km00uiVcjImxs0VVpnoU9DaA4JkXVL8NSORm', 0, NULL, NULL, NULL, 0, 0, NULL, NULL, '2021-08-09 23:08:20', '2021-08-09 23:08:55'),
(47, 4, 1, 2, 774395726, '69702', 'ST1047', 'Online', NULL, 'Test02', 'Not Sadana', 'Mr.', NULL, 'STC', NULL, NULL, NULL, NULL, 'test02@sadana.com', NULL, '$2y$10$EpFMRwP.xsAMYRhS92yfu.pxeGEBHBPfzOiORXLstwCTml61/czhS', 0, 'Not A Student', NULL, 'Harsha', 0, 0, NULL, NULL, '2021-08-24 20:29:27', '2021-08-24 20:29:48'),
(48, 2, 1, 1, 774395726, NULL, 'TE1048', 'Mr. Harsha De Pinto', 'users/952FJhVNXwbwlOF6hdsV2HOKnrdxwBl4uwLAdANC.jpg', 'Test01', 'Welfare', 'Mr.', NULL, 'STC', 'Address', NULL, 'Description', NULL, 'teacher@test1.com', NULL, '$2y$10$E9/qHjT7KrpXdUnTynt2n.0uaFt6BvL/ggerGwM8LKsJ7NjWkC5ti', 0, NULL, NULL, NULL, 20000, 1, NULL, NULL, '2021-08-28 18:22:21', '2021-08-28 18:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `u_accounts`
--

CREATE TABLE `u_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in` int(11) DEFAULT NULL,
  `out` int(11) DEFAULT NULL,
  `bal` int(11) DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `u_accounts`
--

INSERT INTO `u_accounts` (`id`, `user_id`, `des`, `in`, `out`, `bal`, `author`, `created_at`, `updated_at`) VALUES
(1, 48, 'Account Open', 0, 0, 0, 'Account Open', '2021-08-30 20:34:19', '2021-08-30 20:34:19'),
(2, 41, 'Account Open', 0, 0, 0, 'Account Open', '2021-08-30 20:40:07', '2021-08-30 20:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `u_a_entries`
--

CREATE TABLE `u_a_entries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `u_account_id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `z_accounts`
--

CREATE TABLE `z_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `z_accounts`
--

INSERT INTO `z_accounts` (`id`, `title`, `email`, `key`, `secret`, `author`, `created_at`, `updated_at`) VALUES
(1, 'Primary Account', 'sadhana.education2020@gmail.com', 'LY0wBYuCSx6NyZlxDUkSXw', 'eZlmEilsyinzmVKVsZTzbJhxoHgm78Mcnk42', 'Mr. Harsha De Pinto', '2021-08-30 22:36:59', '2021-08-30 22:40:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `b_i_accounts`
--
ALTER TABLE `b_i_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_i_accounts_g_batch_id_index` (`g_batch_id`);

--
-- Indexes for table `b_i_a_entries`
--
ALTER TABLE `b_i_a_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_i_a_entries_b_i_account_id_index` (`b_i_account_id`);

--
-- Indexes for table `b_mcqs`
--
ALTER TABLE `b_mcqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_mcqs_group_id_index` (`group_id`),
  ADD KEY `b_mcqs_g_batch_id_index` (`g_batch_id`),
  ADD KEY `b_mcqs_g_mcq_id_index` (`g_mcq_id`);

--
-- Indexes for table `b_payments`
--
ALTER TABLE `b_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_payments_user_id_index` (`user_id`),
  ADD KEY `b_payments_b_student_id_index` (`b_student_id`),
  ADD KEY `b_payments_g_batch_id_index` (`g_batch_id`);

--
-- Indexes for table `b_students`
--
ALTER TABLE `b_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_students_user_id_index` (`user_id`),
  ADD KEY `b_students_g_batch_id_index` (`g_batch_id`);

--
-- Indexes for table `b_s_accounts`
--
ALTER TABLE `b_s_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_s_accounts_b_student_id_index` (`b_student_id`);

--
-- Indexes for table `b_s_a_entries`
--
ALTER TABLE `b_s_a_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_s_a_entries_b_s_account_id_index` (`b_s_account_id`);

--
-- Indexes for table `b_tutorials`
--
ALTER TABLE `b_tutorials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_tutorials_group_id_index` (`group_id`),
  ADD KEY `b_tutorials_g_batch_id_index` (`g_batch_id`),
  ADD KEY `b_tutorials_g_tutorial_id_index` (`g_tutorial_id`);

--
-- Indexes for table `b_t_accounts`
--
ALTER TABLE `b_t_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_t_accounts_user_id_index` (`user_id`),
  ADD KEY `b_t_accounts_g_batch_id_index` (`g_batch_id`);

--
-- Indexes for table `b_t_a_entries`
--
ALTER TABLE `b_t_a_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_t_a_entries_b_t_account_id_index` (`b_t_account_id`);

--
-- Indexes for table `b_videos`
--
ALTER TABLE `b_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_videos_group_id_index` (`group_id`),
  ADD KEY `b_videos_g_batch_id_index` (`g_batch_id`),
  ADD KEY `b_videos_g_video_id_index` (`g_video_id`);

--
-- Indexes for table `d_logs`
--
ALTER TABLE `d_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `d_logs_user_id_index` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_user_id_index` (`user_id`),
  ADD KEY `groups_grade_id_index` (`grade_id`),
  ADD KEY `groups_subject_id_index` (`subject_id`);

--
-- Indexes for table `g_batches`
--
ALTER TABLE `g_batches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `g_batches_user_id_index` (`user_id`),
  ADD KEY `g_batches_grade_id_index` (`grade_id`),
  ADD KEY `g_batches_subject_id_index` (`subject_id`),
  ADD KEY `g_batches_group_id_index` (`group_id`);

--
-- Indexes for table `g_mcqs`
--
ALTER TABLE `g_mcqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `g_mcqs_group_id_index` (`group_id`);

--
-- Indexes for table `g_tutorials`
--
ALTER TABLE `g_tutorials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `g_tutorials_group_id_index` (`group_id`);

--
-- Indexes for table `g_videos`
--
ALTER TABLE `g_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `g_videos_group_id_index` (`group_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_user_id_index` (`user_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_invoice_id_index` (`invoice_id`),
  ADD KEY `items_b_payment_id_index` (`b_payment_id`);

--
-- Indexes for table `i_accounts`
--
ALTER TABLE `i_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `i_a_entries`
--
ALTER TABLE `i_a_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `i_a_entries_i_account_id_index` (`i_account_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msgs`
--
ALTER TABLE `msgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `msgs_user_id_index` (`user_id`);

--
-- Indexes for table `m_marks`
--
ALTER TABLE `m_marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_marks_b_student_id_index` (`b_student_id`),
  ADD KEY `m_marks_b_mcq_id_index` (`b_mcq_id`);

--
-- Indexes for table `m_questions`
--
ALTER TABLE `m_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_questions_g_mcq_id_index` (`g_mcq_id`);

--
-- Indexes for table `m_results`
--
ALTER TABLE `m_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_results_b_student_id_index` (`b_student_id`),
  ADD KEY `m_results_b_mcq_id_index` (`b_mcq_id`),
  ADD KEY `m_results_m_mark_id_index` (`m_mark_id`),
  ADD KEY `m_results_m_question_id_index` (`m_question_id`);

--
-- Indexes for table `onlines`
--
ALTER TABLE `onlines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `onlines_g_batch_id_index` (`g_batch_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_teachers`
--
ALTER TABLE `s_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `s_teachers_user_id_index` (`user_id`),
  ADD KEY `s_teachers_subject_id_index` (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_user_name_unique` (`user_name`);

--
-- Indexes for table `u_accounts`
--
ALTER TABLE `u_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_accounts_user_id_index` (`user_id`);

--
-- Indexes for table `u_a_entries`
--
ALTER TABLE `u_a_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_a_entries_u_account_id_index` (`u_account_id`);

--
-- Indexes for table `z_accounts`
--
ALTER TABLE `z_accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `b_i_accounts`
--
ALTER TABLE `b_i_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `b_i_a_entries`
--
ALTER TABLE `b_i_a_entries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `b_mcqs`
--
ALTER TABLE `b_mcqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `b_payments`
--
ALTER TABLE `b_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `b_students`
--
ALTER TABLE `b_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `b_s_accounts`
--
ALTER TABLE `b_s_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `b_s_a_entries`
--
ALTER TABLE `b_s_a_entries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `b_tutorials`
--
ALTER TABLE `b_tutorials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `b_t_accounts`
--
ALTER TABLE `b_t_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `b_t_a_entries`
--
ALTER TABLE `b_t_a_entries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `b_videos`
--
ALTER TABLE `b_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `d_logs`
--
ALTER TABLE `d_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `g_batches`
--
ALTER TABLE `g_batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `g_mcqs`
--
ALTER TABLE `g_mcqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `g_tutorials`
--
ALTER TABLE `g_tutorials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `g_videos`
--
ALTER TABLE `g_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `i_accounts`
--
ALTER TABLE `i_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `i_a_entries`
--
ALTER TABLE `i_a_entries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `msgs`
--
ALTER TABLE `msgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `m_marks`
--
ALTER TABLE `m_marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_questions`
--
ALTER TABLE `m_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `m_results`
--
ALTER TABLE `m_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `onlines`
--
ALTER TABLE `onlines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `s_teachers`
--
ALTER TABLE `s_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `u_accounts`
--
ALTER TABLE `u_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `u_a_entries`
--
ALTER TABLE `u_a_entries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `z_accounts`
--
ALTER TABLE `z_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `b_i_accounts`
--
ALTER TABLE `b_i_accounts`
  ADD CONSTRAINT `b_i_accounts_g_batch_id_foreign` FOREIGN KEY (`g_batch_id`) REFERENCES `g_batches` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `b_i_a_entries`
--
ALTER TABLE `b_i_a_entries`
  ADD CONSTRAINT `b_i_a_entries_b_i_account_id_foreign` FOREIGN KEY (`b_i_account_id`) REFERENCES `b_i_accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `b_mcqs`
--
ALTER TABLE `b_mcqs`
  ADD CONSTRAINT `b_mcqs_g_batch_id_foreign` FOREIGN KEY (`g_batch_id`) REFERENCES `g_batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `b_mcqs_g_mcq_id_foreign` FOREIGN KEY (`g_mcq_id`) REFERENCES `g_mcqs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `b_mcqs_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `b_payments`
--
ALTER TABLE `b_payments`
  ADD CONSTRAINT `b_payments_b_student_id_foreign` FOREIGN KEY (`b_student_id`) REFERENCES `b_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `b_payments_g_batch_id_foreign` FOREIGN KEY (`g_batch_id`) REFERENCES `g_batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `b_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `b_students`
--
ALTER TABLE `b_students`
  ADD CONSTRAINT `b_students_g_batch_id_foreign` FOREIGN KEY (`g_batch_id`) REFERENCES `g_batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `b_students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `b_s_accounts`
--
ALTER TABLE `b_s_accounts`
  ADD CONSTRAINT `b_s_accounts_b_student_id_foreign` FOREIGN KEY (`b_student_id`) REFERENCES `b_students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `b_s_a_entries`
--
ALTER TABLE `b_s_a_entries`
  ADD CONSTRAINT `b_s_a_entries_b_s_account_id_foreign` FOREIGN KEY (`b_s_account_id`) REFERENCES `b_s_accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `b_tutorials`
--
ALTER TABLE `b_tutorials`
  ADD CONSTRAINT `b_tutorials_g_batch_id_foreign` FOREIGN KEY (`g_batch_id`) REFERENCES `g_batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `b_tutorials_g_tutorial_id_foreign` FOREIGN KEY (`g_tutorial_id`) REFERENCES `g_tutorials` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `b_tutorials_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `b_t_accounts`
--
ALTER TABLE `b_t_accounts`
  ADD CONSTRAINT `b_t_accounts_g_batch_id_foreign` FOREIGN KEY (`g_batch_id`) REFERENCES `g_batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `b_t_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `b_t_a_entries`
--
ALTER TABLE `b_t_a_entries`
  ADD CONSTRAINT `b_t_a_entries_b_t_account_id_foreign` FOREIGN KEY (`b_t_account_id`) REFERENCES `b_t_accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `b_videos`
--
ALTER TABLE `b_videos`
  ADD CONSTRAINT `b_videos_g_batch_id_foreign` FOREIGN KEY (`g_batch_id`) REFERENCES `g_batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `b_videos_g_video_id_foreign` FOREIGN KEY (`g_video_id`) REFERENCES `g_videos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `b_videos_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `d_logs`
--
ALTER TABLE `d_logs`
  ADD CONSTRAINT `d_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `groups_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `groups_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `g_batches`
--
ALTER TABLE `g_batches`
  ADD CONSTRAINT `g_batches_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `g_batches_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `g_batches_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `g_batches_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `g_mcqs`
--
ALTER TABLE `g_mcqs`
  ADD CONSTRAINT `g_mcqs_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `g_tutorials`
--
ALTER TABLE `g_tutorials`
  ADD CONSTRAINT `g_tutorials_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `g_videos`
--
ALTER TABLE `g_videos`
  ADD CONSTRAINT `g_videos_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_b_payment_id_foreign` FOREIGN KEY (`b_payment_id`) REFERENCES `b_payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `items_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `i_a_entries`
--
ALTER TABLE `i_a_entries`
  ADD CONSTRAINT `i_a_entries_i_account_id_foreign` FOREIGN KEY (`i_account_id`) REFERENCES `i_accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `msgs`
--
ALTER TABLE `msgs`
  ADD CONSTRAINT `msgs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `m_marks`
--
ALTER TABLE `m_marks`
  ADD CONSTRAINT `m_marks_b_mcq_id_foreign` FOREIGN KEY (`b_mcq_id`) REFERENCES `b_mcqs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `m_marks_b_student_id_foreign` FOREIGN KEY (`b_student_id`) REFERENCES `b_students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `m_questions`
--
ALTER TABLE `m_questions`
  ADD CONSTRAINT `m_questions_g_mcq_id_foreign` FOREIGN KEY (`g_mcq_id`) REFERENCES `g_mcqs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `m_results`
--
ALTER TABLE `m_results`
  ADD CONSTRAINT `m_results_b_mcq_id_foreign` FOREIGN KEY (`b_mcq_id`) REFERENCES `b_mcqs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `m_results_b_student_id_foreign` FOREIGN KEY (`b_student_id`) REFERENCES `b_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `m_results_m_mark_id_foreign` FOREIGN KEY (`m_mark_id`) REFERENCES `m_marks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `m_results_m_question_id_foreign` FOREIGN KEY (`m_question_id`) REFERENCES `m_questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `onlines`
--
ALTER TABLE `onlines`
  ADD CONSTRAINT `onlines_g_batch_id_foreign` FOREIGN KEY (`g_batch_id`) REFERENCES `g_batches` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `s_teachers`
--
ALTER TABLE `s_teachers`
  ADD CONSTRAINT `s_teachers_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `s_teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `u_accounts`
--
ALTER TABLE `u_accounts`
  ADD CONSTRAINT `u_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `u_a_entries`
--
ALTER TABLE `u_a_entries`
  ADD CONSTRAINT `u_a_entries_u_account_id_foreign` FOREIGN KEY (`u_account_id`) REFERENCES `u_accounts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
