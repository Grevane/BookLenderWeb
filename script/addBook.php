<?php
	require 'connect.php';
	session_start();

	$title = $_POST['title'];
	$authorLast = $_POST['authorLast'];
	$authorFirst = $_POST['authorFirst'];
	$coverType = $_POST['coverType'];
?>