<?php require '../functions/functions.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <?php include '../aset/css/basic_css.html' ?>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="../aset/fontawesome47/css/font-awesome.min.css">
   <link rel="stylesheet" href="../aset/datatables/datatables/css/dataTables.bootstrap4.min.css">

   <link rel="icon" type="image/png" href="../aset/img/pakis1.png">
   <title>Admin Jenis Produk</title>
</head>

<body>
   <?php include 'navbar.php' ?>

   <h1>Jenis Produk</h1>
   <hr>

   <div class="card">
      <div class="card-header">
         Input Jenis Produk
      </div>
      <div class="card-body">
         <form method="POST" id="form-jenis-produk">
            <div class="input-group mb-3">
               <input type="text" name="jenis_produk" class="form-control bg-light jenis-produk" id="jenis-produk" placeholder="input baru.." required autocomplete="off" autofocus>
               <a class="input-group-text btn btn-primary tambah"><i class="fa fa-plus"></i> Simpan</a>
            </div>
            <p class="text-danger" id="err-jenis-produk"></p>
         </form>
         <hr>
         <div class="data-jenis-produk"></div>
      </div>
   </div>

   <?php include 'navbar_end.php' ?>
   <script>
      navActive("jenisProduk")
   </script>

   <!-- untuk datatables -->
   <script src="../aset/datatables/datatables/js/jquery.dataTables.min.js"></script>
   <script src="../aset/datatables/datatables/js/dataTables.bootstrap4.min.js"></script>

   <!-- panggil js -->
   <script src="js/js_jenis_produk.js"></script>

</body>

</html>