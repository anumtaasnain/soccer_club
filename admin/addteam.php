<?php 
include "header.php";
include "../config.php"
?>
<div class="container">
    <h1>ADD Team Here</h1>
<form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Team Name</label>
                        <input type="text" class="form-control" placeholder="Enter Name:" name="teamName">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Team country</label>
                        <input type="text" class="form-control" placeholder="Enter country Name:" name="country">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Team coach</label>
                        <input type="text" class="form-control" placeholder="Enter coach Name:" name="coach">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">FoundYear Nam</label>
                        <input type="date" class="form-control" placeholder="Enter foundYear Name:" name="foundedYear">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Team Image</label>
                        <input type="file" class="form-control" placeholder="Enter Player Image:" name="logoURL">
                    </div>
                    <button type="submit" name="add_Player" class="btn btn-primary">Add Team</button>
                </form>
</div>
<?php 
include "footer.php"
?>

<?php
if (isset($_POST['add_Player'])) {
    $teamName = $_POST['teamName'];
    $country = $_POST['country'];
    $coach = $_POST['coach'];
    $foundedYear = $_POST['foundedYear'];
    $logoURL = $_FILES['logoURL'];
    $filename = $_FILES['logoURL']['name'];
    $temp_name = $logoURL['tmp_name'];
    move_uploaded_file($temp_name, "team/$filename");

    $insert = "INSERT INTO teams(teamName,country,coach,foundedYear,logoURL) VALUES ('$teamName','$country','$coach','$foundedYear','$filename')";
    $result = mysqli_query($conn, $insert);

    if ($result) {
        echo "Products inserted in product table....";
    }
}

?>