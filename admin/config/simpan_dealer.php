<?php
include '../../config/koneksi.php';

$nama_dealer = strtoupper($_POST['nama_dealer']);

mysqli_query($conn, "INSERT INTO dealer VALUE('','$nama_dealer')");
