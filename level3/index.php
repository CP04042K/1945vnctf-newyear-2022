
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Hello</title>
	<link rel="stylesheet" type="text/css" href="/css/styles.css">
</head>
<body>
	<div class="container">
		<h1>Hola, I'm totally secure.</h1>
		<p>This website is very secure! All suspicious acctivities is <strong>logged</strong>, don't try to mess around with this website</p>
		<div class="menu">
			<a href="/">Main Page</a>
			<a href="/?page=comments.php">Comments</a>
			<a href="/?page=about.php">About</a>
		</div>
		<div class="subPage">
			
		<?php 

		if (isset($_GET["page"]) && !empty($_GET["page"])) {
			$file = str_replace("..", "", $_GET["page"]);
			$file = str_replace("/", "", $file);
			$file = str_replace(":", "", $file);
			$file = str_replace("=", "", $file);
			require($file);
		}

		?>
		</div>
	</div>
</body>
</html>