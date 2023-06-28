<?php
    $query = "SELECT id, item_name, item_price, item_image, store_id FROM tbl_menu GROUP BY store_id";
    $statement = mysqli_prepare($con, $query);

    // Check if the statement was prepared successfully
    if ($statement) {
        // Execute the statement
        mysqli_stmt_execute($statement);

        // Bind the result variables
        mysqli_stmt_bind_result($statement, $id, $name, $price, $image, $store_id);

        $items = array();

        // Fetch the rows and populate the $items array
        while (mysqli_stmt_fetch($statement)) {
            $imageData = base64_encode($image);
            $image = $image ? "data:image/jpeg;base64, {$imageData}" : './images/logo.png';

            $items[] = array(
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'image' => $image,
                'store_id' => $store_id
            );
        }

        // Close the statement
        mysqli_stmt_close($statement);
    } else {
        // Statement preparation failed
        die("Error preparing statement: " . mysqli_error($con));
    }
?>
