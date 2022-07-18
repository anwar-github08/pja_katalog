<?php include '../../config/koneksi.php' ?>

<table class="table table-secondary table-striped table-bordered table-dealer">
   <thead>
      <tr class="text-center">
         <th>No</th>
         <th>Nama Dealer</th>
         <th>Aksi</th>
      </tr>
   </thead>
   <tbody>
      <?php
      $no = 1;
      $query = mysqli_query($conn, "SELECT * FROM dealer");
      while ($view = mysqli_fetch_assoc($query)) :;
      ?>
         <tr class="text-center">
            <td><?= $no++ ?></td>
            <td contenteditable onblur="liveEdit(<?= $view['id_dealer'] ?>)" id="<?= $view['id_dealer'] ?>"><?= $view['nama_dealer'] ?></td>
            <td>
               <a class="btn btn-danger hapus-data" onclick="hapus(<?= $view['id_dealer'] ?>)" id="<?= $view['id_dealer'] ?>"><i class="fa fa-trash"></i></a>
            </td>
         </tr>
      <?php endwhile ?>
   </tbody>
</table>

<script>
   $(document).ready(function() {
      $('.table-dealer').DataTable()
   })
</script>

<script>
   function liveEdit(id) {
      if (confirm("ubah..?")) {
         var id = id;
         var nama_dealer = document.getElementById(id).textContent;
         var data = 'id=' + id + '&nama_dealer=' + nama_dealer;

         $.ajax({
            type: "POST",
            url: "config/ubah_data_dealer.php",
            data: data,
            success: function() {
               $(".data-dealer").load("config/data_dealer.php");
            }
         })
      } else {
         $(".data-dealer").load("config/data_dealer.php");
      }
   }

   function hapus(id) {
      if (confirm("hapus..?")) {
         var id = id;
         $.ajax({
            type: "POST",
            url: "config/hapus_dealer.php",
            data: "id=" + id,
            success: function() {
               $(".data-dealer").load("config/data_dealer.php");
            }
         })
      } else {
         $(".data-dealer").load("config/data_dealer.php");
      }
   }
</script>