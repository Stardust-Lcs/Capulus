<?php
$config = (object) [
    'environment' => 'DEVELOPMENT',
    'base_url' => 'http://localhost:8000/',
    'default_route' => 'GET /home',

    //=====================================================//
    //                        DATABASE                     //
    //=====================================================//
    'db_driver' => 'mysql', // Lihat di PDO::getAvailableDrivers();
    'db_name' => 'capulusdb',
    'db_host' => 'localhost',
    'db_username' => 'root',
    'db_pass' => '',
];
