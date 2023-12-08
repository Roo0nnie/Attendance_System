<?php
include 'db_conn.php';
if(isset($_POST['submit'])){
    
    $prod_name = $_POST['prod_name'];
    $prod_stock = $_POST['prod_stock'];
    $prod_size = $_POST['prod_size'];
    $prod_price = $_POST['prod_price'];
    $prod_description = $_POST['prod_description'];
    $prod_image = $_POST['prod_image_old'];
    
    

    // Assuming you have an prod_id ID to identify the record to update
    $prod_id = $_POST['prod_id'];
    $sql = "UPDATE product_details SET 
            prod_name = '$prod_name',
            prod_stock = '$prod_stock',
            prod_size = '$prod_size',
            prod_price = '$prod_price',
            prod_description = '$prod_description',
            prod_image = '$prod_image'
            WHERE prod_id = '$prod_id'";

    if(mysqli_query($conn, $sql)){
        // echo "Record updated successfully";
        header('location:index.php');
    } else {
        echo "Could not update record: ". mysqli_error($conn);
    }
}

// Fetch the existing data to pre-fill the form for editing
if(isset($_GET['id'])){
    $edit_id = $_GET['id'];
    $fetch_sql = "SELECT * FROM product_details WHERE prod_id = $edit_id";
    $fetch_result = mysqli_query($conn, $fetch_sql);

    if($fetch_result && mysqli_num_rows($fetch_result) > 0){
        $row = mysqli_fetch_assoc($fetch_result);
        $edit_prod_name = $row['prod_name'];
        $edit_prod_stock = $row['prod_stock'];
        $edit_prod_size = $row['prod_size'];
        $edit_prod_price = $row['prod_price'];
        $edit_prod_description = $row['prod_description'];
        $edit_prod_image = $row['prod_image'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
   <link rel="stylesheet" href="./css/admin_update.css">
    
    <title>Edit Product</title>

    <style>
        .img {
            height: 200px;
            width:300px;
        }
        .top-first {
            margin-top:14rem;
        } 

    </style>
</head>
<body>
    <div class="bg-yellow">
        <div class="px-3 container-yellow">
            <nav class="nav"><!--nav start-->
                <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#profile">Profile</a></li>
            </nav><!--nav end-->
            <div class="tab-content m-3"><!--tab content start-->
                <div id="profile" class="tab-pane active">
                    <div class="container">
                        <div class="row">
                            <div class="bg-yellow-container position-relative" style="min-height:150px; "> 
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-3">
               
                            <div class="row"><div><label for="" class="form-label top-first">Product</label></div></div>
                            <div class="row"><div><label for="" class="form-label mt-3">Stock</label></div></div>
                            <div class="row"><div><label for="" class="form-label mt-3">Price</label></div></div>
                            <div class="row"><div><label for="" class="form-label mt-3">Size</label></div></div>
                            <div class="row"><div><label for="" class="form-label mt-3">Description</label></div></div>
                            </div>
                            <div class="col-9">    
                            <form method="POST">
                  
                                    <input type="hidden"name="prod_id" value="<?php echo $edit_id; ?>">
                                    <img src="<?php echo $edit_prod_image; ?>" alt="" class="img">
                                    <input type="text" class="form-control mt-2" placeholder="Product" name="prod_name" size="30" value="<?php echo $edit_prod_name; ?>">
                                    <input type="text" class="form-control mt-2" placeholder="Stock" name="prod_stock" size="30" value="<?php echo $edit_prod_stock; ?>">
                                    <input type="text" class="form-control mt-2" placeholder="Size" name="prod_size" size="30" value="<?php echo $edit_prod_size; ?>">
                                    <input type="text" class="form-control mt-2" placeholder="Price" name="prod_price" size="30" value="<?php echo $edit_prod_price; ?>">
                                    <div class="form-floating">
                                      <textarea class="form-control mt-2" placeholder="Leave a comment here" id="floatingTextarea" name="prod_description"><?php echo $edit_prod_description; ?></textarea>
                                      <label for="floatingTextarea">Comments</label>
                                    </div>
                                    <input type="hidden" class="form-control mt-2" placeholder="" name="prod_image_old" size="30" value="<?php echo $edit_prod_image; ?>">
                                    <input type="submit" name="submit" value="Save" class="btn-red mt-2">
                               
                                
                            </form> 
                            </div>
                        </div>
                    </div>
                    <div class="updatelogo" >
                            <img src="./assets/img/LogoCloseUp.png" alt="">
                        </div>
                </div>
        </div>
    </div>
</body>
</html>