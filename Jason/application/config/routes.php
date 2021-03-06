<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

$route['home'] = "frontend/index";
$route['about'] = "frontend/about";
$route['report'] = "frontend/report";


$route['subscribe'] = "day5_paymentgateway/subscribe";
$route['submit_subscribe'] = "day5_paymentgateway/submit_subscribe";
$route['checkout_payment/(:num)'] = "day5_paymentgateway/checkout_payment/$1";
$route['checkout_callback'] = "day5_paymentgateway/checkout_callback";
$route['checkout_completed/(:num)'] = "day5_paymentgateway/checkout_completed/$1";
$route['checkout_retry/(:num)'] = "day5_paymentgateway/checkout_retry/$1";
$route['contact'] = "day5_recaptcha/contact";
$route['contact_submit'] = "day5_recaptcha/contact_submit";


$route['detail/(:num)/(:any)'] = "frontend/news_detail/$1/$2";
$route['api/api_contact_submit'] = "api/api_contact_submit";
$route['api/report_api'] = "api/report_api";
$route['api/glogin'] = "day3_sociallogin/glogin_api";
$route['api/flogin'] = "day3_sociallogin/flogin_api";
$route['api/cronjob'] = "day4_cronjob/cronjob";

$route['day3_unittest'] = "day3_unittest/runtest";
$route['day4_recursive'] = "day4_recursive/showresult";
$route['day4_timespace_generateData'] = "day4_timespace/generateData";
$route['day4_timespace_productlist'] = "day4_timespace/productList";

$route['default_controller'] = 'frontend/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
