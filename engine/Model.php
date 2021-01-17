<?php
class Model {
    protected $table = '';
    protected $displayColumns = array();
    protected $PDOstatement;
    protected $primaryKey = 'id';
    private $_query;

    public function __construct() {
    }

    public function query($query) {
        $this->_query = $query;
        $this->PDOstatement = DBDriver::$DBConn->prepare($this->_query);
        return $this;
    }

    public function execute($fetch = false, $class = null, $inputParameters = null) {
        if ($class === null) $class = get_class($this);
        if ($this->PDOstatement) {
            $exec = $this->PDOstatement->execute($inputParameters);
            if ($exec) {
                if ($fetch) {
                    return $this->PDOstatement->fetchAll(PDO::FETCH_CLASS, $class);
                }
            }

            return $exec;
        }
    }

    public function get($columns = array(), $where = '', $limit = 30) {
        if (empty($columns))
            $columns = $this->displayColumns;
        if (is_array($where))
            $where = implode(' ', $where);

        $columns = implode(', ', $columns);

        if ($where) {
            $this->_query = "SELECT $columns FROM $this->table WHERE $where LIMIT $limit;";
        } else {
            $this->_query = "SELECT $columns FROM $this->table LIMIT $limit;";
        }

        $sth = DBDriver::$DBConn->prepare($this->_query);
        if ($sth->execute()) {
            return $sth->fetchAll(PDO::FETCH_CLASS, get_class($this));
        }

        return false;
    }

    public function insert(array $data = array()) {
        if (empty($data)) {
            $data = $this->retrieveData();
        }

        $this->_query = "INSERT INTO $this->table(%s) VALUES (%s);";
        $columnsString = '';
        $valuesString = '';
        $queryData = [];
        foreach ($data as $key => $value) {
            $columnsString .= "$key, ";
            $valuesString .= '?, ';
            array_push($queryData, $value);
        }

        $this->_query = sprintf($this->_query, trim($columnsString, ', '), trim($valuesString, ', '));
        // readable_var_dump($data);
        $sth = DBDriver::$DBConn->prepare($this->_query);
        return $sth->execute($queryData);
    }

    public function update($where = '', $data = array()) {
        if (empty($data)) {
            $data = $this->retrieveData();
        }

        if (is_array($where))
            $where = implode(' ', $where);

        $primaryKey = $this->primaryKey;
        if (empty($where))
            $where = $this->primaryKey . " = '" . $this->$primaryKey . "'";

        $this->_query = "UPDATE $this->table SET %s WHERE $where;";

        $columns = '';
        $queryData = [];
        $data['updated_at'] = date("Y-m-d H:i:s");
        foreach ($data as $key => $value) {
            if ($value) {
                $columns .= "$key = ?, ";
                array_push($queryData, $value);
            }
        }

        $this->_query = sprintf($this->_query, trim($columns, ', '), $where);
        // readable_var_dump($this->_query);
        $sth = DBDriver::$DBConn->prepare($this->_query);
        return $sth->execute($queryData);
    }

    public function delete($where = '', $soft = false) {
        if (is_array($where))
            $where = implode(' ', $where);

        $primaryKey = $this->primaryKey;
        if (empty($where))
            $where = $this->primaryKey . " = '" . $this->$primaryKey . "'";

        if ($soft) {
            return $this->update($where, ['deleted_at' => date("Y-m-d H:i:s")]);
        }

        $this->_query = "DELETE FROM $this->table WHERE $where";
        $sth = DBDriver::$DBConn->prepare($this->_query);
        return $sth->execute();
    }

    public function getLastQuery() {
        return $this->_query;
    }

    private function retrieveData() {
        $data = [];
        $refClass = new ReflectionClass($this);
        $childReflectionProps = $refClass->getProperties(ReflectionProperty::IS_PUBLIC);

        foreach ($childReflectionProps as $reflectionProp) {
            $data[$reflectionProp->getName()] = $reflectionProp->getValue($this);
        }

        if (($keys = array_keys($data, '')) !== false) {
            foreach ($keys as $key) {
                unset($data[$key]);
            }
        }

        return $data;
    }
}
