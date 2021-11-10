<?php
// memanggil file connect.php untuk melakukan koneksi database
include 'connect.php';

	// membuat variabel untuk menampung data dari form
  $judul     = $_POST['judul_buku'];
  $deskripsi = $_POST['deskripsi_buku'];
  $pengarang = $_POST['pengarang_buku'];
  $harga     = $_POST['harga_buku'];
  $sampul    = $_FILES['sampul_buku']['name'];


//cek dulu jika ada gambar produk jalankan coding ini
if($sampul != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); //tipe file yang bisa diupload 
  $x = explode('.', $sampul); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['sampul_buku']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$sampul; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO produk (judul_buku, deskripsi_buku, pengarang_buku, harga_buku, sampul_buku) VALUES ('$judul', '$deskripsi', '$pengarang', '$harga', '$nama_gambar_baru')";
                  $result = mysqli_query($connect, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($connect).
                           " - ".mysqli_error($connect));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil dan kembali ke jendela file tambah_data
                echo "<script>alert('Format gambar yang boleh hanya jpg atau png.');window.location='tambah_data.php';</script>";
            }
} else {
   $query = "INSERT INTO produk (judul_buku, deskripsi_buku, pengarang_buku, harga_buku, sampul_buku) VALUES ('$judul', '$deskripsi', '$pengarang', '$harga', null)";
                  $result = mysqli_query($connect, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($connect).
                           " - ".mysqli_error($connect));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }
}
