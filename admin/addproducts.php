<?php 
include "header.php";
include "../config.php";
?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Basic Form</h6>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Name</label>
                        <input type="text" class="form-control" placeholder="Enter Product Name:" name="pname">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Description</label>
                        <input type="text" class="form-control" placeholder="Enter Product Description:" name="pdesc">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Price</label>
                        <input type="text" class="form-control" placeholder="Enter Product Price:" name="pprice">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Quantity</label>
                        <input type="text" class="form-control" placeholder="Enter Product Quantity:" name="pqty">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Image</label>
                        <input type="file" class="form-control" placeholder="Enter Product Image:" name="pimage">
                    </div>
                    <button type="submit" name="add_Prod" class="btn btn-primary">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php" ?>



<?php
if (isset($_POST['add_Prod'])) {
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pqty = $_POST['pqty'];
    $pdesc = $_POST['pdesc'];
    $pimage = $_FILES['pimage'];
    $filename = $_FILES['pimage']['name'];
    $temp_name = $pimage['tmp_name'];
    move_uploaded_file($temp_name, "Products/$filename");

    $insert = "INSERT INTO products( pname,pdesc,pimage,pprice,pqty) VALUES ('$pname','$pdesc','$filename','$pprice','$pqty')";
    $result = mysqli_query($conn, $insert);

    if ($result) {
        echo "Products inserted in product table....";
    }
}

?>