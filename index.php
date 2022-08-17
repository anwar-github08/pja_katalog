<?php
require 'functions/functions.php';
$data_delaer = query("SELECT * FROM dealer");
$jml_dealer = count($data_delaer);

$dealer = query("SELECT * FROM dealer ORDER BY nama_dealer ASC LIMIT 7");
$dealer_more = query("SELECT * FROM dealer ORDER BY nama_dealer ASC LIMIT 7,$jml_dealer");
if (isset($_POST['cari'])) {
   echo "<script>location='produk/produk.php?keyword=$_POST[keyword]'</script>";
   exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <?php include 'aset/css/basic_css.html' ?>
   <link rel="stylesheet" href="aset/css/my_style.css">
   <link rel="stylesheet" href="aset/fontawesome47/css/font-awesome.min.css">


   <link rel="icon" type="image/png" href="aset/img/pakis1.png">
   <title>Home</title>
</head>
<style>
   body {

      background: url(aset/img/wal1.jpg) no-repeat fixed;
      background-position: center;
      background-size: 100% 100%;
      color: white;
   }
</style>

<body>
   <!-- nav -->
   <div class="navbar-home">
      <nav class="navbar1 fixed-top">
         <ul>
            <li><a href="admin/akses/login_admin.php"><span class="fa fa-user fa-lg"></span></a></li>
         </ul>
      </nav>
   </div>
   <div class="container">
      <div class="konten-home">
         <div class="img-home">
            <img src="aset/img/pakis2.png" class="text-center" alt="">
         </div>
         <div class="search-home">
            <form method="POST">
               <input type="text" class="search" name="keyword" placeholder="Masukkan nama obat...." autocomplete="off">
               <button name="cari"></button>
            </form>
            <div class="saran"></div>
         </div>
         <div class="card-home">
            <div class="card-title">
               <p>Dealer Kami :</p>
            </div>
            <div class="grid-home">
               <?php foreach ($dealer as $view_dealer) : ?>
                  <a href="produk/produk.php?i=d&id=<?= $view_dealer['id_dealer'] ?>"><?= $view_dealer['nama_dealer'] ?></a>
               <?php endforeach ?>

               <!-- untuk acccordion tombol-->
               <a href="" class="collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">Tampilkan Lainnya..</a>
            </div>
            <!-- accordion isi -->
            <div id="flush-collapseOne" class="accordion-collapse collapse grid-home" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
               <?php foreach ($dealer_more as $view_dealer_more) : ?>

                  <a class="link-dealer accordion-body" href="produk/produk.php?i=d&id=<?= $view_dealer_more['id_dealer'] ?>"><?= $view_dealer_more['nama_dealer'] ?></a>
               <?php endforeach ?>
            </div>
         </div>
         <div class="row semua-produk justify-content-center text-center mt-4">
            <a href="produk/produk.php">Semua produk <span class="fa fa-arrow-right"></span></a>
         </div>
      </div>
   </div>

   <div class="footer-area">
      <div class="container">
         <div class="row konten-footer">
            <div class="col-md-4 profil">
               <h3><b>CV. PAKIS JAYA ABADI</b></h3>
               <p>Sebuah Perusahaan yang bergerak dibidang penjualan pestisida dan alat - alat pertanian.</p>
               <p>
                  Bersaing secara sehat dan ketat untuk dapat membantu dalam menyediakan barang-barang kebutuhan pertanian dan perkebunan sebagaimana keinginan pelanggan.
               </p>
            </div>
            <div class="col-md-4 alamat">
               <h3>Alamat</h3>
               <p>Jl. Kudus - Purwodadi Km. 15</p>
               <p>Kalirejo, Rt 01 / Rw 03, Undaan, Kudus</p>
               <p>Jawa Tengah, Indonesia, 59372</p>
               <p>
                  <a href="https://www.google.co.id/maps/place/CV.+Pakis+Jaya+Abadi/@-6.9271865,110.7886257,17z/data=!3m1!4b1!4m9!1m2!10m1!1e2!3m5!1s0x2e70c10f5c90a661:0xef3c6857a1d0762a!8m2!3d-6.9272022!4d110.7908596!16s%2Fg%2F11j12492jb?hl=en" target="blank" class="maps">Maps <img src="aset/img/map.png" alt="" width="30"></a>
               </p>
            </div>
            <div class="col-md-4 kontak">
               <h3>Hubungi Kami</h3>
               <h5 class="mb-4">Kantor :</h5>
               <p><span class="fa fa-phone fa-fw"></span><a target="blank" href="tel:02914248811"> 02914248811</a></p>
               <p><span class="fa fa-envelope fa-fw"></span><a target="blank" href="https://mail.google.com/mail"> cvpakisjayaabadikudus@gmail.com</a></p>
               <h5 class="mb-4">Sales Area :</h5>
               <p>Afandi : <span class="fa fa-whatsapp fa-fw"></span><a target="blank" href="https://wa.me/6285326278117"> +62 853-2627-8117</a></p>
               <p>Sunaji &nbsp;: <span class="fa fa-whatsapp fa-fw"></span><a target="blank" href="https://wa.me/6282220106055"> +62 822-2010-6055</a></p>
            </div>
         </div>
         <hr>
         <div class="terima-kasih">
            <p>Components By :</p> <a href="https://getbootstrap.com/docs/5.2/getting-started/introduction/" target="blank">Bootstrap.com</a> | <a href="https://www.flaticon.com/" target="blank">Flaticon.com</a> | <a href="https://fontawesome.com/v4/icons/" target="blank">Fontawesome.com</a> | <a href="https://unsplash.com/" target="blank">Unsplah.com</a>
         </div>
      </div>
      <div class="copyright-area text-center">
         <em>&copy; 2022 CV. Pakis Jaya Abadi</em>
      </div>
   </div>


   <?php include 'aset/js/basic_js.html' ?>

   <!-- untuk live search ajax -->
   <script>
      $(document).ready(function() {
         $('.search').keyup(function() {
            var keyword = $('.search').val();
            $('.saran').load("ajax/saran.php?keyword=" + keyword);

            if (keyword != "") {
               $(".card-home").hide()
            } else {
               $(".card-home").show()
            }
         })
      })
   </script>
</body>

</html>