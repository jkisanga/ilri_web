-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2018 at 12:57 AM
-- Server version: 5.5.51-38.2
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tzchoice_ilri`
--

-- --------------------------------------------------------

--
-- Table structure for table `audio`
--

CREATE TABLE IF NOT EXISTS `audio` (
  `id` int(10) unsigned NOT NULL,
  `audio_category_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `audio`
--

INSERT INTO `audio` (`id`, `audio_category_id`, `title`, `desc`, `file_path`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 2, 'CONSULTANCY REQUEST FORM', 'CONSULTANCY REQUEST FORM', 'LN44jIOaom_CONSULTANCY.mp3', 'LN44jIOaom_CONSULTANCY.jpg', '2017-08-01 02:32:46', '2017-08-01 02:32:46'),
(2, 4, 'track 3', 'track 3', 'rxXJLNDPAk_track.mp3', 'rxXJLNDPAk_track.jpg', '2017-08-24 04:50:31', '2017-08-24 04:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `audio_categories`
--

CREATE TABLE IF NOT EXISTS `audio_categories` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `audio_categories`
--

INSERT INTO `audio_categories` (`id`, `title`, `desc`, `thumbnail`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'you may not use this file except in compliance with.', 'Repoti tukio,Uhalifu, na mambo mengine katika kitengo cha TAKUKURU', 'jdWfI34HOh_you.jpeg', '2017-07-25 15:30:10', '2017-07-25 16:37:40', '2017-07-25 16:37:40'),
(2, 'Speeches', 'Speeches', 'z7txfvzlZC_Speeches.png', '2017-07-25 16:17:58', '2017-09-13 00:48:39', NULL),
(3, 'you may not use this file except in compliance with the License. You may obtain a copy of the License at', 'you may not use this file except in compliance with the License. You may obtain a copy of the License at', 'bRvL4PIhYw_.jpeg', '2017-07-25 16:19:54', '2017-08-19 11:20:24', '2017-08-19 11:20:24'),
(4, 'AUDIO ', 'AUDIO', '237bjIZIZY_AUDIO.png', '2017-08-19 11:21:53', '2017-09-13 00:47:29', NULL),
(5, 'CLIPS ', 'CLIPS ', '5LXNkHqyQY_.png', '2017-09-13 00:49:37', '2017-09-13 00:49:37', NULL),
(6, 'Art', 'Tfg', 'omexbPaLmx_.jpg', '2018-02-12 20:03:24', '2018-02-12 20:03:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `thumbnail`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'COMMODITY VALUE CHAIN BRIEFS', 'TROuJ5TnYM_COMMODITY.png', 'COMMODITY VALUE CHAIN BRIEFS', '2017-07-25 04:47:22', '2018-02-14 02:25:53'),
(2, 'Budget Speeches', '8qlCrpsIiR_Budget.png', 'Budget Speeches', '2017-07-25 14:07:29', '2017-09-13 00:53:23'),
(3, 'Publications', 'fMj1DMjGNj_Publications.png', 'Publications', '2017-08-19 10:35:04', '2017-09-13 00:55:13'),
(4, 'Regulations', 'ECP5cfvBxm_Regulations.png', 'Regulations', '2017-08-19 10:42:35', '2017-09-13 00:55:42'),
(5, 'Reports', 'Kzma8K6KQy_Reports.png', 'Reports', '2017-08-19 10:51:24', '2017-09-13 00:56:08'),
(6, 'MIU BULLETINS', 'kp9LCc8REU_MIU.png', 'MIU BULLETINS', '2017-09-13 00:36:30', '2017-09-13 00:54:41'),
(7, 'SECTOR STRATEGIES', 'Tgn19ShguS_SECTOR.png', 'SECTOR STRATEGIES', '2017-09-13 00:38:05', '2017-09-13 00:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `cms_apicustom`
--

CREATE TABLE IF NOT EXISTS `cms_apicustom` (
  `id` int(10) unsigned NOT NULL,
  `permalink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tabel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kolom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_query_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sql_where` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `method_type` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` longtext COLLATE utf8mb4_unicode_ci,
  `responses` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_apikey`
--

CREATE TABLE IF NOT EXISTS `cms_apikey` (
  `id` int(10) unsigned NOT NULL,
  `screetkey` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_dashboard`
--

CREATE TABLE IF NOT EXISTS `cms_dashboard` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_email_queues`
--

CREATE TABLE IF NOT EXISTS `cms_email_queues` (
  `id` int(10) unsigned NOT NULL,
  `send_at` datetime DEFAULT NULL,
  `email_recipient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_cc_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_content` text COLLATE utf8mb4_unicode_ci,
  `email_attachments` text COLLATE utf8mb4_unicode_ci,
  `is_sent` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_email_templates`
--

CREATE TABLE IF NOT EXISTS `cms_email_templates` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_email_templates`
--

INSERT INTO `cms_email_templates` (`id`, `name`, `slug`, `subject`, `content`, `description`, `from_name`, `from_email`, `cc_email`, `created_at`, `updated_at`) VALUES
(1, 'Email Template Forgot Password Backend', 'forgot_password_backend', NULL, '<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>', '[password]', 'System', 'system@crudbooster.com', NULL, '2017-07-15 06:15:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_logs`
--

CREATE TABLE IF NOT EXISTS `cms_logs` (
  `id` int(10) unsigned NOT NULL,
  `ipaddress` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `useragent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_users` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_menus`
--

CREATE TABLE IF NOT EXISTS `cms_menus` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'url',
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_dashboard` tinyint(1) NOT NULL DEFAULT '0',
  `id_cms_privileges` int(11) DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_menus`
--

INSERT INTO `cms_menus` (`id`, `name`, `type`, `path`, `color`, `icon`, `parent_id`, `is_active`, `is_dashboard`, `id_cms_privileges`, `sorting`, `created_at`, `updated_at`) VALUES
(1, 'DocCategory', 'Route', 'AdminCategoriesControllerGetIndex', NULL, 'fa fa-glass', 0, 1, 0, 1, 1, '2017-07-15 06:18:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_moduls`
--

CREATE TABLE IF NOT EXISTS `cms_moduls` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_protected` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_moduls`
--

INSERT INTO `cms_moduls` (`id`, `name`, `icon`, `path`, `table_name`, `controller`, `is_protected`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Notifications', 'fa fa-cog', 'notifications', 'cms_notifications', 'NotificationsController', 1, 1, '2017-07-15 06:15:14', NULL),
(2, 'Privileges', 'fa fa-cog', 'privileges', 'cms_privileges', 'PrivilegesController', 1, 1, '2017-07-15 06:15:14', NULL),
(3, 'Privileges Roles', 'fa fa-cog', 'privileges_roles', 'cms_privileges_roles', 'PrivilegesRolesController', 1, 1, '2017-07-15 06:15:14', NULL),
(4, 'Users', 'fa fa-users', 'users', 'cms_users', 'AdminCmsUsersController', 0, 1, '2017-07-15 06:15:14', NULL),
(5, 'Settings', 'fa fa-cog', 'settings', 'cms_settings', 'SettingsController', 1, 1, '2017-07-15 06:15:14', NULL),
(6, 'Module Generator', 'fa fa-database', 'module_generator', 'cms_moduls', 'ModulsController', 1, 1, '2017-07-15 06:15:14', NULL),
(7, 'Menu Management', 'fa fa-bars', 'menu_management', 'cms_menus', 'MenusController', 1, 1, '2017-07-15 06:15:14', NULL),
(8, 'Email Template', 'fa fa-envelope-o', 'email_templates', 'cms_email_templates', 'EmailTemplatesController', 1, 1, '2017-07-15 06:15:14', NULL),
(9, 'Statistic Builder', 'fa fa-dashboard', 'statistic_builder', 'cms_statistics', 'StatisticBuilderController', 1, 1, '2017-07-15 06:15:14', NULL),
(10, 'API Generator', 'fa fa-cloud-download', 'api_generator', '', 'ApiCustomController', 1, 1, '2017-07-15 06:15:14', NULL),
(11, 'Logs', 'fa fa-flag-o', 'logs', 'cms_logs', 'LogsController', 1, 1, '2017-07-15 06:15:14', NULL),
(12, 'DocCategory', 'fa fa-glass', 'categories', 'categories', 'AdminCategoriesController', 0, 0, '2017-07-15 06:18:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_notifications`
--

CREATE TABLE IF NOT EXISTS `cms_notifications` (
  `id` int(10) unsigned NOT NULL,
  `id_cms_users` int(11) DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_privileges`
--

CREATE TABLE IF NOT EXISTS `cms_privileges` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_superadmin` tinyint(1) DEFAULT NULL,
  `theme_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_privileges`
--

INSERT INTO `cms_privileges` (`id`, `name`, `is_superadmin`, `theme_color`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrator', 1, 'skin-red', '2017-07-15 06:15:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_privileges_roles`
--

CREATE TABLE IF NOT EXISTS `cms_privileges_roles` (
  `id` int(10) unsigned NOT NULL,
  `is_visible` tinyint(1) DEFAULT NULL,
  `is_create` tinyint(1) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `is_edit` tinyint(1) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `id_cms_moduls` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_privileges_roles`
--

INSERT INTO `cms_privileges_roles` (`id`, `is_visible`, `is_create`, `is_read`, `is_edit`, `is_delete`, `id_cms_privileges`, `id_cms_moduls`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 0, 0, 1, 1, '2017-07-15 06:15:14', NULL),
(2, 1, 1, 1, 1, 1, 1, 2, '2017-07-15 06:15:14', NULL),
(3, 0, 1, 1, 1, 1, 1, 3, '2017-07-15 06:15:14', NULL),
(4, 1, 1, 1, 1, 1, 1, 4, '2017-07-15 06:15:15', NULL),
(5, 1, 1, 1, 1, 1, 1, 5, '2017-07-15 06:15:15', NULL),
(6, 1, 1, 1, 1, 1, 1, 6, '2017-07-15 06:15:15', NULL),
(7, 1, 1, 1, 1, 1, 1, 7, '2017-07-15 06:15:15', NULL),
(8, 1, 1, 1, 1, 1, 1, 8, '2017-07-15 06:15:15', NULL),
(9, 1, 1, 1, 1, 1, 1, 9, '2017-07-15 06:15:15', NULL),
(10, 1, 1, 1, 1, 1, 1, 10, '2017-07-15 06:15:15', NULL),
(11, 1, 0, 1, 0, 1, 1, 11, '2017-07-15 06:15:15', NULL),
(12, 1, 1, 1, 1, 1, 1, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_settings`
--

CREATE TABLE IF NOT EXISTS `cms_settings` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `content_input_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataenum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `helper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_setting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_settings`
--

INSERT INTO `cms_settings` (`id`, `name`, `content`, `content_input_type`, `dataenum`, `helper`, `created_at`, `updated_at`, `group_setting`, `label`) VALUES
(1, 'login_background_color', NULL, 'text', NULL, 'Input hexacode', '2017-07-15 06:15:15', NULL, 'Login Register Style', 'Login Background Color'),
(2, 'login_font_color', NULL, 'text', NULL, 'Input hexacode', '2017-07-15 06:15:15', NULL, 'Login Register Style', 'Login Font Color'),
(3, 'login_background_image', NULL, 'upload_image', NULL, NULL, '2017-07-15 06:15:15', NULL, 'Login Register Style', 'Login Background Image'),
(4, 'email_sender', 'support@crudbooster.com', 'text', NULL, NULL, '2017-07-15 06:15:15', NULL, 'Email Setting', 'Email Sender'),
(5, 'smtp_driver', 'mail', 'select', 'smtp,mail,sendmail', NULL, '2017-07-15 06:15:15', NULL, 'Email Setting', 'Mail Driver'),
(6, 'smtp_host', '', 'text', NULL, NULL, '2017-07-15 06:15:15', NULL, 'Email Setting', 'SMTP Host'),
(7, 'smtp_port', '25', 'text', NULL, 'default 25', '2017-07-15 06:15:15', NULL, 'Email Setting', 'SMTP Port'),
(8, 'smtp_username', '', 'text', NULL, NULL, '2017-07-15 06:15:15', NULL, 'Email Setting', 'SMTP Username'),
(9, 'smtp_password', '', 'text', NULL, NULL, '2017-07-15 06:15:15', NULL, 'Email Setting', 'SMTP Password'),
(10, 'appname', 'CRUDBooster', 'text', NULL, NULL, '2017-07-15 06:15:15', NULL, 'Application Setting', 'Application Name'),
(11, 'default_paper_size', 'Legal', 'text', NULL, 'Paper size, ex : A4, Legal, etc', '2017-07-15 06:15:15', NULL, 'Application Setting', 'Default Paper Print Size'),
(12, 'logo', '', 'upload_image', NULL, NULL, '2017-07-15 06:15:15', NULL, 'Application Setting', 'Logo'),
(13, 'favicon', '', 'upload_image', NULL, NULL, '2017-07-15 06:15:15', NULL, 'Application Setting', 'Favicon'),
(14, 'api_debug_mode', 'true', 'select', 'true,false', NULL, '2017-07-15 06:15:15', NULL, 'Application Setting', 'API Debug Mode'),
(15, 'google_api_key', '', 'text', NULL, NULL, '2017-07-15 06:15:15', NULL, 'Application Setting', 'Google API Key'),
(16, 'google_fcm_key', '', 'text', NULL, NULL, '2017-07-15 06:15:15', NULL, 'Application Setting', 'Google FCM Key');

-- --------------------------------------------------------

--
-- Table structure for table `cms_statistics`
--

CREATE TABLE IF NOT EXISTS `cms_statistics` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_statistic_components`
--

CREATE TABLE IF NOT EXISTS `cms_statistic_components` (
  `id` int(10) unsigned NOT NULL,
  `id_cms_statistics` int(11) DEFAULT NULL,
  `componentID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `component_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_name` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `config` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_users`
--

CREATE TABLE IF NOT EXISTS `cms_users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_users`
--

INSERT INTO `cms_users` (`id`, `name`, `photo`, `email`, `password`, `id_cms_privileges`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Super Admin', NULL, 'admin@crudbooster.com', '$2y$10$jQao3h/Nu/ig3gqTPtfteuyp9aZdblO7187RvXrZTuGf9NxIZ2TTW', 1, '2017-07-15 06:15:14', NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `data_categories`
--

CREATE TABLE IF NOT EXISTS `data_categories` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `data_categories`
--

INSERT INTO `data_categories` (`id`, `name`, `desc`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, ' STATISTICS', ' STATISTICS REPORT', 'RLBv6ZBXaV_.png', '2017-07-25 08:38:18', '2017-09-13 00:52:40'),
(2, 'Census', 'Census', 'KBGFl91pnk_Census.png', '2017-08-19 11:03:04', '2017-09-13 00:51:55'),
(3, 'BASIC DATA', 'BASIC DATA', 'H2oiIXdxhL_BASIC.png', '2017-08-30 20:00:05', '2017-09-13 00:52:16');

-- --------------------------------------------------------

--
-- Table structure for table `device_users`
--

CREATE TABLE IF NOT EXISTS `device_users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `IME_NO` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `device_users`
--

INSERT INTO `device_users` (`id`, `name`, `email`, `IME_NO`, `password`, `created_at`, `updated_at`) VALUES
(3, 'Edith Lazaro', 'test1@test.com', '9114eac8086b031c', '1234', '2017-09-04 18:13:01', '2017-09-04 18:13:01'),
(4, 'Tab 1', 'moapolicy@gmail.com', '4d1eb2c205c9be63', '12345', '2018-02-12 18:29:38', '2018-02-12 18:29:38'),
(5, 'Tab 2', 'moapolicy@gmail.com', '92ea6ea205a2701d', '12345', '2018-02-12 18:31:36', '2018-02-12 18:31:36'),
(8, 'Tab 3', 'moapolicy@gmail.com', 'd15f81ee0616cc69', '12345', '2018-02-12 18:35:49', '2018-02-12 18:35:49'),
(9, 'Tab 4', 'moapolicy@gmail.com', '055e267705895619', '12345', '2018-02-12 18:39:42', '2018-02-12 18:39:42'),
(10, 'Tab 5', 'moapolicy@gmail.com', '4103911f8a4d40db', '12345', '2018-02-12 18:41:23', '2018-02-12 18:41:23'),
(11, 'Tab 6', 'moapolicy@gmail.com', '41034c084c2c408b', '12345', '2018-02-12 18:42:38', '2018-02-12 19:07:45'),
(12, 'Tab 7', 'moapolicy@gmail.com', '4300f23297b2c09d', '12345', '2018-02-12 18:44:00', '2018-02-12 18:44:00'),
(13, 'Tab 8', 'moapolicy@gmail.com', '53b462f707c0fb00', '12345', '2018-02-12 19:09:11', '2018-02-12 19:09:11'),
(14, 'Tab 8', 'moapolicy@gmail.com', '53b462f707c0fb00', '12345', '2018-02-12 19:09:11', '2018-02-12 19:09:11'),
(15, 'Joshua Kisanga', 'gbkisanga@gmail.com', '0000000000000000', '1234', '2018-02-14 11:18:41', '2018-02-14 11:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `summary` varchar(3550) COLLATE utf8_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `title`, `thumbnail`, `category_id`, `summary`, `file_path`, `created_at`, `updated_at`) VALUES
(2, 'Cashewnut', 'QTkp2V677d_Cashewnut.PNG', 1, '> The central problem to all the challenges in the cashew industry is connected to failure of themarket and institutions.\r\n\r\n> Re-institutionalization of the cashew value chain with deliberate attempts centered atimproving farm level productivity and expanding commodity marketing options is vital.\r\n\r\n> As already projected, accelerating the design and implementation of the fundamentals forcommodity exchange market to replace the warehouse receipt system and the blind auctionsystem is critical.\r\n\r\n> Investigating socio-economic, political and institutional factors that led to the dysfunction of theinstalled cashew processing factories that never became operational would be useful indesigning strategies for future cashew industry development.\r\n\r\n> Deliberate effort to strengthen and empower local institutions from the cashew farmingcommunity to district and regional levels will help provide ownership and implementation ofpolicies and procedures that originate from higher level organs such as the Ministry andCashewnut Authority of Tanzania.', 'QTkp2V677d_Cashewnut.pdf', '2017-07-25 09:14:42', '2017-10-11 09:22:53'),
(4, 'Cassava', 'sEH9ctV629_Cassava.PNG', 1, ' > Promote timely implementation of policies and initiatives that support the commercialization of the cassava crop in the country. \r\n\r\n> Support initiatives that stimulate local and export demand for cassava products \r\n\r\n>  Invest in breeding programs that produce high yielding and disease resistant varieties >• Promote the dissemination of improved cassava varieties through research institutions and extension services', 'sEH9ctV629_Cassava.pdf', '2017-08-03 01:37:42', '2017-10-11 09:29:30'),
(5, ' Hotuba ya bajeti Wizara ya Kilimo Mifugo na Uvuvi 2017/2018', 'mDwYCjOQcY_.ico', 2, 'Hotuba ya waziri wa Kilimo Mifugo na Uvuvi mheshimiwa, Eng. dkt. Charles John Tizeba (Mb.) kuhusu makadirio ya bajeti ya mwaka 2017/2018. ', 'mDwYCjOQcY_.pdf', '2017-08-04 15:57:47', '2017-08-31 10:39:02'),
(6, ' Bajeti ya Wizara ya Kilimo Chakula na Ushirika kwa Makadirio ya Matumizi ya Fedha kwa Mwaka 2016/17', 'ynrWxO5rQl_.ico', 2, 'Hotuba Ya Waziri Wa Kilimo Mifugo na Uvuvi, Mheshimiwa Mwigulu Lameck Nchemba Madelu (MB.), Kuhusu Makadirio Ya Matumizi Ya Fedha Ya Wizara Ya  Kilimo Mifugo na Uvuvi  Kwa Mwaka 2016/2017 ', 'ynrWxO5rQl_.pdf', '2017-08-04 16:11:15', '2017-08-31 10:38:02'),
(8, ' Bajeti ya Wizara ya Kilimo Chakula na Ushirika kwa Makadirio ya Matumizi ya Fedha kwa Mwaka 2015/16', 'hzCAc8CRNF_.ico', 2, 'Hotuba Ya Waziri Wa Kilimo Chakula Na Ushirika, Mheshimiwa Stephen Masato Wasira (MB), Kuhusu Makadirio Ya Matumizi Ya Fedha Ya Wizara Ya Kilimo, Chakula Na Ushirika Kwa Mwaka 2015/2016 '')', 'hzCAc8CRNF_.pdf', '2017-08-06 18:11:15', '2017-08-31 10:36:29'),
(9, ' Bajeti ya Wizara ya Kilimo Chakula na Ushirika kwa Makadirio ya Matumizi ya Fedha kwa Mwaka 2014/15', 'j6nQQWJVsO_.ico', 2, 'Hotuba Ya Waziri Wa Kilimo Chakula Na Ushirika, MHESHIMIWA MHANDISI CHRISTOPHER KAJORO CHIZA (MB) , Kuhusu Makadirio Ya Matumizi Ya Fedha Ya Wizara Ya Kilimo, Chakula Na Ushirika Kwa Mwaka 2014/2015 ', 'j6nQQWJVsO_.pdf', '2017-08-07 04:10:37', '2017-08-31 10:35:01'),
(10, 'Usindikaji wa Mafuta Mwali ya Nazi', 'xQ4dabqStn_Usindikaji.png', 3, ' Uzalishaji wa Mafuta-mwali ni mkombozi wa mwanamke na familia kiuchumi kwani hutoa ajira katika ukamuaji na uhifadhi wa mafuta        vijijini na viwanda vidogo vidogo. Wanawake hupata pesa pia kutokana na matayarisho na mauzo ya vyakula vya nazi. ', 'xQ4dabqStn_Usindikaji.pdf', '2017-08-19 10:37:28', '2017-08-19 10:37:28'),
(11, 'MWONGOZO UZALISHAJI MAZAO', '2DiHb4pCxx_MWONGOZO.ico', 3, 'Kulingana na Kituo cha Utafiti wa Udongo cha Mlingano cha mkoani Tanga chini ya Wizara ya Kilimo Mifugo na Uvuvi, Tanzania ina jumla ya Kanda Kuu saba (7) za Kiutafiti wa Kilimo. Ndani ya kanda hizo kuu saba, zipo Kanda ndogo 64 za kiikolojia zinazoonyesha aina ya mazao yanayoweza kuzalishwa kwa wakati muafaka. Kanda hizo Kuu ni Kanda ya Kaskazini yenye mikoa ya Arusha, Kilimanjaro, na Manyara; Kanda ya Kati inayojumuisha mikoa ya Dodoma na Singida; Kanda ya Kusini mikoa ya Lindi na Mtwara; Kanda ya Magharibi mikoa ya Kigoma na Tabora; Kanda ya Mashariki mikoa ya Dar es Salaam, Morogoro, Pwani na Tanga; Kanda ya Nyanda za Juu Kusini mikoa ya Iringa, Katavi, Mbeya, Njombe, Rukwa, Ruvuma na Songwe na Kanda ya Ziwa yenye mikoa ya Geita, Kagera, Mara, Mwanza, Shinyanga na Simiyu. Mwongozo huu umeandaliwa kwa kuzingatia hali ya udongo, mtawanyiko wa mvua na joto na pia umeonesha picha kwa baadhi ya mazao yanayolimwa katika Kanda husika', '2DiHb4pCxx_MWONGOZO.pdf', '2017-08-19 10:40:00', '2017-08-31 10:49:11'),
(12, 'UANZISHAJI WA KITALU NA UBEBESHAJI WA MIEMBE', 'oOH22l5p1k_UANZISHAJI.ico', 3, 'Kitalu ni mahali ambapo miche huoteshwa na kutunzwa kabla ya kupandikizwa kwenye bustani au shambani. Hii ni sehemu mama katika uzalishaji wa miche, na huchukua eneo dogo tu la shamba. Eneo hili ni muhimu kwa ajili ya uangalizi makini na urahisi wa huduma stahili kwa miche. Miche ya miembe hukaa kwenye kitalu hadi inapokuwa tayari kupandikizwa shambani au kuuzw', 'oOH22l5p1k_UANZISHAJI.pdf', '2017-08-19 10:40:58', '2017-08-31 10:50:11'),
(13, 'Plant Breeders’ Rights Act 2012 ', 'TyxlEkGjRJ_Plant.png', 4, 'Plant Breeders’ Rights Act 2012 ', 'TyxlEkGjRJ_Plant.pdf', '2017-08-19 10:44:22', '2017-08-19 10:44:22'),
(14, 'Plant Breeders’ Rights Act 2012 ', '12lTtXjclo_Plant.png', 4, 'Plant Breeders’ Rights Act 2012 ', '12lTtXjclo_Plant.pdf', '2017-08-19 10:47:01', '2017-08-19 10:47:01'),
(15, 'GN.49. The Fertilizer ( Bulk Procurement) Regulations,2017', 'ZpFhPa3LGC_GN.49..png', 4, 'GN.49. The Fertilizer ( Bulk Procurement) Regulations,2017', 'ZpFhPa3LGC_GN.49..pdf', '2017-08-19 10:47:44', '2017-08-19 10:47:44'),
(16, ' East African Community Protocol on Sanitary and Phytosanitary (SPS) Measures', 'U4dxPRVGZw_.png', 4, 'East African Community Protocol on Sanitary and Phytosanitary (SPS) Measures', 'U4dxPRVGZw_.pdf', '2017-08-19 10:48:12', '2017-08-19 10:48:12'),
(17, 'The Coffee Industry Regulations 2013', 'L4yPJajcrO_The.png', 4, 'The Coffee Industry Regulations 2013', 'L4yPJajcrO_The.pdf', '2017-08-19 10:48:57', '2017-08-19 10:48:57'),
(18, 'Monitoring African Food and Agricultural Policies Country Profile', 'TVo14VggdZ_Monitoring.png', 5, 'Monitoring African Food and Agricultural Policies Country Profile', 'TVo14VggdZ_Monitoring.pdf', '2017-08-19 10:53:23', '2017-08-19 10:53:23'),
(19, 'MAFAP Country Report 2005 - 2011', 'ROIuOb2OQE_MAFAP.png', 5, 'Review of Food and Agricultural Policies in the United Republic of Tanzania - Country Report 2005 - 2011 ', 'ROIuOb2OQE_MAFAP.pdf', '2017-08-19 10:54:33', '2017-08-19 10:54:33'),
(20, 'Bajeti ya Wizara ya Kilimo Chakula na Ushirika kwa Makadirio ya Matumizi ya Fedha kwa Mwaka 2013/14', 'wlGdJ5ho8I_Bajeti.ico', 2, 'Hotuba Ya Waziri Wa Kilimo Chakula Na Ushirika, MHESHIMIWA MHANDISI CHRISTOPHER KAJORO CHIZA (MB) , Kuhusu Makadirio Ya Matumizi Ya Fedha Ya Wizara Ya Kilimo, Chakula Na Ushirika Kwa Mwaka 2013/2014', 'wlGdJ5ho8I_Bajeti.pdf', '2017-08-20 05:27:30', '2017-08-31 10:42:17'),
(21, 'Usindikaji wa Mafuta Mwali ya Nazi', 'CZfABBPgdI_Usindikaji.ico', 3, 'Usindikaji wa Mafuta Mwali ya Nazi\r\n', 'CZfABBPgdI_Usindikaji.pdf', '2017-08-31 10:47:24', '2017-08-31 10:47:24'),
(22, 'Coffee', 'jmYf6pk1kX_Coffee.PNG', 1, '> Improve access to inputs and irrigation facilities by smallholder farmers for increasedyields.\r\n> Increase transparency and competition at the Moshi Exchange.\r\n> Establish price risk management solutions to deal with price volatility.\r\n> Reduce taxation to increase farm gate price, thereby incentivizing production.', 'jmYf6pk1kX_Coffee.pdf', '2017-10-11 09:32:46', '2017-10-11 09:32:46'),
(23, 'Dairy', 'hUJpmgsCgn_Dairy.PNG', 1, '> Dairy production and productivity remain much lower than expected.\r\n> Post-harvest losses in milk and dairy products are high.\r\n> Poor adherence to sanitary and phytosanitary issues hinder access to high value market.\r\n> Persistent marketing challenges are mostly caused by inadequate transport and marketinginfrastructure, limited access to marketing information and weak cooperatives.\r\n> Need to improve business environment for the dairy industry.', 'hUJpmgsCgn_Dairy.pdf', '2017-10-11 12:13:40', '2017-10-11 12:13:40'),
(24, 'Hides and Skins', 'aoQ0c9P7xm_Hides.PNG', 1, '> The hides and skins value chain has a huge potential to generate cash and employment opportunities. Butit is constrained by many challenges such as inadequate public investment, lack of trained personnel,poor quality of hides and skins, limited value addition, lack of quality and modern processing machines,inadequate availability of raw materials for local factories due to exports in the raw form, high post-harvest losses and underutilization of the capacity of local factories.\r\n> Effective implementation of recently developed Tanzania Leather Sector Strategy for 2016-2020 will benecessary to address the above challenges. It will be useful to monitor the performance of the strategycontinuously to ensure that its implementation is on track.\r\n> Private sector investment has an important role to play in the hides and skins industry. The governmentshould create an enabling environment to encourage more private investments in leather processingindustries and leather collection points/centres.', 'aoQ0c9P7xm_Hides.pdf', '2017-10-11 12:16:51', '2017-10-11 12:16:51'),
(25, 'Oil Seeds: A Case of Sunflower', '6HaYc5JkTS_Oil.PNG', 1, '> The national production of edible oil seed is much lower than its demand. The country spends aconsiderable amount of foreign currency for importing cooking oil. In 2012 half of edible oilssupplies were imported at a cost of USD 230 million (TZS 360 billion).\r\n> Sunflower is one of the key oil seed crops in Tanzania. It is grown by many small scale farmershence the development of the sunflower oil sector has a great potential for improving livelihoodsand welfare of relatively poorer households.', '6HaYc5JkTS_Oil.pdf', '2017-10-11 12:20:28', '2017-10-11 12:20:28'),
(26, 'SISAL', 'L9vLQp7Dey_SISAL.PNG', 1, '> Promote the adoption of improved technologies to increase productivity and processing of sisal.\r\n>  Promote an attractive business and investment environment for sisal in Tanzania.\r\n> Establish regulations that will ensure accessibility of long-term finance for the sisal sub-sector.', 'L9vLQp7Dey_SISAL.pdf', '2017-10-11 13:07:30', '2017-10-11 13:07:30'),
(27, 'Sugar', 'xIZqvr6MNS_Sugar.PNG', 1, '> Promote the establishment of a single desk sugar importation system.\r\n> Improve the transparency and efficiency of the Tanzania Sugar Board.\r\n> Harmonize import tariff rates between Tanzania Mainland and Zanzibar.\r\n> Harmonize import tariffs for raw and industrial sugar.\r\n> Improve business environment for sugar green field investments, processing and trade.', 'xIZqvr6MNS_Sugar.pdf', '2017-10-11 13:10:32', '2017-10-11 13:10:32'),
(28, 'Maize', 'VAxBYUSxZV_Maize.PNG', 1, '> Ad hoc trade and market interventions make maize markets risky while increasedtransparency and predictability will support the development of a more commercial andprofitable maize value chain in Tanzania.\r\n> The NFRA operations should be reviewed and improved since existing interventionsbring only minimal benefits to farmers in terms of price support but carry large financialimplications.\r\n> To increase productivity, the Government should explore ways to reduce the marketprice of fertilizer and promote the adoption of integrated soil fertility managementpractices by smallholder farmers.', 'VAxBYUSxZV_Maize.pdf', '2017-10-11 13:12:44', '2017-10-11 13:12:44'),
(29, 'Beef', 'YB2wnZP7ki_Beef.PNG', 1, '> Promote commercial production of high quality beef in intensive and extensive systems(ranching, pastoral and agro pastoral).\r\n> Promote inventorization, characterization, evaluation and selection of cattle breeds for beefproduction.\r\n> Invest in animal health through disease surveillance, vaccination and treatment.\r\n> Promote, support establishment and strengthen beef producer and trader associations.', 'Zx6W0tZRBV_Beef.pdf', '2017-10-11 13:16:24', '2018-02-14 02:34:49'),
(30, 'Pulses', 'A9PmnJyaWb_Pulses.PNG', 1, '> Pulses are important food and cash crops in Tanzania. Productivity is way below potential due to: reliance onrainfed agriculture and limited use of improved seeds, fertilizer, agro chemicals and improved agronomicpractices. Enhanced access to these inputs and agricultural extension services will contribute towardsenhancing productivity.\r\n> Demand for pulses is growing at national, regional and international levels; supporting farmers and tradersto get better access to market information and trade facilitation services will enable them tap into thatpotential.', 'A9PmnJyaWb_Pulses.pdf', '2017-10-11 13:18:35', '2017-10-11 13:18:35'),
(31, 'Rice', 'mWZbxwxv7O_Rice.PNG', 1, '> Tanzania has made great strides in promoting rice production in recent years. Production has more thantripled in 10 years--from about 400,000 tons (of milled rice equivalent) in 2004 to 1.5 million tons in2015.\r\n> The increase in domestic rice production in Tanzania mainland has resulted into a concurrent reductionin rice imports from 200,000 tons in 2004 to insignificant amount currently.', 'mWZbxwxv7O_Rice.pdf', '2017-10-11 13:22:15', '2017-10-11 13:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` int(10) unsigned NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `entity_id` int(10) unsigned DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `assets` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history_types`
--

CREATE TABLE IF NOT EXISTS `history_types` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2015_12_28_171741_create_social_logins_table', 1),
(4, '2015_12_29_015055_setup_access_tables', 1),
(5, '2017_05_20_110258_create_device_users_table', 1),
(6, '2017_06_06_220824_create_categories_table', 1),
(7, '2017_06_06_220825_create_documents_table', 1),
(8, '2017_06_15_061924_create_data_categories_table', 2),
(9, '2017_06_15_063042_create_raw_datas_table', 3),
(10, '2017_06_15_063043_create_raw_datas_table', 4),
(11, '2016_08_07_145904_add_table_cms_apicustom', 5),
(12, '2016_08_07_150834_add_table_cms_dashboard', 5),
(13, '2016_08_07_151210_add_table_cms_logs', 5),
(14, '2016_08_07_152014_add_table_cms_privileges', 5),
(15, '2016_08_07_152214_add_table_cms_privileges_roles', 5),
(16, '2016_08_07_152320_add_table_cms_settings', 5),
(17, '2016_08_07_152421_add_table_cms_users', 5),
(18, '2016_08_07_154624_add_table_cms_moduls', 5),
(19, '2016_08_17_225409_add_status_cms_users', 5),
(20, '2016_08_20_125418_add_table_cms_notifications', 5),
(21, '2016_09_04_033706_add_table_cms_email_queues', 5),
(22, '2016_09_16_035347_add_group_setting', 5),
(23, '2016_09_16_045425_add_label_setting', 5),
(24, '2016_09_17_104728_create_nullable_cms_apicustom', 5),
(25, '2016_10_01_141740_add_method_type_apicustom', 5),
(26, '2016_10_01_141846_add_parameters_apicustom', 5),
(27, '2016_10_01_141934_add_responses_apicustom', 5),
(28, '2016_10_01_144826_add_table_apikey', 5),
(29, '2016_11_14_141657_create_cms_menus', 5),
(30, '2016_11_15_132350_create_cms_email_templates', 5),
(31, '2016_11_15_190410_create_cms_statistics', 5),
(32, '2016_11_17_102740_create_cms_statistic_components', 5),
(33, '2017_07_15_102056_create_audio_table', 6),
(34, '2017_07_25_062829_create_video_categories_table', 7),
(35, '2017_07_25_063414_create_audio_categories_table', 8),
(36, '2017_07_25_064510_create_videos_table', 9),
(37, '2017_07_15_102057_create_audio_table', 10),
(38, '2017_06_06_220825_create_categories_table', 11),
(39, '2017_06_06_220826_create_documents_table', 12),
(40, '2017_06_15_061925_create_data_categories_table', 13),
(41, '2017_06_15_063044_create_raw_datas_table', 14),
(42, '2017_07_25_064511_create_videos_table', 15),
(43, '2014_10_12_00000_create_history_tables', 16),
(44, '2017_08_07_054013_create_news_table', 17),
(45, '2017_08_17_082609_create_profiles_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `story` varchar(7500) COLLATE utf8_unicode_ci NOT NULL,
  `published_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `summary`, `image_path`, `story`, `published_date`, `published`, `published_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'Serikali yaongeza uzalishaji katika mazao makuu ya chakula nchini na kujitosheleza kwa chakula 100%', 'Watafiti wa zao la korosho wametakiwa kuunganisha utafiti na masoko ili kuwasaidia wakulima wakati wa uongezaji', 'G61JIMA0jL_Serikali.jpg', 'Watafiti wa zao la korosho wametakiwa kuunganisha utafiti na masoko ili kuwasaidia wakulima wakati wa uongezaji wa thamani ya mazao yao  Akiongea wakati alipotembelea  mabanda ya Kituo cha  utafiti cha  Naliendele Mhe. Waziri wa Kilimo Mifugo na Uvuvi Dkt Chales Tzeba amesema namna pekee ya kuwasaidia wakulima wa korosho ni kuwapa elimu juu ya  teknolojia za usindikaji na uongezaji wa thamanai wa bidhaa zitokanazo na korosho na kuwaunganisha na masoko.  “mmekuwa mkifanya tafiti nyingi na kubwa kwa zao la korosho na mhogo sasa utafiti wenu usiishie kwenye kutafiti wa teknolojia za uzalishaji pekee lakini muweze kuwaunganisha wakulima soko na uongezaji wa thamani wa bidhaa zitokanazo na tafiti zenu.” alilisistiza Mhe. Tzeba.  Aidha amesema serikali imekuwa ikijitahidi kutoa ruzuku za pembejeo na kufuta kodi ambazo zilikuwa ni kikwazo kwa wakulima lengo likiwa ni kumnyanyua mkulima mdogo', '05 Aug 2017', '05 Aug 2017', 'Admin', '2017-08-31 11:24:33', '2017-08-31 11:24:33', NULL),
(8, 'Ole Nasha ajivunia kufutwa kwa baadhi ya kodi na tozo katika sekta ndogo ya mazao', 'Naibu Waziri wa Kilimo Mifugo na Uvuvi, Mhe. Wiliam Tate Ole Nasha (Mb) amesema kuwa kwa muda mrefu serikali imekuwa… ', '6vh5kc8DtC_Ole.jpg', 'Naibu Waziri wa Kilimo Mifugo na Uvuvi, Mhe. Wiliam Tate Ole Nasha (Mb) amesema kuwa kwa muda mrefu serikali imekuwa ikipata malalamiko kutoka kwa Wananchi mbalimbali hususan kwa wakulima nchini Tanzania wakipinga kodi na tozo mbalimbali zinazotozwa kwani zimekuwa zikiwanyonya badala ya kuwakwamua na wimbi kubwa la umasikini.', '05 Aug 2017', '05 Aug 2017', 'Admin', '2017-08-31 11:30:57', '2017-08-31 11:30:57', NULL),
(9, 'Shamba la mfano katika maonyesho ya nane nane 2017 Dodoma', 'Moja kati ya mashamba ya mfano katika manonyesho ya nane nane 2017 katika viwanja vya Nzuguni Dodoma.', 'VNJ8UBMCAj_Shamba.jpg', 'Moja kati ya mashamba ya mfano katika manonyesho ya nane nane 2017 katika viwanja vya Nzuguni Dodoma.', '03 Aug 2017', '03 Aug 2017', 'Admin', '2017-08-31 11:49:55', '2017-08-31 11:49:55', NULL),
(10, 'Nane nane 2017 Morogoro-Mh, Eng.Dkt. Charles Tizeba akisikiliza maelezo kutoka kwa muonyeshaji', 'Waziri wa Wizara ya Kilimo Mifugona Uvuvi, Mh, Eng.Dkt. Charles Tizeba alipotembelea maonyesho ya Nanenane Morogoro 2017 na hapo akiwa ndani ya banda la Halmashauri ya wilaya ya Temeke akisikiliza maelezo kutoka kwa muonyesha wa bidhaa za kilimo zipatikanazo ndani ya Halimashauri hiyo.', 'YeYWnY3MXO_Nane.jpg', '', '05 Aug 2017', '05 Aug 2017', 'Admin', '2017-08-31 11:51:13', '2017-08-31 11:51:13', NULL),
(11, 'Katibu Mkuu MALF-kilimo Eng. Methew Mtigumwe (kushoto) alipotembelea kituo cha udhibiti wa panya', 'Katibu Mkuu MALF-kilimo Eng. Methew Mtigumwe (kushoto) alipotembelea kituo cha udhibiti wa panya', 'qcGoLtfATx_Katibu.jpg', 'Katibu Mkuu MALF-kilimo  Eng. Methew Mtigumwe (kushoto) pamoja na mkurugenzi msaidizi wa utawala wa wizara ya Kilimo Mifugo na Uvuvi Bi Hilda Kinanga (kulia) wakipokelewa na mkuu wa kituo  kituo cha udhibiti wa panya wanaoharibu mazao kilichopo Morogoro.', '22 Jul 2017', '22 Jul 2017', 'Admin', '2017-08-31 11:53:12', '2017-08-31 11:53:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'view-backend', 'View Backend', 1, '2017-06-06 19:23:42', '2017-06-06 19:23:42'),
(2, 'manage-users', 'Manage Users', 2, '2017-06-06 19:23:42', '2017-06-06 19:23:42'),
(3, 'manage-roles', 'Manage Roles', 3, '2017-06-06 19:23:42', '2017-06-06 19:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bio` varchar(3550) COLLATE utf8_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `title`, `email`, `phone`, `bio`, `image_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(15, 'Mhe. Dk Charles Tizeba', 'Waziri wa Kilimo, Mifugo na Uvuvi, Mhe. Dk Charles Tizeba', 'ps@kilimo.go.tz', '+255 (026) 2321407/ 2320035', 'Waziri wa Kilimo, Mifugo na Uvuvi, Mhe. Dk Charles Tizeba', 'Lr7mrUHgdm_Waziri.jpg', '2017-08-31 12:02:44', '2017-08-31 12:02:44', NULL),
(16, 'Naibu Waziri Mhe. William Ole Nasha', 'Naibu Waziri Mhe. William Ole Nasha', 'ps@kilimo.go.tz', '+255 (026) 2321407/ 2320035', 'Naibu Waziri Mhe. William Ole Nasha', 'xx38GHScjc_Naibu.jpg', '2017-08-31 12:06:24', '2017-08-31 12:06:24', NULL),
(17, ' Eng. Mathew Mtigumwe', 'Katibu Mkuu Kilimo, Eng. Mathew Mtigumwe', 'ps@kilimo.go.tz', '+255 (026) 2321407/ 2320035', 'Katibu Mkuu Kilimo, Eng. Mathew Mtigumwe', 'yIjNdtXc39_Katibu.JPG', '2017-08-31 12:10:20', '2017-08-31 12:10:20', NULL),
(18, ' Mhe. Dkt. Mashingo', 'Katibu Mkuu Mifugo, Mhe. Dkt. Mashingo', 'ps@kilimo.go.tz', '+255 (026) 2321407/ 2320035', 'Katibu Mkuu Mifugo, Mhe. Dkt. Mashingo', 'L28WN1oP1n_Katibu.jpg', '2017-08-31 12:11:20', '2017-08-31 12:11:20', NULL),
(19, 'Mhe. Dkt. Budeba', 'Katibu Mkuu Uvuvi, Mhe. Dkt. Budeba', 'ps@kilimo.go.tz', '+255 (026) 2321407/ 2320035', 'Katibu Mkuu Uvuvi, Mhe. Dkt. Budeba', 'wl34iZocko_Katibu.jpg', '2017-08-31 12:12:22', '2017-08-31 12:12:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `raw_datas`
--

CREATE TABLE IF NOT EXISTS `raw_datas` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` varchar(3550) COLLATE utf8_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `raw_datas`
--

INSERT INTO `raw_datas` (`id`, `title`, `summary`, `file_path`, `thumbnail`, `data_category_id`, `created_at`, `updated_at`) VALUES
(4, 'Agstats For Food Security Forecast for 2012/13', ' Final Food Crop Production Forecast for 2012/13 Food Security ', 'xyTn4yZkYO_Agstats.pdf', 'Nel5MCYrL6_Agstats.png', 1, '2017-07-29 04:10:40', '2017-08-31 11:00:06'),
(5, 'Agstats For Food Security Forecast for 2013/14', 'The 2012/13 Preliminary Food Crop Production Forecast for 2013/14 Food Security  ', 'gRZA04Favx_Agstats.pdf', 'f1GeMQjJaQ_Agstats.png', 1, '2017-08-19 11:00:31', '2017-08-31 10:57:56'),
(6, 'National Sample Census of Agriculture 2007/08', 'National Sample Census of Agriculture 2007/08', '2rlFZ37AH7_National.pdf', '2rlFZ37AH7_National.png', 2, '2017-08-19 11:06:02', '2017-08-19 11:06:02'),
(7, 'National Sample Census of Agriculture 2007/08', 'National Sample Census of Agriculture 2007/08', 'OMWYYisEwp_National.docx', 'OMWYYisEwp_National.jpg', 2, '2017-08-26 05:09:30', '2017-08-26 05:09:30'),
(8, 'mtajio utakua  mkubwa', 'mtajio utakua  mkubwa', 'CGCpGGfhY1_mtajio.xlsx', 'CGCpGGfhY1_mtajio.JPG', 2, '2017-08-26 05:34:42', '2017-08-26 05:34:42'),
(9, 'ANNUAL STATISTICS REPORT 2012 FINAL', 'The Fisheries Annual Statistical Report is prepared annually by Fisheries Development Division of the Ministry of Livestoc\r\nand Fisheries Development; it contains updated information on the following fisheries categories; \r\n  Capture fish production; \r\n  Frame Survey information; \r\n  Export data; \r\n  Import data; \r\n  Fish consumption; \r\n  Fisheries protection and Licensing information; \r\n  EEZ data; and \r\n  Aquaculture production. ', 'IbWi6QRQbW_ANNUAL.pdf', 'IbWi6QRQbW_ANNUAL.PNG', 1, '2017-08-30 19:57:18', '2017-08-30 19:57:18'),
(10, 'BASIC DATA FOR LIVESTOCK AND FISHERIES SECTORS 2013', 'This is the first statistics booklet to be published by the Ministry of Livestock and Fisheries Development MLFD following its establishment by the President through Government Notice No. 494 of 17 December, 2010. MLFD has the overall mandate of managing and coordinating the development of livestock and fisheries resources in the country.', '0Y3YcKVHyW_BASIC.pdf', '', 3, '2017-08-30 20:10:25', '2017-08-30 20:10:25'),
(11, 'AGSTATS Prel 2012 Executive Summary', 'AGSTATS FOR FOOD SECURITY Mz Cr Nc Tot United Republic of Tanzania Ministry of Agriculture Food Security and Cooperatives VOLUME 1: The 2011/12 Preliminary Food Crop Production Forecast for 2012/13 Food', 'kPcpAT8BXk_AGSTATS.pdf', '', 1, '2017-08-31 11:01:39', '2017-08-31 11:01:39'),
(12, 'AGSTATS Fin2011 Executive Summary', 'AGSTATS FOR FOOD SECURITY 0 2 4 6 8 10 M z C r Nc Tot VOLUME 1: The 2010/11 Final Food Crop Production Forecast for 2011/12 Food Security', 'SnvXM9VjGC_AGSTATS.pdf', '', 1, '2017-08-31 11:07:41', '2017-08-31 11:07:41'),
(13, 'Presentation', 'Presentation Ag. policy App', 'h6ccIY77ck_Presentation.ppt', '', 3, '2017-10-02 14:19:49', '2017-10-02 14:19:49');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `all` tinyint(1) NOT NULL DEFAULT '0',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `all`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 1, 1, '2017-06-06 19:23:40', '2017-06-06 19:23:40'),
(2, 'Executive', 0, 2, '2017-06-06 19:23:40', '2017-07-26 15:07:18'),
(3, 'User', 0, 3, '2017-06-06 19:23:40', '2017-06-06 19:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(3, 3, 3),
(5, 5, 1),
(6, 5, 2),
(7, 2, 2),
(8, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `social_logins`
--

CREATE TABLE IF NOT EXISTS `social_logins` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `provider` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `confirmation_code`, `confirmed`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sahele Kejo', 'admin@admin.com', '$2y$10$90RRSPoAQiwsb6x21geQkepLFtWcHY8U.rPcgysqmUZq7/chcEhmK', 1, 'ad56d8de72e44a761285245cdd078358', 1, 'm82YOT53Pwlx6EWpzVhOgNoBX3nCPDJJv8qIfbdNYUt1mhLCPezqnu8VFB3q', '2017-06-06 19:23:39', '2018-02-14 12:13:32', NULL),
(2, 'Victor', 'nshabav@gmail.com', '$2y$10$.5pplxJiSGAAZJNw2xhAM.L66xKmfuZWYvwPZR.7h6gFzC6cFnjZi', 1, 'f089980861c31c85660c0cb834a503c2', 1, 'Gup5USDDgI6FxZz0qAHW2EONyEtePeE8xblY4NLGLdZjBmUJfnmCmZE0oOZD', '2017-06-06 19:23:39', '2017-08-02 09:49:41', NULL),
(3, 'Default User', 'user@user.com', '$2y$10$IO9FaufP4m7Y/6Sv7757zeaEzuqCATCzIyimUSVySKojOCAijxEF6', 1, 'c3d3842ab7feac0131a3458c8e9a3c3a', 1, 'kzvajigULAxxnvsz8iafwOaWgoZOZxKRN4c6UBFR80dnAItAmr8e4isKRSox', '2017-06-06 19:23:39', '2017-07-26 15:02:03', NULL),
(5, 'Joshua Kisanga', 'gbkisanga@gmail.com', '$2y$10$6ppsDZez2D5Q.OWsG0Kgm./YSRdoo5UmcXzFH9wimHRBjTwnPMzIC', 1, '415bf1f3259cb01419ed29469ce8b027', 1, NULL, '2017-07-26 14:23:32', '2017-07-26 14:23:32', NULL),
(6, 'Joseph Nyansiro', 'jnyansiro@gmail.com', '$2y$10$0TBJZJnguLVsqYKenLzDU.tZyJ3c37LJhBpm7Zj1HDOHUCnWdJFi.', 1, 'cab12c5e36955ae9d1d7d0d22f1088ca', 0, 't52Qw2VsGNWNpJFNifv8E95XxvCs9U5TjFb0mSud5FUrG5GDGz1qBy6ndTAF', '2017-10-01 23:18:56', '2017-10-01 23:34:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(10) unsigned NOT NULL,
  `video_category_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video_category_id`, `title`, `desc`, `file_path`, `thumbnail`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 2, 'Manage Videos in you may not use this file except in compliance with Category ', 'Manage Videos in you may not use this file except in compliance with Category ', '611ev5yFZt_Manage.mp4', '611ev5yFZt_Manage.jpeg', 1, '2017-08-24 05:45:35', '2017-08-24 05:45:35', NULL),
(4, 2, 'video 1', '12345', 'ZKXXz2iCDJ_video.mp4', 'ZKXXz2iCDJ_video.jpg', 1, '2018-02-12 19:17:03', '2018-02-12 19:17:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video_categories`
--

CREATE TABLE IF NOT EXISTS `video_categories` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `video_categories`
--

INSERT INTO `video_categories` (`id`, `title`, `desc`, `thumbnail`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Documentaries', 'Documentaries', '7Vrepjpih1_Documentaries.jpg', '2017-07-26 05:30:43', '2018-02-12 19:25:57', '2018-02-12 19:25:57'),
(3, 'Bunge', 'Bunge', 'vSHJIR3x9w_Bunge.png', '2017-08-31 12:18:11', '2017-09-13 00:50:44', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`id`), ADD KEY `audio_audio_category_id_foreign` (`audio_category_id`);

--
-- Indexes for table `audio_categories`
--
ALTER TABLE `audio_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_apikey`
--
ALTER TABLE `cms_apikey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_logs`
--
ALTER TABLE `cms_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_menus`
--
ALTER TABLE `cms_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_moduls`
--
ALTER TABLE `cms_moduls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_notifications`
--
ALTER TABLE `cms_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_privileges`
--
ALTER TABLE `cms_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_settings`
--
ALTER TABLE `cms_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_statistics`
--
ALTER TABLE `cms_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_users`
--
ALTER TABLE `cms_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_categories`
--
ALTER TABLE `data_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_users`
--
ALTER TABLE `device_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`), ADD KEY `documents_category_id_foreign` (`category_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`), ADD KEY `history_type_id_foreign` (`type_id`), ADD KEY `history_user_id_foreign` (`user_id`);

--
-- Indexes for table `history_types`
--
ALTER TABLE `history_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`), ADD KEY `permission_role_permission_id_foreign` (`permission_id`), ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raw_datas`
--
ALTER TABLE `raw_datas`
  ADD PRIMARY KEY (`id`), ADD KEY `raw_datas_data_category_id_foreign` (`data_category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`), ADD KEY `role_user_user_id_foreign` (`user_id`), ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `social_logins`
--
ALTER TABLE `social_logins`
  ADD PRIMARY KEY (`id`), ADD KEY `social_logins_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`), ADD KEY `videos_video_category_id_foreign` (`video_category_id`);

--
-- Indexes for table `video_categories`
--
ALTER TABLE `video_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audio`
--
ALTER TABLE `audio`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `audio_categories`
--
ALTER TABLE `audio_categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_apikey`
--
ALTER TABLE `cms_apikey`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cms_logs`
--
ALTER TABLE `cms_logs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_menus`
--
ALTER TABLE `cms_menus`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cms_moduls`
--
ALTER TABLE `cms_moduls`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `cms_notifications`
--
ALTER TABLE `cms_notifications`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_privileges`
--
ALTER TABLE `cms_privileges`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `cms_settings`
--
ALTER TABLE `cms_settings`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `cms_statistics`
--
ALTER TABLE `cms_statistics`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_users`
--
ALTER TABLE `cms_users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `data_categories`
--
ALTER TABLE `data_categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `device_users`
--
ALTER TABLE `device_users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `history_types`
--
ALTER TABLE `history_types`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `raw_datas`
--
ALTER TABLE `raw_datas`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `social_logins`
--
ALTER TABLE `social_logins`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `video_categories`
--
ALTER TABLE `video_categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `audio`
--
ALTER TABLE `audio`
ADD CONSTRAINT `audio_audio_category_id_foreign` FOREIGN KEY (`audio_category_id`) REFERENCES `audio_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
ADD CONSTRAINT `documents_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `history`
--
ALTER TABLE `history`
ADD CONSTRAINT `history_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `history_types` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `raw_datas`
--
ALTER TABLE `raw_datas`
ADD CONSTRAINT `raw_datas_data_category_id_foreign` FOREIGN KEY (`data_category_id`) REFERENCES `data_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_logins`
--
ALTER TABLE `social_logins`
ADD CONSTRAINT `social_logins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
ADD CONSTRAINT `videos_video_category_id_foreign` FOREIGN KEY (`video_category_id`) REFERENCES `video_categories` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
