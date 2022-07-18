</div>
<!-- end container -->
<div class="footer-area">
   <div class="container">
      <div class="row konten-footer">
         <div class="col-md-4 profil">
            <h3><b>CV. PAKIS JAYA ABADI</b></h3>
            <p>Sebuah Perusahaan yang bergerak dibidang distributor pestisida dan alat - alat pertanian.</p>
            <p>
               Siap membantu dalam menyediakan barang-barang kebutuhan pertanian dan perkebunan, bersaing secara sehat dan ketat untuk dapat memenuhi kebutuhan jasa penyediaan obat-obat pertanian, pendistributor dan supplier sebagaimana keinginan pelanggan.
            </p>
         </div>
         <div class="col-md-4 kontak">
            <h3>Kontak</h3>
            <p><span class="fa fa-phone-square fa-fw"></span><a target="blank" href="tel:+6281325748661"> +62 813-2574-8661</a></p>
            <p><span class="fa fa-envelope fa-fw"></span><a target="blank" href="sms:+6281325748661"> +62 813-2574-8661</a></p>
            <p><span class="fa fa-whatsapp fa-fw"></span><a target="blank" href="https://wa.me/6281325748661"> +62 813-2574-8661</a></p>
            <p><span class="fa fa-phone fa-fw"></span><a target="blank" href="tel:02914248811"> 02914248811</a></p>
         </div>
         <div class="col-md-4 alamat">
            <h3>Alamat</h3>
            <p>Jl. Kudus - Purwodadi Km. 15</p>
            <p>Kalirejo, Rt 01 / Rw 03, Undaan, Kudus</p>
            <p>Jawa Tengah, Indonesia, 59372
               <a href="https://www.google.co.id/maps/place/CV.+Pakis+Jaya+Abadi/@-6.9271865,110.7886257,17z/data=!3m1!4b1!4m9!1m2!10m1!1e2!3m5!1s0x2e70c10f5c90a661:0xef3c6857a1d0762a!8m2!3d-6.9272022!4d110.7908596!16s%2Fg%2F11j12492jb?hl=en" target="blank" class="maps"><img src="../aset/img/map.png" alt="" width="30"></a>
            </p>
         </div>
      </div>
      <hr>
      <div class="terima-kasih">
         <p>Special Thank's :</p> <a href="https://getbootstrap.com/docs/5.2/getting-started/introduction/" target="blank">Bootstrap.com</a> | <a href="https://www.flaticon.com/" target="blank">Flaticon.com</a> | <a href="https://fontawesome.com/v4/icons/" target="blank">Fontawesome.com</a> | <a href="https://unsplash.com/" target="blank">Unsplah.com</a>
      </div>
   </div>
   <div class="copyright-area text-center">
      <em>&copy; 2022 CV. Pakis Jaya Abadi</em>
   </div>
</div>

<!-- untuk live search ajax produk dan detail produk -->
<script>
   $(document).ready(function() {
      $('#keyword').keyup(function() {
         var keyword = $('#keyword').val();
         $('.konten').load("../ajax/search_produk.php?keyword=" + keyword);
      })
   })
</script>