<?php  

    $server_name = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'hospital_management_system';

    $conn = new mysqli($server_name, $username, $password, $db_name);

    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT user_id, fullname, username, utype FROM user ORDER BY user_id DESC");
    $stmt->bind_result($user_id, $fullname, $username, $utype);

    if ($stmt->execute()) {
        while ($stmt->fetch()) {
            $output[] = array("user_id"=>$user_id, "fullname"=>$fullname, "username"=>$username, "utype"=>$utype);
        }
        echo json_encode($output);
    }
    $stmt->close();
?>