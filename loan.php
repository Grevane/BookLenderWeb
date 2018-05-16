<?php
	include('script/connect.php');
	session_start();
	$token = $_SESSION['sess_token'];
	$id = $_SESSION['sess_id'];
	$bookID = null;
	if(isset($_GET['bookID']))
	{	$bookID = $_GET['bookID'];	}
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
	<title>Loan a Book</title>
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
<?php
			$errors = array(1=>"This book is already on loan!",
				   			2=>"I dunno what happened.");
			
			if($err != 0)
			{
				echo '<p class="text-danger text-center">'.$errors[$err].'</p>';
			}
?>
			<form action="script/loanBook.php?bookID=<?php echo $bookID; ?>" method="post" enctype="multipart/form-data">
				<div class="form-group row">
					<label for="name" class="col-2 col-form-label">Borrower's Name</label>
					<div class="col-10">
						<input type="text" class="form-control" id="name" name="borrowerName" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="phone" class="col-2 col-form-label">Borrower's Phone # (numbers only, optional)</label>
					<div class="col-10">
						<input type="text" class="form-control" id="phone" name="borrowerPhone">
					</div>
				</div>
				<div class="form-group row">
					<label for="issued" class="col-2 col-form-label">Date Loaned Out</label>
					<div class="col-10">
						<input type="date" class="form-control" id="issued" name="dateIssued" required>
					</div>
				</div>
				<button class="btn btn-primary" type="submit" name="submit">Submit</button>&nbsp;<a class="btn btn-danger" href="collection.php">Cancel</a>
			</form>
		</div>
	</div>
</body>