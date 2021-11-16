-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 11:22 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epos`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `ex_id` int(11) NOT NULL,
  `split_id` int(11) DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prices` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`ex_id`, `split_id`, `desc`, `prices`, `created_at`, `updated_at`) VALUES
(2, 2, 'كهرباء شهر 9', 400, '2020-11-08 16:07:42', '2020-11-08 16:07:42'),
(3, 2, 'نور شهر 12', 150, '2020-12-23 15:29:20', '2020-12-23 15:29:20'),
(4, 3, 'dsfs', 10, '2021-03-19 17:02:50', '2021-03-19 17:11:08'),
(5, 4, '2 زبادو', 20, '2021-10-21 10:36:32', '2021-10-21 10:36:32'),
(6, 3, '11', 20, '2021-10-21 10:51:25', '2021-10-21 10:51:25');

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
(1, '2020_10_09_214052_create_expenses_table', 1),
(2, '2020_10_09_214052_create_product_table', 1),
(3, '2020_10_09_214052_create_split_expenses_table', 1),
(4, '2020_10_09_214054_add_foreign_keys_to_expenses_table', 1),
(5, '2020_10_20_224007_create_expenses_table', 0),
(6, '2020_10_20_224007_create_product_table', 0),
(7, '2020_10_20_224007_create_split_expenses_table', 0),
(8, '2020_10_20_224007_create_users_table', 0),
(9, '2020_10_20_224009_add_foreign_keys_to_expenses_table', 0),
(10, '2020_12_02_124350_create_expenses_table', 0),
(11, '2020_12_02_124350_create_product_table', 0),
(12, '2020_12_02_124350_create_purchases_table', 0),
(13, '2020_12_02_124350_create_purchases_details_table', 0),
(14, '2020_12_02_124350_create_session_table', 0),
(15, '2020_12_02_124350_create_split_expenses_table', 0),
(16, '2020_12_02_124350_create_transaction_table', 0),
(17, '2020_12_02_124350_create_transaction_details_table', 0),
(18, '2020_12_02_124350_create_users_table', 0),
(19, '2020_12_02_124352_add_foreign_keys_to_expenses_table', 0),
(20, '2020_12_02_124352_add_foreign_keys_to_purchases_details_table', 0),
(21, '2020_12_02_124352_add_foreign_keys_to_session_table', 0),
(22, '2020_12_02_124352_add_foreign_keys_to_transaction_table', 0),
(23, '2020_12_02_124352_add_foreign_keys_to_transaction_details_table', 0),
(24, '2021_04_25_214919_create_expenses_table', 0),
(25, '2021_04_25_214919_create_product_table', 0),
(26, '2021_04_25_214919_create_purchases_table', 0),
(27, '2021_04_25_214919_create_purchases_details_table', 0),
(28, '2021_04_25_214919_create_session_table', 0),
(29, '2021_04_25_214919_create_split_expenses_table', 0),
(30, '2021_04_25_214919_create_supplier_table', 0),
(31, '2021_04_25_214919_create_transaction_table', 0),
(32, '2021_04_25_214919_create_transaction_details_table', 0),
(33, '2021_04_25_214919_create_users_table', 0),
(34, '2021_04_25_214922_add_foreign_keys_to_expenses_table', 0),
(35, '2021_04_25_214922_add_foreign_keys_to_purchases_details_table', 0),
(36, '2021_04_25_214922_add_foreign_keys_to_session_table', 0),
(37, '2021_04_25_214922_add_foreign_keys_to_transaction_table', 0),
(38, '2021_04_25_214922_add_foreign_keys_to_transaction_details_table', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parcod` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `pruch_prices` double DEFAULT NULL,
  `prices` double DEFAULT NULL,
  `photo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `parcod`, `count`, `pruch_prices`, `prices`, `photo`, `discount`, `created_at`, `updated_at`) VALUES
