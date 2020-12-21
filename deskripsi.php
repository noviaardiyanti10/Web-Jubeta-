<?php 
    include "koneksi.php";
    $id_produk = $_GET['id_produk'];

    if(isset($_SESSION['id_user'])) {
       $id = $_SESSION['id_user'];

        $id_user = $id;

        $sql = "SELECT * FROM user_jubeta INNER JOIN detail_user ON user_jubeta.id_user = detail_user.id_pembeli WHERE id_user='$id'";

        $data = mysqli_fetch_assoc(mysqli_query($koneksi, $sql));
    }

    $tgl = date('d-m-y');
    date_default_timezone_set('Asia/Makassar');
    $jam = date('H:i:s');

    $query = "SELECT * FROM produk WHERE id_produk='$id_produk'";

    $simpan = mysqli_fetch_assoc(mysqli_query($koneksi, $query));

    $qtySelect = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT quantity FROM produk WHERE id_produk='$id_produk'"))['quantity'];

    if (isset($_POST['submit'])) {

        $qty = mysqli_real_escape_string($koneksi, $_POST['quantity']);
        $total_hrg = $qty * $simpan['harga_produk'];

        $sql1 = mysqli_query($koneksi, "SELECT * FROM pesan WHERE id_user='$id_user' AND id_produk='$id_produk' AND status='cart'");

        $num_rows = mysqli_num_rows($sql1);

        if($num_rows) {
            $cart =  mysqli_fetch_assoc($sql1);
            $id_pesan = $cart['id_pesan'];

            $query = mysqli_query($koneksi, "UPDATE pesan SET quantity = quantity + '$qty' WHERE id_pesan='$id_pesan'");

            $query = mysqli_query($koneksi, "UPDATE pesan SET total_harga = total_harga + '$total_hrg' WHERE id_pesan = '$id_pesan'");

            echo "<script>alert('Kuantitas berhasil diupdate')</script>";

        } else {

            $query2 = "INSERT INTO pesan (id_user,id_produk,tgl_order,jam_order,quantity,total_harga,status) VALUES ('$id_user','$id_produk','$tgl','$jam','$qty','$total_hrg','cart') ";
            
            if (mysqli_query($koneksi, $query2)) { }

            header("location: cart.php");
            echo "<script>alert('Berhasil ditambah ke dalam keranjang')</script>";
        }
    }

?>

<?php

include "header.php";

?>

    <main id="main">
    <!-- ======= PRICING ======= -->
        <form id="pricing" class="pricing" method="post" action="#">
            <div class="container" id="detil-produk">
                <div class="row">
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">

                                <?php
                                echo "<img src='foto-produk/".$simpan['foto']."' style='width:600px; height:400px;'>";
                                ?>
                        
                            </div>
                        </div>
                    </div>

                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <div class="col-md-8">
                                <div class="card-body"  style="width: 500px">
                                    <?php
                                    echo "<h3> ".$simpan['nama_produk']." </h3>";
                                    echo "<div class='buy-price'>";
                                        echo "<span> Rp.".number_format($simpan['harga_produk'])." </span>";
                                    echo "</div>";
                                    echo "<br> <p> Merk : ".$simpan['merk']."</p>";
                                    echo "<b> Deskripsi </b>";
                                    echo "<p>".$simpan['deskripsi']."</p>";
                                    ?>

                                    <input type="number" name="quantity" id="quantity" value="1" max="<?= $simpan['quantity'] ?>" style="width: 50px"> <?php echo "stok : ".$simpan['quantity'].""?>  <br><br>
                                    <button type="submit" name="submit" value="submit" class="btn btn-secondary btn-lg btn-block">Add to cart</button>
                                    
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