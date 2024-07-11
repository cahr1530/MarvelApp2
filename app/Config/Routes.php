<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/Characters', 'Characters::index');
//$routes->get('/Characters/(:num)', 'Characters::show/$1');
//$routes->get('/Characters/new','Characters::new');

$routes->resource('Characters', ['placeholder' => '(:num)', 'except'  => 'show']);

$routes->get('/', 'Home::index');
$routes->get('/ConsumeAPI','MarvelApiController::index');
