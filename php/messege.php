<?php
include 'koneksi.php';

$id = $_POST['id'];
$keluhan = $_POST['keluhan'];
$foto = $_FILES['image']['name'];
$file_tmp = $_FILES['image']['tmp_name'];
move_uploaded_file($file_tmp, '../img/'.$foto);
mysqli_query($connection,"INSERT INTO `keluhan` (`id_kepemilikan`, `tanggal`, `keterangan`, `foto`) VALUES ('$id', NOW(), '$keluhan', '$foto\r\n');")
or die("SQL ERROR ".mysqli_error($connection));

if (mysqli_affected_rows($connection) > 0) {
    echo '<script language = "javascript">
        alert ("Keluhan Anda Telah Dikirim!"); </script>';
    echo '<script>window.location = "../message.php";</script>';
} else {
    echo '<script language = "javascript">
        alert ("Data Gagal Diubah"); document.location="../profil.php"; </script>';
}
?>