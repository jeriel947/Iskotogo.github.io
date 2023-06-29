<?php
    include '../database/db-connection.php';

    $userId = $_SESSION['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
        $file = $_FILES['image'];

        // Get the user ID from your session or wherever it is stored

        // Specify the directory to save the uploaded image
        $uploadDir = '../images/users/';

        // Get the original file extension
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

        // Generate the filename using the user ID and file extension
        $filename = $userId . '-image.' . $extension;

        // Move the uploaded image to the specified directory
        $destination = $uploadDir . $filename;
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            // Image upload successful
            // You can perform additional processing here if needed

            $destination = 'images/users/' . $filename;
            // Return the HTML for the updated image container
            // Construct the image path

            $imageHTML = '<img src="' . $destination . '" alt="Uploaded Image">';
            echo $imageHTML;

            // Update the user_profile column in the database
            $updateQuery = "UPDATE tbl_users SET user_profile = ? WHERE user_id = ?";
            $stmt = mysqli_prepare($con, $updateQuery);
            mysqli_stmt_bind_param($stmt, "ss", $destination, $userId);
            mysqli_stmt_execute($stmt);
        } else {
            // Image upload failed
            // You can handle the error case here
            echo 'Error uploading image';
        }
    } else {
        // Invalid request or no file uploaded
        echo 'Invalid request';
    }
?>
