<?php
include '../../config/koneksi.php';

$i = $_POST['id'];
$pecah = explode("_", $i);
$id = $pecah[0];
$jenis_produk = strtoupper($_POST['jenis_produk']);

mysqli_query($conn, "UPDATE jenis_produk SET jenis_produk = '$jenis_produk' WHERE id_jenis_produk = $id");
