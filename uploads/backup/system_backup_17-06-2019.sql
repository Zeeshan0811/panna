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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `admin` (`id`, `role_id`, `name`, `username`, `password`, `temp_password`, `phone`, `status`, `ip`, `last_login`, `user_agent`, `created_at`) VALUES (1, 1, '', 'admin', '$2y$10$l.Xxdci0Nul6AF91xLZLKeSbTIx0/Csf/Q8BLqklwAVgw2Upl4wDS', '', '', 1, '::1', '2019-06-17 10:11:52', 'Chrome 74.0.3729.169Windows 10', '2019-06-17 10:11:52');
INSERT INTO `admin` (`id`, `role_id`, `name`, `username`, `password`, `temp_password`, `phone`, `status`, `ip`, `last_login`, `user_agent`, `created_at`) VALUES (28, 2, 'Shipan', 'shipansm', '$2y$10$OwIa76PNgoHyTuYY7yyshOu1Q/FwtUb..eiAmn5iuP5co8PZqyEy.', 'MTIzNDU=', '(+88) 018-3474-1581', 1, '::1', '2019-06-17 19:12:51', 'Chrome 74.0.3729.169Windows 10', '2019-06-17 19:12:51');
INSERT INTO `admin` (`id`, `role_id`, `name`, `username`, `password`, `temp_password`, `phone`, `status`, `ip`, `last_login`, `user_agent`, `created_at`) VALUES (29, 6, 'Test', 'staff', '$2y$10$pOTi9Sj58RqY.J9gWzccYeBiyRRjBTSyn0ZWxJTvkAH3tPpy/Sse.', 'MTIzNDU=', '(+88) 012-5152-4152', 1, '::1', '2019-06-10 18:11:40', 'Chrome 74.0.3729.169Windows 10', '2019-06-10 18:11:40');
INSERT INTO `admin` (`id`, `role_id`, `name`, `username`, `password`, `temp_password`, `phone`, `status`, `ip`, `last_login`, `user_agent`, `created_at`) VALUES (30, 7, 'Karim', 'test', '$2y$10$6kaSomRvW3BWg9bgS3VYY.WkPZLoz7.441LewHNL4X51L18Ks/3Tm', 'MTIzNDU=', '(+88) 015-4215-4215', 1, '::1', '2019-06-10 18:20:10', 'Chrome 74.0.3729.169Windows 10', '2019-06-10 18:20:10');
INSERT INTO `admin` (`id`, `role_id`, `name`, `username`, `password`, `temp_password`, `phone`, `status`, `ip`, `last_login`, `user_agent`, `created_at`) VALUES (31, 8, 'Green', 'green', '$2y$10$qjBaWGrZO4zJx5Ih7F4XouZBG9lPpwiF0.dREGqBJS/kvXmjZfiW6', 'MTIzNA==', '(+88) 021-1321-3232', 1, '::1', '2019-06-17 18:22:08', 'Chrome 74.0.3729.169Windows 10', '2019-06-17 18:22:08');


#
# TABLE STRUCTURE FOR: branch
#

DROP TABLE IF EXISTS `branch`;

