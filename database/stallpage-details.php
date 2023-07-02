<?php
    $id = $_GET['id'];
    $store_name = $_GET['store_name'];
    $tags = explode(',', $_GET['tags']);

    // Use the ID, title, and tags to query and retrieve other details of the stall
    // Perform your database query here using the $id, $store_name, and $tags variables

    // Example query
    // $query = "SELECT * FROM tbl_stores WHERE id = ? AND title = '$store_name' AND tag IN ('" . implode("','", $tags) . "')";
    $query = "SELECT * FROM tbl_stores WHERE id = ? AND store_name = '$store_name'";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $id);
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

    $location = $row['Location'];
    $contact = $row['Contact'];
    $likes = $row['Likes'];
    if (isset($row['store_image']) && $row['store_image'] !== null && $row['store_image'] !== "") {
        $storeImage = '<img src="' . $row['store_image'] . '" alt="">';
    } else {
        $storeImage ='
                        <span class="material-symbols-outlined">
                            store
                        </span>
                    ';
    }  
    // Display the retrieved stall details
?>
