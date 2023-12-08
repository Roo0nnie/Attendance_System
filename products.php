<?php
    session_start();
    include 'db_conn.php';

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" href="assets/img/4710Website/Others/4710Logo.png" type="image/x-icon">


    <title>Products | 4710 </title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="./assets/css/font-awesome.css">

    <link rel="stylesheet" href="./assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="./assets/css/owl-carousel.css">

    <link rel="stylesheet" href="./assets/css/lightbox.css">

    <script src="./js"></script>

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <!-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>   -->
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky"> 
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <div class="logocontain">
                            <a href="index.html" class="logo">
                        <img src="assets/img/LogoCloseUp.png" style="width: 180px; height:auto;">
                    </a>
                    </div>
                        <!-- ***** Menu Start ***** -->
                        <div class="pages-nav">
                            <ul class="nav">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About Us</a></li>
                                <li class="scroll-to-section"><a href="#top" class="active">Products</a></li>
                            
                                <li><a href="contact.html">Contact Us</a></li>                        
                            <li class="header-icon">
                                <li><a href="Add-To-Cart.html"><i class="fa-solid fa-bag-shopping fa-lg position-relative"></i><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="addtocartitem">
    0
  </span></a></li>
                                <li><a href="javascript:;"><i class="fa-regular fa-user fa-lg"></i></a></li>
                            </li>
                    </ul>   
                        </div>
                          
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Product Page</h2>
                        <span>Awesome &amp; Creative HTML CSS layout by TemplateMo</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Products Area Starts ***** -->
    <section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Our Latest Products</h2>
                        <span>Check out all of our products.</span>
                    </div>
                    <div class="col-lg-12">
                    <div class="pagination">
                        <ul>
                            <li>
                                <li class="active">
                                    <a href="#">1</a>
                                </li>
                                
                            </li>
                           
                            <li >
                                <a href="#">2</a>
                            </li>
                            <li>
                                <a href="#">3</a>
                            </li>
                            <li>
                                <a href="#">4</a>
                            </li>
                            <li>
                                <a href="#">></a>
                            </li>
                        </ul>
                    </div>
                </div>
                </div>
            </div>
            
        </div>
        
        <div class="container">
            <div class="row">
            <?php
                $sql = "Select * from `product_details`";

                $result = mysqli_query($conn, $sql);
                $id_loop = 0;
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $prod_id = $row['prod_id'];
                        $prod_name = $row['prod_name'];
                        $prod_size = $row['prod_size'];
                        $prod_image = $row['prod_image'];
                        $id_loop += 1;
                        echo '<div class="col-lg-4">
                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li><a><i class="fa fa-eye"></i></a></li>
                                        <li><a><i class="fa fa-star"></i></a></li>
                                        <li><a onclick="addtocart('.$prod_id.')"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <img src="'.$prod_image.'" alt="">
                            </div>
                            <div class="down-content">
                                <h4>'. $prod_name .'</h4>
                                <span>₱'. $prod_size .'.00</span>
                                <ul class="stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>';
                                    ?>
                <?php
                    }
                }
                ?>
                

            </div>
        </div>
        
    </section>
    <!-- ***** Products Area Ends ***** -->
    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo">
                            <img src="assets/img/LogoCloseUp.png" alt="" style="height: 100px;">
                        </div>
                        <ul>
                            <li><a href="https://maps.app.goo.gl/fh1E6QbgdSPU2FX66"><i class="fa-solid fa-location-dot fa-xs"></i>  Gubat Sorsogon</a></li>
                            <li><a href="https://mail.google.com/mail/u/0/#inbox?compose=GTvVlcSHvnwgFdRvNhqzbSNHzJztmddMpnFfWTtqlRFBswTqpSBcqtwJgXJbpJxRrXHdpHsGqBLzh"> <i class="fa-solid fa-envelope fa-xs"></i> 4710localmotives@gmail.com</a></li>
                            <li><a href=""> <i class="fa-solid fa-phone fa-xs"></i> 0930 960 0585</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Shopping &amp; Categories</h4>
                    <ul>
                        <li class="scroll-to-section"> <a href="index.html">4710 Tees</a></li>
                        <li class="scroll-to-section"><a href="index.html">4710 Mesh Shorts</a></li>
                        <li class="scroll-to-section"><a href="index.html">4710 Collaborations</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Useful Links</h4>
                    <ul>
                        <li class="scroll-to-section"><a href="index.html" class="active">Homepage</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li class="scroll-to-section"><a href="#top" class="active">Products</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Help &amp; Information</h4>
                    <ul>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">FAQ's</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Tracking ID</a></li>    
                    </ul> 
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Copyright © 2022 HexaShop Co., Ltd. All Rights Reserved. 
                        
                        <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a></p>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });


        let product_loop = 0;
        let productIds = [];

function addtocart(productId) {
    let num_item_element = document.getElementById('addtocartitem');
    let num_item_text = num_item_element.textContent;
    
    if (productIds.includes(productId)) {
    } else {
        productIds.push(productId);
        product_loop = 1 + parseInt(num_item_text);
        console.log(productId);

        document.getElementById('addtocartitem').textContent = product_loop;
    }
}
            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'Add-To-Cart.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('productIds=' + JSON.stringify(productIds));
    </script>

  </body>

</html>
