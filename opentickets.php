<?php
$params['type'] = 'open';
$ch = curl_init();
//curl_setopt($ch, CURLOPT_URL, "http://radel.space/radelsupportsystem/api/ticket/get.php");
curl_setopt($ch, CURLOPT_URL, "localhost/radelsupportsystem/api/ticket/get.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$tickets_list = curl_exec($ch);
$tickets_list = json_decode($tickets_list, TRUE);
curl_close($ch);
?>
<style>
    .open-tickets-table .heading{
        font-weight: bold;
        background-color: gray;
        padding: 10px;
        color: whitesmoke;
    }
    .open-tickets-table .tickets:nth-child(even){
        color: black;
        padding: 5px;
        background-color: whitesmoke;
    }
    .open-tickets-table .tickets:nth-child(odd){
        color: gray;
        padding: 5px;
        background-color: ghostwhite;
    }
</style>
<div class="col-md-9 row open-tickets-table">
    <div class="col-md-12 heading">
        <div class="col-md-4">Ticket ID</div>
        <div class="col-md-4">Name</div>
        <div class="col-md-4">Message</div>
    </div>
    <?php
    foreach ($tickets_list as $ticket) {
        ?>
        <div class="col-md-12 tickets">
            <div class="col-md-4"><?php echo $ticket['ticket_uid']; ?></div>
            <div class="col-md-4"><?php echo $ticket['user_name']; ?><br><?php echo $ticket['user_email']; ?></div>
            <div class="col-md-4"></div>
        </div>
        <?php
    }
    ?>
    <!--    <div class="col-md-12 tickets">
            <div class="col-md-4">rdl5c189716cf0e3</div>
            <div class="col-md-4">Ashwin Kumar C<br>ashwinncj@gmail.com</div>
            <div class="col-md-4">Message</div>
        </div>-->
</div>
