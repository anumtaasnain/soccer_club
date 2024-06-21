<?php
include "header.php";
include "../config.php";
?>

<style>
    img{
        height: 100px;
    }
</style>

<table class="table">
    <thead>
        <tr>
            <th>Team ID</th>
            <th>Team Name</th>
            <th>Team Country</th>
            <th>Team Coach</th>
            <th>Team FoundedYear</th>
            <th>Team Logo URL</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $select = "select * from teams";
        $result = mysqli_query($conn, $select);
        while ($row = mysqli_fetch_array($result)) {
         ?>
            <tr>
                <td><?php echo $row['teamID'] ?></td>
                <td><?php echo $row['teamName'] ?></td>
                <td><?php echo $row['country'] ?></td>
                <td><?php echo $row['coach'] ?></td>
                <td><?php echo $row['foundedYear'] ?></td>
                <td><img src="team/<?php echo $row['logoURL'] ?>" alt=""></td>
                <td><a href="editteam.php?Id=<?php echo $row['teamID']?>"  class="btn btn-warning">Edit</a></td>
                <td><a href="deleteteam.php?Id=<?php echo $row['teamID']?>" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>


<?php
include "footer.php";
?>