<?php if (isset($_SESSION['id'])) { ?>
    <?php
        $orderquery = "SELECT o.id, o.item_id, o.store_id, o.customer_id, o.quantity, o.date, o.status, m.item_name, m.item_price, m.item_image, s.store_name
                        FROM tbl_orders o
                        JOIN tbl_menu m ON o.item_id = m.id
                        JOIN tbl_users u ON o.customer_id = u.user_id
                        JOIN tbl_stores s ON o.store_id = s.id
                        WHERE o.customer_id = {$_SESSION['id']} AND o.status = '1'";

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

    <?php if (isset($_SESSION['user_name']) && isset($_SESSION['password'])) { ?>
        <?php foreach ($orders as $order): ?>
            <div class="my_orders" id="order1">
                <div class="my_order_profile">
                    <div class="image">
                        <img src="<?php echo $order['image']; ?>" alt="">
                    </div>
                    <div class="my_order_profile_details">
                        <h4>
                            <?php echo $order['itemName']; ?>
                        </h4>
                        <p class="my_order_price">Unit Price:<span>&nbsp; P
                                <?php echo $order['itemPrice']; ?>
                            </span></p>
                        <p class="my_order_stall"><i class="bi bi-shop-window"></i>
                            <?php echo $order['storeName']; ?>
                        </p>
                    </div>
                </div>
                <div class="my_order_details">
                    <div class="item_name_quantity order_detail">
                        <div class="item_name">
                            <p class="label">Item:</p>
                            <p class="text">
                                <?php echo $order['itemName']; ?>
                            </p>
                        </div>
                        <div class="item_quantity">
                            <p class="label">Quantity:</p>
                            <p class="text">
                                <?php echo $order['itemQuantity']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="item_others order_detail">
                        <p class="label">Others:</p>
                        <p class="text">None</p>
                    </div>
                    <div class="my_order_total order_detail">
                        <p class="label">Total:</p>
                        <p class="text">P
                            <?php echo ($order['itemPrice'] * $order['itemQuantity']); ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php } ?>
<?php } ?>