
<?php
    if (isset($_SESSION['user_name']) && isset($_SESSION['password'])) {

        $userId = $_SESSION['id'];
        
        $imagequery = "SELECT user_profile FROM tbl_users WHERE user_id = ?";
        $stmt = mysqli_prepare($con, $imagequery);
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        
        if ($stmt === false) {
            die("Error executing query: " . mysqli_error($con));
        }

        $result = mysqli_stmt_get_result($stmt);

        if ($result === false) {
            die("Error fetching result: " . mysqli_error($con));
        }
        
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Check if 'user_profile' field exists and is not null
            if (isset($row['user_profile']) && $row['user_profile'] !== null) {
                $image = '<img src="' . $row['user_profile'] . '" alt="">';
                // $image = "data:image/jpeg;base64,{$imageData}";
            } else {
                $image ='
                            <span class="material-symbols-outlined">
                                account_circle
                            </span>
                        ';
            }
        }
    }
?>