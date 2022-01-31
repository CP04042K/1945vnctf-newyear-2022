<?php
define("SERVER", "localhost");
define("USERNAME", "chanh"); // doi thanh user co quyen thap hon
define("PASSWORD", "chanhpro123");
define("DATABASE", "level1");

$connection = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);

if ($connection->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$postId = ($_GET["id"] != null ? $_GET["id"] : "1");
$query = "SELECT id, imageLink FROM posts WHERE id = '".$postId."';";
$result = $connection->query($query);

if ($result->num_rows == 0) {
	echo "No pic found :(";
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cat Gallery</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/css/styles.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	<h1>Cat lovers blog</h1>
	<div class="postSection">
		<div class="imgSection">
		<?php while ($row = $result->fetch_assoc()) { ?>
			<?php if (intval($row["id"]) > 1) { ?>
			<a href="/index.php?id=<?php echo intval($row["id"])-1?>"><li class="fa fa-angle-left"></li></a>
			<?php } ?>
			<img id="postImg" src="<?php echo $row["imageLink"]?>">
			<?php if (intval($row["id"]) < 3) { ?>
			<a href="/index.php?id=<?php echo intval($row["id"])+1?>"><li class="fa fa-angle-right"></li></a>
			<?php } ?>
		<?php } ?>
		</div>
		<p style="text-align: center">See more interesting pictures...</p>
	</div>
</body>
</html>