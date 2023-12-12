<?php
include("includes/header.php");

require("functions.php");

// Retrieve image filenames from the database
$sql = "SELECT image_name FROM feedback_image";
$result = $conn->query($sql);
//$imagePaths = array();
//$imagePaths = $result;
while ($row = $result->fetch_assoc()) {
  $imagePaths[] = "assets/pictures/" . $row['image_name'];
}

check_login();

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

  .image-checkbox {
    display: inline-block;
    width: 80px;
    height: 80px;
    border: 2px solid #f57d11;
    cursor: pointer;
    position: relative;
    margin-bottom: 30px;
    padding: 12px;
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
            <a href="./add_services_offered.php"><b>Add Training</b></a>
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
  <div class="cookies_main">
    <div class="row">
      <div class="col-md-12">
        <h2>Suggestion view</h2>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="cookies_main">
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">NO.</th>
                <!-- <th scope="col">Name</th>
                <th scope="col">Email</th> -->
                <th scope="col">Sticker Text</th>
                <th scope="col">Feedback/Suggestion</th>
                <th scope="col">Recommending to Friend</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = " SELECT * FROM user_selected_images ORDER BY `user_selected_images`.`id` DESC ";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                $i = 1;
                while ($row = $result->fetch_assoc()) {
              ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <!-- <td>
                      <p><//?= $row["user_fname"]; ?></p>
                    </td>
                    <td>
                      <p><//?= $row["user_email"]; ?></p>
                    </td> -->
                    <td>
                      <p><?= $row["image_path"]; ?></p>
                    </td>
                    <td>
                      <p><?= $row["messages"]; ?></p>
                    </td>
                    <td>
                      <p><?= $row["recomm"]; ?></p>
                    </td>
                  </tr>
              <?php
                  $i++;
                }
              } else {
                echo "<tr><td colspan='6'>No results</td></tr>";
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