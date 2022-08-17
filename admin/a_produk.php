<?php
require '../functions/functions.php';
$dealer = query("SELECT * FROM dealer ORDER BY nama_dealer ASC");
$jenis_produk = query("SELECT * FROM jenis_produk ORDER BY jenis_produk ASC");
if (isset($_POST['simpan'])) {
   simpanProduk();
} else {

   // hapus data di tmp_kemasan terlebih dahulu
   hapus_tmp_kemasan();
   // set id biar dimulai dari 1
   set_auto_increment("tmp_kemasan");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <?php include '../aset/css/basic_css.html' ?>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="../aset/select2/dist/css/select2.min.css">
   <link rel="stylesheet" href="../aset/fontawesome47/css/font-awesome.min.css">

   <link rel="icon" type="image/png" href="../aset/img/pakis1.png">
   <title>Admin Produk</title>
</head>

<body>
   <?php include 'navbar.php' ?>

   <h1>Input Produk</h1>
   <hr>
   <div class="row">
      <div class="col-md-6">
         <form method="POST" id="form-produk" name="form-produk" enctype="multipart/form-data">
            <div class="card">
               <div class="card-header">Input Produk</div>
               <div class="card-body">
                  <label for="id_dealer" class="mb-2">Dealer</label>
                  <select name="id_dealer" class="form-control">
                     <?php foreach ($dealer as $view_dealer) : ?>
                        <option value="<?= $view_dealer['id_dealer'] ?>"><?= $view_dealer['nama_dealer'] ?></option>
                     <?php endforeach ?>
                  </select>

                  <label for="id_jenis_produk" class="mb-2 mt-3">Jenis Produk</label>
                  <select name="id_jenis_produk" class="form-control mb-4">
                     <?php foreach ($jenis_produk as $view_jenis_produk) : ?>
                        <option value="<?= $view_jenis_produk['id_jenis_produk'] ?>"><?= $view_jenis_produk['jenis_produk'] ?></option>
                     <?php endforeach ?>
                  </select>

                  <label for="nama_produk" class="mb-2 mt-3">Nama Produk</label>
                  <input type="text" name="nama_produk" id="nama-produk" class="form-control" placeholder="nama produk..." autocomplete="off" required>

                  <label for="bahan_aktif" class="mb-2 mt-3">Bahan Aktif</label>
                  <input type="text" name="bahan_aktif" id="bahan-aktif" class="form-control" placeholder="bahan aktif.." autocomplete="off" required>

                  <label class="form-label mt-3">Foto Produk</label>
                  <input type="file" class="form-control" id="img-produk" name="img_produk" required>

                  <label for="deskripsi" class="mb-2 mt-3">Deskripsi</label>
                  <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control"></textarea>
               </div>

               <div class="card-footer">
                  <button type="submit" name="simpan" class="simpan" style="display:none"></button>
               </div>
            </div>
         </form>
      </div>

      <div class="col-md-6">
         <div class="card">
            <div class="card-header">Input Kemasan</div>
            <form method="POST" id="form-kemasan" style="display: inline;">
               <div class="card-body">
                  <label for="volume" class="mb-2">Volume</label>
                  <input type="text" name="volume" class="form-control volume" id="volume" placeholder="Cth: 100 ML, 1 LT, 200 GR" autocomplete="off">
                  <p class="text-danger err-volume"></p>

                  <label for="isi" class="mb-2">isi Per Box</label>
                  <div class="input-group">
                     <input type="text" name="isi" class="form-control isi" id="isi" onkeypress="return hanyaAngka(event)" placeholder="isi / box" autocomplete="off">
                     <a class="btn btn-success tambah">Tambah</a>
                  </div>
                  <p class="text-danger err-isi"></p>

                  <!-- load data kemasan -->
                  <label class="mb-2">Data Kemasan</label>
                  <div class="data-kemasan"></div>
               </div>
            </form>

            <div class="card-footer">
               <a class="btn btn-danger batal" style="width: 19%;">Batal</a>
               <button class="btn btn-primary trigger" style="width: 80%">Simpan</button>
            </div>
         </div>
      </div>
   </div>

   <?php include 'navbar_end.php' ?>
   <script>
      navActive("produk")
   </script>

   <script src="../aset/select2/dist/js/select2.min.js"></script>

   <!-- panggil js -->
   <script src="js/js_produk.js"></script>
</body>

</html>