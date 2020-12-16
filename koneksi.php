<?php
    $host ="localhost";
    $user ="root";
    $password ="";
    $database = "jubeta";
    $koneksi = mysqli_connect($host,$user,$password,$database );

    if(!isset($_SESSION)){
        session_start();
    }

?>