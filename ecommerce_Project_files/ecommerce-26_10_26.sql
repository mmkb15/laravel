-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 16, 2026 at 05:09 PM
-- Server version: 8.0.46
-- PHP Version: 8.4.24

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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
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
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('mursalin-ecommerce-cache-5c785c036466adea360111aa28563bfd556b5fba', 'i:1;', 1792169323),
('mursalin-ecommerce-cache-5c785c036466adea360111aa28563bfd556b5fba:timer', 'i:1792169323;', 1792169323),
('mursalin-ecommerce-cache-boost:mcp:database-schema:mysql::1:0:0:0', 'a:2:{s:6:\"engine\";s:5:\"mysql\";s:6:\"tables\";a:16:{s:6:\"brands\";a:8:{s:2:\"id\";s:15:\"bigint unsigned\";s:4:\"name\";s:12:\"varchar(255)\";s:4:\"slug\";s:12:\"varchar(255)\";s:5:\"image\";s:12:\"varchar(255)\";s:11:\"description\";s:4:\"text\";s:6:\"status\";s:12:\"varchar(255)\";s:10:\"created_at\";s:9:\"timestamp\";s:10:\"updated_at\";s:9:\"timestamp\";}s:5:\"cache\";a:3:{s:3:\"key\";s:12:\"varchar(255)\";s:5:\"value\";s:10:\"mediumtext\";s:10:\"expiration\";s:6:\"bigint\";}s:11:\"cache_locks\";a:3:{s:3:\"key\";s:12:\"varchar(255)\";s:5:\"owner\";s:12:\"varchar(255)\";s:10:\"expiration\";s:6:\"bigint\";}s:10:\"categories\";a:9:{s:2:\"id\";s:15:\"bigint unsigned\";s:9:\"parent_id\";s:15:\"bigint unsigned\";s:4:\"name\";s:12:\"varchar(255)\";s:4:\"slug\";s:12:\"varchar(255)\";s:5:\"image\";s:12:\"varchar(255)\";s:11:\"description\";s:4:\"text\";s:6:\"status\";s:12:\"varchar(255)\";s:10:\"created_at\";s:9:\"timestamp\";s:10:\"updated_at\";s:9:\"timestamp\";}s:11:\"failed_jobs\";a:7:{s:2:\"id\";s:15:\"bigint unsigned\";s:4:\"uuid\";s:12:\"varchar(255)\";s:10:\"connection\";s:12:\"varchar(255)\";s:5:\"queue\";s:12:\"varchar(255)\";s:7:\"payload\";s:8:\"longtext\";s:9:\"exception\";s:8:\"longtext\";s:9:\"failed_at\";s:9:\"timestamp\";}s:11:\"job_batches\";a:10:{s:2:\"id\";s:12:\"varchar(255)\";s:4:\"name\";s:12:\"varchar(255)\";s:10:\"total_jobs\";s:3:\"int\";s:12:\"pending_jobs\";s:3:\"int\";s:11:\"failed_jobs\";s:3:\"int\";s:14:\"failed_job_ids\";s:8:\"longtext\";s:7:\"options\";s:10:\"mediumtext\";s:12:\"cancelled_at\";s:3:\"int\";s:10:\"created_at\";s:3:\"int\";s:11:\"finished_at\";s:3:\"int\";}s:4:\"jobs\";a:7:{s:2:\"id\";s:15:\"bigint unsigned\";s:5:\"queue\";s:12:\"varchar(255)\";s:7:\"payload\";s:8:\"longtext\";s:8:\"attempts\";s:17:\"smallint unsigned\";s:11:\"reserved_at\";s:12:\"int unsigned\";s:12:\"available_at\";s:12:\"int unsigned\";s:10:\"created_at\";s:12:\"int unsigned\";}s:10:\"migrations\";a:3:{s:2:\"id\";s:12:\"int unsigned\";s:9:\"migration\";s:12:\"varchar(255)\";s:5:\"batch\";s:3:\"int\";}s:11:\"order_items\";a:9:{s:2:\"id\";s:15:\"bigint unsigned\";s:8:\"order_id\";s:15:\"bigint unsigned\";s:10:\"product_id\";s:15:\"bigint unsigned\";s:12:\"product_name\";s:12:\"varchar(255)\";s:8:\"quantity\";s:12:\"int unsigned\";s:10:\"unit_price\";s:13:\"decimal(10,2)\";s:8:\"subtotal\";s:13:\"decimal(10,2)\";s:10:\"created_at\";s:9:\"timestamp\";s:10:\"updated_at\";s:9:\"timestamp\";}s:6:\"orders\";a:16:{s:2:\"id\";s:15:\"bigint unsigned\";s:12:\"order_number\";s:12:\"varchar(255)\";s:7:\"user_id\";s:15:\"bigint unsigned\";s:8:\"subtotal\";s:13:\"decimal(10,2)\";s:13:\"shipping_cost\";s:13:\"decimal(10,2)\";s:8:\"discount\";s:13:\"decimal(10,2)\";s:5:\"total\";s:13:\"decimal(10,2)\";s:14:\"payment_method\";s:12:\"varchar(255)\";s:14:\"payment_status\";s:12:\"varchar(255)\";s:6:\"status\";s:12:\"varchar(255)\";s:13:\"shipping_name\";s:12:\"varchar(255)\";s:14:\"shipping_phone\";s:12:\"varchar(255)\";s:16:\"shipping_address\";s:4:\"text\";s:5:\"notes\";s:4:\"text\";s:10:\"created_at\";s:9:\"timestamp\";s:10:\"updated_at\";s:9:\"timestamp\";}s:21:\"password_reset_tokens\";a:3:{s:5:\"email\";s:12:\"varchar(255)\";s:5:\"token\";s:12:\"varchar(255)\";s:10:\"created_at\";s:9:\"timestamp\";}s:14:\"product_images\";a:7:{s:2:\"id\";s:15:\"bigint unsigned\";s:10:\"product_id\";s:15:\"bigint unsigned\";s:4:\"path\";s:12:\"varchar(255)\";s:10:\"is_primary\";s:10:\"tinyint(1)\";s:10:\"sort_order\";s:12:\"int unsigned\";s:10:\"created_at\";s:9:\"timestamp\";s:10:\"updated_at\";s:9:\"timestamp\";}s:12:\"product_skus\";a:9:{s:2:\"id\";s:15:\"bigint unsigned\";s:10:\"product_id\";s:15:\"bigint unsigned\";s:3:\"sku\";s:12:\"varchar(255)\";s:5:\"price\";s:13:\"decimal(10,2)\";s:5:\"stock\";s:12:\"int unsigned\";s:5:\"image\";s:12:\"varchar(255)\";s:6:\"status\";s:12:\"varchar(255)\";s:10:\"created_at\";s:9:\"timestamp\";s:10:\"updated_at\";s:9:\"timestamp\";}s:8:\"products\";a:14:{s:2:\"id\";s:15:\"bigint unsigned\";s:4:\"name\";s:12:\"varchar(255)\";s:4:\"slug\";s:12:\"varchar(255)\";s:11:\"description\";s:4:\"text\";s:5:\"image\";s:12:\"varchar(255)\";s:11:\"category_id\";s:15:\"bigint unsigned\";s:8:\"brand_id\";s:15:\"bigint unsigned\";s:3:\"sku\";s:12:\"varchar(255)\";s:5:\"price\";s:13:\"decimal(10,2)\";s:10:\"sale_price\";s:13:\"decimal(10,2)\";s:5:\"stock\";s:12:\"int unsigned\";s:6:\"status\";s:12:\"varchar(255)\";s:10:\"created_at\";s:9:\"timestamp\";s:10:\"updated_at\";s:9:\"timestamp\";}s:8:\"sessions\";a:6:{s:2:\"id\";s:12:\"varchar(255)\";s:7:\"user_id\";s:15:\"bigint unsigned\";s:10:\"ip_address\";s:11:\"varchar(45)\";s:10:\"user_agent\";s:4:\"text\";s:7:\"payload\";s:8:\"longtext\";s:13:\"last_activity\";s:3:\"int\";}s:5:\"users\";a:12:{s:2:\"id\";s:15:\"bigint unsigned\";s:4:\"name\";s:12:\"varchar(255)\";s:5:\"email\";s:12:\"varchar(255)\";s:17:\"email_verified_at\";s:9:\"timestamp\";s:8:\"password\";s:12:\"varchar(255)\";s:4:\"role\";s:12:\"varchar(255)\";s:5:\"phone\";s:12:\"varchar(255)\";s:7:\"address\";s:4:\"text\";s:5:\"image\";s:12:\"varchar(255)\";s:14:\"remember_token\";s:12:\"varchar(100)\";s:10:\"created_at\";s:9:\"timestamp\";s:10:\"updated_at\";s:9:\"timestamp\";}}}', 1791974308),
('mursalin-ecommerce-cache-boost:mcp:database-schema:mysql:orders:0:0:0:1', 'a:2:{s:6:\"engine\";s:5:\"mysql\";s:6:\"tables\";a:1:{s:6:\"orders\";a:5:{s:7:\"columns\";a:17:{s:2:\"id\";a:4:{s:4:\"type\";s:15:\"bigint unsigned\";s:8:\"nullable\";b:0;s:7:\"default\";N;s:14:\"auto_increment\";b:1;}s:12:\"order_number\";a:4:{s:4:\"type\";s:12:\"varchar(255)\";s:8:\"nullable\";b:0;s:7:\"default\";N;s:14:\"auto_increment\";b:0;}s:7:\"user_id\";a:4:{s:4:\"type\";s:15:\"bigint unsigned\";s:8:\"nullable\";b:1;s:7:\"default\";N;s:14:\"auto_increment\";b:0;}s:8:\"subtotal\";a:4:{s:4:\"type\";s:13:\"decimal(10,2)\";s:8:\"nullable\";b:0;s:7:\"default\";s:4:\"0.00\";s:14:\"auto_increment\";b:0;}s:13:\"shipping_cost\";a:4:{s:4:\"type\";s:13:\"decimal(10,2)\";s:8:\"nullable\";b:0;s:7:\"default\";s:4:\"0.00\";s:14:\"auto_increment\";b:0;}s:8:\"discount\";a:4:{s:4:\"type\";s:13:\"decimal(10,2)\";s:8:\"nullable\";b:0;s:7:\"default\";s:4:\"0.00\";s:14:\"auto_increment\";b:0;}s:5:\"total\";a:4:{s:4:\"type\";s:13:\"decimal(10,2)\";s:8:\"nullable\";b:0;s:7:\"default\";s:4:\"0.00\";s:14:\"auto_increment\";b:0;}s:14:\"payment_method\";a:4:{s:4:\"type\";s:12:\"varchar(255)\";s:8:\"nullable\";b:0;s:7:\"default\";s:3:\"cod\";s:14:\"auto_increment\";b:0;}s:14:\"payment_status\";a:4:{s:4:\"type\";s:12:\"varchar(255)\";s:8:\"nullable\";b:0;s:7:\"default\";s:7:\"pending\";s:14:\"auto_increment\";b:0;}s:6:\"status\";a:4:{s:4:\"type\";s:12:\"varchar(255)\";s:8:\"nullable\";b:0;s:7:\"default\";s:7:\"pending\";s:14:\"auto_increment\";b:0;}s:13:\"shipping_name\";a:4:{s:4:\"type\";s:12:\"varchar(255)\";s:8:\"nullable\";b:0;s:7:\"default\";N;s:14:\"auto_increment\";b:0;}s:14:\"shipping_phone\";a:4:{s:4:\"type\";s:12:\"varchar(255)\";s:8:\"nullable\";b:0;s:7:\"default\";N;s:14:\"auto_increment\";b:0;}s:14:\"customer_email\";a:4:{s:4:\"type\";s:12:\"varchar(255)\";s:8:\"nullable\";b:1;s:7:\"default\";N;s:14:\"auto_increment\";b:0;}s:16:\"shipping_address\";a:4:{s:4:\"type\";s:4:\"text\";s:8:\"nullable\";b:0;s:7:\"default\";N;s:14:\"auto_increment\";b:0;}s:5:\"notes\";a:4:{s:4:\"type\";s:4:\"text\";s:8:\"nullable\";b:1;s:7:\"default\";N;s:14:\"auto_increment\";b:0;}s:10:\"created_at\";a:4:{s:4:\"type\";s:9:\"timestamp\";s:8:\"nullable\";b:1;s:7:\"default\";N;s:14:\"auto_increment\";b:0;}s:10:\"updated_at\";a:4:{s:4:\"type\";s:9:\"timestamp\";s:8:\"nullable\";b:1;s:7:\"default\";N;s:14:\"auto_increment\";b:0;}}s:7:\"indexes\";a:3:{s:26:\"orders_order_number_unique\";a:4:{s:7:\"columns\";a:1:{i:0;s:12:\"order_number\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:0;}s:22:\"orders_user_id_foreign\";a:4:{s:7:\"columns\";a:1:{i:0;s:7:\"user_id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:0;s:10:\"is_primary\";b:0;}s:7:\"primary\";a:4:{s:7:\"columns\";a:1:{i:0;s:2:\"id\";}s:4:\"type\";s:5:\"btree\";s:9:\"is_unique\";b:1;s:10:\"is_primary\";b:1;}}s:12:\"foreign_keys\";a:1:{i:0;a:7:{s:4:\"name\";s:22:\"orders_user_id_foreign\";s:7:\"columns\";a:1:{i:0;s:7:\"user_id\";}s:14:\"foreign_schema\";s:9:\"ecommerce\";s:13:\"foreign_table\";s:5:\"users\";s:15:\"foreign_columns\";a:1:{i:0;s:2:\"id\";}s:9:\"on_update\";s:9:\"no action\";s:9:\"on_delete\";s:8:\"set null\";}}s:8:\"triggers\";a:0:{}s:17:\"check_constraints\";a:0:{}}}}', 1791986058);
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('mursalin-ecommerce-cache-roster:project:v3:7e2f115178990061a73c4ee1220d6f8d', 'O:26:\"Laravel\\Roster\\ProjectScan\":8:{s:8:\"basePath\";s:48:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\\";s:3:\"php\";O:35:\"Laravel\\Roster\\Ecosystems\\Ecosystem\":2:{s:9:\"\0*\0byName\";a:133:{s:10:\"brick/math\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:10:\"brick/math\";s:10:\"\0*\0version\";s:6:\"0.18.0\";s:9:\"\0*\0source\";E:43:\"Laravel\\Roster\\Enums\\PackageSource:Composer\";s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:65:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\brick\\math\";}s:31:\"carbonphp/carbon-doctrine-types\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:31:\"carbonphp/carbon-doctrine-types\";s:10:\"\0*\0version\";s:5:\"3.2.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:86:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\carbonphp\\carbon-doctrine-types\";}s:23:\"dflydev/dot-access-data\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:23:\"dflydev/dot-access-data\";s:10:\"\0*\0version\";s:5:\"3.0.3\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:78:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\dflydev\\dot-access-data\";}s:18:\"doctrine/inflector\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:18:\"doctrine/inflector\";s:10:\"\0*\0version\";s:5:\"2.1.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:73:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\doctrine\\inflector\";}s:14:\"doctrine/lexer\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:14:\"doctrine/lexer\";s:10:\"\0*\0version\";s:5:\"3.0.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:69:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\doctrine\\lexer\";}s:29:\"dragonmantank/cron-expression\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:29:\"dragonmantank/cron-expression\";s:10:\"\0*\0version\";s:5:\"3.6.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:84:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\dragonmantank\\cron-expression\";}s:23:\"egulias/email-validator\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:23:\"egulias/email-validator\";s:10:\"\0*\0version\";s:5:\"4.0.4\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:78:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\egulias\\email-validator\";}s:18:\"fruitcake/php-cors\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:18:\"fruitcake/php-cors\";s:10:\"\0*\0version\";s:5:\"1.4.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:73:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\fruitcake\\php-cors\";}s:27:\"graham-campbell/result-type\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:27:\"graham-campbell/result-type\";s:10:\"\0*\0version\";s:5:\"1.2.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:82:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\graham-campbell\\result-type\";}s:17:\"guzzlehttp/guzzle\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:17:\"guzzlehttp/guzzle\";s:10:\"\0*\0version\";s:5:\"8.2.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:72:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\guzzlehttp\\guzzle\";}s:19:\"guzzlehttp/promises\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:19:\"guzzlehttp/promises\";s:10:\"\0*\0version\";s:5:\"3.0.2\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:74:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\guzzlehttp\\promises\";}s:15:\"guzzlehttp/psr7\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:15:\"guzzlehttp/psr7\";s:10:\"\0*\0version\";s:5:\"3.1.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:70:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\guzzlehttp\\psr7\";}s:23:\"guzzlehttp/uri-template\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:23:\"guzzlehttp/uri-template\";s:10:\"\0*\0version\";s:5:\"2.0.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:78:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\guzzlehttp\\uri-template\";}s:17:\"laravel/framework\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:17:\"laravel/framework\";s:10:\"\0*\0version\";s:7:\"13.31.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:6:\"^13.17\";s:7:\"\0*\0path\";s:72:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\laravel\\framework\";}s:15:\"laravel/prompts\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:15:\"laravel/prompts\";s:10:\"\0*\0version\";s:6:\"0.3.24\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:70:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\laravel\\prompts\";}s:15:\"laravel/sanctum\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:15:\"laravel/sanctum\";s:10:\"\0*\0version\";s:5:\"4.3.3\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:4:\"^4.0\";s:7:\"\0*\0path\";s:70:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\laravel\\sanctum\";}s:28:\"laravel/serializable-closure\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:28:\"laravel/serializable-closure\";s:10:\"\0*\0version\";s:6:\"2.0.16\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:83:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\laravel\\serializable-closure\";}s:14:\"laravel/tinker\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:14:\"laravel/tinker\";s:10:\"\0*\0version\";s:5:\"3.0.2\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:4:\"^3.0\";s:7:\"\0*\0path\";s:69:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\laravel\\tinker\";}s:17:\"league/commonmark\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:17:\"league/commonmark\";s:10:\"\0*\0version\";s:6:\"2.10.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:72:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\league\\commonmark\";}s:13:\"league/config\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:13:\"league/config\";s:10:\"\0*\0version\";s:5:\"1.2.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:68:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\league\\config\";}s:16:\"league/flysystem\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:16:\"league/flysystem\";s:10:\"\0*\0version\";s:6:\"3.36.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:71:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\league\\flysystem\";}s:22:\"league/flysystem-local\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:22:\"league/flysystem-local\";s:10:\"\0*\0version\";s:6:\"3.35.3\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:77:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\league\\flysystem-local\";}s:26:\"league/mime-type-detection\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:26:\"league/mime-type-detection\";s:10:\"\0*\0version\";s:6:\"1.17.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:81:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\league\\mime-type-detection\";}s:10:\"league/uri\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:10:\"league/uri\";s:10:\"\0*\0version\";s:5:\"7.8.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:65:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\league\\uri\";}s:21:\"league/uri-interfaces\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:21:\"league/uri-interfaces\";s:10:\"\0*\0version\";s:5:\"7.8.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:76:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\league\\uri-interfaces\";}s:15:\"monolog/monolog\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:15:\"monolog/monolog\";s:10:\"\0*\0version\";s:6:\"3.12.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:70:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\monolog\\monolog\";}s:13:\"nesbot/carbon\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:13:\"nesbot/carbon\";s:10:\"\0*\0version\";s:6:\"3.13.2\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:68:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\nesbot\\carbon\";}s:12:\"nette/schema\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:12:\"nette/schema\";s:10:\"\0*\0version\";s:5:\"1.3.6\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:67:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\nette\\schema\";}s:11:\"nette/utils\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:11:\"nette/utils\";s:10:\"\0*\0version\";s:5:\"4.1.5\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:66:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\nette\\utils\";}s:16:\"nikic/php-parser\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:16:\"nikic/php-parser\";s:10:\"\0*\0version\";s:5:\"5.8.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:71:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\nikic\\php-parser\";}s:19:\"nunomaduro/termwind\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:19:\"nunomaduro/termwind\";s:10:\"\0*\0version\";s:5:\"2.4.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:74:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\nunomaduro\\termwind\";}s:19:\"phpoption/phpoption\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:19:\"phpoption/phpoption\";s:10:\"\0*\0version\";s:6:\"1.10.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:74:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\phpoption\\phpoption\";}s:9:\"psr/clock\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:9:\"psr/clock\";s:10:\"\0*\0version\";s:5:\"1.0.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:64:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\psr\\clock\";}s:13:\"psr/container\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:13:\"psr/container\";s:10:\"\0*\0version\";s:5:\"2.0.2\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:68:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\psr\\container\";}s:20:\"psr/event-dispatcher\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:20:\"psr/event-dispatcher\";s:10:\"\0*\0version\";s:5:\"1.0.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:75:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\psr\\event-dispatcher\";}s:15:\"psr/http-client\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:15:\"psr/http-client\";s:10:\"\0*\0version\";s:5:\"1.0.3\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:70:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\psr\\http-client\";}s:16:\"psr/http-factory\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:16:\"psr/http-factory\";s:10:\"\0*\0version\";s:5:\"1.1.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:71:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\psr\\http-factory\";}s:16:\"psr/http-message\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:16:\"psr/http-message\";s:10:\"\0*\0version\";s:3:\"2.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:71:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\psr\\http-message\";}s:7:\"psr/log\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:7:\"psr/log\";s:10:\"\0*\0version\";s:5:\"3.0.2\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:62:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\psr\\log\";}s:16:\"psr/simple-cache\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:16:\"psr/simple-cache\";s:10:\"\0*\0version\";s:5:\"3.0.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:71:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\psr\\simple-cache\";}s:9:\"psy/psysh\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:9:\"psy/psysh\";s:10:\"\0*\0version\";s:7:\"0.12.24\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:64:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\psy\\psysh\";}s:17:\"ramsey/collection\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:17:\"ramsey/collection\";s:10:\"\0*\0version\";s:5:\"2.1.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:72:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\ramsey\\collection\";}s:11:\"ramsey/uuid\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:11:\"ramsey/uuid\";s:10:\"\0*\0version\";s:5:\"4.9.3\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:66:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\ramsey\\uuid\";}s:13:\"symfony/clock\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:13:\"symfony/clock\";s:10:\"\0*\0version\";s:5:\"8.1.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:68:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\clock\";}s:15:\"symfony/console\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:15:\"symfony/console\";s:10:\"\0*\0version\";s:5:\"8.1.6\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:70:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\console\";}s:20:\"symfony/css-selector\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:20:\"symfony/css-selector\";s:10:\"\0*\0version\";s:5:\"8.1.6\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:75:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\css-selector\";}s:29:\"symfony/deprecation-contracts\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:29:\"symfony/deprecation-contracts\";s:10:\"\0*\0version\";s:5:\"3.7.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:84:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\deprecation-contracts\";}s:21:\"symfony/error-handler\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:21:\"symfony/error-handler\";s:10:\"\0*\0version\";s:5:\"8.1.5\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:76:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\error-handler\";}s:24:\"symfony/event-dispatcher\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:24:\"symfony/event-dispatcher\";s:10:\"\0*\0version\";s:5:\"8.1.5\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:79:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\event-dispatcher\";}s:34:\"symfony/event-dispatcher-contracts\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:34:\"symfony/event-dispatcher-contracts\";s:10:\"\0*\0version\";s:5:\"3.7.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:89:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\event-dispatcher-contracts\";}s:14:\"symfony/finder\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:14:\"symfony/finder\";s:10:\"\0*\0version\";s:5:\"8.1.5\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:69:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\finder\";}s:23:\"symfony/http-foundation\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:23:\"symfony/http-foundation\";s:10:\"\0*\0version\";s:5:\"8.1.6\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:78:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\http-foundation\";}s:19:\"symfony/http-kernel\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:19:\"symfony/http-kernel\";s:10:\"\0*\0version\";s:5:\"8.1.6\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:74:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\http-kernel\";}s:14:\"symfony/mailer\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:14:\"symfony/mailer\";s:10:\"\0*\0version\";s:5:\"8.1.5\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:69:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\mailer\";}s:12:\"symfony/mime\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:12:\"symfony/mime\";s:10:\"\0*\0version\";s:5:\"8.1.6\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:67:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\mime\";}s:22:\"symfony/polyfill-ctype\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:22:\"symfony/polyfill-ctype\";s:10:\"\0*\0version\";s:6:\"1.37.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:77:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\polyfill-ctype\";}s:30:\"symfony/polyfill-intl-grapheme\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:30:\"symfony/polyfill-intl-grapheme\";s:10:\"\0*\0version\";s:6:\"1.41.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:85:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\polyfill-intl-grapheme\";}s:25:\"symfony/polyfill-intl-idn\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:25:\"symfony/polyfill-intl-idn\";s:10:\"\0*\0version\";s:6:\"1.42.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:80:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\polyfill-intl-idn\";}s:32:\"symfony/polyfill-intl-normalizer\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:32:\"symfony/polyfill-intl-normalizer\";s:10:\"\0*\0version\";s:6:\"1.42.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:87:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\polyfill-intl-normalizer\";}s:25:\"symfony/polyfill-mbstring\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:25:\"symfony/polyfill-mbstring\";s:10:\"\0*\0version\";s:6:\"1.38.2\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:80:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\polyfill-mbstring\";}s:22:\"symfony/polyfill-php80\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:22:\"symfony/polyfill-php80\";s:10:\"\0*\0version\";s:6:\"1.37.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:77:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\polyfill-php80\";}s:22:\"symfony/polyfill-php82\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:22:\"symfony/polyfill-php82\";s:10:\"\0*\0version\";s:6:\"1.38.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:77:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\polyfill-php82\";}s:22:\"symfony/polyfill-php84\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:22:\"symfony/polyfill-php84\";s:10:\"\0*\0version\";s:6:\"1.38.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:77:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\polyfill-php84\";}s:22:\"symfony/polyfill-php85\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:22:\"symfony/polyfill-php85\";s:10:\"\0*\0version\";s:6:\"1.41.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:77:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\polyfill-php85\";}s:22:\"symfony/polyfill-php86\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:22:\"symfony/polyfill-php86\";s:10:\"\0*\0version\";s:6:\"1.41.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:77:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\polyfill-php86\";}s:21:\"symfony/polyfill-uuid\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:21:\"symfony/polyfill-uuid\";s:10:\"\0*\0version\";s:6:\"1.37.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:76:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\polyfill-uuid\";}s:15:\"symfony/process\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:15:\"symfony/process\";s:10:\"\0*\0version\";s:5:\"8.1.6\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:70:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\process\";}s:15:\"symfony/routing\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:15:\"symfony/routing\";s:10:\"\0*\0version\";s:5:\"8.1.6\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:70:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\routing\";}s:25:\"symfony/service-contracts\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:25:\"symfony/service-contracts\";s:10:\"\0*\0version\";s:5:\"3.7.3\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:80:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\service-contracts\";}s:14:\"symfony/string\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:14:\"symfony/string\";s:10:\"\0*\0version\";s:5:\"8.1.2\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:69:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\string\";}s:19:\"symfony/translation\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:19:\"symfony/translation\";s:10:\"\0*\0version\";s:5:\"8.1.5\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:74:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\translation\";}s:29:\"symfony/translation-contracts\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:29:\"symfony/translation-contracts\";s:10:\"\0*\0version\";s:5:\"3.7.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:84:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\translation-contracts\";}s:11:\"symfony/uid\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:11:\"symfony/uid\";s:10:\"\0*\0version\";s:5:\"8.1.5\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:66:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\uid\";}s:18:\"symfony/var-dumper\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:18:\"symfony/var-dumper\";s:10:\"\0*\0version\";s:5:\"8.1.6\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:73:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\var-dumper\";}s:33:\"tijsverkoyen/css-to-inline-styles\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:33:\"tijsverkoyen/css-to-inline-styles\";s:10:\"\0*\0version\";s:5:\"2.4.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:88:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\tijsverkoyen\\css-to-inline-styles\";}s:16:\"vlucas/phpdotenv\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:16:\"vlucas/phpdotenv\";s:10:\"\0*\0version\";s:5:\"5.7.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:71:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\vlucas\\phpdotenv\";}s:19:\"voku/portable-ascii\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:19:\"voku/portable-ascii\";s:10:\"\0*\0version\";s:5:\"2.1.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:74:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\voku\\portable-ascii\";}s:17:\"brianium/paratest\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:17:\"brianium/paratest\";s:10:\"\0*\0version\";s:6:\"7.24.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:72:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\brianium\\paratest\";}s:15:\"composer/semver\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:15:\"composer/semver\";s:10:\"\0*\0version\";s:5:\"3.4.4\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:70:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\composer\\semver\";}s:21:\"doctrine/deprecations\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:21:\"doctrine/deprecations\";s:10:\"\0*\0version\";s:5:\"1.1.6\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:76:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\doctrine\\deprecations\";}s:14:\"fakerphp/faker\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:14:\"fakerphp/faker\";s:10:\"\0*\0version\";s:6:\"1.24.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:5:\"^1.23\";s:7:\"\0*\0path\";s:69:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\fakerphp\\faker\";}s:22:\"fidry/cpu-core-counter\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:22:\"fidry/cpu-core-counter\";s:10:\"\0*\0version\";s:5:\"1.3.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:77:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\fidry\\cpu-core-counter\";}s:11:\"filp/whoops\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:11:\"filp/whoops\";s:10:\"\0*\0version\";s:6:\"2.18.4\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:66:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\filp\\whoops\";}s:21:\"hamcrest/hamcrest-php\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:21:\"hamcrest/hamcrest-php\";s:10:\"\0*\0version\";s:5:\"3.0.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:76:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\hamcrest\\hamcrest-php\";}s:30:\"jean85/pretty-package-versions\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:30:\"jean85/pretty-package-versions\";s:10:\"\0*\0version\";s:5:\"2.1.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:85:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\jean85\\pretty-package-versions\";}s:22:\"laravel/agent-detector\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:22:\"laravel/agent-detector\";s:10:\"\0*\0version\";s:5:\"2.0.2\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:77:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\laravel\\agent-detector\";}s:13:\"laravel/boost\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:13:\"laravel/boost\";s:10:\"\0*\0version\";s:5:\"2.8.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:4:\"^2.2\";s:7:\"\0*\0path\";s:68:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\laravel\\boost\";}s:11:\"laravel/mcp\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:11:\"laravel/mcp\";s:10:\"\0*\0version\";s:5:\"0.9.5\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:66:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\laravel\\mcp\";}s:12:\"laravel/pail\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:12:\"laravel/pail\";s:10:\"\0*\0version\";s:5:\"1.2.7\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:6:\"^1.2.5\";s:7:\"\0*\0path\";s:67:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\laravel\\pail\";}s:11:\"laravel/pao\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:11:\"laravel/pao\";s:10:\"\0*\0version\";s:5:\"1.1.5\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:6:\"^1.0.6\";s:7:\"\0*\0path\";s:66:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\laravel\\pao\";}s:12:\"laravel/pint\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:12:\"laravel/pint\";s:10:\"\0*\0version\";s:6:\"1.32.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:5:\"^1.27\";s:7:\"\0*\0path\";s:67:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\laravel\\pint\";}s:14:\"laravel/roster\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:14:\"laravel/roster\";s:10:\"\0*\0version\";s:5:\"1.0.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:69:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\laravel\\roster\";}s:15:\"mockery/mockery\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:15:\"mockery/mockery\";s:10:\"\0*\0version\";s:6:\"1.6.15\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:4:\"^1.6\";s:7:\"\0*\0path\";s:70:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\mockery\\mockery\";}s:17:\"myclabs/deep-copy\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:17:\"myclabs/deep-copy\";s:10:\"\0*\0version\";s:6:\"1.14.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:72:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\myclabs\\deep-copy\";}s:20:\"nunomaduro/collision\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:20:\"nunomaduro/collision\";s:10:\"\0*\0version\";s:5:\"8.9.5\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:4:\"^8.6\";s:7:\"\0*\0path\";s:75:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\nunomaduro\\collision\";}s:12:\"pestphp/pest\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:12:\"pestphp/pest\";s:10:\"\0*\0version\";s:5:\"5.1.4\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:4:\"^5.1\";s:7:\"\0*\0path\";s:67:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\pestphp\\pest\";}s:19:\"pestphp/pest-plugin\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:19:\"pestphp/pest-plugin\";s:10:\"\0*\0version\";s:5:\"5.0.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:74:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\pestphp\\pest-plugin\";}s:24:\"pestphp/pest-plugin-arch\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:24:\"pestphp/pest-plugin-arch\";s:10:\"\0*\0version\";s:5:\"5.0.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:79:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\pestphp\\pest-plugin-arch\";}s:27:\"pestphp/pest-plugin-laravel\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:27:\"pestphp/pest-plugin-laravel\";s:10:\"\0*\0version\";s:5:\"5.0.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:4:\"^5.0\";s:7:\"\0*\0path\";s:82:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\pestphp\\pest-plugin-laravel\";}s:26:\"pestphp/pest-plugin-mutate\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:26:\"pestphp/pest-plugin-mutate\";s:10:\"\0*\0version\";s:5:\"5.0.2\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:81:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\pestphp\\pest-plugin-mutate\";}s:29:\"pestphp/pest-plugin-profanity\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:29:\"pestphp/pest-plugin-profanity\";s:10:\"\0*\0version\";s:5:\"5.0.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:84:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\pestphp\\pest-plugin-profanity\";}s:16:\"phar-io/manifest\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:16:\"phar-io/manifest\";s:10:\"\0*\0version\";s:5:\"2.0.4\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:71:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\phar-io\\manifest\";}s:15:\"phar-io/version\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:15:\"phar-io/version\";s:10:\"\0*\0version\";s:5:\"3.2.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:70:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\phar-io\\version\";}s:31:\"phpdocumentor/reflection-common\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:31:\"phpdocumentor/reflection-common\";s:10:\"\0*\0version\";s:5:\"2.2.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:86:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\phpdocumentor\\reflection-common\";}s:33:\"phpdocumentor/reflection-docblock\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:33:\"phpdocumentor/reflection-docblock\";s:10:\"\0*\0version\";s:5:\"6.0.3\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:88:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\phpdocumentor\\reflection-docblock\";}s:27:\"phpdocumentor/type-resolver\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:27:\"phpdocumentor/type-resolver\";s:10:\"\0*\0version\";s:5:\"2.0.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:82:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\phpdocumentor\\type-resolver\";}s:21:\"phpstan/phpdoc-parser\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:21:\"phpstan/phpdoc-parser\";s:10:\"\0*\0version\";s:5:\"2.3.5\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:76:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\phpstan\\phpdoc-parser\";}s:25:\"phpunit/php-code-coverage\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:25:\"phpunit/php-code-coverage\";s:10:\"\0*\0version\";s:6:\"14.3.3\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:80:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\phpunit\\php-code-coverage\";}s:25:\"phpunit/php-file-iterator\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:25:\"phpunit/php-file-iterator\";s:10:\"\0*\0version\";s:5:\"7.0.2\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:80:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\phpunit\\php-file-iterator\";}s:19:\"phpunit/php-invoker\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:19:\"phpunit/php-invoker\";s:10:\"\0*\0version\";s:5:\"7.0.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:74:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\phpunit\\php-invoker\";}s:25:\"phpunit/php-text-template\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:25:\"phpunit/php-text-template\";s:10:\"\0*\0version\";s:5:\"6.0.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:80:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\phpunit\\php-text-template\";}s:17:\"phpunit/php-timer\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:17:\"phpunit/php-timer\";s:10:\"\0*\0version\";s:5:\"9.0.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:72:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\phpunit\\php-timer\";}s:15:\"phpunit/phpunit\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:15:\"phpunit/phpunit\";s:10:\"\0*\0version\";s:6:\"13.3.2\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:70:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\phpunit\\phpunit\";}s:20:\"sebastian/cli-parser\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:20:\"sebastian/cli-parser\";s:10:\"\0*\0version\";s:5:\"5.0.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:75:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\sebastian\\cli-parser\";}s:20:\"sebastian/comparator\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:20:\"sebastian/comparator\";s:10:\"\0*\0version\";s:5:\"8.4.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:75:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\sebastian\\comparator\";}s:20:\"sebastian/complexity\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:20:\"sebastian/complexity\";s:10:\"\0*\0version\";s:5:\"6.0.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:75:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\sebastian\\complexity\";}s:14:\"sebastian/diff\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:14:\"sebastian/diff\";s:10:\"\0*\0version\";s:5:\"9.0.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:69:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\sebastian\\diff\";}s:21:\"sebastian/environment\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:21:\"sebastian/environment\";s:10:\"\0*\0version\";s:5:\"9.3.2\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:76:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\sebastian\\environment\";}s:18:\"sebastian/exporter\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:18:\"sebastian/exporter\";s:10:\"\0*\0version\";s:5:\"8.2.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:73:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\sebastian\\exporter\";}s:21:\"sebastian/file-filter\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:21:\"sebastian/file-filter\";s:10:\"\0*\0version\";s:5:\"1.0.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:76:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\sebastian\\file-filter\";}s:19:\"sebastian/git-state\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:19:\"sebastian/git-state\";s:10:\"\0*\0version\";s:5:\"1.0.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:74:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\sebastian\\git-state\";}s:22:\"sebastian/global-state\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:22:\"sebastian/global-state\";s:10:\"\0*\0version\";s:5:\"9.0.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:77:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\sebastian\\global-state\";}s:23:\"sebastian/lines-of-code\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:23:\"sebastian/lines-of-code\";s:10:\"\0*\0version\";s:5:\"5.0.2\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:78:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\sebastian\\lines-of-code\";}s:27:\"sebastian/object-enumerator\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:27:\"sebastian/object-enumerator\";s:10:\"\0*\0version\";s:5:\"8.1.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:82:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\sebastian\\object-enumerator\";}s:26:\"sebastian/object-reflector\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:26:\"sebastian/object-reflector\";s:10:\"\0*\0version\";s:5:\"6.1.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:81:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\sebastian\\object-reflector\";}s:27:\"sebastian/recursion-context\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:27:\"sebastian/recursion-context\";s:10:\"\0*\0version\";s:5:\"8.0.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:82:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\sebastian\\recursion-context\";}s:14:\"sebastian/type\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:14:\"sebastian/type\";s:10:\"\0*\0version\";s:5:\"7.0.2\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:69:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\sebastian\\type\";}s:17:\"sebastian/version\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:17:\"sebastian/version\";s:10:\"\0*\0version\";s:5:\"7.0.0\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:72:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\sebastian\\version\";}s:28:\"staabm/side-effects-detector\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:28:\"staabm/side-effects-detector\";s:10:\"\0*\0version\";s:5:\"1.0.5\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:83:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\staabm\\side-effects-detector\";}s:12:\"symfony/yaml\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:12:\"symfony/yaml\";s:10:\"\0*\0version\";s:5:\"8.1.6\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:67:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\symfony\\yaml\";}s:35:\"ta-tikoma/phpunit-architecture-test\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:35:\"ta-tikoma/phpunit-architecture-test\";s:10:\"\0*\0version\";s:5:\"0.8.7\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:90:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\ta-tikoma\\phpunit-architecture-test\";}s:17:\"theseer/tokenizer\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:17:\"theseer/tokenizer\";s:10:\"\0*\0version\";s:5:\"2.0.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:72:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\theseer\\tokenizer\";}s:16:\"webmozart/assert\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:16:\"webmozart/assert\";s:10:\"\0*\0version\";s:5:\"2.4.1\";s:9:\"\0*\0source\";r:8;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:71:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\vendor\\webmozart\\assert\";}}s:11:\"\0*\0packages\";O:32:\"Laravel\\Roster\\PackageCollection\":2:{s:8:\"\0*\0items\";a:133:{i:0;r:5;i:1;r:13;i:2;r:21;i:3;r:29;i:4;r:37;i:5;r:45;i:6;r:53;i:7;r:61;i:8;r:69;i:9;r:77;i:10;r:85;i:11;r:93;i:12;r:101;i:13;r:109;i:14;r:117;i:15;r:125;i:16;r:133;i:17;r:141;i:18;r:149;i:19;r:157;i:20;r:165;i:21;r:173;i:22;r:181;i:23;r:189;i:24;r:197;i:25;r:205;i:26;r:213;i:27;r:221;i:28;r:229;i:29;r:237;i:30;r:245;i:31;r:253;i:32;r:261;i:33;r:269;i:34;r:277;i:35;r:285;i:36;r:293;i:37;r:301;i:38;r:309;i:39;r:317;i:40;r:325;i:41;r:333;i:42;r:341;i:43;r:349;i:44;r:357;i:45;r:365;i:46;r:373;i:47;r:381;i:48;r:389;i:49;r:397;i:50;r:405;i:51;r:413;i:52;r:421;i:53;r:429;i:54;r:437;i:55;r:445;i:56;r:453;i:57;r:461;i:58;r:469;i:59;r:477;i:60;r:485;i:61;r:493;i:62;r:501;i:63;r:509;i:64;r:517;i:65;r:525;i:66;r:533;i:67;r:541;i:68;r:549;i:69;r:557;i:70;r:565;i:71;r:573;i:72;r:581;i:73;r:589;i:74;r:597;i:75;r:605;i:76;r:613;i:77;r:621;i:78;r:629;i:79;r:637;i:80;r:645;i:81;r:653;i:82;r:661;i:83;r:669;i:84;r:677;i:85;r:685;i:86;r:693;i:87;r:701;i:88;r:709;i:89;r:717;i:90;r:725;i:91;r:733;i:92;r:741;i:93;r:749;i:94;r:757;i:95;r:765;i:96;r:773;i:97;r:781;i:98;r:789;i:99;r:797;i:100;r:805;i:101;r:813;i:102;r:821;i:103;r:829;i:104;r:837;i:105;r:845;i:106;r:853;i:107;r:861;i:108;r:869;i:109;r:877;i:110;r:885;i:111;r:893;i:112;r:901;i:113;r:909;i:114;r:917;i:115;r:925;i:116;r:933;i:117;r:941;i:118;r:949;i:119;r:957;i:120;r:965;i:121;r:973;i:122;r:981;i:123;r:989;i:124;r:997;i:125;r:1005;i:126;r:1013;i:127;r:1021;i:128;r:1029;i:129;r:1037;i:130;r:1045;i:131;r:1053;i:132;r:1061;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:2:\"js\";O:37:\"Laravel\\Roster\\Ecosystems\\JsEcosystem\":3:{s:9:\"\0*\0byName\";a:121:{s:24:\"@alcalzone/ansi-tokenize\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:24:\"@alcalzone/ansi-tokenize\";s:10:\"\0*\0version\";s:5:\"0.3.0\";s:9:\"\0*\0source\";E:38:\"Laravel\\Roster\\Enums\\PackageSource:Npm\";s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:85:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@alcalzone\\ansi-tokenize\";}s:18:\"@laravel/multiplex\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:18:\"@laravel/multiplex\";s:10:\"\0*\0version\";s:5:\"0.4.3\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:6:\"^0.4.1\";s:7:\"\0*\0path\";s:79:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@laravel\\multiplex\";}s:12:\"ansi-escapes\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:12:\"ansi-escapes\";s:10:\"\0*\0version\";s:5:\"7.3.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:73:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\ansi-escapes\";}s:10:\"ansi-regex\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:10:\"ansi-regex\";s:10:\"\0*\0version\";s:5:\"6.3.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:71:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\ansi-regex\";}s:11:\"ansi-styles\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:11:\"ansi-styles\";s:10:\"\0*\0version\";s:5:\"6.2.3\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:72:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\ansi-styles\";}s:9:\"auto-bind\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:9:\"auto-bind\";s:10:\"\0*\0version\";s:5:\"5.0.1\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:70:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\auto-bind\";}s:5:\"chalk\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:5:\"chalk\";s:10:\"\0*\0version\";s:5:\"5.6.2\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:66:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\chalk\";}s:9:\"cli-boxes\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:9:\"cli-boxes\";s:10:\"\0*\0version\";s:5:\"4.0.1\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:70:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\cli-boxes\";}s:10:\"cli-cursor\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:10:\"cli-cursor\";s:10:\"\0*\0version\";s:5:\"4.0.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:71:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\cli-cursor\";}s:12:\"cli-truncate\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:12:\"cli-truncate\";s:10:\"\0*\0version\";s:5:\"6.1.1\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:73:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\cli-truncate\";}s:12:\"code-excerpt\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:12:\"code-excerpt\";s:10:\"\0*\0version\";s:5:\"4.0.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:73:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\code-excerpt\";}s:9:\"commander\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:9:\"commander\";s:10:\"\0*\0version\";s:6:\"15.0.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:70:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\commander\";}s:17:\"convert-to-spaces\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:17:\"convert-to-spaces\";s:10:\"\0*\0version\";s:5:\"2.0.1\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:78:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\convert-to-spaces\";}s:11:\"environment\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:11:\"environment\";s:10:\"\0*\0version\";s:5:\"1.1.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:72:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\environment\";}s:10:\"es-toolkit\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:10:\"es-toolkit\";s:10:\"\0*\0version\";s:6:\"1.52.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:71:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\es-toolkit\";}s:20:\"escape-string-regexp\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:20:\"escape-string-regexp\";s:10:\"\0*\0version\";s:5:\"2.0.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:81:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\escape-string-regexp\";}s:20:\"get-east-asian-width\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:20:\"get-east-asian-width\";s:10:\"\0*\0version\";s:5:\"1.6.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:81:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\get-east-asian-width\";}s:13:\"indent-string\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:13:\"indent-string\";s:10:\"\0*\0version\";s:5:\"5.0.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:74:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\indent-string\";}s:3:\"ink\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:3:\"ink\";s:10:\"\0*\0version\";s:5:\"7.1.1\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:64:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\ink\";}s:23:\"is-fullwidth-code-point\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:23:\"is-fullwidth-code-point\";s:10:\"\0*\0version\";s:5:\"5.1.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:84:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\is-fullwidth-code-point\";}s:8:\"is-in-ci\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:8:\"is-in-ci\";s:10:\"\0*\0version\";s:5:\"2.0.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:69:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\is-in-ci\";}s:8:\"mimic-fn\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:8:\"mimic-fn\";s:10:\"\0*\0version\";s:5:\"2.1.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:69:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\mimic-fn\";}s:7:\"onetime\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:7:\"onetime\";s:10:\"\0*\0version\";s:5:\"5.1.2\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:68:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\onetime\";}s:13:\"patch-console\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:13:\"patch-console\";s:10:\"\0*\0version\";s:5:\"2.0.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:74:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\patch-console\";}s:5:\"react\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:5:\"react\";s:10:\"\0*\0version\";s:6:\"19.3.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:66:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\react\";}s:16:\"react-reconciler\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:16:\"react-reconciler\";s:10:\"\0*\0version\";s:6:\"0.33.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:77:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\react-reconciler\";}s:14:\"restore-cursor\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:14:\"restore-cursor\";s:10:\"\0*\0version\";s:5:\"4.0.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:75:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\restore-cursor\";}s:9:\"scheduler\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:9:\"scheduler\";s:10:\"\0*\0version\";s:6:\"0.27.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:70:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\scheduler\";}s:11:\"signal-exit\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:11:\"signal-exit\";s:10:\"\0*\0version\";s:5:\"3.0.7\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:72:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\signal-exit\";}s:10:\"slice-ansi\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:10:\"slice-ansi\";s:10:\"\0*\0version\";s:5:\"9.0.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:71:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\slice-ansi\";}s:11:\"stack-utils\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:11:\"stack-utils\";s:10:\"\0*\0version\";s:5:\"2.0.6\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:72:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\stack-utils\";}s:12:\"string-width\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:12:\"string-width\";s:10:\"\0*\0version\";s:5:\"8.2.2\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:73:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\string-width\";}s:10:\"strip-ansi\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:10:\"strip-ansi\";s:10:\"\0*\0version\";s:5:\"7.2.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:71:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\strip-ansi\";}s:10:\"tagged-tag\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:10:\"tagged-tag\";s:10:\"\0*\0version\";s:5:\"1.0.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:71:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\tagged-tag\";}s:13:\"terminal-size\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:13:\"terminal-size\";s:10:\"\0*\0version\";s:5:\"4.0.1\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:74:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\terminal-size\";}s:9:\"type-fest\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:9:\"type-fest\";s:10:\"\0*\0version\";s:5:\"5.9.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:70:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\type-fest\";}s:11:\"widest-line\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:11:\"widest-line\";s:10:\"\0*\0version\";s:5:\"6.0.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:72:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\widest-line\";}s:9:\"wrap-ansi\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:9:\"wrap-ansi\";s:10:\"\0*\0version\";s:6:\"10.0.1\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:70:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\wrap-ansi\";}s:2:\"ws\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:2:\"ws\";s:10:\"\0*\0version\";s:6:\"8.21.3\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:63:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\ws\";}s:11:\"yoga-layout\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:11:\"yoga-layout\";s:10:\"\0*\0version\";s:5:\"3.2.1\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:0;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:72:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\yoga-layout\";}s:23:\"@jridgewell/gen-mapping\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:23:\"@jridgewell/gen-mapping\";s:10:\"\0*\0version\";s:6:\"0.3.13\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:84:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@jridgewell\\gen-mapping\";}s:21:\"@jridgewell/remapping\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:21:\"@jridgewell/remapping\";s:10:\"\0*\0version\";s:5:\"2.3.5\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:82:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@jridgewell\\remapping\";}s:23:\"@jridgewell/resolve-uri\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:23:\"@jridgewell/resolve-uri\";s:10:\"\0*\0version\";s:5:\"3.1.2\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:84:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@jridgewell\\resolve-uri\";}s:27:\"@jridgewell/sourcemap-codec\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:27:\"@jridgewell/sourcemap-codec\";s:10:\"\0*\0version\";s:5:\"1.6.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:88:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@jridgewell\\sourcemap-codec\";}s:25:\"@jridgewell/trace-mapping\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:25:\"@jridgewell/trace-mapping\";s:10:\"\0*\0version\";s:6:\"0.3.31\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:86:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@jridgewell\\trace-mapping\";}s:18:\"@oxc-project/types\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:18:\"@oxc-project/types\";s:10:\"\0*\0version\";s:7:\"0.149.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:79:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@oxc-project\\types\";}s:34:\"@rolldown/binding-android-arm-eabi\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:34:\"@rolldown/binding-android-arm-eabi\";s:10:\"\0*\0version\";s:5:\"1.2.8\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:95:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@rolldown\\binding-android-arm-eabi\";}s:31:\"@rolldown/binding-android-arm64\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:31:\"@rolldown/binding-android-arm64\";s:10:\"\0*\0version\";s:5:\"1.2.8\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:92:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@rolldown\\binding-android-arm64\";}s:30:\"@rolldown/binding-darwin-arm64\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:30:\"@rolldown/binding-darwin-arm64\";s:10:\"\0*\0version\";s:5:\"1.2.8\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:91:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@rolldown\\binding-darwin-arm64\";}s:28:\"@rolldown/binding-darwin-x64\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:28:\"@rolldown/binding-darwin-x64\";s:10:\"\0*\0version\";s:5:\"1.2.8\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:89:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@rolldown\\binding-darwin-x64\";}s:29:\"@rolldown/binding-freebsd-x64\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:29:\"@rolldown/binding-freebsd-x64\";s:10:\"\0*\0version\";s:5:\"1.2.8\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:90:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@rolldown\\binding-freebsd-x64\";}s:37:\"@rolldown/binding-linux-arm-gnueabihf\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:37:\"@rolldown/binding-linux-arm-gnueabihf\";s:10:\"\0*\0version\";s:5:\"1.2.8\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:98:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@rolldown\\binding-linux-arm-gnueabihf\";}s:33:\"@rolldown/binding-linux-arm64-gnu\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:33:\"@rolldown/binding-linux-arm64-gnu\";s:10:\"\0*\0version\";s:5:\"1.2.8\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:94:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@rolldown\\binding-linux-arm64-gnu\";}s:34:\"@rolldown/binding-linux-arm64-musl\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:34:\"@rolldown/binding-linux-arm64-musl\";s:10:\"\0*\0version\";s:5:\"1.2.8\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:95:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@rolldown\\binding-linux-arm64-musl\";}s:33:\"@rolldown/binding-linux-ppc64-gnu\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:33:\"@rolldown/binding-linux-ppc64-gnu\";s:10:\"\0*\0version\";s:5:\"1.2.8\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:94:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@rolldown\\binding-linux-ppc64-gnu\";}s:33:\"@rolldown/binding-linux-s390x-gnu\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:33:\"@rolldown/binding-linux-s390x-gnu\";s:10:\"\0*\0version\";s:5:\"1.2.8\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:94:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@rolldown\\binding-linux-s390x-gnu\";}s:31:\"@rolldown/binding-linux-x64-gnu\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:31:\"@rolldown/binding-linux-x64-gnu\";s:10:\"\0*\0version\";s:5:\"1.2.8\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:92:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@rolldown\\binding-linux-x64-gnu\";}s:32:\"@rolldown/binding-linux-x64-musl\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:32:\"@rolldown/binding-linux-x64-musl\";s:10:\"\0*\0version\";s:5:\"1.2.8\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:93:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@rolldown\\binding-linux-x64-musl\";}s:35:\"@rolldown/binding-openharmony-arm64\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:35:\"@rolldown/binding-openharmony-arm64\";s:10:\"\0*\0version\";s:5:\"1.2.8\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:96:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@rolldown\\binding-openharmony-arm64\";}s:34:\"@rolldown/binding-win32-arm64-msvc\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:34:\"@rolldown/binding-win32-arm64-msvc\";s:10:\"\0*\0version\";s:5:\"1.2.8\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:95:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@rolldown\\binding-win32-arm64-msvc\";}s:32:\"@rolldown/binding-win32-x64-msvc\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:32:\"@rolldown/binding-win32-x64-msvc\";s:10:\"\0*\0version\";s:5:\"1.2.8\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:93:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@rolldown\\binding-win32-x64-msvc\";}s:21:\"@rolldown/pluginutils\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:21:\"@rolldown/pluginutils\";s:10:\"\0*\0version\";s:5:\"1.0.1\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:82:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@rolldown\\pluginutils\";}s:17:\"@tailwindcss/node\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:17:\"@tailwindcss/node\";s:10:\"\0*\0version\";s:5:\"4.3.3\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:78:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@tailwindcss\\node\";}s:18:\"@tailwindcss/oxide\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:18:\"@tailwindcss/oxide\";s:10:\"\0*\0version\";s:5:\"4.3.3\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:79:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@tailwindcss\\oxide\";}s:32:\"@tailwindcss/oxide-android-arm64\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:32:\"@tailwindcss/oxide-android-arm64\";s:10:\"\0*\0version\";s:5:\"4.3.3\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:93:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@tailwindcss\\oxide-android-arm64\";}s:31:\"@tailwindcss/oxide-darwin-arm64\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:31:\"@tailwindcss/oxide-darwin-arm64\";s:10:\"\0*\0version\";s:5:\"4.3.3\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:92:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@tailwindcss\\oxide-darwin-arm64\";}s:29:\"@tailwindcss/oxide-darwin-x64\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:29:\"@tailwindcss/oxide-darwin-x64\";s:10:\"\0*\0version\";s:5:\"4.3.3\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:90:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@tailwindcss\\oxide-darwin-x64\";}s:30:\"@tailwindcss/oxide-freebsd-x64\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:30:\"@tailwindcss/oxide-freebsd-x64\";s:10:\"\0*\0version\";s:5:\"4.3.3\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:91:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@tailwindcss\\oxide-freebsd-x64\";}s:38:\"@tailwindcss/oxide-linux-arm-gnueabihf\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:38:\"@tailwindcss/oxide-linux-arm-gnueabihf\";s:10:\"\0*\0version\";s:5:\"4.3.3\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:99:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@tailwindcss\\oxide-linux-arm-gnueabihf\";}s:34:\"@tailwindcss/oxide-linux-arm64-gnu\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:34:\"@tailwindcss/oxide-linux-arm64-gnu\";s:10:\"\0*\0version\";s:5:\"4.3.3\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:95:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@tailwindcss\\oxide-linux-arm64-gnu\";}s:35:\"@tailwindcss/oxide-linux-arm64-musl\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:35:\"@tailwindcss/oxide-linux-arm64-musl\";s:10:\"\0*\0version\";s:5:\"4.3.3\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:96:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@tailwindcss\\oxide-linux-arm64-musl\";}s:32:\"@tailwindcss/oxide-linux-x64-gnu\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:32:\"@tailwindcss/oxide-linux-x64-gnu\";s:10:\"\0*\0version\";s:5:\"4.3.3\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:93:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@tailwindcss\\oxide-linux-x64-gnu\";}s:33:\"@tailwindcss/oxide-linux-x64-musl\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:33:\"@tailwindcss/oxide-linux-x64-musl\";s:10:\"\0*\0version\";s:5:\"4.3.3\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:94:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@tailwindcss\\oxide-linux-x64-musl\";}s:30:\"@tailwindcss/oxide-wasm32-wasi\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:30:\"@tailwindcss/oxide-wasm32-wasi\";s:10:\"\0*\0version\";s:5:\"4.3.3\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:91:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@tailwindcss\\oxide-wasm32-wasi\";}s:35:\"@tailwindcss/oxide-win32-arm64-msvc\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:35:\"@tailwindcss/oxide-win32-arm64-msvc\";s:10:\"\0*\0version\";s:5:\"4.3.3\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:96:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@tailwindcss\\oxide-win32-arm64-msvc\";}s:33:\"@tailwindcss/oxide-win32-x64-msvc\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:33:\"@tailwindcss/oxide-win32-x64-msvc\";s:10:\"\0*\0version\";s:5:\"4.3.3\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:94:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@tailwindcss\\oxide-win32-x64-msvc\";}s:17:\"@tailwindcss/vite\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:17:\"@tailwindcss/vite\";s:10:\"\0*\0version\";s:5:\"4.3.3\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:6:\"^4.0.0\";s:7:\"\0*\0path\";s:78:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\@tailwindcss\\vite\";}s:5:\"cliui\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:5:\"cliui\";s:10:\"\0*\0version\";s:5:\"9.0.1\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:66:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\cliui\";}s:12:\"concurrently\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:12:\"concurrently\";s:10:\"\0*\0version\";s:6:\"10.0.5\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:7:\"^10.0.3\";s:7:\"\0*\0path\";s:73:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\concurrently\";}s:11:\"detect-libc\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:11:\"detect-libc\";s:10:\"\0*\0version\";s:5:\"2.1.2\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:72:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\detect-libc\";}s:11:\"emoji-regex\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:11:\"emoji-regex\";s:10:\"\0*\0version\";s:6:\"10.6.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:72:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\emoji-regex\";}s:16:\"enhanced-resolve\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:16:\"enhanced-resolve\";s:10:\"\0*\0version\";s:6:\"5.24.5\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:77:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\enhanced-resolve\";}s:8:\"escalade\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:8:\"escalade\";s:10:\"\0*\0version\";s:5:\"3.2.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:69:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\escalade\";}s:4:\"fdir\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:4:\"fdir\";s:10:\"\0*\0version\";s:5:\"6.5.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:65:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\fdir\";}s:8:\"fsevents\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:8:\"fsevents\";s:10:\"\0*\0version\";s:5:\"2.3.3\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:69:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\fsevents\";}s:15:\"get-caller-file\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:15:\"get-caller-file\";s:10:\"\0*\0version\";s:5:\"2.0.5\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:76:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\get-caller-file\";}s:11:\"graceful-fs\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:11:\"graceful-fs\";s:10:\"\0*\0version\";s:6:\"4.2.11\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:72:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\graceful-fs\";}s:4:\"jiti\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:4:\"jiti\";s:10:\"\0*\0version\";s:5:\"2.7.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:65:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\jiti\";}s:19:\"laravel-vite-plugin\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:19:\"laravel-vite-plugin\";s:10:\"\0*\0version\";s:5:\"3.2.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:4:\"^3.1\";s:7:\"\0*\0path\";s:80:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\laravel-vite-plugin\";}s:12:\"lightningcss\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:12:\"lightningcss\";s:10:\"\0*\0version\";s:6:\"1.32.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:73:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\lightningcss\";}s:26:\"lightningcss-android-arm64\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:26:\"lightningcss-android-arm64\";s:10:\"\0*\0version\";s:6:\"1.32.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:87:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\lightningcss-android-arm64\";}s:25:\"lightningcss-darwin-arm64\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:25:\"lightningcss-darwin-arm64\";s:10:\"\0*\0version\";s:6:\"1.32.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:86:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\lightningcss-darwin-arm64\";}s:23:\"lightningcss-darwin-x64\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:23:\"lightningcss-darwin-x64\";s:10:\"\0*\0version\";s:6:\"1.32.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:84:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\lightningcss-darwin-x64\";}s:24:\"lightningcss-freebsd-x64\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:24:\"lightningcss-freebsd-x64\";s:10:\"\0*\0version\";s:6:\"1.32.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:85:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\lightningcss-freebsd-x64\";}s:32:\"lightningcss-linux-arm-gnueabihf\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:32:\"lightningcss-linux-arm-gnueabihf\";s:10:\"\0*\0version\";s:6:\"1.32.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:93:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\lightningcss-linux-arm-gnueabihf\";}s:28:\"lightningcss-linux-arm64-gnu\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:28:\"lightningcss-linux-arm64-gnu\";s:10:\"\0*\0version\";s:6:\"1.32.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:89:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\lightningcss-linux-arm64-gnu\";}s:29:\"lightningcss-linux-arm64-musl\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:29:\"lightningcss-linux-arm64-musl\";s:10:\"\0*\0version\";s:6:\"1.32.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:90:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\lightningcss-linux-arm64-musl\";}s:26:\"lightningcss-linux-x64-gnu\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:26:\"lightningcss-linux-x64-gnu\";s:10:\"\0*\0version\";s:6:\"1.32.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:87:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\lightningcss-linux-x64-gnu\";}s:27:\"lightningcss-linux-x64-musl\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:27:\"lightningcss-linux-x64-musl\";s:10:\"\0*\0version\";s:6:\"1.32.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:88:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\lightningcss-linux-x64-musl\";}s:29:\"lightningcss-win32-arm64-msvc\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:29:\"lightningcss-win32-arm64-msvc\";s:10:\"\0*\0version\";s:6:\"1.32.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:90:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\lightningcss-win32-arm64-msvc\";}s:27:\"lightningcss-win32-x64-msvc\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:27:\"lightningcss-win32-x64-msvc\";s:10:\"\0*\0version\";s:6:\"1.32.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:88:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\lightningcss-win32-x64-msvc\";}s:12:\"magic-string\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:12:\"magic-string\";s:10:\"\0*\0version\";s:7:\"0.30.21\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:73:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\magic-string\";}s:6:\"nanoid\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:6:\"nanoid\";s:10:\"\0*\0version\";s:6:\"3.3.19\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:67:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\nanoid\";}s:10:\"picocolors\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:10:\"picocolors\";s:10:\"\0*\0version\";s:5:\"1.1.1\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:71:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\picocolors\";}s:9:\"picomatch\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:9:\"picomatch\";s:10:\"\0*\0version\";s:5:\"4.0.7\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:70:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\picomatch\";}s:7:\"postcss\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:7:\"postcss\";s:10:\"\0*\0version\";s:6:\"8.5.28\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:68:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\postcss\";}s:8:\"rolldown\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:8:\"rolldown\";s:10:\"\0*\0version\";s:5:\"1.2.8\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:69:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\rolldown\";}s:4:\"rxjs\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:4:\"rxjs\";s:10:\"\0*\0version\";s:5:\"7.8.2\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:65:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\rxjs\";}s:11:\"shell-quote\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:11:\"shell-quote\";s:10:\"\0*\0version\";s:5:\"1.9.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:72:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\shell-quote\";}s:13:\"source-map-js\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:13:\"source-map-js\";s:10:\"\0*\0version\";s:5:\"1.2.1\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:74:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\source-map-js\";}s:14:\"supports-color\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:14:\"supports-color\";s:10:\"\0*\0version\";s:6:\"10.2.2\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:75:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\supports-color\";}s:11:\"tailwindcss\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:11:\"tailwindcss\";s:10:\"\0*\0version\";s:5:\"4.3.3\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:6:\"^4.0.0\";s:7:\"\0*\0path\";s:72:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\tailwindcss\";}s:7:\"tapable\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:7:\"tapable\";s:10:\"\0*\0version\";s:5:\"2.3.3\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:68:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\tapable\";}s:10:\"tinyglobby\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:10:\"tinyglobby\";s:10:\"\0*\0version\";s:6:\"0.2.17\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:71:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\tinyglobby\";}s:9:\"tree-kill\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:9:\"tree-kill\";s:10:\"\0*\0version\";s:5:\"1.2.2\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:70:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\tree-kill\";}s:5:\"tslib\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:5:\"tslib\";s:10:\"\0*\0version\";s:5:\"2.8.1\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:66:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\tslib\";}s:4:\"vite\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:4:\"vite\";s:10:\"\0*\0version\";s:5:\"8.3.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:6:\"^8.0.0\";s:7:\"\0*\0path\";s:65:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\vite\";}s:23:\"vite-plugin-full-reload\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:23:\"vite-plugin-full-reload\";s:10:\"\0*\0version\";s:5:\"1.2.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:84:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\vite-plugin-full-reload\";}s:4:\"y18n\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:4:\"y18n\";s:10:\"\0*\0version\";s:5:\"5.0.8\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:65:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\y18n\";}s:5:\"yargs\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:5:\"yargs\";s:10:\"\0*\0version\";s:6:\"18.0.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:66:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\yargs\";}s:12:\"yargs-parser\";O:22:\"Laravel\\Roster\\Package\":7:{s:7:\"\0*\0name\";s:12:\"yargs-parser\";s:10:\"\0*\0version\";s:6:\"22.0.0\";s:9:\"\0*\0source\";r:1210;s:6:\"\0*\0dev\";b:1;s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:7:\"\0*\0path\";s:73:\"X:\\New folder 2.0\\WDPF\\WDPF70\\laravel\\ecommerce\\node_modules\\yargs-parser\";}}s:11:\"\0*\0packages\";O:32:\"Laravel\\Roster\\PackageCollection\":2:{s:8:\"\0*\0items\";a:121:{i:0;r:1207;i:1;r:1215;i:2;r:1223;i:3;r:1231;i:4;r:1239;i:5;r:1247;i:6;r:1255;i:7;r:1263;i:8;r:1271;i:9;r:1279;i:10;r:1287;i:11;r:1295;i:12;r:1303;i:13;r:1311;i:14;r:1319;i:15;r:1327;i:16;r:1335;i:17;r:1343;i:18;r:1351;i:19;r:1359;i:20;r:1367;i:21;r:1375;i:22;r:1383;i:23;r:1391;i:24;r:1399;i:25;r:1407;i:26;r:1415;i:27;r:1423;i:28;r:1431;i:29;r:1439;i:30;r:1447;i:31;r:1455;i:32;r:1463;i:33;r:1471;i:34;r:1479;i:35;r:1487;i:36;r:1495;i:37;r:1503;i:38;r:1511;i:39;r:1519;i:40;r:1527;i:41;r:1535;i:42;r:1543;i:43;r:1551;i:44;r:1559;i:45;r:1567;i:46;r:1575;i:47;r:1583;i:48;r:1591;i:49;r:1599;i:50;r:1607;i:51;r:1615;i:52;r:1623;i:53;r:1631;i:54;r:1639;i:55;r:1647;i:56;r:1655;i:57;r:1663;i:58;r:1671;i:59;r:1679;i:60;r:1687;i:61;r:1695;i:62;r:1703;i:63;r:1711;i:64;r:1719;i:65;r:1727;i:66;r:1735;i:67;r:1743;i:68;r:1751;i:69;r:1759;i:70;r:1767;i:71;r:1775;i:72;r:1783;i:73;r:1791;i:74;r:1799;i:75;r:1807;i:76;r:1815;i:77;r:1823;i:78;r:1831;i:79;r:1839;i:80;r:1847;i:81;r:1855;i:82;r:1863;i:83;r:1871;i:84;r:1879;i:85;r:1887;i:86;r:1895;i:87;r:1903;i:88;r:1911;i:89;r:1919;i:90;r:1927;i:91;r:1935;i:92;r:1943;i:93;r:1951;i:94;r:1959;i:95;r:1967;i:96;r:1975;i:97;r:1983;i:98;r:1991;i:99;r:1999;i:100;r:2007;i:101;r:2015;i:102;r:2023;i:103;r:2031;i:104;r:2039;i:105;r:2047;i:106;r:2055;i:107;r:2063;i:108;r:2071;i:109;r:2079;i:110;r:2087;i:111;r:2095;i:112;r:2103;i:113;r:2111;i:114;r:2119;i:115;r:2127;i:116;r:2135;i:117;r:2143;i:118;r:2151;i:119;r:2159;i:120;r:2167;}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:17:\"\0*\0packageManager\";E:41:\"Laravel\\Roster\\Enums\\JsPackageManager:Npm\";}s:6:\"stacks\";O:30:\"Laravel\\Roster\\Support\\EnumSet\":1:{s:8:\"\0*\0cases\";a:1:{i:0;E:30:\"Laravel\\Roster\\Enums\\Stack:Api\";}}s:21:\"browserTestFrameworks\";O:30:\"Laravel\\Roster\\Support\\EnumSet\":1:{s:8:\"\0*\0cases\";a:0:{}}s:9:\"frontends\";O:30:\"Laravel\\Roster\\Support\\EnumSet\":1:{s:8:\"\0*\0cases\";a:0:{}}s:6:\"agents\";O:30:\"Laravel\\Roster\\Support\\EnumSet\":1:{s:8:\"\0*\0cases\";a:4:{i:0;E:37:\"Laravel\\Roster\\Enums\\Agent:ClaudeCode\";i:1;E:33:\"Laravel\\Roster\\Enums\\Agent:Cursor\";i:2;E:32:\"Laravel\\Roster\\Enums\\Agent:Codex\";i:3;E:32:\"Laravel\\Roster\\Enums\\Agent:Junie\";}}s:7:\"editors\";O:30:\"Laravel\\Roster\\Support\\EnumSet\":1:{s:8:\"\0*\0cases\";a:0:{}}}', 1792006473);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
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
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guest_customers`
--

CREATE TABLE `guest_customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guest_customers`
--

INSERT INTO `guest_customers` (`id`, `name`, `email`, `phone`, `address`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Kevyn Sosa', 'bogijoz@mailinator.com', '+1 (019) 222-2555', 'Qui quibusdam quia o, Aut iure facilis ill, Commodi ad cum et vo', 'guest-customers/WapeSeqmlw9AU3ffScw5uytufgipo2r1RA9kcbMq.jpg', '2026-10-14 07:56:09', '2026-10-14 08:01:09'),
(2, 'Dominic Barnett', 'lufa@mailinator.com', '+1 (019) 999-9333', 'Temporibus dolore od Voluptate minima qui Repellendus Autem i', 'guest-customers/b3ZQIqLLKUKABVx60mV854UUNtkTk2aejkzNGGyP.jpg', '2026-10-14 07:56:09', '2026-10-14 08:07:55'),
(3, 'Dominic Barnett', 'mailto@noman.com', '+1 (101) 999-9933', 'Palton, Dhaka, Red Tower, 1216', 'guest-customers/vHu01v76kHfyUzno1iDfGPE22KrWdEuUKPOl7Jbr.jpg', '2026-10-14 07:56:09', '2026-10-14 08:41:12'),
(4, 'Jonas Lee', 'lefewiwudo@mailinator.com', '+1 (017) 000-0000', 'Nesciunt id tempor, Et sit veritatis por, Quo veniam ea sit c', NULL, '2026-10-14 08:08:28', '2026-10-14 08:08:28'),
(5, 'Kevyn Sosa', 'nomail@gmail.com', '+1 (101) 922-2255', 'Mirpur, Dhaka, mirpur, 1216', NULL, '2026-10-14 08:16:35', '2026-10-14 08:16:35'),
(6, 'Kevyn Hanson', 'kufufog@mailinator.com', '+1 (133) 732-5606', 'Provident ratione c, Laudantium aliquip, Consequat Numquam q', NULL, '2026-10-14 11:56:30', '2026-10-14 11:56:30');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
(12, '2026_09_20_140000_add_image_to_categories_and_brands_tables', 1),
(13, '2026_10_14_133722_add_customer_email_to_orders_table', 2),
(14, '2026_10_14_135119_create_guest_customers_table', 3),
(15, '2026_10_14_135120_add_guest_customer_id_to_orders_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `order_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `guest_customer_id` bigint UNSIGNED DEFAULT NULL,
  `subtotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `shipping_cost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cod',
  `payment_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `shipping_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
