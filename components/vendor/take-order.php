<?php 
    $successMessage = "Order is ready for pickup.";
    $failMessage = "Error delivering the order. Please try again.";
    include 'components/process-message.php'; 
?>
<div class="take-order-container">
    <div class="take-order-card">
        <div class="order-basic-details">
            <div class="image">
                <img src="images/CORNDOG.jpg" alt="">
            </div>
            <div class="item-name-price">
                <h4>
                    Item Name
                </h4>
                <div class="detail-container base-price">
                    <span>Unit Price:</span>
                    <p></p>
                </div>
                <div class="customer-details">
                    <div class="image">
                        <?php echo $order['customerImage']; ?>
                    </div>
                    <p class="customer-name">
                        <?php echo $order['customerName']; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="order-details">
            <div class="detail-container order-quantity">
                <span>Quantity:</span>
                <p>1</p>
            </div>
            <div class="detail-container order-others">
                <span>Other details:</span>
                <p>None</p>
            </div> 
            <div class="detail-container order-total">
                <span>Total:</span>
                <p>Php 110.00</p>
            </div>
        </div>
        <div class="take-order-btns">
            <button class="btn cancel-btn">Cancel</button>
            <button class="btn take-order-btn">Finish Order</button>
        </div>
    </div>
</div>