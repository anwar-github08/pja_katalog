<?php
require '../functions/functions.php';

$produk = query("SELECT * FROM produk JOIN jenis_produk ON produk.id_jenis_produk = jenis_produk.id_jenis_produk JOIN dealer ON dealer.id_dealer = produk.id_dealer ORDER BY nama_produk ASC");

if (isset($_POST['filter'])) {
   $produk = filter($_POST);
}
if (isset($_GET['id'])) {
   $produk = get_produk($_GET);
}
if (isset($_GET['keyword'])) {
   $produk = cari($_GET['keyword']);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <?php include '../aset/css/basic_css.html' ?>
   <link rel="stylesheet" href="../aset/css/my_style.css">
   <link rel="stylesheet" href="../aset/fontawesome47/css/font-awesome.min.css">
   <!-- <script src="https://kit.fontawesome.com/589a617315.js" crossorigin="anonymous"></script> -->


   <link rel="icon" type="image/png" href="../aset/img/pakis1.png">
   <title>Produk</title>
</head>

<body>
   <?php include '../navbar.php' ?>

   <!-- filter -->
   <a type="button" class="filter" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><img src="../aset/img/filter.png" width="50" alt=""></a>
   <!-- Modal -->
   <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
         <form method="POST" action="produk.php" class="d-inline">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="row">
                     <div class="col-md-6">
                        <label for="delaer" class="mb-2">Dealer</label>
                        <select name="dealer" class="form-select form-select-sm" id="dealer">
                           <?php foreach ($dealer as $view_dealer) : ?>
                              <option value="<?= $view_dealer['id_dealer'] ?>"><?= $view_dealer['nama_dealer'] ?></option>
                           <?php endforeach ?>
                        </select>
                     </div>
                     <div class="col-md-6">
                        <label for="jenis" class="mb-2">Jenis</label>
                        <select name="jenis" class="form-select form-select-sm" id="jenis">
                           <?php foreach ($jenis_produk as $view_jenis_produk) : ?>
                              <option value="<?= $view_jenis_produk['id_jenis_produk'] ?>"><?= $view_jenis_produk['jenis_produk'] ?></option>
                           <?php endforeach ?>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" name="filter" class="btn btn-primary btn-sm">Terapkan</button>
               </div>
            </div>
         </form>
      </div>
   </div>
   <!-- end modal filter-->

   <!-- konten -->
   <div class="konten">
      <?php if (empty($produk)) : ?>
         <div class="alert p-5 mt-5 text-center">
            <h5>Data Tidak Ditemukan</h5>
            <hr>
            <img src="../aset/img/sad.png" class="img-fluid" width="80">
            <a href="produk.php" class="d-block mt-5">Semua Produk</a>
         </div>
      <?php endif ?>
      <!-- <div class="text-white">
         <h5>Semua Produk</h5>
         <hr>
      </div> -->
      <div class="row row-cols-sm-6 g-4">
         <?php foreach ($produk as $view_produk) : ?>
            <div class="col">
               <div class="card h-100">
                  <a href="detail_produk.php?id=<?= $view_produk['id_produk'] ?>">
                     <img src="../admin/img_produk/<?= $view_produk['img_produk'] ?>" class="card-img-top img_product" alt="...">
                     <div class="card-body">
                        <h6 class="card-title mt-2"><?= $view_produk['nama_produk'] ?></h6>
                        <small class="text-muted"><b><?= $view_produk['jenis_produk'] ?></b></small>
                        <small class="text-muted d-block mt-1">Bahan aktif : <?= $view_produk['bahan_aktif'] ?></small>
                     </div>
                     <div class="card-footer">
                        <small class="text-muted"><b>Dealer : <?= $view_produk['nama_dealer'] ?></b></small>
                     </div>
                  </a>
               </div>
            </div>
         <?php endforeach ?>
      </div>
   </div>
   <!-- end konten -->

   <?php include '../aset/js/basic_js.html' ?>
   <?php include '../footer.php' ?>

</body>

</html>