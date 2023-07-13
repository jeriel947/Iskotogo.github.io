<?php
    include '../database/db-connection.php';

    // Retrieve the updated values from the POST request
    $updatedStoreName = $_POST['storeName'];
    $updatedStoreLocation = $_POST['storeLocation'];
    $updatedStoreContact = $_POST['storeContact'];

    // Perform the database update
    $updateQuery = "UPDATE tbl_stores SET store_name = ?, Location = ?, Contact = ? WHERE user_id = ?";
    $stmt = mysqli_prepare($con, $updateQuery);
    mysqli_stmt_bind_param($stmt, "ssss", $updatedStoreName, $updatedStoreLocation, $updatedStoreContact, $_SESSION['id']);
    if (mysqli_stmt_execute($stmt)) {
        // Database update successful
        $response = array('success' => true, 'message' => 'Store updated successfully');
    } else {
        // Database update failed
        $response = array('success' => false, 'message' => 'Error updating store: ' . mysqli_error($con));
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Send the response back to the client
    echo json_encode($response);
?>
