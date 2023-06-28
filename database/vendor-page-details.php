<?php
    $vendorsinfoquery = "SELECT * FROM tbl_stores WHERE user_id = ?";
    $stmt = mysqli_prepare($con, $vendorsinfoquery);
    mysqli_stmt_bind_param($stmt, "s", $_SESSION['id']);
    mysqli_stmt_execute($stmt);

    if ($stmt === false) {
        die("Error executing query: " . mysqli_error($con));
    }

    $result = mysqli_stmt_get_result($stmt);

    if ($result === false) {
        die("Error fetching result: " . mysqli_error($con));
    }

    $row = mysqli_fetch_assoc($result);

    if ($row === null) {
        die("No record found.");
    }

    $storeId = $row['id'];
    $storeName = $row['store_name'];
    $location = $row['Location'];
    $contact = $row['Likes'];

    if (isset($row['store_image']) && $row['store_image'] !== null) {
        $imageData = base64_encode($row['store_image']);
        $store_image = "data:image/jpeg;base64,{$imageData}";
    } else {
        $store_image = './images/logo.png';
    }
?>
