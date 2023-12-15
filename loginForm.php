<?php $title = "Login"; 
session_start();
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
            <div class="container login-wrapper bg-yellow-container">
                <div class="content">
                <h2  class="text-black mt-2">Welcome back!</h2>
                <p class="text-black"><b>Check Out Your Employee</b></p>

                <form action="login.php" method="POST">
                <?php if(isset($_SESSION['error_message'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?> </p>
                    <?php } ?>
                    <input name="admin_user" type="text" class="form-control input-field" placeholder="Username" required><br>
                    <input name="admin_pass" type="password" class="form-control input-field" placeholder="Password" required><br>
                    <!-- <center><b><label for="forgot-Pass"> <span><a href="#" class="text-white">Forgot</a></span><span class="text-white">your</span> <span class="text-black">password</span></label></b></center><br> -->

                    <center><input type="submit" name="submit" value="Login" id="login" class="btn-red"></center>
                </form>
                    <!-- <b><label>Don't have a account?<span><a href="#">Sign up</a></span></label></b> -->
                </div>
            </div>
        </section>
    </div>                                           
</body>
</html>
        