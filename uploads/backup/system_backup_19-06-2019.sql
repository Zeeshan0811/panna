#
# TABLE STRUCTURE FOR: acc_ledger
#

DROP TABLE IF EXISTS `acc_ledger`;

CREATE TABLE `acc_ledger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_type` int(11) NOT NULL,
  `head_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `running_year` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `acc_ledger` (`id`, `acc_type`, `head_id`, `name`, `running_year`, `status`, `created_at`) VALUES (1, 1, 1, 'Al-Muslim Group', 0, 1, '2019-06-19 20:12:11');
INSERT INTO `acc_ledger` (`id`, `acc_type`, `head_id`, `name`, `running_year`, `status`, `created_at`) VALUES (2, 1, 2, 'Petty Cash', 0, 1, '2019-06-19 20:14:45');


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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `acc_main_head` (`id`, `acc_type`, `name`, `status`, `created_at`) VALUES (1, 1, 'ACCOUNTS RECEIVABLE (DEBITORS)', 1, '2019-06-19 20:07:24');
INSERT INTO `acc_main_head` (`id`, `acc_type`, `name`, `status`, `created_at`) VALUES (2, 1, 'CASH IN HAND', 1, '2019-06-19 20:13:10');
INSERT INTO `acc_main_head` (`id`, `acc_type`, `name`, `status`, `created_at`) VALUES (3, 1, 'CASH AT BANK', 1, '2019-06-19 20:18:07');
INSERT INTO `acc_main_head` (`id`, `acc_type`, `name`, `status`, `created_at`) VALUES (4, 1, 'LAND & BUILDING', 1, '2019-06-19 20:19:17');
INSERT INTO `acc_main_head` (`id`, `acc_type`, `name`, `status`, `created_at`) VALUES (5, 1, 'MACHINERY', 1, '2019-06-19 20:19:47');
INSERT INTO `acc_main_head` (`id`, `acc_type`, `name`, `status`, `created_at`) VALUES (6, 2, 'ASDASD', 1, '2019-06-19 20:21:13');
INSERT INTO `acc_main_head` (`id`, `acc_type`, `name`, `status`, `created_at`) VALUES (7, 1, 'ASD', 1, '2019-06-19 20:22:11');


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

INSERT INTO `admin` (`id`, `role_id`, `name`, `username`, `password`, `temp_password`, `phone`, `status`, `ip`, `last_login`, `user_agent`, `created_at`) VALUES (1, 1, '', 'admin', '$2y$10$l.Xxdci0Nul6AF91xLZLKeSbTIx0/Csf/Q8BLqklwAVgw2Upl4wDS', '', '', 1, '::1', '2019-06-19 10:43:36', 'Chrome 74.0.3729.169Android', '2019-06-19 10:43:36');
INSERT INTO `admin` (`id`, `role_id`, `name`, `username`, `password`, `temp_password`, `phone`, `status`, `ip`, `last_login`, `user_agent`, `created_at`) VALUES (28, 2, 'Shipan', 'shipansm', '$2y$10$OwIa76PNgoHyTuYY7yyshOu1Q/FwtUb..eiAmn5iuP5co8PZqyEy.', 'MTIzNDU=', '(+88) 018-3474-1581', 1, '::1', '2019-06-18 18:03:09', 'Chrome 74.0.3729.169Windows 10', '2019-06-18 18:03:09');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `branch` (`id`, `company_id`, `name`, `contact`, `tel`, `address`, `running_year`, `status`, `created_at`) VALUES (1, 1, 'Test 3', '(+88) 012-5412-3515', NULL, 'n/a', 1, 1, '2019-06-11 14:42:52');
INSERT INTO `branch` (`id`, `company_id`, `name`, `contact`, `tel`, `address`, `running_year`, `status`, `created_at`) VALUES (2, 1, 'Test', '(+88) 012-1321-3213', NULL, 'sdssdfsf', 1, 1, '2019-06-11 13:39:35');
INSERT INTO `branch` (`id`, `company_id`, `name`, `contact`, `tel`, `address`, `running_year`, `status`, `created_at`) VALUES (3, 9, 'N/A', '(+88) 012-3213-2132', NULL, 'asas', 1, 1, '2019-06-18 16:16:51');


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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

INSERT INTO `company_bank` (`id`, `company_id`, `branch_id`, `name`, `branch_address`, `account_no`, `ac_type`, `running_year`, `status`, `created_at`) VALUES (1, 1, 2, 'Duch Bangla Bank Ltd', 'mirpur', '011541154', 'saving', 1, 0, '2019-06-18 11:52:51');


#
# TABLE STRUCTURE FOR: customer
#

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `marketing_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `owner_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `national_id` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `trade` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `security_cheque` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bank_id` int(11) NOT NULL,
  `running_year` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `customer` (`id`, `company_id`, `branch_id`, `marketing_id`, `name`, `picture`, `code`, `address`, `owner_name`, `tel`, `email`, `national_id`, `trade`, `security_cheque`, `amount`, `bank_id`, `running_year`, `status`, `created_at`) VALUES (3, 1, 2, 1, 'John', 'uploads/customer/1560926262.png', '1000', 'Dhaka', 'sda', '23233343', 'info@nabilparibahon.com', '3434', '3434', '3434', '3434', 2, 1, 1, '2019-06-19 12:37:42');
