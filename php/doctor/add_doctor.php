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
        $log_id = $_POST['log_id'];
        $query = mysqli_query($conn, "SELECT * FROM doctor WHERE log_id = '$log_id'");
        $num_rows = mysqli_num_rows($query);
        if ($num_rows == 1) {
            echo 2;
        } else {
            $stmt = $conn->prepare("INSERT INTO DOCTOR(doctor_name, specialization, qualification, fee, phone, room_no, log_id) VALUES(?,?,?,?,?,?,?)");
            $stmt->bind_param("sssssss", $doctor_name, $specialization, $qualification, $fee, $phone, $room_no, $log_id);

            $doctor_name = $_POST['doctor_name'];
            $specialization = $_POST['specialization'];
            $qualification = $_POST['qualification'];
            $fee = $_POST['fee'];
            $phone = $_POST['phone'];
            $room_no = $_POST['room_no'];
            $log_id = $_POST['log_id'];

            if($stmt->execute()) {
                echo 1;
            } else {
                echo 0;
            }
            $stmt->close();
        }
    }

?>