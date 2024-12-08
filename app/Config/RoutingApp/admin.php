<?php
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group("/admin",["filter"=>"authorization:ADMIN_CREATE"],function ($routes) {

    $routes->group("", ["namespace" => "App\Controllers\Admin"],function ($routes) {
        $routes->get("","Home::index");

    });
});

$routes->get("/users","Admin\Home::getData");
