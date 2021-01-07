<?php
class DBDriver {
    private $_DBConn;
    private static $_instance = NULL;
    public static $dsn;
    public static $username;
    public static $pass;

    private function __construct($dsn, $username, $pass) {
        $this->_DBConn = new PDO($dsn, $username, $pass);
    }

    public function getDBConn() {
        return $this->_DBConn;
    }

    public static function initialize() {
        self::$_instance = new DBDriver(self::$dsn, self::$username, self::$pass);
    }

    public static function getInstance(): \DBDriver {
        if (self::$_instance === NULL) {
            self::initialize();
        }

        return self::$_instance;
    }
}
