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
            <h4 class="card-title"><?= $view_produk['nama_produk'] ?></h4>
            <h6 class="mt-3"><a href="produk.php?i=j&id=<?= $view_produk['id_jenis_produk'] ?>"><?= $view_produk['jenis_produk'] ?></a></h6>
            <h6>Dealer : <a href="produk.php?i=d&id=<?= $view_produk['id_dealer'] ?>"><?= $view_produk['nama_dealer'] ?></a></h6>
            <hr>
            <span>Bahan Aktif : <i><?= $view_produk['bahan_aktif'] ?></i></span>
            <h6 class="mt-3">Deskripsi</h6>
            <p class="card-text" style="text-align:justify"><?= $view_produk['deskripsi_produk'] ?></p>
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