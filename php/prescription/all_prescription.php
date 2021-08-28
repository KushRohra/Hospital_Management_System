<?php  

    $server_name = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'hospital_management_system';

    $conn = new mysqli($server_name, $username, $password, $db_name);

    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT prescription_no, channel_no, disease, description FROM prescription ORDER BY prescription_no DESC");
    $stmt->bind_result($prescription_no, $channel_no, $disease, $description);

    if ($stmt->execute()) {
        while ($stmt->fetch()) {
            $output[] = array("prescription_no"=>$prescription_no, "channel_no"=>$channel_no, "disease"=>$disease, "description"=>$description);
        }
        echo json_encode($output);
    }
    $stmt->close();
?>