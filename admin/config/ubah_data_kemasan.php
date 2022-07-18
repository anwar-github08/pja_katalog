<?php
include '../../config/koneksi.php';

$i = $_POST['id'];
$pecah = explode("_", $i);
$id = $pecah[0];

$key = $_POST['key'];

if ($key == "volume") {
   $volume = strtoupper($_POST['volume']);
   mysqli_query($conn, "UPDATE tmp_kemasan SET volume = '$volume' WHERE id_tmp_kemasan = $id");
} else {
   $isi_per_box = $_POST['isi_per_box'];
   mysqli_query($conn, "UPDATE tmp_kemasan SET isi_per_box = $isi_per_box WHERE id_tmp_kemasan = $id");
}
