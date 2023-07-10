<div class="vendor-navbar" id="<?php echo $navId; ?>">
    <div class="vendor-profile">
        <div class="image-background">
            <img src="./images/UNLI LUGAW STALL.png" alt="">
        </div>
        <div class="blurred-effect">
            <div class="image">
                <p>
                    <?php echo strtoupper(substr($storeName, 0, 1)); ?>                        
                </p>
            </div>
            <div class="stall-name">
                <?php echo $storeName; ?>
            </div>
        </div>
    </div>
    <ul>
        <li>
        <a href="VendorPage.php">
            <span class="material-symbols-outlined">
            overview_key
            </span>
            <p>
            Overview
            </p>
        </a>
        </li>
        <li>
        <a href="VendorOrders.php">
            <span class="material-symbols-outlined">
            receipt
            </span>
            <p>
            Orders
            </p>
        </a>
        </li>
        <li>
        <a href="VendorProducts.php">
            <span class="material-symbols-outlined">
            inventory_2
            </span>
            <p>
            Products
            </p>
        </a>
        </li>
        <li>
        <a href="VendorDashboard.php">
            <span class="material-symbols-outlined">
            dashboard
            </span>
            <p>
            Dashboard
            </p>
        </a>
        </li>
    </ul>
    <div class="logout-area">
        <a href="#" onclick="performLogout()">
            <span class="material-symbols-outlined">
                logout
            </span>
            <p>
                Logout
            </p>
        </a>
    </div>
</div>