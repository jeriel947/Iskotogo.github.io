<?php
    $id = $_GET['id'];
    $title = $_GET['title'];
    $tags = explode(',', $_GET['tags']);

    // Use the ID, title, and tags to query and retrieve other details of the stall
    // Perform your database query here using the $id, $title, and $tags variables

    // Example query
    $query = "SELECT * FROM stalls WHERE id = $id AND title = '$title' AND tag IN ('" . implode("','", $tags) . "')";
    // Execute the query and fetch the results

    // Display the retrieved stall details
?>
