<?php include '../../config/koneksi.php' ?>

<table class="table table-striped table-secondary table-bordered table-jenis-produk">
   <thead>
      <tr class="text-center">
         <th>No</th>
         <th>Jenis Produk</th>
         <th>Aksi</th>
      </tr>
   </thead>
   <tbody>
      <?php
      $no = 1;
      $query = mysqli_query($conn, "SELECT * FROM jenis_produk");
      while ($view = mysqli_fetch_assoc($query)) :;
      ?>
         <tr class="text-center">
            <td><?= $no++ ?></td>
            <td contenteditable onblur="liveEdit(<?= $view['id_jenis_produk'] ?>)" id="<?= $view['id_jenis_produk'] ?>"><?= $view['jenis_produk'] ?></td>
            <td>
               <a class="btn btn-danger hapus-data" onclick="hapus(<?= $view['id_jenis_produk'] ?>)"><i class="fa fa-trash"></i></a>
            </td>
         </tr>
      <?php endwhile ?>
   </tbody>
</table>


<script>
   $(document).ready(function() {
      $('.table-jenis-produk').DataTable()
   })
</script>

<script>
   function liveEdit(id) {
      if (confirm("ubah..?")) {
         var id = id;
         var jenis_produk = document.getElementById(id).textContent;
         var data = 'id=' + id + '&jenis_produk=' + jenis_produk;

         $.ajax({
            type: "POST",
            url: "config/ubah_data_jenis_produk.php",
            data: data,
            success: function() {
               $(".data-jenis-produk").load("config/data_jenis_produk.php");
            }
         })
      } else {
         $(".data-jenis-produk").load("config/data_jenis_produk.php");
      }

   }

   function hapus(id) {
      if (confirm("hapus..?")) {
         var id = id;
         $.ajax({
            type: "POST",
            url: "config/hapus_jenis_produk.php",
            data: "id=" + id,
            success: function() {
               $(".data-jenis-produk").load("config/data_jenis_produk.php");
            }
         })
      } else {
         $(".data-jenis-produk").load("config/data_jenis_produk.php");
      }
   }
</script>