<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/home/getDataKecamatan', 'Home::getDataKecamatan');
$routes->get('/home/getDataKelurahan', 'Home::getDataKelurahan');
