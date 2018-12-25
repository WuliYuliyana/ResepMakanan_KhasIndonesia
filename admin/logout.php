<?php
session_start();
include "../include/koneksi.php";
if (empty (empty($_SESSION['username'])))

{
exit("<script>window.alert('Anda Harus Login Terlebih Dahulu');
 window.location='index.php';
 </script>");
}
session_destroy();
exit("<script>window.alert('Thank You');
 window.location='index.php';</script>");
?>
