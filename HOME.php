<!DOCTYPE html>
<html lang="en">
<head>

    <?php 
        session_start();
        
        $con = mysqli_connect('localhost', 'root', '','db_store');
        $sql = "SELECT * from tbl_menu";
        $res = mysqli_query($con, $sql);
        $id=array();
        $orderName=array();
        $price=array();
        
        if ($res->num_rows > 0) {
            // output data of each row
            while($row = $res->fetch_assoc()) {
                array_push($id, $row['id']);
                array_push($orderName, $row['order_name']);
                array_push($price, $row['price']);
            }
        } else {
            echo "0 results";
        }
    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME</title>
    <link rel="shortcut icon" type="image/x-icon" href="./imgs/LOGO.png"/>

    <!-- CSS -->
    <link rel="stylesheet" href="./CSS/MAIN.css">
    <link rel="stylesheet" href="./CSS/HOME.css">
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



    <!--================================ CONTAINER ================================-->
    <section class="container homepage_container">
        <!--================== HOME - NAVIGATION ===================-->
        <div class="home_navigation_section">
            <!--CAROUSEL-->
            <div class="carousel_container">
                <div class="slider">
                    <div class="slide">
                        <input type="radio" name="radio-btn" id="radio1">
                        <input type="radio" name="radio-btn" id="radio2">
                        <input type="radio" name="radio-btn" id="radio3">
                        <input type="radio" name="radio-btn" id="radio4">
                        <input type="radio" name="radio-btn" id="radio5">

                        <div class="img_container first">
                            <img src="./imgs/CarItem1.png" alt="...">
                        </div>
                        <div class="img_container">
                            <img src="./imgs/CarItem1.png" alt="...">
                        </div>
                        <div class="img_container">
                            <img src="./imgs/CarItem1.png" alt="...">
                        </div>
                        <div class="img_container">
                            <img src="./imgs/CarItem1.png" alt="...">
                        </div>
                        <div class="img_container">
                            <img src="./imgs/CarItem1.png" alt="...">
                        </div>

                        <div class="nav_auto">
                            <div class="a-b1"></div>
                            <div class="a-b2"></div>
                            <div class="a-b3"></div>
                            <div class="a-b4"></div>
                            <div class="a-b5"></div>
                        </div>
                    </div>

                    <div class="nav-m">
                        <label for="radio1" class="m-btn"></label>
                        <label for="radio2" class="m-btn"></label>
                        <label for="radio3" class="m-btn"></label>
                        <label for="radio4" class="m-btn"></label>
                        <label for="radio5" class="m-btn"></label>
                    </div>
                </div>

            </div>
            <!--FEATURED ITEMS-->
            <div class="featured_items">
                <div class="featured_items_texts">
                    <h3>
                        Featured Items
                    </h3>
                </div>
                

                <div class="swiper mySwiper featured_items_container">
                    <div class="swiper-wrapper content">
                        <div id="featured"></div>
                        <div id="test"></div>
                        
                        <!-- <div class="swiper-slide card">
                            <div class="card_content">
                                <div class="image">
                                    <img src="./imgs/FEWA.webp" alt="">
                                </div>

                                <div class="fItem_details">
                                    <div class="fItem_texts">
                                        <p id="item_name">FEWA</p>
                                        <P id="item_price">P 39.00</P>
                                    </div>
                                    <div class="icon">
                                        <i class="bi bi-chevron-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide card">

                            <div class="card_content">

                                <div class="image">
                                    <img src="./imgs/SUBMARINE.webp" alt="">
                                </div>

                                <div class="fItem_details">
                                    <div class="fItem_texts">
                                        <p id="item_name">SUBMARINE</p>
                                        <P id="item_price">P 40.00</P>
                                    </div>

                                    <div class="icon">
                                        <i class="bi bi-chevron-right"></i>
                                    </div>
                                    
                                </div>

                            </div>

                        </div>

                        <div class="swiper-slide card">
                            <div class="card_content">
                                <div class="image">
                                    <img src="./imgs/CLUBHOUSE.jpg" alt="">
                                </div>

                                <div class="fItem_details">
                                    <div class="fItem_texts">
                                        <p id="item_name">CLUBHOUSE</p>
                                        <P id="item_price">P 39.00</P>
                                    </div>
                                    <div class="icon">
                                        <i class="bi bi-chevron-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide card">
                            <div class="card_content">
                                <div class="image">
                                    <img src="./imgs/CORNDOG.jpg" alt="">
                                </div>

                                <div class="fItem_details">
                                    <div class="fItem_texts">
                                        <p id="item_name">CORNDOG</p>
                                        <P id="item_price">P 15.00</P>
                                    </div>
                                    <div class="icon">
                                        <i class="bi bi-chevron-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide card">
                            <div class="card_content">
                                <div class="image">
                                    <img src="./imgs/FEWA.webp" alt="">
                                </div>

                                <div class="fItem_details">
                                    <div class="fItem_texts">
                                        <p id="item_name">FEWA</p>
                                        <P id="item_price">P 39.00</P>
                                    </div>
                                    <div class="icon">
                                        <i class="bi bi-chevron-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide card">
                            <div class="card_content">
                                <div class="image">
                                    <img src="./imgs/SUBMARINE.webp" alt="">
                                </div>

                                <div class="fItem_details">
                                    <div class="fItem_texts">
                                        <p id="item_name">SUBMARINE</p>
                                        <P id="item_price">P 40.00</P>
                                    </div>
                                    <div class="icon">
                                        <i class="bi bi-chevron-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    </div>
                </div>

            </div>

            <!--CAFETERIAS-->

            <div class="cafeterias">
                <div class="cafeterias_texts">
                    <h3>
                        Cafeterias/Stalls
                    </h3>
                </div>
                
                <div class="cafeterias__container">
                    <form method="post">
                        <article class="cafeteria" id="caf1">
                            <div class="shadow"></div>
                            <h3>Unlimited and Refillable Lugaw</h3>
                            <div class="cafeteria_tags">
                                <p>lugaw</p>
                                <p>lumpia</p>
                                <p>egg</p>
                            </div>
                            <a href="">
                                <p>View Stall</p>
                                <i class="bi bi-arrow-right-circle-fill"></i>
                            </a>
                        </article>
                    </form>

                    <article class="cafeteria" id="caf2">
                        <div class="shadow"></div>
                        <h3>PUP Lagoon Food Stall 1</h3>
                        <div class="cafeteria_tags">
                            <p>carbonara</p>
                            <p>submarine</p>
                            <p>corndog</p>
                        </div>
                        <a href="#">
                            <p>View Stall</p>
                            <i class="bi bi-arrow-right-circle-fill"></i>
                        </a>
                    </article>
                </div>
            </div>
        </div>

        <!--================== HOME - ORDERS ===================-->
        <div class="my_orders_section">
            <div class="my_orders_texts">
                <span class="material-symbols-outlined">receipt</span>
                <h3>My Orders</h3>
            </div>

            <div class="my_orders" id="order1">
                <div class="my_order_profile">
                    <div class="image">
                        <img src="./imgs/SUBMARINE.webp" alt="">
                    </div>
                    <div class="my_order_profile_details">
                        <h4>Carbonara</h4>
                        <p class="my_order_price">Unit Price:<span>&nbsp; P 20.00</span></p>
                        <p class="my_order_stall"><i class="bi bi-shop-window"></i>
                            PUP Lagoon Food Stall 1
                        </p>
                    </div>
                </div>
                <div class="my_order_details">
                    <div class="item_name_quantity order_detail">
                        <div class="item_name">
                            <p class="label">Item:</p>
                            <p class="text">Carbonara</p>
                        </div>
                        <div class="item_quantity">
                            <p class="label">Quantity:</p>
                            <p class="text">2</p>
                        </div>
                    </div>
                    <div class="item_others order_detail">
                        <p class="label">Others:</p>
                        <p class="text">None</p>
                    </div>
                    <div class="my_order_total order_detail">
                        <p class="label">Total:</p>
                        <p class="text">P 40.00</p>
                    </div>
                </div>
            </div>
            
            <div class="my_orders" id="order2">
                <div class="my_order_profile">
                    <div class="image">
                        <img src="./imgs/FEWA.webp" alt="">
                    </div>
                    <div class="my_order_profile_details">
                        <h4>FEWA</h4>
                        <p class="my_order_price">Unit Price:<span>&nbsp; P 20.00</span></p>
                        <p class="my_order_stall"><i class="bi bi-shop-window"></i>
                            FEWA Stall
                        </p>
                    </div>
                </div>
                <div class="my_order_details">
                    <div class="item_name_quantity order_detail">
                        <div class="item_name">
                            <p class="label">Item:</p>
                            <p class="text">FEWA</p>
                        </div>
                        <div class="item_quantity">
                            <p class="label">Quantity:</p>
                            <p class="text">4</p>
                        </div>
                    </div>
                    <div class="item_others order_detail">
                        <p class="label">Others:</p>
                        <p class="text">Hotdog istead of footlong. No Cheese</p>
                    </div>
                    <div class="my_order_total order_detail">
                        <p class="label">Total:</p>
                        <p class="text">P 80.00</p>
                    </div>
                </div>
            </div>
        </div>

        <!--POPUP MESSAGE-->
        <div class="popUp__message__container">
            <div class="popUp__message">
                <div class="popUp__item__details">
                    <div class="image">
                        <img src="./imgs/CORNDOG.jpg" alt="">
                    </div>
                    <div class="name_price">
                        <h4>Corndog</h4>
                        <p>Unit Price:<span>&nbsp;P 15.00</span></p>
                    </div>
                    <div class="quantity">
                        <p id="label">Quantity</p>
                        <div class="input">
                            <i class="bi bi-dash"></i>
                            <p id="text">1</p>
                            <i class="bi bi-plus"></i>
                        </div>                        
                    </div>
                </div>
                <div class="other_details">
                    <p>Other details (please specify)</p>
                    <input type="text" class="other_details_text" name="Other Details" placeholder="e.g: no hotdog; additional fork; etc." autocomplete="off">
                </div>
                <div class="order_summary">
                    <p>Summary</p>
                    <div class="content">
                        <div class="left">
                            <div class="top">
                                <p>Item: <span>&nbsp;Corndog</span></p>
                                <p>Quantity: <span>&nbsp;2</span></p>
                            </div>
                            <div class="bottom">
                                <p>Others: <span>&nbsp;None</span></p>
                            </div>
                        </div>
                        <div class="right">
                            <p>Total:</p>
                            <h4 id="total_price">&nbsp;P 30.00</h4>
                        </div>
                    </div>
                </div>
                <div class="buttons">
                    <button type="button" class="order-btn btn" id="close_btn">Cancel</button>
                    <button type="submit" class="order-btn btn">Place Order</button>
                </div>
            </div>
        </div>
    </section>
    <!--================================ END OF CONTAINER ================================-->
    
    <script type="text/javascript">

        //test
        const testDisplay = document.querySelector('#test')

        
        
        const populaTetest = () => {
            orderNames = <?php echo json_encode($orderName); ?>;

            const titleBlock = document.createElement('div')
            const titleHeading = document.createElement('h3')
            const appendHeading = document.createElement('h3')
            
            titleHeading.textContent = "javascript input"
            appendHeading.textContent = orderNames.length

            // for(int aaa = 0; aaa < orderNames.length; aaa++){
            //     const append = document.createElement('h3')
            //     append.textContent = "test"
            //     titleBlock.append(append)
            // }

            titleBlock.append(titleHeading)
            titleBlock.append(appendHeading)

            testDisplay.append(titleBlock)
        }
        populaTetest()
        //test

        const featuredDisplay = document.querySelector('#featured')

        id = <?php echo json_encode($id); ?>;
        orderName = <?php echo json_encode($orderName); ?>;
        price = <?php echo json_encode($price); ?>;

        index = 0;
        const populateFeature = () => {
            id.forEach(feature => {
                // Create a div element with the class "swiper-slide" and "card"
                const swiperSlide = document.createElement("div");
                swiperSlide.classList.add("swiper-slide", "card");

                // Create a div element with the class "card_content"
                const cardContent = document.createElement("div");
                cardContent.classList.add("card_content");

                // Create a div element with the class "image"
                const image = document.createElement("div");
                image.classList.add("image");

                // Create an img element with the src "./imgs/SUBMARINE.webp" and alt attribute
                const img = document.createElement("img");
                img.setAttribute("src", "./imgs/SUBMARINE.webp");

                // Append the img element to the image element
                image.append(img);

                // Create a div element with the class "fItem_details"
                const fItemDetails = document.createElement("div");
                fItemDetails.classList.add("fItem_details");

                // Create a div element with the class "fItem_texts"
                const fItemTexts = document.createElement("div");
                fItemTexts.classList.add("fItem_texts");

                // Create a p element with the id "item_name" and text content "SUBMARINE"
                const itemName = document.createElement("p");
                itemName.setAttribute("id", "item_name");
                itemName.textContent = "orderName[0]";

                // Create a p element with the id "item_price" and text content "P 40.00"
                const itemPrice = document.createElement("p");
                itemPrice.setAttribute("id", "item_price");
                itemPrice.textContent = "price[0]";

                // Append the itemName and itemPrice elements to the fItemTexts element
                fItemTexts.append(itemName);
                fItemTexts.append(itemPrice);

                // Create a div element with the class "icon"
                const icon = document.createElement("div");
                icon.classList.add("icon");

                // Create an i element with the class "bi bi-chevron-right"
                const i = document.createElement("i");
                i.classList.add("bi", "bi-chevron-right");

                // Append the i element to the icon element
                icon.append(i);

                // Append the image, fItemTexts, and icon elements to the fItemDetails element
                fItemDetails.append(fItemTexts);
                fItemDetails.append(icon);
                
                // Append the fItemDetails element to the cardContent element
                cardContent.append(image);
                cardContent.append(fItemDetails);

                // Append the cardContent element to the swiperSlide element
                swiperSlide.append(cardContent);
                
                featuredDisplay.append(swiperSlide)
                
                index+=1
            })
        }
        populateFeature()
    </script>

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

    <!-- SHOW/HIDE POP MESSAGE -->
    <script>
    const showPopup = document.querySelectorAll('.card_content');
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
    </script>
</body>

<!-- JAVASCRIPT -->
<script src="./SCRIPT.js"></script>


</html>