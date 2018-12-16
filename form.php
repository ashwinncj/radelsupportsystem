<?php
// required headers
//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
?>
<html>
    <head>

    </head>
    <body>
        <div>
            <form action="api/ticket/create.php" method="POST">
                <label>Email : </label>
                <input type="email" name="user_email"><br>
                <label>Name : </label>
                <input type="text" name="user_name"><br>
                <label>Message : </label><br>
                <textarea name="user_message"></textarea><br>
                <input type="submit">
            </form>
        </div>
    </body>
</html>
