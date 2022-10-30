-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 23, 2021 at 12:01 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sulaiman_d5si7n`
--

-- --------------------------------------------------------

--
-- Table structure for table `password_recovery`
--

CREATE TABLE `password_recovery` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `ipaddress` varchar(250) COLLATE utf8_bin NOT NULL,
  `request_time` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '0000-00-00 00:00:00',
  `method` varchar(10) COLLATE utf8_bin NOT NULL COMMENT 'phone or email',
  `status` int(11) NOT NULL COMMENT '0 = failed, 1 = mail sent, 2 = sucess'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='password will recover using sms only through verified phone number.' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `password_recovery`
--

INSERT INTO `password_recovery` (`id`, `userId`, `ipaddress`, `request_time`, `method`, `status`) VALUES
(1, 9, '103.222.23.37', '2019-10-23 04:23:28', 'Phone', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activities`
--

CREATE TABLE `tbl_activities` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `module` text COLLATE utf8_unicode_ci,
  `module_field` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `activity_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `icon` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'fa fa-asterisk',
  `deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_activities`
--

INSERT INTO `tbl_activities` (`id`, `user_id`, `module`, `module_field`, `description`, `activity_date_time`, `icon`, `deleted`) VALUES
(1, 3, 'Drug Generic', 'User Drug Generic', 'User Added Drug Generic', '2019-09-10 20:10:16', 'fa fa-check-circle', 0),
(3, 3, 'Drug Company', 'User Drug Company', 'User Added Drug Company', '2019-09-10 20:26:41', 'fa fa-cube', 0),
(4, 3, 'Drug Company', 'User Drug Company', 'User Delete Drug Company', '2019-09-10 20:34:02', 'fa fa-cube', 0),
(5, 3, 'User Profile', 'User Profile Information', 'User Profile Updated Successfully', '2019-09-11 15:23:27', 'fa fa-user', 0),
(6, 3, 'User Profile', 'User Profile Information', 'User Profile Updated Successfully', '2019-09-11 15:24:39', 'fa fa-user', 0),
(7, 3, 'User Profile', 'User Profile Information', 'User Profile Updated Successfully', '2019-09-11 16:14:29', 'fa fa-user', 0),
(8, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 19:40:50', 'fa fa-file', 0),
(9, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 19:46:58', 'fa fa-file', 0),
(10, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 19:56:47', 'fa fa-file', 0),
(11, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 19:56:52', 'fa fa-file', 0),
(12, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 19:58:02', 'fa fa-file', 0),
(13, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 20:01:19', 'fa fa-file', 0),
(14, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 20:08:18', 'fa fa-file', 0),
(15, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 20:08:22', 'fa fa-file', 0),
(16, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 20:09:30', 'fa fa-file', 0),
(17, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 20:13:52', 'fa fa-file', 0),
(18, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 20:13:57', 'fa fa-file', 0),
(19, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 20:42:36', 'fa fa-file', 0),
(20, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 20:42:40', 'fa fa-file', 0),
(21, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 20:42:43', 'fa fa-file', 0),
(22, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 22:29:56', 'fa fa-file', 0),
(23, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 22:30:01', 'fa fa-file', 1),
(24, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 22:30:04', 'fa fa-file', 1),
(25, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 22:30:08', 'fa fa-file', 1),
(26, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-12 22:30:13', 'fa fa-file', 1),
(27, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-14 16:10:57', 'fa fa-file', 1),
(28, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-14 16:11:01', 'fa fa-file', 1),
(29, 3, 'Chief Complaints', 'User Chief Complaints', 'User Delete Chief Complaints', '2019-09-14 16:12:30', 'fa fa-file', 1),
(30, 1, 'login', 'login successful', '::1', '2020-02-02 01:09:42', 'fa fa-unlock-alt', 0),
(31, 2, 'login', 'login successful', '::1', '2020-02-02 01:10:10', 'fa fa-unlock-alt', 0),
(32, 3, 'login', 'login successful', '103.222.23.37', '2020-02-05 14:42:53', 'fa fa-unlock-alt', 0),
(33, 3, 'login', 'login successful', '103.218.26.73', '2020-02-05 16:01:16', 'fa fa-unlock-alt', 0),
(34, 3, 'login', 'login successful', '27.131.12.205', '2020-02-06 05:52:42', 'fa fa-unlock-alt', 0),
(35, 3, 'login', 'login successful', '27.131.12.205', '2020-02-06 06:09:42', 'fa fa-unlock-alt', 0),
(36, 3, 'login', 'login successful', '27.131.12.205', '2020-02-10 05:49:26', 'fa fa-unlock-alt', 0),
(37, 3, 'login', 'login successful', '27.131.12.205', '2020-02-11 06:55:59', 'fa fa-unlock-alt', 0),
(38, 3, 'login', 'login successful', '103.222.23.37', '2020-02-11 08:43:07', 'fa fa-unlock-alt', 0),
(39, 2, 'login', 'login successful', '103.222.23.37', '2020-02-11 08:46:50', 'fa fa-unlock-alt', 0),
(40, 2, 'login', 'login successful', '::1', '2020-02-11 07:34:56', 'fa fa-unlock-alt', 0),
(41, 2, 'profile', 'profile Update', 'User Update Profile Info', '2020-02-11 12:35:15', 'fa fa-user', 0),
(42, 2, 'profile', 'profile Update', 'User Update Profile Info', '2020-02-11 12:35:25', 'fa fa-user', 0),
(43, 1, 'login', 'login successful', '::1', '2020-02-11 23:18:29', 'fa fa-unlock-alt', 0),
(44, 2, 'login', 'login successful', '::1', '2020-02-12 01:45:21', 'fa fa-unlock-alt', 0),
(45, 2, 'image', 'User image', 'User Add New Image', '2020-02-12 06:53:24', 'fa fa-picture-o', 0),
(46, 2, 'image', 'User image', 'User Update Image', '2020-02-12 06:55:00', 'fa fa-picture-o', 0),
(47, 2, 'image', 'User image', 'User Update Image', '2020-02-12 09:10:31', 'fa fa-picture-o', 0),
(48, 2, 'image', 'User image', 'User Add New Image', '2020-02-12 09:25:29', 'fa fa-picture-o', 0),
(49, 1, 'login', 'login successful', '::1', '2020-02-12 23:11:49', 'fa fa-unlock-alt', 0),
(50, 2, 'login', 'login successful', '::1', '2020-02-12 23:21:30', 'fa fa-unlock-alt', 0),
(51, 2, 'image', 'User image', 'User Add New Image', '2020-02-13 04:22:51', 'fa fa-picture-o', 0),
(52, 2, 'image', 'User image', 'User Update Image', '2020-02-13 04:31:13', 'fa fa-picture-o', 0),
(53, 2, 'favourite', 'User favourite', 'User favourite Picture Updated', '2020-02-13 04:31:53', 'fa fa-heart', 0),
(54, 2, 'wishlist', 'User wishlist', 'User Wishlist Added', '2020-02-13 04:32:06', 'fa fa-heart', 0),
(55, 2, 'wishlist', 'User wishlist', 'User Wishlist Updated', '2020-02-13 04:32:11', 'fa fa-heart', 0),
(56, 1, 'login', 'login successful', '103.222.23.37', '2020-02-15 19:22:49', 'fa fa-unlock-alt', 0),
(57, 3, 'login', 'login successful', '103.120.202.98', '2020-02-15 19:28:23', 'fa fa-unlock-alt', 0),
(58, 3, 'login', 'login successful', '27.131.12.205', '2020-02-16 06:12:52', 'fa fa-unlock-alt', 0),
(59, 1, 'login', 'login successful', '103.222.23.37', '2020-02-16 11:04:47', 'fa fa-unlock-alt', 0),
(60, 2, 'login', 'login successful', '103.222.23.37', '2020-02-16 11:28:09', 'fa fa-unlock-alt', 0),
(61, 3, 'login', 'login successful', '103.218.26.73', '2020-02-22 17:18:17', 'fa fa-unlock-alt', 0),
(62, 3, 'login', 'login successful', '27.131.12.205', '2020-03-01 05:54:16', 'fa fa-unlock-alt', 0),
(63, 1, 'login', 'login successful', '103.76.46.99', '2020-03-10 10:19:12', 'fa fa-unlock-alt', 0),
(64, 1, 'login', 'login successful', '103.76.46.104', '2020-03-10 12:28:27', 'fa fa-unlock-alt', 0),
(65, 1, 'login', 'login successful', '103.76.46.99', '2020-03-10 12:48:27', 'fa fa-unlock-alt', 0),
(66, 1, 'login', 'login successful', '103.76.46.99', '2020-03-11 05:21:28', 'fa fa-unlock-alt', 0),
(67, 1, 'login', 'login successful', '103.76.46.99', '2020-03-11 05:26:34', 'fa fa-unlock-alt', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_common_pages`
--

