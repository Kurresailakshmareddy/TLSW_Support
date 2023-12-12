<!-- Header of the page -->

<head>
  <?php
  include("includes/header.php");
  require("functions.php");

  check_login();
  ?>
  <?php
  $conn = new mysqli('localhost', 'unn_w21037098', 'OMsai@123', 'unn_w21037098');
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Retrieve image filenames from the database
  $sql = "SELECT image_name FROM image_gallery";
  $result = $conn->query($sql);
  //$imagePaths = array();
  //$imagePaths = $result;
  while ($row = $result->fetch_assoc()) {
    $imagePaths[] = "assets/images/" . $row['image_name'];
  }
  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Drag and Drop Image Gallery</title>

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
    }

    .drop-frame {
      flex-flow: column;
      width: auto;
      height: 280px;
      border: 2px dashed #000;
      position: relative;
      margin-left: 40px;
      /* max-height: 500px; */
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px 0;
    }

    .drop_main_wrapper {
      width: 80%;
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

    .drop-frame img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      /* Ensure the image covers the container without distorting */
    }

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

    .drop-frame img {
      width: 100px;
      /* Set your desired width here */
      height: 100px;
      /* Set your desired height here */
      position: absolute;
      pointer-events: none;
    }

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
  </style>
</head>

<!-- Body of the page -->

<body>
  <br /><br /><br />
  <section class="page_nav">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul>
            <li>
              <a href="./activitiesChange.php"> Home</a>
            </li>
            <li>
              <a href="./storychange.php">Story Content Change</a>
            </li>
            <li>
              <a href="./activity3change.php"> Life Path Img Change</a>
            </li>
            <li>
              <a href="./suggestionchanges.php"> Have Your say !.. </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="banner">
    <h2>Create Your Story Image change</h2>
  </section>
  <div class="drop_wrapper">
    <div class="gallery_wrap">

      <h3>Story Images </h3>
      <div class="gallery-sidebar" id="gallerySidebar">
        <div class="upload_btn" id="uploadButton">
          <a href="./upload.php" style="text-decoration:none;">Upload </a>
        </div>

        <!-- Your image gallery items go here -->
        <?php foreach ($imagePaths as $index => $imagePath) { ?>
          <div class="gallery-item">
            <input type="checkbox" class="image-checkbox" data-index="<?php echo $index; ?>" id="imageCheckbox<?php echo $index; ?>">
            <label for="imageCheckbox<?php echo $index; ?>">
              <img src="<?php echo $imagePath; ?>" width="120" height="120" alt="Image">
            </label>
          </div>
        <?php } ?>

        <!-- <button id="deleteButton" class="upload_btn">Delete</button> -->
        <!-- Add more images as needed -->
      </div>
    </div>
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
    }
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