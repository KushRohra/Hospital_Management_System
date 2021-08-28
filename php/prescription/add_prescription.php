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
        $stmt = $conn->prepare("INSERT INTO prescription(channel_no, disease, description) VALUES(?,?,?)");
        $stmt->bind_param("sss", $channel_no, $disease, $description);

        $channel_no = $_POST['channel_no'];
        $disease = $_POST['disease'];
        $description = $_POST['description'];

        if($stmt->execute()) {
            echo 1;
        } else {
            echo 0;
        }
        $stmt->close();
    }

?>