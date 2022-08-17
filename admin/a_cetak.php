<?php
require '../functions/functions.php';
$produk = query("SELECT * FROM produk ORDER BY nama_produk ASC");
$dealer = query("SELECT * FROM dealer ORDER BY nama_dealer ASC");
$jenis_produk = query("SELECT * FROM jenis_produk ORDER BY jenis_produk ASC");
$bahan_aktif = bahanAktif();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <?php include '../aset/css/basic_css.html' ?>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="../aset/select2/dist/css/select2.min.css">
   <link rel="stylesheet" href="../aset/fontawesome47/css/font-awesome.min.css">

   <link rel="icon" type="image/png" href="../aset/img/pakis1.png">
   <title>Admin Cetak</title>
</head>

<body>
   <?php include 'navbar.php' ?>

   <h1>Cetak Produk</h1>
   <hr>

   <div class="col-md-4 text-white">
      <form action="cetak/cetak.php" method="POST">
         <label for="id_produk" class="mb-2">Produk</label>
         <select name="id_produk" class="form-control mb-4">
            <option value="">-- semua --</option>
            <?php foreach ($produk as $view_produk) : ?>
               <option value="<?= $view_produk['id_produk'] ?>"><?= $view_produk['nama_produk'] ?></option>
            <?php endforeach ?>
         </select>

         <label for="id_dealer" class="mb-2 mt-3">Dealer</label>
         <select name="id_dealer" class="form-control">
            <option value="">-- semua --</option>
            <?php foreach ($dealer as $view_dealer) : ?>
               <option value="<?= $view_dealer['id_dealer'] ?>"><?= $view_dealer['nama_dealer'] ?></option>
            <?php endforeach ?>
         </select>

         <label for="id_jenis_produk" class="mb-2 mt-3">Jenis Produk</label>
         <select name="id_jenis_produk" class="form-control mb-4">
            <option value="">-- semua --</option>
            <?php foreach ($jenis_produk as $view_jenis_produk) : ?>
               <option value="<?= $view_jenis_produk['id_jenis_produk'] ?>"><?= $view_jenis_produk['jenis_produk'] ?></option>
            <?php endforeach ?>
         </select>

         <label for="bahan_aktif" class="mb-2 mt-3">Bahan Aktif</label>
         <select name="bahan_aktif" class="form-control mb-4">
            <option value="">-- semua --</option>
            <?php foreach ($bahan_aktif as $view_bahan_aktif) : ?>
               <option value="<?= $view_bahan_aktif['bahan_aktif'] ?>"><?= $view_bahan_aktif['bahan_aktif'] ?></option>
            <?php endforeach ?>
         </select>
         <button type="submit" class="btn btn-primary mt-5">Tampilkan</button>
      </form>
   </div>
   <?php include 'navbar_end.php' ?>


   <script src="../aset/select2/dist/js/select2.min.js"></script>
   <script>
      navActive("cetak")
      $("select").select2();
   </script>

</body>

</html>