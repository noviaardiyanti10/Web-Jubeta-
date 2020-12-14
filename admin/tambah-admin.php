<?php
require 'function-1.php';


if (isset($_POST['add'])) {
    if (addAdmin($_POST) > 0){
        echo "
                <script>
                    alert('data berhasil ditambah!');
                    document.location.href = 'daftar-admin.php';
                </script>
            ";
    }else{
        echo "
                <script>
                    alert('data gagal ditambah!');
                    document.location.href = 'tambah-admin.php';
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
<div class="container mt-5">
    <div class="card w-50 shadow rounded bg-white data-update">
        <form action="" method="post" enctype="multipart/form-data">
            <h3 class="text-center p-4  rounded bg-success text-white" >Data Admin</h3>


            <div class= "row">
                <div class="col-md-6 form-group ml-5">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required > 
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group ml-5">
                    <label for="passwd">Password</label>
                    <input type="password" name="passwd" id="passwd" class="form-control" required> 
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group ml-5">
                    <label for="konpasswd">Konfirmasi Password</label>
                    <input type="password" name="konpasswd" id="konpasswd" class="form-control" required> 
                </div>
            </div>

            <button class="btn btn-primary w-40 mb-4" id="ProdukButton" type="submit" name="add">Add</button>
         
        </form>

    </div>
    
</div>
    
    <!--FOOTER-->
    <footer class="container mt-4 mb-4">
    <p class="text-center">&copy; 2020 Jubeta Bali Group</p>
  </footer> 
   
</body>

</html>