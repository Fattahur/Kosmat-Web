<?php
session_start();
$username = $_SESSION['username'];
$nomor = "SELECT no_whatsapp FROM akun WHERE username = '$username'";
$code = mt_rand(1000,9999);
$_SESSION['OTPcode'] = $code;
$curl = curl_init();

curl_setopt_array($curl, array(

CURLOPT_RETURNTRANSFER => true,CURLOPT_URL => 'https://whatsapp-api--hakimfrh.repl.co/send-message',
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'POST',
CURLOPT_POSTFIELDS => array('message' => "Kode OTP KosMat anda: ".$code.". Harap jangan bagikan pada siapapun",'number' => $nomor),
));
$response = curl_exec($curl);
if(stripos($response, 'true')){
    echo '<script language = "javascript">
    alert ("Kode OTP sukses dikirim");</script>';
}else{  
    echo '<script language = "javascript">
    alert ("Kode OTP gagal dikirim, pastikan nomor WA benar"); document.location="..Project/lupasemail.html"; </script>';
}
curl_close($curl);
//print $response;
?>