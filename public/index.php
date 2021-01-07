<?php
define('__ROOT__', dirname(dirname(__FILE__)) . '/');           // Mendefinisikan folder root project
//=====================================================//
//                        PREPARE                      //
//=====================================================//
require_once __ROOT__ . 'config.php';                           // Load file-file yang diperlukan
require_once __ROOT__ . 'routes.php';
require_once __ROOT__ . 'core/Loader.php';
require_once __ROOT__ . 'core/Helper.php';
require_once __ROOT__ . 'core/DBDriver.php';
require_once __ROOT__ . 'core/Model.php';
require_once __ROOT__ . 'core/View.php';
require_once __ROOT__ . 'core/Response.php';

//=====================================================//
//                       DATABASE                      //
//=====================================================//
DBDriver::$dsn = $config->db_driver                             // Buat koneksi db dari config yang di config.php
    . ':dbname='
    . $config->db_name
    . ';host='
    . $config->db_host
    . ';charset=UTF8';
DBDriver::$username = $config->db_username;
DBDriver::$pass = $config->db_pass;
DBDriver::initialize();

//=====================================================//
//                         ROUTING                     //
//=====================================================//
$request_uri = $_SERVER['REQUEST_URI'];                         // Ambil uri permintaan dari user, contoh: "/about"

// lihat https://www.php.net/manual/en/function.explode
// buat penjelasan tentang fungsi explode()
if ($request_uri === '/') {                                     // jika uri sama dengan "/"
    $route = explode('/', $routes[$config->default_route]);     // maka, ambil rute default dari config
} else if (isset($routes[$request_uri])) {                      // jika uri ada di routes.php
    $route = explode('/', $routes[$request_uri]);               // maka, ambil rutenya
} else {                                                        // jika tidak ada
    Response::Error404();                                       // maka, tampilkan 404 
    exit();                                                     // dan keluar dari program
}

$page = $route[0];                                              // contoh string dari routes.php
if (count($route) < 2) {                                        // "Home/index", artinya controller Home terus execute fungsi index(), lihat di routes.php biar lebih jelas
    $function = 'index';                                        // disini di cek kalau misal di routes nya ga ada "index" nya alias cuma "Home"
} else {                                                        // hasil explode nya bakal cuma ada 1 elemen yaitu "Home"
    $function = $route[1];                                      // kalau ada "index"-nya nanti hasilnya ada 2 elemen, "Home" dan "index"
}

// karena nama controller dan fungsi yang mau dipanggil udah didapat
// maka, tinggal di load/require sekali aja. 
require_once __ROOT__ . 'controllers/' . $page . '.php';

$controller = new $page();                                        // PHP emang bisa manggil kelas dan fungsi 
$controller->$function();                                       // pake string nama di sebuah variable, coba aja sendiri pake php interactive, pake command "php -a"
