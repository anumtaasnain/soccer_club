<?php
include "header.php";
include "config.php";

?>
<section id="contant" class="contant">
   <div class="container">
      <div class="row">
         <h1>Here is upcomming matches...</h1>
         <div class="col-lg-9 col-sm-12 col-xs-12">
            <div class="news-post-holder">
               
               <?php $select = "SELECT m.MatchDate, m.MatchTime, t1.teamName as Team1Name, t2.teamName as Team2Name, m.Competition 
           FROM matches m
           INNER JOIN teams t1 ON m.Team1ID = t1.teamID
           INNER JOIN teams t2 ON m.Team2ID = t2.teamID";
               $result = mysqli_query($conn, $select);
               while ($row = mysqli_fetch_array($result)) {
               ?>
                  <div class="col-lg-6 col-sm-6 col-xs-12">
                     <div class="news-post-widget">
                        <img class="img-responsive" src="images/img-01_002.jpg" alt="">
                        <div class="news-post-detail">
                           <span class="date"><?php echo $row['MatchDate'] ?></span>
                           <h2><a href="blog-detail.php"><?php echo $row['Team1Name']; ?></a></h2> VS
                           <h2><a href="blog-detail.php"><?php echo $row['Team2Name']; ?></a></h2> 
                           <p><?php echo $row['Competition'] ?></p>
                           <p><?php echo $row['MatchTime'] ?></p>
                        </div>
                     </div>
                  </div> 
                  <?php } ?>


            </div>
         </div>
         <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="content-widget top-story" style="background: url(images/top-story-bg.jpg);">
               <div class="top-stroy-header">
                  <h2>Top Soccer Headlines Story <a href="#" class="fa fa-fa fa-angle-right"></a></h2>
                  <span class="date">July 05, 2017</span>
                  <h2>Other Headlines</h2>
               </div>
               <ul class="other-stroies">
                  <li><a href="#">Wenger Vardy won't start</a></li>
                  <li><a href="#">Evans: Vardy just</a></li>
                  <li><a href="#">Pires and Murray </a></li>
                  <li><a href="#">Okazaki backing</a></li>
                  <li><a href="#">Wolfsburg's Rodriguez</a></li>
                  <li><a href="#">Jamie Vardy compared</a></li>
                  <li><a href="#">Arsenal target Mkhitaryan</a></li>
                  <li><a href="#">Messi wins libel case.</a></li>
               </ul>
            </div>
            <aside id="sidebar" class="right-bar">
               <div class="banner">
                  <img class="img-responsive" src="images/adds-3.jpg" alt="#">
               </div>
            </aside>
         </div>
      </div>
   </div>
</section>
<?php
include "footer.php"
?>