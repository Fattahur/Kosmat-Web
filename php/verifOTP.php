<?php
session_start();
$OTPcode = $_SESSION['OTPcode'];
$OTPinput;
if(isset($_POST['OTP1'], $_POST['OTP2'], $_POST['OTP3'], $_POST['OTP4'])) {
    $otp1 = $_POST['OTP1'];
    $otp2 = $_POST['OTP2'];
    $otp3 = $_POST['OTP3'];
    $otp4 = $_POST['OTP4'];
    $OTPinput = $otp1 . $otp2 . $otp3 . $otp4;
    echo "input =============== OTP: $OTPinput<br>";
    if($OTPcode == $OTPinput){
        header('Location: ../lupasreset.html');
        unset($_SESSION['OTPcode']);
    }else{
        echo '<script language = "javascript">
            alert ("Kode OTP salah!!, coba kirim ulang"); document.location="../lupasverifikasi.html"; </script>';
    }
}


echo $OTPcode;
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
?>