<?php
include '../koneksi.php';
require 'function-1.php';

if($_SESSION){
    $username = $_SESSION["username"];
    if($_SESSION["tingkatan_user"] == 'user'){
        header("Location: ../home.php");
    }
}else{
    header("Location: ../login.php");
}
$id_pesan = $_GET['id_pesan'];
$data = query("SELECT us.nama, od.id_pesan, od.tgl_order, od.jam_order, od.quantity, tr.tgl_transaksi, tr.metode_pembayaran,tr.total_harga, tr.status,  tr.bukti_pembayaran 
                FROM user_jubeta LEFT JOIN detail_user us ON id_user = us.id_pembeli
                LEFT JOIN pesan od ON us.id_pembeli = od.id_user LEFT JOIN transaksi tr ON od.id_pesan = tr.id_pesan WHERE tr.id_pesan = '$id_pesan'")[0];

if(isset($_POST['update'])){
    if(updateOrder($_POST) > 0){
        echo "
                <script>
                    alert('data berhasil diubah!');
                    document.location.href = 'order.php';
                </script>
            ";
    }else{
        echo "
                <script>
                    alert('data gagal diubah!');
                    document.location.href = 'order.php';
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
<body class="order">
    <!--Layout-->
    <header>
    <?php include '../assets/layout/header.php' ?>
      </header>
<!--BODY CONTENT-->
    
   <div class="card shadow upod">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col d-flex justify-content-center border-none ">
                <div class="card p-3 shadow text-center w-50 position-absolute"><h3 id="UpOrder">Update Order</h3></div>
            </div>
        </div>
        <div class="container ml-4" id="headOrder">
            <div class="row">
                    <div class="form-group col-md-5 mr-3">
                        <label for="id_pesan">Order ID</label>
                        <input type="text" name="id_pesan" id="id_pesan" class="form-control" readonly value="<?=$data['id_pesan'];?>" />
                    </div>
            
                    <div class="form-group col-md-5 mr-3">
                        <label for="nama">Nama Customer</label>
                        <input type="text" name="nama" id="nama" class="form-control" readonly value="<?=$data['nama'];?>" />
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-5 mr-3">
                        <label for="tgl_order">Tanggal Order</label>
                        <input type="text" name="tgl_order" id="tgl_order" class="form-control" readonly value="<?=$data['tgl_order'];?>" />
                    </div>

                    <div class="form-group col-md-5 mr-3">
                        <label for="jam_order">Jam Order</label>
                        <input type="text" name="jam_order" id="jam_order" class="form-control" readonly value="<?=$data['jam_order'];?>"/>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-3 form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" readonly value="<?=$data['quantity'];?>"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="tgl_transaksi">Tanggal Transaksi</label>
                        <input type="text" name="tgl_transaksi" id="tgl_transaksi" class="form-control" required value="<?=$data['tgl_transaksi'];?>"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="metode_pembayaran">Metode Pembayaran</label>
                        <input type="text" name="metode_pembayaran" id="metode_pembayaran" class="form-control" value="<?=$data['metode_pembayaran'];?>" readonly/>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="total_harga">Total Bayar</label>
                        <input type="text" name="total_harga" id="total_harga" class="form-control" required value="<?=$data['total_harga'];?>"/>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="status">Payment Status</label>
                        <select name="status" id="status" class="custom-select">
                        <?php
                        if ($data['status'] == "sudah bayar"): ?>
                            <option selected value="sudah bayar">sudah bayar</option>
                            <option value="belum bayar">belum bayar</option>
                        <?php else: ?>
                            <option selected value="belum bayar">belum bayar</option>
                            <option value="sudah bayar">sudah bayar</option>
                        <?php endif    ?>                    
                        </select>
                    </div>
                </div>

                

                <div class="row">
                    <div class="col-md-7 form-group">
                    <img src="../foto-transfer/<?php echo $data['bukti_pembayaran'];?>" width="150" alt="bukti bayar">
                    </div>
                </div>
            </div>
            <button class="btn btn-primary w-75" id="updateButton" name="update" type="submit">Update</button>
            <div class="mt-4"></div>
    </form>
</div>
    
    <!--FOOTER-->
    <footer class="container mt-3">
    <p class="text-center">&copy; 2020 Jubeta Bali Group</p>
  </footer> 
</body>
</html>
