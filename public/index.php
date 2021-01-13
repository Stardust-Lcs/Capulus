<?php
define('__ROOT__', dirname(dirname(__FILE__)) . '/');           // Mendefinisikan folder root project
//=====================================================//
//                        PREPARE                      //
//=====================================================//
require_once __ROOT__ . 'config.php';                           // Load file-file yang diperlukan
require_once __ROOT__ . 'routes.php';
require_once __ROOT__ . 'engine/Loader.php';
require_once __ROOT__ . 'engine/Helper.php';
require_once __ROOT__ . 'engine/DBDriver.php';
require_once __ROOT__ . 'engine/Model.php';
require_once __ROOT__ . 'engine/View.php';
require_once __ROOT__ . 'engine/Session.php';
require_once __ROOT__ . 'engine/Response.php';

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
$request_method = $_SERVER['REQUEST_METHOD'];
$request_uri = $request_method . ' ' . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Ambil uri permintaan dari user, contoh: "/about"

// lihat https://www.php.net/manual/en/function.explode
// buat penjelasan tentang fungsi explode()
if ($request_uri === 'GET /') {                                 // jika uri sama dengan "/"
    $route_param = $routes[$config->default_route];                   // maka, ambil rute default dari config
} else if (isset($routes[$request_uri])) {                      // jika uri ada di routes.php
    $route_param = $routes[$request_uri];                             // maka, ambil rutenya
} else {                                                        // jika tidak ada
    Response::Error404();                                       // maka, tampilkan 404 
    exit(1);                                                     // dan keluar dari program
}

if (is_string($route_param)) {
    $route = explode('/', $route_param);
} else if (is_array($route_param)) {
    $route = explode('/', $route_param['path']);
} else {
    Response::Error(500, 'Route misconfiguration: ' . var_export($route_param, true));
    exit(1);
}

if (!$route) exit(1);

$page = $route[0];                                              // contoh string dari routes.php
if (count($route) < 2) {                                        // "Home/index", artinya controller Home terus execute fungsi index(), lihat di routes.php biar lebih jelas
    $function = 'index';                                        // disini di cek kalau misal di routes nya ga ada "index" nya alias cuma "Home"
} else {                                                        // hasil explode nya bakal cuma ada 1 elemen yaitu "Home"
    $function = $route[1];                                      // kalau ada "index"-nya nanti hasilnya ada 2 elemen, "Home" dan "index"
}

$modelFiles = scandir(__ROOT__ . 'models', SCANDIR_SORT_NONE);  // buat list nama file model di folder /models

if ($modelFiles === false) die;                                 // kalau gagal nge-list mending mati aja.

for ($i = 2; $i < count($modelFiles); $i++) {                   // iterasi listnya mulai dari index 2, karena index 0 dan 1 itu cuma '.' dan '..' alias bukan nama file.
    require_once __ROOT__ . 'models/' . $modelFiles[$i];        // load it up!
}

// karena nama controller dan fungsi yang mau dipanggil udah didapat
// maka, tinggal di load/require sekali aja. 
require_once __ROOT__ . 'controllers/' . $page . '.php';

$session = new Session();                                       // start new session
$controller = new $page();                                      // PHP emang bisa manggil kelas dan fungsi 
$controller->$function();                                       // pake string nama di sebuah variable, coba aja sendiri pake php interactive, pake command "php -a"
