<?php include "../../config/koneksi.php";

$id_produk = $_GET['id'];
$img_produk = $_GET['img'];

unlink('../img_produk/' . $img_produk);

mysqli_query($conn, "DELETE FROM produk WHERE id_produk = $id_produk");
mysqli_query($conn, "DELETE FROM kemasan WHERE id_produk = $id_produk");

// set id biar dimulai dari 1
mysqli_query($conn, "ALTER TABLE produk AUTO_INCREMENT=1");
mysqli_query($conn, "ALTER TABLE kemasan AUTO_INCREMENT=1");

echo "<script>location='../a_tampil_produk.php'</script>";
