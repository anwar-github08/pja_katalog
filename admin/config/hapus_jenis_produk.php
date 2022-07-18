<?php
include '../../config/koneksi.php';


$id = $_POST['id'];

mysqli_query($conn, "DELETE FROM jenis_produk WHERE id_jenis_produk = $id");

// set id biar dimulai dari 1
mysqli_query($conn, "ALTER TABLE jenis_produk AUTO_INCREMENT=1");
