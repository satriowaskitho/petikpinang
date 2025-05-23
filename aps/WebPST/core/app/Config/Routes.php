<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index', ['filter' => 'userFilter']);
$routes->get('', 'Pages::index', ['filter' => 'userFilter']);
$routes->get('/pengawas/edit/(:any)', 'Pengawas::edit/$1', ['filter' => 'userFilter']);
$routes->get('/pengawas/(:num)', 'Pengawas::hapus/$1', ['filter' => 'userFilter']);
$routes->get('/pengawas/(:any)', 'Pengawas::profil/$1', ['filter' => 'userFilter']);
$routes->get('/pengawas', 'Pengawas::index', ['filter' => 'userFilter']);
$routes->get('/pages', 'Pages::index', ['filter' => 'userFilter']);
$routes->get('/Pages', 'Pages::index', ['filter' => 'userFilter']);
$routes->get('/pages/index', 'Pages::index', ['filter' => 'userFilter']);
$routes->get('/login', 'Login::index', ['filter' => 'dahOnline']);
$routes->get('/Login', 'Login::index', ['filter' => 'dahOnline']);
$routes->get('/login/masuk', 'Login::masuk', ['filter' => 'dahOnline']);
$routes->get('/login/index', 'Login::index', ['filter' => 'dahOnline']);
$routes->get('/laporan/(:num)', 'Laporan::lapor/$1',['filter' => 'userFilter']);
$routes->get('/Laporan/(:num)', 'Laporan::lapor/$1',['filter' => 'userFilter']);
$routes->get('/pages/Laporan/(:num)', 'Laporan::lapor/$1',['filter' => 'userFilter']);
$routes->get('/presensi', 'Presensi::index',['filter' => 'userFilter']);
$routes->get('/presensi/index', 'Presensi::index',['filter' => 'userFilter']);
$routes->get('/presensi/update', 'Presensi::update',['filter' => 'userFilter']);
$routes->get('/jadwal', 'Jadwal::index',['filter' => 'userFilter']);
$routes->get('/jadwal/index', 'Jadwal::index',['filter' => 'userFilter']);
$routes->get('/jadwal/buat', 'Jadwal::buat',['filter' => 'userFilter']);
$routes->get('/jadwal/hapus', 'Jadwal::hapus',['filter' => 'userFilter']);
