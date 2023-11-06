<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Insert a new record
    include 'db_connection.php';

    $json = file_get_contents('php://input', true);
    $obj = json_decode($json);

    $nik = $obj->nik;
    $username = $obj->username;
    $password = $obj->password;
    $nama = $obj->nama;
    $no_whatsapp = $obj->no_whatsapp;
    $no_whatsapp_wali = $obj->no_whatsapp_wali;
    $privilege = $obj->privilege;
    $tgl_lahir = $obj->tgl_lahir;
    $gender = $obj->gender;

    $query_insert = "INSERT INTO akun (nik, username, password, nama, no_whatsapp, no_whatsapp_wali, privilege, tgl_lahir, gender) VALUES ('$nik', '$username', '$password', '$nama', '$no_whatsapp', '$no_whatsapp_wali', $privilege, '$tgl_lahir', '$gender')";

    if ($conn->query($query_insert) === TRUE) {
        $response = array(
            'code' => 200,
            'status' => 'Data berhasil ditambahkan!'
        );
    } else {
        $response = array(
            'code' => 400,
            'status' => 'Gagal menambahkan data: ' . $conn->error
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);

    $conn->close();
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Select specific user
    include 'db_connection.php';

    $nik = $_GET['nik'];

    $query_select = "SELECT * FROM akun WHERE nik = '$nik'";
    $result = $conn->query($query_select);

    $data = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $response = array(
            'code' => 200,
            'status' => 'Sukses',
            'user_list' => $data
        );
    } else {
        $response = array(
            'code' => 404,
            'status' => 'Data tidak ditemukan!',
            'user_list' => $data
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);

    $conn->close();
} elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    // Delete specific user
    include 'db_connection.php';

    $nik = $_GET['nik'];

    $query_delete = "DELETE FROM akun WHERE nik = '$nik'";
    $result = $conn->query($query_delete);

    if ($conn->affected_rows > 0) {
        $response = array(
            'code' => 200,
            'status' => 'Data terhapus!'
        );
    } else {
        $response = array(
            'code' => 404,
            'status' => 'Gagal dihapus!'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);

    $conn->close();
}
?>
