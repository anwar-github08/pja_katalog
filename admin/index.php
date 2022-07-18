<?php
require '../functions/functions.php';
$dealer = getJumlahData("dealer");
$jenisProduk = getJumlahData("jenis_produk");
$produk = getJumlahData("produk");
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <?php include '../aset/css/basic_css.html' ?>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="../aset/fontawesome47/css/font-awesome.min.css">

   <link rel="icon" type="image/png" href="../aset/img/pakis1.png">
   <title>Admin</title>
</head>

<body>
   <?php include 'navbar.php' ?>

   <h1>Admin</h1>
   <hr>
   <div class="row">
      <div class="col-md-4">
         <a href="a_dealer.php">
            <div class="card mb-3 card-dealer">
               <div class="card-header">Dealer</div>
               <div class="card-body">
                  <h5 class="card-title">TOTAL : <?= $dealer ?> Dealer</h5>
               </div>
            </div>
         </a>
      </div>
      <div class="col-md-4">
         <a href="a_jenis_produk.php">
            <div class="card mb-3 card-jenis">
               <div class="card-header">Jenis Produk</div>
               <div class="card-body">
                  <h5 class="card-title">TOTAL : <?= $jenisProduk ?> Jenis Produk</h5>
               </div>
            </div>
         </a>
      </div>
      <div class="col-md-4">
         <a href="a_tampil_produk.php">
            <div class="card mb-3 card-produk">
               <div class="card-header">Produk</div>
               <div class="card-body">
                  <h5 class="card-title">TOTAL : <?= $produk ?> Produk</h5>
               </div>
            </div>
         </a>
      </div>
   </div>
   <?php include 'navbar_end.php' ?>
   <script>
      navActive("dashboard")
   </script>

</body>

</html>