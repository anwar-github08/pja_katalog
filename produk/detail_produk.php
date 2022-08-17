<?php
require '../functions/functions.php';

if (isset($_GET['id'])) {
   $produk = get_detail($_GET);
}

foreach ($produk as $view_produk)
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

   <link rel="icon" type="image/png" href="../aset/img/pakis1.png">
   <title>Detail Produk</title>
</head>

<body>
   <?php include '../navbar.php' ?>

   <!-- konten -->
   <div class="konten">
      <div class="row g-2">
         <div class="col-md-8">
            <div class="detail-produk">
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
            </div>
         </div>

         <!-- produk sejenis -->
         <?php $produk_sejenis = query_produk_sejenis($view_produk['id_jenis_produk']) ?>
         <div class="col-md-4">
            <div class="produk_serupa">
               <div class="card">
                  <div class="card-header mt-3"><b>Produk Sejenis | <i><a href="produk.php?i=j&id=<?= $view_produk['id_jenis_produk'] ?>"><?= $view_produk['jenis_produk'] ?></a></i></b></div>
                  <div class="card-body">
                     <div class="row row-cols-sm-3 g-3 mb-3">
                        <?php foreach ($produk_sejenis as $view_produk_sejenis) : ?>
                           <div class="col">
                              <div class="card h-100">
                                 <a href="#" class="produk-sejenis" id="<?= $view_produk_sejenis['id_produk'] ?>">
                                    <img src="../admin/img_produk/<?= $view_produk_sejenis['img_produk'] ?>" class="card-img-top img_product" alt="...">
                                    <div class="card-body">
                                       <small class="text-white text-center"><?= $view_produk_sejenis['nama_produk'] ?></small>
                                    </div>
                                    <div class="card-footer"></div>
                                 </a>
                              </div>
                           </div>
                        <?php endforeach ?>
                     </div>

                     <?php $jml_produk_sejenis = jml_produk_sejenis($view_produk['id_jenis_produk']) ?>
                     <?php if (count(jml_produk_sejenis($view_produk['id_jenis_produk'])) > 6) : ?>

                        <!-- untuk acccordion tombol-->
                        <div class="row text-center justify-content-center">
                           <a href="#" class="collapsed a-more" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">Tampilkan Lainnya..</a>
                        </div>

                        <!-- accordion isi -->
                        <?php $count ?>
                        <div class="row row-cols-sm-3 g-3 mt-3 mb-5">
                           <?php $produk_sejenis = query_produk_sejenis_more($view_produk['id_jenis_produk']) ?>
                           <?php foreach ($produk_sejenis as $view_produk_sejenis) : ?>
                              <div id="flush-collapseOne" class="col accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                 <div class="card h-100">
                                    <a href="#" class="produk-sejenis" id="<?= $view_produk_sejenis['id_produk'] ?>">
                                       <img src="../admin/img_produk/<?= $view_produk_sejenis['img_produk'] ?>" class="card-img-top img_product" alt="...">
                                       <div class="card-body">
                                          <small class="text-white text-center"><?= $view_produk_sejenis['nama_produk'] ?></small>
                                       </div>
                                       <div class="card-footer"></div>
                                    </a>
                                 </div>
                              </div>
                           <?php endforeach ?>
                        </div>
                     <?php endif ?>

                  </div>

               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   <!-- end konten -->

   <?php include '../aset/js/basic_js.html' ?>
   <?php include '../footer.php' ?>

   <script>
      $(document).ready(function() {
         $('.produk-sejenis').click(function() {
            var id_produk = $(this).attr('id');
            $('.detail-produk').load("../ajax/detail_produk.php?id=" + id_produk);
         })
      })
   </script>

</body>

</html>