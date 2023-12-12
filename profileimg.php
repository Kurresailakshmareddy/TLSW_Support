<?php
include("includes/header.php");

require("functions.php");

check_login();

if (isset($_GET["edit"]) && !empty($_GET["edit"])) {
  $sql = " SELECT * FROM profileimg WHERE `profileimg`.`id` = '" . $_GET["edit"] . "' ";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $profileimg_data = $result->fetch_assoc();
  }
}


if (isset($_POST["add-profileimg"])) {

  $uploadOk = 0;

  $image = basename($_FILES["image"]["name"]);

  if (empty($image)) {
    $_SESSION["error"] = " Please add your profile photo";
    $uploadOk = 1;
  } else {

    if (file_exists("./uploads/profileimg/" . $image)) {
      $image = time() . $image;
    }

    if (!move_uploaded_file($_FILES["image"]["tmp_name"], "./uploads/profileimg/" . $image)) {
      $_SESSION["error"] = " There was an error uploading in Profile Photo :(";
      $uploadOk = 1;
    }
  }

  if (empty($uploadOk)) {

    $name = $conn->real_escape_string($_POST["name"]);

    $sql = " INSERT INTO `profileimg`( `name`, `image`) VALUES ( '$name' , '$image'  ) ; ";

    if ($conn->query($sql) === TRUE) {
      $_SESSION["success"] = " Your Profile Photo is created successfully . ";
    } else {
      $_SESSION["error"] = "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  header("location: ./profileimg.php");
  die();
}



if (isset($_POST["update-profileimg"])) {

  $name = $conn->real_escape_string($_POST["name"]);
  $image = basename($_FILES["image"]["name"]);
  $image_name = $conn->real_escape_string($_POST["image_name"]);


  if (empty($image) && empty($image_name)) {
    $_SESSION["error"] = " Please add your profile photo ";
  } else {
    if (!empty($image)) {
      if (file_exists("./uploads/profileimg/" . $image)) {
        $image = time() . $image;
      }

      if (!move_uploaded_file($_FILES["image"]["tmp_name"], "./uploads/profileimg/" . $image)) {
        $_SESSION["error"] = " there was an error in uploading profile photo image :(";
      }
    } else {
      $image = $image_name;
    }
  }

  $sql = " UPDATE `profileimg` SET `name`= '" . $name . "' , `image`= '" . $image . "'  WHERE `id`= '$_GET[edit]' ";

  if ($conn->query($sql) === TRUE) {
    $_SESSION["success"] = "Your New Profile Photo is Updated successfully . ";
  } else {
    $_SESSION["error"] = "Error: " . $sql . "<br>" . $conn->error;
  }

  header("location: ./profileimg.php");
  die();
}



if (isset($_GET["id"])) {

  $sql = " SELECT profileimg .image FROM profileimg WHERE `profileimg`.`id` = '" . $_GET["id"] . "' ";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

  if (!empty($row["image"])) {
    unlink("./uploads/profileimg/" . $row["image"]);
  }

  $sql = " DELETE FROM profileimg WHERE id= '" . $_GET["id"] . "' ";

  if ($conn->query($sql) === TRUE) {
    $_SESSION["success"] = " Your profile photo is deleted successfully :) ";
  } else {
    $_SESSION["error"] = "Error deleting record: " . $conn->error;
  }
  header("location: ./profileimg.php");
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
            <a href="./patient_info.php">People Info</a>
          </li>
          <li>
            <a href="./testimony.php">Add Testimony</a>
          </li>
          <li>
            <a href="./newsfeed.php"><b>Add Newsfeed</b></a>
          </li>
          <li>
            <a href="./add_services_offered.php"><b>Add Training</b></a>
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
  <div class="profile_main">
    <div class="row">
      <div class="col-md-12">
        <h2>Profile Update</h2>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="profile_main">
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
              <label for="image">Profile Photo:</label>
              <?php if (!empty($profileimg_data["image"])) { ?>
                <img alt="Image placeholder" src="./uploads/profileimg/<?= $profileimg_data["image"]; ?>" class="avatar rounded mr-3 ">
                <input type="hidden" name="image_name" id="image_name" class="form-control" placeholder="Please the select the image in jpg/png" value="<?php echo $profileimg_data['image']; ?>">
              <?php } ?>
              <input type="file" name="image" id="image" accept="image/*" class="form-control" placeholder="Please select the image in jpg/png">
              <h5 style="color: red;">*Please upload the image in jpg/png format</h5>
              <h5 style="color: red;">*Please delete the previous photo to upload new photo</h5>
            </div>

            <?php
            if (!empty($profileimg_data['id'])) {
            ?>
              <button class="loginbtn" name="update-profileimg" value="add-profileimg">Update Profile</button>
            <?php } else { ?>
              <button class="profilebtn" name="add-profileimg" value="add-profileimg">Upload Profile</button>
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
              <h3>Uploaded Profile Photo<h3>
            </thead>
            <tbody>
              <?php
              $sql = " SELECT profileimg.* FROM profileimg ORDER BY `profileimg`.`id` DESC ";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                $i = 1;
                while ($row = $result->fetch_assoc()) {
              ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td>
                      <div class="media align-items-center">
                        <img class="img" alt="Image Loading" placeholder" src="./uploads/profileimg/<?= $row["image"]; ?>" class="news_img">
                      </div>
                    </td>
                    <td>
                      <a href="./profileimg.php?id=<?= $row["id"]; ?>" class="btn" style="color:whitesmoke; text-decoration:none;"> Delete </a>
                    </td>
                  </tr>
              <?php
                  $i++;
                }
              } else {
                echo "<tr><td colspan='3'>No Profile Photos Found</td></tr>";
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