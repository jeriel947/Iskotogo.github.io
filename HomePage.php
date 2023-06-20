<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'database/db-connection.php'; ?>

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
    <?php 
        $headerIcon = "";
        $mobileHeaderText = "IskoToGo";
        include 'components/navbar.php'; 
    ?>
    <!--================================ END OF NAVIGATION BAR ================================-->

    <!--================================ INTRODUCTORY MESSEAGE ================================-->
    <?php include 'components/intro-message.php'; ?>
    <!--================================ END INTRODUCTORY MESSEAGE ================================-->


    <!--================================ CONTAINER ================================-->
    <section class="container homepage_container">
        <!--================== HOME - NAVIGATION ===================-->
        <div class="home_navigation_section">

            <!--CAROUSEL-->
            <div class="swiper mySwiper carouselSwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="./images/carousel/1.png" alt="...">
                    </div>
                    <div class="swiper-slide">
                        <img src="./images/carousel/2.png" alt="...">
                    </div>
                    <div class="swiper-slide">
                        <img src="./images/carousel/3.png" alt="...">
                    </div>
                    <div class="swiper-slide">
                        <img src="./images/carousel/4.png" alt="...">
                    </div>
                    <div class="swiper-slide">
                        <img src="./images/carousel/5.png" alt="...">                    
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

                <?php include 'database/featured-items.php'; ?>

                <div class="swiper mySwiper featured_items_container">
                    <div class="swiper-wrapper content">
                        <?php foreach ($items as $item): ?>
                            <div class="swiper-slide card">
                                <div class="card_content" id="order-item-btn">
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
            <?php include 'database/cafeterias.php'; ?>
            
            <div class="cafeterias">
                <div class="cafeterias_texts">
                    <h3>
                        Cafeterias/Stalls
                    </h3>
                </div>
                <div class="cafeterias__container">
                    <?php
                        $counter = 0;
                        foreach ($stalls as $stall):
                            if ($counter >=3) {
                                break;
                            }
                        $counter++;
                        ?>
                        <article class="cafeteria">
                            <div class="caf-image">
                                <img src="<?php echo $stall['image']; ?>" alt="">D
                            </div>
                            <div class="shadow"></div>
                            <h3>
                                <?php echo $stall['title']; ?>
                            </h3>
                            <div class="cafeteria_tags">
                                <?php foreach ($stall['tags'] as $tag): ?>
                                    <p>
                                        <?php echo $tag; ?>
                                    </p>
                                <?php endforeach; ?>
                            </div>
                            <a href="StallPage.php" class="btn-secondary">
                                <p>View Stall</p>
                                <i class="bi bi-arrow-right-circle-fill"></i>
                            </a>
                            <a href="StallPage.php?id=<?php echo $stall['id']; ?>&title=<?php echo urlencode($stall['title']); ?>&tags=<?php echo urlencode(implode(',', $stall['tags'])); ?>" class="btn-secondary">                                
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
            <?php include 'components/my-orders.php'; ?>
        </div>

        <!-- POPUP MESSAGE -->
        <?php include 'components/place-order-popup.php'; ?>

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
    <script src="./SCRIPTS/SCRIPT.js"></script>
    <script src="./SCRIPTS/navbar.js"></script>
    <script src="./SCRIPTS/show-profile.js"></script>
    <script src="./SCRIPTS/place-order.js"></script>
    <script src="./SCRIPTS/profile-section.js"></script>
    <script src="./SCRIPTS/featured-items.js"></script>
    <script src="./SCRIPTS/carousel.js"></script>
    <script src="./SCRIPTS/intro-message.js"></script>

    <!-- SCROLL EFFECTS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
