<?php
include '../../config/koneksi.php';

$id = $_POST['id'];
$nama_dealer = strtoupper($_POST['nama_dealer']);

mysqli_query($conn, "UPDATE dealer SET nama_dealer = '$nama_dealer' WHERE id_dealer = $id");
