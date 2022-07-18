<?php
include '../../config/koneksi.php';

$volume = strtoupper($_POST['volume']);
$isi = strtoupper($_POST['isi']);

mysqli_query($conn, "INSERT INTO tmp_kemasan VALUE('','$volume','$isi')");
