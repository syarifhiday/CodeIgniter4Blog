<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/blog', 'Blog::index');
$routes->get('/blog/(:segment)', 'Blog::detail/$1');
$routes->get('/blog/search/(:segment)', 'Blog::search/$1');

$routes->get('/page/about', 'Pages::about');
$routes->get('/page/contact', 'Pages::contact');

$routes->get('/admin', 'Blog::admin');
$routes->get('/admin/write', 'Blog::write');
$routes->get('/admin/edit/(:segment)', 'Blog::edit/$1');
$routes->get('/admin/delete/(:segment)', 'Blog::delete/$1');
$routes->post('/admin/save', 'Blog::save');
$routes->post('/admin/update', 'Blog::update');


$routes->post('/upload/image', 'UploadController::uploadImage');
