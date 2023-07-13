<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'database/db-connection.php'; ?>
    <?php include 'database/vendor-page-details.php'; ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendor's Page | <?php echo $storeName; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png"/>

    <!-- CSS -->
    <link rel="stylesheet" href="./CSS/MAIN.css">
    <link rel="stylesheet" href="./CSS/vendor-page.css">
    <link rel="stylesheet" href="./CSS/take-order.css">
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

    <!--================================ END OF NAVIGATION BAR ================================-->


    <?php if (isset($_SESSION['user_name']) && isset($_SESSION['password']) && ($_SESSION['user_type'] === '1')) { ?>
    <!--================================ VENDORS CONTAINER ================================-->

    <div class="vendor-page-container">
      <?php
          $navId = "overview-nav";    
          include 'components/vendor/vendor-navbar.php'; 
      ?>
      <div class="overview-section">
        <section class="profile_container">
          <div class="page-title">
            <h3>Overview</h3>
          </div>
          <div class="left_profile">
            <div class="image">
              <div class="img_container">
                <img src="./images/UNLI LUGAW STALL.png" alt="">
                <div class="profile_details">
                  <div class="profile_image">
                    <h1>
                      <?php echo strtoupper(substr($storeName, 0, 1)); ?>                        
                    </h1>
                  </div>
                  <div class="profile_details_texts">
                    <div class="stall_name stall_details">
                      <p>
                        <span class="material-symbols-outlined">
                          store
                        </span>
                        <?php echo $storeName; ?>
                      </p>
                      <div class="input">
                        <span class="material-symbols-outlined">
                          store
                        </span>
                        <input type="text" class="form-control" placeholder="Store Name" value="<?php echo $storeName; ?>">
                      </div>
                    </div>
                    <div class="stall_location stall_details">
                      <p>
                        <span class="material-symbols-outlined">
                          location_on
                        </span>   
                        <?php echo $location; ?>
                      </p>
                      <div class="input">
                        <span class="material-symbols-outlined">
                          location_on
                        </span>
                        <input type="text" class="form-control" placeholder="Store Location" value="<?php echo $location; ?>">
                      </div>
                    </div>
                    <div class="stall_contact stall_details">
                      <p>
                        <span class="material-symbols-outlined">
                          phone
                        </span>
                        <?php echo $contact; ?>
                      </p>
                      <div class="input">
                        <span class="material-symbols-outlined">
                          phone
                        </span>
                        <input type="text" class="form-control" placeholder="Contact Number" value="<?php echo $contact; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="buttons">
                    <button type="button" class="edit-profile-btn btn">Edit Profile</button>
                    <button type="button" class="cancel-btn btn" hidden>Cancel</button>      
                    <button type="button" class="save-profile-btn btn" hidden>Save Changes</button>  
                  </div>              
                </div>
              </div>
            </div>
          </div>

          <?php include 'components/vendor/dashboard.php'; ?>
        </section>

        <!-- ORDERS CONTAINER -->
        <section class="orders_container">
          <div class="active_orders">
            <div class="title">
              <h3>Active Orders</h3>
            </div>

            <?php include 'components/vendor/active-orders.php'; ?>
          </div>
        </section>
      </div>
    </div>
    <!--================================ END OF CONTENT CONTAINER ================================-->
    <?php } else { ?>
      <?php include 'components/admin/access-denied.php'; ?>
    <?php } ?>
    
    <!--================================ FOOTER ================================-->
    <?php include 'components/footer.php'; ?>
    <!--================================ END - FOOTER ================================-->

    <!-- JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <script src="./SCRIPTS/SCRIPT.js"></script>
    <script src="./SCRIPTS/vendor-edit-profile.js"></script>
    <script src="./SCRIPTS/take-order.js"></script>
</body>
</html>