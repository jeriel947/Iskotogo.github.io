<?php
    include '../database/db-connection.php';

    // Retrieve the orderId from the request
    $orderId = $_POST['orderId'];

    // Prepare the update query
    $updateQuery = "UPDATE tbl_orders SET order_status = 0 WHERE id = ?";
    $stmt = mysqli_prepare($con, $updateQuery);
    mysqli_stmt_bind_param($stmt, "s", $orderId);

    // Execute the update query
    if (mysqli_stmt_execute($stmt)) {
        $rowsAffected = mysqli_stmt_affected_rows($stmt);

        if ($rowsAffected > 0) {
            // Order was successfully updated
            $response = array('success' => true, 'message' => "Order {$orderId} received successfully");
        } else {
            // No rows were affected, order ID may not exist
            $response = array('success' => false, 'message' => "Unable to update order. Order ID may not exist.");
        }
    } else {
        // Error executing the update query
        $response = array('success' => false, 'message' => "Error updating order: " . mysqli_stmt_error($stmt));
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Send the response back to the client
    echo json_encode($response);
?>
