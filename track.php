<?php 
// Connect to the database 

$host = 'localhost'; 

$user = 'unn_w21037098'; 

$password = 'OMsai@123'; 

$database = 'unn_w21037098'; 

$mysqli = new mysqli($host, $user, $password, $database); 

if ($mysqli->connect_error) { 

  die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error); 

} 

 

// Insert the page view or click event into the database 

$page = $_POST['page']; 

$element = isset($_POST['element']) ? $_POST['element'] : null; 

$timestamp = time(); 

$query = "INSERT INTO page_views (page, element, timestamp) VALUES (?, ?, ?)"; 

$stmt = $mysqli->prepare($query); 

$stmt->bind_param('ssi', $page, $element, $timestamp); 

$stmt->execute(); 

$stmt->close(); 

$mysqli->close();
