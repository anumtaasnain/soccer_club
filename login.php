<?php
include "config.php";
include "header.php";

?>
<style>
    input{
        margin: 10px;
    }
</style>

<div class="container">
    <h1 class="">Login Form:</h1>
    <form method="post">
        <input type="email" placeholder="Enter Your Email:" name="email" class="form-control">
        <input type="password" placeholder="Enter Your password:" name="password" class="form-control">
        <input type="submit" value="Login" name="btn_login" class="btn btn-dark">
        <a href="signup.php" value="Signup" class="btn btn-dark">Signup</a>
    </form>
</div>



<?php
include "footer.php";
?>


<?php

if (isset($_POST['btn_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
   

    $select = " SELECT * FROM users WHERE email='$email' and password='$password' ";
    $result = mysqli_query($conn, $select);
   
    if (mysqli_num_rows($result)) {
        $res = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $email;
       
    }
    else if($email=="anumtashaikh123@gmail.com" && $password=="1234")
    {
        $_SESSION['email'] = $email;
        echo "<script>window.location.href='admin/index.php'</script>";
    }

}
?>