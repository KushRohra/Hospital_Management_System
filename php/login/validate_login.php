<?php  

    $server_name = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'hospital_management_system';

    $conn = new mysqli($server_name, $username, $password, $db_name);

    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_start();

        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $utype = $_POST['utype'];

        $id;

        $stmt = $conn->prepare('SELECT user_id, username, password, utype FROM user where username = ? AND password = ? and utype = ?');
        $stmt->bind_param('sss', $username, $password, $utype);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $username, $password, $utype);

        if ($stmt->num_rows == 1) {
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['utype'] = $utype;
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            echo 1;
        } else {
            echo 3;
        }
    }
?>