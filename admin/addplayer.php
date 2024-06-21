<?php 
include "header.php";
include "../config.php";
?>

<div class="container">
    <h1>ADD Player</h1>
<form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Player Name</label>
                        <input type="text" class="form-control" placeholder="Enter Name:" name="PlayerName">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Player country</label>
                        <input type="text" class="form-control" placeholder="Enter country Name:" name="country">
                    </div>  
                    <div class="mb-3">
                        <select name="TeamID" class="form-select" id="">
                        <option value="">Select Team Name</option>
                            <?php
                            $select = "select * from teams";
                            $result = mysqli_query($conn, $select);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <option value="<?php echo $row['teamID'] ?>"><?php echo $row['teamName'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Player Position</label>
                        <input type="text" class="form-control" placeholder="Enter position Name:" name="Position">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Player JerseyNumber</label>
                        <input type="text" class="form-control" placeholder="Enter jerseynumber:" name="JerseyNumber">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Player DateOfBirth</label>
                        <input type="date" class="form-control" placeholder="Enter Player dateofbirth:" name="DateOfBirth">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Player Nationality</label>
                        <input type="text" class="form-control" placeholder="Enter Nationality:" name="Nationality">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Player height</label>
                        <input type="text" class="form-control" placeholder="Enter height:" name="Height">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Player weight</label>
                        <input type="text" class="form-control" placeholder="Enter weight:" name="Weight">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Player PlayerImageURL</label>
                        <input type="file" class="form-control" placeholder="Enter playerimageurl:" name="PlayerImageURL">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Player CareerStatistics</label>
                        <input type="text" class="form-control" placeholder="Enter careeerStastics detail:" name="CareerStatistics">
                    </div>

                    <button type="submit" name="add_Player" class="btn btn-primary">Add Player</button>
                </form>
</div>
<?php 
include "footer.php"
?>
<?php
if (isset($_POST['add_Player'])) {
    $PlayerName = $_POST['PlayerName'];
    $TeamID = $_POST['TeamID'];
    $Position = $_POST['Position'];
    $JerseyNumber = $_POST['JerseyNumber'];
    $DateOfBirth = $_POST['DateOfBirth'];
    $Nationality = $_POST['Nationality'];
    $height = $_POST['Height'];
    $weight = $_POST['Weight'];
    $PlayerImageURL = $_FILES['PlayerImageURL'];
    $filename = $_FILES['PlayerImageURL']['name'];
    $temp_name = $PlayerImageURL['tmp_name'];
    move_uploaded_file($temp_name, "player/$filename");

    $insert = "INSERT INTO players( PlayerName,TeamID,Position,JerseyNumber,DateOfBirth,Nationality,Height,Weight,PlayerImageURL) VALUES ('$PlayerName','$TeamID','$Position','$JerseyNumber','$DateOfBirth','$Nationality','$height','$weight','$filename')";
    $result = mysqli_query($conn, $insert);

    if ($result) {
        echo "Players inserted table....";
    }
}

?>