<?php
    include '../database/db-connection.php';

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the updated values from the POST request    
        $itemId = $_POST['itemId'];
        $storeId = $_POST['storeId'];
        $customerId = $_SESSION['id'];
        $itemQuantity = $_POST['itemQuantity'];
        $date = $_POST['date'];

        try {
            mysqli_begin_transaction($con);

            $orderStatus = 1;

            // Insert the menu item into tbl_orders
            $placeOrdersQuery = "INSERT INTO tbl_orders (item_id, store_id, customer_id, quantity, date, order_status) VALUES (?, ?, ?, ?, ?, ?)";
            $stmtPlaceOrder = mysqli_prepare($con, $placeOrdersQuery);
            mysqli_stmt_bind_param($stmtPlaceOrder, "iiiisi", $itemId, $storeId, $customerId, $itemQuantity, $date, $orderStatus);
            mysqli_stmt_execute($stmtPlaceOrder);

            // Update the inventory in tbl_menu
            $updateInventoryQuery = "UPDATE tbl_menu SET inventory = inventory - ? WHERE id = ?";
            $stmtUpdateInventory = mysqli_prepare($con, $updateInventoryQuery);
            mysqli_stmt_bind_param($stmtUpdateInventory, "ii", $itemQuantity, $itemId);
            mysqli_stmt_execute($stmtUpdateInventory);
            
            // Commit the transaction
            mysqli_commit($con);

            // Handle the response
            $response = array('success' => true, 'message' => "Item ORDERED successfully");
            echo json_encode($response);

            // Close the statement
            mysqli_stmt_close($stmtPlaceOrder);
            mysqli_stmt_close($stmtUpdateInventory);
        } catch (Exception $e) {
            // Rollback the transaction in case of any error
            mysqli_rollback($con);

            // Handle the error
            $response = array('success' => false, 'message' => 'Error occurred ORDERING the item.');
            echo json_encode($response);
        }

        // Close the database connection
        mysqli_close($con);
    } else {
        throw new Exception('Form was not submitted.');
    }
?>