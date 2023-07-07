<?php 
include 'database/featured-items.php';
?>


<div class="popUp__message__container">
    <!-- <form action="components/postOrder.php" method="POST"> -->
    <form action="" method="POST">
        <div class="popUp__message">
            <div class="popUp__item__details">
                <div class="image">

                </div>
                <div class="name_price">
                    <h4 name="item_name">Corndog</h4>
                    <p name="unit_price">Unit Price:<span>&nbsp;</span></p>

                    <p name="item_id"></p>

                </div>
                <div class="quantity">
                    <p id="label">Quantity</p>
                    <div class="input">
                        <i class="bi bi-dash"></i>
                        <p id="text" name="quantity_text">1</p>
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
                            <p class="summary_item_name">Item: <span>&nbsp;Corndog</span></p>
                            <p class="summary_item_quantity">Quantity: <span>&nbsp;2</span></p>
                        </div>
                        <div class="bottom">
                            <p>Others:<span>&nbsp;None</span></p>
                        </div>
                    </div>
                    <div class="right">
                        <p>Total:</p>
                        <h4 id="total_price">&nbsp;</h4>
                    </div>
                </div>
            </div>
            <div class="buttons">
                <?php if (isset($_SESSION['user_name']) && isset($_SESSION['password'])) { ?>
                    <button type="button" class="order-btn btn" id="close_btn">Cancel</button>
                    <button type="submit" class="order-btn btn">Place Order</button>
                <?php } else { ?>
                    <span class="material-symbols-outlined not-logged" id="close_btn">
                        close
                    </span>
                    <a href="#" onclick="performLogout()" class="not-logged btn">
                        <p>Please Login to Order</p>
                    </a>
                <?php } ?>
            </div>
        </div>

    </form>
</div>