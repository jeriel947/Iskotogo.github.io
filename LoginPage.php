<!DOCTYPE html>

<html>

<head>
    <title>LOGIN</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />
    <!-- BOOTSTRAP CSS-->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
        crossorigin="anonymous"
    >
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
    
    <?php if (!empty($errorMessage)) { ?>
        <p class="error"><?php echo $errorMessage; ?></p>
    <?php } ?>    

    <form action="login.php" method="post" id="login-box">        
        
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
                <input type="text" name="user_name" placeholder="Student number/username" required>
                <input type="password" name="password" placeholder="Password" required>
                <div class="btn login-btn">
                    <button class="btn btn-primary" type="submit">
                        <p>Login</p>
                    </button>
                </div>
            </div>
        </div>

        <div id="right">
            <img src="images/burger.png">
        </div>

    </form>
</div>

<script type="text/javascript">
    const errorMsg = document.querySelector('.error');
    const input = document.querySelector('input');

    input.addEventListener('input', function() {
        errorMsg.style.display = 'none';
    });
</script>
<!-- BOOTSTRAP JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>