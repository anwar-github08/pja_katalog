<?php
include '../../config/koneksi.php';

mysqli_query($conn, "DELETE FROM tmp_kemasan");

// set id biar dimulai dari 1
mysqli_query($conn, "ALTER TABLE tmp_kemasan AUTO_INCREMENT=1");
