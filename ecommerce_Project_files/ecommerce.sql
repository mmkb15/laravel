-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 21, 2026 at 07:05 AM
-- Server version: 8.0.46
-- PHP Version: 8.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
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
(8, 'AULA', 'aula-d1ta8', 'brands/1tgjp5v33xjkC8OPprTSpxPHuOWBwFLgJR7HYLfF.png', 'AULA is a global technology brand specializing in gaming keyboards, mice, headsets, and other computer peripherals. The brand focuses on performance, durability, and modern design for gamers and PC users.', 'active', '2026-09-21 01:02:14', '2026-09-21 01:02:14');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
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
(8, NULL, 'USB', 'usb-87cm0', 'categories/rHvZ6f4o60QSVR9ZzmiZRh9XvZLLApZv1dVh4cgk.webp', 'Explore a range of USB accessories for connecting, charging, and transferring data between your devices. Choose from USB flash drives, hubs, cables, adapters, and other reliable accessories for everyday use.', 'active', '2026-09-21 00:26:25', '2026-09-21 00:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `attempts` smallint UNSIGNED NOT NULL,
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
(4, '2026_09_18_131714_create_categories_table', 1),
(5, '2026_09_18_133000_create_brands_table', 1),
(6, '2026_09_18_134328_create_products_table', 1),
(7, '2026_09_18_135408_create_product_skus_table', 1),
(8, '2026_09_18_140000_create_orders_table', 1),
(9, '2026_09_18_140001_create_order_items_table', 1),
(10, '2026_09_20_120000_add_image_to_users_table', 1),
(11, '2026_09_20_120001_create_product_images_table', 1),
(12, '2026_09_20_140000_add_image_to_categories_and_brands_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `subtotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `shipping_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cod',
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `user_id`, `subtotal`, `shipping_cost`, `discount`, `total`, `payment_method`, `payment_status`, `status`, `shipping_name`, `shipping_phone`, `shipping_address`, `notes`, `created_at`, `updated_at`) VALUES
(2, 'ORD-20260921065225-S82G', 2, 4721.94, 0.00, 0.00, 4721.94, 'cod', 'pending', 'processing', 'Mursalin', '01688874442', 'Dhaka, Bangladesh', 'Customer: Mursalin\r\nProduct: ASUS ROG\r\nQuantity: 3 pieces\r\nNote: Please prepare 3 pieces of ASUS ROG for Mursalin.', '2026-09-21 00:52:25', '2026-09-21 00:56:11'),
(3, 'ORD-20260921065536-ETLI', 4, 3798.00, 0.00, 0.00, 3798.00, 'cod', 'pending', 'pending', 'Rion Ahmed', '01712355555', 'House 12, Road 5, Dhanmondi, Dhaka, Bangladesh', 'Please deliver the product carefully. Call before delivery.', '2026-09-21 00:55:36', '2026-09-21 00:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int UNSIGNED NOT NULL,
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
(3, 3, 6, 'Apple 16-Inch MacBook Pro Laptop Early 2026', 2, 1899.00, 3798.00, '2026-09-21 00:55:36', '2026-09-21 00:55:36');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `brand_id` bigint UNSIGNED DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sale_price` decimal(10,2) DEFAULT NULL,
  `stock` int UNSIGNED NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `image`, `category_id`, `brand_id`, `sku`, `price`, `sale_price`, `stock`, `status`, `created_at`, `updated_at`) VALUES
(4, 'ASUS ROG Strix G16 (2025) Gaming Laptop', 'asus-rog-strix-g16-2025-gaming-laptop-4', 'Brand: ASUS\r\nModel Name: ROG Strix G16\r\nScreen Size: 16 inches\r\nColor: Eclipse Gray\r\nHard Disk Size: 1 TB\r\nCPU Model: Core i7\r\nRAM Memory Installed Size: 16 GB\r\nOperating System: Windows 11 Home\r\nSpecial Feature: ROG Nebula Display, Tri-Fan Technology\r\nGraphics Card Description: Dedicated', 'products/43fyjwYtB7NP3ZQM8JxmuDnvdSGNZn9w0YwrQfTc.jpg', 3, 7, 'SKU-1001', 1800.00, 1573.98, 17, 'active', '2026-09-21 00:42:16', '2026-09-21 00:52:25'),
(5, 'HP OmniBook 3 16 inch Laptop PC', 'hp-omnibook-3-16-inch-laptop-pc-5', 'Brand: HP\r\nModel Name: HP OmniBook 3 Laptop 16-by0199nr\r\nScreen Size: 16 inches\r\nColor: Mica Silver\r\nHard Disk Size: 256 GB\r\nCPU Model: AMD Ryzen 3 7320U\r\nRAM Memory Installed Size: 8 GB\r\nOperating System: Windows 11 Home\r\nSpecial Feature: 16-inch 1920 x 1200 touch IPS display, micro-edge, anti-glare, 300 nits, 62.5% sRGB, 2 USB Type-A, 2 USB Type-C, HDMI 2.1, headphone/microphone combo, USB Power Delivery, DisplayPort 1.4, HP Sleep and Charge\r\nGraphics Card Description: Integrated AMD Radeon Graphics', 'products/le5Z879RiFjlwx8TylJCX3h38rdSV0JbMYUZOc9q.jpg', 3, 2, 'SKU-2001', 600.00, 545.00, 15, 'active', '2026-09-21 00:45:17', '2026-09-21 00:45:24'),
(6, 'Apple 16-Inch MacBook Pro Laptop Early 2026', 'apple-16-inch-macbook-pro-laptop-early-2026-6', 'Brand: Apple\r\nModel Name: MacBook Pro 16\"\r\nScreen Size: 16.2 inches\r\nColor: Silver\r\nHard Disk Size: 2 TB\r\nCPU Model: Apple M5 Max\r\nRAM Memory Installed Size: 128 GB\r\nOperating System: macOS\r\nSpecial Feature: 128GB Unified Memory, 18-Core CPU, 2TB SSD Storage, 40-Core GPU, Apple M5 Max Chip\r\nGraphics Card Description: Integrated', 'products/tnXpgn0jrh7XiStb5wYtOROLpbqfnAhC4inlQuvz.jpg', 3, 5, 'SKU-3001', 2200.00, 1899.00, 8, 'active', '2026-09-21 00:48:39', '2026-09-21 00:55:36'),
(7, 'AULA S99 Gaming Keyboard, Wireless Green Creamy', 'aula-s99-gaming-keyboard-wireless-green-creamy-7', 'AULA gaming keyboard with a contemporary Green & Beige design, membrane keyboard technology, and RGB backlighting. It supports Bluetooth, USB-A, USB-C, and Wi-Fi connectivity and is compatible with Gaming Consoles, Laptops, PCs, Smartphones, and Tablets. Designed for gaming, business, education, everyday use, multimedia, personal use, photo editing, programming, student use, video editing, and working. Features include Backlit, Ergonomic, Programmable Keys, Rechargeable functionality, and Round Key design. Product dimensions: 17.4\"L x 7.28\"W x 2\"H.', 'products/IxxN4nqicg1150DTPyHllv3YP1IYviBDVegWf9ta.jpg', 5, 8, 'SKU-5001', 60.00, 45.00, 2, 'active', '2026-09-21 01:03:05', '2026-09-21 01:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_primary` tinyint(1) NOT NULL DEFAULT '0',
  `sort_order` int UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `path`, `is_primary`, `sort_order`, `created_at`, `updated_at`) VALUES
(9, 4, 'products/lcy2wODgvsi90UPJgPEJgRXZ56XGWrHGPBLg9Uex.jpg', 0, 1, '2026-09-21 00:42:16', '2026-09-21 00:42:33'),
(10, 4, 'products/mQuJEcqKoU4Cs7qbnDKhsRhG5LdU1xQZWFQZUsYW.jpg', 0, 2, '2026-09-21 00:42:16', '2026-09-21 00:42:33'),
(11, 4, 'products/fBovB5KPI9juRMCCdKUcRhA0gdvUeV24z0DPecPP.jpg', 0, 3, '2026-09-21 00:42:16', '2026-09-21 00:42:33'),
(12, 4, 'products/MEtxkWt7rKoy0iHnqpyppKWXua7WquAPapq98hiz.jpg', 0, 4, '2026-09-21 00:42:16', '2026-09-21 00:42:33'),
(13, 4, 'products/43fyjwYtB7NP3ZQM8JxmuDnvdSGNZn9w0YwrQfTc.jpg', 1, 5, '2026-09-21 00:42:16', '2026-09-21 00:42:33'),
(14, 5, 'products/C6h6xU3xuwmrdBJwhUKou0hHBi6zlgHNGSkgU8Nt.jpg', 0, 1, '2026-09-21 00:45:17', '2026-09-21 00:45:24'),
(15, 5, 'products/314Wk5mWPBRPpAFY4DAGJYFks4iW0CuCVtYJpAan.jpg', 0, 2, '2026-09-21 00:45:17', '2026-09-21 00:45:24'),
(16, 5, 'products/7fOv09XgVbg9LLUq90Kj0AvkQmeQMdd43HwnrYm8.jpg', 0, 3, '2026-09-21 00:45:17', '2026-09-21 00:45:24'),
(17, 5, 'products/3A7DDtf2vfAWlz38OjJJUKPlVEiaPDdWVqDhJGAM.jpg', 0, 4, '2026-09-21 00:45:17', '2026-09-21 00:45:24'),
(18, 5, 'products/le5Z879RiFjlwx8TylJCX3h38rdSV0JbMYUZOc9q.jpg', 1, 5, '2026-09-21 00:45:17', '2026-09-21 00:45:24'),
(19, 6, 'products/3jvHX4cbJdNlpGDOMOH4EymX9tgmQSReGMmQXV2E.jpg', 0, 1, '2026-09-21 00:48:39', '2026-09-21 00:48:49'),
(20, 6, 'products/9AFHBUisLp6uuDVsWb9bT2K6ve5zkGCyX3bMnlT3.jpg', 0, 2, '2026-09-21 00:48:39', '2026-09-21 00:48:49'),
(21, 6, 'products/pjZUre5PexJrMPbl4BHwfhrQx0PGf12u31prEZoV.jpg', 0, 3, '2026-09-21 00:48:39', '2026-09-21 00:48:49'),
(22, 6, 'products/tnXpgn0jrh7XiStb5wYtOROLpbqfnAhC4inlQuvz.jpg', 1, 4, '2026-09-21 00:48:39', '2026-09-21 00:48:49'),
(23, 7, 'products/l83nS2Ugn6kVRDjGPOJsx5jCDgZ9d53PFUgqs0on.jpg', 0, 1, '2026-09-21 01:04:10', '2026-09-21 01:04:18'),
(24, 7, 'products/xi6JjxG02DDsVGvNk4ZDdyWAkjDQFOst9aT9PtRt.jpg', 0, 2, '2026-09-21 01:04:10', '2026-09-21 01:04:18'),
(25, 7, 'products/BqU2OoXILuQB1FJuXoIRihjVolZWEcmqJRpbDUwo.jpg', 0, 3, '2026-09-21 01:04:10', '2026-09-21 01:04:18'),
(26, 7, 'products/IxxN4nqicg1150DTPyHllv3YP1IYviBDVegWf9ta.jpg', 1, 4, '2026-09-21 01:04:10', '2026-09-21 01:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_skus`
--

CREATE TABLE `product_skus` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int UNSIGNED NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_skus`
--

INSERT INTO `product_skus` (`id`, `product_id`, `sku`, `price`, `stock`, `image`, `status`, `created_at`, `updated_at`) VALUES
(4, 4, 'SKU-1001', 1573.98, 20, NULL, 'active', '2026-09-21 00:42:16', '2026-09-21 00:42:16'),
(5, 5, 'SKU-2001', 545.00, 15, NULL, 'active', '2026-09-21 00:45:17', '2026-09-21 00:45:17'),
(6, 6, 'SKU-3001', 1899.00, 10, NULL, 'active', '2026-09-21 00:48:39', '2026-09-21 00:48:39'),
(7, 7, 'SKU-5001', 45.00, 2, NULL, 'active', '2026-09-21 01:03:05', '2026-09-21 01:03:05');

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
('DQSntbklIVi7jphQwCLBSKWCFR5i500I2Bo9FL25', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJPRDhoZHpyU0Vsa0t2UkZkSXhtY2RLM20xajUxWWFMSXhOaWtDenllIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvZWNvbW1lcmNlLnRlc3RcL3Byb2R1Y3RzIiwicm91dGUiOiJwcm9kdWN0cy5pbmRleCJ9LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MX0=', 1789974258);

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
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `phone`, `address`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@example.com', NULL, '$2y$12$99RZi6skSt0ko2VBlEE/Bul9UBHgXAfQgeCu0dS8N3Q1DMBrDiUkW', 'admin', '01700000000', 'Dhaka, Bangladesh', 'users/bCBYHg9nzLf57IqNxKhukBHMdcByHMfngQV3Rg1w.png', NULL, '2026-09-20 23:37:59', '2026-09-20 23:59:53'),
(2, 'Mustafa Mursalin Khan', 'mmmursalinkhan@gmail.com', NULL, '$2y$12$uBVCQah9.9huSBdlzVVzWuktm0d2WGqvpJETi0ZbyYfVMoqqZacPO', 'customer', '01800000000', 'Dhaka, Bangladesh', 'users/FoDKoNKuJzW6sRIJYyxMBQh3i9fkYOadk26RAMBB.png', NULL, '2026-09-20 23:38:00', '2026-09-21 00:05:28'),
(4, 'Rion', 'rion@example.com', NULL, '$2y$12$ABEqvs60BlTU8ZoL5JGQReJjiwMhAPeh9InvzBFmmL6v8ReKo25s2', 'customer', '01700007777', 'Palton, Dhaka', 'users/pbdmFinnZhFrWi0EPfyY4gSRAvBaFJ1noTEFfNCb.jpg', NULL, '2026-09-21 00:53:34', '2026-09-21 00:53:47');

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
  ADD KEY `orders_user_id_foreign` (`user_id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_skus`
--
ALTER TABLE `product_skus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
