<?php

isset($_POST['sender']) ? TRUE : exit('No POST Set !');
$params['updated_by'] = 'user';
$ticketid = $_POST['recipient'];
$ticketid = explode('@', $ticketid);
$params['ticketid'] = $ticketid[0];
$params['message'] = $_POST['stripped-text'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://radel.space/radelsupportsystem/api/ticket/addinfo.php");
//curl_setopt($ch, CURLOPT_URL, "localhost/radelsupportsystem/api/ticket/addinfo.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close($ch);
?>
