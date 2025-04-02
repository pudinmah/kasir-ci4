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

// SATUAN
$routes->get('/satuan', 'Satuan::index');
$routes->post('/satuan/add', 'Satuan::InsertData');
$routes->post('/satuan/update/(:num)', 'Satuan::Update/$1');
$routes->get('/satuan/delete/(:num)', 'Satuan::Delete/$1');

// KATEGORI
$routes->get('/kategori', 'Kategori::index');
$routes->post('/kategori/add', 'Kategori::InsertData');
$routes->post('/kategori/update/(:num)', 'Kategori::Update/$1');
$routes->get('/kategori/delete/(:num)', 'Kategori::Delete/$1');

// USER
$routes->get('/user', 'User::index');
$routes->post('/user/add', 'User::InsertData');
$routes->post('/user/update/(:num)', 'User::Update/$1');
$routes->get('/user/delete/(:num)', 'User::Delete/$1');