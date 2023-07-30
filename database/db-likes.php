<?php
// include 'db-connection.php';

// $store_id = $_POST['store_id']; // Get the store_id from the AJAX request payload

// // Increment the likes count in the database based on the provided store_id
// $likesquery = "UPDATE tbl_stores SET likes = likes + 1 WHERE id = $store_id";$likesrsquery = "INSERT INTO tbl_likes (user_id, store_id) VALUES ('" . $_POST['id'] . "', $store_id)";


// $likesresult = mysqli_query($con, $likesquery);
// $likesrsresult = mysqli_query($con, $likesrsquery);

// if (!$likesresult || !$likesrsresult) {
//     die("Query failed: " . mysqli_error($con));
// }

// // Retrieve the updated likes count
// $likesCount = $con->query("SELECT likes FROM tbl_stores WHERE id = $store_id")->fetch_assoc()['likes'];

// // Return the updated likes count as a JSON response
// $response = array('success' => true, 'likes' => $likesCount);
// echo json_encode($response);

// $con->close();
?>

<?php
include 'db-connection.php';

// Sanitize the input to prevent SQL injection
$store_id = mysqli_real_escape_string($con, $_POST['store_id']);

// Increment the likes count in the database based on the provided store_id
$likesquery = "UPDATE tbl_stores SET likes = likes + 1 WHERE id = $store_id";
$likesrsquery = "INSERT INTO tbl_likes (user_id, store_id) VALUES ('" . mysqli_real_escape_string($con, $_POST['id']) . "', $store_id)";

$likesresult = mysqli_query($con, $likesquery);
$likesrsresult = mysqli_query($con, $likesrsquery);

if (!$likesresult || !$likesrsresult) {
    // Handle query errors gracefully, log the errors, and avoid displaying them to users
    die("Query failed.");
}

// Retrieve the updated likes count
$likesCount = $con->query("SELECT likes FROM tbl_stores WHERE id = $store_id")->fetch_assoc()['likes'];

// Return the updated likes count as a JSON response
$response = array('success' => true, 'likes' => $likesCount);
echo json_encode($response);

$con->close();
?>

