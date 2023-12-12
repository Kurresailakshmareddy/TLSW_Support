<html>
<?php
include("includes/header.php");
//include("includes/config.php");
?>

<body>
    <br><br>
    <div class="form-group"><br><br>
        <div class="col-md-12">
            <h2>Upload a New Image</h2>
        </div>
        <?php
        $msg = "";
        if (isset($_POST['upload'])) {

            $imageName = $_FILES["uploadfile"]["name"];
            $tempname = $_FILES["uploadfile"]["tmp_name"];
            $folder = "assets/story_img/" . $imageName;

            // Loop through the uploaded images and insert filenames into the database


            $sql = "INSERT INTO story_image (image_name) VALUES ('$imageName')";
            $result_image = $conn->query($sql);

            // Get all the submitted data from the form
            // $sql = "INSERT INTO image (filename) VALUES ('$filename')";

            // Execute query
            //  mysqli_query($db, $sql);

            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $folder)) {
                echo "<h3 class='success'>  Image uploaded successfully!</h3>";
            } else {
                echo "<h3 class='error'>  Failed to upload image!</h3>";
            }
        }

        ?>
    </div> <br><br>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
            <input class="form-control" type="file" name="uploadfile" value="" />
        </div>
        <div class="form-group">
            <button class="loginbtn" type="submit" name="upload">UPLOAD</button>
            <button class="btn"><a href="./activity3change.php" style="color:#fff; text-decoration:none;">Back</a></button>
        </div>
    </form>

    <?php
    // Redirect to the gallery page after processing the images
    //header("Location: activity-2.php");
    //exit();
    ?>
    <!-- Footer of the page -->
    <?php
    include("includes/footer.php");
    ?>
</body>

</html>