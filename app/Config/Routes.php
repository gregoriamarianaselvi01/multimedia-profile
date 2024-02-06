<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Admin\DashboardController::index');

//route admin dashboard
$routes->get('dashboard', 'Admin\DashboardController::index');


//route admin produk
$routes->get('daftar-produk', 'Admin\ProdukController::index');

$routes->get('daftar-kategori', 'Admin\ProdukController::kategori');
$routes->post('daftar-kategori/tambah', 'Admin\ProdukController::store');
$routes->post('daftar-kategori/ubah/(:num)', 'Admin\ProdukController::update/$1');