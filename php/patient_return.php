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

    $stmt = $conn->prepare("SELECT patientno, name, phone, address FROM patient WHERE patientno = ?");
    $stmt->bind_param("s", $patientno);
    $patientno = $_POST['patient_id'];
    $stmt->bind_result($patientno, $name, $phone, $address);

    if ($stmt->execute()) {
        while ($stmt->fetch()) {
            $output = array("patientno"=>$patientno, "name"=>$name, "phone"=>$phone, "address"=>$address);
        }
        echo json_encode($output);
    }
    $stmt->close();
?>