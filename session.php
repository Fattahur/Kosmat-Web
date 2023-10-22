<?php
session_start();
if(isset($_POST['username'])) {
    $nama = $_POST['nama'];
    $_SESSION['nama'] = $nama;
    echo "Data nama berhasil disimpan ke sesi.";
} else {
    echo "Mohon masukkan data nama terlebih dahulu.";
}
?>
