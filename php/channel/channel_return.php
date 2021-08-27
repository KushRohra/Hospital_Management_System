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

    $stmt = $conn->prepare("SELECT channel_no, doctor_no, patient_no, room_no, channel_date FROM channel WHERE channel_no = ?");
    $stmt->bind_param("s", $channel_no);
    $channel_no = $_POST['channel_no'];
    $stmt->bind_result($channel_no, $doctor_no, $patient_no, $room_no, $channel_date);

    if ($stmt->execute()) {
        while ($stmt->fetch()) {
            $output = array("channel_no"=>$channel_no, "doctor_no"=>$doctor_no, "patient_no"=>$patient_no, "room_no"=>$room_no, "channel_date"=>$channel_date);
        }
        echo json_encode($output);
    }
    $stmt->close();
?>