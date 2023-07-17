<?php                                
    $query = "SELECT m.id AS menu_id, m.item_name, m.item_price, m.item_image, m.inventory, s.id AS store_id
          FROM tbl_menu m
          JOIN tbl_stores s ON m.store_id = s.id
          WHERE m.store_id = ? AND m.item_availability = '1'";

    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "i", $storeId);
    mysqli_stmt_execute($stmt);


    $result = mysqli_stmt_get_result($stmt);

    // Check if the query was successful
    if ($result) {
        $items = array();
        // Iterate over the result set and populate the $items array
        while ($row = mysqli_fetch_assoc($result)) {
            if (isset($row['item_image']) && $row['item_image'] !== null && $row['item_image'] !== "" && $row['item_image'] !== "0") {
                $menuImage = '<img src="' . $row['item_image'] . '" alt="">';
            } else {
                $menuImage ='
                                <span class="material-symbols-outlined">
                                    fastfood
                                </span>
                            ';
            }            
            
            $items[] = array(
                'itemId' => $row['menu_id'],
                'name' => $row['item_name'],
                'price' => $row['item_price'],
                'menu_image' => $menuImage,
                'inventory' => $row['inventory'],
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