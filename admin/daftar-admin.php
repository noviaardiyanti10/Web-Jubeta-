<?php
require 'function-1.php';
$result = mysqli_query($koneksi, "SELECT * FROM user_jubeta WHERE tingkatan_user = 'admin'");
if(isset($_POST["cari"])){
  $result = cariAdmin($_POST["kunci"]);
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
    <title>Profil Admin</title>
</head>
<body class="admin-bg">

  <!--Layout-->
<header>
<?php include '../assets/layout/header.php' ?>
</header>
<!--Body-->
<div class="container ml-5 bg-light content-order p-4">
<form action="" method="POST" class="form-inline">
    <h3><i class="fa fa-user d-inline-block align-top mr-2"></i>Admin List</h3>
    <a href="tambah-admin.php" class="btn btn-success mr-4" id="addProd"><i class="fa fa-plus"></i></a>
    <div class="row">
      <div class="form-group">
        <input type="text" name="kunci" class="form-control mr-2">
        <button type="search" class="btn btn-info" name="cari">Search</button>
      </div>
    </div>
    </form>
    <div class="table table-responsive tableFixHead shadow mt-2 ml-1">        
      <table class="table table-fixed">
        <thead>
          <tr>
            <th>ID Admin</th>
            <th>Username Admin</th>
            <th>Password</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
         
          <?php

          foreach($result as $row):
          ?>
           <tr>
              <td><?php echo $row['id_user'];?></td>
              <td><?php echo $row['username'];?></td>
              <td><?php echo md5($row['passwd']);?></td>
                  
            <td><button class="btn btn-dark" type="submit"><a href="hapus-admin.php?id_user=<?= $row["id_user"]; ?>" class="text-white"><i class="fa fa-trash fa-md"></i></button>
                  <button class="btn btn-dark" type="submit"><a href="update-admin.php?id_user=<?= $row["id_user"]; ?>" class="text-white"><i class="fa fa-edit fa-md"></i></a></button>
              </td>
           </tr>

            <?php 
          endforeach
          ?>

        </tbody>
      </table>
    </div>
  </div>
</div>
    <!--FOOTER-->
    <footer class="container-fluid mt-3">
      <p class="text-center">&copy; 2020 Jubeta Bali Group</p>
    </footer> 
</body>
</html>