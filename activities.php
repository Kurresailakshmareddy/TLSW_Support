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
              <a href="./activity-1.php"> Drawing Tool</a>
            </li>
            <li>
              <a href="./activity-2.php"> Life Path </a>
            </li>
            <li>
              <a href="./activity-3.php"> Create Your Story </a>
            </li>
            <li>
              <a href="./suggestionform.php"> Have Your Say !.. </a>
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
          <h2>Welcome To The Creativity Section </h2>
        </div>
      </div>
    </div>
  </section>

  <section class="contentbox">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <center><img src="./images/act2.jpg" style="box-shadow: 8px 4px 8px 4px rgba(0, 0, 0, 0.19), 20px 6px 20px 6px rgba(0, 0, 0, 0.19);  border-radius: 25px; margin-top:20px; width: 450px; height: 300px;" /></center>
        </div>

        <div class="col-md-4">
          <center><img src="./images/act1.jpg" style="box-shadow: 8px 4px 8px 4px rgba(0, 0, 0, 0.19), 20px 6px 20px 6px rgba(0, 0, 0, 0.19);  border-radius: 25px; margin-top:20px; width: 450px; height: 300px;" /></center>
        </div>

        <div class="col-md-4">
          <center><img src="./images/act3.jpg" style="box-shadow: 8px 4px 8px 4px rgba(0, 0, 0, 0.19), 20px 6px 20px 6px rgba(0, 0, 0, 0.19);  border-radius: 25px; margin-top:20px; width: 450px; height: 300px;" /></center>
        </div>

        <div class="col-md-12" style="padding:0; position: relative;">

          <div class="boxwrapper">
            <strong>
              <p style="font-size: 150%;" align="justify">

                <span style="color: white"> THE CREATIVITY SECTION </span>where you can have some fun, express yourself,
                have your say, and get creative in telling your story!<br><br>

                We can use the <span style="color:white">DRAWING TOOL</span> for a game of squiggles, boxes
                or anything else you'd like to do.<br><br>

                THE <span style="color:white">LIFE PATH</span> is a place where we can put some images and words to represent where
                you have been, where you are now and where you are heading; anything about your past, present
                and future that you want to share.<br><br>

                The<span style="color:white"> HAVE YOUR SAY</span> section can be used for you to give your feedback on our work
                together and to make any suggestions about how it might be improved.<br><br>

                You can <span style="color:white">CREATE YOUR STORY</span> with words and images using your choice of any character or
                theme, like Anime, Wednesday Addams or Spidey and his amazing friends.<br><br>

              </p>
            </strong>
          </div>

          <div class="boxwrapper1">
            <center><strong>
                <p style="font-size: 140%;"> "Creativity is inventing, experimenting, growing, taking risks, breaking rules, making
                  mistakes, and having fun."</p>
              </strong></center>
            <p style="font-size: 140%; text-align: right;">- Mary Lou Cook</p></strong>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>


<?php
include("includes/footer.php");
?>