CREATE TABLE `branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `running_year` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `branch` (`id`, `company_id`, `name`, `contact`, `address`, `running_year`, `status`, `created_at`) VALUES (1, 1, 'Test 3', '(+88) 012-5412-3515', 'n/a', 1, 1, '2019-06-11 14:42:52');
INSERT INTO `branch` (`id`, `company_id`, `name`, `contact`, `address`, `running_year`, `status`, `created_at`) VALUES (2, 1, 'Test', '(+88) 012-1321-3213', 'sdssdfsf', 1, 1, '2019-06-11 13:39:35');
INSERT INTO `branch` (`id`, `company_id`, `name`, `contact`, `address`, `running_year`, `status`, `created_at`) VALUES (3, 3, 'N/A', '(+88) 012-3213-2132', 'asas', 1, 1, '2019-06-11 13:59:05');
INSERT INTO `branch` (`id`, `company_id`, `name`, `contact`, `address`, `running_year`, `status`, `created_at`) VALUES (4, 4, 'Test 323324', '(+88) 233-2323-2323', 'dfdf', 1, 1, '2019-06-15 17:30:29');
INSERT INTO `branch` (`id`, `company_id`, `name`, `contact`, `address`, `running_year`, `status`, `created_at`) VALUES (5, 1, 'sdfds', '(+88) 222-2223-2323', 'dfd', 1, 1, '2019-06-15 17:30:59');


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
  `running_year` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `company` (`id`, `name`, `address`, `mobile`, `tel`, `running_year`, `status`, `created_at`) VALUES (1, 'Panna', '', '', NULL, 1, 1, '2019-06-17 15:22:56');
INSERT INTO `company` (`id`, `name`, `address`, `mobile`, `tel`, `running_year`, `status`, `created_at`) VALUES (3, 'Sales', '', '', NULL, 1, 0, '2019-06-17 11:23:23');
INSERT INTO `company` (`id`, `name`, `address`, `mobile`, `tel`, `running_year`, `status`, `created_at`) VALUES (4, 'Inventory', '', '', NULL, 1, 0, '2019-06-17 11:23:28');
INSERT INTO `company` (`id`, `name`, `address`, `mobile`, `tel`, `running_year`, `status`, `created_at`) VALUES (5, 'N/A', 'df', 'sd', '23233343', 1, 0, '2019-06-17 16:46:05');
INSERT INTO `company` (`id`, `name`, `address`, `mobile`, `tel`, `running_year`, `status`, `created_at`) VALUES (6, 'Administrator', 'Dhaka', '01719000000', '23233343', 1, 0, '2019-06-17 16:48:02');
INSERT INTO `company` (`id`, `name`, `address`, `mobile`, `tel`, `running_year`, `status`, `created_at`) VALUES (7, 'sdfsf', '', '', NULL, 1, 0, '2019-06-17 11:23:22');
INSERT INTO `company` (`id`, `name`, `address`, `mobile`, `tel`, `running_year`, `status`, `created_at`) VALUES (8, 'Oli', 'sdfdf', '01719000000', '23233343', 1, 0, '2019-06-17 11:23:27');
INSERT INTO `company` (`id`, `name`, `address`, `mobile`, `tel`, `running_year`, `status`, `created_at`) VALUES (9, 'Administratorsd', 'Dhaka', '01719000000', '23233343', 1, 1, '2019-06-17 16:46:15');
INSERT INTO `company` (`id`, `name`, `address`, `mobile`, `tel`, `running_year`, `status`, `created_at`) VALUES (10, 'Inventorydf', 'df', '01719000000', '23233343', 1, 1, '2019-06-17 16:48:08');


#
# TABLE STRUCTURE FOR: company_bank
#

DROP TABLE IF EXISTS `company_bank`;

CREATE TABLE `company_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `company_bank` (`id`, `name`, `status`, `created_at`) VALUES (1, 'Duch Bangla Bank Ltd', 1, '2019-06-17 13:33:41');
INSERT INTO `company_bank` (`id`, `name`, `status`, `created_at`) VALUES (2, 'Agrani Bank', 1, '2019-06-17 16:35:31');


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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `customer` (`id`, `company_id`, `branch_id`, `marketing_id`, `name`, `code`, `address`, `owner_name`, `tel`, `email`, `national_id`, `trade`, `security_cheque`, `amount`, `bank_id`, `running_year`, `status`, `created_at`) VALUES (1, 1, 2, 1, 'Administrator', '12', 'Dhaka', 'sda', '23233343', 'info@nabilparibahon.com', '3434', '231345', '1234', '3434', 1, 1, 1, '2019-06-17 17:49:22');
INSERT INTO `customer` (`id`, `company_id`, `branch_id`, `marketing_id`, `name`, `code`, `address`, `owner_name`, `tel`, `email`, `national_id`, `trade`, `security_cheque`, `amount`, `bank_id`, `running_year`, `status`, `created_at`) VALUES (2, 1, 2, 1, 'Administrator', '12345', 'Dhaka', 'sda', '23233343', 'info@nabilparibahon.com', '3434', '3434', '3434', '3434', 1, 1, 1, '2019-06-17 16:33:12');


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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `marketing` (`id`, `company_id`, `branch_id`, `section_id`, `designation_id`, `name`, `present_address`, `permanent_address`, `mobile`, `tel`, `status`, `created_at`) VALUES (1, 1, 2, NULL, 6, 'Mr. Anik', 'sdshgfh', 'sds', '01719000000', '23233343', 1, '2019-06-17 12:25:24');
INSERT INTO `marketing` (`id`, `company_id`, `branch_id`, `section_id`, `designation_id`, `name`, `present_address`, `permanent_address`, `mobile`, `tel`, `status`, `created_at`) VALUES (2, 1, 2, NULL, 1, 'Mr. Aniksds', 'as', 'sds', '01719000000', '23233343', 1, '2019-06-17 12:25:11');


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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (1, 1, 'Dashboard', 'dashboard', 'dashboard', 0, 0, 1, 1, 0, 0, 0, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (2, 2, 'Administrator', 'administrator', 'administrator', 0, 0, 2, 1, 0, 0, 0, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (3, 2, 'Role Permission', 'role_permission', 'role-permission', 1, 0, 1, 1, 1, 1, 1, '2019-06-17 18:14:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `link`, `submenu`, `subparent`, `position`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (4, 2, 'Module', 'module', 'module', 1, 0, 2, 0, 0, 0, 0, '2019-06-17 17:12:07');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `permission_group` (`id`, `name`, `short_code`, `link`, `position`, `is_active`, `system`, `created_at`) VALUES (1, 'Dashboard', 'dashboard', 'dashboard', 1, 1, 0, '2019-06-17 17:10:54');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `link`, `position`, `is_active`, `system`, `created_at`) VALUES (2, 'Administrator', 'administrator', 'administrator', 2, 1, 0, '2019-06-17 19:00:15');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `link`, `position`, `is_active`, `system`, `created_at`) VALUES (3, 'Inventory', 'inventory', 'inventory', 3, 1, 0, '2019-06-17 17:13:55');


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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `roles` (`id`, `name`, `type`, `created_at`) VALUES (1, 'Super Admin', 'system', '2019-04-22 07:15:09');
INSERT INTO `roles` (`id`, `name`, `type`, `created_at`) VALUES (2, 'Admin', 'system', '2019-04-22 07:15:15');
INSERT INTO `roles` (`id`, `name`, `type`, `created_at`) VALUES (4, 'Employee', 'system', '2019-05-20 07:29:11');
INSERT INTO `roles` (`id`, `name`, `type`, `created_at`) VALUES (6, 'Staff', 'custom', '2019-06-10 18:10:04');
INSERT INTO `roles` (`id`, `name`, `type`, `created_at`) VALUES (7, 'Accounts', 'custom', '2019-06-10 18:19:11');
INSERT INTO `roles` (`id`, `name`, `type`, `created_at`) VALUES (8, 'Inventory', 'custom', '2019-06-10 18:19:16');


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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (3, 2, 5, 1, 1, 1, 1, '2019-06-17 18:58:38');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (4, 2, 6, 1, 1, 1, 1, '2019-06-17 18:15:05');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (5, 2, 7, 1, 1, 0, 0, '2019-06-17 18:15:05');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (7, 2, 8, 1, 1, 1, 1, '2019-06-17 18:58:38');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (8, 2, 9, 1, 0, 0, 0, '2019-06-17 18:15:05');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (10, 8, 2, 1, 0, 0, 0, '2019-06-17 18:21:55');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (11, 8, 5, 1, 0, 0, 0, '2019-06-17 18:21:55');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (12, 8, 6, 1, 0, 0, 0, '2019-06-17 18:21:55');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (13, 8, 7, 1, 0, 0, 0, '2019-06-17 18:21:55');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (14, 8, 1, 1, 0, 0, 0, '2019-06-17 18:21:55');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (15, 8, 8, 1, 0, 0, 0, '2019-06-17 18:23:04');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (16, 8, 9, 1, 0, 0, 0, '2019-06-17 18:23:04');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (17, 8, 10, 1, 0, 0, 0, '2019-06-17 18:23:04');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (18, 2, 3, 1, 1, 1, 1, '2019-06-17 18:47:23');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (19, 2, 19, 1, 0, 0, 0, '2019-06-17 18:46:41');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (21, 2, 1, 1, 0, 0, 0, '2019-06-17 18:58:38');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (22, 2, 2, 1, 0, 0, 0, '2019-06-17 18:59:15');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (23, 2, 11, 1, 1, 1, 1, '2019-06-17 19:02:23');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (24, 2, 12, 1, 1, 1, 1, '2019-06-17 19:02:23');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (25, 2, 13, 1, 1, 1, 1, '2019-06-17 19:02:23');


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

INSERT INTO `supplier` (`id`, `company_id`, `branch_id`, `name`, `code`, `tel`, `owner_name`, `email`, `address`, `running_year`, `status`, `created_at`) VALUES (1, 1, 2, 'Administrator', '1234', '23233343', 'sda', 'info@nabilparibahon.com', 'Dhaka', 1, 1, '2019-06-17 17:49:39');


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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `unit` (`id`, `name`, `status`, `created_at`) VALUES (1, 'PCS', 1, '2019-06-17 16:06:54');


