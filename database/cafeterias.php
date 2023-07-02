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
        if (!isset($stalls[$storeID])) {            
            if (isset($row['store_image']) && $row['store_image'] !== null && $row['store_image'] !== "") {
                $storeImage = '<img src="' . $row['store_image'] . '" alt="">';
            } else {
                $storeImage ='
                                <span class="material-symbols-outlined">
                                store
                                </span>
                            ';
            }  
            
            $stalls[$storeID] = array(
                'id' => $row['id'],
                'store_image' => $storeImage,
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