<?php
class DBDriver {
    public static $DBConn;
    public static $dsn;
    public static $username;
    public static $pass;

    public static function initialize() {
        if (self::$DBConn === null) {
            self::$DBConn = new PDO(self::$dsn, self::$username, self::$pass, array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ));
        }
    }
}
