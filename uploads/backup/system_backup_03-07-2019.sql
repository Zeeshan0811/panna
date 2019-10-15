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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `acc_ledger` (`id`, `acc_type`, `head_id`, `company_id`, `branch_id`, `customer_id`, `supplier_id`, `company_bank_id`, `name`, `debit`, `credit`, `note`, `running_year`, `status`, `created_at`) VALUES (1, 4, 3, 1, 1, NULL, 1, NULL, 'Modina Group', NULL, NULL, NULL, 0, 1, '2019-06-27 20:28:24');
INSERT INTO `acc_ledger` (`id`, `acc_type`, `head_id`, `company_id`, `branch_id`, `customer_id`, `supplier_id`, `company_bank_id`, `name`, `debit`, `credit`, `note`, `running_year`, `status`, `created_at`) VALUES (2, 1, 2, 1, 1, NULL, NULL, 1, 'Duch Bangla Bank Ltd', NULL, NULL, NULL, 0, 1, '2019-07-03 16:33:24');
INSERT INTO `acc_ledger` (`id`, `acc_type`, `head_id`, `company_id`, `branch_id`, `customer_id`, `supplier_id`, `company_bank_id`, `name`, `debit`, `credit`, `note`, `running_year`, `status`, `created_at`) VALUES (3, 1, 1, 1, 3, 1, NULL, NULL, 'Shipan', NULL, NULL, NULL, 1, 1, '2019-07-03 17:46:28');


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
  `company_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
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
  `reset_key` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `admin` (`id`, `company_id`, `branch_id`, `role_id`, `name`, `username`, `password`, `temp_password`, `phone`, `status`, `ip`, `last_login`, `user_agent`, `reset_key`, `created_at`) VALUES (1, 0, 0, 1, '', 'superadmin', '$2y$10$l.Xxdci0Nul6AF91xLZLKeSbTIx0/Csf/Q8BLqklwAVgw2Upl4wDS', '', '', 1, '::1', '2019-07-03 11:30:14', 'Chrome 75.0.3770.100Windows 10', '', '2019-07-03 11:30:14');
INSERT INTO `admin` (`id`, `company_id`, `branch_id`, `role_id`, `name`, `username`, `password`, `temp_password`, `phone`, `status`, `ip`, `last_login`, `user_agent`, `reset_key`, `created_at`) VALUES (36, 1, 1, 12, 'Labib', 'labib@gmail.com', '$2y$10$XaR11CvPrXQUu0Lq0Z93DeDZt7KX5f2OomBU9UrmHAiNLwDNXED6u', 'MTIzNA==', '(+88) 000-0000-0000', 1, '::1', '2019-07-03 13:03:59', 'Chrome 75.0.3770.100Windows 10', NULL, '2019-07-03 16:45:00');
INSERT INTO `admin` (`id`, `company_id`, `branch_id`, `role_id`, `name`, `username`, `password`, `temp_password`, `phone`, `status`, `ip`, `last_login`, `user_agent`, `reset_key`, `created_at`) VALUES (37, 1, 1, 13, 'Karim', 'karim@gmail.com', '$2y$10$R08Ceg813SVhHz2tbAZOZuGdAipPLx.SCXVDE7japCX3HAm8hbET2', 'MTIzNA==', '(+88) 212-3132-3213', 1, '::1', '2019-07-03 17:57:33', 'Chrome 75.0.3770.100Windows 10', NULL, '2019-07-03 17:57:33');


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

INSERT INTO `branch` (`id`, `company_id`, `name`, `contact`, `tel`, `address`, `running_year`, `status`, `created_at`) VALUES (1, 1, 'Gazipur1', '(+88) 000-0000-0000', '123345', 'Gazipur', 1, 1, '2019-06-27 20:26:11');
INSERT INTO `branch` (`id`, `company_id`, `name`, `contact`, `tel`, `address`, `running_year`, `status`, `created_at`) VALUES (2, 2, 'Gazipur2', '(+88) 000-0000-0000', '', 'Gazipur', 1, 1, '2019-06-27 20:34:10');
INSERT INTO `branch` (`id`, `company_id`, `name`, `contact`, `tel`, `address`, `running_year`, `status`, `created_at`) VALUES (3, 1, 'Test', '(+88) 121-1111-1111', '', 'Dhaka', 1, 1, '2019-07-03 15:58:37');


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
  `permission_id` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `company` (`id`, `name`, `address`, `mobile`, `tel`, `email`, `web`, `running_year`, `status`, `created_at`, `permission_id`) VALUES (1, 'Panna Traders', 'Gazipur', '01719000000', '123345', 'yousuf1325037@yahoo.com', '', 1, 1, '2019-07-01 11:33:25', '[\"1\",\"2\",\"34\"]');
INSERT INTO `company` (`id`, `name`, `address`, `mobile`, `tel`, `email`, `web`, `running_year`, `status`, `created_at`, `permission_id`) VALUES (2, 'Maliha Traders', 'Gazipur', '01719000000', '123345', 'yousuf1325037@yahoo.com', '', 1, 1, '2019-07-01 11:37:58', '[\"1\",\"2\",\"3\",\"5\",\"6\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"19\",\"3\",\"5\",\"6\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"31\",\"32\",\"33\",\"32\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"55\",\"56\",\"61\",\"62\",\"63\",\"64\"]');


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

INSERT INTO `company_bank` (`id`, `company_id`, `branch_id`, `name`, `branch_address`, `account_no`, `ac_type`, `running_year`, `status`, `created_at`) VALUES (1, 1, 1, 'Duch Bangla Bank Ltd', 'mirpur', '233233', 'saving', 1, 1, '2019-07-03 16:33:23');


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

INSERT INTO `customer` (`id`, `company_id`, `branch_id`, `marketing_id`, `name`, `picture`, `code`, `address`, `owner_name`, `tel`, `email`, `national_id`, `trade`, `security_cheque`, `amount`, `bank_id`, `running_year`, `status`, `created_at`) VALUES (1, 1, 3, NULL, 'Shipan', NULL, '1000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-07-03 17:46:28');


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `designation` (`id`, `company_id`, `branch_id`, `section_id`, `designation`, `running_year`, `status`, `created_at`) VALUES (1, 1, 1, 1, 'Marketing', 1, 1, '2019-06-27 20:26:57');
INSERT INTO `designation` (`id`, `company_id`, `branch_id`, `section_id`, `designation`, `running_year`, `status`, `created_at`) VALUES (2, 1, 3, 4, 'test2', 1, 1, '2019-07-03 16:02:45');


#
# TABLE STRUCTURE FOR: inv_stock_amount
#

DROP TABLE IF EXISTS `inv_stock_amount`;

CREATE TABLE `inv_stock_amount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `total` decimal(20,2) DEFAULT NULL,
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# TABLE STRUCTURE FOR: inv_stock_details
#

