<!-- Header of the page -->
<?php
include("includes/header.php");
?>


<!-- Body of the page -->
<br><br><br>
<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>About Us</h2>
            </div>
        </div>
    </div>
</section>

<section class="sec_space">
    <div class="container" style="background-color: #00c0bb ; border-radius: 20px 20px 20px 20px; margin-top:-50px;">
        <div class="box-wrapper_2">
            <div class="row" style="padding:70px;">
                <div class="col-md-8" style="background-color:00a29e ; border-radius: 20px 20px 20px 20px; ">
                    <p align="justify">
                        TLSW Support is run by Suzanne McGladdery, an Independent Social Worker based in the UK, who
                        provides Therapeutic Life Story Work interventions, consultation, supervision and training
                        including internationally on the TLSW Diploma.
                    </p>

                    <p align="justify">
                        Suzanne completed Richard Rose's Diploma in TLSW in 2016 and obtained an MSc in Social Work in
                        1989. Suzanne also holds an Advanced Award in Social Work and has undertaken Systemic Family Therapy
                        training to intermediate level, and Dyadic Developmental Psychotherapy (DDP) Levels 1 and 2 all
                        of which inform her trauma, attachment and strengths based practice.
                    </p>
                    <p align="justify">
                        Suzanne's professional career has focused on working with children and families in statutory
                        child protection teams as well as in fostering and adoption sectors. Her passion has always been
                        working creatively with children, she has developed a range of direct work tools and creates
                        professionally published therapeutic story books based on telling the child's story through their favourite
                        characters. Suzanne's model of creating therapeutic stories has been endorsed by Professor Richard Rose, and a
                        3-day training programme has been developed and designed with co-author Karla Burley.
                    </p>
                    <p align="justify">
                        Suzanne is experienced in the design and delivery of training for a wide range of professionals
                        and has presented her work at conferences such as the 1st International Life Story Summit in Lisbon
                        in 2018 and 2nd International Life Story Work Summit in Melbourne in 2022.
                    </p>
                    <p align="justify">
                        Suzanne is a TLSWi Board Member and her work is supervised by Professor Richard Rose, founder of
                        TLSW and Alison Keith, Play Therapist, DDP Practitioner, Consultant and Trainer DDPI Board
                        Member.
                    </p>

                </div>
                <br><br><br>
                <div class="col-md-4">
                    <?php
                    $sql = "SELECT * FROM profileimg";
                    $res = mysqli_query($conn,  $sql);

                    if (mysqli_num_rows($res) > 0) {
                        while ($profileimg = mysqli_fetch_array($res)) {  ?>
                            <img src="./uploads/profileimg/<?php echo $profileimg['image']; ?>" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  border-radius: 25px; margin-top:20px; wdith: 400px; height:400px;" />
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
</section><br><br>

<!-- Testimonies Section -->
<section id="newsfeed_sec" class="sec_space">
    <div class="container">
        <div class="row heading_sec">
            <div class="col-md-12">
                <h2>Testimonies</h2>
            </div>
        </div>
        <?php
        $sql = " SELECT * FROM testimony";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($testimony = $result->fetch_assoc()) {
        ?>
                <div class="row newsfeed_list">

                    <div class="col-md-3">
                        <div class="newsfeed_image">
                            <img src="./uploads/testimonys/<?php echo $testimony['image']; ?>" />
                        </div>
                    </div><br><br><br>
                    <div class="col-md-3">
                        <div class="newsfeed_name" style="font-family:'CalibriBold'; font-size:16px;">
                            <?php echo $testimony['name']; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="newsfeed_desc">
                            <?php echo $testimony['message']; ?>
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