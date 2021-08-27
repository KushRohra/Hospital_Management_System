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
        $stmt = $conn->prepare("UPDATE channel set doctor_no = ?, patient_no = ?, room_no = ?, channel_date = ? WHERE channel_no = ?");
        $stmt->bind_param("sssss", $doctor_no, $patient_no, $room_no, $channel_date, $channel_no);

        $doctor_no = $_POST['doctor_no'];
        $patient_no = $_POST['patient_no'];
        $room_no = $_POST['room_no'];
        $channel_date = $_POST['channel_date'];
        $channel_no = $_POST['channel_no'];

        if($stmt->execute()) {
            echo 1;
        } else {
            echo 0;
        }
        $stmt->close();
    }

?>