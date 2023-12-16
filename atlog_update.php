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
    $sql_employee = "SELECT * FROM `employee`";
    $result_employee = mysqli_query($conn, $sql_employee);

    if ($result_employee) {
    while ($row_employee = mysqli_fetch_assoc($result_employee)) {
        $emp_id = $row_employee['emp_id'];
        $sql_atlog = "SELECT * FROM atlog WHERE emp_id = '$emp_id'";
        $result_atlog = mysqli_query($conn, $sql_atlog);
        $edit_id_loop = 0;
        $edit_emp_first = $row_employee['first_name'];
        $edit_emp_mid = $row_employee['middle_name'];
        $edit_emp_last = $row_employee['last_name'];
        $edit_com_id = $row_employee['com_id'];
    
                if ($result_atlog) {

                    while ($row_atlog = mysqli_fetch_assoc($result_atlog)) {
                        $edit_atlog_id = $row_atlog['atlog_id'];
                        $edit_atlog_date = $row_atlog['atlog_date'];
                        $edit_am_in = $row_atlog['am_in'];
                        $edit_am_out = $row_atlog['am_out'];
                        $edit_pm_in = $row_atlog['pm_in'];
                        $edit_pm_out = $row_atlog['pm_out'];
                    }
                }
            }
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
                            <div class="row"><div><label for="" class="form-label mt-3">Company ID</label></div></div>
                            <div class="row"><div><label for="" class="form-label mt-3">Date</label></div></div>
                            <div class="row"><div><label for="" class="form-label mt-3">AM in</label></div></div>
                            <div class="row"><div><label for="" class="form-label mt-3">AM out</label></div></div>
                            <div class="row"><div><label for="" class="form-label mt-3">PM in</label></div></div>
                            <div class="row"><div><label for="" class="form-label mt-3">PM out</label></div></div>
                            </div>
                            <div class="col-9">    
                            <form method="POST">
                                <div class="input-group">
                                    <input type="hidden"name="admin_id" value="<?php echo $edit_atlog_id; ?>">
                                    <input type="text" class="form-control" placeholder="First name" name="first_name" size="30" value="<?php echo $edit_emp_first; ?>">
                                    <input type="text" class="form-control" placeholder="Middle name" name="middle_name" size="30" value="<?php echo $edit_emp_mid; ?>">

                                    <span class="input-group-btn"></span>
                                    <input type="text" class="form-control" placeholder="Last name" name="last_name" size="30" value="<?php echo $edit_emp_last; ?>">         
                                </div>
                                <input type="text" class="form-control mt-2" placeholder="Company ID" name="com_id" size="30" value="<?php echo $edit_com_id; ?>">
                                <input type="text" class="form-control mt-2" placeholder="Date" name="atlog_date" size="30" value="<?php echo $edit_atlog_date; ?>"> 
                                <input type="text" class="form-control mt-2" placeholder="AM in" name="AM_in" size="30" value="<?php echo $edit_am_in; ?>"> 
                                <input type="text" class="form-control mt-2" placeholder="AM out" name="AM_out" size="30" value="<?php echo $edit_am_out; ?>"> 
                                <input type="text" class="form-control mt-2" placeholder="PM in" name="PM_in" size="30" value="<?php echo $edit_pm_in; ?>"> 
                                <input type="text" class="form-control mt-2" placeholder="PM out" name="PM_out" size="50" value="<?php echo $edit_pm_out; ?>">
                             
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