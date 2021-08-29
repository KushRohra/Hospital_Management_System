<?php  

    $server_name = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'hospital_management_system';

    $conn = new mysqli($server_name, $username, $password, $db_name);

    if ($conn->connect_error) {
        die("connection failed" . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT item_id, item_name, selling_price FROM item WHERE item_id = ?");
    $stmt->bind_param('s', $item_id);
    $item_id = $_POST['item_id'];
    $stmt->bind_result($item_id, $item_name, $selling_price);

    if ($stmt->execute()) {
        while ($stmt->fetch()) {
            $output = array("item_id"=>$item_id, "item_name"=>$item_name, "selling_price"=>$selling_price);
        }
        echo json_encode($output);
    }
    $stmt->close();
?>