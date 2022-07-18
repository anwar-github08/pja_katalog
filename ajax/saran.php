<?php
require '../functions/functions.php';
?>

<?php if ($_GET['keyword'] == "") : ?>

<?php else : ?>
   <?php $saran = saran($_GET['keyword']); ?>
   <?php if (empty($saran)) : ?>
      <li>Data Tidak Ditemukan</li>
   <?php else : ?>
      <p>Mungkin maksud anda :</p>
      <?php foreach ($saran as $view_saran) : ?>
         <li><a href="produk/produk.php?keyword=<?= $view_saran['nama_produk'] ?>"><?= $view_saran['nama_produk'] ?></a></li>
      <?php endforeach ?>
   <?php endif ?>
<?php endif ?>