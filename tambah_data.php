<?php
  include('connect.php'); //agar index terhubung dengan database, maka file connect.php sebagai penghubung harus di includekan
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD Perpus Edrick schmidt</title>
    <style type="text/css">
      * {
        font-family: "system-ui";
      }
      h1 {
        text-transform: uppercase;
        color: salmon;
      }
    button {
          background-color: salmon;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: salmon;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    </style>
  </head>
  <body>
      <center>
        <h1>Tambah Data</h1>
      <center>
      <form method="POST" action="proses_tambah.php" enctype="multipart/form-data" >
      <section class="base">
        <div>
          <label>Judul Buku</label>
          <input type="text" name="judul_buku" autofocus="" required="" />
        </div>
        <div>
          <label>Deskripsi</label>
         <input type="text" name="deskripsi_buku" />
        </div>
        <div>
          <label>Pengarang</label>
         <input type="text" name="pengarang_buku" required="" />
        </div>
        <div>
          <label>Harga buku</label>
         <input type="text" name="harga_buku" required="" />
        </div>
        <div>
          <label>Gambar sampul</label>
         <input type="file" name="sampul_buku" required="" />
        </div>
        <div>
         <button type="submit">Simpan Data</button>
        </div>
        </section>
      </form>
  </body>
</html>