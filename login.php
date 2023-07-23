<?php 
    include 'database/db-connection.php';

    // TEMPORARY (LESS SECURED): Please remove/comment this once the registration form WITH the hashed password has been implemented
    if (isset($_POST['user_name']) && isset($_POST['password'])) {
        $user_name = $_POST['user_name'];
        $pass = $_POST['password'];

        // Validate inputs
        $user_name = trim($user_name);
        $pass = trim($pass);
        $user_name = stripslashes($user_name);
        $pass = stripslashes($pass);
        $user_name = htmlspecialchars($user_name);
        $pass = htmlspecialchars($pass);

        if (empty($user_name) || empty($pass)) {
            header("Location: LoginPage.php?error=Student ID and password are required");
            exit();
        } else {
            $sql = "SELECT * FROM tbl_users WHERE User_Name = '$user_name'";
            $result = mysqli_query($con, $sql);

            if ($result && mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['password'] === $pass) {
                    echo "Logged in!";
                    $_SESSION['user_name'] = $row['User_Name'];
                    $_SESSION['password'] = $row['password'];
                    $_SESSION['user_profile'] = $row['user_profile'];
                    $_SESSION['id'] = $row['user_id'];
                    $_SESSION['Lastname'] = $row['Last_Name'];
                    $_SESSION['Firstname'] = $row['First_Name'];
                    $_SESSION['Middlename'] = $row['Middle_Name'];
                    $_SESSION['user_type'] = $row['user_type'];

                    if ($row['user_type'] === '2') {
                        $_SESSION['section'] = $row['section'];
                        $_SESSION['studentId'] = $row['student_id'];

                        header("Location: HomePage.php");
                        exit();                    
                    } elseif ($row['user_type'] === '1') {
                        header("Location: VendorPage.php");
                        exit();                    
                    } elseif ($row['user_type'] === '3') {
                        header("Location: Admin.php");
                        exit();                    
                    }
                } else {
                    header("Location: LoginPage.php?error=Incorrect student ID or password");
                    exit();
                }
            } else {
                header("Location: LoginPage.php?error=Incorrect student ID or password");
                exit();
            }
        }
    } else {
        header("Location: index.php");
        exit();
    }


    // FOR HASHED PASSWORDS (MORE SECURED): Please uncomment this once the registration form WITH the hashed password has been implemented
    // if (isset($_POST['user_name']) && isset($_POST['password'])) {

    //     $user_name = $_POST['user_name'];
    //     $pass = $_POST['password'];

    //     // Validate Inputs
    //     $user_name = trim($user_name);
    //     $pass = trim($pass);
    //     $user_name = stripcslashes($user_name);
    //     $pass = stripslashes($pass);
    //     $user_name = htmlspecialchars($user_name);
    //     $pass = htmlspecialchars($pass);

    //     if (empty($user_name) || empty($pass)) {
    //         header("Location: LoginPage.php?error=Student ID and password are required");
    //         exit();
    //     } else {
    //         $sql = "SELECT * FROM tbl_users WHERE User_Name = ?";
    //         $stmt = mysqli_prepare($con, $sql);
    //         mysqli_stmt_bind_param($stmt, "s", $user_name);
    //         mysqli_stmt_execute($stmt);
    //         $result = mysqli_stmt_get_result($stmt);
    //         $row = mysqli_fetch_assoc($result);

    //         if ($row && password_verify($pass, $row['password'])) {
    //             echo "Logged in!";
    //             $_SESSION['user_name'] = $row['User_Name'];
    //             $_SESSION['password'] = $row['password'];
    //             $_SESSION['user_profile'] = $row['user_profile'];
    //             $_SESSION['id'] = $row['user_id'];
    //             $_SESSION['Lastname'] = $row['Last_Name'];
    //             $_SESSION['Firstname'] = $row['First_Name'];
    //             $_SESSION['Middlename'] = $row['Middle_Name'];
    //             $_SESSION['user_type'] = $row['user_type'];

    //             if ($row['user_type'] === '2') {
    //                 header("Location: HomePage.php");
    //             } elseif ($row['user_type'] === '1') {
    //                 header("Location: VendorPage.php");
    //             } elseif ($row['user_type'] === '3') {
    //                 header("Location: Admin.php");
    //             }
    //             exit();
    //         } else {
    //             header("Location: LoginPage.php?error=Incorrect Username or Password");
    //             exit();
    //         }
    //     } 
    // } else {
    //     header("Location: index.php");
    //     exit();
    // }
?>