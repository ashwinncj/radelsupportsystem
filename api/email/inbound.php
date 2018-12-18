<?php
isset($_POST['sender']) ? TRUE : exit('No POST Set !');
//$params['user_email'] = 'ash@test';
//$params['user_name'] = 'Ash';
//$params['user_message'] = 'Message';
$params['user_email'] = $_POST['sender'];
$params['user_name'] = $_POST['from'];
$params['user_message'] = $_POST['stripped-text'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://radel.space/api/ticket/create.php");
//curl_setopt($ch, CURLOPT_URL, "localhost/radelsupportsystem/api/ticket/create.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close($ch);
?>
