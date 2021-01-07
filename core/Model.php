<?php
class Model {
    private $_driver;
    private $_DBConn;
    protected $table;

    protected function __construct() {
        $this->_driver = DBDriver::getInstance();
        $this->_DBConn = $this->_driver->getDBConn();
    }

    protected function get() {
        $this->_DBConn->query('');
    }
}
