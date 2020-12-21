<?php
include 'koneksi.php';
if (isset($_POST['send'])) {
        echo "
                <script>
                    alert('Terimakasih, Anda akan segera kami dihubungi oleh Admin');
                    document.location.href = 'home.php';
                </script>
            ";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link href="assets/img/logo.png" rel="icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Contact Us</title>

</head>
<body class="contact">

    <!-- HEADER -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <h1 class="logo mr-auto"><a href="home.html"> JUBETA </a></h1>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li class="active"><a href="contact.php">Contact</a></li>
                    <li><a href="profil.php">Profile</a></li>
                    <li><a href="transaksi.php"> <i class="fa fa-shopping-cart"></i> </a></li>
                    <li class="drop-down"><a href=""> Hello </a>
                        <ul>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="register.php">Register</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- END HEADER -->

    <div class="container mt-5">
        <div class="row">

            <div class="col-4 left">
                <h2>Get in Touch</h2>
                <p>You need more information? Check what other persons are saying about our produk. Let's contact our admin</p>
                
                <div class="row">
                    <div class="col-8">
                        <b><i class="fa fa-map-marker fa-lg"></i>&nbsp;&nbsp;&nbsp;Find us at the office</b><br/>
                        <p class="ml-4">Jubeta Bali Group<br/>Sesetan, Denpasar Selatan<br/>Bali, Indonesia</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <b><i class="fa fa-phone fa-lg"></i>&nbsp;&nbsp;Give us a ring</b><br/>
                        <p class="ml-4">Admin<br/><a href="https://api.whatsapp.com/send?phone=6287743867599&text=Halo,%20saya%20ingin%20bertanya%20terkait%20produk." target="blank" title="Menuju laman whatsapp admin" class="icon1">09978876768</a><br/>Mon Sat 8:00 22:00</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-10">
                        <b><i class="fa fa-share fa-md"></i>&nbsp;&nbsp;Our Social Media</b><br/>
                        <p class="ml-4">Jubeta Marketing Division<br/>
                            <a href="mailto:putunovia546@gmail.com" target="blank" title="text email" class="icon1"><i class="fa fa-envelope fa-md"></i>&nbsp;jubetasuccess@gmail.com</a><br/>
                            <a href="#" target="blank" title="Our instagram" class="icon1"><i class="fa fa-instagram fa-md"></i>&nbsp;@jubetaBali</a><br/>
                            <a href="#" target="blank" title="Our twitter" class="icon1"><i class="fa fa-twitter fa-md"></i>&nbsp;@thejubetaBali</a><br/>
                        </p>
                    </div>
                </div>
            </div>
        
            <div class="col-2"></div>
                <div class="col-6">

                <div class="row">
                    <div class="col d-flex justify-content-center">
                        <div class="card p-3 text-center font-weight-bold shadow position-absolute w-75" id="header"><h3>Contact Us</h3></div>
                    </div>
                </div>

                <div class="card p-4 border-radius-5 mt-4 shadow">
                    <div class="container">
                        <form action="" method="POST">
                            <div class="mt-5">

                                <div class="row">
                                    <div class="col form-group form-kontak">
                                        <input type="text" name="nama" id="nama" placeholder="Your name" class="form-control w-250 border-0 border-bottom-1 shadow-none" autofocus required/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col form-group form-kontak">
                                        <input type="email" name="email" id="email" placeholder="Email address" class="form-control w-250 border-0 border-bottom-1 shadow-none" autofocus required/>
                                    </div>
                                </div>
    
                                <div class="row">
                                    <div class="col form-group form-kontak">
                                        <textarea id="message" name="message" placeholder="Your message" rows="6" cols="50" class="form-control w-250 border-0 border-bottom-1 shadow-none" required></textarea>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">
                                        <input type="checkbox" required>&nbsp;I'm not Robot
                                    </div>
                                    <div class="col-6">
                                        <div class="float-right">
                                            <button type="submit" name="send" class="btn" id="btn1">SEND MESSAGE</button>
                                        </div>   
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

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
