<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'database/db-connection.php'; ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Orders</title>
    <link rel="shortcut icon" type="image/x-icon" href="./imgs/LOGO.png" />

    <!-- CSS -->
    <link rel="stylesheet" href="./CSS/MAIN.css">
    <link rel="stylesheet" href="./CSS/HOME.css">
    <link rel="stylesheet" href="./CSS/PROFILE.css">
    <link rel="stylesheet" href="./CSS/my-orders.css">
    <link rel="stylesheet" href="./CSS/responsiveness.css">
    <!-- SCROLL EFFECTS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- GOOGLE FONTS (POPPINS) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- GOOGLE ICONS -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- SWIPER JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
</head>

<body>
    <!--================================ NAVIGATION BAR ================================-->
    <?php include 'components/navbar.php'; ?>
    <!--================================ END OF NAVIGATION BAR ================================-->


    <!--================================ CONTAINER ================================-->
    <section class="container homepage_container">
        <div class="my_orders_texts">
            <span class="material-symbols-outlined">receipt</span>
            <h3>My Orders</h3>
        </div>
        <?php if (isset($_SESSION['user_name']) && isset($_SESSION['password'])) { ?>    
        <?php
            $orderquery = "SELECT o.id, o.item_id, o.store_id, o.customer_id, o.quantity, o.date, m.item_name, m.item_price, m.item_image, s.store_name
            FROM tbl_orders o
            JOIN tbl_menu m ON o.item_id = m.id
            JOIN tbl_users u ON o.customer_id = u.user_id
            JOIN tbl_stores s ON o.store_id = s.id
            WHERE o.customer_id = {$_SESSION['id']} AND o.status = '1' ";

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

        <?php foreach ($orders as $order): ?>
            <div class="ordersPage-myOrdersSec">

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
                        <div class=order-details-right>
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
                        </div>
                        <div class="my_order_total order_detail">
                            <p class="label">Total:</p>
                            <h4 class="text">P
                                <?php echo ($order['itemPrice'] * $order['itemQuantity']); ?>
                            </h4>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php } ?>
    </section>
    <!--================================ END OF CONTAINER ================================-->


    <!--================================ SHOW PROFILE ================================-->
    <?php include 'components/profile-section.php'; ?>
    <!--================================ END - SHOW PROFILE ================================-->


    <!-- JAVASCRIPT -->
    <script src="./SCRIPTS/SCRIPT.js"></script>
    <script src="./SCRIPTS/navbar.js"></script>
    <script src="./SCRIPTS/show-profile.js"></script>
    <script src="./SCRIPTS/place-order.js"></script>
    <script src="./SCRIPTS/profile-section.js"></script>
    <script src="./SCRIPTS/featured-items.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- SCROLL EFFECTS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>