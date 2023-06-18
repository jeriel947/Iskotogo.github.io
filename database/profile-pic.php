<?php
    $userId = $_SESSION['id'];
    
    $query = "SELECT user_profile FROM tbl_users WHERE user_id = $userId";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Check if 'user_profile' field exists and is not null
        if (isset($row['user_profile']) && $row['user_profile'] !== null) {
            $imageData = base64_encode($row['user_profile']);
            $image = "data:image/jpeg;base64,{$imageData}";
        } else {
            $image = './images/blank-user-image.png';
        }
    }
?>