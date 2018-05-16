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
	<title>Add a Book</title>
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
			<form action="script/addBook.php" method="post" enctype="multipart/form-data">
				<div class="form-group row">
					<label for="book" class="col-2 col-form-label">Title</label>
					<div class="col-10">
						<input type="text" class="form-control" id="book" name="title" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="nameFirst" class="col-2 col-form-label">Author First Name</label>
					<div class="col-10">
						<input type="text" class="form-control" id="nameFirst" name="authorFirst" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="nameLast" class="col-2 col-form-label">Author Last Name</label>
					<div class="col-10">
						<input type="text" class="form-control" id="nameLast" name="authorLast" required>
					</div>
				</div>
				<div class="form-group">
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="coverType" id="cover1" value="Hardcover" checked>
						<label class="form-check-label" for="cover1">
							Hardcover
						</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="coverType" id="cover2" value="Paperback">
						<label class="form-check-label" for="cover2">
							Paperback
						</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="coverType" id="cover3" value="Other">
						<label class="form-check-label" for="cover3">
							Other
						</label>
					</div>
				</div>
				<button class="btn btn-primary" type="submit" name="submit">Submit</button>&nbsp;<a class="btn btn-danger" href="collection.php">Cancel</a>
			</form>
		</div>
	</div>
</body>