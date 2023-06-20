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
                                    <?php
                                        // Assuming you have the customer's id stored in the session variable $_SESSION['id']

                                        // Perform the SQL query to count the orders
                                        $sql = "SELECT COUNT(*) AS order_count FROM tbl_orders WHERE customer_id = {$_SESSION['id']}";
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