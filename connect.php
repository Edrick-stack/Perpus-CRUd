<?php
  $host = "localhost"; 
  $user = "root";
  $pass = "";
  $nama_db = "perpus_crud"; //nama database
  $connect = mysqli_connect($host,$user,$pass,$nama_db); //pastikan urutan variabel nya seperti ini, jangan tertukar

  if(!$connect){ //jika gagal terkoneksi maka akan tampil dialog error
    die ("Koneksi dengan database gagal: ".mysql_connect_error());
  }
?>