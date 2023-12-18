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
                
                    $sql = "SELECT * FROM employee WHERE first_name = '$first_name' AND last_name = '$last_name' AND com_id = '$com_id'";
                    $result = mysqli_query($conn, $sql);
                    
                    if(mysqli_num_rows($result) === 1) {
                        $row = mysqli_fetch_assoc($result);
                        if($row['first_name'] === $first_name && $row['last_name'] === $last_name && $row['com_id'] === $com_id) {
                            if($attendance_type == 1) {
                               
                                $emp_id = $row['emp_id'];
                                $am_in_date = date('Y-m-d'); 
                                $am_in = date('H:i:s'); 
                                
                                $sql = "SELECT * FROM atlog WHERE emp_id = '$emp_id' AND am_in IS NOT NULL";
// Execute the query
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    $_SESSION['error_message'] = "You already login this morning.";
                                    header("Location: employee_loginForm.php");
                                    mysqli_close($conn);
                                    exit(); 
                                } else {
                                      $sql = "INSERT INTO atlog(emp_id, atlog_date, am_in) VALUES ('$emp_id', '$am_in_date', '$am_in')";
 
                                if (mysqli_query($conn, $sql)) {
                                    $_SESSION['error_message'] = "Time in this morning: $am_in";
                                    header("Location: employee_loginForm.php");
                                    mysqli_close($conn);
                                    exit(); 
                                } else {
                                    $_SESSION['error_message'] = "Cannot login this morning";
                                    mysqli_close($conn);
                                    header("Location: employee_loginForm.php");
                                    exit();
                                } 
                                }
                                
                                          
                        //  / end of 1        // 
 
                            } else if($attendance_type == 2) {
                                $emp_id = $row['emp_id'];
                                $am_out_date = date('Y-m-d'); 
                                $am_out = date('H:i:s'); 
                                
                                $check_emp_sql = "SELECT * FROM atlog WHERE emp_id = '$emp_id'";
                                $check_emp_result = mysqli_query($conn, $check_emp_sql);

                                if (mysqli_num_rows($check_emp_result) === 0) {
                                    $_SESSION['error_message'] = "You have not logged in yet this morning.";
                                    header("Location: employee_loginForm.php");
                                    mysqli_close($conn);
                                    exit(); 
                                }
    
                                $sql = "SELECT * FROM atlog WHERE emp_id = '$emp_id' AND am_out IS NOT NULL";

                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    $_SESSION['error_message'] = "You already logout this morning.";
                                    header("Location: employee_loginForm.php");
                                    mysqli_close($conn);
                                    exit(); 
                                } else {
                                    $sql = "UPDATE atlog SET 
                                    am_out = '$am_out'

                                    WHERE emp_id = '$emp_id'";
                                    
                                    if (mysqli_query($conn, $sql)) {
                                        $_SESSION['error_message'] = "Time out this morning: $am_out";
                                        header("Location: employee_loginForm.php");
                                        mysqli_close($conn);
                                        exit(); 
                                    } else {
                                        $_SESSION['error_message'] = "Cannot logout this morning";
                                        mysqli_close($conn);
                                        header("Location: employee_loginForm.php");
                                        exit();
                                    }
                                }
                                // end of 2
                            } else if($attendance_type == 3) {
                                $emp_id = $row['emp_id'];
                                $pm_in_date = date('Y-m-d'); 
                                $pm_in = date('H:i:s');  
                                
                                $sql = "SELECT * FROM atlog WHERE emp_id = '$emp_id' AND pm_in IS NOT NULL";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // Rows exist where am_in is not empty for the given emp_id and atlog_date
                                    // echo "am_in field is not empty for emp_id: $emp_id on date: $am_in_date";
                                    $_SESSION['error_message'] = "You already login this afternoon.";
                                    header("Location: employee_loginForm.php");
                                    mysqli_close($conn);
                                    exit(); // Terminate script execution after displaying the alert
                                } else {
                                    // No rows found where am_in is not empty for the given emp_id and atlog_date
                                    // echo "am_in field is empty for emp_id: $emp_id on date: $am_in_date";
                                    // $sql = "INSERT INTO atlog(emp_id, atlog_date, pm_in, type) VALUES ('$emp_id', '$pm_in_date', '$pm_in', '$type')";
                                    $emp_id = $row['emp_id'];
                                   
                                    // Query to check if the specific value exists in any row of the 'column_name'
                                    $check_query = "SELECT COUNT(*) AS count FROM atlog WHERE emp_id = '$emp_id'";
                                    $result_check = mysqli_query($conn, $check_query);
                                    
                                    if ($result_check) {
                                        $row = mysqli_fetch_assoc($result_check);
                                        $count = $row['count'];
                                        if ($count > 0) {
                                             $sql = "UPDATE atlog SET 
                                            pm_in = '$pm_in'
                                            WHERE emp_id = '$emp_id'";
                                
                                        if (mysqli_query($conn, $sql)) {
                                            $_SESSION['error_message'] = "Time in this afternoon: $pm_in";
                                            header("Location: employee_loginForm.php");
                                            mysqli_close($conn);
                                            exit(); // Terminate script execution after displaying the alert
                                        } else {
                                            $_SESSION['error_message'] = "Cannot logout this afternoon";
                                            mysqli_close($conn);
                                            header("Location: employee_loginForm.php");
                                            exit();
                                        } 
                                }
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
                                        } else {
                                             
                                        }
                                    }
                                   
                                //end of 3
                            } else {
                                $emp_id = $row['emp_id'];
                                $pm_out_date = date('Y-m-d'); // Corrected date format
                                $pm_out = date('H:i:s'); 
                                // $type = 'PM out'; 
                                
                                $check_emp_sql = "SELECT * FROM atlog WHERE emp_id = '$emp_id' AND pm_in IS NOT NULL";
                                $check_emp_result = mysqli_query($conn, $check_emp_sql);
                                
                                // Check if emp_id exists
                                if (mysqli_num_rows($check_emp_result) === 0) {
                                    // If emp_id does not exist, set an error message and redirect
                                    $_SESSION['error_message'] = "You have not logged in yet this afternoon.";
                                    header("Location: employee_loginForm.php");
                                    mysqli_close($conn);
                                    exit(); // Terminate script execution after displaying the alert
                                }
  
                                
                                $sql = "SELECT * FROM atlog WHERE emp_id = '$emp_id' AND pm_out IS NOT NULL";

                                // Execute the query
                                $result = mysqli_query($conn, $sql);
                                
                                // Check if there are any rows returned
                                if (mysqli_num_rows($result) > 0) {
                                    // am_in is empty for the given emp_id
                                    $_SESSION['error_message'] = "You already logout this afternoon.";
                                    header("Location: employee_loginForm.php");
                                    mysqli_close($conn);
                                    exit(); // Terminate script execution after displaying the alert
                                } else {
                                    // am_in is not empty for the given emp_id
                                    // $sql = "INSERT INTO atlog(emp_id, atlog_date, pm_out, type) VALUES ('$emp_id', '$pm_out_date', '$pm_out', '$type')";
                                    $sql = "UPDATE atlog SET 
                                        pm_out = '$pm_out'
                                        -- type = '$type'
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