<?php
include 'db_conn.php';

if(isset($_POST['submit'])) {
    $com_id_check = $_POST['com_id'];
    $sql ="Select * from `employee` where com_id=$com_id_check";
    $result =mysqli_query($conn, $sql);
    if($result) {
        if(mysqli_num_rows($result) == 0) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $middle_name = $_POST['middle_name'];
            $com_id = $_POST['com_id'];
            $address = $_POST['address']; 
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            // echo $first_name, $last_name, $middle_name, $address, $email, $phone;
            
            $sql = "INSERT INTO employee(first_name, last_name, middle_name, com_id,address, email, phone) VALUES ('$first_name', '$last_name', '$middle_name','$com_id', '$address', '$email','$phone')";
            
            if (mysqli_query($conn, $sql)) {
                header("Location: index.php");
                exit();
            } else {
                echo "Could not insert record: " . mysqli_error($conn);
            }
            mysqli_close($conn);
        } else {
            header("Location: index.php");
                exit();
        }
        
    }
    
}
?>