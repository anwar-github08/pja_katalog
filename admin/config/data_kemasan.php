<?php include '../../config/koneksi.php' ?>

<table class="table table-striped table-bordered">
   <thead>
      <tr class="text-center">
         <th>Volume</th>
         <th>Isi Per Box</th>
         <th>Aksi</th>
      </tr>
   </thead>
   <tbody>
      <?php
      $query = mysqli_query($conn, "SELECT * FROM tmp_kemasan");
      while ($view = mysqli_fetch_assoc($query)) :;
      ?>
         <tr class="text-center">
            <td contenteditable id="<?= $view['id_tmp_kemasan'] ?>_tmp_volume" class="td-tmp-volume"><?= $view['volume'] ?></td>
            <td contenteditable id="<?= $view['id_tmp_kemasan'] ?>_tmp_isi_per_box" class="td-tmp-isi-per-box"><?= $view['isi_per_box'] ?></td>
            <td><a class="btn btn-danger hapus-data" id="<?= $view['id_tmp_kemasan'] ?>"><i class="fa fa-trash"></i></a></td>
         </tr>
      <?php endwhile ?>
   </tbody>
</table>
<input type="hidden" value="<?= mysqli_num_rows($query) ?>" id="count-kemasan">


<script>
   $(document).ready(function() {
      // trigger ketika tombol trigger dipencet ->tombol simpan click
      $(".trigger").click(function() {
         $(".simpan").click();
      });

      // untuk validasi jika kemasan kosong
      count_kemasan = $("#count-kemasan").val();
      if (count_kemasan == 0) {
         $(".trigger").prop("disabled", true);
      } else {
         $(".trigger").prop("disabled", false);
      }

      // fungsi hapus data
      $(".hapus-data").click(function() {
         var id = $(this).attr("id");
         $.ajax({
            type: "POST",
            url: "config/hapus_tmp_kemasan.php",
            data: "id=" + id,
            success: function() {
               $(".data-kemasan").load("config/data_kemasan.php");
            },
         });
      });

      // fungsi live ubah kolom volume
      $(".td-tmp-volume").blur(function() {
         var id = $(this).attr("id");
         var volume = document.getElementById(id).textContent;
         var data = "id=" + id + "&volume=" + volume + "&key=volume";

         $.ajax({
            type: "POST",
            url: "config/ubah_data_kemasan.php",
            data: data,
            success: function() {
               $(".data-kemasan").load("config/data_kemasan.php");
            },
         });
      });

      // fungsi live ubah kolom isi
      $(".td-tmp-isi-per-box").blur(function() {
         var id = $(this).attr("id");
         var isi_per_box = document.getElementById(id).textContent;
         var data = "id=" + id + "&isi_per_box=" + isi_per_box + "&key=isi_per_box";

         $.ajax({
            type: "POST",
            url: "config/ubah_data_kemasan.php",
            data: data,
            success: function() {
               $(".data-kemasan").load("config/data_kemasan.php");
            },
         });
      });
   });
</script>