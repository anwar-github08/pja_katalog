<?php
require '../functions/functions.php';
$keyword_produk = cari($_GET['keyword']);
?>

<?php if (empty($keyword_produk)) : ?>
   <div class="text-center alert p-5 mt-5">
      <h5>Data Tidak Ditemukan</h5>
      <hr>
      <img src="../aset/img/sad.png" class="img-fluid" width="80">
      <a href="produk.php" class="d-block mt-5">Semua Produk</a>
   </div>
<?php endif ?>
<div class="row row-cols-sm-6 g-4">
   <?php foreach ($keyword_produk as $view_produk) : ?>
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