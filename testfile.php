<head>

    <?php
    session_start();

    $con = mysqli_connect('localhost', 'root', '', 'db_iskotogo');

    // Check if the connection was successful
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME</title>
    <link rel="shortcut icon" type="image/x-icon" href="./images/LOGO.png" />

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
    <div class="featured_items">
        <div class="featured_items_texts">
            <h3>
                Featured Items
            </h3>
        </div>

        <?php
        $query = "SELECT item_name, item_price, item_image, store_id FROM tbl_menu GROUP BY store_id";
        $result = mysqli_query($con, $query);

        // Check if the query was successful
        if ($result) {
            $items = array();

            // Iterate over the result set and populate the $items array
            while ($row = mysqli_fetch_assoc($result)) {
                $imageData = base64_encode($row['item_image']);
                $items[] = array(
                    'name' => $row['item_name'],
                    'price' => $row['item_price'],
                    'image' => $imageData,
                    'store_id' => $row['store_id']
                );
            }

            // Free the result set
            mysqli_free_result($result);

            // Close the database connection
            mysqli_close($con);
        } else {
            // Query execution failed
            die("Error executing query: " . mysqli_error($con));
        }


        ?>

        <div class="swiper mySwiper featured_items_container">
            <div class="swiper-wrapper content">
                <?php foreach ($items as $item): ?>
                    <div class="swiper-slide card">
                        <div class="card_content">
                            <div class="image">
                                <img src="data:image/jpeg;base64,<?php echo $item['image']; ?>" alt="">
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




    <div class="popUp__message__container">
        <div class="popUp__message">
            <div class="popUp__item__details">
                <div class="image">
                    <img src="./images/CORNDOG.jpg" alt="">
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
                <input type="text" class="other_details_text" name="Other Details"
                    placeholder="e.g: no hotdog; additional fork; etc." autocomplete="off">
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


    <script type="text/javascript">
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