<?php
include "../include/koneksi.php";
//bagian home admin
if ($_GET['module']=='home') {
	echo "<h2>Halaman Utama</h2><br
	<p class=welcome>Selamat Datang admin,
		silahkan klik menu pilihan disebelah kiri untuk mengelola konten resep makanan.<br> Terima Kasih</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>";
		}
//bagian user
		elseif ($_GET['module']=='makanan') {
			include "modul/makanan.php";
		}
// Apabila modul tidak ditemukan
		else{
			echo "<p><b>MODUL BELUM ADA</b></p>";
		}
		?>