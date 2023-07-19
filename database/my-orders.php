<?php
    $orderquery = "SELECT o.id, o.item_id, o.store_id, o.customer_id, o.quantity, o.date, o.order_status, m.item_name, m.item_price, m.item_image, s.store_name
                    FROM tbl_orders o
                    JOIN tbl_menu m ON o.item_id = m.id
                    JOIN tbl_users u ON o.customer_id = u.user_id
                    JOIN tbl_stores s ON o.store_id = s.id
                    WHERE o.customer_id = {$_SESSION['id']} AND o.order_status != '0'";

    $orderresult = mysqli_query($con, $orderquery);

    if (!$orderresult) {
        die("Query failed: " . mysqli_error($con));
    }

    $orders = array();

    while ($row = mysqli_fetch_assoc($orderresult)) {
        $orderID = $row['id'];
        
        if (isset($row['item_image']) && $row['item_image'] !== null && $row['item_image'] !== "") {
            $menuImage = '<img src="' . $row['item_image'] . '" alt="">';
        } else {
            $menuImage ='
                            <span class="material-symbols-outlined">
                                fastfood
                            </span>
                        ';
        } 

        if (!isset($orders[$orderID])) {
            $orders[$orderID] = array(
                'orderId' => $row['id'],
                'itemName' => $row['item_name'],
                'itemQuantity' => $row['quantity'],
                'image' => $menuImage,
                'itemPrice' => $row['item_price'],
                'storeName' => $row['store_name'],
                'orderStatus' => $row['order_status']
            );
        }
    }
?>