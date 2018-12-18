<?php

$status = isset($_POST['user_email']) ? (isset($_POST['user_name']) ? ( isset($_POST['user_message']) ? TRUE : FALSE ) : FALSE ) : FALSE;
if ($status) {
    $user_email = $_POST['user_email'];
    $user_name = $_POST['user_name'];
    $user_message = $_POST['user_message'];
    require_once '../config/database.php';
    $db = new Database();
    $meta['ticket_uid'] = uniqid('rdl');
    $details['ticket_uid'] = $meta['ticket_uid'];
    $meta['user_email'] = $user_email;
    $meta['user_name'] = $user_name;
    $details['details'] = $user_message;
    $details['time'] = time();
    $meta['time'] = $details['time'];
    $result = $db->insert('tickets_meta', $meta);
    $result ? $result = $db->insert('tickets_details', $details) : FALSE;
    if ($result) {
        $msg['success'] = TRUE;
        $msg['ticket_uid'] = $meta['ticket_uid'];
        $data = json_encode($msg);
        echo $data;
    } else {
        $msg['success'] = FALSE;
        $msg['error'] = 'E102 - Database Configuration mismatch.';
        $data = json_encode($msg);
        echo $data;
    }
} else {
    $msg['success'] = FALSE;
    $msg['error'] = 'E101 - Missing Arguments';
    $data = json_encode($msg);
    echo $data;
}
?>
