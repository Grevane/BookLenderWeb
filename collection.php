<?php
	include('script/connect.php');
	session_start();
	$token = $_SESSION['sess_token'];
	$id = $_SESSION['sess_id'];
	$err = 0;
	if(isset($_GET['err']))
	{	$err = $_GET['err'];	}

	if(!isset($_SESSION['sess_username']) || $token != true)
	{
		header('Location: index.php?err=2');
	}
?>
<!doctype html>
<head>
	<meta charset="utf-8">
	<title>BookLender Collection</title>
	<link rel="stylesheet" href="styles/jp.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<?php
	$active = ['','active',''];
	include('script/navbar.php');
?>
	<div class="jBackground">
		<div class="jBigDiv">
			<div class="jSmallDiv" style="padding-top: 0rem; padding-bottom: 3rem;">
				<a class="btn btn-lg btn-primary btn-block" href="book.php">Add a Book</a>
			</div>
<?php
			$errors = array(1=>"This book is currently on loan, and cannot be deleted.",
							2=>"I dunno what happened.");

			if($err != 0)
			{
				echo '<p class="text-danger text-center">'.$errors[$err].'</p>';
			}
?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Title</th>
						<th>Author</th>
						<th>Cover Type</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
<?php
		$query = $db->prepare('SELECT * FROM book WHERE userID=:userID ORDER BY authorLast');
		$query->execute(array(':userID' => $id));
		foreach($query as $row)
		{ ?>
					<tr>
						<th><?php echo $row['title']; ?></th>
						<th><?php echo $row['authorFirst'] . " " . $row['authorLast']; ?></th>
						<th><?php echo $row['coverType']; ?></th>
						<th><a class="btn btn-success" href="loan.php?bookID=<?php echo $row['bookID']; ?>">Loan</a>&nbsp;<button class="btn btn-danger" onclick="jpConfirm()">Delete</button></th>
					</tr>
<?php 	} ?>
				</tbody>
			</table>
		</div>
	</div>
	
<script>
	function jpConfirm()
	{
		var result = confirm("Do you wish to delete this book?");
		
		if(result)
		{
			window.location = "script/deleteBook.php?bookID=<?php echo $row['bookID']; ?>";
		}
	}
</script>
</body>