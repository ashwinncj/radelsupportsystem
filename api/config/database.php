<?php

class Database {

    public $var_select = '';
    public $var_from = '';
    public $var_where = '';

    public function __construct() {
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "radelsupportsystem";
        $this->db = new mysqli($host, $username, $password, $dbname);
    }

    public function insert($table = '', $data = '') {
        $args = $table == '' ? FALSE : ( $data == '' ? FALSE : TRUE);
        if ($args) {
            $table_keys = '';
            $table_values = '';
            foreach ($data as $key => $value) {
                $table_keys .= '`' . $key . '`, ';
                $table_values .= "'" . $value . "', ";
            }
            $keys = rtrim($table_keys, ', ');
            $values = rtrim($table_values, ', ');
            $query = 'INSERT INTO `' . $table . '` (' . $keys . ') VALUES (' . $values . ')';
            echo $query;
            $result = $this->db->query($query);
            return $result;
        }
    }

    public function select($data = '') {
        $args = ( $data == '' ? FALSE : TRUE);
        if ($args) {
            $this->var_select .= '`' . $data . '`, ';
        }
    }

    public function from($data = '') {
        $args = ( $data == '' ? FALSE : TRUE);
        if ($args) {
            $this->var_from = '`' . $data . '`';
        }
    }

    public function where($key = '', $value = '', $condition = 'AND') {
        $args = $key == '' ? FALSE : ( $value == '' ? FALSE : TRUE);
        if ($args) {
            $this->var_where .= "`" . $key . "` = '" . $value . "' " . $condition . ' ';
        }
    }

    public function get() {
        $var_select = rtrim($this->var_select, ', ');
        $var_where = rtrim($this->var_where, 'AND ');
        $var_where = rtrim($var_where, 'OR ');
        $query = 'SELECT ' . $var_select . ' FROM ' . $this->var_from . ' WHERE ' . $var_where;
//        echo $query;
        $result = $this->db->query($query);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $result ? $data : FALSE;
    }

}

?>
