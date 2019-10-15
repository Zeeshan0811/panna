#
# TABLE STRUCTURE FOR: acc_ledger
#

DROP TABLE IF EXISTS `acc_ledger`;

CREATE TABLE `acc_ledger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_type` int(11) NOT NULL,
  `head_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `company_bank_id` int(11) DEFAULT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `debit` decimal(10,2) DEFAULT NULL,
  `credit` decimal(10,2) DEFAULT NULL,
  `note` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `running_year` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `acc_ledger` (`id`, `acc_type`, `head_id`, `company_id`, `branch_id`, `customer_id`, `supplier_id`, `company_bank_id`, `name`, `debit`, `credit`, `note`, `running_year`, `status`, `created_at`) VALUES (1, 1, 1, 1, 2, 1, NULL, NULL, 'Al-Muslim Group', NULL, NULL, NULL, 1, 1, '2019-06-22 18:39:01');
INSERT INTO `acc_ledger` (`id`, `acc_type`, `head_id`, `company_id`, `branch_id`, `customer_id`, `supplier_id`, `company_bank_id`, `name`, `debit`, `credit`, `note`, `running_year`, `status`, `created_at`) VALUES (2, 1, 2, 1, 2, NULL, NULL, 1, 'Agrai Bank', NULL, NULL, NULL, 1, 1, '2019-06-22 18:44:39');
INSERT INTO `acc_ledger` (`id`, `acc_type`, `head_id`, `company_id`, `branch_id`, `customer_id`, `supplier_id`, `company_bank_id`, `name`, `debit`, `credit`, `note`, `running_year`, `status`, `created_at`) VALUES (3, 4, 3, 1, 2, NULL, 1, NULL, 'Abul Khayar', NULL, NULL, NULL, 1, 1, '2019-06-22 18:42:53');
INSERT INTO `acc_ledger` (`id`, `acc_type`, `head_id`, `company_id`, `branch_id`, `customer_id`, `supplier_id`, `company_bank_id`, `name`, `debit`, `credit`, `note`, `running_year`, `status`, `created_at`) VALUES (4, 4, 4, 1, 2, NULL, NULL, NULL, 'bc', NULL, NULL, NULL, 1, 1, '2019-06-23 11:08:24');
INSERT INTO `acc_ledger` (`id`, `acc_type`, `head_id`, `company_id`, `branch_id`, `customer_id`, `supplier_id`, `company_bank_id`, `name`, `debit`, `credit`, `note`, `running_year`, `status`, `created_at`) VALUES (5, 4, 3, 9, 3, NULL, 2, NULL, 'Shipan', NULL, NULL, NULL, 0, 1, '2019-06-23 15:17:56');
INSERT INTO `acc_ledger` (`id`, `acc_type`, `head_id`, `company_id`, `branch_id`, `customer_id`, `supplier_id`, `company_bank_id`, `name`, `debit`, `credit`, `note`, `running_year`, `status`, `created_at`) VALUES (6, 4, 3, 1, 2, NULL, 3, NULL, 'Administrator', NULL, NULL, NULL, 0, 1, '2019-06-23 15:23:10');
INSERT INTO `acc_ledger` (`id`, `acc_type`, `head_id`, `company_id`, `branch_id`, `customer_id`, `supplier_id`, `company_bank_id`, `name`, `debit`, `credit`, `note`, `running_year`, `status`, `created_at`) VALUES (7, 4, 3, 9, 3, NULL, 4, NULL, 'Inventory', NULL, NULL, NULL, 0, 1, '2019-06-23 15:33:33');
INSERT INTO `acc_ledger` (`id`, `acc_type`, `head_id`, `company_id`, `branch_id`, `customer_id`, `supplier_id`, `company_bank_id`, `name`, `debit`, `credit`, `note`, `running_year`, `status`, `created_at`) VALUES (8, 4, 3, 9, 3, NULL, 5, NULL, 'Adminadadistrator', NULL, NULL, NULL, 0, 1, '2019-06-23 15:36:55');
INSERT INTO `acc_ledger` (`id`, `acc_type`, `head_id`, `company_id`, `branch_id`, `customer_id`, `supplier_id`, `company_bank_id`, `name`, `debit`, `credit`, `note`, `running_year`, `status`, `created_at`) VALUES (9, 4, 3, 9, 3, NULL, 6, NULL, 'Administratorads', NULL, NULL, NULL, 0, 1, '2019-06-23 16:03:19');


#
# TABLE STRUCTURE FOR: acc_main_head
#

DROP TABLE IF EXISTS `acc_main_head`;

CREATE TABLE `acc_main_head` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_type` int(10) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `acc_main_head` (`id`, `acc_type`, `name`, `status`, `created_at`) VALUES (1, 1, 'ACCOUNTS RECEIVABLE (DEBITORS)', 1, '2019-06-22 18:38:20');
INSERT INTO `acc_main_head` (`id`, `acc_type`, `name`, `status`, `created_at`) VALUES (2, 1, 'CASH AT BANK', 1, '2019-06-22 18:38:31');
INSERT INTO `acc_main_head` (`id`, `acc_type`, `name`, `status`, `created_at`) VALUES (3, 4, 'ACCOUNTS PAYABLE (CREDITORS)', 1, '2019-06-22 18:38:40');
INSERT INTO `acc_main_head` (`id`, `acc_type`, `name`, `status`, `created_at`) VALUES (4, 4, 'PURCHASE AT PRODUCT', 1, '2019-06-23 11:08:16');


