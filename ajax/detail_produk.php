<?php
require '../functions/functions.php';
$produk = get_detail($_GET);
foreach ($produk as $view_produk)

?>
<div class="card">
   <div class="row g-0">
      <div class="col-md-8">
         <img src="../admin/img_produk/<?= $view_produk['img_produk'] ?>" class="img_des img-thumbnail" alt="...">
      </div>
      <div class="col-md-4">
         <div class="card-body">
            <a href="produk.php" class="kembali"><i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Kembali</a>
            <hr>
            <h6 class="text-muted mt-3"><?= $view_produk['jenis_produk'] ?></h6>
            <h4 class="card-title"><?= $view_produk['nama_produk'] ?></h4>
            <p class="card-text"><?= $view_produk['deskripsi_produk'] ?></p>
            <p class="card-text">
            <h6 class="text-muted">Dealer : <?= $view_produk['nama_dealer'] ?> </h6>
            </p>
            <hr>
            <h6>Kemasan</h6>
            <?php $kemasan = query_kemasan($view_produk['id_produk']) ?>
            <table class="table table-warning table-hover text-center mt-2">
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
   </div>
</div>