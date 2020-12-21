<?php
include 'koneksi.php';
if($_SESSION){
    $nama = $_SESSION["nama"];
    $id_user = $_SESSION['id_user'];

    $sql = mysqli_query($koneksi, "SELECT * FROM user_jubeta WHERE id_user = '$id_user' ");
    $data = mysqli_fetch_assoc($sql);

    if($_SESSION["tingkatan_user"] == 'admin'){
        header("Location: admin/dasboard-admin.php");
    }
}

$result = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id_produk DESC");

?>

<?php
    include "header.php";
?>

  <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9 text-center">
                    <h1> J U B E T A </h1>
                    <h2>Buy now your favorite motorcycle</h2> <br>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    <main id="main">
    <!-- ======= PRICING ======= -->
        <form id="pricing" class="pricing" method="post" action="#">
            <div class="container">
                <div class="row">

                <?php
                    while($user_data = mysqli_fetch_array($result)) {
                ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="box">
                            <?php
                            echo "<a href='deskripsi.php?id_produk=$user_data[id_produk]'><img src='foto-produk/".$user_data['foto']."' style='width:300px; height:200px;'></a>";
                            echo "<h3> <a href='deskripsi.php?id_produk=$user_data[id_produk]'>".$user_data['nama_produk']."</a> </h3>";
                            echo "<div class='buy-price'>";
                                echo "<span> Rp. ".number_format($user_data['harga_produk'])." </span>";
                            echo "</div>";
                            echo "<ul>";
                                echo "<li> </li>";
                                echo "<li>";
                                    echo "<span> ".$user_data['merk']." </span>";
                                echo "</li>";
                            echo "</ul>";

                           ?>

                            <div class="btn-wrap">
                                <?php
                                echo "<a href='deskripsi.php?id_produk=$user_data[id_produk]' class='btn-buy'> Detil </a>";
                                ?>
                            </div>                      
                        </div> 
                    </div>
                <?php
                     }
                ?>

                </div>
            </div>
        </form><!-- End Pricing Section -->
    </main><!-- End #main -->

<?php
    include "footer.php";
?>
