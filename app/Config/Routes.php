<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
const ROUTES_PATH = APPPATH . "Config/RoutingApp/";


if(file_exists(ROUTES_PATH."auth.php")){
    require_once ROUTES_PATH."auth.php";
}

if(file_exists(ROUTES_PATH."admin.php")){
    require_once ROUTES_PATH."admin.php";
}