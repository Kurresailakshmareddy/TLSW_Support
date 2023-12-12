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
    position: relative;
    display: inline-block;
    margin-right: 20px;
  }

  .image-checkbox {
    display: none;
    border-radius: 10px;
  }

  .image-checkbox+label {
    display: inline-block;
    width: 200px;
    height: 130px;
    /*border: 2px solid #f57d11;*/
    cursor: pointer;
    position: relative;
    margin-bottom: 30px;
    border-radius: 2px;
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
</style>

<br /><br /><br />
<br /><br /><br />
<section class="page_nav">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul>
          <li>
            <a href="./activities.php"> Home </a>
          </li>
          <li>
            <a href="./activity-1.php">Drawing Tool</a>
          </li>
          <li>
            <a href="./activity-2.php"> Life Path </a>
          </li>
          <li>
            <a href="./activity-3.php"> Create Your Story </a>
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
        <h2>Have Your Say !...</h2>
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
          <form action="suggestion-check.php" id="feedbackForm" method="post" enctype="multipart/form-data">
            <!-- <div class="form-group">
              <label for="fname">Full Name</label>
              <input type="text" class="form-control" id="fname" name="fname" placeholder=" Please enter your full name here..">
            </div>
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Please enter your email here..">
            </div> -->
            <!-- Inside your HTML form -->
            <label>Please tick any of the above that apply :</label><br><br>
            <?php foreach ($imagePaths as $index => $imagePath) { ?>
              <div class="gallery-item">
                <input type="checkbox" class="image-checkbox" name="selected_images[]" value="<?php echo $imagePath; ?>" id="imageCheckbox<?php echo $index; ?>">
                <label for="imageCheckbox<?php echo $index; ?>">
                  <img src="<?php echo $imagePath; ?>" width="200" height="110" alt="Image">
                </label>
              </div>
            <?php } ?>
            <div class="form-group">
              <label for="subject">You can use the space below to let me know about anything that was particularly
                helpful or not helpful, anything you think could be done differently or included, or anything else
                you want to say :
              </label>
              <textarea id="subject" name="messages" placeholder="Please Type Here.." class="form-control" style="height:100px"></textarea>
            </div>
            <div class="form-group">
              <label for="subject">What would you say to a friend who was going to do some Therapeutic
                Life Story Work?
              </label>
              <textarea id="subject" name="recomm" placeholder="Please Type Here.." class="form-control" style="height:100px"></textarea>
            </div>
            <input class="loginbtn" type="submit" value="Submit">
          </form>
        </div>

      </div>
    </div>


  </div>
  </div>
</section>
<?php
include("includes/footer.php");
?>