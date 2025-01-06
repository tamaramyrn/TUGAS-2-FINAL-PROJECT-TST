<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
 
$routes->get('/', 'DashboardController::index'); 
$routes->get('/signup', 'SignupController::index');
$routes->match(['GET', 'POST'], 'signup/store', 'SignupController::store');
$routes->match(['GET', 'POST'], 'signin/auth', 'SigninController::loginAuth');
$routes->get('/signin', 'SigninController::index');
$routes->get('/logout', 'SigninController::logout');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'authGuard']);
$routes->get('/plans', 'PlanController::index', ['filter' => 'authGuard']);
$routes->get('/plans/create', 'PlanController::create', ['filter' => 'authGuard']);
$routes->post('/plans/store', 'PlanController::store', ['filter' => 'authGuard']);
$routes->get('/plans/edit/(:num)', 'PlanController::edit/$1', ['filter' => 'authGuard']);
$routes->post('/plans/update/(:num)', 'PlanController::update/$1', ['filter' => 'authGuard']);
$routes->get('/plans/delete/(:num)', 'PlanController::delete/$1', ['filter' => 'authGuard']);
$routes->post('/plans/add-user/(:num)', 'PlanController::addUserToPlan/$1', ['filter' => 'authGuard']);
$routes->get('/plans/remove-user/(:num)/(:any)', 'PlanController::removeUserFromPlan/$1/$2');