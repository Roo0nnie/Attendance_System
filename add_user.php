<?php
include 'db_conn.php';

$user_name = $_POST['user_name'];
$user_middle = $_POST['user_middle'];
$user_last = $_POST['user_last'];
$user_user = $_POST['user_user'];
$user_pass = $_POST['user_pass'];
$user_address = $_POST['user_address'];
$user_mobile = $_POST['user_mobile'];
// echo $first_name, $last_name, $middle_name, $address, $email, $phone;

$sql = "INSERT INTO user_account(user_name, user_middle, user_last, user_user, user_pass, user_address, user_mobile) VALUES ('$user_name', '$user_middle', '$user_last', '$user_user','$user_pass', '$user_address','$user_mobile')";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
    exit();
} else {
    echo "Could not insert record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>