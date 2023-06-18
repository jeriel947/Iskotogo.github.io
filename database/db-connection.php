<?php
    session_start();

    $con = mysqli_connect('localhost', 'root', '', 'db_iskotogo'); // For XAMPP
    //$con = mysqli_connect('localhost', 'iskotogo', '13579','db_iskotogo'); // For GoDaddy
    
    // Check if the connection was successful
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>