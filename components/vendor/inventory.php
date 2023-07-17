<?php include 'database/vendor-inventory.php'; ?>

<?php 
    $successMessage = "Item successfully updated";
    $failMessage = "Error updating the item. Please try again.";
    include 'components/process-message.php'; 
?>

<div class="add-item-modal">
    <div class="add-item-container">
        <div class="illustration">
            <img src="images/messages/add-item.svg" alt="">
        </div>
        <form id="add-item-form" method="POST" action="controllers/add-vendor-item.php">
            <div class="form-input">
                <label for="item-name">Item Name</label>
                <input type="text" id="item-name" name="item-name" placeholder="burger, hotdog, etc." required>
            </div>
            <div class="form-input">
                <label for="item-price">Item Price</label>
                <input type="number" id="item-price" name="item-price" placeholder="Php 0.00" required>
            </div>
            <div class="form-input">
                <label for="item-stock">Stock</label>
                <input type="number" id="item-stock" name="item-stock" placeholder="0" required>
            </div>
            <div class="form-input">
                <label for="item-image">Item Image</label>
                <input type="file" id="item-image" name="item-image" accept="image">
            </div>
            <div class="buttons">
                <button type="button" class="cancel-btn btn">Cancel</button>
                <button type="submit" class="save-btn btn">Add</button>
            </div>
        </form>
    </div>
</div>
<div class="delete-item-modal">
    <div class="delete-item-container">
        <div class="image">
            <img src="images/messages/delete.svg" alt="">
        </div>
        <div class="texts">
            <p>Are you sure you want to delete this item?</p>
        </div>
        <div class="buttons">
            <button class="cancel-btn btn">Cancel</button>
            <button class="confirm-btn btn">Yes</button>
        </div>
    </div>
</div>
<div class="edit-item-modal">
    <div class="edit-item-container">
        <div class="save-image">
            <img src="images/messages/save.svg" alt="">
        </div>
        <div class="image">
            <img src="" alt="">
        </div>
        <div class="item-details">
            <div class="form-input">
                <label for="item-name">Item Name</label>
                <input type="text" id="item-name" name="item-name" placeholder="Stall 1">
            </div>
            <div class="form-input">
                <label for="item-price">Item Price</label>
                <input type="number" id="item-price" name="item-price" placeholder="Php 0.00" step="any">
            </div>
            <div class="form-input">
                <label for="item-stock">Item Stock</label>
                <input type="number" id="item-stock" name="item-stock" placeholder="0" step="any">
            </div>
        </div>
        <div class="buttons">
            <button class="cancel-btn btn">Discard</button>
            <button class="save-btn btn">Save</button>
        </div>
    </div>
</div>
<div class="inventory-container">
    <?php if (!empty($items)): ?>
    <?php foreach ($items as $item): ?>
    <div class="inventory-card">
        <p class="item-id" hidden>
            <?php echo $item['itemId']; ?>
        </p>
        <div class="image">
            <?php echo $item['menu_image']; ?>
        </div>
        <div class="inventory-item-details">
            <p class="item-name">
                <?php echo $item['name']; ?>
            </p>
            <p class="item-price">
                Php 
                <span>
                    <?php echo $item['price']; ?>
                </span>
            </p>
            <p class="item-stock">
                Stock: 
                <span>
                    <?php echo $item['inventory']; ?>                  
                </span>
            </p>
        </div>
        <div class="buttons">
            <span class="delete-item-btn material-symbols-outlined">
                delete
            </span>
            <button class="edit-item-btn btn">Edit</button>
        </div>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
        <p>Empty Inventory</p>
    <?php endif; ?>
</div>

<div class="add-item-btn">
    <span class="material-symbols-outlined">
        add
    </span>
</div>