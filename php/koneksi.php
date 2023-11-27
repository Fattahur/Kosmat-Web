<?php
error_reporting(0);
$host = "localhost";
$username = "root";
$password = "";
$databasename = "kosan";
$connection = mysqli_connect($host,$username,$password,$databasename) ;
if (mysqli_connect_errno()) {
    echo "koneksi gagal" .mysqli_connect_error();
}
else {
    echo "Koneksi Berhasil";
}
?>