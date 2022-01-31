<?php 
require_once("config.php");
require_once("checkAuth.php");

if (isset($_GET["id"]) && !empty($_GET["id"])) {
	$connection = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);
	$id = $connection->real_escape_string($_GET["id"]);
	$query = "SELECT id, name, age, secretKey FROM users WHERE id='".$id."';";
	$result = $connection->query($query);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$fileName = "profile-".$row["name"].".xls";
		$fields = implode("\t", array("ID", "NAME", "AGE", "SECRET_KEY"))."\n";
		$data = implode("\t", array($row["id"], $row["name"], $row["age"], $row["secretKey"]));
		header("Content-Type: application/vnd.ms-excel"); 
		header("Content-Disposition: attachment; filename=\"$fileName\"");
		echo $fields.$data;
	}
}
?>