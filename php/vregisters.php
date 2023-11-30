<?php
require "koneksi.php";

//if (isset($_POST['simpan'])) {
    if(true){
    $nikreg = $_POST['nik'];
    $namareg = $_POST['fullname'];
    $telpreg = $_POST['telepon'];
    $telpwalireg = $_POST['teleponwali'];
    $usernamereg = $_POST['username'];
    $passwordreg = $_POST['password'];
    $tgllahir = $_POST['date'];
    $gender = $_POST['gender'];

    $cek_user = mysqli_query($connection, "SELECT * FROM akun WHERE nik = '$nikreg'");

    if (mysqli_num_rows($cek_user) === 1 ) {
        $sqlupdate = mysqli_query($connection, "UPDATE akun
                         SET nik = '$nikreg',
                             nama = '$namareg',
                             no_whatsapp = '$telpreg',
                             no_whatsapp_wali = '$telpwalireg',
                             tgl_lahir = '$tgllahir',
                             gender = '$gender',
                             username = '$usernamereg',
                             password = '$passwordreg',
                             image = 'favicon-32x32.png',
                             privilege = '1'
                         WHERE nik = '$nikreg'");

                         if (mysqli_affected_rows($connection) > 0) {
                            echo '<script>alert("User Berhasil Ditambahkan");</script>';
                            echo '<script>window.location = "../login.html";</script>';
                         }else{
                            echo '<script>alert("User Gagal Di tambahkan");</script>';
                            echo '<script>window.location = "cba.php";</script>';
                         }

    }else{
        echo '<script>alert("Nik belum terdaftar");</script>';
        echo '<script>window.location = "../cba.html";</script>';
    }
}
?>
