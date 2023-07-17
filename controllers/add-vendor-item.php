<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    include '../database/db-connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the updated values from the POST request
        $itemName = $_POST['item-name'];
        $itemPrice = $_POST['item-price'];
        $itemStock = $_POST['item-stock'];
        $itemImage = $_FILES['item-image'];

        // Specify the directory to save the uploaded image
        $uploadDir = '../images/menu/';

        // Get the original file extension
        $extension = pathinfo($itemImage['name'], PATHINFO_EXTENSION);

        // Generate the filename using the user ID and file extension
        $filename = $itemName . '-image.' . $extension;

        // Move the uploaded image to the specified directory
        $destination = $uploadDir . $filename;

        if ($itemImage['error'] === UPLOAD_ERR_OK) {
            move_uploaded_file($itemImage['tmp_name'], $destination);
        }

        try {
            mysqli_begin_transaction($con);

            // Retrieve the store_id from tbl_stores based on $_SESSION['id']
            $storeQuery = "SELECT id FROM tbl_stores WHERE user_id = ?";
            $stmtStore = mysqli_prepare($con, $storeQuery);
            mysqli_stmt_bind_param($stmtStore, "i", $_SESSION['id']);
            mysqli_stmt_execute($stmtStore);
            mysqli_stmt_bind_result($stmtStore, $storeId);
            mysqli_stmt_fetch($stmtStore);
            mysqli_stmt_close($stmtStore);

            $destination = 'images/menu/' . $filename;

            // Check if itemStock is greater than 0
            $availability = ($itemStock > 0) ? 1 : 0;

            // Insert the menu item into tbl_menu
            $addMenuQuery = "INSERT INTO tbl_menu (store_id, item_name, item_price, inventory, item_availability, item_image) VALUES (?, ?, ?, ?, ?, ?)";
            $stmtAddMenu = mysqli_prepare($con, $addMenuQuery);
            mysqli_stmt_bind_param($stmtAddMenu, "isiiis", $storeId, $itemName, $itemPrice, $itemStock, $availability ,$destination);
            mysqli_stmt_execute($stmtAddMenu);

            // Commit the transaction
            mysqli_commit($con);

            // Handle the response
            $response = array('success' => true, 'message' => "Item ADDED successfully");
            echo json_encode($response);

            // Close the statement
            mysqli_stmt_close($stmtAddMenu);
        } catch (Exception $e) {
            // Rollback the transaction in case of any error
            mysqli_rollback($con);

            // Handle the error
            $response = array('success' => false, 'message' => 'Error occurred WHILE adding the item.');
            echo json_encode($response);
        }

        // Close the database connection
        mysqli_close($con);
    } else {
        throw new Exception('Form was not submitted.');
    }
?>