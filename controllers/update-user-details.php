<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    include '../database/db-connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the updated values from the POST request
        $userId = $_SESSION['id'];
        $userSection = $_POST['user-section'];
        $userPass = $_POST['user-password'];

        try {
            mysqli_begin_transaction($con);

            // Update tbl_menu
            $updateUserQuery = "UPDATE tbl_users SET password = ?, section = ? WHERE user_id = ?";
            $stmt = mysqli_prepare($con, $updateUserQuery);
            mysqli_stmt_bind_param($stmt, "sss", $userPass, $userSection, $userId);
            mysqli_stmt_execute($stmt);

            // Commit the transaction
            mysqli_commit($con);

            // Handle the response
            $response = array('success' => true, 'message' => "Password UPDATED successfully!");
            echo json_encode($response);

            // Close the statement
            mysqli_stmt_close($stmt);
        } catch (Exception $e) {
            // Rollback the transaction in case of any error
            mysqli_rollback($con);

            // Handle the error
            $response = array('success' => false, 'message' => 'Error occurred WHILE updating your password.');
            echo json_encode($response);
        }

        // Close the database connection
        mysqli_close($con);
    } else {
        throw new Exception('Form was not submitted.');
    }
?>