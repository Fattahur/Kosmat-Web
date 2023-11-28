<?php
session_start();
$username = $_SESSION['username'];
$nomor = "SELECT no_whatsapp FROM akun WHERE username = '$username'";
$curl = curl_init();

curl_setopt_array($curl, array(

CURLOPT_RETURNTRANSFER => true,CURLOPT_URL => 'https://whatsapp-api--hakimfrh.repl.co/send-message',
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'POST',
CURLOPT_POSTFIELDS => array('message' => 'anjayy connect bro','number' => '$nomor'),
));

$response = curl_exec($curl);

curl_close($curl);
print $response;
?>