-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2019 at 07:05 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `panna`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_customer_reports`
--

CREATE TABLE `acc_customer_reports` (
  `id` int(11) NOT NULL,
  `sales_amount_id` int(11) DEFAULT NULL,
  `acc_received_id` int(11) DEFAULT NULL,
  `open_balance_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acc_customer_reports`
--

INSERT INTO `acc_customer_reports` (`id`, `sales_amount_id`, `acc_received_id`, `open_balance_id`, `created_at`) VALUES
(1, 1, NULL, NULL, '2019-07-22 13:27:54'),
(2, 2, NULL, NULL, '2019-07-22 13:28:38'),
(3, NULL, 1, NULL, '2019-07-22 13:30:49'),
(4, NULL, 2, NULL, '2019-07-22 13:31:05'),
(5, NULL, 3, NULL, '2019-07-22 13:49:33'),
(6, 3, NULL, NULL, '2019-07-22 13:49:33'),
(7, NULL, 4, NULL, '2019-07-22 13:50:30'),
(8, NULL, NULL, 1, '2019-07-23 05:35:10'),
(9, NULL, NULL, 2, '2019-07-23 05:35:10'),
(10, 4, NULL, NULL, '2019-07-23 06:23:45'),
(11, 5, NULL, NULL, '2019-07-23 06:28:17'),
(12, 6, NULL, NULL, '2019-07-23 06:43:42'),
(13, 7, NULL, NULL, '2019-07-23 06:58:10'),
(14, NULL, 5, NULL, '2019-08-04 08:01:04'),
(15, NULL, 6, NULL, '2019-09-11 04:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `acc_ledger`
--

CREATE TABLE `acc_ledger` (
  `id` int(11) NOT NULL,
  `acc_type` int(11) NOT NULL COMMENT 'ASSETS,EXPENSE,INCOME,LIABILITIES',
  `head_id` int(11) NOT NULL COMMENT 'ACCOUNTS RECEIVABLE (DEBITORS) as like',
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `company_bank_id` int(11) DEFAULT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `debit` decimal(10,2) NOT NULL DEFAULT 0.00,
  `credit` decimal(10,2) NOT NULL DEFAULT 0.00,
  `note` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `running_year` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acc_ledger`
--

