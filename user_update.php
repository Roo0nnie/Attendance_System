<?php
include 'db_conn.php';
if(isset($_POST['submit'])){
    $user_name = $_POST['user_name'];
    $user_middle = $_POST['user_middle'];
    $user_last = $_POST['user_last'];
    $user_user = $_POST['user_user'];
    $user_pass = $_POST['user_pass'];
    $user_address = $_POST['user_address'];
    $user_mobile = $_POST['user_mobile'];


    // Assuming you have an user_id ID to identify the record to update
    $user_id = $_POST['user_id'];
    $sql = "UPDATE user_account SET 
            user_name = '$user_name',
            user_middle = '$user_middle',
            user_last = '$user_last',
            user_user = '$user_user',
            user_pass = '$user_pass',
            user_address = '$user_address',
            user_mobile = '$user_mobile'
            WHERE user_id = '$user_id'";

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
    $fetch_sql = "SELECT * FROM user_account WHERE user_id = $edit_id";
    $fetch_result = mysqli_query($conn, $fetch_sql);

    if($fetch_result && mysqli_num_rows($fetch_result) > 0){
        $row = mysqli_fetch_assoc($fetch_result);
        $edit_user_name = $row['user_name'];
        $edit_user_middle = $row['user_middle'];
        $edit_user_last = $row['user_last'];
        $edit_user_user = $row['user_user'];
        $edit_user_pass = $row['user_pass'];
        $edit_user_address = $row['user_address'];
        $edit_user_mobile = $row['user_mobile'];
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
    
    <title>Edit User</title>
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
                            <div class="profile position-absolute">
                                <img src="" alt="">
                            </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-3">
                            <div class="row"><div><label for="" class="form-label mt-2">Full name</label></div></div>
                            <div class="row"><div><label for="" class="form-label mt-3">Username</label></div></div>
                            <div class="row"><div><label for="" class="form-label mt-3">Password</label></div></div>
                            <div class="row"><div><label for="" class="form-label mt-3">Address</label></div></div>
                            <div class="row"><div><label for="" class="form-label mt-3">Mobile</label></div></div>
                            </div>
                            <div class="col-9">    
                            <form method="POST">
                                <div class="input-group">
                                    <input type="hidden"name="user_id" value="<?php echo $edit_id; ?>">
                                    <input type="text" class="form-control" placeholder="First name" name="user_name" size="30" value="<?php echo $edit_user_name; ?>">
                                    <span class="input-group-btn"></span>
                                    <input type="text" class="form-control" placeholder="Last middle" name="user_middle" size="30" value="<?php echo $edit_user_middle; ?>"> 
                                    <input type="text" class="form-control" placeholder="Last name" name="user_last" size="30" value="<?php echo $edit_user_last; ?>">         
                                </div>
                                <input type="text" class="form-control mt-2" placeholder="Username" name="user_user" size="30" value="<?php echo $edit_user_user; ?>">  
                                <input type="text" class="form-control mt-2" placeholder="Password" name="user_pass" size="50" value="<?php echo $edit_user_pass; ?>">
                                <input type="text" class="form-control mt-2" placeholder="Password" name="user_address" size="50" value="<?php echo $edit_user_address; ?>">
                                <input type="text" class="form-control mt-2" placeholder="Password" name="user_mobile" size="50" value="<?php echo $edit_user_mobile; ?>">
                             
                                <input type="submit" name="submit" value="Save" class="btn-red mt-2">
                               
                                
                            </form> 
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</body>
</html>