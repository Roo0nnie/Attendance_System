<?php  

include 'db_conn.php';

// delete admin
if (isset($_GET['id'])) {
    $emp_id = $_GET['id'];
    $delete = mysqli_query($conn, "DELETE FROM `atlog` WHERE `emp_id` = '$emp_id'");
    header("Location: index.php");
}


?>