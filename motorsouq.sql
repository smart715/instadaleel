-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 30, 2022 at 08:03 AM
-- Server version: 10.3.32-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emicdjqd_motorsouq`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_infos`
--

CREATE TABLE `app_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fav` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_one_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_two_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_time` time DEFAULT NULL,
  `closing_time` time DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_infos`
--

INSERT INTO `app_infos` (`id`, `logo`, `footer_logo`, `footer_text`, `fav`, `banner_image`, `ad_one`, `ad_two`, `banner_text`, `about`, `facebook_url`, `linkedin_url`, `youtube_url`, `twitter_url`, `ad_one_link`, `ad_two_link`, `opening_time`, `closing_time`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, '1639391373LqrbGTrIQgka.png', '16393913748O7XTSgl8M0A.png', 'I’ve been riding motorcycles all my life, the first of which was a Harley-Davidson X90, which I received as a Christmas present from my parents. Riding has always been a passion. There’s nothing like being on the open road alone or riding with friends. I’ve always said that when you ride down a road in a car, you are a spectator, but when you’re on a motorcycle, you’re a participant. As I grew older my passion changed from dirt bikes, to cruisers, then to touring. My love of the sport has also grown. Moving to and riding in the United Arab Emirates has allowed me to meet many wonderful riders who will remain long-time friends. One thing that it has done for me is to allow me to become close friends with riders from all over the World. Though we come from a varied background of cultures, we are all brothers and sisters that share one passion…motorcycle riding. Being involved in the motorcycle community in Dubai, I found that even though there were many dealerships, individual buyers and sellers, there was no dedicated online portal for advertising motorcycles and accessories for sale. That’s when I created Motorcycle Souk. I hope you will find it helpful, easy to use and entertaining. Please feel free to reach out to us with your comments and suggestions. Happy riding!', '1639391374gbvptdPB5Ikq.png', '16393913742P1Y4rTNK1M1.jpg', '1640689423zSteBOIIN6lE.png', '16406894232u49wBvNF8qz.jpg', 'Online Marketplace For Buying & Selling Motorcycles', 'I’ve been riding motorcycles all my life, the first of which was a Harley-Davidson X90, which I received as a Christmas present from my parents. Riding has always been a passion. There’s nothing like being on the open road alone or riding with friends. I’ve always said that when you ride down a road in a car, you are a spectator, but when you’re on a motorcycle, you’re a participant. As I grew older my passion changed from dirt bikes, to cruisers, then to touring. My love of the sport has also grown.\r\n                    Moving to and riding in the United Arab Emirates has allowed me to meet many wonderful riders who will remain long-time friends. One thing that it has done for me is to allow me to become close friends with riders from all over the World. Though we come from a varied background of cultures, we are all brothers and sisters that share one passion…motorcycle riding.\r\n                    Being involved in the motorcycle community in Dubai, I found that even though there were many dealerships, individual buyers and sellers, there was no dedicated online portal for advertising motorcycles and accessories for sale. That’s when I created Motorcycle Souk. I hope you will find it helpful, easy to use and entertaining. Please feel free to reach out to us with your comments and suggestions. Happy riding!', 'facebook.com', 'linkedin.com', 'youtube.com', 'twitter.com', 'http://127.0.0.1:8000/all-dealer', 'http://127.0.0.1:8000/admindashboard/settings-module/app_info', '15:50:00', '10:00:00', 'info@motosouq.coms', '01858361813', 'UAE', NULL, '2021-12-28 11:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `posted_by` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Not Approved','Approved') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Honda', 'honda', '1639289850Y81qIFm1LeuJ.jpg', 1, '2021-12-12 00:17:30', '2021-12-12 00:17:30'),
(2, 'Suzuki', 'suzuki', '1639289859Ga2eryEQ5zCO.jpg', 1, '2021-12-12 00:17:39', '2021-12-12 00:17:39'),
(3, 'KTM', 'ktm', '1639289866XsIljNvjSX34.jpg', 1, '2021-12-12 00:17:46', '2021-12-12 00:17:46'),
(4, 'Yamaha', 'yamaha', '163928987405Isijrcq4Nw.jpg', 1, '2021-12-12 00:17:54', '2021-12-12 00:17:54'),
(5, 'BMW', 'bmw', '1639289881v0KU7NgVmbUq.png', 1, '2021-12-12 00:18:01', '2021-12-12 00:18:01'),
(6, 'Kawasaki', 'kawasaki', '1639289896WipFSYpu30MN.jpg', 1, '2021-12-12 00:18:16', '2021-12-12 00:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Class A', 'class-a', 1, '2021-12-12 00:18:48', '2021-12-12 00:18:48'),
(2, 'Class B', 'class-b', 1, '2021-12-12 00:18:51', '2021-12-12 00:18:51'),
(3, 'Class C', 'class-c', 1, '2021-12-12 00:18:54', '2021-12-12 00:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `conditions`
--

CREATE TABLE `conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conditions`
--

INSERT INTO `conditions` (`id`, `name`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Brand New', 'brand-new', 1, '2021-12-12 00:19:06', '2021-12-12 00:19:20'),
(2, 'Recondition', 'recondition', 1, '2021-12-12 00:19:10', '2021-12-12 00:19:10'),
(3, 'Used', 'used', 1, '2021-12-12 00:19:14', '2021-12-12 00:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Cash','Percentage') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `expiry_date` date NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `feature_images`
--

CREATE TABLE `feature_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` int(11) NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feature_images`
--

INSERT INTO `feature_images` (`id`, `position`, `link`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 1, 'http://127.0.0.1:8000', '16404944563TKBOx2ZS2X1.png', 1, '2021-12-25 22:54:16', '2021-12-25 22:58:28'),
(4, 2, 'http://127.0.0.1:8000/admindashboard/settings-module/feature-image', '1640495044kjUwspw6dhCI.png', 1, '2021-12-25 23:04:05', '2021-12-25 23:04:05');

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
(6, '2021_04_24_161719_create_permission_roles_table', 1),
(7, '2021_04_24_161733_create_roles_table', 1),
(8, '2021_04_24_161742_create_sub_modules_table', 1),
(9, '2021_04_24_161757_create_super_admins_table', 1),
(11, '2021_11_07_045907_create_years_table', 1),
(12, '2021_11_07_061053_create_product_models_table', 1),
(13, '2021_11_07_065027_create_brands_table', 1),
(14, '2021_11_07_084513_create_product_types_table', 1),
(15, '2021_11_07_090541_create_classes_table', 1),
(16, '2021_11_07_094914_create_visitor_types_table', 1),
(17, '2021_11_07_104057_create_coupons_table', 1),
(18, '2021_11_07_112737_create_validities_table', 1),
(19, '2021_11_14_041848_create_packages_table', 1),
(20, '2021_11_14_081155_create_visitors_table', 1),
(21, '2021_11_14_082822_create_package_transactions_table', 1),
(22, '2021_11_14_082832_create_visitor_packages_table', 1),
(23, '2021_11_14_085433_create_verifies_table', 1),
(24, '2021_11_25_053123_create_price_taglines_table', 1),
(25, '2021_11_25_053136_create_conditions_table', 1),
(26, '2021_11_25_090948_create_products_table', 1),
(27, '2021_11_25_091008_create_product_images_table', 1),
(28, '2021_11_25_091014_create_product_videos_table', 1),
(29, '2021_12_12_070007_create_wishlists_table', 2),
(30, '2021_12_12_102507_create_queries_table', 3),
(33, '2021_12_12_122644_create_blogs_table', 6),
(34, '2021_08_19_102916_create_app_infos_table', 7),
(35, '2021_12_13_111651_create_pages_table', 8),
(36, '2021_12_13_124627_create_feature_images_table', 9),
(37, '2021_12_26_053719_create_contacts_table', 10),
(38, '2021_12_26_060453_create_newsletters_table', 11),
(39, '2022_01_11_041832_create_events_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `key`, `icon`, `position`, `route`, `created_at`, `updated_at`) VALUES
(1, 'Admin Module', 'user_module', 'fas fa-users', '1', NULL, NULL, NULL),
(2, 'Setting Module', 'settings', 'fas fa-cog', '6', NULL, NULL, NULL),
(3, 'Product Module', 'product_module', 'fas fa-shopping-bag', '3', NULL, NULL, NULL),
(4, 'System Data Module', 'system_data_module', 'nav-icon fas fa-database', '5', NULL, NULL, NULL),
(5, 'Contact Module', 'contact_module', 'fas fa-phone', '4', NULL, NULL, NULL),
(6, 'All User', 'visitor', 'fas fa-users', '2', 'visitor.all', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double DEFAULT NULL,
  `is_trial` tinyint(1) NOT NULL,
  `options` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor_type_id` bigint(20) UNSIGNED NOT NULL,
  `validity_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `position`, `title`, `slug`, `price`, `is_trial`, `options`, `visitor_type_id`, `validity_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '1', 'Trial Seller', 'trial-seller', NULL, 1, 'a:1:{i:0;a:4:{s:13:\"total_product\";i:1;s:18:\"photos_per_product\";i:1;s:17:\"video_per_product\";i:1;s:21:\"total_feature_product\";i:1;}}', 1, 1, 1, '2021-12-12 00:10:01', '2021-12-12 00:10:01'),
(2, '1', 'Trial Dealer', 'trial-dealer', NULL, 1, 'a:1:{i:0;a:4:{s:13:\"total_product\";i:1;s:18:\"photos_per_product\";i:1;s:17:\"video_per_product\";i:1;s:21:\"total_feature_product\";i:1;}}', 2, 1, 1, '2021-12-12 00:10:01', '2021-12-12 00:10:01'),
(3, '1', 'Standard', 'standard', 100, 0, 'a:1:{i:0;a:4:{s:13:\"total_product\";s:2:\"10\";s:18:\"photos_per_product\";s:1:\"2\";s:17:\"video_per_product\";s:1:\"2\";s:21:\"total_feature_product\";s:1:\"1\";}}', 2, 1, 1, '2021-12-12 00:25:30', '2021-12-12 00:25:30'),
(7, '1', 'Advanced', 'advanced', 300, 0, 'a:1:{i:0;a:4:{s:13:\"total_product\";s:1:\"2\";s:18:\"photos_per_product\";s:1:\"6\";s:17:\"video_per_product\";s:1:\"3\";s:21:\"total_feature_product\";s:1:\"1\";}}', 1, 1, 1, '2022-01-30 07:20:24', '2022-01-30 07:23:36');

-- --------------------------------------------------------

--
-- Table structure for table `package_transactions`
--

CREATE TABLE `package_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visitor_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `payment_status` enum('Pending','Completed','Cancelled','Trial Package') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_transactions`
--

INSERT INTO `package_transactions` (`id`, `visitor_id`, `package_id`, `is_verified`, `price`, `quantity`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, NULL, 1, 'Trial Package', '2021-12-12 00:12:47', '2021-12-12 00:12:47'),
(2, 1, 3, 1, 100, 1, 'Completed', '2021-12-12 00:27:37', '2021-12-12 00:27:37'),
(3, 2, 2, 1, NULL, 1, 'Trial Package', '2021-12-12 02:23:45', '2021-12-12 02:23:45'),
(4, 1, 3, 1, 100, 1, 'Completed', '2021-12-13 02:08:54', '2021-12-13 02:08:54'),
(5, 1, 3, 1, 100, 1, 'Completed', '2021-12-13 02:09:08', '2021-12-13 02:09:08'),
(6, 1, 3, 1, 100, 1, 'Completed', '2021-12-13 02:11:22', '2021-12-13 02:11:22'),
(7, 1, 3, 1, 100, 1, 'Completed', '2021-12-13 02:13:10', '2021-12-13 02:13:10'),
(8, 1, 3, 1, 100, 1, 'Completed', '2021-12-13 02:15:09', '2021-12-13 02:15:09'),
(9, 1, 3, 1, 100, 1, 'Completed', '2021-12-13 02:21:20', '2021-12-13 02:21:20'),
(10, 1, 3, 1, 100, 1, 'Completed', '2021-12-13 02:22:13', '2021-12-13 02:22:13'),
(11, 1, 3, 1, 100, 1, 'Completed', '2021-12-13 02:23:37', '2021-12-13 02:23:37'),
(12, 1, 3, 1, 100, 1, 'Completed', '2021-12-13 02:26:17', '2021-12-13 02:26:17'),
(13, 3, 1, 1, NULL, 1, 'Trial Package', '2022-01-30 07:16:15', '2022-01-30 07:16:15');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `position`, `name`, `slug`, `content`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Terms and condition', 'terms-and-condition', '<h2 style=\"margin: 0px 0px 10px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; text-align: left; background-color: rgb(255, 255, 255)\">What is Lorem Ipsum?</h2>\r\n<p style=\"margin: 0px 0px 15px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255)\"><strong>Lorem Ipsum</strong><span>&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<div style=\"text-align: center;\"><img style=\"max-width: 80%;\" src=\"data:image/jpeg;base64,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\" /></div>\r\n<p><br /></p>\r\n<p><strong style=\" font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify\">Lorem Ipsum</strong><span style=\" font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify\">&nbsp;</span><span style=\" font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255)\">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br /></p>', 1, '2021-12-13 05:51:14', '2021-12-27 10:17:03'),
(3, 2, 'Privacy Policy', 'privacy-policy', '<p>Privacy Policy<br /></p>', 1, '2021-12-13 05:56:05', '2021-12-13 06:21:01');

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
(8, 'product_module', 'Product Module', 3, NULL, NULL),
(9, 'year', 'All Year', 3, NULL, NULL),
(10, 'add_year', '-- Add Year', 3, NULL, NULL),
(11, 'edit_year', '-- Edit Year', 3, NULL, NULL),
(12, 'view_year', '-- View Year', 3, NULL, NULL),
(13, 'model', 'Model', 3, NULL, NULL),
(14, 'add_model', '-- Add Model', 3, NULL, NULL),
(15, 'edit_model', '-- Edit Model', 3, NULL, NULL),
(16, 'view_model', '-- View Model', 3, NULL, NULL),
(17, 'brand', 'Brand', 3, NULL, NULL),
(18, 'add_brand', '-- Add Brand', 3, NULL, NULL),
(19, 'edit_brand', '-- Edit Brand', 3, NULL, NULL),
(20, 'view_brand', '-- View Brand', 3, NULL, NULL),
(21, 'product_type', 'Product Type', 3, NULL, NULL),
(22, 'add_product_type', '-- Add Product Type', 3, NULL, NULL),
(23, 'edit_product_type', '-- Edit Product Type', 3, NULL, NULL),
(24, 'view_product_type', '-- View Product Type', 3, NULL, NULL),
(25, 'classes', 'All Class', 3, NULL, NULL),
(26, 'add_classes', '-- Add Class', 3, NULL, NULL),
(27, 'edit_classes', '-- Edit Class', 3, NULL, NULL),
(28, 'view_classes', '-- View Class', 3, NULL, NULL),
(29, 'system_data_module', 'System Data Module', 4, NULL, NULL),
(30, 'coupon', 'Coupon', 4, NULL, NULL),
(31, 'add_coupon', '-- Add Coupon', 4, NULL, NULL),
(32, 'edit_coupon', '-- Edit Coupon', 4, NULL, NULL),
(33, 'view_coupon', '-- View Coupon', 4, NULL, NULL),
(34, 'validity', 'Validity', 4, NULL, NULL),
(35, 'add_validity', '-- Add Validity', 4, NULL, NULL),
(36, 'edit_validity', '-- Edit Validity', 4, NULL, NULL),
(37, 'view_validity', '-- View Validity', 4, NULL, NULL),
(38, 'packages', 'Package', 1, NULL, NULL),
(39, 'add_packages', '-- Add Package', 1, NULL, NULL),
(40, 'edit_packages', '-- Edit Package', 1, NULL, NULL),
(41, 'view_packages', '-- View Package', 1, NULL, NULL),
(42, 'visitor', 'All Visitor', 6, NULL, NULL),
(43, 'edit_visitor', '-- Edit User', 6, NULL, NULL),
(44, 'reset_password_visitor', '-- Reset Password', 6, NULL, NULL),
(45, 'conditions', 'Condition', 3, NULL, NULL),
(46, 'add_conditions', '-- Add Condition', 3, NULL, NULL),
(47, 'edit_conditions', '-- Edit Condition', 3, NULL, NULL),
(48, 'view_conditions', '-- View Condition', 3, NULL, NULL),
(49, 'price_tagline', 'Price Tagline', 3, NULL, NULL),
(50, 'add_price_tagline', '-- Add Price Tagline', 3, NULL, NULL),
(51, 'edit_price_tagline', '-- Edit Price Tagline', 3, NULL, NULL),
(52, 'view_price_tagline', '-- View Price Tagline', 3, NULL, NULL),
(53, 'all_product', 'All Product', 3, NULL, NULL),
(54, 'edit_product', '-- Edit Product', 3, NULL, NULL),
(55, 'all_query', 'All Query', 3, NULL, NULL),
(56, 'delete_query', '-- Delete Query', 3, NULL, NULL),
(57, 'all_blog', 'All Blog', 4, NULL, NULL),
(58, 'edit_blog', '-- Edit Blog', 4, NULL, NULL),
(59, 'pages', 'Pages', 2, NULL, NULL),
(60, 'add_page', '-- Add New Pages', 2, NULL, NULL),
(61, 'edit_page', '-- Edit Pages', 2, NULL, NULL),
(62, 'feature_image', 'Feature Image', 2, NULL, NULL),
(63, 'add_feature_image', '-- Add Feature Image', 2, NULL, NULL),
(64, 'edit_feature_image', '-- Edit Feature Image', 2, NULL, NULL),
(65, 'delete_feature_image', '-- Delete Feature Image', 2, NULL, NULL),
(66, 'contact_module', 'Contact Module', 5, NULL, NULL),
(67, 'all_message', 'All Message', 5, NULL, NULL),
(68, 'delete_message', '-- Delete Message', 5, NULL, NULL),
(69, 'all_subscriber', 'All Subscriber', 5, NULL, NULL),
(70, 'delete_subscriber', '-- Delete Subscriber', 5, NULL, NULL),
(71, 'all_event', 'All Event', 4, NULL, NULL),
(72, 'add_event', '-- Add Event', 4, NULL, NULL),
(73, 'edit_event', '-- Edit Event', 4, NULL, NULL),
(74, 'delete_event', '-- Delete Event', 4, NULL, NULL);

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
(2, 1, 38, NULL, NULL),
(3, 1, 39, NULL, NULL),
(4, 1, 40, NULL, NULL),
(5, 1, 41, NULL, NULL),
(6, 1, 42, NULL, NULL),
(7, 1, 43, NULL, NULL),
(8, 1, 44, NULL, NULL),
(9, 1, 8, NULL, NULL),
(10, 1, 9, NULL, NULL),
(11, 1, 10, NULL, NULL),
(12, 1, 11, NULL, NULL),
(13, 1, 12, NULL, NULL),
(14, 1, 13, NULL, NULL),
(15, 1, 14, NULL, NULL),
(16, 1, 15, NULL, NULL),
(17, 1, 16, NULL, NULL),
(18, 1, 17, NULL, NULL),
(19, 1, 18, NULL, NULL),
(20, 1, 19, NULL, NULL),
(21, 1, 20, NULL, NULL),
(22, 1, 21, NULL, NULL),
(23, 1, 22, NULL, NULL),
(24, 1, 23, NULL, NULL),
(25, 1, 24, NULL, NULL),
(26, 1, 25, NULL, NULL),
(27, 1, 26, NULL, NULL),
(28, 1, 27, NULL, NULL),
(29, 1, 28, NULL, NULL),
(30, 1, 45, NULL, NULL),
(31, 1, 46, NULL, NULL),
(32, 1, 47, NULL, NULL),
(33, 1, 48, NULL, NULL),
(34, 1, 49, NULL, NULL),
(35, 1, 50, NULL, NULL),
(36, 1, 51, NULL, NULL),
(37, 1, 52, NULL, NULL),
(38, 1, 53, NULL, NULL),
(39, 1, 54, NULL, NULL),
(40, 1, 55, NULL, NULL),
(41, 1, 56, NULL, NULL),
(42, 1, 66, NULL, NULL),
(43, 1, 67, NULL, NULL),
(44, 1, 68, NULL, NULL),
(45, 1, 69, NULL, NULL),
(46, 1, 70, NULL, NULL),
(47, 1, 29, NULL, NULL),
(48, 1, 30, NULL, NULL),
(49, 1, 31, NULL, NULL),
(50, 1, 32, NULL, NULL),
(51, 1, 33, NULL, NULL),
(52, 1, 34, NULL, NULL),
(53, 1, 35, NULL, NULL),
(54, 1, 36, NULL, NULL),
(55, 1, 37, NULL, NULL),
(56, 1, 57, NULL, NULL),
(57, 1, 58, NULL, NULL),
(58, 1, 71, NULL, NULL),
(59, 1, 72, NULL, NULL),
(60, 1, 73, NULL, NULL),
(61, 1, 74, NULL, NULL),
(62, 1, 6, NULL, NULL),
(63, 1, 7, NULL, NULL),
(64, 1, 59, NULL, NULL),
(65, 1, 60, NULL, NULL),
(66, 1, 61, NULL, NULL),
(67, 1, 62, NULL, NULL),
(68, 1, 63, NULL, NULL),
(69, 1, 64, NULL, NULL),
(70, 1, 65, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `price_taglines`
--

CREATE TABLE `price_taglines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price_taglines`
--

INSERT INTO `price_taglines` (`id`, `name`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'One', 'one', 1, '2021-12-12 00:19:32', '2021-12-12 00:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seen` int(11) NOT NULL DEFAULT 0,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `product_type_id` bigint(20) UNSIGNED NOT NULL,
  `year_id` bigint(20) UNSIGNED NOT NULL,
  `city` enum('Abu Dhabi','Ajman','Al Ain','Dubai','Fujaira','Ras al Khaimah','Sharjah','Umm al Quwain') COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `engine_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mileage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `product_model_id` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `price_tagline_id` bigint(20) UNSIGNED NOT NULL,
  `condition_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor_id` bigint(20) UNSIGNED NOT NULL,
  `visitor_type_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `status` enum('Not Approved','Approved','Rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_feature` tinyint(1) NOT NULL DEFAULT 0,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `seen`, `title`, `slug`, `class_id`, `product_type_id`, `year_id`, `city`, `location`, `engine_size`, `mileage`, `brand_id`, `product_model_id`, `price`, `price_tagline_id`, `condition_id`, `description`, `cover_photo`, `visitor_id`, `visitor_type_id`, `is_active`, `status`, `is_feature`, `year`, `month`, `created_at`, `updated_at`) VALUES
(1, 3, 'Honda Hornet', 'honda-hornet', 2, 1, 12, 'Abu Dhabi', 'uae', '160 CC', '40-45', 1, 1, 189000, 1, 1, 'aaa', '16392901183gOctVi4ZDg3.jpg', 1, 2, 1, 'Approved', 0, 2021, 12, '2021-12-12 00:21:58', '2022-01-05 06:48:24'),
(2, 1, 'Yamaha R15 V3', 'yamaha-r15-v3', 1, 1, 12, 'Ajman', 'ajman', '150 CC', '45-50', 4, 8, 565000, 1, 1, 'aaa', '1639290466n8yEbfOv1iAr.jpg', 1, 2, 1, 'Approved', 1, 2021, 12, '2021-12-12 00:27:46', '2022-01-05 06:48:18'),
(3, 15, 'Suzuki gixxer sf', 'suzuki-gixxer-sf', 1, 1, 12, 'Al Ain', 'uae', '150 cc', '40-45', 2, 5, 250000, 1, 2, 'Suzuki gixxer sf', '1639297535tr2GzdCums8n.jpg', 2, 2, 1, 'Approved', 1, 2021, 12, '2021-12-12 02:25:35', '2022-01-30 07:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, '16392901181p16Y3vctbVi.jpg', 1, '2021-12-12 00:21:58', '2021-12-12 00:21:58'),
(2, 2, '1639290466tFwSJSoZRXjS.jpg', 1, '2021-12-12 00:27:46', '2021-12-12 00:27:46'),
(3, 3, '1639297535bQgxFQOUFnI4.webp', 1, '2021-12-12 02:25:35', '2021-12-12 02:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `product_models`
--

CREATE TABLE `product_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_models`
--

INSERT INTO `product_models` (`id`, `name`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Hornet', 'hornet', 1, '2021-12-12 00:16:22', '2021-12-12 00:16:22'),
(2, 'Xblade', 'xblade', 1, '2021-12-12 00:16:25', '2021-12-12 00:16:25'),
(3, 'Xmotion', 'xmotion', 1, '2021-12-12 00:16:29', '2021-12-12 00:16:29'),
(4, 'Gixxer', 'gixxer', 1, '2021-12-12 00:16:43', '2021-12-12 00:16:43'),
(5, 'Gixxer SF', 'gixxer-sf', 1, '2021-12-12 00:16:49', '2021-12-12 02:25:46'),
(6, 'R15 V1', 'r15-v1', 1, '2021-12-12 00:16:55', '2021-12-12 00:16:55'),
(7, 'R15 V2', 'r15-v2', 1, '2021-12-12 00:16:58', '2021-12-12 00:16:58'),
(8, 'R15 V3', 'r15-v3', 1, '2021-12-12 00:17:01', '2021-12-12 00:17:01'),
(9, 'Fazer', 'fazer', 1, '2021-12-12 00:17:07', '2021-12-12 00:17:07'),
(10, 'FZS', 'fzs', 1, '2021-12-12 00:17:11', '2021-12-12 00:17:11');

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `name`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'MotorCycle', 'motorcycle', 1, '2021-12-12 00:18:33', '2021-12-12 00:18:33'),
(2, 'Accessories', 'accessories', 1, '2021-12-12 00:18:40', '2021-12-12 00:18:40');

-- --------------------------------------------------------

--
-- Table structure for table `product_videos`
--

CREATE TABLE `product_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_videos`
--

INSERT INTO `product_videos` (`id`, `product_id`, `link`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 3, 'http://127.0.0.1:8000/profile/sell-a-motorcycle', 1, '2021-12-12 02:25:35', '2021-12-12 02:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'Sub Admin', 1, '2022-01-30 07:00:07', '2022-01-30 07:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `sub_modules`
--

CREATE TABLE `sub_modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_modules`
--

INSERT INTO `sub_modules` (`id`, `name`, `key`, `position`, `route`, `module_id`, `created_at`, `updated_at`) VALUES
(1, 'All Admins', 'all_user', '1', 'user.all', 1, NULL, NULL),
(2, 'Roles', 'roles', '2', 'role.all', 1, NULL, NULL),
(3, 'App Info', 'app_info', '1', 'app.info.all', 2, NULL, NULL),
(4, 'Year', 'year', '1', 'year.all', 3, NULL, NULL),
(5, 'Model', 'model', '2', 'model.all', 3, NULL, NULL),
(6, 'Brand', 'brand', '3', 'brand.all', 3, NULL, NULL),
(7, 'Product Type', 'product_type', '4', 'product.type.all', 3, NULL, NULL),
(8, 'All Class', 'classes', '5', 'classes.all', 3, NULL, NULL),
(9, 'Coupon', 'coupon', '1', 'coupon.all', 4, NULL, NULL),
(10, 'Validity', 'validity', '2', 'validity.all', 4, NULL, NULL),
(11, 'Packages', 'packages', '3', 'package.all', 1, NULL, NULL),
(13, 'All Condition', 'conditions', '6', 'condition.all', 3, NULL, NULL),
(14, 'Price Tagline', 'price_tagline', '7', 'price_tagline.all', 3, NULL, NULL),
(15, 'All Product', 'all_product', '8', 'product.all', 3, NULL, NULL),
(16, 'All Query', 'all_query', '9', 'query.all', 3, NULL, NULL),
(17, 'All Blog', 'all_blog', '3', 'all.blog', 4, NULL, NULL),
(18, 'Pages', 'pages', '2', 'pages.all', 2, NULL, NULL),
(19, 'Feature Image', 'feature_image', '3', 'feature.image.all', 2, NULL, NULL),
(20, 'All Message', 'all_message', '1', 'admin.all.message', 5, NULL, NULL),
(21, 'All Subscriber', 'all_subscriber', '2', 'all.subscriber', 5, NULL, NULL),
(22, 'All Event', 'all_event', '4', 'all.event', 4, NULL, NULL);

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
(1, 'Super Admin', 'superadmin@gmail.com', NULL, '1858361812', NULL, '$2y$10$sQ2CmUBIEfbp/H0CKQ4Rduk/9x8K4j41OlvAIMakY9dy6XWfO/0IG', 'X6sANcatUpPse5RYyDwlGNyub57jcIv3nHT2tKTHCita7InBr5pv6jefaHZ6', NULL, NULL);

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
(1, 'Test Subadmin', 'subadmin@gmail.com', '01676800456', NULL, '$2y$10$mRrHAwFoIvj/rL8MMkMFReyDvXWxMkdnZ/.x6LNj4MAI/ljjKlgJy', 1, 1, NULL, NULL, '2022-01-30 07:01:29', '2022-01-30 07:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `validities`
--

CREATE TABLE `validities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` int(11) NOT NULL,
  `type` enum('Week','Month') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `validities`
--

INSERT INTO `validities` (`id`, `day`, `type`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Week', 1, '2021-12-12 00:10:01', '2021-12-12 00:10:01'),
(2, 2, 'Week', 1, '2021-12-12 00:19:52', '2021-12-12 00:19:52'),
(3, 3, 'Week', 1, '2021-12-12 00:19:56', '2021-12-12 00:19:56'),
(4, 4, 'Week', 1, '2021-12-12 00:20:01', '2021-12-12 00:20:01'),
(5, 2, 'Month', 1, '2021-12-12 00:20:09', '2021-12-12 00:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `verifies`
--

CREATE TABLE `verifies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor_type_id` bigint(20) UNSIGNED NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `company_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `first_name`, `last_name`, `business_name`, `website_link`, `email`, `phone`, `password`, `visitor_type_id`, `is_verified`, `is_active`, `month`, `year`, `company_logo`, `address`, `city`, `country`, `message`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md Sehirul Islam', 'Rehi', 'Ecommerce', NULL, 'rehi@emicontech.com', '01858361812', '$2y$10$VzRgbJ.ohgfUHmaPb0.QH.yptUKiP198DS.nsHZL9YhabYTPFVViG', 2, 1, 1, 12, 2021, NULL, NULL, NULL, NULL, NULL, 'KFrBTbYiet1E5GqYxUIcrKc3uTg71enPJ5UeX6bxuOGx0miUFh4ZATXLKk0v', '2021-12-12 00:12:47', '2021-12-12 00:13:02'),
(2, 'Nazib', 'Mahfuz', 'Software Development', NULL, 'nazibmahfuz60@gmail.com', '01858361813', '$2y$10$tIleElZHo97hsQ2ROZoUfuNWXJoXHjuLXYWBeF.XbHujPEEvvb8/u', 2, 1, 1, 12, 2021, NULL, NULL, NULL, NULL, NULL, 'uRP4AzI4hedDmM4oGsI3vj0C6rvbuilP0ArBfGSWNN6Tn5VP1nq9VrXTVlKy', '2021-12-12 02:23:45', '2021-12-12 02:24:02'),
(3, 'Test User', 'User', NULL, NULL, 'nahidrahman299@gmail.com', '11111111', '$2y$10$JdnG4jSaamoTcsZ0WWcyyeDvqHEkjeLiDCW4MlPnyjEXigs88hYYG', 1, 1, 1, 1, 2022, NULL, NULL, NULL, NULL, NULL, 'HC0KT31GnirWv1gD66rEa9sVIFux5ORzAEARqRBvcIUdSmMte9gEpUa5CobG', '2022-01-30 07:16:15', '2022-01-30 07:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_packages`
--

CREATE TABLE `visitor_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visitor_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `package_transaction_id` bigint(20) UNSIGNED NOT NULL,
  `expiry_date` date NOT NULL,
  `status` enum('Running','Expired') COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remaining` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor_packages`
--

INSERT INTO `visitor_packages` (`id`, `visitor_id`, `package_id`, `package_transaction_id`, `expiry_date`, `status`, `options`, `remaining`, `month`, `year`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '2021-12-19', 'Expired', 'a:1:{i:0;a:4:{s:13:\"total_product\";i:1;s:18:\"photos_per_product\";i:1;s:17:\"video_per_product\";i:1;s:21:\"total_feature_product\";i:1;}}', 'a:1:{i:0;a:4:{s:13:\"total_product\";i:0;s:18:\"photos_per_product\";i:1;s:17:\"video_per_product\";i:1;s:21:\"total_feature_product\";i:1;}}', 12, 2021, '2021-12-12 00:12:47', '2021-12-12 00:23:04'),
(2, 1, 3, 2, '2021-12-19', 'Expired', 'a:1:{i:0;a:4:{s:13:\"total_product\";s:2:\"10\";s:18:\"photos_per_product\";s:1:\"2\";s:17:\"video_per_product\";s:1:\"2\";s:21:\"total_feature_product\";s:1:\"1\";}}', 'a:1:{i:0;a:4:{s:13:\"total_product\";i:9;s:18:\"photos_per_product\";s:1:\"2\";s:17:\"video_per_product\";s:1:\"2\";s:21:\"total_feature_product\";i:0;}}', 12, 2021, '2021-12-12 00:27:37', '2021-12-12 00:28:18'),
(3, 2, 2, 3, '2021-12-19', 'Expired', 'a:1:{i:0;a:4:{s:13:\"total_product\";i:1;s:18:\"photos_per_product\";i:1;s:17:\"video_per_product\";i:1;s:21:\"total_feature_product\";i:1;}}', 'a:1:{i:0;a:4:{s:13:\"total_product\";i:0;s:18:\"photos_per_product\";i:1;s:17:\"video_per_product\";i:1;s:21:\"total_feature_product\";i:0;}}', 12, 2021, '2021-12-12 02:23:45', '2021-12-12 02:25:35'),
(6, 1, 3, 6, '2021-12-20', 'Expired', 'a:1:{i:0;a:4:{s:13:\"total_product\";s:2:\"10\";s:18:\"photos_per_product\";s:1:\"2\";s:17:\"video_per_product\";s:1:\"2\";s:21:\"total_feature_product\";s:1:\"1\";}}', 'a:1:{i:0;a:4:{s:13:\"total_product\";s:2:\"10\";s:18:\"photos_per_product\";s:1:\"2\";s:17:\"video_per_product\";s:1:\"2\";s:21:\"total_feature_product\";s:1:\"1\";}}', 12, 2021, '2021-12-13 02:11:23', '2021-12-13 02:11:23'),
(8, 1, 3, 8, '2021-12-20', 'Expired', 'a:1:{i:0;a:4:{s:13:\"total_product\";s:2:\"10\";s:18:\"photos_per_product\";s:1:\"2\";s:17:\"video_per_product\";s:1:\"2\";s:21:\"total_feature_product\";s:1:\"1\";}}', 'a:1:{i:0;a:4:{s:13:\"total_product\";s:2:\"10\";s:18:\"photos_per_product\";s:1:\"2\";s:17:\"video_per_product\";s:1:\"2\";s:21:\"total_feature_product\";s:1:\"1\";}}', 12, 2021, '2021-12-13 02:15:09', '2021-12-13 02:15:09'),
(9, 1, 3, 9, '2021-12-20', 'Expired', 'a:1:{i:0;a:4:{s:13:\"total_product\";s:2:\"10\";s:18:\"photos_per_product\";s:1:\"2\";s:17:\"video_per_product\";s:1:\"2\";s:21:\"total_feature_product\";s:1:\"1\";}}', 'a:1:{i:0;a:4:{s:13:\"total_product\";s:2:\"10\";s:18:\"photos_per_product\";s:1:\"2\";s:17:\"video_per_product\";s:1:\"2\";s:21:\"total_feature_product\";s:1:\"1\";}}', 12, 2021, '2021-12-13 02:21:20', '2021-12-13 02:21:20'),
(10, 1, 3, 10, '2021-12-20', 'Expired', 'a:1:{i:0;a:4:{s:13:\"total_product\";s:2:\"10\";s:18:\"photos_per_product\";s:1:\"2\";s:17:\"video_per_product\";s:1:\"2\";s:21:\"total_feature_product\";s:1:\"1\";}}', 'a:1:{i:0;a:4:{s:13:\"total_product\";s:2:\"10\";s:18:\"photos_per_product\";s:1:\"2\";s:17:\"video_per_product\";s:1:\"2\";s:21:\"total_feature_product\";s:1:\"1\";}}', 12, 2021, '2021-12-13 02:22:13', '2021-12-13 02:22:13'),
(11, 1, 3, 11, '2021-12-20', 'Expired', 'a:1:{i:0;a:4:{s:13:\"total_product\";s:2:\"10\";s:18:\"photos_per_product\";s:1:\"2\";s:17:\"video_per_product\";s:1:\"2\";s:21:\"total_feature_product\";s:1:\"1\";}}', 'a:1:{i:0;a:4:{s:13:\"total_product\";s:2:\"10\";s:18:\"photos_per_product\";s:1:\"2\";s:17:\"video_per_product\";s:1:\"2\";s:21:\"total_feature_product\";s:1:\"1\";}}', 12, 2021, '2021-12-13 02:23:37', '2021-12-13 02:23:37'),
(12, 1, 3, 12, '2021-12-20', 'Running', 'a:1:{i:0;a:4:{s:13:\"total_product\";s:2:\"10\";s:18:\"photos_per_product\";s:1:\"2\";s:17:\"video_per_product\";s:1:\"2\";s:21:\"total_feature_product\";s:1:\"1\";}}', 'a:1:{i:0;a:4:{s:13:\"total_product\";s:2:\"10\";s:18:\"photos_per_product\";s:1:\"2\";s:17:\"video_per_product\";s:1:\"2\";s:21:\"total_feature_product\";s:1:\"1\";}}', 12, 2021, '2021-12-13 02:26:17', '2021-12-13 02:26:17'),
(13, 3, 1, 13, '2022-02-06', 'Running', 'a:1:{i:0;a:4:{s:13:\"total_product\";i:1;s:18:\"photos_per_product\";i:1;s:17:\"video_per_product\";i:1;s:21:\"total_feature_product\";i:1;}}', 'a:1:{i:0;a:4:{s:13:\"total_product\";i:1;s:18:\"photos_per_product\";i:1;s:17:\"video_per_product\";i:1;s:21:\"total_feature_product\";i:1;}}', 1, 2022, '2022-01-30 07:16:15', '2022-01-30 07:16:15');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_types`
--

CREATE TABLE `visitor_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor_types`
--

INSERT INTO `visitor_types` (`id`, `name`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Seller', 'seller', 1, NULL, NULL),
(2, 'Dealer', 'dealer', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visitor_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `visitor_id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 3, 3, '2022-01-30 07:45:21', '2022-01-30 07:45:21');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `position`, `year`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 2010, 1, '2021-12-12 00:15:39', '2021-12-12 00:15:39'),
(2, 2, 2011, 1, '2021-12-12 00:15:42', '2021-12-12 00:15:42'),
(3, 3, 2012, 1, '2021-12-12 00:15:44', '2021-12-12 00:15:44'),
(4, 4, 2013, 1, '2021-12-12 00:15:47', '2021-12-12 00:15:47'),
(5, 5, 2014, 1, '2021-12-12 00:15:50', '2021-12-12 00:15:50'),
(6, 6, 2015, 1, '2021-12-12 00:15:53', '2021-12-12 00:15:53'),
(7, 7, 2016, 1, '2021-12-12 00:15:56', '2021-12-12 00:15:56'),
(8, 8, 2017, 1, '2021-12-12 00:16:00', '2021-12-12 00:16:00'),
(9, 9, 2018, 1, '2021-12-12 00:16:02', '2021-12-12 00:16:02'),
(10, 10, 2019, 1, '2021-12-12 00:16:05', '2021-12-12 00:16:05'),
(11, 11, 2020, 1, '2021-12-12 00:16:07', '2021-12-12 00:16:07'),
(12, 12, 2021, 1, '2021-12-12 00:16:10', '2021-12-12 00:16:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_infos`
--
ALTER TABLE `app_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_posted_by_foreign` (`posted_by`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classes_name_unique` (`name`),
  ADD UNIQUE KEY `classes_slug_unique` (`slug`);

--
-- Indexes for table `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `conditions_name_unique` (`name`),
  ADD UNIQUE KEY `conditions_slug_unique` (`slug`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feature_images`
--
ALTER TABLE `feature_images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `feature_images_position_unique` (`position`);

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
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletters_email_unique` (`email`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packages_visitor_type_id_foreign` (`visitor_type_id`),
  ADD KEY `packages_validity_id_foreign` (`validity_id`);

--
-- Indexes for table `package_transactions`
--
ALTER TABLE `package_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_transactions_visitor_id_foreign` (`visitor_id`),
  ADD KEY `package_transactions_package_id_foreign` (`package_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_name_unique` (`name`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`),
  ADD UNIQUE KEY `position` (`position`);

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
  ADD UNIQUE KEY `permissions_key_unique` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_taglines`
--
ALTER TABLE `price_taglines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `price_taglines_name_unique` (`name`),
  ADD UNIQUE KEY `price_taglines_slug_unique` (`slug`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_class_id_foreign` (`class_id`),
  ADD KEY `products_product_type_id_foreign` (`product_type_id`),
  ADD KEY `products_year_id_foreign` (`year_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_product_model_id_foreign` (`product_model_id`),
  ADD KEY `products_price_tagline_id_foreign` (`price_tagline_id`),
  ADD KEY `products_condition_id_foreign` (`condition_id`),
  ADD KEY `products_visitor_id_foreign` (`visitor_id`),
  ADD KEY `products_visitor_type_id_foreign` (`visitor_type_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_models`
--
ALTER TABLE `product_models`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_models_name_unique` (`name`),
  ADD UNIQUE KEY `product_models_slug_unique` (`slug`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_types_name_unique` (`name`),
  ADD UNIQUE KEY `product_types_slug_unique` (`slug`);

--
-- Indexes for table `product_videos`
--
ALTER TABLE `product_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_videos_product_id_foreign` (`product_id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `queries_product_id_foreign` (`product_id`);

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
  ADD UNIQUE KEY `sub_modules_key_unique` (`key`);

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
-- Indexes for table `validities`
--
ALTER TABLE `validities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verifies`
--
ALTER TABLE `verifies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `verifies_code_unique` (`code`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `visitors_email_unique` (`email`),
  ADD UNIQUE KEY `visitors_phone_unique` (`phone`),
  ADD KEY `visitors_visitor_type_id_foreign` (`visitor_type_id`);

--
-- Indexes for table `visitor_packages`
--
ALTER TABLE `visitor_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visitor_packages_visitor_id_foreign` (`visitor_id`),
  ADD KEY `visitor_packages_package_id_foreign` (`package_id`),
  ADD KEY `visitor_packages_package_transaction_id_foreign` (`package_transaction_id`);

--
-- Indexes for table `visitor_types`
--
ALTER TABLE `visitor_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `visitor_types_name_unique` (`name`),
  ADD UNIQUE KEY `visitor_types_slug_unique` (`slug`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_visitor_id_foreign` (`visitor_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `years_position_unique` (`position`),
  ADD UNIQUE KEY `years_year_unique` (`year`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_infos`
--
ALTER TABLE `app_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feature_images`
--
ALTER TABLE `feature_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `package_transactions`
--
ALTER TABLE `package_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `price_taglines`
--
ALTER TABLE `price_taglines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_models`
--
ALTER TABLE `product_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_videos`
--
ALTER TABLE `product_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_modules`
--
ALTER TABLE `sub_modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
-- AUTO_INCREMENT for table `validities`
--
ALTER TABLE `validities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `verifies`
--
ALTER TABLE `verifies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visitor_packages`
--
ALTER TABLE `visitor_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `visitor_types`
--
ALTER TABLE `visitor_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_posted_by_foreign` FOREIGN KEY (`posted_by`) REFERENCES `visitors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_validity_id_foreign` FOREIGN KEY (`validity_id`) REFERENCES `validities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `packages_visitor_type_id_foreign` FOREIGN KEY (`visitor_type_id`) REFERENCES `visitor_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package_transactions`
--
ALTER TABLE `package_transactions`
  ADD CONSTRAINT `package_transactions_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `package_transactions_visitor_id_foreign` FOREIGN KEY (`visitor_id`) REFERENCES `visitors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_condition_id_foreign` FOREIGN KEY (`condition_id`) REFERENCES `conditions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_price_tagline_id_foreign` FOREIGN KEY (`price_tagline_id`) REFERENCES `price_taglines` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_product_model_id_foreign` FOREIGN KEY (`product_model_id`) REFERENCES `product_models` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_product_type_id_foreign` FOREIGN KEY (`product_type_id`) REFERENCES `product_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_visitor_id_foreign` FOREIGN KEY (`visitor_id`) REFERENCES `visitors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_visitor_type_id_foreign` FOREIGN KEY (`visitor_type_id`) REFERENCES `visitor_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_year_id_foreign` FOREIGN KEY (`year_id`) REFERENCES `years` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_videos`
--
ALTER TABLE `product_videos`
  ADD CONSTRAINT `product_videos_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `queries`
--
ALTER TABLE `queries`
  ADD CONSTRAINT `queries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `visitors`
--
ALTER TABLE `visitors`
  ADD CONSTRAINT `visitors_visitor_type_id_foreign` FOREIGN KEY (`visitor_type_id`) REFERENCES `visitor_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `visitor_packages`
--
ALTER TABLE `visitor_packages`
  ADD CONSTRAINT `visitor_packages_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `visitor_packages_package_transaction_id_foreign` FOREIGN KEY (`package_transaction_id`) REFERENCES `package_transactions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `visitor_packages_visitor_id_foreign` FOREIGN KEY (`visitor_id`) REFERENCES `visitors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_visitor_id_foreign` FOREIGN KEY (`visitor_id`) REFERENCES `visitors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
