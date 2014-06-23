<?php
if (isset($_POST['name']) && $_POST['name'] != "" && isset($_POST['email']) && $_POST['email'] != "" && isset($_POST['message']) && $_POST['message'] != "") {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, 'api:key-7ddiaj-rzz30blojxi75stpziw6gk6p3');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v2/metix.io/messages');
        curl_setopt($ch, CURLOPT_POSTFIELDS, array(
            'from' => $_POST['email'],
            'to' => 'Metix <noe@metix.io>',
            'subject' => 'Contact from '.$_POST['name'],
            'text' => $_POST['message']
            )
        );
        $result = curl_exec($ch);
        curl_close($ch);
} else {
    header('HTTP/1.1 400 BAD REQUEST');
}
?>
