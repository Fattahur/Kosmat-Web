<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['login'] = $_POST['login'];
    
    $sql = "SELECT * FROM akun WHERE username = '".$username."' AND password = '".$password."' ";
    $sql2 = "SELECT akun.*, kepemilikan.id_kamar, kepemilikan.id_kepemilikan
    FROM akun
    JOIN kepemilikan ON akun.nik = kepemilikan.nik
    WHERE akun.username = '$username' AND akun.password = '$password';";
    $result = mysqli_query($connection,$sql2);
    
    if (mysqli_num_rows($result) === 1) {
        $data = mysqli_fetch_assoc($result);
        if (password_verify($password,$data['password'])) {
            header("location:../dashboard.html");
            exit();
        }else {
            $_SESSION['nik'] = $data['nik'];
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['alamat'] = $data['alamat'];
            $_SESSION['no_whatsapp'] = $data['no_whatsapp'];
            $_SESSION['no_whatsapp_wali'] = $data['no_whatsapp_wali'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['image'] = $data['image'];
            $_SESSION['tgl_lahir'] = $data['tgl_lahir'];
            $_SESSION['gender'] = $data['gender'];
            $_SESSION['id_kamar'] = $data['id_kamar'];
            $_SESSION['id_kepemilikan'] = $data['id_kepemilikan'];
            header("location:../dashboard.php");
            exit();
        }
    }else{
        echo '<script language = "javascript">
        alert ("username atau password salah !!"); document.location="../login.html"; </script>';
    }
}
?>