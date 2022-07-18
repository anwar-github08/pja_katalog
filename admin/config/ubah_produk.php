<?php
require '../../functions/functions.php';

$id_produk = $_POST['id_produk'];
$id_dealer = $_POST['id_dealer'];
$id_jenis_produk = $_POST['id_jenis_produk'];
$nama_produk = strtoupper($_POST['nama_produk']);
$deskripsi = $_POST['deskripsi'];

// ubah data produk
mysqli_query($conn, "UPDATE produk SET id_dealer = '$id_dealer', id_jenis_produk = '$id_jenis_produk', nama_produk = '$nama_produk', deskripsi_produk = '$deskripsi' WHERE id_produk = $id_produk");

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
