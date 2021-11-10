<?php
  include('connect.php'); //agar file index terhubung dengan database, maka file connect.php sebagai penghubung harus di includekan
  
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
    table {
      border: solid 1px #DDEEEE;
      border-collapse: collapse;
      border-spacing: 0;
      width: 90%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: #DDEFEF;
        border: solid 1px #DDEEEE;
        color: #336B6B;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
    }
    a {
          background-color: salmon;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
    </style>
  </head>
  <body>
    <center><h1>Data Perpus</h1><center>
    <center><a href="tambah_data.php">+ &nbsp; Tambah data</a><center>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No.urut</th>
          <th>Judul</th>
          <th>Dekripsi</th>
          <th>Pengarang</th>
          <th>Harga buku</th>
          <th>Gambar</th>
          <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
      $query = "SELECT * FROM produk ORDER BY id ASC";
      $result = mysqli_query($connect, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($connect).
           " - ".mysqli_error($connect));
      }

      //buat perulangan untuk element tabel dari data perpus
      $no = 1; //variabel no untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['judul_buku']; ?></td>
          <td><?php echo substr($row['deskripsi_buku'], 0, 20); ?>...</td>
          <td><?php echo $row['pengarang_buku']; ?></td>
          <td>Rp <?php echo $row['harga_buku']; ?></td>
          <td style="text-align: center;"><img src="gambar/<?php echo $row['sampul_buku']; ?>" style="width: 120px;"></td>
          <td>
              <a href="edit_data.php?id=<?php echo $row['id']; ?>">Edit</a> |
              <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini ?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
  </body>
</html>