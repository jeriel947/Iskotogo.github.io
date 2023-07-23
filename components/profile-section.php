<?php include 'database/profile-pic.php'; ?>

<?php 
    $successMessage = "Image successfully uploaded.";
    $failMessage = "Error uploading image. Please try again.";
    include 'components/process-message.php'; 
?>

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
                    <?php echo $_SESSION['section'] ?>
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
                        <div class="profile-information user-name-container">
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
                        <div class="profile-information user-section-container">
                            <i class="bi bi-circle-fill"></i>
                            <div class="detail">
                                <p class="label">Section</p>
                                <p class="name">
                                    <?php echo $_SESSION['section'] ?>
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
                        <div class="profile-information user-studnum-container">
                            <i class="bi bi-circle-fill"></i>
                            <div class="detail">
                                <p class="label">Student Number</p>
                                <p class="name">
                                    <?php echo $_SESSION['studentId']; ?>
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
                        <div class="profile-information user-pass-container">
                            <i class="bi bi-circle-fill"></i>
                            <div class="detail">
                                <p class="label">Password</p>
                                <p class="name">
                                    <?php 
                                        $password = $_SESSION['password']; 
                                        $maskedPassword = str_repeat('*', strlen($password));
                                        echo $maskedPassword;
                                    ?>
                                </p>
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

        <form id="edit-user-profile-form" method="POST" action="controllers/update-user-details.php">
            <div class="image">
                <img src="images/messages/edit-profile.svg" alt="">
            </div>
            <div class="form-input">
                <label for="user-name">Name</label>
                <input type="text" id="user-name" name="user-name" placeholder="" required disabled>
            </div>
            <div class="group-form-input">
                <div class="form-input">
                    <label for="user-section">Section</label>
                    <input type="text" id="user-section" name="user-section" placeholder="BSIT 1-1">
                </div>
                <div class="form-input">
                    <label for="stud-number">Student Number</label>
                    <input type="text" id="stud-number" name="stud-number" placeholder="0" required disabled>
                </div>
            </div>
            <div class="form-input">
                <label for="user-password">Password</label>
                <input type="password" id="user-password" name="user-password" required>
            </div>
            <div class="buttons">
                <button type="button" class="cancel-btn btn">Cancel</button>
                <button type="submit" class="save-btn btn">Save</button>
            </div>
        </form>
    </div>
</section>