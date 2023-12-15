<?php
include 'db_conn.php';
if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $com_id = $_POST['com_id'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];


    // Assuming you have an admin_id ID to identify the record to update
    $emp_id = $_POST['emp_id'];
    $sql = "UPDATE employee SET 
            first_name = '$first_name',
            middle_name = '$middle_name',
            last_name= '$last_name',
            com_id= '$com_id',
            address= '$address',
            email= '$email',
            phone = '$phone'
            WHERE emp_id = '$emp_id'";

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
    $fetch_sql = "SELECT * FROM employee WHERE emp_id = $edit_id";
    $fetch_result = mysqli_query($conn, $fetch_sql);

    if($fetch_result && mysqli_num_rows($fetch_result) > 0){
        $row = mysqli_fetch_assoc($fetch_result);
        $edit_first_name = $row['first_name'];
        $edit_middle_name = $row['middle_name'];
        $edit_last_name = $row['last_name'];
        $edit_com_id = $row['com_id'];
        $edit_address = $row['address'];
        $edit_email = $row['email'];
        $edit_phone = $row['phone'];
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
    
    <title>Edit Employee</title>
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
                            <div class="row"><div><label for="" class="form-label mt-3">Company ID</label></div></div>
                            <div class="row"><div><label for="" class="form-label mt-3">Address</label></div></div>
                            <div class="row"><div><label for="" class="form-label mt-3">Email</label></div></div>
                            <div class="row"><div><label for="" class="form-label mt-3">Phone</label></div></div>

                            </div>
                            <div class="col-9">    
                            <form method="POST">
                                <div class="input-group">
                                    <input type="hidden"name="emp_id" value="<?php echo $edit_id; ?>">
                                    <input type="text" class="form-control" placeholder="First name" name="first_name" size="30" value="<?php echo $edit_first_name; ?>">
                                    <span class="input-group-btn"></span>
                                    <input type="text" class="form-control" placeholder="Middle name" name="middle_name" size="30" value="<?php echo $edit_middle_name; ?>">         

                                    <input type="text" class="form-control" placeholder="Last name" name="last_name" size="30" value="<?php echo $edit_last_name; ?>">         
                                </div>
                                <input type="text" class="form-control mt-2" placeholder="Company ID" name="com_id" size="30" value="<?php echo $edit_com_id; ?>">
                                <input type="text" class="form-control mt-2" placeholder="Address" name="address" size="30" value="<?php echo $edit_address; ?>">  
                                <input type="text" class="form-control mt-2" placeholder="Email" name="email" size="30" value="<?php echo $edit_email; ?>">  

                                <input type="text" class="form-control mt-2" placeholder="Phone" name="phone" size="50" value="<?php echo $edit_phone; ?>">
                             
                                <input type="submit" name="submit" value="Save" class="btn-red mt-2">
                               
                            </form> 
                            </div>
                        </div>
                        <div class="updatelogo" >
                            <img src="./assets/img/LogoCloseUp.png" alt="">
                        </div>
                    </div>
                </div>
        </div>
    </div>
</body>
</html>