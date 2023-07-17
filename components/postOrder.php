<?php
include $_SERVER['DOCUMENT_ROOT'] . '/capstone/Prototype/database/db-connection.php';

// Retrieve the data from the AJAX request
$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);

// Debugging code - check the JSON data and the received $data variable
file_put_contents('debug.json', $jsonData);
file_put_contents('debug.txt', print_r($data, true));

// Check if the JSON data was successfully decoded
if ($data === null) {
  $response = array('success' => false, 'message' => 'Failed to decode JSON data');
} else {
  // Extract the data
  $item = $data['item'];
  $price = $data['price'];
  $quantity = $data['quantity'];

  // Perform the database update
  $query = "INSERT INTO tbl_orders (item, price, quantity) VALUES (?, ?, ?)";
  $stmt = mysqli_prepare($con, $query);

  if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sss", $item, $price, $quantity);
    mysqli_stmt_execute($stmt);

    // Check if the database update was successful
    if (mysqli_stmt_affected_rows($stmt) > 0) {
      // Database update successful
      $response = array('success' => true, 'message' => 'Order inserted successfully');
    } else {
      // Database update failed
      $response = array('success' => false, 'message' => 'Failed to insert order');
    }

    mysqli_stmt_close($stmt);
  } else {
    // Error preparing the statement
    $response = array('success' => false, 'message' => 'Failed to prepare statement');
  }
}

// Send the response back to the client as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>