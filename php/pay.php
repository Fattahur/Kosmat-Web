<?php
include "koneksi.php";
$id = $_POST['ktp'] ;

$foto = $_FILES['image']['name'];
$file_tmp = $_FILES['image']['tmp_name'];
move_uploaded_file($file_tmp, '../img/'.$foto);
mysqli_query($connection,"UPDATE akun SET foto_profil = '$foto' WHERE akun.nik = '$id'")
or die("SQL ERROR ".mysqli_error($connection));
?>
