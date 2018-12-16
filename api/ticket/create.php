<?php

$status = isset($_POST['user_email']) ? (isset($_POST['user_name']) ? ( isset($_POST['user_message']) ? TRUE : FALSE ) : FALSE ) : FALSE;
if ($status) {
    $user_email = $_POST['user_email'];
    $user_name = $_POST['user_name'];
    $user_message = $_POST['user_message'];
    require_once '../config/database.php';
    $db = new Database();
    $data['ticket_uid'] = uniqid('rdl');
    $data['user_email'] = $user_email;
    $data['user_name'] = $user_name;
    //$db->insert('tickets_meta', $data);
    $db->from('tickets_meta');
    $db->select('id');
    $db->select('user_name');
    $db->where('id', '3');
    $db->where('user_email', 'ashwin@radelcorp.in');
    $result = $db->get();
    echo $result[0]['user_name'];
} else {
    echo 'Missing arguments.';
}
?>
