<?php
include '../../config/koneksi.php';
session_start();
session_unset();
session_destroy();
echo "<script>location='../index.php'</script>";
