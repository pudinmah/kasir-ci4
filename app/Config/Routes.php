<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/home', 'Admin::index');
$routes->get('/produk', 'Produk::index');
$routes->get('/kategori', 'Kategori::index');
$routes->get('/satuan', 'Satuan::index');


$routes->get('/login', 'Auth::index');