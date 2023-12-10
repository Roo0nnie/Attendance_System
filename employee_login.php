<?php
session_start();
include 'db_conn.php';

    if(isset($_POST['com_id']) && isset($_POST['emp_name'])) {
        $com_id = $_POST['com_id'];
        $nameLast = preg_split('/\s+/', $_POST['emp_name'], 2);
        
        if (count($nameLast) == 2) {
            list($name, $last) = $nameLast;
            
            function validate($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
    
                return $data;
            }
            
            $first_name = validate($name);
            $last_name = validate($last);
            $com_id = validate($com_id);
            // Perform the desired sanitization operations on each value
            
            if(empty($com_id)) {
                $_SESSION['error_message'] = "Company is required";
                header("Location: employee_loginForm.php?error=username is required");
                exit();
            }
            
             else {
    
                $sql = "SELECT * FROM employee WHERE first_name = '$first_name' AND last_name = '$last_name' AND com_id = '$com_id'";
                $result = mysqli_query($conn, $sql);
    
                if(mysqli_num_rows($result) === 1) {
                    $row = mysqli_fetch_assoc($result);
                    if($row['first_name'] === $first_name && $row['last_name'] === $last_name && $row['com_id'] === $com_id) {
                        $_SESSION['first_name'] = $row['first_name'];
                        $_SESSION['last_name'] = $row['last_name'];
                        $_SESSION['com_id'] = $row['com_id'];
                        $_SESSION['emp_id'] = $row['emp_id'];
                        header("Location: index.php");
                        exit();
    
                    } else {
                        header("Location: employee_loginForm.php?error=Incorrect username or admin_pass");
                        exit();
                    }
                } else {
                    header("Location: employee_loginForm.php");
                    exit();
                }
            }
        } else {
            header("Location: employee_loginForm.php");
            exit();
        }
            } else {
                // Handle the case where the wrong number of values was provided
                header("Location: employee_loginForm.php");
            exit();
            }
?>