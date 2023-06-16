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
    <title>HOME</title>
    <link rel="shortcut icon" type="image/x-icon" href="./imgs/LOGO.png" />

    <!-- CSS -->
    <link rel="stylesheet" href="./CSS/MAIN.css">
    <link rel="stylesheet" href="./CSS/HOME.css">
    <link rel="stylesheet" href="./CSS/PROFILE.css">
    <link rel="stylesheet" href="./CSS/intro-message.css">
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
    <!-- SWIPER CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
</head>

<body>
    <!--================================ NAVIGATION BAR ================================-->
    <nav>
        <div class="container nav__container">
            <!-- MOBILE NAV -->
            <button id="open_menu_btn">
                <span class="material-symbols-outlined">
                    menu
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
                            <a href="OrderNow.php">
                                <div class="icons">
                                    <span class="material-symbols-outlined">
                                        shopping_cart
                                    </span>
                                </div>
                                <p>Order Now</p>
                            </a>
                            <hr>
                        </li>
                        <?php if (isset($_SESSION['user_name']) && isset($_SESSION['password'])) { ?>
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
                        <?php } ?>
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
                    <a href="OrderNow.php">
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


    <!--================================ INTRODUCTORY MESSEAGE ================================-->
    <?php if (!isset($_SESSION['user_name']) && !isset($_SESSION['password'])) { ?>
        <div class="intro-message-container">
            <article class="intro-message">
                <button id="close-intro-message">
                    <span class="material-symbols-outlined">
                        close
                    </span>
                </button>
                <div class="circle-elem">
                    <div class="image">
                        <img src="images/logo.png">
                    </div>
                </div>
                <div class="content">
                    <p id="school-name">Polytechnic University of the Philippines</p>
                    <div class="texts">
                        <h2>
                            IskoToGo
                            <br>
                            Cafeteria Automation System
                        </h2>
                        <p>
                            hassle no more, your centralized university food ordering system is here
                        </p>
                    </div>
                    <a href="LoginPage.php" class="btn">
                        Order Now
                        <span class="material-symbols-outlined">
                            shopping_cart
                        </span>
                    </a>
                </div>
            </article>
        </div>
    <?php } ?>
    <!--================================ END INTRODUCTORY MESSEAGE ================================-->


    <!--================================ CONTAINER ================================-->
    <section class="container homepage_container">
        <!--================== HOME - NAVIGATION ===================-->
        <div class="home_navigation_section">
            <!--CAROUSEL-->
            <div class="swiper mySwiper carouselSwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="./imgs/CarItem1.png" alt="...">
                    </div>
                    <div class="swiper-slide">
                        <img src="./imgs/CarItem1.png" alt="...">
                    </div>
                    <div class="swiper-slide">
                        <img src="./imgs/CarItem1.png" alt="...">
                    </div>
                    <div class="swiper-slide">
                        <img src="./imgs/CarItem1.png" alt="...">
                    </div>
                    <div class="swiper-slide">
                        <img src="./imgs/CarItem1.png" alt="...">
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination carousel-pagination"></div>
            </div>

            <!--FEATURED ITEMS-->
            <div class="featured_items">
                <div class="featured_items_texts">
                    <h3>
                        Featured Items
                    </h3>
                </div>

                <?php
                $query = "SELECT item_name, item_price, item_image, store_id FROM tbl_menu GROUP BY store_id";

                $result = mysqli_query($con, $query);

                // Check if the query was successful
                if ($result) {
                    $items = array();
                    // Iterate over the result set and populate the $items array
                    while ($row = mysqli_fetch_assoc($result)) {
                        $imageData = base64_encode($row['item_image']);
                        $image = $row['item_image'] ? "data:image/jpeg;base64, {$imageData}" : '.\images\logo.png';
                        $items[] = array(
                            'name' => $row['item_name'],
                            'price' => $row['item_price'],
                            'image' => $image,
                            'store_id' => $row['store_id']
                        );
                    }

                    // Free the result set
                    mysqli_free_result($result);

                } else {
                    // Query execution failed
                    die("Error executing query: " . mysqli_error($con));
                }


                ?>

                <div class="swiper mySwiper featured_items_container">
                    <div class="swiper-wrapper content">
                        <?php foreach ($items as $item): ?>
                            <div class="swiper-slide card">
                                <div class="card_content">
                                    <div class="image">
                                        <img src="<?php echo $item['image']; ?>" alt="">
                                    </div>

                                    <div class="fItem_details">
                                        <div class="fItem_texts">
                                            <p id="item_name">
                                                <?php echo $item['name']; ?>
                                            </p>
                                            <P id="item_price">
                                                <?php echo $item['price']; ?>
                                            </P>
                                        </div>
                                        <div class="icon">
                                            <i class="bi bi-chevron-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!--CAFETERIAS-->


            <?php
                // Assuming you have already established a database connection
                
                // Retrieve data from tbl_store
                $query = "SELECT s.id, s.store_image, s.store_name, m.item_name 
                FROM tbl_stores s
                JOIN tbl_menu m ON s.id = m.store_id";

                $result = mysqli_query($con, $query);

                $articles = array();

                // Fetch the data and organize it into an array
                while ($row = mysqli_fetch_assoc($result)) {
                    $storeID = $row['id'];
                    $tag = $row['item_name'];

                    // Check if the store already exists in the articles array
                    $imageData = base64_encode($row['store_image']);
                    if (!isset($articles[$storeID])) {
                        $image = $row['store_image'] ? "data:image/jpeg;base64, {$imageData}" : '.\images\logo.png';
                        $articles[$storeID] = array(
                            'image' => $image,
                            'title' => $row['store_name'],
                            'tags' => array($tag),
                        );
                    } else {
                        if (count($articles[$storeID]['tags']) < 3) {
                            $articles[$storeID]['tags'][] = $tag;
                        }
                    }
                }

            ?>
            <div class="cafeterias">
                <div class="cafeterias_texts">
                    <h3>
                        Cafeterias/Stalls
                    </h3>
                </div>
                <div class="cafeterias__container">
                    <?php
                    $counter = 0;
                    foreach ($articles as $article):
                        if ($counter >=3) {
                            break;
                        }
                        $counter++;
                        ?>
                        <article class="cafeteria">
                            <div class="caf-image">
                                <img src="<?php echo $article['image']; ?>" alt="">D
                            </div>
                            <div class="shadow"></div>
                            <h3>
                                <?php echo $article['title']; ?>
                            </h3>
                            <div class="cafeteria_tags">
                                <?php foreach ($article['tags'] as $tag): ?>
                                    <p>
                                        <?php echo $tag; ?>
                                    </p>
                                <?php endforeach; ?>
                            </div>
                            <a href="#">
                                <p>View Stall</p>
                                <i class="bi bi-arrow-right-circle-fill"></i>
                            </a>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!--================== HOME - ORDERS ===================-->
        <div class="my_orders_section">
            <div class="my_orders_texts">
                <span class="material-symbols-outlined">receipt</span>
                <h3>My Orders</h3>
            </div>
            <?php if (isset($_SESSION['id'])) { ?>
            <?php
                $orderquery = "SELECT o.id, o.item_id, o.store_id, o.customer_id, o.quantity, o.date, o.status, m.item_name, m.item_price, m.item_image, s.store_name
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
        </div>
        <?php } ?>


        <!--POPUP MESSAGE-->
        <div class="popUp__message__container">
            <div class="popUp__message">
                <div class="popUp__item__details">
                    <div class="image">
                        <img src="./imgs/CORNDOG.jpg" alt="">
                    </div>
                    <div class="name_price">
                        <h4>Corndog</h4>
                        <p>Unit Price:<span>&nbsp;</span></p>
                    </div>
                    <div class="quantity">
                        <p id="label">Quantity</p>
                        <div class="input">
                            <i class="bi bi-dash"></i>
                            <p id="text">1</p>
                            <i class="bi bi-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="other_details">
                    <p>Other details (please specify)</p>
                    <input type="text" class="other_details_text" name="Other Details"
                        placeholder="e.g: no hotdog; additional fork; etc." autocomplete="off">
                </div>
                <div class="order_summary">
                    <p>Summary</p>
                    <div class="content">
                        <div class="left">
                            <div class="top">
                                <p class="summary_item_name">Item: <span>&nbsp;Corndog</span></p>
                                <p class="summary_item_quantity">Quantity: <span>&nbsp;2</span></p>
                            </div>
                            <div class="bottom">
                                <p>Others:<span>&nbsp;None</span></p>
                            </div>
                        </div>
                        <div class="right">
                            <p>Total:</p>
                            <h4 id="total_price">&nbsp;</h4>
                        </div>
                    </div>
                </div>
                <div class="buttons">
                    <?php if (isset($_SESSION['user_name']) && isset($_SESSION['password'])) { ?>
                        <button type="button" class="order-btn btn" id="close_btn">Cancel</button>
                        <button type="submit" class="order-btn btn">Place Order</button>
                    <?php } else { ?>
                        <span class="material-symbols-outlined not-logged" id="close_btn">
                            close
                        </span>
                        <a href="#" onclick="performLogout()" class="not-logged btn">
                            <p>Please Login to Order</p>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>

    </section>
    <!--================================ END OF CONTAINER ================================-->


    <!--================================ SHOW PROFILE ================================-->
    <section class="show-profile">
        <div class="profile-container">
            <i class="bi bi-x-square-fill close-profile"></i>
            <a href="#" onclick="performLogout()">
                <i class="bi bi-box-arrow-left" id="log-out-btn"></i>
            </a>
            <div class="profile-header-container">
                <div class="profile-header">
                    <div class="img-container">
                        <img src="profile_pics/<?php echo $_SESSION['Lastname']; ?>_profile.jpg" alt="">
                        <!-- <img src="<?php echo $_SESSION['user_profile']; ?>" alt=""> -->
                    </div>
                    <h4 id="name">
                        <?php echo $_SESSION['Firstname'] . " " . $_SESSION['Lastname'] ?>
                    </h4>
                    <p id="section">
                        <?php echo $_SESSION['Section'] ?>
                    </p>
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
                                    <p class="name">
                                        <?php echo $_SESSION['Firstname'] . " " . $_SESSION['Lastname'] ?>
                                    </p>
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
                                    <p class="name">
                                        <?php echo $_SESSION['Section'] ?>
                                    </p>
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
                                    <p class="name">
                                        <?php echo $_SESSION['Studentid']; ?>
                                    </p>
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
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="./SCRIPTS/SCRIPT.js"></script>
    <script src="./SCRIPTS/navbar.js"></script>
    <script src="./SCRIPTS/show-profile.js"></script>
    <script src="./SCRIPTS/place-order.js"></script>
    <script src="./SCRIPTS/profile-section.js"></script>
    <script src="./SCRIPTS/featured-items.js"></script>
    <script src="./SCRIPTS/intro-message.js"></script>

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

    <script>
        var carouselSwiper = new Swiper(".carouselSwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".carousel-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

    <!-- SCROLL EFFECTS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>