#
# TABLE STRUCTURE FOR: acc_type
#

DROP TABLE IF EXISTS `acc_type`;

CREATE TABLE `acc_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `acc_type` (`id`, `name`, `type`, `created_at`) VALUES (1, 'ASSETS', 'Dr', '2019-06-19 16:21:53');
INSERT INTO `acc_type` (`id`, `name`, `type`, `created_at`) VALUES (2, 'EXPENSE', 'Dr', '2019-06-19 16:21:53');
INSERT INTO `acc_type` (`id`, `name`, `type`, `created_at`) VALUES (3, 'INCOME', 'Cr', '2019-06-19 16:22:17');
INSERT INTO `acc_type` (`id`, `name`, `type`, `created_at`) VALUES (4, 'LIABILITIES', 'Cr', '2019-06-19 16:22:17');


#
# TABLE STRUCTURE FOR: admin
#

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `temp_password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `ip` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `user_agent` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `admin` (`id`, `role_id`, `name`, `username`, `password`, `temp_password`, `phone`, `status`, `ip`, `last_login`, `user_agent`, `created_at`) VALUES (1, 1, '', 'admin', '$2y$10$l.Xxdci0Nul6AF91xLZLKeSbTIx0/Csf/Q8BLqklwAVgw2Upl4wDS', '', '', 1, '::1', '2019-06-23 11:02:02', 'Chrome 75.0.3770.100Windows 10', '2019-06-23 11:02:02');
INSERT INTO `admin` (`id`, `role_id`, `name`, `username`, `password`, `temp_password`, `phone`, `status`, `ip`, `last_login`, `user_agent`, `created_at`) VALUES (28, 2, 'Shipan', 'shipansm', '$2y$10$liSiOOKaFV3F5ptpxEhM6uwTQSX5Zk/4wKb4BIbQ6eQjG.CGhInmC', 'MTIzNDU=', '(+88) 018-3474-1581', 1, '::1', '2019-06-22 12:03:17', 'Chrome 74.0.3729.169Windows 10', '2019-06-22 12:03:17');
INSERT INTO `admin` (`id`, `role_id`, `name`, `username`, `password`, `temp_password`, `phone`, `status`, `ip`, `last_login`, `user_agent`, `created_at`) VALUES (29, 6, 'Test', 'staff', '$2y$10$pOTi9Sj58RqY.J9gWzccYeBiyRRjBTSyn0ZWxJTvkAH3tPpy/Sse.', 'MTIzNDU=', '(+88) 012-5152-4152', 1, '::1', '2019-06-10 18:11:40', 'Chrome 74.0.3729.169Windows 10', '2019-06-10 18:11:40');
INSERT INTO `admin` (`id`, `role_id`, `name`, `username`, `password`, `temp_password`, `phone`, `status`, `ip`, `last_login`, `user_agent`, `created_at`) VALUES (30, 7, 'Karim', 'test', '$2y$10$6kaSomRvW3BWg9bgS3VYY.WkPZLoz7.441LewHNL4X51L18Ks/3Tm', 'MTIzNDU=', '(+88) 015-4215-4215', 1, '::1', '2019-06-10 18:20:10', 'Chrome 74.0.3729.169Windows 10', '2019-06-10 18:20:10');
INSERT INTO `admin` (`id`, `role_id`, `name`, `username`, `password`, `temp_password`, `phone`, `status`, `ip`, `last_login`, `user_agent`, `created_at`) VALUES (31, 8, 'Green', 'green', '$2y$10$qjBaWGrZO4zJx5Ih7F4XouZBG9lPpwiF0.dREGqBJS/kvXmjZfiW6', 'MTIzNA==', '(+88) 021-1321-3232', 1, '::1', '2019-06-17 18:22:08', 'Chrome 74.0.3729.169Windows 10', '2019-06-17 18:22:08');
INSERT INTO `admin` (`id`, `role_id`, `name`, `username`, `password`, `temp_password`, `phone`, `status`, `ip`, `last_login`, `user_agent`, `created_at`) VALUES (32, 10, 'Panna', 'panna', '$2y$10$btjvf1JCTshALGV534wsXefC4936y4oQdnQNo6TMIpuI/7uBQKHrW', 'MTIzNDU=', '(+88) 546-4654-6546', 1, '::1', '2019-06-18 17:56:03', 'Chrome 74.0.3729.169Windows 10', '2019-06-18 17:56:03');
INSERT INTO `admin` (`id`, `role_id`, `name`, `username`, `password`, `temp_password`, `phone`, `status`, `ip`, `last_login`, `user_agent`, `created_at`) VALUES (33, 11, 'user', 'user', '$2y$10$.6zy5d5HOKfpA49iREQ.ke87Q6af2zHHs6tVd/WeODNaIzQusoDlu', 'MTIzNDU=', '(+88) 012-1111-1111', 1, '::1', '2019-06-18 18:00:08', 'Chrome 74.0.3729.169Windows 10', '2019-06-18 18:00:08');


