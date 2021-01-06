<?php
// Mendefinisikan folder root project
define('__ROOT__', dirname(dirname(__FILE__)) . '/');
// Load file-file yang diperlukan
require_once __ROOT__ . 'config.php';
require_once __ROOT__ . 'routes.php';
require_once __ROOT__ . 'core/Loader.php';
require_once __ROOT__ . "core/View.php";
require_once __ROOT__ . "core/Response.php";

// Ambil uri permintaan dari user 
// contoh: "/about"
$request_uri = $_SERVER['REQUEST_URI'];

if ($request_uri === '/') {                                     // jika uri sama dengan "/"
    $route = explode('/', $routes[$config->default_route]);     // maka, ambil rute default dari config
} else if (isset($routes[$request_uri])) {                      // jika uri ada di routes.php
    $route = explode('/', $routes[$request_uri]);               // maka, ambil rutenya
} else {                                                        // jika tidak ada
    Response::Error404();                                       // maka, tampilkan 404 
    exit();                                                     // dan keluar dari program
}

$page = $route[0];
if (count($route) < 2) {
    $function = 'index';
} else {
    $function = $route[1];
}

require_once __ROOT__ . 'controller/' . $page . '.php';

$controller = new $page;
$controller->$function();
