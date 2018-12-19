<?php

class Mailer {

    public function mailgun($from, $to, $subject, $text) {
        //$url = 'localhost/radelsupportsystem-mailer/mailer.php';
        $url = 'http://radel.space/radelsupportsystem-mailer/mailer.php';
        $params = ['from' => $from, 'to' => $to, 'subject' => $subject, 'html' => $text, 'h:Reply-To' => $from];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        $result = curl_exec($ch);
        print_r($result);
        curl_close($ch);
    }

}
