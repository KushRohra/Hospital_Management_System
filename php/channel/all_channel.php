<?php  

    $server_name = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'hospital_management_system';

    $conn = new mysqli($server_name, $username, $password, $db_name);

    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT c.channel_no, d.doctor_name, p.name, c.room_no, c.channel_date FROM channel c JOIN doctor d ON d.doctor_id = c.doctor_no JOIN patient p ON p.patientno = c.patient_no");
    $stmt->bind_result($channel_no, $doctor_name, $patient_name, $room_no, $channel_date);

    if ($stmt->execute()) {
        while ($stmt->fetch()) {
            $output[] = array("channel_no"=>$channel_no, "doctor_name"=>$doctor_name, "patient_name"=>$patient_name, "room_no"=>$room_no, "channel_date"=>$channel_date);
        }
        echo json_encode($output);
    }
    $stmt->close();
?>