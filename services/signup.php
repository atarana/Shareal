<?php
	$dbname = "shareal";
	$servername = "localhost";
	$username = "shareal";
	$password = "Shareal42#";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: ".$conn->connect_error);
	}

	$q = "INSERT INTO users (first, last, addr, email, tel, country) VALUES ('".$_POST['first']."', '".$_POST['last']."', '".$_POST['addr']."', '".$_POST['email']."', '".$_POST['tel']."', '".$_POST['country']."');";

	$conn->query($q);
	file_put_contents("/var/www/html/log.txt", "query OK\n", FILE_APPEND);

	echo "OK";
?>