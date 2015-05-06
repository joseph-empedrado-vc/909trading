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
|	http://codeigniter.com/user_guide/general/routing.html
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

$route['default_controller'] = 'site';

//$route['(:any)'] = "site/maintenance";

$route['home/(:any)'] = "site/$1";
$route['home'] = "site/index";

$route['about-us/(:any)'] = "site/aboutus/$1";
$route['about-us'] = "site/aboutus";


$route['company-profile/(:any)'] = "site/company_profile/$1";
$route['company-profile'] = "site/company_profile";

$route['contact-us/(:any)'] = "site/contact/$1";
$route['contact-us'] = "site/contact";

$route['how-to-get-there/(:any)'] = "site/how_to_get_there/$1";
$route['how-to-get-there'] = "site/how_to_get_there";

$route['financing/(:any)'] = "site/financing/$1";
$route['financing'] = "site/financing";

$route['admin/form/(:any)'] = "form/$1";
$route['admin/form/(:any)/(:any)'] = "form/$1/$1";
$route['admin/form'] = "form/index";


$route['send_message/(:any)'] = "site/send_message/$1";
$route['send_message'] = "site/send_message";

$route['send_email/(:any)'] = "site/send_email/$1";
$route['send_email'] = "site/send_email";

$route['get_captcha/(:any)'] = "site/get_captcha/$1";
$route['get_captcha'] = "site/get_captcha";

$route['validate_captcha/(:any)'] = "site/validate_captcha/$1";
$route['validate_captcha'] = "site/validate_captcha";

$route['admin/(:any)'] = "system/$1";
$route['admin'] = "system/index";


$route['stocks/(:any)'] = "site/stocks/$1";
$route['stocks'] = "site/stocks";





$route['(:any)'] = "site/$1";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;