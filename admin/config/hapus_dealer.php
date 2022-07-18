<?php
include '../../config/koneksi.php';

$id = $_POST['id'];

mysqli_query($conn, "DELETE FROM dealer WHERE id_dealer = $id");

// set id biar dimulai dari 1
mysqli_query($conn, "ALTER TABLE dealer AUTO_INCREMENT=1");
