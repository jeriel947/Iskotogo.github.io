<!DOCTYPE html>
<html lang="en">
<head>
  <?php
        session_start();
        echo $_SESSION['Lastname'];
    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ORDERS | ADMIN</title>
    <link rel="shortcut icon" type="image/x-icon" href="./imgs/LOGO.png"/>

    <!-- CSS -->
    <link rel="stylesheet" href="./CSS/MAIN.css">
    <link rel="stylesheet" href="./CSS/ORDERNOW.css">
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
    <!--================================ NAVIGATION BAR ================================-->
    <nav>
        <div class="container nav__container">
            <a href="HOME.html" id="logo"><img src="./imgs/logo.png" alt="" class="logo__img"><h4>PUP Cafeteria Automation System</h4></a>
            <ul class="nav_menu">
                <li id="search">
                    <input type="text" class="other_details_text" name="Other Details" placeholder="Type a keyword" autocomplete="off">
                    <span class="material-symbols-outlined">search</span>
                </li>
                <li id="homepage_icon">
                    <span class="material-symbols-outlined">home</span>
                </li>
                <li id="profile">
                <img src="profile_pics/<?php echo $_SESSION['Lastname'];?>_profile.jpg" alt="">
                </li>
            </ul>
            <button id="open_menu_btn"><i class="bi bi-list"></i></button>
            <button id="close_menu_btn"><i class="bi bi-x-lg"></i></button>
        </div>
    </nav>
    <!--================================ END OF NAVIGATION BAR ================================-->



    <!--================================ CONTENT CONTAINER ================================-->
    <!-- PROFILE CONTAINER -->
    <section class="container profile_container">
      <div class="left_profile">
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
            <div class="stall_name">
              <h3>
                <i class="bi bi-shop-window"></i>
                Unlimited and Refillable Lugaw
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
          <a href="aboutstore.php">
            <button type="button" class="edit-profile-btn btn">Edit Profile</button>
          </a>
        </div>
      </div>

      <div class="right_profile">
        <div class="top">
          <div class="border">
            <div class="views">
              <p class="label">Views</p>
              <p class="top_highlight"><i class="bi bi-eye"></i>&nbsp;11,143</p>
            </div>
          </div>
          <div class="border">
            <div class="hearts">
              <p class="label">Hearts</p>
              <p class="top_highlight"><i class="bi bi-heart"></i>&nbsp;1,669</p>
            </div>
          </div>
        </div>
        <div class="border">
          <div class="bottom">
            <p class="label">Today's Sales</p>
            <p id="value">P 2,576.00</p>
            <a href="dashboard.php">
              <button type="button" class="view-details-btn btn">View Details</button>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- ORDERS CONTAINER -->
    <section class="container orders_container">
      <div class="active_orders">
        <div class="title">
          <h3>Active Orders</h3>
        </div>

        <div class="active_orders_list">
          <div class="active_order_container">
            <div class="date">
              <p>Today 11:12PM</p>
            </div>
            <div class="active_order">
              <p>Jherdi Ramos | BSIT22</p>
              <div class="active_order_details">
                <div class="left">
                  <p>Item:<span>&nbsp; Carbonara</span></p>
                  <p>Quantity:<span>&nbsp; 2</span></p>
                  <p>Others:<span>&nbsp; None</span></p>
                </div>
                <div class="right">
                  <p>Total:<span>&nbsp;P 40.00</span></p>
                  <button type="button" class="view-details-btn btn btn-secondary">
                    <p>Take Order</p>
                    <i class="bi bi-arrow-right-circle-fill"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class="active_order_container">
            <div class="date">
              <p>Today 11:12PM</p>
            </div>
            <div class="active_order">
              <p>Jherdi Ramos | BSIT22</p>
              <div class="active_order_details">
                <div class="left">
                  <p>Item:<span>&nbsp; Carbonara</span></p>
                  <p>Quantity:<span>&nbsp; 2</span></p>
                  <p>Others:<span>&nbsp; None</span></p>
                </div>
                <div class="right">
                  <p>Total:<span>&nbsp;P 40.00</span></p>
                  <button type="button" class="view-details-btn btn btn-secondary">
                    <p>Take Order</p>
                    <i class="bi bi-arrow-right-circle-fill"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class="active_order_container">
            <div class="date">
              <p>Today 11:12PM</p>
            </div>
            <div class="active_order">
              <p>Jherdi Ramos | BSIT22</p>
              <div class="active_order_details">
                <div class="left">
                  <p>Item:<span>&nbsp; Carbonara</span></p>
                  <p>Quantity:<span>&nbsp; 2</span></p>
                  <p>Others:<span>&nbsp; None</span></p>
                </div>
                <div class="right">
                  <p>Total:<span>&nbsp;P 40.00</span></p>
                  <button type="button" class="view-details-btn btn btn-secondary">
                    <p>Take Order</p>
                    <i class="bi bi-arrow-right-circle-fill"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class="active_order_container">
            <div class="date">
              <p>Today 11:12PM</p>
            </div>
            <div class="active_order">
              <p>Jherdi Ramos | BSIT22</p>
              <div class="active_order_details">
                <div class="left">
                  <p>Item:<span>&nbsp; Fewa</span></p>
                  <p>Quantity:<span>&nbsp; 4</span></p>
                  <p>Others:<span>&nbsp; Hotdog instead of footlong</span></p>
                </div>
                <div class="right">
                  <p>Total:<span>&nbsp;P 40.00</span></p>
                  <button type="button" class="view-details-btn btn btn-secondary">
                    <p>Take Order</p>
                    <i class="bi bi-arrow-right-circle-fill"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="order_history">
        <div class="title">
          <h3>Order History</h3>
        </div>

        <div class="order_history_list">
          <div class="order_history_container">
            <div class="date">
              <p>10-21-21 11:12PM</p>
            </div>
            <div class="order_history_details_container">
              <div class="order_history_details">
                <p class="name">Albert Einstein | BSPhy31</p>
                <p>1 Chicken Pesto > P 20.00</p>
              </div>
              <div class="order_history_buttons">
                  <button type="button" class="view-details-btn btn delete-btn">Delete</button>
                  <button type="button" class="view-details-btn btn btn-secondary review-btn">Review</button>
              </div>
            </div>
          </div>
          <div class="order_history_container">
            <div class="date">
              <p>10-21-21 11:12PM</p>
            </div>
            <div class="order_history_details_container">
              <div class="order_history_details">
                <p class="name">Albert Einstein | BSPhy31</p>
                <p>1 Chicken Pesto > P 20.00</p>
              </div>
              <div class="order_history_buttons">
                  <button type="button" class="view-details-btn btn delete-btn">Delete</button>
                  <button type="button" class="view-details-btn btn btn-secondary review-btn">Review</button>
              </div>
            </div>
          </div>
          <div class="order_history_container">
            <div class="date">
              <p>10-21-21 11:12PM</p>
            </div>
            <div class="order_history_details_container">
              <div class="order_history_details">
                <p class="name">Albert Einstein | BSPhy31</p>
                <p>1 Chicken Pesto > P 20.00</p>
              </div>
              <div class="order_history_buttons">
                  <button type="button" class="view-details-btn btn delete-btn">Delete</button>
                  <button type="button" class="view-details-btn btn btn-secondary review-btn">Review</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================================ END OF CONTENT CONTAINER ================================-->


    <!-- JAVASCRIPT -->
    <script src="./SCRIPT.js"></script>
    <script type="text/javascript">
        var counter=1;
        setInterval(function(){
            document.getElementById('radio' + counter).checked=true;
            counter++;
            if(counter > 5){
                counter = 1;
            }
        },5000);
    </script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
        slidesPerView: 4.5,
        spaceBetween: 30,
        grabCursor: true
        });
    </script>

    <!-- SCROLL EFFECTS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>

<!-- JAVASCRIPT -->
<script src="./SCRIPT.js"></script>
</html>