<?php
require 'function-registrasi.php';
if($_SESSION){
    $username = $_SESSION["username"];
    $nama = $_SESSION["nama"];
    if($_SESSION["tingkatan_user"] == 'admin'){
        header("Location: admin/dasboard-admin.php");
    }
}else{
    header("Location: login.php");
}
$username = $_SESSION["username"];
$result =query("SELECT us.username, du.nama, du.email, du.alamat, du.no_telp, du.tempat_lahir, du.tgl_lahir, du.jenis_kelamin, du.foto_user FROM user_jubeta us LEFT JOIN detail_user du ON us.id_user = du.id_pembeli WHERE username = '$username';")[0];

if (isset($_POST['edit'])) {
    if (edit($_POST) > 0){
        echo "
                <script>
                    alert('data berhasil diubah!');
                    document.location.href = 'home.php';
                </script>
            ";
    }else{
        echo "
                <script>
                    alert('data gagal diubah!');
                    document.location.href = 'profil.php';
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
    <link rel="stylesheet" href="assets/style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <title>Profil Admin</title>
</head>
<body class="admin-bg">

  <!--Layout-->
<header>
    <?php include 'header.php';?>
</header>
<!--Body-->
<div class="container-fluid border-0 profil-admin rounded">
        <div class="row">
            <div class="col-md-3 p-0">
                <div class="card shadow border-0" id="bgprofil">
                    <img src="foto-user/<?php echo $result['foto_user'];?>" alt="foto profil" width="300" class="rounded img-fluid" id="fotouser">
                </div>
            </div>
            <div class="col-md-8 data-admin">
                <h4 class="text-center text-dark p-3 bg-light" >Hello!</h4>
                <div class="container-fluid text-white" >
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5 form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control w-250 border-0 border-bottom-1 shadow-none bg-input" value="<?=  $result['username']; ?> " readonly/>
                            </div>
          
                            <div class="col-md-5 form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control w-250 border-0 border-bottom-1 shadow-none bg-input" value="<?=  $result['nama']; ?> "/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control w-250 border-0 border-bottom-1 shadow-none bg-input" value="<?=  $result['email']; ?> "/>
                            </div>
                       
                            <div class="col-md-5 form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control w-250 border-0 border-bottom-1 shadow-none bg-input" value="<?=  $result['alamat']; ?> "/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 form-group">
                                <label for="no_telp">Nomor Telepon</label>
                                <input type="text" name="no_telp" id="no_telp" class="form-control w-250 border-0 border-bottom-1 shadow-none bg-input" value="<?=  $result['no_telp']; ?> "/>
                            </div>
                       
                            <div class="col-md-5 form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control w-250 border-0 border-bottom-1 shadow-none bg-input" value="<?=  $result['tempat_lahir']; ?> "/>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-5 form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="text" name="tgl_lahir" id="tempat_lahir" class="form-control w-250 border-0 border-bottom-1 shadow-none bg-input" value="<?=  $result['tgl_lahir']; ?> "/>
                            </div>
                        
                        <div class="col-md-5 form-group">
                                <label for="foto_user">Foto Anda</label>
                                <input type="file" name="foto_user" id="foto_user" class="form-control">
                            </div>
                        </div>
                            <button type="submit" name="edit" class="btn btn-secondary btn-padmin w-50">Update</button>
                        </div>
                        
                    </form>
                </div>
                
            </div>
        </div>
</div> 
    <!--FOOTER-->
    <footer class="container-fluid mt-3">
      <p class="text-center">&copy; 2020 Jubeta Bali Group</p>
    </footer> 
</body>
</html>