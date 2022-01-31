<?php 
$content = date("Y/m/d h:i:sa")." - ".urldecode($_SERVER["REQUEST_URI"])."\n";

header("HTTP/1.0 404 Not Found");
file_put_contents("error_log", $content, FILE_APPEND);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ERROR 404</title>
</head>
<body>
	<h2 style="text-align: center;">resource not found</h2>
</body>
</html>