<?php
    // Retrieve data from tbl_store
    $query = "SELECT s.id, s.store_image, s.store_name, m.item_name 
    FROM tbl_stores s
    JOIN tbl_menu m ON s.id = m.store_id";

    $result = mysqli_query($con, $query);

    $stalls = array();

    // Fetch the data and organize it into an array
    while ($row = mysqli_fetch_assoc($result)) {
        $storeID = $row['id'];
        $tag = $row['item_name'];

        // Check if the store already exists in the articles array
        $imageData = base64_encode($row['store_image']);
        if (!isset($stalls[$storeID])) {
            $image = $row['store_image'] ? "data:image/jpeg;base64, {$imageData}" : '.\images\logo.png';
            $stalls[$storeID] = array(
                'id' => $row['id'],
                'image' => $image,
                'store_name' => $row['store_name'],
                'tags' => array($tag),
            );
        } else {
            if (count($stalls[$storeID]['tags']) < 3) {
                $stalls[$storeID]['tags'][] = $tag;
            }
        }
    }
?>