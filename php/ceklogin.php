<?php
require "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM akun WHERE username = '".$username."' AND password = '".$password."' ";
$result = mysqli_query($connection,$sql);


if(mysqli_num_rows($result)== 0){
    echo '<script language = "javascript">
    alert ("Username Dan Password Anda Salah! Silahkan Coba Kembali"); document.location="login.html"; </script>';
}else{
    echo '<script language = "javascript">
    alert ("Anda Berhasil Login"); document.location="dashboard.html"; </script>';
}
?>
