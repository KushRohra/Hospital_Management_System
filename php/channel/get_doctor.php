<?php  

    $server_name = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'hospital_management_system';

    $conn = new mysqli($server_name, $username, $password, $db_name);

    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT doctor_id, doctor_name FROM doctor ORDER BY doctor_id DESC");
    $stmt->bind_result($doctor_id, $doctor_name);

    if ($stmt->execute()) {
        while ($stmt->fetch()) {
            $output[] = array("doctor_id"=>$doctor_id, "doctor_name"=>$doctor_name);
        }
        echo json_encode($output);
    }
    $stmt->close();
?>