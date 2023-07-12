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
                        <p>
                            <?php echo $order['totalPrice']; ?>                                                    
                        </p>
                    </div>
                </div>
                <button type="button" class="view-details-btn btn btn-secondary">
                    <p>Take Order</p>
                    <i class="bi bi-arrow-right-circle-fill"></i>
                </button>
            </div>
            <?php include 'components/vendor/take-order.php'; ?>
        </div>
    <?php endforeach; ?>
    <?php else: ?>
        <p>Empty Orders</p>
    <?php endif; ?>
</div>
