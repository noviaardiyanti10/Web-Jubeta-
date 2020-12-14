<?php
require 'function-registrasi.php';

if (isset($_POST['submit'])){
    if (registrasi_user($_POST) > 0){
        echo "
                <script>
                    alert('Registrasi berhasil!');
                    document.location.href = 'login.php';
                </script>
            ";
    }else{
        echo "
                <script>
                    alert('Registrasi gagal!');
                    document.location.href = 'registrasi.php';
                </script>
            ";
    }
}
?>

<!DOCTYPE html lang = "en">
<html>
    <head>
        <title>Registrasi</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="assets/style2.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    </head>

    <body class="regis">
        <div class="container">
            <div class="card w-75 registrasi">
                <form action=" " method="POST" enctype="multipart/form-data">
                    <strong><h3 class="text-center p-3 text-white rounded" id="text-header" >Registrasi Jubeta</h3></strong>
                    <hr align="left" color="rgb(0, 0, 0)" style="width: 0px;"/>
                
                    <div class="row">
                        <div class="form-group col-md-5 ml-4">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" placeholder="Masukkan username Anda" class="form-control" required autofocus/>
                        </div>

                        <div class="form-group col-md-5 ml-4">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" placeholder="Masukkan nama Anda" class="form-control" required autofocus/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-5 ml-4">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="Masukkan tanggal lahir Anda" required/>
                        </div>
                        
                        <div class="form-group col-md-5 ml-4">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="Masukkan tempat Anda" required/>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-5 ml-4">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email Anda" required/>
                        </div>

                        <div class="form-group col-md-5 ml-4">
                            <label for="no_telp">Telepon</label>
                            <input type="tel" name="no_telp" id="no_telp"  class="form-control"placeholder="Telepon Anda" required/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-5 ml-4">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamat"  class="form-control"placeholder="Masukkan alamat Anda" required/>
                        </div>

                        <div class="form-group col-md-5 ml-4">
                            <label>Jenis Kelamin</label><br/>
                            <input type="radio" name="jenis_kelamin" value="Laki-laki">Laki-laki&nbsp;&nbsp;
                            <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-5 ml-4">
                            <label for="foto_ktp">Foto KTP</label>
                            <input type="file" id="foto_ktp" name="foto_ktp" class="form-control"/>
                        </div>

                        <div class="form-group col-md-5 ml-4">
                            <label for="ktp_selfie">Foto Diri dengan KTP</label>
                            <input type="file" id="ktp_selfie" name="ktp_selfie" class="form-control"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-5 ml-4">
                            <label for="passwd">Password</label>
                            <input type="password" name="passwd" id="passwd" class="form-control" placeholder="Password" required />
                        </div>
                        <div class="form-group col-md-5 ml-4">
                            <label for="konpass">Konfirmasi Password</label>
                            <input type="password" name="konpass" id="konpass" class="form-control" placeholder="Konfirmasi Password" required />
                        </div>
                    </div>
                
                    <button class="btn text-white" name="submit" type="submit" id="btn-registrasi">Registrasi</button>
                    <p class="text-center">Anda sudah punya akun? <a href="login.html">Login.</a></p>
                </form>
            </div>
        </div>
    </body>
</html>