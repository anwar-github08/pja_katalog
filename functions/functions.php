<?php

$conn = mysqli_connect("localhost", "root", "", "pja_katalog");

function query($query)
{
   global $conn;

   $result = mysqli_query($conn, $query);

   $wadah = [];
   while ($row = mysqli_fetch_Assoc($result)) {

      $wadah[] = $row;
   }
   return $wadah;
}

// untuk detail produk
function filter($data)
{
   $id_dealer = $data['dealer'];
   $id_jenis_produk = $data['jenis'];

   $query = "SELECT * FROM produk JOIN jenis_produk ON produk.id_jenis_produk = jenis_produk.id_jenis_produk JOIN dealer ON dealer.id_dealer = produk.id_dealer WHERE produk.id_dealer = $id_dealer AND produk.id_jenis_produk = $id_jenis_produk ORDER BY nama_produk ASC";

   return query($query);
}

// untuk produk / tampil produk berdsarkan jenis dan dealer
function get_produk($data)
{
   $id = $data['id'];
   $index = $data['i'];

   // jika index j / jenis
   if ($index == 'j') {
      $query = "SELECT * FROM produk
      JOIN jenis_produk ON produk.id_jenis_produk = jenis_produk.id_jenis_produk JOIN dealer ON dealer.id_dealer = produk.id_dealer WHERE produk.id_jenis_produk = $id ORDER BY nama_produk ASC";
   }

   // jika index d / dealer
   if ($index == 'd') {
      $query = "SELECT * FROM produk JOIN jenis_produk ON produk.id_jenis_produk = jenis_produk.id_jenis_produk JOIN dealer ON dealer.id_dealer = produk.id_dealer WHERE produk.id_dealer = $id ORDER BY nama_produk ASC";
   }

   return query($query);
}

// untuk detail produk
function get_detail($data)
{
   $id = $data['id'];
   $query = "SELECT * FROM produk JOIN jenis_produk ON produk.id_jenis_produk = jenis_produk.id_jenis_produk JOIN dealer ON dealer.id_dealer = produk.id_dealer WHERE id_produk = $id";

   return query($query);
}

function query_produk_sejenis($id_jenis_produk)
{
   $query = "SELECT * FROM produk JOIN jenis_produk ON produk.id_jenis_produk = jenis_produk.id_jenis_produk JOIN dealer ON dealer.id_dealer = produk.id_dealer WHERE produk.id_jenis_produk = $id_jenis_produk LIMIT 6";

   return query($query);
}



function query_kemasan($id_produk)
{
   $query = "SELECT * FROM kemasan WHERE id_produk = $id_produk";

   return query($query);
}

function simpan_kemasan($id_produk, $volume, $isi_per_box)
{
   global $conn;
   for ($i = 0; $i < count($volume); $i++) {
      mysqli_query($conn, "INSERT INTO kemasan VALUES('','$id_produk','$volume[$i]','$isi_per_box[$i]' )");
   }
}

function hapus_kemasan($id_produk)
{
   global $conn;
   mysqli_query($conn, "DELETE FROM kemasan WHERE id_produk = $id_produk");
}



function query_tmp_kemasan()
{
   $query = "SELECT * FROM tmp_kemasan";

   return query($query);
}

function simpan_tmp_kemasan($volume, $isi_per_box)
{
   global $conn;
   for ($i = 0; $i < count($volume); $i++) {
      mysqli_query($conn, "INSERT INTO tmp_kemasan VALUES('','$volume[$i]','$isi_per_box[$i]' )");
   }
}

function hapus_tmp_kemasan()
{
   global $conn;
   mysqli_query($conn, "DELETE FROM tmp_kemasan");
}



function set_auto_increment($tabel)
{
   global $conn;
   mysqli_query($conn, "ALTER TABLE $tabel AUTO_INCREMENT=1");
}


function cari($keyword)
{
   $query = "SELECT * FROM produk JOIN jenis_produk ON produk.id_jenis_produk = jenis_produk.id_jenis_produk JOIN dealer ON dealer.id_dealer = produk.id_dealer WHERE nama_produk LIKE '%$keyword%' OR nama_dealer LIKE '%$keyword%' OR jenis_produk LIKE '%$keyword%' ORDER BY nama_produk ASC";
   return query($query);
}


function getJumlahData($tabel)
{
   global $conn;

   $query = mysqli_query($conn, "SELECT * FROM $tabel");
   $jumlahData = mysqli_num_rows($query);

   return $jumlahData;
}

