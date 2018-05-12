<?php
	session_start();
?>
<!doctype html>
<head>
	<meta charset="utf-8">
	<title>BookLender</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<div>
<?php
	$errors = array(1=>"Invalid username or password!",
				   	2=>"Please log in to your account, or register a new one.");
	$error_id = 0;

	if(isset($_GET['err']))
	{	$error_id = $_GET['err'];	}
	
	if($error_id != 0)
	{
		echo '<p class="text-danger text-center">'.$errors[$error_id].'</p>';
	}
?>
		<form action="script/authenticate.php" method="post" class="form-signin" role="form">
			<input type="text" name="username" class="form-control" placeholder="Username" required autofocus><br/>
			<input type="password" name="password" class="form-control" placeholder="Password" required><br/>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
		</form>
		<a class="btn btn-lg btn-success btn-block" href="register.php">Register New Account</a>
	</div>
</body>