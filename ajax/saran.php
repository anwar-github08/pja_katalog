<?php
require '../functions/functions.php';
?>

<?php if ($_GET['keyword'] == "") : ?>

<?php else : ?>

   <?php $saran = cari($_GET['keyword']); ?>

   <?php if (empty($saran)) : ?>
      <li>Data Tidak Ditemukan</li>

   <?php else : ?>

      <table class="table table-bordered text-center text-white mt-4">
         <thead>
            <tr>
               <th>Gambar</th>
               <th>Produk</th>
               <th>Dealer</th>
               <th>Bahan Aktif</th>
               <th>Jenis Produk</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($saran as $view_produk) : ?>
               <tr>
                  <td><a href="produk/detail_produk.php?id=<?= $view_produk['id_produk'] ?>"><img src="admin/img_produk/<?= $view_produk['img_produk'] ?>" width="50"></a></td>
                  <td><a href="produk/detail_produk.php?id=<?= $view_produk['id_produk'] ?>"><?= $view_produk['nama_produk'] ?></a></td>
                  <td><a href="produk/produk.php?keyword=<?= $view_produk['nama_dealer'] ?>"><?= $view_produk['nama_dealer'] ?></a></td>
                  <td><a href="produk/produk.php?keyword=<?= $view_produk['bahan_aktif'] ?>"><?= $view_produk['bahan_aktif'] ?></a></td>
                  <td><a href="produk/produk.php?keyword=<?= $view_produk['jenis_produk'] ?>"><?= $view_produk['jenis_produk'] ?></a></td>
               </tr>
            <?php endforeach ?>
         </tbody>
      </table>

   <?php endif ?>
<?php endif ?>