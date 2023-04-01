-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 04:06 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_inventory_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_event`
--

CREATE TABLE `book_event` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clint_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clint_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clint_requirement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateOfProgram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_discussion_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand_masters`
--

CREATE TABLE `brand_masters` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active' COMMENT 'active & inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand_masters`
--

INSERT INTO `brand_masters` (`brand_id`, `brand_name`, `brand_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'kjhgv', 'active', '2023-01-14 14:45:12', '2023-01-14 14:45:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_masters`
--

CREATE TABLE `category_masters` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active' COMMENT 'active & inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_masters`
--

INSERT INTO `category_masters` (`cat_id`, `cat_name`, `cat_slug`, `cat_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'kjhv', 'l', 'active', '2023-01-14 14:45:25', '2023-01-14 14:45:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `env_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `env_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `env_loc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `env_date` date NOT NULL,
  `env_st_time` time NOT NULL,
  `env_end_time` time NOT NULL,
  `env_person_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `env_person_ph` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `env_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issue_items`
--

CREATE TABLE `issue_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_tbls`
--

CREATE TABLE `item_tbls` (
  `item_id` int(10) UNSIGNED NOT NULL,
  `products_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `item_sl_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `models_id` int(10) UNSIGNED DEFAULT NULL,
  `item_approx_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stores_id` int(10) UNSIGNED NOT NULL,
  `item_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_status` enum('available','unavailable','damage') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `item_total_qty` bigint(20) DEFAULT NULL,
  `item_sale_qty` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_tbls`
--

INSERT INTO `item_tbls` (`item_id`, `products_id`, `category_id`, `brand_id`, `item_sl_no`, `models_id`, `item_approx_price`, `stores_id`, `item_desc`, `item_status`, `item_total_qty`, `item_sale_qty`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 'se4r567uj', 1, '77777777', 1, 'nsxbnsa', 'available', 1, 0, '2023-01-14 14:46:51', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_24_110254_create_brand_masters_table', 1),
(6, '2022_09_24_110323_create_category_masters_table', 1),
(7, '2022_09_27_162034_create_store_master_table', 1),
(8, '2022_09_27_192919_create_supplier_tbls_table', 1),
(9, '2022_10_28_092336_create_book_event_table', 1),
(10, '2022_10_29_193148_create_stock_table', 1),
(11, '2022_11_10_173114_create_event_table', 1),
(12, '2022_11_14_194617_create_totalstock_table', 1),
(13, '2022_12_15_193951_create_model_master_table', 1),
(14, '2022_12_15_194012_create_product_master_table', 1),
(15, '2022_16_27_195035_create_item_tbls_table', 1),
(16, '2023_01_13_213042_create_issue_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_master`
--

CREATE TABLE `model_master` (
  `mdl_id` int(10) UNSIGNED NOT NULL,
  `mdl_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdl_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdl_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_master`
--

INSERT INTO `model_master` (`mdl_id`, `mdl_name`, `mdl_slug`, `mdl_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'lkjhgft6', 'kjuy6t5', 'active', '2023-01-14 09:15:35', '2023-01-14 09:15:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

CREATE TABLE `product_master` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_status` enum('available','unavailable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`product_id`, `product_name`, `product_desc`, `product_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'lkjhgf', 'fghjk', 'available', '2023-01-14 14:45:46', '2023-01-14 14:45:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(10) UNSIGNED NOT NULL,
  `stk_name_id` bigint(20) UNSIGNED NOT NULL,
  `stk_brand_id` bigint(20) UNSIGNED NOT NULL,
  `stk_category_id` bigint(20) UNSIGNED NOT NULL,
  `stk_store_Loc_id` bigint(20) UNSIGNED NOT NULL,
  `stk_model_no` bigint(20) UNSIGNED NOT NULL,
  `stk_serial_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stk_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store_master`
--

CREATE TABLE `store_master` (
  `store_id` int(10) UNSIGNED NOT NULL,
  `store_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_incharge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_master`
--

INSERT INTO `store_master` (`store_id`, `store_name`, `store_location`, `store_incharge`, `store_phone`, `store_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'kjhgf', 'fghjk', 'kjhgf', '456789', 'active', '2023-01-14 09:16:28', '2023-01-14 09:16:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_tbls`
--

CREATE TABLE `supplier_tbls` (
  `sup_id` int(10) UNSIGNED NOT NULL,
  `sup_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_office_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_mob_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_comp_mob_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sup_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sup_status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_tbls`
--

INSERT INTO `supplier_tbls` (`sup_id`, `sup_name`, `sup_company_name`, `sup_office_address`, `sup_mob_no`, `sup_comp_mob_no`, `sup_email`, `sup_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'kjhygt', 'lkjhgfds', 'kolkatq', '9876543', '0987654', 'mjnhgfd@dfvgb.com', 'active', '2023-01-14 14:46:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `totalstock`
--

CREATE TABLE `totalstock` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `model_no_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `in_item_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `out_item_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remaing_stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `totalstock`
--

INSERT INTO `totalstock` (`id`, `category_id`, `brand_id`, `model_no_id`, `item_id`, `in_item_qty`, `out_item_qty`, `remaing_stock`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 1, '1', '0', '0', '2023-01-14 09:16:51', '2023-01-14 09:16:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_event`
--
ALTER TABLE `book_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_masters`
--
ALTER TABLE `brand_masters`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category_masters`
--
ALTER TABLE `category_masters`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `issue_items`
--
ALTER TABLE `issue_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_tbls`
--
ALTER TABLE `item_tbls`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `item_tbls_category_id_foreign` (`category_id`),
  ADD KEY `item_tbls_brand_id_foreign` (`brand_id`),
  ADD KEY `item_tbls_products_id_foreign` (`products_id`),
  ADD KEY `item_tbls_models_id_foreign` (`models_id`),
  ADD KEY `item_tbls_stores_id_foreign` (`stores_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_master`
--
ALTER TABLE `model_master`
  ADD PRIMARY KEY (`mdl_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product_master`
--
ALTER TABLE `product_master`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `store_master`
--
ALTER TABLE `store_master`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `supplier_tbls`
--
ALTER TABLE `supplier_tbls`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `totalstock`
--
ALTER TABLE `totalstock`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `book_event`
--
ALTER TABLE `book_event`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand_masters`
--
ALTER TABLE `brand_masters`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_masters`
--
ALTER TABLE `category_masters`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issue_items`
--
ALTER TABLE `issue_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_tbls`
--
ALTER TABLE `item_tbls`
  MODIFY `item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `model_master`
--
ALTER TABLE `model_master`
  MODIFY `mdl_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store_master`
--
ALTER TABLE `store_master`
  MODIFY `store_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier_tbls`
--
ALTER TABLE `supplier_tbls`
  MODIFY `sup_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `totalstock`
--
ALTER TABLE `totalstock`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item_tbls`
--
ALTER TABLE `item_tbls`
  ADD CONSTRAINT `item_tbls_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brand_masters` (`brand_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_tbls_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category_masters` (`cat_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_tbls_models_id_foreign` FOREIGN KEY (`models_id`) REFERENCES `model_master` (`mdl_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_tbls_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `product_master` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_tbls_stores_id_foreign` FOREIGN KEY (`stores_id`) REFERENCES `store_master` (`store_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
