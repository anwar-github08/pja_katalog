<?php
require '../functions/functions.php';
$produk = query("SELECT * FROM produk JOIN dealer ON dealer.id_dealer = produk.id_dealer JOIN jenis_produk ON jenis_produk.id_jenis_produk = produk.id_jenis_produk");
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <?php include '../aset/css/basic_css.html' ?>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="../aset/fontawesome47/css/font-awesome.min.css">
   <link rel="stylesheet" href="../aset/datatables/datatables/css/dataTables.bootstrap4.min.css">

   <link rel="icon" type="image/png" href="../aset/img/pakis1.png">
   <title>Admin Produk</title>
</head>

<body>
   <?php include 'navbar.php' ?>

   <h1>Produk</h1>
   <hr>

   <a href="a_produk.php" class="btn btn-primary btn-sm mb-2"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>Tambah</a>
   <table class="table table-striped table-bordered table-secondary table_produk">
      <thead>
         <tr class="text-center">
            <th>No</th>
            <th style="width: 1%;">Gambar</th>
            <th>Produk</th>
            <th style="width: 30%;">Deskripsi</th>
            <th>Dealer</th>
            <th>Jenis Produk</th>
            <th>Kemasan</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
         <?php
         $i = 1;
         foreach ($produk as $view_produk) : ?>
            <tr class="text-center">
               <td><?= $i++ ?></td>
               <td><img src="img_produk/<?= $view_produk['img_produk'] ?>" width="30"></td>
               <td><?= $view_produk['nama_produk'] ?></td>
               <td style="text-align:justify"><?= $view_produk['deskripsi_produk'] ?></td>
               <td><?= $view_produk['nama_dealer'] ?></td>
               <td><?= $view_produk['jenis_produk'] ?></td>
               <td>
                  <a href="" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modalKemasan<?= $view_produk['id_produk'] ?>">Kemasan</a>

                  <!-- Modal -->
                  <div class="modal fade" id="modalKemasan<?= $view_produk['id_produk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Kemasan</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <div class="modal-body">
                              <table class="table table-striped table-bordered">
                                 <thead>
                                    <tr>
                                       <th>Volume</th>
                                       <th>Isi Per Box</th>
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
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- endmodals -->

               </td>
               <td>
                  <a href="cetak/cetak_produk.php?id=<?= $view_produk['id_produk'] ?>" target="blank" class="btn btn-info btn-sm"><i class="fa fa-print fa-fw"></i></a>
                  <a href="a_ubah_produk.php?id=<?= $view_produk['id_produk'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-fw" aria-hidden="true"></i></a>
                  <a href="config/hapus_produk.php?id=<?= $view_produk['id_produk'] ?>&img=<?= $view_produk['img_produk'] ?>" onclick="return confirm('hapus..?')" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-fw" aria-hidden="true"></i></a>
               </td>
            </tr>
         <?php endforeach ?>
      </tbody>
   </table>
   <?php include 'navbar_end.php' ?>
   <script>
      navActive("produk")
   </script>

   <!-- untuk datatables -->
   <script src="../aset/datatables/datatables/js/jquery.dataTables.min.js"></script>
   <script src="../aset/datatables/datatables/js/dataTables.bootstrap4.min.js"></script>

   <script>
      $(document).ready(function() {
         $('.table_produk').DataTable()
      })
   </script>

</body>

</html>