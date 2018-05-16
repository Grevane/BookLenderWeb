<?php
	require 'connect.php';
	session_start();
	$token = $_SESSION['sess_token'];
	$id = $_SESSION['sess_id'];

	$title = $_POST['title'];
	$authorLast = $_POST['authorLast'];
	$authorFirst = $_POST['authorFirst'];
	$coverType = $_POST['coverType'];

	$query = $db->prepare('INSERT INTO book (userID, title, authorLast, authorFirst, coverType) 
									 VALUES (:userID, :title, :authorLast, :authorFirst, :coverType)');
	$query->execute(array(':userID' => $id, ':title' => $title, ':authorLast' => $authorLast, ':authorFirst' => $authorFirst, ':coverType' => $coverType));
	
	header('Location: ../collection.php');
?>