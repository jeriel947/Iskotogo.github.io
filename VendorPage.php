<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'database/db-connection.php'; ?>
    <?php include 'database/vendor-page-details.php'; ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendor's Page | <?php echo $storeName; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="./images/LOGO.png"/>

    <!-- CSS -->
    <link rel="stylesheet" href="./CSS/MAIN.css">
    <link rel="stylesheet" href="./CSS/vendor-page.css">
    <link rel="stylesheet" href="./CSS/responsiveness.css">

    <!-- SCROLL EFFECTS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- GOOGLE FONTS (POPPINS) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    <!-- GOOGLE ICONS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- SWIPER JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
</head>
<body>
    <div class="loader-container">
        <span class="loader"></span>        
    </div>

    <!--================================ NAVIGATION BAR ================================-->
    <?php 
        $headerIcon = "";
        $mobileHeaderText = "IskoToGo";
        include 'components/navbar.php'; 
    ?>
    <!--================================ END OF NAVIGATION BAR ================================-->


    <?php if (isset($_SESSION['user_name']) && isset($_SESSION['password']) && ($_SESSION['user_type'] === '1')) { ?>
    <!--================================ VENDORS CONTAINER ================================-->
    <!-- PROFILE CONTAINER -->
    <section class="container profile_container">
      <div class="left_profile">
        <div class="image">
          <div class="img_container">
            <img src="./images/UNLI LUGAW STALL.png" alt="">
          </div>
          <div class="profile_image">
            <h1>
              <?php echo strtoupper(substr($storeName, 0, 1)); ?>                        
            </h1>
          </div>
        </div>

        <div class="profile_details">
          <div class="profile_details_texts">
            <div class="stall_name">
              <h3>
                <span class="material-symbols-outlined">
                  store
                </span>
                <?php echo $storeName; ?>
              </h3>
            </div>
            <div class="stall_location stall_details">
              <p>
                <span class="material-symbols-outlined">
                  location_on
                </span>   
				        PUP Main Bldg. Lagoon Food Stall 1
              </p>
            </div>
            <div class="stall_contact stall_details">
              <p>
			  	<span class="material-symbols-outlined">
					call
				</span>
                (541) 754-3010
              </p>
            </div>
          </div>
          <button type="button" class="edit-profile-btn btn">Edit Profile</button>
        </div>
      </div>

      <?php include 'components/vendor/dashboard.php'; ?>
    </section>

    <!-- ORDERS CONTAINER -->
    <!-- <section class="container orders_container">
      <div class="active_orders">
        <div class="title">
          <h3>Active Orders</h3>
        </div>

        <?php include 'components/vendor/active-orders.php'; ?>
      </div>

      <div class="order_history">
        <div class="title">
          <h3>Order History</h3>
        </div>

        <?php include 'components/vendor/order-history.php'; ?>
      </div>
    </section> -->
    <!--================================ END OF CONTENT CONTAINER ================================-->
    <?php } else { ?>
      <?php include 'components/admin/access-denied.php'; ?>
    <?php } ?>
    
    <button id="active-orders" class="active-button">Active Orders</button>
    <button id="order-history">Order History</button>

    <div id="orders-content">
        <?php include 'components/vendor/active-orders.php'; ?>
    </div>
    
    <script type="text/javascript">
        console.log("Hitting the order script");
        // Get the buttons and content container
        const activeOrdersButton = document.querySelector("#active-orders");
        const orderHistoryButton = document.querySelector("#order-history");
        const ordersContent = document.querySelector("#orders-content");

        // Add click event listeners to the buttons
        activeOrdersButton.addEventListener("click", () => {
            console.log("Active Orders Button Clicked");
            // Toggle active class on buttons
            activeOrdersButton.classList.add("active-button");
            orderHistoryButton.classList.remove("active-button");

            // Load active orders content
            ordersContent.innerHTML = '<?php include "components/vendor/active-orders.php"; ?>';
        });

        orderHistoryButton.addEventListener("click", () => {
            console.log("Order History Button Clicked");
            // Toggle active class on buttons
            activeOrdersButton.classList.remove("active-button");
            orderHistoryButton.classList.add("active-button");

            // Load order history content
            ordersContent.innerHTML = '<?php include "components/vendor/order-history.php"; ?>';
        });
    </script>
    <!-- JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <script src="./SCRIPTS/SCRIPT.js"></script>
    <script src="./SCRIPTS/navbar.js"></script>
    <script src="./SCRIPTS/show-profile.js"></script>
</body>
</html>