<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="home.php">Book Lender</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav">
			<a class="nav-item nav-link <?php echo $active[0]; ?>" href="home.php">Home</a>
			<a class="nav-item nav-link <?php echo $active[1]; ?>" href="collection.php">Books</a>
			<a class="nav-item nav-link <?php echo $active[2]; ?>" href="profile.php">Account</a>
		</div>
	</div>
	<form class="form-inline">
		<a class="btn btn-danger" href="script/logout.php">Logout</a>
	</form>
</nav>