CREATE TABLE `tbl_common_pages` (
  `id` int(11) NOT NULL,
  `is_menu` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 = no, 1 = yes',
  `priority` int(11) NOT NULL COMMENT 'max will top.',
  `parent_page_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(20) NOT NULL,
  `title` text NOT NULL,
  `body` text NOT NULL,
  `attatched` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_common_pages`
--

INSERT INTO `tbl_common_pages` (`id`, `is_menu`, `priority`, `parent_page_id`, `name`, `title`, `body`, `attatched`) VALUES
(5, 1, 11, 0, 'about', 'ABOUT US', '<h2 style=\"font-style:italic; text-align:justify\"><strong><small><big><span style=\"font-size:14px\">Sulaimansupplies, Country first ever service provider of procurement tracking.Our prime focus is to simplify the supply hassles of procurement service the best of product quality,quantity management and time saving.We bring all that you need for your hotel supplies under one roof.&nbsp;&nbsp;</span></big></small></strong></h2>\r\n\r\n<h2 style=\"font-style:italic; text-align:justify\"><strong><small><big><span style=\"font-size:14px\">We are providing highest transparency with genuine products to pick from one open platfrom with gets door-step delivery.Everyday our website&#39;s(www.sulaimansupplies.com) retain service and skilled support team providing a-z hotel supply solution to clients within just one phone call.</span></big></small></strong></h2>\r\n', 'assets/pageSettings/IMGWA_20201006222657.jpg'),
(35, 1, 20, 5, 'history', 'History', '<p>To facilitate global trade between worldwide buyers and Chinese suppliers.To provide accurate and dependable information on Chinese products and suppliers to global buyers.To help buyers and suppliers communicate and do business with each other effectively and efficiently</p>\r\n', ''),
(36, 1, 10, 5, 'mission', 'Mission', '<p>To facilitate global trade between worldwide buyers and Chinese suppliers.To provide accurate and dependable information on Chinese products and suppliers to global buyers.To help buyers and suppliers communicate and do business with each other effectively and efficiently</p>\r\n', ''),
(37, 1, 10, 0, 'vision', 'Vision', '<p>To facilitate global trade between worldwide buyers and Chinese suppliers.To provide accurate and dependable information on Chinese products and suppliers to global buyers.To help buyers and suppliers communicate and do business with each other effectively and efficiently</p>\r\n', ''),
(38, 1, 3, 5, 'servicetab1', 'Conference Room & Decoration ', '<p>Lorem ipsum dolor gtsitrty amet, consectetur adipisicing elit, sed do eiusm tempor &nbsp;incidid</p>\r\n', 'assets/pageSettings/conference_20201005125922.jpg'),
(39, 1, 2, 0, 'servicetab2', 'Room Decoration', '<p>Lorem ipsum dolor rtysittg amet, consectetur adipisicing elit, sed do eiusm tempor incididunt</p>\r\n', 'assets/pageSettings/bedroom_20201005131002.jpg'),
(40, 1, 2, 0, 'servicetab3', 'Table and  Chair', '<p>Lorem ipsum dolor frsit frtgamet, consectetur adipisicing elit, sed do eiusm tempor doloreut</p>\r\n', 'assets/pageSettings/dining_20201005131632.jpg'),
(41, 1, 2, 0, 'servicetab4', 'Waiting Room Decoration', '<p>Lorem ipsum dolor frsit frtramet, consectetur adipisicing elit, sed do eiusm tempordoloreut</p>\r\n', 'assets/pageSettings/h_20201005123659.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_divission`
--

CREATE TABLE `tbl_divission` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_divission`
--

INSERT INTO `tbl_divission` (`id`, `name`) VALUES
(1, 'ঢাকা'),
(2, 'রাজশাহী'),
(3, 'চট্টগ্রাম'),
(4, 'সিলেট'),
(5, 'খুলনা'),
(6, 'বরিশাল'),
(7, 'রংপুর'),
(8, 'ময়মনসিংহ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id` int(11) NOT NULL,
  `gallery_category_id` int(11) NOT NULL,
  `path` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `title` text NOT NULL,
  `type` varchar(10) NOT NULL COMMENT 'vidoe, photo',
  `priority` int(11) NOT NULL DEFAULT '1' COMMENT 'max will top',
  `insert_time` varchar(20) NOT NULL DEFAULT '0000-00-00 00:00',
  `insert_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `gallery_category_id`, `path`, `title`, `type`, `priority`, `insert_time`, `insert_by`) VALUES
(38, 19, 'assets/galleryPhoto/music_20201003122225.jpg', 'MUSIC CONCERT', 'Photo', 1, '2020-10-03 12:22', 1),
(39, 20, 'assets/galleryPhoto/IMGWA_20201005122550.jpg', 'BIRTHDAY PARTY', 'Photo', 1, '2020-10-03 12:25', 1),
(40, 21, 'assets/galleryPhoto/management_20201003122713.jpg', 'MANAGEMENT CONFERENCES', 'Photo', 1, '2020-10-03 12:27', 1),
(41, 22, 'assets/galleryPhoto/wedding_20201003122923.jpg', 'WEEDING PARTY', 'Photo', 1, '2020-10-03 12:29', 1),
(42, 23, 'assets/galleryPhoto/table_20201003123200.jpg', 'MANAGEMENT CONFERENCES', 'Photo', 1, '2020-10-03 12:32', 1),
(44, 21, 'assets/galleryPhoto/IMGWA_20201005113857.jpg', '', 'Photo', 2, '2020-10-05 11:38', 1),
(45, 21, 'assets/galleryPhoto/IMGWA_20201005113842.jpg', '', 'Photo', 3, '2020-10-05 11:38', 1),
(46, 21, 'assets/galleryPhoto/IMGWA_20201005114002.jpg', '', 'Photo', 4, '2020-10-05 11:40', 1),
(47, 21, 'assets/galleryPhoto/IMGWA_20201005114124.jpg', '', 'Photo', 5, '2020-10-05 11:41', 1),
(48, 20, 'assets/galleryPhoto/IMGWA_20201005114553.jpg', '', 'Photo', 2, '2020-10-05 11:45', 1),
(49, 22, 'assets/galleryPhoto/IMGWA_20201005114717.jpg', '', 'Photo', 3, '2020-10-05 11:47', 1),
(50, 19, 'assets/galleryPhoto/IMGWA_20201005114832.jpg', '', 'Photo', 5, '2020-10-05 11:48', 1),
(51, 23, 'assets/galleryPhoto/IMGWA_20201005121326.jpg', '', 'Photo', 6, '2020-10-05 12:13', 1),
(52, 23, 'assets/galleryPhoto/IMGWA_20201005121348.jpg', '', 'Photo', 0, '2020-10-05 12:13', 1),
(53, 23, 'assets/galleryPhoto/IMGWA_20201005121456.jpg', '', 'Photo', 0, '2020-10-05 12:14', 1),
(54, 22, 'assets/galleryPhoto/IMGWA_20201005121828.jpg', '', 'Photo', 0, '2020-10-05 12:18', 1),
(55, 22, 'assets/galleryPhoto/IMGWA_20201005121930.jpg', '', 'Photo', 0, '2020-10-05 12:19', 1),
(56, 20, 'assets/galleryPhoto/IMGWA_20201005122353.jpg', '', 'Photo', 0, '2020-10-05 12:23', 1),
(57, 20, 'assets/galleryPhoto/IMGWA_20201005122608.jpg', '', 'Photo', 0, '2020-10-05 12:26', 1),
(58, 20, 'assets/galleryPhoto/IMGWA_20201005122725.jpg', '', 'Photo', 0, '2020-10-05 12:27', 1),
(59, 19, 'assets/galleryPhoto/IMGWA_20201005123030.jpg', '', 'Photo', 0, '2020-10-05 12:30', 1),
(60, 19, 'assets/galleryPhoto/IMGWA_20201005123142.jpg', '', 'Photo', 0, '2020-10-05 12:31', 1),
(61, 19, 'assets/galleryPhoto/rr_20201005184438.jpg', 'aaaaa', 'Photo', 0, '2020-10-05 18:44', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery_category`
--

CREATE TABLE `tbl_gallery_category` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_bin NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '1' COMMENT 'max will top',
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_gallery_category`
--

INSERT INTO `tbl_gallery_category` (`id`, `name`, `priority`, `last_update`, `update_by`) VALUES
(19, 'hall room decoration', 5, '2020-10-03 06:13:56', 1),
(20, 'Room decoration', 4, '2020-10-03 06:14:48', 1),
(21, 'Table', 3, '2020-10-03 06:15:33', 1),
(22, 'Conferece room', 2, '2020-10-03 06:15:58', 1),
(23, 'Chair', 1, '2020-10-03 06:16:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_general`
--

CREATE TABLE `tbl_general` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_bin NOT NULL,
  `value` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_general`
--

INSERT INTO `tbl_general` (`id`, `name`, `value`) VALUES
(50, 'contact_number', '0536303643'),
(51, 'website', 'http://sulaimansupplies.com'),
(52, 'address', 'Al-Awali, Near Amirah Shaikha Mosque, Al Madina Al Munawara'),
(53, 'contact_mail', 'info@sulaimansupplies.com, zamanksa5@gmail.com'),
(59, 'slider_bottom_title', 'We Works for Hotel and New Hotels'),
(60, 'body_title', 'GET 15% OFF ON ANY OTHER SERVICES......'),
(61, 'facebook_link', 'https://www.facebook.com/Sulaimansupplies-106058121261191/'),
(62, 'twitter_link', 'https://twitter.com/hrsoftbd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mail_send_setting`
--

CREATE TABLE `tbl_mail_send_setting` (
  `id` int(11) NOT NULL,
  `setting_name` text COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_mail_send_setting`
--

INSERT INTO `tbl_mail_send_setting` (`id`, `setting_name`, `value`) VALUES
(1, 'protocol', 'smtp'),
(2, 'smtp_host', 'ssl://dallas117.mysitehosted.com'),
(3, 'smtp_port', '465'),
(4, 'smtp_user', 'asdasdasd.com'),
(5, 'smtp_pass', 'asdasd'),
(6, 'mailtype', 'text'),
(7, 'charset', 'iso-8859-1'),
(8, 'wordwrap', 'TRUE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_our_client`
--

CREATE TABLE `tbl_our_client` (
  `id` int(11) NOT NULL,
  `client_name` text COLLATE utf8_unicode_ci NOT NULL,
  `logo` text COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '1' COMMENT 'max will top',
  `insert_by` int(11) NOT NULL,
  `insert_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_our_client`
--

INSERT INTO `tbl_our_client` (`id`, `client_name`, `logo`, `priority`, `insert_by`, `insert_time`) VALUES
(7, 'RightSell', 'assets/clientLogo/s_20201005140914.jpg', 1, 1, '2020-10-03 11:01'),
(8, 'HasTech', 'assets/clientLogo/images_20201005130809.jpg', 5, 1, '2020-10-03 11:04'),
(9, 'devitimes', 'assets/clientLogo/_20201005140827.png', 3, 1, '2020-10-03 11:05'),
(10, 'BootExpress', 'assets/clientLogo/logo_20201005130634.png', 4, 1, '2020-10-03 11:12'),
(11, 'codecarnival', 'assets/clientLogo/_20201005140642.png', 2, 1, '2020-10-03 11:12'),
(12, 'dar al iman intercontinental madinah ', 'assets/clientLogo/beef_20201005193452.png', 100, 3, '2020-10-05 19:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_our_work`
--

CREATE TABLE `tbl_our_work` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` text COLLATE utf8_unicode_ci NOT NULL,
  `insert_by` int(11) NOT NULL,
  `insert_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_our_work`
--

INSERT INTO `tbl_our_work` (`id`, `client_id`, `title`, `photo`, `insert_by`, `insert_time`) VALUES
(8, 7, 'Near Place Dummy Title', 'assets/workPhoto/nearPlace_20201003120025.jpg', 1, '2020-10-03 12:00'),
(9, 8, 'Paris Rail Day Trip', 'assets/workPhoto/parisRally_20201003120104.jpg', 1, '2020-10-03 12:01'),
(10, 9, 'London Eye Ticket with Skip', 'assets/workPhoto/londoneye_20201003120138.jpg', 1, '2020-10-03 12:01'),
(11, 10, 'Warner Bros. Studio Tour', 'assets/workPhoto/warner_20201003120217.jpg', 1, '2020-10-03 12:02'),
(12, 11, 'Madame Tussauds London', 'assets/workPhoto/madame_20201003120240.jpg', 1, '2020-10-03 12:02'),
(13, 7, 'Thames Hop-On Hop-Off', 'assets/workPhoto/thames_20201003120316.jpg', 1, '2020-10-03 12:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `parent_service_id` int(11) NOT NULL,
  `service_details` text COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '1' COMMENT 'max will top',
  `total_view` int(11) NOT NULL DEFAULT '1',
  `insert_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00',
  `insert_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`id`, `name`, `parent_service_id`, `service_details`, `priority`, `total_view`, `insert_time`, `insert_by`) VALUES
(1, 'KITCHEN ITEMS', 0, '', 6, 17, '2020-10-01 18:21', 1),
(2, 'BAD-ROOM ITEMS', 0, '', 9, 39, '2020-10-01 18:20', 1),
(3, 'BATH- ROOM ', 0, '', 8, 19, '2020-10-01 18:20', 1),
(4, 'RESTAURANTS ITEMS', 0, '<p> </p>\r\n\r\n<p> </p>\r\n', 7, 1, '2020-10-01 18:21', 1),
(5, 'Single room docoration', 1, '<p>Lorem ipsum dolor sit amet, consectetur adipisi cing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut the enim ad minim veniam, quis nostrud exer citation ullamco laboris nisi ut aliquip ex ea com modo conse quat. Duis aute irure dolor in reprehend erit in volupt ate velit esse cillum dolore eu fugiat nulla pari atur. Except eur sint occa ecat cupi datat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit volup tatem accusantium the doloremque lauda ntium, totam rem aper iam, eaque ipsa quae</p>\r\n\r\n<p>Nemo enim ipsam voluptatem quia volu ptas sit asper natur aut odit aut fugit, sed quia consequ untur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolo rem ipsum quia dolor sit amet, conse ctetur, adipisci velit, sed quia a non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi dunt ut labore et dolore magna aliqua. Ut new newenim ad im veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>\r\n', 10, 63, '2020-10-01 18:19', 1),
(7, 'Royal Suit decoration', 2, '<p>dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>\r\n', 0, 23, '2020-10-01 18:23', 1),
(11, 'Meeting Place', 3, '<p>Lorem ipsum dolor sit amet, consectetur adipisi cing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut the enim ad minim veniam, quis nostrud exer citation ullamco laboris nisi ut aliquip ex ea com modo conse quat. Duis aute irure dolor in reprehend erit in volupt ate velit esse cillum dolore eu fugiat nulla pari atur. Except eur sint occa ecat cupi datat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit volup tatem accusantium the doloremque lauda ntium, totam rem aper iam, eaque ipsa quae</p>\r\n\r\n<p>Nemo enim ipsam voluptatem quia volu ptas sit asper natur aut odit aut fugit, sed quia consequ untur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolo rem ipsum quia dolor sit amet, conse ctetur, adipisci velit, sed quia a non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>\r\n', 4, 25, '2020-10-05 11:02', 1),
(12, 'Waiting Place', 3, '<p>Lorem ipsum dolor sit amet, consectetur adipisi cing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut the enim ad minim veniam, quis nostrud exer citation ullamco laboris nisi ut aliquip ex ea com modo conse quat. Duis aute irure dolor in reprehend erit in volupt ate velit esse cillum dolore eu fugiat nulla pari atur. Except eur sint occa ecat cupi datat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit volup tatem accusantium the doloremque lauda ntium, totam rem aper iam, eaque ipsa quae</p>\r\n\r\n<p>Nemo enim ipsam voluptatem quia volu ptas sit asper natur aut odit aut fugit, sed quia consequ untur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolo rem ipsum quia dolor sit amet, conse ctetur, adipisci velit, sed quia a non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi dunt ut labore et dolore magna aliqua. Ut new newenim ad im veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>\r\n', 5, 19, '2020-10-05 11:07', 1),
(14, 'Double Bed Decoration', 1, '<p>Lorem ipsum dolor sit amet, consectetur adipisi cing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut the enim ad minim veniam, quis nostrud exer citation ullamco laboris nisi ut aliquip ex ea com modo conse quat. Duis aute irure dolor in reprehend erit in volupt ate velit esse cillum dolore eu fugiat nulla pari atur. Except eur sint occa ecat cupi datat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit volup tatem accusantium the doloremque lauda ntium, totam rem aper iam, eaque ipsa quae</p>\r\n\r\n<p>Nemo enim ipsam voluptatem quia volu ptas sit asper natur aut odit aut fugit, sed quia consequ untur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolo rem ipsum quia dolor sit amet, conse ctetur, adipisci velit, sed quia a non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi dunt ut labore et dolore magna aliqua. Ut new newenim ad im veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>\r\n', 5, 10, '2020-10-05 11:35', 1),
(15, 'Duplex Bed Room', 1, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi dunt ut labore et dolore magna aliqua. Ut new newenim ad im veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>\r\n', 6, 24, '2020-10-05 11:40', 1),
(16, 'Glasses', 2, '<p>Lorem ipsum dolor sit amet, consectetur adipisi cing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut the enim ad minim veniam, quis nostrud exer citation ullamco laboris nisi ut aliquip ex ea com modo conse quat. Duis aute irure dolor in reprehend erit in volupt ate velit esse cillum dolore eu fugiat nulla pari atur. Except eur sint occa ecat cupi datat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit volup tatem accusantium the doloremque lauda ntium, totam rem aper iam, eaque ipsa quae</p>\r\n\r\n<p>Nemo enim ipsam voluptatem quia volu ptas sit asper natur aut odit aut fugit, sed quia consequ untur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolo rem ipsum quia dolor sit amet, conse ctetur, adipisci velit, sed quia a non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi dunt ut labore et dolore magna aliqua. Ut new newenim ad im veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>\r\n', 5, 40, '2020-10-05 11:47', 1),
(17, 'Fresh Room', 2, '<p>Lorem ipsum dolor sit amet, consectetur adipisi cing elit, sed do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut the enim ad minim veniam, quis nostrud exer citation ullamco laboris nisi ut aliquip ex ea com modo conse quat. Duis aute irure dolor in reprehend erit in volupt ate velit esse cillum dolore eu fugiat nulla pari atur. Except eur sint occa ecat cupi datat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit volup tatem accusantium the doloremque lauda ntium, totam rem aper iam, eaque ipsa quae</p>\r\n\r\n<p>Nemo enim ipsam voluptatem quia volu ptas sit asper natur aut odit aut fugit, sed quia consequ untur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolo rem ipsum quia dolor sit amet, conse ctetur, adipisci velit, sed quia a non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi dunt ut labore et dolore magna aliqua. Ut new newenim ad im veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>\r\n', 4, 275, '2020-10-05 11:56', 1),
(18, 'Conference Room', 3, '<p>Nemo enim ipsam voluptatem quia volu ptas sit asper natur aut odit aut fugit, sed quia consequ untur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolo rem ipsum quia dolor sit amet, conse ctetur, adipisci velit, sed quia a non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>\r\n', 1, 8, '2020-10-05 12:10', 1),
(19, 'Suit Room ', 1, '<p>fghfg hf ghf ghghfg hfg hfg hfgh gh</p>\r\n', 1, 7, '2020-10-05 18:39', 3),
(20, 'LOBBY', 0, '<p>lobby </p>\r\n', 100, 44, '2020-10-05 18:41', 3),
(21, 'STANDING ASHTRAY', 20, '<p>aa</p>\r\n', 10, 23, '2020-10-05 18:57', 3),
(22, 'HAND RELL BASE', 20, '', 9, 10, '2020-10-05 19:04', 3),
(23, 'OUT LET STAND', 20, '', 7, 8, '2020-10-05 19:08', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_photo`
--

CREATE TABLE `tbl_service_photo` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `photo` text COLLATE utf8_unicode_ci NOT NULL,
  `inser_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00',
  `insert_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_service_photo`
--

INSERT INTO `tbl_service_photo` (`id`, `service_id`, `photo`, `inser_time`, `insert_by`) VALUES
(38, 5, 'assets/servicePhoto/l_20201005000216.jpg', '2020-10-05 00:02', 1),
(42, 5, 'assets/servicePhoto/l_20201005000500.jpg', '2020-10-05 00:05', 1),
(46, 7, 'assets/servicePhoto/_20201005010601.jpg', '2020-10-05 01:06', 1),
(48, 12, 'assets/servicePhoto/IMGWA_20201005110726.jpg', '2020-10-05 11:07', 1),
(49, 13, 'assets/servicePhoto/IMGWA_20201005110907.jpg', '2020-10-05 11:09', 1),
(50, 12, 'assets/servicePhoto/IMGWA_20201005111511.jpg', '2020-10-05 11:15', 1),
(53, 12, 'assets/servicePhoto/Luxurioushallinteriordesign_20201005112252.jpg', '2020-10-05 11:22', 1),
(54, 11, 'assets/servicePhoto/x_20201005112426.jpg', '2020-10-05 11:24', 1),
(57, 11, 'assets/servicePhoto/IMGWA_20201005112708.jpg', '2020-10-05 11:27', 1),
(58, 12, 'assets/servicePhoto/IMGWA_20201005113139.jpg', '2020-10-05 11:31', 1),
(60, 14, 'assets/servicePhoto/IMGWA_20201005113501.jpg', '2020-10-05 11:35', 1),
(61, 14, 'assets/servicePhoto/IMGWA_20201005113525.jpg', '2020-10-05 11:35', 1),
(62, 14, 'assets/servicePhoto/IMGWA_20201005113613.jpg', '2020-10-05 11:36', 1),
(63, 14, 'assets/servicePhoto/IMGWA_20201005113627.jpg', '2020-10-05 11:36', 1),
(64, 14, 'assets/servicePhoto/beaabbabfeededdaa_20201005113745.jpg', '2020-10-05 11:37', 1),
(65, 15, 'assets/servicePhoto/IMGWA_20201005114051.jpg', '2020-10-05 11:40', 1),
(66, 15, 'assets/servicePhoto/IMGWA_20201005114110.jpg', '2020-10-05 11:41', 1),
(67, 15, 'assets/servicePhoto/IMGWA_20201005114132.jpg', '2020-10-05 11:41', 1),
(68, 15, 'assets/servicePhoto/IMGWA_20201005114149.jpg', '2020-10-05 11:41', 1),
(69, 15, 'assets/servicePhoto/MSRTDuplexchMoanaBlackstone_20201005114256.jpg', '2020-10-05 11:42', 1),
(71, 16, 'assets/servicePhoto/photobbfd_20201005114846.jpg', '2020-10-05 11:48', 1),
(72, 16, 'assets/servicePhoto/StandingFittings_20201005114856.jpg', '2020-10-05 11:48', 1),
(73, 16, 'assets/servicePhoto/photoafbfa_20201005114924.jpg', '2020-10-05 11:49', 1),
(74, 16, 'assets/servicePhoto/Image_20201005114947.jpg', '2020-10-05 11:49', 1),
(75, 16, 'assets/servicePhoto/bathroomremodelingdesignideas_20201005115114.jpg', '2020-10-05 11:51', 1),
(76, 17, 'assets/servicePhoto/b_20201005115656.jpg', '2020-10-05 11:56', 1),
(77, 17, 'assets/servicePhoto/b_20201005115710.jpg', '2020-10-05 11:57', 1),
(78, 17, 'assets/servicePhoto/b_20201005115729.jpg', '2020-10-05 11:57', 1),
(79, 17, 'assets/servicePhoto/b_20201005115741.jpg', '2020-10-05 11:57', 1),
(80, 17, 'assets/servicePhoto/b_20201005115751.jpg', '2020-10-05 11:57', 1),
(81, 18, 'assets/servicePhoto/h_20201005121005.jpg', '2020-10-05 12:10', 1),
(82, 18, 'assets/servicePhoto/h_20201005121043.jpg', '2020-10-05 12:10', 1),
(83, 18, 'assets/servicePhoto/h_20201005121052.jpg', '2020-10-05 12:10', 1),
(84, 18, 'assets/servicePhoto/h_20201005121105.jpg', '2020-10-05 12:11', 1),
(85, 18, 'assets/servicePhoto/h_20201005121118.jpg', '2020-10-05 12:11', 1),
(86, 11, 'assets/servicePhoto/h_20201005121241.jpg', '2020-10-05 12:12', 1),
(89, 12, 'assets/servicePhoto/waitting_20201005144327.jpg', '2020-10-05 14:43', 1),
(90, 5, 'assets/servicePhoto/single_20201005145139.jpg', '2020-10-05 14:51', 1),
(93, 5, 'assets/servicePhoto/single_20201005145341.jpg', '2020-10-05 14:53', 1),
(94, 11, 'assets/servicePhoto/waitting_20201005145619.jpg', '2020-10-05 14:56', 1),
(95, 11, 'assets/servicePhoto/meeting_20201005145911.jpg', '2020-10-05 14:59', 1),
(96, 5, 'assets/servicePhoto/bed_20201005150236.jpg', '2020-10-05 15:02', 1),
(98, 7, 'assets/servicePhoto/rr_20201005155757.jpg', '2020-10-05 15:57', 1),
(99, 7, 'assets/servicePhoto/rr_20201005155811.jpg', '2020-10-05 15:58', 1),
(100, 7, 'assets/servicePhoto/rr_20201005155825.jpg', '2020-10-05 15:58', 1),
(101, 7, 'assets/servicePhoto/rr_20201005155937.jpg', '2020-10-05 15:59', 1),
(103, 19, 'assets/servicePhoto/beaabbabfeededdaa_20201005184019.jpg', '2020-10-05 18:40', 3),
(105, 19, 'assets/servicePhoto/bedroom_202010051840301.jpg', '2020-10-05 18:40', 3),
(106, 20, 'assets/servicePhoto/b_20201005184148.jpg', '2020-10-05 18:41', 3),
(109, 23, 'assets/servicePhoto/NewProject_20201005190827.jpg', '2020-10-05 19:08', 3),
(110, 23, 'assets/servicePhoto/NewProject_20201005191108.jpg', '2020-10-05 19:11', 3),
(112, 22, 'assets/servicePhoto/NewProject_20201005191501.jpg', '2020-10-05 19:15', 3),
(113, 21, 'assets/servicePhoto/NewProject_20201005191759.jpg', '2020-10-05 19:17', 3),
(114, 21, 'assets/servicePhoto/NewProject_20201005192029.jpg', '2020-10-05 19:20', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `photo` text COLLATE utf8_bin COMMENT 'size 1240x380',
  `priority` int(11) NOT NULL COMMENT 'max upper',
  `insert_by` int(11) NOT NULL,
  `insert_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subtitle` text COLLATE utf8_bin,
  `title` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `photo`, `priority`, `insert_by`, `insert_time`, `subtitle`, `title`) VALUES
(14, 'assets/sliderPhoto/_20201005115603.jpg', 10, 1, '2020-10-03 08:08:35', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', 'welcome to Sulaiman Supplies'),
(15, 'assets/sliderPhoto/_20201005115512.jpg', 2, 1, '2020-10-03 08:09:06', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', 'welcome to Sulaiman Supplies');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sms_send_list`
--

CREATE TABLE `tbl_sms_send_list` (
  `id` int(11) NOT NULL,
  `send_date_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0000-00-00 00:00',
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `receiver_numbers` text COLLATE utf8_unicode_ci NOT NULL,
  `insert_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_sms_send_list`
--

INSERT INTO `tbl_sms_send_list` (`id`, `send_date_time`, `message`, `receiver_numbers`, `insert_by`) VALUES
(3, '2020-09-20 14:06:32', 'sdfsdfsdf dsf dsf', '017225855,98435,68,64,54,6549,87,8', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sms_send_setting`
--

CREATE TABLE `tbl_sms_send_setting` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_sms_send_setting`
--

INSERT INTO `tbl_sms_send_setting` (`id`, `username`, `password`, `last_update`) VALUES
(1, 'sdfsd', 'sdfsdf', '2020-09-20 08:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_upozilla`
--

CREATE TABLE `tbl_upozilla` (
  `id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `zilla_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_upozilla`
--

INSERT INTO `tbl_upozilla` (`id`, `division_id`, `zilla_id`, `name`) VALUES
(1, 1, 1, 'সাভার'),
(2, 1, 1, 'ধামরাই'),
(3, 1, 1, 'কেরাণীগঞ্জ'),
(4, 1, 1, 'নবাবগঞ্জ'),
(5, 1, 1, 'দোহার'),
(6, 1, 1, 'তেজগাঁও উন্নয়ন সার্কেল'),
(7, 1, 2, 'কালীগঞ্জ'),
(8, 1, 2, 'কালিয়াকৈর'),
(9, 1, 2, 'কাপাসিয়া'),
(10, 1, 2, 'গাজীপুর সদর'),
(11, 1, 2, 'শ্রীপুর'),
(12, 1, 3, 'বাসাইল'),
(13, 1, 3, 'ভুয়াপুর'),
(14, 1, 3, 'ঘাটাইল'),
(15, 1, 3, 'দেলদুয়ার'),
(16, 1, 3, 'গোপালপুর'),
(17, 1, 3, 'মধুপুর'),
(18, 1, 3, 'মির্জাপুর'),
(19, 1, 3, 'নাগরপুর'),
(20, 1, 3, 'সখিপুর'),
(21, 1, 3, 'টাঙ্গাইল সদর'),
(22, 1, 3, 'কালিহাতী'),
(23, 1, 3, 'ধনবাড়ি'),
(24, 1, 4, 'আড়াইহাজার'),
(25, 1, 4, 'বন্দর'),
(26, 1, 4, 'নারায়ণগঞ্জ সদর'),
(27, 1, 4, 'রূপগঞ্জ'),
(28, 1, 4, 'সোনারগাঁ'),
(29, 1, 5, 'ইটনা'),
(30, 1, 5, 'কটিয়াদি'),
(31, 1, 5, 'ভৈরব'),
(32, 1, 5, 'হোসেনপুর'),
(33, 1, 5, 'তাড়াইল'),
(34, 1, 5, 'পাকুন্দিয়া'),
(35, 1, 5, 'কুলিয়ারচর'),
(36, 1, 5, 'কিশোরগঞ্জ সদর'),
(37, 1, 5, 'করিমগঞ্জ'),
(38, 1, 5, 'বাজিতপুর'),
(39, 1, 5, 'অষ্টগ্রাম'),
(40, 1, 5, 'মিঠামইন'),
(41, 1, 5, 'নিকলী'),
(42, 1, 6, 'বেলাবো'),
(43, 1, 6, 'মনোহরদী'),
(44, 1, 6, 'নরসিংদী সদর'),
(45, 1, 6, 'পলাশ'),
(46, 1, 6, 'রায়পুরা'),
(47, 1, 6, 'শিবপুর'),
(48, 1, 7, 'রাজবাড়ী সদর'),
(49, 1, 7, 'গোয়ালন্দ'),
(50, 1, 7, 'পাংশা'),
(51, 1, 7, 'বালিয়াকান্দি'),
(52, 1, 7, 'কালুখালী'),
(53, 1, 8, 'ফরিদপুর সদর'),
(54, 1, 8, 'আলফাডাঙ্গা'),
(55, 1, 8, 'বোয়ালমারী'),
(56, 1, 8, 'সদরপুর'),
(57, 1, 8, 'নগরকান্দা'),
(58, 1, 8, 'ভাঙ্গা'),
(59, 1, 8, 'চরভদ্রাসন'),
(60, 1, 8, 'মধুখালী'),
(61, 1, 8, 'সালথা'),
(62, 1, 9, 'মাদারীপুর সদর'),
(63, 1, 9, 'শিবচর'),
(64, 1, 9, 'কালকিনি'),
(65, 1, 9, 'রাজৈর'),
(66, 1, 10, 'গোপালগঞ্জ সদর'),
(67, 1, 10, 'কাশিয়ানী'),
(68, 1, 10, 'টুংগীপাড়া'),
(69, 1, 10, 'কোটালীপাড়া'),
(70, 1, 10, 'মুকসুদপুর'),
(71, 1, 11, 'মুন্সিগঞ্জ সদর'),
(72, 1, 11, 'শ্রীনগর'),
(73, 1, 11, 'সিরাজদিখান'),
(74, 1, 11, 'লৌহজং '),
(75, 1, 11, 'গজারিয়া'),
(76, 1, 11, 'টংগিবাড়ী'),
(77, 1, 12, 'হরিরামপুর'),
(78, 1, 12, 'সাটুরিয়া'),
(79, 1, 12, 'মানিকগঞ্জ সদর'),
(80, 1, 12, 'ঘিওর'),
(81, 1, 12, 'শিবালয়'),
(82, 1, 12, 'দৌলতপুর'),
(83, 1, 12, 'সিংগাইর'),
(84, 1, 13, 'শরিয়তপুর সদর'),
(85, 1, 13, 'নড়িয়া'),
(86, 1, 13, 'জাজিরা'),
(87, 1, 13, 'গোসাইরহাট'),
(88, 1, 13, 'ভেদরগঞ্জ'),
(89, 1, 13, 'ডামুড্যা'),
(90, 2, 14, 'পবা'),
(91, 2, 14, 'দুর্গাপুর'),
(92, 2, 14, 'মোহনপুর'),
(93, 2, 14, 'চারঘাট'),
(94, 2, 14, 'পুঠিয়া'),
(95, 2, 14, 'বাঘা'),
(96, 2, 14, 'গোদাগাড়ী'),
(97, 2, 14, 'তানোর'),
(98, 2, 14, 'বাঘমারা'),
(99, 2, 15, 'বেলকুচি'),
(100, 2, 15, 'চৌহালি'),
(101, 2, 15, 'কামারখন্দ'),
(102, 2, 15, 'কাজীপুর'),
(103, 2, 15, 'রায়গঞ্জ'),
(104, 2, 15, 'শাহজাদপুর'),
(105, 2, 15, 'সিরাজগঞ্জ সদর'),
(106, 2, 15, 'তাড়াশ'),
(107, 2, 15, 'উল্লাপাড়া'),
(108, 2, 16, 'সুজানগর'),
(109, 2, 16, 'ঈশ্বরদী'),
(110, 2, 16, 'ভাঙ্গুরা'),
(111, 2, 16, 'পাবনা সদর'),
(112, 2, 16, 'বেড়া'),
(113, 2, 16, 'আটঘরিয়া'),
(114, 2, 16, 'চাটমোহর'),
(115, 2, 16, 'সাঁথিয়া'),
(116, 2, 16, 'ফরিদপুর'),
(117, 2, 17, 'কাহালু'),
(118, 2, 17, 'বগুড়া সদর'),
(119, 2, 17, 'সারিয়াকান্দি'),
(120, 2, 17, 'শাজাহানপুর'),
(121, 2, 17, 'দুপচাঁচিয়া'),
(122, 2, 17, 'আদমদিঘি'),
(123, 2, 17, 'নন্দিগ্রাম'),
(124, 2, 17, 'সোনাতলা'),
(125, 2, 17, 'ধুনট'),
(126, 2, 17, 'গাবতলী'),
(127, 2, 17, 'শেরপুর'),
(128, 2, 17, 'শিবগঞ্জ'),
(129, 2, 18, 'চাঁপাইনবাবগঞ্জ সদর'),
(130, 2, 18, 'গোমস্তাপুর'),
(131, 2, 18, 'নাচোল'),
(132, 2, 18, 'ভোলাহাট'),
(133, 2, 18, 'শিবগঞ্জ'),
(134, 2, 19, 'আক্কেলপুর'),
(135, 2, 19, 'কালাই'),
(136, 2, 19, 'ক্ষেতলাল'),
(137, 2, 19, 'পাঁচবিবি'),
(138, 2, 19, 'জয়পুরহাট সদর'),
(139, 2, 20, 'মহাদেবপুর'),
(140, 2, 20, 'বদলগাছী'),
(141, 2, 20, 'পত্নিতলা'),
(142, 2, 20, 'ধামইরহাট'),
(143, 2, 20, 'নিয়ামতপুর'),
(144, 2, 20, 'মান্দা'),
(145, 2, 20, 'আত্রাই'),
(146, 2, 20, 'রাণীনগর'),
(147, 2, 20, 'নওগাঁ সদর'),
(148, 2, 20, 'সাপাহার'),
(149, 2, 20, 'পোরশা'),
(150, 2, 21, 'নাটোর সদর'),
(151, 2, 21, 'সিংড়া'),
(152, 2, 21, 'বড়াইগ্রাম'),
(153, 2, 21, 'বাগাতিপাড়া'),
(154, 2, 21, 'গুরুদাসপুর'),
(155, 2, 21, 'লালপুর'),
(156, 2, 21, 'নলডাঙ্গা'),
(157, 3, 22, 'রাঙ্গুনিয়া'),
(158, 3, 22, 'সীতাকুণ্ড'),
(159, 3, 22, 'মীরসরাই'),
(160, 3, 22, 'পটিয়া'),
(161, 3, 22, 'সন্দ্বীপ'),
(162, 3, 22, 'বাঁশখালী'),
(163, 3, 22, 'বোয়ালখালী'),
(164, 3, 22, 'আনোয়ারা'),
(165, 3, 22, 'সাতকানিয়া'),
(166, 3, 22, 'লোহাগাড়া'),
(167, 3, 22, 'হাটহাজারী'),
(168, 3, 22, 'ফটিকছড়ি'),
(169, 3, 22, 'রাঊজান'),
(170, 3, 22, 'চন্দনাইশ'),
(171, 3, 23, 'দেবিদ্বার'),
(172, 3, 23, 'বরুড়া'),
(173, 3, 23, 'ব্রাহ্মণপাড়া'),
(174, 3, 23, 'চান্দিনা'),
(175, 3, 23, 'চৌদ্দগ্রাম'),
(176, 3, 23, 'দাউদকান্দি'),
(177, 3, 23, 'হোমনা'),
(178, 3, 23, 'লাকসাম'),
(179, 3, 23, 'মুরাদনগর'),
(180, 3, 23, 'নাঙ্গলকোট'),
(181, 3, 23, 'কুমিল্লা সদর'),
(182, 3, 23, 'মেঘনা'),
(183, 3, 23, 'মনোহরগঞ্জ'),
(184, 3, 23, 'সদর দক্ষিণ'),
(185, 3, 23, 'তিতাস'),
(186, 3, 23, 'বুড়িচং'),
(187, 3, 24, 'ছাগলনাইয়া'),
(188, 3, 24, 'ফেনী সদর'),
(189, 3, 24, 'সোনাগাজী'),
(190, 3, 24, 'ফুলগাজী'),
(191, 3, 24, 'পরশুরাম'),
(192, 3, 24, 'দাগনভুঞা'),
(193, 3, 25, 'ব্রাহ্মণবাড়িয়া সদর'),
(194, 3, 25, 'কসবা'),
(195, 3, 25, 'নাসিরনগর'),
(196, 3, 25, 'সরাইল'),
(197, 3, 25, 'আশুগঞ্জ'),
(198, 3, 25, 'আখাউরা'),
(199, 3, 25, 'নবীনগর'),
(200, 3, 25, 'বাঞ্ছারামপুর'),
(201, 3, 25, 'বিজয়নগর'),
(202, 3, 26, 'রাঙ্গামাটি সদর'),
(203, 3, 26, 'কাপ্তাই'),
(204, 3, 26, 'কাউখালী'),
(205, 3, 26, 'বাঘাইছড়ি'),
(206, 3, 26, 'বরকল'),
(207, 3, 26, 'লংগদু'),
(208, 3, 26, 'রাজস্থলী'),
(209, 3, 26, 'বিলাইছড়ি'),
(210, 3, 26, 'জুরাছড়ি'),
(211, 3, 26, 'নানিয়ারচর'),
(212, 3, 27, 'হাইমচর'),
(213, 3, 27, 'কচুয়া'),
(214, 3, 27, 'শহরাস্তি'),
(215, 3, 27, 'চাঁদপুর সদর'),
(216, 3, 27, 'মতলব উত্তর'),
(217, 3, 27, 'ফরিদ্গঞ্জ'),
(218, 3, 27, 'মতলব দক্ষিণ'),
(219, 3, 27, 'হাজীগঞ্জ'),
(220, 3, 28, 'নোয়াখালী সদর'),
(221, 3, 28, 'কোম্পানীগঞ্জ'),
(222, 3, 28, 'বেগমগঞ্জ'),
(223, 3, 28, 'হাতিয়া'),
(224, 3, 28, 'সুবর্ণচর'),
(225, 3, 28, 'কবিরহাট'),
(226, 3, 28, 'সেনবাগ'),
(227, 3, 28, 'চাটখিল'),
(228, 3, 28, 'সোনাইমুড়ী'),
(229, 3, 29, 'লক্ষ্মীপুর সদর'),
(230, 3, 29, 'কমলনগর'),
(231, 3, 29, 'রায়পুর'),
(232, 3, 29, 'রামগতি'),
(233, 3, 29, 'রামগঞ্জ'),
(234, 3, 30, 'কক্সবাজার সদর'),
(235, 3, 30, 'চকরিয়া'),
(236, 3, 30, 'কুতুবদিয়া'),
(237, 3, 30, 'উখিয়া'),
(238, 3, 30, 'মহেশখালী'),
(239, 3, 30, 'পেকুয়া'),
(240, 3, 30, 'রামু'),
(241, 3, 30, 'টেকনাফ'),
(242, 3, 31, 'খাগড়াছড়ি সদর'),
(243, 3, 31, 'দিঘীনালা'),
(244, 3, 31, 'পানছড়ি'),
(245, 3, 31, 'লক্ষীছড়ি'),
(246, 3, 31, 'মহালছড়ি'),
(247, 3, 31, 'মানিকছড়ি'),
(248, 3, 31, 'রামগড়'),
(249, 3, 31, 'মাটিরাঙ্গা'),
(250, 3, 31, 'গুইমারা'),
(251, 3, 32, 'বান্দরবান সদর'),
(252, 3, 32, 'আলীকদম'),
(253, 3, 32, 'নাইক্ষ্যংছড়ি'),
(254, 3, 32, 'রোয়াংছড়ি'),
(255, 3, 32, 'লামা'),
(256, 3, 32, 'রুমা'),
(257, 3, 32, 'থানচি'),
(258, 4, 33, 'বালাগঞ্জ'),
(259, 4, 33, 'বিয়ানীবাজার'),
(260, 4, 33, 'বিশ্বনাথ'),
(261, 4, 33, 'কোম্পানীগঞ্জ'),
(262, 4, 33, 'ফেঞ্চুগঞ্জ'),
(263, 4, 33, 'গোলাপগঞ্জ'),
(264, 4, 33, 'গোয়াইনঘাট'),
(265, 4, 33, 'জৈন্তাপুর'),
(266, 4, 33, 'কানাইঘাট'),
(267, 4, 33, 'সিলেট সদর'),
(268, 4, 33, 'জকিগঞ্জ'),
(269, 4, 33, 'দক্ষিণ সুরমা'),
(270, 4, 33, 'ওসমানী নগর'),
(271, 4, 34, 'বড়লেখা'),
(272, 4, 34, 'কমলগঞ্জ'),
(273, 4, 34, 'কুলাউরা'),
(274, 4, 34, 'মৌলভীবাজার সদর '),
(275, 4, 34, 'রাজনগর'),
(276, 4, 34, 'শ্রীমঙ্গল'),
(277, 4, 34, 'জুড়ী'),
(278, 4, 35, 'নবীগঞ্জ'),
(279, 4, 35, 'বাহুবল'),
(280, 4, 35, 'আজমিরীগঞ্জ'),
(281, 4, 35, 'বানিয়াচং'),
(282, 4, 35, 'লাখাই'),
(283, 4, 35, 'চুনারুঘাট'),
(284, 4, 35, 'হবিগঞ্জ সদর'),
(285, 4, 35, 'মাধবপুর'),
(286, 4, 36, 'সুনামগঞ্জ সদর'),
(287, 4, 36, 'দক্ষিণ সুনামগঞ্জ'),
(288, 4, 36, 'বিশ্বম্ভরপুর'),
(289, 4, 36, 'ছাতক'),
(290, 4, 36, 'জগন্নাথপুর'),
(291, 4, 36, 'তাহিরপুর'),
(292, 4, 36, 'ধর্মপাশা'),
(293, 4, 36, 'জামালগঞ্জ'),
(294, 4, 36, 'শাল্লা'),
(295, 4, 36, 'দিরাই'),
(296, 4, 36, 'দোয়ারাবাজার'),
(297, 5, 37, 'পাইকগাছা'),
(298, 5, 37, 'ফুলতলা'),
(299, 5, 37, 'দিঘলিয়া'),
(300, 5, 37, 'রূপসা'),
(301, 5, 37, 'তেরখাদা'),
(302, 5, 37, 'ডুমুরিয়া'),
(303, 5, 37, 'বটিয়াঘাটা'),
(304, 5, 37, 'দাকোপ'),
(305, 5, 37, 'কয়রা'),
(306, 5, 38, 'মণিরামপুর'),
(307, 5, 38, 'অভয়নগর'),
(308, 5, 38, 'বাঘারপাড়া'),
(309, 5, 38, 'চৌগাছা'),
(310, 5, 38, 'ঝিকরগাছা'),
(311, 5, 38, 'কেশবপুর'),
(312, 5, 38, 'যশোর সদর'),
(313, 5, 38, 'শার্শা'),
(314, 5, 39, 'আশাশুনি'),
(315, 5, 39, 'দেবহাটা'),
(316, 5, 39, 'কলারোয়া'),
(317, 5, 39, 'সাতক্ষীরা সদর'),
(318, 5, 39, 'শ্যামনগর'),
(319, 5, 39, 'তালা'),
(320, 5, 39, 'কালিগঞ্জ'),
(321, 5, 40, 'মুজিবনগর'),
(322, 5, 40, 'মেহেরপুর সদর'),
(323, 5, 40, 'গাংনী'),
(324, 5, 41, 'নড়াইল সদর'),
(325, 5, 41, 'লোহাগড়া'),
(326, 5, 41, 'কালিয়া'),
(327, 5, 42, 'চুয়াডাঙ্গা সদর'),
(328, 5, 42, 'আলমডাঙ্গা'),
(329, 5, 42, 'দামুড়হুদা'),
(330, 5, 42, 'জীবননগর'),
(331, 5, 43, 'শালিখা'),
(332, 5, 43, 'শ্রীপুর'),
(333, 5, 43, 'মাগুরা সদর'),
(334, 5, 43, 'মহম্মদপুর'),
(335, 5, 44, 'ফকিরহাট'),
(336, 5, 44, 'বাগেরহাট সদর'),
(337, 5, 44, 'মোল্লাহাট'),
(338, 5, 44, 'শরণখোলা'),
(339, 5, 44, 'রামপাল'),
(340, 5, 44, 'মোড়েলগঞ্জ'),
(341, 5, 44, 'কচুয়া'),
(342, 5, 44, 'মোংলা'),
(343, 5, 44, 'চিতলমারী'),
(344, 5, 45, 'ঝিনাইদহ সদর'),
(345, 5, 45, 'শৈলকুপা'),
(346, 5, 45, 'হরিণাকুণ্ডু '),
(347, 5, 45, 'কালীগঞ্জ'),
(348, 5, 45, 'কোটচাঁদপুর'),
(349, 5, 45, 'মহেশপুর'),
(350, 5, 46, 'কুষ্টিয়া সদর'),
(351, 5, 46, 'কুমারখালী'),
(352, 5, 46, 'খোকসা'),
(353, 5, 46, 'মিরপুর'),
(354, 5, 46, 'দৌলতপুর'),
(355, 5, 46, 'ভেড়ামারা'),
(356, 6, 47, 'বরিশাল সদর'),
(357, 6, 47, 'বাকেরগঞ্জ'),
(358, 6, 47, 'বাবুগঞ্জ'),
(359, 6, 47, 'উজিরপুর'),
(360, 6, 47, 'বানারীপাড়া'),
(361, 6, 47, 'গৌরনদী'),
(362, 6, 47, 'আগৈলঝাড়া'),
(363, 6, 47, 'মেহেন্দিগঞ্জ'),
(364, 6, 47, 'মুলাদী'),
(365, 6, 47, 'হিজলা'),
(366, 6, 48, 'ঝালকাঠি সদর'),
(367, 6, 48, 'কাঠালিয়া'),
(368, 6, 48, 'নলছিটি'),
(369, 6, 48, 'রাজাপুর'),
(370, 6, 49, 'বাউফল'),
(371, 6, 49, 'পটুয়াখালী সদর'),
(372, 6, 49, 'দুমকি'),
(373, 6, 49, 'দশমিনা'),
(374, 6, 49, 'কলাপাড়া'),
(375, 6, 49, 'মির্জাগঞ্জ'),
(376, 6, 49, 'গলাচিপা'),
(377, 6, 49, 'রাঙ্গাবালী'),
(378, 6, 50, 'পিরোজপুর সদর'),
(379, 6, 50, 'নাজিরপুর'),
(380, 6, 50, 'কাউখালী'),
(381, 6, 50, 'জিয়ানগর'),
(382, 6, 50, 'ভান্ডারিয়া'),
(383, 6, 50, 'মঠবাড়ীয়া'),
(384, 6, 50, 'নেছারাবাদ'),
(385, 6, 51, 'ভোলা সদর'),
(386, 6, 51, 'বোরহানউদ্দিন'),
(387, 6, 51, 'চরফ্যাশন'),
(388, 6, 51, 'দৌলতখান'),
(389, 6, 51, 'মনপুরা'),
(390, 6, 51, 'তজুমদ্দিন'),
(391, 6, 51, 'লালমোহন'),
(392, 6, 52, 'আমতলী'),
(393, 6, 52, 'বরগুনা সদর'),
(394, 6, 52, 'বেতাগী'),
(395, 6, 52, 'বামনা'),
(396, 6, 52, 'পাথরঘাটা'),
(397, 6, 52, 'তালতলি'),
(398, 7, 53, 'রংপুর সদর'),
(399, 7, 53, 'গঙ্গাচড়া'),
(400, 7, 53, 'তারাগঞ্জ'),
(401, 7, 53, 'বদরগঞ্জ'),
(402, 7, 53, 'মিঠাপুকুর'),
(403, 7, 53, 'কাউনিয়া'),
(404, 7, 53, 'পীরগঞ্জ'),
(405, 7, 53, 'পীরগাছা'),
(406, 7, 54, 'লালমনিরহাট সদর'),
(407, 7, 54, 'আদিতমারী'),
(408, 7, 54, 'কালীগঞ্জ'),
(409, 7, 54, 'হাতীবান্ধা'),
(410, 7, 54, 'পাটগ্রাম'),
(411, 7, 55, 'পঞ্চগড় সদর'),
(412, 7, 55, 'দেবীগঞ্জ'),
(413, 7, 55, 'বোদা'),
(414, 7, 55, 'আটোয়ারী'),
(415, 7, 55, 'তেতুলিয়া'),
(416, 7, 56, 'কুড়িগ্রাম সদর'),
(417, 7, 56, 'নাগেশ্বরী'),
(418, 7, 56, 'ভুরুঙ্গামারী'),
(419, 7, 56, 'ফুলবাড়ী'),
(420, 7, 56, 'রাজারহাট'),
(421, 7, 56, 'উলিপুর'),
(422, 7, 56, 'চিলমারী'),
(423, 7, 56, 'রৌমারী'),
(424, 7, 56, 'চর রাজিবপুর'),
(425, 7, 57, 'নবাবগঞ্জ'),
(426, 7, 57, 'বীরগঞ্জ'),
(427, 7, 57, 'ঘোড়াঘাট'),
(428, 7, 57, 'বিরামপুর'),
(429, 7, 57, 'পার্বতীপুর'),
(430, 7, 57, 'বোচাগঞ্জ'),
(431, 7, 57, 'কাহারোল'),
(432, 7, 57, 'ফুলবাড়ী'),
(433, 7, 57, 'দিনাজপুর সদর'),
(434, 7, 57, 'হাকিমপুর'),
(435, 7, 57, 'খানসামা'),
(436, 7, 57, 'বিরল'),
(437, 7, 57, 'চিরিরবন্দর'),
(438, 7, 58, 'ঠাকুরগাঁও সদর'),
(439, 7, 58, 'পীরগঞ্জ'),
(440, 7, 58, 'রাণীশংকৈল'),
(441, 7, 58, 'হরিপুর'),
(442, 7, 58, 'বালিয়াডাঙ্গী'),
(443, 7, 59, 'সাদুল্লাপুর'),
(444, 7, 59, 'গাইবান্ধা সদর'),
(445, 7, 59, 'পলাশবাড়ী'),
(446, 7, 59, 'সাঘাটা'),
(447, 7, 59, 'গোবিন্দগঞ্জ'),
(448, 7, 59, 'সুন্দরগঞ্জ'),
(449, 7, 59, 'ফুলছড়ি'),
(450, 7, 60, 'সৈয়দপুর'),
(451, 7, 60, 'ডোমার'),
(452, 7, 60, 'ডিমলা'),
(453, 7, 60, 'জলঢাকা'),
(454, 7, 60, 'কিশোরগঞ্জ'),
(455, 7, 60, 'নীলফামারী সদর'),
(456, 8, 61, 'ফুলবাড়ীয়া '),
(457, 8, 61, 'ত্রিশাল'),
(458, 8, 61, 'ভালুকা'),
(459, 8, 61, 'মুক্তাগাছা'),
(460, 8, 61, 'ময়মনসিংহ সদর'),
(461, 8, 61, 'ধোবাউরা'),
(462, 8, 61, 'ফুলপুর'),
(463, 8, 61, 'হালুয়াঘাট'),
(464, 8, 61, 'গৌরীপুর'),
(465, 8, 61, 'গফরগাঁও'),
(466, 8, 61, 'ঈশ্বরগঞ্জ'),
(467, 8, 61, 'নান্দাইল'),
(468, 8, 61, 'তারাকান্দা'),
(469, 8, 62, 'জামালপুর সদর'),
(470, 8, 62, 'মেলান্দহ'),
(471, 8, 62, 'ইসলামপুর'),
(472, 8, 62, 'দেওয়ানগঞ্জ'),
(473, 8, 62, 'সরিষাবাড়ী'),
(474, 8, 62, 'মাদারগঞ্জ'),
(475, 8, 62, 'বকশীগঞ্জ'),
(476, 8, 63, 'বারহাট্টা'),
(477, 8, 63, 'দুর্গাপুর'),
(478, 8, 63, 'কেন্দুয়া'),
(479, 8, 63, 'আটপাড়া'),
(480, 8, 63, 'মদন'),
(481, 8, 63, 'খালিয়াজুরী'),
(482, 8, 63, 'কলমাকান্দা'),
(483, 8, 63, 'মোহনগঞ্জ'),
(484, 8, 63, 'পূর্বধলা'),
(485, 8, 63, 'নেত্রকোনা সদর'),
(486, 8, 64, 'শেরপুর সদর'),
(487, 8, 64, 'নালিতাবাড়ী'),
(488, 8, 64, 'শ্রীবরদী'),
(489, 8, 64, 'নকলা'),
(490, 8, 64, 'ঝিনাইগাতী'),
(491, 1, 1, 'ঢাকা মহানগর');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_zilla`
--

CREATE TABLE `tbl_zilla` (
  `id` int(11) NOT NULL,
  `divission_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_zilla`
--

INSERT INTO `tbl_zilla` (`id`, `divission_id`, `name`) VALUES
(1, 1, 'ঢাকা'),
(2, 1, 'গাজীপুর'),
(3, 1, 'টাঙ্গাইল'),
(4, 1, 'নারায়ণগঞ্জ'),
(5, 1, 'কিশোরগঞ্জ'),
(6, 1, 'নরসিংদী'),
(7, 1, 'রাজবাড়ী'),
(8, 1, 'ফরিদপুর'),
(9, 1, 'মাদারীপুর'),
(10, 1, 'গোপালগঞ্জ'),
(11, 1, 'মুন্সিগঞ্জ'),
(12, 1, 'মানিকগঞ্জ'),
(13, 1, 'শরীয়তপুর'),
(14, 2, 'রাজশাহী'),
(15, 2, 'সিরাজগঞ্জ'),
(16, 2, 'পাবনা'),
(17, 2, 'বগুড়া'),
(18, 2, 'চাঁপাইনবাবগঞ্জ'),
(19, 2, 'জয়পুরহাট'),
(20, 2, 'নওগাঁ'),
(21, 2, 'নাটোর'),
(22, 3, 'চট্টগ্রাম'),
(23, 3, 'কুমিল্লা'),
(24, 3, 'ফেনী'),
(25, 3, 'ব্রাহ্মণবাড়িয়া'),
(26, 3, 'রাঙ্গামাটি'),
(27, 3, 'চাঁদপুর'),
(28, 3, 'নোয়াখালী'),
(29, 3, 'লক্ষ্মীপুর'),
(30, 3, 'কক্সবাজার'),
(31, 3, 'খাগড়াছড়ি'),
(32, 3, 'বান্দরবান'),
(33, 4, 'সিলেট'),
(34, 4, 'মৌলভীবাজার'),
(35, 4, 'হবিগঞ্জ'),
(36, 4, 'সুনামগঞ্জ'),
(37, 5, 'খুলনা'),
(38, 5, 'যশোর'),
(39, 5, 'সাতক্ষীরা'),
(40, 5, 'মেহেরপুর'),
(41, 5, 'নড়াইল'),
(42, 5, 'চুয়াডাঙ্গা'),
(43, 5, 'মাগুড়া'),
(44, 5, 'বাগেরহাট'),
(45, 5, 'ঝিনাইদহ'),
(46, 5, 'কুষ্টিয়া'),
(47, 6, 'বরিশাল'),
(48, 6, 'ঝালকাঠি'),
(49, 6, 'পটুয়াখালী'),
(50, 6, 'পিরোজপুর'),
(51, 6, 'ভোলা'),
(52, 6, 'বরগুনা'),
(53, 7, 'রংপুর'),
(54, 7, 'লালমনিরহাট'),
(55, 7, 'পঞ্চগড়'),
(56, 7, 'কুড়িগ্রাম'),
(57, 7, 'দিনাজপুর'),
(58, 7, 'ঠাকুরগাঁও'),
(59, 7, 'গাইবান্ধা'),
(60, 7, 'নীলফামারী'),
(61, 8, 'ময়মনসিংহ'),
(62, 8, 'জামালপুর'),
(63, 8, 'নেত্রকোনা'),
(64, 8, 'শেরপুর');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `position` text NOT NULL,
  `priority` int(11) NOT NULL COMMENT 'max top, min low',
  `photo` text NOT NULL,
  `description` text NOT NULL,
  `insert_by` int(11) NOT NULL,
  `insert_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `address` int(11) NOT NULL COMMENT 'thana id',
  `roadHouse` text NOT NULL,
  `phone` text NOT NULL,
  `userType` text NOT NULL,
  `photo` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 for active user, 0 for not active user',
  `emailVerified` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 for verify, 0 for not verify',
  `mobileVerified` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 for verify, 0 for not verify'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `address`, `roadHouse`, `phone`, `userType`, `photo`, `status`, `emailVerified`, `mobileVerified`) VALUES
(1, 'Md. Rayhanuzzaman ', 'Roky', 'roky', 'info@hrsoftbd.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 'Dhaka', '01711932986', 'admin', 'assets/userPhoto/ProfilePicDemo_20201003145310.png', 1, 1, 1),
(2, 'Teacher ', 'Teacher', 'teacher', 'teacher@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 90, 'Joypurhat', '01788888888', 'user', 'assets/userPhoto/defaultUser.jpg', 1, 0, 0),
(3, 'Sulaiman ', 'Supplies', 'ssadmin', 'info@sulaimansupplies.com', 'f986b6e8e52988be3e22c4f291c89046b3c481bc', 172, 'shail chow', '01700000000', 'admin', 'assets/userPhoto/dailymotion_20201005175301.png', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='types of user, each type has single controller';

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `value`, `name`) VALUES
(1, 'user', 'User'),
(2, 'teacher', 'Teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_recovery`
--
ALTER TABLE `password_recovery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_activities`
--
ALTER TABLE `tbl_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_common_pages`
--
ALTER TABLE `tbl_common_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tbl_divission`
--
ALTER TABLE `tbl_divission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery_category`
--
ALTER TABLE `tbl_gallery_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_general`
--
ALTER TABLE `tbl_general`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tbl_mail_send_setting`
--
ALTER TABLE `tbl_mail_send_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_our_client`
--
ALTER TABLE `tbl_our_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_our_work`
--
ALTER TABLE `tbl_our_work`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_service_photo`
--
ALTER TABLE `tbl_service_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sms_send_list`
--
ALTER TABLE `tbl_sms_send_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sms_send_setting`
--
ALTER TABLE `tbl_sms_send_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_upozilla`
--
ALTER TABLE `tbl_upozilla`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_zilla`
--
ALTER TABLE `tbl_zilla`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `password_recovery`
--
ALTER TABLE `password_recovery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_activities`
--
ALTER TABLE `tbl_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tbl_common_pages`
--
ALTER TABLE `tbl_common_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_divission`
--
ALTER TABLE `tbl_divission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_gallery_category`
--
ALTER TABLE `tbl_gallery_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_general`
--
ALTER TABLE `tbl_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_mail_send_setting`
--
ALTER TABLE `tbl_mail_send_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_our_client`
--
ALTER TABLE `tbl_our_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_our_work`
--
ALTER TABLE `tbl_our_work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_service_photo`
--
ALTER TABLE `tbl_service_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_sms_send_list`
--
ALTER TABLE `tbl_sms_send_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sms_send_setting`
--
ALTER TABLE `tbl_sms_send_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_upozilla`
--
ALTER TABLE `tbl_upozilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=492;

--
-- AUTO_INCREMENT for table `tbl_zilla`
--
ALTER TABLE `tbl_zilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
