<?php 
	include "koneksi.php";

	if (isset($_SESSION['id_user'])) {

		$id = $_SESSION['id_user'];

		$sql = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_user='$id'");

		$data = [];
		while ($row = mysqli_fetch_assoc($sql)) {
			$data[] = $row;
		}

		if (isset($_POST['submitTransfer'])) {
			echo "<script> alert('if pertama') </script>";

			foreach ($data as $key) :

			$id_user = $key['id_user'];

			$total_harga = $key['total_harga'];

			$id_pesan = $key['id_pesan'];

			$tgl = $key['tgl_transaksi'];

			endforeach;

			$bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];
			if ($bukti_pembayaran != ""){
				$jenis_file = array ('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');
				$h = explode('.', $bukti_pembayaran);
				$type_baru = strtolower(end($h));
				$file_cache = $_FILES['bukti_pembayaran']['tmp_name'];
				$angka_acak = rand(1,999);
				$newfoto= $angka_acak.'-'.$bukti_pembayaran;
			
				if (in_array($type_baru, $jenis_file) === true){
					move_uploaded_file($file_cache,'foto-transfer/'.$newfoto);
					$query = "UPDATE transaksi SET bukti_pembayaran='$newfoto' WHERE id_user='$id_user' AND tgl_transaksi='$tgl' AND status='Belum Bayar' ";
					$result = mysqli_query($koneksi, $query);
					if(!$result){
						die ("Query gagal dijalankan: ".mysqli_errno($koneksi));
					}
				}
				header("location: finish.php");

				if(!$result){
					die ("Query gagal dijalankan: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
					echo "<script> if 4</script>";
				} else {
				//tampil alert dan akan redirect ke halaman index.php
				//silahkan ganti index.php sesuai halaman yang akan dituju
				echo "<script>alert('Data berhasil diubah.');window.location='home.php';</script>";
				}
		} else {     
	   //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
		  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
	  }

	mysqli_commit($koneksi);
	mysqli_close($koneksi);
	die();
}

$i = 1;
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
        <form id="pricing" class="pricing" method="post" action="" enctype="multipart/form-data">
            <div class="container" id="cart">
                <div class="row">
                    <div class="container p-3">

						<div class="row">
							<div style="margin-top: 50px;" class="mx-auto col-sm-8">
								
								<div style="height: 500px" class="shadow mb-3 bg-white rounded data_diri p-3 text-center">
								<h1 class="text-success">Silahkan Upload Bukti Pembayaran</h1>
								<h3 class="text-failed"> BRI a/n GEDE FARRAS </h3>
								<h3 class="text-failed"> No. Rekening 91881818818181818 </h3>
								<h4> Total Pembayaran : <?php echo number_format($_SESSION['harga_semua']) ;?></h4>
								<h6>Terimakasih telah menggunakan jubeta, info selengkapnya silahkan hubungi admin</h6>

								<p> 
								</p>
								<label for="bukti_pembayaran">Upload Foto Bukti Pembayaran</label>
								<input type="file" name="bukti_pembayaran" id="bukti_pembayaran">

								</div>
									<div class="upload_bar">
										<button type="submit" class="btn btn-primary btn-lg btn-block bg-success " name="submitTransfer" id="submitTransfer">Kembali ke halaman utama</button>
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