<?php
require "koneksi.php";
$usernamereg = $_POST['usernamereg'];
$passwordreg = $_POST['passwordreg'];
$emailreg = $_POST['emailreg'];

$sql2 = "INSERT INTO akun (username, password, email) VALUES ('$usernamereg', '$passwordreg', '$emailreg')"; 


if(mysqli_query($connection,$sql2)){
    echo '<script language = "javascript">
    alert ("Silahkan Login"); document.location="login.html"; </script>';
    //header('Location: login.html');
}else{
    echo "Pendaftaran Gagal : " . mysqli_error($connection);
}
?>
