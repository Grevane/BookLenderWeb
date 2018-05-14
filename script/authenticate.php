<?php
	require 'connect.php';
	session_start();
	
	if(isset($_POST['username']))
	{	$username = $_POST['username'];	}
	
	if(isset($_POST['password']))
	{	$password = $_POST['password'];	}
	
	$query = $db->prepare('SELECT * FROM user WHERE username=:username');
	$query->execute(array(':username' => $username));

	if($query->rowCount() == 0)
	{	header('Location: ../index.php?err=1');	}

	else
	{
		$row = $query->fetch(PDO::FETCH_ASSOC);
		
		if(!password_verify($password, $row['password']))
		{	header('Location: ../index.php?err=1');	}
		
		else
		{
			$_SESSION['sess_id'] = $row['userID'];
			$_SESSION['sess_username'] = $row['username'];
			$_SESSION['sess_token'] = true;

			header('Location: ../home.php');
		}
	}
?>