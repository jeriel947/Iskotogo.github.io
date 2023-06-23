<?php
    $orderquery = "SELECT o.id, o.item_id, o.store_id, o.customer_id, o.quantity, o.date, o.order_status, m.item_name, m.item_price, m.item_image, s.store_name
                    FROM tbl_orders o
                    JOIN tbl_menu m ON o.item_id = m.id
                    JOIN tbl_users u ON o.customer_id = u.user_id
                    JOIN tbl_stores s ON o.store_id = s.id
                    WHERE o.customer_id = {$_SESSION['id']} AND o.order_status = '1'";

    $orderresult = mysqli_query($con, $orderquery);

    if (!$orderresult) {
        die("Query failed: " . mysqli_error($con));
    }

    $orders = array();

    while ($row = mysqli_fetch_assoc($orderresult)) {
        $orderID = $row['id'];
        $oimageData = base64_encode($row['item_image']);
        $image = $row['item_image'] ? "data:image/jpeg;base64, {$oimageData}" : '.\images\logo.png';
        if (!isset($orders[$orderID])) {
            $orders[$orderID] = array(
                'itemName' => $row['item_name'],
                'itemQuantity' => $row['quantity'],
                'image' => $image,
                'itemPrice' => $row['item_price'],
                'storeName' => $row['store_name']
            );
        }
    }
?>