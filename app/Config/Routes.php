<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index', ['filter' => 'auth']);

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');
$routes->resource('api', ['controller' => 'apiController']);

$routes->group('produk', ['filter' => 'auth'], function ($routes) { 
    $routes->get('', 'ProductController::index');
  
});

// Route kategori produk diluar group 'produk', jadi URL-nya langsung /ProductCategory
$routes->get('ProductCategory', 'ProductCategoryController::index');
$routes->post('ProductCategory', 'ProductCategoryController::create');
$routes->post('ProductCategory/edit/(:any)', 'ProductCategoryController::edit/$1');
$routes->get('ProductCategory/delete/(:any)', 'ProductCategoryController::delete/$1');


