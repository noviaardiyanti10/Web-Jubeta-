<?php
require 'function-1.php';
$result = mysqli_query($koneksi,"SELECT us.id_user, us.username, du.nama, du.email, du.alamat, du.no_telp, du.tempat_lahir, du.tgl_lahir, du.jenis_kelamin, du.foto_ktp, du.ktp_selfie FROM user_jubeta us LEFT JOIN detail_user du ON us.id_user = du.id_pembeli WHERE tingkatan_user = 'user';");

if(isset($_POST['cari'])){
  $result = cariUser($_POST["kunci"]);
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
    <title>User List</title>
</head>
<body class="UserBg">

  <!--Layout-->
  <header>
  <?php include '../assets/layout/header.php' ?>
      </header>
<!--Body-->
  <div class="bg-light content-order rounded p-4 mb-5">
        <form action="" method="POST" class="form-inline">
          <h3><i class="fa fa-user d-inline-block align-top mr-2"></i>User List</h3>
          <div class="row">
            <div class="form-group">
              <input class="form-control mr-sm-1 shadow-none" type="text" id="left" name="kunci" placeholder="Search">
              <button class="btn btn-dark" type="search" name="cari"><i class="fa fa-search fa-lg" ></i></button>
            </div>
          </div>
        </form>

       <div class="table table-responsive tableFixHead shadow mt-2">
        <table class="table table-striped table-fixed text-dark">
            <thead>
              <tr>
                <th scope="col">User ID</th>
                <th scope="col">Username</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Alamat</th>
                <th scope="col">Telepon</th>
                <th scope="col">Tempat/Tanggal Lahir</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Foto KTP</th>
                <th scope="col">Foto Bukti</th>
              </tr>
            </thead>
            <tbody>
              <?php
               foreach($result as $user):
              
              ?>
              <tr>
                <td><?php echo $user['id_user']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['nama']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['alamat']; ?></td>
                <td><?php echo $user['no_telp']; ?></td>
                <td><?php echo $user['tempat_lahir'],'/', $user['tgl_lahir']; ?></td>
                <td><?php echo $user['jenis_kelamin']; ?></td>
                <td><img src="../foto-ktp/<?php echo $user['foto_ktp']; ?>" width="130"></td>
                <td><img src="../foto-bukti-ktp/<?php echo $user['ktp_selfie']; ?>" width="130"></td>
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