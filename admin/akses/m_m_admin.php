<!-- <?php

      include '../../config/koneksi.php';

      if (!isset($_SESSION)) {
         echo "<script>location='../'</script>";
         exit();
      }
      ?>
<form method="post">
   <button type="submit" name="simpan">Buat Admin</button>

   <?php if (isset($_POST['simpan'])) {
      exit();
      $nama = "Katalog";
      $username = "katalog";
      $password = "katalog";
      $level = "master";

      // enkripsi password

      $passwordf = password_hash($password, PASSWORD_DEFAULT);

      // simpan ke db

      mysqli_query($conn, "INSERT INTO admin VALUES('','$nama','$username','$passwordf','$level')");
   } ?> -->