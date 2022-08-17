<?php
$dealer = query("SELECT * FROM dealer ORDER BY nama_dealer ASC");
$jenis_produk = query("SELECT * FROM jenis_produk ORDER BY jenis_produk ASC");
if (isset($_POST['cari'])) {
   echo "<script>location='produk.php?keyword=$_POST[keyword]'</script>";
   exit();
}
?>
<nav class="navbar navbar-expand-lg sticky-top">
   <div class="container">
      <a class="navbar-brand" href="#">
         <img src="../aset/img/pakis1.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
         <b class="text-white">&nbsp; K A T A L O G.</b>
      </a>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
               <a class="nav-link" aria-current="page" href="../index.php"><i class="fa fa-home fa-fw" aria-hidden="true"></i> Home</a>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-database fa-fw" aria-hidden="true"></i> Dealer
               </a>
               <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <?php foreach ($dealer as $view_dealer) : ?>
                     <li><a class="dropdown-item" href="produk.php?i=d&id=<?= $view_dealer['id_dealer'] ?>"><?= $view_dealer['nama_dealer'] ?></a></li>
                  <?php endforeach ?>
                  <hr>
                  <li><a class="dropdown-item" href="produk.php">Semua Produk</a></li>
               </ul>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-braille fa-fw" aria-hidden="true"></i> Jenis Produk
               </a>
               <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <?php foreach ($jenis_produk as $view_jenis_produk) : ?>
                     <li><a class="dropdown-item" href="produk.php?i=j&id=<?= $view_jenis_produk['id_jenis_produk'] ?>"><?= $view_jenis_produk['jenis_produk'] ?></a></li>
                  <?php endforeach ?>
                  <hr>
                  <li><a class="dropdown-item" href="produk.php">Semua Produk</a></li>
               </ul>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="produk.php"><i class="fa fa-cubes fa-fw" aria-hidden="true"></i> Semua Produk</a>
            </li>
         </ul>
      </div>
      <!-- end collapse -->
      <form class="d-flex" role="search" method="POST">
         <input class="form-control me-2 form-control-sm" name="keyword" placeholder="Masukkan kata kunci.." aria-label="Search" id="keyword" autocomplete="off">
         <button class="search-navbar" name="cari"></button>
      </form>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
   </div>
</nav>
<!-- end nav -->

<!-- button whatsapp -->

<a href="https://wa.me/6282133593848" onclick="return confirm('Hubungi admin..?')" target="blank" class="whatsapp"><img src="../aset/img/cs.png" width="60" alt=""></a>


<!-- konten -->
<div class="container">