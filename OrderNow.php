<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'database/db-connection.php'; ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Now</title>
    <link rel="shortcut icon" type="image/x-icon" href="./imgs/LOGO.png" />

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
    <!--================================ NAVIGATION BAR ================================-->
    <?php include 'components/navbar.php'; ?>
    <!--================================ END OF NAVIGATION BAR ================================-->


    <!--================================ CONTAINER ================================-->
    <section class="container homepage_container">
        <div class="order_now_texts">
            <span class="material-symbols-outlined">
                shopping_cart
            </span>
            <h3>Order Now</h3>
        </div>
        <!--================== HOME - ORDERS ===================-->
        <?php
            // Retrieve data from tbl_store
            $query = "SELECT s.id, s.store_image, s.store_name, m.item_name 
            FROM tbl_stores s
            JOIN tbl_menu m ON s.id = m.store_id";

            $result = mysqli_query($con, $query);

            $stalls = array();

            // Fetch the data and organize it into an array
            while ($row = mysqli_fetch_assoc($result)) {
                $storeID = $row['id'];
                $tag = $row['item_name'];

                // Check if the store already exists in the articles array
                $imageData = base64_encode($row['store_image']);
                if (!isset($stalls[$storeID])) {
                    $image = $row['store_image'] ? "data:image/jpeg;base64, {$imageData}" : '.\images\logo.png';
                    $stalls[$storeID] = array(
                        'image' => $image,
                        'title' => $row['store_name'],
                        'tags' => array($tag),
                    );
                } else {
                    if (count($stalls[$storeID]['tags']) < 3) {
                        $stalls[$storeID]['tags'][] = $tag;
                    }
                }
            }

        ?>

        <div class="orderNowSec">
            <?php foreach ($stalls as $stall): ?>   
            <div class="stall-container-holder">
                <div class="stall-container">
                    <div class="image">
                        <img src="<?php echo $stall['image']; ?>" alt="">
                    </div>
                    <div class="texts">
                        <h3 class="stall-name">
                            <?php echo $stall['title']; ?>
                        </h3>
                        <div class="cafeteria_tags">
                            <?php foreach ($stall['tags'] as $tag): ?>
                                <p>
                                    <?php echo $tag; ?>
                                </p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <a href="StallPage.php" class="btn-secondary">
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