<?php
session_start();
if (!isset($_SESSION['user'])) {
   echo "<script>location='../akses/login_admin.php'</script>";
   exit();
}
require('../../functions/functions.php');
date_default_timezone_set('Asia/Jakarta');

$data_produk = get_detail($_GET);
foreach ($data_produk as $view_produk);
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
   <link rel="stylesheet" href="style.css">

   <title>Cetak Produk</title>
</head>

<body>
   <div class="konten-cetak">
      <div class="title-img">
         <img src="../../aset/img/pakis2.png" class="text-center" width="70%" alt="">
      </div>
      <hr>
      <div class=" row konten">
         <div class="gambar">
            <img src="../img_produk/<?= $view_produk['img_produk'] ?>" class="img-thumbnail" alt="">
         </div>

         <div class="detail">
            <h4 class="card-title"><?= $view_produk['nama_produk'] ?></h4>
            <h6 class="text-muted mt-3"><?= $view_produk['jenis_produk'] ?></h6>
            <h6 class="text-muted">Dealer : <?= $view_produk['nama_dealer'] ?></h6>
            <hr>
            <h6>Deskripsi</h6>
            <p class="card-text"><?= $view_produk['deskripsi_produk'] ?></p>
            <p class="card-text">
            </p>
            <hr>
            <h6>Kemasan</h6>
            <?php $kemasan = query_kemasan($view_produk['id_produk']) ?>
            <table class="table table-warning table-bordered text-center mt-2">
               <thead>
                  <tr>
                     <th>Volume</th>
                     <th>Isi / Box</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($kemasan as $view_kemasan) : ?>
                     <tr>
                        <td><?= $view_kemasan['volume'] ?></td>
                        <td><?= $view_kemasan['isi_per_box'] ?></td>
                     </tr>
                  <?php endforeach ?>
               </tbody>
            </table>
         </div>
      </div>
      <hr>
      <div class="footer text-center">
         <em class="cp">&copy; 2022 CV. Pakis Jaya Abadi</em>
         <em class="wk"><?= date('D, d M Y H:i:s') ?></em>
      </div>
   </div>
   <div class="tombol">
      <button class="btn btn-primary cetak" onclick="cetak()">Cetak</button>
      <a href="../a_tampil_produk.php" class="btn btn-danger">Kembali</a>
   </div>
</body>

</html>

<script>
   function cetak() {
      window.print()
   }
</script>