DROP TABLE IF EXISTS `inv_stock_details`;

CREATE TABLE `inv_stock_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `item` (`id`, `name`, `unit_id`, `status`, `created_at`) VALUES (2, 'Cement', 7, 1, '2019-07-03 17:27:27');


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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `item_description` (`id`, `company_id`, `branch_id`, `item_id`, `item_desc`, `code`, `re_qty`, `purchase_price`, `sale_price`, `running_year`, `status`, `created_at`) VALUES (1, 1, 1, 2, 'Akij Cement', '101', 5, '12.00', '40.00', 1, 1, '2019-07-03 17:27:45');
INSERT INTO `item_description` (`id`, `company_id`, `branch_id`, `item_id`, `item_desc`, `code`, `re_qty`, `purchase_price`, `sale_price`, `running_year`, `status`, `created_at`) VALUES (2, 1, 3, 2, 'Bashundhora Cement', '102', 5, '10.00', '20.00', 1, 1, '2019-07-03 17:28:09');


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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `marketing` (`id`, `company_id`, `branch_id`, `section_id`, `designation_id`, `name`, `present_address`, `permanent_address`, `mobile`, `tel`, `status`, `created_at`) VALUES (1, 1, 1, NULL, 1, 'Abdul Motin', 'fhghjjm', 'dsg', '01719000000', '123345', 1, '2019-06-27 20:27:37');


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
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (1, 1, 'Dashboard', 'dashboard', 'dashboard', 0, 0, NULL, 1, 1, 0, 0, 0, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (2, 2, 'Administrator', 'administrator', 'administrator', 0, 0, NULL, 2, 1, 0, 0, 0, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (3, 2, 'Role Permission', 'role_permission', 'role-permission', 1, 0, NULL, 1, 1, 1, 1, 1, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (5, 2, 'Manage User', 'manage_user', 'manage-user', 1, 0, NULL, 3, 1, 1, 1, 1, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (6, 2, 'Manage Session', 'manage_session', 'manage-session', 1, 0, NULL, 4, 1, 1, 1, 1, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (19, 2, 'Assign Permission', 'assign_permission', 'assign-permission', 0, 0, NULL, 2, 1, 0, 0, 0, '2019-06-17 18:46:33');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (34, 2, 'General Setup', 'general_setup', 'general-setup', 1, 0, '', 2, 1, 0, 0, 0, '2019-06-27 18:45:51');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (35, 2, 'Company', 'company', 'company', 1, 34, '', 1, 1, 1, 1, 1, '2019-06-27 18:45:51');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (36, 2, 'Branch', 'branch', 'branch', 1, 34, '', 2, 1, 1, 1, 1, '2019-06-27 18:45:51');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (37, 2, 'Section', 'section', 'section', 1, 34, '', 3, 1, 1, 1, 1, '2019-06-27 18:45:51');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (38, 2, 'Designation', 'designation', 'designation', 1, 34, '', 3, 1, 1, 1, 1, '2019-06-27 18:45:51');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (39, 2, 'Marketing', 'marketing', 'marketing', 1, 34, '', 4, 1, 1, 1, 1, '2019-06-27 18:45:51');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (40, 2, 'Supplier Info', 'supplier_info', 'supplier-info', 1, 34, 'md  md-receipt', 5, 1, 1, 1, 1, '2019-06-27 18:45:51');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (41, 2, 'Customer Info', 'customer_info', 'customer-info', 1, 34, '', 6, 1, 1, 1, 1, '2019-06-27 18:45:51');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (42, 2, 'Company Bank', 'company_bank', 'company-bank', 1, 34, '', 7, 1, 1, 1, 1, '2019-06-27 18:45:51');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (43, 2, 'Customer Bank', 'customer_bank', 'customer-bank', 1, 34, '', 8, 1, 1, 1, 1, '2019-06-27 18:45:51');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (44, 7, 'Inventory', 'inventory', 'inventory', 0, 0, NULL, 3, 1, 0, 0, 0, '2019-06-27 18:45:51');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (45, 7, 'Inventory Setup', 'inventory_setup', 'inventory-setup', 1, 0, '', 1, 1, 0, 0, 0, '2019-06-27 18:45:51');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (46, 7, 'Unit', 'unit', 'unit', 1, 45, '', 1, 1, 1, 1, 1, '2019-06-27 18:45:51');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (47, 7, 'Item Name', 'item_name', 'item-name', 1, 45, '', 2, 1, 1, 1, 1, '2019-06-27 18:45:51');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (48, 7, 'Item Description', 'item_description', 'item-description', 1, 45, '', 2, 1, 1, 1, 1, '2019-06-27 18:45:51');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (49, 7, 'Opening Stock', 'opening_stock', 'opening-stock', 1, 45, '', 4, 1, 1, 1, 1, '2019-06-27 18:45:51');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (55, 7, 'Transaction', 'transaction', 'transaction', 1, 0, 'fa-mars-stroke-h', 1, 1, 0, 0, 0, '2019-06-27 18:45:51');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (56, 7, 'Purchase', 'purchase', 'purchase', 1, 55, 'fa-pinterest-p', 1, 1, 1, 1, 1, '2019-06-27 18:45:51');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (61, 11, 'Accounts', 'accounts', 'accounts', 0, 0, NULL, 4, 1, 0, 0, 0, '2019-06-27 20:12:12');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (62, 11, 'Accounts Setup', 'accounts_setup', 'accounts-setup', 1, 0, 'fa-dashcube', 1, 1, 0, 0, 0, '2019-06-27 20:12:12');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (63, 11, 'Main Head', 'main_head', 'main-head', 1, 62, 'fa-pinterest-p', 1, 1, 1, 1, 1, '2019-06-27 20:12:12');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (64, 11, 'Ledger', 'ledger', 'ledger', 1, 62, 'fa-subway', 2, 1, 1, 1, 1, '2019-06-27 20:12:12');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (67, 13, 'Msetup', 'msetup', 'msetup', 0, 0, NULL, 22, 0, 0, 0, 0, '2019-07-03 18:27:06');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (68, 13, 'Marketing Setup', 'marketing_setup', 'marketing-setup', 1, 0, '', 3, 0, 0, 0, 0, '2019-07-03 18:27:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (69, 13, 'Test', 'test', 'test', 1, 68, '', 3, 0, 0, 0, 0, '2019-07-03 18:28:59');


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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO `permission_group` (`id`, `name`, `short_code`, `link`, `position`, `is_active`, `system`, `created_at`) VALUES (1, 'Dashboard', 'dashboard', 'dashboard', 1, 1, 0, '2019-06-17 17:10:54');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `link`, `position`, `is_active`, `system`, `created_at`) VALUES (2, 'Administrator', 'administrator', 'administrator', 2, 1, 0, '2019-06-17 19:00:15');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `link`, `position`, `is_active`, `system`, `created_at`) VALUES (7, 'Inventory', 'inventory', 'inventory', 3, 1, 0, '2019-06-22 13:08:15');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `link`, `position`, `is_active`, `system`, `created_at`) VALUES (11, 'Accounts', 'accounts', 'accounts', 4, 1, 0, '2019-06-27 20:09:12');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `link`, `position`, `is_active`, `system`, `created_at`) VALUES (13, 'Msetup', 'msetup', 'msetup', 22, 1, 0, '2019-07-03 18:27:06');


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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `roles` (`id`, `name`, `type`, `created_at`) VALUES (1, 'Super Admin', 'system', '2019-04-22 07:15:09');
INSERT INTO `roles` (`id`, `name`, `type`, `created_at`) VALUES (2, 'Admin', 'system', '2019-04-22 07:15:15');
INSERT INTO `roles` (`id`, `name`, `type`, `created_at`) VALUES (10, 'Panna Admin', 'custom', '2019-06-18 17:54:10');
INSERT INTO `roles` (`id`, `name`, `type`, `created_at`) VALUES (11, 'user', 'custom', '2019-06-18 17:58:09');
INSERT INTO `roles` (`id`, `name`, `type`, `created_at`) VALUES (12, 'Labib-Accounts', 'custom', '2019-06-27 20:29:43');
INSERT INTO `roles` (`id`, `name`, `type`, `created_at`) VALUES (13, 'Karim Accounts', 'custom', '2019-07-03 17:55:57');


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
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (3, 2, 5, 1, 1, 1, 1, '2019-06-17 18:58:38');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (4, 2, 6, 1, 1, 1, 1, '2019-06-17 18:15:05');
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
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (54, 12, 61, 1, 0, 0, 0, '2019-06-27 20:31:29');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (55, 12, 62, 1, 0, 0, 0, '2019-06-27 20:31:29');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (56, 12, 63, 1, 1, 1, 1, '2019-06-27 20:31:29');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (57, 12, 64, 1, 1, 1, 1, '2019-06-27 20:31:29');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (58, 12, 33, 1, 0, 1, 0, '2019-06-27 20:57:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (59, 12, 2, 1, 0, 0, 0, '2019-06-29 15:57:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (60, 12, 3, 1, 1, 1, 1, '2019-06-29 15:57:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (61, 12, 5, 1, 1, 1, 1, '2019-06-29 15:57:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (62, 12, 6, 1, 1, 1, 1, '2019-06-29 15:57:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (63, 12, 19, 1, 0, 0, 0, '2019-06-29 15:57:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (64, 12, 34, 1, 0, 0, 0, '2019-06-29 15:57:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (65, 12, 35, 1, 1, 1, 1, '2019-06-29 15:57:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (66, 12, 36, 1, 1, 1, 1, '2019-06-29 15:57:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (67, 12, 37, 1, 1, 1, 1, '2019-06-29 15:57:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (68, 12, 38, 1, 1, 1, 1, '2019-06-29 15:57:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (69, 12, 39, 1, 1, 1, 1, '2019-06-29 15:57:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (70, 12, 40, 1, 1, 1, 1, '2019-06-29 15:57:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (71, 12, 41, 1, 1, 1, 1, '2019-06-29 15:57:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (72, 12, 42, 1, 1, 1, 1, '2019-06-29 15:57:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (73, 12, 43, 1, 1, 1, 1, '2019-06-29 15:57:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (74, 12, 1, 1, 0, 0, 0, '2019-06-29 15:57:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (75, 12, 44, 1, 0, 0, 0, '2019-06-29 15:57:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (76, 12, 45, 1, 0, 0, 0, '2019-06-29 15:57:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (77, 12, 46, 1, 1, 1, 1, '2019-06-29 15:57:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (78, 12, 47, 1, 1, 1, 1, '2019-06-29 15:57:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (79, 12, 48, 1, 1, 1, 1, '2019-06-29 15:57:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (80, 12, 49, 1, 1, 1, 1, '2019-06-29 15:57:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (81, 12, 55, 1, 0, 0, 0, '2019-06-29 15:57:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (82, 12, 56, 1, 1, 1, 1, '2019-07-03 17:45:16');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (85, 13, 61, 1, 0, 0, 0, '2019-07-03 17:57:22');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (86, 13, 62, 1, 0, 0, 0, '2019-07-03 17:57:22');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (87, 13, 63, 1, 1, 1, 1, '2019-07-03 17:57:22');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (88, 13, 64, 1, 1, 1, 1, '2019-07-03 17:57:22');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (89, 13, 1, 1, 0, 0, 0, '2019-07-03 17:57:22');


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

INSERT INTO `section` (`id`, `company_id`, `branch_id`, `name`, `running_year`, `status`, `created_at`) VALUES (1, 1, 1, 'Sales & Marketing', 1, 1, '2019-06-27 20:26:37');
INSERT INTO `section` (`id`, `company_id`, `branch_id`, `name`, `running_year`, `status`, `created_at`) VALUES (2, 2, 2, 'Sales', 1, 1, '2019-06-27 20:34:26');
INSERT INTO `section` (`id`, `company_id`, `branch_id`, `name`, `running_year`, `status`, `created_at`) VALUES (3, 1, 1, 'Panna section', 1, 1, '2019-07-03 16:00:08');
INSERT INTO `section` (`id`, `company_id`, `branch_id`, `name`, `running_year`, `status`, `created_at`) VALUES (4, 1, 3, 'Panna section2', 1, 1, '2019-07-03 16:02:35');


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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `supplier` (`id`, `company_id`, `branch_id`, `name`, `code`, `tel`, `owner_name`, `email`, `address`, `running_year`, `status`, `created_at`) VALUES (1, 1, 1, 'Modina Group', '5000', '123345', 'Karim', 'yousuf1325037@yahoo.com', 'Gazipur', 1, 1, '2019-06-27 20:28:24');


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
INSERT INTO `unit` (`id`, `name`, `status`, `created_at`) VALUES (7, 'Bag', 1, '2019-06-23 13:23:29');
INSERT INTO `unit` (`id`, `name`, `status`, `created_at`) VALUES (8, 'KG', 1, '2019-06-23 13:23:42');
INSERT INTO `unit` (`id`, `name`, `status`, `created_at`) VALUES (9, 'Ban', 1, '2019-06-23 15:58:37');


