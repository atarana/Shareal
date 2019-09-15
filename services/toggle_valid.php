<?php
	// params:
	// id, val (0/1)

	require_once("dbmanager.php");

	$q = "UPDATE products SET available = '".$_GET['val']."' WHERE id='".$_GET['id']."';";
	$res = $conn->query($q);

	header("Location: /index.php");
?>