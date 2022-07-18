<?php include "../../config/koneksi.php";

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM user WHERE id_email = $id");

// set id biar dimulai dari 1
mysqli_query($conn, "ALTER TABLE user AUTO_INCREMENT=1");

echo "<script>location='../a_user.php'</script>";
