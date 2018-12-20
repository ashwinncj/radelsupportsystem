<?php

$status = isset($_POST['type']) ? TRUE : FALSE;
if ($status) {
    $limit = isset($_POST['limit']) ? $_POST['limit'] : '10';
    $type = $_POST['type'] == 'all' ? '' : $_POST['type'];
    require_once '../config/database.php';
    $db = new Database();
    $db->from('tickets_meta');
    $db->where('status', $type);
    $db->limit($limit);
    $db->order('time', 'DESC');
    $result = $db->get();
    echo json_encode($result);
} else {
    echo 'No input';
}