#
# TABLE STRUCTURE FOR: branch
#

DROP TABLE IF EXISTS `branch`;

CREATE TABLE `branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `running_year` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `branch` (`id`, `company_id`, `name`, `contact`, `tel`, `address`, `running_year`, `status`, `created_at`) VALUES (1, 1, 'Test 3', '(+88) 012-5412-3515', NULL, 'n/a', 1, 1, '2019-06-11 14:42:52');
INSERT INTO `branch` (`id`, `company_id`, `name`, `contact`, `tel`, `address`, `running_year`, `status`, `created_at`) VALUES (2, 1, 'Test', '(+88) 012-1321-3213', NULL, 'sdssdfsf', 1, 1, '2019-06-11 13:39:35');
INSERT INTO `branch` (`id`, `company_id`, `name`, `contact`, `tel`, `address`, `running_year`, `status`, `created_at`) VALUES (3, 9, 'N/A', '(+88) 012-3213-2132', '', 'asas', 1, 1, '2019-06-22 12:33:23');


#
# TABLE STRUCTURE FOR: company
#

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `web` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `running_year` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `company` (`id`, `name`, `address`, `mobile`, `tel`, `email`, `web`, `running_year`, `status`, `created_at`) VALUES (1, 'Panna', '', '', NULL, NULL, NULL, 1, 1, '2019-06-17 15:22:56');
INSERT INTO `company` (`id`, `name`, `address`, `mobile`, `tel`, `email`, `web`, `running_year`, `status`, `created_at`) VALUES (4, 'Inventory', '', '', NULL, NULL, NULL, 1, 0, '2019-06-17 11:23:28');
INSERT INTO `company` (`id`, `name`, `address`, `mobile`, `tel`, `email`, `web`, `running_year`, `status`, `created_at`) VALUES (9, 'Administratorsd', 'Dhaka', '01719000000', '23233343', '', '', 1, 1, '2019-06-19 12:04:01');


#
# TABLE STRUCTURE FOR: company_bank
#

DROP TABLE IF EXISTS `company_bank`;

CREATE TABLE `company_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `branch_address` text COLLATE utf8_unicode_ci NOT NULL,
  `account_no` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ac_type` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `running_year` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `company_bank` (`id`, `company_id`, `branch_id`, `name`, `branch_address`, `account_no`, `ac_type`, `running_year`, `status`, `created_at`) VALUES (1, 1, 2, 'Agrai Bank', 'mirpur', '233233', 'saving', 1, 1, '2019-06-22 18:44:39');


#
# TABLE STRUCTURE FOR: customer
#

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `marketing_id` int(11) DEFAULT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `owner_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `national_id` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trade` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `security_cheque` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `running_year` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `customer` (`id`, `company_id`, `branch_id`, `marketing_id`, `name`, `picture`, `code`, `address`, `owner_name`, `tel`, `email`, `national_id`, `trade`, `security_cheque`, `amount`, `bank_id`, `running_year`, `status`, `created_at`) VALUES (1, 1, 2, 1, 'Al-Muslim Group', 'uploads/customer/1561207199.png', '1000', 'Dhaka', 'N/A', '23233343', 'info@nabilparibahon.com', '3434', '3434', '3434', '3434', 1, 1, 1, '2019-06-22 18:39:59');


#
# TABLE STRUCTURE FOR: customer_bank
#

DROP TABLE IF EXISTS `customer_bank`;

CREATE TABLE `customer_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `customer_bank` (`id`, `name`, `status`, `created_at`) VALUES (1, 'Duch Bangla Bank Ltd', 1, '2019-06-17 13:33:41');
INSERT INTO `customer_bank` (`id`, `name`, `status`, `created_at`) VALUES (2, 'Agrani Bank', 1, '2019-06-17 16:35:31');


#
# TABLE STRUCTURE FOR: designation
#

DROP TABLE IF EXISTS `designation`;

