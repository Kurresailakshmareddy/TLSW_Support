<?php
include("includes/header.php");
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
            <a href="./profileimg.php">Profile Change</a>
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
  <div class="container">
    <div class="row">
      <div class="col-md-12"><br>
        <h2>Welcome To The Content Change Section </h2>
      </div>
    </div>
  </div>
</section>

<section class="contentbox">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <center><img src="./images/feedback.png" style="box-shadow: 8px 4px 8px 4px rgba(0, 0, 0, 0.19), 20px 6px 20px 6px rgba(0, 0, 0, 0.19);  border-radius: 25px; margin-top:20px; width: 450px; height: 300px;" /></center>
      </div>

      <div class="col-md-4">
        <center><img src="./images/about us.png" style="box-shadow: 8px 4px 8px 4px rgba(0, 0, 0, 0.19), 20px 6px 20px 6px rgba(0, 0, 0, 0.19);  border-radius: 25px; margin-top:20px; width: 450px; height: 300px;" /></center>
      </div>

      <div class="col-md-4">
        <center><img src="./images/traning.png" style="box-shadow: 8px 4px 8px 4px rgba(0, 0, 0, 0.19), 20px 6px 20px 6px rgba(0, 0, 0, 0.19);  border-radius: 25px; margin-top:20px; width: 450px; height: 300px;" /></center>
      </div>

      <div class="col-md-12" style="padding:0; position: relative;">

        <div class="boxwrapper">
          <strong>
            <p style="font-size: 150%;" align="justify">

              Within this section, You'll discover various options for altering the content, and these
              changes will be immediately reflected on the corresponding sections of the website.<br><br>

              Within the <span style="color: white">PROFILE CHANGE</span> section,
              you have the ability to upload your most recent picture, which will be prominently
              featured on our About Us page. <br><br>

              In the <span style="color:white">PEOPLE INFO</span> section, you can input new individual data during your
              session,or alternatively, review past data about individuals whenever necessary. If any information is incorrect or
              no longer needed, you have the option to make edits or remove the data. <br><br>

              In the <span style="color:white">ADD NEWSFEED</span> section, you have the capability to input details
              about upcoming events and include images relevant to the information or you can add any news related to TLSWs.
              If the information you have is inaccurate or if you wish to provide additional details for a particular
              newsfeed, you have the option to edit or delete the data.<br><br>

              In the <span style="color:white"> ADD TESTIMONIAL </span> section, you can enter the finest compliments
              received for your service. This section even allows you to attach images to these glowing testimonials.
              Should you find that any of the data is incorrect or if you wish to include further information for
              a specific testimonial, you can make use of the edit and delete functions. <br><br>

              In the <span style="color:white">ADD TRAINING</span> section, you can provide information about upcoming
              training sessions. Here, you can include images and PDF files, as well as descriptions of the
              upcoming sessions. Users can conveniently download your flyer to obtain a copy. In the event that any
              data is inaccurate or if you want to supplement information for a particular training session,
              you can utilize the edit and delete options.<br><br>

              Within <span style="color:white">SUGGESTION VIEW</span> section, you can peruse the feedback provided by
              individuals who have availed of our services. This allows you to refine the content with eloquent language
              and paraphrase the feedback.<br><br>

              Within <span style="color:white"> COOKIES</span> section, you can access information regarding user
              visits to your site, including the frequency of visits and the pages that have garnered the most views.<br><br>

            </p>
          </strong>
        </div>

        <div class="boxwrapper1">
          <center><strong>
              <p style="font-size: 140%;">"Inspiring hearts, influencing minds, and improving lives. Where technology
                meets social good".
              </p>
            </strong></center>
          <p style="font-size: 140%; text-align: right;">- Unknow </p></strong>
        </div>
      </div>
    </div>
  </div>
</section>

</body>


<?php
include("includes/footer.php");
?>