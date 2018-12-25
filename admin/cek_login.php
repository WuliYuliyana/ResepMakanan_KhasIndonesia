<?php
include "../include/koneksi.php";
$login=mysqli_query($koneksi, "select * from admin where username='$_POST[username]' and password='$_POST[password]'");
if (mysqli_num_rows($login)) {
		$data=mysqli_fetch_array($login);
		session_start();
		if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"])
{

		$_SESSION['user']=$data['username'];
		$_SESSION['pass']=$data['password'];
		header("location:server.php?module=home");
//Place other codes here to execute when captcha is passed
}
else
{
die("Wrong Captcha Code!");
}
		
}

else
{
	print "<script>
	alert ('Periksa Pengisian Form'); 
	location.href = 'index.php';
</script>";
}
?>