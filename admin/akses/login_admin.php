<?php
include '../../config/koneksi.php';
session_start();
if (isset($_SESSION['user'])) {
   echo "<script>location='../index.php';</script>";
   exit();
};
date_default_timezone_set('Asia/Jakarta');
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <?php include '../../aset/css/basic_css.html' ?>
   <link rel="stylesheet" href="../css/style.css">

   <link rel="icon" type="image/png" href="../../aset/img/pakis1.png">
   <title>Login Admin</title>
</head>

<body>

   <form method="POST">
      <div class="container">
         <div class="col-md-4 form-login">
            <div class="card">
               <div class="card-header text-center">
                  <h3>Login</h3>
               </div>
               <div class="card-body text-white">
                  <label class="form-label">Username</label>
                  <input type="text" name="username" class="form-control mb-3" id="username" autocomplete="off" required>
                  <label class="form-label">Password</label>
                  <input type="password" name="password" class="form-control mb-3" id="password" autocomplete="off" required>
                  <label class="form-label">Key</label>
                  <input type="password" name="key" class="form-control mb-3" id="key" autocomplete="off" required>
               </div>
               <div class="card-footer text-center">
                  <button type="submit" name="login" class="btn" id="login">Login</button>
                  <!-- <a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Registrasi</a> -->
                  <a href="../../index.php" class="btn" id="batal">Batal</a>
               </div>
            </div>
         </div>
      </div>
   </form>



   <!-- Modal -->
   <form method="POST">
      <div class="modal fade bg-secondary" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Masukkan Email</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <input type="email" class="form-control email" name="email" autocomplete="off" placeholder="email" required>
               </div>
               <div class="modal-footer">
                  <button type="submit" name="daftar" class="btn bg-primary text-white">Kirim</button>
               </div>
            </div>
         </div>
      </div>
   </form>

   <!-- !-- jquery dan bootsrap -->
   <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>


<?php

if (isset($_POST['login'])) {

   $username = $_POST['username'];
   $password = $_POST['password'];

   $key = $_POST['key'];

   $query = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
   $query1 = mysqli_query($conn, "SELECT * FROM tbl_key WHERE nama_key = '$key' ");

   if (mysqli_num_rows($query) == 1) {

      $lihat = mysqli_fetch_assoc($query);

      if (password_verify($password, $lihat['password'])) {

         if (mysqli_num_rows($query1) == 1) {

            $_SESSION['user'] = $lihat;
            echo "<script>location='../index.php'</script>";
         } else {
            echo "<script>alert('username, password atau key salah..!!')</script>";
         }
      } else {
         echo "<script>alert('username, password atau key salah..!!')</script>";
      }
   } else {
      echo "<script>alert('username, password atau key salah..!!')</script>";
   }
}

if (isset($_POST['daftar'])) {

   $email = $_POST['email'];
   $tanggal = date('Y-m-d H:i:s');

   $query = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

   if (mysqli_num_rows($query) == 1) {

      echo "<script>alert('email sudah terdaftar')</script>";
      exit();
   }

   mysqli_query($conn, "INSERT INTO user VALUES('','$email','-','$tanggal')");

   echo "<script>alert('username, password dan key akan dikirimkan ke email anda')</script>";
}

?>