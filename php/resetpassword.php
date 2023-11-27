<?php
include "koneksi.php";
session_start();
$username = $_SESSION['username'];

$password_baru = $_POST['password_baru'];
$konfirmasi_password = $_POST['konfirmasi_password'];

// Memeriksa apakah password baru dan konfirmasi password sama
if ($password_baru === $konfirmasi_password) {
    // Pilih baris dengan username yang sesuai
    $sql = "SELECT * FROM akun WHERE username = '".$username."'";
    $result = mysqli_query($connection, $sql);

    // Memeriksa apakah username ditemukan di dalam database
    if(mysqli_num_rows($result) > 0) {

        // Update password baru ke dalam database
        $sql_update = "UPDATE akun SET password = '$password_baru' WHERE username = '$username'";
        if(mysqli_query($connection, $sql_update)){
            echo '<script language = "javascript">
            alert ("Password berhasil diubah"); document.location="../login.html"; </script>';
        } else {
            echo '<script language = "javascript">
            alert ("Password gagal diubah"); document.location="../lupasreset.html"; </script>';
        }
    } else {
        echo '<script language = "javascript">
        alert ("Username tidak ditemukan"); document.location="../lupasreset.html"; </script>';
    }
} else {
    echo '<script language = "javascript">
    alert ("Password baru dan konfirmasi password tidak sama"); document.location="../lupasreset.html"; </script>';
}
?>
