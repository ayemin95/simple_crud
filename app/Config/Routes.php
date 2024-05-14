<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/users','UserController::index');
$routes->post('/users/add-user','UserController::addUser');
$routes->put('/users/edit-user/(:num)','UserController::editUser/$1');
$routes->delete('/users/delete-user/(:num)','UserController::destroy/$1');
// $routes->resource('/users','UserController');
