<?php
include 'connect.php';
$id = $_GET["id"];
//mengambil id yang ingin dihapus

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM produk WHERE id='$id' ";
    $hasil_query = mysqli_query($connect, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($connect).
       " - ".mysqli_error($connect));
    } else {
      echo "<script>alert('Data berhasil dihapus.');window.location='index.php';</script>";
    }