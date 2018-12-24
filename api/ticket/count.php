<?php

$status = isset($_POST['type']) ? TRUE : FALSE;
if ($status) {
    $type = $_POST['type'] == 'all' ? '' : $_POST['type'];
    require_once '../config/database.php';
    $db = new Database();
    $db->from('tickets_meta');
    $db->where('status', $type);
    $result = $db->get('count');
    $data['count'] = $result;
    echo json_encode($data);
} else {
    echo 'No input';
}