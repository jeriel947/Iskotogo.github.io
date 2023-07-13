<div class="active_orders_list">
    <?php include 'database/active-orders.php'; ?>

    <?php if (!empty($active_orders)): ?>
    <?php foreach ($active_orders as $order): ?>
        <div class="active_order_container">
            <div class="date">
                <p>
                    <?php echo $order['date']; ?>
                </p>
            </div>
            <div class="active_order">
                <div class="order-image image">
                    <?php echo $order['menuImage']; ?>
                </div>
                <div class="active_order_details">
                    <h4 class="item-name">
                        <?php echo $order['itemName']; ?>
                    </h4>
                    <div class="customer">
                        <div class="image">
                            <?php echo $order['customerImage']; ?>
                        </div>
                        <p class="customer-name">
                            <?php echo $order['customerName']; ?>
                        </p>
                    </div>
                    <div class="total-price">
                        <span>Total:</span>
                        <p class="item-total-price">
                            <?php echo $order['totalPrice']; ?>                                                    
                        </p>
                        <p class="base-price" hidden>
                            <?php echo $order['itemPrice']; ?>
                        </p>
                        <p class="order-quantity" hidden>
                            <?php echo $order['itemQuantity']; ?>
                        </p>
                        <p class="order-id" hidden>
                            <?php echo $order['orderId']; ?>                        
                        </p>
                    </div>
                </div>
                <button type="button" class="view-details-btn btn btn-secondary">
                    <p>View Order</p>
                    <i class="bi bi-arrow-right-circle-fill"></i>
                </button>
            </div>
        </div>
    <?php endforeach; ?>
    <?php else: ?>
        <p>Empty Orders</p>
    <?php endif; ?>
    <?php include 'components/vendor/take-order.php'; ?>
</div>
