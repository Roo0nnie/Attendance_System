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

            <!-- ========================= Main ==================== -->
            <div class="main ">
                <div class="topbar">
                    <div class="toggle">
                        <ion-icon name="menu-outline" class="text-black"></ion-icon>
                    </div>
                    <div class="user">
                        <button class="btn-red mt-3"><a href="logout.php">Logout</a></button>
                    </div>
                </div>
                <!-- ======================= User account dashboard ================== -->
                <div class="cardBox">
                    <div class="card active">
                        <div>
                        <?php
                            $sql = "Select * from `user_account`";
                            
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
                                        <h2>User Account <span class="badge btn-red">
                                        <?php echo $id_loop; ?></span></h2>
                                    </div>
                                    <button class="btn-red" data-bs-toggle="modal" data-bs-target="#addUser">Add User</button>

                                    <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalAddAdmin" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content bg-yellow">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalAddAdmin">Add User</h1>
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
                                                            <form action="add_user.php" method="POST">
                                                                <label for="" class="form-label">Account Information</label>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-floating mt-4">
                                                                            <input type="text" class="form-control" id="floatingusername" name="user_name" placeholder="First name" autocomplete="off" required>
                                                                            <label for="floatinguserame">First name</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-floating mt-4">
                                                                            <input type="text" class="form-control" id="floatingadminlast" name="user_middle" placeholder="Middle name" autocomplete="off" required>
                                                                            <label for="floatingadminlast">Middle name</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-floating mt-4">
                                                                            <input type="text" class="form-control" id="floatingadminlast" name="admin_last" placeholder="Last name" autocomplete="off" required>
                                                                            <label for="floatingadminlast">Last name</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-floating mt-2">
                                                                            <input type="text" class="form-control" id="floatingadminuser" name="user_user" placeholder="Email" autocomplete="off" required>
                                                                            <label for="floatingadminuser">Username</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-floating mt-2">
                                                                        <input type="text" class="form-control" id="floatingadminpass" name="user_pass" placeholder="Password" autocomplete="off" required>
                                                                        <label for="floatingadminpass" class="px-4">Password</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-floating mt-2">
                                                                        <input type="text" class="form-control" id="floatingadminpass" name="user_address" placeholder="Address" autocomplete="off" required>
                                                                        <label for="floatingadminpass" class="px-4">Address</label>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-floating mt-2">
                                                                        <input type="text" class="form-control" id="floatingadminpass" name="user_mobile" placeholder="Mobile" autocomplete="off" required>
                                                                        <label for="floatingadminpass" class="px-4">Mobile</label>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn-yellow" data-bs-dismiss="modal">Cancel</button>
                                                                    <input class="btn-red" data-bs-dismiss="modal" type="submit" name="submit">
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

                                        <div class="sidebar_product">TOTAL USERS</div>
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
                            

                            <!-- ================ User dashboard list ================= -->
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
                                                    <table class="table table-hover table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <td style="width: 5%;">#</td>
                                                                <td style="width: 8.9%;">Name</td>
                                                                <td style="width: 8.9%;">Middle</td>
                                                                <td style="width: 8.9%;">Last</td>
                                                                <td style="width: 8.9%;">Username</td>
                                                                <td style="width: 8.9%;">Password</td>
                                                                <td style="width: 8.9%;">Address</td>
                                                                <td style="width: 8.9%;">Mobile</td>
                                                                <td style="width: 8.9%;">Action</td>
                                                            </tr>
                                                        </thead>

                                                        <tbody class="table-striped">
                                                                         <!-- PHP FUNCTION TO FETCH THE EMPLOYEE DATA IN THE DATABASE AND DISPLAY THE ADMIN LIST -->
                                                            <!-- Read from database of admin account -->
                                                            <?php

                                                            $sql = "Select * from `user_account`";

                                                            $result = mysqli_query($conn, $sql);
                                                            $id_loop = 0;
                                                            if ($result) {
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    $user_id = $row['user_id'];
                                                                    $user_name = $row['user_name'];
                                                                    $user_middle = $row['user_middle'];
                                                                    $user_last = $row['user_last'];
                                                                    $user_user = $row['user_user'];
                                                                    $user_pass = $row['user_pass'];
                                                                    $user_address = $row['user_address'];
                                                                    $user_mobile = $row['user_mobile']; 
                                                                    $id_loop += 1;
                                                                    echo '<tr class="tdata">
                                                                    <th scope="row" >' . $id_loop . '</th>
                                                                    <td class="text-start">' . $user_name . '</td>
                                                                    <td class="text-start">' . $user_middle . '</td>
                                                                    <td class="text-start">' . $user_last . '</td>
                                                                    <td>' . $user_user . '</td>
                                                                    <td>' . $user_pass . '</td>
                                                                    <td>' . $user_address . '</td>
                                                                    <td>' . $user_mobile . '</td>
                                                                    <td><button type="button" class="btn-yellow" data-bs-target="#exampleModalUserlist' . $row['user_id'] . '" data-bs-toggle="modal">
                                                                    Update</button><button type="button" class="btn-red px-1 delete_admin"><a href="user_delete.php?id=' . $user_id . '">Delete</a></button>
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

                    <div class="card">
                        <!-- ======================= Admin Account Dashboard ================== -->
                        <div>
                            <?php

                            $sql = "Select * from `admin_account`";

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
                                        <h2>Admin Account<span class="badge btn-red"><?php echo $id_loop; ?> </span></h2>
                                    </div>
                                    <button class="btn-red" data-bs-toggle="modal" data-bs-target="#addAdmin">Add Admin</button>

                                    <div class="modal fade" id="addAdmin" tabindex="-1" aria-labelledby="exampleModalAddAdmin" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog modal-dialog-centered">
                                            <div class="modal-content bg-yellow">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalAddAdmin">Add Admin</h1>
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
                                                            <form action="add_admin.php" method="POST">
                                                                <label for="" class="form-label">Account Information</label>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-floating mt-4">
                                                                            <input type="text" class="form-control" id="floatingadminname" name="admin_name" placeholder="Name" autocomplete="off" required>
                                                                            <label for="floatingadminame">First name</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="form-floating mt-4">
                                                                            <input type="text" class="form-control" id="floatingadminlast" name="admin_last" placeholder="Last" autocomplete="off" required>
                                                                            <label for="floatingadminlast">Last name</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="form-floating mt-2">
                                                                            <input type="text" class="form-control" id="floatingadminuser" name="admin_user" placeholder="Email" autocomplete="off" required>
                                                                            <label for="floatingadminuser">Username</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-floating mt-2">
                                                                        <input type="password" class="form-control" id="floatingadminpass" name="admin_pass" placeholder="Password" autocomplete="off" required>
                                                                        <label for="floatingadminpass" class="px-4">Password</label>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn-yellow" data-bs-dismiss="modal">Cancel</button>
                                                                    <input class="btn-red" data-bs-dismiss="modal" type="submit" name="submit">
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
                            <div class="cardProduct">
                                <div class="productBox">
                                    <div>
                                        <div class="sidebar_product">TOTAL USERS</div>
                                        <div>
                                            <div><span class="fs-5 px-2"><?php echo $id_loop; ?></span><span></span></div>
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

                            <!-- ================ Admin account list ================= -->
                            <div>


                                <nav class="nav"><!--nav start-->
                                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#Allorders">All orders</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#openOrders">Open</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#">Unfulfill</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#">Unpaid</a></li>
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
                                                    <table class="table table-hover">
                                                        <thead class="thead-dark">
                                                            <tr class="htitle">
                                                                <th style="width: 16.6%;">#</th>
                                                                <th style="width: 16.6%;">First Name</th>
                                                                <th style="width: 16.6%;">Last Name</th>
                                                                <th style="width: 16.6%;">Username</th>
                                                                <th style="width: 16.6%;">Password</th>
                                                                <th scope="col" style="width: 16.6%;">Operations</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- PHP FUNCTION TO FETCH THE EMPLOYEE DATA IN THE DATABASE AND DISPLAY THE ADMIN LIST -->
                                                            <!-- Read from database of admin account -->
                                                            <?php

                                                            $sql = "Select * from `admin_account`";

                                                            $result = mysqli_query($conn, $sql);
                                                            $id_loop = 0;
                                                            if ($result) {
                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    $admin_id = $row['admin_id'];
                                                                    $first_name = $row['admin_name'];
                                                                    $last_name = $row['admin_last'];
                                                                    $admin_user = $row['admin_user'];
                                                                    $admin_pass = $row['admin_pass'];
                                                                    $id_loop += 1;
                                                                    echo '<tr class="tdata">
                                                                    <th scope="row" >' . $id_loop . '</th>
                                                                    <td class="text-start">' . $first_name . '</td>
                                                                    <td class="text-start">' . $last_name . '</td>
                                                                    <td>' . $admin_user . '</td>
                                                                    <td>' . $admin_pass . '</td>
                                                                    <td><button type="button" class="btn-yellow" data-bs-target="#exampleModalAdminlist' . $row['admin_id'] . '" data-bs-toggle="modal">
                                                                    <ion-icon name="pencil-outline"></ion-icon>Update</button><button type="button" class="btn-red px-1 delete_admin"><a href="admin_delete.php?id=' . $admin_id . '">Delete</a></button>
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
                                <div id="openOrders" class="tab-pane fade">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ======================= Product Dashboard ================== -->
                    <div class="card">
                        <div>
                        <?php

                            $sql = "Select * from `product_details`";

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
                                        <h2>Product <span class="badge btn-red"><?php echo $id_loop; ?> </span></h2>
                                    </div>
                                    <button class="btn-red" data-bs-toggle="modal" data-bs-target="#addProduct">Add product</button>
                                </div>
                            </div>
                            <div>
                                <nav class="nav"><!--nav start-->
                                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#Allproducts">All products</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#archived">Archived</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#publish">Publish</a></li>
                                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#unpublish">Unpublish</a></li>
                                </nav><!--nav end-->
                                <div class="tab-content m-3"><!--tab content start-->
                                    <div id="Allproducts" class="tab-pane active">
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
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <td style="width: 5%;">#</td>
                                                                <td style="width: 17%;" class="text-start">Name</td>
                                                                <td style="width: 5%;">Stock</td>
                                                                <td style="width: 17%;">Size</td>
                                                                <td style="width: 5%;">Price</td>
                                                                <td style="width: 17%;">Description</td>
                                                                <td style="width: 17%;">Image</td>
                                                                <td style="width: 17%;" class="text-start">Action</td>
                                                            </tr>
                                                        </thead>
<!-- Read Product -->
                                                        <tbody class="table-striped">
                                                        <?php

                                                        $sql = "Select * from `product_details`";
                                                        
                                                        $result = mysqli_query($conn, $sql);
                                                        $id_loop = 0;
                                                        if ($result) {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                $prod_id = $row['prod_id'];
                                                                $prod_name = $row['prod_name'];
                                                                $prod_stock = $row['prod_stock'];
                                                                $prod_size = $row['prod_size'];
                                                                $prod_price = $row['prod_price'];
                                                                $prod_description = $row['prod_description'];
                                                                $prod_image = $row['prod_image'];
                                                                $id_loop += 1;
                                                                echo '<tr class="tdata">
                                                                <th scope="row" >' . $id_loop . '</th>
                                                                <td class="text-start">' . $prod_name . '</td>
                                                                <td class="text-start">' . $prod_stock . '</td>
                                                                <td class="text-start">' . $prod_price . '</td>
                                                                <td class="text-start">' . $prod_size . '</td>
                                                                <td>' . $prod_description . '</td>
                                                                <td>' . $prod_image . '</td>
                                                                <td><button type="button" class="btn-yellow" data-bs-target="#exampleModalProductlist' . $row['prod_id'] . '" data-bs-toggle="modal">
                                                                Update</button><button type="button" class="btn-red px-1 delete_admin"><a href="product_delete.php?id=' . $prod_id . '">Delete</a></button>
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
                                <div id="archived" class="tab-pane fade">
                                </div>
                                <div id="publish" class="tab-pane fade">
                                </div>
                                <div id="unpublish" class="tab-pane fade">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ======================= Order Dashboard  ================== -->
                    <div class="card">
                        <div>
                            <h2>Orders <span class="badge btn-red">0</span></h2>
                            <div class="d-flex align-self-center">
                                <div><ion-icon name="download-outline"></ion-icon> Export</div>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        More option
                                    </button>
                                    <ul class="dropdown-menu bg-yellow">
                                        <li><a class="dropdown-item" href="#">New orders</a></li>
                                        <li><a class="dropdown-item" href="#">New orders</a></li>
                                        <li><a class="dropdown-item" href="#">New orders</a></li>
                                    </ul>
                                </div>
                            </div>

                            <nav class="nav"><!--nav start-->
                                <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#Allorders">All orders</a></li>
                                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#openOrders">Open</a></li>
                                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#">Unfulfill</a></li>
                                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#">Unpaid</a></li>
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
                                                    <input type="text" class="form-control" placeholder="search Admin">
                                                    <span class="input-group-btn"></span>
                                                    <button class="btn-red" type="button">Search</button>
                                                </div>
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <td style="width: 10%;">Order ID</td>
                                                            <td style="width: 25%;">Date</td>
                                                            <td style="width: 20%;">Admin</td>
                                                            <td style="width: 10%;">Payment Status</td>
                                                            <td style="width: 15%;">Transaction method</td>
                                                            <td style="width: 10%;">Payment methods</td>
                                                            <td style="width: 10%;">Action</td>
                                                        </tr>
                                                    </thead>

                                                    <tbody class="table-striped">
                                                        <tr>
                                                            <td>#68681</td>
                                                            <td>Aug 16, 2020, 1:55 (ET)</td>
                                                            <td>Williams Tonston</td>
                                                            <td><span class="badge text-bg-success">Paid</span></td>
                                                            <td><span class="badge text-bg-success">Delivery</span></td>
                                                            <td>E-pay</td>
                                                            <td><button class="btn-yellow" data-bs-toggle="modal" data-bs-target="#exampleModalAdminorder">View</button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                            <div id="openOrders" class="tab-pane fade">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>


        <!-- Modal Product Add Product -->
        <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalAddProduct" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content bg-yellow">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalAddProduct">Add product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="row">
                        <form action="add_product.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-floating mt-4">
                                <input type="text" class="form-control" id="floatingName" placeholder="Product" name="prod_name">
                                <label for="floatingName" class="px-4">Product</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mt-2">
                                    <input type="text" class="form-control" id="floatingAvail" placeholder="Stock" name="prod_stock">
                                    <label for="floatingAvail">Stock</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mt-2">
                                    <input type="text" class="form-control" id="floatingPrice" placeholder="Price" name="prod_price">
                                    <label for="floatingPrice">Price</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="form-floating mt-2">
                                <input type="text" class="form-control" id="floatingAvail" placeholder="Size" name="prod_size">
                                <label for="floatingAvail" class="px-4">Size</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label class="form-label">Description (Optional)</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Description" id="floatingTextarea" name="prod_description"></textarea>
                                <label for="floatingTextarea" class="px-4">Description</label>
                            </div>
                        </div>
                        <div class="row">
                            <label class="form-label mt-2">Media</label>
                            <div class="mb-3">
                                <input class="form-control" type="file" name="prod_image" value="">
                         
                                
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-yellow" data-bs-dismiss="modal">Cancel</button>
                        <input class="btn-red" data-bs-dismiss="modal" type="submit" name="submit">        
                    </div>
                        </form>
                    </div>
                        
                </div>
            </div>
        </div>

        <!-- Modal Add Admin -->

        <div class="modal fade" id="addAdmin" tabindex="-1" aria-labelledby="exampleModalAddAdmin" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content bg-yellow">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalAddAdmin">Add Admin</h1>
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
                                <div class="col">
                                    <label for="" class="form-label">Account Information</label>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mt-4">
                                                <input type="text" class="form-control" id="floatingName" placeholder="Name">
                                                <label for="floatingName">Name</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mt-4">
                                                <input type="text" class="form-control" id="floatingLast" placeholder="Last">
                                                <label for="floatingLast">Last</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mt-2">
                                                <input type="email" class="form-control" id="floatingEmail" placeholder="Email">
                                                <label for="floatingEmail">Email</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-floating mt-2">
                                            <input type="text" class="form-control" id="floatingPhone" placeholder="Phone">
                                            <label for="floatingPhone" class="px-4">Phone</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">Shipping Address</label>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mt-4">
                                                <input type="text" class="form-control" id="floatingLocation" placeholder="Location">
                                                <label for="floatingLocation">Location</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mt-2">
                                                <input type="text" class="form-control" id="floatingCode" placeholder="Zip Cod">
                                                <label for="floatingCode">Zip Code</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mt-2">
                                                <input type="text" class="form-control" id="floatingAddress1" placeholder="Address Line 1">
                                                <label for="floatingAddress1">Address Line 1</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating mt-2">
                                                <input type="text" class="form-control" id="floatingAddress2" placeholder="Address Line 2">
                                                <label for="floatingAddress2">Address Line 2</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">Shipping Address</label>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mt-4">
                                                <input type="text" class="form-control" id="floatingUser" placeholder="Username">
                                                <label for="floatingUser">Username</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mt-2">
                                                <input type="password" class="form-control" id="floatingPass1" placeholder="Password">
                                                <label for="floatingPass1">Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating mt-2">
                                                <input type="password" class="form-control" id="floatingPass" placeholder="Confirm Password">
                                                <label for="floatingPass">Confirm Password</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-yellow" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn-red" data-bs-dismiss="modal">Add</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal delete Order -->
        <div class="modal fade" id="exampleModaldelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-yellow">
                    <div class="modal-body">
                        <div class="d-flex align-items-center flex-column">
                            <div>
                                <ion-icon name="close-circle-outline" class="check-red"></ion-icon>
                            </div>
                            <h1 class="modal-title fs-5">Delete product</h1>
                            <div class="sidebar_detail">are you sure you want to delete this product?</div>
                            <div class="d-flex mt-2">
                                <button type="button" class="btn-yellow mx-2" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn-red mx-2" data-bs-dismiss="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


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

        <!-- update admin account -->
        <?php

        $sql = "Select * from `user_account`";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                <div class="modal fade" id="exampleModalUserlist' . $row["user_id"] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                        <div class="modal-content bg-yellow">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">User Details</h1>
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
                                                        <div class="row"><div><label for="" class="form-label mt-3">Username</label></div></div>
                                                        <div class="row"><div><label for="" class="form-label mt-3">Password</label></div></div>
                                                        <div class="row"><div><label for="" class="form-label mt-3">Address</label></div></div>
                                                        <div class="row"><div><label for="" class="form-label mt-3">Mobile</label></div></div>
                                                        </div>
                                                        <div class="col-9">  
                                                        <form method="GET">
                                                            <div class="input-group">
                                                                <input type="hidden" name="user_id" value="' . $row["user_id"] . '">
                                                                <input type="text" class="form-control" placeholder="First name" name="user_name" value="' . $row["user_name"] . '">
                                                                <span class="input-group-btn"></span>
                                                                <input type="text" class="form-control" placeholder="Last name" name="user_middle" value="' . $row["user_middle"] . '">
                                                                <input type="text" class="form-control" placeholder="Last name" name="user_last" value="' . $row["user_last"] . '">         
                                                            </div>
                                                            <input type="text" class="form-control mt-2" placeholder="Username" name="user_user" value="' . $row["user_user"] . '">  
                                                            <input type="text" class="form-control mt-2" placeholder="Password" name="user_pass" value="' . $row["user_pass"] . '">
                                                            <input type="text" class="form-control mt-2" placeholder="Username" name="user_address" value="' . $row["user_address"] . '">  
                                                            <input type="text" class="form-control mt-2" placeholder="Password" name="user_mobile" value="' . $row["user_mobile"] . '">
                                                            
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
                            <button type="submit" class="btn-red" data-bs-dismiss="modal" name="submit" ><a href="user_update.php?id=' . $row["user_id"] . '">Edit</a></button>
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


        <!-- update admin account -->
        <?php

        $sql = "Select * from `admin_account`";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                <div class="modal fade" id="exampleModalAdminlist' . $row["admin_id"] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                        <div class="modal-content bg-yellow">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Admin Details</h1>
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
                                                        <div class="row"><div><label for="" class="form-label mt-3">Username</label></div></div>
                                                        <div class="row"><div><label for="" class="form-label mt-3">Password</label></div></div>
                                                        </div>
                                                        <div class="col-9">  
                                                        <form method="GET">
                                                            <div class="input-group">
                                                                <input type="hidden" name="admin_id" value="' . $row["admin_id"] . '">
                                                                <input type="text" class="form-control" placeholder="First name" name="admin_name" value="' . $row["admin_name"] . '">
                                                                <span class="input-group-btn"></span>
                                                                <input type="text" class="form-control" placeholder="Last name" name="admin_last" value="' . $row["admin_last"] . '">         
                                                            </div>
                                                            <input type="text" class="form-control mt-2" placeholder="Username" name="admin_user" value="' . $row["admin_user"] . '">  
                                                            <input type="text" class="form-control mt-2" placeholder="Password" name="admin_pass" value="' . $row["admin_pass"] . '">
                                                            
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
                            <button type="submit" class="btn-red" data-bs-dismiss="modal" name="submit" ><a href="admin_update.php?id=' . $row["admin_id"] . '">Edit</a></button>
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
        
        
    <!-- update product  -->
                <?php

$sql = "Select * from `product_details`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
        <div class="modal fade" id="exampleModalProductlist' . $row["prod_id"] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                <div class="modal-content bg-yellow">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">User Details</h1>
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
                                                <div class="row"><div><label for="" class="form-label mt-2">Product</label></div></div>
                                                <div class="row"><div><label for="" class="form-label mt-3">Stock</label></div></div>
                                                <div class="row"><div><label for="" class="form-label mt-3">Price</label></div></div>
                                                <div class="row"><div><label for="" class="form-label mt-3">Size</label></div></div>
                                                <div class="row"><div><label for="" class="form-label mt-3">Description</label></div></div>
                                                </div>
                                                <div class="col-9">  
                                                <form method="GET">
                                                <input type="text" class="form-control mt-2" placeholder="Product" name="prod_name" value="' . $row["prod_name"] . '">  
                                                <input type="text" class="form-control mt-2" placeholder="Stock" name="prod_stock" value="' . $row["prod_stock"] . '">  
                                                <input type="text" class="form-control mt-2" placeholder="Size" name="prod_size" value="' . $row["prod_size"] . '">  
                                                <input type="text" class="form-control mt-2" placeholder="Price" name="prod_price" value="' . $row["prod_price"] . '">    
                                                <div class="form-floating">
                                                  <textarea class="form-control mt-2" placeholder="Leave a comment here" id="floatingTextarea" name="prod_description">' . $row["prod_description"] . '</textarea>
                                                  <label for="floatingTextarea">Comments</label>
                                                </div>  
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
                    <button type="submit" class="btn-red" data-bs-dismiss="modal" name="submit" ><a href="product_update.php?id='. $row["prod_id"] .'">Edit</a></button>
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

        <!-- Rider Search -->
        <div class="modal fade" id="exampleModalRider" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content bg-yellow ">
                    <div class="modal-header">
                        <ion-icon name="chevron-back-outline" class="px-3 cursorpointer" data-bs-target="#exampleModalAdminorder" data-bs-toggle="modal"></ion-icon>
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Search for rider</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="row">
                                <div class="addNote bg-yellow-container mt-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="search available riders">
                                        <span class="input-group-btn"></span>
                                        <button class="btn-red" type="button">Search</button>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2 mt-3">
                                        <div class="sidebar_product">Name</div>
                                        <div class="sidebar_product">Status</div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="delete d-flex">
                                            <div class="sidebar_detail" style="margin-left: 5px;">Ronnie Estillero</div>
                                        </div>
                                        <div class="sidebar_detail"></div>
                                        <div class="sidebar_product badge bg-success">Available</div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <div class="delete d-flex">
                                            <div class="sidebar_detail" style="margin-left: 5px;">Zoren Madridano</div>
                                        </div>
                                        <div class="sidebar_product badge bg-danger">Not available</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-red" data-bs-target="#exampleModalSuccess" data-bs-toggle="modal">Done</button>
                        </div>
                    </div>
                </div>
            </div>




            <!-- =========== Scripts =========  -->
            <script src="assets/js/main.js"></script>
            <script src="/assets/js/bootstrap.bundle.min.js"></script>

            <!-- ====== ionicons ======= -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    </body>

    </html>

<?php
} else {
    header("Location: loginForm.php");
    exit();
}


?>