INSERT INTO `customer` (`id`, `company_id`, `branch_id`, `marketing_id`, `name`, `picture`, `code`, `address`, `owner_name`, `tel`, `email`, `national_id`, `trade`, `security_cheque`, `amount`, `bank_id`, `running_year`, `status`, `created_at`) VALUES (4, 1, 2, 1, 'Shipan', 'uploads/customer/1560926252.png', '1001', 'Dhaka', 'sda', '23233343', 'admin@gmail.com', '3434', '3434', '3434', '3434', 2, 1, 1, '2019-06-19 12:37:32');
INSERT INTO `customer` (`id`, `company_id`, `branch_id`, `marketing_id`, `name`, `picture`, `code`, `address`, `owner_name`, `tel`, `email`, `national_id`, `trade`, `security_cheque`, `amount`, `bank_id`, `running_year`, `status`, `created_at`) VALUES (5, 1, 2, 2, 'Module', 'uploads/customer/1560925980.png', '1002', 'Dhaka', 'sda', '2323', 'admin@gmail.com', '3434', '3434', '3434', '3434', 1, 1, 1, '2019-06-19 12:33:00');


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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `item` (`id`, `name`, `unit_id`, `status`, `created_at`) VALUES (7, 'Administrator', 4, 1, '2019-06-18 13:27:01');
INSERT INTO `item` (`id`, `name`, `unit_id`, `status`, `created_at`) VALUES (8, 'Inventory', 4, 1, '2019-06-18 13:28:42');
INSERT INTO `item` (`id`, `name`, `unit_id`, `status`, `created_at`) VALUES (9, 'Role Permission', 5, 1, '2019-06-18 13:38:47');
INSERT INTO `item` (`id`, `name`, `unit_id`, `status`, `created_at`) VALUES (10, 'sadad', 1, 1, '2019-06-18 13:51:24');
INSERT INTO `item` (`id`, `name`, `unit_id`, `status`, `created_at`) VALUES (11, 'Setupasd', 2, 1, '2019-06-18 13:40:15');
INSERT INTO `item` (`id`, `name`, `unit_id`, `status`, `created_at`) VALUES (12, 'asdad', 1, 1, '2019-06-18 13:41:12');
INSERT INTO `item` (`id`, `name`, `unit_id`, `status`, `created_at`) VALUES (13, 'Shipansad', 6, 0, '2019-06-18 13:52:41');


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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `item_description` (`id`, `company_id`, `branch_id`, `item_id`, `item_desc`, `code`, `re_qty`, `purchase_price`, `sale_price`, `running_year`, `status`, `created_at`) VALUES (1, 1, 2, 8, 'dsf', '1234', 5, '12.00', '40.00', 1, 1, '2019-06-18 15:57:30');
INSERT INTO `item_description` (`id`, `company_id`, `branch_id`, `item_id`, `item_desc`, `code`, `re_qty`, `purchase_price`, `sale_price`, `running_year`, `status`, `created_at`) VALUES (2, 1, 2, 9, 'dsf', '12342', 5, '12.00', '40.00', 1, 1, '2019-06-18 16:10:49');
INSERT INTO `item_description` (`id`, `company_id`, `branch_id`, `item_id`, `item_desc`, `code`, `re_qty`, `purchase_price`, `sale_price`, `running_year`, `status`, `created_at`) VALUES (3, 1, 2, 10, 'dsf', '12', 5, '12.00', '40.00', 1, 1, '2019-06-18 17:09:27');
INSERT INTO `item_description` (`id`, `company_id`, `branch_id`, `item_id`, `item_desc`, `code`, `re_qty`, `purchase_price`, `sale_price`, `running_year`, `status`, `created_at`) VALUES (4, 1, 1, 9, 'dsf', '12345', 5, '12.00', '50.00', 1, 1, '2019-06-18 17:07:36');
INSERT INTO `item_description` (`id`, `company_id`, `branch_id`, `item_id`, `item_desc`, `code`, `re_qty`, `purchase_price`, `sale_price`, `running_year`, `status`, `created_at`) VALUES (5, 1, 5, 11, 'dsf', '12323', 13, '23.00', '43.00', 1, 1, '2019-06-18 16:14:23');
INSERT INTO `item_description` (`id`, `company_id`, `branch_id`, `item_id`, `item_desc`, `code`, `re_qty`, `purchase_price`, `sale_price`, `running_year`, `status`, `created_at`) VALUES (6, 9, 3, 12, 'dsf', '123233', 34, '234.00', '345.00', 1, 1, '2019-06-18 16:17:09');


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

