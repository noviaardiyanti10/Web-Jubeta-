<?php
require 'koneksi.php';

if($_SESSION){
    if($_SESSION["tingkatan_user"] == 'admin'){
        header("Location: admin/dasboard-admin.php");
    }else if ($_SESSION['tingkatan_user'] == 'user'){
        header("Location: home.php");
    }
}

if(isset($_POST["submit"])){
	$nama = $_POST["nama"];
    $username = $_POST["username"];
    $password = md5(mysqli_escape_string ($koneksi, $_POST["passwd"]));

    $cek = mysqli_query($koneksi,"SELECT us.id_user, us.username, us.tingkatan_user, us.passwd, du.nama FROM user_jubeta us LEFT JOIN detail_user du ON us.id_user = du.id_pembeli  WHERE username = '$username'" );

    //cek username 
    if (mysqli_num_rows($cek) == 1){
        $row = mysqli_fetch_assoc($cek);

        if($password == $row["passwd"]){
            if($row["tingkatan_user"] == 'admin'){
                $_SESSION['login'] = true;
                $_SESSION['nama'] = $row["nama"];
                $_SESSION['username'] = $row["username"];
                $_SESSION['passwd'] = $row["passwd"];
                $_SESSION['tingkatan_user'] = $row["tingkatan_user"];
                $_SESSION['id_user'] = $row["id_user"];
                header("Location: admin/dasboard-admin.php");

            }else if ($row['tingkatan_user'] == 'user'){
                $_SESSION['login'] = true;
                $_SESSION['nama'] = $row["nama"];
                $_SESSION['username'] = $row["username"];
                $_SESSION['passwd'] = $row["passwd"];
                $_SESSION['tingkatan_user'] = $row["tingkatan_user"];
                $_SESSION['id_user'] = $row["id_user"];
                header("Location: home.php");
            }
        }
    }
    $error = true;
}


?>
<!DOCTYPE html>
<html>
	<head>
		<title> Login </title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	</head>

	<body class="login-body">
		<div class="card-login">
			<div class="content">
			
				<div class="title">
					<h2> LOGIN </h2>
					<div class="underline"> </div>
				</div>

				<form method="post" class="form-login">
					<label for="username" style="padding-top:13px" class="label-login">&nbsp;Username</label>
	  				<input id="username" class="form-content" type="text" name="username" autocomplete="on" required />
	  				<div class="form-border"></div>

	  				<label for="passwd" style="padding-top:22px" class="label-login">&nbsp;Password</label>
	  				<input id="passwd" class="form-content" type="password" name="passwd" required />
	  				<div class="form-border"></div>

	  				<a href="#" class="a-login"><legend id="forgot-pass">Forgot password?</legend></a>
					  <button type="submit" name="submit" class="button-login"> LOGIN </button>
					  <?php if (isset($error)) : ?>
					<p style="color:red; font-style:italic";>Username/Password Salah!</p>
					<?php endif; ?>

	  				<p class="p-login"> Dont Have Account? <a href="register.php" class="a-login"> Sign in here </a> </p>
				</form>
				
			</div>
		</div>

	</body>
</html>