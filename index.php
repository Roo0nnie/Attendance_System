<?php
include 'db_conn.php';
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_name'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <script src="./js/bootstrap.bundle.min.js"></script>
        <script defer src="./js/index.js"></script>
        <!-- <link rel="stylesheet" href="./css/index.css"> -->
        <link rel="stylesheet" href="./css/index.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

        <!-- Icons -->
        <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <title>Final Project</title>
    </head>

    <body>
        <!-- </li>
        <p>Welcome, <?php $_SESSION['admin_name']; ?>!</p> -->
        <!-- =============== Navigation ================ -->
        <div class="container-wrapper">
            <div class="navigation bg-yellow">
                <ul>
                    <li>
                        <a href="#">
                            <span class="icon">
                            </span>
                            <div class="imglogo">
                                <img src="./assets/img/LogoCloseUp.png" alt="">
                            </div>
                            <span class="title"></span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <span class="icon">
                                <ion-icon name="home-outline"></ion-icon>
                            </span>
                            <span class="title">Employee Maintenance</span>
                        </a>
                    </li>
                    <li>
                        <a href="#admin">
                            <span class="icon">
                                <ion-icon name="people-outline"></ion-icon>
                            </span>
                            <span class="title">Login Reports</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <span class="icon">
                                <ion-icon name="archive-outline"></ion-icon>
                            </span>
                            <span class="title">Daily Reports</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <span class="icon">
                                <ion-icon name="storefront-outline"></ion-icon>
                            </span>
                            <span class="title">Monthly Reports</span>
                        </a>
                    </li>
                    
                </ul>
                
            </div>
            <div>
                </div>
            
           

            <!-- ========================= Main ==================== -->
            <div class="main ">
                <div class="topbar">
                    <div class="toggle">
                        <ion-icon name="menu-outline" class="text-black"></ion-icon>
                    </div>
                    <div class="employee">
                        <button class="btn-red mt-3"><a href="employee_loginForm.php"><ion-icon name="ellipsis-vertical-outline"></ion-icon</a></button>
                        <button class="btn-red mt-3"><a href="logout.php"><ion-icon name="power-outline"></ion-icon></a></button>

                    </div>
                </div>
                <!-- ======================= Employee Dashboard ================== -->
                <div class="cardBox">
                    <div class="card active">
                        <div>
                            <?php
                            $sql = "Select * from `employee`";

                            $result = mysqli_query($conn, $sql);
                            $id_loop = 0;
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id_loop += 1;
                            ?>
                            <?php
                                }
                            }
                            ?>
                            <div class="row">
                                <div class="col d-flex justify-content-between">
                                    <div class="cardName">
                                        <h2>Employee<span class="badge btn-red">
                                                <?php echo $id_loop; ?></span></h2>
                                    </div>
                                    <button class="btn-red" data-bs-toggle="modal" data-bs-target="#addemployee">Add employee</button>

                                    <div class="modal fade" id="addemployee" tabindex="-1" aria-labelledby="exampleModalAddAdmin" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content bg-yellow">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalAddAdmin">Add employee</h1>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div></div>
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <form action="add_employee.php" method="POST">
                                                                <label for="" class="form-label">Employee Information</label>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-floating mt-4">
                                                                            <input type="text" class="form-control" id="floatingemployeename" name="first_name" placeholder="First name" autocomplete="off" required>
                                                                            <label for="floatingemployeename">First name</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-floating mt-4">
                                                                            <input type="text" class="form-control" id="floatingemployeemiddle" name="middle_name" placeholder="Middle name" autocomplete="off" required>
                                                                            <label for="floatingemployeemiddle" class="px-4">Middle name</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-floating mt-4">
                                                                            <input type="text" class="form-control" id="floatingemployeelast" name="last_name" placeholder="Last name" autocomplete="off" required>
                                                                            <label for="floatingemployeelast">Last name</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-floating mt-2">
                                                                        <input type="text" class="form-control" id="floatingemployeepass" name="com_id" placeholder="Company ID" autocomplete="off" required>
                                                                        <label for="floatingemployeeaddress" class="px-4">Company ID</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-floating mt-2">
                                                                        <input type="text" class="form-control" id="floatingemployeepass" name="address" placeholder="Address" autocomplete="off" required>
                                                                        <label for="floatingemployeeaddress" class="px-4">Address</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-floating mt-2">
                                                                        <input type="email" class="form-control" id="floatingemployeeemail" name="email" placeholder="Email" autocomplete="off" required>
                                                                        <label for="floatingemployeeemail" class="px-4">Email</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-floating mt-2">
                                                                        <input type="text" class="form-control" id="floatingadminpass" name="phone" placeholder="Phone" autocomplete="off" required>
                                                                        <label for="floatingadminpass" class="px-4">Mobile</label>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn-yellow" data-bs-dismiss="modal">Cancel</button>
                                                                    <input class="btn-red" data-bs-dismiss="modal" type="submit" name="submit" value="Add">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="cardProduct">
                                    <div class="productBox">
                                        <div>

                                            <div class="sidebar_product">TOTAL employeeS</div>
                                            <div>
                                                <div><span class="fs-5 px-2"> <?php echo $id_loop; ?></span><span></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="productBox">
                                        <div>
                                            <div class="sidebar_product">ACTIVE MEMBERS</div>
                                            <div>
                                                <div><span class="fs-5 px-2">0</span><span></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="productBox">
                                        <div>
                                            <div class="sidebar_product">NEW RETURNING</div>
                                            <div>
                                                <div><span class="fs-5 px-2">0%</span><span></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="productBox">
                                        <div>
                                            <div class="sidebar_product">ACTIVE MEMBERS</div>
                                            <div>
                                                <div><span class="fs-5 px-2">0</span><span></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- ================ Employee dashboard list ================= -->
                            <div>
                                <nav class="nav"><!--nav start-->
                                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#Allorders">All</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#openOrders">Sales</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#">Accounts</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#">Reviews</a></li>
                                </nav><!--nav end-->
                                <div class="tab-content m-3"><!--tab content start-->
                                    <div id="Allorders" class="tab-pane active">
                                        <div class="details">
                                            <div class="recentOrders">
                                                <div class="cardHeader">

                                                    <a href="#" class="btn-red">View All</a>
                                                </div>
                                                <div class="table-responsive bg-yellow-container mt-2">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="search name..">
                                                        <span class="input-group-btn"></span>
                                                        <button class="btn-red" type="button">Search</button>
                                                    </div>
                                                    <table class="table table-hover table-responsive table-striped">
                                                        <thead>
                                                            <tr>
                                                                <td scope="col">#</td>
                                                                <td scope="col"class="text-start">Name</td>
                                                                <td scope="col">Company ID</td>
                                                                <td scope="col">Address</td>
                                                                <td scope="col">Email</td>
                                                                <td scope="col">Phone</td>
                                                                <td scope="col">Action</td>
                                                            </tr>
                                                        </thead>

                                                        <tbody class="table-striped">
                                                            <!-- PHP FUNCTION TO FETCH THE EMPLOYEE DATA IN THE DATABASE AND DISPLAY THE ADMIN LIST -->
                                                            <!-- Read from database of admin account -->
                                                            <?php

                                                            $sql = "Select * from `employee`";

                                                            $result = mysqli_query($conn, $sql);
                                                            $id_loop = 0;
                                                            if ($result) {
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    $employee_id = $row['emp_id'];
                                                                    $employee_name = $row['first_name'];
                                                                    $employee_middle = $row['middle_name'];
                                                                    $employee_com_id = $row['com_id'];
                                                                    $employee_last = $row['last_name'];
                                                                    $employee_address = $row['address'];
                                                                    $employee_email = $row['email'];
                                                                    $employee_mobile = $row['phone'];
                                                                    $id_loop += 1;
                                                                    echo '<tr class="tdata">
                                                                        <th scope="row" >' . $id_loop . '</th>
                                                                        <td class="text-start">' . $employee_name . ' ' . $employee_middle . ' ' . $employee_last . '</td>
                                                                        <td>' . $employee_com_id . '</td>
                                                                        <td>' . $employee_address . '</td>
                                                                        <td>' . $employee_email . '</td>
                                                                        <td>' . $employee_mobile . '</td>
                                                                        <td><button type="button" class="btn-yellow" data-bs-target="#exampleModalemployeelist' . $row['emp_id'] . '" data-bs-toggle="modal">
                                                                        Update</button><button type="button" class="btn-red px-1 delete_admin"><a href="employee_delete.php?id=' . $employee_id . '">Delete</a></button>
                                                                        </td>
                                                                        <td>
                                                                        </tr>';
                                                            ?>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!-- ======================= Login Reports Dashboard ================== -->
                    <div class="card">Login Reports
                    
                    <div>
                    <div class="table-responsive bg-yellow-container mt-2">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="search name..">
                                <span class="input-group-btn"></span>
                                <button class="btn-red" type="button">Search</button>
                            </div>
                            <table class="table table-hover table-responsive table-striped">
                                <thead>
                                    <tr>
                                        <td scope="col">#</td>
                                        <td scope="col" class="text-start">Employee</td>
                                        <td scope="col" class="text-start">Company ID</td>
                                        <td scope="col">Date</td>
                                        <td scope="col">AM in</td>
                                        <td scope="col">AM out</td>
                                        <td scope="col">PM in</td>
                                        <td scope="col">PM out</td>                                        
                                        <td scope="col">Action</td>
                                    </tr>
                                </thead>

                                <tbody class="table-striped">
                                    <!-- PHP FUNCTION TO FETCH THE EMPLOYEE DATA IN THE DATABASE AND DISPLAY THE ADMIN LIST -->
                                    <!-- Read from database of admin account -->
                                    <?php
                        $sql_employee = "SELECT * FROM `employee`";
                        $result_employee = mysqli_query($conn, $sql_employee);
                        
                        if ($result_employee) {
                            while ($row_employee = mysqli_fetch_assoc($result_employee)) {
                                $emp_id = $row_employee['emp_id'];
                                $sql_atlog = "SELECT * FROM atlog WHERE emp_id = '$emp_id'";
                                $result_atlog = mysqli_query($conn, $sql_atlog);
                                $id_loop = 0;
                                $emp_first = $row_employee['first_name'];
                                $emp_last = $row_employee['last_name'];
                                $com_id = $row_employee['com_id'];
                        
                                if ($result_atlog) {
                                    
                                    while ($row_atlog = mysqli_fetch_assoc($result_atlog)) {
                                        $atlog_id = $row_atlog['atlog_id'];
                                        $atlog_date = $row_atlog['atlog_date'];
                                        $am_in = $row_atlog['am_in'];
                                        $am_out = $row_atlog['am_out'];
                                        $pm_in = $row_atlog['pm_in'];
                                        $pm_out = $row_atlog['pm_out'];
                                       
                                        
                                        echo '<tr class="tdata">
                                            <th scope="row">' . $id_loop . '</th>
                                            <td class="text-start">' . $emp_first . ' '. $emp_last . '</td>
                                            <td class="text-start">' . $com_id . '</td>
                                            <td class="text-start">' . $atlog_date . '</td>
                                            <td> '.$am_in.' </td>
                                            <td> '.$am_out.' </td>
                                            <td> '.$pm_in.' </td>
                                            <td> '.$pm_out.' </td>
                                            <td>
                                                <button type="button" class="btn-yellow" data-bs-target="#exampleModalReports' . $row_atlog['emp_id'] . '" data-bs-toggle="modal">Update</button>
                                                <button type="button" class="btn-red px-1 delete_admin">
                                                    <a href="employee_delete.php?id=' . $atlog_id . '">Delete</a>
                                                </button>
                                            </td>
                                        </tr>';
                                    }
                                }
                            }
                        }         
                                    ?>
                                    <?php
                                        
                                    
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
 
                    </div>
                    
                    
                    
                    
<!-- ======================= Daily Reports Dashboard ================== -->
                    <div class="card">Daily Reports
                    <div>
                    <?php
                        $sql_employee = "SELECT * FROM `employee`";
                        $result_employee = mysqli_query($conn, $sql_employee);
                        
                        if ($result_employee) {
                            while ($row_employee = mysqli_fetch_assoc($result_employee)) {
                                $emp_id = $row_employee['emp_id'];
                                $sql_atlog = "SELECT * FROM atlog WHERE emp_id = '$emp_id'";
                                $result_atlog = mysqli_query($conn, $sql_atlog);
                        
                                $emp_first = $row_employee['first_name'];
                                $emp_last = $row_employee['last_name'];
                                $com_id = $row_employee['com_id'];
                        
                                // Check if there are any entries in atlog for this employee
                                if ($result_atlog && mysqli_num_rows($result_atlog) > 0) {
                                    echo '
                                    <div class="bg-yellow-container mt-3">
                                        <div class="text-center">Date: ' . $atlog_date .'</div>
                                        
                                        <div class="bg-yellow-container mt-3">
                                            <table class="table table-striped table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">AM in</th>
                                                        <th scope="col">AM out</th>
                                                        <th scope="col">PM in</th>
                                                        <th scope="col">PM out</th>
                                                    </tr>
                                                </thead>
                                                <tbody>';
                        
                                    while ($row_atlog = mysqli_fetch_assoc($result_atlog)) {
                                        $am_in = $row_atlog['am_in'];
                                        $am_out = $row_atlog['am_out'];
                                        $pm_in = $row_atlog['pm_in'];
                                        $pm_out = $row_atlog['pm_out'];
                        
                                        echo '<tr>
                                                <td>' . $emp_first . ' '.$emp_last.'</td>
                                                <td>' . $am_in . '</td>
                                                <td>' . $am_out . '</td>
                                                <td>' . $pm_in . '</td>
                                                <td>' . $pm_out . '</td>
                                              </tr>';
                                    }
                        
                                    echo '      </tbody>
                                            </table>
                                        </div>
                                    </div>';
                                }
                            }
                        }
                        
                    
                    ?>
                        
                    </div>
                    
                    
                    </div>
<!-- ======================= Monthly Reports Dashboard ================== -->
                    <div class="card">Monthly Reports</div>
                </div>
            </div>

        </div>


        <!-- =============== Modal Popup ================ -->
        <!-- update employee account -->
        <?php

        $sql = "Select * from `employee`";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                <div class="modal fade" id="exampleModalemployeelist' . $row["emp_id"] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                        <div class="modal-content bg-yellow">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Employee Details</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div>
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
                                                        <form method="GET">
                                                            <div class="input-group">
                                                                <input type="hidden" name="emp_id" value="' . $row["emp_id"] . '">
                                                                <input type="text" class="form-control" placeholder="First name" name="first_name" value="' . $row["first_name"] . '">
                                                                <span class="input-group-btn"></span>
                                                                <input type="text" class="form-control" placeholder="Middle name" name="middle_name" value="' . $row["middle_name"] . '">
                                                                <input type="text" class="form-control" placeholder="Last name" name="last_name" value="' . $row["last_name"] . '">         
                                                            </div>
                                                            <input type="text" class="form-control mt-2" placeholder="ID" name="com_id" value="' . $row["com_id"] . '">
                                                            <input type="text" class="form-control mt-2" placeholder="Address" name="address" value="' . $row["address"] . '">
                                                            <input type="text" class="form-control mt-2" placeholder="Email" name="email" value="' . $row["email"] . '">  
                                                            <input type="text" class="form-control mt-2" placeholder="Phone" name="phone" value="' . $row["phone"] . '">
                                                            
                                                        </form>       
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-yellow" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn-red" data-bs-dismiss="modal" name="submit" ><a href="employee_update.php?id=' . $row["emp_id"] . '">Edit</a></button>
                        </div>
                        </div>
                    </div>
                </div>'
        ?>

        <?php  }
        } else {
            echo "0 results";
        }
        ?>

        <!-- =============== Modal Popup ================ -->
        <!-- update Record account -->
        <?php
                        $sql_employee = "SELECT * FROM `employee`";
                        $result_employee = mysqli_query($conn, $sql_employee);
                        
                        if ($result_employee) {
                            while ($row_employee = mysqli_fetch_assoc($result_employee)) {
                                $emp_id = $row_employee['emp_id'];
                                $sql_atlog = "SELECT * FROM atlog WHERE emp_id = '$emp_id'";
                                $result_atlog = mysqli_query($conn, $sql_atlog);
                                $id_loop = 0;
                                $emp_first = $row_employee['first_name'];
                                $emp_mid = $row_employee['middle_name'];
                                $emp_last = $row_employee['last_name'];
                                $com_id = $row_employee['com_id'];
                        
                                if ($result_atlog) {
                                    
                                    while ($row_atlog = mysqli_fetch_assoc($result_atlog)) {
                                        $atlog_id = $row_atlog['atlog_id'];
                                        $atlog_date = $row_atlog['atlog_date'];
                                        $am_in = $row_atlog['am_in'];
                                        $am_out = $row_atlog['am_out'];
                                        $pm_in = $row_atlog['pm_in'];
                                        $pm_out = $row_atlog['pm_out'];
                                       
                                        echo '
                                    <div class="modal fade" id="exampleModalReports' . $row_atlog['emp_id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                            <div class="modal-content bg-yellow">
                                                    <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Employee Details</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div>
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
                                                                            <form method="GET">
                                                                                <div class="input-group">
                                                                                    <input type="hidden" name="emp_id" value="' . $row_atlog['emp_id'] . '">
                                                                                    <input type="text" class="form-control" placeholder="First name" name="first_name" value="' . $emp_first. '">
                                                                                    <span class="input-group-btn"></span>
                                                                                    <input type="text" class="form-control" placeholder="Middle name" name="middle_name" value="' . $emp_mid . '">
                                                                                    <input type="text" class="form-control" placeholder="Last name" name="last_name" value="'.$emp_last.'">         
                                                                                </div>
                                                                                <input type="text" class="form-control mt-2" placeholder="Company ID" name="com_id" value="'.$com_id.'">
                                                                                <input type="date" class="form-control mt-2" placeholder="Date" name="atlog_date" value="' . $row_atlog['atlog_date'] . '">
                                                                                <input type="text" class="form-control mt-2" placeholder="AM in" name="AM_in" value="' . $row_atlog['am_in'] . '">
                                                                                <input type="text" class="form-control mt-2" placeholder="AM out" name="AM_out" value="' . $row_atlog['am_out'] . '">
                                                                                <input type="text" class="form-control mt-2" placeholder="PM in" name="PM_in" value="' . $row_atlog['pm_in'] . '">  
                                                                                <input type="text" class="form-control mt-2" placeholder="PM out" name="PM_out" value="' . $row_atlog['pm_out'] . '">
                                                                                
                                                                            </form>       
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn-yellow" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn-red" data-bs-dismiss="modal" name="submit" ><a href="atlog_update.php?id=' . $row_atlog['emp_id'] .  '">Edit</a></button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>';
                                    }
                                }
                            }
                        }         
                                    ?>
                                    <?php
                                        
                                    
                                    ?>
        
        
        



        <!-- Modal Success Order -->
        <div class="modal fade" id="exampleModalSuccess" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-yellow">
                    <div class="modal-body">
                        <div class="d-flex align-items-center flex-column">

                            <div>
                                <ion-icon name="checkmark-circle-outline" class="check"></ion-icon>
                            </div>
                            <h1 class="modal-title fs-5">Done!</h1>
                            <div class="sidebar_detail">Transaction is completed</div>
                            <button type="button" class="btn-red" data-bs-dismiss="modal">Ok</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    </html>

<?php
} else {
    header("Location: loginForm.php");
    exit();
}
?>