<?php
	require 'connect.php';
	session_start();
	$token = $_SESSION['sess_token'];
	$id = $_SESSION['sess_id'];
	
	if(!isset($_GET['bookID']))
	{
		header('Location: ../home.php');
	}
	
	$bookID = $_GET['bookID'];
	
	try
	{
		$query = $db->prepare('DELETE FROM book WHERE bookID=:bookID');
		$query->execute(array(':bookID' => $bookID));

		header('Location: ../collection.php');
	}
	
	catch(Exception $e)
	{
		header('Location: ../collection.php?err=1');
	}
?>