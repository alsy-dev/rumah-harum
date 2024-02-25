<?php

use App\Controllers\Regist;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Sampah::index');

$routes->get('/unit', 'Unit::index');
$routes->get('/unit/create', 'Unit::create');
$routes->post('/unit/save', 'Unit::save');
$routes->get('/unit/edit/(:segment)', 'Unit::edit/$1');
$routes->get('/unit/(:segment)', 'Unit::detail/$1');
$routes->post('/unit/update/(:num)', 'Unit::update/$1');
$routes->delete('/unit/(:num)', 'Unit::delete/$1');

$routes->get('/sampah', 'Sampah::index');
$routes->get('/sampah/create', 'Sampah::create');
$routes->post('/sampah/save', 'Sampah::save');
$routes->get('/sampah/edit/(:segment)', 'Sampah::edit/$1');
$routes->get('/sampah/(:segment)', 'Sampah::detail/$1');
$routes->post('/sampah/update/(:num)', 'Sampah::update/$1');
$routes->delete('/sampah/(:num)', 'Sampah::delete/$1');

$routes->get('/nasabah', 'Nasabah::index');
$routes->post('/nasabah', 'Nasabah::index');
$routes->post('/nasabah/save', 'Nasabah::save');
$routes->post('/nasabah/update/(:num)', 'Nasabah::update/$1');
$routes->delete('/nasabah/(:num)', 'Nasabah::delete/$1');
$routes->get('/nasabah/(:segment)', 'Nasabah::detail/$1');

$routes->get('/access', 'Access::index');
$routes->post('/access/save', 'Access::save');
$routes->get('/access/(:segment)', 'Access::detail/$1');
$routes->post('/access/update/(:num)', 'Access::update/$1');

$routes->get('/riwayattransaksiunit', 'RiwayatTransaksiUnit::index');
$routes->post('/riwayattransaksiunit/save', 'RiwayatTransaksiUnit::save');

$routes->get('/riwayattransaksinasabah', 'RiwayatTransaksiNasabah::index');
$routes->post('/riwayattransaksinasabah/save', 'RiwayatTransaksiNasabah::save');

$routes->get('/pengajuanunit', 'PengajuanUnit::index');
$routes->post('/pengajuanunit/save', 'PengajuanUnit::save');
$routes->delete('/pengajuanunit/(:num)', 'PengajuanUnit::delete/$1');
$routes->post('/pengajuanunit/update/(:num)', 'PengajuanUnit::update/$1');
$routes->post('/pengajuanunit/validate/(:num)', 'PengajuanUnit::validatePengajuan/$1');

$routes->get('/pengajuannasabah', 'PengajuanNasabah::index');
$routes->post('/pengajuannasabah/save', 'PengajuanNasabah::save');
$routes->delete('/pengajuannasabah/(:num)', 'PengajuanNasabah::delete/$1');
$routes->post('/pengajuannasabah/update/(:num)', 'PengajuanNasabah::update/$1');
$routes->post('/pengajuannasabah/validate/(:num)', 'PengajuanNasabah::validatePengajuan/$1');

service('auth')->routes($routes);
