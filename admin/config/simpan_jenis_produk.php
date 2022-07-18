<?php
include '../../config/koneksi.php';

$jenis_produk = strtoupper($_POST['jenis_produk']);

mysqli_query($conn, "INSERT INTO jenis_produk VALUE('','$jenis_produk')");
