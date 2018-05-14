<?php
	include('script/connect.php');
	session_start();
	$token = $_SESSION['sess_token'];
	$id = $_SESSION['sess_id'];

	if(!isset($_SESSION['sess_username']) || $token != true)
	{
		header('Location: index.php?err=2');
	}
?>
<!doctype html>
<head>
	<meta charset="utf-8">
	<title>BookLender Account</title>
	<link rel="stylesheet" href="styles/jp.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<?php
	$active = ['','','active'];
	include('script/navbar.php');
	$query1 = $db->prepare('SELECT * FROM user WHERE userID=:userID');
	$query1->execute(array(':userID' => $id));
	$row = $query1->fetch(PDO::FETCH_ASSOC);
?>
	<form action="profile.php" method="post" enctype="multipart/form-data">
		<div class="form-group row">
			<label for="user" class="col-2 col-form-label">Username</label>
			<div class="col-10">
				<input type="text" class="form-control" id="user" name="username" placeholder="<?php echo $row['username']; ?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="pass" class="col-2 col-form-label">Password</label>
			<div class="col-10">
				<input type="password" class="form-control" id="pass" name="password">
			</div>
		</div>
		<div class="form-group row">
			<label for="first" class="col-2 col-form-label">First Name</label>
			<div class="col-10">
				<input type="text" class="form-control" id="first" name="userFirst" placeholder="<?php echo $row['userFirst']; ?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="last" class="col-2 col-form-label">Last Name</label>
			<div class="col-10">
				<input type="text" class="form-control" id="last" name="userLast" placeholder="<?php echo $row['userLast']; ?>">
			</div>
		</div>
		<br/>
		<button class="btn btn-primary" type="submit" name="submit">Save</button><a class="btn btn-danger" href="home.php">Cancel</a>
<?php
		if(isset($_REQUEST['submit']))
		{
			$password = $row['password'];
			if(!empty($_POST['password']))
			{	$password = password_hash($_POST['password'], PASSWORD_DEFAULT); 	}
			
			$userFirst = $row['userFirst'];
			if(!empty($_POST['userFirst']))
			{	$userFirst = $_POST['userFirst'];	}
			
			$userLast = $row['userLast'];
			if(!empty($_POST['userLast']))
			{	$userLast = $_POST['userLast'];		}
			
			if(!empty($_POST['username']))
			{
				$username = $_POST['username'];

				$query2 = $db->prepare('SELECT * FROM user WHERE username=:username');
				$query2->execute(array(':username' => $username));

				if($query2->rowCount() == 0)
				{
					$query3 = $db->prepare("UPDATE user SET username=:username, password=:password, userLast=:userLast, userFirst=:userFirst WHERE userID=:userID");
					$query3->execute(array(':username' => $username, ':password' => $password, ':userLast' => $userLast, ':userFirst' => $userFirst, ':userID' => $id));

					header('Location: home.php');
				}

				else
				{
					echo "<p class='jDanger'>Username already exists, please enter a different username.</p>";
				}
			}
			
			else
			{
				$username = $row['username'];
				
				$query4 = $db->prepare("UPDATE user SET username=:username, password=:password, userLast=:userLast, userFirst=:userFirst WHERE userID=:userID");
				$query4->execute(array(':username' => $username, ':password' => $password, ':userLast' => $userLast, ':userFirst' => $userFirst, ':userID' => $id));

				header('Location: home.php');
			}
		}
?>
	</form>
</body>