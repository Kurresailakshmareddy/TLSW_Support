<?php
// Your previous code...

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    // $fname = $_POST["fname"];
    // $email = $_POST["email"];
    $message = $_POST["messages"];
    $recomm = $_POST["recomm"];
    
    // Check if any images were selected
    if (isset($_POST["selected_images"])) {
        $selectedImages = $_POST["selected_images"];
        
        // Connect to the database
        $conn = new mysqli('localhost', 'unn_w21037098', 'OMsai@123', 'unn_w21037098');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Insert the selected images into the database
        foreach ($selectedImages as $imagePath) {
            $insertQuery = "INSERT INTO user_selected_images ( image_path, messages, recomm) VALUES ('$imagePath', '$message','$recomm')";
            if ($conn->query($insertQuery) !== TRUE) {
                // Handle any errors during insertion
                echo "Error inserting image: " . $conn->error;
            }
        }
        
        // Close the database connection
        $conn->close();
    }
    
    // Insert other form data (e.g., $fname, $email, $message) into your database as needed
    // ...
    
    // Redirect to a success page
    header("Location: suggestionform.php?success=Form submitted successfully");
    exit();
}

// Your remaining HTML code...
