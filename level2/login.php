<?php 
require_once("session.php");
require_once("config.php");
session_start();



if (isset($_SESSION["auth"]) && isset($_COOKIE["auth"])) {
	if ($_SESSION["auth"] === $_COOKIE["auth"]) {
		header("Location: /");
	}
}


if (isset($_POST["username"]) && isset($_POST["password"])) {
	if (!empty($_POST["username"]) && !empty($_POST["password"])) {
		$connection = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);
		$username = $connection->real_escape_string($_POST["username"]);
		$password = $connection->real_escape_string($_POST["password"]);

		if ($connection->connect_error) {
  			die("Connection failed: " . $conn->connect_error);
		}
		$query = "SELECT id, username, password, name, age, secretKey FROM users WHERE username='".$username."';";
		$result = $connection->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			if (md5($password) === $row["password"]) {
				$cookie = md5($row["username"].$row["password"].$row["secretKey"]);
				setcookie("auth", $cookie, time() + (86400 * 30), "/", $_SERVER['SERVER_NAME'], false, true);
				$_SESSION["auth"] = $cookie;
				$_SESSION["expire"] = time() + $timeToLive;
				$_SESSION["userId"] = $row["id"];
				$_SESSION["name"] = $row["name"];
				$_SESSION["age"] = $row["age"];
				$_SESSION["secretKey"] = $row["secretKey"];
				header("Location: /");
			}
		}
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>EMS Login</title>
	<link rel="stylesheet" type="text/css" href="/css/login_styles.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1 style="color: white;">EMS Login</h1>
		<form class="loginForm" method="POST" action="#">
	  		<div class="form-group">
	    		<label for="username">Username</label>
	    		<input name="username" type="text" class="form-control" id="username" aria-describedby="usernameHelp" placeholder="Enter username">
	    		<small id="emailHelp" class="form-text text-muted">We'll never share your data with anyone else.</small>
	  		</div>
	  		<div class="form-group">
	    		<label for="password">Password</label>
	    		<input name="password" type="password" class="form-control" id="password" placeholder="Password">
	  		</div>
	  		<div class="form-group form-check">
	    		<input type="checkbox" class="form-check-input" id="exampleCheck1">
	    		<label class="form-check-label" for="exampleCheck1">Remember me</label>
	  		</div>
	  		<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>