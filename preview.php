<?php
    include("includes/header.php");
?>

<!DOCTYPE html>
<html>
<head>

<style>

.photo{
    display: flex;
    width: 100px;
    height: 100px;
    padding: 5px;
    justify-content: center;
    align-items: center;
}

.photo img {
    width: 100%;
    height: 100%;
}

a {
    text-decoration: none;
    color: black;
    text-align: center;
}
</style>

</head>
<body>
     <?php 
          $sql = "SELECT * FROM profile ORDER BY id DESC";
          $res = mysqli_query($conn,  $sql);

          if (mysqli_num_rows($res) > 0) { // verifing  the photo upload by the user 
          	while ($images = mysqli_fetch_assoc($res)) {  ?> 
             
             <div class="photo">
             	<img src="profile_Img/<?=$images['profile_url']?>">
             </div>	
    <?php } }?><br>

	<a href="/Main/profile.php" class="btn" style="color:whitesmoke; text-decoration:none;">BACK</a><br>
	<br><p>[Your photo is upload successfuly]</p> 
	
</body>
</html>