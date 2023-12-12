<?php
include("includes/header.php");
require("functions.php");

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
              <a href="./activityChange.php"> Story Img Change</a>
            </li>
            <li>
              <a href="./storychange.php">Story Content Change</a>
            </li>
            <li>
              <a href="./activity3change.php"> Life Path Img Change</a>
            </li>
            <li>
              <a href="./suggestionchanges.php"> Have Your Say !..</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <section class="banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12"><br>
          <h2>Welcome To The Activites Contents Change </h2>
        </div>
      </div>
    </div>
  </section>

  <section class="contentbox">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <center><img src="./images/story.png" style="box-shadow: 8px 4px 8px 4px rgba(0, 0, 0, 0.19), 20px 6px 20px 6px rgba(0, 0, 0, 0.19);  border-radius: 25px; margin-top:20px; width: 450px; height: 300px;" /></center>
        </div>

        <div class="col-md-4">
          <center><img src="./images/feedback.png" style="box-shadow: 8px 4px 8px 4px rgba(0, 0, 0, 0.19), 20px 6px 20px 6px rgba(0, 0, 0, 0.19);  border-radius: 25px; margin-top:20px; width: 450px; height: 300px;" /></center>
        </div>

        <div class="col-md-4">
          <center><img src="./images/lifepath.png" style="box-shadow: 8px 4px 8px 4px rgba(0, 0, 0, 0.19), 20px 6px 20px 6px rgba(0, 0, 0, 0.19);  border-radius: 25px; margin-top:20px; width: 450px; height: 300px;" /></center>
        </div>

        <div class="col-md-12" style="padding:0; position: relative;">

          <div class="boxwrapper">
            <strong>
              <p style="font-size: 150%;" align="justify">

                Within this section, You'll discover various options for altering the activities content, and these
                changes will be immediately reflected on the corresponding sections of the website.<br><br>

                Within <span style="color: white"> STORY IMG CHANGE </span> and <span style="color: white"> STORY CONTENT CHANGE </span>
                section you add a images,title and even you can add some description about the story as per the people.
                If the data is worng, there is a options to delete the data. <br><br>

                In the <span style="color:white">LIFE PATH IMG CHANGE</span> section, you can input new images as per each individual
                people during your session. If any images is uploaded incorrect or no longer needed,
                you have the option to remove the data.<br><br>

                Within <span style="color:white">HAVE YOU SAY</span> section, you can add new sticker or images to recevie 
                good feedback from the people.<br><br>

              </p>
            </strong>
          </div>

          <div class="boxwrapper1">
            <center><strong>
                <p style="font-size: 140%;"> ""Inspiring hearts, influencing minds, and improving lives. Where technology
                meets social good"."</p>
              </strong></center>
            <p style="font-size: 140%; text-align: right;">- Unknow</p></strong>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>


<?php
include("includes/footer.php");
?>