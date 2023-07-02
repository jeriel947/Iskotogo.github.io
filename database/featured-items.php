<?php
    $query = "SELECT * FROM tbl_menu GROUP BY store_id";

    $result = mysqli_query($con, $query);

    // Check if the statement was prepared successfully
    if ($result) {
        $items = array();

        // Fetch the rows and populate the $items array
        while ($row = mysqli_fetch_assoc($result)) {

            if (isset($row['item_image']) && $row['item_image'] !== null && $row['item_image'] !== "") {
                $featuredImage = '<img src="' . $row['item_image'] . '" alt="">';
            } else {
                $featuredImage ='
                                <span class="material-symbols-outlined">
                                    fastfood
                                </span>
                            ';
            }  

            $items[] = array(
                'id' => $row['id'],
                'name' => $row['item_name'],
                'price' => $row['item_price'],
                'image' => $featuredImage,
                'store_id' => $row['store_id']
            );
        }

    } else {
        // Statement preparation failed
        die("Error preparing statement: " . mysqli_error($con));
    }
?>
