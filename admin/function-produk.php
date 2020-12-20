<?php
include '../koneksi.php';

function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows [] = $row;
    }
    return $rows;
}

function tambahProduk(){
    global $koneksi;
    //$kode_produk = htmlspecialchars($_POST['kode_produk']);
    $nama_produk = htmlspecialchars($_POST['namaProduk']);
    $merk = htmlspecialchars($_POST['merk']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $harga_produk = htmlspecialchars($_POST['hargaProduk']);
    $stok = htmlspecialchars($_POST['stokProduk']);
    $foto = $_FILES['foto']['name'];
    if ($foto != ""){
        $ekstensi = array ('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');
        $x = explode('.', $foto);
        $ekstensi_new = strtolower(end($x));
        $file_tmp = $_FILES['foto']['tmp_name'];
        $angka_acak = rand(1,999);
        $newfoto = $angka_acak.'-'.$foto;
        if (in_array($ekstensi_new, $ekstensi) === true){
            move_uploaded_file($file_tmp,'../foto-produk/'.$newfoto);
            $query = "INSERT INTO produk (nama_produk, harga_produk, quantity, merk, deskripsi, foto) VALUES ( '$nama_produk', '$harga_produk', '$stok', '$merk', '$deskripsi', '$newfoto')";
            $result = mysqli_query($koneksi, $query);
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                    " - ".mysqli_error($koneksi));
            }else{
                echo "
                    <script>
                        alert('data berhasil ditambah!');
                        document.location.href = 'produk-list.php';
                    </script>
                    ";
            }

        }else{
            $query = "INSERT INTO produk ( nama_produk, harga_produk, quantity, merk, deskripsi, foto) VALUES ( '$nama_produk', '$harga_produk', '$stok', '$merk', '$deskripsi', '$foto')";
            $result = mysqli_query($koneksi, $query);
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                    " - ".mysqli_error($koneksi));
            }else{
                echo "
                    <script>
                        alert('data berhasil ditambah!');
                        window.location = 'produk-list.php';
                    </script>
                    ";
            }

        }
    }else{
        $query = "INSERT INTO produk ( nama_produk, harga_produk, quantity, merk, deskripsi, foto) VALUES ( '$nama_produk', '$harga_produk', '$stok', '$merk', '$deskripsi', '$foto')";
        $result = mysqli_query($koneksi, $query);
        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                " - ".mysqli_error($koneksi));
        }else{
            echo "
                <script>
                    alert('data berhasil ditambah!');
                    window.location = 'produk-list.php';
                </script>
                ";
        }
    }
}
function cariProduk($kunci){
    $query = "SELECT  nama_produk, merk, harga_produk, quantity, deskripsi, foto FROM produk WHERE nama_produk LIKE '%$kunci%' OR merk LIKE '%$kunci%' OR harga_produk LIKE '%$kunci%' OR stok LIKE '%$kunci%' OR deskripsi LIKE '%$kunci%' OR foto LIKE '%$kunci%'";
    return query($query);
}

function editProduk ($upProduk){
    global $koneksi;
    $id_produk = htmlspecialchars($upProduk['id_produk']);
    //$kode_produk = htmlspecialchars($upProduk['kode_produk']);
    $nama_produk = htmlspecialchars($upProduk['namaProduk']);
    $merk = htmlspecialchars($upProduk['merk']);
    $deskripsi = htmlspecialchars($upProduk['deskripsi']);
    $harga_produk = htmlspecialchars($upProduk['hargaProduk']);
    $stok = htmlspecialchars($upProduk['stokProduk']);
    $foto = $_FILES['foto']['name'];
    if ($foto != ""){
        $ekstensi = array ('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');
        $x = explode('.', $foto);
        $ekstensi_new = strtolower(end($x));
        $file_tmp = $_FILES['foto']['tmp_name'];
        $angka_acak = rand(1,999);
        $newfoto = $angka_acak.'-'.$foto;
        if (in_array($ekstensi_new, $ekstensi) === true){
            move_uploaded_file($file_tmp,'../foto-produk/'.$newfoto);
            $query = "UPDATE produk SET  nama_produk = '$nama_produk', harga_produk = '$harga_produk', quantity = '$stok', merk = '$merk', deskripsi = '$deskripsi', foto = '$newfoto' WHERE id_produk = '$id_produk'";
            $result = mysqli_query($koneksi, $query);
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                    " - ".mysqli_error($koneksi));
            }else{
                echo "
                    <script>
                        alert('data berhasil diubah!');
                        document.location.href = 'produk-list.php';
                    </script>
                    ";
            }
        }else{
            $query = "UPDATE produk SET  nama_produk = '$nama_produk', harga_produk = '$harga_produk',quantity = '$stok', merk = '$merk', deskripsi = '$deskripsi', foto = '$newfoto' WHERE id_produk = '$id_produk'";
            $result = mysqli_query($koneksi, $query);
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                    " - ".mysqli_error($koneksi));
            }else{
                echo "
                    <script>
                        alert('data berhasil diubah!');
                        document.location.href = 'produk-list.php';
                    </script>
                    ";
            }
            
        }
    }else{
        $query = "UPDATE produk SET  nama_produk = '$nama_produk', harga_produk = '$harga_produk', quantity = '$stok', merk = '$merk', deskripsi = '$deskripsi' WHERE id_produk = '$id_produk'";
        $result = mysqli_query($koneksi, $query);
        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                " - ".mysqli_error($koneksi));
        }else{
            echo "
                <script>
                    alert('data berhasil diubah!');
                    document.location.href = 'produk-list.php';
                </script>
                ";
        }
        
    }


}

function hapusProduk($id_produk){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk = '$id_produk'");
    return mysqli_affected_rows($koneksi);
}
?>