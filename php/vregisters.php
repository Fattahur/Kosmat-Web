<?php
require "koneksi.php";
$namareg = $_POST['nmalngkp'];
$alamatreg = $_POST['alamat'];
$telpreg = $_POST['telp'];
$nikreg = $_POST['nik'];
$usernamereg = $_POST['username'];
$passwordreg = $_POST['regvalpass'];

$sql2 = "INSERT INTO akun (nama, alamat, no_whatsapp, nik, username, password, privilege) VALUES ('$namareg', '$alamatreg', '$telpreg', '$nikreg', '$usernamereg', '$passwordreg','1')"; 


if(mysqli_query($connection,$sql2)){
    echo '<script language = "javascript">
    alert ("Silahkan Login"); document.location="login.html"; </script>';
    //header('Location: login.html');
}else{
    echo "Pendaftaran Gagal : " . mysqli_error($connection);
}
?>