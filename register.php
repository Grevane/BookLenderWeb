<?php
	include('script/connect.php');
	session_start();
?>
<!doctype html>
<head>
	<meta charset="utf-8">
	<title>BookLender Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<form action="register.php" method="post" enctype="multipart/form-data">
		<div class="form-group row">
			<label for="user" class="col-2 col-form-label">Username</label>
			<div class="col-10">
				<input type="text" class="form-control" id="user" name="username">
			</div>
		</div>
		<div class="form-group row">
			<label for="pass" class="col-2 col-form-label">Password</label>
			<div class="col-10">
				<input type="password" class="form-control" id="pass" name="password">
			</div>
		</div>
		<div class="form-group row">
			<label for="first" class="col-2 col-form-label">First Name (Optional)</label>
			<div class="col-10">
				<input type="text" class="form-control" id="first" name="userFirst">
			</div>
		</div>
		<div class="form-group row">
			<label for="last" class="col-2 col-form-label">Last Name (Optional)</label>
			<div class="col-10">
				<input type="text" class="form-control" id="last" name="userLast">
			</div>
		</div>
		<br/>
		<button class="btn btn-primary" type="submit" name="submit">Register</button>
<?php
	if(isset($_REQUEST['submit']))
	{
		$username = $_POST['username'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$userFirst = null;
		$userLast = null;
		if(isset($_POST['userFirst']))
		{	$userFirst = $_POST['userFirst'];	}
		if(isset($_POST['userLast']))
		{	$userLast = $_POST['userLast'];		}
		
		$q = "INSERT INTO user (username, password, userLast, userFirst) VALUES ('$username', '$password', '$userLast', '$userFirst')";
		$query = $db->prepare($q);
		$query->execute();
		
		header('Location: index.php');
	}
?>
	</form>
	<a class="btn btn-success" href="index.php">Return to Login</a>
</body>