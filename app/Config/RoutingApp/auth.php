<?php
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get("/","Home::index");
$routes->get("/login","Auth\LoginController::form");
$routes->post("/login","Auth\LoginController::login");

$routes->get("logout", 'Auth\LogoutAuth::logout');

