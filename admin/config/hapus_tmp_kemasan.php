<?php
include '../../config/koneksi.php';

$id = $_POST['id'];

mysqli_query($conn, "DELETE FROM tmp_kemasan WHERE id_tmp_kemasan = $id");

// set id mulai dari 1
mysqli_query($conn, "ALTER TABLE tmp_kemasan AUTO_INCREMENT=1");
