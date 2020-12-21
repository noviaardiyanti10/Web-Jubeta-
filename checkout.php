<?php
	 include 'koneksi.php';
	 if($_SESSION){
		$username = $_SESSION["username"];
		$nama = $_SESSION["nama"];
		if (isset($_SESSION['id_user'])) {

			$id = $_SESSION['id_user'];
	
			$sql = "SELECT * FROM user_jubeta INNER JOIN detail_user ON user_jubeta.id_user = detail_user.id_pembeli WHERE id_user='$id'";
	
			$data = mysqli_fetch_assoc(mysqli_query($koneksi, $sql));
		}else if($_SESSION["tingkatan_user"] == 'admin'){
			header("Location: admin/dasboard-admin.php");
	}
}else{
		header("Location: login.php");
	}
	
	
	$sql1 = mysqli_query($koneksi, "SELECT id_produk,nama_produk,deskripsi,id_pesan,id_user,pesan.quantity,total_harga,foto,harga_produk FROM pesan INNER JOIN produk USING(id_produk) WHERE id_user = $id AND pesan.status = 'cart' ");

	$dataBarang = [];
	while ($row = mysqli_fetch_assoc($sql1)) {
		$dataBarang[] = $row;
	}

	if (isset($_POST['submitForm'])) {

		mysqli_begin_transaction($koneksi);
		foreach ($dataBarang as $key) :
			$metode_pembayaran = $_POST['metode_pembayaran'];
			$produk_status = $_POST['produk_status'];
			$id_user = $key['id_user'];
			$id_ker = $key['id_pesan'];
			$id_pro = $key['id_produk'];
			$minusstok = $key['quantity'];
			$total_harga = $key['total_harga'];
			
			$updateker = mysqli_query($koneksi, "UPDATE pesan SET status = 'checkout' WHERE id_pesan='$id_ker' ");

			$query_order = mysqli_query($koneksi, "INSERT INTO transaksi(id_pesan,id_user,tgl_transaksi,metode_pembayaran,status,total_harga,bukti_pembayaran) VALUES ('$id_ker','$id_user',now(),'$metode_pembayaran','lunas','$total_harga','')");

			$updatestok = mysqli_query($koneksi,"UPDATE produk SET quantity = quantity-'$minusstok' WHERE id_produk = '$id_pro' ");

			if ($metode_pembayaran=="Transfer") {
				$updatestatus = mysqli_query($koneksi,"UPDATE transaksi SET status='Belum Bayar' WHERE id_pesan='$id_ker' ");
				header("location: transfer.php");	
			} else {
				header("location: finish.php");
			}

		endforeach;
		mysqli_commit($koneksi);
		mysqli_close($koneksi);
		die();
	}

$i = 1;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>JUBETA</title>

    <link href="assets/img/logo.png" rel="icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Material+Icons:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap-modified.min.css">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- HEADER -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <h1 class="logo mr-auto"><a href="home.php"> JUBETA </a></h1>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="profile.html">Profile</a></li>
                    <li><a href="transfer.php"> <i class="fas fa-cash-register"></i> </a></li>
                    <li><a href="cart.php"> <i class="fa fa-shopping-cart"></i> </a></li>
                    <li class="drop-down"><a href=""> Hello, <?= $data['nama']; ?> </a>
                        <ul>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- END HEADER -->

	<main id="main">
    <!-- ======= PRICING ======= -->
        <form id="checkoutForm" class="pricing" method="post" action="">
            <div class="container" id="cart">
                <div class="row">
                	<div class="col-lg-4 col-md-6">
                		<h2 style="color: #2E86C1;">Checkout</h2>
                		<div class="box" id="checkout">
                			<h4><b> <?= $data['nama']; ?> </b></h4>
							<table class="table table-borderless table-responsive ml-5">
								<tr>
									<td>
										<i class="fas fa-map-marker-alt" style="color: #424949"></i> &nbsp; 
										<?= $data['alamat'] ?>
									</td>
								</tr>
								<tr>
									<td><i class="far fa-envelope" style="color: #424949"></i> &nbsp; 
										<?= $data['email'] ?>
									</td>
								</tr>
								<tr>
									<td><i class="fas fa-phone" style="color: #424949"></i> &nbsp; 
										<?= $data['no_telp'] ?>
									</td>
								</tr>
								<tr>
									<td>
				                        <label for="metodepembayaran" class="d-block">Metode Pembayaran</label>
				                        <div class="custom-control custom-radio custom-control-inline">
				                            <input type="radio" id="customRadioInline1" name="metode_pembayaran" onclick="pembayaran(this.value)" value="Transfer" class="custom-control-input" required>
				                            <label class="custom-control-label" for="customRadioInline1">Transfer</label>
				                        </div>
				                        <div class="custom-control custom-radio custom-control-inline">
				                            <input type="radio" id="customRadioInline2" name="metode_pembayaran" onclick="pembayaran(this.value);" value="COD" class="custom-control-input" required>
				                            <label class="custom-control-label" for="customRadioInline2">COD</label>
				                        </div> <br>
				                        <p class="text-success" id="result"> </p>
									</td>
								</tr>

							</table>
                		</div>
                	</div>

                    <div class="container p-3">

						<h5 class="text-success">Detail Pesanan</h5>
						<?php
						$total_semua =0;

						foreach ($dataBarang as $key) : ?>
							<div class="shadow mb-5 bg-white rounded keranjang p-3" style="min-height: 250px; width: 700px;">
								<div class="mb-3" style="border-bottom: solid 1px grey;">
									<i class="fas fa-shopping-cart text-success"> Pesanan <?= $i ?></i>
								</div>
								<div style="border-bottom: solid 1px grey;">
									<img class="img-thumbnail mr-3" src="foto-produk/<?= $key['foto'] ?>" style="float: left; width: 170px; height: 140px">
									<h5><?= $key['nama_produk'] ?></h5>
									<h5 style="font-size: 14px;"> Jumlah Harga Barang </h5>
									<h4 class="text-success"><b>Rp.<?= number_format($key['harga_produk']) ?></b></h4> <br>
									<h3 class="text-right">Qty : <?= $key['quantity'] ?></h3>
								</div>
								<div style="height: 30px;">
									<h6 class=" text-right text-success float-right ml-1 mt-2"><?= number_format($key['total_harga'])?></h6>
									<h6 class="text-right float-right mt-2">Total Pembayaran  : Rp </h6>
								</div>
							</div>
							<?php $i++;
								$total_semua = $total_semua + $key['total_harga'] ;
								$_SESSION['harga_semua'] = $total_semua;
								endforeach;						
							?>

							<div class="upload_bar">
								<button type="submit" name="submitForm" class="btn btn-primary btn-lg btn-block bg-success " style="width: 700px;">BAYAR (Rp <?= number_format($total_semua) ?>)</button>
							</div>
				    </div>
                </div>
            </div>
        </form><!-- End Pricing Section -->
    </main><!-- End #main -->

<?php
	include "footer.php";
?>

<script type="text/javascript">
	function pembayaran(metode_pembayaran){
		document.getElementById("result").value=metode_pembayaran;

		var rek = document.getElementById("result").value;
		if (rek=="Transfer") {
			alert("Simpan No Rekening Pembayaran");
			document.getElementById("result").innerHTML="Silahkan melakukan Transfer ke BRI a/n MADE VINA no. Rekening 099888838838";
		} else {
			document.getElementById("result").innerHTML="";
		}
	}

</script>