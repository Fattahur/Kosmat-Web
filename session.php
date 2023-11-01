<?php
session_start();
if (isset($_POST['username'])) {
    if (isset($_POST['usrnme'])) {
        $nama = $_POST['username'];
        $_SESSION['username'] = $nama;
        echo "Data nama berhasil disimpan ke sesi.";
    } else {
        echo "Checkbox tidak dicentang. Data tidak disimpan.";
    }
} else {
    echo "Mohon masukkan data nama terlebih dahulu.";
}
?>
