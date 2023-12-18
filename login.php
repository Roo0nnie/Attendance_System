<?php
session_start();
include 'db_conn.php';

    if(isset($_POST['admin_user']) && isset($_POST['admin_pass'])) {
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }
        $admin_user = validate($_POST['admin_user']);
        $admin_pass = validate($_POST['admin_pass']);

        if(empty($admin_user)) {
            $_SESSION['error_message'] = "Username is required.";
            header("Location: loginForm.php");
            mysqli_close($conn);
            exit(); // Terminate script execution after displaying the alert
        }
        else if (empty($admin_pass)) {
            $_SESSION['error_message'] = "Admin password is required.";
            header("Location: loginForm.php");
            mysqli_close($conn);
            exit(); // Terminate script execution after displaying the alert
        } else {

            $sql = "SELECT * FROM admin_account WHERE admin_user = '$admin_user' AND admin_pass = '$admin_pass'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if($row['admin_user'] === $admin_user && $row['admin_pass'] === $admin_pass) {
                    $_SESSION['admin_user'] = $row['admin_user'];
                    $_SESSION['admin_name'] = $row['admin_name'];
                    $_SESSION['admin_id'] = $row['admin_id'];
                    header("Location: index.php");
                    exit();

                } else {
                    $_SESSION['error_message'] = "Incorrect username or password.";
                    header("Location: loginForm.php");
                    mysqli_close($conn);
                    exit(); // Terminate script execution after displaying the alert
                }
            } else {
                $_SESSION['error_message'] = "Incorrect username or password.";
                header("Location: loginForm.php");
                mysqli_close($conn);
                exit(); // Terminate script execution after displaying the alert
            }
        }
    } else {
        $_SESSION['error_message'] = "Incorrect username or password.";
        header("Location: loginForm.php");
        mysqli_close($conn);
        exit(); // Terminate script execution after displaying the alert
    }

?>