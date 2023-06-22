<link rel="stylesheet" href="./CSS/empty-orders.css">

<section>
    <div class="empty-orders-container">
        <div class="image">
            <img src="images/no-data.svg" alt="">
        </div>
        <div class="text">
            <p>
                You don't have existing orders.
            </p>
            <a href="<?php echo $orderNorHref; ?>" >
                <p>
                    <?php echo $emptyOrdersText; ?>
                </p>    
            </a>
        </div>
    </div>
</section>