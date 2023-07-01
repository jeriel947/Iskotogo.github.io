<?php
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemName = $_POST['item_name'];
    $unitPrice = $_POST['unit_price'];

    $sql = "INSERT INTO tbl_orders (item_id, customer_id, quantity, order_status) VALUES ($_POST[item_id], $_POST[])";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>