<?php

$status = isset($_POST['ticketid']) ? isset($_POST['message']) ? TRUE : FALSE : FALSE;
if ($status) {
    $ticketid = $_POST['ticketid'];
    $message = $_POST['message'];
    require_once '../config/database.php';
    $db = new Database();
    $data['ticket_uid'] = $ticketid;
    $data['time'] = time();
    $data['details'] = $message;
    $data['updated_by'] = isset($_POST['updated_by']) ? $_POST['updated_by'] : 'admin';
    $result = $db->insert('tickets_details',$data);
    echo json_encode($result);
} else {
    echo 'No input';
}