function uploadGambar()
{
   $namaFile =  $_FILES['img_produk']['name'];
   $tmpName = $_FILES['img_produk']['tmp_name'];
   $error = $_FILES['img_produk']['error'];

   // cek jika tidak ada gambar yang diupload
   // if ($error === 4) {
   // }

   // jika ukuran gambar sangat besar
   if ($error === 1) {

      echo "<script>alert('gambar terlalu besar')</script>";
      return false;
   }

   // jika yang diupload tidak gambar

   $ekstensiValid = ['jpg', 'webp', 'png', 'jpeg'];
   $ekstensiGambar = explode('.', $namaFile);
   $ekstensiGambar = strtolower(end($ekstensiGambar));

   if (in_array($ekstensiGambar, $ekstensiValid) == false) {
      echo "<script>alert('yang diupload bukan gambar')</script>";
      return false;
   }

   // ganti nama file
   $namaFileBaru = uniqid() . "." . $ekstensiGambar;

   // simpan didirektori
   move_uploaded_file($tmpName, 'img_produk/' . $namaFileBaru);

   return $namaFileBaru;
}



function simpanProduk()
{

   global $conn;

   $id_dealer = $_POST['id_dealer'];
   $id_jenis_produk = $_POST['id_jenis_produk'];
   $nama_produk = strtoupper($_POST['nama_produk']);
   $deskripsi = ucfirst($_POST['deskripsi']);

   // upload gambar
   $gambar = uploadGambar();

   // jika gambar gagal diupload
   if (!$gambar) {
      echo "<script>alert('gagal upload gambar')</script>";
      return false;
   }

   // simpan di produk
   mysqli_query($conn, "INSERT INTO produk VALUES('','$id_dealer','$id_jenis_produk','$nama_produk','$gambar','$deskripsi')");

   // mendapatkan id_produk baru
   $id_produk = $conn->insert_id;

   // ambil data kemasan di tmp_kemasan
   $tmp_kemasan = query_tmp_kemasan();

   foreach ($tmp_kemasan as $view_tmp_kemasan) {

      $volume[] = $view_tmp_kemasan['volume'];
      $isi[] = $view_tmp_kemasan['isi_per_box'];
   }

   // simpan di kemasan
   simpan_kemasan($id_produk, $volume, $isi);

   // hapus data di tmp kemasan
   hapus_tmp_kemasan();

   // set auto increment
   set_auto_increment("tmp_kemasan");

   echo "<script>location='a_tampil_produk.php'</script>";
}


function ubahProduk()
{

   global $conn;

   $id_produk = $_POST['id_produk'];
   $id_dealer = $_POST['id_dealer'];
   $id_jenis_produk = $_POST['id_jenis_produk'];
   $nama_produk = strtoupper($_POST['nama_produk']);
   $img_produk_lama = $_POST['img_produk_lama'];
   $deskripsi = ucfirst($_POST['deskripsi']);

   if ($_FILES['img_produk']['error'] === 4) {

      $img_produk = $img_produk_lama;
   } else {

      $img_produk = uploadGambar();
      // hapus file di direktori
      unlink('img_produk/' . $img_produk_lama);
   }


   // ubah data produk
   mysqli_query($conn, "UPDATE produk SET id_dealer = '$id_dealer', id_jenis_produk = '$id_jenis_produk', nama_produk = '$nama_produk', img_produk = '$img_produk', deskripsi_produk = '$deskripsi' WHERE id_produk = $id_produk");

   // hapus semua data kemasan yang id produknya = id produk
   hapus_kemasan($id_produk);

   //set id auto increment
   set_auto_increment("kemasan");

   // ambil data di tmp kemasan
   $tmp_kemasan = query_tmp_kemasan();

   foreach ($tmp_kemasan as $view_tmp_kemasan) {
      $volume[] = $view_tmp_kemasan['volume'];
      $isi_per_box[] = $view_tmp_kemasan['isi_per_box'];
   }

   // simpan di kemasan
   simpan_kemasan($id_produk, $volume, $isi_per_box);

   //hapus semua data di tmp kemasan
   hapus_tmp_kemasan();

   // set AUTO_INCREMENT
   set_auto_increment("tmp_kemasan");

   echo "<script>location='a_tampil_produk.php'</script>";
}

function hitungUsers()
{

   global $conn;

   $query =  mysqli_query($conn, "SELECT * FROM user WHERE status = '-'");
   $users = mysqli_num_rows($query);

   return $users;
}

function saran($keyword)
{
   $query = "SELECT id_produk,nama_produk FROM produk WHERE nama_produk LIKE '%$keyword%' ORDER BY nama_produk ASC";

   return query($query);
}
