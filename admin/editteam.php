<?php 
include "header.php";
include "../config.php";

$id = $_GET['Id'];
$select = "SELECT * FROM teams where teamID = $id";
$result = mysqli_query($conn,$select);
$row = mysqli_fetch_assoc($result);
?>
<div class="container">
    <h1>edit Player</h1>
<form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Player Name</label>
                        <input type="text" class="form-control" placeholder="Enter Name:" name="teamName" value="<?php echo $row['teamName']?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Player country</label>
                        <input type="text" class="form-control" placeholder="Enter country Name:" name="country" value="<?php echo $row['country'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Player coach</label>
                        <input type="text" class="form-control" placeholder="Enter coach Name:" name="coach" value="<?php echo $row['coach'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Player Name</label>
                        <input type="date" class="form-control" placeholder="Enter foundYear Name:" name="foundedYear" value="<?php echo $row['foundedYear'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Player Image</label>
                        <input type="file" class="form-control" placeholder="Enter Player Image:" name="logoURL">
                        <img src="team/<?php echo$row['logoURL'] ?>" height="100px" width="100px" alt="">
                    </div>
                    <button type="submit" name="upd_Player" class="btn btn-primary">Update Player</button>
                </form>
</div>
<?php 
include "footer.php"
?>

<?php

if (isset($_POST['upd_Player'])) {
    $teamName = $_POST['teamName'];
    $country = $_POST['country'];
    $coach = $_POST['coach'];
    $foundedYear = $_POST['foundedYear'];
    $logoURL = $_FILES['logoURL'];
    $filename = $_FILES['logoURL']['name'];
    $temp_name = $logoURL['tmp_name'];
    move_uploaded_file($temp_name, "team/$filename");

   if($filename=="")
   {
     $update = "UPDATE teams SET teamName = '$teamName', country = '$country', coach = '$coach', foundedYear = '$foundedYear' where teamID = $id";
   }
  
   else{
    $update = "UPDATE teams SET teamName = '$teamName', country = '$country', coach = '$coach', foundedYear = '$foundedYear', logoURL='$filename' where teamID = $id ";
   }

   $result = mysqli_query($conn,$update);
   if($result)
   {
    echo "<script>window.location.href='showteam.php'</script>";
   }
   else{
    echo "<script>alert('team not updated ...')</script>";
   }
}
?>