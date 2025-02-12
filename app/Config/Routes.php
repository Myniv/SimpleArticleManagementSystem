<?php

use App\Controllers\ArticleController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->addRedirect('/home', '/');

$routes->group('article', function ($routes) {
    $routes->get('/', [ArticleController::class, 'index']);
    $routes->get('detail/(:segment)', [ArticleController::class, 'detail']);
    $routes->match(['get', 'post'], 'create', [ArticleController::class, 'create']);
    $routes->match(['get', 'put'], 'update/(:segment)', [ArticleController::class, 'update']);
    $routes->delete('delete/(:num)', [ArticleController::class, 'delete/$1']);
});

// $routes->set404Override(static function () {
//     return view("errors/custom_error_404");
// });
