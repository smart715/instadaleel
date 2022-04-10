-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2022 at 12:42 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insta_daleel`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_infos`
--

CREATE TABLE `app_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fav` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_infos`
--

INSERT INTO `app_infos` (`id`, `logo`, `fav`, `created_at`, `updated_at`) VALUES
(1, '1648102475jRRc4aDIsk1f.png', '1648102475GoZp0ku3Mxl7.png', NULL, '2022-03-24 00:14:35');

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
(2, 1, 'Exclusive Offer', '1648117889Kso3mZcdlOrG.png', 'View Offer', 'http://127.0.0.1:8000/admindashboard/settings-module/banner', 1, '2022-03-24 04:31:29', '2022-03-24 04:44:58');

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
(1, '1648390004GuD4AYW6LIP2.png', 'Box One', '<p>This is insta daleel</p>', NULL, '2022-03-27 08:10:54'),
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

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `customer_id`, `location_id`, `category_id`, `code`, `name`, `email`, `image`, `address`, `contact_number`, `short_description`, `rating`, `social_links`, `website_link`, `office_hour`, `is_active`, `is_pinned`, `status`, `month`, `year`, `created_at`, `updated_at`) VALUES
(8, 8, 2, 6, 'B-557713', 'Emicon Technology', 'info@emicontech.com', '1649153619PaoddTxBsxJC.png', 'Dubai', '01858361812', 'aaa', 0.00, '[{\"instagram_link\":null,\"twitter_link\":null,\"facebook_link\":null,\"youtube_link\":null,\"telegram_link\":null}]', 'aaa', '9:00 to 17:00', 1, 0, 'Running', 4, 2022, '2022-04-05 10:13:39', '2022-04-05 10:13:39'),
(9, 8, 2, 6, 'B-288036', 'Emicon Technology', 'info@emicontech.com', '1649227139jqIeeXu73sDE.png', 'Dubai', '01858361812', 'aaa', 0.00, '[{\"instagram_link\":null,\"twitter_link\":null,\"facebook_link\":null,\"youtube_link\":null,\"telegram_link\":null}]', 'aaa', '9:00 to 17:00', 1, 0, 'Running', 4, 2022, '2022-04-06 06:38:59', '2022-04-06 06:38:59');

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

--
-- Dumping data for table `business_packages`
--

INSERT INTO `business_packages` (`id`, `business_id`, `package_id`, `transaction_id`, `total`, `expiry_date`, `payment_status`, `status`, `created_at`, `updated_at`) VALUES
(4, 8, 1, 'B-557713', 50, '2022-06-04', 'Success', 'Running', '2022-04-05 10:13:39', '2022-04-05 10:13:39'),
(5, 9, 1, 'B-288036', 50, '2022-06-05', 'Success', 'Running', '2022-04-06 06:38:59', '2022-04-06 06:38:59');

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

--
-- Dumping data for table `business_reviews`
--

INSERT INTO `business_reviews` (`id`, `business_id`, `customer_id`, `rating`, `comment`, `is_approved`, `is_shown`, `month`, `year`, `created_at`, `updated_at`) VALUES
(1, 8, 8, 5, 'Nice Company', 0, 0, 4, 2022, '2022-04-10 09:56:02', '2022-04-10 09:56:02');

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
  `gender` enum('MaleFemale','Others') COLLATE utf8mb4_unicode_ci NOT NULL,
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
(8, 'Md Sehirul Islam Rehi', NULL, 'rehi@gmail.com', '01858361812', 'MaleFemale', NULL, NULL, '$2y$10$plBVMX3p8Bi3wq4Dk4V95O9mFsbEgs1xnf4PLZ7oU6VrRDw3kenhu', NULL, NULL, NULL, 1, 1, '2022-04-10 16:27:51', 3, 2022, '2022-03-31 10:43:54', '2022-04-10 10:27:51');

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
(2, 1, 'Event One', '<p>Event One</p>', '1648974029OXBVY4ifVx9j.jpg', 3, 'Chattogram', 'Chattogram', '2022-04-07', '14:26:00', 1, 'Chattogram', 4, 2022, '2022-04-03 08:20:20', '2022-04-03 08:20:29');

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
(31, '2022_04_06_135525_create_business_reviews_table', 15);

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
(2, 'Setting Module', 'settings', 'fas fa-cog', 6, NULL, NULL, NULL),
(3, 'App Datas', 'app_data_module', 'fas fa-mobile', 2, NULL, NULL, NULL);

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
(3, 'Best', 3, 40, 1, '2022-04-03 09:36:09', '2022-04-05 05:44:27');

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
(37, 'view_package', '-- View Package', 3, NULL, NULL);

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
(24, 8, '\"[{\\\"id\\\":1,\\\"image\\\":\\\"1649586446ZJQ9ZQcyPjvU.jpg\\\"},{\\\"id\\\":2,\\\"image\\\":\\\"1649586447Uxyald6kKB7G.jpg\\\"}]\"', 'Offer image designed by me.', 1, 1, 1, 0, 4, 2022, '2022-04-10 10:27:27', '2022-04-10 10:27:51');

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

--
-- Dumping data for table `post_like_comments`
--

INSERT INTO `post_like_comments` (`id`, `customer_id`, `post_id`, `comment`, `image`, `type`, `created_at`, `updated_at`) VALUES
(15, 8, 24, NULL, NULL, 'Like', '2022-04-10 10:27:51', '2022-04-10 10:27:51');

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
(10, 'All Package', 'all_package', 6, 'package.all', 3, NULL, NULL);

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
(1, 'Super Admin', 'superadmin@gmail.com', NULL, '1858361812', NULL, '$2y$10$6oDodcq6LYmeSXLlcMjrLe/1s/SJKPiXzvfvvxz5A3k8yeQOTRXu2', 'WbkAl3k7gAw6QbCny0Rtg3CaDSqtCHAZ87jknKhyVjReMnTfhgATLa4zKRkA', NULL, NULL);

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
(14, '01858361812', '67861', '2022-03-31 10:43:54', '2022-03-31 10:43:54');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `business_packages`
--
ALTER TABLE `business_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `business_reviews`
--
ALTER TABLE `business_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comment_likes`
--
ALTER TABLE `comment_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `post_like_comments`
--
ALTER TABLE `post_like_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_modules`
--
ALTER TABLE `sub_modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `super_admins`
--
ALTER TABLE `super_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `verifies`
--
ALTER TABLE `verifies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;

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
