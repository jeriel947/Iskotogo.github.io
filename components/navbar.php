<?php 
    include 'database/profile-pic.php'; 
    include 'database/my-orders.php';
?>

<nav>
    <div class="container nav__container">
        <!-- MOBILE NAV -->
        <button id="open_menu_btn">
            <span class="material-symbols-outlined">
                menu
            </span>
        </button>

        <h3 id="sys_name">
            <span class="material-symbols-outlined"><?php echo $headerIcon; ?></span>
            <b>
                <?php echo $mobileHeaderText; ?>
            </b>
        </h3>
        <div class="mobile_nav_container">
            <div class="container mobile_nav">
                <div class="capstone_name">
                    <?php if (isset($_SESSION['user_name']) && isset($_SESSION['password'])) { ?>
                        <?php if ($_SESSION['user_type'] === '1') { ?> <!--VENDORS HOMEPAGE-->   
                            <a href="VendorPage.php">
                                <img src="images/logo.png" alt="" class="logo__img">
                                <p>PUP Cafeteria Automation System</p>
                            </a>
                        <?php } elseif ($_SESSION['user_type'] === '2') { ?> <!--USERS HOMEPAGE-->
                            <a href="HomePage.php">
                                <img src="images/logo.png" alt="" class="logo__img">
                                <p>PUP Cafeteria Automation System</p>
                            </a>
                        <?php } ?>
                    <?php } else { ?>
                        <a href="HomePage.php">
                            <img src="images/logo.png" alt="" class="logo__img">
                            <p>PUP Cafeteria Automation System</p>
                        </a>
                    <?php } ?>
                </div>
                <ul class="menu">
                    <li>
                        <?php if (isset($_SESSION['user_name']) && isset($_SESSION['password'])) { ?>
                            <?php if ($_SESSION['user_type'] === '1') { ?> <!--VENDORS HOMEPAGE-->   
                                <a href="VendorPage.php">
                                    <div class="icons">
                                        <span class="material-symbols-outlined">
                                            home
                                        </span>
                                    </div>
                                    <p>Home</p>
                                </a>  
                            <?php } elseif ($_SESSION['user_type'] === '2') { ?> <!--USERS HOMEPAGE-->
                                <a href="HomePage.php">
                                    <div class="icons">
                                        <span class="material-symbols-outlined">
                                            home
                                        </span>
                                    </div>
                                    <p>Home</p>
                                </a>    
                            <?php } ?>
                        <?php } else { ?>
                            <a href="HomePage.php">
                                <div class="icons">
                                    <span class="material-symbols-outlined">
                                        home
                                    </span>
                                </div>
                                <p>Home</p>
                            </a>
                        <?php } ?>    
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
                                    <?php
                                        $sql = "SELECT COUNT(*) AS order_count FROM tbl_orders WHERE customer_id = {$_SESSION['id']} AND order_status = '2'";
                                        $result = mysqli_query($con, $sql);
                                        $row = mysqli_fetch_assoc($result);
                                        $order_count = $row['order_count'];
                                    ?>
                                    <span class="material-symbols-outlined">
                                        receipt
                                    </span>
                                    <?php if ($order_count > 0): ?>
                                        <div class="receive-notif-icon">
                                            
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <p>My Orders</p>
                                <div id="num-of-orders">
                                    <?php
                                        // Perform the SQL query to count the orders
                                        $sql = "SELECT COUNT(*) AS order_count FROM tbl_orders WHERE customer_id = {$_SESSION['id']} AND order_status != '0'";
                                        $result = mysqli_query($con, $sql);
                                        $row = mysqli_fetch_assoc($result);
                                        $order_count = $row['order_count'];
                                    ?>
                                    <p>
                                        <?php echo $order_count; ?>
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
                            <hr>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="AboutUs.php">
                            <div class="icons">
                                <span class="material-symbols-outlined">
                                    groups
                                </span>
                            </div>
                            <p>About Us</p>
                        </a>
                        <hr>
                    </li>
                    <li>
                        <a href="ContactUs.php">
                            <div class="icons">
                                <span class="material-symbols-outlined">
                                    call
                                </span>
                            </div>
                            <p>Contact Us</p>
                        </a>
                    </li>
                </ul>
                <div class="side_bar_profile">
                    <?php if (isset($_SESSION['user_name']) && isset($_SESSION['password'])) { ?>
                        <div class="left">
                            <div class="image">
                                <?php echo $image; ?>
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
        <?php if (isset($_SESSION['user_name']) && isset($_SESSION['password'])) { ?>
            <?php if ($_SESSION['user_type'] === '1') { ?> <!--VENDORS HOMEPAGE-->   
                <a href="VendorPage.php" id="logo">
            <?php } elseif ($_SESSION['user_type'] === '2') { ?> <!--USERS HOMEPAGE-->
                <a href="HomePage.php" id="logo">
            <?php } ?>
        <?php } else { ?>
            <a href="HomePage.php" id="logo">
        <?php } ?>        
            <img src="images/logo.png" alt="" class="logo__img">
            <h4>IskoToGo</h4>
        </a>
        <ul class="nav_menu generic-homepage-nav-menu">
            <li id="about-us">
                <a href="AboutUs.php">
                    <span class="material-symbols-outlined">
                        groups
                    </span>
                    <p>
                        About Us
                    </p>
                </a>
            </li>
            <li id="contact-us">
                <a href="ContactUs.php">
                    <span class="material-symbols-outlined">
                        call
                    </span>
                    <p>
                        Contact Us
                    </p>
                </a>
            </li>
        </ul>
        <ul class="nav_menu">
            <li id="homepage_icon">
            <?php if (isset($_SESSION['user_name']) && isset($_SESSION['password'])) { ?>

                <?php if ($_SESSION['user_type'] === '1') { ?> <!--VENDORS HOMEPAGE-->   
                    <a href="VendorPage.php">
                        <span class="material-symbols-outlined">home</span>
                    </a>
                <?php } elseif ($_SESSION['user_type'] === '2') { ?> <!--USERS HOMEPAGE-->
                    <a href="HomePage.php">
                        <span class="material-symbols-outlined">home</span>
                    </a>
                <?php } ?>
            <?php } else { ?>
                <a href="HomePage.php">
                    <span class="material-symbols-outlined">home</span>
                </a>
            <?php } ?>            
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
                    <?php
                        $sql = "SELECT COUNT(*) AS order_count FROM tbl_orders WHERE customer_id = {$_SESSION['id']} AND order_status = '2'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $order_count = $row['order_count'];
                    ?>
                    <span class="material-symbols-outlined">
                        receipt
                    </span>
                    <p>
                        My Orders
                    </p>
                    <?php if ($order_count > 0): ?>
                        <div class="receive-notif-icon">
                            
                        </div>
                    <?php endif; ?>
                </a>
            </li>
            <?php if (isset($_SESSION['user_name']) && isset($_SESSION['password'])) { ?>
                <li id="profile" class="open-profile">
                    <?php echo $image; ?>                    
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