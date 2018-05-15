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
	<title>BookLender Home</title>
	<link rel="stylesheet" href="styles/jp.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<?php
	$active = ['active','',''];
	include('script/navbar.php');
?>
	<div class="jBackground">
		<div class="jBigDiv">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Title</th>
						<th>Borrower</th>
						<th>Phone</th>
						<th>Date Issued</th>
						<th>Return</th>
					</tr>
				</thead>
				<tbody>
<?php
		$query1 = $db->prepare('SELECT * FROM loan WHERE userID=:userID');
		$query1->execute(array(':userID' => $id));
		foreach($query1 as $row)
		{ ?>
					<tr>
						<th>
<?php
			$query2 = $db->prepare('SELECT title FROM book WHERE bookID=:bookID AND userID=:userID');
			$query2->execute(array(':bookID' => $row['bookID'], ':userID' => $id));
			echo $query2->fetch(PDO::FETCH_ASSOC);
?>
						</th>
						<th><?php echo $row['borrowerName']; ?></th>
						<th><?php echo $row['borrowerPhone']; ?></th>
						<th><?php echo $row['dateIssued']; ?></th>
						<th></th>
					</tr>
<?php 	} ?>
				</tbody>
			</table>
		</div>
	</div>
</body>