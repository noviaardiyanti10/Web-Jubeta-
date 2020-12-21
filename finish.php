<?php 
	include "koneksi.php";
	if (isset($_SESSION['id_user'])) {

		$id = $_SESSION['id_user'];

		$sql = "SELECT * FROM transaksi WHERE id_user='$id' AND status='Belum Bayar'";
		$data = mysqli_fetch_assoc(mysqli_query($koneksi, $sql));

	} else {
		echo "<script>alert('Silahkan Login Terlebih dahulu'); </script>";
		header("location: login.php");
	}
?>

<?php 
	include "header.php";
?>

    <main id="main">
    <!-- ======= PRICING ======= -->
        <form id="pricing" class="pricing" method="post" action="update_cart.php">
            <div class="container" id="cart">
                <div class="row">
                    <div class="container p-3">

						<div class="row">
							<div style="margin-top: 100px" class="mx-auto col-sm-8">
								
								<div style="height: 200px" class="shadow mb-3 bg-white rounded data_diri p-3 text-center">
								<h2 class="text-success">Barang anda sedang di proses!</h2>
								<h6>Terimakasih telah menggunakan jubeta, info selengkapnya silahkan hubungi admin</h6>
								</div>
								<a href="home.php">
									<div class="upload_bar">
										<button type="button" class="btn btn-primary btn-lg btn-block bg-success ">Kembali ke halaman utama</button>
									</div>
								</a>
							</div>
						</div>
                </div>
            </div>

        </form><!-- End Pricing Section -->
    </main><!-- End #main -->

<?php 
	include "footer.php";
?>