<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    include '../database/db-connection.php';

    // Retrieve the orderId from the request
    $orderId = $_POST['orderId'];

    try {
        mysqli_begin_transaction($con);

        // Update tbl_orders
        $receiveMyOrderQuery = "UPDATE tbl_orders SET order_status = 0 WHERE id = ?";
        $stmtMyOrder = mysqli_prepare($con, $receiveMyOrderQuery);
        mysqli_stmt_bind_param($stmtMyOrder, "i", $orderId);
        mysqli_stmt_execute($stmtMyOrder);

        // Commit the transaction
        mysqli_commit($con);

        // Handle the response
        $response = array('success' => true, 'message' => "Order {$orderId} received successfully");
        echo json_encode($response);

        // Close the statement
        mysqli_stmt_close($stmtMyOrder);
    } catch (Exception $e) {
        // Rollback the transaction in case of any error
        mysqli_rollback($con);

        // Handle the error
        $response = array('success' => false, 'message' => 'Error occurred while receiving your order');
        echo json_encode($response);
    }

    // Close the the database connection
    mysqli_close($con);
?>