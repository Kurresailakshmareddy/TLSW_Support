<!-- Heeader of the page -->
<?php
include("includes/header.php");
require("functions.php");
?>
<br><br><br>

<!-- Body of the page -->
<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Training</h2>
            </div>
        </div>
    </div>
</section>

<section id="services_sec" class="sec_space">
    <div class="container">
        <?php
        $sql = " SELECT * FROM services";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($service = $result->fetch_assoc()) {
        ?>
                <div class="row services_list">

                    <div class="col-md-3">
                        <div class="services_image">
                            <img src="./uploads/services/<?php echo $service['image']; ?>" style=" border: 1.5px solid #333; border-radius:10px;" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="services_name" style="font-family:'CalibriBold'; font-size:20px;">
                            <?php echo $service['name']; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="services_desc">
                            <?php echo $service['description']; ?><br><br>
                            <a href="./uploads/services/<?php echo $service['file']; ?>" download>
                                <?php echo $service['file']; ?>
                            </a>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</section>


<!-- Footer of the page -->
<?php
include("includes/footer.php");
?>