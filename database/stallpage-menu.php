<?php
    include 'database/stallpage-details.php';
                            
    $query = "SELECT m.item_name, m.item_price, m.item_image, m.store_id, s.store_name, m.id
                FROM tbl_menu m
                JOIN tbl_stores s ON m.store_id = s.id
                WHERE m.store_id = ?";
    
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    // Check if the query was successful
    if ($result) {
        $items = array();
        // Iterate over the result set and populate the $items array
        while ($row = mysqli_fetch_assoc($result)) {
            $storeName = $row['store_name'];

            if (isset($row['item_image']) && $row['item_image'] !== null && $row['item_image'] !== "") {
                $menuImage = '<img src="' . $row['item_image'] . '" alt="">';
            } else {
                $menuImage ='
                                <span class="material-symbols-outlined">
                                    fastfood
                                </span>
                            ';
            }            
            
            $items[] = array(
                'id' => $row['id'],
                'name' => $row['item_name'],
                'price' => $row['item_price'],
                'menu_image' => $menuImage,
                'store_id' => $row['store_id'],
            );
        }

        // Free the result set
        mysqli_free_result($result);

    } else {
        // Query execution failed
        die("Error executing query: " . mysqli_error($con));
    }
?>