CREATE TABLE `designation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `designation` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `running_year` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `designation` (`id`, `company_id`, `branch_id`, `section_id`, `designation`, `running_year`, `status`, `created_at`) VALUES (1, 1, 2, 2, 'test', 1, 1, '2019-06-11 15:55:03');
INSERT INTO `designation` (`id`, `company_id`, `branch_id`, `section_id`, `designation`, `running_year`, `status`, `created_at`) VALUES (4, 3, 3, 3, 'test', 1, 1, '2019-06-11 16:12:05');
INSERT INTO `designation` (`id`, `company_id`, `branch_id`, `section_id`, `designation`, `running_year`, `status`, `created_at`) VALUES (5, 3, 3, 4, 'test3', 1, 1, '2019-06-11 17:25:27');
INSERT INTO `designation` (`id`, `company_id`, `branch_id`, `section_id`, `designation`, `running_year`, `status`, `created_at`) VALUES (6, 1, 2, 2, 'test4', 1, 1, '2019-06-11 17:25:29');


#
# TABLE STRUCTURE FOR: inv_stock_details
#

DROP TABLE IF EXISTS `inv_stock_details`;

CREATE TABLE `inv_stock_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_desc_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `qty` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_total` decimal(50,2) DEFAULT NULL,
  `running_year` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `inv_stock_details` (`id`, `company_id`, `branch_id`, `supplier_id`, `item_id`, `item_desc_id`, `date`, `price`, `qty`, `sub_total`, `running_year`, `created_at`) VALUES (1, 1, 2, 1, 1, 1, '0000-00-00', '23.00', '25', '575.00', 0, '2019-06-23 19:19:50');
INSERT INTO `inv_stock_details` (`id`, `company_id`, `branch_id`, `supplier_id`, `item_id`, `item_desc_id`, `date`, `price`, `qty`, `sub_total`, `running_year`, `created_at`) VALUES (2, 1, 2, 1, 1, 4, '0000-00-00', '12.00', '20', '240.00', 0, '2019-06-23 19:19:50');
INSERT INTO `inv_stock_details` (`id`, `company_id`, `branch_id`, `supplier_id`, `item_id`, `item_desc_id`, `date`, `price`, `qty`, `sub_total`, `running_year`, `created_at`) VALUES (3, 1, 2, 1, 1, 1, '0000-00-00', '23.00', '25', '575.00', 0, '2019-06-23 19:20:49');
INSERT INTO `inv_stock_details` (`id`, `company_id`, `branch_id`, `supplier_id`, `item_id`, `item_desc_id`, `date`, `price`, `qty`, `sub_total`, `running_year`, `created_at`) VALUES (4, 1, 2, 1, 1, 4, '0000-00-00', '12.00', '20', '240.00', 0, '2019-06-23 19:20:49');
INSERT INTO `inv_stock_details` (`id`, `company_id`, `branch_id`, `supplier_id`, `item_id`, `item_desc_id`, `date`, `price`, `qty`, `sub_total`, `running_year`, `created_at`) VALUES (5, 1, 2, 1, 1, 1, '2019-06-23', '23.00', '25', '575.00', 0, '2019-06-23 19:21:28');
INSERT INTO `inv_stock_details` (`id`, `company_id`, `branch_id`, `supplier_id`, `item_id`, `item_desc_id`, `date`, `price`, `qty`, `sub_total`, `running_year`, `created_at`) VALUES (6, 1, 2, 1, 1, 4, '2019-06-23', '12.00', '20', '240.00', 0, '2019-06-23 19:21:28');
INSERT INTO `inv_stock_details` (`id`, `company_id`, `branch_id`, `supplier_id`, `item_id`, `item_desc_id`, `date`, `price`, `qty`, `sub_total`, `running_year`, `created_at`) VALUES (7, 1, 2, 1, 1, 1, '2019-06-18', '23.00', '20', '460.00', 0, '2019-06-23 19:24:46');


#
# TABLE STRUCTURE FOR: item
#

DROP TABLE IF EXISTS `item`;

CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `unit_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `item` (`id`, `name`, `unit_id`, `status`, `created_at`) VALUES (1, 'Cement', 7, 1, '2019-06-23 13:23:29');
INSERT INTO `item` (`id`, `name`, `unit_id`, `status`, `created_at`) VALUES (2, 'Rod', 8, 1, '2019-06-23 13:23:42');
INSERT INTO `item` (`id`, `name`, `unit_id`, `status`, `created_at`) VALUES (3, 'Tin', 9, 1, '2019-06-23 15:58:37');
INSERT INTO `item` (`id`, `name`, `unit_id`, `status`, `created_at`) VALUES (4, 'Inventory', 6, 1, '2019-06-23 15:59:31');
INSERT INTO `item` (`id`, `name`, `unit_id`, `status`, `created_at`) VALUES (5, 'Administrator', 6, 1, '2019-06-23 16:02:24');
INSERT INTO `item` (`id`, `name`, `unit_id`, `status`, `created_at`) VALUES (6, 'Administratorasdad', 6, 1, '2019-06-23 16:03:34');
INSERT INTO `item` (`id`, `name`, `unit_id`, `status`, `created_at`) VALUES (7, 'Inventoryasd', 6, 1, '2019-06-23 16:04:51');
INSERT INTO `item` (`id`, `name`, `unit_id`, `status`, `created_at`) VALUES (8, 'Inventoryasdasdad', 7, 1, '2019-06-23 16:05:40');
INSERT INTO `item` (`id`, `name`, `unit_id`, `status`, `created_at`) VALUES (9, 'Inventoryasds', 9, 1, '2019-06-23 16:06:16');