INSERT INTO `acc_ledger` (`id`, `acc_type`, `head_id`, `company_id`, `branch_id`, `customer_id`, `supplier_id`, `company_bank_id`, `name`, `debit`, `credit`, `note`, `running_year`, `status`, `created_at`) VALUES
(5, 3, 5, 1, 1, NULL, NULL, NULL, 'Sales of Product', '0.00', '0.00', NULL, 1, 1, '2019-07-21 10:53:36'),
(6, 3, 5, 1, 1, NULL, NULL, NULL, 'Damage', '0.00', '0.00', NULL, 1, 1, '2019-07-21 10:53:40'),
(46, 4, 3, 3, 7, NULL, 12, NULL, 'Local Supplier', '0.00', '0.00', NULL, 0, 1, '2019-08-18 15:56:55'),
(47, 4, 3, 3, 7, NULL, 13, NULL, 'Scan Cement Ltd.', '0.00', '0.00', NULL, 0, 1, '2019-08-18 15:58:55'),
(48, 4, 3, 3, 7, NULL, 14, NULL, 'Shah Cement Ltd', '0.00', '0.00', NULL, 0, 1, '2019-08-18 16:01:11'),
(49, 4, 3, 3, 7, NULL, 15, NULL, 'Abul Khair Steel Melting Ltd.', '0.00', '0.00', NULL, 0, 1, '2019-08-18 16:04:58'),
(50, 4, 3, 3, 7, NULL, 16, NULL, 'Aman Cement Mills Ltd.', '5000000.00', '0.00', NULL, 0, 1, '2019-09-11 04:36:02'),
(51, 4, 3, 3, 7, NULL, 17, NULL, 'Eastern Cement Industries Limited', '0.00', '0.00', NULL, 0, 1, '2019-08-18 16:14:22'),
(52, 4, 3, 3, 7, NULL, 18, NULL, 'Conabri Trade Link', '0.00', '0.00', NULL, 0, 1, '2019-08-18 16:17:48'),
(53, 4, 3, 3, 7, NULL, 19, NULL, 'Shahin Enterprise', '0.00', '0.00', NULL, 0, 1, '2019-08-18 16:19:33'),
(54, 4, 3, 3, 7, NULL, 20, NULL, 'Seven Circle (BD) Ltd.', '0.00', '0.00', NULL, 0, 1, '2019-08-18 16:24:26'),
(55, 1, 1, 3, 7, 44, NULL, NULL, 'Local Customer', '0.00', '0.00', NULL, 1, 1, '2019-08-18 16:28:36'),
(56, 1, 1, 3, 7, 45, NULL, NULL, 'Azibar Master', '0.00', '250000.00', NULL, 1, 1, '2019-09-11 04:32:28'),
(57, 1, 1, 3, 7, 46, NULL, NULL, 'Mazad', '0.00', '0.00', NULL, 1, 1, '2019-08-18 16:50:36'),
(58, 1, 2, 3, 7, NULL, NULL, 10, 'Prime Bank Ltd.', '0.00', '0.00', NULL, 0, 1, '2019-08-18 17:57:15'),
(59, 1, 2, 3, 7, NULL, NULL, 11, 'Prime Bank Ltd. (CC)', '0.00', '0.00', NULL, 0, 1, '2019-08-18 17:58:22'),
(60, 1, 2, 3, 7, NULL, NULL, 12, 'Prime Bank Ltd.', '0.00', '0.00', NULL, 0, 1, '2019-08-18 17:59:02'),
(61, 1, 2, 3, 7, NULL, NULL, 13, 'NRB Commercial Bank (Credit Card)', '0.00', '0.00', NULL, 0, 1, '2019-08-18 18:00:07'),
(62, 1, 1, 3, 7, 47, NULL, NULL, 'Anu', '0.00', '0.00', NULL, 1, 1, '2019-08-18 18:02:34'),
(63, 1, 1, 3, 7, 48, NULL, NULL, 'Meser Ali', '0.00', '0.00', NULL, 1, 1, '2019-08-18 18:04:13'),
(64, 1, 1, 3, 7, 49, NULL, NULL, 'Samsul Arefin', '0.00', '0.00', NULL, 1, 1, '2019-08-18 18:05:14'),
(68, 1, 2, 4, 8, NULL, NULL, 14, 'saiful islam', '0.00', '0.00', NULL, 1, 1, '2019-10-14 16:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `acc_main_head`
--

CREATE TABLE `acc_main_head` (
  `id` int(11) NOT NULL,
  `acc_type` int(10) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acc_main_head`
--

INSERT INTO `acc_main_head` (`id`, `acc_type`, `name`, `status`, `created_at`) VALUES
(1, 1, 'ACCOUNTS RECEIVABLE (DEBITORS)', 1, '2019-06-22 12:38:20'),
(2, 1, 'CASH AT BANK', 1, '2019-06-22 12:38:31'),
(3, 4, 'ACCOUNTS PAYABLE (CREDITORS)', 1, '2019-06-22 12:38:40'),
(4, 4, 'PURCHASE AT PRODUCT', 1, '2019-06-23 05:08:16'),
(5, 3, 'SALES OF PRODUCT', 1, '2019-07-16 14:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `acc_opening_balance`
--

CREATE TABLE `acc_opening_balance` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL COMMENT 'acc_ledger_id',
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `debit` decimal(10,2) DEFAULT NULL,
  `credit` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acc_opening_balance`
--

INSERT INTO `acc_opening_balance` (`id`, `account_id`, `company_id`, `branch_id`, `debit`, `credit`, `created_at`) VALUES
(1, 0, 0, 0, '5000.00', NULL, '2019-07-30 12:26:46'),
(2, 4, 1, 1, '2000.00', NULL, '2019-07-22 13:26:57');

-- --------------------------------------------------------

--
-- Table structure for table `acc_payment`
--

CREATE TABLE `acc_payment` (
  `id` int(11) NOT NULL,
  `received_no` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `account_id` int(11) NOT NULL COMMENT 'ledger id',
  `stock_amount_id` int(11) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `debit` decimal(10,2) DEFAULT NULL,
  `credit` decimal(10,2) DEFAULT NULL,
  `pay_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cheque_no` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `cheque_date` date DEFAULT NULL,
  `mature_date` date DEFAULT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pay_by` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `running_year` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acc_payment`
--

INSERT INTO `acc_payment` (`id`, `received_no`, `account_id`, `stock_amount_id`, `company_id`, `branch_id`, `date`, `debit`, `credit`, `pay_type`, `cheque_no`, `bank_id`, `cheque_date`, `mature_date`, `description`, `pay_by`, `running_year`, `created_at`) VALUES
(1, 'PRV-00001', 2, 8, 1, 1, '2019-07-23', '400.00', NULL, 'Cash', NULL, NULL, NULL, NULL, NULL, 'Super Admin', 1, '2019-07-23 11:33:47'),
(2, 'PRV-00002', 1, NULL, 1, 1, '2019-07-24', '5000.00', NULL, 'Cash', NULL, NULL, NULL, NULL, '', 'Super Admin', 1, '2019-07-24 05:16:04'),
(3, 'PRV-00003', 50, NULL, 3, 7, '2019-09-11', '2500000.00', NULL, 'Bank', '125469', 4, '2019-09-11', '2019-09-11', 'ghftrds', 'Md. Labib Uddin', 1, '2019-09-11 04:35:43'),
(4, 'PRV-00004', 50, NULL, 3, 7, '2019-09-11', '2500000.00', NULL, 'Bank', '125469', 4, '2019-09-11', '2019-09-11', 'ghftrds', 'Md. Labib Uddin', 1, '2019-09-11 04:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `acc_received`
--

CREATE TABLE `acc_received` (
  `id` int(11) NOT NULL,
  `received_no` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `account_id` int(11) NOT NULL COMMENT 'ledger id',
  `sales_amount_id` int(11) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `debit` decimal(10,2) DEFAULT NULL COMMENT 'due',
  `credit` decimal(10,2) DEFAULT NULL,
  `received_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cheque_no` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `cheque_date` date DEFAULT NULL,
  `mature_date` date DEFAULT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `received_by` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference_id` int(11) NOT NULL DEFAULT 0,
  `reference` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `running_year` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acc_received`
--

INSERT INTO `acc_received` (`id`, `received_no`, `account_id`, `sales_amount_id`, `company_id`, `branch_id`, `date`, `debit`, `credit`, `received_type`, `cheque_no`, `bank_id`, `cheque_date`, `mature_date`, `description`, `received_by`, `reference_id`, `reference`, `running_year`, `created_at`) VALUES
(1, 'MRV-00001', 3, NULL, 1, 1, '2019-07-22', NULL, '5000.00', 'Cash', NULL, NULL, NULL, NULL, '', 'Super Admin', 0, 'marketing', 1, '2019-07-22 13:30:49'),
(2, 'MRV-00002', 4, NULL, 1, 1, '2019-07-22', NULL, '2000.00', 'Cash', NULL, NULL, NULL, NULL, '', 'Super Admin', 0, 'marketing', 1, '2019-07-22 13:31:05'),
(3, 'MRV-00003', 4, 3, 1, 1, '2019-07-22', NULL, '500.00', 'Cash', NULL, NULL, NULL, NULL, NULL, 'Super Admin', 0, NULL, 1, '2019-07-22 13:49:33'),
(4, 'MRV-00004', 4, NULL, 1, 1, '2019-07-22', NULL, '100.00', 'Cash', NULL, NULL, NULL, NULL, '', 'Super Admin', 0, 'marketing', 1, '2019-07-22 13:50:30'),
(5, 'MRV-00005', 3, NULL, 1, 1, '2019-08-04', NULL, '5000.00', 'Cash', NULL, NULL, NULL, NULL, '', 'Super Admin', 0, 'marketing', 1, '2019-08-04 08:01:04'),
(6, 'MRV-00006', 56, NULL, 3, 7, '2019-09-11', NULL, '250000.00', 'Bank', '1245825', 9, '2019-09-11', '2019-09-11', 'cffff', 'Md. Labib Uddin', 0, 'marketing', 1, '2019-09-11 04:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `acc_type`
--

CREATE TABLE `acc_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acc_type`
--

INSERT INTO `acc_type` (`id`, `name`, `type`, `created_at`) VALUES
(1, 'ASSETS', 'Dr', '2019-06-19 10:21:53'),
(2, 'EXPENSE', 'Dr', '2019-06-19 10:21:53'),
(3, 'INCOME', 'Cr', '2019-06-19 10:22:17'),
(4, 'LIABILITIES', 'Cr', '2019-06-19 10:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `temp_password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `ip` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `user_agent` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_key` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `company_id`, `branch_id`, `role_id`, `name`, `username`, `password`, `temp_password`, `phone`, `status`, `ip`, `last_login`, `user_agent`, `reset_key`, `created_at`) VALUES
(1, 0, 0, 1, '', 'superadmin', '$2y$10$gt3ssB8aHNNFYOyg57Da.e5ZuHUFxZKmREr97mt/idRkIUcxjOSLO', '', '', 1, '::1', '2019-10-14 22:06:25', 'Chrome 77.0.3865.90Windows 10', '', '2019-10-14 16:06:25'),
(44, 3, 7, 16, 'Md. Taijul Islam', 'taijul@gmail.com', '$2y$10$yOXghNpMrSrgvoUXjp057ePaeoo1kOzK.ZbhL9JZpKDCK3R4tmrYe', '', '(+88) 017-1641-0696', 1, '103.237.76.59', '2019-08-18 23:55:13', 'Chrome 76.0.3809.100Windows 10', NULL, '2019-08-18 17:55:13'),
(45, 3, 7, 2, 'Md. Labib Uddin', 'labib@gmail.com', '$2y$10$Yq7nXZGyV5w24omLuZxNSOiE8vRi3T7GnTYqT14BPIEJiel8dggNW', '', '(+88) 015-5238-7136', 1, '103.237.76.61', '2019-10-06 13:34:28', 'Chrome 77.0.3865.90Windows 10', '5d787ac439a43', '2019-10-06 07:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `running_year` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `company_id`, `name`, `contact`, `tel`, `address`, `running_year`, `status`, `created_at`) VALUES
(7, 3, 'Board Ghar', '(+88) 017-1641-0696', '01716410696', 'Board Ghar, Gazipur', 1, 1, '2019-08-18 14:52:13'),
(8, 4, 'Chowrasta', '(+88) 017-1641-0696', '01716410696', 'Chowrasta, Gazipur', 1, 1, '2019-08-18 14:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `web` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `running_year` int(11) NOT NULL COMMENT 'running session',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `logo`, `address`, `mobile`, `tel`, `email`, `web`, `running_year`, `status`, `created_at`) VALUES
(3, 'Panna Traders', 'uploads/logo/DC1566139731L.jpg', 'Board Ghar, Gazipur', '01716410696', '01716410696', 'abdus.shafi@gmail.com', 'panna.com', 1, 1, '2019-08-18 14:48:51'),
(4, 'Maliha Traders', 'uploads/logo/DC1566139772L.jpg', 'Chowrasta Gazipur', '01552387136', '01552387136', 'abdus.shafi@gmail.com', 'maliha.com', 1, 1, '2019-08-18 14:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `company_bank`
--

CREATE TABLE `company_bank` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `branch_address` text COLLATE utf8_unicode_ci NOT NULL,
  `account_no` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ac_type` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `running_year` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company_bank`
--

INSERT INTO `company_bank` (`id`, `company_id`, `branch_id`, `name`, `branch_address`, `account_no`, `ac_type`, `running_year`, `status`, `created_at`) VALUES
(10, 3, 7, 'Prime Bank Ltd.', 'Kaliakoir, Gazipur', '1527', 'Current A/C', 1, 1, '2019-08-18 17:57:15'),
(11, 3, 7, 'Prime Bank Ltd. (CC)', 'Kaliakoir, Gazipur', '2932', 'CC A/C', 1, 1, '2019-08-18 17:58:22'),
(12, 3, 7, 'Prime Bank Ltd.', 'Kaliakoir, Gazipur', '1256', 'FDR A/C', 1, 1, '2019-08-18 17:59:02'),
(13, 3, 7, 'NRB Commercial Bank (Credit Card)', 'Gorail, Mirzapur', '13953', 'Credit Card', 1, 1, '2019-08-18 18:00:07'),
(14, 4, 8, 'saiful islam', '', '', '', 1, 1, '2019-10-14 16:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `marketing_id` int(11) DEFAULT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cl` int(11) NOT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `national_id` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trade` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `security_cheque` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `running_year` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `company_id`, `branch_id`, `marketing_id`, `name`, `picture`, `code`, `cl`, `address`, `owner_name`, `tel`, `email`, `national_id`, `trade`, `security_cheque`, `amount`, `bank_id`, `running_year`, `status`, `created_at`) VALUES
(44, 3, 7, 14, 'Local Customer', NULL, '1001', 0, 'N/A', 'N/A', 'N/A', 'N/A@gmail.com', 'N/A', 'N/A', 'N/A', '0', 1, 1, 1, '2019-08-18 16:28:36'),
(45, 3, 7, 14, 'Azibar Master', NULL, '1002', 0, 'Chandura, Kaliakoir', 'Azibar Master', 'N/A', 'N/A@gmail.com', 'N/A', 'N/A', 'N/A', '0', 1, 1, 1, '2019-08-18 16:49:08'),
(46, 3, 7, 14, 'Mazad', NULL, '1003', 0, 'Board Ghar, Gazipur', 'Mazad', 'N/A', 'N/A@gmail.com', 'N/A', 'N/A', 'N/A', '0', 1, 1, 1, '2019-08-18 16:50:36'),
(47, 3, 7, 14, 'Anu', NULL, '1004', 0, 'Kumidpur', 'Anu', 'N/A', 'N/A@gmail.com', 'N/A', 'N/A', 'N/A', '0', 1, 1, 1, '2019-08-18 18:02:34'),
(48, 3, 7, 14, 'Meser Ali', NULL, '1005', 0, 'Sutsrapur', 'Meser Ali', 'N/A', 'N/A@gmail.com', 'N/A', 'N/A', 'N/A', '0', 1, 1, 1, '2019-08-18 18:04:13'),
(49, 3, 7, 14, 'Samsul Arefin', NULL, '1006', 0, 'Cadet College', 'Samsul Arefin', 'N/A', 'N/A@gmail.com', 'N/A', 'N/A', 'N/A', '0', 1, 1, 1, '2019-08-18 18:05:14');

-- --------------------------------------------------------

--
-- Table structure for table `customer_bank`
--

CREATE TABLE `customer_bank` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_bank`
--

INSERT INTO `customer_bank` (`id`, `name`, `status`, `created_at`) VALUES
(1, 'N/A', 1, '2019-08-18 16:29:44'),
(2, 'Agrani Bank Ltd.', 1, '2019-08-18 16:34:40'),
(3, 'Al Arafah Islami Bank Ltd.', 1, '2019-08-18 16:35:11'),
(4, 'Arab Bangladesh Bank Ltd.', 1, '2019-08-18 16:35:29'),
(5, 'Bangladesh Commerce Bank Ltd.', 1, '2019-08-18 16:35:50'),
(6, 'Brac Bank Ltd.', 1, '2019-08-18 16:36:05'),
(7, 'City Bank Ltd.', 1, '2019-08-18 16:36:17'),
(8, 'Dhaka Bank Ltd.', 1, '2019-08-18 16:37:02'),
(9, 'Dutch Bangla Bank Ltd', 1, '2019-08-18 16:37:30'),
(10, 'Eastern Bank Ltd.', 1, '2019-08-18 16:37:57'),
(11, 'First Security Bank Ltd.', 1, '2019-08-18 16:38:24'),
(12, 'Sonali Bank Ltd.', 1, '2019-08-18 16:38:36'),
(13, 'Janata Bank Ltd.', 1, '2019-08-18 16:39:11'),
(14, 'IFIC Bank Ltd.', 1, '2019-08-18 16:39:56'),
(15, 'Islami Bank Ltd.', 1, '2019-08-18 16:40:12'),
(16, 'Jamuna Bank Ltd.', 1, '2019-08-18 16:40:43'),
(17, 'Mercantile Bank Ltd.', 1, '2019-08-18 16:41:18'),
(18, 'Mutual Trust Bank Ltd.', 1, '2019-08-18 16:41:33'),
(19, 'National Bank Ltd.', 1, '2019-08-18 16:41:47'),
(20, 'NCC Bank Ltd.', 1, '2019-08-18 16:41:58'),
(21, 'One Bank Ltd.', 1, '2019-08-18 16:42:09'),
(22, 'Prime Bank Ltd.', 1, '2019-08-18 16:42:19'),
(23, 'Rupali Bank Ltd.', 1, '2019-08-18 16:42:59'),
(24, 'Pubali Bank Ltd.', 1, '2019-08-18 16:43:08'),
(25, 'Basic Bank Ltd.', 1, '2019-08-18 16:43:21');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `designation` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `running_year` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `company_id`, `branch_id`, `section_id`, `designation`, `running_year`, `status`, `created_at`) VALUES
(10, 4, 8, 11, 'Store Officer', 1, 1, '2019-08-18 14:55:20'),
(11, 4, 8, 10, 'Marketing Officer', 1, 1, '2019-08-18 14:55:36'),
(12, 4, 8, 9, 'Accounts Officer', 1, 1, '2019-08-18 14:55:50'),
(13, 4, 8, 8, 'Admin Officer', 1, 1, '2019-08-18 14:56:03'),
(14, 3, 7, 15, 'Store Officer', 1, 1, '2019-08-18 14:56:41'),
(15, 3, 7, 14, 'Marketing Officer', 1, 1, '2019-08-18 14:56:58'),
(16, 3, 7, 13, 'Accounts Officer', 1, 1, '2019-08-18 14:57:13'),
(17, 3, 7, 12, 'Admin Officer', 1, 1, '2019-08-18 14:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `inv_purchase_return`
--

CREATE TABLE `inv_purchase_return` (
  `id` int(11) NOT NULL,
  `stock_amount_id` int(11) NOT NULL COMMENT 'invoice_id',
  `item_id` int(11) NOT NULL,
  `item_desc_id` int(11) NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `return_by` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inv_sales_amount`
--

CREATE TABLE `inv_sales_amount` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL COMMENT 'acc ledger id',
  `total` decimal(20,2) DEFAULT NULL,
  `discount_percent` decimal(10,2) DEFAULT NULL,
  `discount_tk` decimal(10,2) DEFAULT NULL,
  `transport_charge` decimal(10,2) DEFAULT NULL,
  `previous_balance` decimal(10,2) DEFAULT NULL,
  `net_payable` decimal(10,2) DEFAULT NULL COMMENT 'grand total',
  `pay` decimal(10,2) DEFAULT NULL COMMENT 'net pay',
  `due` decimal(10,2) DEFAULT NULL COMMENT 'net due',
  `payment_option` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `cheque_no` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cheque_date` date DEFAULT NULL,
  `mature_date` date DEFAULT NULL,
  `sales_by` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sales_type_id` int(11) NOT NULL COMMENT 'ledger_id head sales of product',
  `running_year` int(11) DEFAULT NULL,
  `section` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference_id` int(11) NOT NULL,
  `reference` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `inv_sales_amount`
--

INSERT INTO `inv_sales_amount` (`id`, `invoice_no`, `account_id`, `total`, `discount_percent`, `discount_tk`, `transport_charge`, `previous_balance`, `net_payable`, `pay`, `due`, `payment_option`, `bank_id`, `cheque_no`, `cheque_date`, `mature_date`, `sales_by`, `sales_type_id`, `running_year`, `section`, `reference_id`, `reference`, `remarks`, `created_at`) VALUES
(1, 'INV-00001', 3, '2750.00', '0.00', '0.00', '0.00', '5000.00', '7750.00', '0.00', '7750.00', 'Ledger', NULL, NULL, NULL, NULL, 'Super Admin', 5, 1, 'sales', 0, 'marketing', '', '2019-07-22 13:27:54'),
(2, 'INV-00002', 4, '200.00', '0.00', '0.00', '0.00', '2000.00', '2200.00', '0.00', '2200.00', 'Ledger', NULL, NULL, NULL, NULL, 'Super Admin', 5, 1, 'sales', 0, 'marketing', '', '2019-07-22 13:28:38'),
(3, 'INV-00003', 4, '400.00', '0.00', '0.00', '0.00', '200.00', '600.00', '500.00', '100.00', 'Cash', NULL, NULL, NULL, NULL, 'Super Admin', 5, 1, 'sales', 0, 'marketing', '', '2019-07-22 13:49:33'),
(4, 'INV-00004', 4, '100.00', '0.00', '0.00', '0.00', '0.00', '100.00', '0.00', '100.00', 'Ledger', NULL, NULL, NULL, NULL, 'Super Admin', 5, 1, 'sales', 0, 'marketing', '', '2019-07-23 06:23:45'),
(5, 'INV-00005', 4, '40500.00', '0.00', '0.00', '0.00', '100.00', '40600.00', '0.00', '40600.00', 'Ledger', NULL, NULL, NULL, NULL, 'Super Admin', 5, 1, 'sales', 0, 'marketing', '', '2019-07-23 06:28:17'),
(6, 'INV-00006', 3, '14300.00', '0.00', '0.00', '0.00', '2750.00', '17050.00', '0.00', '17050.00', 'Ledger', NULL, NULL, NULL, NULL, 'Super Admin', 5, 1, 'sales', 0, 'marketing', '', '2019-07-23 06:43:42'),
(7, 'INV-00007', 3, '23300.00', '0.00', '0.00', '0.00', '17050.00', '40350.00', '0.00', '40350.00', 'Ledger', NULL, NULL, NULL, NULL, 'Super Admin', 5, 1, 'sales', 0, 'marketing', '', '2019-07-23 06:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `inv_sales_details`
--

CREATE TABLE `inv_sales_details` (
  `id` int(11) NOT NULL,
  `sales_amount_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_desc_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `due_date` date DEFAULT NULL,
  `sales_price` decimal(10,2) DEFAULT NULL,
  `qty` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_total` decimal(50,2) DEFAULT NULL,
  `running_year` int(11) NOT NULL,
  `section` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `inv_sales_details`
--

INSERT INTO `inv_sales_details` (`id`, `sales_amount_id`, `company_id`, `branch_id`, `customer_id`, `item_id`, `item_desc_id`, `date`, `due_date`, `sales_price`, `qty`, `sub_total`, `running_year`, `section`, `created_at`) VALUES
(1, 1, 1, 1, 1, 2, 1, '2019-07-22', '2019-07-22', '40.00', '10', '400.00', 0, 'sales', '2019-07-22 13:27:54'),
(2, 2, 1, 1, 2, 3, 3, '2019-07-22', '2019-07-22', '20.00', '10', '200.00', 0, 'sales', '2019-07-22 13:28:38'),
(3, 3, 1, 1, 2, 2, 1, '2019-07-22', '2019-07-22', '40.00', '10', '400.00', 0, 'sales', '2019-07-22 13:49:33'),
(4, 4, 1, 1, 2, 3, 3, '2019-07-23', '2019-07-23', '20.00', '5', '100.00', 0, 'sales', '2019-07-23 06:23:45'),
(5, 5, 1, 1, 2, 2, 1, '2019-07-23', '2019-07-23', '40.00', '50', '2000.00', 0, 'sales', '2019-07-23 06:28:17'),
(6, 6, 1, 1, 1, 2, 1, '2019-07-23', '2019-07-23', '40.00', '20', '800.00', 0, 'sales', '2019-07-23 06:43:42'),
(7, 7, 1, 1, 1, 2, 1, '2019-07-23', '2019-07-23', '40.00', '20', '800.00', 0, 'sales', '2019-07-23 06:58:10'),
(8, 7, 1, 1, 1, 2, 6, '2019-07-23', '2019-07-23', '450.00', '50', '22500.00', 0, 'sales', '2019-07-23 06:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `inv_sales_return`
--

CREATE TABLE `inv_sales_return` (
  `id` int(11) NOT NULL,
  `sales_amount_id` int(11) NOT NULL COMMENT 'invoice_id',
  `item_id` int(11) NOT NULL,
  `item_desc_id` int(11) NOT NULL,
  `sales_price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `return_by` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inv_stock_amount`
--

CREATE TABLE `inv_stock_amount` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL COMMENT 'acc ledger id',
  `total` decimal(20,2) DEFAULT NULL,
  `vat` decimal(10,2) DEFAULT NULL,
  `after_vat_total` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `load_charge` decimal(10,2) DEFAULT NULL,
  `grand_total` decimal(20,2) DEFAULT NULL,
  `pay` decimal(10,2) DEFAULT NULL,
  `due` decimal(10,2) DEFAULT NULL,
  `payment_option` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `cheque_no` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cheque_date` date DEFAULT NULL,
  `mature_date` date DEFAULT NULL,
  `purchase_by` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `running_year` int(11) DEFAULT NULL,
  `section` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `inv_stock_amount`
--

INSERT INTO `inv_stock_amount` (`id`, `invoice_no`, `account_id`, `total`, `vat`, `after_vat_total`, `discount`, `load_charge`, `grand_total`, `pay`, `due`, `payment_option`, `bank_id`, `cheque_no`, `cheque_date`, `mature_date`, `purchase_by`, `running_year`, `section`, `created_at`) VALUES
(1, NULL, 2, '41200.00', NULL, NULL, NULL, NULL, '41200.00', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, 'opening_stock', '2019-07-22 13:25:24'),
(2, NULL, 2, '38000.00', NULL, NULL, NULL, NULL, '38000.00', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, 'opening_stock', '2019-07-22 13:25:31'),
(3, '1452', 2, '80800.00', '0.00', '80800.00', '0.00', '0.00', '80800.00', '0.00', '80800.00', 'Ledger', NULL, NULL, NULL, NULL, 'Super Admin', 1, 'purchase', '2019-07-22 13:26:02'),
(8, '1453', 2, '10075.00', '0.00', '10075.00', '0.00', '0.00', '10075.00', '400.00', '9675.00', 'Cash', NULL, NULL, NULL, NULL, 'Super Admin', 1, 'purchase', '2019-07-23 11:33:47'),
(9, '1454', 2, '2400.00', '0.00', '2400.00', '0.00', '0.00', '2400.00', '0.00', '2400.00', 'Ledger', NULL, NULL, NULL, NULL, 'Super Admin', 1, 'purchase', '2019-07-24 05:05:01'),
(10, '12034', 2, '5000.00', '0.00', '5000.00', '0.00', '0.00', '5000.00', '0.00', '5000.00', 'Ledger', NULL, NULL, NULL, NULL, 'Super Admin', 1, 'purchase', '2019-08-03 14:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `inv_stock_details`
--

CREATE TABLE `inv_stock_details` (
  `id` int(11) NOT NULL,
  `stock_amount_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_desc_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `due_date` date DEFAULT NULL,
  `purchase_price` decimal(10,2) DEFAULT NULL,
  `qty` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_total` decimal(50,2) DEFAULT NULL,
  `running_year` int(11) NOT NULL,
  `section` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `inv_stock_details`
--

INSERT INTO `inv_stock_details` (`id`, `stock_amount_id`, `company_id`, `branch_id`, `supplier_id`, `item_id`, `item_desc_id`, `date`, `due_date`, `purchase_price`, `qty`, `sub_total`, `running_year`, `section`, `created_at`) VALUES
(1, 1, 1, 1, 2, 2, 1, '2019-07-22', NULL, '12.00', '100', '1200.00', 0, 'opening_stock', '2019-07-22 13:25:24'),
(2, 1, 1, 1, 2, 2, 6, '2019-07-22', NULL, '400.00', '100', '40000.00', 0, 'opening_stock', '2019-07-22 13:25:24'),
(3, 2, 1, 1, 2, 2, 7, '2019-07-22', NULL, '380.00', '100', '38000.00', 0, 'opening_stock', '2019-07-22 13:25:31'),
(4, 3, 1, 1, 2, 2, 1, '2019-07-22', '2019-07-22', '12.00', '200', '2400.00', 0, 'purchase', '2019-07-22 13:26:02'),
(5, 3, 1, 1, 2, 3, 3, '2019-07-22', '2019-07-22', '12.00', '200', '2400.00', 0, 'purchase', '2019-07-22 13:26:02'),
(6, 3, 1, 1, 2, 2, 7, '2019-07-22', '2019-07-22', '380.00', '200', '76000.00', 0, 'purchase', '2019-07-22 13:26:02'),
(7, 1, 1, 1, 2, 2, 5, '2019-07-23', '2019-07-23', '380.00', '25', '9500.00', 0, 'purchase', '2019-07-23 11:29:13'),
(8, 1, 1, 1, 2, 2, 4, '2019-07-23', '2019-07-23', '23.00', '25', '575.00', 0, 'purchase', '2019-07-23 11:29:13'),
(9, 9, 1, 1, 2, 2, 1, '2019-07-24', '2019-07-24', '12.00', '100', '1200.00', 0, 'purchase', '2019-07-24 05:05:02'),
(10, 9, 1, 1, 2, 3, 3, '2019-07-24', '2019-07-24', '12.00', '100', '1200.00', 0, 'purchase', '2019-07-24 05:05:02'),
(11, 10, 1, 1, 2, 2, 1, '2019-08-07', '2019-08-03', '100.00', '50', '5000.00', 0, 'purchase', '2019-08-03 14:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `inv_stock_reports`
--

CREATE TABLE `inv_stock_reports` (
  `id` int(11) NOT NULL,
  `stock_amount_id` int(11) DEFAULT NULL,
  `sales_amount_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `inv_stock_reports`
--

INSERT INTO `inv_stock_reports` (`id`, `stock_amount_id`, `sales_amount_id`, `created_at`) VALUES
(1, 1, NULL, '2019-07-22 13:25:24'),
(2, 2, NULL, '2019-07-22 13:25:31'),
(3, 3, NULL, '2019-07-22 13:26:02'),
(4, NULL, 1, '2019-07-22 13:27:54'),
(5, NULL, 2, '2019-07-22 13:28:38'),
(6, NULL, 3, '2019-07-22 13:49:33'),
(7, NULL, 4, '2019-07-23 06:23:45'),
(8, NULL, 5, '2019-07-23 06:28:17'),
(9, NULL, 6, '2019-07-23 06:43:42'),
(10, NULL, 7, '2019-07-23 06:58:10'),
(11, 1, NULL, '2019-07-23 11:29:13'),
(12, 9, NULL, '2019-07-24 05:05:01'),
(13, 10, NULL, '2019-08-03 14:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `unit_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_description`
--

CREATE TABLE `item_description` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `re_qty` int(11) NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `running_year` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_description`
--

INSERT INTO `item_description` (`id`, `company_id`, `branch_id`, `item_id`, `item_desc`, `code`, `re_qty`, `purchase_price`, `sale_price`, `running_year`, `status`, `created_at`) VALUES
(1, 1, 1, 2, 'Akij Cement', '101', 5, '12.00', '40.00', 1, 1, '2019-07-03 11:27:45'),
(2, 1, 3, 2, 'Bashundhora Cement', '102', 5, '10.00', '20.00', 1, 1, '2019-07-03 11:28:09'),
(3, 1, 1, 3, 'TMT Bar', '103', 5, '12.00', '20.00', 1, 1, '2019-07-08 09:22:58'),
(4, 1, 1, 2, 'Sha Cement', '104', 13, '23.00', '50.00', 1, 1, '2019-07-09 07:14:46'),
(5, 1, 1, 2, 'BD Cement', '105', 100, '380.00', '430.00', 1, 1, '2019-07-09 08:12:06'),
(6, 1, 1, 2, 'Aman Cement', '106', 100, '400.00', '450.00', 1, 1, '2019-07-09 08:13:11'),
(7, 1, 1, 2, 'XY Cement', '107', 10, '380.00', '400.00', 1, 1, '2019-07-10 13:20:30'),
(8, 2, 2, 2, 'dsf', '101', 5, '12.00', '40.00', 1, 1, '2019-08-04 11:54:15');

-- --------------------------------------------------------

--
-- Table structure for table `marketing`
--

CREATE TABLE `marketing` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `section_id` int(11) DEFAULT NULL,
  `designation_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `present_address` text COLLATE utf8_unicode_ci NOT NULL,
  `permanent_address` text COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `marketing`
--

INSERT INTO `marketing` (`id`, `company_id`, `branch_id`, `section_id`, `designation_id`, `name`, `present_address`, `permanent_address`, `mobile`, `tel`, `status`, `created_at`) VALUES
(11, 4, 8, NULL, 11, 'Ainul', 'Gazipur, Chowrasta', 'Gazipur, Chowrasta', '01552387136', '01716410696', 1, '2019-08-18 14:58:47'),
(12, 4, 8, NULL, 11, 'Office', 'Gazipur, Chowrasta', 'Gazipur, Chowrasta', '01716410696', '01716410696', 1, '2019-08-18 14:59:45'),
(13, 3, 7, NULL, 15, 'Taijul Islam', 'Board Ghar, Gazipur', 'Board Ghar, Gazipur', '01716410696', '01716410696', 1, '2019-08-18 15:00:41'),
(14, 3, 7, NULL, 15, 'Office', 'Board Ghar, Gazipur', 'Board Ghar, Gazipur', '01716410696', '01716410696', 1, '2019-08-18 15:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `permission_category`
--

CREATE TABLE `permission_category` (
  `id` int(11) NOT NULL,
  `perm_group_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `short_code` varchar(100) DEFAULT NULL,
  `link` varchar(250) NOT NULL,
  `submenu` tinyint(1) NOT NULL,
  `subparent` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(250) DEFAULT NULL,
  `position` int(11) NOT NULL,
  `enable_view` int(11) DEFAULT 0,
  `enable_add` int(11) DEFAULT 0,
  `enable_edit` int(11) DEFAULT 0,
  `enable_delete` int(11) DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission_category`
--

INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `status`, `created_at`) VALUES
(2, 2, 'Administrator', 'administrator', 'administrator', 0, 0, NULL, 2, 1, 1, 1, 1, 1, '2019-08-08 15:46:51'),
(3, 2, 'Role Permission', 'role_permission', 'role-permission', 1, 0, ' fa-list', 11, 1, 1, 1, 1, 1, '2019-08-18 14:23:27'),
(5, 2, 'Manage User', 'manage_user', 'manage-user', 1, 0, 'fa-list', 12, 1, 1, 1, 1, 1, '2019-08-18 14:26:28'),
(6, 2, 'Manage Session', 'manage_session', 'manage-session', 1, 0, ' fa-list', 13, 1, 1, 1, 1, 1, '2019-08-18 14:25:44'),
(19, 2, 'Assign Permission', 'assign_permission', 'assign-permission', 0, 0, NULL, 2, 1, 1, 1, 1, 0, '2019-08-08 15:46:51'),
(34, 2, 'General Setup', 'general_setup', 'general-setup', 1, 0, 'fa-list', 1, 1, 1, 1, 1, 1, '2019-08-18 14:22:18'),
(35, 2, 'Company', 'company', 'company', 1, 34, 'fa-th', 2, 1, 1, 1, 1, 1, '2019-08-18 14:27:21'),
(36, 2, 'Branch', 'branch', 'branch', 1, 34, 'fa-th', 3, 1, 1, 1, 1, 1, '2019-08-18 14:27:37'),
(37, 2, 'Section', 'section', 'section', 1, 34, 'fa-th', 4, 1, 1, 1, 1, 1, '2019-08-18 14:28:02'),
(38, 2, 'Designation', 'designation', 'designation', 1, 34, 'fa-th', 5, 1, 1, 1, 1, 1, '2019-08-18 14:24:42'),
(39, 2, 'Marketing', 'marketing', 'marketing', 1, 34, 'fa-th', 6, 1, 1, 1, 1, 1, '2019-08-18 14:28:34'),
(40, 2, 'Supplier Info', 'supplier_info', 'supplier-info', 1, 34, 'fa-th', 8, 1, 1, 1, 1, 1, '2019-08-18 14:28:56'),
(41, 2, 'Customer Info', 'customer_info', 'customer-info', 1, 34, 'fa-th', 9, 1, 1, 1, 1, 1, '2019-08-18 16:45:39'),
(42, 2, 'Company Bank', 'company_bank', 'company-bank', 1, 34, 'fa-th', 10, 1, 1, 1, 1, 1, '2019-08-18 16:46:48'),
(43, 2, 'Customer Bank', 'customer_bank', 'customer-bank', 1, 34, 'fa-th', 8, 1, 1, 1, 1, 1, '2019-08-18 16:45:57'),
(44, 7, 'Inventory', 'inventory', 'inventory', 0, 0, NULL, 3, 1, 1, 1, 1, 1, '2019-07-17 06:33:57'),
(45, 7, 'Inventory Setup', 'inventory_setup', 'inventory-setup', 1, 0, '', 1, 1, 1, 1, 1, 1, '2019-07-17 06:33:57'),
(46, 7, 'Unit', 'unit', 'unit', 1, 45, '', 1, 1, 1, 1, 1, 1, '2019-07-17 06:33:57'),
(47, 7, 'Item Name', 'item_name', 'item-name', 1, 45, '', 2, 1, 1, 1, 1, 1, '2019-07-17 06:33:57'),
(48, 7, 'Item Description', 'item_description', 'item-description', 1, 45, '', 2, 1, 1, 1, 1, 1, '2019-07-17 06:33:57'),
(49, 7, 'Opening Stock', 'opening_stock', 'opening-stock', 1, 45, '', 4, 1, 1, 1, 1, 1, '2019-07-17 06:33:57'),
(55, 7, 'Transaction', 'transaction', 'transaction', 1, 0, 'fa-mars-stroke-h', 1, 1, 1, 1, 1, 1, '2019-08-08 15:46:51'),
(56, 7, 'Purchase', 'purchase', 'purchase', 1, 55, 'fa-pinterest-p', 1, 1, 1, 1, 1, 1, '2019-07-17 06:33:57'),
(61, 11, 'Accounts', 'accounts', 'accounts', 0, 0, NULL, 4, 1, 1, 1, 1, 1, '2019-08-08 15:46:51'),
(62, 11, 'Accounts Setup', 'accounts_setup', 'accounts-setup', 1, 0, 'fa-dashcube', 1, 1, 1, 1, 1, 1, '2019-08-08 15:46:51'),
(63, 11, 'Main Head', 'main_head', 'main-head', 1, 62, 'fa-pinterest-p', 1, 1, 1, 1, 1, 1, '2019-07-17 06:33:57'),
(64, 11, 'Ledger', 'ledger', 'ledger', 1, 62, 'fa-subway', 2, 1, 1, 1, 1, 1, '2019-07-17 06:33:57'),
(67, 7, 'Purchase Return', 'purchase_return', 'purchase-return', 1, 55, '', 2, 1, 1, 1, 1, 1, '2019-07-17 06:33:57'),
(68, 7, 'Sales', 'sales', 'sales', 1, 55, '', 3, 1, 1, 1, 1, 1, '2019-07-17 06:33:57'),
(69, 7, 'Sales Return', 'sales_return', 'sales-return', 1, 55, '', 4, 1, 1, 1, 1, 1, '2019-07-17 06:33:57'),
(79, 17, 'Dashboard', 'dashboard', 'dashboard', 0, 0, NULL, 1, 1, 1, 1, 1, 1, '2019-08-08 15:46:51'),
(80, 11, 'Opening Balance', 'opening_balance', 'opening-balance', 1, 62, '', 3, 1, 1, 1, 1, 1, '2019-08-08 15:46:51'),
(81, 11, 'Payment', 'payment', 'payment', 1, 62, '', 5, 1, 1, 1, 1, 1, '2019-08-08 15:46:51'),
(82, 11, 'Received', 'received', 'received', 1, 62, '', 4, 1, 1, 1, 1, 1, '2019-08-08 15:46:51'),
(83, 7, 'Inventory Report', 'inventory_report', 'inventory-report', 1, 0, '', 3, 1, 1, 1, 1, 1, '2019-08-08 15:46:51'),
(85, 7, 'Stock Details', 'stock_details', 'stock-details', 1, 83, '', 1, 1, 1, 1, 1, 1, '2019-08-08 15:46:51'),
(86, 11, 'Accounts Report', 'accounts_report', 'accounts-report', 1, 0, '', 1, 1, 1, 1, 1, 1, '2019-08-08 15:46:51'),
(87, 11, 'Customer Ledger', 'customer_ledger', 'customer-ledger', 1, 86, '', 1, 1, 1, 1, 1, 1, '2019-08-08 15:46:51'),
(88, 17, 'Total Supplier', 'total_supplier', 'total-supplier', 0, 0, '', 1, 1, 1, 1, 1, 0, '2019-08-08 15:46:51'),
(89, 17, 'Total Customer', 'total_customer', 'total-customer', 0, 0, '', 1, 1, 1, 1, 1, 0, '2019-08-08 15:46:51'),
(90, 2, 'Import Customer', 'import_customer', 'import-customer', 0, 34, '', 14, 1, 1, 1, 1, 0, '2019-08-18 14:25:19'),
(99, 19, 'Web', 'web', 'web', 0, 0, NULL, 6, 1, 1, 1, 1, 1, '2019-08-09 12:56:27'),
(100, 19, 'Slider', 'slider', 'slider', 1, 0, 'fa-th', 1, 1, 1, 1, 1, 0, '2019-08-09 13:27:56'),
(101, 19, 'About Us', 'about_us', 'about-us', 1, 0, 'fa-th', 3, 1, 1, 1, 1, 0, '2019-08-09 12:59:36'),
(102, 19, 'Contact Us', 'contact_us', 'contact-us', 1, 0, 'fa-th', 2, 1, 1, 1, 1, 0, '2019-08-09 15:38:26'),
(103, 19, 'Our Client', 'our_client', 'our-client', 1, 0, 'fa-th', 4, 1, 1, 1, 1, 0, '2019-08-09 15:40:32'),
(104, 19, 'Gallery', 'gallery', 'gallery', 1, 0, 'fa-th', 5, 1, 1, 1, 1, 0, '2019-08-18 12:08:39');

-- --------------------------------------------------------

--
-- Table structure for table `permission_group`
--

CREATE TABLE `permission_group` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `short_code` varchar(100) NOT NULL,
  `link` varchar(250) NOT NULL,
  `position` int(11) NOT NULL,
  `is_active` int(11) DEFAULT 1,
  `system` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission_group`
--

INSERT INTO `permission_group` (`id`, `name`, `short_code`, `link`, `position`, `is_active`, `system`, `created_at`) VALUES
(2, 'Administrator', 'administrator', 'administrator', 2, 1, 0, '2019-06-17 13:00:15'),
(7, 'Inventory', 'inventory', 'inventory', 3, 1, 0, '2019-06-22 07:08:15'),
(11, 'Accounts', 'accounts', 'accounts', 4, 1, 0, '2019-08-08 09:28:14'),
(17, 'Dashboard', 'dashboard', 'dashboard', 1, 1, 0, '2019-08-08 09:21:21'),
(19, 'Web', 'web', 'web', 6, 1, 0, '2019-08-08 15:48:43');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `type`, `created_at`) VALUES
(1, 'Super Admin', 'system', '2019-04-22 01:15:09'),
(2, 'Admin', 'system', '2019-04-22 01:15:15'),
(16, 'Panna_User', 'custom', '2019-08-18 17:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `perm_cat_id` int(11) DEFAULT NULL,
  `can_view` int(11) DEFAULT NULL,
  `can_add` int(11) DEFAULT NULL,
  `can_edit` int(11) DEFAULT NULL,
  `can_delete` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles_permissions`
--

INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES
(3, 2, 5, 1, 1, 1, 1, '2019-06-17 12:58:38'),
(4, 2, 6, 1, 1, 1, 1, '2019-06-17 12:15:05'),
(7, 2, 8, 1, 1, 1, 1, '2019-06-17 12:58:38'),
(8, 2, 9, 1, 0, 0, 0, '2019-06-17 12:15:05'),
(18, 2, 3, 1, 1, 1, 1, '2019-06-17 12:47:23'),
(22, 2, 2, 1, 1, 1, 1, '2019-08-18 17:52:40'),
(24, 2, 12, 1, 1, 1, 1, '2019-06-17 13:02:23'),
(25, 2, 13, 1, 1, 1, 1, '2019-06-17 13:02:23'),
(26, 10, 2, 1, 0, 0, 0, '2019-06-18 11:55:13'),
(27, 10, 3, 1, 1, 1, 1, '2019-06-18 11:55:13'),
(28, 10, 5, 1, 1, 1, 1, '2019-06-18 11:55:13'),
(29, 10, 6, 1, 1, 1, 1, '2019-06-18 11:55:13'),
(31, 10, 19, 1, 0, 0, 0, '2019-06-18 11:55:13'),
(33, 10, 8, 1, 1, 1, 1, '2019-06-18 11:55:13'),
(34, 10, 9, 1, 0, 0, 0, '2019-06-18 11:55:13'),
(37, 10, 12, 1, 1, 1, 1, '2019-06-18 11:55:13'),
(38, 10, 13, 1, 1, 1, 1, '2019-06-18 11:55:13'),
(39, 10, 14, 1, 1, 1, 1, '2019-06-18 11:55:13'),
(40, 10, 15, 1, 1, 1, 1, '2019-06-18 11:55:13'),
(41, 10, 16, 1, 1, 1, 1, '2019-06-18 11:55:13'),
(42, 10, 17, 1, 1, 1, 1, '2019-06-18 11:55:13'),
(43, 10, 18, 1, 1, 1, 1, '2019-06-18 11:55:13'),
(45, 11, 8, 1, 1, 1, 1, '2019-06-18 11:59:37'),
(46, 11, 9, 1, 0, 0, 0, '2019-06-18 11:59:37'),
(50, 2, 33, 1, 0, 1, 0, '2019-06-22 05:55:13'),
(54, 12, 61, 1, 0, 0, 0, '2019-06-27 14:31:29'),
(55, 12, 62, 1, 0, 0, 0, '2019-06-27 14:31:29'),
(56, 12, 63, 1, 1, 1, 1, '2019-06-27 14:31:29'),
(57, 12, 64, 1, 1, 1, 1, '2019-06-27 14:31:29'),
(58, 12, 33, 1, 0, 1, 0, '2019-06-27 14:57:17'),
(59, 12, 2, 1, 0, 0, 0, '2019-06-29 09:57:40'),
(60, 12, 3, 1, 1, 1, 1, '2019-06-29 09:57:40'),
(61, 12, 5, 1, 1, 1, 1, '2019-06-29 09:57:40'),
(62, 12, 6, 1, 1, 1, 1, '2019-06-29 09:57:40'),
(63, 12, 19, 1, 0, 0, 0, '2019-06-29 09:57:40'),
(64, 12, 34, 1, 0, 0, 0, '2019-06-29 09:57:40'),
(65, 12, 35, 1, 1, 1, 1, '2019-06-29 09:57:40'),
(66, 12, 36, 1, 1, 1, 1, '2019-06-29 09:57:40'),
(67, 12, 37, 1, 1, 1, 1, '2019-06-29 09:57:40'),
(68, 12, 38, 1, 1, 1, 1, '2019-06-29 09:57:40'),
(69, 12, 39, 1, 1, 1, 1, '2019-06-29 09:57:40'),
(70, 12, 40, 1, 1, 1, 1, '2019-06-29 09:57:40'),
(71, 12, 41, 1, 1, 1, 1, '2019-06-29 09:57:40'),
(72, 12, 42, 1, 1, 1, 1, '2019-06-29 09:57:40'),
(73, 12, 43, 1, 1, 1, 1, '2019-06-29 09:57:40'),
(75, 12, 44, 1, 1, 1, 1, '2019-07-15 09:25:32'),
(76, 12, 45, 1, 1, 1, 1, '2019-07-15 09:25:32'),
(77, 12, 46, 1, 1, 1, 1, '2019-06-29 09:57:40'),
(78, 12, 47, 1, 1, 1, 1, '2019-06-29 09:57:40'),
(79, 12, 48, 1, 1, 1, 1, '2019-06-29 09:57:40'),
(80, 12, 49, 1, 1, 1, 1, '2019-06-29 09:57:40'),
(81, 12, 55, 1, 0, 0, 0, '2019-06-29 09:57:40'),
(82, 12, 56, 1, 1, 1, 1, '2019-07-03 11:45:16'),
(85, 13, 61, 1, 0, 0, 0, '2019-07-03 11:57:22'),
(86, 13, 62, 1, 0, 0, 0, '2019-07-03 11:57:22'),
(87, 13, 63, 1, 1, 1, 1, '2019-07-03 11:57:22'),
(88, 13, 64, 1, 1, 1, 1, '2019-07-03 11:57:22'),
(90, 2, 44, 1, 1, 1, 1, '2019-07-16 12:23:45'),
(91, 2, 45, 1, 1, 1, 1, '2019-07-16 12:23:45'),
(92, 2, 46, 1, 1, 1, 1, '2019-07-08 09:55:36'),
(93, 2, 47, 1, 1, 1, 1, '2019-07-08 09:55:36'),
(94, 2, 48, 1, 1, 1, 1, '2019-07-08 09:55:36'),
(95, 2, 49, 1, 1, 1, 1, '2019-07-08 09:55:36'),
(96, 2, 55, 1, 1, 1, 1, '2019-08-18 17:52:40'),
(97, 2, 56, 1, 1, 1, 1, '2019-07-08 09:55:36'),
(98, 10, 44, 1, 0, 0, 0, '2019-07-09 08:53:31'),
(99, 10, 45, 1, 0, 0, 0, '2019-07-09 08:53:31'),
(100, 10, 46, 1, 1, 1, 1, '2019-07-09 08:53:31'),
(101, 10, 47, 1, 1, 1, 1, '2019-07-09 08:53:31'),
(102, 10, 48, 1, 1, 1, 1, '2019-07-09 08:53:31'),
(103, 10, 49, 1, 1, 1, 1, '2019-07-09 08:53:31'),
(104, 10, 55, 1, 0, 0, 0, '2019-07-09 08:53:31'),
(105, 12, 67, 1, 1, 1, 1, '2019-07-15 09:25:32'),
(106, 12, 68, 1, 1, 1, 1, '2019-07-15 09:25:32'),
(107, 12, 69, 1, 1, 1, 1, '2019-07-15 09:25:32'),
(108, 2, 61, 1, 1, 1, 1, '2019-08-18 17:52:40'),
(109, 2, 62, 1, 1, 1, 1, '2019-08-18 17:52:40'),
(110, 2, 63, 1, 1, 1, 1, '2019-07-16 12:23:45'),
(111, 2, 64, 1, 1, 1, 1, '2019-07-16 12:23:45'),
(112, 2, 19, 1, 1, 1, 1, '2019-08-18 17:52:40'),
(113, 2, 34, 1, 1, 1, 1, '2019-08-18 17:52:40'),
(114, 2, 35, 1, 1, 1, 1, '2019-07-16 12:23:45'),
(115, 2, 36, 1, 1, 1, 1, '2019-07-16 12:23:45'),
(116, 2, 37, 1, 1, 1, 1, '2019-07-16 12:23:45'),
(117, 2, 38, 1, 1, 1, 1, '2019-07-16 12:23:45'),
(118, 2, 39, 1, 1, 1, 1, '2019-07-16 12:23:45'),
(119, 2, 40, 1, 1, 1, 1, '2019-07-16 12:23:45'),
(120, 2, 41, 1, 1, 1, 1, '2019-07-16 12:23:45'),
(121, 2, 42, 1, 1, 1, 1, '2019-07-16 12:23:45'),
(122, 2, 43, 1, 1, 1, 1, '2019-07-16 12:23:45'),
(123, 2, 67, 1, 1, 1, 1, '2019-07-16 12:23:45'),
(124, 2, 68, 1, 1, 1, 1, '2019-07-16 12:23:45'),
(125, 2, 69, 1, 1, 1, 1, '2019-07-16 12:23:45'),
(129, 2, 71, 1, 1, 1, 1, '2019-07-16 12:23:45'),
(130, 2, 72, 1, 0, 0, 0, '2019-07-16 12:23:45'),
(131, 2, 73, 1, 1, 1, 1, '2019-07-16 12:23:45'),
(132, 2, 74, 1, 0, 0, 0, '2019-07-16 12:23:45'),
(133, 2, 75, 1, 1, 1, 1, '2019-07-16 12:23:45'),
(134, 2, 79, 1, 1, 1, 1, '2019-08-18 17:52:40'),
(135, 2, 88, 1, 1, 1, 1, '2019-08-18 17:52:40'),
(137, 2, 89, 1, 1, 1, 1, '2019-08-18 17:52:40'),
(138, 2, 90, 1, 1, 1, 1, '2019-08-18 17:52:40'),
(139, 12, 79, 1, 0, 0, 0, '2019-08-05 04:29:40'),
(140, 12, 88, 1, 0, 0, 0, '2019-08-05 04:29:40'),
(141, 12, 89, 1, 0, 0, 0, '2019-08-05 04:29:40'),
(143, 2, 92, 1, 1, 1, 1, '2019-08-08 09:08:18'),
(144, 2, 93, 1, 0, 1, 0, '2019-08-08 09:08:18'),
(146, 2, 95, 1, 1, 1, 1, '2019-08-08 09:08:18'),
(147, 2, 96, 1, 1, 1, 1, '2019-08-08 09:08:18'),
(230, 2, 80, 1, 1, 1, 1, '2019-08-18 17:52:40'),
(231, 2, 81, 1, 1, 1, 1, '2019-08-18 17:52:40'),
(232, 2, 82, 1, 1, 1, 1, '2019-08-18 17:52:40'),
(233, 2, 86, 1, 1, 1, 1, '2019-08-18 17:52:40'),
(234, 2, 87, 1, 1, 1, 1, '2019-08-18 17:52:40'),
(235, 2, 83, 1, 1, 1, 1, '2019-08-18 17:52:40'),
(236, 2, 85, 1, 1, 1, 1, '2019-08-18 17:52:40'),
(237, 16, 61, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(238, 16, 62, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(239, 16, 63, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(240, 16, 64, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(241, 16, 80, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(242, 16, 81, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(243, 16, 82, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(244, 16, 86, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(245, 16, 87, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(246, 16, 2, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(247, 16, 3, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(248, 16, 5, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(249, 16, 6, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(250, 16, 19, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(251, 16, 34, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(252, 16, 35, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(253, 16, 36, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(254, 16, 37, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(255, 16, 38, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(256, 16, 39, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(257, 16, 40, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(258, 16, 41, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(259, 16, 42, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(260, 16, 43, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(261, 16, 90, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(262, 16, 44, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(263, 16, 45, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(264, 16, 46, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(265, 16, 47, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(266, 16, 48, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(267, 16, 49, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(268, 16, 55, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(269, 16, 56, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(270, 16, 67, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(271, 16, 68, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(272, 16, 69, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(273, 16, 83, 1, 1, 1, 1, '2019-08-18 17:54:09'),
(274, 16, 85, 1, 1, 1, 1, '2019-08-18 17:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `running_year` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `company_id`, `branch_id`, `name`, `running_year`, `status`, `created_at`) VALUES
(8, 4, 8, 'Administration', 1, 1, '2019-08-18 14:53:45'),
(9, 4, 8, 'Accounts', 1, 1, '2019-08-18 14:53:52'),
(10, 4, 8, 'Marketing', 1, 1, '2019-08-18 14:53:58'),
(11, 4, 8, 'Store', 1, 1, '2019-08-18 14:54:21'),
(12, 3, 7, 'Administration', 1, 1, '2019-08-18 14:54:36'),
(13, 3, 7, 'Accounts', 1, 1, '2019-08-18 14:54:39'),
(14, 3, 7, 'Marketing', 1, 1, '2019-08-18 14:54:45'),
(15, 3, 7, 'Store', 1, 1, '2019-08-18 14:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `name`, `note`, `created_at`) VALUES
(1, '2019', 'N/A', '2019-06-10 08:25:59'),
(2, '2020', '', '2019-08-04 04:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `company_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `trade_licence` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `signature` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receiver_signature` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_zone` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `running_session` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `company_name`, `trade_licence`, `address`, `logo`, `signature`, `receiver_signature`, `time_zone`, `running_session`) VALUES
(1, 'Traders', NULL, 'Mirpur-1,Dhaka', 'uploads/logo/DC1563189664L.png', 'http://localhost/panna/uploads/signature/DC1560162307A.png', 'http://localhost/panna/uploads/signature/DC1560162307R.png', 'Asia/Dhaka', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `running_year` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `company_id`, `branch_id`, `name`, `code`, `tel`, `owner_name`, `email`, `address`, `running_year`, `status`, `created_at`) VALUES
(12, 3, 7, 'Local Supplier', '5001', 'N/A', 'N/A', 'N/A@gmail.com', 'N/A', 1, 1, '2019-08-18 15:56:55'),
(13, 3, 7, 'Scan Cement Ltd.', '5002', '880-2-8833047-56', 'Mr. Affan Chowdhury', 'info@scancement.com', 'Gulshan, Dhaka', 1, 1, '2019-08-18 15:58:55'),
(14, 3, 7, 'Shah Cement Ltd', '5003', '01916410694', 'Mr. Shah Alam', 'info@shahcement.com', 'Gulshan, Dhaka.', 1, 1, '2019-08-18 16:01:11'),
(15, 3, 7, 'Abul Khair Steel Melting Ltd.', '5004', '01552387190', 'Mr. Abul Khair', 'info@abulkhairsteel.com', 'Chittagong, Pahartoli', 1, 1, '2019-08-18 16:04:58'),
(16, 3, 7, 'Aman Cement Mills Ltd.', '5005', '880-2-7911691-3', 'Mr. Aman Chowdhury', 'info@amangroupbd.com', 'Uttara, Dhaka.', 1, 1, '2019-08-18 16:10:11'),
(17, 3, 7, 'Eastern Cement Industries Limited', '5006', '9665338-40', 'Mr. Nur-E-Alam Siddique', 'info@ecilbd.com', 'Walsow Tower Level -17th & 18th 21 Kazi Nazrul Islam Avenue Dhaka -1000.', 1, 1, '2019-08-18 16:14:22'),
(18, 3, 7, 'Conabri Trade Link', '5007', '01730790720', 'Humayun Kabir', 'info@conabaritrade.com', 'Conabari, Gazipur', 1, 1, '2019-08-18 16:17:48'),
(19, 3, 7, 'Shahin Enterprise', '5008', '01716410696', 'Mr. Shahin', 'info@shahinenterprise.com', 'Kaliakoir, Gazipur', 1, 1, '2019-08-18 16:19:33'),
(20, 3, 7, 'Seven Circle (BD) Ltd.', '5009', '8817690-4', 'Mr. Sk. Raihan Ahmed', 'scbl@sevencircle-bd.com', 'Land View 7th floor, 28 Gulshan North, Dhaka.', 1, 1, '2019-08-18 16:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`, `status`, `created_at`) VALUES
(1, 'PCS', 1, '2019-06-17 10:06:54'),
(7, 'Bag', 1, '2019-06-23 07:23:29'),
(8, 'KG', 1, '2019-06-23 07:23:42'),
(9, 'Ban', 1, '2019-06-23 09:58:37');

-- --------------------------------------------------------

--
-- Table structure for table `web_about_us`
--

CREATE TABLE `web_about_us` (
  `id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `web_about_us`
--

INSERT INTO `web_about_us` (`id`, `description`) VALUES
(1, '<b>Century IT Ltd. </b>is a leading customized software solutions provider for online and desktop based applications, established in 2005. The company has been promoted by some highly experienced, professional and dedicated team to provide total IT solutions under one roof. It possesses not only the latest technology but also the most knowledgeable and secured hands to offer most user friendly customized solutions. Within these years of its operations, Century IT Ltd. has carved a niche for itself in the IT industry and has increased its business by acquiring some major international & domestic projects. No doubt the company has been able to make a name for itself in a relatively short span of time because of its ability and commitments.\r\n<h4 style=\"background-color:Tomato;color:white;\">Our Best Customized Software List :</h4>\r\n<style>\r\ntable {\r\n  font-family: arial, sans-serif;\r\n  border-collapse: collapse;\r\n  width: 100%;\r\n}\r\n\r\ntd, th {\r\n  border: 1px solid #dddddd;\r\n  text-align: left;\r\n  padding: 8px;\r\n}\r\n\r\ntr:nth-child(even) {\r\n  background-color: #dddddd;\r\n}\r\n</style>\r\n\r\n<b style =\"color:blue;\">A. Major Modules of Our ERP</b></br></br>\r\n<table>\r\n  <tr>\r\n    <th>SL#</th>\r\n    <th>Description</th>\r\n    <th>SL#</th>\r\n    <th>Description</th>\r\n  </tr>\r\n  <tr>\r\n    <td>01.</td>\r\n    <td>Multi Company & Branch Concern Control</td>\r\n    <td>09.</td>\r\n    <td>Fixed Asset Management</td>\r\n  </tr>\r\n  <tr>\r\n    <td>02.</td>\r\n    <td>Attendance, Payroll & Human Resource Management</td>\r\n    <td>10.</td>\r\n    <td>Inventory, Purchase, Sales & Internal Requisition</td>\r\n  </tr>\r\n  <tr>\r\n    <td>03.</td>\r\n    <td>Industrial Planning Management</td>\r\n    <td>11.</td>\r\n    <td>Management Information Systems (MIS)</td>\r\n  </tr>\r\n  <tr>\r\n    <td>04.</td>\r\n    <td>Material & Overhead Costing Calculation </td>\r\n    <td>12.</td>\r\n    <td>Marketing, Branding & Media</td>\r\n  </tr>\r\n  <tr>\r\n    <td>05.</td>\r\n    <td>Letter of Credit (LC) Management</td>\r\n    <td>13.</td>\r\n    <td>Vehicle Management</td>\r\n  </tr>\r\n  <tr>\r\n    <td>06.</td>\r\n    <td>Merchandising Management</td>\r\n    <td>14.</td>\r\n    <td>Damage & Wastage Control</td>\r\n  </tr>\r\n  <tr>\r\n    <td>07.</td>\r\n    <td>Production & Quality Control Management</td>\r\n    <td>15.</td>\r\n    <td>Maintenance Management</td>\r\n  </tr>\r\n  <tr>\r\n    <td>08.</td>\r\n    <td>Accounting / Financial Management</td>\r\n    <td>16.</td>\r\n    <td>Gait pass, Security & Visitor Management </td>\r\n  </tr>\r\n</table>\r\n </b></ol ></br>\r\n<b style =\"color:blue;\">B. Module of Hotel Management Software</b></br></br>\r\n\r\n<table>\r\n  <tr>\r\n    <th>SL#</th>\r\n    <th>Description</th>\r\n    <th>SL#</th>\r\n    <th>Description</th>\r\n  </tr>\r\n  <tr>\r\n    <td>01.</td>\r\n    <td>Front Desk Control And Management Information </td>\r\n    <td>05.</td>\r\n    <td>Access Control, Attendance & Payroll Systems</td>\r\n  </tr>\r\n  <tr>\r\n    <td>02.</td>\r\n    <td>Housekeeping Management</td>\r\n    <td>06.</td>\r\n    <td>Inventory Control Management</td>\r\n  </tr>\r\n  <tr>\r\n    <td>03.</td>\r\n    <td>Restaurant Management</td>\r\n    <td>07.</td>\r\n    <td>Gift-shop Management Systems</td>\r\n  </tr>\r\n  <tr>\r\n    <td>04.</td>\r\n    <td>Bar Management</td>\r\n    <td>08.</td>\r\n    <td>Spa Management </td>\r\n  </tr>\r\n\r\n</table>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `web_contact_us`
--

CREATE TABLE `web_contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `web` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `web_contact_us`
--

INSERT INTO `web_contact_us` (`id`, `name`, `address`, `mobile`, `email`, `web`, `facebook`, `twitter`, `linkedin`, `youtube`) VALUES
(1, 'Century IT Ltd.', '12-13, Motijheel C/A, Dhaka-1000.', '880-2-7121117,</br> Cell : 01716410696', 'abdus.shafi@gmail.com', 'www.citlbd.net', 'https://www.facebook.com/centuryitltd/', 'https://twitter.com/@abdus_shafi', 'https://www.linkedin.com/in/m-a-shafi-1b30391b/', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `web_gallery`
--

CREATE TABLE `web_gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `image_thumb` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `web_gallery`
--

INSERT INTO `web_gallery` (`id`, `title`, `image`, `image_thumb`, `status`, `created_at`) VALUES
(6, 'Report Trial Balance', 'uploads/gallery/1566223646.jpg', 'uploads/gallery/1566223646_thumb.jpg', 1, '2019-08-19 14:07:26'),
(7, 'Banking Module', 'uploads/gallery/1566223594.jpg', 'uploads/gallery/1566223594_thumb.jpg', 1, '2019-08-19 14:06:34'),
(8, 'Sales Module', 'uploads/gallery/1566223568.jpg', 'uploads/gallery/1566223568_thumb.jpg', 1, '2019-08-19 14:06:08'),
(9, 'Purchase Module', 'uploads/gallery/1566223537.jpg', 'uploads/gallery/1566223537_thumb.jpg', 1, '2019-08-19 14:05:37'),
(10, 'Accounts Module', 'uploads/gallery/1566223499.jpg', 'uploads/gallery/1566223499_thumb.jpg', 1, '2019-08-19 14:04:59'),
(12, 'ERP Software', 'uploads/gallery/1566223219.jpg', 'uploads/gallery/1566223219_thumb.jpg', 1, '2019-08-19 14:00:19'),
(13, 'Team Work', 'uploads/gallery/1566306577.jpg', 'uploads/gallery/1566306577_thumb.jpg', 1, '2019-08-20 13:09:38'),
(14, 'Developer Environment', 'uploads/gallery/1566306793.jpg', 'uploads/gallery/1566306793_thumb.jpg', 1, '2019-08-20 13:13:14'),
(15, 'Continuous followup ', 'uploads/gallery/1566307177.jpg', 'uploads/gallery/1566307177_thumb.jpg', 1, '2019-08-20 13:19:37'),
(16, 'Programming', 'uploads/gallery/1566311371.jpg', 'uploads/gallery/1566311371_thumb.jpg', 1, '2019-08-20 14:32:21'),
(17, 'Coding', 'uploads/gallery/1566311497.jpg', 'uploads/gallery/1566311497_thumb.jpg', 1, '2019-08-20 14:31:37'),
(18, 'Planning', 'uploads/gallery/1566311580.jpg', 'uploads/gallery/1566311580_thumb.jpg', 1, '2019-08-20 14:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `web_our_client`
--

CREATE TABLE `web_our_client` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `web_our_client`
--

INSERT INTO `web_our_client` (`id`, `title`, `image`, `position`, `created_at`) VALUES
(2, 'Almuslim Group', 'uploads/client/1566200808.jpg', 1, '2019-08-19 07:46:49'),
(3, 'Supertex', 'uploads/client/1566202846.jpg', 7, '2019-08-19 08:20:47'),
(4, 'Dekko Group', 'uploads/client/1566201030.jpg', 2, '2019-08-19 07:50:30'),
(5, 'AJI Group', 'uploads/client/1566202650.jpg', 4, '2019-08-19 08:17:30'),
(6, 'Shamsul Alamin Group', 'uploads/client/1566202428.jpg', 6, '2019-08-19 08:13:48'),
(7, 'NTV', 'uploads/client/1566201567.jpg', 5, '2019-08-19 07:59:27'),
(8, 'Shangu Group', 'uploads/client/1566201220.jpg', 3, '2019-08-19 07:53:40'),
(9, 'Glare Fashions Ltd.', 'uploads/client/1566203258.jpg', 8, '2019-08-19 08:27:38'),
(10, 'The Immaculate Textile Ltd.', 'uploads/client/1566203627.JPG', 9, '2019-08-19 08:33:47'),
(11, 'Southern Image Ltd.', 'uploads/client/1566204469.jpg', 10, '2019-08-19 08:47:49'),
(12, 'Bangladesh Textile Mills Corporation', 'uploads/client/1566204771.jpg', 11, '2019-08-19 08:52:51'),
(13, 'Bangladesh Medical & Dental Council', 'uploads/client/1566205488.jpg', 12, '2019-08-19 09:04:48'),
(14, 'Apex', 'uploads/client/1566205735.jpg', 13, '2019-08-19 09:08:55'),
(15, 'Protik Group', 'uploads/client/1566206491.jpg', 14, '2019-08-19 09:21:31'),
(16, 'Hotel Lake Castle', 'uploads/client/1566207356.jpg', 15, '2019-08-19 09:35:56'),
(17, 'Hotel 71', 'uploads/client/1566207621.jpg', 16, '2019-08-19 09:40:21'),
(18, 'Holy Family Red Crescent Medical College', 'uploads/client/1566208010.jpg', 17, '2019-08-19 09:46:50'),
(19, 'Cosmos Group', 'uploads/client/1566210132.jpg', 18, '2019-08-19 10:22:12'),
(20, 'Monno Group', 'uploads/client/1566211475.jpg', 19, '2019-08-19 10:44:55'),
(21, 'JTC Group', 'uploads/client/1566211665.jpg', 20, '2019-08-19 10:47:45'),
(22, 'Haesong BD', 'uploads/client/1566212038.jpg', 21, '2019-08-19 10:53:58'),
(23, 'Panasia Clothing Ltd.', 'uploads/client/1566212298.jpg', 22, '2019-08-19 10:58:18'),
(24, 'ICEL', 'uploads/client/1566212599.jpg', 23, '2019-08-19 11:03:19'),
(25, '	 Swiss Schiffli Fashion (BD) Ltd.', 'uploads/client/1566212830.jpg', 24, '2019-08-19 11:07:10'),
(26, 'Harris & Menuk', 'uploads/client/1566213865.jpg', 25, '2019-08-19 11:24:25'),
(27, 'S.Oliver', 'uploads/client/1566214137.jpg', 26, '2019-08-19 11:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `web_slider`
--

CREATE TABLE `web_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `web_slider`
--

INSERT INTO `web_slider` (`id`, `title`, `details`, `image`, `position`, `created_at`) VALUES
(6, 'Project Analysis', 'According to our valuable customer requirements we analysis total project and making solution step by step.', 'uploads/slider/1566303939.jpg', 4, '2019-08-20 12:25:39'),
(7, 'We are very professional', 'We always handle our project professionally. ', 'uploads/slider/1566295539.jpg', 1, '2019-08-20 10:49:58'),
(8, 'In Time Delivery', 'We always complete our project in time.', 'uploads/slider/1565364729.jpg', 5, '2019-08-20 08:49:14'),
(9, 'Web Development', 'Make a Dynamic Website Fresh & Modern Concept.', 'uploads/slider/1566311215.jpg', 2, '2019-08-20 14:26:55'),
(11, 'Artificial Intelligence', 'Artificial Intelligence', 'uploads/slider/1566299627.jpg', 3, '2019-08-20 11:13:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_customer_reports`
--
ALTER TABLE `acc_customer_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acc_ledger`
--
ALTER TABLE `acc_ledger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acc_main_head`
--
ALTER TABLE `acc_main_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acc_opening_balance`
--
ALTER TABLE `acc_opening_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acc_payment`
--
ALTER TABLE `acc_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acc_received`
--
ALTER TABLE `acc_received`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acc_type`
--
ALTER TABLE `acc_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_bank`
--
ALTER TABLE `company_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_bank`
--
ALTER TABLE `customer_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_purchase_return`
--
ALTER TABLE `inv_purchase_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_sales_amount`
--
ALTER TABLE `inv_sales_amount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_sales_details`
--
ALTER TABLE `inv_sales_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_sales_return`
--
ALTER TABLE `inv_sales_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_stock_amount`
--
ALTER TABLE `inv_stock_amount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_stock_details`
--
ALTER TABLE `inv_stock_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_stock_reports`
--
ALTER TABLE `inv_stock_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_description`
--
ALTER TABLE `item_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marketing`
--
ALTER TABLE `marketing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_category`
--
ALTER TABLE `permission_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_group`
--
ALTER TABLE `permission_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_about_us`
--
ALTER TABLE `web_about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_contact_us`
--
ALTER TABLE `web_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_gallery`
--
ALTER TABLE `web_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_our_client`
--
ALTER TABLE `web_our_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_slider`
--
ALTER TABLE `web_slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_customer_reports`
--
ALTER TABLE `acc_customer_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `acc_ledger`
--
ALTER TABLE `acc_ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `acc_main_head`
--
ALTER TABLE `acc_main_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `acc_opening_balance`
--
ALTER TABLE `acc_opening_balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `acc_payment`
--
ALTER TABLE `acc_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `acc_received`
--
ALTER TABLE `acc_received`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `acc_type`
--
ALTER TABLE `acc_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company_bank`
--
ALTER TABLE `company_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `customer_bank`
--
ALTER TABLE `customer_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `inv_purchase_return`
--
ALTER TABLE `inv_purchase_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inv_sales_amount`
--
ALTER TABLE `inv_sales_amount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inv_sales_details`
--
ALTER TABLE `inv_sales_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inv_sales_return`
--
ALTER TABLE `inv_sales_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inv_stock_amount`
--
ALTER TABLE `inv_stock_amount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inv_stock_details`
--
ALTER TABLE `inv_stock_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inv_stock_reports`
--
ALTER TABLE `inv_stock_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item_description`
--
ALTER TABLE `item_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `marketing`
--
ALTER TABLE `marketing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `permission_category`
--
ALTER TABLE `permission_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `permission_group`
--
ALTER TABLE `permission_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `web_about_us`
--
ALTER TABLE `web_about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_contact_us`
--
ALTER TABLE `web_contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_gallery`
--
ALTER TABLE `web_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `web_our_client`
--
ALTER TABLE `web_our_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `web_slider`
--
ALTER TABLE `web_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
