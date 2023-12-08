<?php  

include 'db_conn.php';

// delete admin
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = mysqli_query($conn, "DELETE FROM `admin_account` WHERE `admin_id` = '$id'");
    header("Location: index.php");
}


?>