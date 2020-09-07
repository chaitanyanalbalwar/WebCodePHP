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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'welcome';
$route['faq'] = 'home/faq';
$route['about-us'] = 'home/about';
$route['privacy-policy'] = 'home/privacy_policy';
$route['cancellation-and-refund-policy'] = 'home/cancellation_and_refund';
$route['terms-and-conditions'] = 'home/terms_and_conditions';


$route['checkout'] = 'home/checkout';
$route['contact'] = 'home/contact';
$route['foods'] = 'home/foods';
$route['restaurant-registration'] = 'home/restaurants_registration';
$route['restaurants/(:any)'] = 'home/restaurants';
$route['user-registration'] = 'home/user_registration';
$route['menu/(:any)'] = 'home/menu';
$route['process-user-registration'] = 'home/process_user_registration';
$route['login']='home/login';
$route['process-login']='home/process_login';
$route['sign-out']='home/sign_out';
$route['process-order']='home/process_order';
$route['response']='home/response';
$route['my-profile']='home/my_profile';
$route['update-profile']='home/update_profile';
$route['my-orders']='home/my_orders';
$route['cancel-order/(:any)'] = 'home/cancel_order';
$route['my-address']='home/my_address';
$route['add-address']='home/add_address';
$route['make-primary/(:any)'] = 'home/make_primary';
$route['edit-address/(:any)'] = 'home/edit_address';
$route['update-address']='home/update_address';
$route['load-map/(:any)'] = 'home/load_map';
$route['register-your-business']='home/register_your_business';
$route['rate-review-order/(:any)']='home/rate_review_order';