<?php
class DBDriver {
    public static $DBConn;
    public static $dsn;
    public static $username;
    public static $pass;

    public static function getDBConn() {
        return self::$DBConn;
    }

    public static function initialize() {
        self::$DBConn = new PDO(self::$dsn, self::$username, self::$pass);
        self::$DBConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
