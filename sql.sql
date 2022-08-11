-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 11, 2022 at 12:17 AM
-- Server version: 10.3.35-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emicdjqd_insta_daleel`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_infos`
--

CREATE TABLE `app_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fav` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_pinned_business` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_infos`
--

INSERT INTO `app_infos` (`id`, `logo`, `fav`, `total_pinned_business`, `created_at`, `updated_at`) VALUES
(1, '1648102475jRRc4aDIsk1f.png', '1648102475GoZp0ku3Mxl7.png', 5, NULL, '2022-04-11 07:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `position`, `title`, `image`, `button_text`, `link`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 1, 'Exclusive Offer', '1659909409rEUm5iqYhO06.png', 'View Offer', 'http://127.0.0.1:8000/admindashboard/settings-module/banner', 1, '2022-03-24 04:31:29', '2022-08-08 03:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `boxes`
--

CREATE TABLE `boxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `boxes`
--

INSERT INTO `boxes` (`id`, `image`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, '1648390004GuD4AYW6LIP2.png', 'Box Dynamic', '<p>This is insta daleel</p>', NULL, '2022-08-08 16:19:45'),
(2, '1648389995rLWTtOHmE1If.png', 'Box Two', '<p>This is insta daleel</p>', NULL, '2022-03-27 08:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` double(8,2) NOT NULL DEFAULT 0.00,
  `social_links` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_hour` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `is_pinned` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('Expired','Running') COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_packages`
--

CREATE TABLE `business_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double NOT NULL DEFAULT 0,
  `expiry_date` date NOT NULL,
  `payment_status` enum('Pending','Success','Cancel','Failed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Expired','Running') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_reviews`
--

CREATE TABLE `business_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `is_shown` tinyint(1) NOT NULL DEFAULT 0,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `position`, `name`, `slug`, `category_id`, `icon`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dress', 'dress', NULL, '1648363986aesiU6GtVAIb.png', 1, '2022-03-27 00:53:06', '2022-03-27 00:53:06'),
(3, 2, 'Electronics', 'electronics', NULL, '1648367030S1dVt4casZoj.png', 1, '2022-03-27 01:43:50', '2022-03-27 01:43:50'),
(5, 3, 'Motor', 'motor', NULL, '1648368682Wk3L4KLO75Sl.png', 1, '2022-03-27 02:11:22', '2022-03-27 02:11:22'),
(6, 1, 'Men', 'men', 1, '164837228935JmNMJHrAqv.png', 1, '2022-03-27 02:28:14', '2022-03-27 03:11:29'),
(7, 2, 'Women', 'women', 1, '1648369702yvRfTJxXpnAt.png', 1, '2022-03-27 02:28:22', '2022-03-27 02:28:22'),
(8, 1, 'Men\'s Shirt', 'mens-shirt', 6, '1648369776fXkMTaTnfF60.png', 1, '2022-03-27 02:29:36', '2022-03-27 02:29:36'),
(9, 2, 'Men\'s T-Shirt', 'mens-t-shirt', 6, '1648369783RPfWIQJdZyda.png', 1, '2022-03-27 02:29:43', '2022-03-27 02:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `comment_likes`
--

CREATE TABLE `comment_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_like_comment_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('Male','Female','Others') COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_otp_verified` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `last_active` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `image`, `email`, `phone`, `gender`, `about`, `occupation`, `password`, `address`, `latitude`, `longitude`, `is_otp_verified`, `is_active`, `last_active`, `month`, `year`, `created_at`, `updated_at`) VALUES
(9, 'Rehi', NULL, 'rehi@gmail.com', '01858361812', 'Male', 'R', 'R', '$2y$10$8dK96MzG3ciahtDLj21c2uZSSHqsi.5lET0fwwLDIW7gnQHMyN/6e', 'Dhaka', 'R', 'R', 1, 1, '2022-08-11 06:14:43', 4, 2022, '2022-04-28 08:12:09', '2022-08-11 06:14:43'),
(10, 'Awais', 'awais1659969837UBZE8QkRVWPn.jpg', 'awais@gmail.com', '03216841202', 'Male', 'aaa', 'aaa', '$2y$10$wis5xUeHsKwVNM22kIv5C.bWl76S0N3Hs92bRmqFQq/3bAjITAylC', 'aaa', '0.0', '0.0', 1, 1, '2022-08-09 19:11:07', 6, 2022, '2022-06-22 13:15:40', '2022-08-09 19:11:07'),
(11, 'awais', NULL, 'awaiss@gmail.com', '923216841202', '', NULL, NULL, '$2y$10$9u31VecSh.a3NCyPUBioNOSjoZa4zbOsI0vhjqcD7lE4suoK4s4Qa', NULL, NULL, NULL, 1, 1, '2022-06-22 13:18:37', 6, 2022, '2022-06-22 13:18:37', '2022-06-22 13:18:37'),
(12, 'usama', NULL, 'usama@gmail.com', '923061618208', '', NULL, NULL, '$2y$10$nm8vDVSCi9eaSu7zw8rSV.JsPnuV4f2i2lO3RMlfSEolJR2JHOzyS', NULL, NULL, NULL, 1, 1, '2022-06-22 13:23:11', 6, 2022, '2022-06-22 13:23:11', '2022-06-22 13:23:11'),
(13, 'a', NULL, 'a@gmail.com', '545', '', NULL, NULL, '$2y$10$4/hfC30BnDGhqtUHUxNLG.c.LAezIr5xSm87Ba.gxcs2tFke6YWPS', NULL, NULL, NULL, 1, 1, '2022-06-22 14:43:38', 6, 2022, '2022-06-22 14:43:38', '2022-06-22 14:43:38'),
(14, 'a', NULL, 'aaa@gmail.com', 'dfdfds', '', NULL, NULL, '$2y$10$vc1/KmHQGCnfNeA8TiwLDOhCUfGlNQWHAkJVqyCYIFmjYONOAENxO', NULL, NULL, NULL, 1, 1, '2022-06-22 14:44:36', 6, 2022, '2022-06-22 14:44:36', '2022-06-22 14:44:36'),
(15, 'usama', NULL, 'usama@gmail.con', '+923061618208', '', NULL, NULL, '$2y$10$DIXkUgjZBJLlYrBTBzQsSe0F09OIxoJW6/dR.WiqSU70TNU3fDYdW', NULL, NULL, NULL, 1, 1, '2022-06-22 16:13:47', 6, 2022, '2022-06-22 16:13:47', '2022-06-22 16:13:47'),
(16, 'Usama Muzaffar Hussain Aho Aho Aho', 'usama1659972479TeQ6xj706yzR.jpg', 'usamamuzaffar8@gmail.com', '03061618208', 'Male', 'aaa', 'aaa', '$2y$10$IlZmcx.Tv3JuLicXDEPvJ.e6eei/3.fWmuSZaxlNqfSCLl8SQDXaa', 'aaa', '0.0', '0.0', 1, 1, '2022-08-10 13:15:54', 6, 2022, '2022-06-22 16:21:14', '2022-08-10 13:15:54'),
(17, 'usama muzaffar', NULL, 'usa@gmail.com', '03216841203', '', NULL, NULL, '$2y$10$o5ehDnFoK8Zt6GBov8o5G.ZE3asSunmunjPp7POuDqtEizJ7WzHgm', NULL, NULL, NULL, 1, 1, '2022-06-22 16:31:02', 6, 2022, '2022-06-22 16:31:02', '2022-06-22 16:31:02'),
(18, 'usama muzaffar', NULL, 'usamamuzaffayysuwr8@gmail.com', '03061618458', '', NULL, NULL, '$2y$10$gtZ6Y7wqo34sOEQz4HmBm.ZZCqx9VpQW6a3YLy/q6FhxhUSNFq7FK', NULL, NULL, NULL, 1, 1, '2022-06-22 16:58:16', 6, 2022, '2022-06-22 16:58:16', '2022-06-22 16:58:16'),
(19, 'usama muzaffar', NULL, 'abc@gmail.com', '03211234567', '', NULL, NULL, '$2y$10$c2k/TBMRsU0kReOzooXF1en.9sdRW1Z3PmGynJJm.Zl1UC.Ao.TTa', NULL, NULL, NULL, 1, 1, '2022-06-22 17:20:03', 6, 2022, '2022-06-22 17:20:03', '2022-06-22 17:20:03'),
(20, 'abcd', NULL, 'abcd@gmail.com', '123456789', '', NULL, NULL, '$2y$10$8TAC4LnVSKr0ncTmMs0k7eLDC.NpS3LIpwjEq.aoAswV/3C.nnGTK', NULL, NULL, NULL, 1, 1, '2022-06-22 19:17:18', 6, 2022, '2022-06-22 19:17:18', '2022-06-22 19:17:18'),
(21, 'A', NULL, 'a@gmail', 'com', '', NULL, NULL, '$2y$10$7UX2T6bGjnF8DbrwmwR2ZeLhCdA98AZ9CrpR9GyaxCo7K3LXXzkFG', NULL, NULL, NULL, 1, 1, '2022-06-23 14:51:34', 6, 2022, '2022-06-23 14:51:35', '2022-06-23 14:51:35'),
(22, 'Shakik', NULL, 'shakil.wiki@gmail.com', '0501379201', '', NULL, NULL, '$2y$10$nAbS3qybdO2T.iwImO6BAeFTqAuG.6.PBCH7KxkjOSY8erJVRtwVe', NULL, NULL, NULL, 1, 1, '2022-06-23 19:54:17', 6, 2022, '2022-06-23 19:54:17', '2022-06-23 19:54:17'),
(23, 'Asif', NULL, 'asif2318@gmail.com', '971563129676', '', NULL, NULL, '$2y$10$mQzlhHP2mrb.bMzxiZBE0OZbjUNgVO8nt468nh4gMcmN11zherWci', NULL, NULL, NULL, 1, 1, '2022-06-24 12:06:58', 6, 2022, '2022-06-24 12:06:58', '2022-06-24 12:06:58'),
(24, 'test123', NULL, 'test@hotmail.com', '050123456', '', NULL, NULL, '$2y$10$yhCJXV0FJ05VEuYo1iozq.a.aj0gnqGmvXVAc5ckQ5BiHhbzVdDL6', NULL, NULL, NULL, 1, 1, '2022-07-02 23:50:48', 7, 2022, '2022-07-02 23:50:48', '2022-07-02 23:50:48'),
(25, 'Asif', NULL, 'asif@emicontech.com', '971545403359', '', NULL, NULL, '$2y$10$/U7guWAPcCfxejwetwjCXOMMlwLm7jeYxEmTZDEh1OFBO5au0uQEu', NULL, NULL, NULL, 1, 1, '2022-07-08 11:30:34', 7, 2022, '2022-07-08 11:30:34', '2022-07-08 11:30:34'),
(26, 'test123', NULL, 'test123@hotmail.com', '0501234567', '', NULL, NULL, '$2y$10$BYKgLDWOpM7gyjctLDDmM.2uwm9dnUo5QaiI4NB5qKnvTdmslYz52', NULL, NULL, NULL, 1, 1, '2022-07-08 17:56:00', 7, 2022, '2022-07-08 17:56:00', '2022-07-08 17:56:00'),
(27, 'Abir', NULL, 'abir9413@gmail.com', '971545403360', '', NULL, NULL, '$2y$10$myJa9xI82XyQztqRM.zAwOCFukpVqOfCY8WC2PUZNW6X2ztHs1tvm', NULL, NULL, NULL, 1, 1, '2022-07-25 23:01:44', 7, 2022, '2022-07-25 23:01:44', '2022-07-25 23:01:44'),
(28, 'yousuf', NULL, 'test1@hotmail.com', '0501234568', '', NULL, NULL, '$2y$10$zEpF5UERwWZim3Q1S.Stmuay7Cz4VgahP/0GHxn/IttYMa.PC.C6u', NULL, NULL, NULL, 1, 1, '2022-07-26 22:08:19', 7, 2022, '2022-07-26 22:08:19', '2022-07-26 22:08:19'),
(29, 'Asif', NULL, 'abir9414@gmail.com', '971563129686', '', NULL, NULL, '$2y$10$cXy4hZaNISl55sfaRg24LOMk7A6Aeah5HTsIM.VaXKrZenVDxwYum', NULL, NULL, NULL, 1, 1, '2022-07-29 12:41:37', 7, 2022, '2022-07-29 12:41:37', '2022-07-29 12:41:37'),
(30, 'yousuf', NULL, 'test2@hotmail.com', '0501234569', '', NULL, NULL, '$2y$10$P3pdGtP3xJ7mHnfTv0JY3OOorghdrVQgV.NRYXHwclQW.1ls9Snqu', NULL, NULL, NULL, 1, 1, '2022-07-29 14:17:39', 7, 2022, '2022-07-29 14:17:39', '2022-07-29 14:17:39'),
(31, 'Ali', NULL, 'ali@gmail.com', '923257723678', '', NULL, NULL, '$2y$10$OpYEpj8QuVfuR6Ou7GN2j.iiXcsbKeD1Nl1HTZ5uQa0iB1FlCuHtG', NULL, NULL, NULL, 1, 1, '2022-08-03 14:46:35', 8, 2022, '2022-08-03 14:46:35', '2022-08-03 14:46:35'),
(32, 'Ali', NULL, 'ali1@gmail.com', '03257723678', '', NULL, NULL, '$2y$10$zi9kxB8kzEOluzWhYsPvfeus5EkSWAka7dYh9FD5zLlYsVwPTN8FG', NULL, NULL, NULL, 1, 1, '2022-08-03 18:07:52', 8, 2022, '2022-08-03 14:47:36', '2022-08-03 18:07:52');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `event_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_organizer_location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `position`, `title`, `description`, `image`, `location_id`, `event_location`, `event_organizer_location`, `date`, `time`, `is_active`, `address`, `month`, `year`, `created_at`, `updated_at`) VALUES
(2, 1, 'Event One', 'The program will be ended at 11:00 AM', '1648974029OXBVY4ifVx9j.jpg', 3, 'Chattogram', 'Chattogram', '2022-04-07', '14:26:00', 1, 'Chattogram', 4, 2022, '2022-04-03 08:20:20', '2022-08-08 04:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('Country','City') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `image`, `location_id`, `type`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', '1648967351U8561ZfzAhol.png', NULL, 'Country', 1, '2022-04-03 06:29:11', '2022-04-03 06:29:11'),
(2, 'Dhaka', NULL, 1, 'City', 1, '2022-04-03 06:29:19', '2022-04-03 06:29:19'),
(3, 'Chattogram', NULL, 1, 'City', 1, '2022-04-03 06:29:24', '2022-04-03 06:29:24'),
(4, 'Sylhet', NULL, 1, 'City', 1, '2022-04-03 06:29:28', '2022-04-03 06:29:28'),
(5, 'Rajshahi', NULL, 1, 'City', 1, '2022-04-03 06:29:31', '2022-04-03 06:29:31');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_24_161700_create_modules_table', 1),
(5, '2021_04_24_161711_create_permissions_table', 1),
(6, '2021_04_24_161733_create_roles_table', 1),
(7, '2021_04_24_161734_create_permission_roles_table', 1),
(8, '2021_04_24_161742_create_sub_modules_table', 1),
(9, '2021_04_24_161757_create_super_admins_table', 1),
(10, '2021_08_19_102916_create_app_infos_table', 1),
(12, '2022_03_24_093855_create_banners_table', 2),
(13, '2022_03_27_045152_create_customers_table', 3),
(14, '2022_03_27_050525_create_verifies_table', 4),
(15, '2022_03_27_053018_create_categories_table', 5),
(17, '2022_03_27_130036_create_boxes_table', 7),
(18, '2022_03_29_082748_create_posts_table', 8),
(19, '2022_03_30_035657_create_post_like_comments_table', 9),
(20, '2022_03_30_042119_create_comment_likes_table', 10),
(22, '2022_03_27_112857_create_locations_table', 11),
(24, '2022_04_03_120418_create_events_table', 12),
(25, '2022_04_03_150511_create_packages_table', 13),
(29, '2022_04_03_151021_create_businesses_table', 14),
(30, '2022_04_05_115232_create_business_packages_table', 14),
(31, '2022_04_06_135525_create_business_reviews_table', 15),
(32, '2022_04_12_122507_create_offers_table', 16),
(33, '2022_04_12_150026_create_favourites_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `key`, `icon`, `position`, `route`, `created_at`, `updated_at`) VALUES
(1, 'User Module', 'user_module', 'fas fa-users', 1, NULL, NULL, NULL),
(2, 'Setting Module', 'settings', 'fas fa-cog', 10, NULL, NULL, NULL),
(3, 'App Datas', 'app_data_module', 'fas fa-mobile', 2, NULL, NULL, NULL),
(4, 'Community Module', 'community_module', 'fas fa-hand-holding-heart', 3, NULL, NULL, NULL),
(5, 'Customer Module', 'customer_module', 'fas fa-user', 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `business_id` bigint(20) UNSIGNED NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration_days` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `duration_days`, `price`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Standard', 60, 50, 1, '2022-04-03 09:35:39', '2022-04-05 05:45:51'),
(3, 'Best', 3, 40, 1, '2022-04-03 09:36:09', '2022-04-05 05:44:27'),
(4, 'easy', 1, 10, 1, '2022-05-23 19:17:59', '2022-05-23 19:17:59');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `display_name`, `module_id`, `created_at`, `updated_at`) VALUES
(1, 'user_module', 'User Module', 1, NULL, NULL),
(2, 'all_user', 'All User', 1, NULL, NULL),
(3, 'add_user', '-- Add User', 1, NULL, NULL),
(4, 'edit_user', '-- Edit User', 1, NULL, NULL),
(5, 'reset_password', '-- Reset Password', 1, NULL, NULL),
(6, 'settings', 'Setting Module', 2, NULL, NULL),
(7, 'app_info', '-- App Info', 2, NULL, NULL),
(8, 'banner', 'Banner', 2, NULL, NULL),
(9, 'add_banner', '-- Add Banner', 2, NULL, NULL),
(10, 'edit_banner', '-- Edit Banner', 2, NULL, NULL),
(11, 'view_banner', '-- View Banner', 2, NULL, NULL),
(12, 'delete_banner', '-- Delete Banner', 2, NULL, NULL),
(13, 'all_category', 'All Category', 3, NULL, NULL),
(14, 'add_category', '-- Add Category', 3, NULL, NULL),
(15, 'edit_category', '-- Edit Category', 3, NULL, NULL),
(16, 'view_category', '-- View Category', 3, NULL, NULL),
(18, 'country', 'Country', 3, NULL, NULL),
(19, 'add_country', '-- Add Country', 3, NULL, NULL),
(20, 'edit_country', '-- Edit Country', 3, NULL, NULL),
(21, 'view_country', '-- View Country', 3, NULL, NULL),
(22, 'boxes', 'Boxes', 3, NULL, NULL),
(23, 'edit_boxes', '-- Edit Boxes', 3, NULL, NULL),
(24, 'city', 'City', 3, NULL, NULL),
(25, 'add_city', '-- Add City', 3, NULL, NULL),
(26, 'edit_city', '-- Edit City', 3, NULL, NULL),
(27, 'view_city', '-- View City', 3, NULL, NULL),
(28, 'app_data_module', 'App Datas', 3, NULL, NULL),
(29, 'all_event', 'All Event', 3, NULL, NULL),
(30, 'add_event', '-- Add Event', 3, NULL, NULL),
(31, 'edit_event', '-- Edit Event', 3, NULL, NULL),
(32, 'delete_event', '-- Delete Event', 3, NULL, NULL),
(33, 'view_event', '-- View Event', 3, NULL, NULL),
(34, 'all_package', 'All Package', 3, NULL, NULL),
(35, 'add_package', '-- Add Package', 3, NULL, NULL),
(36, 'edit_package', '-- Edit Package', 3, NULL, NULL),
(37, 'view_package', '-- View Package', 3, NULL, NULL),
(38, 'community_module', 'Community Module', 4, NULL, NULL),
(39, 'all_post', 'All Post', 4, NULL, NULL),
(40, 'edit_post', '-- Edit Post', 4, NULL, NULL),
(41, 'view_post', '-- View Post', 4, NULL, NULL),
(42, 'delete_post', '-- Delete Post', 4, NULL, NULL),
(43, 'all_business', 'All Business', 3, NULL, NULL),
(44, 'Edit_business', '-- Edit Business', 3, NULL, NULL),
(45, 'view_business', '-- View Business', 3, NULL, NULL),
(46, 'delete_business', '-- Delete Business', 3, NULL, NULL),
(47, 'view_business_review', '-- View Business Review', 3, NULL, NULL),
(48, 'delete_business_review', '-- Delete Business Review', 3, NULL, NULL),
(49, 'all_offer', 'All Offer', 3, NULL, NULL),
(50, 'edit_offer', '-- Edit Offer', 3, NULL, NULL),
(51, 'view_offer', '-- View Offer', 3, NULL, NULL),
(52, 'delete_offer', '-- Delete Offer', 3, NULL, NULL),
(53, 'customer_module', 'Customer Module', 5, NULL, NULL),
(54, 'all_customer', 'All Customer', 5, NULL, NULL),
(55, 'add_customer', '-- Add Customer', 5, NULL, NULL),
(57, 'view_customer', '-- View Customer', 5, NULL, NULL),
(58, 'delete_customer', '-- Delete Customer', 5, NULL, NULL),
(59, 'reset_customer_password', '-- Reset Customer Password', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `is_shown` tinyint(1) NOT NULL DEFAULT 0,
  `total_like` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `total_comment` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `customer_id`, `image`, `description`, `is_approved`, `is_shown`, `total_like`, `total_comment`, `month`, `year`, `created_at`, `updated_at`) VALUES
(33, 9, NULL, 'New Post', 1, 1, 0, 0, 8, 2022, '2022-08-07 06:36:06', '2022-08-07 06:39:38'),
(34, 10, NULL, 'hiii', 1, 1, 0, 0, 8, 2022, '2022-08-08 17:10:21', '2022-08-08 17:10:21'),
(35, 10, NULL, 'hiii', 1, 1, 0, 0, 8, 2022, '2022-08-08 17:11:38', '2022-08-08 17:11:38'),
(36, 10, NULL, 'hiii', 1, 1, 0, 0, 8, 2022, '2022-08-08 17:13:44', '2022-08-08 17:13:44'),
(37, 10, NULL, 'hiii', 1, 1, 0, 0, 8, 2022, '2022-08-08 18:19:31', '2022-08-08 18:19:31'),
(38, 10, NULL, 'hiiiiiiii...', 1, 1, 0, 0, 8, 2022, '2022-08-08 18:44:19', '2022-08-08 18:44:19'),
(39, 10, NULL, 'gaisbsjeodjndjd', 1, 1, 0, 0, 8, 2022, '2022-08-08 20:11:16', '2022-08-08 20:11:16'),
(40, 10, NULL, 'Valid post', 1, 1, 0, 0, 8, 2022, '2022-08-08 20:53:42', '2022-08-08 20:53:42'),
(41, 10, NULL, 'valid post 1', 1, 1, 0, 0, 8, 2022, '2022-08-08 20:56:14', '2022-08-08 20:56:14'),
(42, 10, NULL, 'valid point...', 1, 1, 0, 0, 8, 2022, '2022-08-08 20:57:04', '2022-08-08 20:57:04'),
(43, 10, NULL, 'hello...', 1, 1, 0, 0, 8, 2022, '2022-08-08 20:57:59', '2022-08-08 20:57:59'),
(44, 10, NULL, 'gahahsjskjssk.......', 1, 1, 0, 0, 8, 2022, '2022-08-08 21:01:07', '2022-08-08 21:01:07'),
(45, 10, NULL, 'nice 😄', 1, 1, 0, 0, 8, 2022, '2022-08-08 21:08:02', '2022-08-08 21:08:02'),
(46, 16, NULL, 'first post', 1, 1, 0, 0, 8, 2022, '2022-08-08 21:30:59', '2022-08-08 21:30:59'),
(47, 10, NULL, 'my good  post 📪', 1, 1, 0, 0, 8, 2022, '2022-08-09 16:52:00', '2022-08-09 16:52:00'),
(48, 10, NULL, 'asdfghh', 1, 1, 0, 0, 8, 2022, '2022-08-09 16:58:41', '2022-08-09 16:58:41'),
(49, 10, NULL, 'latest post 📪📪📪', 1, 1, 0, 0, 8, 2022, '2022-08-09 17:51:53', '2022-08-09 17:51:53'),
(50, 10, NULL, 'hiii,,,,,,🔈', 1, 1, 0, 0, 8, 2022, '2022-08-09 18:34:36', '2022-08-09 18:34:36'),
(51, 16, NULL, 'hii too, this a replied post to check the apis refreshing.', 1, 1, 0, 0, 8, 2022, '2022-08-09 18:35:35', '2022-08-09 18:35:35'),
(53, 9, '\"[{\\\"id\\\":1,\\\"image\\\":\\\"1660175422ieu8fGXuvL0D.png\\\"},{\\\"id\\\":2,\\\"image\\\":\\\"1660175423JNTAsmXjz6wf.png\\\"}]\"', 'New Post', 1, 1, 0, 0, 8, 2022, '2022-08-11 05:50:24', '2022-08-11 05:50:24');

-- --------------------------------------------------------

--
-- Table structure for table `post_like_comments`
--

CREATE TABLE `post_like_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('Like','Comment') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Sales', 1, '2022-05-23 19:11:32', '2022-05-23 19:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `sub_modules`
--

CREATE TABLE `sub_modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_modules`
--

INSERT INTO `sub_modules` (`id`, `name`, `key`, `position`, `route`, `module_id`, `created_at`, `updated_at`) VALUES
(1, 'All User', 'all_user', 1, 'user.all', 1, NULL, NULL),
(2, 'Roles', 'roles', 2, 'role.all', 1, NULL, NULL),
(3, 'App Info', 'app_info', 2, 'app.info.all', 2, NULL, NULL),
(4, 'Banner', 'banner', 1, 'banner.all', 2, NULL, NULL),
(5, 'All Category', 'all_category', 1, 'category.all', 3, NULL, NULL),
(6, 'Country', 'country', 2, 'country.all', 3, NULL, NULL),
(7, 'City', 'city', 3, 'city.all', 3, NULL, NULL),
(8, 'Boxes', 'boxes', 4, 'boxes.all', 3, NULL, NULL),
(9, 'All Event', 'all_event', 5, 'event.all', 3, NULL, NULL),
(10, 'All Package', 'all_package', 6, 'package.all', 3, NULL, NULL),
(11, 'All Post', 'all_post', 1, 'post.all', 4, NULL, NULL),
(12, 'All Business', 'all_business', 7, 'business.all', 3, NULL, NULL),
(13, 'All Offer', 'all_offer', 8, 'offer.all', 3, NULL, NULL),
(14, 'All Customer', 'all_customer', 1, 'customer.all', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `super_admins`
--

CREATE TABLE `super_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `super_admins`
--

INSERT INTO `super_admins` (`id`, `name`, `email`, `image`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', NULL, '1858361812', NULL, '$2y$10$6oDodcq6LYmeSXLlcMjrLe/1s/SJKPiXzvfvvxz5A3k8yeQOTRXu2', 'oN2ICqvLGEgpyEHn24aB1QMkfPCsgN0qHDkAZCwSpPwXdJ2W3AZlFBiwUzFW', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `image`, `password`, `role_id`, `is_active`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohammed Shahriar', 'shahriar@emicontech.com', '123456789', NULL, '$2y$10$mkg7wAEJb.K/7DWpMdUoV.iKyVoLWldxq9NbWR60XG6e1OFpPg0TC', 1, 1, NULL, NULL, '2022-05-23 19:12:07', '2022-05-23 19:12:07');

-- --------------------------------------------------------

--
-- Table structure for table `verifies`
--

CREATE TABLE `verifies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verifies`
--

INSERT INTO `verifies` (`id`, `phone`, `code`, `created_at`, `updated_at`) VALUES
(1, '01858361812', '864270', '2022-03-26 23:09:55', '2022-03-26 23:09:55'),
(2, '01858361812', '316723', '2022-03-26 23:10:17', '2022-03-26 23:10:17'),
(3, '01858361812', '368530', '2022-03-26 23:11:16', '2022-03-26 23:11:16'),
(4, '01858361812', '254359', '2022-03-26 23:11:30', '2022-03-26 23:11:30'),
(5, '01858361812', '966555', '2022-03-26 23:12:51', '2022-03-26 23:12:51'),
(6, '01858361812', '189410', '2022-03-26 23:13:58', '2022-03-26 23:13:58'),
(7, '01858361812', '232247', '2022-03-26 23:14:41', '2022-03-26 23:14:41'),
(8, '01858361812', '801076', '2022-03-26 23:15:45', '2022-03-26 23:15:45'),
(9, '01858361812', '559904', '2022-03-26 23:16:17', '2022-03-26 23:16:17'),
(10, '01858361812', '453642', '2022-03-26 23:20:36', '2022-03-26 23:20:36'),
(11, '01858361813', '121699', '2022-03-31 02:31:08', '2022-03-31 02:31:08'),
(12, '01858361812', '476562', '2022-03-31 09:58:29', '2022-03-31 09:58:29'),
(13, '01858361812', '669600', '2022-03-31 10:43:32', '2022-03-31 10:43:32'),
(14, '01858361812', '67861', '2022-03-31 10:43:54', '2022-03-31 10:43:54'),
(15, '03216841202', '81406', '2022-06-22 13:15:40', '2022-06-22 13:15:40'),
(16, '923216841202', '776724', '2022-06-22 13:18:37', '2022-06-22 13:18:37'),
(17, '923061618208', '869661', '2022-06-22 13:23:11', '2022-06-22 13:23:11'),
(18, '545', '30347', '2022-06-22 14:43:38', '2022-06-22 14:43:38'),
(19, 'dfdfds', '169098', '2022-06-22 14:44:36', '2022-06-22 14:44:36'),
(20, '+923061618208', '140592', '2022-06-22 16:13:46', '2022-06-22 16:13:46'),
(21, '03061618208', '844030', '2022-06-22 16:21:14', '2022-06-22 16:21:14'),
(22, '03216841203', '628696', '2022-06-22 16:31:02', '2022-06-22 16:31:02'),
(23, '03061618458', '213492', '2022-06-22 16:58:16', '2022-06-22 16:58:16'),
(24, '03211234567', '214393', '2022-06-22 17:20:03', '2022-06-22 17:20:03'),
(25, '123456789', '407557', '2022-06-22 19:17:18', '2022-06-22 19:17:18'),
(26, 'com', '568576', '2022-06-23 14:51:34', '2022-06-23 14:51:34'),
(27, '0501379201', '162875', '2022-06-23 19:54:17', '2022-06-23 19:54:17'),
(28, '971563129676', '861572', '2022-06-24 12:06:58', '2022-06-24 12:06:58'),
(29, '050123456', '986739', '2022-07-02 23:50:48', '2022-07-02 23:50:48'),
(30, '971545403359', '82605', '2022-07-08 11:30:33', '2022-07-08 11:30:33'),
(31, '0501234567', '903870', '2022-07-08 17:56:00', '2022-07-08 17:56:00'),
(32, '971545403360', '620249', '2022-07-25 23:01:44', '2022-07-25 23:01:44'),
(33, '0501234568', '828632', '2022-07-26 22:08:19', '2022-07-26 22:08:19'),
(34, '971563129686', '434053', '2022-07-29 12:41:37', '2022-07-29 12:41:37'),
(35, '0501234569', '863615', '2022-07-29 14:17:39', '2022-07-29 14:17:39'),
(36, '923257723678', '845815', '2022-08-03 14:46:35', '2022-08-03 14:46:35'),
(37, '03257723678', '754026', '2022-08-03 14:47:36', '2022-08-03 14:47:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_infos`
--
ALTER TABLE `app_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banners_position_unique` (`position`);

--
-- Indexes for table `boxes`
--
ALTER TABLE `boxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `businesses_code_unique` (`code`),
  ADD KEY `businesses_customer_id_foreign` (`customer_id`),
  ADD KEY `businesses_location_id_foreign` (`location_id`),
  ADD KEY `businesses_category_id_foreign` (`category_id`);

--
-- Indexes for table `business_packages`
--
ALTER TABLE `business_packages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `business_packages_transaction_id_unique` (`transaction_id`),
  ADD KEY `business_packages_business_id_foreign` (`business_id`),
  ADD KEY `business_packages_package_id_foreign` (`package_id`);

--
-- Indexes for table `business_reviews`
--
ALTER TABLE `business_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_reviews_business_id_foreign` (`business_id`),
  ADD KEY `business_reviews_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_likes_post_like_comment_id_foreign` (`post_like_comment_id`),
  ADD KEY `comment_likes_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_phone_unique` (`phone`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `events_position_unique` (`position`),
  ADD KEY `events_location_id_foreign` (`location_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favourites_business_id_foreign` (`business_id`),
  ADD KEY `favourites_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `locations_name_unique` (`name`),
  ADD KEY `locations_location_id_foreign` (`location_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modules_name_unique` (`name`),
  ADD UNIQUE KEY `modules_key_unique` (`key`),
  ADD UNIQUE KEY `modules_position_unique` (`position`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `offers_position_unique` (`position`),
  ADD KEY `offers_customer_id_foreign` (`customer_id`),
  ADD KEY `offers_business_id_foreign` (`business_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_key_unique` (`key`),
  ADD KEY `permissions_module_id_foreign` (`module_id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `post_like_comments`
--
ALTER TABLE `post_like_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_like_comments_customer_id_foreign` (`customer_id`),
  ADD KEY `post_like_comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `sub_modules`
--
ALTER TABLE `sub_modules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_modules_name_unique` (`name`),
  ADD UNIQUE KEY `sub_modules_key_unique` (`key`),
  ADD KEY `sub_modules_module_id_foreign` (`module_id`);

--
-- Indexes for table `super_admins`
--
ALTER TABLE `super_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `super_admins_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `verifies`
--
ALTER TABLE `verifies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `verifies_code_unique` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_infos`
--
ALTER TABLE `app_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `boxes`
--
ALTER TABLE `boxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `business_packages`
--
ALTER TABLE `business_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `business_reviews`
--
ALTER TABLE `business_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comment_likes`
--
ALTER TABLE `comment_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `post_like_comments`
--
ALTER TABLE `post_like_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_modules`
--
ALTER TABLE `sub_modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `super_admins`
--
ALTER TABLE `super_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `verifies`
--
ALTER TABLE `verifies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `businesses`
--
ALTER TABLE `businesses`
  ADD CONSTRAINT `businesses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `businesses_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `businesses_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `business_packages`
--
ALTER TABLE `business_packages`
  ADD CONSTRAINT `business_packages_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `business_packages_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `business_reviews`
--
ALTER TABLE `business_reviews`
  ADD CONSTRAINT `business_reviews_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `business_reviews_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD CONSTRAINT `comment_likes_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_likes_post_like_comment_id_foreign` FOREIGN KEY (`post_like_comment_id`) REFERENCES `post_like_comments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourites_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `offers_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_like_comments`
--
ALTER TABLE `post_like_comments`
  ADD CONSTRAINT `post_like_comments_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_like_comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_modules`
--
ALTER TABLE `sub_modules`
  ADD CONSTRAINT `sub_modules_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