INSERT INTO `marketing` (`id`, `company_id`, `branch_id`, `section_id`, `designation_id`, `name`, `present_address`, `permanent_address`, `mobile`, `tel`, `status`, `created_at`) VALUES (1, 1, 2, NULL, 6, 'Mr. Anik', 'sdshgfh', 'sds', '01719000000', '23233343', 1, '2019-06-17 12:25:24');
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
  `position` int(11) NOT NULL,
  `enable_view` int(11) DEFAULT '0',
  `enable_add` int(11) DEFAULT '0',
  `enable_edit` int(11) DEFAULT '0',
  `enable_delete` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (1, 1, 'Dashboard', 'dashboard', 'dashboard', 0, 0, 1, 1, 0, 0, 0, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (2, 2, 'Administrator', 'administrator', 'administrator', 0, 0, 2, 1, 0, 0, 0, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (3, 2, 'Role Permission', 'role_permission', 'role-permission', 1, 0, 1, 1, 1, 1, 1, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (5, 2, 'Manage User', 'manage_user', 'manage-user', 1, 0, 3, 1, 1, 1, 1, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (6, 2, 'Manage Session', 'manage_session', 'manage-session', 1, 0, 4, 1, 1, 1, 1, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (7, 2, 'Backup', 'backup', 'backup', 1, 0, 5, 1, 1, 0, 0, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (8, 3, 'Inventory', 'inventory', 'inventory', 0, 0, 3, 1, 1, 1, 1, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (9, 3, 'Setup', 'setup', 'setup', 1, 0, 1, 1, 0, 0, 0, '2019-06-17 18:15:14');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (10, 3, 'Company', 'company', 'company', 1, 9, 1, 1, 1, 1, 1, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (11, 3, 'Branch', 'branch', 'branch', 1, 9, 2, 1, 1, 1, 1, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (12, 3, 'Section', 'section', 'section', 1, 9, 3, 1, 1, 1, 1, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (13, 3, 'Designation', 'designation', 'designation', 1, 9, 4, 1, 1, 1, 1, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (14, 3, 'Marketing', 'marketing', 'marketing', 1, 9, 5, 1, 1, 1, 1, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (15, 3, 'Customer Bank', 'customer_bank', 'customer-bank', 1, 9, 6, 1, 1, 1, 1, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (16, 3, 'Customer Info', 'customer_info', 'customer-info', 1, 9, 7, 1, 1, 1, 1, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (17, 3, 'Supplier Info', 'supplier_info', 'supplier-info', 1, 9, 8, 1, 1, 1, 1, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (18, 3, 'Unit', 'unit', 'unit', 1, 9, 9, 1, 1, 1, 1, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (19, 2, 'Assign Permission', 'assign_permission', 'assign-permission', 0, 0, 2, 1, 0, 0, 0, '2019-06-17 18:46:33');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (20, 3, 'Company Bank', 'company_bank', 'company-bank', 1, 9, 9, 0, 0, 0, 0, '2019-06-18 11:19:26');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (21, 3, 'Item Name', 'item_name', 'item-name', 1, 9, 10, 0, 0, 0, 0, '2019-06-18 12:01:03');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (24, 3, 'Item Description', 'item_description', 'item-description', 1, 9, 12, 0, 0, 0, 0, '2019-06-18 15:18:04');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (25, 4, 'Accounts', 'accounts', 'accounts', 0, 0, 4, 0, 0, 0, 0, '2019-06-19 12:52:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (26, 4, 'Main Head', 'main_head', 'main-head', 1, 0, 1, 0, 0, 0, 0, '2019-06-19 12:54:23');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (27, 4, 'Ledger', 'ledger', 'ledger', 1, 0, 2, 0, 0, 0, 0, '2019-06-19 15:12:20');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (28, 5, 'Setup', 'setup', 'setup', 0, 0, 11, 0, 0, 0, 0, '2019-06-19 16:08:58');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (29, 5, 'asd', 'asd', 'asd', 1, 0, 23, 0, 0, 0, 0, '2019-06-19 16:09:34');


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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `permission_group` (`id`, `name`, `short_code`, `link`, `position`, `is_active`, `system`, `created_at`) VALUES (1, 'Dashboard', 'dashboard', 'dashboard', 1, 1, 0, '2019-06-17 17:10:54');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `link`, `position`, `is_active`, `system`, `created_at`) VALUES (2, 'Administrator', 'administrator', 'administrator', 2, 1, 0, '2019-06-17 19:00:15');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `link`, `position`, `is_active`, `system`, `created_at`) VALUES (3, 'Inventory', 'inventory', 'inventory', 3, 1, 0, '2019-06-17 17:13:55');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `link`, `position`, `is_active`, `system`, `created_at`) VALUES (4, 'Accounts', 'accounts', 'accounts', 4, 1, 0, '2019-06-19 12:52:27');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `link`, `position`, `is_active`, `system`, `created_at`) VALUES (5, 'Setup', 'setup', 'setup', 11, 1, 0, '2019-06-19 16:08:58');


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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (3, 2, 5, 1, 1, 1, 1, '2019-06-17 18:58:38');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (4, 2, 6, 1, 1, 1, 1, '2019-06-17 18:15:05');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (5, 2, 7, 1, 1, 0, 0, '2019-06-17 18:15:05');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (7, 2, 8, 1, 1, 1, 1, '2019-06-17 18:58:38');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (8, 2, 9, 1, 0, 0, 0, '2019-06-17 18:15:05');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (18, 2, 3, 1, 1, 1, 1, '2019-06-17 18:47:23');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (21, 2, 1, 1, 0, 0, 0, '2019-06-17 18:58:38');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (22, 2, 2, 1, 0, 0, 0, '2019-06-17 18:59:15');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (23, 2, 11, 1, 1, 1, 1, '2019-06-17 19:02:23');
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
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (35, 10, 10, 1, 1, 1, 1, '2019-06-18 17:55:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (36, 10, 11, 1, 1, 1, 1, '2019-06-18 17:55:13');
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
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (47, 11, 10, 1, 1, 1, 1, '2019-06-18 17:59:37');


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
INSERT INTO `section` (`id`, `company_id`, `branch_id`, `name`, `running_year`, `status`, `created_at`) VALUES (2, 1, 2, 'Panna section2', 1, 1, '2019-06-11 15:40:11');
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
  `tel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `owner_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `running_year` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `unit` (`id`, `name`, `status`, `created_at`) VALUES (1, 'PCS', 1, '2019-06-17 16:06:54');
INSERT INTO `unit` (`id`, `name`, `status`, `created_at`) VALUES (2, 'Unit', 1, '2019-06-18 13:07:43');
INSERT INTO `unit` (`id`, `name`, `status`, `created_at`) VALUES (6, 'asdad', 1, '2019-06-18 13:41:17');


