<?php
$conn = new mysqli('localhost', 'unn_w21037098', 'OMsai@123', 'unn_w21037098');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve image filenames from the database
$sql = "SELECT image_name FROM image_gallery";
$result = $conn->query($sql);
$imagePaths = array();

while ($row = $result->fetch_assoc()) {
  $imagePaths[] = "assets/images/" . $row['image_name'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Add your head content -->
</head>

<body>
  <div class="gallery-sidebar">
    <?php foreach ($imagePaths as $imagePath) { ?>
      <img src="<?php echo $imagePath; ?>" alt="Image">
    <?php } ?>
  </div>
</body>

</html>