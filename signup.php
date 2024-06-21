<?php
include "header.php";
include "config.php";
?>

<style>
  input {
    margin: 30px;
  }
</style>
<div class="container">
  <!-- <h1 class="alert alert-success">Signup For For registration:</h1> -->
  <form method="post" enctype="multipart/form-data">
    <input type="text" placeholder="Enter Your Name:" name="name" class="form-control">
    <input type="email" placeholder="Enter Your Email:" name="email" class="form-control">
    <input type="text" placeholder="Enter Your Phone Number:" name="contactNumber" class="form-control">
    <input type="text" placeholder="Enter Your Addresss:" name="address" class="form-control">
    <input type="text" placeholder="Enter Your Username:" name="username" class="form-control">
    <input type="password" placeholder="Enter Your password:" name="password" class="form-control">
    <input type="date" placeholder="Enter Your Dob:" name="registrationDate" class="form-control">
    <br>
    <input type="submit" value="Signup" name="btn_signup" class="btn btn-success">
  </form>
</div>

<?php
if (isset($_POST['btn_signup'])) {
  $name =  $_POST['name'];
  $email =  $_POST['email'];
  $contactNumber =  $_POST['contactNumber'];
  $address =  $_POST['address'];
  $username =  $_POST['username'];
  $password =  $_POST['password'];
  $registrationDate =  $_POST['registrationDate'];

  //   move_uploaded_file($temp_name,"User/$filename");

  $insert = "INSERT INTO users(name, email, contactNumber, address, username, password, registrationDate) VALUES ('$name','$email','$contactNumber','$address','$username','$password','$registrationDate')";
  $result = mysqli_query($conn, $insert);
  if ($result) {
    echo "<script> alert('value inserted successfully') </script>";
    header("location:login.php");
  }
}
?>

<?php
include "footer.php"
?>