(16, 'كوفي ميكس', '012354', 255, 3, 4, 'product_d85ef91f3eb1a5189c27c6dd7d1b52ea.jpg', 0.25, '2020-10-17 13:38:34', '2021-03-27 13:52:42'),
(17, 'شبسي', '012354', 299, 1, 3, 'product_af3d51cf6cc9b73e0717fdf875bd1a96.png', NULL, '2020-10-17 13:41:48', '2020-12-23 15:31:10'),
(18, 'لبان شكليز', '03215', 363, 0.5, 1, 'product_9ceff1be50efb5ddc16a5028ef08935f.jpg', NULL, '2020-10-17 13:43:39', '2021-10-21 11:02:18'),
(19, 'شبسي ابو 3', NULL, -28, 1, 2, NULL, NULL, '2020-10-26 20:13:38', '2021-10-21 11:02:19'),
(20, 'لبان كلوركس', '1', 28, 1, 1.5, NULL, NULL, '2020-10-26 20:14:11', '2020-11-02 18:11:24'),
(21, 'بيبسي', '123', 28, 3.5, 5, NULL, NULL, '2020-10-26 20:14:49', '2020-11-02 19:39:10'),
(22, 'ضبضب', '2626', 21, 20, 30, NULL, NULL, '2020-10-26 20:16:04', '2020-12-02 14:29:20'),
(23, 'مسطره', '20545', 34, 1.5, 1, NULL, NULL, '2020-10-26 20:16:57', '2021-10-21 10:47:37'),
(24, 'قلم جاف', '30222', 39, 5, 6, NULL, NULL, '2020-10-26 20:17:18', '2020-11-02 13:31:10'),
(25, 'بلالين', '2566', 29, 2, 3, NULL, NULL, '2020-10-26 20:17:41', '2020-11-02 13:31:10'),
(26, 'كيس بونه احمر', '332656', 24, 2, 3.5, NULL, NULL, '2020-10-26 20:18:08', '2020-11-02 13:31:10'),
(27, 'بلي', NULL, 1999, 1.5, 1.75, NULL, NULL, '2020-10-26 20:18:50', '2020-11-02 13:31:11'),
(28, 'سشيشسي', 'شسي', 25, 2, 5, NULL, NULL, '2020-10-26 20:19:02', '2020-11-02 17:40:41'),
(29, 'قلم رصاص', '2555', 28, 2.5, 3.5, NULL, NULL, '2020-10-26 20:19:25', '2020-11-02 13:31:11'),
(30, 'ضضللل', 'ضسشيشس', 29, 5, 10, NULL, NULL, '2020-10-26 20:19:40', '2020-11-02 13:31:11'),
(31, 'شيكا', '0555', 10, 2, 3, NULL, NULL, '2020-11-02 18:49:22', '2020-11-02 18:49:22'),
(32, 'inniiii', '555252', 3, 20, 30, NULL, NULL, '2020-11-08 16:30:50', '2020-11-08 16:30:50'),
(33, 'تم اضافته من الصفحه ديه', 'يشسي', 20, 3, 4, NULL, NULL, '2020-11-23 14:50:52', '2020-11-30 07:46:22'),
(34, 'تم الاضافه من هنا', '12312125', 0, 2, 3, NULL, NULL, '2020-11-23 14:58:50', '2020-11-23 14:58:50'),
(35, 'شسشضصب', 'ضبضب', 60, 50, 60, NULL, NULL, '2020-11-23 15:00:10', '2020-11-25 13:01:59'),
(36, 'sadadasf', 'qfqf', 27, 20, 30, NULL, NULL, '2020-11-24 09:14:24', '2021-04-02 13:15:24'),
(37, 'شسةلينلشسيش', '02454542', 0, 0, 0, NULL, NULL, '2020-12-23 15:34:45', '2020-12-23 15:34:45'),
(38, 'asdasd', 'يشسي', 4, 3, 2, 'product_5e68f40ffaba05357e68926866c6f077.jpg', NULL, '2021-10-21 10:40:17', '2021-10-21 10:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchases_id` int(11) NOT NULL,
  `in_num` varchar(100) DEFAULT NULL,
  `supplier_name` varchar(300) DEFAULT NULL,
  `in_total` float DEFAULT NULL,
  `in_data` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchases_id`, `in_num`, `supplier_name`, `in_total`, `in_data`, `created_at`, `updated_at`) VALUES
(2, 'p-2020-1', 'محمد احمد', 300, '2020-11-21', '2020-11-25 12:55:30', '2020-11-25 12:55:30'),
(3, 'p-2020-3', 'ابراعي شيش', 30, '2020-11-20', '2020-11-25 13:01:59', '2020-11-25 13:01:59'),
(4, 'p-2020-4', 'محمد', 147.5, '2020-11-30', '2020-11-30 07:46:22', '2020-11-30 07:46:23'),
(5, 'p-2020-5', 'لبيلاياي', 80, '2020-12-23', '2020-12-23 15:31:10', '2020-12-23 15:31:10'),
(6, 'p-2021-6', 'هخاخلاهلاهر', 15, '2021-04-02', '2021-04-02 13:19:42', '2021-04-02 13:19:43'),
(7, 'p-2021-7', 'محمد', 42, '2021-10-21', '2021-10-21 10:45:38', '2021-10-21 10:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `purchases_details`
--

CREATE TABLE `purchases_details` (
  `pur_id` int(11) NOT NULL,
  `pursh_id` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `pruch_prices` float DEFAULT NULL,
  `prices` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchases_details`
--

INSERT INTO `purchases_details` (`pur_id`, `pursh_id`, `prod_id`, `count`, `pruch_prices`, `prices`, `created_at`, `updated_at`) VALUES
(3, 2, 16, 30, 1.75, 3, '2020-11-25 12:55:30', '2020-11-25 12:55:30'),
(4, 2, 35, 30, 1, 3, '2020-11-25 12:55:30', '2020-11-25 12:55:30'),
(5, 3, 35, 30, 50, 60, '2020-11-25 13:01:59', '2020-11-25 13:01:59'),
(6, 4, 16, 50, 1.75, 3, '2020-11-30 07:46:22', '2020-11-30 07:46:22'),
(7, 4, 33, 20, 3, 4, '2020-11-30 07:46:22', '2020-11-30 07:46:22'),
(8, 5, 16, 20, 3, 4, '2020-12-23 15:31:10', '2020-12-23 15:31:10'),
(9, 5, 17, 20, 1, 3, '2020-12-23 15:31:10', '2020-12-23 15:31:10'),
(10, 6, 23, 5, 3, 10, '2021-04-02 13:19:43', '2021-04-02 13:19:43'),
(11, 7, 38, 4, 3, 1, '2021-10-21 10:45:38', '2021-10-21 10:45:38'),
(12, 7, 23, 20, 1.5, 3, '2021-10-21 10:45:38', '2021-10-21 10:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` int(11) NOT NULL,
  `num_session` int(11) DEFAULT NULL,
  `opening_balance` float DEFAULT NULL,
  `user_id_open` int(11) DEFAULT NULL,
  `user_id_close` int(11) DEFAULT NULL,
  `close_balance` float DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1,
  `close_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `num_session`, `opening_balance`, `user_id_open`, `user_id_close`, `close_balance`, `type`, `close_at`, `created_at`, `updated_at`) VALUES
(1, 1, 100, 1, 2, 1024.5, 0, '2020-11-20 13:09:01', '2020-10-27 11:17:40', '2020-11-21 06:04:39'),
(2, 2, 3000, 1, 1, 3003.75, 0, '2020-11-20 12:51:28', '2020-11-09 16:55:08', '2020-11-20 12:51:28'),
(3, 3, 0, 1, 1, 2.75, 0, '2020-11-20 12:53:01', '2020-11-20 12:52:19', '2020-11-20 12:53:01'),
(4, 4, 0, 1, 2, 0, 0, '2020-11-20 13:07:52', '2020-11-20 12:53:56', '2020-11-20 13:07:52'),
(5, 5, 300, 2, 1, 300, 0, '2020-11-21 06:10:14', '2020-11-21 06:09:26', '2020-11-21 06:10:14'),
(6, 6, 300, 1, 1, 300, 0, '2020-11-21 06:11:01', '2020-11-21 06:10:47', '2020-11-21 06:11:01'),
(7, 7, 200, 1, 2, 200, 0, '2020-11-21 06:14:39', '2020-11-21 06:13:34', '2020-11-21 06:14:39'),
(8, 8, 100, 1, 1, 115, 0, '2020-12-07 17:06:19', '2020-11-30 12:24:55', '2020-12-07 17:06:19'),
(9, 9, 200, 2, 2, 15, 0, '2020-12-02 14:29:53', '2020-12-02 14:26:38', '2020-12-02 14:29:53'),
(10, 10, 100, 1, 1, 158, 0, '2021-03-27 13:50:54', '2020-12-11 13:55:24', '2021-03-27 13:50:54'),
(11, 11, 200, 1, 1, 200, 0, '2021-10-21 11:22:07', '2021-03-27 13:51:33', '2021-10-21 11:22:07'),
(12, 12, 300, 2, 2, 300, 0, '2021-03-27 13:54:49', '2021-03-27 13:54:08', '2021-03-27 13:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `split_expenses`
--

CREATE TABLE `split_expenses` (
  `s_id` int(11) NOT NULL,
  `name` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `split_expenses`
--

INSERT INTO `split_expenses` (`s_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'اخري', '2020-11-08 16:04:18', '2020-11-08 16:04:18'),
(2, 'اداري', '2020-11-08 16:06:51', '2020-11-08 16:06:51'),
(3, 'مصرف كهرباء', '2020-11-08 16:11:35', '2020-11-08 16:11:35'),
(4, 'مكتب', '2021-10-21 10:35:38', '2021-10-21 10:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `company` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `phone`, `address`, `company`, `created_at`, `updated_at`) VALUES
(1, 'مصطفي عثمان', '01234567891', NULL, 'شe', '2021-03-05 23:31:41', '2021-03-07 17:04:17'),
(2, 'محمد', '01132546133', 'asfasdasdasfasdasdasfasdasdasfasdasdasfasdasdasfasdasdasfasdasdasfasdasdasfasdasdasfasdasdasfasdasdasfasdasdasfasdasdasfasdasdasfasdasdasfasdasdasfasdasdasfasdasdasfasdasdasfasdasdasfasdasdasfasdasdasfasdasdasfasdasd', 'ش', '2021-03-05 23:42:25', '2021-03-05 23:42:25'),
(3, 'الحاج ابراهيم', '01237567891', 'عند بيتهم', 'شركه الحاج ابراهيم', '2021-11-09 20:12:50', '2021-11-09 20:12:50'),
(4, 'ابو مسعد', '01634567891', 'شسيشي', 'ش', '2021-11-09 20:18:12', '2021-11-09 20:18:12'),
(5, 'محمد', '01734567891', 'asdasd', 'ش', '2021-11-09 20:19:02', '2021-11-09 20:19:02'),
(6, 'mohamed', '01214567897', NULL, 'ش', '2021-11-09 20:23:35', '2021-11-09 20:23:35'),
(7, 'sadasd', '01034567897', NULL, 'ش', '2021-11-09 20:24:23', '2021-11-09 20:24:23');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `session_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `type` tinyint(4) DEFAULT 1,
  `disc` float NOT NULL DEFAULT 0,
  `real_total` float DEFAULT NULL,
  `status` enum('sale','return','expenses') DEFAULT 'sale',
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `session_id`, `user_id`, `total`, `type`, `disc`, `real_total`, `status`, `details`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 11.5, 1, 0, NULL, 'sale', NULL, '2020-11-01 12:43:35', '2020-11-01 12:43:35'),
(2, 1, 1, 37.75, 1, 0, NULL, 'sale', NULL, '2020-11-01 13:11:36', '2020-11-01 13:11:36'),
(3, 1, 1, 2.75, 1, 0, NULL, 'sale', NULL, '2020-11-01 13:13:53', '2020-11-01 13:13:53'),
(4, 1, 1, 2.75, 1, 0, NULL, 'sale', NULL, '2020-11-01 13:18:22', '2020-11-01 13:18:22'),
(5, 1, 1, 4, 1, 0, NULL, 'sale', NULL, '2020-11-02 11:01:01', '2020-11-02 11:01:01'),
(6, 1, 1, 10, 1, 0, NULL, 'sale', NULL, '2020-11-02 13:28:24', '2020-11-02 13:28:24'),
(7, 1, 1, 112.25, 1, 0, NULL, 'sale', NULL, '2020-11-02 13:31:09', '2020-11-02 13:31:09'),
(8, 1, 1, 5, 1, 0, NULL, 'sale', NULL, '2020-11-02 15:40:31', '2020-11-02 15:40:31'),
(9, 1, 1, 5, 1, 0, NULL, 'sale', NULL, '2020-11-02 15:40:31', '2020-11-02 15:40:31'),
(10, 1, 1, 5, 1, 0, NULL, 'sale', NULL, '2020-11-02 16:53:39', '2020-11-02 16:53:39'),
(11, 1, 1, 9, 1, 0, NULL, 'sale', NULL, '2020-11-02 17:40:41', '2020-11-02 17:40:41'),
(12, 1, 1, 6.75, 1, 0, NULL, 'sale', NULL, '2020-11-02 17:42:02', '2020-11-02 17:42:02'),
(13, 1, 1, 6, 1, 0, NULL, 'sale', NULL, '2020-11-02 17:43:43', '2020-11-02 17:43:43'),
(14, 1, 1, 1, 1, 0, NULL, 'sale', NULL, '2020-11-02 17:44:49', '2020-11-02 17:44:49'),
(15, 1, 1, 34, 1, 0, NULL, 'sale', NULL, '2020-11-02 17:45:44', '2020-11-02 17:45:44'),
(16, 1, 1, 4, 1, 0, NULL, 'sale', NULL, '2020-11-02 18:09:59', '2020-11-02 18:09:59'),
(17, 1, 1, 2, 1, 0, NULL, 'sale', NULL, '2020-11-02 18:10:35', '2020-11-02 18:10:35'),
(18, 1, 1, 2.5, 1, 0, NULL, 'sale', NULL, '2020-11-02 18:11:24', '2020-11-02 18:11:24'),
(19, 1, 1, 2, 1, 0, NULL, 'sale', NULL, '2020-11-02 18:11:55', '2020-11-02 18:11:55'),
(20, 1, 1, 2, 1, 0, NULL, 'sale', NULL, '2020-11-02 18:12:14', '2020-11-02 18:12:14'),
(21, 1, 1, 3, 1, 0, NULL, 'sale', NULL, '2020-11-02 18:12:43', '2020-11-02 18:12:43'),
(22, 1, 1, 6, 1, 0, NULL, 'sale', NULL, '2020-11-02 18:13:01', '2020-11-02 18:13:01'),
(23, 1, 1, 2, 1, 0, NULL, 'sale', NULL, '2020-11-02 18:13:44', '2020-11-02 18:13:44'),
(24, 1, 1, 3, 1, 0, NULL, 'sale', NULL, '2020-11-02 18:14:00', '2020-11-02 18:14:00'),
(25, 1, 1, 2.75, 1, 0, NULL, 'sale', NULL, '2020-11-02 18:14:53', '2020-11-02 18:14:53'),
(26, 1, 1, 2, 1, 0, NULL, 'sale', NULL, '2020-11-02 18:20:29', '2020-11-02 18:20:29'),
(27, 1, 1, 2, 1, 0, NULL, 'sale', NULL, '2020-11-02 18:20:48', '2020-11-02 18:20:48'),
(28, 1, 1, 2, 1, 0, NULL, 'sale', NULL, '2020-11-02 18:28:24', '2020-11-02 18:28:24'),
(29, 1, 1, 2, 1, 0, NULL, 'sale', NULL, '2020-11-02 18:28:35', '2020-11-02 18:28:35'),
(30, 1, 1, 2, 1, 0, NULL, 'sale', NULL, '2020-11-02 18:32:29', '2020-11-02 18:32:29'),
(31, 1, 1, 2, 1, 0, NULL, 'sale', NULL, '2020-11-02 18:33:00', '2020-11-02 18:33:00'),
(32, 1, 1, 4, 1, 0, NULL, 'sale', NULL, '2020-11-02 18:35:38', '2020-11-02 18:35:38'),
(33, 1, 1, 3, 1, 0, NULL, 'sale', NULL, '2020-11-02 18:36:57', '2020-11-02 18:36:57'),
(34, 1, 1, 2, 1, 0, NULL, 'sale', NULL, '2020-11-02 18:50:05', '2020-11-02 18:50:05'),
(35, 1, 1, 2, 1, 0, NULL, 'sale', NULL, '2020-11-02 18:51:58', '2020-11-02 18:51:58'),
(36, 1, 1, 4, 1, 0, NULL, 'sale', NULL, '2020-11-02 18:54:24', '2020-11-02 18:54:24'),
(37, 1, 1, 3, 1, 0, NULL, 'sale', NULL, '2020-11-02 18:54:42', '2020-11-02 18:54:42'),
(38, 1, 1, 2.75, 1, 0, NULL, 'sale', NULL, '2020-11-02 19:00:35', '2020-11-02 19:00:35'),
(39, 1, 1, 1, 1, 0, NULL, 'sale', NULL, '2020-11-02 19:06:11', '2020-11-02 19:06:11'),
(40, 1, 1, 4, 1, 0, NULL, 'sale', NULL, '2020-11-02 19:08:24', '2020-11-02 19:08:24'),
(41, 1, 1, 1, 1, 0, NULL, 'sale', NULL, '2020-11-02 19:09:11', '2020-11-02 19:09:11'),
(42, 1, 1, 1, 1, 0, NULL, 'sale', NULL, '2020-11-02 19:10:40', '2020-11-02 19:10:40'),
(43, 1, 1, 1, 1, 0, NULL, 'sale', NULL, '2020-11-02 19:16:29', '2020-11-02 19:16:29'),
(44, 1, 1, 1, 1, 0, NULL, 'sale', NULL, '2020-11-02 19:17:12', '2020-11-02 19:17:12'),
(45, 1, 1, 30, 1, 0, NULL, 'sale', NULL, '2020-11-02 19:17:33', '2020-11-02 19:17:33'),
(46, 1, 1, 1, 1, 0, NULL, 'sale', NULL, '2020-11-02 19:34:06', '2020-11-02 19:34:06'),
(47, 1, 1, 1, 1, 0, NULL, 'sale', NULL, '2020-11-02 19:34:56', '2020-11-02 19:34:56'),
(48, 1, 1, 30, 1, 0, NULL, 'sale', NULL, '2020-11-02 19:35:48', '2020-11-02 19:35:48'),
(49, 1, 1, 1, 1, 0, NULL, 'sale', NULL, '2020-11-02 19:36:16', '2020-11-02 19:36:16'),
(50, 1, 1, 1, 1, 0, NULL, 'sale', NULL, '2020-11-02 19:37:03', '2020-11-02 19:37:03'),
(51, 1, 1, 1, 1, 0, NULL, 'sale', NULL, '2020-11-02 19:38:06', '2020-11-02 19:38:06'),
(52, 1, 1, 30, 1, 0, NULL, 'sale', NULL, '2020-11-02 19:38:18', '2020-11-02 19:38:18'),
(53, 1, 1, 30, 1, 0, NULL, 'sale', NULL, '2020-11-02 19:38:54', '2020-11-02 19:38:54'),
(54, 1, 1, 5, 1, 0, NULL, 'sale', NULL, '2020-11-02 19:39:10', '2020-11-02 19:39:10'),
(55, 1, 1, 2.75, 1, 0, NULL, 'sale', NULL, '2020-11-02 19:40:26', '2020-11-02 19:40:26'),
(56, 1, 1, 2.75, 1, 0, NULL, 'sale', NULL, '2020-11-02 19:40:41', '2020-11-02 19:40:41'),
(57, 1, 1, 1, 1, 0, NULL, 'sale', NULL, '2020-11-02 19:43:05', '2020-11-02 19:43:05'),
(58, 1, 1, 27.5, 1, 0, NULL, 'sale', NULL, '2020-11-02 21:11:14', '2020-11-02 21:11:14'),
(59, 1, 1, 5, 1, 0, NULL, 'sale', NULL, '2020-11-02 21:15:49', '2020-11-02 21:15:49'),
(60, 1, 1, 16, 1, 0, NULL, 'sale', NULL, '2020-11-02 21:17:15', '2020-11-02 21:17:15'),
(61, 1, 1, 6, 1, 0, NULL, 'sale', NULL, '2020-11-08 09:53:56', '2020-11-08 09:53:56'),
(62, 1, 1, 3, 1, 0, NULL, 'sale', NULL, '2020-11-08 09:54:25', '2020-11-08 09:54:25'),
(63, 1, 1, 6.75, 1, 0, NULL, 'sale', NULL, '2020-11-08 16:57:28', '2020-11-08 16:57:28'),
(64, 2, 1, 5, -1, 0, NULL, 'expenses', 'شراء كيس سكر', '2020-11-09 20:16:37', '2020-11-09 20:16:37'),
(65, 2, 1, 3, -1, 0, NULL, 'expenses', 'كيس شبسي', '2020-11-09 20:18:22', '2020-11-09 20:18:22'),
(66, 2, 1, 12.25, 1, 0, NULL, 'sale', NULL, '2020-11-09 20:18:43', '2020-11-09 20:18:43'),
(67, 2, 1, NULL, -1, 0, NULL, 'return', NULL, '2020-11-14 11:52:54', '2020-11-14 11:52:54'),
(68, 2, 1, 0, -1, 0, NULL, 'return', NULL, '2020-11-14 11:55:27', '2020-11-14 11:55:27'),
(69, 2, 1, 4, -1, 0, NULL, 'return', NULL, '2020-11-14 12:00:07', '2020-11-14 12:00:07'),
(70, 2, 1, 4.75, -1, 0, NULL, 'return', NULL, '2020-11-14 12:12:51', '2020-11-14 12:12:51'),
(71, 2, 1, 8.25, 1, 0, NULL, 'sale', NULL, '2020-11-20 10:54:34', '2020-11-20 10:54:34'),
(72, 3, 1, 2.75, 1, 0, NULL, 'sale', NULL, '2020-11-20 12:52:42', '2020-11-20 12:52:42'),
(73, 8, 1, 10, 1, 1, 11, 'sale', NULL, '2020-12-02 10:33:06', '2020-12-02 10:33:06'),
(74, 8, 1, 5, 1, 0, 5, 'sale', NULL, '2020-12-02 10:35:30', '2020-12-02 10:35:30'),
(75, 9, 2, 300, -1, 0, NULL, 'expenses', 'ffasfas', '2020-12-02 14:27:24', '2020-12-02 14:27:24'),
(76, 9, 2, 4, -1, 0, NULL, 'return', NULL, '2020-12-02 14:27:36', '2020-12-02 14:27:36'),
(77, 9, 2, 10, 1, 0, 10, 'sale', NULL, '2020-12-02 14:27:58', '2020-12-02 14:27:58'),
(78, 9, 2, 9, 1, 1, 10, 'sale', NULL, '2020-12-02 14:28:13', '2020-12-02 14:28:13'),
(79, 9, 2, 100, 1, 0, 100, 'sale', NULL, '2020-12-02 14:29:19', '2020-12-02 14:29:19'),
(80, 10, 1, 7, 1, 0, 7, 'sale', NULL, '2020-12-11 13:55:47', '2020-12-11 13:55:47'),
(81, 10, 1, 4, -1, 0, NULL, 'return', NULL, '2020-12-11 13:56:49', '2020-12-11 13:56:49'),
(82, 10, 1, 52, 1, 0, 52, 'sale', NULL, '2021-03-12 17:25:38', '2021-03-12 17:25:38'),
(83, 10, 1, 2, 1, 0, 2, 'sale', NULL, '2021-03-12 17:25:58', '2021-03-12 17:25:58'),
(84, 10, 1, 2, 1, 0, 2, 'sale', NULL, '2021-03-12 17:26:08', '2021-03-12 17:26:08'),
(85, 10, 1, 1, -1, 0, NULL, 'return', NULL, '2021-03-12 19:33:14', '2021-03-12 19:33:14'),
(86, 11, 1, 3, 1, 1, 4, 'sale', NULL, '2021-03-27 13:52:42', '2021-03-27 13:52:42'),
(87, 11, 1, 58, 1, 2, 60, 'sale', NULL, '2021-04-02 13:15:05', '2021-04-02 13:15:05'),
(88, 11, 1, 30, 1, 0, 30, 'sale', NULL, '2021-04-02 13:15:24', '2021-04-02 13:15:24'),
(89, 11, 1, 4, 1, 0, 4, 'sale', NULL, '2021-10-21 11:02:18', '2021-10-21 11:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `details_id` int(11) NOT NULL,
  `trans_id` int(11) DEFAULT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `pruch_prices` float DEFAULT NULL,
  `paid` float DEFAULT NULL,
  `status` enum('sale','return') NOT NULL DEFAULT 'sale',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`details_id`, `trans_id`, `pro_id`, `quantity`, `pruch_prices`, `paid`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 16, 2, 1.5, 2.75, 'sale', '2020-11-01 12:43:35', '2020-11-01 12:43:35'),
(2, NULL, 17, 1, 1.75, 3, 'sale', '2020-11-01 12:43:35', '2020-11-01 12:43:35'),
(3, NULL, 18, 1, 0.5, 1, 'sale', '2020-11-01 12:43:36', '2020-11-01 12:43:36'),
(4, NULL, 19, 1, 1, 2, 'sale', '2020-11-01 12:43:36', '2020-11-01 12:43:36'),
(5, NULL, 16, 3, 1.5, 2.75, 'sale', '2020-11-01 13:11:37', '2020-11-01 13:11:37'),
(6, NULL, 17, 6, 1.75, 3, 'sale', '2020-11-01 13:11:37', '2020-11-01 13:11:37'),
(7, NULL, 18, 4, 0.5, 1, 'sale', '2020-11-01 13:11:37', '2020-11-01 13:11:37'),
(8, NULL, 19, 2, 1, 2, 'sale', '2020-11-01 13:11:37', '2020-11-01 13:11:37'),
(9, NULL, 26, 1, 2, 3.5, 'sale', '2020-11-01 13:11:37', '2020-11-01 13:11:37'),
(10, NULL, 16, 1, 1.5, 2.75, 'sale', '2020-11-01 13:13:53', '2020-11-01 13:13:53'),
(11, NULL, 16, 1, 1.5, 2.75, 'sale', '2020-11-01 13:18:23', '2020-11-01 13:18:23'),
(12, NULL, 19, 2, 1, 2, 'sale', '2020-11-02 11:01:01', '2020-11-02 11:01:01'),
(13, 6, 19, 1, 1, 2, 'sale', '2020-11-02 13:28:25', '2020-11-02 13:28:25'),
(14, 6, 18, 1, 0.5, 1, 'sale', '2020-11-02 13:28:25', '2020-11-02 13:28:25'),
(15, 6, 17, 1, 1.75, 3, 'sale', '2020-11-02 13:28:25', '2020-11-02 13:28:25'),
(16, 6, 23, 1, 3, 4, 'sale', '2020-11-02 13:28:25', '2020-11-02 13:28:25'),
(17, 7, 16, 10, 1.5, 2.75, 'sale', '2020-11-02 13:31:09', '2020-11-02 13:31:09'),
(18, 7, 18, 1, 0.5, 1, 'sale', '2020-11-02 13:31:09', '2020-11-02 13:31:09'),
(19, 7, 19, 1, 1, 2, 'sale', '2020-11-02 13:31:10', '2020-11-02 13:31:10'),
(20, 7, 23, 1, 3, 4, 'sale', '2020-11-02 13:31:10', '2020-11-02 13:31:10'),
(21, 7, 22, 1, 20, 30, 'sale', '2020-11-02 13:31:10', '2020-11-02 13:31:10'),
(22, 7, 21, 1, 3.5, 5, 'sale', '2020-11-02 13:31:10', '2020-11-02 13:31:10'),
(23, 7, 20, 1, 1, 1.5, 'sale', '2020-11-02 13:31:10', '2020-11-02 13:31:10'),
(24, 7, 24, 1, 5, 6, 'sale', '2020-11-02 13:31:10', '2020-11-02 13:31:10'),
(25, 7, 25, 1, 2, 3, 'sale', '2020-11-02 13:31:10', '2020-11-02 13:31:10'),
(26, 7, 26, 1, 2, 3.5, 'sale', '2020-11-02 13:31:11', '2020-11-02 13:31:11'),
(27, 7, 27, 1, 1.5, 1.75, 'sale', '2020-11-02 13:31:11', '2020-11-02 13:31:11'),
(28, 7, 28, 2, 2, 5, 'sale', '2020-11-02 13:31:11', '2020-11-02 13:31:11'),
(29, 7, 29, 2, 2.5, 3.5, 'sale', '2020-11-02 13:31:11', '2020-11-02 13:31:11'),
(30, 7, 30, 1, 5, 10, 'sale', '2020-11-02 13:31:11', '2020-11-02 13:31:11'),
(31, 8, 28, 1, 2, 5, 'sale', '2020-11-02 15:40:32', '2020-11-02 15:40:32'),
(32, 9, 28, 1, 2, 5, 'sale', '2020-11-02 15:40:32', '2020-11-02 15:40:32'),
(33, 11, 28, 1, 2, 5, 'sale', '2020-11-02 17:40:41', '2020-11-02 17:40:41'),
(34, 11, 19, 2, 1, 2, 'sale', '2020-11-02 17:40:41', '2020-11-02 17:40:41'),
(35, 12, 16, 1, 1.5, 2.75, 'sale', '2020-11-02 17:42:02', '2020-11-02 17:42:02'),
(36, 12, 17, 1, 1.75, 3, 'sale', '2020-11-02 17:42:02', '2020-11-02 17:42:02'),
(37, 12, 18, 1, 0.5, 1, 'sale', '2020-11-02 17:42:02', '2020-11-02 17:42:02'),
(38, 13, 19, 2, 1, 2, 'sale', '2020-11-02 17:43:43', '2020-11-02 17:43:43'),
(39, 13, 18, 2, 0.5, 1, 'sale', '2020-11-02 17:43:43', '2020-11-02 17:43:43'),
(40, 14, 18, 1, 0.5, 1, 'sale', '2020-11-02 17:44:50', '2020-11-02 17:44:50'),
(41, 15, 23, 1, 3, 4, 'sale', '2020-11-02 17:45:44', '2020-11-02 17:45:44'),
(42, 15, 22, 1, 20, 30, 'sale', '2020-11-02 17:45:45', '2020-11-02 17:45:45'),
(43, 16, 23, 1, 3, 4, 'sale', '2020-11-02 18:09:59', '2020-11-02 18:09:59'),
(44, 17, 19, 1, 1, 2, 'sale', '2020-11-02 18:10:35', '2020-11-02 18:10:35'),
(45, 18, 20, 1, 1, 1.5, 'sale', '2020-11-02 18:11:24', '2020-11-02 18:11:24'),
(46, 18, 18, 1, 0.5, 1, 'sale', '2020-11-02 18:11:24', '2020-11-02 18:11:24'),
(47, 19, 19, 1, 1, 2, 'sale', '2020-11-02 18:11:55', '2020-11-02 18:11:55'),
(48, 20, 19, 1, 1, 2, 'sale', '2020-11-02 18:12:14', '2020-11-02 18:12:14'),
(49, 21, 18, 1, 0.5, 1, 'sale', '2020-11-02 18:12:43', '2020-11-02 18:12:43'),
(50, 21, 19, 1, 1, 2, 'sale', '2020-11-02 18:12:44', '2020-11-02 18:12:44'),
(51, 22, 19, 1, 1, 2, 'sale', '2020-11-02 18:13:01', '2020-11-02 18:13:01'),
(52, 22, 18, 1, 0.5, 1, 'sale', '2020-11-02 18:13:01', '2020-11-02 18:13:01'),
(53, 22, 17, 1, 1.75, 3, 'sale', '2020-11-02 18:13:01', '2020-11-02 18:13:01'),
(54, 23, 19, 1, 1, 2, 'sale', '2020-11-02 18:13:44', '2020-11-02 18:13:44'),
(55, 24, 17, 1, 1.75, 3, 'sale', '2020-11-02 18:14:00', '2020-11-02 18:14:00'),
(56, 25, 16, 1, 1.5, 2.75, 'sale', '2020-11-02 18:14:53', '2020-11-02 18:14:53'),
(57, 26, 19, 1, 1, 2, 'sale', '2020-11-02 18:20:29', '2020-11-02 18:20:29'),
(58, 27, 19, 1, 1, 2, 'sale', '2020-11-02 18:20:48', '2020-11-02 18:20:48'),
(59, 28, 19, 1, 1, 2, 'sale', '2020-11-02 18:28:25', '2020-11-02 18:28:25'),
(60, 29, 19, 1, 1, 2, 'sale', '2020-11-02 18:28:35', '2020-11-02 18:28:35'),
(61, 30, 19, 1, 1, 2, 'sale', '2020-11-02 18:32:29', '2020-11-02 18:32:29'),
(62, 31, 19, 1, 1, 2, 'sale', '2020-11-02 18:33:00', '2020-11-02 18:33:00'),
(63, 32, 23, 1, 3, 4, 'sale', '2020-11-02 18:35:38', '2020-11-02 18:35:38'),
(64, 33, 19, 1, 1, 2, 'sale', '2020-11-02 18:36:58', '2020-11-02 18:36:58'),
(65, 33, 18, 1, 0.5, 1, 'sale', '2020-11-02 18:36:58', '2020-11-02 18:36:58'),
(66, 34, 19, 1, 1, 2, 'sale', '2020-11-02 18:50:05', '2020-11-02 18:50:05'),
(67, 35, 19, 1, 1, 2, 'sale', '2020-11-02 18:51:58', '2020-11-02 18:51:58'),
(68, 36, 18, 1, 0.5, 1, 'sale', '2020-11-02 18:54:24', '2020-11-02 18:54:24'),
(69, 36, 17, 1, 1.75, 3, 'sale', '2020-11-02 18:54:24', '2020-11-02 18:54:24'),
(70, 37, 19, 1, 1, 2, 'sale', '2020-11-02 18:54:42', '2020-11-02 18:54:42'),
(71, 37, 18, 1, 0.5, 1, 'sale', '2020-11-02 18:54:43', '2020-11-02 18:54:43'),
(72, 38, 16, 1, 1.5, 2.75, 'sale', '2020-11-02 19:00:35', '2020-11-02 19:00:35'),
(73, 39, 18, 1, 0.5, 1, 'sale', '2020-11-02 19:06:11', '2020-11-02 19:06:11'),
(74, 40, 18, 1, 0.5, 1, 'sale', '2020-11-02 19:08:24', '2020-11-02 19:08:24'),
(75, 40, 17, 1, 1.75, 3, 'sale', '2020-11-02 19:08:24', '2020-11-02 19:08:24'),
(76, 41, 18, 1, 0.5, 1, 'sale', '2020-11-02 19:09:11', '2020-11-02 19:09:11'),
(77, 42, 18, 1, 0.5, 1, 'sale', '2020-11-02 19:10:40', '2020-11-02 19:10:40'),
(78, 43, 18, 1, 0.5, 1, 'sale', '2020-11-02 19:16:29', '2020-11-02 19:16:29'),
(79, 44, 18, 1, 0.5, 1, 'sale', '2020-11-02 19:17:13', '2020-11-02 19:17:13'),
(80, 45, 22, 1, 20, 30, 'sale', '2020-11-02 19:17:33', '2020-11-02 19:17:33'),
(81, 46, 18, 1, 0.5, 1, 'sale', '2020-11-02 19:34:08', '2020-11-02 19:34:08'),
(82, 47, 18, 1, 0.5, 1, 'sale', '2020-11-02 19:34:56', '2020-11-02 19:34:56'),
(83, 48, 22, 1, 20, 30, 'sale', '2020-11-02 19:35:48', '2020-11-02 19:35:48'),
(84, 49, 18, 1, 0.5, 1, 'sale', '2020-11-02 19:36:16', '2020-11-02 19:36:16'),
(85, 50, 18, 1, 0.5, 1, 'sale', '2020-11-02 19:37:03', '2020-11-02 19:37:03'),
(86, 51, 18, 1, 0.5, 1, 'sale', '2020-11-02 19:38:06', '2020-11-02 19:38:06'),
(87, 52, 22, 1, 20, 30, 'sale', '2020-11-02 19:38:18', '2020-11-02 19:38:18'),
(88, 53, 22, 1, 20, 30, 'sale', '2020-11-02 19:38:54', '2020-11-02 19:38:54'),
(89, 54, 21, 1, 3.5, 5, 'sale', '2020-11-02 19:39:10', '2020-11-02 19:39:10'),
(90, 55, 16, 1, 1.5, 2.75, 'sale', '2020-11-02 19:40:26', '2020-11-02 19:40:26'),
(91, 56, 16, 1, 1.5, 2.75, 'sale', '2020-11-02 19:40:41', '2020-11-02 19:40:41'),
(92, 57, 18, 1, 0.5, 1, 'sale', '2020-11-02 19:43:05', '2020-11-02 19:43:05'),
(93, 58, 16, 10, 1.5, 2.75, 'sale', '2020-11-02 21:11:14', '2020-11-02 21:11:14'),
(94, 59, 18, 1, 0.5, 1, 'sale', '2020-11-02 21:15:49', '2020-11-02 21:15:49'),
(95, 59, 23, 1, 3, 4, 'sale', '2020-11-02 21:15:49', '2020-11-02 21:15:49'),
(96, 60, 23, 4, 3, 4, 'sale', '2020-11-02 21:17:15', '2020-11-02 21:17:15'),
(97, 61, 19, 1, 1, 2, 'sale', '2020-11-08 09:53:57', '2020-11-08 09:53:57'),
(98, 61, 23, 1, 3, 4, 'sale', '2020-11-08 09:53:57', '2020-11-08 09:53:57'),
(99, 62, 17, 1, 1.75, 3, 'sale', '2020-11-08 09:54:25', '2020-11-08 09:54:25'),
(100, 63, 16, 1, 1.5, 2.75, 'sale', '2020-11-08 16:57:28', '2020-11-08 16:57:28'),
(101, 63, 17, 1, 1.75, 3, 'sale', '2020-11-08 16:57:28', '2020-11-08 16:57:28'),
(102, 63, 18, 1, 0.5, 1, 'sale', '2020-11-08 16:57:28', '2020-11-08 16:57:28'),
(103, 66, 16, 3, 1.5, 2.75, 'sale', '2020-11-09 20:18:44', '2020-11-09 20:18:44'),
(104, 66, 17, 1, 1.75, 3, 'sale', '2020-11-09 20:18:44', '2020-11-09 20:18:44'),
(105, 66, 18, 1, 0.5, 1, 'sale', '2020-11-09 20:18:44', '2020-11-09 20:18:44'),
(107, 68, 19, 9, 1, NULL, 'sale', '2020-11-14 11:55:27', '2020-11-14 11:55:27'),
(108, 69, 19, 2, 1, 2, 'sale', '2020-11-14 12:00:07', '2020-11-14 12:00:07'),
(109, 70, 16, 1, 1.5, 2.75, 'sale', '2020-11-14 12:12:51', '2020-11-14 12:12:51'),
(110, 70, 19, 1, 1, 2, 'sale', '2020-11-14 12:12:51', '2020-11-14 12:12:51'),
(111, 71, 16, 3, 1.5, 2.75, 'sale', '2020-11-20 10:54:34', '2020-11-20 10:54:34'),
(112, 72, 16, 1, 1.5, 2.75, 'sale', '2020-11-20 12:52:42', '2020-11-20 12:52:42'),
(113, 73, 16, 2, 1.75, 4, 'sale', '2020-12-02 10:33:06', '2020-12-02 10:33:06'),
(114, 73, 17, 1, 1.75, 3, 'sale', '2020-12-02 10:33:06', '2020-12-02 10:33:06'),
(115, 74, 16, 1, 1.75, 4, 'sale', '2020-12-02 10:35:30', '2020-12-02 10:35:30'),
(116, 74, 18, 1, 0.5, 1, 'sale', '2020-12-02 10:35:30', '2020-12-02 10:35:30'),
(117, 76, 16, 1, 1.75, 4, 'sale', '2020-12-02 14:27:36', '2020-12-02 14:27:36'),
(118, 77, 19, 1, 1, 2, 'sale', '2020-12-02 14:27:58', '2020-12-02 14:27:58'),
(119, 77, 18, 1, 0.5, 1, 'sale', '2020-12-02 14:27:58', '2020-12-02 14:27:58'),
(120, 77, 17, 1, 1.75, 3, 'sale', '2020-12-02 14:27:58', '2020-12-02 14:27:58'),
(121, 77, 16, 1, 1.75, 4, 'sale', '2020-12-02 14:27:58', '2020-12-02 14:27:58'),
(122, 78, 16, 1, 1.75, 4, 'sale', '2020-12-02 14:28:14', '2020-12-02 14:28:14'),
(123, 78, 17, 1, 1.75, 3, 'sale', '2020-12-02 14:28:14', '2020-12-02 14:28:14'),
(124, 78, 18, 1, 0.5, 1, 'sale', '2020-12-02 14:28:14', '2020-12-02 14:28:14'),
(125, 78, 19, 1, 1, 2, 'sale', '2020-12-02 14:28:14', '2020-12-02 14:28:14'),
(126, 79, 16, 1, 1.75, 4, 'sale', '2020-12-02 14:29:19', '2020-12-02 14:29:19'),
(127, 79, 17, 1, 1.75, 3, 'sale', '2020-12-02 14:29:19', '2020-12-02 14:29:19'),
(128, 79, 18, 1, 0.5, 1, 'sale', '2020-12-02 14:29:19', '2020-12-02 14:29:19'),
(129, 79, 19, 1, 1, 2, 'sale', '2020-12-02 14:29:20', '2020-12-02 14:29:20'),
(130, 79, 22, 3, 20, 30, 'sale', '2020-12-02 14:29:20', '2020-12-02 14:29:20'),
(131, 80, 16, 1, 1.75, 4, 'sale', '2020-12-11 13:55:48', '2020-12-11 13:55:48'),
(132, 80, 17, 1, 1.75, 3, 'sale', '2020-12-11 13:55:48', '2020-12-11 13:55:48'),
(133, 81, 16, 1, 1.75, 4, 'return', '2020-12-11 13:56:49', '2020-12-11 13:56:49'),
(134, 82, 19, 26, 1, 2, 'sale', '2021-03-12 17:25:38', '2021-03-12 17:25:38'),
(135, 83, 19, 1, 1, 2, 'sale', '2021-03-12 17:25:58', '2021-03-12 17:25:58'),
(136, 84, 19, 1, 1, 2, 'sale', '2021-03-12 17:26:08', '2021-03-12 17:26:08'),
(137, 85, 18, 1, 0.5, 1, 'return', '2021-03-12 19:33:14', '2021-03-12 19:33:14'),
(138, 86, 16, 1, 3, 4, 'sale', '2021-03-27 13:52:42', '2021-03-27 13:52:42'),
(139, 87, 36, 2, 20, 30, 'sale', '2021-04-02 13:15:06', '2021-04-02 13:15:06'),
(140, 88, 36, 1, 20, 30, 'sale', '2021-04-02 13:15:24', '2021-04-02 13:15:24'),
(141, 89, 18, 2, 0.5, 1, 'sale', '2021-10-21 11:02:18', '2021-10-21 11:02:18'),
(142, 89, 19, 1, 1, 2, 'sale', '2021-10-21 11:02:19', '2021-10-21 11:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(300) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `name` varchar(300) DEFAULT NULL,
  `remember_token` varchar(300) DEFAULT NULL,
  `open_seesion` int(11) DEFAULT NULL,
  `type` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `remember_token`, `open_seesion`, `type`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$hDUdJff4GLZKFyyVyLNuZeXnUXDQLLlzvVhdb5AipgSKGZmqX8Mm2', 'Mohamed', NULL, NULL, 'admin', '2020-10-20 17:00:47', '2021-10-21 11:22:07'),
(2, 'احمد', '$2y$10$.s6FJwdBZyGE00iZzHaTCeYzOLCgmRnWtQluB7mgNzXotxdu9Wody', 'احمد', NULL, NULL, 'user', '2020-10-20 17:01:26', '2021-03-27 13:54:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`ex_id`),
  ADD KEY `splitExpenses` (`split_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchases_id`);

--
-- Indexes for table `purchases_details`
--
ALTER TABLE `purchases_details`
  ADD PRIMARY KEY (`pur_id`),
  ADD KEY `Purchases_id_details` (`pursh_id`),
  ADD KEY `Product_purchases_id` (`prod_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `Created_user_id` (`user_id_open`),
  ADD KEY `close_user_id` (`user_id_close`);

--
-- Indexes for table `split_expenses`
--
ALTER TABLE `split_expenses`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `Transaction_Session_id` (`session_id`),
  ADD KEY `Transaction_User_id` (`user_id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`details_id`),
  ADD KEY `Product_transaction_id` (`pro_id`),
  ADD KEY `Transaction_Detils_id` (`trans_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchases_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchases_details`
--
ALTER TABLE `purchases_details`
  MODIFY `pur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `split_expenses`
--
ALTER TABLE `split_expenses`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `splitExpenses` FOREIGN KEY (`split_id`) REFERENCES `split_expenses` (`s_id`);

--
-- Constraints for table `purchases_details`
--
ALTER TABLE `purchases_details`
  ADD CONSTRAINT `Product_purchases_id` FOREIGN KEY (`prod_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `Purchases_id_details` FOREIGN KEY (`pursh_id`) REFERENCES `purchases` (`purchases_id`);

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `Created_user_id` FOREIGN KEY (`user_id_open`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `close_user_id` FOREIGN KEY (`user_id_close`) REFERENCES `users` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `Transaction_Session_id` FOREIGN KEY (`session_id`) REFERENCES `session` (`session_id`),
  ADD CONSTRAINT `Transaction_User_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `Product_transaction_id` FOREIGN KEY (`pro_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `Transaction_Detils_id` FOREIGN KEY (`trans_id`) REFERENCES `transaction` (`transaction_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
