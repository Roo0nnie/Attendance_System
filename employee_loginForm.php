<?php $title = "Employee";
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
<!-- <link rel="stylesheet" href="./css/loginForm.css"> -->
<link rel="stylesheet" href="./css/loginForm.css">

    <script src = "./js/jquery-3.5.1.min.js"></script>
    <title><?php echo $title ?></title>
</head>

<body>
    <div class="login-form">
        <section class="login">
            <div class="container login-wrapper">
                <div class="content bg-yellow-container position-relative">
                <div class="admin-key">
                <span class="btn-red mt-3"><a href="loginForm.php"><ion-icon name="ellipsis-horizontal-outline"></ion-icon></a></span>
                </div>
                   
                    <h2 class="text-black mt-2">Attendance System</h2>
                            <div class="text-center text-black fs-1">
                                <p><?php echo date('F d, Y') ?> <span id="now"></span></p>
                            </div>
                            
                    <form action="employee_login.php" method="POST" class="container">
                                <?php
                                // Retrieve the error message from the URL parameter 'error'
                                if (isset($_SESSION['error_message'])) {
                                    echo "<p>" . $_SESSION['error_message'] . "</p>";
                                    unset($_SESSION['error_message']); // Remove the error message from the session
                                }
                                ?>

                                <div class="input-group">
                                  <input type="text"  name="com_id" type="text" class="form-control input-field "  placeholder="Company ID" require aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                                   <span class="input-group-text input-field " id="inputGroup-sizing-lg">Search</span>
                                </div>
                        <input name="emp_name" type="text" class="form-control input-field mt-2" placeholder="Name" require><br>
                        <!-- <center><input type="submit" name="submit" value="Login" id="login"></center> -->
                        <center>
							<button type="submit" class='btn-red' id="AM" name="submit" value='1'>AM in</button>
							<button type="submit" class='btn-red' id="AM" name="submit"  value='2'>AM out</button>
							<button type="submit" class='btn-red' id="PM" name="submit"  value='3'>PM in</button>
							<button type="submit" class='btn-red' id="PM" name="submit"  value='4'>PM out</button>
						</center>
						<!-- <div class="loading text-black" style="display: none"><center>Please wait...</center></div> -->
                    </form>
                </div>

            </div>
    </div>
    </section>
    </div>
</body>
<script>

$(document).ready(function(){
			setInterval(function(){
				var time = new Date();
				var now = time.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true })
				$('#now').html(now)
			},500)
			console.log();
		})

</script>

  <!-- ====== ionicons ======= -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</html>