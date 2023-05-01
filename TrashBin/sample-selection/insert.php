<?php
// Connect to the database
$mysqli = new mysqli("localhost", "root", "", "database");

// Check for errors
if ($mysqli->connect_error) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}

// Get the selected option from the AJAX request
$option = $_POST['option'];

// Insert the selected option into the database
$query = "INSERT INTO options (campus) VALUES ('$option')";
$result = $mysqli->query($query);

// Close the database connection
$mysqli->close();
?>
