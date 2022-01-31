<?php require_once("checkAuth.php");?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Employee Management System (EMS)</title>
	<link rel="stylesheet" type="text/css" href="/css/styles.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-light">
  		<a class="navbar-brand" href="#" style="color: white;">EMS</a>
  		<div class="navTail">
  			<p>Welcome, <?php echo $_SESSION["name"]?>!</p>
  			<a href="/logout.php" id="link">Logout</a>
  		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="infoWrapper">
					<img src="/assets/user.jpg" id="profilePic">
					<div class="info">
						<p class="key">Name:</p>
						<p class="value"><?php echo $_SESSION["name"]?></p>
					</div>
					<div class="info">
						<p class="key">Age:</p>
						<p class="value"><?php echo $_SESSION["age"]?></p>
					</div>
					<div class="info">
						<p class="key">Secret Key:</p>
						<p class="value"><?php echo $_SESSION["secretKey"]?></p>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="downloadWrapper">
					<h3>Download your profile</h3>
					<a href="/download.php?id=<?php echo $_SESSION["userId"]?>" id="link">
						<button type="button" class="btn btn-primary btn-lg">Download</button>
					</a>
				</div>
			</div>
		</div>
	</div>
	

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>