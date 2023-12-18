<?php 
session_start();
include 'db_conn.php';
date_default_timezone_set('Asia/Manila');

if(isset($_POST['submit'])) {
    $attendance_type = $_POST['submit'];
    if(empty($_POST['com_id']) && !empty($_POST['emp_name'])) {
        $_SESSION['error_message'] = "Company ID is required";
        header("Location: employee_loginForm.php");
        mysqli_close($conn);
        exit();
    } elseif (empty($_POST['emp_name'])&& !empty($_POST['com_id'])) {
        $_SESSION['error_message'] = "Name is required";
        header("Location: employee_loginForm.php");
        mysqli_close($conn);
        exit();
    } elseif (empty($_POST['com_id']) && empty($_POST['emp_name'])) {
        $_SESSION['error_message'] = "Company ID and Name is required";
        header("Location: employee_loginForm.php");
        mysqli_close($conn);
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
                            if($attendance_type == 1) { 
                                $emp_id = $row['emp_id'];
                                $am_in_date = date('Y-m-d'); // Corrected date format
                                $am_in = date('H:i:s');
                                
                                $sql = "SELECT * FROM atlog WHERE emp_id = '$emp_id'";
                                $result = mysqli_query($conn, $sql);
                                
                                if (mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result);
                                        $today = date('Y-m-d');
                                        $yesterday = $row['atlog_date'];
                                        
                                        if ($yesterday === $today) {
                                            $_SESSION['error_message'] = "cannot insert";
                                            header("Location: employee_loginForm.php");
                                            mysqli_close($conn);
                                            exit(); // Terminate script execution after displaying the alert
                                        } else {
                                            $_SESSION['error_message'] = "can insert";
                                            header("Location: employee_loginForm.php");
                                            mysqli_close($conn);
                                            exit();
                                             // Terminate script execution after displaying the alert
                                        }
                                    
                                    
                                    mysqli_close($conn);
                                }
                                $_SESSION['error_message'] = "can insert 2";
                                            header("Location: employee_loginForm.php");
                                            mysqli_close($conn);
                                            exit();
                                
                        //  / end of 1        // 
 
                            } else if($attendance_type == 2) {
                                $emp_id = $row['emp_id'];
                                $am_out_date = date('Y-m-d'); // Corrected date format
                                $am_out = date('H:i:s');
                                // $type = 'AM out'; 
                                
                                $check_emp_sql = "SELECT * FROM atlog WHERE emp_id = '$emp_id'";
                                $check_emp_result = mysqli_query($conn, $check_emp_sql);
                                
                                // Check if emp_id exists
                                if (mysqli_num_rows($check_emp_result) === 0) {
                                    // If emp_id does not exist, set an error message and redirect
                                    $_SESSION['error_message'] = "You have not logged in yet this morning.";
                                    header("Location: employee_loginForm.php");
                                    mysqli_close($conn);
                                    exit(); // Terminate script execution after displaying the alert
                                }
  
                                
                                $sql = "SELECT * FROM atlog WHERE emp_id = '$emp_id' AND am_out IS NOT NULL";

                                // Execute the query
                                $result = mysqli_query($conn, $sql);
                                
                                // Check if there are any rows returned
                                if (mysqli_num_rows($result) > 0) {
                                    // am_in is empty for the given emp_id
                                    $_SESSION['error_message'] = "You already logout this morning.";
                                    header("Location: employee_loginForm.php");
                                    mysqli_close($conn);
                                    exit(); // Terminate script execution after displaying the alert
                                } else {
                                    // am_in is not empty for the given emp_id
                                    // $sql = "INSERT INTO atlog(emp_id, atlog_date, am_out, type) VALUES ('$emp_id', '$am_out_date', '$am_out', '$type')";
                                    $sql = "UPDATE atlog SET 
                                    am_out = '$am_out'
                                    WHERE emp_id = '$emp_id'";
                                    
                                    if (mysqli_query($conn, $sql)) {
                                        $_SESSION['error_message'] = "Time out this morning: $am_out";
                                        header("Location: employee_loginForm.php");
                                        mysqli_close($conn);
                                        exit(); // Terminate script execution after displaying the alert
                                    } else {
                                        $_SESSION['error_message'] = "Cannot logout this morning";
                                        mysqli_close($conn);
                                        header("Location: employee_loginForm.php");
                                        exit();
                                    }
                                }
                                // end of 2
                            } else if($attendance_type == 3) {
                                $atlog_date = date('Y-m-d'); // Corrected date format
                                $pm_in = date('H:i:s');
                                $emp_id = $row['emp_id'];
                                $sql = "SELECT * FROM atlog WHERE emp_id = '$emp_id'";
                                $result = mysqli_query($conn, $sql);
                                
                                if (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result);
                                    $today = date('Y-m-d');
                                    $yesterday = $row['atlog_date'];
                                    
                                    if ($yesterday == $today) {
                                        $check_pm_in = $row['pm_in'];
                                        if($check_pm_in === NULL) {
                                            $pm_in_date = date('Y-m-d'); // Corrected date format
                                            $pm_in = date('H:i:s');
                                            
                                            $sql = "UPDATE atlog SET 
                                            pm_in = '$pm_in'
                                            WHERE emp_id = '$emp_id'";
                                
                                        if (mysqli_query($conn, $sql)) {
                                            $_SESSION['error_message'] = "Time in this afternoon: $pm_in";
                                            header("Location: employee_loginForm.php");
                                            mysqli_close($conn);
                                            exit(); 
                                        } else {
                                            $_SESSION['error_message'] = "Cannot logout this afternoon";
                                            mysqli_close($conn);
                                            header("Location: employee_loginForm.php");
                                            exit();
                                        }
                                        }
                                        $_SESSION['error_message'] = "You already logged in this afternoon.";
                                        header("Location: employee_loginForm.php");
                                        mysqli_close($conn);
                                        exit();
                                    }
                                    $pm_in_date = date('Y-m-d'); // Corrected date format
                                    $pm_in = date('H:i:s');
                                    
                                    $sql = "INSERT INTO atlog(emp_id, atlog_date, pm_in) VALUES ('$emp_id', '$pm_in_date', '$pm_in')";
            
                                    if (mysqli_query($conn, $sql)) {
                                        $_SESSION['error_message'] = "Time in this afternoon: $pm_in";
                                        header("Location: employee_loginForm.php");
                                        mysqli_close($conn);
                                        exit(); // Terminate script execution after displaying the alert
                                    } else {
                                        $_SESSION['error_message'] = "Cannot login this morning";
                                        mysqli_close($conn);
                                        header("Location: employee_loginForm.php");
                                        exit();
                                    } 
                                }
                                $pm_in_date = date('Y-m-d'); // Corrected date format
                                $pm_in = date('H:i:s');
                                $sql = "INSERT INTO atlog(emp_id, atlog_date, pm_in) VALUES ('$emp_id', '$pm_in_date', '$pm_in')";
            
                                if (mysqli_query($conn, $sql)) {
                                    $_SESSION['error_message'] = "Time in this afternoon: $pm_in";
                                    header("Location: employee_loginForm.php");
                                    mysqli_close($conn);
                                    exit(); // Terminate script execution after displaying the alert
                                } else {
                                    $_SESSION['error_message'] = "Cannot login this morning";
                                    mysqli_close($conn);
                                    header("Location: employee_loginForm.php");
                                    exit();
                                } 
                                //end of 3
                            } else {
                                $emp_id = $row['emp_id'];
                                $pm_out_date = date('Y-m-d'); 
                                $pm_out = date('H:i:s');
                                
                                $sql = "SELECT * FROM atlog WHERE emp_id = '$emp_id' AND pm_out IS NULL";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_assoc($result);
                                    $sql = "UPDATE atlog SET 
                                            pm_out = '$pm_out'
                                            WHERE emp_id = '$emp_id'";
                                    
                                    if (mysqli_query($conn, $sql)) {
                                        $_SESSION['error_message'] = "Time out this afternoon: $pm_out";
                                        header("Location: employee_loginForm.php");
                                        mysqli_close($conn);
                                        exit(); // Terminate script execution after displaying the alert
                                    } else {
                                        $_SESSION['error_message'] = "Cannot logout this morning";
                                        mysqli_close($conn);
                                        header("Location: employee_loginForm.php");
                                        exit();
                                    }
                                }
                                    $_SESSION['error_message'] = "You already logged out this afternoon.";
                                    header("Location: employee_loginForm.php");
                                    mysqli_close($conn);
                                    exit();
                            }
    
                        } else {
                            $_SESSION['error_message'] = "Incorrect Company ID or Name";
                            header("Location: employee_loginForm.php");
                            mysqli_close($conn);
                            exit();
                        }
                    } else {
                        $_SESSION['error_message'] = "Incorrect Company ID or Name";
                        header("Location: employee_loginForm.php");
                        mysqli_close($conn);
                        exit();
                    }
              
            } else {
                $_SESSION['error_message'] = "Incorrect Company ID or Name";
                header("Location: employee_loginForm.php");
                mysqli_close($conn);
                exit();
            }
            } else {
                $_SESSION['error_message'] = "Incorrect Company ID or Name";
                header("Location: employee_loginForm.php");
                mysqli_close($conn);
                exit();
            }
    
    }
    }

?>