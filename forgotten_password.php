<?php
include("includes/header.php");


require("functions.php");

check_logout();

if (isset($_POST["login"])) {
    $email = $conn->real_escape_string($_POST["email"]);
    $password = $conn->real_escape_string($_POST["password"]);

    $sql = " UPDATE `admin` SET `password`= '$password'   WHERE `email`= '$email' ";

    if ($conn->query($sql) === TRUE) {
        $_SESSION["success"] = " Password Updated successfully . ";
    } else {
        $_SESSION["error"] = "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Forgotten Password</h2>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-5" style="border: radius 10%; ">
                <img src="./images/login.png" alt="img loading" style="width: 600px; height: 290px;" />
            </div>
            <div class="col-md-7">
                <div class="login_form">
                    <form action="" method="post">
                        <?php
                        if (isset($_SESSION["success"])) {
                            echo '<div class="success">' . $_SESSION["success"] . '</div>';
                            unset($_SESSION["success"]);
                        } elseif (isset($_SESSION["error"])) {
                            echo '<div class="error">' . $_SESSION["error"] . '</div>';

                            unset($_SESSION["error"]);
                        }
                        ?>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Please enter your email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" placeholder="Please enter your password" name="password" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="login" value="login" class="loginbtn">Update Password</button>
                            <button class="btn"><a href="./login.php" style="color:#fff; text-decoration:none;">Log In</a></button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
    <?php
    include("includes/footer.php");
    ?>