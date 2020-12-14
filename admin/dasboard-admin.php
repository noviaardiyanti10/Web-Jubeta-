<?php
require 'function-1.php';
$result = mysqli_query($koneksi, "SELECT COUNT(username) as jumlah_user FROM (user_jubeta) WHERE tingkatan_user = 'user';");
$result = mysqli_fetch_array($result);

$orders = mysqli_query($koneksi, "SELECT COUNT(id_pesan) as jumlah_pesan FROM (pesan);");
$orders = mysqli_fetch_array($orders);

$produk = mysqli_query($koneksi, "SELECT COUNT(id_produk) as jumlah_produk FROM (produk);");
$produk = mysqli_fetch_array($produk);

$last_entry = mysqli_query($koneksi, "SELECT kode_produk as last_produk FROM produk ORDER BY id_produk DESC LIMIT 1;");
$last_entry = mysqli_fetch_array($last_entry);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css"/>
    <script src="../assets/calendar.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <title>Dashboard</title>
</head>
<body>
    <div class="container ml-0">
      <div class="row">
          <div class="col-2 navadmin">
            <ul class="nav flex-column p-1 mt-4">
              <li class="nav-item mt-5">
                <a class="nav-link text-white" href="../admin/daftar-admin.php"><i class="fa fa-user-circle mr-2"></i>Daftar Admin</a><hr class="bg-secondary"/>
              </li>

              <li class="nav-item">
                <a class="nav-link text-white" href="../admin/user-list.php"><i class="fa fa-users mr-2"></i>Daftar User</a><hr class="bg-secondary"/>
              </li>

              <li class="nav-item">
                <a class="nav-link text-white" href="../admin/produk-list.php"><i class="fa fa-list mr-1"></i>Daftar Produk</a><hr class="bg-secondary"/>
              </li>

              <li class="nav-item text-white">
                <a class="nav-link text-white" href="../admin/order.php"><i class="fa fa-shopping-basket mr-2"></i>Order</a><hr class="bg-secondary"/>
              </li>

              <li class="nav-item text-white">
                <a class="nav-link text-white" href="../admin/dasboard-admin.php"><i class="fa fa-home mr-2"></i>Home</a>
              </li>

              <li class="nav-item text-white">
                <a class="nav-link text-white" href="mailto:putunovia546@gmail.com" target="blank" title="Email jubeta"><i class="fa fa-envelope mr-2"></i>Email</a>
              </li>

              <li class="nav-item text-white">
                <a class="nav-link text-white" href="#"><i class="fa fa-power-off mr-2"></i>Quit</a>
              </li>
            </ul>
          </div>
      
        <div class="col-10">
          <div class="col-md-10">
                <nav class="navbar navbar-expand-lg navbar-light fixed-top p-2 shadow">
                  <b><a class="navbar-brand text-white">
                    <i class="fa fa-tachometer d-inline-block align-top mt-1 mr-2 fa-lg"></i>Dashboard</a></b>
                    <a class="navbar-brand ml-auto" href="#" >
                      <h6 class="font-weight-lighter mr-5"><img src="../img/admin.jpg" width="35" height="30" class="d-inline-block align-top img-circle mr-3" alt="admin">Administrator</h6>
                    </a>
                </nav>
              </div>
            

            <div class="row mt-5 text-white ml-4">

              <div class="card mt-5 text-dark shadow cal">
                <div class="card-body">
                  <h2 class="card-title text-center">Hello Admin!</h2>
                  <h3 class="card-title text-center"><script language='JavaScript'>document.write(namahari[hari]);</script></h3>
                  <h1 class="card-subtitle mb-2 display-4 text-center"><script language='JavaScript'>document.write(tanggal);</script></h1>
                  <h6 class="card-subtitel mb-1 text-center"><script language='JavaScript'>document.write(namabulan[bulan] + " " + tahun);</script></h6>
                </div>
              </div>

              <div class="card bg-info mt-5 ml-3 shadow card-kanan">
                <div class="card-header text-center "><b>Daftar User</b></div>
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-users ml-4"></i>
                  </div>
                  <h5 class="display-3"><?php echo $result['jumlah_user']; ?></h5>
                </div>
                <div class="card-footer text-muted">
                  <a href="../admin/user-list.php"><p class="card-text text-white ml-3  text-center ">Lihat Detail<i class="fa fa-angle-double-right ml-2"></i></p></a>
                </div>
              </div>
              
              <div class="card mt-5 ml-3 shadow card-kanan bg">
                <div class="card-header text-center "><b>Daftar Produk</b></div>
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-motorcycle ml-4"></i>
                  </div>
                  <h5 class="display-4"><?php echo $produk['jumlah_produk']; ?></h5>
                </div>
                <div class="card-footer text-muted shadow">
                  <a href="../admin/produk-list.php"><p class="card-text text-white ml-3  text-center ">Lihat Detail<i class="fa fa-angle-double-right ml-2"></i></p></a>
                </div>
              </div>
            </div>

            <div class="row text-white ml-4">
              <div class="card bg-warning mt-3 shadow card-kanan">
                <div class="card-header text-center "><b>Entry Produk</b></div>
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-folder ml-5"></i>
                  </div>
                  <h5 class="display-5 mt-4 text-dark">Last entry:<br/> <?php echo $last_entry['last_produk']; ?></h5>
                </div>
                <div class="card-footer text-muted">
                  <a href="../admin/entry-produk.php"><p class="card-text text-white ml-3  text-center ">Lihat Detail<i class="fa fa-angle-double-right ml-2"></i></p></a>
                </div>
              </div>

              <div class="card bg-dark mt-3 ml-4 shadow card-kanan">
                <div class="card-header text-center "><b>Orders</b></div>
                <div class="card-body">
                  <div class="card-body-icon icon">
                    <i class="fa fa-shopping-basket ml-4"></i>
                  </div>
                  <h5 class="display-4"><?php echo $orders['jumlah_pesan']; ?></h5>
                </div>
                <div class="card-footer text-muted">
                  <a href="../admin/order.php"><p class="card-text text-white ml-3  text-center ">Lihat Detail<i class="fa fa-angle-double-right ml-2"></i></p></a>
                </div>
              </div>
            </div>
      </div>
    </div>
    <!--FOOTER-->
    <footer class="container mt-3">
      <p class="text-center">&copy; 2020 Jubeta Bali Group</p>
    </footer>
  </body>
</html>
