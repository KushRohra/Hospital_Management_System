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
        
        print_r($_POST);

        $stmt = $conn->prepare("INSERT INTO channel(doctor_no, patient_no, room_no, channel_date) VALUES(?,?,?,?)");
        $stmt->bind_param("ssss", $doctor_no, $patient_no, $room_no, $channel_date);

        $doctor_no = $_POST['doctor_no'];
        $patient_no = $_POST['patient_no'];
        $room_no = $_POST['room_no'];
        $channel_date = $_POST['channel_date'];

        if($stmt->execute()) {
            echo 1;
        } else {
            echo 0;
        }
        $stmt->close();
        
    }

?>