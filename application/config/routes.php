<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "products";
$route['products/pagination/(:any)'] = "products/pagination/$1";
$route['products/browse/(:any)/(:any)'] = "products/sort_by/$1/$2";
$route['products/show/(:any)'] = "products/show/$1";
$route['products/search/(:any)/(:any)'] = "products/search/$1/$2";
// $route['products/search_by_keyword/(:any)'] = "products/search_by_keyword/$1";
$route['login'] = "users/login";
$route['dashboard'] = "users/adminview";
$route['404_override'] = '';
$route['carts'] = "products/carts";

//end of routes.php