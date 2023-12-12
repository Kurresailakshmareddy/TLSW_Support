<?php
include("includes/header.php");

require("functions.php");

check_login() ;

?>
  

<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Cookies</h2>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                      <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">NO.</th>
                            <th scope="col">Page</th>
                            <th scope="col">Element</th>
                            <th scope="col">Timestamp</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $sql = " SELECT * FROM page_views ORDER BY `page_views`.`id` DESC ";
                          $result = $conn->query($sql);
        
                          if ($result->num_rows > 0) {
                            $i = 1 ;
                            while($row = $result->fetch_assoc()) {
                              ?>
                                <tr>
                                    <th scope="row"><?=$i;?></th>
                                    
                                    <td><p><?=$row["page"];?></p></td>
                                    <td><p><?=$row["element"];?></p></td>
                                    <td><p><?=$row["timestamp"];?></p></td> 
                                </tr>
                              <?php
                              $i++ ;
                            }
                          } 
                          else {
                            echo "<tr><td colspan='6'>No results</td></tr>";
                          }
                          ?>
                        </tbody>
                      </table>
            </div>
            </div>
        </div>
    </div>
</section>
<?php
    include("includes/footer.php");
?>
