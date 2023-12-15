<?php 
session_start();
include 'db_conn.php';
date_default_timezone_set('Asia/Manila');

if(isset($_POST['submit'])) {
    $attendance = $_POST['submit'];
    if(empty($_POST['com_id']) && !empty($_POST['emp_name'])) {
        header("Location: employee_loginForm.php?error=Company ID is required");
        exit();
    } elseif (empty($_POST['emp_name'])&& !empty($_POST['com_id'])) {
        header("Location: employee_loginForm.php?error=Name is required");
        exit();
    } elseif (empty($_POST['com_id']) && empty($_POST['emp_name'])) {
        header("Location: employee_loginForm.php?error=Company ID and Name is required");
        exit();
    } else {
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
                
                    $sql = "SELECT * FROM employee WHERE first_name = '$first_name' AND last_name = '$last_name' AND com_id = '$com_id'";
                    $result = mysqli_query($conn, $sql);
        
                    if(mysqli_num_rows($result) === 1) {
                        $row = mysqli_fetch_assoc($result);
                        if($row['first_name'] === $first_name && $row['last_name'] === $last_name && $row['com_id'] === $com_id) {
                            if($attendance == 1) {
                                // if($row['am_in'] == '') {
                                    $emp_id = $row['emp_id'];
                                    $am_in_date = date('Y-m-d'); // Corrected date format
                                    $am_in = date('H:i:s');   
                                    $sql = "INSERT INTO atlog(emp_id, atlog_date, am_in) VALUES ('$emp_id', '$am_in_date', '$am_in')";
                                    if (mysqli_query($conn, $sql)) {
                                        $currentTime = date('H:i:s');
                                        header("Location: employee_loginForm.php?error=Time in this morning: $currentTime");
                                exit();
                                    } else {
                                        echo "Could not insert record: " . mysqli_error($conn);
                                    }
                                    mysqli_close($conn);
                                // } else {
                                //     header("Location: employee_loginForm.php?error=You already Attendace.");
                                //     exit();
                                // }
                                echo '<script>alert("'. $attendance.'")</script>';
                                $currentTime = date('H:i:s'); 
                                header("Location: employee_loginForm.php?error=Time in this morning: $currentTime");
                                exit();
                            } elseif($attendance == 2) {
                                echo '<script>alert("'. $attendance.'")</script>';
                                $currentTime = date('H:i:s'); 
                                header("Location: employee_loginForm.php?error=Time out this morning: $currentTime");
                                exit();
                            } elseif($attendance == 3) {
                                echo '<script>alert("'. $attendance.'")</script>';
                                $currentTime = date('H:i:s'); 
                                header("Location: employee_loginForm.php?error=Time in this afternoon: $currentTime");
                                exit();
                            } else {
                                echo '<script>alert("'. $attendance.'")</script>';
                                $currentTime = date('H:i:s'); 
                                header("Location: employee_loginForm.php?error=Time out this afternoon: $currentTime");
                                exit();
                            }

                           
                            
        
                        } else {
                            header("Location: employee_loginForm.php?error=Incorrect Company ID or Name");
                            exit();
                        }
                    } else {
                        header("Location: employee_loginForm.php?error=Incorrect Company ID or Name");
                        exit();
                    }
              
            } else {
                header("Location: employee_loginForm.php?error=Incorrect Company ID or Name");
                exit();
            }
            } else {
                
                header("Location: employee_loginForm.php?error=Incorrect Company ID or Name");
                exit();
            }
    
    }
    }

?>