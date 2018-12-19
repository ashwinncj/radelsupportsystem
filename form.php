<?php
if (isset($_POST['user_email'])) {
    $params['user_email'] = $_POST['user_email'];
    $params['user_name'] = $_POST['user_name'];
    $params['user_message'] = $_POST['user_message'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://radel.space/api/ticket/create.php");
    //curl_setopt($ch, CURLOPT_URL, "localhost/radelsupportsystem/api/ticket/create.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    curl_close($ch);
    print_r($server_output);
}
?>
<div>
    <form action="" method="POST">
        <label>Email : </label>
        <input type="email" name="user_email"><br>
        <label>Name : </label>
        <input type="text" name="user_name"><br>
        <label>Message : </label><br>
        <textarea name="user_message"></textarea><br>
        <input type="submit">
    </form>
</div>
