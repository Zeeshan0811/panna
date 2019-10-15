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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `admin` (`id`, `company_id`, `branch_id`, `role_id`, `name`, `username`, `password`, `temp_password`, `phone`, `status`, `ip`, `last_login`, `user_agent`, `reset_key`, `created_at`) VALUES (1, 0, 0, 1, '', 'admin', '$2y$10$l.Xxdci0Nul6AF91xLZLKeSbTIx0/Csf/Q8BLqklwAVgw2Upl4wDS', '', '', 1, '::1', '2019-06-25 10:15:22', 'Chrome 75.0.3770.100Windows 10', '', '2019-06-25 10:15:22');
INSERT INTO `admin` (`id`, `company_id`, `branch_id`, `role_id`, `name`, `username`, `password`, `temp_password`, `phone`, `status`, `ip`, `last_login`, `user_agent`, `reset_key`, `created_at`) VALUES (35, 1, 1, 11, 'Shipan', 'shipanmazumder@gmail.com', '$2y$10$oxz2dznE9R8KEOk6OpOFRe7UtHkoQGuaIV3kUtwVCgELIeIYVHUxS', 'MTIzNDU=', '(+88) 132-1321-3213', 1, NULL, NULL, NULL, '', '2019-06-24 18:48:19');


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (1, 1, 'Dashboard', 'dashboard', 'dashboard', 0, 0, NULL, 1, 1, 0, 0, 0, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (2, 2, 'Administrator', 'administrator', 'administrator', 0, 0, NULL, 2, 1, 0, 0, 0, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (3, 2, 'Role Permission', 'role_permission', 'role-permission', 1, 0, NULL, 1, 1, 1, 1, 1, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (5, 2, 'Manage User', 'manage_user', 'manage-user', 1, 0, NULL, 3, 1, 1, 1, 1, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (6, 2, 'Manage Session', 'manage_session', 'manage-session', 1, 0, NULL, 4, 1, 1, 1, 1, '2019-06-17 18:14:27');
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
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `icon`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (50, 7, 'Purchase', 'purchase', 'purchase', 1, 0, 'fa-cc-mastercard', 5, 0, 0, 0, 0, '2019-06-25 11:34:11');


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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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


