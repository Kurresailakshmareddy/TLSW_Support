<!-- Header of the page -->

<head>
    <?php
    include("includes/header.php");
    require("functions.php");
    check_login();

    if (isset($_GET["edit"]) && !empty($_GET["edit"])) {
        $sql = " SELECT * FROM storys WHERE `storys`.`id` = '" . $_GET["edit"] . "' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $storys_data = $result->fetch_assoc();
        }
    }


    if (isset($_POST["add-storys"])) {

        $uploadOk = 0;

        $image = basename($_FILES["image"]["name"]);

        if (empty($image)) {
            $_SESSION["error"] = " Please add testimonys image.";
            $uploadOk = 1;
        } else {

            if (file_exists("./uploads/storys/" . $image)) {
                $image = time() . $image;
            }

            if (!move_uploaded_file($_FILES["image"]["tmp_name"], "./uploads/storys/" . $image)) {
                $_SESSION["error"] = " There was an error uploading testimonysimage file.";
                $uploadOk = 1;
            }
        }

        if (empty($uploadOk)) {

            $name = $conn->real_escape_string($_POST["name"]);
            $message = $conn->real_escape_string($_POST["message"]);

            $sql = " INSERT INTO `storys`( `name`, `image`, `message`) VALUES ( '$name' , '$image' , '$message' ) ; ";

            if ($conn->query($sql) === TRUE) {
                $_SESSION["success"] = " New record created successfully . ";
            } else {
                $_SESSION["error"] = "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        header("location: ./storychange.php");
        die();
    }


    if (isset($_POST["update-storys"])) {

        $name = $conn->real_escape_string($_POST["name"]);
        $message = $conn->real_escape_string($_POST["message"]);
        $image = basename($_FILES["image"]["name"]);
        $image_name = $conn->real_escape_string($_POST["image_name"]);


        if (empty($image) && empty($image_name)) {
            $_SESSION["error"] = " Please add testimony image.";
        } else {
            if (!empty($image)) {
                if (file_exists("./uploads/storys/" . $image)) {
                    $image = time() . $image;
                }

                if (!move_uploaded_file($_FILES["image"]["tmp_name"], "./uploads/storys/" . $image)) {
                    $_SESSION["error"] = " there was an error uploading testimonys image file.";
                }
            } else {
                $image = $image_name;
            }
        }

        $sql = " UPDATE `storys` SET `name`= '" . $name . "' , `image`= '" . $image . "' , `message`= '$message' WHERE `id`= '$_GET[edit]' ";

        if ($conn->query($sql) === TRUE) {
            $_SESSION["success"] = " Record Updated successfully . ";
        } else {
            $_SESSION["error"] = "Error: " . $sql . "<br>" . $conn->error;
        }

        header("location: ./storychange.php");
        die();
    }



    if (isset($_GET["id"])) {

        $sql = " SELECT storys.image FROM storys WHERE `storys`.`id` = '" . $_GET["id"] . "' ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        if (!empty($row["image"])) {
            unlink("./uploads/storys/" . $row["image"]);
        }

        $sql = " DELETE FROM storys WHERE id= '" . $_GET["id"] . "' ";

        if ($conn->query($sql) === TRUE) {
            $_SESSION["success"] = " Record deleted successfully . ";
        } else {
            $_SESSION["error"] = "Error deleting record: " . $conn->error;
        }
        header("location: ./storychange.php");
        die();
    }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Life Path</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>




    <style>
        /* styles.css */
        /* styles.css */
        /* .gallery-sidebar {
     width: 200px;
     height: 100%;
     overflow-y: auto;
    } */

        .drop-frame {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            flex-flow: column;
            width: auto;
            height: 800px;
            border: 2px dashed #000;
            position: relative;
            margin-left: 40px;
            max-height: 1000px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
            margin-top: -29px;
        }


        .story {
            flex-flow: column;
            width: 60%;
            height: 150%;
            border: 2px dashed #000;
            position: relative;
            margin-left: 40px;
            max-height: 800px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
        }

        .drop_main_wrapper {
            width: 80%;
            height: 850px;
        }

        .gallery_wrap {
            height: 100%;
            overflow-y: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            /* border-radius: 20px; */
        }

        div#gallerySidebar {
            border: 2px solid #000;
            padding: 25px 15px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .gallery-sidebar img:nth-child(2n) {
            margin-right: 0;
        }

        .gallery_wrap h3 {
            margin-top: 0;
            margin-bottom: 20px;
        }

        .gallery-sidebar img {
            margin-bottom: 18px;
            width: 100%;
            height: 100%;
            object-fit: cover;
            margin-right: 0;
        }

        /* .drop-frame img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      Ensure the image covers the container without distorting 
    } */

        .drop_wrapper {
            display: flex;
            justify-content: center;
            align-items: unset;
            margin: 70px 35px;
            border: 2px solid #000;
            padding: 60px 30px;
        }

        .gallery_wrap {
            width: 20%;
        }

        div#dropFrame h4 {
            font-size: 21px;
        }

        div#dropFrame1 h4 {
            font-size: 21px;
        }

        div#dropFrame2 h4 {
            font-size: 21px;
        }

        div#dropFrame h3 {
            font-size: 23px;
            line-height: 33px;
            font-weight: 600;
        }

        div#dropFrame1 h3 {
            font-size: 23px;
            line-height: 33px;
            font-weight: 600;
        }

        .placeholder img {
            margin: 20px 25px 20px 0;
        }

        /* .drop-frame img {
      width: 100px;
      /* Set your desired width here
      height: 100px;
      /* Set your desired height here 
      position: absolute;
      pointer-events: none;
    } */

        section.banner {
            margin: 50px 0 0;
        }

        section.page_nav ul li a:hover {
            color: #fff;
            transition: all 0.8s ease;
        }

        section.page_nav ul li {
            width: 25%;
            text-align: center;
            transition: all 0.8s ease;
        }

        section.page_nav ul li a {
            color: #000;
            font-size: 23px;
            font-weight: 600;
            transition: all 0.8s ease;
            text-decoration: none;
        }

        section.page_nav ul {
            background: #f57d11;
            color: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            border-radius: 20px;
        }

        section.page_nav {
            margin: 110px 0 0;
        }

        .upload_btn a {
            color: #000;
            font-size: 18px;
            text-transform: uppercase;
            font-weight: 600;
        }

        .upload_btn {
            display: inline-block !important;
            width: 70%;
            text-align: center;
            margin-bottom: 20px;
            background: #f57d11;
            padding: 10px 0;
            border-radius: 9px;
        }

        .gallery-item {
            position: relative;
            display: inline-block;
            margin-right: 20px;
        }

        .image-checkbox {
            display: none;
        }

        .image-checkbox+label {
            display: inline-block;
            width: 100px;
            height: 100px;
            border: 2px solid #f57d11;
            cursor: pointer;
            position: relative;
            margin-bottom: 30px;
            padding: 12px;
        }

        .image-checkbox:checked+label::before {
            content: '\2713';
            /* Checkmark symbol */
            font-size: 30px;
            color: #f57d11;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        button#deleteButton {
            outline: none;
            border-color: transparent;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 19px;
        }

        .pagination {
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            text-align: center;
            background-color: #00817e;
        }

        .pagination a {
            color: white;
            text-decoration: none;
            padding: 20px 15px;
            display: inline-block;
        }

        .pagination a:hover {
            color: #000;
        }

        .pagination a.active {
            background-color: #f57d11;
            font-weight: bold;
            border-radius: 6px;
        }

        .pagination a:hover:not(.active) {
            background-color: gray;
            border-radius: 5px;
        }

        .cover_img {
            width: auto;
            height: auto;
            background-repeat: no-repeat;
            background-size: cover;
            border-radius: 10px;
        }
    </style>
