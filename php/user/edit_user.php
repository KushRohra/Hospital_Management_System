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
        $stmt = $conn->prepare("UPDATE user set username = ?, fullname = ?, utype = ? WHERE user_id = ?");
        $stmt->bind_param("ssss", $username, $fullname, $utype, $user_id);

        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $utype = $_POST['utype'];
        $user_id = $_POST['user_id'];


        if($stmt->execute()) {
            echo 1;
        } else {
            echo 0;
        }
        $stmt->close();
    }

?>