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
    $db->from('tickets_meta b');
    $db->select('b.id');
    $db->select('user_name');
    $db->join('tickets_details a', 'b.ticket_uid=a.ticket_uid');
    $db->where('user_email', 'ashwin@radelcorp.in');
    //$db->limit(1);
    $db->conditions('LIMIT 10');
    print_r($result = $db->get());
} else {
    echo 'Missing arguments.';
}
?>
