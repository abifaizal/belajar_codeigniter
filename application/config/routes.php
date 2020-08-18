<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// custom url route stock
$route['stock/in'] = 'stock/stock_in_data';
$route['stock/in/add'] = 'stock/stock_in_add';
$route['stock/in/del'] = 'stock/stock_in_del';

$route['stock/out'] = 'stock/stock_out_data';
$route['stock/out/add'] = 'stock/stock_out_add';
$route['stock/out/del'] = 'stock/stock_out_del';
