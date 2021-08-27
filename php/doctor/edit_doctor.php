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
        $stmt = $conn->prepare("UPDATE doctor set doctor_name = ?, specialization = ?, qualification = ?, fee = ?, phone = ?, room_no = ? WHERE doctor_id = ?");
        $stmt->bind_param("sssssss", $doctor_name, $specialization, $qualification, $fee, $phone, $room_no, $doctor_id);

        $doctor_name = $_POST['doctor_name'];
        $specialization = $_POST['specialization'];
        $qualification = $_POST['qualification'];
        $fee = $_POST['fee'];
        $phone = $_POST['phone'];
        $room_no = $_POST['room_no'];
        $doctor_id = $_POST['doctor_id'];

        if($stmt->execute()) {
            echo 1;
        } else {
            echo 0;
        }
        $stmt->close();
    }

?>