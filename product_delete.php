<?php  

include 'db_conn.php';

// delete product
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = mysqli_query($conn, "DELETE FROM `product_details` WHERE `prod_id` = '$id'");
    header("Location: index.php");
}


?>