(17, 'ORD-20261014181023-34BX', 11, NULL, 129373.98, 0.00, 0.00, 129373.98, 'cod', 'paid', 'pending', 'Flynn Howard', '+1 (110) 199-9993', 'customer@example.com', 'Eaque sit ipsum aute, Omnis soluta fugiat, Dolor aut quia volup', NULL, '2026-10-14 12:10:23', '2026-10-14 12:12:37');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
(31, 17, 10, 'Samsung Galaxy S25 5G', 1, 112900.00, 112900.00, '2026-10-14 12:10:23', '2026-10-14 12:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `brand_id` bigint UNSIGNED DEFAULT NULL,
  `sku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sale_price` decimal(10,2) DEFAULT NULL,
  `stock` int UNSIGNED NOT NULL DEFAULT '0',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
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
(12, 'Dell 24 Plus Monitor - S2425HSM', 'dell-24-plus-monitor-s2425hsm-12', 'Dell 24 Plus Monitor - S2425HSM - 23.8-inch FHD (1920x1080) 144Hz 1ms Display, 2 x 3W Speakers, HDMI Connectivity, Height/Tilt/Pivot/Swivel Adjustability, AMD FreeSync - Ash White', 'products/QhoKigJenvbLVqaJU0y9E9hJnp6H9X0U2cNAVFeY.png', 7, 3, 'DEMO-EL-2004', 124900.00, 114900.00, 11, 'active', '2026-10-01 00:51:09', '2026-10-03 23:53:23'),
(13, 'Samsung Type-C USB Flash', 'samsung-type-c-usb-flash-13', 'Samsung Type-C USB Flash Drive 256GB, USB 3.2 Gen 1, Up to 400MB/s\r\nTransfer 4GB Files in 15 Secs, Compatible w/ USB 3.0/2.0, Waterproof, Storage for Computers & Mobile, Blue (MUF-256DA/AM)', 'products/bi3g4sB9iQaW05giyQSlFcogZhbi4Ox8v9mlhSh4-jukebox-bg-removed-1000x495.png', 8, 6, 'DEMO-EL-2005', 180.00, 99.00, 6, 'active', '2026-10-01 00:51:09', '2026-10-03 23:53:23'),
(15, 'AULA WIN68 HE MAX - Hall Effect Gaming Keyboard', 'aula-win68-he-max-hall-effect-gaming-keyboard-15', 'AULA WIN68 HE MAX - Hall Effect Gaming Keyboard with Magnetic Switch, Adjustable Actuation Fast Trigger Mode, 8KHz Polling Rate, RGB Backlit Wired Mechanical Gaming Keyboard 60 Percent Compact Design', 'products/5OAG108rR3FRATJxk6OA94ohB4wcUCINgZY2whA4.png', 5, 8, 'DEMO-EL-2007', 16900.00, 14900.00, 8, 'active', '2026-10-01 00:51:10', '2026-10-03 23:53:23'),
(16, 'SAMSUNG Galaxy Buds3 Pro', 'samsung-galaxy-buds3-pro-16', 'SAMSUNG Galaxy Buds3 Pro (2024, ANC) Water Resistant, AI Real-Time Language Interpreter, True Wireless Bluetooth 5.4 Earbuds, Hi-Fi, Noise Cancelling, Touch Control, International Model R630 (Silver)', 'products/aX47EupnS575MsegqnqCWDTAwAPKaMHAa7dQ30CK-jukebox-bg-removed-777x791.png', 17, 6, 'DEMO-EL-2008', 45900.00, 41900.00, 0, 'active', '2026-10-01 00:51:10', '2026-10-14 11:41:54'),
(17, 'Soundcore by Anker Q20i', 'soundcore-by-anker-q20i-17', 'Soundcore by Anker Q20i Hybrid Active Noise Cancelling Headphones, Black', 'products/7RBtbQXolQ7KYOXeCwKbBDL5wSmF4IclSO7EHyxX.png', 17, 15, 'WH-1001', 2500.00, 2200.00, 25, 'inactive', '2026-10-03 21:42:31', '2026-10-04 01:12:08'),
(18, 'Samsung Galaxy Watch 7', 'samsung-galaxy-watch-7-18', 'Smart Watch demo product for the admin panel.', 'products/7naWNzxHhjnfjBfW9HhaLAOxDkq3WVZtsT32mkiC.jpg', 18, 6, 'SW-1002', 4500.00, 3999.00, 1, 'active', '2026-10-03 21:42:31', '2026-10-04 01:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_primary` tinyint(1) NOT NULL DEFAULT '0',
  `sort_order` int UNSIGNED NOT NULL DEFAULT '0',
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
(72, 13, 'products/bi3g4sB9iQaW05giyQSlFcogZhbi4Ox8v9mlhSh4-jukebox-bg-removed-1000x495.png', 0, 4, '2026-10-03 22:45:42', '2026-10-04 00:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_skus`
--

CREATE TABLE `product_skus` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `sku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int UNSIGNED NOT NULL DEFAULT '0',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
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
(18, 18, 'SW-1002', 3999.00, 1, NULL, 'active', '2026-10-03 21:42:31', '2026-10-04 01:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0OH47r0K8Oz1LISbYq7JaCG9AHpcCTvC52jYNz9T', 11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 YaBrowser/26.8.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJFN1lGOXJmM1pEZk5zQU9mQlVqSVJGQzhJV2lMY1V5MENDdWlRb3REIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2Vjb21tZXJjZV8wLjMudGVzdFwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOlsic3VjY2VzcyJdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjExLCJzdWNjZXNzIjoiV2VsY29tZSBiYWNrISJ9', 1792169267),
('2MiF8emBaDKDwqwCGsThGnMmoZ1YKwITHKycKZKp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.30.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJqaWtYNFVGMnhGeW9lMlBrQXNJbE1RejVhTnZWRUdkMmpQVnptSXNVIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2Vjb21tZXJjZV8wLjEudGVzdFwvP2hlcmQ9cHJldmlldyIsInJvdXRlIjoiaG9tZSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1792169200),
('apWf7WFs53K0kRIY1lfN1mv6KAIwD26k02DcYOol', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 YaBrowser/26.8.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJVQXdrcVBEMjB5M1BMS3V6Q3EyaHpXVlhSUGQzREhWVmo4QVJlNGxSIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2Vjb21tZXJjZS50ZXN0XC9hcGlcL2F1dGhcL3VzZXIiLCJyb3V0ZSI6ImFwaS5hdXRoLnVzZXIifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1792169271),
('f69nzIedUiBJrYmvfzTRw8KGHpFHlxLWLrGPJvMD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 YaBrowser/26.8.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJLRnN0cUp2QW1lY3NEbWhNMzFsanhrYnYyYm42NlFVYlBVbzRkZzgzIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvZWNvbW1lcmNlLnRlc3RcL3JlZ2lzdGVyIiwicm91dGUiOiJyZWdpc3RlciJ9fQ==', 1792128065),
('fcVWeul36GD9JyDS2tuLcte5ooh0DdTpSTxIueHI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 YaBrowser/26.8.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJrVXpvU3RZOW5VMkhKUlZneFFQbjBySnA4ZjluTjZxOFBHRUQyQWhrIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2Vjb21tZXJjZS50ZXN0XC9sb2dpbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1792169271),
('KaLKWfZLqK04FO4rksbhh3sVZin1zO9oBbmbtTcJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.30.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJ0d2xyMUVaUGNXRUg0a2FINnB4M0Y5MG1iMUpZWGtRMWVEVjNXb0R5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2Vjb21tZXJjZV8wLjEudGVzdFwvP2hlcmQ9cHJldmlldyIsInJvdXRlIjoiaG9tZSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1792169200),
('SIOFvze1nhcoOu0NAlNhJcAPr0bvCwEpepkWtTyc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.141.1 Chrome/150.0.7871.250 Electron/43.7.7 Safari/537.36', 'eyJfdG9rZW4iOiJHdGxWY29QeTQxOVJ0Y0E4TGN3QXdqdGwzUTdUeXU5eGlDRWhEaGd4IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2Vjb21tZXJjZS50ZXN0XC9sb2dpbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1792127056);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `phone`, `address`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@example.com', NULL, '$2y$12$xCtjwZVhwhvkY7UyG4S/BuA3xjP9rA9Y.ShjCzNsNvLgVWJKCVCSK', 'admin', '01700000000', 'Dhaka, Bangladesh', 'users/RzhA1dcOXgqjCxqxTqtwulK2NNbxb3dmxEHvwtZw.png', 'IeGjzDJNyqa9k4D4JRMWBMlIGx2pcBiz8EBXi2OUVEi8IUTUJPLeFPoG1iOm', '2026-09-20 23:37:59', '2026-10-04 00:55:48'),
(2, 'Mustafa Mursalin Khan', 'mmmursalinkhan@gmail.com', NULL, '$2y$12$MQ7FZlgJe2iAr/jTyPGzs.2TvI8aHj2mpWEaWBeKvuIEYiyS7QiSy', 'admin', '01800000000', 'Dhaka, Bangladesh', 'users/QGaTlbPSbWZApkkGOYp6OLhwlWusUZr92GsJU3VH.jpg', 'jnwRpQSDDsYA5DyBdbWuq6yC5EzKjyYKmEqdbm0MmQE8cVSQEfd4Lrt9l3w2', '2026-09-20 23:38:00', '2026-10-14 09:33:01'),
(4, 'Rion', 'rion@example.com', NULL, '$2y$12$ABEqvs60BlTU8ZoL5JGQReJjiwMhAPeh9InvzBFmmL6v8ReKo25s2', 'customer', '01700007777', 'Palton, Dhaka', 'users/unIA9FlUvU5crfeEKY1958RvElbCL4EYu1LKYRZ8.png', NULL, '2026-09-21 00:53:34', '2026-10-04 00:57:14'),
(5, 'Masum', 'customer_01@example.com', NULL, '$2y$12$rPunqXGDX7eH2xu2KJDYpOEHxHQykg3fr3AVQPSJMJzk5TRozfY8S', 'customer', '01800000000', 'Dhaka, Bangladesh', 'users/yXdBhFuMqv5C6jsAhG6nQmb2pKT4Tv6MoFK7fYMS.png', NULL, '2026-10-03 21:42:31', '2026-10-04 00:57:01'),
(8, 'Demone', 'demone@mail.com', NULL, '$2y$12$/qunaYIvsl.RnWh1oE8pkuGSqFtWq.yMgxEt/8hJlU7syCNVvGwMC', 'customer', '+10170000000', NULL, 'users/txEOS4UKbiUQUpJOCbnQ5MeYXFccPJIL4fN6Opo6.jpg', 'rXMrht9hiHYXA5BbtzaT10pEgLK27nORrfBUeRiOQ0mUfvnQ33z3WKMH6UzW', '2026-10-14 08:47:04', '2026-10-14 09:32:51'),
(9, 'noman', 'nomail@gmail.com', NULL, '$2y$12$a2B96w1sfdHdrajVHVy2S.qMBQRu3c4qaAI3QoSwj1t/JaGrDEkdS', 'customer', '+11019222255', 'utt', 'users/R6Q4IXkOL1MsBPMwA85j7FRgPfzNmeL5MJolFeUH.jpg', NULL, '2026-10-14 10:41:01', '2026-10-14 10:43:08'),
(11, 'Customer', 'customer@example.com', NULL, '$2y$12$I95Mz0mH.ZqFHEz2kk122.nfw/sFNP.Bud0CwPJwdQUnWxtOrl9A2', 'customer', '01677887778', 'Dhaka, Bangladesh', 'users/J5DMPL0QrBD4GGIGXfg2VCTO8kTU1jgcwXBJhBcA.jpg', NULL, '2026-10-14 11:30:00', '2026-10-14 11:30:00');

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guest_customers`
--
ALTER TABLE `guest_customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `product_skus`
--
ALTER TABLE `product_skus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
