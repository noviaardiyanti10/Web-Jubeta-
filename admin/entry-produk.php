<?php 
require 'function-produk.php';

if (isset($_POST['entry'])) {
    if (tambahProduk($_POST) > 0){
        echo "
                <script>
                    alert('data berhasil ditambah!');
                    document.location.href = 'produk-list.php';
                </script>
            ";
    }else{
        echo "
                <script>
                    alert('data gagal ditambah!');
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <title>Entry Produk</title>
</head>
<body class="EntryBg">
    <header>
    <?php include '../assets/layout/header.php' ?>
      </header>
      <!--BODY CONTENT-->
      <div class="container" id="headProduk">
          <div class="card w-75 justify-content-center shadow cardProduk rounded">
              <form action=" " method="post"  enctype="multipart/form-data">
                  <h2 class="text-center p-3 rounded" id="EntryHead">Entry Produk</h2>
                  <div class= "row">
                      <div class="col-md-5 form-group ml-5">
                          <label for="kode_produk">Kode Produk</label>
                          <input type="text" name="kode_produk" id="kode_produk" class="form-control" required>
                      </div>
                  </div>

                  <div class= "row">
                      <div class="col-md-5 form-group ml-5">
                          <label for="namaProduk">Nama Produk</label>
                          <input type="text" name="namaProduk" id="namaProduk" class="form-control" required>
                      </div>
                  </div>
      
                  <div class="row">
                      <div class="col-md-4 form-group ml-5">
                          <label for="merk">Merk Produk</label>
                          <input type="text" name="merk" id="merk" class="form-control" required>
                      </div>
                  </div>
                  
                  <div class= "row">
                      <div class="col-md-5 form-group ml-5">
                          <label for="hargaProduk">Harga</label>
                          <input type="number" name="hargaProduk" id="hargaProduk" class="form-control" required>
                      </div>
                  </div>
      
                  <div class= "row">
                      <div class="col-md-5 form-group ml-5">
                          <label for="stokProduk">Stok Produk</label>
                          <input type="number" name="stokProduk" id="stokProduk" class="form-control" required>
                      </div>
                  </div>
                    <div>
                      <div class="form-group ml-4 col-md-6">
                          <label>Foto Produk</label>
                          <input type="file" name="foto" class="form-control">
                      </div>
                  </div>

                  <div class="form-group ml-4 col-md-4">
                    <label for="deskripsi">Deskripsi</label><br/>
                    <textarea id="deskripsi" name="deskripsi" row="4" cols="40" placeholder="Keterangan.."></textarea>
                </div>
      
                  <button class="btn btn-primary w-70" id="ProdukButton" name="entry" type="submit">Entry</button>
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