<?php
switch(@$_GET[act]){
//tampil user
	default:
	echo "<h2>Makanan</h2>
	
	<table class='table'>
		<tr>
			<th scope='col'>No</th><th scope='col'>Foto</th><th scope='col'>Nama</th><th scope='col'>Resep</th><th scope='col'>Asal Daerah</th><th scope='col'>Aksi</th>
		</tr>";
		$tampil=mysqli_query($koneksi,"select * from makanan order by id_makanan asc");
		$no=1;
		while ($r=mysqli_fetch_array($tampil)) {
			echo "<tr>
			<td>$no</td>
			<td><img width='50' height='50' src ='images/$r[foto_makanan]'></td>
			<td>$r[nama_makanan]</td>
			<td>$r[resep_makanan]</td>
			<td>$r[daerah_makanan]</td>
			<td><a class='btn btn-primary' href=?module=makanan&act=editmakanan&id=$r[id_makanan]>Edit</a>
				<a class='btn btn-danger' href=\"aksi.php?module=makanan&act=hapus&id=$r[id_makanan]\" onClick=\"return confirm('apakah anda benar akan menghapus data makanan $r[id_makanan]?')\">Hapus</a>
			</td></tr>";
			$no++;
		}
		echo "</table><form method=post action='?module=makanan&act=tambahmakanan'>
	

		<input type=submit class='btn btn-primary' value='Tambah Makanan'>
	</form>"
		;
		break;
//tambah user
					case "tambahmakanan":
					echo "<h2>Tambah Makanan</h2>
					<form method=post action='aksi.php?module=makanan&act=input' enctype='multipart/form-data'>
					<div class='col-md-5'>
			  			
			  				<div class='form-group'>
			    				<input class='form-control' name='nama_makanan' type='text' id='nama_makanan' placeholder='Nama Makanan'>
			  				</div>
			  				<div class='form-group'>
			    				<textarea class='mytextarea' name='resep_makanan' type='text' id='mytextarea' placeholder='Resep Makanan'></textarea>
			  				</div>
			  				<div class='form-group'>
			    				<input class='form-control' name='daerah_makanan' type='text' id='daerah_makanan' placeholder='Daerah Makanan'>
			  				</div>
			  				<div class='form-group'>
			    				<input class='form-control'type='file' name='foto' >
			  				</div>

			  				<input type='submit' class='btn btn-primary' name='submit' value='Simpan'>
			  				<input type=button class='btn btn-danger' value=Batal onclick=self.history.back()>
						</div>
								</form>";
								break;

//edit user
					case "editmakanan":
					$edit=mysqli_query($koneksi,"select * from makanan where
						id_makanan='$_GET[id]'");
					$r=mysqli_fetch_array($edit);
					echo "<h2>Edit Makanan</h2>
					<form method=post action='aksi.php?module=makanan&act=update' enctype='multipart/form-data'>
					<div class='col-md-5'>
			  				<div class='form-group'>
			  					<input type='hidden' name='id' value='$r[id_makanan]'>
			    				<input class='form-control' name='nama_makanan' type='text' id='nama_makanan'>
			  				</div>
			  				<div class='textarea'>
			    				<input class='form-control' name='resep_makanan' type='text' id='mytextarea'>
			  				</div>
			  				<br>
			  				<div class='form-group'>
			    				<input class='form-control' name='daerah_makanan' type='text' id='daerah_makanan' placeholder='Daerah makanan'>
			  				</div>
			  				<div class='form-group'>
			    				<input class='form-control' name='foto' type='file'>
			  				</div>
			  				<br>
			  				<input type='submit' class='btn btn-primary' name='submit' value='Update'>
			  				<input type=button class='btn btn-danger' value=Batal onclick=self.history.back()>
						</div>
								</form>";
								break;
//edit Password case "gantipwd":
				// case"gantipwd":
				// $edit=mysqli_query($koneksi, "select * from admin where id_user='$_GET[id]'");
				// $r=mysqli_fetch_array($edit); echo "<h2>Ganti Password</h2>
				// <form method=post 
				// 	action='aksi.php?module=user&act=gantipwd'>
				// 	<input type=hidden name=id value='$r[id_user]'>
				// 	<input type=hidden name=pwd_lama1 value='$r[password]'>
				// 	<table>
				// 		<tr><td>Password Lama</td>
				// 			<td> : <input type=password name=pwd_lama2></td>
				// 		</tr>
				// 		<tr>
				// 			<td>Password Baru</td>
				// 			<td> : <input type=password name=pwd_baru1></td></tr>
				// 		<tr>
				// 			<td>Ulangi Password Baru</td>
				// 			<td> : <input type=password name=pwd_baru2></td>
				// 		</tr>
				// 		<tr>
				// 		    <td colspan=2><input type=submit value='Ganti Password'>
				// 			<input type=button value=Batal onclick=self.history.back()>
				// 			</td>
				// 		</tr>
				// 	</table></form>"; 
				// 	break;
	}
	?> 
	<script type="text/javascript" src="../tinymce/tinymce.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: "#mytextarea"
        });
    </script>