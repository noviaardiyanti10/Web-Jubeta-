<?php
include '../koneksi.php';
if($_SESSION){
  $username = $_SESSION["username"];
    if($_SESSION["tingkatan_user"] == 'user'){
        header("Location: ../home.php");
    }
}else{
    header("Location: ../login.php");
}
require 'function-1.php';
$result= mysqli_query($koneksi, "SELECT us.nama, od.id_pesan, od.tgl_order, od.jam_order, od.jml_order, tr.tgl_transaksi, tr.metode_pembayaran, tr.harga_antar, tr.total_harga, tr.status, tr.produk_status, tr.bukti_pembayaran 
                        FROM user_jubeta LEFT JOIN detail_user us ON id_user = us.id_pembeli
                        LEFT JOIN pesan od ON us.id_pembeli = od.id_user LEFT JOIN transaksi tr ON od.id_pesan = tr.id_pesan WHERE tingkatan_user = 'user'");
if(isset($_POST["cari"])){
  $result = cariOrder($_POST["kunci"]);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <title>Orders</title>
</head>
<body>

  <!--Layout-->
  <header>
  <?php include '../assets/layout/header.php' ?>
      </header>
<!--Body-->
  <div class="content-order p-3 shadow"  id="OrderBg">
        <form action="" method="POST" class="form-inline text-white">
          <h3><i class="fa fa-shopping-basket d-inline-block align-top mr-2"></i>Order List</h3>
          <div class="row">
            <div class="form-group">
              <input class="form-control mr-sm-1 shadow-none" type="text" id="left" name="kunci" placeholder="Search">
              <button class="btn btn-dark" type="search" name="cari"><i class="fa fa-search fa-lg" ></i></button>
            </div>
          </div>
          
        </form>
       <div class="card">
        <table class="table table-striped table-fixed tableFixHead">
            <thead>
              <tr>
              <th scope="col">Customer</th>
                <th scope="col">Order ID</th>
                <th scope="col">Created</th>
                <th scope="col">Jam Order</th>
                <th scope="col">Item</th>
                <th scope="col">Tanggal Transaksi</th>
                <th scope="col">Metode Transaksi</th>
                <th scope="col">Harga Antar</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
                <th scope="col">Delivery Status</th>
                <th scope="col">Bukti Transaksi</th>
                <th scope="col">Other</th>
              </tr>
            </thead>
            
            <tbody>
            <?php
          
             foreach($result as $order):
            ?>
              <tr>
                <td><?php echo $order['nama'];?></td>
                <td><?php echo $order['id_pesan'];?></td>
                <td><?php echo $order['tgl_order'];?></td>
                <td><?php echo $order['jam_order'];?></td>
                <td><?php echo $order['jml_order'];?></td>
                <td><?php echo $order['tgl_transaksi'];?></td>
                <td><?php echo $order['metode_pembayaran'];?></td>
                <td><?php echo $order['harga_antar'];?></td>
                <td><?php echo $order['total_harga'];?></td>
                <td><?php echo $order['status'];?></td>
                <td><?php echo $order['produk_status'];?></td>
                <td><?php echo $order['bukti_pembayaran'];?></td>
              <td>
                <button class="btn btn-light" type="submit"><a href="update-order.php?id_pesan=<?= $order["id_pesan"]; ?>" class="text-dark"><i class="fa fa-edit fa-md"></i></a></button>
              </td>
              </tr>
              <?php 
              endforeach
              ?>
    
            </tbody>
          </table>
        </div>
    </div>  
    <!--FOOTER-->
    <footer class="container mt-3">
      <p class="text-center">&copy; 2020 Jubeta Bali Group</p>
    </footer> 
</body>
</html>