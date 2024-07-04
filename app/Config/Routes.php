<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

service('auth')->routes($routes, ['except' => ['register']]);
$routes->get('register', 'Shields\RegisterController::registerView');
$routes->post('register', 'Shields\RegisterController::registerAction',['as' => 'register']);
