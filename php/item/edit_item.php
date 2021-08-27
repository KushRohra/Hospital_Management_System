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
        $stmt = $conn->prepare("UPDATE item set item_name = ?, description = ?, selling_price = ?, cost_price = ?, quantity = ? WHERE item_id = ?");
        $stmt->bind_param("ssssss", $item_name, $description, $selling_price, $cost_price, $quantity, $item_id);

        $item_name = $_POST['item_name'];
        $description = $_POST['description'];
        $selling_price = $_POST['selling_price'];
        $cost_price = $_POST['cost_price'];
        $quantity = $_POST['quantity'];
        $item_id = $_POST['item_id'];

        if($stmt->execute()) {
            echo 1;
        } else {
            echo 0;
        }
        $stmt->close();
    }

?>