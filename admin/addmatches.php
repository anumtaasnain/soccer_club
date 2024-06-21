<?php 
include "header.php";
include "../config.php";
?>

<div class="container">
    <h1>ADD Player</h1>
<form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Match Date</label>
                        <input type="date" class="form-control" placeholder="Enter MatchDate:" name="MatchDate">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Match Time</label>
                        <input type="time" class="form-control" placeholder="Enter Match Time:" name="MatchTime">
                    </div>  
                    <div class="mb-3">
                        <select name="Team1ID" class="form-select" id="">
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
                        <select name="Team2ID" class="form-select" id="">
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
                        <label for="exampleInputEmail1" class="form-label">Competition</label>
                        <input type="text" class="form-control" placeholder="Enter Competition:" name="Competition">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Stadium</label>
                        <input type="text" class="form-control" placeholder="Enter Stadium:" name="Stadium">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">MatchStatus</label>
                        <input type="text" class="form-control" placeholder="Enter MatchStatus:" name="MatchStatus">
                    </div>

                    <button type="submit" name="add_match" class="btn btn-primary">Add Match</button>
                </form>
</div>
<?php 
include "footer.php"
?>
<?php
if (isset($_POST['add_match'])) {
    $MatchDate = $_POST['MatchDate'];
    $MatchTime = $_POST['MatchTime'];
    $Team1ID = $_POST['Team1ID'];
    $Team2ID = $_POST['Team2ID'];
    $Competition = $_POST['Competition'];
    $Stadium = $_POST['Stadium'];
    $MatchStatus = $_POST['MatchStatus'];

    $insert = "INSERT INTO matches(MatchDate, MatchTime, Team1ID, Team2ID, Competition, Stadium, MatchStatus)VALUES ('$MatchDate','$MatchTime','$Team1ID','$Team2ID','$Competition','$Stadium','$MatchStatus')";
    $result = mysqli_query($conn, $insert);

    if ($result) {
        echo "Match inserted table....";
    }
}

?>