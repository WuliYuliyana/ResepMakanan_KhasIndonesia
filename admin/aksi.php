<?php
include "../include/koneksi.php";
$module=$_GET['module'];
$act=$_GET['act'];
//$id=$_GET['id'];
//delete data dalam database
if ($module=='makanan' AND $act=='hapus') {
	mysqli_query($koneksi,"delete from makanan where
		id_makanan='$_GET[id]'");
	header('location:server.php?module=makanan');
}
//bagian user

//galeri user
elseif ($module=='makanan' and $act=='input')
{
$set = true;
$msg = "";
//tentukan variabel file yg diupload dan tipe file
$tipe_file	= $_FILES['foto']['type'];
$lokasi_file = $_FILES['foto']['tmp_name'];
$nama_file	= $_FILES['foto']['name'];
$save_file =move_uploaded_file($lokasi_file,"images/$nama_file");

if(empty($lokasi_file))
{
$set=false;
$msg= $msg.'Upload gagal, Anda Lupa Mengambil Gambar..';
}
else
{
//tentukan tipe file harus image 
if ($tipe_file != "image/gif" and
$tipe_file != "image/jpeg" and
$tipe_file != "image/jpg" and
$tipe_file != "image/pjpeg" and
$tipe_file != "image/png")
{
$set=false;
$msg= $msg. 'Upload gagal, tipe file harus image..';
}
else
{
isset($save_file);
}
//replace di server 
if($save_file)
{
chmod("images/$nama_file", 0777);
}
else
{
$msg = $msg.'Upload Image gagal..';
$set =	false;
}
}
if($set)
{

$nama =$_POST['nama_makanan'];
$res =$_POST['resep_makanan'];
$dae =$_POST['daerah_makanan'];

$sql=mysqli_query($koneksi,"insert into makanan(foto_makanan,nama_makanan,resep_makanan,daerah_makanan)values('$nama_file','$nama','$res','$dae')");
$msg= $msg.'Upload Galeri Sukses..';
print "<meta http-equiv=\"refresh\" content=\"1;URL=server.php?module=makanan\">";
}
echo "$msg";
}

//Update galeri
elseif ($module=='makanan' and $act=='update')
{
$set = true;
$msg = "";

//tentukan variabel file yg diupload dan tipe file
$tipe_file	= $_FILES['foto']['type'];
$lokasi_file = $_FILES['foto']['tmp_name'];
$nama_file	= $_FILES['foto']['name'];
$save_file =move_uploaded_file($lokasi_file,"images/$nama_file");

if(empty($lokasi_file))
{
isset($set);
}
else
{
//tentukan tipe file harus image 
	if ($tipe_file != "image/gif" and
$tipe_file != "image/jpeg" and
$tipe_file != "image/jpg" and
$tipe_file != "image/pjpeg" and
$tipe_file != "image/png")
{
$set=false;
$msg= $msg. 'Upload gagal, tipe file harus image..';
}
else
{
$unlink=mysqli_query($koneksi, "select * from makanan where id_makanan='$_POST[id]'");
$CekLink=mysqli_fetch_array($unlink); 
if(!empty($CekLink['foto_makanan']));
{
unlink("images/$CekLink[foto_makanan]");
}
isset($save_file);
}

//replace di server 
if($save_file)
{
chmod("images/$nama_file", 0777);
}
else
{
$msg = $msg.'Upload Image gagal..';
$set =	false;
}
}
if($set)
{

$id =$_POST['id'];
$nama =$_POST['nama_makanan'];
$res =$_POST['resep_makanan'];
$dae =$_POST['daerah_makanan'];

if(empty($lokasi_file))
{
mysqli_query($koneksi, "update makanan set nama_makanan='$nama', resep_makanan='$res', daerah_makanan='$dae' where id_makanan='$id'");}
else{mysqli_query($koneksi, "update makanan set foto_makanan='$nama_file',nama_makanan='$nama', resep_makanan='$res', daerah_makanan='$dae' where id_makanan='$id'");
}
$msg= $msg.'Update Galeri Sukses..'; print "<meta http-equiv=\"refresh\"
content=\"1;URL=server.php?module=makanan\">";
}
echo "$msg";
}

//hapus record Galeri
elseif ($module=='galeri' and $act=='hapus'){
	$unlink=mysqli_query($koneksi, "select * from galeri where id_galeri='$_GET[id]'");
	$CekLink=mysqli_fetch_array($unlink); if(!empty($CekLink['gambar']))
	{ unlink ("galeri/$CekLink[gambar]");
}
mysqli_query($koneksi, "delete from galeri where id_galeri='$_GET[id]'"); header('location:server.php?module='.$module);
}
elseif ($module=='bukutamu' and $act=='input') {
	error_reporting();
		if(isset($_POST['submit'])){
			
 	
			$nama	= $_POST['nama'];
			$email	= $_POST['email'];
			$web	= $_POST['website'];
			$pesan	= $_POST['text'];
			$tgl	= date('Y-m-d');
 
			if($nama && $email && $pesan){
				if(filter_var($email, FILTER_VALIDATE_EMAIL)){
					$in = mysqli_query($koneksi,"INSERT INTO buku_tamu(nm_bktamu,email_bktamu,alamat_bktamu,tgl_bktamu,komentar) VALUES('$nama', '$email', '$web','$tgl', '$pesan')");
					if($in){
						echo '<script language="javascript">alert("Terima kasih, data Anda berhasil disimpan"); document.location="server.php?module=bukutamu";</script>';
					}else{
						echo '<div id="error">Uppsss...! Query ke database gagal dilakukan!</div>';
					}
				}else{
					echo '<div id="error">Uppsss...! Email Anda tidak valid!</div>';
				}
			}else{
				echo '<div id="error">Uppsss...! Lengkapi form!</div>';
			}
		}
}elseif ($module=='bukutamu' AND $act=='hapus') {
	mysqli_query($koneksi,"delete from buku_tamu where
		id_bktamu='$_GET[id]'");
	header('location:server.php?module=bukutamu');
}



		

?>