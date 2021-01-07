<?php
class Model {
    private $_driver;
    private $_DBConn;
    protected $table = '';
    protected $columns = array();
    private $_query;

    protected function __construct() {
        $this->_driver = DBDriver::getInstance();
        $this->_DBConn = $this->_driver->getDBConn();
    }

    public function get($columns = array(), $where = [], $limit = 30) {
        if (empty($columns))
            $columns = $this->columns;

        $where = implode(' ', $where);
        $columns = implode(', ', $columns);

        if ($where) {
            $this->_query = "SELECT $columns FROM $this->table WHERE $where LIMIT $limit;";
        } else {
            $this->_query = "SELECT $columns FROM $this->table LIMIT $limit;";
        }

        return $this->_DBConn->query($this->_query)->fetchAll(PDO::FETCH_CLASS, 'stdClass');
    }
}
