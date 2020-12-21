<?php
	include "koneksi.php";
	$id_pesan = $_GET['id'];
	$sql = mysqli_query($koneksi, "DELETE FROM pesan WHERE id_pesan = '$id_pesan'");

	header("location: cart.php");
	echo "<script>alert('Berhasil dihapus dari cart')</script>";
	die();

?>