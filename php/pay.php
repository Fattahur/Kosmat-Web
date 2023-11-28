<?php
include 'koneksi.php';

$id = $_POST['idtagihan'];
$foto = $_FILES['image']['name'];
$file_tmp = $_FILES['image']['tmp_name'];
move_uploaded_file($file_tmp, '../img/'.$foto);
mysqli_query($connection,"INSERT INTO `validasi` (`id_tagihan`, `jumlah_bayar`, `tanggal_bayar`, `bukti_pembayaran`) VALUES ('$id', '400000', NOW(), '$foto');")
or die("SQL ERROR ".mysqli_error($connection));

if (mysqli_affected_rows($connection) > 0) {
    echo '<script language = "javascript">
        alert ("Data Anda Sedang diverivikasi Harap Menunggu!"); </script>';
    echo '<script>window.location = "../payment.php";</script>';
} else {
    echo '<script language = "javascript">
        alert ("Data Gagal Diubah"); document.location="../payment.php"; </script>';
}
?>