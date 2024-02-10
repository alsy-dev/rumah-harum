<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

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

service('auth')->routes($routes);
