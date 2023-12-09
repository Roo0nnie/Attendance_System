<?php

$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "attendance_system";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if(!$conn) {
    echo "Connetion failed!";
}
?>