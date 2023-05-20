<!DOCTYPE html>

<html>

<head>

    <title>LOGIN</title>

    <link rel="stylesheet" type="text/css" href="loginStyle.css">

</head>

<body>

    
    <form action="login.php" method="post" id="login-box">

        <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>
        
        <div id="left">
            <img src="images/logo.png" id="logo">

            <div id="input">

                <input type="text" name="user_name" placeholder="Enter your student Number / username"><br>

                <input type="password" name="password" placeholder="Password"><br> 

                <button type="submit">Login</button>
            </div>
        </div>

        <div id="right">
            <img src="images/burger.png">
        </div>

    </form>

</body>

</html>