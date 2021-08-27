<?php  

    $server_name = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'hospital_management_system';

    $conn = new mysqli($server_name, $username, $password, $db_name);

    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT doctor_id, doctor_name, specialization, qualification, fee, phone, room_no FROM doctor WHERE log_id = ? ORDER BY doctor_id DESC");
    $stmt->bind_param("s", $log_id);
    $log_id = $_POST['log_id'];
    $stmt->bind_result($doctor_id, $doctor_name, $specialization, $qualification, $fee, $phone, $room_no);

    if ($stmt->execute()) {
        while ($stmt->fetch()) {
            $output[] = array("doctor_id"=>$doctor_id, "doctor_name"=>$doctor_name, "specialization"=>$specialization, "qualification"=>$qualification, "fee"=>$fee, "phone"=>$phone, "room_no"=>$room_no);
        }
        echo json_encode($output);
    }
    $stmt->close();
?>