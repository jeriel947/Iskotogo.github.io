<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'database/db-connection.php'; ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us</title>
    <link rel="shortcut icon" type="image/x-icon" href="./images/LOGO.png" />

    <!-- CSS -->
    <link rel="stylesheet" href="./CSS/MAIN.css">
    <link rel="stylesheet" href="./CSS/HOME.css">
    <link rel="stylesheet" href="./CSS/PROFILE.css">
    <link rel="stylesheet" href="./CSS/about-us.css">
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
        $headerIcon = "groups";
        $mobileHeaderText = "About Us";    
        include 'components/navbar.php'; 
    ?>
    <!--================================ END OF NAVIGATION BAR ================================-->


    <!--================================ CONTAINER ================================-->
    <!---------------------------------- PROMO VID ---------------------------------->
    <section class="promo_container">
        <div class="video-container">
        <video src="images/aboutus_pics/promo.mp4" autoplay muted loop></video>
			</div>
        </div>
    </section>

    <!---------------------------------- ABOUT ------------------------------------>
    <section class="about_container">
        <div class="about">
            <div class="about-text">
              <h1>IskoToGo </h1>
              <p>A web-based school cafeteria automation system designed for PUP students to optimize the overall transactions and handle multiple cafeterias in to a centralized platform.</p>
            </div>
            <div class="about-image">
              <img src="images/aboutus_pics/bgg.png" alt="">
            </div>
        </div>
    </section>
    <!----------------------------- OUR TEAM ------------------------------------>
    <section class="team_container homepage_container gapless_container">
        <div>
        <h1>MEET OUR TEAM</h1>
        <div class="card-grid">
            <div class="card">
                <img src="images/aboutus_pics/silva.jpg" alt="Harvy Pontillas">
                <div class="card-info">
                  <h3>Harvy Pontillas</h3>
                  <p>Merielle Cruz</p>
                </div>
            </div>
            <div class="card">
                <img src="images/aboutus_pics/silva.jpg" alt="Jeriel Ledesma">
                <div class="card-info">
                  <h3>Jeriel Ledesma</h3>
                  <p>Merielle Cruz</p>
                </div>
            </div>
            <div class="card">
                <img src="images/aboutus_pics/silva.jpg" alt="Jherdi Ramos">
                <div class="card-info">
                  <h3>Jherdi Ramos</h3>
                  <p>Merielle Cruz</p>
                </div>
            </div>
            <div class="card">
                <img src="images/aboutus_pics/silva.jpg" alt="Matthew Silva">
                <div class="card-info">
                  <h3>Matthew Silva</h3>
                  <p>Merielle Cruz</p>
                </div>
            </div>
            <div class="card">
                <img src="images/aboutus_pics/cruz.jpg" alt="Merielle Cruz">
                <div class="card-info">
                  <h3>Merielle Cruz</h3>
                  <p>Merielle Cruz</p>
                </div>
            </div>
            <div class="card">
                <img src="images/aboutus_pics/mia.jpg" alt="Mia Capili">
                <div class="card-info">
                  <h3>Mia Capili</h3>
                  <p>Merielle Cruz</p>
                </div>
            </div>
            <div class="card">
                <img src="images/aboutus_pics/cruz.jpg" alt="Jesse Eriguel">
                <div class="card-info">
                  <h3>Jesse Eriguel</h3>
                  <p>Merielle Cruz</p>
                </div>
            </div>
            </div>
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
    <script src="./SCRIPTS/profile-section.js"></script>

    <!-- SCROLL EFFECTS -->
    <script>
        AOS.init();
    </script>
</body>

</html>