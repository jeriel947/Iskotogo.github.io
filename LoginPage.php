<!DOCTYPE html>

<html>

<head>
    <title>LOGIN</title>
    <!-- CSS -->
    <link rel="stylesheet" href="./CSS/MAIN.css">
    <link rel="stylesheet" href="./CSS/loginStyle.css">
    <link rel="stylesheet" href="./CSS/responsiveness.css">
    <!-- GOOGLE FONTS (POPPINS) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>

<div class="login-container">
    <?php 
        if (isset($_GET['error'])) {
            $errorMessage = $_GET['error'];
        } else {
            $errorMessage = "";
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate inputs
            if (empty($_POST['user_name']) || empty($_POST['password'])) {
                $errorMessage = "Please fill in all fields.";
            } else {
                // Check if the username and password match
                $username = $_POST['user_name'];
                $password = $_POST['password'];
        
                // Perform your validation logic here
                // Example: Check against a database or an authentication system
                // If the validation fails, set the error message
                if (!isValidCredentials($username, $password)) {
                    $errorMessage = "Invalid username or password.";
                }
            }
        }
    ?>

    <form action="login.php" method="post" id="login-box">        
        <?php if (!empty($errorMessage)) { ?>
            <p class="error"><?php echo $errorMessage; ?></p>
        <?php } ?>    
        
        <!-- MOBILE ELEMENTS -->
        <div class="round-background">
            <div class="image">
                <img src="images/loginBgImg.png">
            </div>
        </div>
        <div class="mobile-elems">
            <div class="image">
                <img src="images/logo.png">
            </div>
            <div class="text">
                <h4 id="school-name">
                    PUP
                </h4>
                <h3 id="sys-name">
                    Cafeteria Automation System
                </h3>
            </div>
        </div>
        <!-- MOBILE ELEMENTS -->

        <div id="left">
            <div class="image">
                <img src="images/logo.png" id="logo">
            </div>
            <div class="text">

            </div>
            <div id="input">
                <input type="text" name="user_name" placeholder="Student number/username" required><br>
                <input type="password" name="password" placeholder="Password" required><br> 
                <div class="btn login-btn">
                    <button class="btn" type="submit">Login</button>
                </div>
            </div>
        </div>

        <div id="right">
            <img src="images/burger.png">
        </div>

    </form>
</div>

</body>

</html>