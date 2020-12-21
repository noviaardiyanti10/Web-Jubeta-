<?php 
    include "koneksi.php";

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

    $sql1 = mysqli_query($koneksi, "SELECT id_produk,nama_produk,deskripsi,id_pesan,id_user,pesan.quantity as quantity, total_harga, foto, harga_produk FROM pesan INNER JOIN produk USING(id_produk) WHERE id_user='$id' AND pesan.status = 'cart'");

    $dataBarang = [];
	while ($row = mysqli_fetch_assoc($sql1)) {
		$dataBarang[] = $row;
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

				        <h2><b> keranjang Saya </b></h2>
				        <div class="row mt-3">
				            <div class="col-sm-8">
				                <div class="shadow bg-white rounded px-3 py-1">
				                    <?php $item = 0;
				                    $total_harga = 0;
				                    foreach ($dataBarang as $key) : ?>
				                        <div class="mb-3 mt-3">
				                            <div class="row">
				                                <div class="col-sm-2">
				                                	<?php
					                                echo "<img src='foto-produk/".$key['foto']."' class='img-thumbnail mr-3' alt='' style='height: 100px; object-fit: cover;'>";
					                                ?>

				                                </div>
				                                <div class="col-sm-7">
				                                    <h5><?= $key['nama_produk'] ?></h5>
				                                    <p><?= $key['deskripsi'] ?></p>
				                                    <h5 style="font-family: helvetica;"><b>Rp. <?php echo number_format($key['total_harga']); $total_harga += $key['total_harga']; ?> </b></h5>
				                                </div>
				                                <div class="col-sm-3">
				                                    <form action="update_cart.php" method="POST">
				                                        <input type="hidden" name="harga_produk" value="<?= $key['harga_produk'] ?>">
				                                        <input type="hidden" name="id_pesan" value="<?= $key["id_pesan"] ?>">
				                                        <div class="clearfix">
				                                            <label for="qty" class="float-left">Qty :</label>
				                                            <input type="number" name="quantity" class="border-0 ml-2 w-25" value="<?php echo $key['quantity'];
				                                                                                                                    $item += $key['quantity']; ?>">
				                                            <button class="border-0 bg-transparent left" type="submit" name="submit"><i class="fas fa-save text-primary"></i></button>
				                                        </div>
				                                        <a href="delete_cart.php?id=<?= $key["id_pesan"]; ?>"><i class="fas fa-trash text-danger d-block mb-2"></i></a>
				                                    </form>
				                                </div>
				                            </div>
				                            <div style="border-bottom: 1px solid #eaeaea;"></div>
				                        </div>
				                    <?php endforeach ?>
				                </div>
				            </div>
				            <div class="col-sm-4">
				                <div class="shadow mb-3 bg-white rounded p-3">
				                    <h5>Rincian Pesanan</h5>
				                    <hr>
				                    <h6 class="float-left">Total Item </h6>
				                    <h4 class="text-right text-success"><?= $item ?></h4>
				                    <h6 class="float-left">Total Harga</h6>
				                    <h4 class="text-right" style="font-family: helvetica;"> <b> Rp. <?= number_format($total_harga) ?> </b> </h4>
				                    <!-- <div class="btn d-block">
				                            <h6 class="text-center text-success">Favorite Saya</h6>
				                        </div> -->
				                    <div class="mx-auto w-100">
				                        <a href="checkout.php" class="btn btn-primary mt-3 w-100">Bayar Sekarang</a>
				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>

                </div>
            </div>

        </form><!-- End Pricing Section -->
    </main><!-- End #main -->

<?php

include "footer.php";

?>
