<?php
include 'koneksi.php';
if($_SESSION){
    $nama = $_SESSION["nama"];

    $id_user = $_SESSION['id_user'];
    
    $sql = mysqli_query($koneksi, "SELECT * FROM user_jubeta WHERE id_user = '$id_user' ");
    $data = mysqli_fetch_assoc($sql);

    if($_SESSION["tingkatan_user"] == 'admin'){
        header("Location: admin/dasboard-admin.php");
    }
    
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>JUBETA</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Material+Icons:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap-modified.min.css">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- HEADER -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <h1 class="logo mr-auto"><a href="home.php"> JUBETA </a></h1>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="profil.php">Profile</a></li>
                    <li><a href="cart.php"> <i class="fa fa-shopping-cart"></i> </a></li>
                    <li><a href="transfer.php"> <i class="fas fa-cash-register"></i> </a></li>
                    <?php if ($_SESSION) : ?>
                    <li class="drop-down"><a href=""> Hello, <?php echo $nama ?> </a>
                    <ul>
                        <li><a href="logout.php">Logout</a></li>
                        <?php else : ?>
                            <li><a href="login.php">Login</a></li>
                        <?php endif ?>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- END HEADER -->