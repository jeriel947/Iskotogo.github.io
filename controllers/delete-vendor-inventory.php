<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    include '../database/db-connection.php';

    // Retrieve the updated values from the POST request
    $menuId = $_POST['menuId'];

    try {
        mysqli_begin_transaction($con);

        // Update tbl_menu
        $deleteMenuQuery = "DELETE FROM tbl_menu WHERE id = ?";
        $stmt = mysqli_prepare($con, $deleteMenuQuery);
        mysqli_stmt_bind_param($stmt, "i", $menuId);
        mysqli_stmt_execute($stmt);

        // Commit the transaction
        mysqli_commit($con);

        // Handle the response
        $response = array('success' => true, 'message' => "Item {$menuId} DELETED successfully");
        echo json_encode($response);

        // Close the statement
        mysqli_stmt_close($stmt);
    } catch (Exception $e) {
        // Rollback the transaction in case of any error
        mysqli_rollback($con);

        // Handle the error
        $response = array('success' => false, 'message' => 'Error occurred WHILE deleting the item.');
        echo json_encode($response);
    }

    // Close the database connection
    mysqli_close($con);
?>