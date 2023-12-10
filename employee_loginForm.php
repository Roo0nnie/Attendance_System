<?php $title = "Employee"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/bootstrap.bundle.min.js"></script>

    <!-- <script defer src="./Final/js/index.js"></script> -->
    <link rel="stylesheet" href="./css/loginForm.css">
    

    <title><?php echo $title?></title>
</head>
<body>
    <div class="login-form">
        <section class="login">
            <div class="container login-wrapper">
                <div class="content">
                <h2  class="text-white">Welcome Our Employee</h2>
                <form action="employee_login.php" method="POST">
                    <input name="com_id" type="text" class="form-control" placeholder="Company ID" required><br>
                    <input name="emp_name" type="text" class="form-control mt-3" placeholder="Name" required><br>
                    <center><b><label for="forgot-Pass"> <span><a href="#" class="text-white">Forgot</a></span><span class="text-white">your</span> <span class="text-black">password</span></label></b></center><br>
                    <center><input type="submit" name="submit" value="Login" id="login"></center>
                </form>
                </div>
            </div>
        </section>
    </div>                                           
</body>
</html>
        