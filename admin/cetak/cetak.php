<?php
session_start();
if (!isset($_SESSION['user'])) {
   echo "<script>location='../akses/login_admin.php'</script>";
   exit();
}
require('../../functions/functions.php');
date_default_timezone_set('Asia/Jakarta');

$id_produk = $_POST['id_produk'];
$id_dealer = $_POST['id_dealer'];
$id_jenis_produk = $_POST['id_jenis_produk'];
$bahan_aktif = $_POST['bahan_aktif'];

// $jenis_produk_produk = query("SELECT DISTINCT id_jenis_produk FROM produk");
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
   <link rel="stylesheet" href="style.css">

   <title>Cetak</title>
</head>

<body>
   <div class="container mb-5">
      <div class="title-img mt-2">
         <img src="../../aset/img/pakis2.png" width="70%" alt="">
      </div>
      <hr>

      <?php if ($id_produk == "" and $id_jenis_produk == "" and $id_dealer == "" and $bahan_aktif == "") : ?>

         <!-- cetak semua -->
         <?php $produk = produkAll(); ?>

      <?php elseif ($id_produk == "" and $id_dealer == "" and $bahan_aktif == "") : ?>

         <!-- cetak per jenis -->
         <?php $produk = produkJenis($id_jenis_produk); ?>

      <?php elseif ($id_produk == "" and $id_jenis_produk == "" and $bahan_aktif == "") : ?>

         <!-- cetak per dealer -->
         <?php $produk = produkDealer($id_dealer); ?>

      <?php elseif ($id_dealer == "" and $id_jenis_produk == "" and $bahan_aktif == "") : ?>

         <?php echo "<script>location='cetak_produk.php?id=$id_produk'</script>" ?>

      <?php elseif ($id_produk == "" and $id_dealer == "" and $id_jenis_produk == "") : ?>

         <!-- cetak per bahan aktif -->
         <?php $produk = produkBahanAktif($bahan_aktif); ?>

      <?php elseif ($id_produk == "" and $id_dealer == "") : ?>

         <!-- cetak per bahan aktif dan jenis-->
         <?php $produk = produkBahanAktifJenis($bahan_aktif, $id_jenis_produk); ?>

      <?php elseif ($id_produk == "" and $id_jenis_produk == "") : ?>

         <!-- cetak per bahan aktif dan dealer-->
         <?php $produk = produkBahanAktifDealer($bahan_aktif, $id_dealer); ?>

      <?php elseif ($id_produk == "" and $bahan_aktif == "") : ?>

         <!-- cetak per jenis dan dealer-->
         <?php $produk = produkDealerJenis($id_dealer, $id_jenis_produk); ?>

      <?php elseif ($id_produk == "") : ?>

         <!-- cetak per bahan aktif, dealer dan jenis-->
         <?php $produk = produkBahanAktifJenisDealer($bahan_aktif, $id_jenis_produk, $id_dealer); ?>

      <?php endif ?>

      <?php if (empty($produk)) : ?>

         <p><i>Data tidak ditemukan</i></p>

      <?php else : ?>
         <table class="table table-bordered text-center mt-4">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Gambar</th>
                  <th>Dealer</th>
                  <th>Produk</th>
                  <th>Deskripsi</th>
                  <th>Bahan Aktif</th>
                  <th>Jenis Produk</th>
                  <th style="width: 15%;">Kemasan</th>
               </tr>
            </thead>
            <tbody>
               <?php $no = 1; ?>
               <?php foreach ($produk as $view_produk) : ?>
                  <tr>
                     <td><?= $no++ ?></td>
                     <td><img src="../img_produk/<?= $view_produk['img_produk'] ?>" width="50"></td>
                     <td><?= $view_produk['nama_dealer'] ?></td>
                     <td><?= $view_produk['nama_produk'] ?></td>
                     <td style="text-align:justify;"><?= $view_produk['deskripsi_produk'] ?></td>
                     <td><?= $view_produk['bahan_aktif'] ?></td>
                     <td><?= $view_produk['jenis_produk'] ?></td>
                     <td>
                        <table class="table table-bordered text-center table-light">
                           <thead>
                              <tr>
                                 <td>Volume</td>
                                 <td>Isi / box</td>
                              </tr>
                           </thead>
                           <tbody>
                              <?php $kemasan = query_kemasan($view_produk['id_produk']) ?>
                              <?php foreach ($kemasan as $view_kemasan) : ?>
                                 <tr>
                                    <td><?= $view_kemasan['volume'] ?></td>
                                    <td><?= $view_kemasan['isi_per_box'] ?></td>
                                 </tr>
                              <?php endforeach ?>
                           </tbody>
                        </table>
                     </td>
                  </tr>
               <?php endforeach ?>
            </tbody>
         </table>

         <div class="footer text-center">
            <em class="cp">&copy; 2022 CV. Pakis Jaya Abadi</em>
            <em class="wk"><?= date('d M Y H:i:s') ?></em>
         </div>
   </div>
   <div class="tombol">
      <button class="btn btn-primary cetak" onclick="cetak()">Cetak</button>
   <?php endif ?>
   <a href="../a_cetak.php" class="btn btn-danger">Kembali</a>
   </div>


   <script>
      function cetak() {
         window.print()
      }
   </script>
</body>

</html