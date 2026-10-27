-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 18, 2026 at 06:44 AM
-- Server version: 11.8.9-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u752250113_ecommerce_pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'HP', 'hp-wtxek', 'brands/gfrmlnFSBRYNHb7jONwlIr3nY2bqEAiF2c8MuHfr.png', 'HP is a globally recognized technology brand offering laptops, desktops, monitors, printers, accessories, and other computing products for home, business, education, and professional use.', 'active', '2026-09-21 00:28:49', '2026-09-21 00:28:49'),
(3, 'Dell', 'dell-3', 'brands/CG2DCJdpjm760wUo9HZOOiyaufaFkpTgwk082Mgd.webp', 'Dell is a global technology brand known for laptops, desktop computers, monitors, computer accessories, and business technology solutions. Its product lineup includes popular series such as Inspiron, XPS, Latitude, OptiPlex, and Alienware.', 'active', '2026-09-21 00:29:47', '2026-09-21 00:29:52'),
(4, 'Lenovo', 'lenovo-emvzt', 'brands/Fr7SJcxrracUGyyRT2fPOITyNeZmvpElhGpHx5on.png', 'Lenovo is a global technology company known for laptops, desktop computers, tablets, smartphones, monitors, accessories, and business technology solutions. Its popular product families include ThinkPad, IdeaPad, Yoga, Legion, and ThinkCentre.', 'active', '2026-09-21 00:31:07', '2026-09-21 00:31:07'),
(5, 'Apple', 'apple-qdfia', 'brands/EPLuqBUczOa5JEMDa1UN1V0AVsJM1MKhkoL62Xwa.png', 'Apple is a global technology company known for innovative consumer electronics and software. Its product lineup includes Mac computers, iPhone, iPad, Apple Watch, AirPods, and a wide range of accessories.', 'active', '2026-09-21 00:32:36', '2026-09-21 00:32:36'),
(6, 'Samsung', 'samsung-igpl6', 'brands/wq6Y09LmsEBgjLQR6VOhChKiJulAoalqDBKkdQzw.png', 'Samsung is a global technology brand known for smartphones, tablets, televisions, monitors, laptops, home appliances, wearables, and other consumer electronics. Its popular product families include Galaxy smartphones, Galaxy tablets, Galaxy Watches, and Galaxy Buds.', 'active', '2026-09-21 00:33:45', '2026-09-21 00:33:45'),
(7, 'Asus', 'asus-7', 'brands/gCbjShxgAQ5MSFQuBqZCo8bT392eQDMFwRNc277R.png', 'ASUS is a global technology company known for laptops, desktop computers, monitors, graphics cards, motherboards, networking devices, and gaming products. Its popular product families include ROG, TUF Gaming, Zenbook, and Vivobook.', 'active', '2026-09-21 00:36:59', '2026-09-21 00:37:30'),
(8, 'AULA', 'aula-d1ta8', 'brands/1tgjp5v33xjkC8OPprTSpxPHuOWBwFLgJR7HYLfF.png', 'AULA is a global technology brand specializing in gaming keyboards, mice, headsets, and other computer peripherals. The brand focuses on performance, durability, and modern design for gamers and PC users.', 'active', '2026-09-21 01:02:14', '2026-09-21 01:02:14'),
(15, 'Anker', 'anker-15', 'brands/QKszWBaSCac1k5xdrL4NB6w1NolpzioCF8zUa1VO.png', 'Anker brand', 'active', '2026-10-03 21:42:31', '2026-10-03 22:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('ecommerce-cache-da2ff8c5d960624e8291d6937a43ecef0a5719dc', 'i:4;', 1792216729),
('ecommerce-cache-da2ff8c5d960624e8291d6937a43ecef0a5719dc:timer', 'i:1792216729;', 1792216729),
('laravel-cache-da2ff8c5d960624e8291d6937a43ecef0a5719dc', 'i:1;', 1792303032),
('laravel-cache-da2ff8c5d960624e8291d6937a43ecef0a5719dc:timer', 'i:1792303032;', 1792303032);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, NULL, 'Laptop', 'laptop-pik77', 'categories/Nh2xZQ5MxDoL3DzFc2LE3UJGs2hcGmgX9CNU1z4X.webp', 'Explore powerful and reliable laptops for work, study, gaming, and everyday use. Choose from popular brands with different specifications, screen sizes, and performance levels to match your needs.', 'active', '2026-09-21 00:22:18', '2026-09-21 00:22:18'),
(4, NULL, 'Mobile Phones', 'mobile-phones-x5zw0', 'categories/mbt4TVULn6AFvHbVOrVh6G8jGrZhr1NH8d9HMJqi.webp', 'Discover the latest smartphones from leading brands with powerful performance, high-quality cameras, long-lasting batteries, and modern designs. Choose from a wide range of smartphones for everyday use, work, entertainment, and gaming.', 'active', '2026-09-21 00:24:01', '2026-09-21 00:24:01'),
(5, NULL, 'Keyboards', 'keyboards-yepub', 'categories/mkdcVbgdm9xJqvf8I0lJ9JqdYGbcOUFg0ucrEckD.webp', 'Explore a wide range of keyboards designed for work, gaming, and everyday use. Choose from mechanical, wireless, ergonomic, and compact keyboards featuring comfortable designs, responsive keys, and reliable performance.', 'active', '2026-09-21 00:24:44', '2026-09-21 00:24:44'),
(6, NULL, 'Mouse', 'mouse-ivwip', 'categories/kZQO0CYtkbWCPK6sSB1FVgjP8EZYvSI7xUfilCgC.webp', 'Explore reliable and comfortable computer mice designed for work, gaming, and everyday use. Choose from wired, wireless, ergonomic, and high-performance gaming mice with precise tracking and comfortable designs.', 'active', '2026-09-21 00:25:17', '2026-09-21 00:25:17'),
(7, NULL, 'Monitors', 'monitors-6tdyc', 'categories/mKC999lI4wcOnfukRrc8nqWxurIsSWcrIs0sgoCx.webp', 'Explore high-quality monitors designed for work, entertainment, content creation, and gaming. Choose from Full HD, 2K, and 4K displays with different screen sizes, refresh rates, and panel technologies to suit your needs.', 'active', '2026-09-21 00:25:45', '2026-09-21 00:25:45'),
(8, NULL, 'USB', 'usb-87cm0', 'categories/rHvZ6f4o60QSVR9ZzmiZRh9XvZLLApZv1dVh4cgk.webp', 'Explore a range of USB accessories for connecting, charging, and transferring data between your devices. Choose from USB flash drives, hubs, cables, adapters, and other reliable accessories for everyday use.', 'active', '2026-09-21 00:26:25', '2026-09-21 00:26:25'),
(17, NULL, 'Headphones', 'headphones-17', 'categories/FRjA8VP8PrnMzolzPQPlHSIxtc5yZrDAR11YoHwD.png', 'Wired and Wireless earphone and headphones', 'active', '2026-10-03 21:42:31', '2026-10-03 21:53:12'),
(18, NULL, 'Watches', 'watches-18', 'categories/62BCWOoC30AQcdDfY4c2T6N6oVXTpNqnJEzdmVZU.png', 'Watches products', 'active', '2026-10-03 21:42:31', '2026-10-03 21:55:53'),
(22, NULL, 'Speakers', 'speakers', 'assets/images/categories/speakers.svg', 'Speakers and audio systems.', 'active', '2026-10-14 04:41:37', '2026-10-14 04:41:37'),
(23, NULL, 'Cameras', 'cameras', 'assets/images/categories/cameras.svg', 'Digital cameras and photography equipment.', 'active', '2026-10-14 04:41:38', '2026-10-14 04:41:38'),
(24, NULL, 'Printers', 'printers', 'assets/images/categories/printers.svg', 'Printers and printing accessories.', 'active', '2026-10-14 04:41:38', '2026-10-14 04:41:38'),
(25, NULL, 'Chargers', 'chargers', 'assets/images/categories/chargers.svg', 'Chargers and power accessories.', 'active', '2026-10-14 04:41:38', '2026-10-14 04:41:38');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guest_customers`
--

CREATE TABLE `guest_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guest_customers`
--

INSERT INTO `guest_customers` (`id`, `name`, `email`, `phone`, `address`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Kevyn Sosa', 'bogijoz@mailinator.com', '+1 (019) 222-2555', 'Qui quibusdam quia o, Aut iure facilis ill, Commodi ad cum et vo', 'guest-customers/tEPUIjy0awznJKxZ94HoTHkqLn9JPI4TcY4E6U29.jpg', '2026-10-14 07:56:09', '2026-10-18 06:39:40'),
(2, 'Dominic Barnett', 'lufa@mailinator.com', '+1 (019) 999-9333', 'Temporibus dolore od Voluptate minima qui Repellendus Autem i', 'guest-customers/b3ZQIqLLKUKABVx60mV854UUNtkTk2aejkzNGGyP.jpg', '2026-10-14 07:56:09', '2026-10-14 08:07:55'),
(3, 'Dominic Barnett', 'mailto@noman.com', '+1 (101) 999-9933', 'Palton, Dhaka, Red Tower, 1216', 'guest-customers/vHu01v76kHfyUzno1iDfGPE22KrWdEuUKPOl7Jbr.jpg', '2026-10-14 07:56:09', '2026-10-14 08:41:12'),
(4, 'Jonas Lee', 'lefewiwudo@mailinator.com', '+1 (017) 000-0000', 'Nesciunt id tempor, Et sit veritatis por, Quo veniam ea sit c', 'guest-customers/qH1myTD4XvJ3wuiN101t3HfoQ5hpr0YZ911DcRHR.png', '2026-10-14 08:08:28', '2026-10-18 06:39:32'),
(5, 'Kevyn Sosa', 'nomail@gmail.com', '+1 (101) 922-2255', 'Mirpur, Dhaka, mirpur, 1216', NULL, '2026-10-14 08:16:35', '2026-10-14 08:16:35'),
(6, 'Kevyn Hanson', 'kufufog@mailinator.com', '+1 (133) 732-5606', 'Provident ratione c, Laudantium aliquip, Consequat Numquam q', 'guest-customers/UwmS5jNrqJx3pP7cIEq4djDlkeeorFc06C13nOzS.jpg', '2026-10-14 11:56:30', '2026-10-18 06:39:21'),
(7, 'Rokeya', 'rokeya@mail.com', '+1 (120) 526-5644', 'Mirpur, Dhaka - 1216', 'guest-customers/MDZLpw1L7W7WEF8AXN6kFd8DM3HHTvljKlk6b8ns.jpg', '2026-10-18 04:44:26', '2026-10-18 06:39:13'),
(8, 'Yeman', 'yeman@gmail.com', '+1 (216) 546-0032', 'Dhaka, Bangaldesh', 'guest-customers/DOykHBVEEv4DftjlBwsUzAStop6qbhmQlGCmcxBD.png', '2026-10-18 05:50:51', '2026-10-18 06:38:42'),
(9, 'Fatema', 'fatema@gmail.com', '+1 (234) 565-4654', 'DFASDFS, 4565', 'guest-customers/3Yt5Q0T0128lRBX94yI9pPBOYNcPGb5ZshklUXlI.jpg', '2026-10-18 05:55:26', '2026-10-18 06:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
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
(4, '2026_09_18_131714_create_categories_table', 1),
(5, '2026_09_18_133000_create_brands_table', 1),
(6, '2026_09_18_134328_create_products_table', 1),
(7, '2026_09_18_135408_create_product_skus_table', 1),
(8, '2026_09_18_140000_create_orders_table', 1),
(9, '2026_09_18_140001_create_order_items_table', 1),
(10, '2026_09_20_120000_add_image_to_users_table', 1),
(11, '2026_09_20_120001_create_product_images_table', 1),
(12, '2026_09_20_140000_add_image_to_categories_and_brands_tables', 1),
(13, '2026_10_14_133722_add_customer_email_to_orders_table', 2),
(14, '2026_10_14_135119_create_guest_customers_table', 3),
(15, '2026_10_14_135120_add_guest_customer_id_to_orders_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `guest_customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subtotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `shipping_cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `payment_method` varchar(255) NOT NULL DEFAULT 'cod',
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `shipping_name` varchar(255) NOT NULL,
  `shipping_phone` varchar(255) NOT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `shipping_address` text NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `user_id`, `guest_customer_id`, `subtotal`, `shipping_cost`, `discount`, `total`, `payment_method`, `payment_status`, `status`, `shipping_name`, `shipping_phone`, `customer_email`, `shipping_address`, `notes`, `created_at`, `updated_at`) VALUES
(2, 'ORD-20260921065225-S82G', 2, NULL, 4721.94, 0.00, 0.00, 4721.94, 'cod', 'pending', 'processing', 'Mursalin', '01688874442', NULL, 'Dhaka, Bangladesh', 'Customer: Mursalin\r\nProduct: ASUS ROG\r\nQuantity: 3 pieces\r\nNote: Please prepare 3 pieces of ASUS ROG for Mursalin.', '2026-09-21 00:52:25', '2026-09-21 00:56:11'),
(3, 'ORD-20260921065536-ETLI', 4, NULL, 3798.00, 0.00, 0.00, 3798.00, 'cod', 'pending', 'pending', 'Rion Ahmed', '01712355555', NULL, 'House 12, Road 5, Dhanmondi, Dhaka, Bangladesh', 'Please deliver the product carefully. Call before delivery.', '2026-09-21 00:55:36', '2026-09-21 00:55:36'),
(4, 'ORD-20261001055923-AIEV', 1, NULL, 545.00, 0.00, 0.00, 545.00, 'cod', 'pending', 'cancelled', 'Oleg Giles', '+1 (939) 762-4024', NULL, 'Dolorem consequatur', 'Ad earum beatae ut c', '2026-09-30 23:59:23', '2026-10-04 01:10:22'),
(5, 'ORD-20261001063750-QVW1', 1, NULL, 4343.00, 0.00, 0.00, 4343.00, 'bank', 'pending', 'delivered', 'Rinah Shaffer', '+1 (158) 808-4289', NULL, 'Voluptate aute aute', 'Aliquam doloremque e', '2026-10-01 00:37:50', '2026-10-04 01:10:14'),
(6, 'ORD-20261001072635-GKNP', 1, NULL, 28829.82, 0.00, 0.00, 28829.82, 'cod', 'pending', 'shipped', 'Stephen Hahn', '+1 (308) 506-9392', NULL, 'Ipsam sit velit dolo', 'Mollit accusantium i', '2026-10-01 01:26:35', '2026-10-04 01:10:04'),
(7, 'ORD-20261014080824-SKWL', NULL, 2, 679400.00, 0.00, 0.00, 679400.00, 'cod', 'pending', 'pending', 'Dominic Barnett', '+1 (019) 999-9333', 'lufa@mailinator.com', 'Temporibus dolore od Voluptate minima qui Repellendus Autem i', 'Customer email: lufa@mailinator.com', '2026-10-14 02:08:24', '2026-10-14 02:08:24'),
(8, 'ORD-20261014124255-PLEX', NULL, 3, 266527.98, 0.00, 0.00, 266527.98, 'cod', 'pending', 'processing', 'Demetrius Gross', '+1 (101) 999-9933', 'nypiw@mailinator.com', 'Earum quos iste enim, Dolorem autem deleni, Incidunt eu cillum', 'Customer email: nypiw@mailinator.com', '2026-10-14 06:42:55', '2026-10-14 12:09:34'),
(9, 'ORD-20261014134611-AG0K', NULL, 1, 114900.00, 0.00, 0.00, 114900.00, 'cod', 'pending', 'pending', 'Kevyn Sosa', '+1 (019) 222-2555', 'bogijoz@mailinator.com', 'Qui quibusdam quia o, Aut iure facilis ill, Commodi ad cum et vo', NULL, '2026-10-14 07:46:11', '2026-10-14 07:46:11'),
(10, 'ORD-20261014140828-XVTN', NULL, 4, 112900.00, 0.00, 0.00, 112900.00, 'cod', 'pending', 'pending', 'Jonas Lee', '+1 (017) 000-0000', 'lefewiwudo@mailinator.com', 'Nesciunt id tempor, Et sit veritatis por, Quo veniam ea sit c', NULL, '2026-10-14 08:08:28', '2026-10-14 08:08:28'),
(11, 'ORD-20261014141635-G8MC', NULL, 5, 99.00, 0.00, 0.00, 99.00, 'cod', 'pending', 'pending', 'Kevyn Sosa', '+1 (101) 922-2255', 'nomail@gmail.com', 'Mirpur, Dhaka, mirpur, 1216', NULL, '2026-10-14 08:16:35', '2026-10-14 08:16:35'),
(12, 'ORD-20261014144112-2FO8', NULL, 3, 14900.00, 0.00, 0.00, 14900.00, 'cod', 'pending', 'pending', 'Dominic Barnett', '+1 (101) 999-9933', 'mailto@noman.com', 'Palton, Dhaka, Red Tower, 1216', NULL, '2026-10-14 08:41:12', '2026-10-14 08:41:12'),
(13, 'ORD-20261014163815-8ZKB', 8, NULL, 99.00, 0.00, 0.00, 99.00, 'cod', 'pending', 'pending', 'Rebekah Randall', '+1 (028) 939-8479', 'demone@mail.com', 'Irure consequuntur r, Dolores qui in error, Nostrud aut est min', NULL, '2026-10-14 10:38:15', '2026-10-14 10:38:15'),
(14, 'ORD-20261014164136-UDIB', 9, NULL, 41900.00, 0.00, 0.00, 41900.00, 'cod', 'pending', 'pending', 'Khan', '+1 (101) 999-9933', 'nomail@gmail.com', 'Uttora', NULL, '2026-10-14 10:41:36', '2026-10-14 10:41:36'),
(15, 'ORD-20261014174154-R4GH', NULL, NULL, 460900.00, 0.00, 0.00, 460900.00, 'cod', 'pending', 'pending', 'Hiram Carpenter', '+1 (309) 993-7325', NULL, 'Cupidatat assumenda', 'Dolores eligendi rer', '2026-10-14 11:41:54', '2026-10-14 11:41:54'),
(16, 'ORD-20261014175630-W1FJ', NULL, 6, 2217.98, 0.00, 0.00, 2217.98, 'cod', 'pending', 'pending', 'Kevyn Hanson', '+1 (133) 732-5606', 'kufufog@mailinator.com', 'Provident ratione c, Laudantium aliquip, Consequat Numquam q', NULL, '2026-10-14 11:56:30', '2026-10-14 11:56:30'),
(17, 'ORD-20261014181023-34BX', 11, NULL, 129373.98, 0.00, 0.00, 129373.98, 'cod', 'paid', 'shipped', 'Flynn Howard', '+1 (110) 199-9993', 'customer@example.com', 'Eaque sit ipsum aute, Omnis soluta fugiat, Dolor aut quia volup', NULL, '2026-10-14 12:10:23', '2026-10-18 06:42:18'),
(18, 'ORD-20261018044426-DLS2', NULL, 7, 114900.00, 0.00, 0.00, 114900.00, 'cod', 'pending', 'pending', 'fasd', '+1 (120) 526-5644', 'fsdfs@gmali.cod', 'afsd, fsd, 323', NULL, '2026-10-18 04:44:26', '2026-10-18 04:44:26'),
(19, 'ORD-20261018055051-J5RW', NULL, 8, 115009.00, 0.00, 0.00, 115009.00, 'cod', 'paid', 'delivered', 'FASDFASD', '+1 (216) 546-0032', 'FASDF@GMAI.COM', 'FASDFSDAF, 165', NULL, '2026-10-18 05:50:51', '2026-10-18 06:42:40'),
(20, 'ORD-20261018055203-32MN', 11, NULL, 250.00, 0.00, 0.00, 250.00, 'cod', 'paid', 'cancelled', 'FSDFKJSDF', '+1 (045) 654-6456', 'customer@example.com', 'FSDFSADHFJ, DFG, 2345', NULL, '2026-10-18 05:52:03', '2026-10-18 06:42:34'),
(21, 'ORD-20261018055526-HXFW', NULL, 9, 109.00, 0.00, 0.00, 109.00, 'cod', 'paid', 'processing', 'FSDFAS', '+1 (234) 565-4654', 'GDFGDF@FASDF.CLO', 'DFASDFS, 4565', NULL, '2026-10-18 05:55:26', '2026-10-18 06:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_name`, `quantity`, `unit_price`, `subtotal`, `created_at`, `updated_at`) VALUES
(2, 2, 4, 'ASUS ROG Strix G16 (2025) Gaming Laptop', 3, 1573.98, 4721.94, '2026-09-21 00:52:25', '2026-09-21 00:52:25'),
(3, 3, 6, 'Apple 16-Inch MacBook Pro Laptop Early 2026', 2, 1899.00, 3798.00, '2026-09-21 00:55:36', '2026-09-21 00:55:36'),
(4, 4, 5, 'HP OmniBook 3 16 inch Laptop PC', 1, 545.00, 545.00, '2026-09-30 23:59:23', '2026-09-30 23:59:23'),
(5, 5, 6, 'Apple 16-Inch MacBook Pro Laptop Early 2026', 2, 1899.00, 3798.00, '2026-10-01 00:37:50', '2026-10-01 00:37:50'),
(6, 5, 5, 'HP OmniBook 3 16 inch Laptop PC', 1, 545.00, 545.00, '2026-10-01 00:37:50', '2026-10-01 00:37:50'),
(7, 6, 4, 'ASUS ROG Strix G16 (2025) Gaming Laptop', 9, 1573.98, 14165.82, '2026-10-01 01:26:35', '2026-10-01 01:26:35'),
(8, 6, 5, 'HP OmniBook 3 16 inch Laptop PC', 6, 545.00, 3270.00, '2026-10-01 01:26:35', '2026-10-01 01:26:35'),
(9, 6, 6, 'Apple 16-Inch MacBook Pro Laptop Early 2026', 6, 1899.00, 11394.00, '2026-10-01 01:26:35', '2026-10-01 01:26:35'),
(10, 7, 12, 'Dell 24 Plus Monitor - S2425HSM', 1, 114900.00, 114900.00, '2026-10-14 02:08:24', '2026-10-14 02:08:24'),
(11, 7, 10, 'Samsung Galaxy S25 5G', 5, 112900.00, 564500.00, '2026-10-14 02:08:24', '2026-10-14 02:08:24'),
(12, 8, 7, 'AULA S99 Gaming Keyboard, Wireless Green Creamy', 2, 45.00, 90.00, '2026-10-14 06:42:55', '2026-10-14 06:42:55'),
(13, 8, 15, 'AULA WIN68 HE MAX - Hall Effect Gaming Keyboard', 10, 14900.00, 149000.00, '2026-10-14 06:42:55', '2026-10-14 06:42:55'),
(14, 8, 11, 'HP Wired RGB Gaming Mouse', 2, 160.00, 320.00, '2026-10-14 06:42:55', '2026-10-14 06:42:55'),
(15, 8, 12, 'Dell 24 Plus Monitor - S2425HSM', 1, 114900.00, 114900.00, '2026-10-14 06:42:55', '2026-10-14 06:42:55'),
(16, 8, 5, 'HP OmniBook 3 16 inch Laptop PC', 1, 545.00, 545.00, '2026-10-14 06:42:55', '2026-10-14 06:42:55'),
(17, 8, 13, 'Samsung Type-C USB Flash', 1, 99.00, 99.00, '2026-10-14 06:42:55', '2026-10-14 06:42:55'),
(18, 8, 4, 'ASUS ROG Strix G16 (2025) Gaming Laptop', 1, 1573.98, 1573.98, '2026-10-14 06:42:55', '2026-10-14 06:42:55'),
(19, 9, 12, 'Dell 24 Plus Monitor - S2425HSM', 1, 114900.00, 114900.00, '2026-10-14 07:46:11', '2026-10-14 07:46:11'),
(20, 10, 10, 'Samsung Galaxy S25 5G', 1, 112900.00, 112900.00, '2026-10-14 08:08:28', '2026-10-14 08:08:28'),
(21, 11, 13, 'Samsung Type-C USB Flash', 1, 99.00, 99.00, '2026-10-14 08:16:35', '2026-10-14 08:16:35'),
(22, 12, 15, 'AULA WIN68 HE MAX - Hall Effect Gaming Keyboard', 1, 14900.00, 14900.00, '2026-10-14 08:41:12', '2026-10-14 08:41:12'),
(23, 13, 13, 'Samsung Type-C USB Flash', 1, 99.00, 99.00, '2026-10-14 10:38:15', '2026-10-14 10:38:15'),
(24, 14, 16, 'SAMSUNG Galaxy Buds3 Pro', 1, 41900.00, 41900.00, '2026-10-14 10:41:36', '2026-10-14 10:41:36'),
(25, 15, 16, 'SAMSUNG Galaxy Buds3 Pro', 11, 41900.00, 460900.00, '2026-10-14 11:41:54', '2026-10-14 11:41:54'),
(26, 16, 13, 'Samsung Type-C USB Flash', 1, 99.00, 99.00, '2026-10-14 11:56:30', '2026-10-14 11:56:30'),
(27, 16, 5, 'HP OmniBook 3 16 inch Laptop PC', 1, 545.00, 545.00, '2026-10-14 11:56:30', '2026-10-14 11:56:30'),
(28, 16, 4, 'ASUS ROG Strix G16 (2025) Gaming Laptop', 1, 1573.98, 1573.98, '2026-10-14 11:56:30', '2026-10-14 11:56:30'),
(29, 17, 15, 'AULA WIN68 HE MAX - Hall Effect Gaming Keyboard', 1, 14900.00, 14900.00, '2026-10-14 12:10:23', '2026-10-14 12:10:23'),
(30, 17, 4, 'ASUS ROG Strix G16 (2025) Gaming Laptop', 1, 1573.98, 1573.98, '2026-10-14 12:10:23', '2026-10-14 12:10:23'),
(31, 17, 10, 'Samsung Galaxy S25 5G', 1, 112900.00, 112900.00, '2026-10-14 12:10:23', '2026-10-14 12:10:23'),
(32, 18, 12, 'Dell 24 Plus Monitor - S2425HSM', 1, 114900.00, 114900.00, '2026-10-18 04:44:26', '2026-10-18 04:44:26'),
(33, 19, 24, 'Samsung 27\" Essential S3 (S36GD)', 1, 109.00, 109.00, '2026-10-18 05:50:51', '2026-10-18 05:50:51'),
(34, 19, 12, 'Dell 24 Plus Monitor - S2425HSM', 1, 114900.00, 114900.00, '2026-10-18 05:50:51', '2026-10-18 05:50:51'),
(35, 20, 26, 'msi MAG 341CQP QD-OLED X28 34\"', 1, 250.00, 250.00, '2026-10-18 05:52:03', '2026-10-18 05:52:03'),
(36, 21, 24, 'Samsung 27\" Essential S3 (S36GD)', 1, 109.00, 109.00, '2026-10-18 05:55:26', '2026-10-18 05:55:26');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sku` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `stock` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `image`, `category_id`, `brand_id`, `sku`, `price`, `sale_price`, `stock`, `status`, `created_at`, `updated_at`) VALUES
(4, 'ASUS ROG Strix G16 (2025) Gaming Laptop', 'asus-rog-strix-g16-2025-gaming-laptop-4', 'Brand: ASUS\r\nModel Name: ROG Strix G16\r\nScreen Size: 16 inches\r\nColor: Eclipse Gray\r\nHard Disk Size: 1 TB\r\nCPU Model: Core i7\r\nRAM Memory Installed Size: 16 GB\r\nOperating System: Windows 11 Home\r\nSpecial Feature: ROG Nebula Display, Tri-Fan Technology\r\nGraphics Card Description: Dedicated', 'products/43fyjwYtB7NP3ZQM8JxmuDnvdSGNZn9w0YwrQfTc.jpg', 3, 7, 'SKU-1001', 1800.00, 1573.98, 5, 'active', '2026-09-21 00:42:16', '2026-10-01 01:26:35'),
(5, 'HP OmniBook 3 16 inch Laptop PC', 'hp-omnibook-3-16-inch-laptop-pc-5', 'Brand: HP\r\nModel Name: HP OmniBook 3 Laptop 16-by0199nr\r\nScreen Size: 16 inches\r\nColor: Mica Silver\r\nHard Disk Size: 256 GB\r\nCPU Model: AMD Ryzen 3 7320U\r\nRAM Memory Installed Size: 8 GB\r\nOperating System: Windows 11 Home\r\nSpecial Feature: 16-inch 1920 x 1200 touch IPS display, micro-edge, anti-glare, 300 nits, 62.5% sRGB, 2 USB Type-A, 2 USB Type-C, HDMI 2.1, headphone/microphone combo, USB Power Delivery, DisplayPort 1.4, HP Sleep and Charge\r\nGraphics Card Description: Integrated AMD Radeon Graphics', 'products/le5Z879RiFjlwx8TylJCX3h38rdSV0JbMYUZOc9q.png', 3, 2, 'SKU-2001', 600.00, 545.00, 5, 'active', '2026-09-21 00:45:17', '2026-10-03 23:53:23'),
(6, 'Apple 16-Inch MacBook Pro Laptop Early 2026', 'apple-16-inch-macbook-pro-laptop-early-2026-6', 'Brand: Apple\r\nModel Name: MacBook Pro 16\"\r\nScreen Size: 16.2 inches\r\nColor: Silver\r\nHard Disk Size: 2 TB\r\nCPU Model: Apple M5 Max\r\nRAM Memory Installed Size: 128 GB\r\nOperating System: macOS\r\nSpecial Feature: 128GB Unified Memory, 18-Core CPU, 2TB SSD Storage, 40-Core GPU, Apple M5 Max Chip\r\nGraphics Card Description: Integrated', 'products/tnXpgn0jrh7XiStb5wYtOROLpbqfnAhC4inlQuvz.jpg', 3, 5, 'SKU-3001', 2200.00, 1899.00, 0, 'active', '2026-09-21 00:48:39', '2026-10-04 01:12:53'),
(7, 'AULA S99 Gaming Keyboard, Wireless Green Creamy', 'aula-s99-gaming-keyboard-wireless-green-creamy-7', 'AULA gaming keyboard with a contemporary Green & Beige design, membrane keyboard technology, and RGB backlighting. It supports Bluetooth, USB-A, USB-C, and Wi-Fi connectivity and is compatible with Gaming Consoles, Laptops, PCs, Smartphones, and Tablets. Designed for gaming, business, education, everyday use, multimedia, personal use, photo editing, programming, student use, video editing, and working. Features include Backlit, Ergonomic, Programmable Keys, Rechargeable functionality, and Round Key design. Product dimensions: 17.4\"L x 7.28\"W x 2\"H.', 'products/IxxN4nqicg1150DTPyHllv3YP1IYviBDVegWf9ta.png', 5, 8, 'SKU-5001', 60.00, 45.00, 0, 'active', '2026-09-21 01:03:05', '2026-10-03 23:53:23'),
(9, 'iPhone 18 Pro Max', 'iphone-18-pro-max-9', 'Apple debuts iPhone 18 Pro and iPhone 18 Pro Max', 'products/qE8CZTun2YhFlAdLqLiyHdg083wCp4gjYX4EyH01.png', 4, 5, 'DEMO-EL-2001', 159900.00, 149900.00, 5, 'inactive', '2026-10-01 00:51:09', '2026-10-04 01:12:35'),
(10, 'Samsung Galaxy S25 5G', 'samsung-galaxy-s25-5g-10', 'Samsung Galaxy S25 5G SM-S931B/DS 256GB 12GB Dual SIM Factory Unlocked GSM Smartphone, 6.2\" 120Hz AMOLED Display, 50MP Cameras - International Version (Navy)', 'products/BPjJhZtNZeh7mzmkllFj6QkZCjGp04qvmiv3dx8S-jukebox-bg-removed-719x868.png', 4, 6, 'DEMO-EL-2002', 119900.00, 112900.00, 11, 'active', '2026-10-01 00:51:09', '2026-10-03 23:53:23'),
(11, 'HP Wired RGB Gaming Mouse', 'hp-wired-rgb-gaming-mouse-11', 'HP Wired RGB Gaming Mouse High Performance Mouse with Optical Sensor, 3 Buttons, 7 Color LED for Computer Notebook Laptop Office PC Home', 'products/JJbBdn6dnAFJEn51x4FidGf0gNGiBg0GaieSnZAv.png', 6, 2, 'DEMO-EL-2003', 170.00, 160.00, 6, 'active', '2026-10-01 00:51:09', '2026-10-04 00:35:19'),
(12, 'Dell 24 Plus Monitor - S2425HSM', 'dell-24-plus-monitor-s2425hsm-12', 'Dell 24 Plus Monitor - S2425HSM - 23.8-inch FHD (1920x1080) 144Hz 1ms Display, 2 x 3W Speakers, HDMI Connectivity, Height/Tilt/Pivot/Swivel Adjustability, AMD FreeSync - Ash White', 'products/QhoKigJenvbLVqaJU0y9E9hJnp6H9X0U2cNAVFeY.png', 7, 3, 'DEMO-EL-2004', 124900.00, 114900.00, 9, 'active', '2026-10-01 00:51:09', '2026-10-03 23:53:23'),
(13, 'Samsung Type-C USB Flash', 'samsung-type-c-usb-flash-13', 'Samsung Type-C USB Flash Drive 256GB, USB 3.2 Gen 1, Up to 400MB/s\r\nTransfer 4GB Files in 15 Secs, Compatible w/ USB 3.0/2.0, Waterproof, Storage for Computers & Mobile, Blue (MUF-256DA/AM)', 'products/bi3g4sB9iQaW05giyQSlFcogZhbi4Ox8v9mlhSh4-jukebox-bg-removed-1000x495.png', 8, 6, 'DEMO-EL-2005', 180.00, 99.00, 6, 'active', '2026-10-01 00:51:09', '2026-10-03 23:53:23'),
(15, 'AULA WIN68 HE MAX - Hall Effect Gaming Keyboard', 'aula-win68-he-max-hall-effect-gaming-keyboard-15', 'AULA WIN68 HE MAX - Hall Effect Gaming Keyboard with Magnetic Switch, Adjustable Actuation Fast Trigger Mode, 8KHz Polling Rate, RGB Backlit Wired Mechanical Gaming Keyboard 60 Percent Compact Design', 'products/5OAG108rR3FRATJxk6OA94ohB4wcUCINgZY2whA4.png', 5, 8, 'DEMO-EL-2007', 16900.00, 14900.00, 8, 'active', '2026-10-01 00:51:10', '2026-10-03 23:53:23'),
(16, 'SAMSUNG Galaxy Buds3 Pro', 'samsung-galaxy-buds3-pro-16', 'SAMSUNG Galaxy Buds3 Pro (2024, ANC) Water Resistant, AI Real-Time Language Interpreter, True Wireless Bluetooth 5.4 Earbuds, Hi-Fi, Noise Cancelling, Touch Control, International Model R630 (Silver)', 'products/aX47EupnS575MsegqnqCWDTAwAPKaMHAa7dQ30CK-jukebox-bg-removed-777x791.png', 17, 6, 'DEMO-EL-2008', 45900.00, 41900.00, 0, 'active', '2026-10-01 00:51:10', '2026-10-14 11:41:54'),
(17, 'Soundcore by Anker Q20i', 'soundcore-by-anker-q20i-17', 'Soundcore by Anker Q20i Hybrid Active Noise Cancelling Headphones, Black', 'products/7RBtbQXolQ7KYOXeCwKbBDL5wSmF4IclSO7EHyxX.png', 17, 15, 'WH-1001', 2500.00, 2200.00, 25, 'inactive', '2026-10-03 21:42:31', '2026-10-04 01:12:08'),
(18, 'Samsung Galaxy Watch 7', 'samsung-galaxy-watch-7-18', 'Smart Watch demo product for the admin panel.', 'products/7naWNzxHhjnfjBfW9HhaLAOxDkq3WVZtsT32mkiC.jpg', 18, 6, 'SW-1002', 4500.00, 3999.00, 1, 'active', '2026-10-03 21:42:31', '2026-10-04 01:12:22'),
(24, 'Samsung 27\" Essential S3 (S36GD)', 'samsung-27-essential-s3-s36gd-24', 'Brand 	Samsung\r\nScreen Size 	27 inches\r\nResolution 	FHD 1080p\r\nAspect Ratio 	16:9\r\nScreen Surface Description 	Curved\r\nAbout this item\r\n\r\n    CURVED FOR ENHANCED ENGAGEMENT: An immersive viewing experience with a curved monitor that wraps more closely around your field of vision; It creates a wider view, enhancing depth perception and minimizing peripheral distraction\r\n    SMOOTH PERFORMANCE FOR SEAMLESS CONTENT: Stay in the action when playing games, watching videos, or working on creative projects; The 100Hz refresh rate reduces lag and motion blur so you don\'t miss a thing in fast-paced moments¹\r\n    MORE GAMING POWER: Gain the edge with optimizable game settings; Color and image contrast can be adjusted to see scenes more vividly and spot enemies hiding in the dark; Game Mode adjusts any game to fill the screen so you can view every detail²\r\n    KEEP IT EASY ON THE EYES: Care for your eyes and stay comfortable, even during long sessions; Advanced eye comfort technology certified by TÜV reduces eye strain by minimizing blue light and reducing irritating screen flicker²\r\n    INCREASED VERSATILITY: Connect to more; Plug devices straight into your monitor for increased flexibility, making your computing environment even more convenient', 'products/fQlNHdRJF3PKOxjZpMe5LzNE4WbDisPSNNaYgnG0.jpg', 7, 6, 'CRT- MO-SM-27', 120.00, 109.00, 13, 'active', '2026-10-18 05:41:26', '2026-10-18 05:41:39'),
(25, 'Samsung 34\" ViewFinity S5 (S55GH)', 'samsung-34-viewfinity-s5-s55gh-ycc8ri', 'Brand 	Samsung\r\nScreen Size 	34 inches\r\nResolution 	QHD 1440\r\nAspect Ratio 	21:9\r\nScreen Surface Description 	Matte\r\nAbout this item\r\n\r\n    Samsung’s 34\" ViewFinity S5 (S55GH) Ultrawide QHD Monitor delivers visual excellence and seamless management of creative tasks for professionals\r\n    The 34\" 1800R curved display provides a panoramic view with Ultrawide QHD and the 21:9 aspect ratio enables efficient multitasking\r\n    HDR10 optimizes contrast, offering a gamut of more than 1 billion accurate colors with darker blacks and brighter highlights\r\n    120Hz Refresh Rate minimizes screen lag and motion blur to deliver ultra-smooth action, while VRR with AMD FreeSync Premium keeps the GPU and panel synced to reduce choppiness and image tearing\r\n    Game Mode instantly adjusts color and contrast to make scenes clearer, revealing more detail\r\n    Features HDMI and DP ports for a convenient interface that simplifies setup and enhances productivity\r\n    Eye Saver Mode technology certified by TÜV reduces eye strain by minimizing blue light and prevents screen flickering', 'products/BG3Z7QV838UxzEnLIOI1Nbc3qk3FDAn1ZuXl6nxP.jpg', 7, 6, 'CTO-MO-SM-002', 270.00, 250.00, 14, 'active', '2026-10-18 05:45:31', '2026-10-18 05:45:31'),
(26, 'msi MAG 341CQP QD-OLED X28 34\"', 'msi-mag-341cqp-qd-oled-x28-34-xvhv4h', 'Brand 	msi\r\nScreen Size 	34 inches\r\nResolution 	3440 x 1440 (UWQHD)\r\nAspect Ratio 	21:9\r\nScreen Surface Description 	Glossy\r\nAbout this item\r\n\r\n    The latest 5th-Gen QD-OLED Panel – A new RGB Stripe sub-pixel layout for sharper visuals\r\n    DarkArmor Film- Delivers 40% deeper blacks and a 2.5x more scratch-resistant screen surface\r\n    Incredible HDR visual – VESA DisplayHDR True Black 500, Crystal-Clear Motion – VESA ClearMR 15000 certified\r\n    Peak 1300 Nits-delivers a superior HDR experience with 1300 nits peak brightness, Ensures the color meets the market standard – Delta E≤2\r\n    5-layer tandem OLED panel with EL Gen 3 technology – Light efficiency up to 30%', 'products/nIocb1p02cYDrfr0eAbLveaNOyUkQcddMEw3I6l0.jpg', 7, NULL, 'CTO-MO-MSI-001', 350.00, 250.00, 9, 'active', '2026-10-18 05:47:44', '2026-10-18 05:47:44'),
(27, 'msi Cyborg 17 17.3\" FHD 144Hz Gaming Laptop', 'msi-cyborg-17-173-fhd-144hz-gaming-laptop-cnnrai', 'Brand 	msi\r\nModel Name 	Cyborg 17 B2RWFKG-074US\r\nScreen Size 	17.3 inches\r\nColor 	Black\r\nHard Disk Size 	1 TB\r\nCPU Model 	Intel Core 7\r\nRam Memory Installed Size 	16 GB\r\nOperating System 	Windows 11 Home\r\nSpecial Feature 	Backlit Keyboard\r\nGraphics Card Description 	Dedicated\r\nSee more\r\nAbout this item\r\n\r\n    Thin & Light 17.3” Gaming Powerhouse: Experience big-screen immersion in a surprisingly portable design—just 0.83 in thin and 5.5 lbs—making it easy to carry a 17.3” FHD 144Hz gaming display wherever you go.\r\n    Powered by Intel Core 7-240H for Smooth, Responsive Play: The latest Intel Core 7-240H delivers fast hybrid-architecture performance so games load faster, apps stay smooth, and multitasking feels effortless.\r\n    RTX 5060 Graphics for Next-Gen Gameplay & AI-Boosted Performance: Unlock advanced gaming with NVIDIA GeForce RTX 5060, featuring real-time ray tracing, DLSS 4 for higher FPS, and AI-accelerated visuals for competitive advantage and content creation.\r\n    Fast Memory, Large Storage, and Reliable Cooling: Game, stream, and create without slowdown using 16GB DDR5 RAM and a 1TB NVMe SSD, all kept cool by MSI’s Cooler Boost shared-pipe thermal design for quieter, more efficient sessions.\r\n    Essential Ports + Wi-Fi 6E for Flexible Play Anywhere: Stay connected with USB-C, USB-A, HDMI, RJ45, and Wi-Fi 6E for low-latency online gaming, fast file transfers, and seamless everyday productivity.', 'products/3oKxnq1shVOSR9mUyCjKOxxyZeHkUPUEQlK3RPW8.jpg', 3, 2, 'SKU-005', 1500.00, 1100.00, 0, 'active', '2026-10-18 05:49:21', '2026-10-18 05:49:21'),
(28, 'Acer Swift X 14 Laptop', 'acer-swift-x-14-laptop-qftcgl', 'Brand 	Acer\r\nModel Name 	Acer Swift X 14\r\nScreen Size 	14.5 inches\r\nColor 	Gray\r\nHard Disk Size 	1000 GB\r\nCPU Model 	Intel Core Ultra 9\r\nRam Memory Installed Size 	32 GB\r\nOperating System 	Windows 11 Home\r\nSpecial Feature 	Backlit Keyboard, Memory Card Slot\r\nGraphics Card Description 	Dedicated\r\nSee more\r\nAbout this item\r\n\r\n    That’s the Power of Acer with Intel Inside: Equipped with a power-efficient Intel Core Ultra 9 processor 285H and ultra-responsive on-package memory, the Swift X 14 handles intensive AI tasks and multitasking smoothly – ensuring responsive performance and all-day battery life for your most ambitious projects.\r\n    Game Changer: Powered by NVIDIA Blackwell, GeForce RTX 5070 Laptop GPUs bring game-changing capabilities to gamers and creators. Equipped with a massive level of 798 AI TOPS horsepower, the RTX 50 Series enables new experiences and next-level graphics fidelity. Multiply performance with NVIDIA DLSS 4, generate images at unprecedented speed, and unleash your creativity with NVIDIA Studio.\r\n    Made for Makers: Every pixel is perfected on a 3K 120Hz OLED Eyesafe display protected by smudge-resistant Corning Gorilla Glass—offering vivid colors and remarkably deep blacks with Certified True Black HDR500. Exceptional Calman Verified color accuracy with the flexibility to switch color profiles on a 16:10 display that’s made for makers. (14.5\" 16:10 display has approximately 12.8% more viewing area than a 14\" 16:9 display)\r\n    Copilot in Windows - your AI Assistant: Do more, quicker than ever across multiple applications with the centralized generative AI assistance of Copilot in Windows. Accessible with a single touch of the Copilot Key.\r\n    Tactile Precision. Ultra - Durable Control: The large haptic touchpad made from a single slate of Corning Gorilla Glass with MPP 2.5 tilt-enabled stylus support (touchpad only), empowers you to create freely, naturally, and intuitively. Engineered for durability and responsiveness, it delivers physical feedback with each press, enhancing control with customizable haptics for more natural navigation. The included Acer Active Stylus empowers creators, designers, and artists to sketch, write, and create with pinpoint accuracy, ensuring a smooth and intuitive experience.\r\n    Better Video Calls Anywhere: Acer QuickPanel is designed to be intuitive; it automatically appears when your device detects that your webcam or microphone has been turned on. The 1080p FHD IR webcam and Acer’s AI-enhanced conferencing tools in Acer PurifiedView 2.0 and Acer PurifiedVoice 2.0 work together to ensure you look and sound your best when communicating online. Improve your lighting conditions. Blur the background. Remove noisy distractions.\r\n    Acer Light Sensing: The Swift X 14 is equipped with Acer\'s Light Sensing technology RGB sensor located next to the webcam detects ambient lighting conditions and adjusts the display\'s brightness and color temperature so that the screen always looks natural and delivers an optimal viewing experience.', 'products/J1VViiLZH8gCbvy0vgrQj5K7JwuC0OKiQQMHIdi2.jpg', 3, 7, 'SKU-008', 950.00, 800.00, 0, 'active', '2026-10-18 06:14:26', '2026-10-18 06:14:26'),
(29, 'ASUS ROG Phone 9 Unlocked Android Phone', 'asus-rog-phone-9-unlocked-android-phone-caifdn', 'Brand 	ASUS\r\nOperating System 	Android 15\r\nRam Memory Installed Size 	12 GB\r\nCPU Model 	Snapdragon\r\nMemory Storage Capacity 	256 GB\r\nScreen Size 	6.78 inches\r\nResolution 	1080 x 2400\r\nRefresh Rate 	185 hertz\r\nModel Name 	ROG Phone 9\r\nWireless Carrier 	AT&T', 'products/2u5Ft3P9KdFxiAuo3pWPbt7duhTXAeEgxAHTyuUE.jpg', 4, 7, 'SKU-ASUS-PHN-001', 1500.00, 1200.00, 20, 'active', '2026-10-18 06:17:18', '2026-10-18 06:17:18'),
(30, 'ASUS ROG Spatha X Wireless Gaming Mouse', 'asus-rog-spatha-x-wireless-gaming-mouse-ltkgcu', 'Color: Black\r\nPattern Name: Mouse\r\nBrand 	ASUS\r\nColor 	Black\r\nConnectivity Technology 	Radio Frequency, USB\r\nSpecial Feature 	Rechargeable\r\nMovement Detection Technology', 'products/wPPvYwB2jK6eu8R1z3C8xAJDyMeXaavPbdyLFWuJ.jpg', 6, 7, 'SKU-MUS-ASUS-001', 150.00, 115.00, 50, 'active', '2026-10-18 06:19:06', '2026-10-18 06:19:06'),
(31, 'ASUS ROG Falchion Ace 75 HE', 'asus-rog-falchion-ace-75-he-ddie2w', 'Brand 	ASUS\r\nCompatible Devices 	Laptop, PC\r\nConnectivity Technology 	USB 2.0\r\nKeyboard Description 	Mechanical', 'products/CyIbQLZCpdSIN869cWy8xwgizYkZ7qNHzOZYhbbC.jpg', 5, 7, 'SKU-KEY-ASUS-01', 200.00, 150.00, 20, 'active', '2026-10-18 06:20:31', '2026-10-18 06:20:31'),
(32, 'ASUS ROG Delta II Wireless Gaming Headse', 'asus-rog-delta-ii-wireless-gaming-headse-7fuvny', 'Brand 	ASUS\r\nColor 	Black\r\nEar Placement 	On Ear\r\nForm Factor 	Over Ear\r\nImpedance 	32 ohm', 'products/5BMBBdlKndGzCtn5On501NNWXm9I7XF9Lju7IKQ9.jpg', 17, 7, 'SKU-HEAD-ASUS-01', 220.00, 170.00, 20, 'active', '2026-10-18 06:22:09', '2026-10-18 06:22:09'),
(33, 'ASUS Zenbook Duo Dual 14\" OLED', 'asus-zenbook-duo-dual-14-oled-q688jj', 'Brand 	ASUS\r\nModel Name 	UX8406MA-DS76T\r\nScreen Size 	14 inches\r\nColor 	Inkwell Gray\r\nHard Disk Size 	1 TB\r\nCPU Model 	Core i7\r\nRam Memory Installed Size 	16 GB\r\nOperating System 	Windows 11 Home\r\nSpecial Feature 	Portable, Thin\r\nGraphics Card Description', 'products/4E3PrQjQbuuc06yeCwluXpLm5viCEzNVsTcHcUeE.jpg', 3, 7, 'SKU-LAP-ASUS-003', 1800.00, 1600.00, 10, 'active', '2026-10-18 06:24:36', '2026-10-18 06:24:36'),
(34, 'ASUS ROG Strix G16 (2025) Gaming Laptop, 16” ROG', 'asus-rog-strix-g16-2025-gaming-laptop-16-rog-w1ondz', 'Brand 	ASUS\r\nModel Name 	ROG Strix G16\r\nScreen Size 	16 inches\r\nColor 	Eclipse Gray\r\nHard Disk Size 	1 TB\r\nCPU Model 	Intel Core Ultra 9\r\nRam Memory Installed Size 	32 GB\r\nOperating System 	Windows 11 Home\r\nSpecial Feature 	Backlit Chiclet Keyboard\r\nGraphics Card Description 	Dedicated', 'products/1qRCM1jeK8THTUi6XE62dUtXZqLuq9YjWoHdyHiL.jpg', 3, 7, 'SKU-LAPTOP-ASUS-003', 3800.00, 3500.00, 15, 'active', '2026-10-18 06:26:41', '2026-10-18 06:26:41'),
(35, 'ASUS ProArt PA34VCNV 34 Inch 1440p Ultrawide', 'asus-proart-pa34vcnv-34-inch-1440p-ultrawide-sgdtol', 'Brand 	ASUS\r\nScreen Size 	34.1 inches\r\nResolution 	QHD Ultra Wide 1440p\r\nAspect Ratio 	21:9\r\nScreen Surface Description 	Matte\r\nAbout this item\r\n\r\n    Ultrawide Curved Display: 34.1-inch 21:9 3800R IPS curved display with frameless design for immersive viewing experience\r\n    Professional Color Accuracy: International color standard 100% sRGB and 100% Rec. 709 wide color gamut for precise color reproduction\r\n    Factory Calibrated Precision: Calman Verified with factory calibration delivering excellent Delta E < 2 color accuracy for professional work\r\n    Comprehensive Connectivity Options: Extensive connectivity including DisplayPort over USB-C with 96W Power Delivery, DisplayPort daisy-chaining, HDMI, USB hub and RJ45 LAN port for maximum flexibility\r\n    Ergonomic Adjustability: Ergonomic design with tilt, swivel and height adjustments for a comfortable viewing experience during extended work sessions\r\n    Extended Warranty Coverage: 5-year warranty (3 years + 2 years extension with online registration) for long-term reliability and peace of mind\r\n    Free 3-month Adobe Creative Cloud Subscription: Receive complimentary access with the purchase of this product (offer valid to 8/31/2028)', 'products/aA3RQ0oF7pHI3tBP56Dq4qyWIbWzEoH34FneNTHf.jpg', 3, 8, 'SKU-MONITOR-ASUS-002', 1500.00, 1300.00, 20, 'active', '2026-10-18 06:30:03', '2026-10-18 06:30:03'),
(36, 'ASUS ROG Azoth 96 HE Wireless Hall Effect', 'asus-rog-azoth-96-he-wireless-hall-effect-o6psi9', 'Brand 	ASUS\r\nCompatible Devices 	Laptop, PC\r\nConnectivity Technology 	Bluetooth, RF, USB 2.0\r\nKeyboard Description 	Mechanical\r\nRecommended Uses For Product 	Business, Education, Everyday Use, Gaming, Multimedia, Personal, Photo Editing, Programming, Student, Video EditingBusiness, Education, Everyday Use, Gaming, Multimedia, Personal, Photo Editing, Programming, Student, Video Editing\r\nSpecial Feature 	8K Hz Polling, ABS Keycaps, Color OLED Screen, Hot Swappable Magnetic Switch, Tri-Mode Connection: USB 2.0, Bluetooth, RF 2.4GHz8K Hz Polling, ABS Keycaps, Color OLED Screen, Hot Swappable Magnetic Switch, Tri-Mode Connection: USB 2.0, Bluetooth, RF 2.4GHz\r\nColor 	Black\r\nKeyboard backlighting color support 	RGB\r\nStyle 	Azoth 96 HE\r\nProduct Dimensions 	15.03\"L x 5.4\"W x 1.7\"H', 'products/GcOLeUMEDE4260UhvI3BMn1uLhOo1x6YUDaDypd0.jpg', 5, 7, 'SKU-KEYBOARD-ASUS-005', 290.00, 277.00, 30, 'active', '2026-10-18 06:32:19', '2026-10-18 06:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) NOT NULL,
  `is_primary` tinyint(1) NOT NULL DEFAULT 0,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `path`, `is_primary`, `sort_order`, `created_at`, `updated_at`) VALUES
(9, 4, 'products/lcy2wODgvsi90UPJgPEJgRXZ56XGWrHGPBLg9Uex.png', 0, 1, '2026-09-21 00:42:16', '2026-10-03 23:53:23'),
(10, 4, 'products/mQuJEcqKoU4Cs7qbnDKhsRhG5LdU1xQZWFQZUsYW.png', 0, 2, '2026-09-21 00:42:16', '2026-10-03 23:53:23'),
(11, 4, 'products/fBovB5KPI9juRMCCdKUcRhA0gdvUeV24z0DPecPP.png', 0, 3, '2026-09-21 00:42:16', '2026-10-03 23:53:23'),
(12, 4, 'products/MEtxkWt7rKoy0iHnqpyppKWXua7WquAPapq98hiz.png', 0, 4, '2026-09-21 00:42:16', '2026-10-03 23:53:23'),
(13, 4, 'products/43fyjwYtB7NP3ZQM8JxmuDnvdSGNZn9w0YwrQfTc.jpg', 1, 5, '2026-09-21 00:42:16', '2026-09-21 00:42:33'),
(14, 5, 'products/C6h6xU3xuwmrdBJwhUKou0hHBi6zlgHNGSkgU8Nt.jpg', 0, 1, '2026-09-21 00:45:17', '2026-09-21 00:45:24'),
(15, 5, 'products/314Wk5mWPBRPpAFY4DAGJYFks4iW0CuCVtYJpAan.jpg', 0, 2, '2026-09-21 00:45:17', '2026-09-21 00:45:24'),
(16, 5, 'products/7fOv09XgVbg9LLUq90Kj0AvkQmeQMdd43HwnrYm8.jpg', 0, 3, '2026-09-21 00:45:17', '2026-09-21 00:45:24'),
(17, 5, 'products/3A7DDtf2vfAWlz38OjJJUKPlVEiaPDdWVqDhJGAM.jpg', 0, 4, '2026-09-21 00:45:17', '2026-09-21 00:45:24'),
(18, 5, 'products/le5Z879RiFjlwx8TylJCX3h38rdSV0JbMYUZOc9q.png', 1, 5, '2026-09-21 00:45:17', '2026-10-03 23:53:23'),
(19, 6, 'products/3jvHX4cbJdNlpGDOMOH4EymX9tgmQSReGMmQXV2E.jpg', 0, 1, '2026-09-21 00:48:39', '2026-10-04 01:12:53'),
(20, 6, 'products/9AFHBUisLp6uuDVsWb9bT2K6ve5zkGCyX3bMnlT3.jpg', 0, 2, '2026-09-21 00:48:39', '2026-10-04 01:12:53'),
(21, 6, 'products/pjZUre5PexJrMPbl4BHwfhrQx0PGf12u31prEZoV.png', 0, 3, '2026-09-21 00:48:39', '2026-10-04 01:12:53'),
(22, 6, 'products/tnXpgn0jrh7XiStb5wYtOROLpbqfnAhC4inlQuvz.jpg', 1, 4, '2026-09-21 00:48:39', '2026-10-04 01:12:53'),
(23, 7, 'products/l83nS2Ugn6kVRDjGPOJsx5jCDgZ9d53PFUgqs0on.jpg', 0, 1, '2026-09-21 01:04:10', '2026-09-21 01:04:18'),
(24, 7, 'products/xi6JjxG02DDsVGvNk4ZDdyWAkjDQFOst9aT9PtRt.jpg', 0, 2, '2026-09-21 01:04:10', '2026-09-21 01:04:18'),
(25, 7, 'products/BqU2OoXILuQB1FJuXoIRihjVolZWEcmqJRpbDUwo.jpg', 0, 3, '2026-09-21 01:04:10', '2026-09-21 01:04:18'),
(26, 7, 'products/IxxN4nqicg1150DTPyHllv3YP1IYviBDVegWf9ta.png', 1, 4, '2026-09-21 01:04:10', '2026-10-03 23:53:23'),
(39, 17, 'products/7RBtbQXolQ7KYOXeCwKbBDL5wSmF4IclSO7EHyxX.png', 0, 1, '2026-10-03 21:59:07', '2026-10-04 01:12:08'),
(40, 17, 'products/slL29PyGjJozwvLJsQga1ln6f2wlFb2xBpaN9lmR.png', 0, 2, '2026-10-03 21:59:07', '2026-10-04 01:12:08'),
(41, 17, 'products/tL5luL1MCgGUfDucgRTdxIB9JW0AX2M62ctk9IEE.jpg', 0, 3, '2026-10-03 21:59:07', '2026-10-04 01:12:08'),
(42, 17, 'products/WmcjEWbsgHw1NugN4Xg649RTOAcqAaPSMZ99Bfq6.jpg', 0, 4, '2026-10-03 21:59:07', '2026-10-04 01:12:08'),
(43, 17, 'products/tTQve0K9pJ3QmSoY3BPHnPG90kaUX7mVGa9TkBNm.png', 0, 5, '2026-10-03 21:59:07', '2026-10-04 01:12:08'),
(44, 18, 'products/7naWNzxHhjnfjBfW9HhaLAOxDkq3WVZtsT32mkiC.jpg', 1, 1, '2026-10-03 22:07:52', '2026-10-04 01:12:22'),
(45, 18, 'products/u8viRbmUlkxbzsaOrnkq4BSnmbmDliJY8kZwrVxP.jpg', 0, 2, '2026-10-03 22:07:52', '2026-10-04 01:12:22'),
(46, 18, 'products/dDtKu6oixfJrsTv75nB35YIYjhi1xj97dD3xme9d.jpg', 0, 3, '2026-10-03 22:07:52', '2026-10-04 01:12:22'),
(47, 18, 'products/7ZZg0Kqh0p4crz0OuNm1n9XN2h6xdWubZBoKSJaZ.jpg', 0, 4, '2026-10-03 22:07:52', '2026-10-04 01:12:22'),
(48, 18, 'products/OkDHMYo9pwcmYhrYCAqZ420bn7QHIYgXgvTIJTcu.png', 0, 5, '2026-10-03 22:07:52', '2026-10-04 01:12:22'),
(49, 15, 'products/CjCONea0eDIk8Gg8WYPOSC3tuylESp4keTm0b4rI.jpg', 0, 1, '2026-10-03 22:12:19', '2026-10-04 00:49:20'),
(50, 15, 'products/8CTT3MyfDak3Pg7QU8GQeyOjwT0viW6uJh4bJaLC.jpg', 0, 2, '2026-10-03 22:12:19', '2026-10-04 00:49:20'),
(51, 15, 'products/5OAG108rR3FRATJxk6OA94ohB4wcUCINgZY2whA4.png', 0, 3, '2026-10-03 22:12:19', '2026-10-04 00:49:20'),
(52, 15, 'products/LlrC3zuy2deXvM5gDTqEmHR45PyNGIfgET17Uo2v.jpg', 0, 4, '2026-10-03 22:12:19', '2026-10-04 00:49:20'),
(53, 16, 'products/aX47EupnS575MsegqnqCWDTAwAPKaMHAa7dQ30CK-jukebox-bg-removed-777x791.png', 0, 1, '2026-10-03 22:18:16', '2026-10-04 00:49:24'),
(54, 9, 'products/PxE1uIQlhexKZerTFct07DGQWO8g8g7T7CBVqCrO.jpg', 0, 1, '2026-10-03 22:24:11', '2026-10-04 01:13:03'),
(55, 9, 'products/kGikkTA9QjrBTfdfGUsddvg04dgkX3dkPj27sSCw.jpg', 0, 2, '2026-10-03 22:24:11', '2026-10-04 01:13:03'),
(56, 9, 'products/XYFpv693Exd3EPViCKIWpvpudizmEZEu9HvSGxY2.jpg', 0, 3, '2026-10-03 22:24:11', '2026-10-04 01:13:03'),
(57, 9, 'products/qE8CZTun2YhFlAdLqLiyHdg083wCp4gjYX4EyH01.png', 1, 4, '2026-10-03 22:24:50', '2026-10-04 01:13:03'),
(58, 10, 'products/42xZxxkHK18NbBE4gNuNnQ46qLcfjefK21RGzuWv.jpg', 0, 1, '2026-10-03 22:32:36', '2026-10-04 00:49:42'),
(59, 10, 'products/UcdqQUWBxfLwmOYfkcSdZOgZTca127STR0EkPdHn.jpg', 0, 2, '2026-10-03 22:32:36', '2026-10-04 00:49:42'),
(60, 10, 'products/BPjJhZtNZeh7mzmkllFj6QkZCjGp04qvmiv3dx8S-jukebox-bg-removed-719x868.png', 0, 3, '2026-10-03 22:32:36', '2026-10-04 00:49:42'),
(61, 11, 'products/JJbBdn6dnAFJEn51x4FidGf0gNGiBg0GaieSnZAv.png', 0, 1, '2026-10-03 22:38:55', '2026-10-04 00:49:48'),
(62, 11, 'products/53ARUA6IwFjNtCklasGDTP6PiePbQruUxS7CrsYs.jpg', 0, 2, '2026-10-03 22:38:55', '2026-10-04 00:49:48'),
(63, 11, 'products/WHofUXVQUNbaGERZQkLsqr15SoLncY4WVg4Pe8XO.png', 0, 3, '2026-10-03 22:38:55', '2026-10-04 00:49:48'),
(64, 12, 'products/QhoKigJenvbLVqaJU0y9E9hJnp6H9X0U2cNAVFeY.png', 0, 1, '2026-10-03 22:42:50', '2026-10-04 00:49:55'),
(65, 12, 'products/7iE44PecSMvnH3foJUJ6GOkas7ytxzLGH39xUYaZ.jpg', 0, 2, '2026-10-03 22:42:50', '2026-10-04 00:49:55'),
(66, 12, 'products/hTgilGD8IQHCSA4fP5iQHFq1YcaMXMMHEr7dtrDS.png', 0, 3, '2026-10-03 22:42:50', '2026-10-04 00:49:55'),
(67, 12, 'products/3oV6lItXt4SdfgqGzHXqjHdMlA0sr96uUTprnuWx.jpg', 0, 4, '2026-10-03 22:42:50', '2026-10-04 00:49:55'),
(68, 12, 'products/QhoKigJenvbLVqaJU0y9E9hJnp6H9X0U2cNAVFeY.png', 0, 5, '2026-10-03 22:42:50', '2026-10-04 00:49:55'),
(69, 13, 'products/pM4XmDbarJ7BzJTKkYZq1qfjqUoVmreIGq7Kf0s0.jpg', 0, 1, '2026-10-03 22:45:42', '2026-10-04 00:50:00'),
(70, 13, 'products/UDWUMtjLsEkKOnxPu22xwx9pU2qc247CRzToSDYk.jpg', 0, 2, '2026-10-03 22:45:42', '2026-10-04 00:50:00'),
(71, 13, 'products/hJ6oxYq5MbKUtkO9hJsranN0Zfevsd3FCXqvNfbq.jpg', 0, 3, '2026-10-03 22:45:42', '2026-10-04 00:50:00'),
(72, 13, 'products/bi3g4sB9iQaW05giyQSlFcogZhbi4Ox8v9mlhSh4-jukebox-bg-removed-1000x495.png', 0, 4, '2026-10-03 22:45:42', '2026-10-04 00:50:00'),
(73, 24, 'products/GGbgt2mDUobG5TGVrQQznYliN6H79x30kaN2t05M.jpg', 0, 1, '2026-10-18 05:41:26', '2026-10-18 05:41:39'),
(74, 24, 'products/4SHb57gGzj5foY8DiiiMacK9AVhMITtDPMFyEhGi.jpg', 0, 2, '2026-10-18 05:41:26', '2026-10-18 05:41:39'),
(75, 24, 'products/KmI1LrouivBMfdW7PT2rf55DwMSPsvG59KTqkwov.jpg', 0, 3, '2026-10-18 05:41:26', '2026-10-18 05:41:39'),
(76, 24, 'products/03LbkFmdM9LCFCa4dPv9fzK72lCOACvkdVAQpddA.jpg', 0, 4, '2026-10-18 05:41:26', '2026-10-18 05:41:39'),
(77, 24, 'products/jByxMkN84U2qO70AsbCyzieNpWvuu31jQ448DXUk.jpg', 0, 5, '2026-10-18 05:41:26', '2026-10-18 05:41:39'),
(78, 24, 'products/z3WxneWcaMmz8x3V42JgUQpltZ44OwevKWnHoYpI.jpg', 0, 6, '2026-10-18 05:41:26', '2026-10-18 05:41:39'),
(79, 24, 'products/fQlNHdRJF3PKOxjZpMe5LzNE4WbDisPSNNaYgnG0.jpg', 1, 7, '2026-10-18 05:41:26', '2026-10-18 05:41:39'),
(80, 25, 'products/BG3Z7QV838UxzEnLIOI1Nbc3qk3FDAn1ZuXl6nxP.jpg', 0, 1, '2026-10-18 05:45:31', '2026-10-18 05:45:31'),
(81, 26, 'products/nIocb1p02cYDrfr0eAbLveaNOyUkQcddMEw3I6l0.jpg', 0, 1, '2026-10-18 05:47:44', '2026-10-18 05:47:44'),
(82, 27, 'products/3oKxnq1shVOSR9mUyCjKOxxyZeHkUPUEQlK3RPW8.jpg', 0, 1, '2026-10-18 05:49:21', '2026-10-18 05:49:21'),
(83, 28, 'products/J1VViiLZH8gCbvy0vgrQj5K7JwuC0OKiQQMHIdi2.jpg', 0, 1, '2026-10-18 06:14:26', '2026-10-18 06:14:26'),
(84, 29, 'products/2u5Ft3P9KdFxiAuo3pWPbt7duhTXAeEgxAHTyuUE.jpg', 0, 1, '2026-10-18 06:17:18', '2026-10-18 06:17:18'),
(85, 30, 'products/wPPvYwB2jK6eu8R1z3C8xAJDyMeXaavPbdyLFWuJ.jpg', 0, 1, '2026-10-18 06:19:06', '2026-10-18 06:19:06'),
(86, 31, 'products/CyIbQLZCpdSIN869cWy8xwgizYkZ7qNHzOZYhbbC.jpg', 0, 1, '2026-10-18 06:20:31', '2026-10-18 06:20:31'),
(87, 32, 'products/5BMBBdlKndGzCtn5On501NNWXm9I7XF9Lju7IKQ9.jpg', 0, 1, '2026-10-18 06:22:09', '2026-10-18 06:22:09'),
(88, 33, 'products/4E3PrQjQbuuc06yeCwluXpLm5viCEzNVsTcHcUeE.jpg', 0, 1, '2026-10-18 06:24:36', '2026-10-18 06:24:36'),
(89, 34, 'products/1qRCM1jeK8THTUi6XE62dUtXZqLuq9YjWoHdyHiL.jpg', 0, 1, '2026-10-18 06:26:41', '2026-10-18 06:26:41'),
(90, 35, 'products/aA3RQ0oF7pHI3tBP56Dq4qyWIbWzEoH34FneNTHf.jpg', 0, 1, '2026-10-18 06:30:03', '2026-10-18 06:30:03'),
(91, 36, 'products/GcOLeUMEDE4260UhvI3BMn1uLhOo1x6YUDaDypd0.jpg', 0, 1, '2026-10-18 06:32:19', '2026-10-18 06:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `product_skus`
--

CREATE TABLE `product_skus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `sku` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_skus`
--

INSERT INTO `product_skus` (`id`, `product_id`, `sku`, `price`, `stock`, `image`, `status`, `created_at`, `updated_at`) VALUES
(4, 4, 'SKU-1001', 1573.98, 20, NULL, 'active', '2026-09-21 00:42:16', '2026-09-21 00:42:16'),
(5, 5, 'SKU-2001', 545.00, 15, NULL, 'active', '2026-09-21 00:45:17', '2026-09-21 00:45:17'),
(6, 6, 'SKU-3001', 1899.00, 0, NULL, 'active', '2026-09-21 00:48:39', '2026-10-04 00:54:02'),
(7, 7, 'SKU-5001', 45.00, 2, NULL, 'active', '2026-09-21 01:03:05', '2026-09-21 01:03:05'),
(9, 9, 'DEMO-EL-2001', 149900.00, 5, NULL, 'inactive', '2026-10-01 00:51:09', '2026-10-04 01:12:35'),
(10, 10, 'DEMO-EL-2002', 112900.00, 18, NULL, 'active', '2026-10-01 00:51:09', '2026-10-01 00:51:09'),
(11, 11, 'DEMO-EL-2003', 160.00, 8, NULL, 'active', '2026-10-01 00:51:09', '2026-10-03 22:38:55'),
(12, 12, 'DEMO-EL-2004', 114900.00, 14, NULL, 'active', '2026-10-01 00:51:09', '2026-10-01 00:51:09'),
(13, 13, 'DEMO-EL-2005', 99.00, 10, NULL, 'active', '2026-10-01 00:51:10', '2026-10-03 22:45:42'),
(15, 15, 'DEMO-EL-2007', 14900.00, 20, NULL, 'active', '2026-10-01 00:51:10', '2026-10-01 00:51:10'),
(16, 16, 'DEMO-EL-2008', 41900.00, 12, NULL, 'active', '2026-10-01 00:51:10', '2026-10-01 00:51:10'),
(17, 17, 'WH-1001', 2200.00, 25, NULL, 'inactive', '2026-10-03 21:42:31', '2026-10-04 01:12:08'),
(18, 18, 'SW-1002', 3999.00, 1, NULL, 'active', '2026-10-03 21:42:31', '2026-10-04 01:12:22'),
(24, 24, 'CRT- MO-SM-27', 109.00, 15, NULL, 'active', '2026-10-18 05:41:26', '2026-10-18 05:41:26'),
(25, 25, 'CTO-MO-SM-002', 250.00, 14, NULL, 'active', '2026-10-18 05:45:31', '2026-10-18 05:45:31'),
(26, 26, 'CTO-MO-MSI-001', 250.00, 10, NULL, 'active', '2026-10-18 05:47:44', '2026-10-18 05:47:44'),
(27, 27, 'SKU-005', 1100.00, 0, NULL, 'active', '2026-10-18 05:49:21', '2026-10-18 05:49:21'),
(28, 28, 'SKU-008', 800.00, 0, NULL, 'active', '2026-10-18 06:14:26', '2026-10-18 06:14:26'),
(29, 29, 'SKU-ASUS-PHN-001', 1200.00, 20, NULL, 'active', '2026-10-18 06:17:18', '2026-10-18 06:17:18'),
(30, 30, 'SKU-MUS-ASUS-001', 115.00, 50, NULL, 'active', '2026-10-18 06:19:06', '2026-10-18 06:19:06'),
(31, 31, 'SKU-KEY-ASUS-01', 150.00, 20, NULL, 'active', '2026-10-18 06:20:31', '2026-10-18 06:20:31'),
(32, 32, 'SKU-HEAD-ASUS-01', 170.00, 20, NULL, 'active', '2026-10-18 06:22:09', '2026-10-18 06:22:09'),
(33, 33, 'SKU-LAP-ASUS-003', 1600.00, 10, NULL, 'active', '2026-10-18 06:24:36', '2026-10-18 06:24:36'),
(34, 34, 'SKU-LAPTOP-ASUS-003', 3500.00, 15, NULL, 'active', '2026-10-18 06:26:41', '2026-10-18 06:26:41'),
(35, 35, 'SKU-MONITOR-ASUS-002', 1300.00, 20, NULL, 'active', '2026-10-18 06:30:03', '2026-10-18 06:30:03'),
(36, 36, 'SKU-KEYBOARD-ASUS-005', 277.00, 30, NULL, 'active', '2026-10-18 06:32:19', '2026-10-18 06:32:19');

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
('37JKULl9s3eSW9UxuWMxubeWXtz7Yd6c5WYmgp8i', 1, '103.4.117.150', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:159.0) Gecko/20100101 Firefox/159.0', 'eyJfdG9rZW4iOiJPMnBMZmdzcFJ5a0VubHpGM29TT29KM0w1dVNtZUFPUnBpeThjcEd0IiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cHM6XC9cL3NhbG1vbi1ob3JzZS04NTE4NzMuaG9zdGluZ2Vyc2l0ZS5jb21cL2Rhc2hib2FyZCIsInJvdXRlIjoiZGFzaGJvYXJkIn0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxLCJwYXNzd29yZF9oYXNoX3dlYiI6IjI1OGFlMGJlNGZkYzk5OGMyNjcxZTYxMTEwMTkwNTAwODJmZGY4MDFiMjJhOGJlMzkxMTk4ZjliNTVhYWJhOGMifQ==', 1792305800),
('s8X6awW1TamAjmKoGvRRxnFyJMqGjSVnTDUjfUZs', NULL, '103.4.117.150', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:159.0) Gecko/20100101 Firefox/159.0', 'eyJfdG9rZW4iOiJtSjRqNnk0OHRYWkNZWWw2WVU3UXZYSE1lM1kyQ2JjSnp5c29nRUdSIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9zYWxtb24taG9yc2UtODUxODczLmhvc3RpbmdlcnNpdGUuY29tXC9hcGlcL2F1dGhcL3VzZXIiLCJyb3V0ZSI6ImFwaS5hdXRoLnVzZXIifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1792298637),
('SqU0I2b8iS4iUCYyPbrv3BD6LUKWm5kCNw3e5l4l', NULL, '103.4.117.150', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:159.0) Gecko/20100101 Firefox/159.0', 'eyJfdG9rZW4iOiJTb0NaZ3NWN0FxVWNMRnJvaTE5NmhabUxqNk5FWjBjcVZmNmdka1hoIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9zYWxtb24taG9yc2UtODUxODczLmhvc3RpbmdlcnNpdGUuY29tXC9hcGlcL2NhdGVnb3JpZXMiLCJyb3V0ZSI6bnVsbH0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1792298637);

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
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `phone`, `address`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@example.com', NULL, '$2y$12$xCtjwZVhwhvkY7UyG4S/BuA3xjP9rA9Y.ShjCzNsNvLgVWJKCVCSK', 'admin', '01700000000', 'Dhaka, Bangladesh', 'users/RzhA1dcOXgqjCxqxTqtwulK2NNbxb3dmxEHvwtZw.png', 'fMRYMRchDQ4tiAT1lR7gxU0CROk0Vh2zYINA4dVvSUb42W5iyb7yqQBFNM1l', '2026-09-20 23:37:59', '2026-10-04 00:55:48'),
(2, 'Mustafa Mursalin Khan', 'mmmursalinkhan@gmail.com', NULL, '$2y$12$MQ7FZlgJe2iAr/jTyPGzs.2TvI8aHj2mpWEaWBeKvuIEYiyS7QiSy', 'admin', '01800000000', 'Dhaka, Bangladesh', 'users/QGaTlbPSbWZApkkGOYp6OLhwlWusUZr92GsJU3VH.jpg', 'NVsabdmqWckSTk8at7BYH3U7E6CSVXU04S49lrrQMrEVoDqYyxFz1SBnalxI', '2026-09-20 23:38:00', '2026-10-14 09:33:01'),
(4, 'Rion', 'rion@example.com', NULL, '$2y$12$ABEqvs60BlTU8ZoL5JGQReJjiwMhAPeh9InvzBFmmL6v8ReKo25s2', 'customer', '01700007777', 'Palton, Dhaka', 'users/unIA9FlUvU5crfeEKY1958RvElbCL4EYu1LKYRZ8.png', NULL, '2026-09-21 00:53:34', '2026-10-04 00:57:14'),
(5, 'Masum', 'customer_01@example.com', NULL, '$2y$12$rPunqXGDX7eH2xu2KJDYpOEHxHQykg3fr3AVQPSJMJzk5TRozfY8S', 'customer', '01800000000', 'Dhaka, Bangladesh', 'users/yXdBhFuMqv5C6jsAhG6nQmb2pKT4Tv6MoFK7fYMS.png', NULL, '2026-10-03 21:42:31', '2026-10-04 00:57:01'),
(8, 'Noshin', 'noshin@mail.com', NULL, '$2y$12$/qunaYIvsl.RnWh1oE8pkuGSqFtWq.yMgxEt/8hJlU7syCNVvGwMC', 'customer', '+10170000000', 'Uttora, Dhaka', 'users/gJez1CgWts1LctSyTC6zBY7hM0eLVY8cbQBD4ljU.png', 'rXMrht9hiHYXA5BbtzaT10pEgLK27nORrfBUeRiOQ0mUfvnQ33z3WKMH6UzW', '2026-10-14 08:47:04', '2026-10-18 06:40:58'),
(9, 'Asia', 'asia@gmail.com', NULL, '$2y$12$a2B96w1sfdHdrajVHVy2S.qMBQRu3c4qaAI3QoSwj1t/JaGrDEkdS', 'customer', '+11019222255', 'Palton, Dhaka- 12316', 'users/vnEwYU1Wn5qC2h0AGwKEBPFpFDwHOoLtFI86nssu.jpg', NULL, '2026-10-14 10:41:01', '2026-10-18 06:40:18'),
(11, 'Customer', 'customer@example.com', NULL, '$2y$12$I95Mz0mH.ZqFHEz2kk122.nfw/sFNP.Bud0CwPJwdQUnWxtOrl9A2', 'customer', '01677887778', 'Dhaka, Bangladesh', 'users/2VIXlCCvEe6NjzT8JrYFZ0t63s4jdQoOfBQqFGnF.png', NULL, '2026-10-14 11:30:00', '2026-10-18 06:37:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `guest_customers`
--
ALTER TABLE `guest_customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guest_customers_phone_unique` (`phone`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_number_unique` (`order_number`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_guest_customer_id_foreign` (`guest_customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_skus`
--
ALTER TABLE `product_skus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_skus_sku_unique` (`sku`),
  ADD KEY `product_skus_product_id_foreign` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guest_customers`
--
ALTER TABLE `guest_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `product_skus`
--
ALTER TABLE `product_skus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_guest_customer_id_foreign` FOREIGN KEY (`guest_customer_id`) REFERENCES `guest_customers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_skus`
--
ALTER TABLE `product_skus`
  ADD CONSTRAINT `product_skus_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
