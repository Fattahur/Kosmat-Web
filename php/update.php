<?php
$sessionid = "update";
include 'koneksi.php';

if (true) {
    $nik = $_POST['nik'];
    $nama = $_POST['fullname'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telepon'];
    $telpwali = $_POST['teleponwali'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $tgllahir = $_POST['date'];
    $gender = $_POST['gender'];

    $cek_user = mysqli_query($connection, "SELECT * FROM akun WHERE username = '$username'");
    $cek_username = mysqli_num_rows($cek_user);

    // Cek apakah gambar diupload
    if ($_FILES['image']['size'] > 0) {
        $foto = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];

        // Pindahkan gambar jika diupload
        move_uploaded_file($file_tmp, '../img/' . $foto);
    }

    if ($cek_username > 1 ) {
        // Username sudah terdaftar dan bukan username yang lama
        echo '<script language = "javascript">
            alert ("Username Telah Terdaftar, Silahkan Gunakan Username Yang Lain"); document.location="../profil.php"; </script>';
    } else {
        // Username valid atau masih sama dengan yang lama
        // Update data tanpa memperbarui gambar jika tidak diupload
        $sqlupdate = "UPDATE akun SET 
            nik = '$nik',
            nama = '$nama',
            alamat = '$alamat',
            no_whatsapp = '$telp',
            no_whatsapp_wali = '$telpwali',
            tgl_lahir = '$tgllahir',
            gender = '$gender',
            username = '$username',
            password = '$password'";

        if (isset($foto)) {
            // Jika gambar diupload, tambahkan ke pernyataan SQL
            $sqlupdate .= ", foto_profil = '$foto'";
        }

        $sqlupdate .= " WHERE nik = '$nik'";

        // Eksekusi pernyataan SQL
        $result = mysqli_query($connection, $sqlupdate);

        if ($result && mysqli_affected_rows($connection) > 0) {
            echo '<script language = "javascript">
                alert ("Data Telah Berhasil Diubah"); </script>';
            echo '<script>window.location = "../profil.php";</script>';
            unset($_SESSION[$sessionid]);
            session_start();
            session_destroy();
        } else {
            echo '<script language = "javascript">
                alert ("Data Gagal Diubah"); document.location="../profil.php"; </script>';
        }
    }
}
?>
