<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "products";
$route['login'] = "users/login_route";
$route['admin/orders'] = "users/orders_route";
$route['admin/products'] = "users/product_route";
$route['admin/products/add'] = "users/add_product_route";
$route['404_override'] = '';

//end of routes.php