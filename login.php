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
            $_SESSION['error_message'] = "Username is required";
            header("Location: loginForm.php?error=username is required");
            exit();
        }
        else if (empty($admin_pass)) {
            header("Location: loginForm.php?error=admin_pass is required");
            exit();
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
                    header("Location: loginForm.php?error=Incorrect username or admin_pass");
                    exit();
                }
            } else {
                header("Location: loginForm.php");
                exit();
            }
        }
    } else {
        header("Location: loginForm.php");
        exit();
    }

?>