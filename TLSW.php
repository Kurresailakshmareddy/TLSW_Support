<!-- Header of the page -->
<?php
include("includes/header.php");
?>
<br><br>

<!-- Body starts from here -->
<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12"><br>
                <h2>All About Therapeutic Life Story Work Support </h2>
            </div>
        </div>
    </div>
</section>


<section class="para1">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <br><br><br>
                <p align="justify" style="font-size:17px;">
                    <b>What is Therapeutic Life Story Work?</b><br>
                </p>
                <p align="justify" style="font-size:17px;">
                    Life story work was developed to support children who are unable to live with
                    their birth families. It helps them to gain an understanding of and helpful narrative about their birth family history. It is trauma-informed and guided by theories of attachment, separation and loss, identity, and child development, as found in the works of writers such as Brodzinsky et al. (1984) and Fahlberg(1994).<br><br>

                    A Therapeutic Life Story Work intervention can help a child or adult make sense of their past
                    and understand how this impacts their present. It can help them to build healthy relationships and make positive changes for the future. The focus is not on telling the story to them, but rather on the therapeutic process which facilitates and contains the child's exploration of information about their past, making sense of it and creating a narrative from their view.
                </p><br><br>

            </div>

            <div class="col-md-4">
                <center><img src="./images/tlsw2.png" class="img-responsive" style="margin-top:95px;" /></center>
            </div>
        </div>
        <br>


        <div class="row">
            <div class="col-md-4">
                <br><br><br><br><br><br><br><br>
                <center><img src="./images/tlsw1.png" class="img-responsive" /></center>
            </div>
            <br><br><br>

            <div class="box-wrapper_2">
                <p align="justify" style="font-size:17px;"><b>How did Therapeutic Life Story Work Develop?</b><br></p>

                <p align="justify" style="font-size:17px;"> 
                
                    In the UK, legislation such as The Adoption and Children Act 2002 and The Children Act 2004 acknowledged the importance of attachment and the need for access to therapeutic interventions and core practices, such as life story work, to help children in forming attachments and developing a secure emotional base. Following this legislation, life story work practitioners, such as  Nicholls (2005), Rees (2009) and Baynes (2008), began writing about their practices. Rose and Philpot (2005) advocated a therapeutic approach as part of the recovery process from trauma, based on  psychodynamic  principles of considering not just the information but the impact of past experiences and relationships on the present. More recently, Rose (2012) and Wrench and Naylor (2013) have  developed  trauma-informed therapeutic models.<br><br>
                    
                    The Rose Model of Therapeutic Life Story Work is an approach based on attachment and child
                    development theories. It provides a holistic way of healing trauma through processes of
                    internalisation and integration and is based on principles of psychodynamic and attachment
                    theory.

                    Writers such as Perry (2001) and Van Der Kolk (2014) further developed early theories of
                    attachment and child development, such as Bowlby's (1969 and 1988) internal working model, to show the impact of the child's relationship with their primary caregiver and adverse childhood experiences on their developing brain. The Rose Model of Therapeutic Life Story Work enables children to explore, question and understand the past events of their lives. It aims to secure their future through strengthening attachment with their parents and providing the opportunity to develop a healthy sense of self and feelings of wellbeing.

                </p>

            </div>
        </div>
        <br>


        <div class="row">
            <div class="col-md-8">
                <br><br><br>
                <p align="justify" style="font-size:17px;"><b>How does it work?</b><br></p>

                <p align="justify" style="font-size:17px;">

                    The Rose Model of Therapeutic Life Story Work seeks to provide children with a narrative of their life, to enable healing from the trauma of abuse, abandonment and neglect, through talking, play andart activities. Thoughts and feelings are usually recorded on wallpaper; if working online the recording can also be done in a variety of ways, such as creating a document as a continuous sheet of paper working online is explored in detail in Chapter 13. The aim is to support the child in externalising their thoughts and feelings in order to investigate and internalise them in a potentially new and more helpful way. <a style="color: white;" href="./PDFs/TLSWS_ROSE MODEL.pdf">Click here to know more about Rose Model and TLSWi.</a>
                </p><br><br>

            </div>
            <br><br><br>
            <div class="col-md-4">
                <center><img src="./images/tlsw3.png" class="img-responsive" /></center>
            </div>
        </div>
        <br>

    </div>
    </div>
</section><br><br>


<!-- Latest News Section -->
<section id="newsfeed_sec" class="sec_space">
    <div class="container">
        <div class="row heading_sec">
            <div class="col-md-12">
                <h2>Latest News</h2>
            </div>
        </div>
        <?php
        $sql = " SELECT * FROM newsfeed";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($newsfeed = $result->fetch_assoc()) {
        ?>
                <div class="row newsfeed_list">

                    <div class="col-md-3">
                        <div class="newsfeed_image" style=" border: 1.5px solid #333; border-radius:10px;">
                            <img src="./uploads/news_feed/<?php echo $newsfeed['image']; ?>" />
                        </div>
                    </div>
                    <div class="col-md-3" style="font-family: 'CalibriBold'; font-size:20px;">
                        <div class="newsfeed_name">
                            <?php echo $newsfeed['name']; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="newsfeed_desc">
                            <?php echo $newsfeed['message']; ?>
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