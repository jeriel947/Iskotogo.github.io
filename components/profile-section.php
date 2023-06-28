<?php include 'database/profile-pic.php'; ?>

<div class="process-status-message">
    <div class="success-message update-message">
        <span class="material-symbols-outlined close">
            close
        </span>
        <span class="material-symbols-outlined success">
            mood
        </span>
        <div class="texts">
            <h4>
                Success!
            </h4>
            <p>
                Your process has been completed.
            </p>
        </div>
    </div>

    <div class="error-message update-message">
        <span class="material-symbols-outlined close">
            close
        </span>
        <span class="material-symbols-outlined error">
            mood_bad
        </span>
        <div class="texts">
            <h4>
                Error!
            </h4>
            <p>
                An error occured.
            </p>
        </div>
    </div>
</div>

<section class="show-profile">
    <div class="profile-container">
        <i class="bi bi-x-square-fill close-profile"></i>
        <a href="#" onclick="performLogout()">
            <i class="bi bi-box-arrow-left" id="log-out-btn"></i>
        </a>
        <div class="profile-header-container">
            <div class="profile-header">
                <div class="img-container">
                    <div class="img-holder">
                        <?php echo $image; ?>
                    </div>
                    <div class="edit-user-image">
                        <span class="material-symbols-outlined">
                            edit
                        </span>
                    </div>
                </div>
                <h4 id="name">
                    <?php echo $_SESSION['Firstname'] . " " . $_SESSION['Lastname'] ?>
                </h4>
                <p id="section">
                    <?php echo $_SESSION['Section'] ?>
                </p>
                <div class="profile-label">
                    <p class="information-label">
                        Information
                    </p>
                    <p class="order-history-label">
                        Order History
                    </p>
                </div>
            </div>
        </div>

        <div class="mySwiper profile-history-container">
            <!-- INFORMATION -->
            <div class="swiper-wrapper">
                <div class="swiper-slide profile-information-details-container">
                    <div class="profile-information-details">
                        <div class="profile-information">
                            <i class="bi bi-circle-fill"></i>
                            <div class="detail">
                                <p class="label">Name</p>
                                <p class="name">
                                    <?php echo $_SESSION['Firstname'] . " " . $_SESSION['Lastname'] ?>
                                </p>
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-chevron-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </div>
                    <div class="profile-information-details">
                        <div class="profile-information">
                            <i class="bi bi-circle-fill"></i>
                            <div class="detail">
                                <p class="label">Section</p>
                                <p class="name">
                                    <?php echo $_SESSION['Section'] ?>
                                </p>
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-chevron-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </div>
                    <div class="profile-information-details">
                        <div class="profile-information">
                            <i class="bi bi-circle-fill"></i>
                            <div class="detail">
                                <p class="label">Student Number</p>
                                <p class="name">
                                    <?php echo $_SESSION['Studentid']; ?>
                                </p>
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-chevron-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </div>
                    <div class="profile-information-details">
                        <div class="profile-information">
                            <i class="bi bi-circle-fill"></i>
                            <div class="detail">
                                <p class="label">Password</p>
                                <p class="name">************</p>
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-chevron-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </div>
                </div>

                <!-- ORDER HISTORY -->
                <div class="swiper-slide profile-order-details-container">
                    <div class="order-history-card">
                        <p class="date">Today 11:12AM</p>
                        <div class="order-history-details">
                            <div class="image">
                                <img src="./images/Arroz Caldo.jpg" alt="">
                            </div>
                            <div class="details">
                                <p class="name"><span>2 </span>Carbonara</p>
                                <p class="prize">P 40.00</p>
                            </div>
                            <button class="btn">delete</button>
                        </div>
                    </div>
                    <div class="order-history-card">
                        <p class="date">Today 11:12AM</p>
                        <div class="order-history-details">
                            <div class="image">
                                <img src="./images/Arroz Caldo.jpg" alt="">
                            </div>
                            <div class="details">
                                <p class="name"><span>2 </span>Carbonara</p>
                                <p class="prize">P 40.00</p>
                            </div>
                            <button class="btn">delete</button>
                        </div>
                    </div>
                    <div class="end-line">
                        <div class="line"></div>
                        <p>end</p>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination profile-history-pagination"></div>

        </div>
    </div>
</section>