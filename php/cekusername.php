<?php
include "koneksi.php";
session_start();
$username = $_POST['username'];
$_SESSION['username'] = $username;

$sql = "SELECT * FROM akun WHERE username = '".$username."' ";
$result = mysqli_query($connection,$sql);

if(mysqli_num_rows($result)== 0){   
    echo '<script language = "javascript">
    alert ("Username yang dimasukkan salah"); document.location="../lupasemail.html"; </script>';
}else{
    echo '<script language = "javascript">
    alert ("Username anda benar"); document.location="../lupasverifikasi.html"; </script>';
}
?>