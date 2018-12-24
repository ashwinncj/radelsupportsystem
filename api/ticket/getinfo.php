<?php

$status = isset($_POST['ticketid']) ? TRUE : FALSE;
if ($status) {
    $ticketid = $_POST['ticketid'];
    require_once '../config/database.php';
    $db = new Database();
    $db->from('tickets_meta a');
    $db->join('tickets_details b', 'a.ticket_uid=b.ticket_uid');
    $db->where('a.ticket_uid', $ticketid);
    $db->order('b.time', 'DESC');
    $result = $db->get();
    (!$result) ? $result['error'] = 'Invalid Ticket ID' : '';
    echo json_encode($result);
} else {
    echo 'No input';
}