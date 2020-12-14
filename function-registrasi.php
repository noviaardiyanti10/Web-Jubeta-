<?php

include 'koneksi.php';

function registrasi_user($data){
    global $koneksi;
    $nama= htmlspecialchars( $data['nama']);
    $lahir_tmp = htmlspecialchars ($data['tempat_lahir']);
    $tgl_lahir = htmlspecialchars ($data['tgl_lahir']);
    $email= htmlspecialchars ($data['email']);
    $alamat = htmlspecialchars ($data['alamat']);
    $jenis_kelamin = htmlspecialchars ($data['jenis_kelamin']);
    $username = htmlspecialchars ($data['username']);
    $no_telp = htmlspecialchars ($data['no_telp']);
    $ktp_selfie = $_FILES['ktp_selfie']['name'];
    $foto_ktp = $_FILES['foto_ktp']['name'];
    $passwd = mysqli_real_escape_string ($koneksi, $data['passwd']);
    $konpass = mysqli_real_escape_string ($koneksi, $data['konpass']);
    $cek = mysqli_query($koneksi, "SELECT username FROM user_jubeta WHERE username = '$username' ");
    if(mysqli_fetch_assoc($cek)){
        echo "<script>
              alert ('email sudah terdaftar!');
              </script>";
              return false;
    }
    //cek konfirmasi password
    if($passwd !== $konpass){
        echo "<script>
          alert('Konfirmasi password tidak sesuai');
          </script>";
          return false;
    }

    if ($ktp_selfie != ""){
        $jenis_file = array ('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');
        $h = explode('.', $ktp_selfie);
        $type_baru = strtolower(end($h));
        $file_cache = $_FILES['ktp_selfie']['tmp_name'];
        $angka_acak = rand(1,999);
        $new_ktp_selfi= $angka_acak.'-'.$ktp_selfie;
        if (in_array($type_baru, $jenis_file) === true){
            move_uploaded_file($file_cache,'foto-bukti-ktp/'.$new_ktp_selfi);
            $query = "CALL insert_user ('$username', '$passwd', 'user', '$nama', '$email', $alamat', '$no_telp', '$jenis_kelamin', '$lahir_tmp', '$tgl_lahir','$new_ktp_selfi, '$foto_ktp')";
            $result = mysqli_query($koneksi, $query);
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($koneksi));
            }
        }else{
            $query = "CALL insert_user ('$username', '$passwd', 'user', '$nama', '$email', $alamat', '$no_telp', '$jenis_kelamin', '$lahir_tmp', '$tgl_lahir','$new_ktp_selfi, '$foto_ktp')";
            $result = mysqli_query($koneksi, $query);
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                    " - ".mysqli_error($koneksi));
            }
        }
    }else{
        $query = "CALL insert_user ('$username', '$passwd', 'user', '$nama', '$email', $alamat', '$no_telp', '$jenis_kelamin', '$lahir_tmp', '$tgl_lahir','$ktp_selfie, '$foto_ktp')";
        $result = mysqli_query($koneksi, $query);
        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                " - ".mysqli_error($koneksi));
        }
    }
    
    if ($foto_ktp != ""){
        $ekstensi = array ('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');
        $h = explode('.', $foto_ktp);
        $ekstensi_new = strtolower(end($x));
        $file_tmp = $_FILES['foto_ktp']['tmp_name'];
        $angka_acak = rand(1,999);
        $newfoto = $angka_acak.'-'.$foto_ktp;
        if (in_array($ekstensi_new, $ekstensi) === true){
            move_uploaded_file($file_tmp,'foto-ktp/'.$newfoto);
            $query = "CALL insert_user ('$username', '$passwd', 'user', '$nama', '$email', $alamat', '$no_telp', '$jenis_kelamin', '$lahir_tmp', '$tgl_lahir','$ktp_selfie', '$newfoto')";
            $result = mysqli_query($koneksi, $query);
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($koneksi));
            }
        }else{
            $query = "CALL insert_user ('$username', '$passwd', 'user', '$nama', '$email', $alamat', '$no_telp', '$jenis_kelamin', '$lahir_tmp', '$tgl_lahir','$ktp_selfie', '$newfoto')";
            $result = mysqli_query($koneksi, $query);
            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                    " - ".mysqli_error($koneksi));
            }
        }
    }else{
        $query = "CALL insert_user ('$username', '$passwd', 'user', '$nama', '$email', $alamat', '$no_telp', '$jenis_kelamin', '$lahir_tmp', '$tgl_lahir','$ktp_selfie', '$foto_ktp')";
        $result = mysqli_query($koneksi, $query);
        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                " - ".mysqli_error($koneksi));
        }
    }    
//tambah ke database
//mysqli_query($koneksi, "CALL insert_user ('$username', '$passwd', 'user', '$nama', '$email', $alamat', '$no_telp', '$jenis_kelamin', '$lahir_tmp', '$tgl_lahir','$ktp_selfie_baru', '$foto_ktp_baru' ");
//return mysqli_affected_rows($koneksi);
}