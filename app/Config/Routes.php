<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/login', 'Auth::index');

$routes->get('/user', 'User::index');

$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Admin::index');
$routes->get('/setting', 'Admin::setting');
$routes->get('/produk', 'Produk::index');
$routes->get('/kategori', 'Kategori::index');

$routes->get('/satuan', 'Satuan::index');
$routes->post('/satuan/add', 'Satuan::InsertData');
$routes->post('/satuan/update/(:num)', 'Satuan::Update/$1');
$routes->get('/satuan/delete/(:num)', 'Satuan::Delete/$1');
