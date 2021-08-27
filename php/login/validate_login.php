<?php  
    session_start();

    $server_name = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'hospital_management_system';

    $conn = new mysqli($server_name, $username, $password, $db_name);

    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $utype = $_POST['utype'];

        $sql = "SELECT user_id, username, password, utype FROM user where username = '$username' AND password = '$password' and utype = '$utype'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['utype'] = $utype;
            $_SESSION['id'] = $row['user_id'];
            $_SESSION['username'] = $username;
            echo 1;
        } else {
            echo 3;
        }
    }
?>