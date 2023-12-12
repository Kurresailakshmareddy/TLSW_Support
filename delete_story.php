<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["indexes"])) {
        $indexesToDelete = json_decode($_POST["indexes"]);
        if (!empty($indexesToDelete)) {
            $conn =  new mysqli('localhost', 'unn_w21037098', 'OMsai@123', 'unn_w21037098');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve image filenames from the database
            $sql = "SELECT image_name FROM story_image";
            $result = $conn->query($sql);
            $imagePaths = array();
            while ($row = $result->fetch_assoc()) {
                $imagePaths[] = "assets/story_img/" . $row['image_name'];
            }

            foreach ($indexesToDelete as $index) {
                if ($index >= 0 && $index < count($imagePaths)) {
                    // Delete the image from the file system
                    $imageName = basename($imagePaths[$index]);
                    $createDeletePath = "assets/story_img/" . $imageName;
                    if (unlink($createDeletePath)) {
                        // Delete the image record from the database
                        $sql = "DELETE FROM story_image WHERE image_name = '$imageName'";
                        if ($conn->query($sql) === TRUE) {
                            // Image deleted successfully from the folder and the database
                        } else {
                            echo "Error deleting image from the database: " . $conn->error;
                            exit();
                        }
                    } else {
                        echo "Error deleting image from the folder";
                        exit();
                    }
                }
            }

            $conn->close();
            echo "Images deleted successfully";
        } else {
            echo "No images selected to delete";
        }
    }
}
