<?php
include("includes/header.php");

require("functions.php");

check_login();

if (isset($_GET["edit"]) && !empty($_GET["edit"])) {
  $sql = " SELECT * FROM services WHERE `services`.`id` = '" . $_GET["edit"] . "' ";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $services_data = $result->fetch_assoc();
  }
}


if (isset($_POST["add-services"])) {

  $uploadOk = 0;

  $image = basename($_FILES["image"]["name"]);
  $file = basename($_FILES["file"]["name"]);

  if (empty($image)) {
    $_SESSION["error"] = " Please add services image";
    $uploadOk = 1;
  } else {

    if (file_exists("./uploads/services/" . $image)) {
      $image = time() . $image;
    }

    if (!move_uploaded_file($_FILES["image"]["tmp_name"], "./uploads/services/" . $image)) {
      $_SESSION["error"] = " There was an error uploading services image file.";
      $uploadOk = 1;
    }
  }


  if (file_exists("./uploads/services/" . $file)) {
    $file = time() . $file;
  }

  if (!move_uploaded_file($_FILES["file"]["tmp_name"], "./uploads/services/" . $file)) {
    $_SESSION["error"] = "There was an error uploading services pdf file.";
    $uploadOk = 1;
  }

  if (empty($uploadOk)) {

    $name = $conn->real_escape_string($_POST["name"]);
    $message = $conn->real_escape_string($_POST["message"]);

    $sql = " INSERT INTO `services`( `name`, `image`, `description`,`file`) VALUES ( '$name' , '$image' , '$message','$file') ; ";

    if ($conn->query($sql) === TRUE) {
      $_SESSION["success"] = " New record created successfully . ";
    } else {
      $_SESSION["error"] = "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  header("location: add_services_offered.php");
  die();
}

if (isset($_POST["update-services"])) {

  $name = $conn->real_escape_string($_POST["name"]);
  $message = $conn->real_escape_string($_POST["message"]);
  $image = basename($_FILES["image"]["name"]);
  $file = basename($_FILES["file"]["name"]);
  $image_name = $conn->real_escape_string($_POST["image_name"]);
  $file_name = $conn->real_escape_string($_POST["file_name"]);


  if (empty($image) && empty($image_name)) {
    $_SESSION["error"] = " Please add services image.";
  } else {
    if (!empty($image)) {
      if (file_exists("./uploads/services/" . $image)) {
        $image = time() . $image;
      }

      if (!move_uploaded_file($_FILES["image"]["tmp_name"], "./uploads/services/" . $image)) {
        $_SESSION["error"] = " there was an error uploading services image file.";
      }
    } else {
      $image = $image_name;
    }
  }


  if (!empty($file)) {
    if (file_exists("./uploads/services/" . $file)) {
      $file = time() . $file;
    }

    if (!move_uploaded_file($_FILES["file"]["tmp_name"], "./uploads/services/" . $file)) {
      $_SESSION["error"] = "There was an error uploading services pdf file.";
    }
  } else {
    $file = $file_name;
  }

  $sql = " UPDATE `services` SET `name`= '" . $name . "' , `image`= '" . $image . "' , `description`= '" . $message . "'  , `file`= '" . $file . "' WHERE `id`= '$_GET[edit]' ";

  if ($conn->query($sql) === TRUE) {
    $_SESSION["success"] = " Record Updated successfully . ";
  } else {
    $_SESSION["error"] = "Error: " . $sql . "<br>" . $conn->error;
  }

  header("location: add_services_offered.php");
  die();
}



if (isset($_GET["id"])) {

  $sql = " SELECT services.image FROM services WHERE `services`.`id` = '" . $_GET["id"] . "' ";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

  if (!empty($row["image"])) {
    unlink("./uploads/services/" . $row["image"]);
  }

  $sql = " DELETE FROM services WHERE id= '" . $_GET["id"] . "' ";

  if ($conn->query($sql) === TRUE) {
    $_SESSION["success"] = " Record deleted successfully . ";
  } else {
    $_SESSION["error"] = "Error deleting record: " . $conn->error;
  }
  header("location: add_services_offered.php");
  die();
}
?>


<style>
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

  .contentbox {
    width: 97%;
    margin: 20px;
    background-color: #00c0bb;
    border-radius: 25px;
    left: 30px;
  }

  .boxwrapper {
    width: 65%;
    background-color: #00c0bb;
    padding: 50px;
    box-sizing: border-box;
    font-family: 'Tempus Sans ITC';
    margin-left: 17.5%;
  }

  .boxwrapper1 {
    width: 40%;
    background-color: #00a29e;
    box-sizing: border-box;
    font-family: 'Tempus Sans ITC';
    margin-left: 30%;
    margin-bottom: 50px;
    padding: 35px;
    border-radius: 25px;
  }
</style>

<br /><br /><br />
<section class="page_nav">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul>
          <li>
            <a href="./contentchange.php">Home</a>
          </li>
          <li>
            <a href="./profileimg.php">Profile Update</a>
          </li>
          <li>
            <a href="./patient_info.php">People Info</a>
          </li>
          <li>
            <a href="./newsfeed.php"><b>Add Newsfeed</b></a>
          </li>
          <li>
            <a href="./testimony.php">Add Testimony</a>
          </li>
          <li>
            <a href="./suggestionsview.php"><b>Suggestion View</b></a>
          </li>
          <li>
            <a href="./cookies.php"><b>Cookies</b></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="banner">
  <div class="service_main">
    <div class="row">
      <div class="col-md-12">
        <h2>Training</h2>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="service_main">
    <div class="row">
      <?php
      if (isset($_SESSION["success"])) {
        echo '<div class="success">' . $_SESSION["success"] . '</div>';
        unset($_SESSION["success"]);
      } elseif (isset($_SESSION["error"])) {
        echo '<div class="error">' . $_SESSION["error"] . '</div>';
        unset($_SESSION["error"]);
      }
      ?>
      <div class="col-md-12">
        <div class="contact_form">
          <form method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label for="name">Title</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Please enter the title here" vaule="<?php echo ($services_data['name'] != "") ? trim($services_data['name']) : ""; ?>" requried>
            </div>
            <div class="form-group">
              <label for="image">Image</label>
              <?php if (!empty($services_data["image"])) { ?>
                <img alt="Image Loading..!" src="./uploads/services/<?= $services_data["image"]; ?>" class="avatar rounded mr-3 " height="200">
                <input type="hidden" name="image_name" id="image_name" class="form-control" placeholder="Please select the image" value="<?php echo $services_data['image']; ?>">
              <?php } ?>
              <input type="file" name="image" placeholder="Please the select the image in jpg/png" id="image" accept="image/*" class="form-control">
              <h5 style="color: red;">*Please upload the image in jpg/png format</h5>
            </div>
            <div class="form-group">
              <label for="file">File</label>
              <?php if (!empty($services_data["file"])) { ?>
                <a href="./uploads/services/<?= $services_data["file"]; ?>" target="_blank"><?php echo $services_data['file']; ?></a>
                <input type="hidden" name="file_name" id="file_name" class="form-control" placeholder="Please select the file in only PDF" value="<?php echo $services_data['file']; ?>">
              <?php } ?>
              <input type="file" name="file" id="file" placeholder="Please select the file in only PDF" accept=".pdf" class="form-control">
              <h5 style="color: red;">*Please upload the file in PDF only</h5>
            </div>
            <div class="form-group">
              <label for="message">Description</label>
              <textarea name="message" id="message" class="form-control" placeholder="Please enter the description here" value="<?php echo ($services_data['description'] != "") ? trim($services_data['description']) : ""; ?>" requried></textarea>
            </div>
            <?php
            if (!empty($services_data['id'])) {
            ?>
              <button class="loginbtn" name="update-services" value="add-services">Update Services</button>
            <?php } else { ?>
              <button class="loginbtn" name="add-services" value="add-services">Add Services</button>
            <?php } ?>
          </form>
        </div>

      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">File</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = " SELECT services.* FROM services ORDER BY `services`.`id` DESC ";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                $i = 1;
                while ($row = $result->fetch_assoc()) {
              ?>
                  <tr>
                    <th scope="row">
                      <?= $i; ?>
                    </th>
                    <td>
                      <div class="media align-items-center">
                        <img alt="Image placeholder" src="./uploads/services/<?= $row["image"]; ?>" class="news_img">
                        <div class="media-body">
                          <span class="name mb-0 text-sm">
                            <?= $row["name"]; ?>
                          </span>
                        </div>
                      </div>
                    </td>
                    <td style="width:70%;">
                      <p>
                        <?= $row["description"]; ?>
                      </p>
                    </td>
                    <td style="width:100%;">
                      <p>
                        <a href="./uploads/services/<?= $row["file"]; ?>" download><?= $row["file"]; ?></a>
                      </p>
                    <td>
                      <a href="add_services_offered.php?edit=<?= $row["id"]; ?>" class="btn" style="color:whitesmoke; text-decoration:none;"> Edit </a> | <a href="add_services_offered.php?id=<?= $row["id"]; ?>" class="btn" style="color:whitesmoke; text-decoration:none;"> Delete </a>
                    </td>
                  </tr>
              <?php
                  $i++;
                }
              } else {
                echo "<tr><td colspan='3'>No results</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include("includes/footer.php");
?>