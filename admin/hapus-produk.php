<?php 
require 'function-produk.php';
$id_produk = $_GET["id_produk"];

if(hapusProduk($id_produk) > 0){
    echo "
            <script>
            alert('data telah terhapus!');
            document.location.href = 'produk-list.php';
            </script>
            ";
}else{
    echo "
            <script>
            alert('data gagal terhapus!');
            document.location.href = 'produk-list.php';
            </script>
            ";
}
?>