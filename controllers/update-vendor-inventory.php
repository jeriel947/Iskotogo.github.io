<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    include '../database/db-connection.php';

    // Retrieve the updated values from the POST request
    $menuId = $_POST['menuId'];
    $updatedItemName = $_POST['itemName'];
    $updatedItemPrice = $_POST['itemPrice'];
    $updatedItemStock = $_POST['itemStock'];

    try {
        mysqli_begin_transaction($con);

        // Update tbl_menu
        $updateMenuQuery = "UPDATE tbl_menu SET item_name = ?, item_price = ?, inventory = ? WHERE id = ?";
        $stmt = mysqli_prepare($con, $updateMenuQuery);
        mysqli_stmt_bind_param($stmt, "ssss", $updatedItemName, $updatedItemPrice, $updatedItemStock, $menuId);
        mysqli_stmt_execute($stmt);

        // Commit the transaction
        mysqli_commit($con);

        // Handle the response
        $response = array('success' => true, 'message' => "Item {$menuId} updated successfully");
        echo json_encode($response);

        // Close the statement
        mysqli_stmt_close($stmt);
    } catch (Exception $e) {
        // Rollback the transaction in case of any error
        mysqli_rollback($con);

        // Handle the error
        $response = array('success' => false, 'message' => 'Error occurred during updates');
        echo json_encode($response);
    }

    // Close the database connection
    mysqli_close($con);
?>
