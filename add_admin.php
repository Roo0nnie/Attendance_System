<?php
include 'db_conn.php';

$admin_name = $_POST['admin_name'];
$admin_last = $_POST['admin_last'];
$admin_user = $_POST['admin_user'];
$admin_pass = $_POST['admin_pass'];
// echo $first_name, $last_name, $middle_name, $address, $email, $phone;

$sql = "INSERT INTO admin_account(admin_name, admin_last, admin_user, admin_pass) VALUES ('$admin_name', '$admin_last', '$admin_user','$admin_pass')";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php#admin");
    exit();
} else {
    echo "Could not insert record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>