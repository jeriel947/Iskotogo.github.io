<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'database/db-connection.php'; ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Now</title>
    <link rel="shortcut icon" type="image/x-icon" href="./images/LOGO.png" />

    <!-- CSS -->
    <link rel="stylesheet" href="./CSS/MAIN.css">
    <link rel="stylesheet" href="./CSS/HOME.css">
    <link rel="stylesheet" href="./CSS/PROFILE.css">
    <link rel="stylesheet" href="./CSS/order-now.css">
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

    <div class="loader-container">
        <span class="loader"></span>        
    </div>

    <!--================================ NAVIGATION BAR ================================-->
    <?php
        $headerIcon = "shopping_cart";
        $mobileHeaderText = "Order Now";
        include 'components/navbar.php'; 
    ?>
    <!--================================ END OF NAVIGATION BAR ================================-->


    <!--================================ CONTAINER ================================-->
    <section class="container homepage_container gapless_container">
        <div class="order_now_texts">
            <span class="material-symbols-outlined">
                shopping_cart
            </span>
            <h3>Order Now</h3>
        </div>
        
        <div class="mobile_header_texts">
            <span class="material-symbols-outlined prev-page-btn">
                arrow_back_ios
            </span>
            <p>
                Back
            </p>
        </div>
        <!--================== HOME - ORDERS ===================-->
        <?php include 'database/cafeterias.php'; ?>


        <div class="orderNowSec">
            <?php foreach ($stalls as $stall): ?>   
            <div class="stall-container-holder">
                <div class="stall-container">
                    <div class="image">
                        <img src="<?php echo $stall['image']; ?>" alt="">
                    </div>
                    <div class="texts">
                        <h3 class="stall-name">
                            <?php echo $stall['store_name']; ?>
                        </h3>
                        <div class="cafeteria_tags">
                            <?php foreach ($stall['tags'] as $tag): ?>
                                <p>
                                    <?php echo $tag; ?>
                                </p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <a href="StallPage.php?id=<?php echo $stall['id']; ?>&store_name=<?php echo urlencode($stall['store_name']); ?>&tags=<?php echo urlencode(implode(',', $stall['tags'])); ?>&image=<?php echo urldecode($stall['image']); ?>" class="btn-secondary">                                
                        <p>Select Stall</p>
                        <i class="bi bi-arrow-right-circle-fill"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>    
        </div>
    </section>
    <!--================================ END OF CONTAINER ================================-->


    <!--================================ SHOW PROFILE ================================-->
    <?php include 'components/profile-section.php'; ?>
    <!--================================ END - SHOW PROFILE ================================-->

    <!--================================ SHOW PROFILE ================================-->
    <?php include 'components/footer.php'; ?>
    <!--================================ END - SHOW PROFILE ================================-->


    <!-- JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="./SCRIPTS/SCRIPT.js"></script>
    <script src="./SCRIPTS/navbar.js"></script>
    <script src="./SCRIPTS/show-profile.js"></script>
    <script src="./SCRIPTS/place-order.js"></script>
    <script src="./SCRIPTS/profile-section.js"></script>
    <script src="./SCRIPTS/featured-items.js"></script>
</body>

</html>