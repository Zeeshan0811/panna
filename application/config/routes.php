<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'web/web';
$route['404_override'] = 'custom404';
$route['translate_uri_dashes'] = FALSE;

//welcome route

$route['main/(:any)'] = 'welcome/index/$1';
/**
 * setting
 */
$route['setting'] = 'setting/setting';
$route['general-setting'] = 'setting/general';

/**
 * dashboard routes
 */
$route['dashboard'] = 'dashboard/dashboard';
/**
 * administrator routes
 */
$route['administrator'] = 'administrator/administrator';
$route['module'] = 'administrator/module';
$route['module/mlist'] = 'administrator/module/mlist';
$route['role-permission'] = 'administrator/role';
$route['manage-user'] = 'administrator/users';
$route['manage-session'] = 'administrator/sessions';
$route['backup'] = 'administrator/backup';
//$route['module/store-company-module'] = 'module/store_company_module';

/**
 * company routes
 */
$route['company'] = 'company/company';
$route['company-bank'] = 'company/companyBank';
/**
 * branch routes
 */
$route['branch'] = 'branch/branch';
/**
 * designation routes
 */
$route['designation'] = 'designation/designation';
/**
 * marketing routes
 */
$route['marketing'] = 'marketing/marketing';
$route['msetup'] = 'msetup/msetup';

/**
 * item routes
 */
$route['item-name'] = 'item/item';
$route['item-description'] = 'item/itemdescription';
$route['itemdescription/add'] = 'item/itemdescription/add';


/**
 * customer routes
 */
$route['customer-info'] = 'customer/customer';
$route['customer-bank'] = 'customer/customerBank';
/**
 * opening stock routes
 */
$route['opening-stock'] = 'openstock/openstock';

/**
 * supplier routes
 */
$route['supplier-info'] = 'supplier/supplier';

/**
 * purchase
 */
$route['purchase'] = 'purchase/purchase';
$route['purchase-return'] = 'purchase/purchase_return';

/**
 * sales
 */
$route['sales'] = 'sales/sales';
$route['sales-return'] = 'sales/sales_return';

/**
 * reports
 */
$route['stock-details'] = 'reports/stockreports';
$route['customer-ledger'] = 'reports/customerreports';

/**
 * =============account section============
 */

$route['accounts'] = 'accounts/accounts';

$route['main-head'] = 'mainhead/mainhead';
$route['opening-balance'] = 'openbalance/openbalance';
$route['payment'] = 'payment/payment';
$route['received'] = 'received/received';

/**
 * =============web part============
 */

$route['slider'] = 'web_admin/admin/slider';
$route['admin/sliderEdit/(:num)'] = 'web_admin/admin/sliderEdit/$1';
$route['admin/sliderDelete/(:num)'] = 'web_admin/admin/sliderDelete/$1';
$route['about-us'] = 'web_admin/admin/about_us';
$route['admin/about-us'] = 'web_admin/admin/about_us';
$route['gallery'] = 'web_admin/admin/gallery';
$route['admin/galleryEdit/(:num)'] = 'web_admin/admin/galleryEdit/$1';
$route['admin/galleryDelete/(:num)'] = 'web_admin/admin/galleryDelete/$1';
$route['our-client'] = 'web_admin/admin/client';
$route['admin/clientEdit/(:num)'] = 'web_admin/admin/clientEdit/$1';
$route['admin/clientDelete/(:num)'] = 'web_admin/admin/clientDelete/$1';
$route['admin/contact-us'] = 'web_admin/admin/contact';
$route['contact-us'] = 'web_admin/admin/contact';


$route['about-us.html'] = 'web/web/about_us';
$route['gallery.html'] = 'web/web/gallery';
$route['our-client.html'] = 'web/web/client';
$route['contact.html'] = 'web/web/contact';
