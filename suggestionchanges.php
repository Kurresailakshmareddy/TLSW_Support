<?php
include("includes/header.php");
require("functions.php");

check_login();

$conn = new mysqli('localhost', 'unn_w21037098', 'OMsai@123', 'unn_w21037098');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve image filenames from the database
$sql = "SELECT image_name FROM feedback_image";
$result = $conn->query($sql);
//$imagePaths = array();
//$imagePaths = $result;
while ($row = $result->fetch_assoc()) {
  $imagePaths[] = "assets/pictures/" . $row['image_name'];
}
?>
<style>
  .gallery-item {
    display: inline-block;
    margin-right: 20px;
    margin-bottom: 10px;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    padding: 20px 10px;
    margin: auto;
    gap: 16px;
  }

  .image-checkbox {
    display: none;
  }

  .image-checkbox+label {
    display: flex;
    width: 120px;
    height: auto;
    border: 2px solid #f57d11;
    border-radius: 4px;
    cursor: pointer;
    position: relative;
    margin: auto;
    margin-left: 200px;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    padding: 15px;
    gap: 16px;
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

  section.page_nav {
    margin: 40px 0 0;
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

  .upload_btn a {
    color: #000;
    font-size: 18px;
    text-transform: uppercase;
    font-weight: 600;
  }

  .upload_btn {
    display: inline-block !important;
    width: 30%;
    text-align: center;
    margin-bottom: 20px;
    margin-left: 300px;
    background: #f57d11;
    padding: 10px 0;
    border-radius: 9px;
  }

  button#deleteButton {
    outline: none;
    border-color: transparent;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 19px;
  }
</style>

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
            <a href="./activityChange.php"> Story Img Change</a>
          </li>
          <li>
            <a href="./storychange.php">Story Content Change</a>
          </li>
          <li>
            <a href="./activity3change.php"> Life Path Img Change</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>


<section class="banner">
  <div class="testimony_main">
    <div class="row">
      <div class="col-md-12">
        <h2>Suggestion Form</h2>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="testimony_main">
    <div class="row">
      <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?> <!--showing the status to the user -->

      <?php if (isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
      <?php } ?>

      <div class="col-md-12">
        <div class="contact_form">
          <div class="gallery-sidebar" id="gallerySidebar">
            <div class="upload_btn" id="uploadButton">
              <a href="./feed_upload.php" style="text-decoration:none;">Upload </a>
            </div>
            <!-- Your image gallery items go here -->
            <?php foreach ($imagePaths as $index => $imagePath) { ?>
              <div class="gallery-item">
                <input type="checkbox" class="image-checkbox" data-index="<?php echo $index; ?>" id="imageCheckbox<?php echo $index; ?>">
                <label for="imageCheckbox<?php echo $index; ?>">
                  <img src="<?php echo $imagePath; ?>" width="90" height="90" alt="Image">
                </label>
              </div>
            <?php } ?>
            <!-- <button id="deleteButton" class="upload_btn">Delete</button> -->
            <!-- Add more images as needed -->
          </div>
        </div>
      </div>
    </div>


  </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const deleteButton = document.getElementById('deleteButton');
    deleteButton.addEventListener('click', deleteSelectedImages);

    // Add the event listener for the upload button
    const uploadButton = document.getElementById('uploadButton');
    uploadButton.addEventListener('click', () => {
      // Redirect to the upload page when the upload button is clicked
      window.location.href = './feed_upload.php';
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
    xhr.open('POST', 'feed_delete.php', true);
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
    xhr.open('GET', 'get_feedback.php', true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          const imagePaths = JSON.parse(xhr.responseText);
          const gallerySidebar = document.getElementById('gallerySidebar');
          gallerySidebar.innerHTML = ''; // Clear the existing content

          // Add the upload button to the gallery
          const uploadButton = document.createElement('div');
          uploadButton.classList.add('upload_btn');
          uploadButton.innerHTML = '<a href="./feed_upload.php">Upload</a>';
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
<?php
include("includes/footer.php");
?>