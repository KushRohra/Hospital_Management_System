<?php  

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $server_name = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'hospital_management_system';

    $conn = new mysqli($server_name, $username, $password, $db_name);

    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT user_id, username, fullname, utype FROM user WHERE user_id = ?");
    $stmt->bind_param("s", $user_id);
    $user_id = $_POST['user_id'];
    $stmt->bind_result($user_id, $username, $fullname, $utype);

    if ($stmt->execute()) {
        while ($stmt->fetch()) {
            $output = array("user_id"=>$user_id, "username"=>$username, "fullname"=>$fullname, "utype"=>$utype);
        }
        echo json_encode($output);
    }
    $stmt->close();
?>