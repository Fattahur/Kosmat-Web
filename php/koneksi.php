<?php
error_reporting(0);
session_start();
$host = "localhost";
$username = "root";
$password = "";
$databasename = "kos";
$connection = mysqli_connect($host,$username,$password,$databasename) ;

if(!$connection){
    die("koneksi Gagal : " . mysqli_connect_error());
}else{
    echo "Koneksi Berhasil";
}
?>