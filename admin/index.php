<html>
<head> 
	<title>.:: Halaman Login Administrator ::.</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
</head>
<body>
	<div id="header"><center>Form Login Administrator</center><hr></div>
	<div class="container" style="margin-left: 500px">
		<form name="form1" method="post" action="cek_login.php">
			<div class="col-md-5">
  				<div class="form-group">
    				<label>Username</label>
    				<input class="form-control" name="username" type="text" id="username" placeholder="Enter Username">
  				</div>
  				<div class="form-group">
    				<label>Password</label>
    				<input type="password" class="form-control" name="password" id="password" placeholder="Password">
  				</div>
  				<form action="validate.php" method="post">
				Enter Image Text
				<input name="captcha" type="text">
				<img src="captcha.php" /><br><br>
				<button style="margin-left: 83%" type="submit" class="btn btn-primary" name="submit" value="Login">Submit</button>
				</form>
  				
			</div>			
		</form>
	</div>
</body>
</html>
