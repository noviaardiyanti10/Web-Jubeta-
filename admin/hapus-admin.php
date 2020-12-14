<?php
require 'function-1.php';
$id_user = $_GET["id_user"];

if(hapusAdmin($id_user) > 0){
    echo "
            <script>
            alert('data telah terhapus!');
            document.location.href = 'daftar-admin.php';
            </script>
            ";
}else{
    echo "
            <script>
            alert('data gagal terhapus!');
            document.location.href = 'daftar-admin.php';
            </script>
            ";
}


?>