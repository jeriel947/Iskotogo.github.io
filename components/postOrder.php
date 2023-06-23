<?php
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }  

        $sql = "INSERT INTO tbl_orders (item_id, store_id, customer_id, quantity, order_status) VALUES ()";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        ?>