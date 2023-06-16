<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    session_start();

    $con = mysqli_connect('localhost', 'root', '', 'db_iskotogo'); // For XAMPP
    //$con = mysqli_connect('localhost', 'iskotogo', '13579','db_iskotogo'); // For GoDaddy
    
    // Check if the connection was successful
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    ?>

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
    <nav>
        <div class="container nav__container">
            <!-- MOBILE NAV -->
            <button id="back-to-prev">
                <span class="material-symbols-outlined">
                    arrow_back
                </span>
            </button>

            <h3 id="sys_name"><b>Cafeteria Automation System</b></h3>
            <div class="mobile_nav_container">
                <div class="container mobile_nav">
                    <div class="capstone_name">
                        <a href="HomePage.php">
                            <img src="./imgs/logo.png" alt="" class="logo__img">
                            <p>PUP Cafeteria Automation System</p>
                        </a>
                    </div>
                    <ul class="menu">
                        <li>
                            <a href="HomePage.php">
                                <div class="icons">
                                    <span class="material-symbols-outlined">
                                        home
                                    </span>
                                </div>
                                <p>Home</p>
                            </a>
                            <hr>
                        </li>
                        <li>
                            <a href="">
                                <div class="icons">
                                    <span class="material-symbols-outlined">
                                        shopping_cart
                                    </span>
                                </div>
                                <p>Order Now</p>
                            </a>
                            <hr>
                        </li>
                        <li>
                            <a href="MyOrders.php">
                                <div class="icons">
                                    <span class="material-symbols-outlined">
                                        receipt
                                    </span>
                                </div>
                                <p>My Orders</p>
                                <div id="num-of-orders">
                                    <p>
                                        2
                                    </p>
                                </div>
                            </a>
                            <hr>
                        </li>
                        <li class="open-profile">
                            <a>
                                <div class="icons">
                                    <span class="material-symbols-outlined">
                                        person
                                    </span>
                                </div>
                                <p>My Profile</p>
                            </a>
                        </li>
                    </ul>
                    <div class="side_bar_profile">
                        <?php if (isset($_SESSION['user_name']) && isset($_SESSION['password'])) { ?>
                            <div class="left">
                                <div class="image">
                                    <img src="profile_pics/<?php echo $_SESSION['Lastname']; ?>_profile.jpg" alt="">
                                </div>
                                <div class="details">
                                    <p><b>Fname Lname</b></p>
                                    <p>Section</p>
                                </div>
                            </div>
                            <a href="#" onclick="performLogout()">
                                <i class="bi bi-box-arrow-left" id="log-out-btn"></i>
                            </a>
                        <?php } ?>
                    </div>
                    <button id="close_menu_btn">
                        <span class="material-symbols-outlined">
                            close
                        </span>
                    </button>
                </div>
            </div>
            <!-- END -- MOBILE NAV -->

            <a href="HomePage.php" id="logo">
                <img src="./imgs/logo.png" alt="" class="logo__img">
                <h4>PUP Cafeteria Automation System</h4>
            </a>
            <ul class="nav_menu">
                <li id="homepage_icon">
                    <a href="HomePage.php">
                        <span class="material-symbols-outlined">home</span>
                    </a>
                </li>
                <li id="order-now">
                    <a href="">
                        <span class="material-symbols-outlined">
                            shopping_cart
                        </span>
                        <p>
                            Order Now
                        </p>
                    </a>
                </li>
                <li id="my-orders">
                    <a href="MyOrders.php">
                        <span class="material-symbols-outlined">
                            receipt
                        </span>
                        <p>
                            My Orders
                        </p>
                    </a>
                </li>
                <?php if (isset($_SESSION['user_name']) && isset($_SESSION['password'])) { ?>
                    <li id="profile" class="open-profile">
                        <img src="profile_pics/<?php echo $_SESSION['Lastname']; ?>_profile.jpg" alt="">
                    </li>
                <?php } else { ?>
                    <li id="login-btn">
                        <a href="LoginPage.php" class="btn">
                            <p>Login</p>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
    <!--================================ END OF NAVIGATION BAR ================================-->



    <!--================================ CONTAINER ================================-->
    <section class="container homepage_container">
        <div class="my_orders_texts">
            <span class="material-symbols-outlined">receipt</span>
            <h3>My Orders</h3>
        </div>
        <!--================== HOME - ORDERS ===================-->
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

        <?php if (isset($_SESSION['user_name']) && isset($_SESSION['password'])) { ?>
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

                    <!-- <div class="my_orders" id="order2">
                        <div class="my_order_profile">
                            <div class="image">
                                <img src="./imgs/FEWA.webp" alt="">
                            </div>
                            <div class="my_order_profile_details">
                                <h4>FEWA</h4>
                                <p class="my_order_price">Unit Price:<span>&nbsp; P 20.00</span></p>
                                <p class="my_order_stall"><i class="bi bi-shop-window"></i>
                                    FEWA Stall
                                </p>
                            </div>
                        </div>
                        <div class="my_order_details">
                            <div class=order-details-right>
                                <div class="item_name_quantity order_detail">
                                    <div class="item_name">
                                        <p class="label">Item:</p>
                                        <p class="text">FEWA</p>
                                    </div>
                                    <div class="item_quantity">
                                        <p class="label">Quantity:</p>
                                        <p class="text">4</p>
                                    </div>
                                </div>
                                <div class="item_others order_detail">
                                    <p class="label">Others:</p>
                                    <p class="text">None</p>
                                </div>
                            </div>
                            <div class="my_order_total order_detail">
                                <p class="label">Total:</p>
                                <h4 class="text">P 80.00</h4>
                            </div>
                        </div>
                    </div> 
                </div>-->
            <?php endforeach; ?>
        <?php } ?>
    </section>
    <!--================================ END OF CONTAINER ================================-->


    <!--================================ SHOW PROFILE ================================-->
    <section class="show-profile">
        <div class="profile-container">
            <i class="bi bi-x-square-fill close-profile"></i>
            <i class="bi bi-box-arrow-left" id="log-out-btn"></i>
            <div class="profile-header-container">
                <div class="profile-header">
                    <div class="img-container">
                        <img src="./imgs/CORNDOG.jpg" alt="">
                    </div>
                    <h4 id="name">Mark Zuckerberg</h4>
                    <p id="section">BSIT 2-2</p>
                    <div class="profile-label">
                        <p class="information-label">
                            Information
                        </p>
                        <p class="order-history-label">
                            Order History
                        </p>
                    </div>
                </div>
            </div>

            <div class="mySwiper profile-history-container">
                <!-- INFORMATION -->
                <div class="swiper-wrapper">
                    <div class="swiper-slide profile-information-details-container">
                        <div class="profile-information-details">
                            <div class="profile-information">
                                <i class="bi bi-circle-fill"></i>
                                <div class="detail">
                                    <p class="label">Name</p>
                                    <p class="name">Mark Zuckerberg</p>
                                </div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </div>
                        <div class="profile-information-details">
                            <div class="profile-information">
                                <i class="bi bi-circle-fill"></i>
                                <div class="detail">
                                    <p class="label">Section</p>
                                    <p class="name">BSIT 2-2</p>
                                </div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </div>
                        <div class="profile-information-details">
                            <div class="profile-information">
                                <i class="bi bi-circle-fill"></i>
                                <div class="detail">
                                    <p class="label">Student Number</p>
                                    <p class="name">2024-03201-MN-0</p>
                                </div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </div>
                        <div class="profile-information-details">
                            <div class="profile-information">
                                <i class="bi bi-circle-fill"></i>
                                <div class="detail">
                                    <p class="label">Password</p>
                                    <p class="name">************</p>
                                </div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </div>
                    </div>

                    <!-- ORDER HISTORY -->
                    <div class="swiper-slide profile-order-details-container">
                        <div class="order-history-card">
                            <p class="date">Today 11:12AM</p>
                            <div class="order-history-details">
                                <div class="image">
                                    <img src="./imgs/Arroz Caldo.jpg" alt="">
                                </div>
                                <div class="details">
                                    <p class="name"><span>2 </span>Carbonara</p>
                                    <p class="prize">P 40.00</p>
                                </div>
                                <button class="btn">delete</button>
                            </div>
                        </div>
                        <div class="order-history-card">
                            <p class="date">Today 11:12AM</p>
                            <div class="order-history-details">
                                <div class="image">
                                    <img src="./imgs/Arroz Caldo.jpg" alt="">
                                </div>
                                <div class="details">
                                    <p class="name"><span>2 </span>Carbonara</p>
                                    <p class="prize">P 40.00</p>
                                </div>
                                <button class="btn">delete</button>
                            </div>
                        </div>
                        <div class="end-line">
                            <div class="line"></div>
                            <p>end</p>
                            <div class="line"></div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination profile-history-pagination"></div>

            </div>
        </div>
    </section>
    <!--================================ END - SHOW PROFILE ================================-->


    <!-- JAVASCRIPT -->
    <script src="./SCRIPTS/SCRIPT.js"></script>
    <script src="./SCRIPTS/navbar.js"></script>
    <script src="./SCRIPTS/show-profile.js"></script>
    <script src="./SCRIPTS/place-order.js"></script>
    <script src="./SCRIPTS/profile-section.js"></script>
    <script src="./SCRIPTS/featured-items.js"></script>

    <script type="text/javascript">
        var counter = 1;
        setInterval(function () {
            document.getElementById('radio' + counter).checked = true;
            counter++;
            if (counter > 5) {
                counter = 1;
            }
        }, 5000);
    </script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- SCROLL EFFECTS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>