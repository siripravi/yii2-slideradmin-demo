-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 04:40 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slideradmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `anxt_cart`
--

CREATE TABLE `anxt_cart` (
  `sessionId` varchar(255) NOT NULL,
  `cartData` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `slug`, `created_at`, `updated_at`, `position`, `enabled`) VALUES
(1, 'unknown', 1708757312, 1708757312, 0, 1),
(2, 'britannia', 1708798175, 1710323376, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `brand_lang`
--

CREATE TABLE `brand_lang` (
  `brand_id` int(11) NOT NULL,
  `lang_id` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `description` text DEFAULT NULL,
  `text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand_lang`
--

INSERT INTO `brand_lang` (`brand_id`, `lang_id`, `name`, `title`, `keywords`, `description`, `text`) VALUES
(1, 'en', 'Unknown', 'Unknown', '', NULL, NULL),
(1, 'ru', 'Неизвестный', 'Неизвестный', '', NULL, NULL),
(2, 'en', 'Britannia biscuits', 'britannia', 'britannia', 'britannia', 'britannia'),
(2, 'hi', 'Britannia', 'Britannia Bscu', 'biscuits', 'Britannia biscuits', 'Britannia biscuits');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT 1,
  `slug` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_id`, `slug`, `created_at`, `updated_at`, `position`, `enabled`) VALUES
(1, NULL, 'main', 1708757312, 1708757312, 0, 1),
(2, 1, 'Cakes', 1709785312, 1709785312, 0, 1),
(3, 1, 'cookies', 1710243078, 1712413693, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_lang`
--

CREATE TABLE `category_lang` (
  `category_id` int(11) NOT NULL,
  `lang_id` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `description` text DEFAULT NULL,
  `text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_lang`
--

INSERT INTO `category_lang` (`category_id`, `lang_id`, `name`, `title`, `keywords`, `description`, `text`) VALUES
(1, 'en', 'Main category', 'Main category', '', NULL, NULL),
(1, 'ru', 'Главная категория', 'Главная категория', '', NULL, NULL),
(2, 'en', 'Cakes', 'Delicious cakes', 'cakes', 'Bakery Delicious cakesBakery Delicious cakes', 'Bakery Delicious cakesBakery Delicious cakesBakery Delicious cakes'),
(2, 'hi', 'Cakes', 'Delicious Cakes', 'bakery, cakes', 'Bakery Delicious cakes', 'Bakery Delicious cakes Text'),
(3, 'en', 'Cookies', 'Cookies', 'Cookies', 'CookiesCookies', 'CookiesCookies'),
(3, 'hi', 'Cookies', 'Cookies', 'cookies', 'Delicious Cookies', 'Delicious Cookies');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `code` varchar(3) NOT NULL,
  `rate` decimal(8,4) NOT NULL,
  `primary` tinyint(1) NOT NULL DEFAULT 0,
  `position` int(11) NOT NULL DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `code`, `rate`, `primary`, `position`, `enabled`) VALUES
(1, 'USD', 1.0000, 1, 0, 1),
(2, 'INR', 0.2000, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `currency_lang`
--

CREATE TABLE `currency_lang` (
  `currency_id` int(11) NOT NULL,
  `lang_id` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `before_name` varchar(20) NOT NULL DEFAULT '',
  `after_name` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `currency_lang`
--

INSERT INTO `currency_lang` (`currency_id`, `lang_id`, `name`, `before_name`, `after_name`) VALUES
(1, 'en', 'U.S. dollar', '$ ', ''),
(1, 'hi', 'Us dollar', '', ''),
(1, 'ru', 'Доллар США', '$ ', ''),
(2, 'en', 'Rupee', 'Rs.', '/-'),
(2, 'hi', 'Rupee', 'Rs.', '/-');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `dir` varchar(255) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `extension` varchar(10) NOT NULL,
  `mime` varchar(32) NOT NULL,
  `size` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `dir`, `hash`, `extension`, `mime`, `size`, `created_at`) VALUES
(1, '022024', 'cff9a15c6d08c1d67972cd6d369cace4', 'jpg', 'image/jpeg', 567837, 1708801284),
(2, '022024', 'a1da51a41e8a6ce17d0e88a48c00d9a7', 'png', 'image/png', 133294, 1708801348),
(3, '032024', '169802fbeda61d5354a9b18ea7ff54ed', 'jpg', 'image/jpeg', 15397, 1710246890),
(4, '032024', '996e23f233aee1572e119be46e50cfb6', 'jpg', 'image/jpeg', 32119, 1710246926),
(5, '032024', '133b225f58040e139ae9a5ce23e7adc0', 'jpg', 'image/jpeg', 383165, 1710248885),
(6, '032024', 'f637369b657746cd2018845807399b59', 'jpg', 'image/jpeg', 16455, 1710249153),
(7, '032024', 'f05791f109bfe0d47a1092312416ba4e', 'jpg', 'image/jpeg', 22879, 1710319160),
(8, '042024', 'ad6196a35bfbb197858915ab02c9c7e0', 'jpg', 'image/jpeg', 32544, 1712416007);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_album`
--

CREATE TABLE `gallery_album` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT 0,
  `title` text NOT NULL,
  `description` text DEFAULT NULL,
  `cover_image_id` int(11) DEFAULT 0,
  `timestamp_create` int(11) DEFAULT 0,
  `timestamp_update` int(11) DEFAULT 0,
  `is_highlight` tinyint(1) DEFAULT 0,
  `sort_index` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery_album`
--

INSERT INTO `gallery_album` (`id`, `cat_id`, `title`, `description`, `cover_image_id`, `timestamp_create`, `timestamp_update`, `is_highlight`, `sort_index`) VALUES
(5, 1, '{\"en\":\"Butter Cookies Gallery\"}', '{\"en\":\"All Butter Cookies Gallery\"}', 217, 0, 0, 0, 0),
(6, 1, '{\"en\":\"Honey Chocolate Cake\"}', '{\"en\":\"Image gallery for Honey Chocolat Cakes\"}', 261, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_album_image`
--

CREATE TABLE `gallery_album_image` (
  `image_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `sortindex` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery_album_image`
--

INSERT INTO `gallery_album_image` (`image_id`, `album_id`, `sortindex`) VALUES
(211, 6, 1),
(213, 5, 4),
(213, 6, 3),
(218, 5, 2),
(221, 6, 5),
(222, 5, 3),
(222, 6, 2),
(225, 5, 1),
(261, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_cat`
--

CREATE TABLE `gallery_cat` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `cover_image_id` int(11) DEFAULT 0,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery_cat`
--

INSERT INTO `gallery_cat` (`id`, `title`, `cover_image_id`, `description`) VALUES
(1, '{\"en\":\"Catalog Images\"}', 7, '{\"en\":\"Product catalog images\"}');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` varchar(3) NOT NULL,
  `name` varchar(31) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name`, `enabled`) VALUES
('en', 'English', 1),
('hi', 'Hindi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `layer`
--

CREATE TABLE `layer` (
  `id` int(11) NOT NULL,
  `stamp_id` int(11) NOT NULL DEFAULT 0,
  `text` varchar(100) NOT NULL,
  `type_id` int(11) NOT NULL DEFAULT 1,
  `font` varchar(200) NOT NULL DEFAULT 'Arial',
  `centerX` smallint(4) NOT NULL DEFAULT 125,
  `centerY` smallint(4) NOT NULL DEFAULT 125,
  `fontSize` smallint(4) NOT NULL DEFAULT 16,
  `spacing` smallint(4) NOT NULL DEFAULT 180,
  `angleStart` smallint(4) NOT NULL DEFAULT 0,
  `angleEnd` smallint(4) NOT NULL,
  `rotate` smallint(4) NOT NULL DEFAULT 0,
  `radiusX` smallint(4) NOT NULL DEFAULT 84,
  `radiusY` smallint(4) NOT NULL DEFAULT 84,
  `hash` varchar(100) NOT NULL,
  `pathText` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `layer`
--

INSERT INTO `layer` (`id`, `stamp_id`, `text`, `type_id`, `font`, `centerX`, `centerY`, `fontSize`, `spacing`, `angleStart`, `angleEnd`, `rotate`, `radiusX`, `radiusY`, `hash`, `pathText`) VALUES
(4, 0, 'Sea World', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'iv5fiwcwlj2vswbvnrdt', ''),
(5, 0, 'New Session World', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'iv5fiwcwlj2vswbvnrdt', ''),
(6, 0, 'Ujwala Sangham', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'ov5horkypbreqwlykvzf', ''),
(7, 0, 'Guruji', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'ov5horkypbreqwlykvzf', ''),
(8, 0, 'Putin Lord', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'ov5horkypbreqwlykvzf', ''),
(9, 0, 'Hello World', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'ov5horkypbreqwlykvzf', ''),
(10, 0, 'Hello World', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'ov5horkypbreqwlykvzf', ''),
(11, 0, 'Sea World', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'ov5horkypbreqwlykvzf', ''),
(12, 0, 'Modifji', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'ov5horkypbreqwlykvzf', ''),
(13, 0, 'ABN Andhra', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'njwdiucqnfruwwlpm5ne', ''),
(14, 0, 'Sakshi TV', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'njwdiucqnfruwwlpm5ne', ''),
(15, 0, 'Hariraj Traders', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'hezvmwkuieydg2tygfdx', ''),
(16, 0, 'Bhramji Associates', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'hezvmwkuieydg2tygfdx', ''),
(17, 0, 'Happy Rakhi', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'hfitcnldirbu6wsckfax', ''),
(18, 0, 'Pravinya Valluri', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'hfitcnldirbu6wsckfax', ''),
(19, 0, 'Gourav Mishra', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'omyf6urskzguquljijwt', ''),
(20, 0, 'Hello world', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'k5hvku2eou2ha5dqg5nf', ''),
(21, 0, 'Bottom Text', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'k5hvku2eou2ha5dqg5nf', ''),
(22, 0, 'Hello World', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'kzawumcypjsvc2lbkrzt', ''),
(23, 0, 'Varalakshmi Valluri', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'kzawumcypjsvc2lbkrzt', ''),
(24, 0, 'Hello', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'mrthcokumnhda2klgbvw', ''),
(25, 0, 'What\'s up?', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'mrthcokumnhda2klgbvw', ''),
(26, 0, 'Sea World', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'lftxg32rirvwwyklkfxv', ''),
(27, 0, 'Second Text', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'lftxg32rirvwwyklkfxv', ''),
(28, 0, 'Hello World', 1, 'Arial', 0, 0, 48, 36, 0, 0, 0, 150, 0, 'jrmxcrkjgi4xkz2wnbtu', ''),
(29, 0, 'Hi', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'jrmxcrkjgi4xkz2wnbtu', ''),
(30, 0, 'New', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'jrmxcrkjgi4xkz2wnbtu', ''),
(31, 0, 'Two', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'jrmxcrkjgi4xkz2wnbtu', ''),
(32, 0, 'Mathematics', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'jrmxcrkjgi4xkz2wnbtu', ''),
(33, 0, 'Caste', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'jrmxcrkjgi4xkz2wnbtu', ''),
(34, 0, 'dffsdf', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'jrmxcrkjgi4xkz2wnbtu', ''),
(35, 0, 'Cars', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'gvbumttborshusbynjbw', ''),
(36, 0, 'Hello World', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'kbawk52rlbrdm3lmmfhg', ''),
(37, 0, 'Hello World', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'kbawk52rlbrdm3lmmfhg', ''),
(38, 0, 'Hello World', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'ivkfmzkgju4gczlbmvix', ''),
(39, 0, 'Hello World', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'ivkfmzkgju4gczlbmvix', ''),
(40, 0, 'Hello World', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'pjsesytfnrdfasdhjvtv', ''),
(41, 0, 'Cars', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'kr3ggv2lozcuc3ltkzte', ''),
(42, 0, 'bikes', 1, 'Arial', 0, 0, 48, 0, 60, 0, 0, 171, 0, 'pbrvs22ggfuw24sgmrmf', ''),
(43, 0, 'SCOOTER', 1, 'Arial', 0, 0, 34, 0, -40, 0, 0, 156, 0, 'pbrvs22ggfuw24sgmrmf', ''),
(44, 0, 'AIR', 1, 'Arial', 0, 0, 29, 0, 235, 0, 0, 143, 0, 'pbrvs22ggfuw24sgmrmf', ''),
(45, 0, 'Car', 1, 'Arial', 0, 0, 48, 0, 140, 0, 0, 150, 0, 'pbrvs22ggfuw24sgmrmf', ''),
(46, 0, 'Bullet', 1, 'Arial', 0, 0, 30, 0, -75, 0, 0, 100, 0, 'pbrvs22ggfuw24sgmrmf', ''),
(47, 0, 'Govind', 1, 'Arial', 0, 0, 32, 0, 65, 0, 0, 100, 0, 'pbrvs22ggfuw24sgmrmf', ''),
(48, 0, 'WIPRO', 1, 'Arial', 0, 0, 36, 0, 0, 0, 0, 100, 0, 'hfjeex2ggjwum6kciz4e', ''),
(52, 0, 'ACCENTURE', 1, 'Arial', 0, 0, 48, 0, 110, 0, 0, 150, 0, 'hfjeex2ggjwum6kciz4e', ''),
(53, 0, 'Microsoft', 1, 'Arial', 0, 0, 45, 0, -80, 0, 0, 150, 0, 'hfjeex2ggjwum6kciz4e', ''),
(54, 0, 'DELL', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'hfjeex2ggjwum6kciz4e', ''),
(55, 0, 'Hello World!', 1, 'Arial', 0, 0, 24, 0, 0, 0, 0, 100, 0, 'fvyc24twmjjc2oljkfjw', ''),
(56, 0, 'Kishore Kumar', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'fvyc24twmjjc2oljkfjw', ''),
(57, 0, 'Md. Rafi', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'fvyc24twmjjc2oljkfjw', ''),
(58, 0, 'Secunderabad', 1, 'Arial', 0, 0, 32, 0, -5, 0, 0, 100, 0, 'o5gu23tcjnatassmju4v', ''),
(59, 0, 'Fire Accident', 1, 'Arial', 0, 0, 48, 0, 25, 0, 0, 150, 0, 'o5gu23tcjnatassmju4v', ''),
(61, 0, 'Hello World', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'o5gu23tcjnatassmju4v', ''),
(62, 0, 'Hello World', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'i44uo6tjljzu6scgk54t', ''),
(63, 0, 'Top Text', 1, 'Arial', 0, 0, 44, 0, 0, 0, 0, 128, 0, 'i44uo6tjljzu6scgk54t', ''),
(64, 0, 'Bottom Text', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'gq4donlnn5tdk6skhb4d', ''),
(65, 0, 'Bottom Text', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'jzvwomdhgn5gqykdovlg', ''),
(66, 0, 'Bottom Text', 3, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'l42hau2qizhxgylrgrtw', ''),
(67, 0, 'Top', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'l42hau2qizhxgylrgrtw', ''),
(68, 0, 'Hyderabad', 3, 'Arial', 0, 0, 38, 0, 0, 0, 0, 133, 0, 'gy3xotdjknbxktkvjr3d', ''),
(69, 0, 'Glowsys Technologies', 1, 'Arial', 0, 0, 38, 0, 0, 0, 0, 130, 0, 'gy3xotdjknbxktkvjr3d', ''),
(70, 0, 'Cars', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'gy3xotdjknbxktkvjr3d', ''),
(71, 0, 'Center fresh', 1, 'Arial', 0, 0, 32, 0, 0, 0, 0, 125, 0, 'gfceus2cnzehgx2yk5td', ''),
(72, 0, 'Valluri', 3, 'Arial', 0, 0, 29, 0, -60, 0, 0, 133, 0, 'gfceus2cnzehgx2yk5td', ''),
(74, 0, 'CLASSMATE', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 123, 0, 'kr4egt3onb3ug53smeyd', ''),
(75, 0, 'Notebooks', 3, 'Arial', 0, 0, 48, 0, 0, 0, 0, 133, 0, 'kr4egt3onb3ug53smeyd', ''),
(79, 0, 'ASIAN PAINTS', 1, 'Arial', 0, 0, 33, 0, 20, 0, 0, 130, 0, 'k5hhcrtuivnf6vdcozmv', ''),
(80, 0, 'Guruji', 3, 'Arial', 0, 0, 37, 0, 0, 0, 0, 133, 0, 'k5hhcrtuivnf6vdcozmv', ''),
(81, 0, 'Bhagwan', 3, 'Arial', 0, 0, 48, 0, 0, 0, 0, 150, 0, 'ifvg6nsfnvmeq4rwnfdw', ''),
(85, 0, 'Hello World', 3, 'Arial', 0, 0, 48, 0, 150, 0, 0, 130, 0, 'gjlgq6rvirxvqlkvkzsd', ''),
(87, 0, 'FORWARD', 3, 'Arial', 0, 0, 48, 0, 70, 0, 0, 125, 0, 'gjlgq6rvirxvqlkvkzsd', ''),
(88, 0, 'Ammaji Garu', 3, 'Arial', 0, 0, 35, 0, 0, 0, 0, 128, 0, 'm5teu4sdkr3uuzdngrkd', ''),
(89, 0, 'Gouthami Sri', 3, 'Arial', 0, 0, 26, 0, 0, 0, 0, 85, 0, 'm5teu4sdkr3uuzdngrkd', ''),
(90, 0, 'Super Top Text', 1, 'Arial', 0, 0, 46, 0, 0, 0, 0, 132, 0, 'm5teu4sdkr3uuzdngrkd', ''),
(91, 0, 'English Medium', 1, 'Arial', 0, 0, 41, 0, 0, 0, 0, 127, 0, 'o5twuojsnrbtq2tqi5gt', ''),
(92, 0, 'School', 3, 'Arial', 0, 0, 32, 0, 0, 0, 0, 143, 0, 'o5twuojsnrbtq2tqi5gt', ''),
(93, 0, 'College', 1, 'Arial', 0, 0, 36, 0, 0, 0, 0, 82, 0, 'o5twuojsnrbtq2tqi5gt', ''),
(94, 0, 'State Bank of India', 1, 'Arial', 0, 0, 32, 0, 0, 0, 0, 127, 0, 'mrzwerkvkn5dm4zwmrqw', ''),
(97, 0, 'MOTINAGAR', 3, 'Arial', 0, 0, 30, 0, -28, 0, 0, 130, 0, 'mrzwerkvkn5dm4zwmrqw', ''),
(98, 0, 'Branch', 3, 'Arial', 0, 0, 32, 0, 53, 0, 0, 130, 0, 'mrzwerkvkn5dm4zwmrqw', ''),
(99, 0, 'Hello World', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'mr3s2tdqk4yumysvm5be', ''),
(100, 0, 'How R U?', 3, 'Arial', 0, 0, 34, 0, 184, 0, 0, 199, 0, 'mr3s2tdqk4yumysvm5be', ''),
(101, 0, 'NOUNS & PRONOUNS', 1, 'Arial', 0, 0, 40, 0, -4, 0, 0, 125, 0, 'mrjuq3c2inigqvdknfwx', ''),
(102, 0, 'Ten Times Twenty', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'mrhximc7fvmvgsjng5me', ''),
(103, 0, 'Polish PM', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'iizwu2dwnj4gsul2pb4g', ''),
(104, 0, 'draw text here', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'ijzfqt2tfvwuu2tsgfjw', ''),
(105, 0, 'Hello here', 3, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'ijzfqt2tfvwuu2tsgfjw', ''),
(106, 0, 'Vladimir Putin', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'm5ehs43mgrdhovzrhb3h', ''),
(107, 0, 'Anil Kumar Yadav', 1, 'Arial', 0, 0, 45, 0, 0, 0, 0, 125, 0, 'ozgwuztqlfgc222fka3t', ''),
(109, 0, 'Hello World', 1, 'Arial', 0, 0, 32, 0, 4, 0, 0, 127, 0, 'kfpwywcyme3s2x3bpfff', ''),
(110, 0, 'Sea World', 3, 'Arial', 0, 0, 49, 0, 0, 0, 0, 130, 0, 'kfpwywcyme3s2x3bpfff', ''),
(111, 0, 'Hello World Help Me Out', 3, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'ifshu23wnb5em3cfk5gv', ''),
(113, 0, 'Hello World', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'ojmdar2eirfhsq2pmrbe', ''),
(114, 0, 'Hello World', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'ofnhctrxgrvwuztnki4e', ''),
(115, 0, 'Hyderabad', 3, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'ofnhctrxgrvwuztnki4e', ''),
(117, 0, 'Hello World1', 3, 'Georgia', 0, 0, 40, 0, 0, 0, 0, 125, 0, 'pfbugwrxn5cgqudjjrbg', ''),
(118, 0, 'Hello World', 1, 'Magnolia Script', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'pfbugwrxn5cgqudjjrbg', ''),
(119, 0, 'ROCKING DESIGNS', 1, 'Magnolia Script', 0, 0, 48, 0, 0, 0, 0, 126, 0, 'mfstct3fjj4xsztpjv3u', ''),
(120, 0, 'Hyderabad', 3, 'Verdana', 0, 0, 44, 0, 0, 0, 0, 130, 0, 'mfstct3fjj4xsztpjv3u', ''),
(121, 0, 'Magnolia', 1, 'Magnolia Script', 0, 0, 48, 0, 0, 0, 0, 130, 0, 'jrrhcvdynazdqndkg5lw', ''),
(122, 0, 'Arial', 3, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'jrrhcvdynazdqndkg5lw', ''),
(123, 0, '\\uF047', 1, '14px FontAwesome', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'gy4datjtjj2gqzsggzcu', ''),
(124, 0, 'To DO', 3, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'gy4datjtjj2gqzsggzcu', ''),
(125, 0, 'Hello World', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'm5duyllykbghsutkkrtw', ''),
(126, 0, 'jCanvas', 3, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'm5duyllykbghsutkkrtw', ''),
(127, 0, 'Star Elevators', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'nvtfkylwfvhwi2rvov3u', ''),
(128, 0, 'Hyderabad', 3, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'nvtfkylwfvhwi2rvov3u', ''),
(129, 0, 'India', 2, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'nvtfkylwfvhwi2rvov3u', ''),
(130, 0, 'Sea World', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'lj3ha4tkizbum2ctnrde', ''),
(131, 0, 'Gurava Reddy M', 3, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'lj3ha4tkizbum2ctnrde', ''),
(133, 0, 'Hyderabad', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'lj3ha4tkizbum2ctnrde', ''),
(135, 0, 'V6 NEWS', 3, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'iflventmnbivgwbqnjmu', ''),
(137, 0, 'Hello World', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'iflventmnbivgwbqnjmu', ''),
(138, 0, 'Hello World', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'ovgu2ntbofgem4rzknuf', ''),
(139, 0, 'Mallanna', 3, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'ovgu2ntbofgem4rzknuf', ''),
(140, 0, 'Hello World', 1, 'Inconsolata Bold', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'mnbgiuzninlg4mdvlfhd', ''),
(141, 0, 'Varalakshmi Valluri', 1, 'Magnolia Script', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'ofbvqucznryhgtrni5av', ''),
(146, 0, 'Mithriljs', 1, 'Arial', 0, 0, 35, 0, 2, 0, 0, 125, 0, 'jzrwitjsgazwk52dgnvu', ''),
(148, 0, 'Angularjs', 3, 'Arial', 0, 0, 45, 0, 0, 0, 0, 125, 0, 'jzrwitjsgazwk52dgnvu', ''),
(149, 0, 'ReactJs', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'jzrwitjsgazwk52dgnvu', ''),
(150, 0, 'Strong', 1, 'Arial', 0, 0, 54, 0, -59, 0, 0, 132, 0, 'hbjucrjqojducokxkb3e', ''),
(151, 0, 'Bitter', 3, 'Inconsolata Regular', 0, 0, 65, 0, 0, 0, 0, 133, 0, 'hbjucrjqojducokxkb3e', ''),
(152, 0, 'Mild', 1, 'Arial', 0, 0, 48, 0, 129, 0, 0, 74, 0, 'hbjucrjqojducokxkb3e', ''),
(153, 0, 'Sour', 1, 'Arial', 0, 0, 61, 0, 87, 0, 0, 125, 0, 'hbjucrjqojducokxkb3e', ''),
(154, 0, 'Sweet', 1, 'Arial', 0, 0, 45, 0, -35, 0, 0, 76, 0, 'hbjucrjqojducokxkb3e', ''),
(155, 0, 'Starbucks', 1, 'Arial', 0, 0, 48, 0, 21, 0, 0, 125, 0, 'njdeor3yha2u6ztyk54h', ''),
(158, 0, 'Coffee', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'jfyha5cekjudqzs2hfdw', ''),
(159, 0, 'Coffee', 1, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'kbluoy2bm5ffantjhfmw', ''),
(160, 0, 'Revanth Reddy', 1, 'Arial', 0, 0, 48, 0, -42, 0, 0, 125, 0, 'oj3gurtxhfne6n3minzt', ''),
(161, 0, 'Hello World', 1, 'Arial', 0, 0, 50, 0, 0, 0, 0, 92, 0, 'nrzdmmtrozsdk22gmnce', ''),
(162, 0, 'Ujwala Sangham', 1, 'Arial', 0, 0, 16, 0, 125, 0, 0, 125, 0, 'iz5dirchmvrvq5rxjjmu', ''),
(163, 0, 'Bottom Text', 3, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'iz5dirchmvrvq5rxjjmu', ''),
(165, 0, 'Hello World', 1, 'Arial', 0, 0, 48, 0, 134, 0, 0, 125, 0, 'jazdit2dkfutcukmgfbe', ''),
(166, 0, 'Hyderabad', 3, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'jazdit2dkfutcukmgfbe', ''),
(167, 0, 'Starbucks', 1, 'Arial', 0, 0, 48, 0, 155, 0, 0, 125, 0, 'gfegi33yj52ws2ctgbav', ''),
(168, 0, 'Hyderabad', 3, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'gfegi33yj52ws2ctgbav', ''),
(169, 0, 'Sonu Nigam', 1, 'Arial', 0, 0, 48, 0, 143, 0, 0, 125, 0, 'kfqxg4stgzcgs6rvgzfu', ''),
(170, 0, 'Hyderabad', 3, 'Arial', 0, 0, 48, 0, 0, 0, 0, 125, 0, 'kfqxg4stgzcgs6rvgzfu', ''),
(173, 0, 'SOME TEXT', 3, 'Magnolia Script', 0, 0, 55, 0, -3, 0, 0, 132, 0, 'ivzgi2cwm5lvgtczmfxu', ''),
(175, 0, 'Sea World', 1, 'Arial', 100, 100, 48, 125, 0, 125, 0, 68, 68, 'izhti6luj5jf6nrrifxh', ''),
(176, 0, 'Hyderabad Old City', 1, 'Arial', 50, 70, 48, 35, 0, 0, 0, 50, 50, 'jngdq4suobxtqndshfku', ''),
(177, 0, 'Hello Hi World', 1, 'Arial', 50, 70, 48, 35, 0, 0, 0, 50, 50, 'jzmfi4rvgnquqvtdjzwe', ''),
(178, 0, 'Hello World', 1, 'Arial', 50, 70, 48, 0, 0, 0, 0, 50, 144, 'grgugu3jku2verdrna3f', ''),
(181, 0, 'Divya Diamonds', 1, 'Arial', 125, 125, 48, 0, 0, 0, 180, 84, 84, 'grgugu3jku2verdrna3f', ''),
(182, 0, 'Janasena Party', 1, 'Arial', 125, 125, 48, 0, 0, 0, 180, 84, 84, 'jr3vs4tokvhs2wt2gvme', ''),
(183, 0, 'Janasena Party', 1, 'Arial', 125, 125, 48, 0, 0, 0, 180, 84, 84, 'jr3vs4tokvhs2wt2gvme', ''),
(184, 0, 'Janasena Party', 1, 'Arial', 125, 125, 48, 0, 0, 0, 180, 84, 84, 'fvxemwlpnzvu6nlqkzhg', ''),
(185, 0, 'National Provident Fund', 1, 'Arial', 125, 125, 48, 0, 0, 0, 180, 84, 84, 'j44viqshpf2wwtlqge2d', ''),
(186, 0, 'Telangana', 1, 'Arial', 125, 125, 48, 0, 0, 0, 180, 84, 84, 'j44viqshpf2wwtlqge2d', ''),
(187, 0, 'Bharat Jodo', 1, 'Arial', 125, 125, 48, 0, 0, 0, 180, 84, 84, 'lfavo4dojrvxg6jqhbgg', ''),
(190, 0, 'ECO FRIENDLY GANESHA', 1, 'Arial', 125, 125, 20, 217, 0, 217, 3, 78, 78, 'lfuwq5lzozjgkljwnrvw', ''),
(191, 0, 'Hyderabad', 3, 'Arial', 125, 125, 21, 109, 1, 110, 0, 87, 87, 'lfuwq5lzozjgkljwnrvw', ''),
(192, 0, 'Michael Gorbachev', 3, 'Arial', 125, 125, 17, 145, 0, 145, 0, 91, 91, 'gm4fuujsji4eivcqk5ke', ''),
(194, 0, 'Swachch Bharath', 1, 'Arial', 125, 125, 16, 179, 0, 179, 0, 84, 84, 'gm4fuujsji4eivcqk5ke', ''),
(195, 0, 'Jaganmohan Reddy', 1, 'Arial', 125, 125, 27, 235, 0, 235, 0, 104, 104, 'nvjxkx2rnzzw4tbsjziw', ''),
(197, 0, 'Telangana', 3, 'Arial', 125, 125, 27, 102, 0, 102, 0, 119, 119, 'nvjxkx2rnzzw4tbsjziw', ''),
(198, 0, 'Pro V Digital Services', 1, 'Arial', 125, 125, 23, 224, 0, 224, 0, 101, 101, 'kzcxo5chmzfwqtbyjqyv', ''),
(200, 0, 'Hyderabad', 3, 'Arial', 125, 125, 21, 86, 0, 86, 0, 115, 115, 'kzcxo5chmzfwqtbyjqyv', ''),
(201, 0, 'Rishi Sunaak', 1, 'Arial', 125, 125, 27, 164, 188, 352, 0, 106, 106, 'pjyws3kppjdeyu3wmjaw', ''),
(202, 0, 'London', 3, 'Arial', 125, 125, 27, 108, 144, 252, 0, 115, 115, 'pjyws3kppjdeyu3wmjaw', ''),
(203, 0, 'Narendra Modi', 3, 'Arial', 125, 125, 23, 145, 162, 307, 0, 106, 106, 'njmwg5dljezgo32pgfat', ''),
(204, 0, 'INDIA', 1, 'Arial', 125, 125, 16, 180, 0, 180, 0, 84, 84, 'njmwg5dljezgo32pgfat', ''),
(206, 0, 'Hyderabad', 1, 'Roboto', 125, 125, 32, 161, 189, 350, 0, 91, 91, 'gffta5sskjcdgrbxofyw', '[[6.645727815532226,105.19428729671871,279.5],[18.451446451706147,69.79668726637544,297.3888888888889],[40.55955990249129,39.736807025897505,315.27777777777777],[70.83239003157232,17.921197100881386,333.16666666666663],[106.34279575857711,6.459252871032433,351.05555555555554],[143.65720424142273,6.459252871032419,368.9444444444444],[179.16760996842754,17.921197100881315,386.8333333333333],[209.44044009750866,39.736807025897434,404.7222222222222],[231.54855354829382,69.79668726637536,422.6111111111111]]'),
(207, 0, 'UNIVERSE', 3, 'Arial', 125, 125, 24, 132, 156, 288, 0, 114, 114, 'gffta5sskjcdgrbxofyw', '[[20.855817828743483,171.3679773106412,426],[38.313719921596444,199.0370775096409,409.5],[62.91115000828686,220.60844474577829,393],[92.62225070375274,234.30544977497397,376.50000000000006],[124.9999999999999,239,360.00000000000006],[157.37774929624706,234.30544977497402,343.50000000000006],[187.08884999171298,220.6084447457784,327.00000000000006],[211.68628007840346,199.03707750964102,310.50000000000006]]'),
(208, 0, 'Pro V Digital Services', 1, 'Arial', 125, 125, 16, 218, 161, 379, 0, 103, 103, 'orvu4scsgbmvmucgpfcw', '[[40.8488467716608,153.97556574668693,251.00000000000003],[36.06744801536499,128.4642744550901,267.7692307692308],[38.84983811264587,102.6583436875715,284.53846153846155],[48.95937242962688,78.75258970813815,301.3076923076924],[65.53622651198621,58.78021713591784,318.0769230769231],[87.17052488288859,44.43989317060306,334.84615384615387],[112.02225214615987,36.95127450870088,351.61538461538464],[137.97774785384019,36.95127450870089,368.3846153846154],[162.82947511711146,44.43989317060307,385.1538461538462],[184.46377348801383,58.78021713591788,401.92307692307696],[201.04062757037315,78.75258970813817,418.69230769230774],[211.15016188735416,102.65834368757154,435.4615384615385],[213.932551984635,128.46427445509016,452.2307692307693]]'),
(209, 0, 'Hello World', 1, 'Arial', 125, 125, 16, 111, 214, 325, 0, 98, 98, 'n5euuqjnlfwe26lyjfww', '[[44.23563351504245,69.4921887813664,304.5],[55.2105303849244,56.200073177026994,314.5909090909091],[68.3445749306477,45.03649075852782,324.6818181818182],[83.23142588164951,36.34682060907312,334.77272727272725],[99.41051361605514,30.39990387633901,344.8636363636364],[116.3812892706672,27.379726360944446,354.9545454545455],[133.61871072933286,27.37972636094446,365.04545454545456],[150.58948638394492,30.39990387633901,375.1363636363637],[166.76857411835053,36.34682060907315,385.22727272727275],[181.65542506935233,45.03649075852785,395.31818181818187],[194.78946961507563,56.200073177027036,405.409090909091]]'),
(210, 0, 'Hello World', 1, 'Arial', 125, 125, 16, 180, 0, 0, 0, 84, 84, 'irkti5kikfmeu5smkzng', ''),
(212, 0, 'Hyderabad', 1, 'Arial', 125, 125, 16, 108, 216, 324, 0, 61, 61, 'gzkwkologrlwcmssojdu', '[[75.6499633431282,89.14509961015915,306],[84.18303301210963,79.66816564587896,318],[94.49999999999997,72.17245036914926,330],[106.1499633431282,66.98555250599563,342],[118.62376374067314,64.33416438253532,354],[131.37623625932687,64.33416438253533,366.00000000000006],[143.85003665687182,66.98555250599566,378.00000000000006],[155.50000000000006,72.17245036914927,390.00000000000006],[165.8169669878904,79.66816564587901,402.0000000000001]]'),
(215, 0, 'Sea World', 1, 'Arial', 125, 125, 16, 91, 224, 315, 0, 84, 84, 'gzkwkologrlwcmssojdu', '[[65.08696227104875,66.12362179881252,314.5],[76.3536606577077,56.51983010685103,324.61111111111114],[89.1313967135564,49.0431484441349,334.72222222222223],[103.02327232111271,43.92581520281546,344.83333333333337],[117.59778230192913,41.3267834181668,354.9444444444444],[132.40221769807076,41.326783418166784,365.05555555555554],[146.9767276788872,43.92581520281543,375.16666666666663],[160.86860328644352,49.04314844413486,385.2777777777777],[173.6463393422922,56.519830106850975,395.38888888888886]]'),
(216, 0, 'Hello World', 1, 'Arial', 125, 125, 16, 256, 142, 398, 255, 76, 76, 'gzkwkologrlwcmssojdu', '[[58.80709669703536,176.7155639273553,232],[43.759664205035605,146.3543400722529,255.27272727272725],[41.932543616079684,112.51810551616879,278.5454545454545],[53.62306388424078,80.71306072071783,301.8181818181818],[76.92881627694047,56.114868836127954,325.0909090909091],[108.05723503541313,42.726415446057246,348.3636363636364],[141.94276496458684,42.726415446057246,371.6363636363636],[173.0711837230595,56.114868836127926,394.90909090909093],[196.37693611575918,80.71306072071776,418.1818181818182],[208.0674563839203,112.51810551616873,441.45454545454544],[206.2403357949644,146.35434007225285,464.7272727272727]]'),
(217, 0, 'Teachers Day', 1, 'Arial', 125, 125, 16, 235, 152, 387, 0, 103, 103, 'ofqw2qrvj4yvkndfgndu', '[[50.49109001302938,163.78688351174284,242.5],[41.80056701189059,136.5695440902869,262.08333333333337],[42.73538777169367,108.01372392410883,281.66666666666663],[53.18740286347247,81.42304631451623,301.25],[71.94741849059021,59.87378718835686,320.83333333333337],[96.84508813881693,45.85898068580988,340.4166666666667],[125.00000000000006,41,360.00000000000006],[153.15491186118317,45.858980685809925,379.5833333333334],[178.0525815094099,59.87378718835694,399.16666666666674],[196.8125971365276,81.42304631451631,418.7500000000001],[207.26461222830636,108.01372392410899,438.3333333333335],[208.19943298810938,136.5695440902871,457.9166666666668]]'),
(218, 0, 'Happy Teachers Day', 1, 'Arial', 125, 125, 16, 224, 158, 382, 0, 90, 90, 'jryxu23dgmzxgstoornf', '[[28.572879125054115,163.95908571525487,248],[22.44298926241548,142.26440119352458,260.44444444444446],[21.132168434895362,119.75847675164431,272.8888888888889],[24.70201102804637,97.49884714813092,285.33333333333337],[32.98477309362762,76.5314739509359,297.7777777777778],[45.59125449886977,57.841596669242264,310.2222222222223],[61.92908711852348,42.30743716453577,322.66666666666674],[81.23056972268668,30.65893273234923,335.1111111111112],[102.58874162207405,23.443436953007094,347.55555555555566],[125.00000000000017,21,360.0000000000001],[147.4112583779263,23.443436953007165,372.44444444444457],[168.76943027731363,30.658932732349356,384.888888888889],[188.07091288147677,42.30743716453597,397.3333333333335],[204.40874550113045,57.84159666924252,409.77777777777794],[217.01522690637253,76.5314739509362,422.22222222222234],[225.2979889719537,97.49884714813125,434.6666666666668],[228.86783156510467,119.75847675164464,447.1111111111113],[227.55701073758448,142.2644011935249,459.55555555555577]]'),
(219, 0, 'Janasena Party', 1, 'Arial', 125, 125, 16, 164, 188, 352, 43, 106, 106, 'gbwem3kegjtu2yl2njjg', '[[217.70968895677595,73.61018025388825,278],[226.2125010027229,93.50349795971273,289.7142857142857],[230.4992493713034,114.70882017980745,301.42857142857144],[230.39136714724788,136.34282728573453,313.14285714285717],[225.89334822530017,157.50434253893346,324.8571428571429],[217.1925601145037,177.31187111482078,336.5714285714286],[204.65143903918812,194.9403192656889,348.28571428571433],[188.79239245411708,209.65536406501306,360.00000000000006],[170.27603786802283,220.84404204212888,371.7142857142858],[149.87368444957775,228.0402825204921,383.4285714285715],[128.43520370998968,230.94432205394904,395.1428571428572],[106.85362762701457,229.43519124175026,406.85714285714295],[86.02794889545117,223.57575377700357,418.57142857142867],[66.82567288061276,213.61008782416667,430.28571428571433]]'),
(221, 0, 'Janasena Party', 1, 'Arial', 125, 125, 16, 275, 132, 407, 278, 44, 44, 'jjgdknbtgvpvk3zwgnnh', '[[166.34508431805466,175.15559792020179,222.5],[147.07894787688997,186.1352603711604,242.14285714285717],[125.2430988648012,189.99954540565597,261.78571428571433],[103.37895619432163,186.29869871989894,281.42857142857144],[84.03123180490093,175.46345244408315,301.0714285714286],[69.45175811443745,158.7548933256059,320.7142857142858],[61.337402973190294,138.11768805095014,340.35714285714295],[60.63257553179794,115.95374843759564,360.0000000000001],[67.41930886296737,94.84267902844067,379.6428571428573],[80.90771234084724,77.24154348199133,399.28571428571445],[99.52790500135937,65.1988931843212,418.92857142857156],[121.11272999357294,60.1163415650972,438.5714285714287],[143.14998445198168,62.58543387643534,458.2142857142859],[163.07480839656358,72.31879874599507,477.85714285714306]]'),
(223, 0, 'Divya Diamonds', 1, 'Arial', 125, 125, 16, 156, 192, 348, 0, 98, 98, 'mndtqslkg55fe6clnj4u', '[[42.83560153836032,107.53541797130823,282],[47.75966710567815,91.98589734107043,293.1428571428571],[55.59594295745643,77.68111512265574,304.28571428571433],[66.04897615774473,65.16040785608703,315.42857142857144],[78.72465355802338,54.89584668741058,326.57142857142856],[93.14506113715397,47.27443876018428,337.71428571428567],[108.76650290517347,42.583535794889514,348.85714285714283],[124.99999999999991,41,359.99999999999994],[141.23349709482636,42.583535794889485,371.1428571428571],[156.85493886284587,47.274438760184225,382.28571428571416],[171.27534644197647,54.89584668741048,393.42857142857133],[183.95102384225515,65.1604078560869,404.57142857142844],[194.40405704254346,77.68111512265557,415.71428571428555],[202.24033289432174,91.9858973410702,426.8571428571427]]'),
(224, 0, 'Janasena Party', 1, 'Arial', 125, 125, 16, 180, 0, 0, 0, 84, 84, 'jn3ws5cki5lu2ncfkrsx', ''),
(225, 0, 'Janasena Party', 1, 'Arial', 125, 125, 16, 180, 0, 0, 0, 84, 84, 'jn3ws5cki5lu2ncfkrsx', ''),
(226, 0, 'Janasena Party', 1, 'Arial', 125, 125, 16, 180, 0, 0, 0, 84, 84, 'jn3ws5cki5lu2ncfkrsx', ''),
(227, 0, 'Janasena Party', 1, 'Arial', 125, 125, 16, 180, 0, 0, 0, 84, 84, 'jn3ws5cki5lu2ncfkrsx', ''),
(228, 0, 'Janasena Party', 1, 'Arial', 125, 125, 16, 180, 0, 0, 0, 84, 84, 'jn3ws5cki5lu2ncfkrsx', ''),
(229, 0, 'Janasena Party', 1, 'Arial', 125, 125, 16, 174, 183, 357, 0, 102, 102, 'jrexsnztifkfu6jrgr3h', '[[21.142528385524315,119.55706055073387,273],[24.747862487631252,97.3321680610658,285.42857142857144],[33.051999075520584,76.40406265960155,297.8571428571429],[45.6657245263243,57.753641473556826,310.2857142857143],[61.99783544055472,42.25504691629479,322.7142857142857],[81.28284825580515,30.63469576494208,335.1428571428571],[102.61687734526323,23.43723211617848,347.57142857142856],[124.99999999999989,21,359.99999999999994],[147.38312265473655,23.43723211617842,372.4285714285714],[168.71715174419467,30.63469576494198,384.8571428571428],[188.0021645594451,42.255046916294646,397.28571428571416],[204.33427547367558,57.753641473556655,409.7142857142856],[216.9480009244793,76.40406265960132,422.142857142857],[225.25213751236868,97.3321680610655,434.5714285714284]]'),
(231, 0, 'Hello World', 1, 'Arial', 125, 125, 16, 180, 0, 0, 0, 84, 84, 'izcwqlkvjfvtq2c2fvhe', ''),
(232, 0, 'Hello World', 1, 'Arial', 125, 125, 16, 180, 0, 0, 0, 84, 84, 'inyxem2hnfvgyndigjjf', ''),
(233, 0, 'Hyderabad', 1, 'Arial', 125, 125, 16, 180, 0, 0, 0, 84, 84, 'inyxem2hnfvgyndigjjf', ''),
(234, 0, 'Hello World', 1, 'Arial', 125, 125, 16, 180, 0, 0, 0, 84, 84, 'inyxem2hnfvgyndigjjf', '');

-- --------------------------------------------------------

--
-- Table structure for table `layer_type`
--

CREATE TABLE `layer_type` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `layer_type`
--

INSERT INTO `layer_type` (`id`, `name`) VALUES
(1, 'Top Curved Text'),
(2, 'Middle Text'),
(3, 'Bottom Curved Text');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL DEFAULT 1,
  `slug` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `brand_id`, `slug`, `created_at`, `updated_at`, `position`, `enabled`) VALUES
(1, 2, 'butterscotch-cake', 1710242977, 1710242977, 0, 1),
(2, 2, 'butter-sweet-cookies', 1710325357, 1710325357, 0, 1),
(3, 2, 'vanilla-cake', 1712417435, 1712417435, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_lang`
--

CREATE TABLE `model_lang` (
  `model_id` int(11) NOT NULL,
  `lang_id` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `description` text DEFAULT NULL,
  `text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `model_lang`
--

INSERT INTO `model_lang` (`model_id`, `lang_id`, `name`, `title`, `keywords`, `description`, `text`) VALUES
(1, 'en', 'Butescotch Cake', 'Butterscotch Cake', 'butter, scotch', 'Delicious Butterscotch Cake', ''),
(1, 'hi', 'Butterscotch Cake', 'Butterscotch Cake', 'butter, honey', 'Delicious Butterscotch Cake', ''),
(2, 'en', 'Butter Sweet Cookies', 'Butter Sweet Cookies', 'butter,sweet,cookies', 'Butter Sweet CookiesButter Sweet CookiesButter Sweet Cookies', 'Butter Sweet CookiesButter Sweet Cookies'),
(2, 'hi', 'ButterSweet Cookies', 'Butter Sweet Cookies', 'sweet, butter, cookies', 'Butter Sweet CookiesButter Sweet CookiesButter Sweet Cookies', 'Butter Sweet CookiesButter Sweet CookiesButter Sweet Cookies'),
(3, 'en', 'Vanilla Cake', 'Vanilla Cake', 'butter, scotch', 'Delicious Vanilla flavoured cake', 'Delicious Vanilla flavoured cake'),
(3, 'hi', 'Vanilla Cake', 'Vanila Cake', 'vanilla, cake', 'Delicious Vanilla flavoured cake', 'Delicious Vanilla flavoured cake');

-- --------------------------------------------------------

--
-- Table structure for table `nxt_cart`
--

CREATE TABLE `nxt_cart` (
  `sessionId` varchar(255) NOT NULL,
  `cartData` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_image`
--

CREATE TABLE `nxt_image` (
  `id` int(11) NOT NULL,
  `fk_id` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `extension` varchar(255) NOT NULL,
  `mimeType` varchar(255) NOT NULL,
  `byteSize` int(11) DEFAULT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_language`
--

CREATE TABLE `nxt_language` (
  `id` varchar(3) NOT NULL,
  `name` varchar(31) NOT NULL,
  `position` smallint(6) DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `nxt_language`
--

INSERT INTO `nxt_language` (`id`, `name`, `position`, `enabled`) VALUES
('en', 'English', 1, 1),
('hi', 'Hindi', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nxt_migration`
--

CREATE TABLE `nxt_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nxt_migration`
--

INSERT INTO `nxt_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1708084896),
('m160516_095943_init', 1708084898),
('m161119_153348_alter_cart_data', 1708085012);

-- --------------------------------------------------------

--
-- Table structure for table `nxt_profile`
--

CREATE TABLE `nxt_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `patronymic` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `phone` int(16) DEFAULT NULL,
  `info` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nxt_profile`
--

INSERT INTO `nxt_profile` (`id`, `user_id`, `name`, `surname`, `patronymic`, `avatar`, `phone`, `info`) VALUES
(1, 8, 'pravinya', NULL, NULL, '2.jpg', NULL, ''),
(2, 10, 'hello', NULL, NULL, '2.jpg', NULL, ''),
(3, 12, 'Gunn', 'Chandra Reddy', '', NULL, 0, ''),
(4, 30, 'two', 'hello2', 'dsd', NULL, 2147483647, ''),
(5, 31, 'nbd', 'hgrr', '', NULL, 2147483647, ''),
(6, 32, 'user', 'coma', 'hi', NULL, 2147483647, ''),
(7, 34, 'varalakshmi', 'Valluri', '', NULL, 2147483647, '');

-- --------------------------------------------------------

--
-- Table structure for table `nxt_slider`
--

CREATE TABLE `nxt_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image_count` int(11) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `nxt_slider`
--

INSERT INTO `nxt_slider` (`id`, `title`, `image_count`, `enabled`) VALUES
(2, 'Responsive Slider ', 3, 1),
(3, 'Product One', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nxt_slider_image`
--

CREATE TABLE `nxt_slider_image` (
  `id` int(11) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `extension` varchar(255) NOT NULL,
  `mimeType` varchar(255) NOT NULL,
  `byteSize` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `slider_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `nxt_slider_image`
--

INSERT INTO `nxt_slider_image` (`id`, `hash`, `filename`, `extension`, `mimeType`, `byteSize`, `created_at`, `updated_at`, `position`, `enabled`, `slider_id`) VALUES
(5, '', '09fae0f65b07908db69e2d9c22df3a21.jpg', 'jpg', 'image/jpeg', 4713914, 1700449977, 1700449977, 0, 1, 1),
(8, '', '7af8c26ee30fa6c84d3dc015a64281b6.jpg', 'jpg', 'image/jpeg', 1063489, 1700462872, 1700462872, 0, 1, 1),
(9, '', 'd08fad8795aa1eb21e979a4b8e93e002.jpg', 'jpg', 'image/jpeg', 1376107, 1700462885, 1700462885, 0, 1, 1),
(12, '', 'fdda565a452052c8191c87a5194296cd.jpg', 'jpg', 'image/jpeg', 407619, 1707293943, 1707293943, 0, 1, 2),
(13, '', '98603dc45570458856cf4cf20e2d3a32.jpg', 'jpg', 'image/jpeg', 151170, 1707293975, 1707293975, 0, 1, 2),
(14, '', 'f52d0b679cd1d4f0e6724da48d876f5c.jpg', 'jpg', 'image/jpeg', 76515, 1707293993, 1707293993, 0, 1, 2),
(15, '', '5f29c154adf83525ffde0c6757b5d421.jpg', 'jpg', 'image/jpeg', 164696, 1707295138, 1707295138, 0, 1, 2),
(16, '', '151eeab80d303843389efea7b027843d.jpg', 'jpg', 'image/jpeg', 15004, 1709784030, 1709784030, 0, 1, 3),
(17, '', '28dac59188353634015d85a0826affdc.jpg', 'jpg', 'image/jpeg', 10022, 1709784039, 1709784039, 0, 1, 3),
(18, '', 'f6a44e74ac49f0ca73b0ab9c5941db4a.jpg', 'jpg', 'image/jpeg', 40338, 1709784049, 1709784049, 0, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `nxt_slider_image_lang`
--

CREATE TABLE `nxt_slider_image_lang` (
  `slider_image_id` int(11) NOT NULL,
  `lang_id` varchar(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `html` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `nxt_slider_image_lang`
--

INSERT INTO `nxt_slider_image_lang` (`slider_image_id`, `lang_id`, `title`, `html`) VALUES
(5, 'en', 'Responsive Image One', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s</p>\r\n'),
(5, 'hi', 'उत्तरदायी छवि एक', '<p><strong>लोकप्रिय धारणा के विपरीत, लोरेम इप्सम केवल यादृच्छिक पाठ नहीं है। इसकी जड़ें 45 ईसा पूर्व से शास्त्रीय लैटिन साहित्य के एक टुकड़े में हैं, जो इसे 2000 साल से अधिक पुराना बनाती हैं। रिचर्ड मैकक्लिंटॉक, वर्जीनिया में हैम्पडेन-सिडनी कॉलेज में एक लैटिन प्रोफेसर</strong></p>\r\n'),
(12, 'en', 'Blank and White Scenery', '<p>Blank and White Scenery</p>\r\n'),
(12, 'hi', 'Blank and White Scenery', '<p>Black and White Scenery</p>\r\n'),
(13, 'en', 'Coming Soon Page', '<p>Coming Soon Page</p>\r\n'),
(13, 'hi', 'Coming Soon Page', '<p>Coming Soon Page</p>\r\n'),
(14, 'en', 'Hairy Lady', '<p>Hairy Lady</p>\r\n'),
(14, 'hi', 'Hairy Lady', '<p>Hairy Lady</p>\r\n'),
(15, 'en', 'Home Try', '<p>Home Try</p>\r\n'),
(15, 'hi', 'Home Try', '<p>Home Try</p>\r\n'),
(16, 'en', '', ''),
(16, 'hi', 'Product Image One', '<p _msthash=\"178\" _msttexthash=\"517647\">stProduct Image one again</p>\r\n'),
(17, 'en', 'Product One Image Two', '<p><font _msthash=\"190\" _mstmutation=\"1\" _msttexthash=\"367926\">Product One Image Two</font><font _msthash=\"191\" _mstmutation=\"1\" _msttexthash=\"446160\">Product One Image Twovv</font></p>\r\n'),
(17, 'hi', 'Product One Image Two', '<p><font _msthash=\"178\" _mstmutation=\"1\" _msttexthash=\"367926\"><font _msthash=\"183\" _mstmutation=\"1\" _msttexthash=\"367926\">Product One Image Two&nbsp;</font><font _msthash=\"184\" _mstmutation=\"1\" _msttexthash=\"367926\">Product One Image Two</font><font _msthash=\"185\" _mstmutation=\"1\" _msttexthash=\"367926\">Product One Image Two</font><font _msthash=\"186\" _mstmutation=\"1\" _msttexthash=\"367926\">Product One Image Two</font></font></p>\r\n'),
(18, 'en', 'Product i mage three ', '<p><font _msthash=\"185\" _mstmutation=\"1\" _msttexthash=\"349739\">Product i mage three&nbsp;</font><font _msthash=\"186\" _mstmutation=\"1\" _msttexthash=\"349739\">Product i mage three&nbsp;</font></p>\r\n'),
(18, 'hi', 'Product i mage three ', '<p><font _msthash=\"178\" _mstmutation=\"1\" _msttexthash=\"349739\">Product i mage three&nbsp;</font><font _msthash=\"179\" _mstmutation=\"1\" _msttexthash=\"349739\">Product i mage three&nbsp;</font><font _msthash=\"180\" _mstmutation=\"1\" _msttexthash=\"349739\">Product i mage three&nbsp;</font><font _msthash=\"181\" _mstmutation=\"1\" _msttexthash=\"349739\">Product i mage three&nbsp;</font></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `nxt_social_account`
--

CREATE TABLE `nxt_social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `data` text DEFAULT NULL,
  `code` varchar(32) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_token`
--

CREATE TABLE `nxt_token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `nxt_token`
--

INSERT INTO `nxt_token` (`user_id`, `code`, `created_at`, `type`) VALUES
(8, 'Rcxu8ShIIEknyPYG0zVYuTAlCbnw8EX8', 1702401461, 0),
(10, '4-VVjVwk_dX3l9Fv5BK4fE3uacLo6Vcq', 1702442225, 0),
(12, '1pHXW_bYeqxc3tFCGTh4u6I2OCvrVVb-', 1714824969, 1),
(32, 'rpJ7_o1yb9j4wYOPQ77cI5oJvRrS-Jmz', 1703885427, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nxt_user`
--

CREATE TABLE `nxt_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT 0,
  `user_group_id` int(11) DEFAULT NULL,
  `approved_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `nxt_user`
--

INSERT INTO `nxt_user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `user_group_id`, `approved_at`) VALUES
(8, 'provdigi1@gmail.com', 'provdigi1@gmail.com', '$2y$13$6uX9fxLQvbfwoXUBSI8BZ.vkmdvrnEn1ElPnuyPx6Jdu5FIqRWcCi', 'KGt8JcaqQ1LaWlNA0Q3rEFAytTEnQLHe', 1702401460, NULL, NULL, '::1', 1702401461, 1702401461, 0, NULL, NULL),
(10, 'hello@coderseden.com', 'hello@coderseden.com', '$2y$13$EpU3dtGwyf802g6XaBk2/uzwdgufDpyHSO4.VfQHwNhV7DcEm9gba', 'GdQzN_qdvTyaaaSbMVnRJ6Ct65Ldc00r', 1702442270, NULL, NULL, '::1', 1702442225, 1702442225, 0, NULL, NULL),
(12, 'provdigi@gmail.com', 'provdigi@gmail.com', '$2y$13$hOdTJWxGa7tUeLLm4jkS0.8gPZUY5rsLU1kciX3sg6nLqFue1Ehvi', 'ijWRLD1L2LHxVxB7Bh678W697gVKr-Od', 1702494185, NULL, NULL, '::1', 1702476958, 1702476958, 0, NULL, 1702476958),
(30, 'hello2@coderseden.com', 'hello2@coderseden.com', '$2y$13$YVANK0CG04dyzppC49AK8.R.Iw2tUSkWU1MIMU/6fghoWiqBLVN3m', 'h10hNq8h-5frAzOW_scnls16R0PbnLri', 1702497244, NULL, NULL, '::1', 1702497223, 1702497223, 0, NULL, NULL),
(31, 'hello3@coderseden.com', 'hello3@coderseden.com', '$2y$13$3QY4/DpBvygXZSdsLUSNLO.35JqPQtX7O2eWmuKCMEza4ut8SBaVC', 'KQxNpjTwSb5t5HOihNc22goUAp1jGLKE', 1702497830, NULL, NULL, '::1', 1702497795, 1702497795, 0, NULL, NULL),
(32, 'provdigi@gmail.coma', 'provdigi@gmail.coma', '$2y$13$ibOcVxgsvG3ONxWNX/0HOuRNLvGm3WCud.bvSaxIP7MaRDQ2BTuVe', 'bqXRMMLR8MqtshPKemmQKlCbg-9Yat5I', NULL, NULL, NULL, '::1', 1703885427, 1703885427, 0, NULL, NULL),
(34, 'vara.valluri@gmail.com', 'vara.valluri@gmail.com', '$2y$13$ayhYv8j0raNCrWYUGjj7IeZnV6qkaULAcBil7OoWkaFQlLfMSMzMW', 'CXq-S78r_B2-CIoo9476CtOSPSC4IT9F', 1708095014, NULL, NULL, '::1', 1708094949, 1708094949, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nxt_user_address`
--

CREATE TABLE `nxt_user_address` (
  `id` int(11) NOT NULL,
  `user_profile_id` int(11) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `house` varchar(255) DEFAULT NULL,
  `apartment` varchar(11) DEFAULT NULL,
  `zipcode` int(11) DEFAULT NULL,
  `postoffice` int(6) DEFAULT NULL,
  `contact_person` varchar(225) NOT NULL,
  `contact_mobile1` varchar(16) NOT NULL,
  `contact_mobile2` int(16) NOT NULL,
  `is_default` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nxt_user_address`
--

INSERT INTO `nxt_user_address` (`id`, `user_profile_id`, `country`, `region`, `city`, `street`, `house`, `apartment`, `zipcode`, `postoffice`, `contact_person`, `contact_mobile1`, `contact_mobile2`, `is_default`) VALUES
(1, 2, 'India', 'Telangana', 'Hyderabad', 'Lakshmi Nagar Colony', '16-11-741/D/15, SBI Officers Colony', 'Mathrukrupa', 500036, NULL, '', '', 0, 0),
(2, 5, 'India', 'Meridian Villa,#678,Banjarahills,Hyderabad,TG-85654852,52874563', 'Hyderabad', 'Parvathnagar', '111-14-254/55/4', 'Meghana', 500018, NULL, '', '', 0, 0),
(4, 3, 'India', 'Valluri', 'Hyderabad', '16, SBI Officers Colony Road, Moosarambagh', '12478', 'My House', 500036, NULL, '', '', 0, 0),
(5, 3, 'India', 'Telangana', 'Hyderabad', NULL, 'Ahth ghgh', 'xfghf tydfh', 500036, NULL, 'Hanouji Rehaman Sultani Begum', '(+91)41245242', 0, 0),
(6, 3, 'India', 'Telangana', 'Hyderabad', NULL, 'Sdsfsdfsdsd', 'fwefsdfsdf', 676867, NULL, 'Hanouji Rehaman Sultani Begum', 'g8lyutyu', 45, 0),
(7, 3, 'India', 'Telangana', 'Hyderabad', NULL, '23-45/4', 'Hare ram', 509352, NULL, 'Junaid Khanna', '(+91)95485747675', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nxt_user_group`
--

CREATE TABLE `nxt_user_group` (
  `id` int(11) NOT NULL,
  `user_group_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `slug`, `created_at`, `updated_at`, `enabled`) VALUES
(1, 'index', 1708757313, 1708757313, 1);

-- --------------------------------------------------------

--
-- Table structure for table `page_lang`
--

CREATE TABLE `page_lang` (
  `page_id` int(11) NOT NULL,
  `lang_id` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `description` text DEFAULT NULL,
  `text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_lang`
--

INSERT INTO `page_lang` (`page_id`, `lang_id`, `name`, `title`, `keywords`, `description`, `text`) VALUES
(1, 'en', 'Main', 'Main', '', NULL, NULL),
(1, 'ru', 'Главная', 'Главная', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) NOT NULL DEFAULT '',
  `code` varchar(255) NOT NULL DEFAULT '',
  `price` decimal(11,2) NOT NULL DEFAULT 0.00,
  `old_price` decimal(11,2) NOT NULL DEFAULT 0.00,
  `available` int(11) NOT NULL DEFAULT 1,
  `currency_id` int(11) NOT NULL DEFAULT 1,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `model_id`, `brand_id`, `slug`, `code`, `price`, `old_price`, `available`, `currency_id`, `created_at`, `updated_at`, `position`, `enabled`) VALUES
(1, 1, 0, '', 'BUT24542', 280.00, 532.00, 10, 2, 1710242977, 1712417293, 0, 1),
(2, 2, 0, '', 'BUTSW334923', 246.82, 335.00, 100, 1, 1710325357, 1710325357, 0, 1),
(3, 3, 0, '', 'VNL90345', 245.00, 354.00, 11, 2, 1712417435, 1712417435, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_lang`
--

CREATE TABLE `product_lang` (
  `product_id` int(11) NOT NULL,
  `lang_id` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_lang`
--

INSERT INTO `product_lang` (`product_id`, `lang_id`, `name`, `title`, `keywords`, `description`, `text`) VALUES
(1, 'en', '', '', '', '', ''),
(1, 'hi', '', '', '', '', ''),
(2, 'en', '', '', '', '', ''),
(2, 'hi', '', '', '', '', ''),
(3, 'en', '', '', '', '', ''),
(3, 'hi', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `stamp`
--

CREATE TABLE `stamp` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `imageData` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stamp`
--

INSERT INTO `stamp` (`id`, `name`, `imageData`) VALUES
(0, 'Dummy', '');

-- --------------------------------------------------------

--
-- Table structure for table `stamp_layer`
--

CREATE TABLE `stamp_layer` (
  `id` int(11) NOT NULL,
  `stamp_id` int(11) NOT NULL,
  `layer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dir` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL,
  `tmp` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `file_id`, `user_id`, `dir`, `name`, `tmp`, `created_at`) VALUES
(1, 1, 34, 'other', 'bdba92535c1d9e8d4c4bf739243bb546.jpg', 0, 1708801284),
(2, 2, 34, 'other', 'd61586c02ebb31b3e127f8208cb0c795.png', 0, 1708801348),
(3, 3, 34, 'other', '6cddc47754ffef911c50b6921584e411.jpg', 0, 1710246890),
(4, 4, 34, 'other', '0af8c203cd00eeeede4c74899b3843b9.jpg', 0, 1710246926),
(5, 6, 34, 'other', '7cc8784c44498a205bf556c094237903.jpg', 0, 1710249153),
(6, 7, 34, 'other', '440be16e6577fac91de2fbfee4b91503.jpg', 0, 1710319160),
(7, 8, 34, 'other', '8c8a58fa97c205ff222de3685497742c.jpg', 0, 1712416007);

-- --------------------------------------------------------

--
-- Table structure for table `userauth_user`
--

CREATE TABLE `userauth_user` (
  `id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(60) NOT NULL,
  `password_salt` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anxt_cart`
--
ALTER TABLE `anxt_cart`
  ADD PRIMARY KEY (`sessionId`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_lang`
--
ALTER TABLE `brand_lang`
  ADD PRIMARY KEY (`brand_id`,`lang_id`),
  ADD KEY `fk-brand_lang-lang_id` (`lang_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `category_lang`
--
ALTER TABLE `category_lang`
  ADD PRIMARY KEY (`category_id`,`lang_id`),
  ADD KEY `fk-category_lang-lang_id` (`lang_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `currency_lang`
--
ALTER TABLE `currency_lang`
  ADD PRIMARY KEY (`currency_id`,`lang_id`),
  ADD KEY `fk-currency_lang-lang_id` (`lang_id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_album`
--
ALTER TABLE `gallery_album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-catalog_article_gallery_album-album_id` (`id`);

--
-- Indexes for table `gallery_album_image`
--
ALTER TABLE `gallery_album_image`
  ADD PRIMARY KEY (`image_id`,`album_id`);

--
-- Indexes for table `gallery_cat`
--
ALTER TABLE `gallery_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layer`
--
ALTER TABLE `layer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-layer-type` (`type_id`),
  ADD KEY `fk-stamp-id` (`stamp_id`);

--
-- Indexes for table `layer_type`
--
ALTER TABLE `layer_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_lang`
--
ALTER TABLE `model_lang`
  ADD PRIMARY KEY (`model_id`,`lang_id`),
  ADD KEY `fk-model_lang-lang_id` (`lang_id`);

--
-- Indexes for table `nxt_cart`
--
ALTER TABLE `nxt_cart`
  ADD PRIMARY KEY (`sessionId`);

--
-- Indexes for table `nxt_image`
--
ALTER TABLE `nxt_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nxt_language`
--
ALTER TABLE `nxt_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nxt_migration`
--
ALTER TABLE `nxt_migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `nxt_profile`
--
ALTER TABLE `nxt_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_user_id:user_id` (`user_id`);

--
-- Indexes for table `nxt_slider`
--
ALTER TABLE `nxt_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nxt_slider_image`
--
ALTER TABLE `nxt_slider_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nxt_slider_image_lang`
--
ALTER TABLE `nxt_slider_image_lang`
  ADD PRIMARY KEY (`slider_image_id`,`lang_id`),
  ADD KEY `fk-nxt_slider_image_lang-lang_id` (`lang_id`);

--
-- Indexes for table `nxt_social_account`
--
ALTER TABLE `nxt_social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indexes for table `nxt_token`
--
ALTER TABLE `nxt_token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indexes for table `nxt_user`
--
ALTER TABLE `nxt_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`),
  ADD KEY `user:user_group_id` (`user_group_id`);

--
-- Indexes for table `nxt_user_address`
--
ALTER TABLE `nxt_user_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_address_user_profile_id:profile_id` (`user_profile_id`);

--
-- Indexes for table `nxt_user_group`
--
ALTER TABLE `nxt_user_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_lang`
--
ALTER TABLE `page_lang`
  ADD PRIMARY KEY (`page_id`,`lang_id`),
  ADD KEY `fk-page_lang-lang_id` (`lang_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model_id` (`model_id`);

--
-- Indexes for table `product_lang`
--
ALTER TABLE `product_lang`
  ADD PRIMARY KEY (`product_id`,`lang_id`),
  ADD KEY `fk-product_lang-lang_id` (`lang_id`);

--
-- Indexes for table `stamp`
--
ALTER TABLE `stamp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stamp_layer`
--
ALTER TABLE `stamp_layer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-layer-id` (`layer_id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-upload-file_id` (`file_id`),
  ADD KEY `fk-upload-user_id` (`user_id`);

--
-- Indexes for table `userauth_user`
--
ALTER TABLE `userauth_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gallery_album`
--
ALTER TABLE `gallery_album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gallery_cat`
--
ALTER TABLE `gallery_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `layer`
--
ALTER TABLE `layer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `layer_type`
--
ALTER TABLE `layer_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nxt_image`
--
ALTER TABLE `nxt_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nxt_profile`
--
ALTER TABLE `nxt_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nxt_slider`
--
ALTER TABLE `nxt_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nxt_slider_image`
--
ALTER TABLE `nxt_slider_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `nxt_social_account`
--
ALTER TABLE `nxt_social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nxt_user`
--
ALTER TABLE `nxt_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `nxt_user_address`
--
ALTER TABLE `nxt_user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nxt_user_group`
--
ALTER TABLE `nxt_user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stamp`
--
ALTER TABLE `stamp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stamp_layer`
--
ALTER TABLE `stamp_layer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `userauth_user`
--
ALTER TABLE `userauth_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nxt_slider_image_lang`
--
ALTER TABLE `nxt_slider_image_lang`
  ADD CONSTRAINT `fk-nxt_slider_image_lang-lang_id` FOREIGN KEY (`lang_id`) REFERENCES `nxt_language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-nxt_slider_image_lang-slider_image_id` FOREIGN KEY (`slider_image_id`) REFERENCES `nxt_slider_image` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
