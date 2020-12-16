<?php
include '../koneksi.php';
require 'function-produk.php';

if($_SESSION){
  $username = $_SESSION["username"];
    if($_SESSION["tingkatan_user"] == 'user'){
        header("Location: ../home.php");
    }
}else{
    header("Location: ../login.php");
}
$result = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY kode_produk DESC;");
if(isset($_POST["cari"])){
  $result = cariProduk($_POST["kunci"]);
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
    <title>Produk</title>
</head>
<body class="ProdukBg">
 <!--Layout-->
 <header>
      <?php include '../assets/layout/header.php' ?>
  </header>

  <div class="container ml-5 bg-light content-order p-4">
  
    <form action="" method="POST" class="form-inline">
    <h3><i class="fa fa-motorcycle d-inline-block align-top mr-2"></i>Produk List</h3>
    <a href="entry-produk.php" class="btn btn-success mr-4" id="addProd"><i class="fa fa-plus"></i></a>
    <div class="row">
      <div class="form-group">
        <input type="text" name="kunci" class="form-control mr-2">
        <button type="search" class="btn btn-info" name="cari">Search</button>
      </div>
    </div>
    </form>
    <div class="table table-responsive tableFixHead shadow mt-2">        
      <table class="table table-fixed">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Merk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Other</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;

          foreach($result as $row):
          ?>
            <tr>
              <td><?php echo $no++;?></td>
              <td><?php echo $row['kode_produk'];?></td>
              <td><?php echo $row['nama_produk'];?></td>
              <td><?php echo $row['merk'];?></td>
              <td><?php echo $row['harga_produk'];?></td>
              <td><?php echo $row['stok'];?></td>
              <td><?php echo $row['deskripsi'];?></td>
              <td><img src="../foto-produk/<?php echo $row['foto'];?>" width="130"></td>
                
              <td><button class="btn btn-dark" type="submit" name="hapus"><a href="hapus-produk.php?id_produk=<?= $row["id_produk"]; ?>" class="text-white"><i class="fa fa-trash fa-md"></i></button>
                  <button class="btn btn-dark" type="submit"><a href="update-produk.php?id_produk=<?= $row["id_produk"]; ?>" class="text-white"><i class="fa fa-edit fa-md"></i></a></button>
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
