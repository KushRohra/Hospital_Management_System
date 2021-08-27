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

    $stmt = $conn->prepare("SELECT item_id, item_name, description, selling_price, cost_price, quantity FROM item WHERE item_id = ?");
    $stmt->bind_param("s", $item_id);
    $item_id = $_POST['item_id'];
    $stmt->bind_result($item_id, $item_name, $description, $selling_price, $cost_price, $quantity);

    if ($stmt->execute()) {
        while ($stmt->fetch()) {
            $output = array("item_id"=>$item_id, "item_name"=>$item_name, "description"=>$description, "selling_price"=>$selling_price, "cost_price"=>$cost_price, "quantity"=>$quantity);
        }
        echo json_encode($output);
    }
    $stmt->close();
?>