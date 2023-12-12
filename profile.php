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

.contentbox{
  width:97%; 
  margin:20px;
  background-color:#00c0bb; 
  border-radius: 25px;"
  left:30px;
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

      <br /><br /><br/>
      <section class="page_nav">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <ul>
                <li>
                 <a href="/Main/newsfeed.php"><b>Add Newsfeed</b></a>
                </li>
                <li>
                 <a href="/Main/testimony.php">Add Testimony</a>
                </li>
                <li>
                 <a href="/Main/add_services_offered.php"><b>Add Training</b></a>
                </li>
                <li>
                  <a href="/Main/cookies.php"><b>Cookies</b></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
