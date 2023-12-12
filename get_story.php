<?php
$conn = new mysqli('localhost', 'unn_w21037098', 'OMsai@123', 'unn_w21037098');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve image filenames from the database
$sql = "SELECT image_name FROM  story_image";
$result = $conn->query($sql);
$imagePaths = array();
while ($row = $result->fetch_assoc()) {
    $imagePaths[] = "assets/story_img/" . $row['image_name'];
}

$conn->close();

// Return the image paths as a JSON response
echo json_encode($imagePaths);
?>