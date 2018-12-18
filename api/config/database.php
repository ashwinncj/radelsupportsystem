<?php

class Database {

    public $var_select = '';
    public $var_from = '';
    public $var_where = '';
    public $var_on = '';
    public $var_limit = '';
    public $var_conditions = '';

    public function __construct() {
        $host = "localhost";
        $username = "rssadmin";
        $password = "kYYDKgQ7ijWoc3Qz@*14";
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
            //echo $query;
            $result = $this->db->query($query);
            return $result;
        }
    }

    public function select($data = '') {
        $args = ( $data == '' ? FALSE : TRUE);
        if ($args) {
            $this->var_select .= $data . ', ';
        }
    }

    public function from($data = '') {
        $args = ( $data == '' ? FALSE : TRUE);
        if ($args) {
            $this->var_from = $data;
        }
    }

    public function where($key = '', $value = '', $condition = 'AND') {
        $args = $key == '' ? FALSE : ( $value == '' ? FALSE : TRUE);
        if ($args) {
            $this->var_where .= $key . " = '" . $value . "' " . $condition . ' ';
        }
    }

    public function join($table = '', $on = '', $join = 'JOIN') {
        $args = $table == '' ? FALSE : ( $on == '' ? FALSE : TRUE);
        if ($args) {
            $this->var_on.=' ' . $join . ' ' . $table . ' ON ' . $on . ' ';
        }
    }

    public function limit($limit = '') {
        $args = ( $limit == '' ? FALSE : TRUE);
        if ($args) {
            $this->var_limit.=' LIMIT ' . $limit . ' ';
        }
    }

    public function conditions($conditions = '') {
        $args = ( $conditions == '' ? FALSE : TRUE);
        if ($args) {
            $this->var_conditions.=' ' . $conditions . ' ';
        }
    }

    public function get() {
        $var_select = rtrim($this->var_select, ', ');
        $var_select = $var_select == '' ? '*' : $var_select;
        $var_where = rtrim($this->var_where, 'AND ');
        $var_where = rtrim($var_where, 'OR ');
        $var_where = $var_where == '' ? 1 : $var_where;
        $var_on = $this->var_on == '' ? '' : $this->var_on;
        $var_limit = $this->var_limit == '' ? '' : $this->var_limit;
        $var_conditions = $this->var_conditions == '' ? '' : $this->var_conditions;
        $query = 'SELECT ' . $var_select . ' FROM ' . $this->var_from . $var_on . ' WHERE ' . $var_where . $var_limit . $var_conditions;
        //echo $query;
        $result = $this->db->query($query);
        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }
        }
        return $result ? isset($data) ? $data : FALSE : FALSE;
    }

}

?>
