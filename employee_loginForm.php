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
<link rel="stylesheet" href="./css/loginForm.css">

    <script src = "./js/jquery-3.5.1.min.js"></script>
    <title><?php echo $title ?></title>
</head>

<body>
    <div class="login-form">
        <section class="login">
            <div class="container login-wrapper">
                <div class="content bg-yellow-container">
                    <h2 class="text-black mt-2">Welcome Our Employee</h2>
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
                        <input name="com_id" type="text" class="form-control input-field" placeholder="Company ID" require><br>
                        <input name="emp_name" type="text" class="form-control input-field" placeholder="Name" require><br>
                        <!-- <center><input type="submit" name="submit" value="Login" id="login"></center> -->
                        <center>
							<button type="submit" class='btn-red' id="AM" name="submit" value='1'>IN AM</button>
							<button type="submit" class='btn-red' id="AM" name="submit"  value='2'>OUT AM</button>
							<button type="submit" class='btn-red' id="PM" name="submit"  value='3'>IN PM</button>
							<button type="submit" class='btn-red' id="PM" name="submit"  value='4'>OUT PM</button>
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

// function disableElementsBasedOnTime() {
//     const now = new Date();
//     const hours = now.getUTCHours() + 8; // UTC+8

//     if ((hours >= 0 && hours < 12)) {
//         // Disable elements with IDs containing "AM" if it's AM
//         const elementsWithAM = document.querySelectorAll('[id*="PM"]');
//         elementsWithAM.forEach(element => {
//             element.disabled = true;
//             // element.style.backgroundColor = "white";
//         });
//     } else if (hours >= 12 && hours < 24) {
//         // Disable elements with IDs containing "PM" if it's PM
//         const elementsWithPM = document.querySelectorAll('[id*="AM"]');
//         elementsWithPM.forEach(element => {
//             element.disabled = true;
//             // element.style.backgroundColor = "white";
//         });
//     }
// }

// // Call the function when the page loads
// window.onload = function() {
//     disableElementsBasedOnTime();
// };
</script>
</html>