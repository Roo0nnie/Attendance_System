<?php
include 'db_conn.php';
if(isset($_POST['submit'])){
    $admin_name = $_POST['admin_name'];
    $admin_last = $_POST['admin_last'];
    $admin_user = $_POST['admin_user'];
    $admin_pass = $_POST['admin_pass'];


    // Assuming you have an admin_id ID to identify the record to update
    $admin_id = $_POST['admin_id'];
    $sql = "UPDATE admin_account SET 
            admin_name = '$admin_name',
            admin_last = '$admin_last',
            admin_user = '$admin_user',
            admin_pass = '$admin_pass'
            WHERE admin_id = '$admin_id'";

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
    $fetch_sql = "SELECT * FROM admin_account WHERE admin_id = $edit_id";
    $fetch_result = mysqli_query($conn, $fetch_sql);

    if($fetch_result && mysqli_num_rows($fetch_result) > 0){
        $row = mysqli_fetch_assoc($fetch_result);
        $edit_admin_name = $row['admin_name'];
        $edit_admin_last = $row['admin_last'];
        $edit_admin_user = $row['admin_user'];
        $edit_admin_pass = $row['admin_pass'];
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
    
    <title>Edit Admin</title>
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
                            </div>
                            <div class="col-9">    
                            <form method="POST">
                                <div class="input-group">
                                    <input type="hidden"name="admin_id" value="<?php echo $edit_id; ?>">
                                    <input type="text" class="form-control" placeholder="First name" name="admin_name" size="30" value="<?php echo $edit_admin_name; ?>">
                                    <span class="input-group-btn"></span>
                                    <input type="text" class="form-control" placeholder="Last name" name="admin_last" size="30" value="<?php echo $edit_admin_last; ?>">         
                                </div>
                                <input type="text" class="form-control mt-2" placeholder="Username" name="admin_user" size="30" value="<?php echo $edit_admin_user; ?>">  
                                <input type="text" class="form-control mt-2" placeholder="Password" name="admin_pass" size="50" value="<?php echo $edit_admin_pass; ?>">
                             
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