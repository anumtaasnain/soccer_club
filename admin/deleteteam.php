<?php 
include "header.php";
include "../config.php";

$id = $_GET['Id'];
$delete = "DELETE FROM teams WHERE teamID = $id";

$result = mysqli_query($conn,$delete);
if($result)
{
    echo "<script>window.location.href='showteam.php'</script>";
}
else{
    echo "<script>alert('team not delete ...')</script>";
   }

?>