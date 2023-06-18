<?php if (!isset($_SESSION['user_name']) && !isset($_SESSION['password'])) { ?>
    <div class="intro-message-container">
        <article class="intro-message">
            <button id="close-intro-message">
                <span class="material-symbols-outlined">
                    close
                </span>
            </button>
            <div class="circle-elem">
                <div class="image">
                    <img src="images/logo.png">
                </div>
            </div>
            <div class="content">
                <p id="school-name">Polytechnic University of the Philippines</p>
                <div class="texts">
                    <h2>
                        IskoToGo
                        <br>
                        Cafeteria Automation System
                    </h2>
                    <p>
                        hassle no more, your centralized university food ordering system is here
                    </p>
                </div>
                <a href="LoginPage.php" class="btn">
                    Order Now
                    <span class="material-symbols-outlined">
                        shopping_cart
                    </span>
                </a>
            </div>
        </article>
    </div>
<?php } ?>