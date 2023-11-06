<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include 'DatabaseConfig.php';
    $conn = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);
    $method = $_GET['method'];
    $json_array = array();
    $response = "";

    if ($method == 'getUser') {
        $username = $_GET['username'];
        $password = $_GET['password'];
        $query_login = "select * from akun where username = '$username' AND password = '$password'";
        $query_login_result = mysqli_query($conn, $query_login);

        if (isset($query_login_result)) {
            while ($user = mysqli_fetch_assoc($query_login_result)) {
                $json_array[] = $user;
            }

            $response = array(
                'code' => 200,
                'status' => 'ok',
                'user_list' => $json_array
            );
        } else {
            $response = array(
                'code' => 204,
                'status' => 'Not Found',
                'user_list' => $json_array
            );
        }
    } elseif ($method == 'getAllUser') {
        $query_login = "select * from akun";
        $query_login_result = mysqli_query($conn, $query_login);

        if (isset($query_login_result)) {
            while ($user = mysqli_fetch_assoc($query_login_result)) {
                $json_array[] = $user;
            }

            $response = array(
                'code' => 200,
                'status' => 'ok',
                'user_list' => $json_array
            );
        } else {
            $response = array(
                'code' => 204,
                'status' => 'No Data',
                'user_list' => $json_array
            );
        }
    }
    print(json_encode($response));
    mysqli_close($conn);
    
}elseif($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'DatabaseConfig.php';
    $conn = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);        
    
    //read JSON from client
    $json = file_get_contents('php://input', true);
    $obj = json_decode($json);

    //get JSON object
    $namareg = $_POST['nmalngkp'];
    $alamatreg = $_POST['alamat'];
    $telpreg = $_POST['telp'];
    $nikreg = $_POST['nik'];
    $usernamereg = $_POST['username'];
    $passwordreg = $_POST['regvalpass'];

    $query_check = "select * from akun where nik = '$nikreg'";
    $check = mysqli_fetch_array(mysqli_query($conn, $query_check));        
    $json_array = array();
    $response = "";

    if (isset($check)) {
        $response = array(
            'code' => 406,
            'status' => 'User has been registered!'
        );
    } else {
        $query_insert = "INSERT INTO akun (nama, alamat, no_whatsapp, nik, username, password, privilege) VALUES ('$namareg', '$alamatreg', '$telpreg', '$nikreg', '$usernamereg', '$passwordreg','1')"; 
        if (mysqli_query($conn, $query_insert)) {
            $response = array(
                'code' => 201,
                'status' => 'User Registered'
            );
        } else {
            $response = array(
                'code' => 405,
                'status' => 'Registered Error!'
            );
        }
    }

    print(json_encode($response));
    mysqli_close($conn);
}
?>