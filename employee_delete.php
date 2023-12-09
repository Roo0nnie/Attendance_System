<?php  

include 'db_conn.php';

// delete admin
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = mysqli_query($conn, "DELETE FROM `employee` WHERE `emp_id` = '$id'");
    header("Location: index.php");
}


?>