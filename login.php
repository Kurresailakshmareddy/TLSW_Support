<?php
include("includes/header.php");


require("functions.php");

check_logout();

if (isset($_POST["login"])) {
    $email = $conn->real_escape_string($_POST["email"]);
    $password = $conn->real_escape_string($_POST["password"]);

    $sql = " SELECT * FROM `admin` WHERE `email` = '$email' ";

    $query = $conn->query($sql);


    if ($query->num_rows > 0) {

        $arr = $query->fetch_assoc();
        if ($arr['password'] == $password) {
            $_SESSION["admin_id"] = $arr["id"];
            $_SESSION["admin_name"] = $arr["name"];
            header("location:./home.php");
            die();
        } else {
            $_SESSION["error"] = " Incorrect password . ";
        }
    } else {
        $_SESSION["error"] = " Incorrect login details . ";
    }
}
?>
<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Login</h2>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-5" style="border: radius 10%; ">
                <img src="./images/index.png" alt="img loading" style="width: 600px; height: 290px;" />
            </div>
            <div class="col-md-7">
                <div class="login_form">
                    <form action="./login.php" method="post">
                        <?php
                        if (isset($_SESSION["error"])) {
                            echo '<div class="error"> ' . $_SESSION["error"] . ' </div>';
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
                            <button type="submit" class="loginbtn" name="login" value="login">Login</button>
                            <button class="btn"><a href="./forgotten_password.php" style="color:whitesmoke; text-decoration:none;">Forgotten Password?</a></button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</section>
<?php
include("includes/footer.php");
?>