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
$route['admin/pengguna'] = 'admin_user';
$route['admin/tambah-pengguna'] = 'admin_add_user/view';
$route['admin/edit-pengguna/(:any)'] = 'admin_add_user/view/$1';
$route['admin/kategori'] = 'admin_kategori';
$route['admin/gambar'] = 'admin_gambar';
$route['admin/slide'] = 'admin_slide';
$route['admin/tambah-slide'] = 'admin_add_slide/view';
$route['admin/edit-slide/(:any)'] = 'admin_add_slide/view/$1';
$route['admin/diskon'] = 'admin_diskon';
$route['admin/tambah-produk'] = 'admin_add_produk/view';
$route['admin/edit-produk/(:any)'] = 'admin_add_produk/view/$1';
$route['admin/produk'] = 'admin_produk';
$route['admin'] = 'admin_dashboard';

$route['history'] = 'public_history';
$route['cart'] = 'public_cart/view';
$route['cart/(:any)'] = 'public_cart/view/$1';
$route['produk'] = 'public_produk';
$route['produk/(:any)'] = 'public_single_produk/view/$1';
$route['user'] = 'public_user';
$route['register'] = 'public_register';
$route['login'] = 'public_login';
$route['default_controller'] = 'public_home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
