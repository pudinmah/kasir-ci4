<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/login', 'Auth::index');
$routes->post('/ceklogin', 'Auth::CekLogin');
$routes->get('/logout', 'Home::LogOut');

// Group Admin Routes
$routes->group('admin', function ($routes) {
    $routes->get('dashboard', 'Admin::index');
    $routes->get('setting', 'Admin::setting');
    $routes->post('setting/update', 'Admin::Update');
});

// Group Penjualan
$routes->get('/penjualan', 'Penjualan::index');
$routes->post('/penjualan/cekproduk', 'Penjualan::CekProduk');

// Group Satuan
$routes->group('satuan', function ($routes) {
    $routes->get('/', 'Satuan::index');
    $routes->post('add', 'Satuan::InsertData');
    $routes->post('update/(:num)', 'Satuan::Update/$1');
    $routes->delete('delete/(:num)', 'Satuan::Delete/$1');
});

// Group Kategori
$routes->group('kategori', function ($routes) {
    $routes->get('/', 'Kategori::index');
    $routes->post('add', 'Kategori::InsertData');
    $routes->post('update/(:num)', 'Kategori::Update/$1');
    $routes->delete('delete/(:num)', 'Kategori::Delete/$1');
});

// Group Produk
$routes->group('produk', function ($routes) {
    $routes->get('/', 'Produk::index');
    $routes->post('add', 'Produk::InsertData');
    $routes->post('update/(:num)', 'Produk::Update/$1');
    $routes->delete('delete/(:num)', 'Produk::Delete/$1');
});

// Group User
$routes->group('user', function ($routes) {
    $routes->get('/', 'User::index');
    $routes->post('add', 'User::InsertData');
    $routes->post('update/(:num)', 'User::Update/$1');
    $routes->delete('delete/(:num)', 'User::Delete/$1');
});
