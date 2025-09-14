<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');



$routes->get('/login', 'AuthController::loginForm');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');


$routes->get('/tokens', 'TokenController::index', ['filter' => 'auth:user']);
$routes->get('/token/admin', 'TokenController::admin', ['filter' => 'auth:admin']);



// Hello (demo):
// $routes->get('/hello', 'HelloController::index');

// $routes->get('/demo', function() {
//     return view('hello');
// });


// $routes->get('/tokens', function() {
//     return view('tokens');   // loading Ajax view
// });
$routes->post('/token/create', 'TokenController::create');
$routes->get('/token/me', 'TokenController::me');
$routes->get('/token/getList', 'TokenController::getList');


// $routes->get('/token/admin', 'TokenController::admin');
$routes->post('/token/update-status', 'TokenController::updateStatus');




