<?php

include $_SERVER['DOCUMENT_ROOT'].'/capstone/Prototype/database/db-connection.php';

// Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    function validate($data){

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;

    }

    $itemName = validate($_POST['item_name']);
    $unitPrice = validate($_POST['unit_price']);

    $itemId = validate($_POST['item_id']);
    $quantity = validate($_POST['quantity_text']);

    $userId = $_SESSION['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $sql = "INSERT INTO tbl_orders (item_id, customer_id, quantity) VALUES ($itemId, $userId, $quantity)";

        if (mysqli_query($con, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>