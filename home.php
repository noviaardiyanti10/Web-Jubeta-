<?php
include 'koneksi.php';
if($_SESSION){
    $nama = $_SESSION["nama"];
    if($_SESSION["tingkatan_user"] == 'admin'){
        header("Location: admin/dasboard-admin.php");
    }
}else{
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>JUBETA</title>

    <link href="assets/img/logo.png" rel="icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- HEADER -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <h1 class="logo mr-auto"><a href="home.html"> JUBETA </a></h1>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="coba.html">Home</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="profile.html">Profile</a></li>
                    <li><a href="transaksi.html"> <i class="fa fa-shopping-cart"></i> </a></li>
                    <li class="drop-down"><a href=""> Hello </a>
                        <ul>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="register.html">Register</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- END HEADER -->

  <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9 text-center">
                    <h1> J U B E T A </h1>
                    <h2>Buy now your favorite motorcycle</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    <main id="main">
    <!-- ======= PRICING ======= -->
        <form id="pricing" class="pricing" method="post" action="#">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="box">
                            <a href="#"><img src="assets/img/motor1.png"></a>
                            <h3> <a href="#"> Yamaha </a> </h3>
                            <div class="buy-price">
                                <span> Rp. 20 </span> juta
                            </div>
                            <ul>
                                <li> </li>
                                <li>
                                    <span>Transmission</span>
                                    <span> Manual </span>
                                </li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="transaksi.html" class="btn-buy"> Buy Now </a>
                            </div>                      
                        </div> 
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="box">
                            <a href="#"><img src="assets/img/motor1.png"></a>
                            <h3> <a href="#"> Yamaha </a> </h3>
                            <div class="buy-price">
                                <span> Rp. 20 </span> juta
                            </div>
                            <ul>
                                <li> </li>
                                <li>
                                    <span>Transmission</span>
                                    <span> Manual </span>
                                </li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="transaksi.html" class="btn-buy"> Buy Now </a>
                            </div>                      
                        </div> 
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="box">
                            <a href="#"><img src="assets/img/motor1.png"></a>
                            <h3> <a href="#"> Yamaha </a> </h3>
                            <div class="buy-price">
                                <span> Rp. 20 </span> juta
                            </div>
                            <ul>
                                <li> </li>
                                <li>
                                    <span>Transmission</span>
                                    <span> Manual </span>
                                </li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="transaksi.html" class="btn-buy"> Buy Now </a>
                            </div>                      
                        </div> 
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="box">
                            <a href="#"><img src="assets/img/motor1.png"></a>
                            <h3> <a href="#"> Yamaha </a> </h3>
                            <div class="buy-price">
                                <span> Rp. 20 </span> juta
                            </div>
                            <ul>
                                <li> </li>
                                <li>
                                    <span>Transmission</span>
                                    <span> Manual </span>
                                </li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="transaksi.html" class="btn-buy"> Buy Now </a>
                            </div>                      
                        </div> 
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="box">
                            <a href="#"><img src="assets/img/motor1.png"></a>
                            <h3> <a href="#"> Yamaha </a> </h3>
                            <div class="buy-price">
                                <span> Rp. 20 </span> juta
                            </div>
                            <ul>
                                <li> </li>
                                <li>
                                    <span>Transmission</span>
                                    <span> Manual </span>
                                </li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="transaksi.html" class="btn-buy"> Buy Now </a>
                            </div>                      
                        </div> 
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="box">
                            <a href="#"><img src="assets/img/motor1.png"></a>
                            <h3> <a href="#"> Yamaha </a> </h3>
                            <div class="buy-price">
                                <span> Rp. 20 </span> juta
                            </div>
                            <ul>
                                <li> </li>
                                <li>
                                    <span>Transmission</span>
                                    <span> Manual </span>
                                </li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="transaksi.html" class="btn-buy"> Buy Now </a>
                            </div>                      
                        </div> 
                    </div>

                </div>
            </div>
        </form><!-- End Pricing Section -->
    </main><!-- End #main -->

  <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container d-md-flex py-4">

            <div class="mr-md-auto text-center text-md-left">
                <div class="copyright">
                    &copy; Copyright <strong><span>JUBETA</span></strong>
                </div>
                <div class="credits">
                    <p>
                        Jubeta Bali Group <br>
                        Sesetan, Denpasar Selatan <br>
                        Bali, Indonesia <br>
                    </p>
                </div>
            </div>

            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                <a href="#" class="google-plus"><i class="fa fa-phone"></i></a>
                <a href="#" class="linkedin"><i class="fa fa-envelope"></i></a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top"><i class="fa fa-arrow-up"></i></a>
    <div id="preloader"></div>

  <!-- JS -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>