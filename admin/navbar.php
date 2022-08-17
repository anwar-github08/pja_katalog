   <?php
   session_start();
   if (!isset($_SESSION['user'])) {
      echo "<script>location='akses/login_admin.php'</script>";
      exit();
   }

   $users = hitungUsers();
   ?>

   <div class="row p-0">
      <div class="col-md-2">
         <ul class="nav flex-column">
            <!-- <li class="nav-item text-center">
               <a href="a_user.php">
                  <img src="../aset/img/man.png" width="80" alt="">
                  <?php if ($users > 0) : ?>
                     <span class="position-absolute translate-middle badge rounded-pill bg-primary"><?= $users ?></span>
                  <?php endif ?>
               </a>
            </li>
            <hr> -->
            <li class=" nav-item">
               <a class="nav-link dashboard" href="index.php"><i class="fa fa-tachometer fa-fw" aria-hidden="true"></i> Dashboard</a>
            </li>
            <hr>
            <li class=" nav-item">
               <a class="nav-link dealer" href="a_dealer.php"><i class="fa fa-database fa-fw" aria-hidden="true"></i> Dealer</a>
            </li>
            <hr>
            <li class="nav-item">
               <a class="nav-link jenisProduk" href="a_jenis_produk.php"><i class="fa fa-cubes fa-fw" aria-hidden="true"></i> Jenis Produk</a>
            </li>
            <hr>
            <li class="nav-item">
               <a class="nav-link produk" href="a_tampil_produk.php"><i class="fa fa-cube fa-fw" aria-hidden="true"></i> Produk</a>
            </li>
            <hr>
            <li class="nav-item">
               <a class="nav-link cetak" href="a_cetak.php"><i class="fa fa-print fa-fw" aria-hidden="true"></i> Cetak</a>
            </li>
            <hr>
            <li class="nav-item">
               <a class="nav-link" onclick="return confirm('Ke halaman utama..?')" href="../index.php"><i class="fa fa-home fa-fw" aria-hidden="true"></i> Halaman Utama</a>
            </li>
            <hr>
            <li class="nav-item">
               <a href="akses/logout.php" onclick="return confirm('Logout..?')" class="nav-link"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i> Logout</a>
            </li>
            <hr class="mb-5">
         </ul>
      </div>
      <div class="col-md-10 p-5">