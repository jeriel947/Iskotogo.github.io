<?php
    $orderquery = "SELECT o.id, o.item_id, o.store_id, o.customer_id, o.quantity, o.date, o.order_status, m.item_name, m.item_price, m.item_image, u.Last_Name, u.First_Name, u.user_profile, s.user_id, s.store_name
                    FROM tbl_orders o
                    JOIN tbl_menu m ON o.item_id = m.id
                    JOIN tbl_users u ON o.customer_id = u.user_id
                    JOIN tbl_stores s ON o.store_id = s.id
                    WHERE s.user_id = {$_SESSION['id']} AND o.order_status = '1'";

    $orderresult = mysqli_query($con, $orderquery);

    if (!$orderresult) {
        die("Query failed: " . mysqli_error($con));
    }

    $active_orders = array();

    while ($row = mysqli_fetch_assoc($orderresult)) {
        $orderID = $row['id'];
        $totalPrice = $row['item_price'] * $row['quantity'];
        $customerName = $row['First_Name'] . ' ' . $row['Last_Name'];

        if (isset($row['item_image']) && $row['item_image'] !== null && $row['item_image'] !== "") {
            $menuImage = '<img src="' . $row['item_image'] . '" alt="">';
        } else {
            $menuImage ='
                            <span class="material-symbols-outlined">
                                fastfood
                            </span>
                        ';
        } 

        if (isset($row['user_profile']) && $row['user_profile'] !== null && $row['user_profile'] !== "") {
            $customerImage = '<img src="' . $row['user_profile'] . '" alt="">';
        } else {
            $customerImage ='
                            <span class="material-symbols-outlined">
                                fastfood
                            </span>
                        ';
        } 

        if (!isset($active_orders[$orderID])) {
            $active_orders[$orderID] = array(
                'date' => $row['date'],
                'itemName' => $row['item_name'],
                'itemQuantity' => $row['quantity'],
                'itemPrice' => $row['item_price'],
                'totalPrice' => $totalPrice,
                'customerName' => $customerName,
                'menuImage' => $menuImage,
                'customerImage' => $customerImage,
            );
        }
    }
?>