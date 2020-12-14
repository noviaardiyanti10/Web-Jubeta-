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
function cariOrder($kunci){
    $query = "SELECT us.nama, od.id_pesan, od.tgl_order, od.jam_order, od.jml_order, tr.tgl_transaksi, tr.metode_pembayaran, tr.harga_antar, tr.total_harga, tr.status, tr.produk_status, tr.bukti_pembayaran 
                FROM user_jubeta LEFT JOIN detail_user us ON id_user = us.id_pembeli
                LEFT JOIN pesan od ON us.id_pembeli = od.id_user LEFT JOIN transaksi tr ON od.id_pesan = tr.id_pesan WHERE us.nama LIKE '%$kunci' OR od.id_pesan LIKE '%$kunci' OR od.tgl_order LIKE '%$kunci' OR od.jam_order LIKE '%$kunci' OR od.jml_order LIKE '%$kunci' OR  tr.tgl_transaksi LIKE '%$kunci' OR tr.metode_pembayaran LIKE '%$kunci' OR tr.harga_antar LIKE '%$kunci' OR tr.total_harga LIKE '%$kunci' OR tr.status LIKE '%$kunci' OR tr.produk_status LIKE '%$kunci'";
    return query($query);
}
function updateOrder($UpdateOrder){
    global $koneksi;
    $id_pesan = htmlspecialchars($UpdateOrder['id_pesan']);
    $tgl_transaksi = htmlspecialchars($UpdateOrder['tgl_transaksi']);
    $metode_pembayaran = htmlspecialchars($UpdateOrder['metode_pembayaran']);
    $status = htmlspecialchars($UpdateOrder['status']);
    $produk_status = htmlspecialchars($UpdateOrder['produk_status']);
    $query = "UPDATE transaksi SET tgl_transaksi = '$tgl_transaksi', metode_pembayaran = '$metode_pembayaran', status = '$status', produk_status = '$produk_status' WHERE id_pesan = '$id_pesan'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
    }else{
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'order.php';
            </script>
            ";
    }
    
}

function editAdmin($admin){
    global $koneksi;
    $id_user = htmlspecialchars ($admin['id_user']);
    $username = htmlspecialchars($admin['username']);
    $passwd = mysqli_escape_string($koneksi, $admin['passwd']);
    $query = "UPDATE user_jubeta SET username = '$username', passwd = '$passwd' WHERE id_user = '$id_user'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
    }else{
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'daftar-admin.php';
            </script>
            ";
    }
    
}

function addAdmin($data){
    global $koneksi;
    $username = htmlspecialchars($data['username']);
    $passwd = md5(mysqli_escape_string($koneksi, $data['passwd']));
    $konpasswd = md5(mysqli_escape_string($koneksi, $data['konpasswd']));
    $result = mysqli_query($koneksi, "SELECT username FROM user_jubeta WHERE username = '$username' ");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
              alert ('username sudah terdaftar!');
              </script>";
              return false;
    }
    //cek konfirmasi password
    if($passwd !== $konpasswd){
        echo "<script>
          alert('Konfirmasi password tidak sesuai');
          </script>";
          return false;
    }


    $query = "INSERT INTO user_jubeta (username, passwd, tingkatan_user) VALUES ('$username', '$passwd', 'admin')";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
            " - ".mysqli_error($koneksi));
    }else{
        echo "
            <script>
                alert('data berhasil ditambah!');
                document.location.href = 'daftar-admin.php';
            </script>
            ";
    }
}

function hapusAdmin($id_user){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM user_jubeta WHERE id_user = '$id_user'");
    return mysqli_affected_rows($koneksi);
}

function cariAdmin($kunci){
    $query = "SELECT id_user, username, passwd FROM user_jubeta WHERE id_user LIKE '%$kunci%' OR username LIKE '%$kunci%'";
    return query($query);
}

function cariUser($kunci){
    $query = "SELECT us.id_user, us.username, du.nama, du.email, du.alamat, du.no_telp, du.tempat_lahir, du.tgl_lahir, du.jenis_kelamin, du.foto_ktp, du.ktp_selfie FROM user_jubeta us LEFT JOIN detail_user du ON us.id_user = du.id_pembeli WHERE us.id_user LIKE '%$kunci%' OR us.username LIKE '%$kunci%' OR du.nama LIKE '%$kunci%' OR du.email LIKE '%$kunci%' OR du.alamat LIKE '%$kunci%' OR du.no_telp LIKE '%$kunci%' OR du.tempat_lahir LIKE '%$kunci%' OR du.tgl_lahir LIKE '%$kunci%' OR du.jenis_kelamin LIKE '%$kunci%' OR du.foto_ktp LIKE '%$kunci%' OR du.ktp_selfie LIKE '%$kunci%'";
    return query($query);
}

?>