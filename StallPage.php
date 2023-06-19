<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'database/db-connection.php'; ?>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>STALL MENU</title>
    <link rel="shortcut icon" type="image/x-icon" href="./imgs/LOGO.png" />

    <!-- CSS -->
    <link rel="stylesheet" href="./CSS/MAIN.css">
    <link rel="stylesheet" href="./CSS/STALLMENU.css">
    <link rel="stylesheet" href="./CSS/PROFILE.css">
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
    <section class="container stallmenu_container">
        <!--================== STALL MENU - NAVIGATION ===================-->
        <div class="stallmenu_navigation_section">
            <div class="stall_profile">
                <div class="image">
                    <div class="img_container">
                        <img src="./imgs/UNLI LUGAW STALL.png" alt="">
                    </div>
                    <div class="profile_image">
                        <h1>U</h1>
                    </div>
                </div>

                <div class="profile_details">
                    <div class="profile_details_texts">
                        <?php include 'database/stallpage-details.php'; ?>                        
                        <div class="stall_name">
                            <h3>
                                <i class="bi bi-shop-window"></i>
                                <?php echo $title; ?>
                            </h3>
                        </div>
                        <div class="stall_location stall_details">
                            <p>
                                <i class="bi bi-geo-alt"></i>
                                PUP Main Bldg. Lagoon Food Stall 1
                            </p>
                        </div>
                        <div class="stall_contact stall_details">
                            <p>
                                <i class="bi bi-telephone"></i>
                                (541) 754-3010
                            </p>
                        </div>
                    </div>
                    <p class="hearts_num">
                        <i class="bi bi-heart"></i>
                    </p>
                </div>
            </div>
            <!--  MENU  -->
            <div class="stall_menu">
                <div class="stall_menu_title">
                    <h3>Menu</h3>
                </div>
                <div class="mobile_header_texts">
                    <span class="material-symbols-outlined prev-page-btn">
                        arrow_back_ios
                    </span>
                    <h4>
                        <?php echo $title; ?>
                    </h4>
                    <i class="bi bi-heart"></i>
                </div>
                
                <div class="menu_container">
                    <?php include 'database/stallpage-menu.php'; ?>                        

                    <?php foreach ($items as $item): ?>
                        <div class="menu_item">
                            <div class="image">
                                <img src="<?php echo $item['image']; ?>" alt="">
                            </div>
                            <div class="item_details">
                                <div class="item_texts">
                                    <p id="item_name">
                                        <?php echo $item['name']; ?>
                                    </p>
                                    <P id="item_price">
                                        P <?php echo $item['price']; ?>
                                    </P>
                                </div>
                            </div>
                            <button type="button" class="btn-secondary btn order-item-btn">Order</button>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>

        </div>

        <!--================== MY ORDERS ===================-->
        <div class="my_orders_section">
            <div class="my_orders_texts">
                <span class="material-symbols-outlined">receipt</span>
                <h3>My Orders</h3>
            </div>
            <?php include 'components/my-orders.php'; ?>    
        </div>

        <!--POPUP MESSAGE-->
        <?php include 'components/place-order-popup.php'; ?>

    </section>
    <!--================================ END OF CONTAINER ================================-->
    
    <!--================================ SHOW PROFILE ================================-->
    <?php include 'components/profile-section.php'; ?>
    <!--================================ END - SHOW PROFILE ================================-->

    <!-- JAVASCRIPT -->
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="./SCRIPTS/SCRIPT.js"></script>
    <script src="./SCRIPTS/navbar.js"></script>
    <script src="./SCRIPTS/show-profile.js"></script>
    <script src="./SCRIPTS/profile-section.js"></script>
    <script src="./SCRIPTS/place-order.js"></script>

    <!-- SCROLL EFFECTS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <!-- SHOW/HIDE POP MESSAGE -->
    <script>
        const showPopup = document.querySelectorAll('.order-item-btn');
        const closePopup = document.querySelector('#close_btn');
        const popUpMessage = document.querySelector('.popUp__message__container');

        showPopup.forEach(course => {
            course.addEventListener('click', () => {
                popUpMessage.style.display = "flex";
            })
        })

        closePopup.addEventListener('click', () => {
            popUpMessage.style.display = "none";
        })

        var swiper = new Swiper(".profile-history-container", {
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
</body>

</html>