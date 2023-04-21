<?php 
    session_start();

    $conn = mysqli_connect('localhost', 'root', '','db_users');

    if (isset($_POST['user_name']) && isset($_POST['password'])) {

        function validate($data){

            $data = trim($data);

            $data = stripslashes($data);

            $data = htmlspecialchars($data);

            return $data;

        }

            $user_name = validate($_POST['user_name']);

            $pass = validate($_POST['password']);

        if (empty($user_name)) {

            header("Location: index.php?error=student id is required");

            exit();

        }else if(empty($pass)){

            header("Location: index.php?error=Password is required");

            exit();

        }else{

            $sql = "SELECT * FROM tbl_users WHERE User_Name='$user_name' AND password='$pass'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {

                $row = mysqli_fetch_assoc($result);

                if ($row['User_Name'] === $user_name && $row['password'] === $pass && $row['user_type'] === '2'){

                    echo "Logged in!";

                    $_SESSION['stuent_id'] = $row['student_id'];

                    $_SESSION['user_name'] = $row['user_name'];

                    $_SESSION['id'] = $row['user_id'];

                    $_SESSION['Lastname'] = $row['Last_Name'];

                    $_SESSION['Firstname'] = $row['First_Name'];

                    $_SESSION['Middlename'] = $row['Middle_Name'];
                    
                    header("Location: HOME.php");

                    exit();

                }else if ($row['User_Name'] === $user_name && $row['password'] === $pass && $row['user_type'] === '1') {

                    echo "Logged in!";

                    $_SESSION['user_name'] = $row['user_name'];

                    $_SESSION['id'] = $row['user_id'];

                    $_SESSION['Lastname'] = $row['Last_Name'];

                    $_SESSION['Firstname'] = $row['First_Name'];

                    $_SESSION['Middlename'] = $row['Middle_Name'];
                    
                    header("Location: adminorders.php");

                } else{

                    header("Location: index.php?error=Incorect student id or password");

                    exit();

                }

            }else{

                header("Location: index.php?error=Incorect student id or password");

                exit();

            }

        }

    }else{

        header("Location: index.php");

        exit();

    }
?>