</head>

<!-- Body of the page -->

<body>


    <section class="page_nav">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li>
                            <a href="./activities.php">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="./activity-1.php">
                                Drawing Tool
                            </a>
                        </li>
                        <li>
                            <a href="./activity-2.php"> Life Path </a>
                        </li>
                        <li>
                            <a href="./suggestionform.php">
                                Have Your Say
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="banner">
        <h2>Create Your Story</h2>
    </section>
    <div class="drop_wrapper">
        <div class="gallery_wrap">
            <?php
            $sql = " SELECT storys.* FROM storys ORDER BY `storys`.`id` DESC ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $i = 1;
                while ($row = $result->fetch_assoc()) {
            ?>

                    <br><br>


                    <!-- <h3>Story Images</h3>
      <div class="gallery-sidebar" id="gallerySidebar">
           <div class="upload_btn" id="uploadButton">
                    <a href="./upload.php" style="text-decoration:none;">Upload </a>
                </div> -->

                    <!-- Your image gallery items go here  
        <//?php foreach ($imagePaths as $index => $imagePath) { ?>
             <div class="gallery-item">
            <input type="checkbox" class="image-checkbox" data-index="<//?php echo $index; ?>" id="imageCheckbox<//?php echo $index; ?>">
            <label for="imageCheckbox<//?php echo $index; ?>">
              <img src="<//?php echo $imagePath; ?>" width="120" height="120" alt="Image">
            </label>
          </div> 
        <//?php } ?> -->

                    <!--<button id="deleteButton" class="upload_btn">Delete</button>-->

                    <!-- Add more images as needed 
      </div> -->

        </div>
        <div class="drop_main_wrapper">
            <div class="drop-frame" id="dropFrame">
                <div class="storydescriptation">
                    <h2><?= $row["name"]; ?></h2>
                    <img alt="Image placeholder" src="./uploads/storys/<?= $row["image"]; ?>" class="cover_img" >
                    <p><?= $row["message"]; ?></p>
                </div>


                <!-- <h3>Write Your Story</h3>
        <textarea id="TextArea" class="story" placeholder="Start your story here..."></textarea> -->
            </div>
    <?php
                    $i++;
                }
            } else {
                echo "<h3>No Story Title or Image</h3>";
            }
    ?>
    <br><br>
    <div class="pagination">
        <a href="./activity-3.php">Cover Page</a>
        <a href="./story_p1.php">1</a>
        <a href="./story_p2.php">2</a>
        <a href="./story_endpage.php" class="active">The End</a>
    </div>
        </div>

        <!--<button class="loginbtn" id="generatePDF">Generate PDF</button>-->
        <button class="loginbtn" id="printButton">Print</button>

    </div>


    </div>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const galleryItems = document.querySelectorAll('.gallery-sidebar img');
            const dropFrames = document.querySelectorAll('.drop-frame');

            galleryItems.forEach(item => {
                item.addEventListener('dragstart', dragStart);
            });

            dropFrames.forEach(dropFrame => {
                dropFrame.addEventListener('dragover', dragOver);
                dropFrame.addEventListener('drop', drop);
            });
        });

        function dragStart(event) {
            const imageURL = event.target.src;
            event.dataTransfer.setData('text/plain', imageURL);
        }

        function dragOver(event) {
            event.preventDefault();
        }

        function drop(event) {
            event.preventDefault();
            const imageURL = event.dataTransfer.getData('text/plain');
            const dropFrame = event.currentTarget;

            // Calculate the drop position relative to the drop frame
            const dropX = event.offsetX;
            const dropY = event.offsetY;

            // Ensure the drop position is within the drop frame's boundaries
            const maxX = dropFrame.clientWidth - 100; // Subtract the image width
            const maxY = dropFrame.clientHeight - 100; // Subtract the image height

            // Adjust the drop position to stay within the drop frame's boundaries
            const adjustedX = Math.min(Math.max(0, dropX), maxX);
            const adjustedY = Math.min(Math.max(0, dropY), maxY);

            // Create a new image and set its position to the adjusted drop position
            const image = new Image();
            image.src = imageURL;
            image.alt = "Dropped Image";
            image.style.position = "absolute";
            image.style.left = adjustedX + "px";
            image.style.top = adjustedY + "px";
            dropFrame.appendChild(image);

            // Add event listeners for the save buttons
            const saveButton = document.getElementById('saveButton');
            saveButton.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent the default form submission behavior

                // Collect data from text areas and draggable images
                const Text = document.getElementById('TextArea').value;
                const Images = getImagesInDropFrame('dropFrame');

                // Create a data object to send to the server
                const data = {
                    Text: TextArea,
                    Images: Images,
                };

                // Use AJAX to send the data to the server
                saveDataToDatabase(data);
            });
        }

        function saveDataToDatabase(data) {
            // Send an AJAX request to save the data to the server
            // Replace this with your actual AJAX implementation
            // Example using the Fetch API:
            fetch('sample.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data),
                })
                .then(response => {
                    if (response.ok) {
                        alert('Data saved successfully!');
                    } else {
                        console.error('Error saving data:', response.statusText);
                        alert('Error saving data. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error saving data:', error);
                    alert('Error saving data. Please try again.');
                });
        }

        document.addEventListener('DOMContentLoaded', () => {
            const printButton = document.getElementById('printButton');
            printButton.addEventListener('click', () => {
                window.print(); // Trigger the print dialog
            });
        });
    </script>
    <!-- Add the following JavaScript code at the bottom of your page, just before the closing </body> tag -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const deleteButton = document.getElementById('deleteButton');
            deleteButton.addEventListener('click', deleteSelectedImages);

            // Add the event listener for the upload button
            const uploadButton = document.getElementById('uploadButton');
            uploadButton.addEventListener('click', () => {
                // Redirect to the upload page when the upload button is clicked
                window.location.href = './upload.php';
            });
        });

        function deleteSelectedImages() {
            const imageCheckboxes = document.querySelectorAll('.image-checkbox:checked');
            const imageIndexesToDelete = Array.from(imageCheckboxes).map(checkbox => checkbox.getAttribute('data-index'));

            if (imageIndexesToDelete.length === 0) {
                alert('Please select at least one image to delete.');
                return;
            }

            // Send an AJAX request to delete the selected images from the database
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'delete_images.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        // If the images were successfully deleted from the database, remove them from the gallery
                        imageIndexesToDelete.forEach(index => {
                            const galleryItem = document.querySelector(`.gallery-item[data-index="${index}"]`);
                            if (galleryItem) {
                                galleryItem.parentNode.removeChild(galleryItem);
                            }
                        });

                        // Reload the sidebar gallery to show the updated images
                        reloadGallery();

                        // Re-add the delete button
                        const deleteButton = document.createElement('button');
                        deleteButton.id = 'deleteButton';
                        deleteButton.classList.add('upload_btn');
                        deleteButton.textContent = 'Delete';
                        deleteButton.addEventListener('click', deleteSelectedImages);
                        const gallerySidebar = document.getElementById('gallerySidebar');
                        gallerySidebar.appendChild(deleteButton);
                    } else {
                        console.error('Error deleting images:', xhr.responseText);
                        alert('Error deleting images. Please try again.');
                    }
                }
            };

            xhr.send('indexes=' + encodeURIComponent(JSON.stringify(imageIndexesToDelete)));
        }

        // Function to reload the sidebar gallery with the latest images from the database
        function reloadGallery() {
            // Send an AJAX request to get the updated image list from the database
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_images.php', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        const imagePaths = JSON.parse(xhr.responseText);
                        const gallerySidebar = document.getElementById('gallerySidebar');
                        gallerySidebar.innerHTML = ''; // Clear the existing content

                        // Add the upload button to the gallery
                        const uploadButton = document.createElement('div');
                        uploadButton.classList.add('upload_btn');
                        uploadButton.innerHTML = '<a href="./upload.php">Upload</a>';
                        gallerySidebar.appendChild(uploadButton);

                        // Create new gallery items with images and checkboxes
                        imagePaths.forEach((imagePath, index) => {
                            const galleryItem = document.createElement('div');
                            galleryItem.classList.add('gallery-item');
                            galleryItem.setAttribute('data-index', index);

                            const imageCheckbox = document.createElement('input');
                            imageCheckbox.type = 'checkbox';
                            imageCheckbox.classList.add('image-checkbox');
                            imageCheckbox.setAttribute('data-index', index);
                            galleryItem.appendChild(imageCheckbox);

                            const imageLabel = document.createElement('label');
                            imageLabel.setAttribute('for', 'imageCheckbox' + index);

                            const image = document.createElement('img');
                            image.src = imagePath;
                            image.width = 120;
                            image.height = 120;
                            image.alt = 'Image';

                            imageLabel.appendChild(image);
                            galleryItem.appendChild(imageLabel);

                            gallerySidebar.appendChild(galleryItem);
                        });

                        // Add the delete button to the gallery
                        const deleteButton = document.createElement('button');
                        deleteButton.id = 'deleteButton';
                        deleteButton.classList.add('upload_btn');
                        deleteButton.textContent = 'Delete';
                        deleteButton.addEventListener('click', deleteSelectedImages);
                        gallerySidebar.appendChild(deleteButton);
                    } else {
                        console.error('Error fetching images:', xhr.responseText);
                    }
                }
            };

            xhr.send();
        }
    </script>
</body>

<!-- Footer of the page -->
<?php
include("includes/footer.php");
?>