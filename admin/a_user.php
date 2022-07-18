<?php
require '../functions/functions.php';
$user = query("SELECT * FROM user");
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
   <title>Admin Users</title>
</head>

<body>
   <?php include 'navbar.php' ?>

   <h1>Users</h1>
   <hr>
   <table class="table table-striped table-bordered table-secondary table_user">
      <thead>
         <tr class="text-center">
            <th>No</th>
            <th>Email</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
         <?php
         $i = 1;
         foreach ($user as $view_user) : ?>
            <tr class="text-center">
               <td><?= $i++ ?></td>
               <td><?= $view_user['email'] ?></td>
               <td><?= date('d-m-Y H:i:s', strtotime($view_user['tanggal_daftar'])) ?></td>
               <td><?= $view_user['status'] ?></td>
               <td>
                  <?php if ($view_user['status'] === 'terkonfirmasi') : ?>
                     <a href="config/hapus_user.php?id=<?= $view_user['id_email'] ?>" onclick="return confirm('Hapus..?')" class="btn btn-danger btn-sm">Hapus</a>
                  <?php else : ?>
                     <a href="a_user.php?id=<?= $view_user['id_email'] ?>" onclick="return confirm('Konfirmasi..?')" class="btn btn-primary btn-sm">Konfirmasi</a>
                  <?php endif ?>
               </td>
            </tr>
         <?php endforeach ?>
      </tbody>
   </table>
   <?php include 'navbar_end.php' ?>

   <!-- untuk datatables -->
   <script src="../aset/datatables/datatables/js/jquery.dataTables.min.js"></script>
   <script src="../aset/datatables/datatables/js/dataTables.bootstrap4.min.js"></script>

   <script>
      $(document).ready(function() {
         $('.table_user').DataTable()
      })
   </script>

</body>

</html>

<?php
if (isset($_GET['id'])) {
   $id = $_GET['id'];
   mysqli_query($conn, "UPDATE user SET status = 'terkonfirmasi' WHERE id_email = $id");
   echo "<script>location='a_user.php'</script>";
}
?>