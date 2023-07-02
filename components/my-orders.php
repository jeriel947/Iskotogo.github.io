<?php if (isset($_SESSION['id'])) { ?>
    <?php include 'database/my-orders.php'; ?>

    <?php if (isset($_SESSION['user_name']) && isset($_SESSION['password'])) { ?>
        <?php if (!empty($orders)): ?>
        <?php foreach ($orders as $order): ?>
            <div class="my_orders" id="order1">
                <div class="my_order_profile">
                    <div class="image">
                        <?php echo $order['image']; ?>
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
        <?php else: ?>
            <?php
                $emptyMsg = "You don't have existing orders";
                $orderNorHref = "OrderNow.php";
                $emptyOrdersText = "Click here to order!"; 
                include 'components/empty-orders.php'; 
            ?>
        <?php endif; ?>
    <?php } ?>
<?php } else { ?>
    <?php
        $emptyMsg = "Welcome to IskoToGo";
        $orderNorHref = "LoginPage.php";
        $emptyOrdersText = "Swipe to your fav isko foods here!"; 
        include 'components/empty-orders.php'; 
    ?>
<?php } ?>