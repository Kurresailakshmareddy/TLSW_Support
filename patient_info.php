<?php
include("includes/header.php");

require("functions.php");

check_login();

if (isset($_GET["edit"]) && !empty($_GET["edit"])) {
  $sql = " SELECT * FROM patient_info WHERE `patient_info`.`id` = '" . $_GET["edit"] . "' ";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $patient_info_data = $result->fetch_assoc();
  }
}


if (isset($_POST["add-patient_info"])) {

  $uploadOk = 0;

  $image = basename($_FILES["image"]["name"]);
  $file = basename($_FILES["file"]["name"]);

  if (empty($image)) {
    $_SESSION["error"] = " Please add patient_info image";
    $uploadOk = 1;
  } else {

    if (file_exists("./uploads/patient_info/" . $image)) {
      $image = time() . $image;
    }

    if (!move_uploaded_file($_FILES["image"]["tmp_name"], "./uploads/patient_info/" . $image)) {
      $_SESSION["error"] = " There was an error uploading patient_info image file.";
      $uploadOk = 1;
    }
  }


  if (file_exists("./uploads/patient_info/" . $file)) {
    $file = time() . $file;
  }

  if (!move_uploaded_file($_FILES["file"]["tmp_name"], "./uploads/patient_info/" . $file)) {
    $_SESSION["error"] = "There was an error uploading patient_info pdf file.";
    $uploadOk = 1;
  }

  if (empty($uploadOk)) {

    $name = $conn->real_escape_string($_POST["name"]);
    $message = $conn->real_escape_string($_POST["message"]);

    $sql = " INSERT INTO `patient_info`( `name`, `image`, `description`,`file`) VALUES ( '$name' , '$image' , '$message','$file') ; ";

    if ($conn->query($sql) === TRUE) {
      $_SESSION["success"] = " New record created successfully . ";
    } else {
      $_SESSION["error"] = "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  header("location: patient_info.php");
  die();
}

if (isset($_POST["update-patient_info"])) {

  $name = $conn->real_escape_string($_POST["name"]);
  $message = $conn->real_escape_string($_POST["message"]);
  $image = basename($_FILES["image"]["name"]);
  $file = basename($_FILES["file"]["name"]);
  $image_name = $conn->real_escape_string($_POST["image_name"]);
  $file_name = $conn->real_escape_string($_POST["file_name"]);


  if (empty($image) && empty($image_name)) {
    $_SESSION["error"] = " Please add patient_info image.";
  } else {
    if (!empty($image)) {
      if (file_exists("./uploads/patient_info/" . $image)) {
        $image = time() . $image;
      }

      if (!move_uploaded_file($_FILES["image"]["tmp_name"], "./uploads/patient_info/" . $image)) {
        $_SESSION["error"] = " there was an error uploading patient_info image file.";
      }
    } else {
      $image = $image_name;
    }
  }


  if (!empty($file)) {
    if (file_exists("./uploads/patient_info/" . $file)) {
      $file = time() . $file;
    }

    if (!move_uploaded_file($_FILES["file"]["tmp_name"], "./uploads/patient_info/" . $file)) {
      $_SESSION["error"] = "There was an error uploading services pdf file.";
    }
  } else {
    $file = $file_name;
  }

  $sql = " UPDATE `patient_info` SET `name`= '" . $name . "' , `image`= '" . $image . "' , `description`= '" . $message . "'  , `file`= '" . $file . "' WHERE `id`= '$_GET[edit]' ";

  if ($conn->query($sql) === TRUE) {
    $_SESSION["success"] = " Record Updated successfully . ";
  } else {
    $_SESSION["error"] = "Error: " . $sql . "<br>" . $conn->error;
  }

  header("location: add_services_offered.php");
  die();
}



if (isset($_GET["id"])) {

  $sql = " SELECT patient_info.image FROM patient_info WHERE `patient_info`.`id` = '" . $_GET["id"] . "' ";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

  if (!empty($row["image"])) {
    unlink("./uploads/patient_info/" . $row["image"]);
  }

  $sql = " DELETE FROM patient_info WHERE id= '" . $_GET["id"] . "' ";

  if ($conn->query($sql) === TRUE) {
    $_SESSION["success"] = " Record deleted successfully . ";
  } else {
    $_SESSION["error"] = "Error deleting record: " . $conn->error;
  }
  header("location: patient_info.php");
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
            <a href="./add_services_offered.php"><b>Add Training</b></a>
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
  <div class="patient_info_main">
    <div class="row">
      <div class="col-md-12">
        <h2>Patient Info</h2>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="patient_info_main">
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
              <label for="name">Patient Full Name:</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Please enter the title here" vaule="<?php echo ($patient_info_data['name'] != "") ? trim($patient_info_data['name']) : ""; ?>" requried>
            </div>
            <div class="form-group">
              <label for="image">Patient Image:</label>
              <?php if (!empty($patient_info_data["image"])) { ?>
                <img alt="Image Loading..!" src="./uploads/patient_info/<?= $patient_info_data["image"]; ?>" class="avatar rounded mr-3 " height="200">
                <input type="hidden" name="image_name" id="image_name" class="form-control" placeholder="Please select the image" value="<?php echo $patient_info_data['image']; ?>">
              <?php } ?>
              <input type="file" name="image" placeholder="Please the select the image in jpg/png" id="image" accept="image/*" class="form-control">
              <h5 style="color: red;">*Please upload the image in jpg/png format</h5>
            </div>
            <div class="form-group">
              <label for="file">Patient File:</label>
              <?php if (!empty($patient_info_data["file"])) { ?>
                <a href="./uploads/patient_info/<?= $patient_info_data["file"]; ?>" target="_blank"><?php echo $patient_info_data['file']; ?></a>
                <input type="hidden" name="file_name" id="file_name" class="form-control" placeholder="Please select the file in only PDF" value="<?php echo $patient_info_data['file']; ?>">
              <?php } ?>
              <input type="file" name="file" id="file" placeholder="Please select the file in only PDF" accept=".pdf" class="form-control">
              <h5 style="color: red;">*Please upload the file in PDF only</h5>
            </div>
            <div class="form-group">
              <label for="message">Patient Description:</label>
              <textarea name="message" id="message" class="form-control" placeholder="Please enter the description here" value="<?php echo ($patient_info_data['description'] != "") ? trim($patient_info_data['description']) : ""; ?>" requried></textarea>
            </div>
            <?php
            if (!empty($patient_info_data['id'])) {
            ?>
              <button class="loginbtn" name="update-patient_info" value="add-patient_info">Update patient_info</button>
            <?php } else { ?>
              <button class="loginbtn" name="add-patient_info" value="add-patient_info">Add patient_info</button>
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
                <th scope="col">Patient Image</th>
                <th scope="col">Patient Description</th>
                <th scope="col">Patient File</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = " SELECT patient_info.* FROM patient_info ORDER BY `patient_info`.`id` DESC ";
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
                        <img alt="Image placeholder" src="./uploads/patient_info/<?= $row["image"]; ?>" class="news_img">
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
                        <a href="./uploads/patient_info/<?= $row["file"]; ?>" download><?= $row["file"]; ?></a>
                      </p>
                    <td>
                      <a href="patient_info.php?edit=<?= $row["id"]; ?>" class="btn" style="color:whitesmoke; text-decoration:none;"> Edit </a> | <a href="patient_info.php?id=<?= $row["id"]; ?>" class="btn" style="color:whitesmoke; text-decoration:none;"> Delete </a>
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