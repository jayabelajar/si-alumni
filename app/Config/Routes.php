<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::login');
$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::register');
$routes->get('logout', 'Auth::logout');

$routes->group('admin', ['filter' => ['auth', 'admin']], function($routes) {
    $routes->get('/', 'AdminDashboard::index');
    $routes->get('dashboard', 'AdminDashboard::index');
    
    // Alumni Management
    $routes->get('alumni', 'ManageAlumni::index');
    $routes->get('alumni/create', 'ManageAlumni::create');
    $routes->post('alumni/store', 'ManageAlumni::store');
    $routes->get('alumni/edit/(:num)', 'ManageAlumni::edit/$1');
    $routes->post('alumni/update/(:num)', 'ManageAlumni::update/$1');
    $routes->get('alumni/delete/(:num)', 'ManageAlumni::delete/$1');

    // Job Management
    $routes->get('jobs', 'Admin\ManageJobs::index');
    $routes->get('jobs/create', 'Admin\ManageJobs::create');
    $routes->post('jobs/store', 'Admin\ManageJobs::store');
    $routes->get('jobs/edit/(:num)', 'Admin\ManageJobs::edit/$1');
    $routes->post('jobs/update/(:num)', 'Admin\ManageJobs::update/$1');
    $routes->get('jobs/delete/(:num)', 'Admin\ManageJobs::delete/$1');

    // Admin Profile
    $routes->get('profile', 'Admin\Profile::index');
    $routes->post('profile/update', 'Admin\Profile::update');
    $routes->post('profile/change-password', 'Admin\Profile::changePassword');
});

$routes->group('alumni', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'AlumniDashboard::index');
    $routes->get('dashboard', 'AlumniDashboard::index');
    $routes->get('profile', 'Profile::index');
    $routes->post('profile/update', 'Profile::update');
});

// Job Board Routes
$routes->group('jobs', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'JobController::index');
    $routes->get('(:num)', 'JobController::show/$1');
});
