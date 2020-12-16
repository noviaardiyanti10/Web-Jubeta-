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
$id_produk = $_GET['id_produk'];
$data = query("SELECT * FROM produk WHERE id_produk = '$id_produk'")[0];

if (isset($_POST['update'])) {
    if (editProduk($_POST) > 0){
        echo "
                <script>
                    alert('data berhasil diubah!');
                    document.location.href = 'produk-list.php';
                </script>
            ";
    }else{
        echo "
                <script>
                    alert('data gagal diubah!');
                    document.location.href = 'produk-list.php';
                </script>
            ";
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <title>Update Order</title>
</head>
<body class="UpdateProd">
    <!--Layout-->
    <header>
    <?php include '../assets/layout/header.php' ?>
      </header>
<!--BODY CONTENT-->
<div class="container" id="headProduk">
    <div class="card w-75 justify-content-center shadow cardProduk rounded">
        <form action="" method="post" enctype="multipart/form-data">
            <h3 class="text-center p-4  rounded" id="h3Update">Update Produk</h3>
            <input type="hidden" name="id_produk" class="form_control" required value="<?=$data['id_produk'];?>">
            <div class= "row">
                <div class="col-md-4 form-group ml-5 mt-4">
                    <label for="kode_produk">Kode Produk</label>
                    <input type="text" name="kode_produk" id="kode_produk" class="form-control" required value="<?=$data['kode_produk'];?>">
                </div>
            </div>

            <div class= "row">
                <div class="col-md-5 form-group ml-5">
                    <label for="namaProduk">Nama Produk</label>
                    <input type="text" name="namaProduk" id="namaProduk" class="form-control" required value="<?=$data['nama_produk'];?>"> 
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 form-group ml-5">
                    <label for="merk">Merk Produk</label>
                    <input type="text" name="merk" id="merk" class="form-control" required value="<?=$data['merk'];?>"> 
                </div>
            </div>
            
            <div class= "row">
                <div class="col-md-5 form-group ml-5">
                    <label for="hargaProduk">Harga</label>
                    <input type="number" name="hargaProduk" id="hargaProduk" class="form-control" required value="<?=$data['harga_produk'];?>">
                </div>
            </div>
            <div class= "row">
                <div class="col-md-5 form-group ml-5">
                    <label for="stokProduk">StokProduk</label>
                    <input type="number" name="stokProduk" id="stokProduk" class="form-control" required value="<?=$data['stok'];?>">
                </div>
            </div>
            <div class= "row">
                <div class="col-md-5 form-group ml-5">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" row="4" cols="40"><?php echo $data['deskripsi']; ?></textarea>
                </div>
            </div>
            <div>
                <div class=" col-md-4 form-group ml-5">
                    <img src="../foto-produk/<?php echo $data['foto'];?>" width="100">
                    <input type="file" name="foto" id="foto" class="form-control">
                    <br><i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
                </div>
            </div>

            <button class="btn btn-primary w-40" id="ProdukButton" type="submit" name="update">Update</button>
            <div class="mt-4"></div>
        </form>

    </div>
</div>
    
    <!--FOOTER-->
    <footer class="container mt-3">
    <p class="text-center">&copy; 2020 Jubeta Bali Group</p>
  </footer> 
</body>
</html>