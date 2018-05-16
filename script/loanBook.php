<?php
	require 'connect.php';
	session_start();
	$token = $_SESSION['sess_token'];
	$id = $_SESSION['sess_id'];

	$bookID = $_GET['bookID'];
	$borrowerName = $_POST['borrowerName'];
	$borrowerPhone = $_POST['borrowerPhone'];
	$dateIssued = $_POST['dateIssued'];
	
	$query1 = $db->prepare('SELECT * FROM loan WHERE bookID=:bookID');
	$query1->execute(array(':bookID' => $bookID));
	
	if($query1->rowCount() > 0)
	{
		header('Location: ../loan.php?bookID='.$bookID.'&err=1');
	}

	else
	{
		$query2 = $db->prepare('INSERT INTO loan (userID, bookID, borrowerName, borrowerPhone, dateIssued) 
										 VALUES (:userID, :bookID, :borrowerName, :borrowerPhone, :dateIssued)');
		$query2->execute(array(':userID' => $id, ':bookID' => $bookID, ':borrowerName' => $borrowerName, ':borrowerPhone' => $borrowerPhone, ':dateIssued' => $dateIssued));

		header('Location: ../home.php');
	}
?>