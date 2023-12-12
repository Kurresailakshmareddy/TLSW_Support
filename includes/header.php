<?php

include('config.php');

?>
<!DOCTYPE html>
<html>

<head>
    <title>
        TLSW Support
    </title>
    <link rel="icon" href="./images/logo1.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./main_style.css" />
    <link rel="stylesheet" href="./assets/style-tool.css" />

    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
    </script>

</head>

<body>
    <section class="header">

        <header>
            <div id="brand">
                <div class="container">
                    <div class="brand_name" style="color:white;">Therapeutic Life Story Work Support</div>
                    <a href="./home.php"><img class="img-logo" src="./images/logo1.jpg" alt="tlswsupport logo" width="100px" height="auto"></a>
                    <label for="menuToggle" class="menu-icon">Menu &#9776;</label>
                </div>
            </div>
        </header>

        <input type="checkbox" id="menuToggle">


        <nav class="menu">
            <ul>
                <li><a href="./home.php"><b>Home</b></a></li>
                <li><a href="./TLSW.php"><b>What is TLSW ?</b></a></li>
                <li><a href="./about_us.php"><b>About Us</b></a></li>
                <li class="dropdown">
                    <a href="./services_offered.php" class="dropdown-toggle" data-toggle="dropdown" role="button"
                        aria-haspopup="true" aria-expanded="false"><b><span class="caret"></span> Services
                            Offered</b></a>
                    <ul class="dropdown-menu">
                        <li><a href="./training.php">Training</a></li>
                        <li><a href="./tlsw_interventions.php">TLSW Interventions</a></li>
                        <li><a href="./consultation.php">Consultation</a></li>
                        <li><a href="./supervision.php">Supervision</a></li>
                        <li><a href="./therapeutic_stories.php">Therapeutic Stories</a></li>
                    </ul>
                </li>
                <li><a href="./publications.php"><b>Publications</b></a></li>

                <?php
                if(isset($_SESSION["admin_id"]) && !empty($_SESSION["admin_id"])){
                    echo '<li><a href="./activities.php"><b>Activities</b></a></li>';
                    echo '<li><a href="./contentchange.php"><b>Content Change</b></a></li>';
                    echo '<li><a href="./activitiesChange.php"><b>Activites Change</b></a></li>';
                    echo '<li><a href="./logout.php"><b>Logout</b></a></li>';  
                }
                else{
                    echo '<li><a href="./contact_us.php"><b>Contact Us</b></a></li>';  
                }
                ?>
            </ul>
        </nav>
    </section>
</body>
</html>