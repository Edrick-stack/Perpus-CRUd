 <?php
  // memanggil file connect.php untuk membuat koneksi ke database
include 'connect.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM produk WHERE id='$id'";
    $result = mysqli_query($connect, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($connect).
         " - ".mysqli_error($connect));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan');window.location='index.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan id');window.location='index.php';</script>";
  }         
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
        <h1>Edit Data "<?php echo $data['judul_buku']; ?>"</h1>
      <center>
      <form method="POST" action="proses_edit.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id" value="<?php echo $data['id']; ?>"  hidden />
        <div>
          <label>Judul Buku</label>
          <input type="text" name="judul_buku" value="<?php echo $data['judul_buku']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>Deskripsi</label>
         <input type="text" name="deskripsi_buku" value="<?php echo $data['deskripsi_buku']; ?>" />
        </div>
        <div>
          <label>Pengarang</label>
         <input type="text" name="pengarang_buku" required=""value="<?php echo $data['pengarang_buku']; ?>" />
        </div>
        <div>
          <label>Harga Buku</label>
         <input type="text" name="harga_buku" required="" value="<?php echo $data['harga_buku']; ?>"/>
        </div>
        <div>
          <label>Sampul Buku</label>
          <img src="gambar/<?php echo $data['sampul']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="sampul_buku" />
          <i style="float: left;font-size: 11px;color: blue">Abaikan jika tidak ingin merubah sampul buku</i>
        </div>
        <div>
         <button type="submit">Simpan Perubahan</button> 
        </div>
        </section>
      </form>
  </body>
</html>