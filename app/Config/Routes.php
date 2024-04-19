<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/fungsi1', 'Home::fungsi1');
$routes->get('/tampilnama', 'Home::tampilnama');
$routes->get('/kirimdatakeview', 'Home::kirimdatakeview');

$routes->get('/Page', 'Page::index');
$routes->get('/Page/fungsi1', 'Page::fungsi1');
$routes->get('/Page/tampilnama', 'Page::tampilnama');
$routes->get('/Page/kirimdatakeview', 'Page::kirimdatakeview');

$routes->get('/biodatadiri/tampilbiodata', 'biodatadiri::biodata');

$routes->get('/page/parameter/(:any)', 'Page::tampilparameter/$1');
$routes->get('/page/umur/(:num)', 'Page::tampilusia/$1');

$routes->get('/page/mahasiswa', 'page::mahasiswa');
$routes->get('/page/dosen', 'page::dosen');
$routes->get('/page/jurusan', 'page::jurusan');

$routes->get('/mahasiswa', 'Mahasiswa::index');
$routes->post('/mahasiswa/simpandata', 'Mahasiswa::simpandata');
$routes->post('/mahasiswa/updatedata', 'Mahasiswa::updatedata');
$routes->post('/mahasiswa/hapusdata', 'Mahasiswa::hapusdata');

$routes->get('/prodi', 'prodi::index');
$routes->post('/prodi/simpandata', 'prodi::simpandata');
$routes->post('/prodi/updatedata', 'prodi::updatedata');
$routes->post('/prodi/hapusdata', 'prodi::hapusdata');

$routes->get('/jurusan', 'jurusan::index');
$routes->post('/jurusan/simpandata', 'jurusan::simpandata');
$routes->post('/jurusan/updatedata', 'jurusan::updatedata');
$routes->post('/jurusan/hapusdata', 'jurusan::hapusdata');


$routes->post('/ceklogin', 'Home::ceklogin');
$routes->get('/menu', 'Home::menu');
$routes->get('/logout', 'Home::logout');
