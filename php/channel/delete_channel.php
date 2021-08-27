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
        $stmt = $conn->prepare("DELETE FROM channel WHERE channel_no = ?");
        $stmt->bind_param("s", $channel_no);

        $channel_no = $_POST['channel_no'];

        if($stmt->execute()) {
            echo 1;
        } else {
            echo 0;
        }
        $stmt->close();
    }

?>