<?php 
include "header.php";
include "config.php";
?>
      <section id="contant" class="contant main-heading Player">
         <div class="row">
            <div class="container">

            <?php
            $select = "select * from teams";
            $result = mysqli_query($conn, $select);
            while ($row = mysqli_fetch_array($result)){
?>
<div class="col-md-3 column">
                  <div class="card">
                     <img class="" src="../admin/team/<?php echo $row['logoURL'] ?>" alt="John" height="250px" style="width:100%">
                     <div class="">
                        <h4><?php echo $row['teamName'] ?></h4>
                        <p class="title"><?php echo $row['country'] ?></p>
                        <p class="title"><?php echo $row['coach'] ?></p>
                        <p class="title"><?php echo $row['foundedYear'] ?></p>
                        </p>
                     </div>
                  </div>
               </div>
<?php } ?>
               
            </div>
         </div>
      </section>

      <?php 
      include "footer.php"
      ?>
      