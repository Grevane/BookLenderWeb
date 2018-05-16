<?php
	require 'connect.php';
	session_start();
	$token = $_SESSION['sess_token'];
	$id = $_SESSION['sess_id'];

	if(!isset($_GET['loanID']))
	{
		header('Location: ../home.php');
	}
	
	$loanID = $_GET['loanID'];
	$query = $db->prepare('DELETE FROM loan WHERE loanID=:loanID');
	$query->execute(array(':loanID' => $loanID));

	header('Location: ../home.php');
?>