<?php
    include 'database/stallpage-details.php';
                            
    $query = "SELECT item_name, item_price, item_image, store_id FROM tbl_menu WHERE store_id = $id";

    $result = mysqli_query($con, $query);

    // Check if the query was successful
    if ($result) {
        $items = array();
        // Iterate over the result set and populate the $items array
        while ($row = mysqli_fetch_assoc($result)) {
            $imageData = base64_encode($row['item_image']);
            $image = $row['item_image'] ? "data:image/jpeg;base64, {$imageData}" : '.\images\logo.png';
            $items[] = array(
                'name' => $row['item_name'],
                'price' => $row['item_price'],
                'image' => $image,
                'store_id' => $row['store_id']
            );
        }

        // Free the result set
        mysqli_free_result($result);

    } else {
        // Query execution failed
        die("Error executing query: " . mysqli_error($con));
    }
?>