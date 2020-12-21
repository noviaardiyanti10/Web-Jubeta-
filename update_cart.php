<?php
include "koneksi.php";

$id_pesan = $_POST["id_pesan"];
$harga_produk = $_POST['harga_produk'];
$quantity = $_POST['quantity'];

var_dump($_POST);
if (isset($_POST['submit'])) {

    $sql = mysqli_query($koneksi, "UPDATE pesan SET quantity = '$quantity', total_harga = $harga_produk * '$quantity' WHERE id_pesan = '$id_pesan'");

    echo "<script>alert('kuantitas berhasil diperbarui') </script>";
    header("location: cart.php");
} else {
	echo "<script>alert('Kuantitas gagal diperbarui') </script>";
}

die();
