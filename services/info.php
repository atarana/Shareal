<?php
	// params:
	// email

	require_once("dbmanager.php");

	$q = "SELECT * FROM users where email='".$_GET['email']."';";
	$res = $conn->query($q);

	echo json_encode($res->fetch_assoc());
?>