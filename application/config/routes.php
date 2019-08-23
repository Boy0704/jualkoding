<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'web';
$route['404_override'] = 'web/error_not_found';
$route['panduan']      = 'web/panduan';
$route['registrasi']   = 'web/registrasi';
$route['verify/(:any)/(:any)']= 'web/verify/$1/$2';
$route['verify/(:any)/(:any)/(:any)']= 'web/verify/$1/$2/$3';
$route['download']     = 'web/download';
$route['download/(:any)']= 'web/download/$1';
$route['download/(:any)/(:any)']= 'web/download/$1/$2';
$route['detail/(:any)']= 'web/detail/$1';
$route['d/(:any)']= 'web/d/$1';
$route['app_d/(:any)']= 'web/d/$1';
$route['judul_ta']     = 'web/judul_ta';
$route['article']      = 'web/article';
$route['article/(:any)'] = 'web/article/$1';
$route['article_detail/(:any)'] = 'web/article_detail/$1';
$route['article/(:any)/(:any)'] = 'web/article/$1/$2';
$route['member']       = 'web/member';
$route['app']          = 'web/aplikasi';
$route['app/(:any)']   = 'web/aplikasi/$1';
$route['app/(:any)/(:any)']= 'web/aplikasi/$1/$2';
$route['hubungi']      = 'web/hubungi';
$route['user_profile'] = 'web/profile';
$route['login']        = 'web/login';
$route['logout']       = 'web/logout';
$route['lp']           = 'web/lp';
$route['konfirm_pass/(:any)/(:any)'] = 'web/konfirm_pass/$1/$2';
$route['pesan']        = 'web/pesan';


$route['panel_jualkoding'] = 'admin/panel_jualkoding';
$route['profile']       = 'admin/profile';
$route['admin_logout']  = 'admin/logout';
$route['aplikasi']      = 'admin/aplikasi';
$route['data_member']   = 'admin/member';
$route['data_member/tgl/(:any)']   = 'admin/member/tgl/$1';
$route['data_article']  = 'admin/article';
$route['kontak']        = 'admin/kontak';
$route['transaksi']     = 'admin/transaksi';
$route['transaksi/tgl/(:any)']   = 'admin/transaksi/tgl/$1';
//$route['verify/(:any)'] = "web/verify/$1";
$route['translate_uri_dashes'] = FALSE;