#
# TABLE STRUCTURE FOR: item_description
#

DROP TABLE IF EXISTS `item_description`;

CREATE TABLE `item_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `re_qty` int(11) NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `running_year` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `item_description` (`id`, `company_id`, `branch_id`, `item_id`, `item_desc`, `code`, `re_qty`, `purchase_price`, `sale_price`, `running_year`, `status`, `created_at`) VALUES (1, 1, 2, 1, 'Akij Cement', '1234', 5, '23.00', '40.00', 1, 1, '2019-06-23 13:24:43');
INSERT INTO `item_description` (`id`, `company_id`, `branch_id`, `item_id`, `item_desc`, `code`, `re_qty`, `purchase_price`, `sale_price`, `running_year`, `status`, `created_at`) VALUES (2, 9, 3, 1, 'N/A', '1234asd', 5, '12.00', '40.00', 1, 1, '2019-06-23 16:24:09');
INSERT INTO `item_description` (`id`, `company_id`, `branch_id`, `item_id`, `item_desc`, `code`, `re_qty`, `purchase_price`, `sale_price`, `running_year`, `status`, `created_at`) VALUES (3, 1, 2, 5, 'N/Aasad', '1234sdw34', 5, '12.00', '40.00', 1, 1, '2019-06-23 16:24:59');
INSERT INTO `item_description` (`id`, `company_id`, `branch_id`, `item_id`, `item_desc`, `code`, `re_qty`, `purchase_price`, `sale_price`, `running_year`, `status`, `created_at`) VALUES (4, 1, 2, 1, 'Bashundhora Cement', '145', 100, '12.00', '40.00', 1, 1, '2019-06-23 16:26:34');


#
# TABLE STRUCTURE FOR: marketing
#

DROP TABLE IF EXISTS `marketing`;

CREATE TABLE `marketing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `section_id` int(11) DEFAULT NULL,
  `designation_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `present_address` text COLLATE utf8_unicode_ci NOT NULL,
  `permanent_address` text COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `marketing` (`id`, `company_id`, `branch_id`, `section_id`, `designation_id`, `name`, `present_address`, `permanent_address`, `mobile`, `tel`, `status`, `created_at`) VALUES (1, 1, 2, NULL, 6, 'Mr. Anik', 'sdshgfh', 'sds', '01719000000', '23233343', 1, '2019-06-22 13:03:12');
INSERT INTO `marketing` (`id`, `company_id`, `branch_id`, `section_id`, `designation_id`, `name`, `present_address`, `permanent_address`, `mobile`, `tel`, `status`, `created_at`) VALUES (2, 1, 2, NULL, 1, 'Mr. Aniksds', 'as', 'sds', '01719000000', '23233343', 1, '2019-06-17 12:25:11');
INSERT INTO `marketing` (`id`, `company_id`, `branch_id`, `section_id`, `designation_id`, `name`, `present_address`, `permanent_address`, `mobile`, `tel`, `status`, `created_at`) VALUES (3, 1, 2, NULL, 6, 'Mr. Aniksdsvcxbv', 'as', 'sds', '01719000000', 'adsf', 1, '2019-06-18 18:37:11');


#
# TABLE STRUCTURE FOR: permission_category
#

DROP TABLE IF EXISTS `permission_category`;

CREATE TABLE `permission_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perm_group_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `short_code` varchar(100) DEFAULT NULL,
  `link` varchar(250) NOT NULL,
  `submenu` tinyint(1) NOT NULL,
  `subparent` int(11) NOT NULL DEFAULT '0',
  `icon` varchar(250) DEFAULT NULL,
  `position` int(11) NOT NULL,
  `enable_view` int(11) DEFAULT '0',
  `enable_add` int(11) DEFAULT '0',
  `enable_edit` int(11) DEFAULT '0',
  `enable_delete` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (1, 1, 'Dashboard', 'dashboard', 'dashboard', 0, 0, NULL, 1, 1, 0, 0, 0, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (2, 2, 'Administrator', 'administrator', 'administrator', 0, 0, NULL, 2, 1, 0, 0, 0, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (3, 2, 'Role Permission', 'role_permission', 'role-permission', 1, 0, NULL, 1, 1, 1, 1, 1, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (5, 2, 'Manage User', 'manage_user', 'manage-user', 1, 0, NULL, 3, 1, 1, 1, 1, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (6, 2, 'Manage Session', 'manage_session', 'manage-session', 1, 0, NULL, 4, 1, 1, 1, 1, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (7, 2, 'Backup', 'backup', 'backup', 1, 0, NULL, 5, 1, 1, 0, 0, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (19, 2, 'Assign Permission', 'assign_permission', 'assign-permission', 0, 0, NULL, 2, 1, 0, 0, 0, '2019-06-17 18:46:33');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (25, 4, 'Accounts', 'accounts', 'accounts', 0, 0, NULL, 4, 1, 0, 0, 0, '2019-06-22 19:14:17');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (26, 4, 'Main Head', 'main_head', 'main-head', 1, 0, NULL, 1, 1, 1, 1, 1, '2019-06-22 19:14:17');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (27, 4, 'Ledger', 'ledger', 'ledger', 1, 0, NULL, 2, 1, 1, 1, 1, '2019-06-22 19:14:17');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (31, 6, 'Setting', 'setting', 'setting', 0, 0, NULL, 6, 1, 0, 0, 0, '2019-06-22 11:54:32');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (32, 6, 'General Setting', 'general_setting', 'general-setting', 1, 0, '', 1, 1, 0, 0, 0, '2019-06-22 11:55:05');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (33, 6, 'Reset Profile', 'reset_profile', 'reset-profile', 0, 0, '', 5, 1, 0, 1, 0, '2019-06-22 11:54:32');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (34, 2, 'General Setup', 'general_setup', 'general-setup', 1, 0, '', 2, 0, 0, 0, 0, '2019-06-22 12:13:08');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (35, 2, 'Company', 'company', 'company', 1, 34, '', 1, 0, 0, 0, 0, '2019-06-22 12:15:53');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (36, 2, 'Branch', 'branch', 'branch', 1, 34, '', 2, 0, 0, 0, 0, '2019-06-22 12:17:49');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (37, 2, 'Section', 'section', 'section', 1, 34, '', 3, 0, 0, 0, 0, '2019-06-22 12:39:15');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (38, 2, 'Designation', 'designation', 'designation', 1, 34, '', 3, 0, 0, 0, 0, '2019-06-22 12:55:12');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (39, 2, 'Marketing', 'marketing', 'marketing', 1, 34, '', 4, 0, 0, 0, 0, '2019-06-22 13:01:52');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (40, 2, 'Supplier Info', 'supplier_info', 'supplier-info', 1, 34, 'md  md-receipt', 5, 0, 0, 0, 0, '2019-06-22 13:05:25');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (41, 2, 'Customer Info', 'customer_info', 'customer-info', 1, 34, '', 6, 0, 0, 0, 0, '2019-06-22 13:06:35');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (42, 2, 'Company Bank', 'company_bank', 'company-bank', 1, 34, '', 7, 0, 0, 0, 0, '2019-06-22 13:07:10');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (43, 2, 'Customer Bank', 'customer_bank', 'customer-bank', 1, 34, '', 8, 0, 0, 0, 0, '2019-06-22 13:07:29');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (44, 7, 'Inventory', 'inventory', 'inventory', 0, 0, NULL, 3, 0, 0, 0, 0, '2019-06-22 13:08:15');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (45, 7, 'Inventory Setup', 'inventory_setup', 'inventory-setup', 1, 0, '', 1, 0, 0, 0, 0, '2019-06-22 15:17:37');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (46, 7, 'Unit', 'unit', 'unit', 1, 45, '', 1, 0, 0, 0, 0, '2019-06-22 15:18:05');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (47, 7, 'Item Name', 'item_name', 'item-name', 1, 45, '', 2, 0, 0, 0, 0, '2019-06-22 15:19:00');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (48, 7, 'Item Description', 'item_description', 'item-description', 1, 45, '', 2, 0, 0, 0, 0, '2019-06-22 15:19:24');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (49, 7, 'Opening Stock', 'opening_stock', 'opening-stock', 1, 45, '', 4, 0, 0, 0, 0, '2019-06-23 11:13:23');


#
# TABLE STRUCTURE FOR: permission_group
#

DROP TABLE IF EXISTS `permission_group`;

CREATE TABLE `permission_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `short_code` varchar(100) NOT NULL,
  `link` varchar(250) NOT NULL,
  `position` int(11) NOT NULL,
  `is_active` int(11) DEFAULT '1',
  `system` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `permission_group` (`id`, `name`, `short_code`, `link`, `position`, `is_active`, `system`, `created_at`) VALUES (1, 'Dashboard', 'dashboard', 'dashboard', 1, 1, 0, '2019-06-17 17:10:54');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `link`, `position`, `is_active`, `system`, `created_at`) VALUES (2, 'Administrator', 'administrator', 'administrator', 2, 1, 0, '2019-06-17 19:00:15');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `link`, `position`, `is_active`, `system`, `created_at`) VALUES (4, 'Accounts', 'accounts', 'accounts', 4, 1, 0, '2019-06-19 12:52:27');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `link`, `position`, `is_active`, `system`, `created_at`) VALUES (6, 'Setting', 'setting', 'setting', 6, 1, 0, '2019-06-22 11:48:28');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `link`, `position`, `is_active`, `system`, `created_at`) VALUES (7, 'Inventory', 'inventory', 'inventory', 3, 1, 0, '2019-06-22 13:08:15');


#
# TABLE STRUCTURE FOR: roles
#

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `roles` (`id`, `name`, `type`, `created_at`) VALUES (1, 'Super Admin', 'system', '2019-04-22 07:15:09');
INSERT INTO `roles` (`id`, `name`, `type`, `created_at`) VALUES (2, 'Admin', 'system', '2019-04-22 07:15:15');
INSERT INTO `roles` (`id`, `name`, `type`, `created_at`) VALUES (10, 'Panna Admin', 'custom', '2019-06-18 17:54:10');
INSERT INTO `roles` (`id`, `name`, `type`, `created_at`) VALUES (11, 'user', 'custom', '2019-06-18 17:58:09');


#
# TABLE STRUCTURE FOR: roles_permissions
#

DROP TABLE IF EXISTS `roles_permissions`;

CREATE TABLE `roles_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `perm_cat_id` int(11) DEFAULT NULL,
  `can_view` int(11) DEFAULT NULL,
  `can_add` int(11) DEFAULT NULL,
  `can_edit` int(11) DEFAULT NULL,
  `can_delete` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (3, 2, 5, 1, 1, 1, 1, '2019-06-17 18:58:38');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (4, 2, 6, 1, 1, 1, 1, '2019-06-17 18:15:05');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (5, 2, 7, 1, 1, 0, 0, '2019-06-17 18:15:05');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (7, 2, 8, 1, 1, 1, 1, '2019-06-17 18:58:38');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (8, 2, 9, 1, 0, 0, 0, '2019-06-17 18:15:05');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (18, 2, 3, 1, 1, 1, 1, '2019-06-17 18:47:23');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (21, 2, 1, 1, 0, 0, 0, '2019-06-17 18:58:38');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (22, 2, 2, 1, 0, 0, 0, '2019-06-17 18:59:15');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (24, 2, 12, 1, 1, 1, 1, '2019-06-17 19:02:23');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (25, 2, 13, 1, 1, 1, 1, '2019-06-17 19:02:23');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (26, 10, 2, 1, 0, 0, 0, '2019-06-18 17:55:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (27, 10, 3, 1, 1, 1, 1, '2019-06-18 17:55:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (28, 10, 5, 1, 1, 1, 1, '2019-06-18 17:55:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (29, 10, 6, 1, 1, 1, 1, '2019-06-18 17:55:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (30, 10, 7, 1, 1, 0, 0, '2019-06-18 17:55:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (31, 10, 19, 1, 0, 0, 0, '2019-06-18 17:55:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (32, 10, 1, 1, 0, 0, 0, '2019-06-18 17:55:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (33, 10, 8, 1, 1, 1, 1, '2019-06-18 17:55:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (34, 10, 9, 1, 0, 0, 0, '2019-06-18 17:55:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (37, 10, 12, 1, 1, 1, 1, '2019-06-18 17:55:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (38, 10, 13, 1, 1, 1, 1, '2019-06-18 17:55:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (39, 10, 14, 1, 1, 1, 1, '2019-06-18 17:55:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (40, 10, 15, 1, 1, 1, 1, '2019-06-18 17:55:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (41, 10, 16, 1, 1, 1, 1, '2019-06-18 17:55:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (42, 10, 17, 1, 1, 1, 1, '2019-06-18 17:55:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (43, 10, 18, 1, 1, 1, 1, '2019-06-18 17:55:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (44, 11, 1, 1, 0, 0, 0, '2019-06-18 17:59:37');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (45, 11, 8, 1, 1, 1, 1, '2019-06-18 17:59:37');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (46, 11, 9, 1, 0, 0, 0, '2019-06-18 17:59:37');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (50, 2, 33, 1, 0, 1, 0, '2019-06-22 11:55:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (51, 10, 25, 1, 0, 0, 0, '2019-06-22 19:14:30');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (52, 10, 26, 1, 0, 0, 0, '2019-06-22 19:14:30');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (53, 10, 27, 1, 0, 0, 0, '2019-06-22 19:14:30');


#
# TABLE STRUCTURE FOR: section
#

DROP TABLE IF EXISTS `section`;

CREATE TABLE `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `running_year` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `section` (`id`, `company_id`, `branch_id`, `name`, `running_year`, `status`, `created_at`) VALUES (1, 1, 1, 'Panna section', 1, 1, '2019-06-11 14:44:16');
INSERT INTO `section` (`id`, `company_id`, `branch_id`, `name`, `running_year`, `status`, `created_at`) VALUES (2, 1, 2, 'Panna section2', 1, 1, '2019-06-22 12:41:50');
INSERT INTO `section` (`id`, `company_id`, `branch_id`, `name`, `running_year`, `status`, `created_at`) VALUES (3, 3, 3, 'n/a', 1, 1, '2019-06-11 15:40:23');
INSERT INTO `section` (`id`, `company_id`, `branch_id`, `name`, `running_year`, `status`, `created_at`) VALUES (4, 3, 3, 'test', 1, 1, '2019-06-11 16:12:36');


#
# TABLE STRUCTURE FOR: session
#

DROP TABLE IF EXISTS `session`;

CREATE TABLE `session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `session` (`id`, `name`, `note`, `created_at`) VALUES (1, '2019', 'N/A', '2019-06-10 14:25:59');


#
# TABLE STRUCTURE FOR: setting
#

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `trade_licence` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `signature` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receiver_signature` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_zone` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `running_session` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `setting` (`id`, `company_name`, `trade_licence`, `address`, `logo`, `signature`, `receiver_signature`, `time_zone`, `running_session`) VALUES (1, 'Panna Traders', NULL, 'Faridpur', 'http://localhost/panna/uploads/logo/DC1560162307L.png', 'http://localhost/panna/uploads/signature/DC1560162307A.png', 'http://localhost/panna/uploads/signature/DC1560162307R.png', 'Asia/Dhaka', 1);


#
# TABLE STRUCTURE FOR: supplier
#

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `running_year` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `supplier` (`id`, `company_id`, `branch_id`, `name`, `code`, `tel`, `owner_name`, `email`, `address`, `running_year`, `status`, `created_at`) VALUES (1, 1, 2, 'Abul Khayar  Group', '5000', '23233343', 'sda', 'info@nabilparibahon.com', 'Dhaka', 1, 1, '2019-06-23 14:29:15');
INSERT INTO `supplier` (`id`, `company_id`, `branch_id`, `name`, `code`, `tel`, `owner_name`, `email`, `address`, `running_year`, `status`, `created_at`) VALUES (2, 9, 3, 'Shipan', '5001', '23233343', 'sda', 'info@nabilparibahon.com', 'Dhaka', 1, 1, '2019-06-23 15:17:56');
INSERT INTO `supplier` (`id`, `company_id`, `branch_id`, `name`, `code`, `tel`, `owner_name`, `email`, `address`, `running_year`, `status`, `created_at`) VALUES (3, 1, 2, 'Administrator', '5002', '23233343', 'sda', 'info@nabilparibahon.com', 'Dhaka', 1, 1, '2019-06-23 15:23:10');
INSERT INTO `supplier` (`id`, `company_id`, `branch_id`, `name`, `code`, `tel`, `owner_name`, `email`, `address`, `running_year`, `status`, `created_at`) VALUES (4, 9, 3, 'Inventory', '5003', '23233343', 'sda', 'info@nabilparibahon.com', 'Dhaka', 1, 1, '2019-06-23 15:33:33');
INSERT INTO `supplier` (`id`, `company_id`, `branch_id`, `name`, `code`, `tel`, `owner_name`, `email`, `address`, `running_year`, `status`, `created_at`) VALUES (5, 9, 3, 'Adminadadistrator', '5004', '23233343', 'sda', 'info@nabilparibahon.com', 'Dhaka', 1, 1, '2019-06-23 15:36:55');
INSERT INTO `supplier` (`id`, `company_id`, `branch_id`, `name`, `code`, `tel`, `owner_name`, `email`, `address`, `running_year`, `status`, `created_at`) VALUES (6, 9, 3, 'Administratorads', '5005', '23233343', 'sda', 'info@nabilparibahon.com', 'Dhaka', 1, 1, '2019-06-23 16:03:19');


#
# TABLE STRUCTURE FOR: unit
#

DROP TABLE IF EXISTS `unit`;

CREATE TABLE `unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `unit` (`id`, `name`, `status`, `created_at`) VALUES (1, 'PCS', 1, '2019-06-17 16:06:54');
INSERT INTO `unit` (`id`, `name`, `status`, `created_at`) VALUES (2, 'Unit', 1, '2019-06-18 13:07:43');
INSERT INTO `unit` (`id`, `name`, `status`, `created_at`) VALUES (6, 'asdad', 1, '2019-06-18 13:41:17');
INSERT INTO `unit` (`id`, `name`, `status`, `created_at`) VALUES (7, 'Bag', 1, '2019-06-23 13:23:29');
INSERT INTO `unit` (`id`, `name`, `status`, `created_at`) VALUES (8, 'KG', 1, '2019-06-23 13:23:42');
INSERT INTO `unit` (`id`, `name`, `status`, `created_at`) VALUES (9, 'Ban', 1, '2019-06-23 15:58:37');


